<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function mask()
    {
        return $this->belongsTo('App\Mask');
    }
}
