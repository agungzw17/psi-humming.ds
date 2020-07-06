<?php

namespace App\Http\Controllers;

use App\Fasilitas;
use App\FotoHomestay;
use App\Homestay;
use App\HomestayDetail;
use App\Http\Requests\HomestayRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Provinsi;

class TambahHomestayController extends Controller
{
    //
    public function index(){
        $user = Auth::user();

//        $provinsi = Provinsi::all()->where('id', 34);
//        $kota = City::all()->where('province_id', 34);
//        $distrik = District::whereBetween('city_id', array(3401, 3471))->orderBy('city_id', 'asc')->get();
        $provinsi = Provinsi::all();
        $kota = City::all();
        $distrik = District::all();
        $number = mt_rand(1, 99999);
        $fasilitas_public = Fasilitas::all()->where('type', 'public_facilities');
        $fasilitas_room = Fasilitas::all()->where('type', 'room_facilities');
        $fasilitas_bathroom = Fasilitas::all()->where('type', 'bathroom_facilities');
        $fasilitas_area = Fasilitas::all()->where('type', 'area');
        return view('user.TambahHomestay', compact('provinsi', 'kota', 'distrik', 'number', 'fasilitas_public', 'fasilitas_room', 'fasilitas_bathroom', 'fasilitas_area'));


    }

    public function store(Request $request)
    {

        $unik = Homestay::all();

        foreach($unik as $h) {
            if ($h -> unique_id == $request -> unique_id) {
                \Session::flash('error ', "Maaf Homestay sudah diupload");
                return Redirect::back();
            }
        }
        $input = $request -> all();
        if($file = $request->file('photo_homestay')){

            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);

            $input['photo_homestay'] = $name;
        }
        $images = array();
        if($file = $request->file('file')){
            foreach ($file as $f){
                $name = time() . $f->getClientOriginalName();

                $f->move('images', $name);
                $user = Auth::user();
                FotoHomestay::create(['user_id' => $user->id, 'file' => $name, 'homestay_id' => $request->unique_id]);

            }
        }

        if ($request->fasilitas_id){
            foreach ($request->fasilitas_id as $f) {
                HomestayDetail::create(['fasilitas_id' => $f, 'homestay_unique_id' => $request->unique_id ]);
            }
        }


        Homestay::create($input);

        \Session::flash('message', "Selamat homestay anda berhasil ter-Upload");
        return Redirect::back();
    }
}
