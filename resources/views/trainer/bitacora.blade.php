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

    @include('partials.nav-trainner')

    <div class="flex items-center justify-between w-full mt-4">
        <a href="http://127.0.0.1:8000/trainer/perfilapre" class="ml-4">
            <img src="http://127.0.0.1:8000/img/flecha.png" alt="Flecha" class="w-5 h-auto">
        </a>
    </div>

    <main class=" bg-white m-2 px-2 rounded-lg max-height-100% w-5/7">

        <div class="flex gap-12 pb-4 mt-2 text-center flex-cols-4 items-between">
            <div class="flex flex-col w-1/4 ">
                <label class="font-bold">Nombre Del Aprendiz</label>
                <p type="text" class="p-2 text-black bg-gray-200 rounded-md bg-opacity-60">Marian Diaz</p>
            </div>
            <div class="flex flex-col w-1/4">
                <label class="font-bold">Programa</label>
                <p type="text" class="p-2 text-black bg-gray-200 rounded-md  bg-opacity-60">ADSO</p>
            </div>
            <div class="flex flex-col w-1/4">
                <label class="font-bold">N° Ficha</label>
                <p type="text" class="p-2 text-black bg-gray-200 rounded-md  bg-opacity-60">2654013</p>
            </div>
            <div class="flex flex-col w-1/4">
                <label class="font-bold">Correo Electrónico</label>
                <p type="email" class="p-2 text-black bg-gray-200 rounded-md  bg-opacity-60">mariandiaz@gmail.com
                </p>
            </div>
        </div>
        <div class="flex flex-cols-3">
            <div
                class="lex-cols-2 gap-2 p-4 w-2/5 text-center h-vg[80] shadow-[0_0_10px_rgba(0,0,0,0.3)] border-gray-300 rounded-2xl ml-4">
                <label class="font-semibold text-center ">Bitacoras</label>
                <div class="flex flex-col items-center text-center">
                    <label class="items-center mb-3 space-x-2 cursor-pointer w-96">
                        <input type="checkbox" class="hidden bitacora-checkbox" name="bitacora" value="1">
                        <span class="block px-4 py-2 text-gray-700 border border-gray-400 rounded-md">1</span>
                    </label>
                    <label class="items-center mb-3 space-x-2 cursor-pointer w-96">
                        <input type="checkbox" class="hidden bitacora-checkbox" name="bitacora" value="2">
                        <span class="block px-4 py-2 text-gray-700 border border-gray-400 rounded-md">2</span>
                    </label>
                    <label class="items-center mb-3 space-x-2 cursor-pointer w-96">
                        <input type="checkbox" class="hidden itbacora-checkbox" name="bitacora" value="3">
                        <span class="block px-4 py-2 text-gray-700 border border-gray-400 rounded-md">3</span>
                    </label>
                    <label class="items-center mb-3 space-x-2 cursor-pointer w-96">
                        <input type="checkbox" class="hidden bitacora-checkbox" name="bitacora" value="4">
                        <span class="block px-4 py-2 text-gray-700 border border-gray-400 rounded-md">4</span>
                    </label>
                    <label class="items-center mb-3 space-x-2 cursor-pointer w-96">
                        <input type="checkbox" class="hidden bitacora-checkbox" name="bitacora" value="5">
                        <span class="block px-4 py-2 text-gray-700 border border-gray-400 rounded-md">5</span>
                    </label>
                    <label class="items-center mb-3 space-x-2 cursor-pointer w-96">
                        <input type="checkbox" class="hidden bitacora-checkbox" name="bitacora" value="6">
                        <span class="block px-4 py-2 text-gray-700 border border-gray-400 rounded-md">6</span>
                    </label>
                    <label class="items-center mb-3 space-x-2 cursor-pointer w-96">
                        <input type="checkbox" class="hidden bitacora-checkbox" name="bitacora" value="7">
                        <span class="block px-4 py-2 text-gray-700 border border-gray-400 rounded-md">7</span>
                    </label>
                    <label class="items-center mb-3 space-x-2 cursor-pointer w-96">
                        <input type="checkbox" class="hidden bitacora-checkbox" name="bitacora" value="8">
                        <span class="block px-4 py-2 text-gray-700 border border-gray-400 rounded-md">8</span>
                    </label>
                    <label class="items-center mb-3 space-x-2 cursor-pointer w-96 ">
                        <input type="checkbox" class="hidden bitacora-checkbox" name="bitacora" value="9">
                        <span class="block px-4 py-2 text-gray-700 border border-gray-400 rounded-md">9</span>
                    </label>
                    <label class="items-center mb-3 space-x-2 cursor-pointer w-96">
                        <input type="checkbox" class="hidden bitacora-checkbox" name="bitacora" value="10">
                        <span class="block px-4 py-2 text-gray-700 border border-gray-400 rounded-md">10</span>
                    </label>
                    <label class="items-center mb-3 space-x-2 cursor-pointer w-96">
                        <input type="checkbox" class="hidden bitacora-checkbox" name="bitacora" value="11">
                        <span class="block px-4 py-2 text-gray-700 border border-gray-400 rounded-md">11</span>
                    </label>
                    <label class="items-center mb-3 space-x-2 cursor-pointer w-96">
                        <input type="checkbox" class="hidden bitacora-checkbox" name="bitacora" value="12">
                        <span class="block px-4 py-2 text-gray-700 border border-gray-400 rounded-md">12</span>
                    </label>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                                const checkboxes = document.querySelectorAll('.bitacora-checkbox');
                                const registrarBtn = document.getElementById('registrar-btn');

                                // Arreglo para almacenar los valores seleccionados
                                let selectedBitacoras = [];

                                // Actualizar estilos al seleccionar/desmarcar
                                checkboxes.forEach(function(checkbox) {
                                    checkbox.addEventListener('change', function() {
                                        if (checkbox.checked) {
                                            checkbox.nextElementSibling.classList.add('bg-green-500', 'text-white');
                                            checkbox.nextElementSibling.classList.remove('border-black',
                                                'text-gray-700');
                                            selectedBitacoras.push(checkbox.value); // Agregar al arreglo
                                        } else {
                                            checkbox.nextElementSibling.classList.remove('bg-green-500', 'text-white');
                                            checkbox.nextElementSibling.classList.add('border-black', 'text-gray-700');
                                            selectedBitacoras = selectedBitacoras.filter(val => val !== checkbox
                                            .value); // Eliminar del arreglo
                                        }
                                    });
                                });

                                // Evento al presionar el botón registrar
                                registrarBtn.addEventListener('click', function() {
                                        if (selectedBitacoras.length > 0) {
                                            // Enviar datos al servidor
                                            fetch('/guardar-bitacoras', {
                                                    method: 'POST',
                                                    headers: {
                                                        'Content-Type': 'application/json',
                                                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Para Laravel
                                                    },
                                                    body: JSON.stringify({
                                                        bitacoras: selectedBitacoras
                                                    })
                                                })
                                                .then(response => response.json())
                                                .then(data => {
                                                    if (data.success) {
                                                        alert('Bitácoras registradas correctamente');
                                                        window.location.href = '/apprentice/home'; // Redirigir a la vista
                                                    } else {
                                                        alert('Error al registrar las bitácoras');
                                                    }
                                                });
                                        });
                                });
                </script>

            </div>
            {{-- Contenedor Fantasma --}}
            <div class=" w-60">
            </div>
            <div class="w-2/5 border-2 rounded-2xl shadow-[0_0_10px_rgba(0,0,0,0.3)] border-gray-300 h-80 mt-8">
                <div class="flex flex-col p-6 text-center">
                    <label class="font-semibold ">Tipo de Modalidad de Etapa Productiva</label>
                    <p type="text" class="border border-gray-400  p-2 rounded-md bg-white">Pasantia</p>
                </div>
                <div class="flex flex-col p-6 text-center">
                    <label class="font-bold">Fecha</label>
                    <input type="date"
                        class="w-64 p-2 mx-auto text-center bg-white border border-gray-400 rounded-md">
                </div>
            </div>

        </div>
        <div class=" pt-2 px-[44%]">
            <button class="bg-[#009E00] h-8 w-44 rounded-2xl ml-3 text-white mb-8"
                id="registrar-btn">REGISTRAR</button>
        </div>
        </div>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Cargar las bitácoras seleccionadas desde localStorage
            cargarSeleccionDeBitacoras();

            // Seleccionar todos los checkboxes de las bitácoras
            const checkboxes = document.querySelectorAll('.bitacora-checkbox');

            // Agregar un listener de cambio para cada checkbox
            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    // Cambiar el estilo visual según si está seleccionado o no
                    const label = checkbox.nextElementSibling;
                    if (checkbox.checked) {
                        label.classList.add('bg-green-500', 'text-white');
                        label.classList.remove('border-gray-400', 'text-gray-700');
                    } else {
                        label.classList.remove('bg-green-500', 'text-white');
                        label.classList.add('border-gray-400', 'text-gray-700');
                    }

                    // Guardar las bitácoras seleccionadas en localStorage
                    const bitacoras = obtenerBitacorasSeleccionadas();
                    localStorage.setItem('bitacorasSeleccionadas', JSON.stringify(bitacoras));

                    // Actualizar el gráfico en tiempo real
                    actualizarGrafico(bitacoras.length);
                });
            });

            // Función para obtener las bitácoras seleccionadas
            function obtenerBitacorasSeleccionadas() {
                const seleccionadas = [];
                checkboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        seleccionadas.push(checkbox.value);
                    }
                });
                return seleccionadas;
            }

            // Función para manejar el evento de registro
            document.getElementById("registrar-btn").addEventListener("click", function() {
                const bitacoras = obtenerBitacorasSeleccionadas();
                const descripcion = document.getElementById('descripcion').value.trim();
                const observacion = document.getElementById('observacion').value.trim();
                const fecha = document.querySelector('input[type="date"]').value.trim();

                if (bitacoras.length === 0 || !descripcion || !observacion || !fecha) {
                    alert("Por favor, complete todos los campos.");
                    return;
                }

                // Guardar las bitácoras seleccionadas en localStorage
                localStorage.setItem('bitacorasSeleccionadas', JSON.stringify(bitacoras));

                // Mostrar mensaje de éxito
                alert('¡Bitácora registrada correctamente!');

                // Actualizar el gráfico con las bitácoras seleccionadas
                actualizarGrafico(bitacoras.length);
            });

            // Función para cargar la selección de bitácoras desde localStorage
            function cargarSeleccionDeBitacoras() {
                const bitacorasSeleccionadas = JSON.parse(localStorage.getItem('bitacorasSeleccionadas')) || [];
                const checkboxes = document.querySelectorAll('.bitacora-checkbox');

                checkboxes.forEach(function(checkbox) {
                    if (bitacorasSeleccionadas.includes(checkbox.value)) {
                        checkbox.checked = true;
                        const label = checkbox.nextElementSibling;
                        label.classList.add('bg-green-500', 'text-white');
                        label.classList.remove('border-gray-400', 'text-gray-700');
                    } else {
                        checkbox.checked = false;
                        const label = checkbox.nextElementSibling;
                        label.classList.remove('bg-green-500', 'text-white');
                        label.classList.add('border-gray-400', 'text-gray-700');
                    }
                });
            }
        });
    </script>

</body>

</html>
