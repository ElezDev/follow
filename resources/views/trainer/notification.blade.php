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

        .active-button {
            background-color: #2F3E4C;
            color: white;
        }
    </style>
</head>

<body class="font-['Arial',sans-serif] bg-white m-0 flex flex-col min-h-screen">

    @include('partials.header')

    @include('partials.nav-trainner')

    <div class="w-full flex justify-between items-center mt-6">
        <a href="{{ route('trainer.home') }}" class="ml-4">
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
        <a href="{{ route('report') }}" type="submit" class="bg-gray-300 hover:bg-gray-400 text-black p-1 rounded">
            Redactar
        </a>
    </div>

    <div class="flex justify-center">
        <main class="bg-white m-4 p-4 rounded-lg shadow-lg border-[#2F3E4C] w-2/3">

            <!-- Botones de Tabs -->
            <div class="flex justify-center mb-4">
                <button type="button" id="receivedTab" class="tab-button active-button p-2 w-1/3 text-center rounded"
                    onclick="setActiveTab('received')">
                    Recibidos
                </button>
                <button type="button" id="sentTab" class="tab-button p-2 w-1/3 text-center rounded"
                    onclick="setActiveTab('sent')">
                    Enviados
                </button>
            </div>

            <!-- Lista de Notificaciones -->
            <ul id="notificationList" class="bg-white shadow overflow-hidden sm:rounded-md">
                <!-- Notificaciones Recibidas -->
                <div id="receivedNotifications" class="notification-list">
                    @foreach ($receivedNotifications as $notification)
                        <li class="notification-item border-t border-gray-200">
                            <div class="flex justify-between items-center p-4 hover:bg-gray-100">
                                <div>
                                    <h2 class="text-lg font-bold">{{ $notification['content'] }}</h2>
                                    <p class="text-gray-600">{{ $notification['message'] }}</p>
                                    <p class="text-gray-600">
                                        {{ \Carbon\Carbon::parse($notification['shipping_date'])->format('d/m/Y') }}</p>
                                </div>
                                <div class="flex items-center">
                                    <a href="{{ route('email') }}">
                                        <button class="bg-[#009e00] text-white p-2 rounded ml-2">Ver</button>
                                    </a>
                                    <button class="bg-gray-300 text-black p-2 rounded ml-2">Eliminar</button>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </div>

                <!-- Notificaciones Enviadas -->
                <div id="sentNotifications" class="notification-list" style="display:none;">
                    @foreach ($sentNotifications as $notification)
                        <li class="notification-item border-t border-gray-200">
                            <div class="flex justify-between items-center p-4 hover:bg-gray-100">
                                <div>
                                    <h2 class="text-lg font-bold">{{ $notification['content'] }}</h2>
                                    <p class="text-gray-600">{{ $notification['message'] }}</p>
                                    <p class="text-gray-600">
                                        {{ \Carbon\Carbon::parse($notification['shipping_date'])->format('d/m/Y') }}
                                    </p>
                                </div>
                                <div class="flex items-center">
                                    <a href="{{ route('email') }}">
                                        <button class="bg-[#009e00] text-white p-2 rounded ml-2">Ver</button>
                                    </a>
                                    <button class="bg-gray-300 text-black p-2 rounded ml-2">Eliminar</button>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </div>
            </ul>
        </main>
    </div>

    <script>
        // Función para cambiar entre tabs
        function setActiveTab(tab) {
            if (tab === 'received') {
                document.getElementById('receivedTab').classList.add('active-button');
                document.getElementById('sentTab').classList.remove('active-button');
                document.getElementById('receivedNotifications').style.display = 'block';
                document.getElementById('sentNotifications').style.display = 'none';
            } else if (tab === 'sent') {
                document.getElementById('sentTab').classList.add('active-button');
                document.getElementById('receivedTab').classList.remove('active-button');
                document.getElementById('sentNotifications').style.display = 'block';
                document.getElementById('receivedNotifications').style.display = 'none';
            }
        }

        // Iniciar con la tab 'received' activa
        setActiveTab('received');
    </script>

</body>

</html>
