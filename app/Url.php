<?php

namespace Savva;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Curl\Curl;
use Sunra\PhpSimple\HtmlDomParser as Parser;
use Exception;

class Url extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $primaryKey='rowid';

    public function __construct($url=null)
    {
      if($url)
      {
        $this->url=$url;
        $this->title=self::getTitle($url);
      }
    }

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
