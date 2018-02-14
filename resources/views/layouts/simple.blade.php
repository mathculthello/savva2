<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <script src="/js/app.js"></script>
<style>
  tr {background:#ddd;}
  .num {font-size:.5em;}
  a {padding:3px;}
</style>


</head>

<body>

<a href="https://github.com/aeifn/savva2">
  <img style="position: absolute; top: 0; right: 0; border: 0;"
  src="https://camo.githubusercontent.com/365986a132ccd6a44c23a9169022c0b5c890c387/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f7265645f6161303030302e706e67"
  alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png">
</a>


  <div class="container">
    <div class="row">
      <h1><a href="/">{{ config('app.name') }}</a></h1>

      @yield('content')
    </div>
  </div>
</body>

</html>
