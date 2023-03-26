@extends('items.layout')

@section('content')

    <br>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> <i class="fas fa-user" style="margin-right: 10px;"></i>Datos Personales</h2>
            </div>
        </div>
    </div>

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

    <form action="{{ route('empleados.store') }}" method="POST">
        @csrf

        <br>

        <div class="mt-3">
            <div class="row align-items-start">
                <div class="col">
                    <div class="mb-2">
                        <label for="name">Nombre completo</label>
                    </div>
                    <input type="text" class="form-control" name="name" placeholder="Enter name">

                </div>
                <div class="col">
                    <div class="mb-2">
                        <label for="dpi">DPI</label>
                    </div>
                    <input type="number" class="form-control" name="dpi" placeholder="Enter dpi">

                </div>
                <div class="col">
                    <div class="mb-2">
                        <label for="fecha_de_nacimiento">Fecha de nacimiento</label>
                    </div>
                    <input type="date" class="form-control" name="fecha_de_nacimiento"
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
                    <select class="form-control" name="genero">
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
                    <select class="form-control" name="estado_civil">
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
                    <input type="email" class="form-control" name="email" placeholder="Enter email">
                </div>
            </div>
        </div>

        <div class="mt-3">
            <div class="row align-items-start">
                <div class="col">
                    <div class="mb-2">
                        <label for="telefono">Teléfono</label>
                    </div>
                    <input type="tel" class="form-control" name="telefono" placeholder="Enter phone number">
                </div>
                <div class="mt-3">
                    <div class="mb-2">
                        <label for="exampleFormControlTextarea1">Dirección de domicilio</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="direccion" rows="3"></textarea>
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
                    <input type="text" class="form-control" name="municipio" placeholder="Enter municipio">
                </div>
                <div class="col">
                    <div class="mb-2">
                        <label for="codigo_postal">Código Postal</label>
                    </div>
                    <input type="number" class="form-control" name="codigo_postal" placeholder="Enter código postal">
                </div>
                <div class="col">
                    <div class="mb-2">
                        <label for="pais">País</label>
                    </div>
                    <input type="text" class="form-control" name="pais" placeholder="Enter país">
                </div>
            </div>
        </div>

        <br>
        <br>

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
                    <input type="text" class="form-control" name="puesto" placeholder="Enter puesto">
                </div>
                <div class="col">
                    <div class="mb-2">
                        <label for="salario">Salario</label>
                    </div>
                    <input type="number" class="form-control" name="salario" placeholder="Enter salario">
                </div>
                <div class="col">
                    <div class="mb-2">
                        <label for="tipo_contrato">Tipo de contrato</label>
                    </div>
                    <select class="form-control" name="tipo_contrato">
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
                        <select class="form-control" name="departamento_id" id="departamento">
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

        <br>
        <br>

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> <i class="fas fa-exclamation-triangle" style="margin-right: 10px;"></i>Contactos de emergencia
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
                        placeholder="Enter contacto_emergencia1">
                </div>
                <div class="col">
                    <div class="mb-2">
                        <label for="contacto_emergencia2">Contacto emergencia secundario</label>
                    </div>
                    <input type="text" class="form-control" name="contacto_emergencia2"
                        placeholder="Enter contacto_emergencia2">
                </div>
            </div>
        </div>

        <br>
        <br>

    </form>

    <div class="col-xs-12 col-sm-12 col-md-12 text-left">
        <button type="submit" class="btn btn-success">Aceptar</button>
        <a class="btn btn-primary" href="{{ route('empleados.index') }}"> Atrás</a>
    </div>

    <br>
    <br>

@endsection
