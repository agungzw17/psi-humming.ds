<?php

namespace App\Http\Controllers;

use App\Homestay;
use App\Rating;
use App\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravolt\Indonesia\Models\City;

class AdminRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        if ($user->role_name == 'Admin') {
            $rating = Rating::all();
            return view('admin.rating.index', compact('rating'));
        }
        else {
            $user = Auth::user();
            $city = City::all();
            $wisata = Wisata::all();
            return view('user.CariHomeStay', compact('user' ,'city', 'wisata'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $id
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request -> all();
        Rating::create($input);

        return redirect('/dashboard/rating');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = Auth::user();
        if ($user->role_name == 'Admin') {
            $homestay = Homestay::findOrFail($id);
            return view('admin.rating.create', compact('user', 'homestay'));

        }
        else {
            $user = Auth::user();
            $city = City::all();
            $wisata = Wisata::all();
            return view('user.CariHomeStay', compact('user' ,'city', 'wisata'));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = Auth::user();
        if ($user->role_name == 'Admin') {
            $rating =Rating::findOrFail($id);

            return view('admin.rating.edit', compact('rating'));

        }
        else {
            $user = Auth::user();
            $city = City::all();
            $wisata = Wisata::all();
            return view('user.CariHomeStay', compact('user' ,'city', 'wisata'));
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = Auth::user();
        $user = Rating::findOrfail($id);
        $user->delete();

        return redirect()->route('dashboard.rating.index')->withSuccess('saved');
    }
}
