<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected $fillable = [
        'image',
        'title_ru',
        'title_uz',
        'title_en',
        'content_ru',
        'content_uz',
        'content_en',
    ];
}
