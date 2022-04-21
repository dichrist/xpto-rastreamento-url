<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    /**
     * Display the login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Check if user exists on the table.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $login = $request->login;
        $password = $request->password;

        if (Auth::attempt(['login' => $login, 'password' => sha1($password)]))
        {
            return redirect()->intended('admin.panel');
        }


        return redirect()->route('admin.panel');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front.register');
    }

    /**
     * Record user on the table.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required'
        ]);

        $user = new User;

        $user->login = $request->login;
        $user->password = sha1($request->password);

        $user->save();

        $request->session()->flash('message', 'Usuário cadastrado com sucesso!');

        return redirect()->route('user.login');
    }

}
