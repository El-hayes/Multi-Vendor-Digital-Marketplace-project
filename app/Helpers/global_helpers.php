<?php

use  Illuminate\Support\Facades\Auth;
use App\Models\KycVerification;

//  GET Login User
if (!function_exists('user'))
{
    function user()
    {
        return Auth::guard('web')->user();
    }
}


// Get Pending KYC Count
if (!function_exists('pendingKycCount')){
    function pendingKycCount() : int
    {
        return KycVerification::whereStatus('pending')->count();
    }

}
