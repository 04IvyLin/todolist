<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->id(); //固定是int
            $table->text('body'); //內容
            $table->boolean('completed')->default(false); //是否完成
            //建立時間，使用函式取得現在時間
            $table->datetime('created_at')->useCurrent();
            //變更時間，函式使用當資料變更時也同步更新時間
            $table->datetime('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todos');
    }
}