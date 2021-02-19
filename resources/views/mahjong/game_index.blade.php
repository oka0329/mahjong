<?php
try{
  $dsn = 'mysql:dbname=mahjong;host=localhost;charset=utf8;';
  $user = 'root';
  $password = 'root';
  $dbh = new PDO($dsn,$user,$password);
  $dbh -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $sql = 'select count(*) from `information_schema`.`tables` where `table_schema` = "mahjong"';
  $res = $dbh->query($sql);
  foreach($res->fetchAll() as $value)
  // 全テーブル数からplayers,migrationをのぞいた数をカウント
  $count_games = $value[0] -2;
}
catch(PDOException $e) {
  echo $e->getMessage();
  die();
}
?>
@extends('layouts.layout')

<!-- headここから -->
@section('site_title','麻雀スコア記録アプリ')
@section('stylesheet')
<link rel="stylesheet" href="assets/css/style.css">
@endsection
@section('page_title','ゲーム一覧')

<!-- bodyここから -->
@section('content')
<div class="game_index_section">
  @for($i = 0 ; $i < $count_games ; $i++)
    <?php
    $year = substr($table_name[$i],0,4);
    $month = substr($table_name[$i],4,2);
    $day = substr($table_name[$i],6,2);
    $hour = substr($table_name[$i],8,2);
    $minutes = substr($table_name[$i],10,2);
    $date = $year.'/'.$month.'/'.$day.'/'.$hour.'時';
     ?>
  <div class="game">
    <div class="flex">
        <p class="game_date">{{$date}}</p>
      <?php
      try{
        $dsn = 'mysql:dbname=mahjong;host=localhost;charset=utf8;';
        $user = 'root';
        $password = 'root';
        $dbh = new PDO($dsn,$user,$password);
        $dbh -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = 'select count(*) from information_schema.columns where table_name ='.$table_name[$i];
        $res = $dbh->query($sql);
        // テーブルカラム数からidなどを除き、半荘数を取得
        foreach($res->fetchAll() as $value)
        $count = $value[0] - 5;
      }
      catch(PDOException $e) {
        echo $e->getMessage();
        die();
      }
      ?>
        <p class="game_count">総対局数 {{$count}}</p>
    </div>
  <table class="game_table">
    <tr><th></th><td>最終得点</td><td>対局数</td><td>トップ数</td></tr>
  @foreach($items[$i] as $item)
  <tr>
    <th>{{$item->player__name}}</th>
    <td>{{$item->total}}</td>
    <td>{{$count}}</td>
    <td>{{$item->total}}</td>
  </tr>
  @endforeach
  </table>
  <div class="game_detail_button">
    <form action="/score" method="post">
      @csrf
      <input type="hidden" name="table_name" value="{{$table_name[$i]}}">
      <input type="submit" value="詳細" id="submit_button">
    </form>
  </div>
  </div>
  @endfor
</div>
@endsection
