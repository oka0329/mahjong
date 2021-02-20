@extends('layouts.layout')

<!-- headここから -->
@section('site_title','麻雀スコア記録アプリ')
@section('stylesheet')
<link rel="stylesheet" href="assets/css/style.css">
@endsection
@section('page_title','プレーヤー選択')

<!-- bodyここから -->
@section('content')
<div class="select_player_section">
  <form action="/select_player_check" method="post">
    @csrf
    <select name="id1" class="name">
      プレーヤー１
    @foreach($items as $item)
      <option value="{{$item->id}}">{{$item->player_name}}</option>
      @endforeach
    </select>
    <select name="id2" class="name">
      プレーヤー２
    @foreach($items as $item)
      <option value="{{$item->id}}">{{$item->player_name}}</option>
      @endforeach
    </select>
    <select name="id3" class="name">
      プレーヤー３
    @foreach($items as $item)
      <option value="{{$item->id}}">{{$item->player_name}}</option>
      @endforeach
    </select>
    <select name="id4" class="name">
      プレーヤー４
    @foreach($items as $item)
      <option value="{{$item->id}}">{{$item->player_name}}</option>
      @endforeach
    </select>
    <?php $table_name = date('YmdH');?>
    <input type="hidden" name="table_name" value="{{$table_name}}">
      <button type="submit" class="button">確認</button>
      <button type="button" onclick="history.back()" class="button">戻る</button>
  </form>
</div>
@endsection
