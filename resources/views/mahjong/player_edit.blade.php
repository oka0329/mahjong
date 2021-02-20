@extends('layouts.layout')

<!-- headここから -->
@section('site_title','麻雀スコア記録アプリ')
@section('stylesheet')
<link rel="stylesheet" href="assets/css/style.css">
@endsection
@section('page_title','プレーヤー編集')
<!-- bodyここから -->
@section('content')
<div class="player_edit_section">
  <p class="text">{{$msg}}</p>
  <form action="/player_edit" method="post">
    @csrf
    <input type="text" name="new_player_name" value="{{$item->player_name}}">
    <input type="hidden" name="player_id" value="{{$item->id}}">
    <input type="hidden" name="check" value="check">
    <button type="submit" class="button">変更する</button>
  </form>
<div class="button">
  <a href="/">トップ</a>
</div>
</div>
@endsection
