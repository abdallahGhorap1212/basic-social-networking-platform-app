<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    use HasFactory;
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }
    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }
}