<?php

namespace App\Http\Controllers;

use App\Homestay;
use App\Rating;
use App\Wisata;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravolt\Indonesia\Models\City;

class AdminDasboardController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        if ($user->role_name == 'Admin') {
            $data_1 = DB::table('pembayaran')->where('check_in', 'LIKE', '%2020-01%')->count();
            $pendapatan_1 = DB::table('pembayaran')->where('check_in', 'LIKE', '%2020-01%')->sum('total_harga');

            $data_2 = DB::table('pembayaran')->where('check_in', 'LIKE', '%2020-02%')->count();
            $pendapatan_2 = DB::table('pembayaran')->where('check_in', 'LIKE', '%2020-02%')->sum('total_harga');

            $data_3 = DB::table('pembayaran')->where('check_in', 'LIKE', '%2020-03%')->count();
            $pendapatan_3 = DB::table('pembayaran')->where('check_in', 'LIKE', '%2020-03%')->sum('total_harga');

            $data_4 = DB::table('pembayaran')->where('check_in', 'LIKE', '%2020-04%')->count();
            $pendapatan_4 = DB::table('pembayaran')->where('check_in', 'LIKE', '%2020-04%')->sum('total_harga');

            $data_5 = DB::table('pembayaran')->where('check_in', 'LIKE', '%2020-05%')->count();
            $pendapatan_5 = DB::table('pembayaran')->where('check_in', 'LIKE', '%2020-05%')->sum('total_harga');

            $data_6 = DB::table('pembayaran')->where('check_in', 'LIKE', '%2020-06%')->count();
            $pendapatan_6 = DB::table('pembayaran')->where('check_in', 'LIKE', '%2020-06%')->sum('total_harga');

            $data_7 = DB::table('pembayaran')->where('check_in', 'LIKE', '%2020-07%')->count();
            $pendapatan_7 = DB::table('pembayaran')->where('check_in', 'LIKE', '%2020-07%')->sum('total_harga');

            $data_8 = DB::table('pembayaran')->where('check_in', 'LIKE', '%2020-08%')->count();
            $pendapatan_8 = DB::table('pembayaran')->where('check_in', 'LIKE', '%2020-08%')->sum('total_harga');

            $data_9 = DB::table('pembayaran')->where('check_in', 'LIKE', '%2020-09%')->count();
            $pendapatan_9 = DB::table('pembayaran')->where('check_in', 'LIKE', '%2020-09%')->sum('total_harga');

            $data_10 = DB::table('pembayaran')->where('check_in', 'LIKE', '%2020-10%')->count();
            $pendapatan_10 = DB::table('pembayaran')->where('check_in', 'LIKE', '%2020-10%')->sum('total_harga');

            $data_11 = DB::table('pembayaran')->where('check_in', 'LIKE', '%2020-11%')->count();
            $pendapatan_11 = DB::table('pembayaran')->where('check_in', 'LIKE', '%2020-11%')->sum('total_harga');

            $data_12 = DB::table('pembayaran')->where('check_in', 'LIKE', '%2020-12%')->count();
            $pendapatan_12 = DB::table('pembayaran')->where('check_in', 'LIKE', '%2020-12%')->sum('total_harga');

