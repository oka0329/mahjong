

<table>
<tr><th>ID</th><th>score</th></tr>
<br>
@foreach($items as $item)
<tr>
  <td>{{$item->player_id}}</td>
  <td>{{$item->player__name}}</td>
  <td>{{$item->total}}</td>
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
