<?php

namespace App\Http\Controllers;

use App\Homestay;
use App\Pembayaran;
use App\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravolt\Indonesia\Models\City;

class AdminBookingHomestayController extends Controller
{
    //
    public function index(){
        $user = Auth::user();

            if ($user->role_name == 'Admin') {
                $booking = Pembayaran::all();
                return view('admin.booking.index', compact('booking'));
            }
            else {
                $user = Auth::user();
                $city = City::all();
                $wisata = Wisata::all();
                return view('user.CariHomeStay', compact('user' ,'city', 'wisata'));
            }

        $user = Auth::user();
        if ($user->role_name == 'User Homestay') {

        }
        else {
            $user = Auth::user();
            $city = City::all();
            $wisata = Wisata::all();
            return view('user.CariHomeStay', compact('user' ,'city', 'wisata'));
        }



    }

    public function edit($id)
    {
        $user = Auth::user();
        if ($user->role_name == 'Admin') {
            $booking =Pembayaran::findOrFail($id);

            return view('admin.booking.edit', compact('booking'));
        }
        else {
            $user = Auth::user();
            $city = City::all();
            $wisata = Wisata::all();
            return view('user.CariHomeStay', compact('user' ,'city', 'wisata'));
        }


    }

    public function destroy($id)
    {
        $user = Auth::user();
        $user = Pembayaran::findOrfail($id);
        $user->delete();

        return redirect()->route('dashboard.booking.index')->withSuccess('saved');

    }
}
