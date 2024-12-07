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
                        class="block text-center text-white px-4 py-2 rounded-lg {{ request()->routeIs('superadmin.SuperAdmin-Administrator') ? 'bg-green-600 bg-opacity-70' : 'bg-green-600 bg-opacity-20 hover:bg-opacity-50' }}">
                        <span class="font-bold">
                            Administradores
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('superadmin.SuperAdmin-Instructor') }}"
                        class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                        Instructores
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
    <div class="flex justify-center mt-6">
        <main class="bg-gray-100  m-2 p-2 rounded-lg shadow-[0_0_10px_rgba(0,0,0,0.8)] border-[#2F3E4C] w-2/3">
            <div class="bg-gray-100 p-6 rounded-lg">
                <div class="text-center mb-6">
                    <div class="flex justify-center items-center">
                        <img src="{{ asset('img/administrador/mujer.png') }}" alt="User" class="w-40 h-40 mb-">
                    </div>
                    <h1 class="text-lg m-0 text-black font-bold">SUPER</h1>
                    <h1 class="text-lg m-0 text-black font-bold">ADMINISTRADOR</h1>
                </div>

                <h3 class="font-bold mb-4">Datos básicos</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nombres:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md">

                        </p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Apellidos:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md">
                            {{ session('user.name') }}
                        </p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Cedula:</label>
                        <input type="text" class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md"
                            value="">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Telefono:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md">
                            {{ session('user.phone') }}
                        </p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Correo electrónico:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md">
                            {{ session('user.email') }}
                        </p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Fecha de nacimiento:</label>
                        <p type="date" class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md">

                        </p>
                    </div>
                </div>

                <h3 class="font-bold mb-4 mt-6">Lugar de Residencia</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Pais:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md">
                            {{ session('user.country') }}
                        </p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Departamento:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md">
                            {{ session('user.departament') }}
                        </p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Municipio:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md">
                            {{ session('user.municipality') }}
                        </p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Barrio:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md">
                            {{ session('user.neighborhood') }}
                        </p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Dirección:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md">
                            {{ session('user.address') ?? "" }}
                        </p>
                    </div>
                </div>

                <div class="flex justify-end mt-6 space-x-4">
                    <a href="{{ route('superadmin.SuperAdmin-Perfil') }}"
                        class="bg-green-700 hover:bg-green-900 text-white py-2 px-4 rounded">Actualizar</a>
                    <a href="{{ route('superadmin.home') }}"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded">Cancelar</a>
                </div>
            </div>
        </main>
    </div>
    <script src="{{ asset('js/SuperAdmin.js') }}"></script>
</body>

</html>
