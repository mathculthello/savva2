<?php

namespace Savva\Console\Commands;

use Illuminate\Console\Command;

use Savva\Url;
use Sunra\PhpSimple\HtmlDomParser as Parser;
use Exception;
use Curl\Curl;

class TitlesGrab extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'savva:urls:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Grab titles from the internet';

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
      $urls=Url::all();
      foreach($urls as $url):

      if(in_array($code,[404])) {
        $url->delete();
      }
      endforeach;
    }
}
