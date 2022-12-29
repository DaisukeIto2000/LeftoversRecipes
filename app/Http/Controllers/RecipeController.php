<?php
namespace App\Http\Controllers;

use Illuminate\Validation\Rules\Password;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Recipe;
use App\Models\Material;
use App\Models\User;
use App\Models\Like;



class RecipeController extends Controller
{
    public function __construct(){
      new Recipe;
      new Material;
      $this->recipe = new Recipe();
      $this->material = new Material();
      $this->user = new User();

    }
    public function index(Request $request)
    {
        return view('recipes.index');
    }

    public function search_result(Request $request)
    {
      $search = $request->search;
      $query = Recipe::query();
      $query->where('recipes.title', '=', $search);
      $items = $query->get();

      return view('recipes.search_result',compact('items'));
    }

    public function login(){
        return view('recipes.login');
    }

    public function signup(){
        return view('recipes.signup');
    }

    public function signup_complete(Request $request)
    {
        $request->validate([
          'email'=>['required'],
          'password'=>['required', 'confirmed','regex:/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z\-]{8,24}$/'],
          'password_confirmation'=>['required']
        ],
        [
          'email.required' => '*メールアドレスを入力してください',
          'password.required' => '*パスワードを入力してください',
          'password.regex' => '*半角英数字最低１つずつ含めた8文字以上24文字以内で入力してください',
          'password_confirmation.required' => '*確認用パスワードを入力してください',
          'password.confirmed' => '*確認用パスワードが一致しません'
        ]);
        $hashpass = Hash::make($request->password);
        $exCheck = DB::table('users')->where('email', $request->email)->exists();
        if(!($exCheck)){
          User::create([
            'email' => $request->email,
            'password' => $hashpass
          ]);
        }else{
          return back()->withInput()->withErrors([$request->email => 'Eメールアドレスはすでに使用されています']);
        }

        return view('recipes.signup_complete');
    }

    public function userLogin(Request $request)
    {
      $credentials = $request->validate([
        'email'=>['required'],
        'password'=>['required'],
      ],
      [
        'email.required' => '*メールアドレスを入力してください',
        'password.required' => '*パスワードを入力してください',
        'password.regex' => '*半角英数字最低１つずつ含めた8文字以上24文字以内で入力してください',
      ]);

      if (Auth::attempt($credentials, true)) {

        return redirect()->route('mypage');
      }
      return back()->withErrors([
          'email' => '*間違っています',
      ]);
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('login_page');
    }

    public function mypage(Request $request)
    {
        $user_id = Auth::id();
        $query = Recipe::query();
        if(!empty($user_id)) {
            $query->where('user_id', $user_id);
        }
        $recipe_items = $query->get();

        //いいね一覧
        $likes_items = DB::table('recipes')
                    ->join('likes', 'recipes.id', '=', 'likes.recipe_id')
                    ->where('likes.user_id', $user_id)
                    ->get();

                    if(!empty($likes_items[0])){
                      $query = Recipe::query()->withCount('likes');
                      $query->where(function($query) use ($likes_items){
                        foreach($likes_items as $value){
                          $query->orWhere('id', $value->recipe_id)->orderBy('id');
                        }
                      });
                      $likes_items = $query->get();
                    }

        return view('recipes.mypage', compact('user_id', 'recipe_items', 'likes_items'));
    }

    public function detail(Request $request)
    {
        $post_items = \DB::table('recipes')
            ->select('recipes.id', 'title', 'image', 'genre', 'process', 'name', 'qty')
            ->join('materials', 'recipes.id', '=', 'materials.recipe_id')
            ->where('recipes.id', $request->recipe_id)
            ->get();
        return view('recipes.detail', compact('post_items'));
    }

    public function post_screen(Request $request)
    {
        return view('recipes.post_screen');
    }

    public function complete(Request $request)
    {

        $request->validate([
          'recipe_name'=>['required', 'max:50'],
          'process'=>['required', 'max:500'],
          'recipe_file'=>['required'],
        ],
        [
          'recipe_name.required' => '*レシピ名は必須入力です。',
          'recipe_name.max'=> '*レシピ名は50文字以内で入力してください。',
          'process.required' => '*工程は必須入力です。',
          'process.max' => '*工程はは500文字以内で入力してください。',
          'recipe_file.required' => '*画像を選択してください。',
        ]);
        $recipe_name = $request->recipe_name;
        $process = $request->process;
        $text_1 = $request->text_1;
        $text_2 = $request->text_2;
        $image = $request->file('recipe_file')->store('public/image');
        $image = str_replace('public/image/', '', $image);

        $recipe = Recipe::create([
          'user_id' => $request->user_id,
          'title' => $request->recipe_name,
          'image' => $image,
          'process' => $request->process,
          'genre' => $request->genre,
        ]);
          for($i = 0; $i<count($text_1); $i++){
            Material::create([
              'recipe_id' => $recipe->id,
              'name' => $request->text_1[$i],
              'qty' => $request->text_2[$i]
            ]);
          }
        return view('recipes.complete', compact('recipe_name','process'));
    }

