<?php

namespace App\Http\Controllers;

use App\Fasilitas;
use App\FotoHomestay;
use App\Homestay;
use App\HomestayDetail;
use App\Http\Requests\HomestayRequest;
use App\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Provinsi;

class AdminWisataController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $wisata = Wisata::all();
        return view('admin.wisata.index', compact('wisata'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $provinsi = Provinsi::all();
        return view('admin.wisata.create', compact('provinsi'));
    }

    public function store(Request $request)
    {
        $input = $request -> all();
        if($file = $request->file('photo_wisata')){

            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);

            $input['photo_wisata'] = $name;
        }

        Wisata::create($input);

        return redirect('/dashboard/wisata');
    }
    public function edit($id)
    {
        $user = Auth::user();
        $wisata =Wisata::findOrFail($id);

        return view('admin.wisata.edit', compact('wisata'));

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $user = Wisata::findOrfail($id);
        $user->delete();

        return redirect()->route('dashboard.wisata.index')->withSuccess('saved');

    }
}
