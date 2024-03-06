<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function show()
    {
        return view('auth.verify');
    }

    public function verify(Request $request)
    {
        if (! $request->user()->hasVerifiedEmail()) {
            $request->user()->markEmailAsVerified();

            return redirect()->route('blogpost.index');
        }

        return redirect()->route('blogpost.index');
    }

    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->route('blogpost.index');
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('resent', true);
    }
}
