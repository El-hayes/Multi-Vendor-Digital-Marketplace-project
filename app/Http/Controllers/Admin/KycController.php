<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KycVerification;
use App\Services\MailSenderService;
use App\Services\NotificationService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KycController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $kycRequests = KycVerification::with('user')->latest()->paginate(20);
        return view('admin.kyc.index', compact('kycRequests'));
    }


    /**
     * Display the specified resource.
     */
    public function show(KycVerification $kyc) : View
    {
        return view('admin.kyc.show', compact('kyc'));
    }

    /**
     * Download Attachments from storage.
     */
    public function downloadDocument(int $kycId , int $index)
    {
        $kyc = KycVerification::findOrFail($kycId);

        $attachPath = null;
        foreach (json_decode($kyc->documents) as $key => $document) {
            if ($key == $index) {
                $attachPath = $document;
            }
        } // End foreach

        if (storage::exists($attachPath)) {
            return Storage::download($attachPath);
        }

        abort(404);

    } // End Method

    /**
     * Update KYC Request Status.
     */
    public function updateStatus(Request $request,int $id)
    {
        $request->validate([
            'status' => ['required' , 'in:pending,approved,rejected'],
            'reason' => ['nullable' , 'string']
        ]);

        $kycRequest = KycVerification::with('user')->findOrFail($id);
        $kycRequest->status = $request->status;
        if ($kycRequest->status == 'approved') {
            // update user type & KYC status
            $kycRequest->user->update([
                'kyc_status' => 1,
                'user_type' => 'author'
            ]);
            $kycRequest->reject_reason = null;

            //Send Mail TO User
            MailSenderService::sendMail(
                name: $kycRequest->user->name,
                toMail: $kycRequest->user->email,
                mailSubject: __('Your KYC request has been approved.'),
                content: __('We Are Happy to inform you that your KYC request has been approved.')

            ); // End Sending Mail
        } elseif($request->status == 'rejected') {
            $kycRequest->user->update([
                'kyc_status' => 0,
                'user_type' => 'user'
            ]);

            // Update Reject Reason if found
            $kycRequest->reject_reason = $request->reason;


            MailSenderService::sendMail(
                name: $kycRequest->user->name,
                toMail: $kycRequest->user->email,
                mailSubject: __('Your KYC request has been rejected.'),
                content: $request->reason ?? __('We Are Sorry to inform you that your KYC request has been rejected.')
            );
        } else {
            $kycRequest->user->update([
                'kyc_status' => 0,
            ]);
        }

        $kycRequest->save();
        NotificationService::UPDATED();
        return redirect()->route('admin.kyc.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
