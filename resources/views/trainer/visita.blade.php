<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <script src="{{ asset('js/Trainer.js') }}"></script>
    <title>Etapa Seguimiento</title>
    <style>
        #userMenuTri {
            top: 100%;
            margin-top: 0.5rem;
        }
    </style>
</head>

<body class="font-['Arial',sans-serif] bg-white m-0 flex flex-col min-h-screen">
    
    @include('partials.header')

    <!--Notificaciones -->
    @include('partials.nav-trainner')

    <div class="w-full flex justify-between items-center mt-4">
        <a href="http://127.0.0.1:8000/trainer/perfilapre" class="ml-4">
            <img src="http://127.0.0.1:8000/img/flecha.png" alt="Flecha" class="w-5 h-auto">
        </a>
    </div>

    <main class=" bg-white m-2 px-2 rounded-lg max-height-100% w-5/7">

        <div class="flex flex-cols-4 gap-12 pb-4  items-between text-center mt-2">
            <div class="flex flex-col w-1/4 ">
                <label class="font-bold">Nombre Del Aprendiz</label>
                <p type="text" class="bg-gray-200 bg-opacity-60 p-2 rounded-md text-black">Marian Diaz</p>
            </div>
            <div class="flex flex-col  w-1/4">
                <label class="font-bold">Programa</label>
                <p type="text" class=" bg-gray-200 bg-opacity-60 p-2 rounded-md text-black">ADSO</p>
            </div>
            <div class="flex flex-col  w-1/4">
                <label class="font-bold">N° Ficha</label>
                <p type="text" class=" bg-gray-200 bg-opacity-60 p-2 rounded-md text-black">2654013</p>
            </div>
            <div class="flex flex-col  w-1/4">
                <label class="font-bold">Correo Electrónico</label>
                <p type="email" class=" bg-gray-200 bg-opacity-60 p-2 rounded-md text-black">mariandiaz@gmail.com
                </p>
            </div>
        </div>
        <div class="flex flex-cols-5">
            <div
                class="flex-cols-2 gap-2 p-4 w-2/5 text-center h-vg[80] shadow-[0_0_10px_rgba(0,0,0,0.3)] border-gray-300 rounded-2xl ml-4">
                <div class="flex flex-col">
                    <label class="font-bold">Nombre De La Empresa</label>
                    <p type="text" class="border border-gray-400  p-2 rounded-md bg-white">FREETIME</p>
                </div>
                <div class="w-full flex space-x-4 items-center justify-between text-center">
                    <div class="flex flex-col">
                        <label class="font-bold">Tipo de Seguimiento</label>
                        <select class="border border-gray-400 p-2 rounded-md w-48 bg-white">
                            <option selected="">Selecciona Opción</option>
                            <option value="Inicial">Concertación</option>
                            <option value="Parcial">Parcial</option>
                            <option value="Final">Final</option>
                            <option value="Mejoramiento">Mejoramiento</option>
                        </select>
                    </div>
                    <div class="flex flex-col">
                        <label class="font-bold">Fecha</label>
                        <input type="date" class="border border-gray-400 p-2 rounded-md w-48 bg-white text-center">
                    </div>
                </div>
                <div class="flex flex-col ">
                    <label class="font-bold">Nombre del Jefe Inmediato</label>
                    <input type="text" id="jefe_inmediato" value=""
                        class="border border-gray-400 p-2 rounded-md bg-white text-center ">
                </div>
                <div class="flex flex-col ">
                    <label class="font-bold">Correo</label>
                    <input type="text" id="correo_empresa" value=""
                        class="border border-gray-400 p-2 rounded-md bg-white text-center ">
                </div>
                <div class="flex flex-col ">
                    <label class="font-bold">Telefono de contacto</label>
                    <input type="text" id="telefono_contacto" value=""
                        class="border border-gray-400 p-2 rounded-md bg-white text-center ">
                </div>
            </div>
            {{-- Contenedor Fantasma --}}
            <div class=" w-60 ">
            </div>
            <div class="w-2/5 border-2 rounded-2xl shadow-[0_0_10px_rgba(0,0,0,0.3)] border-gray-300 h-80 mt-8">
                <div class="flex flex-col p-6 text-center">
                    <label class="font-semibold ">Tipo de Modalidad de Etapa Productiva</label>
                    <p type="text" class="border border-gray-400  p-2 rounded-md bg-white">Pasantia</p>
                </div>
                <div class="flex flex-col p-6 text-center">
                    <label class="font-semibold ">Observación/Inasistencia y/o Dificultades</label>
                    <textarea id="observacion" class="border border-gray-400 p-2 rounded-md h-28 bg-white"></textarea>
                </div>
            </div>
        </div>
        <div class=" pt-2 px-[44%]">
            <button class="bg-[#009E00] h-8 w-44 rounded-2xl ml-3 text-white mb-8 "
                id="registrar-btn">REGISTRAR</button>
        </div>
    </main>
    <script>
        // Esperar a que el DOM se cargue
        document.addEventListener("DOMContentLoaded", function() {
            // Obtener el botón por su ID
            const registrarBtn = document.getElementById("registrar-btn");

            // Agregar el evento de click
            registrarBtn.addEventListener("click", function() {
                // Mostrar un mensaje cuando el botón sea presionado
                alert(" Visita Registrada");
            });
        });
    </script>

</body>

</html>
