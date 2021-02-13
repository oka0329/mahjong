
<table>
<tr><th>プレーヤー</th><th>score</th></tr>
<br>
<tr>
@foreach($items as $item)
  <td>{{$item->player__name}}</td>
@endforeach
</tr>
<tr>
  <td>{{$player1_score}}</td>
  <td>{{$player2_score}}</td>
  <td>{{$player3_score}}</td>
  <td>{{$player4_score}}</td>
</tr>
</table>
<form action="/score" method="post">
  @csrf
  <input type="hidden" name="count" value={{$count}}>
  <input type="hidden" name="table_name" value="{{$table_name}}">
  <input type="submit" value="戻る">

</form>
