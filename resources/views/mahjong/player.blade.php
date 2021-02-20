@extends('layouts.layout')

<!-- headここから -->
@section('site_title','麻雀スコア記録アプリ')
@section('stylesheet')
<link rel="stylesheet" href="assets/css/style.css">
@endsection
@section('page_title','プレーヤー')
<!-- bodyここから -->
@section('content')
<div class="player_section">
  <table class="player_table">
  @foreach($items as $item)
  <tr>
    <td class="head">{{$item->player_name}}</td>
    <td class="row">
      <form action="/player_edit" method="post">
        @csrf
        <input type="hidden" name="player_id" value="{{$item->id}}">
        <button type="submit" class="button">編集する</button>
      </form>
    </td>
    <td class="row">
      <form action="/player_delete" method="post" onSubmit="return check()">
        @csrf
        <input type="hidden" name="player_id" value="{{$item->id}}">
        <button type="submit" class="button">削除する</button>
      </form>
    </td>
  </tr>
  @endforeach
  </table>
<div class="button">
  <a href="/player_add">プレーヤー追加</a>
</div>
</div>
@endsection
