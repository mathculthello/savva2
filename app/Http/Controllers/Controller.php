<?php

namespace Savva\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Exception;

use Savva\Url;

class Controller extends BaseController
{





    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;








    function __construct()
    {
      $this->middleware('auth.basic',['only'=>'add']);
    }







    /* Display functions */






    public function by_category()
    {
      $sections = Url::SECTIONS;
      foreach($sections as $key=>$section){
        $urls_array[$key]=Url::where('section',$key)->get();
      }
      return view('by_category',['sections'=>$sections, 'urls_array'=>$urls_array]);
    }

    public function by_service()
    {
      $services = [
        "Плейлисты" => Url::where('url','LIKE','%playlist%')->get(),
        "Отдельные видео на ютюбчике" => Url::where('url','LIKE','%youtu%watch%')->get(),
        "Вкшечка" => Url::where('url','LIKE','%vk.com%')->get(),
      ];
      return view('by_service', ['services'=>$services]);
    }

    public function full_list()
    {
      $urls = Url::orderBy('created_at','desc')->get();
      return view('full_list',['urls'=>$urls]);
    }














    /* Управляющие методы */

    public function add($url)
    {
      $model=new Url($url);
      $model->user_id=Auth::id();
      $model->save();
    }
}
