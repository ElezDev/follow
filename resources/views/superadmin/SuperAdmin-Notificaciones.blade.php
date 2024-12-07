<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <title>Etapa Productiva</title>
    <style>
        #userMenu {
            top: 100%;
            margin-top: 0.5rem;
        }

        .user-status {
            text-align: center;
            /* Centrar el texto */
            color: #009e00;
            /* Color verde */
            margin-top: 5px;
            /* Espacio superior para alineación */
            font-size: 12px;
            /* Ajustar el tamaño de fuente */
        }
    </style>
</head>

<body class="font-['Arial',sans-serif] bg-white m-0 flex flex-col min-h-screen">
    
    
    @include('partials.header')

    <nav class="bg-[#009e00] px-2.5 h-14 py-1.5 flex justify-end items-center relative z-10">

        {{-- FIN Barra Azul --}}

        <div class="w-full flex justify-center">
            <ul class="horizontal-list flex space-x-4 justify-center items-center">
                <li>
                    <a href="{{ route('superadmin.home') }}"
                        class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="{{ route('superadmin.SuperAdmin-Administrator') }}"
                        class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                        Administrador

                    </a>
                </li>
                <li>
                    <a href="{{ route('superadmin.SuperAdmin-Instructor') }}"
                        class="block text-center text-white px-4 py-2 rounded-lg {{ request()->routeIs('superadmin.SuperAdmin-Instructor') ? 'bg-green-600 bg-opacity-70' : 'bg-green-600 bg-opacity-20 hover:bg-opacity-50' }}">
                        <span class="font-bold">
                            Instructor
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('superadmin.SuperAdmin-Aprendiz') }}"
                        class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                        Aprendices
                    </a>
                </li>
                <li>
                    <a href="{{ route('superadmin.SuperAdmin-Graficas') }}"
                        class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                        Graficas
                    </a>
                </li>
                <button id="notifButton" class="absolute right-0 mr-4">
                    <a href="{{ route('superadmin.SuperAdmin-Notificaciones') }}">
                        <img class="w-[50px] h-auto filter invert" src="{{ asset('img/notificaciones.png') }}"
                            alt="Notificaciones">
                    </a>
                </button>
            </ul>
        </div>





    </nav>

    <div class="w-full flex justify-between items-center mt-6">
        <a href="{{ route('superadmin.home') }}" class="ml-4">
            <img src="{{ asset('img/flecha.png') }}" alt="Flecha" class="w-5 h-auto">
        </a>
    </div>

    <div class="w-full flex justify-center mt-4 items-center mb-2 bg-white">
        <form action="#" method="GET" class="flex items-center">
            <input type="text" name="q" placeholder="Buscar..."
                class="px-2 py-1 text-sm border border-black rounded-full w-96">
            <button type="submit" aria-label="Buscar" class="p-2 bg-transparent border-none cursor-pointer -ml-10">
                <img src="{{ asset('img/lupa.png') }}" alt="Buscar" class="w-4 h-auto">
            </button>
        </form>
    </div>


    <div class="w-auto flex justify-start m-2 pl-56 items-center">
        <a href="{{ route('superadmin.SuperAdmin-Redactar') }}" type="submit"
            class="bg-gray-300 hover:bg-gray-400  text-black p-1 rounded">Redactar</a>
    </div>
    <div class="flex justify-center">
        <main
            class="bg-white m-4 p-4 rounded-lg shadow-[0_0_10px_rgba(0,0,0,0.8)] border-[#2F3E4C] w-2/3 items-center">
            <div class="flex justify-center">
                <button type="button" class="hover:bg-gray-200 m-4 pr-28 pl-28 p-2 rounded active-button"
                    onclick="setActive(this)">Recibidos</button>
                <button type="button" class="hover:bg-gray-200 m-4 pl-28 pr-28 p-2 rounded"
                    onclick="setActive(this)">Enviados</button>
            </div>
            <ul class="bg-white shadow overflow-hidden sm:rounded-md">
                <li class="border-t border-gray-200">
                    <div class="flex justify-between items-center p-4 hover:bg-gray-100">
                        <div>
                            <h2 class="text-lg font-bold">Título de la Notificación</h2>
                            <p class="text-gray-600">Asunto de la Notificación</p>
                            <p class="text-gray-600">Fecha</p>
                        </div>
                        <div class="flex items-center">
                            <a href="{{ route('superadmin.email') }}">
                                <button class="bg-[#009e00] text-white p-2 rounded ml-2">Ver</button>
                            </a>
                            <button class="bg-gray-300 text-black p-2 rounded ml-2">Eliminar</button>
                        </div>
                    </div>
                </li>
                <li class="border-t border-gray-200">
                    <div class="flex justify-between items-center p-4 hover:bg-gray-100">
                        <div>
                            <h2 class="text-lg font-bold">Título de la Notificación</h2>
                            <p class="text-gray-600">Cuerpo de la Notificación</p>
                            <p class="text-gray-600">Fecha</p>
                        </div>
                        <div class="flex items-center">
                            <a href="{{ route('superadmin.email') }}">
                                <button class="bg-[#009e00] text-white p-2 rounded ml-2">Ver</button>
                            </a>
                            <button class="bg-gray-300 text-black p-2 rounded ml-2">Eliminar</button>
                        </div>
                    </div>
                </li>
                <li class="border-t border-gray-200">
                    <div class="flex justify-between items-center p-4 hover:bg-gray-100">
                        <div>
                            <h2 class="text-lg font-bold">Título de la Notificación</h2>
                            <p class="text-gray-600">Cuerpo de la Notificación</p>
                            <p class="text-gray-600">Fecha</p>
                        </div>
                        <div class="flex items-center">
                            <a href="{{ route('superadmin.email') }}">
                                <button class="bg-[#009e00] text-white p-2 rounded ml-2">Ver</button>
                            </a>
                            <button class="bg-gray-300 text-black p-2 rounded ml-2">Eliminar</button>
                        </div>
                    </div>
                </li>
                <li class="border-t border-gray-200">
                    <div class="flex justify-between items-center p-4 hover:bg-gray-100">
                        <div>
                            <h2 class="text-lg font-bold">Título de la Notificación</h2>
                            <p class="text-gray-600">Cuerpo de la Notificación</p>
                            <p class="text-gray-600">Fecha</p>
                        </div>
                        <div class="flex items-center">
                            <a href="{{ route('superadmin.email') }}">
                                <button class="bg-[#009e00] text-white p-2 rounded ml-2">Ver</button>
                            </a>
                            <button class="bg-gray-300 text-black p-2 rounded ml-2">Eliminar</button>
                        </div>
                    </div>
                </li>
                <li class="border-t border-gray-200">
                    <div class="flex justify-between items-center p-4 hover:bg-gray-100">
                        <div>
                            <h2 class="text-lg font-bold">Título de la Notificación</h2>
                            <p class="text-gray-600">Cuerpo de la Notificación</p>
                            <p class="text-gray-600">Fecha</p>
                        </div>
                        <div class="flex items-center">
                            <a href="{{ route('superadmin.email') }}">
                                <button class="bg-[#009e00] text-white p-2 rounded ml-2">Ver</button>
                            </a>
                            <button class="bg-gray-300 text-black p-2 rounded ml-2">Eliminar</button>
                        </div>
                    </div>
                </li>
            </ul>
        </main>
    </div>
    <script>
        function setActive(button) {
            // Remueve la clase 'active-button' de todos los botones
            document.querySelectorAll('.active-button').forEach(btn => btn.classList.remove('bg-gray-200',
            'active-button'));
            // Agrega la clase 'active-button' y el color al botón clicado
            button.classList.add('bg-gray-200', 'active-button');
        }
    </script>
    </div>
    <script src="{{ asset('js/SuperAdmin.js') }}"></script>
</body>

</html>
