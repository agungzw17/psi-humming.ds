<?php

namespace App\Http\Controllers;

use App\FotoHomestay;
use App\Homestay;
use App\HomestayDetail;
use App\Http\Requests\HomestayRequest;
use App\Pembayaran;
use http\Client\Curl\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class PembayaranController extends Controller
{
    //
    public function store(Request $request)
    {
        $pembayaran = Pembayaran::all();
        foreach($pembayaran as $h) {
            if ($h -> homestay_id == $request -> homestay_id) {
                \Session::flash('error', "Maaf Homestay sudah dibooking");
                return Redirect::back();
            }
        }
        $to = \Carbon\Carbon::createFromFormat('Y/m/d', $request->check_in);
        $from = \Carbon\Carbon::createFromFormat('Y/m/d', $request->check_out);
        $count_date = $to->diffInDays($from);
        $total_harga = $request->total_harga * $count_date;
        $input = $request -> all();
        $input['total_harga']=$total_harga;
        Pembayaran::create($input);

        $user = \App\User::all()->where('id', $request->user_id);
        foreach ($user as $us){
            $to_name = $us->name;
            $to_email = $us->email;
            $data = array('name'=>$us->name, 'body' => 'Untuk lebih lanjut anda dapat mentransfer ke rekening "111111111" senilai '.$total_harga.' rupiah selama '. $count_date . ' hari dan konfirmasi bukti pembayaran ke WhatsApp 0811111111');
            Mail::send('email.test', $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                    ->subject('Selamat, Transaksi Homestay Anda Berhasil');
                $message->from('My-Inn@gmail.com','Owner My-In');
            });



        }





        \Session::flash('message', "Berhasil Silakan check EMAIL ANDA untuk pengiriman biaya");
        return Redirect::back();
    }

}
