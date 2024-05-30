<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class User extends Model implements Authenticatable
{
    use HasFactory;
    use AuthenticatableTrait;
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
