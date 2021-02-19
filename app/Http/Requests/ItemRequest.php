<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
      // $sum0 = function($attribute, $value, $fail) {
      //       // 入力値の取得
      //       $input_data = $this->all();
      //
      //       // 条件に合致しなかったら失敗にする
      //       if ($input_data['1score'] + $input_data['2score'] + $input_data['3score'] + $input_data['4score'] !== 0 )
      //       {
      //           $fail('スコアの合計が0ではありません。'); // エラーメッセージ
      //       }
      //   };
      //   $score_validation = ['required',$sum0];
        return [
            '1score' => 'required',
            '2score' => 'required',
            '3score' => 'required',
            '4score' => 'required',
        ];
    }
    public function messages()
    {
        return [
            '1score.required' => '値を入力して下さい。',
            '1score.required' => '値を入力して下さい。',
            '1score.required' => '値を入力して下さい。',
            '1score.required' => '値を入力して下さい。',
        ];
    }
}
