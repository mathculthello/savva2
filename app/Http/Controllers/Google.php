<?php

namespace Savva\Http\Controllers;

use Illuminate\Http\Request;
use Savva\Google as Model;

class Google extends Controller
{
    public function list()
    {
      $result=Model::get();
      return view('google',['result'=>$result]);
    }


}
