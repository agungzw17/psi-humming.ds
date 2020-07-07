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
use Illuminate\Support\Facades\Redirect;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Kecamatan;
use Laravolt\Indonesia\Models\Provinsi;

class AdminHomestayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->role_name == 'Admin') {

        }
        else {
            $user = Auth::user();
            $city = City::all();
            $wisata = Wisata::all();
            return view('user.CariHomeStay', compact('user' ,'city', 'wisata'));
        }
        $homestay = Homestay::all();
        return view('admin.homestay.index', compact('homestay'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = Auth::user();
        if ($user->role_name == 'Admin') {

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
            return view('admin.homestay.create', compact('provinsi', 'kota', 'distrik', 'number', 'fasilitas_public', 'fasilitas_room', 'fasilitas_bathroom', 'fasilitas_area'));

        }
        else {
            $user = Auth::user();
            $city = City::all();
            $wisata = Wisata::all();
            return view('user.CariHomeStay', compact('user' ,'city', 'wisata'));
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(HomestayRequest $request)
    {

        $unik = Homestay::all();

        foreach($unik as $h) {
            if ($h -> unique_id == $request -> unique_id) {
                return redirect()->route('dashboard.homestay.index');
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

        return Redirect::back();
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

            $homestay = Homestay::findOrfail($id);
//        $homestay_detail = DB::table('shares')
//            ->join('users', 'users.id', '=', 'shares.user_id')
//            ->join('followers', 'followers.user_id', '=', 'users.id')
//            ->where('followers.follower_id', '=', 3)
////            ->get();
            $homestay_detail = DB::table('homestay')
                ->join('homestay_detail', 'homestay_detail.homestay_unique_id', '=', 'homestay.unique_id')
                ->join('fasilitas', 'fasilitas.id', '=', 'homestay_detail.fasilitas_id')
                ->where('homestay.id', '=', $id)
                ->get();

//        foreach ($homestay_detail as $h) {
//            $h_detail = $h->fasilitas_id;
//        }

            $provinsi = Provinsi::all();
            $kota = City::all();
            $distrik = District::all();
            $fasilitas_public = Fasilitas::all()->where('type', 'public_facilities');
            $fasilitas_room = Fasilitas::all()->where('type', 'room_facilities');
            $fasilitas_bathroom = Fasilitas::all()->where('type', 'bathroom_facilities');
            $fasilitas_area = Fasilitas::all()->where('type', 'area');
            return view('admin.homestay.edit', compact('homestay_detail','homestay','provinsi', 'kota', 'distrik',  'fasilitas_public', 'fasilitas_room', 'fasilitas_bathroom', 'fasilitas_area'));

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
        $homestay = Homestay::findOrfail($id);


        $input = $request -> all();
        if($file = $request->file('photo_homestay')){

            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);

            $input['photo_homestay'] = $name;
        }
        $images = array();
        if($file = $request->file('file')){
            FotoHomestay::where('homestay_id', $request->unique_id)->delete($request->unique_id);
            foreach ($file as $f){
                $name = time() . $f->getClientOriginalName();

                $f->move('images', $name);
                $user = Auth::user();
                $homestay_detail = DB::table('homestay')
                ->join('homestay_detail', 'homestay_detail.homestay_unique_id', '=', 'homestay.unique_id')
                ->where('homestay.id', '=', $id)
                ->get();
//                foreach ($homestay_detail as $h) {
//                    $home = $h->homestay_unique_id;
//                    FotoHomestay::where('homestay_id', $home)->delete($home);
//                }
                FotoHomestay::create(['user_id' => $user->id, 'file' => $name, 'homestay_id' => $request->unique_id]);

            }
        }

        if ($request->fasilitas_id) {
            HomestayDetail::where('homestay_unique_id', $request->unique_id)->delete($request->unique_id);
        }

        if ($request->fasilitas_id) {
            foreach ($request->fasilitas_id as $f) {
                HomestayDetail::create(['fasilitas_id' => $f, 'homestay_unique_id' => $request->unique_id ]);
            }
        }


        $homestay -> update($input);

        return redirect('/dashboard/homestay');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $homestay = Homestay::findOrfail($id);
        $homestay->delete();

        HomestayDetail::where('homestay_unique_id', $request->unique_id)->delete($request->unique_id);
        FotoHomestay::where('homestay_id', $request->unique_id)->delete($request->unique_id);



//        Session::flash('the user has been deleted');

        return redirect()->route('dashboard.homestay.index')->withSuccess('saved');
    }
}
