<?php

try{
  $dsn = 'mysql:dbname=mahjong;host=localhost;charset=utf8;';
  $user = 'root';
  $password = 'root';
  $dbh = new PDO($dsn,$user,$password);
  $dbh -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $sql = 'select player__name,total from '.$table_name.'UNION ';
  $res = $dbh->query($sql);
catch(PDOException $e) {
  echo $e->getMessage();
  die();
}




 ?>
