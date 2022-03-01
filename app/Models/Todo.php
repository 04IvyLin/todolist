<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    //必須以下面方式來指定哪些欄位可以被修改
    protected $fillable = ['body', 'completed'];
}