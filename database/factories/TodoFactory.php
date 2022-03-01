<?php

namespace Database\Factories;

//使用Model：Todo的資料型態來建立測試資料，所以要引用
use App\Models\Todo;
use Illuminate\Database\Eloquent\Factories\Factory;

class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    //使用 $model 來指定要使用的Todo model
    protected $model = Todo::class;
    public function definition()
    {
        return [
            //只回傳一個body=Hello的資料
            //'body' => 'Hello',
            'body' => $this->faker->text,
        ];
    }
}