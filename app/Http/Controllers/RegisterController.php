<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterFormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class RegisterController extends Controller
{
    public function create(Request $request) {
        return view('autenticacao.register');
    }

    public function store(RegisterFormRequest $request) {
        // todas as informações, menos o token
        $data = $request->except('_token');
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        Auth::login($user);
        return redirect()->route('listar_avaliacao');
    }
}
