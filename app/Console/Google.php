<?php

/*
Задача этого класса — получить первые N результатов
гугла по данному запросу.

*/



namespace Savva\Console;

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




  public $items = [];



  /*
  | Здесь содержатся параметры запроса
  | к АПИ
  */

  public $queryset = [];



  public $total;




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

static function get() {
  $obj = new self;
  $obj->load();
  return $obj;
}



  /* Функции, изменяющие внутренее состояние объекта
  Возвращают сам объект
  */


private function load()
  {
    $data = self::get_json($this->url,$this->queryset);
    $result = json_decode($data);

    var_dump($result);

    $this->total = $result->queries->nextPage[0]->totalResults;
    $this->items = array_merge($this->items,$result->items);

    return $this;

  }





/* Статические функции */

  /*
  Функция возвращает JSON-документ с Гугла
  */

  public static function get_json($url,$queryset)
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
