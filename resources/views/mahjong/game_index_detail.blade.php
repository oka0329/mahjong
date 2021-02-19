
<?php
try{
  $dsn = 'mysql:dbname=mahjong;host=localhost;charset=utf8;';
  $user = 'root';
  $password = 'root';
  $dbh = new PDO($dsn,$user,$password);
  $dbh -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $sql = 'select count(*) from information_schema.columns where table_name ='.$table_name;
  $res = $dbh->query($sql);
  // テーブルカラム数からidなどを除き、半荘数を取得
  foreach($res->fetchAll() as $value)
  $countt = $value[0] - 5;
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

{{$table_name}}
<table>
<tr><th>ID</th><th>total</th></tr>
<br>
@foreach($items as $item)
<tr>
  <td>{{$item->player_id}}</td>
  <td>{{$item->player__name}}</td>
  <td>{{$item->total}}</td>
  @for($i = 1 ; $i < $countt ; $i++)
  <?php $property = "score".$i;?>
  <td>{{$item->$property}}</td>
  @endfor
</tr>
@endforeach
</table>
<form action="/score" method="post">
  @csrf
  <input type="hidden" name="table_name" value="{{$table_name}}">
  <input type="submit" value="スコアへ">
</form>
@endsection