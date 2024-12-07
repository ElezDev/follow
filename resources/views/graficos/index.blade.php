<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <title>Etapa Productiva</title>
    <title>Gráficos Dinámicos con Filtros Avanzados</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            text-align: center;
        }
        .filters {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    margin-bottom: 20px;
}

.filter-item-box {
    padding: 15px;
    border: 2px solid rgba(0, 158, 0, 0.3); /* Borde difuso */
    border-radius: 8px; /* Bordes redondeados */
    box-shadow: 0 4px 8px rgba(0, 158, 0, 0.2); /* Sombra difusa */
    background-color: #f9f9f9; /* Fondo suave */
    width: 200px; /* Ajusta el tamaño según lo necesites */
}

.filter-item-box label {
    display: block;
    font-weight: bold;
    margin-bottom: 8px;
}

.filter-item-box select,
.filter-item-box input {
    width: 100%;
    padding: 8px;
    font-size: 14px;
    border-radius: 4px;
    border: 1px solid #ccc;
}

        .filter-item {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .charts-container {
            display: flex;
            justify-content: space-evenly;
            margin-top: 20px;
        }
        .chart-wrapper {
            width: 45%;
        }
        .chart-title {
            margin-bottom: 10px;
            font-weight: bold;
        }
        canvas {
            max-width: 100%;
        }
        .contract-info {
            margin: 10px 0;
            display: flex;
            justify-content: center;
            gap: 20px;
            font-size: 16px;
        }
        .contract-info .contract-item {
            font-weight: bold;
            font-size: 18px;
        }
        .contract-info .contract-count {
            font-family: 'Georgia', serif;
            font-size: 18px;
        }
        .separator {
            margin: 20px 0;
            border-top: 2px solid #ccc;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }
        #userMenu {
            top: 100%;
            margin-top: 0.5rem;
        }
        .user-status {
            text-align: center; /* Centrar el texto */
            color: #009e00; /* Color verde */
            margin-top: 5px; /* Espacio superior para alineación */
            font-size: 12px; /* Ajustar el tamaño de fuente */
        }
    </style>
</head>
<body class="font-['Arial',sans-serif] bg-white m-0 flex flex-col min-h-screen">
    <header class="bg-white text-[#009e00] px-5 py-2.5 flex flex-col items-center border-t-[5px] border-t-white border-b border-b-[#e0e0e0]">

          <div class="flex justify-between w-full">
              <div class="flex items-center">
                  <!-- Logo de SENA en el lado izquierdo -->
                  <img class="w-[70px] h-[70px]" src="{{ asset('img/logo-sena.png') }}" alt="Sena Logo ">

                  <!-- Espaciado entre los dos bloques -->
                  <div class="flex-grow m-2"></div>

                  <!-- Logo de Etapa Productiva y texto "Centro de Comercio y Servicios" en el lado derecho -->
                  <div class="text-left">
                      <!-- Logo de Etapa Seguimiento -->
                      <a href="{{ route('superadmin.home') }}" class="flex items-center">
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
                      <button id="menuButton" class="absolute top-1 right-0 bg-transparent p-1 mr-[-46%]">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 24 24" stroke-width="1.5" stroke="black" class="w-8 h-8">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a1.5 1.5 0 110-3 1.5 1.5 0 010 3zm0 5.25a1.5 1.5 0 110-3 1.5 1.5 0 010 3zm0 5.25a1.5 1.5 0 110-3 1.5 1.5 0 010 3z" />
                          </svg>
                      </button>
                  </div>
                   {{-- Menu --}}
                   <div id="userMenu" class=" hidden absolute right-4  mt-2 w-64 bg-[#D9D9D9] border border-gray-300 rounded-lg shadow-lg z-20">
                       <div class="p-4">
                           <div class="flex items-center mb-4">
                               <div>
                                   <p class="text-sm font-bold">{{ auth()->user()->name }} {{ auth()->user()->last_name }}</p>
                                   <p class="text-sm mt-2">Super Administrador</p>
                               </div>


                           </div>
                           <ul>
                               <li class="mt-2"><a href="{{ route('superadmin.SuperAdmin-Perfil') }}" class="block text-center text-green-600 font-bold bg-white border hover:text-white hover:bg-green-600 border-green-600 rounded-lg py-1">Ver perfil</a></li>

                               <li class="mt-2"><a href="{{ route('superadmin.SuperAdmin-Configuracion') }}" class="block text-black hover:bg-white p-2 rounded-lg">Configuración</a></li>
                               <li class="mt-2"><a href="{{ route('superadmin.SuperAdmin-Permisos') }}" class="block text-black hover:bg-white p-2 rounded-lg" onclick="toggleSublist(event)">Permisos</a></li>
                               <li class="mt-2"><a href="{{ route('superadmin.SuperAdmin-Graficas')}}" class="block text-black hover:bg-white p-2 rounded-lg">Graficas</a></li>
                           </ul>
                           <form id="logoutForm" action="{{ route('logout') }}" method="POST" class="mt-4">
                               @csrf
                               <button type="submit" class="block text-center text-green-600 font-bold bg-white border hover:text-white hover:bg-green-600 border-green-600 rounded-lg py-2 w-full">Cerrar sesión</button>
                           </form>
                   </div>
               </div>
          </header>
      <nav class="bg-[#009e00] px-2.5 h-14 py-1.5 flex justify-end items-center relative z-10">

                  <!-- Botón de notificaciones alineado a la derecha -->
                  <div class="w-full flex justify-center">
                      <ul class="horizontal-list flex space-x-4 justify-center items-center" >
                          <li>
                              <a href="{{ route('superadmin.home') }}" class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                                  Inicio
                              </a>
                          </li>
                          <li>
                              <a href="{{ route('superadmin.SuperAdmin-Administrator') }}"
                              class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                             Administrador

                              </a>
                          </li>
                          <li>
                              <a href="{{ route('superadmin.SuperAdmin-Instructor') }}" class="block text-center text-white px-4 py-2 rounded-lg {{ request()->routeIs('superadmin.SuperAdmin-Instructor') ? 'bg-green-600 bg-opacity-70' : 'bg-green-600 bg-opacity-20 hover:bg-opacity-50' }}">
                                  <span class="font-bold">
                                     Instructor
                                  </span>
                              </a>
                          </li>
                          <li>
                              <a href="{{ route('superadmin.SuperAdmin-Aprendiz') }}" class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                                  Aprendices
                              </a>
                          </li>
                          <li>
                              <a href="{{ route('superadmin.SuperAdmin-Graficas') }}" class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                                 Graficas
                              </a>
                          </li>
                          <button id="notifButton" class="absolute right-0 mr-4">
                              <a href="{{ route('superadmin.SuperAdmin-Notificaciones') }}">
                                  <img class="w-[50px] h-auto filter invert" src="{{ asset('img/notificaciones.png') }}" alt="Notificaciones">
                              </a>
                          </button>
                      </ul>
                  </div>
              </nav>
<body>
    <div class="container">
        <h1 style="font-weight: bold; margin-top: 20px;">GRAFICOS FILTROS AVANZADOS</h1>



        <!-- Contenedor de filtros -->
        <div class="filters">
            <div class="filter-item-box">
                <label for="filterContract">Tipo de Contrato:</label>
                <select id="filterContract" onchange="applyFilters()">
                    <option value="todos">Todos</option>
                    <option value="pasantia">Pasantía</option>
                    <option value="contrato">Contrato de Aprendizaje</option>
                    <option value="laboral">Vínculo Laboral</option>
                </select>
            </div>

            <div class="filter-item-box">
                <label for="startDate">Fecha Inicio:</label>
                <input type="date" id="startDate" onchange="applyFilters()">
            </div>

            <div class="filter-item-box">
                <label for="endDate">Fecha Fin:</label>
                <input type="date" id="endDate" onchange="applyFilters()">
            </div>

            <div class="filter-item-box">
                <label for="sortOrder">Ordenar por:</label>
                <select id="sortOrder" onchange="applyFilters()">
                    <option value="asc">Cantidad Ascendente</option>
                    <option value="desc">Cantidad Descendente</option>
                </select>
            </div>
        </div>


        <!-- Información de los tipos de contrato con sus valores -->
        <div id="contractInfo" class="contract-info"></div>

        <!-- Separador entre la información de contratos y las gráficas -->
        <div class="separator"></div>

        <!-- Gráficos -->
        <div class="charts-container">
            <div class="chart-wrapper">
                <div class="chart-title">Gráfico de Pastel (Distribución por Contrato)</div>
                <canvas id="pieChart"></canvas>
            </div>
            <div class="chart-wrapper">
                <div class="chart-title">Gráfico de Barras (Cantidad de Aprendices)</div>
                <canvas id="barChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        // Datos iniciales con aprendices y fechas
        const initialData = [
            { tipo: 'Pasantía', cantidad: 150, fecha: '2024-01-15' },
            { tipo: 'Vínculo Laboral', cantidad: 250, fecha: '2024-02-10' },
            { tipo: 'Contrato de Aprendizaje', cantidad: 110, fecha: '2024-03-20' },
            { tipo: 'Pasantía', cantidad: 190, fecha: '2024-04-25' },
            { tipo: 'Proyecto Productivo', cantidad: 100, fecha: '2024-05-15' }
        ];

        let filteredData = [...initialData];

        // Función para aplicar los filtros
        function applyFilters() {
            const filterContract = document.getElementById('filterContract').value;
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;
            const sortOrder = document.getElementById('sortOrder').value;

            filteredData = initialData.filter(item => {
                // Convertir las fechas a objetos Date para compararlas correctamente
                const itemDate = new Date(item.fecha);
                const matchContract = filterContract === 'todos' || item.tipo.toLowerCase().includes(filterContract.toLowerCase());

                let matchDate = true;  // Si no se especifican fechas, coinciden todos
                if (startDate) matchDate = itemDate >= new Date(startDate);
                if (endDate) matchDate = matchDate && itemDate <= new Date(endDate);

                return matchContract && matchDate;
            });

            // Ordenar los resultados según la opción seleccionada
            if (sortOrder === 'asc') {
                filteredData.sort((a, b) => a.cantidad - b.cantidad);
            } else if (sortOrder === 'desc') {
                filteredData.sort((a, b) => b.cantidad - a.cantidad);
            }

            if (filteredData.length === 0) {
                alert("No se encontraron datos con los filtros seleccionados.");
            }

            updateCharts(); // Actualizar los gráficos
            updateContractInfo(); // Actualizar la información del contrato
        }

        // Inicializar gráficos
        const pieCtx = document.getElementById('pieChart').getContext('2d');
        const barCtx = document.getElementById('barChart').getContext('2d');

        const pieChart = new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: [],
                datasets: [{
                    data: [],
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50', '#FFC107'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'top' },
                },
            }
        });

        const barChart = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: [],
                datasets: [{
                    label: 'Cantidad de Aprendices',
                    data: [],
                    backgroundColor: '#36A2EB',
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'top' },
                },
            }
        });

        // Función para actualizar los gráficos
        function updateCharts() {
            const aggregatedData = filteredData.reduce((acc, item) => {
                acc[item.tipo] = (acc[item.tipo] || 0) + item.cantidad;
                return acc;
            }, {});

            const labels = Object.keys(aggregatedData);
            const values = Object.values(aggregatedData);

            // Actualizar gráfico de pastel
            pieChart.data.labels = labels;
            pieChart.data.datasets[0].data = values;
            pieChart.update();

            // Actualizar gráfico de barras
            barChart.data.labels = labels;
            barChart.data.datasets[0].data = values;
            barChart.update();
        }

        // Función para mostrar la información de los tipos de contrato y sus valores
        function updateContractInfo() {
            const aggregatedData = filteredData.reduce((acc, item) => {
                acc[item.tipo] = (acc[item.tipo] || 0) + item.cantidad;
                return acc;
            }, {});

            let contractInfoHtml = '';
            for (let tipo in aggregatedData) {
                contractInfoHtml += `<div class="contract-item">${tipo}: </div><div class="contract-count">${aggregatedData[tipo]} aprendices</div>`;
            }

            document.getElementById('contractInfo').innerHTML = contractInfoHtml;
        }

        // Cargar datos iniciales
        applyFilters();
    </script>
</body>
</html>
