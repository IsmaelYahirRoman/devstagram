<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    function index(){
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Validación
        $validatedData = $request->validate([
            'name' => 'required|min:5',
            'username' => 'required|unique:users|min:3|max:30',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'
        ]);

        // Agregar username al request
        $request->merge(['username' => Str::slug($request->username)]);

        // Crear usuario
        $user = User::create([
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password'])
        ]);

        // Autenticar al usuario
        auth()->login($user);

        // Redireccionar
        return redirect()->route('posts.index', $user->username);
    }

}
