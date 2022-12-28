<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Material;
use App\Models\Like;


class Recipe extends Model
{
    use HasFactory;
    // モデルに関連付けるテーブル
    protected $table = 'recipes';
    protected $fillable = [
      'id', 'user_id', 'title', 'process', 'genre', 'image',
    ];
    public function material()
    {
        return $this->hasMany(Material::class);
    }

    /**
     * 更新処理
     */
    public function updateRecipe($request, $up_recipe, $image)
    {
        $result = $up_recipe->fill([
            'title' => $request->title,
            'genre' => $request->genre,
            'process' => $request->process,
            'image' => $image,
        ])->save();
        return $result;
    }
    /**
     * 削除処理
     */
    public function deleteRecipeById($id)
    {
        return $this->destroy($id);
    }

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }
    //後でViewで使う、いいねされているかを判定するメソッド。
    public function isLikedBy($user): bool {
        return Like::where('user_id', $user->id)->where('recipe_id', $this->id)->first() !==null;
    }

}
?>
