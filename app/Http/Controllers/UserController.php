<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('listar_avaliacao');
    }
}
