<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use \Illuminate\Http\Request;
use \Illuminate\Http\Response;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //使用 Laravel Model提供的一些好的方法，操作資料表
        //本例子使用Model提供的排序功能orderBy()與取得全部資料get()
        //返回JSON資料
        return response()->json(Todo::orderBy('created_at', 'DESC')->get());
    }

    function list() {
        $todos = Todo::orderBy('created_at', 'DESC')->get();
        return view('welcome', ['todos' => $todos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTodoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //建立新的Todo Model物件，並且新增一個屬性body
        //$newTodo = new Todo(); $newTodo->body
        //取得POST request 所提交的body資料，交由Model來處理(save)
        //$newTodo->body =$request->body;
        $newTodo = new Todo();
        $newTodo->body = $request->body;
        //使用Model 提供的方法save()，將body的資料寫至資料表上
        $newTodo->save();
        return response()->json($newTodo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTodoRequest  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        //在前面的api路由設定todo/{todo}，若輸入是todo/，後面加上一個數字時，則Laravel會把這個當作是一個參數將這個值傳過來，即todo=1 (todo/1)，如此一來接收這個$request新的值，來取代Model上該舊的值
        //return $todo;
        //使用Model所提供的方法update()來更新資料
        $todo->update($request->all());
        return response()->json($todo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        //使用Model提供的方法delete()來刪除資料
        $todo->delete();
        //返回空資料，並指定狀態碼204
        return response(null, Response::HTTP_NO_CONTENT);
    }
}