@extends('urls.layout')

@section('content')

<h2>Пополнения за неделю</h2>

<?php $urls=$items; ?>

@include('urls._sublist')

<br/>

@endsection
