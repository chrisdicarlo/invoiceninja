<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Artisan;

class InstallModule implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $moduleName;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($moduleName)
    {
        $this->moduleName = $moduleName;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // dd($this->moduleName);
        $exitCode = Artisan::call('module:install', ['--type' => 'github', 'name' => $this->moduleName]);
    }
}
