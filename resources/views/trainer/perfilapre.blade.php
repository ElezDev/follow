<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/vis-timeline/7.4.9/vis-timeline-graph2d.min.css"
        rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vis-timeline/7.4.9/vis-timeline-graph2d.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

    </div>
    </nav>
    <div class="w-full flex justify-between items-center mt-6">
        <a href="{{ route('icon') }}" class="ml-4">
            <img src="{{ asset('img/flecha.png') }}" alt="Flecha" class="w-5 h-auto">
        </a>
    </div>
    <div class="flex justify-center">
        <main class=" bg-white m-2 px-2 rounded-lg max-height-100% w-5/7 border-2 border-black">


            <div class="container  mx-auto mt-6 p-6 bg-white rounded-lg shadow-lg">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="md:col-span-1 flex flex-col items-center space-y-4">
                        <div class="bg-gray-200 rounded-full p-6  border-2 border-black">
                            <img src="{{ asset('img/trainer/aprendiz_icono_tra.png') }}" alt="Avatar" class="h-28">
                        </div>
                        <div class="w-full">
                            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombres</label>
                            <input type="text" id="nombre" value="Carolina"
                                class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus: border-gray-300 focus:bg-white focus:ring-0 ">
                        </div>
                        <div class="w-full">
                            <label for="apellido" class="block text-sm font-medium text-gray-700">Apellidos</label>
                            <input type="text" id="apellido" value="Diaz"
                                class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus: border-gray-300 focus:bg-white focus:ring-0">
                        </div>
                        <div class="w-full">
                            <label for="identificacion" class="block text-sm font-medium text-gray-700">N°
                                identificación</label>
                            <input type="text" id="identificacion" value="1060435758"
                                class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0">
                        </div>
                        <div class="w-full">
                            <label for="ficha" class="block text-sm font-medium text-gray-700">N° ficha</label>
                            <input type="text" id="ficha" value="2354781"
                                class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0">
                        </div>
                        <div class="w-full">
                            <label for="email" class="block text-sm font-medium text-gray-700">Correo
                                Electrónico</label>
                            <input type="email" id="email" value="carolinadiaz@gmail.com"
                                class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0">
                        </div>
                        <div class="w-full">
                            <label for="departamento"
                                class="block text-sm font-medium text-gray-700">Departamento</label>
                            <input type="text" id="departamento" value="Cauca"
                                class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0">
                        </div>
                        <div class="w-full">
                            <label for="municipio" class="block text-sm font-medium text-gray-700">Municipio</label>
                            <input type="text" id="municipio" value="Popayán"
                                class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0">
                        </div>
                        <div class="w-full">
                            <label for="nivel_formacion" class="block text-sm font-medium text-gray-700">Nivel de
                                Formación</label>
                            <input type="text" id="nivel_formacion" value="Tecnologo"
                                class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0">
                        </div>
                        <div class="w-full">
                            <label for="programa" class="block text-sm font-medium text-gray-700">Nombre del
                                Programa</label>
                            <input type="text" id="programa" value="Adso"
                                class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0">
                        </div>
                    </div>
                    <div class="md:col-span-2 flex flex-col items-center space-y-4">
                        <div class="flex justify-between items-center w-full">
                            <div>
                                <a href="{{ route('bitacora') }}"
                                    class="m-2.5 py-10 rounded-[10%] flex flex-col items-center text-center p-5 w-56 h-56 hover:border-green-600">
                                    <img src="{{ asset('img/trainer/bitacoras_1.png') }}" alt="Bitacora"
                                        class="m-2.5 py-5 rounded-[10%] flex flex-col items-center text-center p-2 bg-white border-[2px] border-black w-40 h-40 hover:border-green-600 object-cover">
                                    <h2 class="text-center font-weight:300">Bitacora</h2>
                                </a>

                            </div>
                            <div>
                                <a href="{{ route('visita') }}"
                                    class="m-2.5 py-10 rounded-[10%] flex flex-col items-center text-center p-5 w-56 h-56 hover:border-green-600">
                                    <img src="{{ asset('img/trainer/visitas_1.png') }}" alt="Visita"
                                        class="m-2.5 py-5 rounded-[10%] flex flex-col items-center text-center p-2 bg-white border-[2px] border-black w-40 h-40 hover:border-green-600 object-cover">
                                    <h2 class="text-center font-weight:300">Seguimiento</h2>
                                </a>

                            </div>
                            <div>
                                <select id="statusSelect"
                                    class="border-[2px] border-black p-4 rounded-md w-48 bg-white">
                                    <option selected disabled>Selecciona Opción</option>
                                    <option value="ACTIVO" data-color="green">ACTIVO</option>
                                    <option value="NOVEDAD" data-color="orange">NOVEDAD</option>
                                    <option value="FINALIZADA" data-color="red">FINALIZADA</option>
                                </select>
                            </div>
                        </div>
                        <div></div>
                        <div class="bg-gray-100 p-4 rounded-md w-full">
                            <div
                                class="w-full md:flex-1 mt-[0.5%] bg-gray-100 rounded-lg shadow mx-auto tarjeta flex flex-col items-center p-8 ">
                                <h3 class="text-center text-lg font-bold mb-0">Línea Temporal (Etapa de seguimiento)
                                </h3>
                                <div id="timeline" class="w-full h-60 md:h-80 object-cover "></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </div>

    </main>
    </div>
    <script src="{{ asset('js/Trainer.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectElement = document.getElementById('statusSelect');

            selectElement.addEventListener('change', function() {
                const selectedOption = selectElement.options[selectElement.selectedIndex];

                // Depuración: Verifica si el evento se dispara correctamente
                console.log('Opción seleccionada:', selectedOption.value);

                const selectedColor = selectedOption.getAttribute('data-color');

                // Depuración: Verifica si el atributo 'data-color' está presente
                console.log('Color seleccionado:', selectedColor);

                if (selectedColor) {
                    // Cambia el color de fondo del select
                    selectElement.style.backgroundColor = selectedColor;
                } else {
                    // Restablece el color de fondo si no hay color
                    selectElement.style.backgroundColor = '';
                }
            });
        });

        // script linea de tiempo 
        // Crear elementos para la línea de tiempo
        var items = new vis.DataSet([{
                id: 1,
                content: 'Asignación',
                start: '2023-12-29'
            },
            {
                id: 2,
                content: 'Inicio Etapa Productiva',
                start: '2024-01-01'
            }, // Completado
            {
                id: 3,
                content: 'Primera Visita',
                start: '2024-02-01'
            },
            {
                id: 4,
                content: 'Segunda Visita',
                start: '2024-04-01'
            },
            {
                id: 5,
                content: 'Tercera Visita',
                start: '2024-06-01'
            },
            {
                id: 6,
                content: 'Finalización de Etapa Productiva',
                start: '2024-08-01'
            }
        ]);

        // Crear elementos para la línea de tiempo
        var items = new vis.DataSet([{
                id: 1,
                content: 'Asignación',
                start: '2023-12-29'
            },
            {
                id: 2,
                content: 'Inicio Etapa Productiva',
                start: '2024-01-01'
            }, // Completado
            {
                id: 3,
                content: 'Primera Visita',
                start: '2024-02-01'
            },
            {
                id: 4,
                content: 'Segunda Visita',
                start: '2024-04-01'
            },
            {
                id: 5,
                content: 'Tercera Visita',
                start: '2024-06-01'
            },
            {
                id: 6,
                content: 'Finalización de Etapa Productiva',
                start: '2024-08-01'
            }
        ]);

        // Opciones de la línea de tiempo
        var options = {
            width: '100%',
            height: '100%', // Ajusta la altura automáticamente
            start: new Date(),
            end: '2024-08-01',
            showCurrentTime: true, // Muestra una línea para el tiempo actual
            zoomMin: 1000 * 60 * 60 * 24 * 30, // Z'oom mínimo: 1 mes
            orientation: {
                axis: 'top',
                item: 'top'
            }, // Coloca el eje temporal en la parte superior zoomMax: 1000 * 60 * 60 * 24 * 365 * 2, // Zoom máximo: 2 años
            editable: {
                updateTime: false, // No permite cambiar la hora de los eventos
                updateGroup: false, // No permite cambiar el grupo de los eventos
                add: false, // No permite añadir nuevos eventos
                remove: false // No permite eliminar eventos
            },
            margin: {
                item: 10, // Margen entre los elementos y el eje temporal
                axis: 5 // Margen entre el eje y el borde de la visualización
            },
            stack: true, // Permite apilar eventos que se solapan
            tooltip: {
                followMouse: true, // El tooltip sigue el puntero
            },
            locale: 'es', // Define el idioma como español
            format: {
                minorLabels: {
                    minute: 'HH:mm', // Formato de horas y minutos en etiquetas menores
                    hour: 'HH:mm', // Formato de horas en etiquetas menores
                    day: 'DD-MM', // Formato de día en etiquetas menores
                },
                majorLabels: {
                    day: 'MMMM YYYY', // Formato de mes y año en etiquetas mayores
                }
            }
        };
        // Función para obtener actividades completadas
        function getCompletedActivities() {
            return JSON.parse(localStorage.getItem('completedActivities')) || [];
        }

        // Crear el contenedor de la línea de tiempo
        var container = document.getElementById('timeline');
        var timeline = new vis.Timeline(container, items, options);

        // Función para actualizar el estado de los eventos en la línea de tiempo
        function updateTimeline() {
            let completedActivities = getCompletedActivities();
            completedActivities.forEach(date => {
                let item = items.get({
                    filter: function(item) {
                        return item.start === date;
                    }
                });
                if (item.length > 0) {
                    items.update({
                        id: item[0].id,
                        className: 'completed'
                    });
                }
            });
        }

        // Actualizar la línea de tiempo al cargar la página
        updateTimeline();
    </script>
</body>

</html>
