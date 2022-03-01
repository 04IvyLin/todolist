<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //產生由`Factory`幾筆訂單的資料
        \App\Models\Todo::factory(10)->create();
    }
}