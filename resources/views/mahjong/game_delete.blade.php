 @extends('layouts.layout')

 <!-- headここから -->
 @section('site_title','麻雀スコア記録アプリ')
 @section('stylesheet')
 <link rel="stylesheet" href="assets/css/style.css">
 @endsection
 @section('page_title','ゲーム削除')
 <!-- bodyここから -->
 @section('content')
 <div class="game_delete_section">
   <p class="text">ゲームを削除しました。</p>
   <div class="button">
     <a href="/">トップ</a>
   </div>
</div>
<?php
try{
  $dbh = DB::connection()->getPdo();
  $sql = 'DROP TABLE `'.$table_name.'`';
  $res = $dbh->query($sql);
}
catch(PDOException $e) {
  echo $e->getMessage();
  die();
}
?>
@endsection
