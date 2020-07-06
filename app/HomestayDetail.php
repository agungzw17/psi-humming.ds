<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomestayDetail extends Model
{
    //
    protected $table = 'homestay_detail';
    protected $fillable = [
        'homestay_unique_id', 'fasilitas_id'
    ];
}
