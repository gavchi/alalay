<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mask extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function mask()
    {
        return $this->hasMany('App\Work');
    }
}
