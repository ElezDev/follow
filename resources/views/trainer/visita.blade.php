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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="font-['Arial',sans-serif] bg-white m-0 flex flex-col min-h-screen">

    @include('partials.header')

    <!--Notificaciones -->
    @include('partials.nav-trainner')

    <div class="w-full flex justify-between items-center mt-4">
        <a href="{{ route('trainer.home') }}" class="ml-4">
            <img src="{{ asset('img/flecha.png') }}" alt="Flecha" class="w-5 h-auto">
        </a>
    </div>

    <main class=" bg-white m-2 px-2 rounded-lg max-height-100% w-5/7">

        <div class="flex flex-cols-4 gap-12 pb-4  items-between text-center mt-2">
            <div class="flex flex-col w-1/4 ">
                <label class="font-bold">Nombre Del Aprendiz</label>
                <p type="text" class="bg-gray-200 bg-opacity-60 p-2 rounded-md text-black">
                    {{ $apprentice['name'] . ' ' . $apprentice['last_name'] }}
                </p>
            </div>
            <div class="flex flex-col  w-1/4">
                <label class="font-bold">Programa</label>
                <p type="text" class=" bg-gray-200 bg-opacity-60 p-2 rounded-md text-black">
                    {{ isset($apprentice['apprentice']['program']) ? $apprentice['apprentice']['program'] : '' }}
                </p>
            </div>
            <div class="flex flex-col  w-1/4">
                <label class="font-bold">N° Ficha</label>
                <p type="text" class=" bg-gray-200 bg-opacity-60 p-2 rounded-md text-black">
                    {{ isset($apprentice['apprentice']['ficha']) ? $apprentice['apprentice']['ficha'] : '' }}
                </p>
            </div>
            <div class="flex flex-col  w-1/4">
                <label class="font-bold">Correo Electrónico</label>
                <p type="email" class=" bg-gray-200 bg-opacity-60 p-2 rounded-md text-black">
                    {{ $apprentice['email'] }}
                </p>
            </div>
        </div>

        <div class="flex flex-cols-5">
            <div
                class="flex-cols-2 gap-2 p-4 w-2/5 text-center h-vg[80] shadow-[0_0_10px_rgba(0,0,0,0.3)] border-gray-300 rounded-2xl ml-4">

                <div class="flex flex-col">
                    <label class="font-bold">Nombre De La Empresa</label>
                    <p type="text" class="border border-gray-400  p-2 rounded-md bg-white">
                        {{ isset($apprentice['apprentice']['contract']['company']) ? $apprentice['apprentice']['contract']['company']['name'] : '' }}
                    </p>
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
                    <input type="text" id="correo_empresa"
                        value="{{ isset($apprentice['apprentice']['contract']['company']) ? $apprentice['apprentice']['contract']['company']['email'] : '' }}"
                        class="border border-gray-400 p-2 rounded-md bg-white text-center ">
                </div>
                <div class="flex flex-col ">
                    <label class="font-bold">Telefono de contacto</label>
                    <input type="text" id="telefono_contacto"
                        value="{{ isset($apprentice['apprentice']['contract']['company']) ? $apprentice['apprentice']['contract']['company']['telephone'] : '' }}"
                        class="border border-gray-400 p-2 rounded-md bg-white text-center ">
                </div>
            </div>

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

        <div class="flex justify-center mt-4">
            <form id="agreementForm" class="bg-white p-6 rounded-lg shadow-md w-full max-w-md"
                onsubmit="saveAgreement(event)">
                <h2 class="text-2xl font-bold mb-4 text-center">Guardar visita</h2>

                <div class="mb-4">
                    <label for="type_of_agreement" class="block text-gray-700 font-medium mb-2">Tipo de visita:</label>
                    <input type="text" id="type_of_agreement" name="type_of_agreement" required
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label for="date" class="block text-gray-700 font-medium mb-2">Fecha:</label>
                    <input type="date" id="date" name="date" required
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label for="name_of_immediate_boss" class="block text-gray-700 font-medium mb-2">Nombre del
                        jefe inmediato:</label>
                    <input type="text" id="name_of_immediate_boss" name="name_of_immediate_boss" required
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email:</label>
                    <input type="email" id="email" name="email" required
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label for="telephone" class="block text-gray-700 font-medium mb-2">Teléfono:</label>
                    <input type="text" id="telephone" name="telephone" required
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label for="observation" class="block text-gray-700 font-medium mb-2">Observación:</label>
                    <textarea id="observation" name="observation" rows="4" required
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>

                <div class="mb-4">
                    <label for="id_trainer" class="block text-gray-700 font-medium mb-2">ID del Entrenador:</label>
                    <input type="number" id="id_trainer" name="id_trainer" required
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <button type="submit"
                    class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Guardar
                </button>
            </form>
        </div>

    </main>

    <script>
        const URL_API = "{{ env('URL_API') }}";

        function saveAgreement(event) {
            event.preventDefault();

            const form = document.getElementById('agreementForm');
            const formData = new FormData(form);
            const data = Object.fromEntries(formData);

            axios.post(`${URL_API}create_visit_to_apprentice`, data)
                .then(response => {
                    Swal.fire(
                        '¡Guardado!',
                        'La visita se guardó correctamente y se asigno al aprendiz.',
                        'success'
                    );
                    form.reset();
                })
                .catch(error => {
                    Swal.fire(
                        'Error',
                        'Hubo un problema al guardar la visita del aprendiz.',
                        'error'
                    );
                });
        }
    </script>

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
