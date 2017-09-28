<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    const CREATED_AT = 'date';
    protected $fillable = ['name','title','author','content','description'];
}

