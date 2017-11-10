<?php

namespace App\Model;

use App\Model\user\UserEntityInterface;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model implements UserEntityInterface
{
    protected $fillable = ['name','mimetype','link','user_id'];

    public static function getUserFieldName() : string
    {
        return 'user_id';
    }

}
