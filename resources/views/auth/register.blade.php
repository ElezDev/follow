<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="logo-icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    <title>Etapa Productiva</title>
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
            justify-content: space-between;
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

        main {
            margin-top: 10px;
            position: relative;
            width: 100%;
            height: 100vh;
            background-image: url('{{ asset('img/login/image.png') }}');
            background-size: 40%;
            background-position: left top;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .content {
            position: absolute;
            z-index: 2;
            text-align: center;
            color: white;
            max-width: 600px;
            width: 100%;
        }

        .welcome-text {
            position: absolute;
            top: -300px;
            left: 80%;
            text-align: center;
            z-index: 12;
            font-size: 2.5rem;
            white-space: nowrap;
            margin: 0;
            padding: 0;
        }

        .etapa-productiva {
            font-size: 4rem;
            font-weight: bold;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
        }

        .etapa-productiva .etapa {
            color: #009e00;
            padding-left: 210px;
        }

        .etapa-productiva .productiva {
            color: #003366;
        }

        .registro-container {
            position: absolute;
            top: 50%;
            left: 70%;
            transform: translate(-50%, -50%);
            z-index: 2;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(240, 240, 240, 0.9));
            padding: 30px 25px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            max-width: 350px;
            width: 100%;
        }

        h3 {
            font-family: 'DM Sans', sans-serif;
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.8em;
            color: #003366;
        }

        .input-group {
            display: flex;
            align-items: center;
            background-color: white;
            border-radius: 8px;
            margin-bottom: 20px;
            padding: 8px 10px;
            border: 1px solid #ddd;
        }

        .input-icon {
            width: 22px;
            height: 22px;
            margin-right: 10px;
            opacity: 0.6;
        }

        input {
            border: none;
            padding: 10px;
            width: 100%;
            font-size: 1em;
            color: #333;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #009e00;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1em;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #007a00;
        }
    </style>
