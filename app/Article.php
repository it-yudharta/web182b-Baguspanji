<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // Digunakan untuk menggunakan soft delete secara default saat menghapus data
    // use SoftDeletes;
 
    protected $fillable = [
        'title', 'content'
    ];
    protected $dates = ['deleted_at'];
}
