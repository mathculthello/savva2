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

<!-- GITHUB FORKME -->
<a href="https://github.com/aeifn/savva2">
  <img style="position: absolute; top: 0; right: 0; border: 0;"
  src="https://camo.githubusercontent.com/365986a132ccd6a44c23a9169022c0b5c890c387/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f7265645f6161303030302e706e67"
  alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png">
</a>
<!-- / GITHUB FORKME -->

<!-- DONATION -->
<iframe src="https://money.yandex.ru/quickpay/button-widget?targets=%D0%9D%D0%B0%20%D1%80%D0%B0%D0%B7%D0%B2%D0%B8%D1%82%D0%B8%D0%B5%20%D0%BF%D1%80%D0%BE%D0%B5%D0%BA%D1%82%D0%B0&default-sum=1000&button-text=14&any-card-payment-type=on&button-size=s&button-color=orange&successURL=http%3A%2F%2Fsavva.egor.cf&quickpay=small&account=410014777389674&" width="200" height="25" frameborder="0" allowtransparency="true" scrolling="no"></iframe>
<!-- / DONATION -->

  <div class="container">
    <div class="row">
      <h1><a href="/">{{ config('app.name') }}</a></h1>

      <p>
        Всего записей: {{ $count }}
      </p>

      @yield('content')
    </div>
  </div>

<hr>

  <p>
  Разработчик &mdash; <a href="mailto:egor@kuzmichev.design">Егор Кузьмичев</a>
  </p>
</body>

</html>
