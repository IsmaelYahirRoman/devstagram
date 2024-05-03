@extends('layouts.app')

@section('titulo')
    Registrate en iGram
@endsection

@section('contenido')
<div class="md:flex md:justify-center md:gap-10 md:items-center">
    <div class="md:w-4/12 p-5">
        <img src="{{asset('img/usuario.png')}}" alt="Imagen resgistro de usuarios">
    </div>
    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg">
        <form method="POST" action="{{route('login')}}" novalidate>
            @csrf
            @if (session('mensaje'))
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                    {{session('mensaje')}}
                </p>
            @endif
            <div>
                <label for="email" id="email" class="md-2 block uppercase text-gray-500 font-bold">Email</label>
                <input type="text" id="email" name="email" placeholder="Tu email" class="borde p-3 w-full rounded-lg
                @error('email')
                    border-red-500
                @enderror" value="{{old('email')}}">
                @error('email')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center h-12"> {{$message}} </p>
                @enderror
            </div>
            <div>
                <label for="password" id="password" class="md-2 block uppercase text-gray-500 font-bold">Password</label>
                <input type="password" id="password" name="password" placeholder="Tu password" class="borde p-3 w-full rounded-lg
                @error('password')
                    border-red-500
                @enderror" value="{{old('password')}}">
                @error('password')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{$message}} </p>
                @enderror
            </div>
            <div>
                <input type="checkbox" name="remenber"><label class="text-gray-500 text-sm">Mantener mi sesión abierta</label>
            </div>
            <input type="submit" name="submit" value="Iniciar Sesión" class="bg-sky-600 hover:bg-sky-700 transitions-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg mt-5">
        </form>
    </div>
</div>
@endsection