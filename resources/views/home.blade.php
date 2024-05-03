@extends('layouts.app')

@section('titulo')
    Igram
@endsection

@section('contenido')

    <x-listar-post :posts="$posts"/>

@endsection
