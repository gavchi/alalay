<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $table = 'seo';

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
