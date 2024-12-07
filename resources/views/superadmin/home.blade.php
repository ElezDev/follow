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
    {{-- <header
        class="bg-white text-[#009e00] px-5 py-2.5 flex flex-col items-center border-t-[5px] border-t-white border-b border-b-[#e0e0e0]">

        <div class="flex justify-between w-full">
            <div class="flex items-center">
                <img class="w-[70px] h-[70px]" src="{{ asset('img/logo-sena.png') }}" alt="Sena Logo ">

                <div class="flex-grow m-2"></div>

                <div class="text-left">
                    <a href="{{ route('superadmin.home') }}" class="flex items-center">
                        <img src="{{ asset('img/logo.png') }}" alt="Etapa Seguimiento Logo" class="w-10 h-auto mr-1.5">
                        <div class="flex flex-col text-left">
                            <h2 class="text-[12px] m-0 text-[#009e00]">Etapa</h2>
                            <h2 class="text-[12px] m-0 text-[#009e00]">Productiva</h2>
                        </div>
                    </a>

                    <h2 class="text-sm mt-2 text-[#009e00]">Centro de Comercio y Servicios</h2>
                </div>
            </div>
            <div class="relative ml-auto flex items-center">
                <div class="relative">
                    <img class="bg-white w-[45px] h-auto rounded-full border-2 "
                        src="{{ asset('img/administrador/mujer.png') }}" alt="User Icon">

                    <button id="menuButton" class="absolute top-1 right-0 bg-transparent p-1 mr-[-46%]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="black" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6.75a1.5 1.5 0 110-3 1.5 1.5 0 010 3zm0 5.25a1.5 1.5 0 110-3 1.5 1.5 0 010 3zm0 5.25a1.5 1.5 0 110-3 1.5 1.5 0 010 3z" />
                        </svg>
                    </button>
                </div>
                <div id="userMenu"
                    class=" hidden absolute right-4  mt-2 w-64 bg-[#D9D9D9] border border-gray-300 rounded-lg shadow-lg z-20">
                    <div class="p-4">
                        <div class="flex items-center mb-4">
                            <div>
                                <p class="text-sm font-bold"> name </p>
                                <p class="text-sm mt-2">Super Administrador</p>
                            </div>


                        </div>
                        <ul>
                            <li class="mt-2"><a href="{{ route('superadmin.SuperAdmin-Perfil') }}"
                                    class="block text-center text-green-600 font-bold bg-white border hover:text-white hover:bg-green-600 border-green-600 rounded-lg py-1">Ver
                                    perfil</a></li>

                            <li class="mt-2"><a href="{{ route('superadmin.SuperAdmin-Configuracion') }}"
                                    class="block text-black hover:bg-white p-2 rounded-lg">Configuración</a></li>
                            <li class="mt-2"><a href="{{ route('superadmin.SuperAdmin-Permisos') }}"
                                    class="block text-black hover:bg-white p-2 rounded-lg"
                                    onclick="toggleSublist(event)">Permisos</a></li>
                            <li class="mt-2"><a href="{{ route('graficos.index') }}"
                                    class="block text-black hover:bg-white p-2 rounded-lg">Graficas</a></li>
                        </ul>
                        <form id="logoutForm" action="{{ route('logout') }}" method="POST" class="mt-4">
                            @csrf
                            <button type="submit"
                                class="block text-center text-green-600 font-bold bg-white border hover:text-white hover:bg-green-600 border-green-600 rounded-lg py-2 w-full">Cerrar
                                sesión</button>
                        </form>
                    </div>
                </div>
    </header> --}}

    @include('partials.header')

    <nav class="bg-[#009e00] px-2.5 h-14 py-1.5 flex justify-end items-center relative z-10">

        <!-- Botón de notificaciones alineado a la derecha -->
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
                    <a href="{{ route('graficos.index') }}"
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

    <main class="flex-nowrap p-10 flex justify-center items-center bg-white">
        <div
            class="grid grid-cols-4 gap-20 bg-[#f0f0f0] border-2 border-[#2F3E4C] p-[72px] rounded-[20px] max-w-[100%] mx-auto shadow-[0_0_10px_rgba(0,0,0,0.8)]">
            <a href="{{ route('superadmin.SuperAdmin-Administrator') }}"
                class=" m-2.5 py-4 rounded-[15%] flex flex-col items-center text-center bg-white border-[3px] border-black w-56 h-56 hover:border-green-600">
                <img src="{{ asset('SuperAdmin/administrador.png') }}" alt="Administradores"
                    class="w-[200px] h-[165px]  ">
                <span class="text-sm ">Administradores</span>
            </a>

            <a href="{{ route('superadmin.SuperAdmin-Instructor') }}"
                class="m-2.5 py-4 rounded-[15%] flex flex-col items-center text-center p-5 bg-white border-[3px] border-black w-56 h-56 hover:border-green-600">
                <img src="{{ asset('img/administrador/instructor.png') }}" alt="Instructores"
                    class="w-[160px] h-[150px] mb-0">
                <span class="text-sm p-2">Instructores</span>
            </a>

            <!-- Botón de Aprendices -->

            <a href="{{ route('superadmin.SuperAdmin-Aprendiz') }}"
                class="m-2.5 py-4 rounded-[15%] flex flex-col items-center text-center p-5 bg-white border-[3px] border-black w-56 h-56 hover:border-green-600">
                <img src="{{ asset('img/administrador/aprendiz.png') }}" alt="Aprendices"
                    class="w-[130px] h-[120px] mb-0">
                <span class="text-sm p-4">Aprendices</span>
            </a>

            <a href="{{ route('graficos.index') }}"
                class="m-2.5 rounded-[15%] flex flex-col items-center text-center py-10 p-5 bg-white border-[3px] border-black w-56 h-56 hover:border-green-600">
                <img src="{{ asset('img/administrador/graficas.png') }}" alt="Graficas"
                    class="w-[120px] h-[110px] mb-2.5">
                <span class="text-sm p-4">Graficas</span>
            </a>

            <script src="{{ asset('js/SuperAdmin.js') }}"></script>
</body>

</html>
