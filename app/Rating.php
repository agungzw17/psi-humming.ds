<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    //
    protected $table = 'rating';
    protected $fillable = [
        'homestay_id', 'user_id', 'rating', 'comment'
    ];

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
