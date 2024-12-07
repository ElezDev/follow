<!DOCTYPE html>
<html lang="es">

@include('partials.head')

<body class="font-['Arial',sans-serif] bg-white m-0 flex flex-col min-h-screen">

    @include('partials.header')
    @yield('content')
    @include('partials.nav')
  
    <div class="flex items-center justify-between w-full mt-6">
        <a href="{{ route('superadmin.SuperAdmin-Instructor') }}" class="ml-4">
            <img src="{{ asset('img/flecha.png') }}" alt="Flecha" class="w-5 h-auto">
        </a>
    </div>

    <div class="flex justify-center mt-6">
        <main class="bg-gray-100  m-2 p-2 rounded-lg shadow-[0_0_10px_rgba(0,0,0,0.8)] border-[#2F3E4C] w-2/3">
            <div class="p-6 bg-gray-100 rounded-lg">
                <div class="flex items-center justify-center">
                    <img src="{{ asset('img/administrador/instructor-icon.png') }}" alt="User"
                        class="w-40 h-40 mb-">
                </div>
                <div class="mb-6 text-center">
                    <h1 class="m-0 text-lg font-bold text-black">INSTRUCTOR</h1>
                </div>
                <h3 class="mb-4 font-bold">Datos básicos</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nombres:</label>
                        <p class="w-full p-1 mt-1 text-sm text-black bg-white border border-gray-300 rounded-md h-7">
                            {{ $user['name'] }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Apellidos:</label>
                        <p class="w-full p-1 mt-1 text-sm text-black bg-white border border-gray-300 rounded-md h-7">
                            {{ $user['last_name'] }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Correo electrónico:</label>
                        <p class="w-full p-1 mt-1 text-sm text-black bg-white border border-gray-300 rounded-md h-7">
                            {{ $user['email'] }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Cuenta Soy SENA:</label>
                        <p class="w-full p-1 mt-1 text-sm text-black bg-white border border-gray-300 rounded-md h-7">
                            {{ $user['email'] }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Departamento:</label>
                        <p class="w-full p-1 mt-1 text-sm text-black bg-white border border-gray-300 rounded-md h-7">
                            {{ $user['department'] }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Municipio:</label>
                        <p class="w-full p-1 mt-1 text-sm text-black bg-white border border-gray-300 rounded-md h-7">
                            {{ $user['municipality'] }}</p>
                    </div>

                </div>

                <h3 class="mt-6 mb-4 font-bold">Lugar de Residencia</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Departamento:</label>
                        <p class="w-full p-1 mt-1 text-sm text-black bg-white border border-gray-300 rounded-md h-7">
                            {{ $user['department'] }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Municipio:</label>
                        <p class="w-full p-1 mt-1 text-sm text-black bg-white border border-gray-300 rounded-md h-7">
                            {{ $user['municipality'] }}</p>
                    </div>

                </div>



                <h3 class="mt-6 mb-4 font-bold">Información Seguimiento</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Aprendices Asignados:</label>
                        <p class="w-full p-1 mt-1 text-sm text-black bg-white border border-gray-300 rounded-md h-7">
                              {{ $user['municipality'] }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Horas:</label>
                        <p class="w-full p-1 mt-1 text-sm text-black bg-white border border-gray-300 rounded-md h-7">
                            {{ auth()->user()->modality }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Horas realizadas:</label>
                        <p class="w-full p-1 mt-1 text-sm text-black bg-white border border-gray-300 rounded-md h-7">
                            {{ auth()->user()->modality }}</p>
                    </div>

                </div>

                <div class="flex justify-end mt-6 space-x-4">
                    <a
                        href="{{ route('administrator.home') }}"class="bg-[#009e00] hover:bg-[#37a837] text-white py-2 px-4 rounded">Actualizar</a>
                    <a href="{{ route('administrator.instructor') }}"
                        class="px-4 py-2 text-black bg-gray-300 rounded hover:bg-gray-400">Cancelar</a>
                </div>
            </div>
        </main>
    </div>
    <script src="{{ asset('js/SuperAdmin.js') }}"></script>
</body>

</html>
