<?php

namespace App\Console\Commands;

use Carbon;
use App\Models\HttpRequestLog;
use Illuminate\Console\Command;

class ClearRequestLog extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:clear-request-log';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clears website HTTP request logs from DB';

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
        $lastWeek = Carbon::now()->subWeeks(1);
        if (HttpRequestLog::where('requested_at', '<', $lastWeek)->delete()) {
            $this->info('HTTP request log cleared.');
        } else {
            $this->info('No requests found before - ' . $lastWeek);
        }
    }

}