    public function edit(Request $request){
        $post_items = \DB::table('recipes')
            ->select('recipes.id', 'title', 'genre', 'process', 'name', 'image', 'qty')
            ->join('materials', 'recipes.id', '=', 'materials.recipe_id')
            ->where('recipes.id', '=', $request->recipe_id)
            ->get();
        return view('recipes.edit', compact('post_items'));
    }

    public function edit_complete(Request $request){
        $request->validate([
          'title'=>['required', 'max:50'],
          'genre'=>['required'],
          'process'=>['required', 'max:500'],
          'recipe_file'=>['required'],
        ],
        [
          'title.required' => '*レシピ名は必須入力です。',
          'title.max' => '*レシピ名は50文字以内で入力してください。',
          'genre.required'=> '*ジャンルを選択してください。',
          'process.required' => '*工程は必須入力です。',
          'recipe_file.required' => '*画像は必須入力です。'
        ]);
        $id = $request->recipe_id;
        $up_recipe = Recipe::find($id);
        $up_material = Material::where('recipe_id', '=' ,$id)->get();

        $image = $request->file('recipe_file')->store('public/image');
        $image = str_replace('public/image/', '', $image);
        $text_1 = $request->text_1;
        $text_2 = $request->text_2;
        $updateRecipe = $up_recipe->updateRecipe($request, $up_recipe, $image);
        $deleteMaterial = $this->material->deleteMaterialById($id);
        for($i = 0; $i<count($text_1); $i++){
          Material::create([
            'recipe_id' => $id,
            'name' => $text_1[$i],
            'qty' => $text_2[$i]
          ]);
        }
        //$updateMaterial = $up_material->upMaterial($request, $up_material, $text_1, $text_2);

        return view('recipes.edit_complete');
    }

    public function leftovers(Request $request)
    {
        $keyword = $request->order_list;
        $genre_1 = $request->genre_1;
        $genre_2 = $request->genre_2;
        $genre_3 = $request->genre_3;
        $genre_4 = $request->genre_4;
        if(isset($keyword[0][1])) {
          $query = Recipe::query();
          $query->join('materials', function($query) use ($request){
            $query->on('recipes.id', '=', 'materials.recipe_id');
          });
          $query->where(function($query) use ($keyword){
            foreach($keyword as $value){
              $query->orWhere('materials.name', 'LIKE', "%{$value}%");
            }
          });
          $query->where(function($query) use ($genre_1, $genre_2, $genre_3, $genre_4){
            if(!empty($genre_1) && !empty($genre_2) && !empty($genre_3) && !empty($genre_4)){
              $query->where('recipes.genre', 'LIKE', "%{$genre_1}%")->orwhere('recipes.genre', 'LIKE', "%{$genre_2}%")
              ->orwhere('recipes.genre', 'LIKE', "%{$genre_3}%")->orwhere('recipes.genre', 'LIKE', "%{$genre_4}%");
            }
            if(!empty($genre_1)&& !empty($genre_2) && !empty($genre_3)) {
                $query->where('recipes.genre', 'LIKE', "%{$genre_1}%")->orwhere('recipes.genre', 'LIKE', "%{$genre_2}%")
                ->orwhere('recipes.genre', 'LIKE', "%{$genre_3}%");
            }
            if(!empty($genre_1)&& !empty($genre_3) && !empty($genre_4)) {
                $query->where('recipes.genre', 'LIKE', "%{$genre_1}%")->orwhere('recipes.genre', 'LIKE', "%{$genre_3}%")
                ->orwhere('recipes.genre', 'LIKE', "%{$genre_4}%");
            }
            if(!empty($genre_1)&& !empty($genre_2) && !empty($genre_4)) {
                $query->where('recipes.genre', 'LIKE', "%{$genre_1}%")->orwhere('recipes.genre', 'LIKE', "%{$genre_2}%")
                ->orwhere('recipes.genre', 'LIKE', "%{$genre_4}%");
            }
            if(!empty($genre_1)&& !empty($genre_2)) {
                $query->where('recipes.genre', 'LIKE', "%{$genre_1}%")->orwhere('recipes.genre', 'LIKE', "%{$genre_2}%");
            }
            if(!empty($genre_1)&& !empty($genre_3)) {
                $query->where('recipes.genre', 'LIKE', "%{$genre_1}%")->orwhere('recipes.genre', 'LIKE', "%{$genre_3}%");
            }
            if(!empty($genre_1)&& !empty($genre_4)) {
                $query->where('recipes.genre', 'LIKE', "%{$genre_1}%")->orwhere('recipes.genre', 'LIKE', "%{$genre_4}%");
            }
            if(!empty($genre_1)) {
                $query->where('recipes.genre', 'LIKE', "%{$genre_1}%");
            }
            if(!empty($genre_2)) {
                $query->where('recipes.genre', 'LIKE', "%{$genre_2}%");
            }
            if(!empty($genre_3)) {
                $query->where('recipes.genre', 'LIKE', "%{$genre_3}%");
            }
            if(!empty($genre_4)) {
                $query->where('recipes.genre', 'LIKE', "%{$genre_4}%");
            }
          });

          $items = $query->get();
          $user_id = Auth::id();

          //いいね
          if(!empty($items[0])){
            $query = Recipe::query()->withCount('likes');
            $query->where(function($query) use ($items){
              foreach($items as $value){
                $query->orWhere('id', $value->recipe_id)->orderBy('id');
              }
            });
            $items = $query->get();
          }
          $param = [
              'items' => $items,
          ];
          return view('recipes.leftovers', compact('items', 'keyword'), $param, $user_id);
        }else {
          //いいね

          $message = "空";
          return view('recipes.leftovers')->with([
            'message' => $message,
          ]);
        }
    }

