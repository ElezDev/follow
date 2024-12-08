<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    {{-- <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet"> --}}
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
    <title>Etapa Productiva</title>

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

        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 1rem;
            margin-top: 1rem;
        }

        .calendar div {
            border: 1px solid #ccc;
            padding: 10px;
            min-height: 80px;
            position: relative;
        }

        .calendar div .event {
            background-color: #009e00;
            color: white;
            padding: 2px 5px;
            border-radius: 4px;
            font-size: 0.8rem;
            margin-top: 5px;
        }

        .calendar-container {
            position: absolute;
            width: 100%;
            height: 38px;
            left: 0%;
            top: 24%;
            background: #D9D9D9;
            display: flex;
            align-items: center;
            justify-content: flex-start;

        }

        .calendar-container h3 {
            position: relative;
            width: 476px;
            height: 26px;
            left: 84px;
            font-family: 'DM Sans', sans-serif;
            font-style: normal;
            font-weight: 400;
            font-size: 15px;
            line-height: 36px;
            display: flex;
            align-items: center;
            color: #000000;
            margin: 0 10px;
        }

        .back-button {
            background-color: transparent;
            color: #000000;
            font-style: normal;
            position: absolute;
            width: 27px;
            height: 27px;
            left: 40px;
            top: -16px;
            padding: 15px;
            text-align: center;
            font-size: 32px;
            cursor: pointer;
            text-decoration: none;
        }

        #calendar {
            position: absolute;
            width: 1054px;
            height: 600px;
            left: 10%;
            top: 28%;
            background: #D9D9D9;
            margin: 0 auto;
        }

        .fc .fc-daygrid-day {
            height: 150px;
            padding: 60px;
        }

        .fc .fc-col-header-cell {
            font-size: 15px;
        }

        .fc .fc-daygrid-day-number {
            font-size: 16px;
        }

        .fc .fc-daygrid-event {
            font-size: 14px;
        }

        .fc-day-other {
            visibility: hidden;
        }


        @media (max-width: 1024px) {
            #calendar {
                width: 90%;
                height: auto;
                left: 5%;
            }

            .calendar-container h3 {
                width: 70%;
                font-size: 18px;
            }

            .fc .fc-daygrid-day {
                height: auto;
                padding: 40px;
            }

            .fc .fc-col-header-cell {
                font-size: 14px;
            }

            .fc .fc-daygrid-day-number {
                font-size: 14px;
            }

            .fc .fc-daygrid-event {
                font-size: 12px;
            }
        }

        @media (max-width: 768px) {
            #calendar {
                width: 95%;
                left: 2.5%;
            }

            .calendar-container h3 {
                width: 80%;
                font-size: 16px;
                left: 10px;
            }

            .back-button {
                left: 10px;
                top: -10px;
                font-size: 28px;
            }

            .fc .fc-daygrid-day {
                padding: 30px;
            }

            .fc .fc-col-header-cell {
                font-size: 13px;
            }

            .fc .fc-daygrid-day-number {
                font-size: 12px;
            }

            .fc .fc-daygrid-event {
                font-size: 11px;
            }
        }

        @media (max-width: 480px) {
            .calendar-container {
                top: 20%;
                height: auto;
            }

            .calendar-container h3 {
                width: 90%;
                font-size: 14px;
                left: 5px;
            }

            .back-button {
                left: 5px;
                top: -8px;
                font-size: 26px;
            }

            #calendar {
                width: 100%;
                left: 0;
                top: 25%;
                padding: 0 10px;
            }

            .fc .fc-daygrid-day {
                padding: 20px;
            }

            .fc .fc-col-header-cell {
                font-size: 12px;
            }

            .fc .fc-daygrid-day-number {
                font-size: 10px;
            }

            .fc .fc-daygrid-event {
                font-size: 10px;
            }
        }

        @media (max-width: 1024px) {
            #calendar {
                width: 90%;
                height: auto;
                left: 5%;
            }

            .calendar-container h3 {
                width: 70%;
                font-size: 18px;
            }

            .fc .fc-daygrid-day {
                height: auto;
                padding: 40px;
            }

            .fc .fc-col-header-cell {
                font-size: 14px;
            }

            .fc .fc-daygrid-day-number {
                font-size: 14px;
            }

            .fc .fc-daygrid-event {
                font-size: 12px;
            }
        }

        @media (max-width: 768px) {
            #calendar {
                width: 95%;
                left: 2.5%;
            }

            .calendar-container h3 {
                width: 80%;
                font-size: 16px;
                left: 10px;
            }

            .back-button {
                left: 10px;
                top: -10px;
                font-size: 28px;
            }

            .fc .fc-daygrid-day {
                padding: 30px;
            }

            .fc .fc-col-header-cell {
                font-size: 13px;
            }

            .fc .fc-daygrid-day-number {
                font-size: 12px;
            }

            .fc .fc-daygrid-event {
                font-size: 11px;
            }
        }

        @media (max-width: 480px) {
            .calendar-container {
                top: 15%;
                height: auto;
            }

            .calendar-container h3 {
                width: 90%;
                font-size: 14px;
                left: 5px;
            }

            .back-button {
                left: 5px;
                top: -8px;
                font-size: 26px;
            }

            #calendar {
                width: 100%;
                left: 0;
                padding: 0 10px;
            }

            .fc .fc-daygrid-day {
                padding: 20px;
            }

            .fc .fc-col-header-cell {
                font-size: 12px;
            }

            .fc .fc-daygrid-day-number {
                font-size: 10px;
            }

            .fc .fc-daygrid-event {
                font-size: 10px;
            }
        }
    </style>

