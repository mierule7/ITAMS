<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PragmaRX\Google2FAQRCode\Google2FA;
use PragmaRX\Google2FAQRCode\QRCode\Chillerlan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TwoFactorAuthController extends Controller
{
    public function setup()
    {
        $google2fa = new Google2FA();
        $secret = $google2fa->generateSecretKey();

        $user = Auth::user();
        $user->google2fa_secret = $secret;
        $user->save();

        $qrCodeUrl = $google2fa->getQRCodeInline(
            config('app.name'),
            $user->email,
            $secret
        );

        return view('2fa.setup', compact('qrCodeUrl', 'secret'));
    }

    public function enable(Request $request)
    {
        $request->validate([
            'code' => 'required',
        ]);

        $user = Auth::user();
        $google2fa = new Google2FA();

        $valid = $google2fa->verifyKey(
            $user->google2fa_secret,
            $request->code
        );

        if ($valid) {
            $user->two_factor_enabled = true;
            $user->save();
            return redirect()->route('home')->with('success', '2FA enabled successfully!');
        }

        return back()->with('error', 'Invalid verification code');
    }

    public function disable(Request $request)
    {
        $user = Auth::user();
        $user->two_factor_enabled = false;
        $user->google2fa_secret = null;
        $user->save();

        return redirect()->route('home')->with('success', '2FA disabled successfully!');
    }

    public function verify()
    {
        return view('2fa.verify');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'code' => 'required',
        ]);

        $user = Auth::user();
        $google2fa = new Google2FA();

        $valid = $google2fa->verifyKey(
            $user->google2fa_secret,
            $request->code
        );

        if ($valid) {
            session(['2fa_verified' => true]);
            return redirect()->intended('home');
        }

        return back()->with('error', 'Invalid verification code');
    }
}
