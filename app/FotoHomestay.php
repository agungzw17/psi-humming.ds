<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotoHomestay extends Model
{
    //
    protected $table = 'foto_homestay_';
    protected $fillable = [
        'user_id', 'file', 'homestay_id'
    ];

    public function homestay() {
        return $this->belongsTo('App\Homestay', 'unique_id');
    }
}
