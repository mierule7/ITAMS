<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // ...

    protected function authenticated(Request $request, $user)
    {
        if ($user->two_factor_enabled) {
            auth()->logout();
            $request->session()->put('2fa:user:id', $user->id);
            return redirect()->route('2fa.verify');
        }

        return redirect()->intended($this->redirectPath());
    }
}
