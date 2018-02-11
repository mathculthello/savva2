<?php

/*
Задача этого класса — получить первые N результатов
гугла по данному запросу.

*/



namespace Savva\Console;

use Curl\Curl;

class Google
{

  /* Настройки */


  /*
   * URL АПИ гугла
   *
   * @var string
   */

  protected $url = "https://www.googleapis.com/customsearch/v1?";


  const STEP=10;



  /*
   * Здесь содержатся параметры запроса к АПИ
   *
   * @var array
   */
  public $queryset = [];



/* Результаты запроса */

  /*
   * Содержит промежуточный результат запроса
   *
   * @var \stdClass
   */
   private $intermediate_result;

  /*
   * Всего результатов в ответе
   * Загружается в конструкторе
   *
   * @var int
   */
  public $total;



  /*
   * Массив поисковых результатов
   *
   * @var array
   */
  public $items = [];



/*
 * @param string $query
 * @return $this
 */


  public function __construct($query="Алексей Савватеев")
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
      "q" => $query,
      "start" => 1,
    ];

    /* Загружаем первый результат в $this->intermediate_result */

    $this->load();

    $this->total = $this->intermediate_result->queries->nextPage[0]->totalResults;
    $this->items = $this->intermediate_result->items;


    return $this;

  }


  public function get_n_pages ($n) {
    $total = $this->total;
    $total_pages = $total/self::STEP;
    $n = $n>$total_pages ? $total_pages : $n;
    for ($i=1; $i<$n; $i++) {
      $this->queryset['start']=$i*self::STEP;
      $this->load();
      $this->items = array_merge($this->items,$this->intermediate_result->items);
    }

    return $this;


  }


/* Facades */


/*
 * @return $this
 */

public static function get($n=1) {
  $obj = new self;
  $obj->get_n_pages($n);
  return $obj;
}







  /* Функции, изменяющие внутренее состояние объекта
  Возвращают сам объект
  */




 /*
  * @return $this
  */

private function load()
  {
    $data = self::request($this->url,$this->queryset);
    $this->intermediate_result = json_decode($data);

    //var_dump($result);

    return $this;

  }





  /* Статические функции */

  /*
  * Получение тела ответа на запрос к серверу
  * @param $url string
  * @param
  * @return string
  */

  public static function request($url,$queryset)
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
