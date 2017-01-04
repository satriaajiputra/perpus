<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'kelas', 'telp', 'alamat',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function borrowers()
    {
        return $this->hasMany('App\Models\Borrower');
    }
}
