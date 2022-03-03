<?php

namespace App\Contracts\Services\Auth;

use Illuminate\Http\Request;

interface ForgotPasswordServiceInterface
{
    /**
     * To Save passwordreset with values from request
     * @param Request $request request including inputs
     * @return Object passwordreset
     */
    public function savePasswordReset(Request $request,$token);

    /**
     * To update password with values from request
     * @param Request $request request including inputs
     * @return Object password
     */
    public function updatePassword(Request $request);
}
