<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Admin extends Model
{
    use  Notifiable;

    protected $table = 'admins';
    protected $guarded = array();
    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    protected $hidden = ['password'];

}
