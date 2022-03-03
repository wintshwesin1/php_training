<?php

namespace App\Contracts\Dao\Auth;

use Illuminate\Http\Request;

interface ForgotPasswordDaoInterface
{
    /**
     * To Save passwordreset with values from request
     * @param Request $request request including inputs
     * @return Object passwordreset
     */
    public function savePasswordReset(Request $request,$token);

}
