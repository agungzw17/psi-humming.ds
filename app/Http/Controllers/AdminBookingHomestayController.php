<?php

namespace App\Http\Controllers;

use App\Homestay;
use App\Pembayaran;
use App\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminBookingHomestayController extends Controller
{
    //
    public function index(){
        $user = Auth::user();
        $booking = Pembayaran::all();
        return view('admin.booking.index', compact('booking'));

    }

    public function edit($id)
    {
        $user = Auth::user();
        $booking =Pembayaran::findOrFail($id);

        return view('admin.booking.edit', compact('booking'));

    }

    public function destroy($id)
    {
        $user = Auth::user();
        $user = Pembayaran::findOrfail($id);
        $user->delete();

        return redirect()->route('dashboard.booking.index')->withSuccess('saved');

    }
}
