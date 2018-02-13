@extends('urls.layout')

@section('content')

<h2>Пополнения за неделю!</h2>
<p>
Это автоматическая рассылка с сайта {{env('APP_URL')}}.
</p>
<p>
Ресурсы, автоматически поступившие с гугла, помечены в последнем столбце.
</p>

<?php $urls=$items; ?>

@include('urls._sublist')

<br/>


Если есть идеи, reply-to-all.


@endsection
