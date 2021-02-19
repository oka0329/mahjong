@extends('layouts.layout')

<!-- headここから -->
@section('site_title','麻雀スコア記録アプリ')
@section('stylesheet')
<link rel="stylesheet" href="assets/css/style.css">
@endsection
@section('page_title','プレーヤーランキング')

<!-- bodyここから -->
@section('content')
<div class="ranking_section">
  <table class="ranking_table">
    <tr><th class="head">順位</th><th class="head">プレーヤー名</th><th class="head">スコア</th></tr>
    <?php $counter = 1; ?>
    @foreach($items as $item)
    <tr><td class="row{{$counter}} row">{{$counter}}</td><td class="row{{$counter}} row">{{$item->player_name}}</td><td class="row{{$counter}} row">{{$item->total_score}}</td></tr>
    <?php $counter = $counter+1; ?>
    @endforeach
  </table>
  <div class="button">
    <a href="/">トップ</a>
  </div>
</div>
@endsection
