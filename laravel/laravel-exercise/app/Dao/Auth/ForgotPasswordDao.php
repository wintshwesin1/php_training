<?php

namespace App\Dao\Auth;

use App\Contracts\Dao\Auth\ForgotPasswordDaoInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; 
use Mail;
use Hash;


class ForgotPasswordDao implements ForgotPasswordDaoInterface
{
  
    public function savePasswordReset(Request $request,$token)
    {
        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
        ]);
            
        Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });
    }

    public function updatePassword(Request $request)
    {
        $updatePassword = DB::table('password_resets')
                            ->where([
                                'email' => $request->email, 
                                'token' => $request->token
                            ])
                            ->first();
    
        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }
    
        $user = User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);
    
        DB::table('password_resets')->where(['email'=> $request->email])->delete();
    }

  
}
