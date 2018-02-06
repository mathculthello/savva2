@extends('layout')

@section('content')

<h1>Ресурсы Алексея Савватеева</h1>

@foreach($sections as $key=>$section)
<h2>{{$section}}</h2>
@php
$urls = $urls_array[$key]
@endphp
@include ('index.sublist')
@endforeach

@endsection
