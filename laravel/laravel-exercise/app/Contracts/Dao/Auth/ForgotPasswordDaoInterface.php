<?php

namespace App\Contracts\Dao\Auth;

use Illuminate\Http\Request;

interface ForgotPasswordDaoInterface
{
    
    public function savePasswordReset(Request $request,$token);

}
