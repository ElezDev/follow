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
            text-align: center; /* Centrar el texto */
            color: #009e00; /* Color verde */
            margin-top: 5px; /* Espacio superior para alineación */
            font-size: 12px; /* Ajustar el tamaño de fuente */
        }
    </style>
</head>
<body class="font-['Arial',sans-serif] bg-white m-0 flex flex-col min-h-screen">
  <header class="bg-white text-[#009e00] px-5 py-2.5 flex flex-col items-center border-t-[5px] border-t-white border-b border-b-[#e0e0e0]">

        <div class="flex justify-between w-full">
            <div class="flex items-center">
                <!-- Logo de SENA en el lado izquierdo -->
                <img class="w-[70px] h-[70px]" src="{{ asset('img/logo-sena.png') }}" alt="Sena Logo ">

                <!-- Espaciado entre los dos bloques -->
                <div class="flex-grow m-2"></div>

                <!-- Logo de Etapa Productiva y texto "Centro de Comercio y Servicios" en el lado derecho -->
                <div class="text-left">
                    <!-- Logo de Etapa Seguimiento -->
                    <a href="{{ route('superadmin.home') }}" class="flex items-center">
                        <img src="{{ asset('img/logo.png') }}" alt="Etapa Seguimiento Logo" class="w-10 h-auto mr-1.5">
                        <div class="flex flex-col text-left">
                            <h2 class="text-[12px] m-0 text-[#009e00]">Etapa</h2>
                            <h2 class="text-[12px] m-0 text-[#009e00]">Productiva</h2>
                        </div>
                    </a>

                    <!-- Texto "Centro de Comercio y Servicios" debajo del logo y el texto de Etapa Productiva -->
                    <h2 class="text-sm mt-2 text-[#009e00]">Centro de Comercio y Servicios</h2>
                </div>
            </div>
            <div class="relative flex items-center ml-auto">
                <!-- Contenedor para la imagen y el ícono de los tres puntos -->
                <div class="relative">
                    <!-- Imagen de usuario -->
                    <img class="bg-white w-[45px] h-auto rounded-full border-2 " src="{{ asset('img/administrador/mujer.png') }}" alt="User Icon">

                    <!-- Botón de los tres puntos encima de la imagen -->
                    <button id="menuButton" class="absolute top-1 right-0 bg-transparent p-1 mr-[-46%]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 24 24" stroke-width="1.5" stroke="black" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a1.5 1.5 0 110-3 1.5 1.5 0 010 3zm0 5.25a1.5 1.5 0 110-3 1.5 1.5 0 010 3zm0 5.25a1.5 1.5 0 110-3 1.5 1.5 0 010 3z" />
                        </svg>
                    </button>
                </div>
                 {{-- Menu --}}
                 <div id="userMenu" class=" hidden absolute right-4  mt-2 w-64 bg-[#D9D9D9] border border-gray-300 rounded-lg shadow-lg z-20">
                     <div class="p-4">
                         <div class="flex items-center mb-4">
                             <div>
                                 <p class="text-sm font-bold">{{ auth()->user()->name }} {{ auth()->user()->last_name }}</p>
                                 <p class="mt-2 text-sm">Super Administrador</p>
                             </div>


                         </div>
                         <ul>
                             <li class="mt-2"><a href="{{ route('superadmin.SuperAdmin-Perfil') }}" class="block py-1 font-bold text-center text-green-600 bg-white border border-green-600 rounded-lg hover:text-white hover:bg-green-600">Ver perfil</a></li>

                             <li class="mt-2"><a href="{{ route('superadmin.SuperAdmin-Configuracion') }}" class="block p-2 text-black rounded-lg hover:bg-white">Configuración</a></li>
                             <li class="mt-2"><a href="{{ route('superadmin.SuperAdmin-Permisos') }}" class="block p-2 text-black rounded-lg hover:bg-white" onclick="toggleSublist(event)">Permisos</a></li>
                             <li class="mt-2"><a href="{{ route('superadmin.SuperAdmin-Graficas')}}" class="block p-2 text-black rounded-lg hover:bg-white">Graficas</a></li>
                         </ul>
                         <form id="logoutForm" action="{{ route('logout') }}" method="POST" class="mt-4">
                             @csrf
                             <button type="submit" class="block w-full py-2 font-bold text-center text-green-600 bg-white border border-green-600 rounded-lg hover:text-white hover:bg-green-600">Cerrar sesión</button>
                         </form>
                 </div>
             </div>
        </header>
    <nav class="bg-[#009e00] px-2.5 h-14 py-1.5 flex justify-end items-center relative z-10">

    {{-- FIN Barra Azul --}}

        <div class="flex justify-center w-full">
            <ul class="flex items-center justify-center space-x-4 horizontal-list" >
                <li>
                    <a href="{{ route('superadmin.home') }}" class="block px-4 py-2 text-center text-white transition bg-transparent rounded-lg hover:bg-green-700">
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="{{ route('superadmin.SuperAdmin-Administrator') }}"
                    class="block px-4 py-2 text-center text-white transition bg-transparent rounded-lg hover:bg-green-700">
                   Administrador

                    </a>
                </li>
                <li>
                    <a href="{{ route('superadmin.SuperAdmin-Instructor') }}" class="block px-4 py-2 text-center text-white transition bg-transparent rounded-lg hover:bg-green-700">
                        Instructor
                    </a>
                </li>
                <li>
                    <a href="{{ route('superadmin.SuperAdmin-Aprendiz') }}" class="block text-center text-white px-4 py-2 rounded-lg {{ request()->routeIs('superadmin.SuperAdmin-Aprendiz') ? 'bg-green-600 bg-opacity-70' : 'bg-green-600 bg-opacity-20 hover:bg-opacity-50' }}">
                        <span class="font-bold">
                          Aprendices
                        </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('superadmin.SuperAdmin-Graficas') }}" class="block px-4 py-2 text-center text-white transition bg-transparent rounded-lg hover:bg-green-700">
                       Graficas
                    </a>
                </li>




            </ul>
        </div>





    </nav>

        <div class="flex items-center justify-between w-full mt-6">
            <a href="{{route('superadmin.SuperAdmin-Aprendiz') }}" class="ml-4">
                <img src="{{ asset('img/flecha.png') }}" alt="Flecha" class="w-5 h-auto">
            </a>
        </div>



    <div class="flex justify-center mt-6">
        <main class="bg-gray-100 m-2 p-2 rounded-lg shadow-[0_0_10px_rgba(0,0,0,0.8)] border-[#2F3E4C] w-2/3">
            <div class="p-6 bg-gray-100 rounded-lg">
                <div class="flex items-center justify-center">
                    <img src="{{ asset('img/administrador/aprendiz_icono.png') }}" alt="User" class="w-40 h-40 mb-">
                </div>

                <div class="mb-6 text-center">
                    <h1 class="m-0 text-lg font-bold text-black">APRENDIZ</h1>
                </div>

                <h3 class="mt-6 mb-4 font-bold">Información Modalidad</h4>
                <div class="space-y-4">

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tipo de Modalidad:</label>
                        <p class="w-full p-1 mt-1 text-sm text-black bg-white border border-gray-300 rounded-md h-7">{{ auth()->user()->modality }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Fecha Inicio:</label>
                        <p class="w-full p-1 mt-1 text-sm text-black bg-white border border-gray-300 rounded-md h-7">{{ auth()->user()->modality }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Fecha Final:</label>
                        <p class="w-full p-1 mt-1 text-sm text-black bg-white border border-gray-300 rounded-md h-7">{{ auth()->user()->modality }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Proceso:</label>
                         <p class="w-full p-1 mt-1 text-sm text-black bg-white border border-gray-300 rounded-md h-7">{{ auth()->user()->modality }}</p>
                     </div>
                     <img class="Linea-Tiempo" src="{{ asset('administrator/linea-tiempo.png') }}" alt="linea-tiempo">
                </div>

                <h3 class="mt-6 mb-4 font-bold">Datos básicos</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nombres:</label>
                        <p class="w-full p-1 mt-1 text-sm text-black bg-white border border-gray-300 rounded-md h-7">{{ $user['name'] }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Apellidos:</label>
                    <p class="w-full p-1 mt-1 text-sm text-black bg-white border border-gray-300 rounded-md h-7">{{ $user['last_name'] }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Correo electrónico:</label>
                        <p class="w-full p-1 mt-1 text-sm text-black bg-white border border-gray-300 rounded-md h-7">{{ $user['email'] }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Cuenta  SENA:</label>
                        <p class="w-full p-1 mt-1 text-sm text-black bg-white border border-gray-300 rounded-md h-7">{{ $user['email'] }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Departamento:</label>
                        <p class="w-full p-1 mt-1 text-sm text-black bg-white border border-gray-300 rounded-md h-7">{{ $user['department'] }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Municipio:</label>
                        <p class="w-full p-1 mt-1 text-sm text-black bg-white border border-gray-300 rounded-md h-7">{{ $user['municipality'] }}</p>
                    </div>
                    <label class="block text-sm font-medium text-gray-700">Nivel academico:</label>
                    <p class="w-full p-1 mt-1 text-sm text-black bg-white border border-gray-300 rounded-md h-7">Tecnico</p>
                </div>


                <div class="flex justify-end mt-6 space-x-4">
                    <a href="{{ route('administrator.home') }}" class="bg-[#009e00] hover:bg-[#37a837] text-white py-2 px-4 rounded">Actualizar</a>
                    <a href="{{ route('administrator.apprentice') }}" class="px-4 py-2 text-black bg-gray-300 rounded hover:bg-gray-400">Cancelar</a>
                </div>
            </div>
        </main>
    </div>
    <script src="{{ asset('js/SuperAdmin.js') }}"></script>
</body>
</html>
