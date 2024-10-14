<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function view()
    {
        return view('login');
    }
    public function dologout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function dologin(Request $request)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('login')->withErrors($validator)->withInput($request->except('password'));
        } else {
            $userdata = array(
                'email' => $request->get('email'),
                'password' => $request->get('password')
            );
            if (Auth::attempt($userdata)) {
                return redirect()->route('home');
            } else {
                return redirect()->route('login')->with('error', 'Invalid user');
            }
        }
    }

}
