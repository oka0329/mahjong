<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\player;
use App\Score;

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
    $table_name = $request->input('table_name');
    $items = DB::table("{$table_name}")->get();
    $count = $request->input('count_add');
    $param = [
      'items' => $items,
      'table_name' => $table_name,
      'count' => $count
    ];
    return view('mahjong.score_add',$param);
  }

  public function score_add_check(Request $request)
  {
    $table_name = $request->input('table_name');
    $player1_score = $request->input('1score');
    $player2_score = $request->input('2score');
    $player3_score = $request->input('3score');
    $player4_score = $request->input('4score');
    $count = $request->input('count');
    $items = DB::table("{$table_name}")->get();
    $param = [
      'items' => $items,
      'table_name' => $table_name,
      'player1_score' => $player1_score,
      'player2_score' => $player2_score,
      'player3_score' => $player3_score,
      'player4_score' => $player4_score,
      'count' => $count
    ];
    $player1_total = DB::table("{$table_name}")->where('id',1)->value('total');
    $player2_total = DB::table("{$table_name}")->where('id',2)->value('total');
    $player3_total = DB::table("{$table_name}")->where('id',3)->value('total');
    $player4_total = DB::table("{$table_name}")->where('id',4)->value('total');
    $items = DB::table("{$table_name}")->where('id',1)->update([
      'total' => $player1_total + $player1_score,
      'score'.$count => $player1_score,
    ]);
    $items = DB::table("{$table_name}")->where('id',2)->update([
      'total' => $player2_total + $player2_score,
      'score'.$count => $player2_score,
    ]);
    $items = DB::table("{$table_name}")->where('id',3)->update([
      'total' => $player3_total + $player3_score,
      'score'.$count => $player3_score,
    ]);
    $items = DB::table("{$table_name}")->where('id',4)->update([
      'total' => $player4_total + $player4_score,
      'score'.$count => $player4_score,
    ]);
    return view('mahjong.score_add_check',$param);
  }

  public function score_confirm(Request $request)
    {
      $table_name = $request->input('table_name');
      $player1_total = DB::table("{$table_name}")->where('id',1)->value('total');
      $player2_total = DB::table("{$table_name}")->where('id',2)->value('total');
      $player3_total = DB::table("{$table_name}")->where('id',3)->value('total');
      $player4_total = DB::table("{$table_name}")->where('id',4)->value('total');
      $player1_id = DB::table("{$table_name}")->where('id',1)->value('player_id');
      $player2_id = DB::table("{$table_name}")->where('id',2)->value('player_id');
      $player3_id = DB::table("{$table_name}")->where('id',3)->value('player_id');
      $player4_id = DB::table("{$table_name}")->where('id',4)->value('player_id');
      $player1_old_total = DB::table('players')->where('id',$player1_id)->value('total_score');
      $player2_old_total = DB::table('players')->where('id',$player2_id)->value('total_score');
      $player3_old_total = DB::table('players')->where('id',$player3_id)->value('total_score');
      $player4_old_total = DB::table('players')->where('id',$player4_id)->value('total_score');
      $items = DB::table("players")->where('id',$player1_id)->update([
        'total_score' => $player1_total + $player1_old_total,
      ]);
      $items = DB::table("players")->where('id',$player2_id)->update([
        'total_score' => $player2_total + $player2_old_total,
      ]);
      $items = DB::table("players")->where('id',$player3_id)->update([
        'total_score' => $player3_total + $player3_old_total,
      ]);
      $items = DB::table("players")->where('id',$player4_id)->update([
        'total_score' => $player4_total + $player4_old_total,
      ]);
      $param = ['items' => $items];
      return view('mahjong.score_confirm',$param);

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
      $items{$i} = DB::table("{$table_name[$i]}")->get();
      $items[] = $items{$i};
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
    $msg = '入力してください。';
    if(isset($check)){
    for($i = 1 ; $i <= 4 ; $i++)
    {
      $player_score{$i} = $request->input($i.'score');
        $items = DB::table("{$table_name}")->where('id',$i)->update([
          "$column_name" => $player_score{$i},
        ]);
      }
      $msg = '修正完了';
    }
    $items = DB::table("{$table_name}")->get();
    $param = [
          'items' => $items,
          'table_name' => $table_name,
          'column_name' => $column_name,
          'msg' => $msg,
          ];
    return view('mahjong.score_edit',$param);


  }
  public function score_edit(Request $request)
  {
    $table_name = $request->input('table_name');
    $column_name = $request->input('column_name');
    $items = DB::table("{$table_name}")->get();
    $param = [
          'items' => $items,
          'table_name' => $table_name,
          'column_name' => $column_name
          ];
    return view('mahjong.score_edit',$param);
  }

}
