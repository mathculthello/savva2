<?php

/* Этот файл используется для популяции
результатов из гугла в базу данных.

Сюда попадают все результаты по запросу
Алексей+Савватеев за неделю.
*/


namespace Savva\Console\Commands;

use Illuminate\Console\Command;

use Savva\Google;
use Savva\Url;
use Exception;

class GooglePopulate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'savva:google:populate';

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
        $obj=Google::all();
        foreach($obj->items as $item)
        {
          try {

          $db=new Url($item->link);
          $db->save();

        } catch (Exception $e) {

        }
        }
    }
}
