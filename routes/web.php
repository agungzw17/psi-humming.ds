<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Dacastro4\LaravelGmail\Facade\LaravelGmail;
use FarhanWazir\GoogleMaps\GMaps;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

$user = Auth::user();
Route::get('/home-home', function () {
    return view('welcome');

});
Route::get('/user-login', function () {
    return view('auth1.login');
});

Route::get('/', 'LandingPageController@index');

Auth::routes();
Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');


Route::get('/home', 'HomeController@index')->name('home');

///*dasboard admin*/
Route::middleware('auth')->group(function (){
    Route::get('dashboard', 'AdminDasboardController@index')->name('dashboard');

    Route::resource('dashboard/users', 'AdminUsersController', [
        'names' => [
            'index' => 'dashboard.user.index',
            'create' => 'dashboard.user.create',
            'edit' => 'dashboard.user.edit',
            'store' => 'dashboard.user.store',
            'update' => 'dashboard.user.update',
            'destroy' => 'dashboard.user.destroy',
            // etc...
        ]
    ]);

    Route::resource('dashboard/homestay', 'AdminHomestayController', [
        'names' => [
            'index' => 'dashboard.homestay.index',
            'create' => 'dashboard.homestay.create',
            'edit' => 'dashboard.homestay.edit',
            'store' => 'dashboard.homestay.store',
            'update' => 'dashboard.homestay.update',
            'destroy' => 'dashboard.homestay.destroy',
            // etc...
        ]
    ]);

    Route::resource('dashboard/fasilitas', 'AdminFasilitasController', [
        'names' => [
            'index' => 'dashboard.fasilitas.index',
            'create' => 'dashboard.fasilitas.create',
            'edit' => 'dashboard.fasilitas.edit',
            'store' => 'dashboard.fasilitas.store',
            'update' => 'dashboard.fasilitas.update',
            'destroy' => 'dashboard.fasilitas.destroy',
            // etc...
        ]
    ]);
    Route::resource('dashboard/wisata', 'AdminWisataController', [
        'names' => [
            'index' => 'dashboard.wisata.index',
            'create' => 'dashboard.wisata.create',
            'edit' => 'dashboard.wisata.edit',
            'store' => 'dashboard.wisata.store',
            'update' => 'dashboard.wisata.update',
            'destroy' => 'dashboard.wisata.destroy',
            // etc...
        ]
    ]);
    Route::resource('dashboard/booking-homestay', 'AdminBookingHomestayController', [
        'names' => [
            'index' => 'dashboard.booking.index',
            'create' => 'dashboard.booking.create',
            'edit' => 'dashboard.booking.edit',
            'store' => 'dashboard.booking.store',
            'update' => 'dashboard.booking.update',
            'destroy' => 'dashboard.booking.destroy',
            // etc...
        ]
    ]);
    Route::resource('dashboard/rating', 'AdminRatingController', [
        'names' => [
            'index' => 'dashboard.rating.index',
            'create' => 'dashboard.rating.create',
            'edit' => 'dashboard.rating.edit',
            'store' => 'dashboard.rating.store',
            'update' => 'dashboard.rating.update',
            'destroy' => 'dashboard.rating.destroy',
            'show' => 'dashboard.rating.show',
            // etc...
        ]
    ]);
});


Route::get('landing-page', 'LandingPageController@index')->name('index.landing');
Route::get('landing-page/show', 'LandingPageController@search')->name('search.landing');
Route::get('landing-page/show/{id}', 'LandingPageController@detail')->name('detail.landing');

Route::get('landing-page/popular/{id}', 'PopularLandingPageController@popular')->name('popular.search.landing');
Route::get('landing-page/search', 'SearchLandingPageController@search')->name('search.search.landing');

Route::resource('/user-register', 'UserLandingPageController', [
    'names' => [
        'index' => 'user.index',
        'store' => 'user.register.store',
        // etc...
    ]
]);


Route::get('/admin/user/roles', [ 'middleware' => ['role', 'auth', 'web'], function () {
    return "Middleware Role";
}]);

Route::resource('pesan-homestay', 'PembayaranController', [
    'names' => [
        'store' => 'pesan.store',
    ]
]);

Route::resource('/tambah-homestay', 'TambahHomestayController', [
    'names' => [
        'index' => 'tambah.homestay.index',
        'create' => 'tambah.homestay.create',
        'edit' => 'tambah.homestay.edit',
        'store' => 'tambah.homestay.store',
        'update' => 'tambah.homestay.update',
        'destroy' => 'tambah.homestay.destroy',
        // etc...
    ]
]);


Route::get('dashboard/pemilik-homestay/{id}', 'PemilikHomestayDashboardController@index')->name('dashboard.pemilik.index');

Route::resource('dashboard/pemilik-homestay/tambah-homestay', 'PemilikHomestayHomestayController', [
    'names' => [
        'index' => 'tambah.pemilikhomestay.index',
        'create' => 'tambah.pemilikhomestay.create',
        'edit' => 'tambah.pemilikhomestay.edit',
        'store' => 'tambah.pemilikhomestay.store',
        'update' => 'tambah.pemilikhomestay.update',
        'destroy' => 'tambah.pemilikhomestay.destroy',
        // etc...
    ]
]);

Route::middleware('auth')->group(function (){
Route::get('landing-page/rating-homestay/{id}', 'RatingLandingPageController@index')->name('landingpage.rating.index');

Route::resource('rating-homestay/post', 'RatingLandingPageController', ['except' => 'show', 'names' => [
        'store' => 'landingpage.rating.store'
]]);
});


