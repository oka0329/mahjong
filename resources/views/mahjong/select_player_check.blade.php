@extends('layouts.layout')

<!-- headここから -->
@section('site_title','麻雀スコア記録アプリ')
@section('stylesheet')
<link rel="stylesheet" href="assets/css/style.css">
@endsection
@section('page_title','プレーヤー選択')

<!-- bodyここから -->
@section('content')
<div class="select_player_check_section">
    <p class="text">{{$player1->player_name}}</p>
    <p class="text">{{$player2->player_name}}</p>
    <p class="text">{{$player3->player_name}}</p>
    <p class="text">{{$player4->player_name}}</p>
  <form action="/score" method="post">
    @csrf
    <input type="hidden" name="table_name" value="{{$table_name}}">
    <button type="submit" class="button">新規ゲームを開始する</button>
    <button type="button" onclick="history.back()" class="button">戻る</button>
  </form>
  <?php
  try{
    // ローカル
    // $dsn = 'mysql:dbname=mahjong;host=localhost;charset=utf8;';
    // $user = 'root';
    // $password = 'root';
    // 本番
    // $dsn = 'mysql:dbname=LAA1200931-sub;host=mysql148.phy.lolipop.lan;charset=utf8;';
    // $user = 'LAA1200931';
    // $password = 'begijnhof';
    // $dbh = new PDO($dsn,$user,$password);
    // $dbh -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $dbh = DB::connection()->getPdo();
    $sql = 'CREATE TABLE `'.$table_name.'` (
        id INT(3) AUTO_INCREMENT PRIMARY KEY,
        player_id INT(3),
        player__name VARCHAR(10),
        total INT(4),
        registry_datetime DATETIME
      )';
    $res = $dbh->query($sql);
    $sql = 'INSERT INTO `'.$table_name.'`(player_id,player__name) VALUES ('.$player1->id.',"'.$player1->player_name.'"),('.$player2->id.',"'.$player2->player_name.'"),('.$player3->id.',"'.$player3->player_name.'"),('.$player4->id.',"'.$player4->player_name.'")';
    $res = $dbh->query($sql);
  }
    catch(PDOException $e) {
  echo $e->getMessage();
  die();
  }
   ?>
</div>
@endsection
