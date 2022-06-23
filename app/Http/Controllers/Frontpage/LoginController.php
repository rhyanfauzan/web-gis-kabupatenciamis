<?php

namespace App\Http\Controllers\Frontpage;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('frontpage.login.index');
    }

    public function doLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $credentials['email'])->first();
        $valid = false;
        $message = '';
        if ($user)
        {
            if (Auth::attempt($credentials))
            {
                $request->session()->put('role', $user->role);
                $valid = true;
            } else {
                $message = 'Password salah';
            }
        } else
        {
            return $user;
        }
        if ($valid)
        {
            return redirect()->route('backend.home.index');
        } else
        {
            return redirect()->route('frontpage.login.index')->with('message', $message);
        }
    }
}
