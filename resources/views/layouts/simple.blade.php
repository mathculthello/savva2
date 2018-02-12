<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  <script src="/js/app.js"></script>
<style>
  tr {background:#ddd;}
  .num {font-size:.5em;}
</style>


</head>

<body>
  <div class="container">
    <div class="row">
      @yield('content')
    </div>
  </div>
</body>

</html>
