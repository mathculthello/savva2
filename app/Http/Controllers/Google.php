<?php

namespace Savva\Http\Controllers;

use Illuminate\Http\Request;
use Savva\Google as Model;
use Savva\Url;
class Google extends Controller
{
    public function list()
    {
      $result=Model::get();
      $result=self::filter($result);

      return view('google',['result'=>$result]);
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
