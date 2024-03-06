<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function showResetForm()
    {
        return view('auth.passwords.reset');
    }

    public function reset()
    {
        //
    }
}
