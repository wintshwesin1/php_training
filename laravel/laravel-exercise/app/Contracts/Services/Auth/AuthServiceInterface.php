<?php

namespace App\Contracts\Services\Auth;

use Illuminate\Http\Request;

/**
 * Interface for auth service
 */
interface AuthServiceInterface
{
  
    /**
     * To Save user with values from request
     * @param Request $request request including inputs
     * @return Object user
     */
    public function saveUser(Request $request);

}
