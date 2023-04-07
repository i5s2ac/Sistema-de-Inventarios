@extends('layouts.layout')

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
                text-align: center;
                display: flex;
                align-items: center;
            }

            .image-container img {
                width: 100%;
                height: 100%;
                border-radius: 0%;
                object-fit: cover;
                margin-right: 150px;
            }
        </style>

        <div class="col-md-12">
            <div class="p-4 card-custom">

                <div class="row">
                    <div class="col-md-6">
                        <div class="image-container">
                            <img src="{{ Storage::url($empleado->photo_employee) }}" alt="Item photo" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="col-lg-12 mb-4">
                            <h4 class="text-left">
                                <i class="fas fa-clipboard-list" style="margin-right: 10px;"></i>
                                Datos Personales
                            </h4>
                            <hr style="border-style: solid; border-width: 1px 0 0;">
                        </div>

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
                        <strong>Pais:</strong> {{ $empleado->pais }}<br>

                        <br>

                        <div class="col-lg-12 mb-4">
                            <h4 class="text-left">
                                <i class="fas fa-clipboard-list" style="margin-right: 10px;"></i>
                                Datos Personales
                            </h4>
                            <hr style="border-style: solid; border-width: 1px 0 0;">
                        </div>

                        <strong>Puesto: </strong> {{ $empleado->puesto }}<br>
                        <strong>Salario:</strong> {{ $empleado->salario }}<br>
                        <strong>Tipo de contrato:</strong> {{ $empleado->tipo_contrato }}<br>
                        <strong>Departamento:</strong> {{ $departamento->name }}<br>

                        <br>

                        <div class="col-lg-12 mb-4">
                            <h4 class="text-left">
                                <i class="fas fa-clipboard-list" style="margin-right: 10px;"></i>
                                Datos Personales
                            </h4>
                            <hr style="border-style: solid; border-width: 1px 0 0;">
                        </div>

                        <strong>Contacto de emergencia 1:</strong> {{ $empleado->contacto_emergencia1 }}<br>
                        <strong>Contacto de emergencia 2:</strong> {{ $empleado->contacto_emergencia2 }}<br>

                    </div>
                </div>



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
@endsection
