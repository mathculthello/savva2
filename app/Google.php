<?php

/*
| It is a model for working with
| Google Custom Search
| Все очень просто:
| На входе задаем параметры поиска в переменную
| $queryset, на выходе метод _get возвращает
| массив результатов, соответствующий запросу
*/



namespace Savva;

use Curl\Curl;

class Google
{


  /*
  URL АПИ гугла
  */

  protected $url = "https://www.googleapis.com/customsearch/v1?";






  const DUMP = __DIR__.'/../storage/app/google_response.json';



  const STEP=10;


  /*
  Это, собственно, сам запрос
  */

  public $query = "Алексей+Савватеев";




  public $current_response;




  public $items = [];



  /*
  | Здесь содержатся параметры запроса
  | к АПИ
  */

  public $queryset = [];



  public function make_collection()
  {

  }



  public function __construct()
  {

    /*
    | Настраиваем параметры запроса
    | к АПИ гугла
    */
    $this->queryset =
    [
      "key" => env('GOOGLE_KEY'),
      "cx" => env('GOOGLE_CX'),
      "dateRestrict" => "d7",
      "q" => $this->query,
      "start" => 1,
    ];



  }


/* Facade */
static function all() {
  $obj = new self;
  $obj->load_all_items();
  return $obj;
}



  /* Функции, изменяющие внутренее состояние объекта
  Возвращают сам объект
  */



function load_all_items()
{

$this->load_response();

for ($i=self::STEP+1; $i<$this->total; $i+=self::STEP ) {
  $this->queryset['start']=$i;
  $this->load_response();
}

return $this;

}


public function load_response()
  {
    //$data = file_get_contents(self::DUMP);
    $data = self::get_response($this->url,$this->queryset);
    $result = json_decode($data);

    $this->items = array_merge($this->items,$result->items);
    $this->total = $result->queries->nextPage[0]->totalResults;


    return $this;

  }







/* Функции. которые просто выполняют
какую-то работу
*/
  public function dump_response()
  {
    file_put_contents(self::DUMP,
      self::get_response($this->url,$this->$queryset));
  }













/* Статические функции */

  /*
  Функция возвращает JSON-документ с Гугла
  */

  public static function get_response($url,$queryset)
  {
    $url .= http_build_query($queryset);
    $curl = new Curl();
    $curl->setOpt(CURLOPT_RETURNTRANSFER, true);

    try {
      $result = $curl->get($url);
    }
    catch (Exception $e) {
      return false;
    }
    return $result->response;
  }


}
