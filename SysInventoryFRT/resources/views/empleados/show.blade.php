@extends('items.layout')

@section('content')
    <div class="container mt-5">


        <style>
            .card-custom {
                border-left: 4px solid #007bff;
                background-color: #fafafa;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                border-radius: 0.25rem;

            }

            .image-container {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
            }

            .image-container img {
                max-width: 109%;
                margin-bottom: 15px;
            }
        </style>

        <div class="col-md-12">
            <div class="p-4 card-custom">
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <h2 class="text-left">
                            <i class="fas fa-clipboard-list" style="margin-right: 10px;"></i>
                            Datos Personales
                        </h2>
                        <hr style="border-style: solid; border-width: 1px 0 0;">

                    </div>
                </div>

                <div class="col-md-8">

                    <strong>Nombre Completo: </strong> {{ $empleado->name }}<br>
                    <strong>DPI:</strong> {{ $empleado->dpi }}<br>
                    <strong>Fecha de nacimiento:</strong> {{ $empleado->fecha_de_nacimiento }}<br>
                    <strong>Genero:</strong> {{ $empleado->genero }}<br>
                    <strong>Estado civil:</strong> {{ $empleado->estado_civil }}<br>
                    <strong>Correo electronico:</strong> {{ $empleado->email }}<br>
                    <strong>teléfono:</strong> {{ $empleado->telefono }}<br>
                    <strong>Dirección:</strong> {{ $empleado->direccion }}<br>
                    <strong>Municipio:</strong> {{ $empleado->municipio }}<br>
                    <strong>Codigo Postal:</strong> {{ $empleado->codigo_postal }}<br>
                    <strong>Pais:</strong> {{ $empleado->pais }}

                </div>

                <br>
                <br>
                <br>

                <h2 class="text-left">
                    <i class="fas fa-clipboard-list" style="margin-right: 10px;"></i>
                    Datos del empleo
                </h2>
                <hr style="border-style: solid; border-width: 1px 0 0;">

                <strong>Puesto: </strong> {{ $empleado->puesto }}<br>
                <strong>Salario:</strong> {{ $empleado->salario }}<br>
                <strong>Tipo de contrato:</strong> {{ $empleado->tipo_contrato }}<br>
                <strong>Departamento:</strong> {{ $departamento->name }}<br>

            </div>

            <br>
            <br>
            <br>

            <div class="row">
                <div class="col text-left">
                    <a class="btn btn-primary" href="{{ route('empleados.index') }}">
                        Atrás</a>
                    <a class="btn btn-danger" href="{{ route('empleados.index') }}">
                        <i class="fas fa-file-pdf"></i> Descargar en PDF
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
