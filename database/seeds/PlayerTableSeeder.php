<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlayerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
          'player_name' => '岡',
          'total_score' => 100,
        ];
        DB::table('player')->insert($param);
        $param = [
          'player_name' => '鈴木',
          'total_score' => 100,
        ];
        DB::table('player')->insert($param);
        $param = [
          'player_name' => '田中',
          'total_score' => 100,
        ];
        DB::table('player')->insert($param);
        $param = [
          'player_name' => '山田',
          'total_score' => 100,
        ];
        DB::table('player')->insert($param);
        $param = [
          'player_name' => '倉田',
          'total_score' => 100,
        ];
        DB::table('player')->insert($param);
        $param = [
          'player_name' => '能勢',
          'total_score' => 100,
        ];
        DB::table('player')->insert($param);
    }
}
