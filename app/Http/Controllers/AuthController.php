<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember'); // to get the value of the rememper me checkBox.

        if (Auth::attempt($credentials, $remember)) { // attempt() is a laravel method that tryes to authinticate the user( accepts first parameter $credentials array, the second one is $remember to keep the user loged in by the cookies)
            return redirect()->intended('/'); // intended (after login, laravel will redirect the user to the page he wants to visit before login process), or will take him to the '/' main page by default if there no intended page
        } else {
            return redirect()->back()
                ->with('error', 'Invalid credentials');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
