<?php

namespace App\Contracts\Services\Auth;

use Illuminate\Http\Request;

/**
 * Interface for auth service
 */
interface AuthServiceInterface
{
  
  public function saveUser(Request $request);

}
