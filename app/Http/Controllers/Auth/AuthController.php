<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Session;

class AuthController extends Controller
{
    // login view
    public function login() {
        return view('auth.login');
    }

    // register view
    public function registration() {
        return view('auth.registration');
    }

    // register form
    public function registerUser(Request $request)
    {
        // check validation
        $request->validate([
            'name'     => ['required'],
            'email'    => ['required', 'email', 'unique:users'],
            'password' => ['required']
        ]);

        // get input form request
        $name     = $request->input('name');
        $email    = $request->input('email');
        $password = $request->input('password');

        // create object and assigned value into object
        $user           = new User();
        $user->name     = $name;
        $user->email    = $email;
        $user->password = Hash::make($password);
        $res = $user->save();
        if($res) {
            return back()->with('success', 'Register successfullay');
        } else {
            return back()->with('failed', 'Something wrong');
        }
    }

    public function loginUser(Request $request)
    {
        // check validation
        $request->validate([
            'email'   => ['required'],
            'password' => ['required']
        ]);

        // get input value from request
        $email    = $request->input('email');
        $password = $request->input('password');
        // find email exist or not
        $user = User::where('email', $email)->first();
        if($user) {
            if(Hash::check($password, $user->password)) {
                $request->session()->put('loginId', $user->id);
                return redirect('dashboard');
            } else {
                return back()->with('failed', 'Password does not match');
            }

            return back()->with('success', 'Login successfully');
        } else {
            return back()->with('failed', 'This email is not registered');
        }
    }

    // dashboard
    public function dashboard()
    {
        if(Session::has('loginId')) {
            $user = User::where('id', Session::get('loginId'))->first();
        }
        return view('dashboard', [
            'user' => $user
        ]);
    }

    // logout
    public function logout()
    {
        if(Session::has('loginId')) {
            Session::pull('loginId');

            return redirect('login');
        }
    }
}
