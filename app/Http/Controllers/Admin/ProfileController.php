<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PasswordUpdateRequest;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Services\NotificationService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Traits;
use App\Traits\FileUpload;

class ProfileController extends Controller
{
    use FileUpload;  // img handling using Trait

    // Profile method start
    public function index () : View
    {
        return view('admin.profile.index');
    } // End Method


    // Profile Update start
    public function update (ProfileUpdateRequest $request) : RedirectResponse {

        $user = Auth()->guard('admin')->user();

        if($request->hasFile('avatar')) {
           // @unlink(public_path($user->avatar));
           $this->deleteFile($user->avatar);
            $avatarPath = $this->uploadFile($request->file('avatar'));
            $user->avatar = $avatarPath;
        }

        $user->name  = $request->name;
        $user->email =  $request->email;
        $user->save();

        NotificationService::UPDATED();

        return redirect()->back();


    } // end method


    // Profile Update start
    public function updatePassword (PasswordUpdateRequest $request) : RedirectResponse {

        $user = Auth()->guard('admin')->user();

        $user->password  = bcrypt($request->password);
        $user->save();

        NotificationService::UPDATED();

        return redirect()->back();


    } // end method


}
