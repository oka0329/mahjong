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
  <script type="text/javascript">
<!--

function check(){

	if(window.confirm('送信してよろしいですか？')){ // 確認ダイアログを表示

		return true; // 「OK」時は送信を実行

	}
	else{ // 「キャンセル」時の処理

		window.alert('キャンセルされました'); // 警告ダイアログを表示
		return false; // 送信を中止

	}

}

// -->
</script>

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