</head>

<body class="font-['Arial',sans-serif] bg-white m-0 flex flex-col min-h-screen">

    @include('partials.header')

    <nav class="bg-[#009e00] px-2.5 h-14 py-1.5 flex justify-start items-center relative z-10">
        <a href="{{ route('apprentice.notification') }}" id="notifButton" class="absolute right-0">
            <img class="w-[35px] h-auto mr-2.5 filter invert" src="{{ asset('img/notificaciones.png') }}"
                alt="Notificaciones">
        </a>
        <div class="w-full flex justify-center">
            <ul class="horizontal-list flex space-x-4 justify-center">
                <li>
                    <a href="{{ route('apprentice.index') }}"
                        class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition ">
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="{{ route('apprentice.calendar') }}"
                        class="block text-white text-center px-4 py-2 rounded-lg  hover:bg-green-700 transition font-bold
                              {{ request()->routeIs('apprentice.calendar') ? 'bg-green-600' : 'hover:bg-green-600' }}">
                        Calendario
                    </a>
                </li>
            </ul>
        </div>

    </nav>


    <div class="w-full flex justify-between items-center mt-6">
        <a href="{{ route('apprentice.home') }}" class="ml-4">
            <img src="{{ asset('img/flecha.png') }}" alt="Flecha" class="w-5 h-auto">
        </a>
    </div>

    <div class="flex justify-center">
        <main class="bg-white m-4 p-4 rounded-lg shadow-[0_0_10px_rgba(0,0,0,0.8)] border-[#2F3E4C] w-2/3">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">Cronograma</h2>
                <div class="flex items-center">
                    <button id="prevMonth" class="bg-[#009e00] text-white px-3 py-1 rounded-l">
                        <<span id="currentMonth" class="bg-[#009e00] text-white px-4 py-1">Mes Actual</span>
                            <button id="nextMonth" class="bg-[#009e00] text-white px-3 py-1 rounded-r">></button>
                </div>
            </div>
            <section class="p-4">
                <div class="grid grid-cols-7 gap-2 text-center font-bold">
                    <div>Dom</div>
                    <div>Lun</div>
                    <div>Mar</div>
                    <div>Mié</div>
                    <div>Jue</div>
                    <div>Vie</div>
                    <div>Sáb</div>
                </div>
                <div id="calendarDays" class="calendar"></div>
            </section>
        </main>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const currentMonthSpan = document.getElementById('currentMonth');
            const prevMonthButton = document.getElementById('prevMonth');
            const nextMonthButton = document.getElementById('nextMonth');
            const calendarDays = document.getElementById('calendarDays');

            let currentMonth = new Date().getMonth();
            let currentYear = new Date().getFullYear();
            const months = [
                'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
            ];

            function daysInMonth(month, year) {
                return new Date(year, month + 1, 0).getDate();
            }

            function firstDayOfMonth(month, year) {
                return new Date(year, month, 1).getDay();
            }

            function renderCalendar() {
                calendarDays.innerHTML = '';
                currentMonthSpan.textContent = `${months[currentMonth]} ${currentYear}`;

                const totalDays = daysInMonth(currentMonth, currentYear);
                const startDay = firstDayOfMonth(currentMonth, currentYear);

                for (let i = 0; i < startDay; i++) {
                    const emptyCell = document.createElement('div');
                    calendarDays.appendChild(emptyCell);
                }

                for (let day = 1; day <= totalDays; day++) {
                    const dayCell = document.createElement('div');
                    dayCell.textContent = day;
                    dayCell.classList.add('cursor-pointer');

                    dayCell.addEventListener("click", () => {
                        window.location.href = `registervisitaprendiz`;
                    });

                    calendarDays.appendChild(dayCell);
                }
            }

            prevMonthButton.addEventListener('click', function() {
                currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
                if (currentMonth === 11) currentYear--;
                renderCalendar();
            });

            nextMonthButton.addEventListener('click', function() {
                currentMonth = (currentMonth === 11) ? 0 : currentMonth + 1;
                if (currentMonth === 0) currentYear++;
                renderCalendar();
            });

            renderCalendar();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('toggleMenu2').addEventListener('click', function() {
                console.log('toggleMenu2 clicked'); // Verificar si se activa el evento
                var menu = document.getElementById('menu2');
                menu.classList.toggle('hidden'); // Alternar la clase 'hidden'
            });

            // Función para alternar sublistas
            function toggleSublist(event) {
                event.preventDefault(); // Evitar el comportamiento por defecto
                var sublist = event.target.nextElementSibling; // Obtener el siguiente elemento
                if (sublist) {
                    sublist.classList.toggle('hidden'); // Alternar la clase 'hidden' de la sublista
                }
            }

            // Registro del evento para todos los enlaces que necesitan alternar un submenu
            document.querySelectorAll('a[onclick="toggleSublist(event)"]').forEach(function(link) {
                link.addEventListener('click', toggleSublist);
            });
        });
    </script>

    <script src="{{ asset('js/SuperAdmin.js') }}"></script>

</body>

</html>
