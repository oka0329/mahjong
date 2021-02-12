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
    // $table_name = $request->input('table_name');
    // $items = DB::table(`'.$table_name.'`)->get();
    // $id1 = $request->input('id1');
    // $player1 = DB::table(`'.$table_name.'`)->where('player_id','=',$id1)->first();
    // $id2 = $request->input('id2');
    // $player2 = DB::table(`'.$table_name.'`)->where('player_id','=',$id2)->first();
    // $id3 = $request->input('id3');
    // $player3 = DB::table(`'.$table_name.'`)->where('player_id','=',$id3)->first();
    // $id4 = $request->input('id4');
    // $player4 = DB::table(`'.$table_name.'`)->where('player_id','=',$id4)->first();
    // $param = ['table_name' => $table_name,'player1' => $player1,'player2' => $player2,'player3' => $player3,'player4' => $player4];
    // return view('mahjong.score',$param);
    $table_name = $request->input('table_name');
    $items = DB::table("{$table_name}")->get();
    return view('mahjong.score',['items' => $items]);

  }
  
}
