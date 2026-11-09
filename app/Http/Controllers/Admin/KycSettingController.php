<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\KycSettingUpdateRequest;
use App\Models\KycSetting;
use App\Services\NotificationService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class KycSettingController extends Controller
{
    public function index() : View
    {
        $kycSetting = KycSetting::first();
        return view('admin.kyc.kyc-setting.index', compact('kycSetting'));
    } // End Method

    // KYC Create Or Update
    public function update(KycSettingUpdateRequest $request) : RedirectResponse
    {
       //dd($request->all());
        KycSetting::updateOrCreate(
            ['id' => 1 ],
            $request->validated()
        );

        NotificationService::UPDATED();

        return redirect()->back();

    } // End Method


}
