<?php

namespace App\Http\Controllers;

use App\Homestay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchLandingPageController extends Controller
{
    //
    public function search(Request $request){
        $query = $request->get('q');
        $user = Auth::user();
        if ($request->harga == null) {
            $homestay = Homestay::all()->where('kota_id', $request->city_id);
        }
        if ($request->city_id == null) {
            $homestay = Homestay::all()->where('harga' ,'<',$request->harga);
        }

        if ($request->city_id and $request->harga) {
            $homestay = Homestay::all()->where('kota_id', $request->city_id)->where('harga' ,'<=',$request->harga);
        }

        $country_name = DB::table('indonesia_cities')
            ->get();
        return view('user.CariHomeStay1', compact('user', 'homestay', 'query','country_name'));
    }
}
