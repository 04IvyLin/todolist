<?php

use App\Http\Controllers\TodoController;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     //第一個參數是view的名稱
//     //第二個參數是欲傳送的資料，陣列['todos' => $todos]([欄位=>值])
//     //注意事項：(很重要)傳送的欄位名稱 todos ，需與畫面接收的參數名稱一致
//     //引用到Todo的Model，所以要引用use App\Models\Todo;
//     $todos = Todo::orderBy('created_at', 'DESC')->get();
//     return view('welcome', ['todos' => $todos]);
// })->name('todo.index');

Route::get('/', [TodoController::class, 'list'])->name('todo.index');

Route::post('/todo', function (Request $request) {
    $newTodo = new Todo();
    $newTodo->body = $request->todo_body;
    //利用 Model 提供的 save()方法，將資料寫入實體資料表內
    $newTodo->save();
    return redirect()->route('todo.index');
})->name('todo.store');

//第一個程式
//第二個程式

//新功能