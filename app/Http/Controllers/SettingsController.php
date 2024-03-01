<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        // dd($request->username, $request->email);
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users,email,' . $request->user()->id],
        ]);

        if ($request->user()->provider_id !== null) {
            $request->validate([
                'email' => ['nullable'],
            ]);
        }

        $request->user()->username = $request->username;

        if ($request->user()->provider_id === null) {
            $request->user()->email = $request->email;
        }


        $request->user()->save();

        return Redirect::route('settings.edit')->with('status', 'username-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        return $this->loginController->sessionInvalidationAndRedirect($request);
    }
}
