@extends('layouts.app')

@section('titulo')
    Mi Muro
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:6/12 md:flex">
            <div class="md:w-8/12 lg:w6/12 px-5">
                <img src="{{ asset('img/usuario.svg') }}" alt="Imagen de usuario">
            </div>
            <div class="md:w-8/12 lg:w6/12 px-5">
                <p class="text-gray-700 text-2xl">{{ auth()->user()->username }}</p>
            </div>
        </div>
    </div>
@endsection
