<!-- resources/views/partials/header.blade.php -->
<header class="bg-white text-[#009e00] px-5 py-2.5 flex flex-col items-center border-t-[5px] border-t-white border-b border-b-[#e0e0e0]">
    <div class="flex justify-between w-full">
        <div class="flex items-center">
            <img class="w-[70px] h-[70px]" src="{{ asset('img/logo-sena.png') }}" alt="Sena Logo">
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
        <div class="relative flex items-center ml-auto">
            <div class="relative">
                <img class="bg-white w-[45px] h-auto rounded-full border-2" src="{{ asset('img/administrador/mujer.png') }}" alt="User Icon">
                <button id="menuButton" class="absolute top-1 right-0 bg-transparent p-1 mr-[-46%]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 24 24" stroke-width="1.5" stroke="black" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a1.5 1.5 0 110-3 1.5 1.5 0 010 3zm0 5.25a1.5 1.5 0 110-3 1.5 1.5 0 010 3zm0 5.25a1.5 1.5 0 110-3 1.5 1.5 0 010 3z" />
                    </svg>
                </button>
            </div>
            <div id="userMenu" class="hidden absolute right-4 mt-2 w-64 bg-[#D9D9D9] border border-gray-300 rounded-lg shadow-lg z-20">
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
        </div>
    </div>
</header>
