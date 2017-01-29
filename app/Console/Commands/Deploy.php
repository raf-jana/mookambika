<?php

namespace App\Console\Commands;

use Validator;
use RuntimeException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class Deploy extends BaseCommand {

    /**
     * @var string
     */
    const TAG_PREFIX = 'set-';
    const REGEX_TAG = '/(\{\s*([^|} ]+)(?:\s*[|]\s*([^|} ]*))?\s*\})/i';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:deploy {--f : Force migrate}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Interactive application deploy helper.';

    /**
     * @var array
     */
    protected $tags = [];
    protected $options = [];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        $env = $branch = $this->ask('Specify environment');
        $branch = $this->ask('Specify Git brach to deploy');

        $data = [
            'environment' => $env,
            'git_branch' => $branch
        ];

        if ($this->validateInput($data)) {
            $commands = config('deploy.commands');
            foreach ($commands as $command) {
                $this->execShellWithPrettyPrint($command);
            }
        } else {
            $this->error('Something went wrong!');
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data        	
     * @return User
     */
    public function validateInput($data) {
        $validator = Validator::make($data, [
                    'environment' => 'required|max:255|environment',
                    'git_branch' => 'required|git_branch'
        ]);

        if (!$validator->passes()) {
            throw new RuntimeException($validator->errors()->first());
        }
        return true;
    }

}
