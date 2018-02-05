<?php

namespace Savva;

use Curl\Curl;

class Google
{
  public static function get()
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
      ];

    $url = "https://www.googleapis.com/customsearch/v1?";
    $url .= http_build_query($queryset);
    $curl = new Curl();
    $curl->setOpt(CURLOPT_RETURNTRANSFER, true);
    $result = $curl->get($url);
    return $result = json_decode($result->response);

  }
}
