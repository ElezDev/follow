<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etapa Productiva</title>
    <link rel="logo-icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            
        }

        header {
            background-color: #009e00;
            color: white;
            padding: 8px 10px;
            display: flex;
            justify-content: space-between; /* Separa el logo a la izquierda y el botón a la derecha */
            align-items: center;
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo {
            width: 40px;
            height: auto;
            margin-right: 10px;
        }

        .logo-sena {
            width: 80px;
            height: auto;
        }

        h1 {
            font: 'DM Sans';
            font-size: 1.2em;
            margin: 0;
        }

        button {
            background-color: white;
            color: #009e00;
            border: 1px solid #009e00;
            padding: 8px 15px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        button:hover {
            background-color: #007a00;
            color: white;
        }

        /* Barra verde fija debajo del header */
        .h-14 {
            height: 55px; /* Mantiene el tamaño original */
            background-color: #009e00;
        }

        /* Contenedor de recuperación de cuenta centrado */
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            margin-top: 100px; /* Margen superior para separarlo del header */
            margin-left: auto;  /* Centrado automático desde la izquierda */
            margin-right: auto; /* Centrado automático desde la derecha */
        }


        .title {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .input-field {
            margin-bottom: 15px;
        }

        .input-field label {
            font-size: 14px;
            color: #555;
        }

        .input-field input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 5px;
        }

        .button-container {
            display: flex;
            justify-content: flex-end; /* Alinea los botones a la derecha */
            margin-top: 20px;
        }

        .button-container button {
            padding: 10px 30px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-left: 10px; /* Espacio entre los botones */
        }

        .button-container button:hover {
            opacity: 0.9;
        }

        .cancel-button {
            background-color: #ccc;
        }

        .cancel-button:hover {
            background-color: #bbb;
        }

        .submit-button {
            background-color: #4CAF50;
            color: white;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body class="font-['Arial',sans-serif] bg-white m-0 flex flex-col min-h-screen">
    <!-- Encabezado -->
    <header class="bg-white text-[#009e00] px-5 py-3 flex items-center border-t-[5px] border-t-white border-b border-b-[#e0e0e0]">
        <!-- Logo y texto alineado a la izquierda -->
        <div class="flex items-center">
            <img class="w-[70px] h-[70px]" src="{{ asset('img/logo-sena.png') }}" alt="Sena Logo">
            <div class="text-left ml-3">
                <a href="{{ route('administrator.web') }}" class="flex items-center">
                    <img src="{{ asset('img/logo.png') }}" alt="Etapa Seguimiento Logo" class="w-10 h-auto mr-1.5">
                    <div class="flex flex-col">
                        <h2 class="text-[12px] m-0 text-[#009e00]">Etapa</h2>
                        <h2 class="text-[12px] m-0 text-[#009e00]">Productiva</h2>
                    </div>
                </a>
                <h2 class="text-sm mt-2 text-[#009e00]">Centro de Comercio y Servicios</h2>
            </div>
        </div>

        <!-- Botón de iniciar sesión alineado a la derecha -->
        <a href="{{ route('login') }}">
            <button type="button" class="btn btn-primary">Iniciar Sesión</button>
        </a>
    </header>

    <!-- Barra verde fija debajo del encabezado -->
    <div class="h-14"></div>

    <!-- Página de recuperación de cuenta -->
    <div class="container">
        <div class="title">Recupera tu cuenta</div>
        
        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="input-field">
                <label for="email">Correo electrónico o número de móvil:</label>
                <input type="text" name="email" id="email" value="{{ old('email') }}" required>
            </div>

            <div class="button-container">
                <button type="submit" class="submit-button">Buscar</button>
                <a href="{{ route('login') }}">
                    <button type="button" class="cancel-button">Cancelar</button>
                </a>
            </div>
        </form>
    </div>
</body>
</html>
