<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Encore\Admin\Console\InstallCommand as LaravelAdminInstallCommand;

class AppInstall extends LaravelAdminInstallCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'savva:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->initDatabase();
    }
}
