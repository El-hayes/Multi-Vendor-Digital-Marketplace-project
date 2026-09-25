<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\PasswordUpdateRequest;
use App\Http\Requests\Frontend\ProfileUpdateRequest;
use App\Services\NotificationService;
use App\Traits\FileUpload;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    // Call Trait to handle file upload
    use FileUpload;

    // Profile Method
    public function index(): View
    {
        $user = Auth::user();
        return view('frontend.dashboard.profile.index', compact('user'));
    } // End Method


    // Profile Update
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {

        $user = Auth::user();

        // handle file upload
        if ($request->hasFile('avatar')) {
            $avatarPath = $this->uploadFile($request->avatar);
            $user->avatar = $avatarPath;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->address = $request->address;
        $user->save();

        NotificationService::UPDATED();

        return redirect()->back();
    } // End Method




    public function updatePassword(PasswordUpdateRequest $request): RedirectResponse
    {
        $user = Auth::user();

        $user->password = bcrypt($request->password);
        $user->save();

        NotificationService::UPDATED();

        return redirect()->back();
    } // End Method


}
