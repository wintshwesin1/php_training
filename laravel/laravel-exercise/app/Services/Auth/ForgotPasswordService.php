<?php

namespace App\Services\Auth;

use App\Contracts\Dao\Auth\ForgotPasswordDaoInterface;
use App\Contracts\Services\Auth\ForgotPasswordServiceInterface;
use Illuminate\Http\Request;

class ForgotPasswordService implements ForgotPasswordServiceInterface
{
    
    private $forgotPasswordDao;
    
    public function __construct(ForgotPasswordDaoInterface $forgotPasswordDao)
    {
        $this->forgotPasswordDao = $forgotPasswordDao;
    }

    
    public function savePasswordReset(Request $request,$token)
    {
        return $this->forgotPasswordDao->savePasswordReset($request,$token);
    }

    public function updatePassword(Request $request)
    {
        return $this->forgotPasswordDao->updatePassword($request);
    }
}
