@extends('layouts.layout')

@section('content')
    <br>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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

    <form action="{{ route('empleados.update', $empleado->id) }}" method="POST" enctype="multipart/form-data"
        onsubmit="return validateForm();">

        @csrf
        @method('PUT')

        <div id="datos-personales-content">

            <br>

            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2> <i class="fas fa-user" style="margin-right: 10px;"></i>Datos Personales</h2>
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <div class="row align-items-start">
                    <div class="col">
                        <div class="mb-2">
                            <label for="name">Nombre completo</label>
                        </div>
                        <input type="text" class="form-control" name="name" placeholder="Enter name"
                            value="{{ $empleado->name }}">

                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <label for="dpi">DPI</label>
                        </div>
                        <input type="number" class="form-control" name="dpi" placeholder="Enter dpi"
                            value="{{ $empleado->dpi }}">

                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <label for="fecha_de_nacimiento">Fecha de nacimiento</label>
                        </div>
                        <input type="date" class="form-control" name="fecha_de_nacimiento"
                            placeholder="Enter fecha_de_nacimiento" value="{{ $empleado->fecha_de_nacimiento }}">
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <div class="row align-items-start">
                    <div class="col">
                        <div class="mb-2">
                            <label for="genero">Género</label>
                        </div>
                        <select class="form-control" name="genero">
                            <option value="{{ $empleado->genero }}" selected disabled
                                {{ old('genero') == 'seleccionado' ? 'selected' : '' }}>{{ $empleado->genero }}
                            <option value="Masculino" {{ $empleado->genero == 'Masculino' ? 'selected' : '' }}>Masculino
                            </option>
                            <option value="Femenino" {{ $empleado->genero == 'Femenino' ? 'selected' : '' }}>Femenino
                            </option>
                            <option value="Otro" {{ $empleado->genero == 'Otro' ? 'selected' : '' }}>Otro</option>
                        </select>
                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <label for="estado_civil">Estado civil</label>
                        </div>
                        <select class="form-control" name="estado_civil">
                            <option value="{{ $empleado->estado_civil }}" selected disabled
                                {{ old('estado_civil') == 'seleccionado' ? 'selected' : '' }}>
                                {{ $empleado->estado_civil }}
                            <option value="Soltero(a)" {{ $empleado->estado_civil == 'Soltero(a)' ? 'selected' : '' }}>
                                Soltero(a)</option>
                            <option value="Casado(a)" {{ $empleado->estado_civil == 'Casado(a)' ? 'selected' : '' }}>
                                Casado(a)
                            </option>
                            <option value="Divorciado(a)"
                                {{ $empleado->estado_civil == 'Divorciado(a)' ? 'selected' : '' }}>
                                Divorciado(a)</option>
                            <option value="Viudo(a)" {{ $empleado->estado_civil == 'Viudo(a)' ? 'selected' : '' }}>Viudo(a)
                            </option>
                        </select>
                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <label for="email">Email</label>
                        </div>
                        <input type="email" class="form-control" name="email" placeholder="Enter email"
                            value="{{ $empleado->email }}">
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <div class="row align-items-start">
                    <div class="col">
                        <div class="mb-2">
                            <label for="telefono">Teléfono</label>
                        </div>
                        <input type="tel" class="form-control" name="telefono" placeholder="Enter phone number"
                            value="{{ $empleado->telefono }}">
                    </div>

                    <div class="mt-3">
                        <div class="mb-2">
                            <label for="exampleFormControlTextarea1">Dirección de domicilio</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="direccion" rows="3">{{ $empleado->direccion }}</textarea>
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
                        <input type="text" class="form-control" name="municipio" placeholder="Enter municipio"
                            value="{{ $empleado->municipio }}">
                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <label for="codigo_postal">Código Postal</label>
                        </div>
                        <input type="number" class="form-control" name="codigo_postal"
                            placeholder="Enter código postal" value="{{ $empleado->codigo_postal }}">
                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <label for="pais">País</label>
                        </div>
                        <input type="text" class="form-control" name="pais" placeholder="Enter país"
                            value="{{ $empleado->pais }}">
                    </div>
                </div>
            </div>

            <br>

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
                        <input type="text" class="form-control" name="puesto" placeholder="Enter puesto"
                            value="{{ $empleado->puesto }}">
                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <label for="salario">Salario</label>
                        </div>
                        <input type="number" class="form-control" name="salario" placeholder="Enter salario"
                            value="{{ $empleado->salario }}">
                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <label for="tipo_contrato">Tipo de contrato</label>
                        </div>
                        <select class="form-control" name="tipo_contrato">
                            <option value="{{ $empleado->tipo_contrato }}" selected disabled
                                {{ old('tipo_contrato') == 'seleccionado' ? 'selected' : '' }}>
                                {{ $empleado->tipo_contrato }}
                            <option value="tiempo completo"
                                {{ $empleado->tipo_contrato == 'tiempo completo' ? 'selected' : '' }}>Tiempo completo
                            </option>
                            <option value="medio tiempo"
                                {{ $empleado->tipo_contrato == 'medio tiempo' ? 'selected' : '' }}>
                                Medio tiempo</option>
                            <option value="temporal" {{ $empleado->tipo_contrato == 'temporal' ? 'selected' : '' }}>
                                Temporal
                            </option>
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
                            <select class="form-control" name="departamento_id" id="departamento">
                                @if ($empleado->departamento_id === null)
                                    <option value="" disabled selected>Selecciona un departamento</option>
                                @else
                                    <option value="{{ $current_departamento->id }}" disabled selected>
                                        {{ $current_departamento->name }}</option>
                                @endif
                                @foreach ($departamentos as $departamento)
                                    <option value="{{ $departamento->id }}"
                                        {{ $empleado->departamento_id == $departamento->id ? 'selected' : '' }}>
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

            <br>

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
                        <input type="text" class="form-control" name="contacto_emergencia1"
                            placeholder="Enter contacto_emergencia1" value="{{ $empleado->contacto_emergencia1 }}">
                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <label for="contacto_emergencia2">Contacto emergencia secundario</label>
                        </div>
                        <input type="text" class="form-control" name="contacto_emergencia2"
                            placeholder="Enter contacto_emergencia2" value="{{ $empleado->contacto_emergencia2 }}">
                    </div>
                </div>
            </div>

            <br>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-left">
            <button type="submit" class="btn btn-success">Aceptar</button>
            <a class="btn btn-primary" href="{{ route('empleados.index') }}"> Atrás</a>
        </div>

    </form>

    <script>
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
