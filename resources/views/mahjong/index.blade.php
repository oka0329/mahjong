@extends('layouts.layout')

<!-- headここから -->
@section('site_title','麻雀スコア記録アプリ')
@section('stylesheet')
<link rel="stylesheet" href="assets/css/style.css">
@endsection
@section('page_title','トップ')
<!-- bodyここから -->
@section('content')
<div class="top_section">
<ul class="menu_list">
  <li class="menu_list_item">
    <a href="/select_player">プレーヤー選択</a>
  </li>
  <li class="menu_list_item">
    <a href="/ranking">ランキング</a>
  </li>
  <li class="menu_list_item">
    <a href="/player_add">プレーヤー追加</a>
  </li>
  <li class="menu_list_item">
    <a href="/game_index">ゲーム一覧</a>
  </li>
</ul>
</div>
@endsection
