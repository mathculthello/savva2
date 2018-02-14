<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\Newsletter as NewsletterMail;

class Newsletter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'savva:mail:newsletter {--test : Do not send CC}';

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
      $cc=[];
      if (!$this->option('test')) {
        $cc = ['hibiny@mail.ru', 'volgarevmaxim@gmail.com', 'prohorovich@mail.ru'];
      };
        Mail::to('yegor.kuzmichev@gmail.com')
        ->cc($cc)
        ->send(new NewsletterMail);
    }
}
