@extends('urls.index')

@section('content')

@parent

@foreach($services as $title=>$urls)
<h2>{{$title}}</h2>

@include('urls._sublist')

@endforeach

@endsection
