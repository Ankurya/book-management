<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;


class LoginController extends Controller
{

    public function login(Request $request)
     {
        if($request->isMethod("GET")){
         return view("login");
         }
          if($request->isMethod("POST")){
            $this->validate($request, [
          'email' => 'required|email',
          'password' => 'required|min:6',
          ]);
        if(Auth::guard('user')->attempt(["email" => $request->get("email"),"password" => $request->get("password")])){
          return redirect(url('books.index'));
           }else {
            return redirect(url('login'))->with('error','email and password does not exist');
            }

    }
    }

    public function register(Request $request)
    {

        if ($request->isMethod("get")) {
            return view('register');
        }
        if ($request->isMethod("post")) {

            $data = [
                'name' => $request->get("name"),
                'email' => $request->get("email"),
                'phone' => $request->get("phone"),
                'password' => $request->get("password"),
            ];

            $register = User::create($data);
            if ($register) {
                return redirect('login')->with("success", "User details saved successfully");
            } else {
                return redirect('register')->with("error", "Unable to save user details");
            }

        }
    }

}
