<?php

namespace Savva;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


use Exception;

class Url extends Model
{
    use SoftDeletes;

    protected $table = 'urls';

    protected $dates = ['deleted_at'];

    protected $primaryKey='rowid';

    public $sections = [
        1 => "Плейлисты",
        2 => "Отдельные видео",
        3 => "Профили",
        4 => "Онлайн-курсы на спецплатформах",
        5 => "Журналистика",
        //6 => "Соцсети",
        7 => "Анонсы",
        8 => "Битые ссылки (к удалению)",
        //9 => "Мероприятия",
        10 => "Документы",
        0 => "Прочее",
    ];

    public function __construct($url=null)
    {
      if($url)
      {
        $this->url=$url;
        $this->title=Helper::getTitle($url);
      }
    }


}
