<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use DB;


class RegisterController extends Controller
{
    //

    public function show() {

        return view('register');
    }


    public function register(Request $request) {

 /* print_r($request->input());
        $firstname = $request->input('firstName');
        $lastname = $request->input('lastName');
        $email = $request->input('email');
        $password = $request->input('password');

       DB::insert("INSERT INTO users (firstname, lastname, email, password) VALUES (?,?,?,?)",
      [$firstname, $lastname, $email, $password]); */



    $rules = [
      'firstname' => 'required|string|max:255',
      'lastname' => 'required|string|max:255',
      'email' => 'required|email',
      'password' => 'required|min:6',
    ];

    $request->validate($rules);

     User::create([
        'firstname' => $request->input('firstname'),
        'lastname' => $request->input('lastname'),
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password')),
    ]);

    return redirect('login');

    }
}