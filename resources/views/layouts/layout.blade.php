<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('site_title')</title>
  <link rel="stylesheet" href="assets/css/reset.css">
  <link rel="stylesheet" href="assets/css/common.css">
  <link rel="stylesheet" href="assets/css/style.css">
  @yield('stylesheet')
</head>
<body>
  <div class="mahjong_contents">
    <div class="l_header">
      <div class="header_content">
        <div class="header_logo">

        </div>
        <div class="header_title">
          <h1>@yield('page_title')</h1>
        </div>
        @yield('header')
      </div>
    </div>
    <div class="l_content">
      @yield('content')
    </div>
    <div class="l_footer">
      @yield('footer')
      ©copyright okaken
    </div>
  </div>
<script type="text/javascript" src="function.js"></script>
</body>
</html>
