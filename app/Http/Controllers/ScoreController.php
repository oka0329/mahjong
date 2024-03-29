<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\player;
use App\Score;
use App\Http\Requests\ItemRequest;

class ScoreController extends Controller
{
  public function score(Request $request)
  {
    $table_name = $request->input('table_name');
    $items = DB::table("{$table_name}")->get();
    $param = ['items' => $items,'table_name' => $table_name,];
    return view('mahjong.score',$param);

  }

  public function score_add(Request $request)
  {
    $check = $request->input('check');
    $table_name = $request->input('table_name');
    $count = $request->input('count_add');
    if(isset($check)){
      $count = $request->input('count');
      if($request->input('1score') + $request->input('2score') + $request->input('3score') + $request->input('4score') != 0){
        $msg = 'スコアの合計が0ではありません。';
        $correct = 'false';
      }else{
      for($i = 1 ; $i <= 4 ; $i++){
        $player_score[$i] = $request->input($i.'score');
        $player_total[$i] = DB::table("{$table_name}")->where('id',$i)->value('total');
        $items = DB::table("{$table_name}")->where('id',$i)->update([
          'total' => $player_total[$i] + $player_score[$i],
          'score'.$count => $player_score[$i],
        ]);
    }
    $score1 = $request->input('1score');
    $score2 = $request->input('2score');
    $score3 = $request->input('3score');
    $score4 = $request->input('4score');
    $scores = ['player1' => $score1,
                'player2' => $score2,
                'player3' => $score3,
                'player4' =>$score4];
    rsort($scores);

    $msg = '正しく入力されました。';
    $correct = 'true';
  }
}else{
  $correct = 'false';
  $msg = 'スコアを入力してください。';
}
    $items = DB::table("{$table_name}")->get();
    $param = [
      'items' => $items,
      'table_name' => $table_name,
      'count' => $count,
      'msg' => $msg,
      'check' => $check,
      'correct' => $correct,
    ];
    return view('mahjong.score_add',$param);
  }

  public function score_confirm(Request $request)
    {
      $table_name = $request->input('table_name');
      // テーブルのトータルをplayersテーブルのトータルに足す
      for($i = 1 ; $i <= 4 ; $i++){
        $player_total[$i] = DB::table("{$table_name}")->where('id',$i)->value('total');
        $player_id[$i] = DB::table("{$table_name}")->where('id',$i)->value('player_id');
        $player_old_total[$i] = DB::table('players')->where('id',$player_id[$i])->value('total_score');
        $items = DB::table("players")->where('id',$player_id[$i])->update([
          'total_score' => $player_total[$i] + $player_old_total[$i],
        ]);
      }
      $param = ['items' => $items];
      return redirect('/');

    }

  public function game_index()
  {
    $tables = DB::select('SHOW TABLES');
    // テーブル一覧を配列に代入
    $table_name = array_column($tables, 'Tables_in_mahjong');
    // 末尾2つ（players,migration）のテーブルを消去
    array_pop($table_name);
    array_pop($table_name);
    // テーブル数カウント
    $count_table = count($table_name);
    $items = [];
    // for文の中でそれぞれのテーブルを取り出し配列に代入
    for($i = 0 ; $i < $count_table ; $i++){
      $items[$i] = DB::table("{$table_name[$i]}")->get();
      $items[] = $items[$i];
    }
    $param = [
              'count_table' => $count_table,
              'table_name' => $table_name,
              'items' => $items,
            ];
    return view('mahjong.game_index',$param);
  }

  public function game_index_detail(Request $request)
  {
    $table_name = $request->input('table_name');
    $items = DB::table("{$table_name}")->get();
    $param = ['items' => $items,'table_name' => $table_name];
    return view('mahjong.game_index_detail',$param);
  }

  public function score_update(Request $request)
  {
    $table_name = $request->input('table_name');
    $column_name = $request->input('column_name');
    $check = $request->input('check');
    $msg = '正しいスコアを入力してください。';
    if(isset($check)){
    if($request->input('1score') + $request->input('2score') + $request->input('3score') + $request->input('4score') != 0){
      $msg = 'スコアの合計が0ではありません。';
    }else{
    for($i = 1 ; $i <= 4 ; $i++)
    {
      $player_score[$i] = $request->input($i.'score');
      $player_old_total[$i] = DB::table("{$table_name}")->where('id',$i)->value('total');
      $player_old_score[$i] = DB::table("{$table_name}")->where('id',$i)->value($column_name);
        $items = DB::table("{$table_name}")->where('id',$i)->update([
          "$column_name" => $player_score[$i],
          "total" => $player_old_total[$i] - $player_old_score[$i] + $player_score[$i]
        ]);
      }
      $msg = 'スコア修正完了';
    }
    $items = DB::table("{$table_name}")->get();
  }else{
    $items = DB::table("{$table_name}")->get();
  }
    $param = [
          'items' => $items,
          'table_name' => $table_name,
          'column_name' => $column_name,
          'msg' => $msg,
          ];
    return view('mahjong.score_edit',$param);
  }

  public function game_delete(Request $request)
  {
    $table_name = $request->input('table_name');
    $param = ['table_name' => $table_name];
    return view('mahjong.game_delete',$param);
  }

  public function total()
  {

  }

}
