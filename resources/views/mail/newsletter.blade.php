@extends('urls.layout')

@section('content')

<h2>Пополнения за неделю!</h2>

<p>
Автоматическая рассылка с сайта {{env('APP_URL')}}.
</p>

<?php $urls=$items; ?>

@include('urls._sublist')

<br/>

Есть идеи &mdash; reply-to-all.

@endsection
