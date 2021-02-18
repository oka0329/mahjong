
<form action="/score_add_check" method="post">
  @csrf
  <table>
    @foreach($items as $item)
    <tr>
      <td>{{$item->player__name}}:</td>
      <td><input type="text" name="{{$item->id}}score"></td>
    </tr>
    @endforeach
  </table>
  <input type="hidden" name="count" value={{$count}}>
  <input type="hidden" name="table_name" value="{{$table_name}}">
  <input type="submit" value="確認">
</form>
<?php
try{
  $dsn = 'mysql:dbname=mahjong;host=localhost;charset=utf8;';
  $user = 'root';
  $password = 'root';
  $dbh = new PDO($dsn,$user,$password);
  $dbh -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $sql = 'ALTER TABLE `'.$table_name.'` ADD score'.$count.' INT(4)';
  $res = $dbh->query($sql);
  $sql = 'select count(*) from information_schema.columns where table_name = "players"';
  $res = $dbh->query($sql);
  foreach($res->fetchAll() as $value)
    print_r($value[0]);
}
  catch(PDOException $e) {

echo $e->getMessage();
die();
}
 ?>
