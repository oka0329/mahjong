<?php
try{
  $dbh = DB::connection()->getPdo();
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
@section('page_title','スコア編集')
<!-- bodyここから -->
@section('content')
<div class="score_edit_section">
<form action="/score_edit" method="post">
  @csrf
  <p class="text">{{$msg}}</p>
<table class="score_edit_table">
@foreach($items as $item)
<tr>
  <td class="name">{{$item->player__name}}</td>
  <td class="score">
    <input type="number" name="{{$item->id}}score" value="{{$item->$column_name}}">
  </td>
</tr>
@endforeach
</table>
<input type="hidden" name="table_name" value="{{$table_name}}">
<input type="hidden" name="column_name" value="{{$column_name}}">
<input type="hidden" name="check" value="check">
<button type="submit" class="button">修正する</button>
</form>
<form action="/score" method="post">
  @csrf
  <input type="hidden" name="table_name" value="{{$table_name}}">
  <button type="submit" class="button">スコア一覧へ戻る</button>
</form>
</div>
@endsection
@section('footer')
