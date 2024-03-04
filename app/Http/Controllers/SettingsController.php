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

    public function changePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => ['required', 'min:8'],
            'password' => ['required', 'min:8'],
        ]);

        if (! Hash::check($request->current_password, $request->user()->password)) {
            return Redirect::route('settings.edit')->with('status', 'password-incorrect');
        }

        $request->user()->password = Hash::make($request->password);

        $request->user()->save();

        return Redirect::route('settings.edit')->with('status', 'password-updated');
    }


    public function createOAuthPassword(Request $request): RedirectResponse
    {
        $request->validate([
            'oauth_password' => ['required', 'min:8'],
        ]);

        $request->user()->password = Hash::make($request->oauth_password);

        $request->user()->save();

        return Redirect::route('settings.edit')->with('status', 'oauth-password-updated');
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'delete_account' => ['required', 'min:8'],
        ]);

        if (! Hash::check($request->delete_account, $request->user()->password)) {
            return Redirect::route('settings.edit')->with('status', 'account-deleted-error');
        }

        $user = $request->user();

        $user->posts()->delete();

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $user->delete();

        return Redirect::route('blogpost.index')->with('status', 'account-deleted');
    }
}
