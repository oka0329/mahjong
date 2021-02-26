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
  <p class="message">{{$msg}}</p>
  <?php if($check == 'OK'){ ?>
    <p class="text">{{$player1->player_name}}</p>
    <p class="text">{{$player2->player_name}}</p>
    <p class="text">{{$player3->player_name}}</p>
    <p class="text">{{$player4->player_name}}</p>
  <?php }?>
  <form action="/select_player_done" method="post">
    @csrf
    <?php if($check == 'OK'){ ?>
    <input type="hidden" name="table_name" value="{{$table_name}}">
    <input type="hidden" name="id1" value="{{$player1->id}}">
    <input type="hidden" name="id2" value="{{$player2->id}}">
    <input type="hidden" name="id3" value="{{$player3->id}}">
    <input type="hidden" name="id4" value="{{$player4->id}}">
    <button type="submit" class="button">新規ゲームを開始する</button>
    <?php }?>
    <button type="button" onclick="history.back()" class="button">戻る</button>
  </form>
</div>
@endsection
