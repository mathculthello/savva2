<?php

namespace Savva\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Savva\Mail\Newsletter as NewsletterMail;

class Newsletter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:newsletter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send newsletter';

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
        Mail::to('yegor.kuzmichev@gmail.com')
        ->send(new NewsletterMail);
    }
}
