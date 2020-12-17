<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_saranalat extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'saranalat';
    protected $primaryKey = 'id_saranalat';
    public $timestamps = false;
    protected $fillable = [
        'nama_alat', 'deskripsi_alat', 'tanggal_saranalat','id_pengguna'
    ];

}
