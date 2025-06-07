<?php

namespace App\Http\Controllers;

use App\Mail\EmailVerification;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        // $user = User::find(7);
        // try {
        //     Mail::to($user->email)->send(new EmailVerification($user));
        //     Log::info('Email sent: ');
        // } catch (Exception $e) {
        //     Log::error('Email not sent. Error: ', [
        //         'message' => $e->getMessage(),
        //         'file' => $e->getFile(),
        //         'line' => $e->getLine(),
        //     ]);
        // }

        return view('portal.dashboard.index');
        // return view('emails.email-verification', compact('user'));
    }
    public function analytics(Request $request)
    {
        return view('portal.analytics.index');
    }
}
