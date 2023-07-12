<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    function logIn()
    {
        return view('admin.auth.log-in');
    }

    function authenticate(Request $request)
    {
        $formDate=$request->validate([
            'email'=>['required','email'],
            'password'=>'required'
        ]);
        if(auth()->attempt($formDate)){
            $request->session()->regenerate();
            return redirect('/admin')->with('message','you are now loggin');
        }
        return back()->withErrors(['email'=>'email increate or password'])->onlyInput('email');
    }

    function logOut(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message','user logout successfully') ;
    }
}
