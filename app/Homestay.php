<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravolt\Indonesia\Models\District;

class Homestay extends Model
{
    //
    protected $table = 'homestay';
    protected $fillable = [
        'user_id', 'nama_homestay', 'harga', 'deskripsi', 'provinsi_id', 'kota_id', 'alamat', 'unique_id', 'district_id', 'photo_homestay', 'latitude1' ,'longtitude1'
    ];

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function provinsi() {
        return $this->belongsTo('Laravolt\Indonesia\Models\Provinsi', 'provinsi_id');
    }
    public function kota() {
        return $this->belongsTo('Laravolt\Indonesia\Models\City', 'kota_id');
    }
    public function kota1() {
        return $this->belongsTo('Laravolt\Indonesia\Models\District', 'district_id');
    }

    public function foto() {
        return $this->belongsTo('App\FotoHomestay', 'unique_id');
    }
}
