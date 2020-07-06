<?php

namespace App\Http\Controllers;

use App\FotoHomestay;
use App\Homestay;
use App\HomestayDetail;
use App\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    //
    public function index() {

        $user = Auth::user();

        $yogyakarta = Homestay::orderBy('id', 'DESC')->where('provinsi_id', 34)->paginate(3);
        $wisata = Wisata::all();
        return view('user.CariHomeStay', compact('user' ,'yogyakarta', 'wisata'));
    }

    public function search(Request $request) {

        $query = $request->get('q');
        $user = Auth::user();
        $homestay = Homestay::all();
        $country_name = DB::table('indonesia_cities')
            ->get();
        return view('user.CariHomeStay1', compact('user', 'homestay', 'query','country_name'));
    }

    public function detail($id) {
        $user = Auth::user();
        $homestay = Homestay::findOrfail($id);

            $lat = $homestay -> latitude1;
            $long = $homestay -> longtitude1;
        $id_unik = $homestay -> unique_id;
        $foto = FotoHomestay::all()->where('homestay_id',$id_unik);
        $fasilitas_public = DB::table('homestay')
            ->join('homestay_detail', 'homestay_detail.homestay_unique_id', '=', 'homestay.unique_id')
            ->join('fasilitas', 'fasilitas.id', '=', 'homestay_detail.fasilitas_id')
            ->where('homestay.id', '=', $id)
            ->where('type', 'public_facilities')
            ->get();
        $fasilitas_ruangan = DB::table('homestay')
            ->join('homestay_detail', 'homestay_detail.homestay_unique_id', '=', 'homestay.unique_id')
            ->join('fasilitas', 'fasilitas.id', '=', 'homestay_detail.fasilitas_id')
            ->where('homestay.id', '=', $id)
            ->where('type', 'room_facilities')
            ->get();
        $fasilitas_kamarmandi = DB::table('homestay')
            ->join('homestay_detail', 'homestay_detail.homestay_unique_id', '=', 'homestay.unique_id')
            ->join('fasilitas', 'fasilitas.id', '=', 'homestay_detail.fasilitas_id')
            ->where('homestay.id', '=', $id)
            ->where('type', 'bathroom_facilities')
            ->get();
        $area = DB::table('homestay')
            ->join('homestay_detail', 'homestay_detail.homestay_unique_id', '=', 'homestay.unique_id')
            ->join('fasilitas', 'fasilitas.id', '=', 'homestay_detail.fasilitas_id')
            ->where('homestay.id', '=', $id)
            ->where('type', 'area')
            ->get();



        return view('user.pesanHomeStay', compact('user', 'homestay', 'foto', 'fasilitas_public', 'fasilitas_ruangan', 'fasilitas_kamarmandi', 'area', 'lat', 'long'));
    }
}
