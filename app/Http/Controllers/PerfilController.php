<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Models\User;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request)
    {
        //Modificar
        //$request->request->add(['username'=> Str::slug($request->username)]);

        $validatedData = $request->validate([
            'username' => ['required', 'unique:users,username,' .auth()->user()->id, 'min:3', 'max:30', 
            'not_in:twitter,editar-perfil'],

        ]);

        if($request->imagen)
        {
            $imagen=$request->file('imagen');
            $nombreImagen=Str::uuid() . "." . $imagen->extension();
            $imagenServidor=Image::make($imagen);
            $imagenServidor->fit(1000,1000);
            $imagenPath=public_path('perfiles') . '/' . $nombreImagen;
            $imagenServidor->save($imagenPath);
        }

        // Guardar cambios
        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
        $usuario->save();

        //Redireccionar
        return redirect()->route('posts.index', $usuario->username);



    }
}