<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Contracts\Services\Auth\AuthServiceInterface;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;

/**
 * This is Auth controller.
 * This handles Authentication processing.
 */
class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AuthServiceInterface $authServiceInterface)
    {
        $this->authInterface = $authServiceInterface;
    }

    /**
     * To show login view
     * 
     * @return View login form
    */
    public function index()
    {
        return view('auth.login');
    }  
    
    /**
     * To show registration view
     * 
     * @return View Registration form
    */
    public function registration()
    {
        return view('auth.registration');
    }
      
    /**
     * To check login data.
     * If valid redirect to dashboard page.
     * If not redirect to login page.
     * @param LoginRequest $request Request from login
     * @return View dashboard 
     */
    public function postLogin(LoginRequest $request)
    {
        $request->validated();
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('You have Successfully loggedin');
        }

        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }
    
    /**
     * To submit registration view
     * @param UserRegisterRequest $request Request from registrantion form
     * @return View dashboard
     */
    public function postRegistration(UserRegisterRequest $request)
    {  
        $user = $this->authInterface->saveUser($request);
        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }
    
    /**
     * To show dashboard view
     *
     * @return View dashboard view
     */
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
    
    /**
     * @return View login view
     */
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
