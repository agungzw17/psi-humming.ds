<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    //
    protected $table = 'pembayaran';
    protected $fillable = [
        'homestay_id', 'user_id', 'check_in', 'check_out', 'status', 'total_harga'
    ];

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function homestay() {
        return $this->belongsTo('App\Homestay', 'homestay_id');
    }
}
