<?php

namespace App\Http\Controllers;

use App\Models\User_master;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Function to show login form
    public function login_form()
    {
        return view('login_page');
    }

    public function authenticate(Request $request)
    {
        
        $find_user = User_master::where('username','=', $request->username)->first();
        if($find_user)
        {
            $user_id = $find_user->id;
            // If the username matches
            if($find_user->password == md5($request->password))
            {
                // If the password matches then ....
                session(['user' => $user_id]);

                return redirect('/home');
            }
        }
    }
}
