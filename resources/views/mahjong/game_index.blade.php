

 @for($i = 0 ; $i < 4 ; $i++)
 <table>
   {{$table_name[$i]}}
 <tr><th>ID</th><th>プレーヤー名</th><th>score</th></tr>
 <br>
 @foreach($items[$i] as $item)
 <tr>
   <td>{{$item->player_id}}</td>
   <td>{{$item->player__name}}</td>
   <td>{{$item->total}}</td>
 </tr>
 @endforeach
 <form action="/game_index_detail" method="get">
   @csrf
   <input type="hidden" name="table_name" value="{{$table_name[$i]}}">
   <input type="submit" value="詳細">
 </form>
 </table>
 <br><br>
 @endfor
