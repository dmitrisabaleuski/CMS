<?php

namespace App\Model;

use App\Model\user\UserEntityInterface;
use Illuminate\Database\Eloquent\Model;

class Article extends Model implements UserEntityInterface
{
    const CREATED_AT = 'date';
    protected $fillable = ['name','title','author_name','author_id','content','description','view_on_main','parent_page'];

    public static function getUserFieldName() : string
    {
        return 'author_id';
    }
}