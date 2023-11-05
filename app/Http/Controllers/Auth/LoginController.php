<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
   // public function login(Request $request){

   //    $this->validate($request, [
   //       'login'    => 'required',
   //       'password' => 'required',
   //    ]);

   //    $login_type = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL )  ? 'email'  : 'username';

   //    $request->merge([
   //       $login_type => $request->input('login')
   //    ]);

   //    if (Auth::attempt($request->only($login_type, 'password'))) {
   //       return redirect()->intended($this->redirectPath());
   //    }

   //    return redirect()->back()
   //       ->withInput()
   //       ->withErrors([
   //             'login' => 'These credentials do not match our records.',
   //       ]);
   //    } 

   // }
}
