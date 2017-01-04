<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'judul_buku', 'kode_buku', 'publisher_id',
    ];

    public function code()
    {
        $string = '';
        foreach(self::select('kode_buku')->get() as $row) {
            $string .= $row->kode_buku.',';
        }
        return rtrim($string, ',');
    }

    public function publisher()
    {
        return $this->belongsTo('App\Models\Publisher');
    }

    public function borrowers()
    {
        return $this->hasMany('App\Models\Borrower');
    }
}
