<?php

namespace App\Services\Auth;

use App\Contracts\Dao\Auth\ForgotPasswordDaoInterface;
use App\Contracts\Services\Auth\ForgotPasswordServiceInterface;
use Illuminate\Http\Request;

class ForgotPasswordService implements ForgotPasswordServiceInterface
{
    /**
     * forgotPassword dao
     */
    private $forgotPasswordDao;
    
    /**
     * Class Constructor
     * @param ForgotPasswordDaoInterface
     * @return
     */
    public function __construct(ForgotPasswordDaoInterface $forgotPasswordDao)
    {
        $this->forgotPasswordDao = $forgotPasswordDao;
    }

    /**
     * To save passwordreset
     * @param Request $request request with inputs
     * @return Object $passwordreset saved passwordreset
     */
    public function savePasswordReset(Request $request,$token)
    {
        return $this->forgotPasswordDao->savePasswordReset($request,$token);
    }

    /**
     * To update password
     * @param Request $request request with inputs
     * @return Object $forgotpassword saved forgotpassword
     */
    public function updatePassword(Request $request)
    {
        return $this->forgotPasswordDao->updatePassword($request);
    }
}
