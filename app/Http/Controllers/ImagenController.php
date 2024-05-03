<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request){
        if($request -> hasFile('images')){
            $imagen=$request->file('images');
            $nombreImagen=Str::uuid() . "." . $imagen->extension();
            $imagenServidor=Image::make($imagen);
            $imagenServidor->fit(1000,1000);
            $imagenPath=public_path('uploads') . '/' . $nombreImagen;
            $imagenServidor->save($imagenPath);
        }
        return response()->json(['images' => $nombreImagen]);
    }
}
