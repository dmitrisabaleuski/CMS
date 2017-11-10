<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['title','url','active_id','active'];
}
