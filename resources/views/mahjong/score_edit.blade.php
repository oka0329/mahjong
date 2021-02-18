<form action="/score_edit" method="post">
  @csrf
<table>
  {{$msg}}
<tr><th>ID</th><th>スコア</th></tr>
<br>
@foreach($items as $item)
<tr>
  <td>{{$item->player__name}}</td>
  <td><input type="text" name="{{$item->id}}score" value="{{$item->$column_name}}"></td>
</tr>
@endforeach
<input type="hidden" name="table_name" value="{{$table_name}}">
<input type="hidden" name="column_name" value="{{$column_name}}">
<input type="hidden" name="check" value="check">
<input type="submit" value="修正">
</form>
<form action="/score" method="post">
  @csrf
  <input type="hidden" name="table_name" value="{{$table_name}}">
  <input type="submit" value="戻る">
</form>
