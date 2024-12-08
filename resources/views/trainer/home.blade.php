<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainner - home</title>
    @vite('resources/css/app.css')
    <style>
        #userMenu {
            top: 100%;
            margin-top: 0.5rem;
        }

        .user-status {
            text-align: center;
            /* Centrar el texto */
            color: #009e00;
            /* Color verde */
            margin-top: 5px;
            /* Espacio superior para alineación */
            font-size: 12px;
            /* Ajustar el tamaño de fuente */
        }

        .vis-item.completed {
            background-color: green;
            color: white;
        }

        .vis-item {
            background-color: #3498db;
            color: white;
        }

        .vis-item.vis-selected {
            background-color: #2ecc71;
        }

        .card {
            width: 300px;
            /* Ajusta el ancho según tus necesidades */
            height: 300px;
            /* Ajusta la altura según tus necesidades */
            position: relative;
            /* Necesario para posicionar el texto en el centro */
        }

        #percentage {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 2rem;
            /* Ajusta el tamaño de la fuente según tus necesidades */
            font-weight: bold;
            color: black;
            /* Color del porcentaje */
        }
    </style>
</head>

<body class="font-['Arial',sans-serif] bg-white m-0 flex flex-col min-h-screen">

    @include('partials.header')

    @include('partials.nav-trainner')

    <main class="flex flex-col items-center mt-4 relative">
        <div class="w-full flex justify-between items-center mb-4">
            <a href="{{ route('icon') }}" class="ml-4">
                <img src="{{ asset('img/flecha.png') }}" alt="Flecha" class="w-5 h-auto">
            </a>

            <form action="#" method="GET" class="flex items-center justify-center mx-auto pl-20">
                <input placeholder="Buscar..." class="px-2  py-1 text-sm border border-black rounded-full w-96">
                <button type="submit" aria-label="Buscar" class="p-2 bg-transparent border-none cursor-pointer -ml-10">
                    <img src="{{ asset('img/lupa.png') }}" alt="Buscar" class="w-4 h-auto">
                </button>
            </form>
            <div class="bg-white border-none pr-28 cursor-pointer">
            </div>
        </div>

        <div
            class="w-full max-w-6xl bg-[#2f3e4c14] border-2 border-[#04324D] rounded-lg p-6 shadow-[0_0_10px_rgba(0,0,0,0.8)] mt-1">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-6 gap-4">
                @php
                    $contador = 0;
                @endphp

                @if (empty($data) || !array_filter($data, fn($monitoring) => !empty($monitoring['apprentices'])))
                    <p class="text-center text-red-600">No hay aprendices asignados.</p>
                @else
                    @foreach ($data as $monitoring)
                        @foreach ($monitoring['apprentices'] as $apprentice)
                            <a href="{{ route('perfilapre', ['id' => $apprentice['user']['id']]) }}"
                                class="w-40px h-30px bg-white border-2 border-[#009E00] rounded-2xl m-4 p-2 flex flex-col items-center hover:bg-green-100">
                                <img src="{{ asset('img/trainer/aprendiz_icono_tra.png') }}" alt="User"
                                    class="w-6 h-8 mb-1">
                                <span class="text-xs text-center p-1">Nombre Completo: {{ $apprentice['user']['name'] }}
                                    {{ $apprentice['user']['last_name'] }}</span>
                                <span class="text-xs text-center p-1">Cédula:
                                    {{ $apprentice['user']['identification'] }}</span>
                                <span class="text-xs text-center p-1">Ficha: {{ $apprentice['ficha'] }}</span>
                                <span class="text-xs text-center p-1">Tipo de seguimiento:
                                    {{ $monitoring['network_knowledge'] }}</span>
                            </a>
                            @php
                                $contador++;
                            @endphp
                        @endforeach
                    @endforeach
                @endif

            </div>
        </div>
        <div class="bg-[#009E00] border-2 border-[black] rounded-lg p-2 mb-2">
            <div class="text-center text-sm text-black">Total de Aprendices: {{ $contador }}</div>
        </div>
    </main>

</body>

</html>
