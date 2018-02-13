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

    public function __construct(array $data=[])
    {
      parent::__construct($data);
      if($data)
      {
        //$this->url=$url;
        //$this->title=Helper::getTitle($url);
      }
    }


}
