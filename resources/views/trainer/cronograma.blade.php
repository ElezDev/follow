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
        @media (max-width: 768px) {
            header, nav {
                flex-direction: column;
            }
            .text-lg {
                font-size: 1rem;
            }
        }

        /* Estilos para el calendario */
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
    </style>
</head>
<body class="font-['Arial',sans-serif] bg-white m-0 flex flex-col min-h-screen">
    <header class="bg-white text-[#009e00] px-5 py-2.5 flex flex-col items-center border-t-[5px] border-t-white border-b border-b-[#e0e0e0']">
        <div class="flex justify-between w-full">
            <div class="flex items-center">
                <!-- Logo de SENA en el lado izquierdo -->
                <img class="w-[70px] h-[70px]" src="{{ asset('img/logo-sena.png') }}" alt="Sena Logo ">

                <!-- Espaciado entre los dos bloques -->
                <div class="flex-grow m-2"></div>

                <!-- Logo de Etapa Productiva y texto "Centro de Comercio y Servicios" en el lado derecho -->
                <div class="text-left">
                    <!-- Logo de Etapa Seguimiento -->
                    <a href="{{ route('icon') }}" class="flex items-center">
                        <img src="{{ asset('img/logo.png') }}" alt="Etapa Seguimiento Logo" class="w-10 h-auto mr-1.5">
                        <div class="flex flex-col text-left">
                            <h2 class="text-[12px] m-0 text-[#009e00]">Etapa</h2>
                            <h2 class="text-[12px] m-0 text-[#009e00]">Productiva</h2>
                        </div>
                    </a>

                    <!-- Texto "Centro de Comercio y Servicios" debajo del logo y el texto de Etapa Productiva -->
                    <h2 class="text-sm mt-2 text-[#009e00]">Centro de Comercio y Servicios</h2>
                </div>
            </div>
            <div class="relative ml-auto flex items-center">
                <!-- Contenedor para la imagen y el ícono de los tres puntos -->
                <div class="relative">
                    <!-- Imagen de usuario -->
                    <img class="bg-white w-[45px] h-auto rounded-full border-2 " src="{{ asset('img/administrador/mujer.png') }}" alt="User Icon">

                    <!-- Botón de los tres puntos encima de la imagen -->
                    <button id="menuButtonTri" class="absolute top-1 right-0 bg-transparent p-1 mr-[-46%]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 24 24" stroke-width="1.5" stroke="black" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a1.5 1.5 0 110-3 1.5 1.5 0 010 3zm0 5.25a1.5 1.5 0 110-3 1.5 1.5 0 010 3zm0 5.25a1.5 1.5 0 110-3 1.5 1.5 0 010 3z" />
                        </svg>
                    </button>
                </div>
    </header>
       <!--Notificaciones -->
       <nav class="bg-[#009e00] px-2.5 h-14 py-1.5 flex items-center relative z-10">
        <div class="text-white text-center absolute left-1/2 transform -translate-x-1/2">Cronograma</div>

        <div class="relative ml-auto flex items-center">
            <button id="notifButton" class="relative">
                <a href="{{ route('notificationtrainer') }}">
                <img class="w-[50px] h-auto mr-3.0 filter invert" src="{{ asset('img/notificaciones.png') }}" alt="Notificaciones">

            </button>

        <div class="relative ml-auto flex items-center ">


            <div id="userMenuTri" class=" hidden absolute right-4  mt-2 w-64 bg-[#D9D9D9] border border-gray-300 rounded-lg shadow-lg z-20">
                <div class="p-4">
                    <div class="flex items-center mb-4">
                        <div>
                            <p class="text-sm font-bold">Nombre Usuario<p>
                            <p class="text-sm mt-2">Instructor</p>
                        </div>

                        <img src="{{ asset('img/administrador/mujer.png') }}" alt="User Icon" class="w-10 h-10 rounded-full mr-3 mx-10 bg-white border-black border-2">
                    </div>
                    <ul>
                        <a href="{{ route('username')}}" class="block text-center text-green-600 font-bold mt-4 bg-white border hover:text-white hover:bg-green-600 border-green-600 rounded-lg py-1">Ver perfil</a>
                        <li class="mt-2"><a href="{{ route('configuracion')}}" class="block text-black hover:bg-white p-2 rounded-lg">Configuración</a></li>
                        <li class="mt-2"><a href="{{ route('icon') }}" class="block text-black hover:bg-white p-2 rounded-lg">Aprendices</a></li>
                        <li class="mt-2"><a href="{{ route('cronograma') }}" class="block text-black hover:bg-white p-2 rounded-lg">Cronograma</a></li>

                    </ul>
                    <form id="logoutForm" action="{{ route('logout') }}" method="POST" class="mt-4">
                        @csrf
                        <button type="submit" class="block text-center text-green-600 font-bold bg-white border hover:text-white hover:bg-green-600 border-green-600 rounded-lg py-2 w-full">Cerrar sesión</button>
                    </form>
            </div>
        </div>
    </nav>
    <div class="w-full flex justify-between items-center mt-4">
        <a href="http://127.0.0.1:8000/trainer/perfilapre" class="ml-4">
            <img src="http://127.0.0.1:8000/img/flecha.png" alt="Flecha" class="w-5 h-auto">
        </a>
    </div>
    <div class="flex justify-center">
        <main class="bg-white m-4 p-4 rounded-lg shadow-[0_0_10px_rgba(0,0,0,0.8)] border-[#2F3E4C] w-2/3">
            <div class="flex justify-between items-center mb-4">
                <div class="flex items-center">
                    <button id="prevMonth" class="bg-[#009e00] text-white p-2 rounded-l-lg">←</button>
                    <h2 id="currentMonth" class="text-lg font-bold mx-4"></h2>
                    <button id="nextMonth" class="bg-[#009e00] text-white p-2 rounded-r-lg">→</button>
                </div>
                <button id="addEvent" class=""></button>
            </div>

            <div id="calendarDays" class="calendar"></div>
        </main>
    </div>

    <!-- Modal para agregar/editar eventos -->
    <div id="eventModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-4 rounded-lg shadow-lg w-80">
            <h3 id="modalTitle" class="text-lg font-bold mb-4">Agregar Evento</h3>
            <form id="eventForm">
                <input type="hidden" id="eventId">
                <label for="eventDate" class="block text-sm font-medium text-gray-700">Fecha</label>
                <input type="date" id="eventDate" class="block w-full p-2 border border-gray-300 rounded-md mb-4" required>
                <label for="eventTitle" class="block text-sm font-medium text-gray-700">Título</label>
                <input type="text" id="eventTitle" class="block w-full p-2 border border-gray-300 rounded-md mb-4" required>
                <label for="eventDescription" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea id="eventDescription" class="block w-full p-2 border border-gray-300 rounded-md mb-4"></textarea>
                <div class="flex justify-between">
                    <button type="button" id="cancelEvent" class="bg-gray-300 text-black px-4 py-2 rounded-md">Cancelar</button>
                    <button type="submit" class="bg-[#009e00] text-white px-4 py-2 rounded-md">Guardar</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const currentMonthSpan = document.getElementById('currentMonth');
            const prevMonthButton = document.getElementById('prevMonth');
            const nextMonthButton = document.getElementById('nextMonth');
            const calendarDays = document.getElementById('calendarDays');
            const eventModal = document.getElementById("eventModal");
            const addEventButton = document.getElementById("addEvent");
            const cancelEventButton = document.getElementById("cancelEvent");
            const eventForm = document.getElementById("eventForm");
            const eventIdInput = document.getElementById("eventId");
            const modalTitle = document.getElementById("modalTitle");

            let currentMonth = new Date().getMonth();
            let currentYear = new Date().getFullYear();
            let events = [];

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

                    const dayEvents = events.filter(event => {
                        const eventDate = new Date(event.date);
                        return eventDate.getDate() === day && eventDate.getMonth() === currentMonth && eventDate.getFullYear() === currentYear;
                    });

                    dayEvents.forEach(event => {
                        const eventDiv = document.createElement('div');
                        eventDiv.classList.add('event');
                        eventDiv.textContent = event.title;
                        eventDiv.addEventListener("click", () => {
                            openEditEvent(event);
                        });
                        dayCell.appendChild(eventDiv);
                    });

                    calendarDays.appendChild(dayCell);
                }
            }

            prevMonthButton.addEventListener('click', function() {
                currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
                if (currentMonth === 11) currentYear--; // Ajustar año al retroceder
                renderCalendar();
            });

            nextMonthButton.addEventListener('click', function() {
                currentMonth = (currentMonth === 11) ? 0 : currentMonth + 1;
                if (currentMonth === 0) currentYear++; // Ajustar año al avanzar
                renderCalendar();
            });

            addEventButton.addEventListener("click", function() {
                modalTitle.textContent = "Agregar Evento";
                eventIdInput.value = ''; // Limpiar ID
                eventModal.classList.remove("hidden");
            });

            cancelEventButton.addEventListener("click", function() {
                eventModal.classList.add("hidden");
            });

            eventForm.addEventListener("submit", function(e) {
                e.preventDefault();
                const eventDate = new Date(document.getElementById("eventDate").value);
                eventDate.setUTCHours(12, 0, 0, 0); // Aseguramos que la hora esté al mediodía UTC para evitar desfases
                const eventTitle = document.getElementById("eventTitle").value;
                const eventDescription = document.getElementById("eventDescription").value;

                if (eventIdInput.value) {
                    const eventIndex = events.findIndex(event => event.id === eventIdInput.value);
                    if (eventIndex !== -1) {
                        events[eventIndex] = { id: eventIdInput.value, date: eventDate.toISOString(), title: eventTitle, description: eventDescription };
                    }
                } else {
                    const newEvent = {
                        id: Date.now().toString(),
                        date: eventDate.toISOString(),
                        title: eventTitle,
                        description: eventDescription
                    };
                    events.push(newEvent);
                }

                eventModal.classList.add("hidden");
                renderCalendar();
            });

            function openEditEvent(event) {
                modalTitle.textContent = "Actualizar Evento";
                eventIdInput.value = event.id;
                document.getElementById("eventDate").value = event.date.split("T")[0];
                document.getElementById("eventTitle").value = event.title;
                document.getElementById("eventDescription").value = event.description;
                eventModal.classList.remove("hidden");
            }

            renderCalendar();
        });

        // Manejo de eventos de usuario y notificaciones
        document.getElementById("menuButton").addEventListener("click", function() {
            const userMenu = document.getElementById("userMenu");
            userMenu.classList.toggle("hidden");
        });

        document.getElementById("notifButton").addEventListener("click", function() {
            const notifMenu = document.getElementById("notifMenu");
            notifMenu.classList.toggle("hidden");
        });
    </script>

</body>
</html>

