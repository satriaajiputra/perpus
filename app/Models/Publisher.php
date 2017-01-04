<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $fillable = [
        'nama', 'alamat',
    ];

    public function books()
    {
        return $this->hasMany('App\Models\Book');
    }

    public function idValidate()
    {
        $string = '';
        foreach(self::select('id')->get() as $row) {
            $string .= $row->id.',';
        }
        return rtrim($string, ',');
    }
}
