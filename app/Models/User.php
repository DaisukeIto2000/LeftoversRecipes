<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    private $user;
    private $userToken;
    // モデルに関連付けるテーブル
    protected $table = 'users';
    protected $fillable = [
      'email', 'password'
    ];

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }

    /**
     * ユーザー削除処理
     */
    public function deleteUserById($id)
    {
        return $this->destroy($id);
    }

}
?>
