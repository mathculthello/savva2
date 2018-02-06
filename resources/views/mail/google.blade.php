@extends('layout')

@section('content')
Что нового в гугле по запросу Алексей+Савватеев за неделю!
<br/>
Это автоматическая рассылка с сайта {{env('APP_URL')}}.
<br/>
Нажми "Добавить!", чтобы пополнить базу данных.

<ol>
  <?php foreach($google->items as $item): ?>
    <li>
      <a href="<?=$item->link?>" target="_blank"><?=$item->title?></a>
      <a href="{{ route('add',['url'=>urlencode($item->link)]) }}" target="_blank">Добавить!</a>
    </li>
  <?php endforeach ?>
</ol>

@endsection
