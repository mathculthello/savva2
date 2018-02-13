@extends('urls.layout')

@section('content')

@parent

@foreach($urls_array as $key=>$urls)
<h2>{{$key}}</h2>
@php

@endphp
@include ('urls._sublist')
@endforeach

@endsection
