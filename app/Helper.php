<?php
namespace Savva;

use Curl\Curl;
use Sunra\PhpSimple\HtmlDomParser as Parser;

class Helper
{
  public static function getTitle($url)
  {
      $curl = new Curl();
      $curl->setOpt(CURLOPT_FOLLOWLOCATION, true);
      $response=$curl->get($url);
      $code = $response->http_status_code;
      if ($code==200) {
          return self::parseTitleFromHtml($response->response);
      }
  }

  public static function parseTitleFromHtml($html)
  {
    if($dom = Parser::str_get_html($html))
    {
      if($a=$dom->find('title',0))
      {
        return $a->plaintext;
      }
    }
    return false;
  }
}
