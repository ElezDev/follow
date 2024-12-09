<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambio de Contraseña</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-color: #f0fdf4;
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen">

    <!-- Vista 1: Ingreso de Correo Electrónico -->
    <div id="step1" class="bg-white p-8 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-bold text-green-600 mb-4">Restablecer Contraseña</h2>
        <p class="text-gray-600 mb-4">Ingresa tu correo electrónico para recibir el código de verificación.</p>
        <form id="emailForm">
            <input type="email" id="emailInput" placeholder="correo@ejemplo.com"
                class="w-full p-2 mb-4 border border-green-300 rounded focus:outline-none focus:border-green-500"
                required>

            <button type="submit" class="w-full bg-green-500 text-white p-2 rounded hover:bg-green-600">
                Enviar Código
            </button>

            <button type="button" class="w-full bg-gray-500 text-white p-2 rounded hover:bg-gray-600 mt-2"
                onclick="window.location.href='{{ route('login') }}'">
                Regresar
            </button>

        </form>
    </div>

    <!-- Vista 2: Ingreso del Código de Verificación -->
    <div id="step2" class="bg-white p-8 rounded-lg shadow-md w-96 hidden">
        <h2 class="text-2xl font-bold text-green-600 mb-4">Verificar Código</h2>
        <p class="text-gray-600 mb-4">Ingresa el código de verificación que recibiste por correo electrónico.</p>
        <form id="codeForm">
            <input type="text" id="codeInput" placeholder="Código de verificación"
                class="w-full p-2 mb-4 border border-green-300 rounded focus:outline-none focus:border-green-500"
                required>
            <button type="submit" class="w-full bg-green-500 text-white p-2 rounded hover:bg-green-600">Verificar
                Código
            </button>
            <button type="button" class="w-full bg-gray-500 text-white p-2 rounded hover:bg-gray-600 mt-2"
                onclick="window.location.href='{{ route('login') }}'">
                Cancelar
            </button>
        </form>
    </div>

    <!-- Vista 3: Cambio de Contraseña -->
    <div id="step3" class="bg-white p-8 rounded-lg shadow-md w-96 hidden">
        <h2 class="text-2xl font-bold text-green-600 mb-4">Cambiar Contraseña</h2>
        <p class="text-gray-600 mb-4">Ingresa tu nueva contraseña.</p>
        <form id="passwordForm">
            <input type="password" placeholder="Nueva contraseña"
                class="w-full p-2 mb-4 border border-green-300 rounded focus:outline-none focus:border-green-500"
                required>
            <input type="password" placeholder="Confirmar contraseña"
                class="w-full p-2 mb-4 border border-green-300 rounded focus:outline-none focus:border-green-500"
                required>
            <button type="submit" class="w-full bg-green-500 text-white p-2 rounded hover:bg-green-600">
                Cambiar Contraseña
            </button>
            <button type="button" class="w-full bg-gray-500 text-white p-2 rounded hover:bg-gray-600 mt-2"
                onclick="window.location.href='{{ route('login') }}'">
                Cancelar
            </button>
        </form>
    </div>

    <script>
        const URL_API = "{{ env('URL_API') }}";

        const step1 = document.getElementById('step1');
        const step2 = document.getElementById('step2');
        const step3 = document.getElementById('step3');

        document.getElementById('emailForm').addEventListener('submit', (e) => {
            e.preventDefault();

            const email = document.getElementById('emailInput').value;

            // Mostrar el loader
            Swal.fire({
                title: 'Enviando correo...',
                text: 'Por favor espera.',
                allowOutsideClick: false, // Evita que el usuario cierre el loader manualmente
                didOpen: () => {
                    Swal.showLoading(); // Muestra el loader
                }
            });

            // Enviar la solicitud con Axios
            axios.post(URL_API + 'verified_email', {
                    email: email
                })
                .then(response => {
                    // Cerrar el loader
                    Swal.close();

                    // Mostrar el modal de éxito
                    Swal.fire({
                        icon: 'success',
                        title: '¡Éxito!',
                        text: 'Correo enviado exitosamente. Verifica tu bandeja de entrada.',
                        confirmButtonColor: '#22c55e'
                    });

                    step1.classList.add('hidden');
                    step2.classList.remove('hidden');

                })
                .catch(error => {
                    // Cerrar el loader
                    Swal.close();

                    // Mostrar el modal de error
                    Swal.fire({
                        icon: 'error',
                        title: '¡Error!',
                        text: 'Ocurrió un error al enviar el correo. Intenta de nuevo.',
                        confirmButtonColor: '#ef4444'
                    });
                });

        });

        document.getElementById('codeForm').addEventListener('submit', (e) => {
            e.preventDefault();

            const verificationCode = document.getElementById('codeInput').value;

            if (!verificationCode) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Código requerido',
                    text: 'Por favor, ingresa el código de verificación.',
                    confirmButtonColor: '#f59e0b'
                });
                return;
            }

            // Muestra el loader mientras se realiza la solicitud
            Swal.fire({
                title: 'Verificando código...',
                text: 'Por favor espera.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            // Realiza la solicitud al endpoint
            axios.post(URL_API + 'verified_code', {
                    code: verificationCode
                })
                .then(response => {
                    // Cierra el loader
                    Swal.close();

                    // Muestra el mensaje de éxito
                    Swal.fire({
                        icon: 'success',
                        title: '¡Código verificado!',
                        text: 'El código ha sido validado correctamente.',
                        confirmButtonColor: '#22c55e'
                    }).then(() => {
                        step2.classList.add('hidden');
                        step3.classList.remove('hidden');
                    });
                })
                .catch(error => {
                    // Cierra el loader
                    Swal.close();

                    // Maneja el error
                    Swal.fire({
                        icon: 'error',
                        title: 'Error al verificar',
                        text: 'El código ingresado no es valido.',
                        confirmButtonColor: '#00ff65'
                    });
                });
        });

        document.getElementById('passwordForm').addEventListener('submit', (e) => {
            e.preventDefault();
            alert('Contraseña cambiada exitosamente');
        });
    </script>
</body>

</html>
