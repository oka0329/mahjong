<?php
try{
  $dsn = 'mysql:dbname=mahjong;host=localhost;charset=utf8;';
  $user = 'root';
  $password = 'root';
  $dbh = new PDO($dsn,$user,$password);
  $dbh -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $sql = 'select count(*) from `information_schema`.`tables` where `table_schema` = "mahjong"';
  $res = $dbh->query($sql);
  foreach($res->fetchAll() as $value)
  // 全テーブル数からplayers,migrationをのぞいた数をカウント
  $count = $value[0] -2;
}
catch(PDOException $e) {
  echo $e->getMessage();
  die();
}
?>
 @for($i = 0 ; $i < $count ; $i++)
 <table>
   {{$table_name[$i]}}
 <tr><th>ID</th><th>プレーヤー名</th><th>total</th></tr>
 <br>
 @foreach($items[$i] as $item)

 <tr>
   <td>{{$item->player_id}}</td>
   <td>{{$item->player__name}}</td>
   <td>{{$item->total}}</td>
 </tr>
 @endforeach
 <form action="/score" method="post">
   @csrf
   <input type="hidden" name="table_name" value="{{$table_name[$i]}}">
   <input type="submit" value="詳細">
 </form>
 </table>
 <br><br>

 @endfor