</head>
<body class="font-['Arial',sans-serif] bg-white m-0 flex flex-col min-h-screen">
    <header class="bg-white text-[#009e00] px-5 py-3 flex flex-col items-center border-t-[5px] border-t-white border-b border-b-[#e0e0e0]">
        <div class="flex flex-wrap justify-between w-full items-center">
            <div class="flex items-center">
                <img class="w-[70px] h-[70px]" src="{{ asset('img/logo-sena.png') }}" alt="Sena Logo">
                <div class="flex-grow m-2"></div>
                <div class="text-left">
                    <a href="{{ route('administrator.web') }}" class="flex items-center">
                        <img src="{{ asset('img/logo.png') }}" alt="Etapa Seguimiento Logo" class="w-10 h-auto mr-1.5">
                        <div class="flex flex-col text-left">
                            <h2 class="text-[12px] m-0 text-[#009e00]">Etapa</h2>
                            <h2 class="text-[12px] m-0 text-[#009e00]">Productiva</h2>
                        </div>
                    </a>
                    <h2 class="text-sm mt-2 text-[#009e00]">Centro de Comercio y Servicios</h2>
                </div>
            </div>
        </div>
    </header>
    <div class="h-14 bg-[#009e00]">
    </div>
    <main>


        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <div class="registro-container">
            <h3>REGISTRO</h3>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="input-group">
                    <img src="{{ asset('img/user-icon.png') }}" alt="Usuario" class="input-icon">
                    <input id="identification" type="text" name="identification" placeholder="Identificación" value="{{ old('identification') }}" required autofocus autocomplete="identification">
                </div>
                <div class="input-group">
                    <img src="{{ asset('img/user-icon.png') }}" alt="Usuario" class="input-icon">
                    <input id="name" type="text" name="name" placeholder="Nombre" value="{{ old('name') }}" required autofocus autocomplete="name">
                </div>
                <div class="input-group">
                    <img src="{{ asset('img/user-icon.png') }}" alt="Usuario" class="input-icon">
                    <input id="last_name" type="text" name="last_name" placeholder="Apellido" value="{{ old('last_name') }}" required autofocus autocomplete="last_name">
                </div>

                <div class="input-group">
                    <img src="{{ asset('img/image.png') }}" alt="Correo electrónico" class="input-icon">
                    <input id="telephone" type="text" name="telephone" placeholder="Teléfono" value="{{ old('telephone') }}" required autocomplete="telephone">
                </div>

                <div class="input-group">
                    <img src="{{ asset('img/image.png') }}" alt="Correo electrónico" class="input-icon">
                    <input id="email" type="email" name="email" placeholder="Correo electrónico" value="{{ old('email') }}" required autocomplete="email">
                </div>

                <div class="input-group">
                    <img src="{{ asset('img/image.png') }}" alt="Correo electrónico" class="input-icon">
                    <input id="address" type="address" name="address" placeholder="Dirección" value="{{ old('address') }}" required autocomplete="address">
                </div>

                <div class="input-group">
                    <img src="{{ asset('img/image.png') }}" alt="departamento" class="input-icon">
                    <select id="department" name="department" required onchange="loadMunicipalities()">
                        <option value="" disabled selected>Seleccione un departamento</option>
                        <option value="1">Amazonas</option>
                        <option value="2">Antioquia</option>
                        <option value="3">Arauca</option>
                        <option value="4">Atlántico</option>
                        <option value="5">Bolívar</option>
                        <option value="6">Boyacá</option>
                        <option value="7">Caldas</option>
                        <option value="8">Caquetá</option>
                        <option value="9">Casanare</option>
                        <option value="10">Cauca</option>
                        <option value="11">Cesar</option>
                        <option value="12">Chocó</option>
                        <option value="13">Córdoba</option>
                        <option value="14">Cundinamarca</option>
                        <option value="15">Guainía</option>
                        <option value="16">Guaviare</option>
                        <option value="17">Huila</option>
                        <option value="18">La Guajira</option>
                        <option value="19">Magdalena</option>
                        <option value="20">Meta</option>
                        <option value="21">Nariño</option>
                        <option value="22">Norte de Santander</option>
                        <option value="23">Putumayo</option>
                        <option value="24">Quindío</option>
                        <option value="25">Risaralda</option>
                        <option value="26">San Andrés y Providencia</option>
                        <option value="27">Santander</option>
                        <option value="28">Sucre</option>
                        <option value="29">Tolima</option>
                        <option value="30">Valle del Cauca</option>
                        <option value="31">Vaupés</option>
                        <option value="32">Vichada</option>
                        <!-- Resto de departamentos -->
                    </select>
                </div>

                <!-- Municipio -->
                <div class="input-group">
                    <select id="municipality" name="municipality" required>
                        <option value="" disabled selected>Seleccione un municipio</option>
                    </select>
                </div>


                <div class="input-group">
                    <img src="{{ asset('img/lock-icon.png') }}" alt="Contraseña" class="input-icon">
                    <input id="password" type="password" name="password" placeholder="Contraseña" required autocomplete="new-password">
                </div>

                <div class="input-group">
                    <img src="{{ asset('img/lock-icon.png') }}" alt="Confirmar contraseña" class="input-icon">
                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirmar contraseña" required autocomplete="new-password">
                </div>

                <div class="input-group">
                    <img src="{{ asset('img/roles.png') }}" alt="Rol" class="input-icon">
                    <select id="role" name="role" required>
                        <option value="superadmin">Superadmin</option>
                        <option value="administrator">Administrator</option>
                        <option value="trainer">Trainer</option>
                        <option value="apprentice">Apprentice</option>
                    </select>
                </div>

                <button type="submit">Registrar</button>
            </form>
        </div>
    </main>
   <script>
    const departmentSelect = document.getElementById('department');
    const municipalitySelect = document.getElementById('municipality');
