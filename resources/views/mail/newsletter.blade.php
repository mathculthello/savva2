@extends('layout')

@section('content')

<h1>Пополнения в базе данных за неделю!</h1>
<p>
Это автоматическая рассылка с сайта {{env('APP_URL')}}.
</p>
<p>
Ресурсы, автоматически поступившие с гугла, помечены в последнем столбце.
</p>

<?php $urls=$items; ?>

@include('index.sublist')

<br/>


Если есть идеи, reply-to-all.


@endsection
