@extends('layouts.layout')

<!-- headここから -->
@section('site_title','麻雀スコア記録アプリ')
@section('stylesheet')
<link rel="stylesheet" href="assets/css/style.css">
@endsection
@section('page_title','新規スコア登録')
<!-- bodyここから -->

@section('content')

<div class="score_add_section">
  <p class="text">{{$msg}}</p>
<?php if($correct != $check){?>
<form action="/score_add" method="post">
  @csrf
  <table class="score_add_table">
    @foreach($items as $item)
    <tr>
      <td class="name">{{$item->player__name}}</td>
      <td class="score"><input type="number" name="{{$item->id}}score"></td>
    </tr>
    @endforeach
  </table>
  <input type="hidden" name="count" value={{$count}}>
  <input type="hidden" name="check" value="true">
  <input type="hidden" name="table_name" value="{{$table_name}}">
  <button type="submit" class="button">確認</button>
</form>
<?php }else{?>
<form action="/score" method="post">
  @csrf
  <input type="hidden" name="table_name" value="{{$table_name}}">
  <button type="submit" class="button">スコア一覧へ戻る</button>
</form>
<?php } ?>
<?php
if(isset($check)){
}else{
try{
  $dbh = DB::connection()->getPdo();
  $sql = 'ALTER TABLE `'.$table_name.'` ADD score'.$count.' INT(4)';
  $res = $dbh->query($sql);
}
  catch(PDOException $e) {

echo $e->getMessage();
die();
}
}
 ?>
</div>
@endsection