    public function like(Request $request)
    {
      $user_id = Auth::user()->id; //1.ログインユーザーのid取得
      $recipe_id = $request->recipe_id; //2.投稿idの取得
      $already_liked = Like::where('user_id', $user_id)->where('recipe_id', $recipe_id)->first(); //3.

      if (!$already_liked) { //もしこのユーザーがこの投稿にまだいいねしてなかったら
          $like = new Like; //4.Likeクラスのインスタンスを作成
          $like->recipe_id = $recipe_id; //Likeインスタンスにreview_id,user_idをセット
          $like->user_id = $user_id;
          $like->save();
      } else { //もしこのユーザーがこの投稿に既にいいねしてたらdelete
          Like::where('recipe_id', $recipe_id)->where('user_id', $user_id)->delete();
      }
      //5.この投稿の最新の総いいね数を取得
      $recipe_likes_count = Recipe::withCount('likes')->findOrFail($recipe_id)->likes_count;
      $param = [
          'recipe_likes_count' => $recipe_likes_count,
      ];
      return response()->json($param); //6.JSONデータをjQueryに返す
    }

    public function administrator()
    {
        return view('recipes.administrator');
    }

    public function admin_login(Request $request)
    {
      $credentials = $request->validate([
          'email' => ['required', 'email'],
          'password' => ['required'],
      ]);

      if (Auth::attempt($credentials, true)) {
          $user_id = Auth::id();
          $query = Recipe::query();
          if(!empty($user_id)) {
              $query->where('user_id', $user_id);
          }
          $pages = $query->paginate(8);
          $recipe_items = $query->get();


          return redirect()->route('admin_mypage');
      }
      return back()->withErrors([
          'email' => '間違っている',
      ]);
    }
    public function admin_mypage(Request $request)
    {
      $email = $request->user_email;
      $recipe = $request->recipe_name;
      //ユーザー検索
      $query = User::query();
      $query->where('email','=',$email);
      $pages = $query->paginate(8);
      $user_items = $query->get();

      //レシピ検索
      $query1 = Recipe::query();
      $query1->where('title','=',$recipe);
      $recipe_items = $query1->get();

      return view('recipes.admin_mypage', compact('user_items', 'recipe_items'));
    }

    /**
     * 削除処理
     */
    public function destroy($id)
    {
        // 指定されたIDのレコードを削除
        $deleteMaterial = $this->material->deleteMaterialById($id);
        $deleteRecipe = $this->recipe->deleteRecipeById($id);
        // 削除したら一覧画面にリダイレクト
        return redirect()->route('admin_mypage');
    }
    /**
     * ユーザー削除処理
     */
    public function userDestroy($id)
    {
      $deleteUser = $this->user->deleteUserById($id);
      return redirect()->route('admin_mypage');
    }
}
?>
