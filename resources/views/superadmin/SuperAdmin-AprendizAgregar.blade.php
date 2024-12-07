<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <title>Etapa Productiva</title>
    <style>
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

      {{-- FIN Barra Azul --}}

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
                      <a href="{{ route('superadmin.SuperAdmin-Instructor') }}" class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                          Instructor
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('superadmin.SuperAdmin-Aprendiz') }}" class="block text-center text-white px-4 py-2 rounded-lg {{ request()->routeIs('superadmin.SuperAdmin-Aprendiz') ? 'bg-green-600 bg-opacity-70' : 'bg-green-600 bg-opacity-20 hover:bg-opacity-50' }}">
                          <span class="font-bold">
                            Aprendices
                          </span>
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

    <div class="w-full flex justify-between items-center mt-6">
        <a href="{{route('superadmin.SuperAdmin-Aprendiz') }}" class="ml-4">
            <img src="{{ asset('img/flecha.png') }}" alt="Flecha" class="w-5 h-auto">
        </a>

        <a href="#" class="ml-4">
            <img src="{{ asset('img/Descarga.webp') }}" alt="descarga" class="w-8 mr-12 h-auto">
        </a>
    </div>
    <div class="flex justify-center">
        <main class="flex flex-col items-center mt-4 relative">
            <div class="w-full max-w-7xl mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Identificación</th>
                                <th class="py-3 px-6 text-left">Apellido</th>
                                <th class="py-3 px-6 text-left">Nombre</th>
                                <th class="py-3 px-6 text-left">Programa</th>
                                <th class="py-3 px-6 text-left">Nivel Academico</th>
                                <th class="py-3 px-6 text-left">Ficha</th>
                                <th class="py-3 px-6 text-left">Teléfono</th>
                                <th class="py-3 px-6 text-left">Correo</th>
                                <th class="py-3 px-6 text-left">Tipo de Contrato</th>
                                <th class="py-3 px-6 text-left">Inicio Contrato</th>
                                <th class="py-3 px-6 text-left">Fin Contrato</th>
                                <th class="py-3 px-6 text-left">NIT Empresa</th>
                                <th class="py-3 px-6 text-left">Razón Social</th>
                                <th class="py-3 px-6 text-left">Dirección</th>
                                <th class="py-3 px-6 text-left">Teléfono Empresa</th>
                                <th class="py-3 px-6 text-left">Nombre Instructor</th>
                                <th class="py-3 px-6 text-left">Correo Instructor</th>
                                <th class="py-3 px-6 text-left">Enviar Aprendiz</th>
                                 <th class="py-3 px-6 text-left">Enviar Instructor</th>
                                <th class="py-3 px-6 text-left">Editar</th>
                                <th class="py-3 px-6 text-left">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            <tr class="border-b border-gray-300">
                                <td class="py-3 px-6 text-left">123456</td>
                                <td class="py-3 px-6 text-left">Apellido1</td>
                                <td class="py-3 px-6 text-left">Nombre1</td>
                                <td class="py-3 px-6 text-left"><select class="border border-gray-400 p-2 rounded-md w-48 bg-white">
                                    <option value="GESTION ADMINISTRATIVA DEL SECTOR SALUD">GESTION ADMINISTRATIVA DEL SECTOR SALUD</option>
                                    <option value="GESTION DE MERCADOS">GESTION DE MERCADOS</option>
                                    <option value="ASISTENCIA ADMINISTRATIVA">ASISTENCIA ADMINISTRATIVA</option>
                                    <option value="GESTION DE PROCESOS ADMINISTRATIVOS DE SALUD">GESTION DE PROCESOS ADMINISTRATIVOS DE SALUD</option>
                                    <option value="GESTION EMPRESARIAL">GESTION EMPRESARIAL</option>
                                    <option value="GUIANZA TURISTICA">GUIANZA TURISTICA</option>
                                    <option value="GESTION CONTABLE Y FINANCIERA">GESTION CONTABLE Y FINANCIERA</option>
                                    <option value="ANALISIS Y DESARROLLO DE SISTEMAS DE INFORMACION">ANALISIS Y DESARROLLO DE SISTEMAS DE INFORMACION</option>
                                    <option value="GESTION LOGISTICA">GESTION LOGISTICA</option>
                                    <option value="NEGOCIACION INTERNACIONAL">NEGOCIACION INTERNACIONAL</option>
                                    <option value="GESTION DEL TALENTO HUMANO">GESTION DEL TALENTO HUMANO</option>
                                    <option value="GESTION DOCUMENTAL">GESTION DOCUMENTAL</option>
                                    <option value="CONTABILIZACION DE OPERACIONES COMERCIALES Y FINANCIERAS">CONTABILIZACION DE OPERACIONES COMERCIALES Y FINANCIERAS</option>
                                    <option value="GESTION BANCARIA Y DE ENTIDADES FINANCIERAS">GESTION BANCARIA Y DE ENTIDADES FINANCIERAS</option>
                                    <option value="PELUQUERIA">PELUQUERIA</option>
                                    <option value="PANIFICACION">PANIFICACION</option>
                                    <option value="COCINA">COCINA</option>
                                    <option value="SERVICIOS FARMACEUTICOS">SERVICIOS FARMACEUTICOS</option>
                                    <option value="SALUD PUBLICA">SALUD PUBLICA</option>
                                    <option value="APOYO ADMINISTRATIVO EN SALUD">APOYO ADMINISTRATIVO EN SALUD</option>
                                    <option value="OPERACION TURISTICA LOCAL">OPERACION TURISTICA LOCAL</option>
                                    <option value="ANIMACION 3D">ANIMACION 3D</option>
                                    <option value="ANIMACION DIGITAL">ANIMACION DIGITAL</option>
                                    <option value="PROMOCION DE PRODUCTOS">PROMOCION DE PRODUCTOS</option>
                                    <option value="SERVICIOS Y OPERACIONES MICROFINANCIERAS">SERVICIOS Y OPERACIONES MICROFINANCIERAS</option>
                                    <option value="CUIDADO ESTETICO DE MANOS Y PIES">CUIDADO ESTETICO DE MANOS Y PIES</option>
                                    <option value="CONTROL DE MOVILIDAD TRANSPORTE Y SEGURIDAD VIAL">CONTROL DE MOVILIDAD TRANSPORTE Y SEGURIDAD VIAL</option>
                                    <option value="ENFERMERIA">ENFERMERIA</option>
                                    <option value="SISTEMAS">SISTEMAS</option>
                                    <option value="DISTRIBUCION FISICA INTERNACIONAL">DISTRIBUCION FISICA INTERNACIONAL</option>
                                    <option value="ASESORIA COMERCIAL Y OPERACIONES DE ENTIDADES FINANCIERAS">ASESORIA COMERCIAL Y OPERACIONES DE ENTIDADES FINANCIERAS</option>
                                    <option value="ATENCION INTEGRAL A LA PRIMERA INFANCIA">ATENCION INTEGRAL A LA PRIMERA INFANCIA</option>
                                    <option value="ASISTENCIA EN ORGANIZACION DE ARCHIVOS">ASISTENCIA EN ORGANIZACION DE ARCHIVOS</option>
                                    <option value="DESARROLLO DE OPERACIONES LOGISTICA EN LA CADENA DE ABASTECIMIENTO">DESARROLLO DE OPERACIONES LOGISTICA EN LA CADENA DE ABASTECIMIENTO</option>
                                    <option value="SERVICIO DE RESTAURANTE Y BAR">SERVICIO DE RESTAURANTE Y BAR</option>
                                    <option value="OPERACIONES DE COMERCIO EXTERIOR">OPERACIONES DE COMERCIO EXTERIOR</option>
                                    <option value="DISEÑO E INTEGRACION DE MULTIMEDIA">DISEÑO E INTEGRACION DE MULTIMEDIA</option>
                                    <option value="INFORMACION Y SERVICIO AL CLIENTE">INFORMACION Y SERVICIO AL CLIENTE</option>
                                    <option value="SERVICIOS DE AGENCIAS DE VIAJES">SERVICIOS DE AGENCIAS DE VIAJES</option>
                                    <option value="ASESORIA COMERCIAL">ASESORIA COMERCIAL</option>
                                    <option value="PROCESOS DE PANADERIA">PROCESOS DE PANADERIA</option>
                                    <option value="GESTION COMUNITARIA DEL RIESGO DE DESASTRES">GESTION COMUNITARIA DEL RIESGO DE DESASTRES</option>
                                    <option value="PROGRAMACION DE APLICACIONES Y SERVICIOS PARA LA NUBE">PROGRAMACION DE APLICACIONES Y SERVICIOS PARA LA NUBE</option>
                                    <option value="PROGRAMACION DE SOFTWARE">PROGRAMACION DE SOFTWARE</option>
                                    <option value="SERVICIOS DE BARISMO">SERVICIOS DE BARISMO</option>
                                    <option value="GESTION CONTABLE Y DE INFORMACION FINANCIERA">GESTION CONTABLE Y DE INFORMACION FINANCIERA</option>
                                    <option value="INTEGRACION DE OPERACIONES LOGISTICAS">INTEGRACION DE OPERACIONES LOGISTICAS</option>
                                    <option value="INTEGRACION DE CONTENIDOS DIGITALES">INTEGRACION DE CONTENIDOS DIGITALES</option>
                                    <option value="AUXILIAR EN COCINA">AUXILIAR EN COCINA</option>
                                    <option value="PROGRAMACION PARA ANALITICA DE DATOS">PROGRAMACION PARA ANALITICA DE DATOS</option>
                                    <option value="AGENTE DE TRANSITO Y TRANSPORTE">AGENTE DE TRANSITO Y TRANSPORTE</option>
                                    <option value="ANALISIS Y DESARROLLO DE SOFTWARE">ANALISIS Y DESARROLLO DE SOFTWARE</option>
                                    <option value="ATENCION INTEGRAL AL CLIENTE">ATENCION INTEGRAL AL CLIENTE</option>
                                    <option value="CONTROL DE MOVILIDAD, TRANSPORTE Y SEGURIDAD VIAL">CONTROL DE MOVILIDAD, TRANSPORTE Y SEGURIDAD VIAL</option>
                                    <option value="DESARROLLO DE PROCESOS DE MERCADEO">DESARROLLO DE PROCESOS DE MERCADEO</option>
                                    <option value="DESARROLLO PUBLICITARIO">DESARROLLO PUBLICITARIO</option>
                                    <option value="GESTION INTEGRAL DEL TRANSPORTE">GESTION INTEGRAL DEL TRANSPORTE</option>
                                    <option value="ORGANIZACION DE ARCHIVO">ORGANIZACION DE ARCHIVO</option>
                                    <option value="PRESELECCION DE TALENTO HUMANO MEDIADO POR HERRAMIENTAS TIC">PRESELECCION DE TALENTO HUMANO MEDIADO POR HERRAMIENTAS TIC</option>
                                    <option value="SERVICIOS EN CONTACT CENTER Y BPO">SERVICIOS EN CONTACT CENTER Y BPO</option>
                                    <option value="COORDINACION DE PROCESOS LOGISTICOS">COORDINACION DE PROCESOS LOGISTICOS</option>
                                    </select>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <select id="academic-level" class="form-select" class=" border border-gray-400 p-2 rounded-md w-48 bg-white" onchange="saveAcademicLevel(this)">
                                        <option value="" disabled selected>Seleccione Nivel Académico</option>
                                        <option value="tecnologo">Tecnólogo</option>
                                        <option value="tecnico">Técnico</option>
                                        <option value="operario">Operario</option>
                                    </select>
                                </td>
                                <td class="py-3 px-6 text-left">555-1234</td>
                                <td class="py-3 px-6 text-left">correo1@example.com</td>
                                <td class="py-3 px-6 text-left"><select class="border border-gray-400 p-2 rounded-md w-48 bg-white">
                                    <option selected="">Selecciona Opción</option>
                                    <option value="Contrato de Aprendizaje">Contrato de Aprendizaje</option>
                                    <option value="Pasantia">Pasantia</option>
                                    <option value="Vinculo laboral">Vinculo laboral</option>
                                    <option value="Patrocinio">Patrocinio</option>
                                    <option value="Unidad Productiva">Unidad Productiva</option>
                                    <option value="Proyecto Productivo">Proyecto Productivo</option>
                                </select></td>
                                <td class="py-3 px-6 text-left">01/01/2022</td>
                                <td class="py-3 px-6 text-left">01/01/2023</td>
                                <td class="py-3 px-6 text-left">987654</td>
                                <td class="py-3 px-6 text-left">Empresa1</td>
                                <td class="py-3 px-6 text-left">Calle 123</td>
                                <td class="py-3 px-6 text-left">555-5678</td>
                                <td class="py-3 px-6 text-left">Representante1</td>
                                <td class="py-3 px-6 text-left">representante1@example.com</td>
                                <td class="py-3 px-6 text-left"><a href="{{ route('superadmin.SuperAdmin-MensajeAprendiz')}}" class="text-blue-600 hover:underline">Mensaje</a></td>
                                <td class="py-3 px-6 text-left"><a href="{{ route('superadmin.SuperAdmin-MensajeInstructor')}}" class="text-blue-600 hover:underline">Mensaje</a></td>
                                <td class="py-3 px-6 text-left"><a href="#" class="text-blue-600 hover:underline">Editar</a></td>
                                <td class="py-3 px-6 text-left"><a href="#" class="text-red-600 hover:underline">Eliminar</a></td>

                            </tr>
                            <tr class="border-b border-gray-300">
                                <td class="py-3 px-6 text-left">125536</td>
                                <td class="py-3 px-6 text-left">Apellid2</td>
                                <td class="py-3 px-6 text-left">Nombre2</td>
                                <td class="py-3 px-6 text-left"><select class="border border-gray-400 p-2 rounded-md w-48 bg-white">
                                    <option value="GESTION ADMINISTRATIVA DEL SECTOR SALUD">GESTION ADMINISTRATIVA DEL SECTOR SALUD</option>
                                    <option value="GESTION DE MERCADOS">GESTION DE MERCADOS</option>
                                    <option value="ASISTENCIA ADMINISTRATIVA">ASISTENCIA ADMINISTRATIVA</option>
                                    <option value="GESTION DE PROCESOS ADMINISTRATIVOS DE SALUD">GESTION DE PROCESOS ADMINISTRATIVOS DE SALUD</option>
                                    <option value="GESTION EMPRESARIAL">GESTION EMPRESARIAL</option>
                                    <option value="GUIANZA TURISTICA">GUIANZA TURISTICA</option>
                                    <option value="GESTION CONTABLE Y FINANCIERA">GESTION CONTABLE Y FINANCIERA</option>
                                    <option value="ANALISIS Y DESARROLLO DE SISTEMAS DE INFORMACION">ANALISIS Y DESARROLLO DE SISTEMAS DE INFORMACION</option>
                                    <option value="GESTION LOGISTICA">GESTION LOGISTICA</option>
                                    <option value="NEGOCIACION INTERNACIONAL">NEGOCIACION INTERNACIONAL</option>
                                    <option value="GESTION DEL TALENTO HUMANO">GESTION DEL TALENTO HUMANO</option>
                                    <option value="GESTION DOCUMENTAL">GESTION DOCUMENTAL</option>
                                    <option value="CONTABILIZACION DE OPERACIONES COMERCIALES Y FINANCIERAS">CONTABILIZACION DE OPERACIONES COMERCIALES Y FINANCIERAS</option>
                                    <option value="GESTION BANCARIA Y DE ENTIDADES FINANCIERAS">GESTION BANCARIA Y DE ENTIDADES FINANCIERAS</option>
                                    <option value="PELUQUERIA">PELUQUERIA</option>
                                    <option value="PANIFICACION">PANIFICACION</option>
                                    <option value="COCINA">COCINA</option>
                                    <option value="SERVICIOS FARMACEUTICOS">SERVICIOS FARMACEUTICOS</option>
                                    <option value="SALUD PUBLICA">SALUD PUBLICA</option>
                                    <option value="APOYO ADMINISTRATIVO EN SALUD">APOYO ADMINISTRATIVO EN SALUD</option>
                                    <option value="OPERACION TURISTICA LOCAL">OPERACION TURISTICA LOCAL</option>
                                    <option value="ANIMACION 3D">ANIMACION 3D</option>
                                    <option value="ANIMACION DIGITAL">ANIMACION DIGITAL</option>
                                    <option value="PROMOCION DE PRODUCTOS">PROMOCION DE PRODUCTOS</option>
                                    <option value="SERVICIOS Y OPERACIONES MICROFINANCIERAS">SERVICIOS Y OPERACIONES MICROFINANCIERAS</option>
                                    <option value="CUIDADO ESTETICO DE MANOS Y PIES">CUIDADO ESTETICO DE MANOS Y PIES</option>
                                    <option value="CONTROL DE MOVILIDAD TRANSPORTE Y SEGURIDAD VIAL">CONTROL DE MOVILIDAD TRANSPORTE Y SEGURIDAD VIAL</option>
                                    <option value="ENFERMERIA">ENFERMERIA</option>
                                    <option value="SISTEMAS">SISTEMAS</option>
                                    <option value="DISTRIBUCION FISICA INTERNACIONAL">DISTRIBUCION FISICA INTERNACIONAL</option>
                                    <option value="ASESORIA COMERCIAL Y OPERACIONES DE ENTIDADES FINANCIERAS">ASESORIA COMERCIAL Y OPERACIONES DE ENTIDADES FINANCIERAS</option>
                                    <option value="ATENCION INTEGRAL A LA PRIMERA INFANCIA">ATENCION INTEGRAL A LA PRIMERA INFANCIA</option>
                                    <option value="ASISTENCIA EN ORGANIZACION DE ARCHIVOS">ASISTENCIA EN ORGANIZACION DE ARCHIVOS</option>
                                    <option value="DESARROLLO DE OPERACIONES LOGISTICA EN LA CADENA DE ABASTECIMIENTO">DESARROLLO DE OPERACIONES LOGISTICA EN LA CADENA DE ABASTECIMIENTO</option>
                                    <option value="SERVICIO DE RESTAURANTE Y BAR">SERVICIO DE RESTAURANTE Y BAR</option>
                                    <option value="OPERACIONES DE COMERCIO EXTERIOR">OPERACIONES DE COMERCIO EXTERIOR</option>
                                    <option value="DISEÑO E INTEGRACION DE MULTIMEDIA">DISEÑO E INTEGRACION DE MULTIMEDIA</option>
                                    <option value="INFORMACION Y SERVICIO AL CLIENTE">INFORMACION Y SERVICIO AL CLIENTE</option>
                                    <option value="SERVICIOS DE AGENCIAS DE VIAJES">SERVICIOS DE AGENCIAS DE VIAJES</option>
                                    <option value="ASESORIA COMERCIAL">ASESORIA COMERCIAL</option>
                                    <option value="PROCESOS DE PANADERIA">PROCESOS DE PANADERIA</option>
                                    <option value="GESTION COMUNITARIA DEL RIESGO DE DESASTRES">GESTION COMUNITARIA DEL RIESGO DE DESASTRES</option>
                                    <option value="PROGRAMACION DE APLICACIONES Y SERVICIOS PARA LA NUBE">PROGRAMACION DE APLICACIONES Y SERVICIOS PARA LA NUBE</option>
                                    <option value="PROGRAMACION DE SOFTWARE">PROGRAMACION DE SOFTWARE</option>
                                    <option value="SERVICIOS DE BARISMO">SERVICIOS DE BARISMO</option>
                                    <option value="GESTION CONTABLE Y DE INFORMACION FINANCIERA">GESTION CONTABLE Y DE INFORMACION FINANCIERA</option>
                                    <option value="INTEGRACION DE OPERACIONES LOGISTICAS">INTEGRACION DE OPERACIONES LOGISTICAS</option>
                                    <option value="INTEGRACION DE CONTENIDOS DIGITALES">INTEGRACION DE CONTENIDOS DIGITALES</option>
                                    <option value="AUXILIAR EN COCINA">AUXILIAR EN COCINA</option>
                                    <option value="PROGRAMACION PARA ANALITICA DE DATOS">PROGRAMACION PARA ANALITICA DE DATOS</option>
                                    <option value="AGENTE DE TRANSITO Y TRANSPORTE">AGENTE DE TRANSITO Y TRANSPORTE</option>
                                    <option value="ANALISIS Y DESARROLLO DE SOFTWARE">ANALISIS Y DESARROLLO DE SOFTWARE</option>
                                    <option value="ATENCION INTEGRAL AL CLIENTE">ATENCION INTEGRAL AL CLIENTE</option>
                                    <option value="CONTROL DE MOVILIDAD, TRANSPORTE Y SEGURIDAD VIAL">CONTROL DE MOVILIDAD, TRANSPORTE Y SEGURIDAD VIAL</option>
                                    <option value="DESARROLLO DE PROCESOS DE MERCADEO">DESARROLLO DE PROCESOS DE MERCADEO</option>
                                    <option value="DESARROLLO PUBLICITARIO">DESARROLLO PUBLICITARIO</option>
                                    <option value="GESTION INTEGRAL DEL TRANSPORTE">GESTION INTEGRAL DEL TRANSPORTE</option>
                                    <option value="ORGANIZACION DE ARCHIVO">ORGANIZACION DE ARCHIVO</option>
                                    <option value="PRESELECCION DE TALENTO HUMANO MEDIADO POR HERRAMIENTAS TIC">PRESELECCION DE TALENTO HUMANO MEDIADO POR HERRAMIENTAS TIC</option>
                                    <option value="SERVICIOS EN CONTACT CENTER Y BPO">SERVICIOS EN CONTACT CENTER Y BPO</option>
                                    <option value="COORDINACION DE PROCESOS LOGISTICOS">COORDINACION DE PROCESOS LOGISTICOS</option>
                                    </select>
                                <td class="py-3 px-6 text-left">Ficha2</td>
                                <td class="py-3 px-6 text-left">585-1234</td>
                                <td class="py-3 px-6 text-left">correo2@example.com</td>
                                <td class="py-3 px-6 text-left"><select class="border border-gray-400 p-2 rounded-md w-48 bg-white">
                                    <option selected="">Selecciona Opción</option>
                                    <option value="Contrato de Aprendizaje">Contrato de Aprendizaje</option>
                                    <option value="Pasantia">Pasantia</option>
                                    <option value="Vinculo laboral">Vinculo laboral</option>
                                    <option value="Patrocinio">Patrocinio</option>
                                    <option value="Unidad Productiva">Unidad Productiva</option>
                                    <option value="Proyecto Productivo">Proyecto Productivo</option>
                                </select></td>
                                <td class="py-3 px-6 text-left">01/01/2022</td>
                                <td class="py-3 px-6 text-left">01/08/2024</td>
                                <td class="py-3 px-6 text-left">13123123</td>
                                <td class="py-3 px-6 text-left">Empresa2</td>
                                <td class="py-3 px-6 text-left">Calle 123</td>
                                <td class="py-3 px-6 text-left">555-5678</td>
                                <td class="py-3 px-6 text-left">Representante2</td>
                                <td class="py-3 px-6 text-left">representante2@example.com</td>
                                <td class="py-3 px-6 text-left"><a href="{{ route('superadmin.SuperAdmin-MensajeAprendiz')}}" class="text-blue-600 hover:underline">Mensaje</a></td>
                                <td class="py-3 px-6 text-left"><a href="{{ route('superadmin.SuperAdmin-MensajeInstructor')}}" class="text-blue-600 hover:underline">Mensaje</a></td>
                                <td class="py-3 px-6 text-left"><a href="#" class="text-blue-600 hover:underline">Editar</a></td>
                                <td class="py-3 px-6 text-left"><a href="#" class="text-red-600 hover:underline">Eliminar</a></td>

                            </tr>
                            <tr class="border-b border-gray-300">
                                <td class="py-3 px-6 text-left">123456</td>
                                <td class="py-3 px-6 text-left">Apellido3</td>
                                <td class="py-3 px-6 text-left">Nombre3</td>
                                <td class="py-3 px-6 text-left"><select class="border border-gray-400 p-2 rounded-md w-48 bg-white">
                                    <option value="GESTION ADMINISTRATIVA DEL SECTOR SALUD">GESTION ADMINISTRATIVA DEL SECTOR SALUD</option>
                                    <option value="GESTION DE MERCADOS">GESTION DE MERCADOS</option>
                                    <option value="ASISTENCIA ADMINISTRATIVA">ASISTENCIA ADMINISTRATIVA</option>
                                    <option value="GESTION DE PROCESOS ADMINISTRATIVOS DE SALUD">GESTION DE PROCESOS ADMINISTRATIVOS DE SALUD</option>
                                    <option value="GESTION EMPRESARIAL">GESTION EMPRESARIAL</option>
                                    <option value="GUIANZA TURISTICA">GUIANZA TURISTICA</option>
                                    <option value="GESTION CONTABLE Y FINANCIERA">GESTION CONTABLE Y FINANCIERA</option>
                                    <option value="ANALISIS Y DESARROLLO DE SISTEMAS DE INFORMACION">ANALISIS Y DESARROLLO DE SISTEMAS DE INFORMACION</option>
                                    <option value="GESTION LOGISTICA">GESTION LOGISTICA</option>
                                    <option value="NEGOCIACION INTERNACIONAL">NEGOCIACION INTERNACIONAL</option>
                                    <option value="GESTION DEL TALENTO HUMANO">GESTION DEL TALENTO HUMANO</option>
                                    <option value="GESTION DOCUMENTAL">GESTION DOCUMENTAL</option>
                                    <option value="CONTABILIZACION DE OPERACIONES COMERCIALES Y FINANCIERAS">CONTABILIZACION DE OPERACIONES COMERCIALES Y FINANCIERAS</option>
                                    <option value="GESTION BANCARIA Y DE ENTIDADES FINANCIERAS">GESTION BANCARIA Y DE ENTIDADES FINANCIERAS</option>
                                    <option value="PELUQUERIA">PELUQUERIA</option>
                                    <option value="PANIFICACION">PANIFICACION</option>
                                    <option value="COCINA">COCINA</option>
                                    <option value="SERVICIOS FARMACEUTICOS">SERVICIOS FARMACEUTICOS</option>
                                    <option value="SALUD PUBLICA">SALUD PUBLICA</option>
                                    <option value="APOYO ADMINISTRATIVO EN SALUD">APOYO ADMINISTRATIVO EN SALUD</option>
                                    <option value="OPERACION TURISTICA LOCAL">OPERACION TURISTICA LOCAL</option>
                                    <option value="ANIMACION 3D">ANIMACION 3D</option>
                                    <option value="ANIMACION DIGITAL">ANIMACION DIGITAL</option>
                                    <option value="PROMOCION DE PRODUCTOS">PROMOCION DE PRODUCTOS</option>
                                    <option value="SERVICIOS Y OPERACIONES MICROFINANCIERAS">SERVICIOS Y OPERACIONES MICROFINANCIERAS</option>
                                    <option value="CUIDADO ESTETICO DE MANOS Y PIES">CUIDADO ESTETICO DE MANOS Y PIES</option>
                                    <option value="CONTROL DE MOVILIDAD TRANSPORTE Y SEGURIDAD VIAL">CONTROL DE MOVILIDAD TRANSPORTE Y SEGURIDAD VIAL</option>
                                    <option value="ENFERMERIA">ENFERMERIA</option>
                                    <option value="SISTEMAS">SISTEMAS</option>
                                    <option value="DISTRIBUCION FISICA INTERNACIONAL">DISTRIBUCION FISICA INTERNACIONAL</option>
                                    <option value="ASESORIA COMERCIAL Y OPERACIONES DE ENTIDADES FINANCIERAS">ASESORIA COMERCIAL Y OPERACIONES DE ENTIDADES FINANCIERAS</option>
                                    <option value="ATENCION INTEGRAL A LA PRIMERA INFANCIA">ATENCION INTEGRAL A LA PRIMERA INFANCIA</option>
                                    <option value="ASISTENCIA EN ORGANIZACION DE ARCHIVOS">ASISTENCIA EN ORGANIZACION DE ARCHIVOS</option>
                                    <option value="DESARROLLO DE OPERACIONES LOGISTICA EN LA CADENA DE ABASTECIMIENTO">DESARROLLO DE OPERACIONES LOGISTICA EN LA CADENA DE ABASTECIMIENTO</option>
                                    <option value="SERVICIO DE RESTAURANTE Y BAR">SERVICIO DE RESTAURANTE Y BAR</option>
                                    <option value="OPERACIONES DE COMERCIO EXTERIOR">OPERACIONES DE COMERCIO EXTERIOR</option>
                                    <option value="DISEÑO E INTEGRACION DE MULTIMEDIA">DISEÑO E INTEGRACION DE MULTIMEDIA</option>
                                    <option value="INFORMACION Y SERVICIO AL CLIENTE">INFORMACION Y SERVICIO AL CLIENTE</option>
                                    <option value="SERVICIOS DE AGENCIAS DE VIAJES">SERVICIOS DE AGENCIAS DE VIAJES</option>
                                    <option value="ASESORIA COMERCIAL">ASESORIA COMERCIAL</option>
                                    <option value="PROCESOS DE PANADERIA">PROCESOS DE PANADERIA</option>
                                    <option value="GESTION COMUNITARIA DEL RIESGO DE DESASTRES">GESTION COMUNITARIA DEL RIESGO DE DESASTRES</option>
                                    <option value="PROGRAMACION DE APLICACIONES Y SERVICIOS PARA LA NUBE">PROGRAMACION DE APLICACIONES Y SERVICIOS PARA LA NUBE</option>
                                    <option value="PROGRAMACION DE SOFTWARE">PROGRAMACION DE SOFTWARE</option>
                                    <option value="SERVICIOS DE BARISMO">SERVICIOS DE BARISMO</option>
                                    <option value="GESTION CONTABLE Y DE INFORMACION FINANCIERA">GESTION CONTABLE Y DE INFORMACION FINANCIERA</option>
                                    <option value="INTEGRACION DE OPERACIONES LOGISTICAS">INTEGRACION DE OPERACIONES LOGISTICAS</option>
                                    <option value="INTEGRACION DE CONTENIDOS DIGITALES">INTEGRACION DE CONTENIDOS DIGITALES</option>
                                    <option value="AUXILIAR EN COCINA">AUXILIAR EN COCINA</option>
                                    <option value="PROGRAMACION PARA ANALITICA DE DATOS">PROGRAMACION PARA ANALITICA DE DATOS</option>
                                    <option value="AGENTE DE TRANSITO Y TRANSPORTE">AGENTE DE TRANSITO Y TRANSPORTE</option>
                                    <option value="ANALISIS Y DESARROLLO DE SOFTWARE">ANALISIS Y DESARROLLO DE SOFTWARE</option>
                                    <option value="ATENCION INTEGRAL AL CLIENTE">ATENCION INTEGRAL AL CLIENTE</option>
                                    <option value="CONTROL DE MOVILIDAD, TRANSPORTE Y SEGURIDAD VIAL">CONTROL DE MOVILIDAD, TRANSPORTE Y SEGURIDAD VIAL</option>
                                    <option value="DESARROLLO DE PROCESOS DE MERCADEO">DESARROLLO DE PROCESOS DE MERCADEO</option>
                                    <option value="DESARROLLO PUBLICITARIO">DESARROLLO PUBLICITARIO</option>
                                    <option value="GESTION INTEGRAL DEL TRANSPORTE">GESTION INTEGRAL DEL TRANSPORTE</option>
                                    <option value="ORGANIZACION DE ARCHIVO">ORGANIZACION DE ARCHIVO</option>
                                    <option value="PRESELECCION DE TALENTO HUMANO MEDIADO POR HERRAMIENTAS TIC">PRESELECCION DE TALENTO HUMANO MEDIADO POR HERRAMIENTAS TIC</option>
                                    <option value="SERVICIOS EN CONTACT CENTER Y BPO">SERVICIOS EN CONTACT CENTER Y BPO</option>
                                    <option value="COORDINACION DE PROCESOS LOGISTICOS">COORDINACION DE PROCESOS LOGISTICOS</option>
                                    </select>
                                <td class="py-3 px-6 text-left">Ficha3</td>
                                <td class="py-3 px-6 text-left">5454-876867</td>
                                <td class="py-3 px-6 text-left">correo3@example.com</td>
                                <td class="py-3 px-6 text-left"><select class="border border-gray-400 p-2 rounded-md w-48 bg-white">
                                    <option selected="">Selecciona Opción</option>
                                    <option value="Contrato de Aprendizaje">Contrato de Aprendizaje</option>
                                    <option value="Pasantia">Pasantia</option>
                                    <option value="Vinculo laboral">Vinculo laboral</option>
                                    <option value="Patrocinio">Patrocinio</option>
                                    <option value="Unidad Productiva">Unidad Productiva</option>
                                    <option value="Proyecto Productivo">Proyecto Productivo</option>
                                </select></td>
                                <td class="py-3 px-6 text-left">01/03/2023</td>
                                <td class="py-3 px-6 text-left">01/05/2024</td>
                                <td class="py-3 px-6 text-left">1232112</td>
                                <td class="py-3 px-6 text-left">Empresa3</td>
                                <td class="py-3 px-6 text-left">Calle 12313</td>
                                <td class="py-3 px-6 text-left">554355-5678</td>
                                <td class="py-3 px-6 text-left">Representante3</td>
                                <td class="py-3 px-6 text-left">representante3@example.com</td>
                                <td class="py-3 px-6 text-left"><a href="{{ route('superadmin.SuperAdmin-MensajeAprendiz')}}" class="text-blue-600 hover:underline">Mensaje</a></td>
                                <td class="py-3 px-6 text-left"><a href="{{ route('superadmin.SuperAdmin-MensajeInstructor')}}" class="text-blue-600 hover:underline">Mensaje</a></td>
                                <td class="py-3 px-6 text-left"><a href="#" class="text-blue-600 hover:underline">Editar</a></td>
                                <td class="py-3 px-6 text-left"><a href="#" class="text-red-600 hover:underline">Eliminar</a></td>

                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-end mt-6 space-x-4">
                    <a type="submit" href="{{ route('superadmin.SuperAdmin-Aprendiz')}}" class="bg-green-700 hover:bg-green-900 text-white py-2 px-4 rounded">Confirmar</a>
                    <a href="{{ route('superadmin.SuperAdmin-Aprendiz') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded">Cancelar</a>
                </div>
            </div>
        </main>
    </div>

    <script src="{{ asset('js/SuperAdmin.js') }}"></script>
</body>

</html>
