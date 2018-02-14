<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


use Exception;

class Url extends Model
{
    use SoftDeletes;

    protected $table = 'urls';

    protected $dates = ['deleted_at'];

    protected $fillable = ['url','title'];

    public function __construct($data=[])
    {
      parent::__construct($data);
      if(isset($data['url'])&&!isset($data['title']))
      {
        $this->url=$data['url'];
        $this->title=Helper::getTitle($this->url);
      }
    }


}
