<?php

namespace App\Console\Commands;

class BlogInstall extends BaseCommand {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the blog';

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

        $this->execShellWithPrettyPrint('php artisan key:generate');
        $this->execShellWithPrettyPrint('php artisan migrate --seed');
        $this->execShellWithPrettyPrint('php artisan make:auth');
        $this->execShellWithPrettyPrint('php artisan passport:install');
    }

}
