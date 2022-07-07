<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request) {
        $title = 'Login';
        $error = $request->get('error') ?? false;
        $message = '';

        if ($error == 1) {
            $message = 'Usuário e ou senha não existe';
        }

        if ($error == 2) {
            $message = 'Necessário realizar login para ter acesso a página';
        }

        return view('site.login', compact('title', 'message'));
    }

    public function auth(Request $request) {
        //rules
        $rules = [
            'user' => 'email',
            'password' => 'required',
        ];

        //messages feedback
        $feedback = [
            'user.email' => 'O campo usuário (e-mail) é obrigatório',
            'password.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($rules, $feedback);

        $email = $request->get('user');
        $password = $request->get('password');

        $user = User::where('email', $email)->where('password', $password)->get()->first();

        if (!empty($user)) {
            session_start();
            $_SESSION['name']  = $user->name;
            $_SESSION['email']  = $user->email;

            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['error' => 1]);
        }
    }

    public function logout(Request $request) {

    }
}
