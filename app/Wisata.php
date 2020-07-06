<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    //
    protected $table = 'wisata';
    protected $fillable = [
        'name', 'provinsi_id', 'range_homestay', 'photo_wisata'
    ];

    public function provinsi() {
        return $this->belongsTo('Laravolt\Indonesia\Models\Provinsi', 'provinsi_id');
    }


}
