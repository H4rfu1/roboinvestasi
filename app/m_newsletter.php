<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_newsletter extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'newsletter';
    protected $primaryKey = 'id_newsletter ';
    public $timestamps = false;
    protected $fillable = [
        'email', 'aktivasi', 'status', 'tanggal_aktivasi'
    ];

}
