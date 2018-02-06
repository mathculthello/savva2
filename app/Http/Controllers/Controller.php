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

    public function by_category()
    {
      $sections = Url::SECTIONS;
      foreach($sections as $key=>$section){
        $urls_array[$key]=Url::where('section',$key)->get();
      }
      return view('by_category',['sections'=>$sections, 'urls_array'=>$urls_array]);
    }

    public function full_list()
    {
      $urls = Url::orderBy('created_at','desc')->get();
      return view('full_list',['urls'=>$urls]);
    }

    public function add($url)
    {
      $model=new Url($url);
      $model->save();
    }
}
