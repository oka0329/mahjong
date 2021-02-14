<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\player;

class PlayerController extends Controller
{
    public function index()
    {
      $count = 2;
      return view('mahjong.index',['count' => $count]);
    }

    public function select_p(Request $request)
    {
      $items = player::all();
      return view('mahjong.select_player',['items' => $items]);
    }

    public function player_add()
    {
      return view('mahjong.player_add');
    }
    public function player_create(Request $request)
    {
      $new_player_name = $request->input('new_player_name');
      $items = DB::table('players')->insert([
        'player_name' => $new_player_name,
        'total_score' => 0,
      ]);
      return redirect('/');
    }

    public function player(Request $request)
    {
      $table_name = $request->input('table_name');
      $id1 = $request->input('id1');
      $player1 = DB::table('players')->where('id',$id1)->first();
      $id2 = $request->input('id2');
      $player2 = DB::table('players')->where('id',$id2)->first();
      $id3 = $request->input('id3');
      $player3 = DB::table('players')->where('id',$id3)->first();
      $id4 = $request->input('id4');
      $player4 = DB::table('players')->where('id',$id4)->first();
      $param = ['table_name' => $table_name,'player1' => $player1,'player2' => $player2,'player3' => $player3,'player4' => $player4];
      return view('mahjong.select_player_check',$param);
    }

    public function rank(Request $request)
    {
      $items = DB::table('players')->orderBy('total_score','desc')->get();
      return view('mahjong.ranking',['items' => $items]);
    }

    public function score_register(Request $request)
    {

      return view('mahjong.score_register');
    }

    public function create_table()
    {
    }
}
