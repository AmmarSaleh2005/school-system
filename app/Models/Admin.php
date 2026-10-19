<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Fortify\TwoFactorAuthenticatable;
// use Illuminate\Contracts\Auth\;
class Admin extends Authenticatable
{
    //
    use TwoFactorAuthenticatable;
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

}
