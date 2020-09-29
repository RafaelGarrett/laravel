<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request) {
        // passando somente os campos selecionados
        $credentials = $request->only(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return redirect()->back()->withErrors('Usuário e/ou senha incorretos');
        }
        return redirect()->route('listar_avaliacao');
    }

    public function index(Request $request) {
        return view('autenticacao.login');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }

}
