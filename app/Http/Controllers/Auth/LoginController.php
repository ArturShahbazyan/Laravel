<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Session;



class LoginController extends Controller
{
    //
    public function show() {
    
        return view("login");
        
      }

      public function login(Request $request) {

        
        $rules = [
            "email" => "required|email",
            "password" => "required|min:6"
        ];

        
        $request->validate($rules);

        $credentials = $request->only('email', 'password');

          $auth = Auth::attempt($credentials);
          
          if($auth){
              return redirect('/');
          }else{
              return back()->with("error", "Wrong Login or Password");
              
          }
  }

  public function logout() {
        Auth::logout();
        Session::flush();
        return redirect('login');
  }

}