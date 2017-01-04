<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password', 'is_admin', 'is_member',
    ];

    protected $guarded = ['is_admin', 'is_member'];

    // protected $guarded = ['is_admin', 'is_member'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function student()
    {
        return $this->hasOne('App\Models\Student');
    }

    public function is_admin()
    {
        if($this->is_admin == 1) {
            return true;
        }
        return false;
    }

    public function is_member()
    {
        if($this->is_member == 1) {
            return true;
        }
        return false;
    }
}
