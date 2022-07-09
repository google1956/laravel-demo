<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function loginUser(Request $request)
    {
        echo 'Value posted';
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user =  User::where('email', '=', $request->email)->first();
        if ($user) { //success find this user with email input
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id); // put(key,value)
                return redirect('/');
            } else {
                return back()->with('fail', 'Login failed');
            }
        } else {
            return back()->with('fail', 'This email is not registered');
        }
    }

    public function registration()
    {
        return view("auth.registration");
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if ($res) {
            return back()->with('success', 'Successful registration');
        } else {
            return back()->with('fail', 'Something wrong');
        }
    }

    public function logout()
    {
        if (Session::has('loginId')) {
            Session::pull('loginId');
        }
        return redirect('login');
    }
}
