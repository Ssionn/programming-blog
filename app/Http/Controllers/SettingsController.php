<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Auth\LoginController;

class SettingsController extends Controller
{
    public function __construct(
        protected LoginController $loginController
    ) {
    }

    public function edit()
    {
        return view('settings.edit', [
            'user' => auth()->user()
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users,email,' . $request->user()->id],
        ]);

        if ($request->user()->provider_id !== null) {
            if ($request->email !== $request->user()->email) {
                return Redirect::route('settings.edit')->with('status', 'email-not-updated');
            }
        }

        $request->user()->username = $request->username;

        if ($request->user()->provider_id === null) {
            $request->user()->email = $request->email;
        }

        $request->user()->save();

        return Redirect::route('settings.edit')->with('status', 'username-updated');
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8'],
        ]);

        if (!Hash::check($request->password, $request->user()->password)) {
            return Redirect::route('settings.edit')->with('status', 'password-incorrect');
        }

        $user = $request->user();

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $user->delete();

        return Redirect::route('blogpost.index')->with('status', 'account-deleted');
    }
}
