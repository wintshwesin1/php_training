<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Contracts\Services\Auth\ForgotPasswordServiceInterface;
use App\Http\Requests\ForgetPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Http\Request;
use DB; 
use Carbon\Carbon; 
use App\Models\User; 
use Mail; 
use Hash;
use Illuminate\Support\Str;

/**
 * This is ForgotPassword controller.
 * This handles ForgotPassword processing.
 */
class ForgotPasswordController extends Controller
{
    /**
     * task interface
    */
    private $forgotpasswordInterface;

    /**
     * Create a new controller instance.
     * @param ForgotPasswordServiceInterface $forgotpasswordServiceInterface
     * @return void
     */
    public function __construct(ForgotPasswordServiceInterface $forgotpasswordServiceInterface)
    {
        $this->forgotpasswordInterface = $forgotpasswordServiceInterface;
    }

    /**
     * To show forgetPassword view
     * 
     * @return View forgetPassword
    */
    public function showForgetPasswordForm()
    {
        return view('auth.forgetPassword');
    }
    
    /**
     * To submit forgetPassword view.
     * 
     * @param  ForgetPasswordRequest $request Request from ForgetPassword
     * @return View forgetPassword view
     */
    public function submitForgetPasswordForm(ForgetPasswordRequest $request)
    {
        $request->validated();
        $token = Str::random(64);
        $passwordReset = $this->forgotpasswordInterface->savePasswordReset($request, $token);
    
        return back()->with('message', 'We have e-mailed your password reset link!');
    }
     
    /**
     * To show resetPassword view
     * 
     * @return View forgetPasswordLink
    */
    public function showResetPasswordForm($token) { 
        return view('auth.forgetPasswordLink', ['token' => $token]);
    }
    
    /**
     * To submit ResetPassword view.
     * 
     * @param  ResetPasswordRequest $request Request from ResetPassword
     * @return View login view
     */
    public function submitResetPasswordForm(ResetPasswordRequest $request)
    {
        $request->validated();
        $changePassword = $this->forgotpasswordInterface->updatePassword($request);
    
        return redirect('/login')->with('message', 'Your password has been changed!');
    }
}
