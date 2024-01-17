<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Devstagram - @yield('titulo')</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <header class="p-5 border-b bg-white shadow">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-black"> DevStagram</h1>

            @auth
                <nav class="flex gap-2">
                    <a class="font-bold uppercase text-gray-600 items-center" href="/">Hola: <span
                            class="font-normal lowercase">{{ auth()->user()->username }}</span></a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="font-bold uppercase text-gray-600 items-center" href="/logout">Cerrar
                            sesión</button>
                    </form>
                </nav>
            @endauth

            @guest
                <nav class="flex gap-2">
                    <a class="font-bold uppercase text-gray-600 items-center" href="/login">Login</a>
                    <a class="font-bold uppercase text-gray-600 items-center" href="{{ route('register') }}">Crear
                        cuenta</a>
                </nav>
            @endguest
        </div>

    </header>


    <main class="container mx-auto mt-10">
        <h2 class="font-black text-center text-3xl mb-10">@yield('titulo')</h2>

        @yield('contenido')

    </main>

    <footer class="text-center p-5 font-bold uppercase mt-10">
        DevStagram - Todos los derechos reservados {{ now()->year }}
    </footer>
</body>

</html>
