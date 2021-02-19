@extends('layouts.layout')

<!-- headここから -->
@section('site_title','麻雀スコア記録アプリ')
@section('stylesheet')
<link rel="stylesheet" href="assets/css/style.css">
@endsection
@section('page_title','プレーヤー登録')
<!-- bodyここから -->
@section('content')
<div class="player_add_section">
  <form action="/player_add" method="post">
    @csrf
    <p class="text">登録するプレーヤー名を入力してください。</p>
    <input type="text" name="new_player_name" class="name"><br><br>
    <input type="submit" value="登録" id="submit_button">
  </form>
</div>
@endsection
