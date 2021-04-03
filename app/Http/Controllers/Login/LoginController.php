<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Scoreboard;
use App\User;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */

    public function showLoginForm()
    {
        return view('login.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $scoreData = Scoreboard::select('id', 'user_id', 'attempt')->where('user_id', Auth::user()->id)->get();
            $AllscoreData = Scoreboard::select('id', 'user_id', 'attempt')->get();
            $AllUserData = User::select('*')->get();
            return  view('admin.dashboard', ['scoreData' => $scoreData, 'allscoredata' => $AllscoreData, 'AllUserData' => $AllUserData]);
        } else {
            Session::flash('error', 'Invalid Username/password');
            return redirect()->back()->withInput();
        }
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
