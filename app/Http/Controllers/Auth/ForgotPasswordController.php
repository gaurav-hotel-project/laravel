<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::PASSWORD_RESET) {
            return response()->json(['message' => 'A reset link has been sent to your email address.']);
        }

        return response()->json(['message' => __($status)], 500);
    }
}
