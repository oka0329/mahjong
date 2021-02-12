

<form action="/select_player_check" method="post">
  @csrf
  <select name="id1">
    プレーヤー１
  @foreach($items as $item)
    <option value="{{$item->id}}">{{$item->player_name}}</option>
    @endforeach
  </select>
  <select name="id2">
    プレーヤー２
  @foreach($items as $item)
    <option value="{{$item->id}}">{{$item->player_name}}</option>
    @endforeach
  </select>
  <select name="id3">
    プレーヤー３
  @foreach($items as $item)
    <option value="{{$item->id}}">{{$item->player_name}}</option>
    @endforeach
  </select>
  <select name="id4">
    プレーヤー４
  @foreach($items as $item)
    <option value="{{$item->id}}">{{$item->player_name}}</option>
    @endforeach
  </select>
  <?php $table_name = date('YmdH');?>
  <input type="hidden" name="table_name" value="{{$table_name}}">
  <input type="button" onclick="history.back()" value="戻る">
  <input type="submit" value="送信">
</form>
