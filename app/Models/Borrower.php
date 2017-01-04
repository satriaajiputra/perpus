<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    protected $fillable = [
        'tgl_pinjam', 'tgl_kembali', 'kode_pinjam', 'is_returned', 'student_id',
    ];

    public $timestamps = false;

    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }

    public function book()
    {
        return $this->belongsTo('App\Models\Book');
    }
}
