<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_upvotesaranalat extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'upvotesaranalat';
    protected $primaryKey = 'id_upvote ';
    public $timestamps = false;
    protected $fillable = [
        'id_saranalat','tanggal_supvote','id_pengupvote'
    ];

}
