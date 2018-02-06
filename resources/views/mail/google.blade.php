@extends('layout')

@section('content')
<ol>
  <?php foreach($google->items as $item): ?>
    <li>
      <a href="<?=$item->link?>" target="_blank"><?=$item->title?></a>
      <a href="{{ route('add',['url'=>urlencode($item->link)]) }}" target="_blank">Добавить!</a>
    </li>
  <?php endforeach ?>
</ol>


@endsection
