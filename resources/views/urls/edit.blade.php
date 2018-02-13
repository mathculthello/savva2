@extends('urls.layout')


@section('content')

<form action="{{ action('UrlController@update',$url->id)}}" method="POST">
@csrf
@method('PUT')
<input name="title" value="{{ $url->title }}">
<input name="url" value="{{ $url->url }}">
<input name="tag" value="{{ $url->tag }}">
<input type="submit" value="Save">

</form>
@endsection
