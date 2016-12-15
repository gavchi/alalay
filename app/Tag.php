<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    
    public function news()
    {
        return $this->belongsToMany('App\News', 'tag_news', 'tag_id', 'news_id');
    }
}
