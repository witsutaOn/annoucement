<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;

    protected $fillable = ['type_id', 'organize_id','user_id','images',
        'title','content','published_at','publish_status','view_count'];
}
