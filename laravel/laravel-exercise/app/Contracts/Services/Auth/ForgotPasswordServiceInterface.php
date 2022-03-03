<?php

namespace App\Contracts\Services\Auth;

use Illuminate\Http\Request;

interface ForgotPasswordServiceInterface
{
    
    public function savePasswordReset(Request $request,$token);

    public function updatePassword(Request $request);
}
