<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;
    protected $table = 'news';
    protected $fillable = ['type_id', 'organize_id','user_id','images',
        'title','content','published_at','publish_status','view_count'];

    public function organize()
    {
        return $this->belongsTo(Organize::class, 'organize_id');
    }
    public function newsType()
    {
        return $this->belongsTo(News_type::class, 'type_id');
    }

}
