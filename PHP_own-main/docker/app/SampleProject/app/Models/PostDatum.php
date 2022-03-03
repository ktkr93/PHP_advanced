<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostDatum extends Model
{
    // テーブル名の任意設定
    protected $table = 'post_data';
    use HasFactory;
}
