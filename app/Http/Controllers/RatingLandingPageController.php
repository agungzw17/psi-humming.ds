<?php

namespace App\Http\Controllers;

use App\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingLandingPageController extends Controller
{
    //
    public function index($id) {
        $user = Auth::user();
        $homestay_id = $id;
        return view('user.rating.index', compact('user', 'homestay_id'));
    }
    public function store(Request $request)
    {
        //
        $input = $request -> all();
        Rating::create($input);

        return "Terimakasih telah memberikan feedback";
    }
}
