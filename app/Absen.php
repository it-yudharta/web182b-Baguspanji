<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
	protected $table = "absens";

    protected $fillable = [
        'name', 'jabatan', 'tanggal', 'masuk', 'keluar', 'ket'
    ];
}
