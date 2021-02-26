<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\player;

class PlayerController extends Controller
{

  // トップ画面表示
    public function index()
    {
      return view('mahjong.index');
    }
  // プレーヤー選択
    public function select_player()
    {
      $items = DB::table('players')->get();
      return view('mahjong.select_player',['items' => $items]);
    }
  // プレーヤー確認
    public function player_check(Request $request)
    {
      $table_name = $request->input('table_name');
      $param = ['table_name' => $table_name,];
      $msg = '参加するプレーヤーを選択してください。';
      for($i = 1 ; $i <= 4 ; $i++){
      $id[$i] = $request->input('id'.$i);
      $list[] = $id[$i];
        }
      $value_count = array_count_values($list);
      $max = max($value_count);
      if($max == 1){
    for($i = 1 ; $i <= 4 ; $i++){
      $player[$i] =  DB::table('players')->where('id',$id[$i])->first();
      $param['player'.$i] = $player[$i];
      $msg = 'このメンバーでよろしいですか？';
      $check = 'OK';
    }
  }else{
    $msg = 'プレーヤーが重複しています。';
    $check = 'NO';
  }
  $param['msg'] = $msg;
  $param['check'] = $check;
      return view('mahjong.select_player_check',$param);
    }

  public function player_done(Request $request)
  {
    $table_name = $request->input('table_name');
    for($i = 1 ; $i <= 4 ; $i++){
      $id[$i] = $request->input('id'.$i);
      $player[$i] =  DB::table('players')->where('id',$id[$i])->first();
      $param['player'.$i] = $player[$i];
    }
    $param['table_name'] = $table_name;
      return view('mahjong.select_player_done',$param);
    }


  // プレーヤー追加
    public function player_add()
    {
      return view('mahjong.player_add');
    }
  // プレーヤー追加
    public function player_create(Request $request)
    {
      $new_player_name = $request->input('new_player_name');
      $items = DB::table('players')->insert([
        'player_name' => $new_player_name,
        'total_score' => 0,
      ]);
      return redirect('/');
    }
  // プレーヤーページ
  public function player()
  {
    $items = DB::table('players')->get();
    $param = ['items' => $items];
    return view('mahjong.player',$param);
  }
  // プレーヤー編集
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
  // プレーヤー削除
  public function player_delete(Request $request)
  {
    $player_id = $request->input('player_id');
    $item = DB::table('players')->where('id',$player_id)->delete();
    return redirect('/player');
  }
  // ランキングページ
    public function rank(Request $request)
    {
      $items = DB::table('players')->orderBy('total_score','desc')->get();
      return view('mahjong.ranking',['items' => $items]);
    }
}
