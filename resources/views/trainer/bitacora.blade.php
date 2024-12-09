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
        let selectedLogs = []; // Arreglo para guardar los logs seleccionados

        function getLogsByApprentice() {
            const urlParams = new URLSearchParams(window.location.search);
            const id_apprentice = urlParams.get('id');

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

        function renderLogs(logs) {
            const bitacorasList = document.getElementById('bitacoras-list');
            const modeElement = document.getElementById('mode');
            const dateInput = document.getElementById('date-input');
            bitacorasList.innerHTML = ''; // Limpiar el contenedor

            if (!Array.isArray(logs) || logs.length === 0) {
                console.log('No hay bitácoras disponibles para mostrar.');
                return;
            }

            if (logs.length > 0 && logs[0].apprentice) {
                modeElement.textContent = logs[0].apprentice.modalidad; // Actualizar la modalidad
            }

            logs.forEach(log => {
                const label = document.createElement('label');
                label.className = 'items-center mb-3 space-x-2 cursor-pointer w-96';

                let stateClass = log.state === 'pending' ? 'bg-orange-100 text-orange-700 border-orange-400' :
                    'bg-green-100 text-green-700 border-green-400';

                label.innerHTML = `
                    <input type="checkbox" class="hidden bitacora-checkbox" name="bitacora" value="${log.id}">
                    <span class="block px-4 py-2 ${stateClass} border rounded-md">
                        Bitácora #${log.number_log}
                    </span>
                `;

                const checkbox = label.querySelector('.bitacora-checkbox');
                const span = label.querySelector('span');

                checkbox.addEventListener('change', () => {
                    const logObj = log; // Guardar el objeto completo

                    if (checkbox.checked) {
                        // Agregar el objeto al arreglo
                        if (!selectedLogs.some(selectedLog => selectedLog.id === logObj.id)) {
                            selectedLogs.push(logObj);
                        }

                        // Cambiar a verde al seleccionar
                        span.classList.remove('bg-orange-100', 'text-orange-700', 'border-orange-400');
                        span.classList.add('bg-green-100', 'text-green-700', 'border-green-400');
                        log.state = 'approved';

                        if (logObj.date) {
                            dateInput.value = logObj.date;
                        }
                    } else {
                        // Remover el objeto del arreglo
                        selectedLogs = selectedLogs.filter(selectedLog => selectedLog.id !== logObj.id);

                        // Cambiar a naranja al deseleccionar
                        span.classList.remove('bg-green-100', 'text-green-700', 'border-green-400');
                        span.classList.add('bg-orange-100', 'text-orange-700', 'border-orange-400');
                        log.state = 'pending';
                    }

                    if (selectedLogs.length == 0) {
                        dateInput.value = "";
                    }

                    console.log('Logs seleccionados:', selectedLogs); // Depuración
                });

                bitacorasList.appendChild(label);
            });

            const registerButton = document.getElementById('register-button');
            registerButton.addEventListener('click', () => {
                if (selectedLogs.length > 0) {
                    const newDate = dateInput.value;

                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: `Se actualizarán ${selectedLogs.length} bitácoras con la fecha ${newDate}.`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, actualizar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            updateBitacora(selectedLogs, newDate);

                            Swal.fire(
                                '¡Actualizado!',
                                'Las bitácoras han sido actualizadas correctamente.',
                                'success'
                            );
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'Atención',
                        text: 'Por favor, selecciona al menos una bitácora.',
                        icon: 'info',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Entendido'
                    });
                }
            });
        }

        function updateBitacora(selectedLogs, newDate) {
            const logIds = selectedLogs.map(item => item.id);
            const newState = selectedLogs.every(log => log.state === 'approved') ? 'approved' :
                'pending'; // Determinar el nuevo estado
            console.log(`Actualizando bitácora ID: ${logIds}, Fecha: ${newDate}, Estado: ${newState}`);

            fetch(`${URL_API}update_logs_by_ids`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ',
                    },
                    body: JSON.stringify({
                        idsLogs: logIds,
                        date: newDate,
                        state: newState
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error al actualizar las bitácoras');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Bitácoras actualizadas:', data);
                    getLogsByApprentice(); // Volver a cargar las bitácoras
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        document.addEventListener('DOMContentLoaded', function() {
            getLogsByApprentice();
        });
    </script>

</body>

</html>
