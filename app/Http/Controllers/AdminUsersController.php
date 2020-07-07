<?php

namespace App\Http\Controllers;

use App\Fasilitas;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use App\User;
use App\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UsersRequest;
use Laravolt\Indonesia\Models\City;

class AdminUsersController extends Controller
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
            $users = User::all();
            return view('admin.users.index', compact('users'));
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = Auth::user();
        if ($user->role_name == 'Admin') {
            return view('admin.users.create');
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
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
        $input = $request -> all();
        if(trim($request->password)=='') {
            $input = $request->except('password');
        } else {
            $input = $request-> all();
            $input['password'] = bcrypt($request->password);
            $input['password'] = Hash::make($input['password']);
        }
        $input['password'] = bcrypt($request->password);

        if($file = $request->file('photo')){


            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);

            $input['photo'] = $name;
        }




        User::create($input);
        return redirect()->route('dashboard.user.index')->withSuccess('saved');
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
            $user =User::findOrFail($id);

            return view('admin.users.edit', compact('user'));
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
    public function update(UserEditRequest $request, $id)
    {
        //
        $user = User::findOrfail($id);
        if(trim($request->password)=='') {
            $input = $request->except('password');
        }
        $input = $request-> all();
        $input['password'] = bcrypt($request->password);


        $input = $request -> all();
        $input['password'] = bcrypt($request->password);

        if($file = $request->file('photo')){



            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);

            $input['photo'] = $name;
        }
        $input['photo'] = $name;



        $user -> update($input);
        return redirect()->route('dashboard.user.index')->withSuccess('saved');
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

        $user = User::findOrfail($id);
        $user->delete();

//        Session::flash('the user has been deleted');

        return redirect()->route('dashboard.user.index')->withSuccess('saved');
    }
}
