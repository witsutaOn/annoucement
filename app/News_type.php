<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News_type extends Model
{
    //
    protected $table = 'news_type';

    protected $fillable = ['type'];
}
