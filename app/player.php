<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class player extends Model
{
  protected $fillable = [
     'player_name','total_score'
 ];
}
