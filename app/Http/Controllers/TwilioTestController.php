<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lakshmaji\Twilio\Facade\Twilio;

class TwilioTestController extends Controller
{
    //
    public function testMesssage()
    {

        // initialize message array
        $message_array = array(
            'sender_id'     => 'TWILIO_USER_ID',
            'sender_secret' => 'TWILIO_USER_PASSWORD',
            'receiver_mobile' => '99999999999',
            'otp'     =>'325456',
            'sender' => 'TWILIO_SOURCE_MOBILE_NUMBER'
        );

        // This will send OTP only
        $sms_response = Twilio::message($message_array,$op="otp only", false, true,  false ); // otp

        return response()->json($sms_response,200);
    }
}