const municipalities = {
        1: ["Leticia", "Puerto Nariño"], // Amazonas
    2: ["Medellín", "Envigado", "Itagüí", "Bello", "Apartadó", "Turbo", "Rionegro"], // Antioquia
    3: ["Arauca", "Tame", "Saravena", "Arauquita"], // Arauca
    4: ["Barranquilla", "Soledad", "Malambo", "Puerto Colombia", "Sabanalarga"], // Atlántico
    5: ["Cartagena", "Magangué", "Santa Catalina", "Turbaco", "Mompox"], // Bolívar
    6: ["Tunja", "Duitama", "Sogamoso", "Chiquinquirá", "Villa de Leyva"], // Boyacá
    7: ["Manizales", "Chinchiná", "Villamaría", "La Dorada"], // Caldas
    8: ["Florencia", "Milán", "San Vicente del Caguán"], // Caquetá
    9: ["Yopal", "Aguazul", "Villanueva", "Tauramena"], // Casanare
    10: ["Popayán", "Santander de Quilichao", "Guapi"], // Cauca
    11: ["Valledupar", "Aguachica", "Bosconia"], // Cesar
    12: ["Quibdó", "Istmina", "Condoto"], // Chocó
    13: ["Montería", "Cereté", "Lorica"], // Córdoba
    14: ["Bogotá", "Fusagasugá", "Zipaquirá", "Girardot", "Chía"], // Cundinamarca
    15: ["Inírida"], // Guainía
    16: ["San José del Guaviare", "Calamar"], // Guaviare
    17: ["Neiva", "Garzón", "Pitalito"], // Huila
    18: ["Riohacha", "Maicao", "Uribia"], // La Guajira
    19: ["Santa Marta", "Ciénaga", "Aracataca"], // Magdalena
    20: ["Villavicencio", "Granada", "Acacías"], // Meta
    21: ["Pasto", "Tumaco", "Ipiales"], // Nariño
    22: ["Cúcuta", "Ocaña", "Pamplona"], // Norte de Santander
    23: ["Mocoa", "Puerto Asís", "Orito"], // Putumayo
    24: ["Armenia", "Calarcá", "Montenegro"], // Quindío
    25: ["Pereira", "Dosquebradas", "Santa Rosa de Cabal"], // Risaralda
    26: ["San Andrés", "Providencia"], // San Andrés y Providencia
    27: ["Bucaramanga", "Barrancabermeja", "Floridablanca"], // Santander
    28: ["Sincelejo", "Corozal", "Sampués"], // Sucre
    29: ["Ibagué", "Espinal", "Honda"], // Tolima
    30: ["Cali", "Palmira", "Buenaventura", "Jamundí"], // Valle del Cauca
    31: ["Mitú"], // Vaupés
    32: ["Puerto Carreño"], // Vichada
    };

   function loadMunicipalities() {
    const selectedDepartment = departmentSelect.value;
    municipalitySelect.innerHTML = '<option value="" disabled selected>Seleccione un municipio</option>';

    if (municipalities[selectedDepartment]) {
        municipalities[selectedDepartment].forEach((municipality) => {
            const option = document.createElement('option');
            option.value = municipality;
            option.textContent = municipality;
            municipalitySelect.appendChild(option);
        });
    }
}
</script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    function submitForm() {
        const formData = {
            identification: document.getElementById('identification').value,
            name: document.getElementById('nombre').value,
            last_name: document.getElementById('last_name').value,
            telephone: document.getElementById('telephone').value,
            email: document.getElementById('email').value,
            address: document.getElementById('address').value,
            department: document.getElementById('department').value,
            municipality: document.getElementById('municipality').value,
            password: document.getElementById('password').value,
            id_role: document.getElementById('id_role').value,
        };

        axios.post('http://127.0.0.1:8001/api/user_registers', formData, {
            headers: {
                'Content-Type': 'application/json',  
            }
        })
        .then(response => {
            console.log(response.data);
        })
        .catch(error => {
            console.error(error);
        });
    }
</script>


   {{-- cedula: document.getElementById('cedula').value,
            correo: document.getElementById('correo').value,
            celular: document.getElementById('celular').value,
            programa: document.getElementById('programa').value,
            total_horas: document.getElementById('total_horas').value,
            horas_realizadas: document.getElementById('horas_realizadas').value,
            fecha_inicio: document.getElementById('fecha_inicio').value,
            fecha_fin: document.getElementById('fecha_fin').value,
            pais: document.getElementById('pais').value,
            departamento: document.getElementById('departamento').value,
            municipio: document.getElementById('municipio').value,
            barrio: document.getElementById('barrio').value,
            direccion: document.getElementById('direccion').value --}}


</body>

</html>
