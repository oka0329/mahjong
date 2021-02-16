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
    $count = $request->input('count');
    if(isset($count)){
      $count = $count + 1;
    }else{
      $count = 1;
    }
    $param = ['items' => $items,'table_name' => $table_name,'count' => $count];
    return view('mahjong.score',$param);

  }

  public function score_add(Request $request)
  {
    $table_name = $request->input('table_name');
    $items = DB::table("{$table_name}")->get();
    $count = $request->input('count');
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
    $table_name = array_column($tables, 'Tables_in_mahjong');
    $items0 = DB::table("{$table_name[0]}")->get();
    $items1 = DB::table("{$table_name[1]}")->get();
    $items2 = DB::table("{$table_name[2]}")->get();
    $items3 = DB::table("{$table_name[3]}")->get();
    $items = array($items0,$items1,$items2,$items3);
    $param = ['tables' => $tables,
              'table_name' => $table_name,
              'items0' => $items0,
              'items1' => $items1,
              'items2' => $items2,
              'items3' => $items3,
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

}
