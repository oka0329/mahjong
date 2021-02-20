<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\player;

class PlayerController extends Controller
{
    public function index()
    {
      return view('mahjong.index');
    }

    public function select_player()
    {
      $items = DB::table('players')->get();
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

  public function player()
  {
    $items = DB::table('players')->get();
    $param = ['items' => $items];
    return view('mahjong.player',$param);
  }

  public function player_edit(Request $request)
  {
    $check = $request->input('check');
    $player_id = $request->input('player_id');
    $msg = '変更する名前を入力してください。';
    if(isset($check)){
      $new_player_name = $request->input('new_player_name');
      $item = DB::table('players')->where('id',$player_id)->update([
        'player_name' => $new_player_name,
      ]);
      $msg = 'プレーヤー名を変更しました。';
    }
    $item = DB::table('players')->where('id',$player_id)->first();
    $param = [
      'item' => $item,
      'msg' => $msg,
      'player_id' => $player_id,
    ];
    return view('mahjong.player_edit',$param);
  }

  public function player_delete(Request $request)
  {
    $player_id = $request->input('player_id');
    $item = DB::table('players')->where('id',$player_id)->delete();
    return redirect('/player');
  }

    public function player_check(Request $request)
    {
      $table_name = $request->input('table_name');
      $param = ['table_name' => $table_name,];
      for($i = 1 ; $i <= 4 ; $i++){
      $id{$i} = $request->input('id'.$i);
      $player{$i} =  DB::table('players')->where('id',$id{$i})->first();
      $param['player'.$i] = $player{$i};
    }
      return view('mahjong.select_player_check',$param);
    }

    public function rank(Request $request)
    {
      $items = DB::table('players')->orderBy('total_score','desc')->get();
      return view('mahjong.ranking',['items' => $items]);
    }
}
