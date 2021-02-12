

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
