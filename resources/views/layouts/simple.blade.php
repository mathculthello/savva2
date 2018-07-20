<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <script src="/js/app.js"></script>
<style>
  body {padding:20px 10px;}
  tr {background:#ddd;}
  .num {font-size:.5em;}
  a {padding:3px;}
</style>


</head>

<body>

<?php
$header="Алексей Владимирович Савватеев";
if($_SERVER["REQUEST_URI"]=="/"): ?>
<h1><?=$header?></h1>
<?php else: ?>
  <h1><a href="/"><?=$header?></a></h1>
<?php endif;?>


  <div class="container">
    <div class="row">
      @yield('content')
    </div>
  </div>

  <!-- DONATION -->
  <iframe src="https://money.yandex.ru/quickpay/button-widget?targets=%D0%9D%D0%B0%20%D1%80%D0%B0%D0%B7%D0%B2%D0%B8%D1%82%D0%B8%D0%B5%20%D0%BF%D1%80%D0%BE%D0%B5%D0%BA%D1%82%D0%B0&default-sum=1000&button-text=14&any-card-payment-type=on&button-size=s&button-color=orange&successURL=http%3A%2F%2Fsavva.egor.cf&quickpay=small&account=410014777389674&" width="200" height="25" frameborder="0" allowtransparency="true" scrolling="no"></iframe>
  <!-- / DONATION -->

  <p>
  Разработчик &mdash; <a href="mailto:egor@kuzmichev.design">Егор Кузьмичев</a> | <a href="https://github.com/aeifn/savva2">Форкни на гитхабе</a>
  </p>
</body>

</html>
