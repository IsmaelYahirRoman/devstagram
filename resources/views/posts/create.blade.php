@extends('layouts.app')

@section('titulo')
    Crear una nueva publicación
@endsection

<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css"/>

@push('styles')
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
@endpush

@section('contenido')

    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10 ">
            <form method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center" action="{{ route('imagenes.store') }}">
                @csrf
            </form>
        </div>

        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            <form method="POST" action="{{route('posts.store')}}" novalidate>
                @csrf
                <div>
                    <label for="titulo" class="md-2 block uppercase text-gray-500 font-bold">Titulo</label>
                    <input type="text" id="titulo" name="titulo" placeholder="Titulo de la publicacion" class="border p-3 w-full rounded-lg
                    @error('titulo')
                        border-red-500
                    @enderror" value="{{old('titulo')}}">
                    @error('titulo')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center h-12"> {{$message}} </p>
                    @enderror
                </div>
                <div>
                    <label for="descripcion" class="md-2 block uppercase text-gray-500 font-bold">Descripción</label>
                    <textarea name="descripcion" id="descripcion" placeholder="Descripción de la Publicación" class="border p-3 w-full rounded-lg @error('descripcion')
                        border-red-500
                    @enderror"> {{ old('descripcion') }} </textarea>
                    @error('descripcion')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <input name="imagen" type="hidden" 
                        value=" {{old('imagen')}} "
                    >
                    @error('imagen')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{$message}} </p>
                    @enderror
                </div>
                <input type="submit" value="Publicar" class="bg-sky-600 hover:bg-sky-700 transitions-colors cursor-pointer uppercase font-bold w-full p-4 mt-2 text-white rounded-lg">
            </form>
        </div>
    </div>
    
@endsection