<?php

/* Этот файл используется для популяции
результатов из гугла в базу данных.

Сюда попадают все результаты по запросу
Алексей+Савватеев за неделю.
*/


namespace Savva\Console\Commands;

use Illuminate\Console\Command;

use Savva\Console\Google;
use Savva\Url;
use Exception;

class GooglePopulate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'savva:google:populate {--nosave : Ничего не записывать в базу.}
    {--pages=1 : Pages count to get}';

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


        $obj=Google::get($this->option('pages'));
        foreach($obj->items as $item)
        {

          echo "\n\n===================\n";

          $url=new Url(['url'=>$item->link]);
          $url->tag="google";

          echo $url->url;
          echo "\n";
          echo $url->title;

          if($this->option('nosave')){
            continue;
          }

          try {

            $url->save();
        } catch (Exception $e) {
          echo $e->getMessage();
        }

        }
    }
}