            $line = Charts::create('line', 'highcharts')
                ->title('Statistik Pendapatan Pemesanan Homestay 2020')
                ->elementLabel('Pendapatan Homestay Rp.')
                ->labels(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'])
                ->values([$pendapatan_1,$pendapatan_2,$pendapatan_3,$pendapatan_4,$pendapatan_5,$pendapatan_6,$pendapatan_7,$pendapatan_8,$pendapatan_9,$pendapatan_10,$pendapatan_11,$pendapatan_12])
                ->dimensions(1000,500)
                ->responsive(false);

            $bar = Charts::create('bar', 'highcharts')
                ->title("Data Jumlah Pemesanan Homestay 2020")
                ->elementLabel("Jumlah Pemesanan")
                ->labels(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'])
                ->values([$data_1,$data_2,$data_3,$data_4,$data_5,$data_6,$data_7,$data_8,$data_9,$data_10,$data_11,$data_12])
                ->dimensions(1000, 500)
                ->responsive(false);

            $komenBaik = DB::table('rating')->where('comment', 'LIKE', '%baik%')->orWhere('comment', 'LIKE', '%memuaskan%')->orWhere('comment', 'LIKE', '%mantap%')->count();
            $komenBuruk = DB::table('rating')->where('comment', 'LIKE', '%jelek%')->orWhere('comment', 'LIKE', '%kecewa%')->count();
            $komenNetral = DB::table('rating')->where('comment', 'LIKE', '%cukup%')->count();
            $pie  =	 Charts::create('pie', 'highcharts')
                ->title('Perbandingan Feedback Homestay')
                ->labels(['Feedback Positif', 'Feedback Negatif', 'Feedback Netral'])
                ->values([$komenBaik,$komenBuruk,$komenNetral])
                ->dimensions(1000,500)
                ->responsive(false);

            $rating_1 = DB::table('rating')->whereDate('created_at', '=', date('2020-01-d'))->avg('rating');
            if ($rating_1 == null) {
                $rating_1 = 0;
            }
            $rating_2 = DB::table('rating')->whereDate('created_at', '=', date('2020-02-d'))->avg('rating');
            if ($rating_2 == null) {
                $rating_2 = 0;
            }
            $rating_3 = DB::table('rating')->whereDate('created_at', '=', date('2020-03-d'))->avg('rating');
            if ($rating_3 == null) {
                $rating_3 = 0;
            }
            $rating_4 = DB::table('rating')->whereDate('created_at', '=', date('2020-04-d'))->avg('rating');
            if ($rating_4 == null) {
                $rating_4 = 0;
            }
            $rating_5 = DB::table('rating')->whereDate('created_at', '=', date('2020-05-d'))->avg('rating');
            if ($rating_5 == null) {
                $rating_5 = 0;
            }
            $rating_6 = DB::table('rating')->whereDate('created_at', '=', date('2020-06-d'))->avg('rating');
            if ($rating_6 == null) {
                $rating_6 = 0;
            }
            $rating_7 = DB::table('rating')->whereDate('created_at', '=', date('2020-07-d'))->avg('rating');
            if ($rating_7 == null) {
                $rating_7 = 0;
            }
            $rating_8 = DB::table('rating')->whereDate('created_at', '=', date('2020-08-d'))->avg('rating');
            if ($rating_8 == null) {
                $rating_8 = 0;
            }
            $rating_9 = DB::table('rating')->whereDate('created_at', '=', date('2020-09-d'))->avg('rating');
            if ($rating_9 == null) {
                $rating_9 = 0;
            }
            $rating_10 = DB::table('rating')->whereDate('created_at', '=', date('2020-10-d'))->avg('rating');
            if ($rating_10 == null) {
                $rating_10 = 0;
            }
            $rating_11 = DB::table('rating')->whereDate('created_at', '=', date('2020-11-d'))->avg('rating');
            if ($rating_11 == null) {
                $rating_11 = 0;
            }
            $rating_12 = DB::table('rating')->whereDate('created_at', '=', date('2020-12-d'))->avg('rating');
            if ($rating_12 == null) {
                $rating_12 = 0;
            }

            $barRating = Charts::create('bar', 'highcharts')
                ->title("Data Rating Homestay 2020")
                ->elementLabel("Rata Rating")
                ->labels(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'])
                ->values([$rating_1,$rating_2,$rating_3,$rating_4,$rating_5,$rating_6, $rating_7, $rating_8, $rating_9, $rating_10, $rating_11, $rating_12])
                ->dimensions(1000, 500)
                ->responsive(false);



            $user = Auth::user();
            return view('admin.dashboard.index', compact('data_1','data_2','data_3','data_4','data_5','data_6','data_7','data_8','data_9','data_10','data_11','data_12',
                'pendapatan_1','pendapatan_2','pendapatan_3','pendapatan_4','pendapatan_5','pendapatan_6',
                'pendapatan_7','pendapatan_8','pendapatan_9','pendapatan_10','pendapatan_11','pendapatan_12','line','bar', 'pie', 'barRating'));

        }
        else {
            $user = Auth::user();
            $city = City::all();
            $wisata = Wisata::all();
            return view('user.CariHomeStay', compact('user' ,'city', 'wisata'));
        }



    }
}
