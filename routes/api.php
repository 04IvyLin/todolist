<?php

use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//設計一個api的route，它是一個http get 的請求，指定請求的業務邏輯是TodoController的index()方法
Route::get(
    'todos', [TodoController::class, 'index']
);

//設計一個api的route，它是一個http post 的請求，指定請求的業務邏輯是TodoController的store()方法
Route::post(
    'todo', [TodoController::class, 'store']
);

//設計一個api的route，它是一個http put 的請求，指定請求的業務邏輯是TodoController的update()方法
//更新資料處理
//更新與新增的路由相似，http方法改成put，對應的邏輯處理方法是update()
//路徑改成todo/{todo}
Route::put(
    'todo/{todo}', [TodoController::class, 'update']
);

//設計一個api的route，它是一個http delete 的請求，指定請求的業務邏輯是TodoController的destroy()方法
Route::delete(
    'todo/{todo}', [TodoController::class, 'destroy']
);