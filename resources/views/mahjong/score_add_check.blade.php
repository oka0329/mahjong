
{{$msg}}
<form action="/score" method="post">
  @csrf
  <input type="hidden" name="count" value={{$count}}>
  <input type="hidden" name="table_name" value="{{$table_name}}">
  <input type="submit" value="戻る">

</form>
