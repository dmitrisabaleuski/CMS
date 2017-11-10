<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    const CREATED_AT = 'date';
    protected $fillable = ['name','title','author_name','author_id','content','description','view_on_main','parent_page'];
}

