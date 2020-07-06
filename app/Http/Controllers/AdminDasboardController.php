<?php

namespace App\Http\Controllers;

use App\Homestay;
use App\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDasboardController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        return view('admin.dashboard.index');

    }
}
