<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    protected $fillable = ['name','mimetype','link','user_id'];
}
