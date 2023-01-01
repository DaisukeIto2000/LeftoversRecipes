<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\PasswordController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
    //return view('welcome');
//});
//いいね
Route::post('/like', [RecipeController::class, 'like'])->name('recipes.like');
Route::get('/', [RecipeController::class, 'index']);
Route::get('/index', [RecipeController::class, 'index']);
Route::get('/index', [RecipeController::class, 'index']);
Route::get('/login', [RecipeController::class, 'login'])->name('login_page');
Route::post('/login', [RecipeController::class, 'login']);
Route::get('/signup', [RecipeController::class, 'signup']);
Route::post('/signup_complete', [RecipeController::class, 'signup_complete']);
Route::get('/mypage', [RecipeController::class, 'userLogin'])->name('login');
Route::post('/mypage', [RecipeController::class, 'userLogin'])->name('login');
Route::get('/logout',[RecipeController::class, 'getLogout'])->name('logout');
Route::group(['middleware' => 'auth'], function () {
  Route::get('/my', [RecipeController::class, 'mypage'])->name('mypage');
  Route::post('/my', [RecipeController::class, 'mypage'])->name('mypage');
  Route::post('/recipe_del/{id}', [RecipeController::class, 'destroy_1'])->name('recipe_destroy_1'); // 削除
});
Route::get('/detail', [RecipeController::class, 'detail']);
Route::post('/detail', [RecipeController::class, 'detail']);
Route::get('/post_screen', [RecipeController::class, 'post_screen']);
Route::post('/post_screen', [RecipeController::class, 'post_screen']);
Route::post('/complete', [RecipeController::class, 'complete']);
Route::get('/edit', [RecipeController::class, 'edit']);
Route::post('/edit', [RecipeController::class, 'edit']);
Route::get('/edit_complete', [RecipeController::class, 'edit_complete']);
Route::post('/edit_complete', [RecipeController::class, 'edit_complete']);
Route::get('/leftovers', [RecipeController::class, 'leftovers']);
Route::get('/search_result', [RecipeController::class, 'search_result']);
Route::post('/search_result', [RecipeController::class, 'search_result']);
Route::get('/administrator', [RecipeController::class, 'administrator']);
Route::get('/admin_mypage', [RecipeController::class, 'admin_login'])->name('admin_login');
Route::post('/admin_mypage', [RecipeController::class, 'admin_login'])->name('admin_login');
Route::group(['middleware' => 'auth'], function () {
  Route::get('/', [RecipeController::class, 'admin_mypage'])->name('admin_mypage');
  Route::post('/', [RecipeController::class, 'admin_mypage'])->name('admin_mypage');
  Route::post('/recipe_destroy/{id}', [RecipeController::class, 'destroy'])->name('recipe_destroy'); // 削除
  Route::post('/user_destroy/{id}', [RecipeController::class, 'userDestroy'])->name('user_destroy'); // 削除
});

// パスワードリセット関連
Route::prefix('password_reset')->name('password_reset.')->group(function () {
    Route::prefix('email')->name('email.')->group(function () {
        // パスワードリセットメール送信フォームページ
        Route::get('/', [PasswordController::class, 'emailFormResetPassword'])->name('form');
        // メール送信処理
        Route::post('/', [PasswordController::class, 'sendEmailResetPassword'])->name('send');
        // メール送信完了ページ
        Route::get('/send_complete', [PasswordController::class, 'sendComplete'])->name('send_complete');

        Route::get('/index', [RecipeController::class, 'index'])->name('index');

        Route::get('/login', [RecipeController::class, 'login'])->name('login');
    });
    // パスワード再設定ページ
    Route::get('/edit', [PasswordController::class, 'edit'])->name('edit');
    // パスワード更新処理
    Route::post('/update', [PasswordController::class, 'update'])->name('update');
    // パスワード更新終了ページ
    Route::get('/edited', [PasswordController::class, 'edited'])->name('edited');
    Route::get('/index', [RecipeController::class, 'index'])->name('index');
    Route::get('/login', [RecipeController::class, 'login'])->name('login');


});

//管理者権限
Route::middleware(['auth','can:isAdmin'])->group(function(){
});
