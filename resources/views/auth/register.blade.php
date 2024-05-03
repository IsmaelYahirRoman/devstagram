@extends('layouts.app')

@section('titulo')
    Registrate en iGram
@endsection

@section('contenido')
<div class="md:flex md:justify-center md:gap-10 md:items-center">
    <div class="md:w-4/12 p-5">
        <img src="{{asset('img/crearcuenta.png')}}" alt="Imagen resgistro de usuarios">
    </div>
    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg">
        <form action="{{ route('register') }}" method="POST" novalidate>
            @csrf
            <div>
                <label for="name" id="name" class="md-2 block uppercase text-gray-500 font-bold">Nombre</label>
                <input type="text" id="name" name="name" placeholder="Tu nombre" class="borde p-3 w-full rounded-lg
                @error('name')
                    border-red-500
                @enderror" value="{{old('name')}}">
                @error('name')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{$message}} </p>
                @enderror
            </div>
            <div>
                <label for="username" id="username" class="md-2 block uppercase text-gray-500 font-bold">Usuario</label>
                <input type="text" id="username" name="username" placeholder="Tu nombre de usuario" class="borde p-3 w-full rounded-lg 
                @error('username')
                    border-red-500
                @enderror" value="{{old('username')}}">
                @error('username')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{$message}} </p>
                @enderror
            </div>
            <div>
                <label for="email" id="email" class="md-2 block uppercase text-gray-500 font-bold">Email</label>
                <input type="text" id="email" name="email" placeholder="Tu email" class="borde p-3 w-full rounded-lg
                @error('email')
                    border-red-500
                @enderror" value="{{old('email')}}">
                @error('email')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{$message}} </p>
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
                <label for="password_confirmation" id="password_confirmation" class="md-2 block uppercase text-gray-500 font-bold">Confirmacion de Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Repite tu Password" class="borde p-3 w-full rounded-lg" value="{{old('password_confirmation')}}">
            </div>
            <input type="submit" name="submit" value="Crear Cuenta" class="bg-sky-600 hover:bg-sky-700 transitions-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg mt-5">
        </form>
    </div>
</div>
@endsection