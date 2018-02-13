<?php

namespace Savva\Http\Controllers;

use Savva\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UrlController extends Controller
{

    function __construct()
    {
      // Добавляем авторизацию на методы изменения контента
      $this->middleware('auth.basic',['only'=>['add','delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $urls = Url::orderBy('created_at','desc')->get();
      return view('urls.index.full_list',['urls'=>$urls]);
    }


    public function by_category()
    {
      $sections = Url::SECTIONS;
      foreach($sections as $key=>$section){
        $urls_array[$key]=Url::where('section',$key)->get();
      }
      return view('urls.index.by_category',['sections'=>$sections, 'urls_array'=>$urls_array]);
    }

    public function by_service()
    {
      $services = [
        "Плейлисты" => Url::where('url','LIKE','%playlist%')->get(),
        "Отдельные видео на ютюбчике" => Url::where('url','LIKE','%youtu%watch%')->get(),
        "Вкшечка" => Url::where('url','LIKE','%vk.com%')->get(),
      ];
      return view('urls.index.by_service', ['services'=>$services]);
    }

    public function index_by_tag()
    {
      $tags = DB::table('urls')->groupBy('tag')->whereNotIn('tag',[''])->pluck('tag')->all();
      foreach($tags as $tag){
        $urls_array[$tag]=Url::where('tag',$tag)->get();
      }
      return view('urls.index.by_tag',['urls_array'=>$urls_array]);
    }


    /**
     * Add new url (custom method)
     *
     * @return void
     */
    public function add($url)
    {
      $model=new Url($url);
      $model->user_id=Auth::id();
      $model->save();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Savva\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function show(Url $url)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Savva\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function edit(Url $url)
    {
        return view('urls.edit',['url'=>$url]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Savva\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Url $url)
    {
      $url->title=$request->title;
      $url->url=$request->url;
      $url->tag=$request->tag;
      $url->save();
      return redirect()->route('urls.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Savva\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function destroy(Url $url)
    {
      $url->delete();
      return back();
    }
}
