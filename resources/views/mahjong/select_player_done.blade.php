@extends('layouts.layout')

<!-- headここから -->
@section('site_title','麻雀スコア記録アプリ')
@section('stylesheet')
<link rel="stylesheet" href="assets/css/style.css">
@endsection
@section('page_title','プレーヤー選択')

<!-- bodyここから -->
@section('content')
<div class="select_player_done_section">
  <p class="text">プレーヤーを登録しました。</p>
  <form action="/score" method="post">
    @csrf
    <input type="hidden" name="table_name" value="{{$table_name}}">
    <button type="submit" class="button">ゲームを開始する</button>
  </form>
</div>
@endsection

<?php
try{
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
