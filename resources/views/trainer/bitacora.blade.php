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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="font-['Arial',sans-serif] bg-white m-0 flex flex-col min-h-screen">

    @include('partials.header')

    @include('partials.nav-trainner')

    <div class="flex items-center justify-between w-full mt-4">
        <a href="{{ route('trainer.home') }}" class="ml-4">
            <img src="{{ asset('/img/flecha.png') }}" alt="Flecha" class="w-5 h-auto">
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

            <div id="bitacoras-container"
                class="lex-cols-2 gap-2 p-4 w-2/5 text-center h-vg[80] shadow-[0_0_10px_rgba(0,0,0,0.3)] border-gray-300 rounded-2xl ml-4">
                <label class="font-semibold text-center ">Bitacoras</label>
                <div id="bitacoras-list" class="flex flex-col items-center text-center">
                    <!-- Aquí se agregarán las bitácoras -->
                </div>
            </div>

            <div class=" w-60">
            </div>

            <div class="w-2/5 border-2 rounded-2xl shadow-[0_0_10px_rgba(0,0,0,0.3)] border-gray-300 h-80 mt-8">
                <div class="flex flex-col p-6 text-center">
                    <label class="font-semibold ">Tipo de Modalidad de Etapa Productiva</label>
                    <p class="border border-gray-400 p-2 rounded-md bg-white" id="mode">Pasantia</p>
                </div>
                <div class="flex flex-col p-6 text-center">
                    <label class="font-bold">Fecha</label>
                    <input type="date" id="date-input"
                        class="w-64 p-2 mx-auto text-center bg-white border border-gray-400 rounded-md">
                </div>
            </div>

        </div>
        <div class=" pt-2 px-[44%]">
            <button class="bg-[#009E00] h-8 w-44 rounded-2xl ml-3 text-white mb-8"
                id="register-button">REGISTRAR</button>
        </div>
        </div>
    </main>

    <script>
        const URL_API = "{{ env('URL_API') }}";
        let selectedLog = null;
        let id_apprentice = null;
        let selectedLogs = []; // Arreglo para guardar los logs seleccionados

        function getLogsByApprentice() {
            const urlPath = window.location.pathname;
            const urlParams = new URLSearchParams(window.location.search);
            const idFromPath = urlPath.split('/').pop();

            id_apprentice = urlParams.get('id');

            fetch(`${URL_API}get_logs_by_apprentice/${id_apprentice}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error al obtener las bitácoras');
                    }
                    return response.json();
                })
                .then(logs => {
                    renderLogs(logs);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        // Función para renderizar las bitácoras en el DOM
        function renderLogs(logs) {
            const bitacorasList = document.getElementById('bitacoras-list');
            const modeElement = document.getElementById('mode'); // Obtener el elemento de modalidad
            const dateInput = document.getElementById('date-input');
            bitacorasList.innerHTML = ''; // Limpiar el contenedor

            if (!Array.isArray(logs) || logs.length === 0) {
                console.log('No hay bitácoras disponibles para mostrar.');
                return;
            }

            // Mostrar la modalidad de la primera bitácora (o puedes elegir otra lógica)
            if (logs.length > 0 && logs[0].apprentice) {
                modeElement.textContent = logs[0].apprentice.modalidad; // Actualizar la modalidad
            }

            logs.forEach(log => {
                const label = document.createElement('label');
                label.className = 'items-center mb-3 space-x-2 cursor-pointer w-96';

                // Determinar el color según el estado
                let stateClass = '';
                if (log.state === 'pending') {
                    stateClass = 'bg-orange-100 text-orange-700 border-orange-400'; // Naranja
                } else if (log.state === 'approved') {
                    stateClass = 'bg-green-100 text-green-700 border-green-400'; // Verde
                }

                label.innerHTML = `
                    <input type="checkbox" class="hidden bitacora-checkbox" name="bitacora" value="${log.id}">
                    <span class="block px-4 py-2 ${stateClass} border rounded-md">
                        Bitácora #${log.number_log}
                    </span>
                `;

                const checkbox = label.querySelector('.bitacora-checkbox');
                const span = label.querySelector('span');

                // Evento para alternar selección y el color
                checkbox.addEventListener('change', () => {
                    const logObj = log; // Guardar el objeto completo

                    if (checkbox.checked) {
                        if (!selectedLogs.some(selectedLog => selectedLog.id === logObj.id)) {
                            selectedLogs.push(logObj);
                        }

                        // Cambiar a verde al seleccionar
                        span.classList.remove('bg-orange-100', 'text-orange-700', 'border-orange-400');
                        span.classList.add('bg-green-100', 'text-green-700', 'border-green-400');
                    } else {
                        selectedLogs = selectedLogs.filter(selectedLog => selectedLog.id !== logObj.id);

                        // Volver al color original según el estado
                        span.classList.remove('bg-green-100', 'text-green-700', 'border-green-400');

                        // Aplicar el color original según el estado
                        if (log.state === 'pending') {
                            span.classList.add('bg-orange-100', 'text-orange-700', 'border-orange-400');
                        } else if (log.state === 'approved') {
                            span.classList.add('bg-green-100', 'text-green-700', 'border-green-400');
                        }
                    }

                    console.log('Logs seleccionados:', selectedLogs); // Depuración
                });

                checkbox.addEventListener('change', () => {
                    if (checkbox.checked) {
                        selectedLog = log; // Guardar la bitácora seleccionada
                        dateInput.value = log.date || ''; // Asignar la fecha de la bitácora seleccionada
                    } else {
                        selectedLog = null; // Limpiar la selección si se desmarca
                        dateInput.value = ''; // Limpiar el campo de fecha
                    }
                });

                bitacorasList.appendChild(label);
            });

            const registerButton = document.getElementById('register-button');
            registerButton.addEventListener('click', () => {
                if (selectedLog) {
                    const newDate = dateInput.value;
                    // Aquí puedes hacer la lógica para actualizar la fecha y el estado de la bitácora
                    // Por ejemplo, enviar una solicitud a tu backend
                    updateBitacora(selectedLogs, newDate, 'approved'); // Cambia 'approved' según sea necesario
                } else {
                    alert('Por favor, selecciona una bitácora.');
                }
            });

        }

        // Función para actualizar la bitácora (puedes adaptarla según tu backend)
        function updateBitacora(selectedLogs, newDate, newState) {
            const ids = selectedLogs.map(item => item.id);
            console.log(`Actualizando bitácora ID: ${ids}, Fecha: ${newDate}, Estado: ${newState}`);
            // Aquí iría la lógica para hacer la solicitud al servidor
        }

        // Ejecutar cuando el DOM esté cargado
        document.addEventListener('DOMContentLoaded', function() {
            getLogsByApprentice();
        });
    </script>

</body>

</html>
