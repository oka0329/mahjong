<?php
try{
  $dsn = 'mysql:dbname=mahjong;host=localhost;charset=utf8;';
  $user = 'root';
  $password = 'root';
  $dbh = new PDO($dsn,$user,$password);
  $dbh -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $sql = 'select count(*) from information_schema.columns where table_name ='.$table_name;
  $res = $dbh->query($sql);
  foreach($res->fetchAll() as $value)
  $count = $value[0] - 5;
  $count_add = $count +1;
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
@section('page_title','スコア')

@section('header')
<div class="new_game">
  <form action="/score_add" method="post">
    @csrf
    <input type="hidden" name="count_add" value="{{$count_add}}">
    <input type="hidden" name="table_name" value="{{$table_name}}">
    <button type="submit" id="new_button">＋</button>
  </form>
</div>
<div class="score_confirm">
  <form action="/score_confirm" method="post">
    @csrf
    <input type="hidden" name="table_name" value="{{$table_name}}">
    <button type="submit" id="confirm_button">保存</button>
  </form>
</div>
@endsection
<!-- bodyここから -->
@section('content')
<div class="score_section">
<table class="score_table">
  <tr>
@foreach($items as $item)
  <th class="head">{{$item->player__name}}</th>
@endforeach
<th class="head"></th>
</tr>
<tr>
  @foreach($items as $item)
  <td class="row_total">{{$item->total}}</td>
  @endforeach
  <td></td>
</tr>
</table>
<table class="score_table">
  @for($i = 1 ; $i <= $count ; $i++)
  <?php $column_name = "score".$i;?>
  <tr>
    @foreach($items as $item)
  <td class="row_score">{{$item->$column_name}}</td>
    @endforeach
    <td class="row_form">
      <form action="/score_edit" method="post">
        @csrf
        <input type="hidden" name="table_name" value="{{$table_name}}">
        <input type="hidden" name="column_name" value="{{$column_name}}">
        <button type="submit" class="submit_button">＞</button>
      </form>
    </td>
</tr>
  @endfor
</table>
@endsection
</div>
