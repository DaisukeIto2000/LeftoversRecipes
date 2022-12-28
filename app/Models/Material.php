<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Recipe;

class Material extends Model
{
    use HasFactory;
    // モデルに関連付けるテーブル
    protected $table = 'materials';
    // テーブルに関連付ける主キー
    protected $fillable = [
      'id',
      'recipe_id',
      'name',
      'qty',
    ];
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    /**
     * 更新処理
     */
    public function upMaterial($request, $up_material, $text_1, $text_2)
    {
        for($i = 0; $i<count($text_1); $i++){
          $result = $up_material->fill([
            'name' => $request->text_1[$i],
            'qty' => $request->text_2[$i]
          ])->save();;
        }
        return $result;
    }
    /**
     * 削除処理
     */
    public function deleteMaterialById($id)
    {
        Material::where('recipe_id', '=', $id)->delete();
    }
}
?>
