<?php

namespace Savva\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Exception;

use Savva\Url;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {

      $sections = Url::SECTIONS;

      foreach($sections as $key=>$section){
        $urls_array[$key]=Url::where('section',$key)->get();
      }

      return view('index',['sections'=>$sections, 'urls_array'=>$urls_array]);

    }

    public function add($url)
    {
      $model=new Url($url);
      $model->save();
    }
}
