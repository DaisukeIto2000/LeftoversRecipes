<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Recipe;
use App\Models\Material;
use App\Models\User;

class Like extends Model
{
  use HasFactory;
  // モデルに関連付けるテーブル
  protected $table = 'likes';
  protected $fillable = [
    'id', 'user_id', 'recipe_id'
  ];
  public function user()
  {   //usersテーブルとのリレーションを定義するuserメソッド
      return $this->belongsTo(User::class);
  }

  public function recipe()
  {   //reviewsテーブルとのリレーションを定義するreviewメソッド
      return $this->belongsTo(Recipe::class);
  }

}
?>
