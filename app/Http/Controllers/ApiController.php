<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Doctor;


class ApiController extends Controller
{
    // public function send_mobile_verify_otp(Request $request)
    // {
    //     $otp = rand('1000', '9999');
    //     $msg = 'Your OTP verification code for registration is ' . $otp . '. Amruta Hatcheries & Foods.';
    //     $msg = urlencode($msg);
    //     $to = $request->mobile;
    //     $data1 = "uname=habitm1&pwd=habitm1&senderid=AMFOOD&to=" . $to . "&msg=" . $msg . "&route=T&peid=1001880907683289176&tempid=1007313590255895609";
    //     $ch = curl_init('http://bulksms.webmediaindia.com/sendsms?');
    //     curl_setopt($ch, CURLOPT_POST, true);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $data1);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     $result = curl_exec($ch);
    //     curl_close($ch);
    //     return response()->json($otp);
    // }
    // Check User
    public function user_registration(Request $request)
    {
        $user = Doctor::where('username', '=', $request->username)
        ->first();
        if ($user && Hash::check($request->password, $user->password))


        {
        

            $otp = rand('1000', '9999');
            $msg = 'Your OTP verification code for registration is ' . $otp . '. Amruta Hatcheries & Foods.';
            $msg = urlencode($msg);
            $to =$user->mobile;
            $data1 = "uname=habitm1&pwd=habitm1&senderid=AMFOOD&to=" . $to . "&msg=" . $msg . "&route=T&peid=1001880907683289176&tempid=1007313590255895609";
            $ch = curl_init('http://bulksms.webmediaindia.com/sendsms?');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);
            return response()->json($otp);        } else {
            // dd(1);
            //create new user
          
            return response()->json(['status' => false, 'message' => 'User Not Found']);       
        }
    }
}
