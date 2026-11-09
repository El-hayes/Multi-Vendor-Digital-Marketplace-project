<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\KycVerificationStoreRequest;
use App\Models\KycSetting;
use App\Models\KycVerification;
use App\Services\NotificationService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Traits\FileUpload;


class KycVerificationController extends Controller
{
    // Call Trait to handle file upload
    use FileUpload;

    public function index() : View
    {

        $kycSetting = KycSetting::first();
        return view('frontend.pages.kyc', compact('kycSetting'));
    } // End method


    // Store KYC verification
    public function store(KycVerificationStoreRequest $request) : RedirectResponse
    {
        $path = [];
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $file) {
                $path[] = $this->uploadFile($file , disk:'local');
            }
        }


       KycVerification::create([
           'user_id' => auth()->guard('web')->user()->id,
           'document_type' => $request->document_type,
           'document_number' => $request->document_number,
           'documents' => json_encode($path),
       ]);

        NotificationService::CREATED(__('Your KYC verification request has been submitted.'));

        return to_route('dashboard');

    } // End Method


}
