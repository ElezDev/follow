<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <title>Etapa Seguimiento</title>
    <style>
            #userMenuTri {
            top: 100%;
            margin-top: 0.5rem;
        }
    </style>
</head>
<body class="font-['Arial',sans-serif] bg-white m-0 flex flex-col min-h-screen">
    <header class="bg-white text-[#009e00] px-5 py-2.5 flex flex-col items-center border-t-[5px] border-t-white border-b border-b-[#e0e0e0']">
        <div class="flex justify-between w-full">
            <div class="flex items-center">
                <!-- Logo de SENA en el lado izquierdo -->
                <img class="w-[70px] h-[70px]" src="{{ asset('img/logo-sena.png') }}" alt="Sena Logo ">

                <!-- Espaciado entre los dos bloques -->
                <div class="flex-grow m-2"></div>

                <!-- Logo de Etapa Productiva y texto "Centro de Comercio y Servicios" en el lado derecho -->
                <div class="text-left">
                    <!-- Logo de Etapa Seguimiento -->
                    <a href="{{ route('icon') }}" class="flex items-center">
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
            <div class="relative ml-auto flex items-center">
                <!-- Contenedor para la imagen y el ícono de los tres puntos -->
                <div class="relative">
                    <!-- Imagen de usuario -->
                    <img class="bg-white w-[45px] h-auto rounded-full border-2 " src="{{ asset('img/administrador/mujer.png') }}" alt="User Icon">

                    <!-- Botón de los tres puntos encima de la imagen -->
                    <button id="menuButtonTri" class="absolute top-1 right-0 bg-transparent p-1 mr-[-46%]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 24 24" stroke-width="1.5" stroke="black" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a1.5 1.5 0 110-3 1.5 1.5 0 010 3zm0 5.25a1.5 1.5 0 110-3 1.5 1.5 0 010 3zm0 5.25a1.5 1.5 0 110-3 1.5 1.5 0 010 3z" />
                        </svg>
                    </button>
                </div>
    </header>
     <!--Notificaciones -->
     <nav class="bg-[#009e00] px-2.5 h-14 py-1.5 flex items-center relative z-10">
        <div class="text-white text-center absolute left-1/2 transform -translate-x-1/2">Notificaciones</div>

        <div class="relative ml-auto flex items-center">
            <button id="notifButton" class="relative">
                <a href="{{ route('notificationtrainer') }}">
                <img class="w-[50px] h-auto mr-3.0 filter invert" src="{{ asset('img/notificaciones.png') }}" alt="Notificaciones">

            </button>


        <div class="relative ml-auto flex items-center ">


            <div id="userMenuTri" class=" hidden absolute right-4  mt-2 w-64 bg-[#D9D9D9] border border-gray-300 rounded-lg shadow-lg z-20">
                <div class="p-4">
                    <div class="flex items-center mb-4">
                        <div>
                            <p class="text-sm font-bold">Nombre Usuario<p>
                            <p class="text-sm mt-2">Instructor</p>

                        </div>
                        <img src="{{ asset('img/administrador/mujer.png') }}" alt="User Icon" class="w-10 h-10 rounded-full mr-3 mx-10 bg-white border-black border-2">
                    </div>
                    <ul>
                        <a href="{{ route('username')}}" class="block text-center text-green-600 font-bold mt-4 bg-white border hover:text-white hover:bg-green-600 border-green-600 rounded-lg py-1">Ver perfil</a>
                        <li class="mt-2"><a href="{{ route('configuracion')}}" class="block text-black hover:bg-white p-2 rounded-lg">Configuración</a></li>
                        <li class="mt-2"><a href="{{ route('icon') }}" class="block text-black hover:bg-white p-2 rounded-lg">Aprendices</a></li>
                        <li class="mt-2"><a href="{{ route('cronograma') }}" class="block text-black hover:bg-white p-2 rounded-lg">Cronograma</a></li>

                    </ul>
                    <form id="logoutForm" action="{{ route('logout') }}" method="POST" class="mt-4">
                        @csrf
                        <button type="submit" class="block text-center text-green-600 font-bold bg-white border hover:text-white hover:bg-green-600 border-green-600 rounded-lg py-2 w-full">Cerrar sesión</button>
                    </form>
            </div>
        </div>
    </nav>
    <div class="w-full flex justify-between items-center mt-6">
        <a href="{{ route('icon') }}" class="ml-4">
            <img src="{{ asset('img/flecha.png') }}" alt="Flecha" class="w-5 h-auto">
        </a>
    </div>

    <div class="w-full flex justify-center mt-4 items-center mb-2 bg-white">
        <form action="#" method="GET" class="flex items-center">
            <input placeholder="Buscar..." class="px-2 py-1 text-sm border border-black rounded-full w-96">
            <button type="submit" aria-label="Buscar" class="p-2 bg-transparent border-none cursor-pointer -ml-10">
                <img src="{{ asset('img/lupa.png') }}" alt="Buscar" class="w-4 h-auto">
            </button>
        </form>
    </div>


    <div class="w-24 flex justify-start m-2 pl-56 items-center">
        <a href="{{ route('report')}}" type="submit" class="bg-gray-300 hover:bg-gray-400 text-black p-1 rounded">Redactar</a>
    </div>
    <div class="flex justify-center">
        <main class="bg-white m-4 p-4 rounded-lg shadow-[0_0_10px_rgba(0,0,0,0.8)] border-[#2F3E4C] w-2/3 items-center">
            <div class="flex justify-center">
                <button type="button" class="hover:bg-gray-200 m-4 pr-28 pl-28 p-2 rounded active-button" onclick="setActive(this)">Recibidos</button>
                <button type="button" class="hover:bg-gray-200 m-4 pl-28 pr-28 p-2 rounded" onclick="setActive(this)">Enviados</button>
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
                            <a href="{{ route('email') }}">
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
                            <a href="{{ route('email') }}">
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
                            <a href="{{ route('email') }}">
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
                            <a href="{{ route('email') }}">
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
                            <a href="{{ route('email') }}">
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
            document.querySelectorAll('.active-button').forEach(btn => btn.classList.remove('bg-gray-200', 'active-button'));
            // Agrega la clase 'active-button' y el color al botón clicado
            button.classList.add('bg-gray-200', 'active-button');
        }
    </script>
    <script src="{{ asset('js/Trainer.js') }}"></script>
</body>
</body>
</html>
