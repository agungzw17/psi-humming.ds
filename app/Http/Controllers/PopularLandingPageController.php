<?php

namespace App\Http\Controllers;

use App\Homestay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PopularLandingPageController extends Controller
{
    //
    public function popular(Request $request, $id){
        $query = $request->get('q');
        $user = Auth::user();
        $homestay = Homestay::all()->where('provinsi_id', $id);
        $country_name = DB::table('indonesia_cities')
            ->get();
        return view('user.CariHomeStay1', compact('user', 'homestay', 'query','country_name'));
    }
}
