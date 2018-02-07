<?php

namespace Savva;

use Curl\Curl;
use Savva\Url;

class Google
{

public static function get(){
    return self::filter(self::_get());
}

  private static function _get()
  {

    /* PREPARE CONTENT */
    /* Query */
    $q="Алексей+Савватеев";
    /* API URL */
    $queryset =
      [
        "key" => env('GOOGLE_KEY'),
        "cx" => env('GOOGLE_CX'),
        "dateRestrict" => "d7",
        "q" => $q,
        "start" => 1,
      ];

    $url = "https://www.googleapis.com/customsearch/v1?";
    $url .= http_build_query($queryset);
    $curl = new Curl();
    $curl->setOpt(CURLOPT_RETURNTRANSFER, true);
    $result = $curl->get($url);
    $result = json_decode($result->response);
    return $result;
  }

  private static function filter($result){
    foreach($result->items as $key=>$value){
      if(Url::where('url',$value->link)->exists()){
        unset ($result->items[$key]);
      };
    }

    return $result;
  }
}
