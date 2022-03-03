<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Contracts\Services\Auth\ForgotPasswordServiceInterface;
use Illuminate\Http\Request;
use DB; 
use Carbon\Carbon; 
use App\Models\User; 
use Mail; 
use Hash;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function __construct(ForgotPasswordServiceInterface $forgotpasswordServiceInterface)
    {
        $this->forgotpasswordInterface = $forgotpasswordServiceInterface;
    }

    public function showForgetPasswordForm()
    {
        return view('auth.forgetPassword');
    }
    
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
    
        $token = Str::random(64);
        $passwordReset = $this->forgotpasswordInterface->savePasswordReset($request, $token);
    
        return back()->with('message', 'We have e-mailed your password reset link!');
    }
        
    public function showResetPasswordForm($token) { 
        return view('auth.forgetPasswordLink', ['token' => $token]);
    }
    
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $changePassword = $this->forgotpasswordInterface->updatePassword($request);
    
        return redirect('/login')->with('message', 'Your password has been changed!');
        }
}
