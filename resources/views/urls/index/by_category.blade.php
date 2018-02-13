@extends('urls.layout')

@section('content')

@parent

@foreach($sections as $key=>$section)
<h2>{{$section}}</h2>
@php
$urls = $urls_array[$key]
@endphp
@include ('urls._sublist')
@endforeach

@endsection
