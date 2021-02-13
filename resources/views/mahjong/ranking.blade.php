<table>
  <tr><th>プレーヤー名</th><th>スコア</th><th>平均着順</th></tr>
  @foreach($items as $item)
  <tr><th>{{$item->player_name}}</th><th>{{$item->total_score}}</th>{{$item->average_rank}}</tr>
  @endforeach
</table>
