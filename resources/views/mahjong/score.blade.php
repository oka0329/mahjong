<?php
try{
  $dsn = 'mysql:dbname=mahjong;host=localhost;charset=utf8;';
  $user = 'root';
  $password = 'root';
  $dbh = new PDO($dsn,$user,$password);
  $dbh -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $sql = 'select count(*) from information_schema.columns where table_name ='.$table_name;
  $res = $dbh->query($sql);
  foreach($res->fetchAll() as $value)
  $count = $value[0] - 5;
}
catch(PDOException $e) {
  echo $e->getMessage();
  die();
}
?>

<table>
<tr><th>ID</th><th>total</th></tr>
<br>
@foreach($items as $item)
<tr>
  <td>{{$item->player_id}}</td>
  <td>{{$item->player__name}}</td>
  <td>{{$item->total}}</td>
  @for($i = 1 ; $i < $count ; $i++)
  <?php $property = "score".$i;?>
  <td>{{$item->$property}}</td>
  @endfor
</tr>
@endforeach
</table>

<form action="/score_add" method="post">
  @csrf
  <input type="hidden" name="count" value="{{$count}}">
  <input type="hidden" name="table_name" value="{{$table_name}}">
  <input type="submit" value="新規ゲーム">
</form>
<form action="/score_confirm" method="post">
  @csrf
  <input type="hidden" name="table_name" value="{{$table_name}}">
  <input type="submit" value="スコア確定">

</form>
