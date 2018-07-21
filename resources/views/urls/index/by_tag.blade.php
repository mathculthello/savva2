@extends('urls.layout')

@section('content')

@parent

<form method="POST" action="{{ route('urls.batch') }}">
  @csrf
  @auth
  <input type="submit" value="Удалить отмеченные!">
  @endauth

@foreach($urls_array as $key=>$urls)
<h2><a name="{{$key}}">{{$key}}</a></h2>
@php
@endphp
@include ('urls._sublist')
@endforeach

</form>

@endsection
