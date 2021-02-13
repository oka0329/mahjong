
<tr>
  <td>{{$player1->id}}{{$player1->player_name}}</td>
  <td>{{$player2->id}}{{$player2->player_name}}</td>
  <td>{{$player3->id}}{{$player3->player_name}}</td>
  <td>{{$player4->id}}{{$player4->player_name}}</td>
</tr>


<form action="/score" method="post">
  @csrf
  <input type="hidden" name="player1_name" value="{{$player1->player_name}}">
  <input type="hidden" name="player2_name" value="{{$player2->player_name}}">
  <input type="hidden" name="player3_name" value="{{$player3->player_name}}">
  <input type="hidden" name="player4_name" value="{{$player4->player_name}}">
  <input type="hidden" name="player1_id" value="{{$player1->id}}">
  <input type="hidden" name="player2_id" value="{{$player2->id}}">
  <input type="hidden" name="player3_id" value="{{$player3->id}}">
  <input type="hidden" name="player4_id" value="{{$player4->id}}">
  <input type="hidden" name="table_name" value="{{$table_name}}">
  <input type="button" onclick="history.back()" value="戻る">

  <input type="submit" value="新規ゲーム">
</form>
<?php
try{
  $dsn = 'mysql:dbname=mahjong;host=localhost;charset=utf8;';
  $user = 'root';
  $password = 'root';
  $dbh = new PDO($dsn,$user,$password);
  $dbh -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $sql = 'CREATE TABLE `'.$table_name.'` (
      id INT(3) AUTO_INCREMENT PRIMARY KEY,
      player_id INT(3),
      player__name VARCHAR(10),
      total INT(4),
      registry_datetime DATETIME
    )';
  $res = $dbh->query($sql);
  $sql = 'INSERT INTO `'.$table_name.'`(player_id,player__name) VALUES ('.$player1->id.',"'.$player1->player_name.'"),('.$player2->id.',"'.$player2->player_name.'"),('.$player3->id.',"'.$player3->player_name.'"),('.$player4->id.',"'.$player4->player_name.'")';
  $res = $dbh->query($sql);
}
  catch(PDOException $e) {

echo $e->getMessage();
die();
}
 ?>
