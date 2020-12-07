<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    protected $table = 'blog';
    public $timestamps = false;
    
    protected $fillable = [
        'judul','isi','penulis','foto','waktu'
    ];
}
