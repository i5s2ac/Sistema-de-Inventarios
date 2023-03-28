@extends('items.layout')

@section('content')

    <br>

    <button id="datos-personales-btn" class="btn btn-primary" style="width: 400px;">
        <i class="fas fa-user" style="margin-right: 10px;"></i>
        Datos Personales
    </button>

    <button id="datos-empleo-btn" class="btn btn-secondary" style="width: 400px;">
        <i class="fas fa-briefcase" style="margin-right: 10px;"></i>
        Datos de Empleo
    </button>

    <button id="contactos-emergencia-btn" class="btn btn-secondary" style="width: 400px;">
        <i class="fas fa-exclamation-triangle" style="margin-right: 10px;"></i>
        Contactos de Emergencia
    </button>



    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('empleados.store') }}" method="POST" enctype="multipart/form-data"
        onsubmit="localStorage.clear(); return validateForm();">
        @csrf

        <br>

        <div id="datos-personales-content">

            <br>

            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2> <i class="fas fa-user" style="margin-right: 10px;"></i>Datos Personales</h2>
                    </div>
                </div>
            </div>

            <br>


            <div class="mt-3">
                <div class="mb-2">
                    <label for="photo_employee">Foto del item</label>
                </div>
                <input type="file" class="form-control" id="photo_employee" name="photo_employee" autocomplete="off"
                    accept="image/*">
            </div>

            <br>


            <div class="mt-3">
                <div class="row align-items-start">
                    <div class="col">
                        <div class="mb-2">
                            <label for="name">Nombre completo</label>
                        </div>
                        <input type="text" class="form-control" id="name" name="name" autocomplete="off"
                            placeholder="Enter name">

                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <label for="dpi">DPI</label>
                        </div>
                        <input type="number" class="form-control" id="dpi" name="dpi" autocomplete="off"
                            placeholder="Enter dpi">

                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <label for="fecha_de_nacimiento">Fecha de nacimiento</label>
                        </div>
                        <input type="date" class="form-control" id="fecha_de_nacimiento" name="fecha_de_nacimiento"
                            placeholder="Enter fecha_de_nacimiento">
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <div class="row align-items-start">
                    <div class="col">
                        <div class="mb-2">
                            <label for="genero">Género</label>
                        </div>
                        <select class="form-control" id="genero" name="genero" autocomplete="off">
                            <option value="" selected>Selecciona una opción</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <label for="estado_civil">Estado civil</label>
                        </div>
                        <select class="form-control" id="estado_civil" name="estado_civil" autocomplete="off">
                            <option value="" selected>Selecciona una opción</option>
                            <option value="Soltero(a)">Soltero(a)</option>
                            <option value="Casado(a)">Casado(a)</option>
                            <option value="Divorciado(a)">Divorciado(a)</option>
                            <option value="Viudo(a)">Viudo(a)</option>
                        </select>
                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <label for="email">Email</label>
                        </div>
                        <input type="email" class="form-control" id="email" name="email" autocomplete="off"
                            placeholder="Enter email">
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <div class="row align-items-start">
                    <div class="col">
                        <div class="mb-2">
                            <label for="telefono">Teléfono</label>
                        </div>
                        <input type="tel" class="form-control" id="telefono" name="telefono" autocomplete="off"
                            placeholder="Enter phone number">
                    </div>
                    <div class="mt-3">
                        <div class="mb-2">
                            <label for="exampleFormControlTextarea1">Dirección de domicilio</label>
                            <textarea class="form-control" id="direccion" name="direccion" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <div class="row align-items-start">
                    <div class="col">
                        <div class="mb-2">
                            <label for="municipio">Municipio</label>
                        </div>
                        <input type="text" class="form-control" id="municipio" name="municipio" autocomplete="off"
                            placeholder="Enter municipio">
                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <label for="codigo_postal">Código Postal</label>
                        </div>
                        <input type="number" class="form-control" id="codigo_postal" name="codigo_postal"
                            placeholder="Enter código postal">
                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <label for="pais">País</label>
                        </div>
                        <input type="text" class="form-control" id="pais" name="pais" autocomplete="off"
                            placeholder="Enter país">
                    </div>
                </div>
            </div>
        </div>

        <br>


        <div id="datos-empleo-content" style="display: none;">

            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2> <i class="fas fa-briefcase" style="margin-right: 10px;"></i>Datos del empleo</h2>
                    </div>
                </div>
            </div>

            <br>

            <div class="mt-3">
                <div class="row align-items-start">
                    <div class="col">
                        <div class="mb-2">
                            <label for="puesto">Puesto</label>
                        </div>
                        <input type="text" class="form-control" id="puesto" name="puesto" autocomplete="off"
                            placeholder="Enter puesto">
                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <label for="salario">Salario</label>
                        </div>
                        <input type="number" class="form-control" id="salario" name="salario" autocomplete="off"
                            placeholder="Enter salario">
                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <label for="tipo_contrato">Tipo de contrato</label>
                        </div>
                        <select class="form-control" id="tipo_contrato" name="tipo_contrato" autocomplete="off">
                            <option value="" selected>Selecciona una opción</option>
                            <option value="tiempo completo">Tiempo completo</option>
                            <option value="medio tiempo">Medio tiempo</option>
                            <option value="temporal">Temporal</option>
                        </select>
                    </div>
                </div>
            </div>

            <br>

            <div class="col">
                <div class="mb-2">
                    <div id="departamentoDiv">
                        <div class="mb-2">
                            <label for="departamento">Departamento</label>
                        </div>
                        <div style="display: flex;">
                            <select class="form-control" name="departamento_id" id="departamento" autocomplete="off">
                                <option value="" selected>Selecciona un departamento</option>
                                @foreach ($departamentos as $departamento)
                                    <option value="{{ $departamento->id }}"
                                        {{ old('departamento_id') == $departamento->id ? 'selected' : '' }}>
                                        {{ $departamento->name }}
                                    </option>
                                @endforeach
                            </select>
                            <a class="btn btn-success" href="{{ route('departamentos.create') }}"
                                style="width: 30%; padding: 10px; background-color: #28242c; margin-left: 5px;">
                                <i class="fas fa-building"></i> <span style="padding-left: 10px;">Crear nuevo
                                    departamento</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>




        </div>

        <div id="contactos-emergencia-content" style="display: none;">

            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2> <i class="fas fa-exclamation-triangle" style="margin-right: 10px;"></i>Contactos de
                            emergencia
                        </h2>
                    </div>
                </div>
            </div>

            <br>

            <div class="mt-3">
                <div class="row align-items-start">
                    <div class="col">
                        <div class="mb-2">
                            <label for="contacto_emergencia1">Contacto emergencia principal</label>
                        </div>
                        <input type="text" class="form-control" id="contacto_emergencia1" name="contacto_emergencia1"
                            placeholder="Enter contacto_emergencia1">
                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <label for="contacto_emergencia2">Contacto emergencia secundario</label>
                        </div>
                        <input type="text" class="form-control" id="contacto_emergencia2" name="contacto_emergencia2"
                            placeholder="Enter contacto_emergencia2">
                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="col-xs-12 col-sm-12 col-md-12 text-left">
            <button type="submit" class="btn btn-success">Aceptar</button>
            <a class="btn btn-primary" href="{{ route('empleados.index') }}"> Atrás</a>
        </div>

        <br>
        <br>




    </form>


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Rellena el formulario con los datos almacenados
            Object.keys(localStorage).forEach(key => {
                const input = document.querySelector(`[name="${key}"]`);
                if (input) {
                    input.value = localStorage.getItem(key);
                }
            });
        });

        function storeData() {
            // Almacena los datos del formulario en el almacenamiento local del navegador
            document.querySelectorAll('input, select, textarea').forEach(input => {
                localStorage.setItem(input.name, input.value);
            });
        }

        // Maneja la navegación entre las secciones
        const sections = ['datos-personales', 'datos-empleo', 'contactos-emergencia'];
        const buttons = sections.map(section => document.getElementById(`${section}-btn`));
        const contents = sections.map(section => document.getElementById(`${section}-content`));

        buttons.forEach((button, index) => {
            button.addEventListener('click', () => {
                storeData();

                // Oculta todas las secciones y desactiva los botones
                contents.forEach(content => content.style.display = 'none');
                buttons.forEach(btn => btn.classList.remove('btn-primary'));
                buttons.forEach(btn => btn.classList.add('btn-secondary'));

                // Muestra la sección correspondiente y activa el botón
                contents[index].style.display = 'block';
                buttons[index].classList.remove('btn-secondary');
                buttons[index].classList.add('btn-primary');
            });
        });
    </script>




@endsection
