<table>
  <tr><th>プレーヤー名</th><th>スコア</th></tr>
  @foreach($items as $item)
  <tr><th>{{$item->player_name}}</th><th>{{$item->total_score}}</th></tr>
  @endforeach
</table>
