@extends('layouts.layout')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de invetarios FRT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #04748c;
            margin: 0;
            padding: 0;
        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            /* Cambia el valor de 'minmax' para ajustar el tamaño mínimo de la tarjeta */
            grid-gap: 18px;
            max-width: 97.8%;
            padding: 20px;
        }

        .card {
            border: none;
            border-radius: 10px;
            background-color: #1f1f1f;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            overflow: hidden;
            padding: 18px;
            /* Ajusta este valor para cambiar el relleno interno de la tarjeta */
            text-align: center;
            position: relative;
        }

        .card::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 10px;
            height: 100%;
            background-color: #04748c;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
        }

        .card-title {
            font-size: 1.1em;
            color: #111111;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 1.8em;
            font-weight: bold;
            color: #04748c;
        }

        .material-icons {
            font-size: 40px;
            color: #04748c;
            margin-bottom: 5px;
        }

        td {
            vertical-align: middle;
        }

        .btn-group.separated .btn {
            margin-right: 3px;
        }

        .card-available {
            background-image: url("{{ asset('img/design_card.png') }}");
            background-size: cover;
            background-position: center;
        }

        .card-unavailable {
            background-image: url("{{ asset('img/design_card.png') }}");
            background-size: cover;
            background-position: center;
        }

        .card-departamentos {
            background-image: url("{{ asset('img/design_card.png') }}");
            background-size: cover;
            background-position: center;
        }

        .main-content {
            margin-left: 260px;
            /* Ajusta este valor según el ancho de tu barra lateral */
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</head>

<body>

    <div class="main-content">
        <div class="card-container">

            <div class="card card-departamentos">
                <span class="material-icons">
                    inventory_2
                </span>
                <h5 class="card-title">departamentos registrados</h5>
                <p class="card-text">100</p>
            </div>

            <div class="card card-available">
                <span class="material-icons">check_circle </span>
                <h5 class="card-title">departamentos disponibles</h5>
                <p class="card-text">100</p>
            </div>

            <div class="card card-unavailable">
                <span class="material-icons">highlight_off </span>
                <h5 class="card-title">departamentos ocupados</h5>
                <p class="card-text">100</p>
            </div>
        </div>
    </div>

</body>

</html>

@section('content')
    <br>


    <div class="row">

        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('departamentos.create') }}"
                    style="width: 100%; padding: 10px; background-color: #04748c;">
                    <i class="fas fa-box"></i> <span style="padding-left: 10px;">Create New departamento</span>
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table" style="font-size: 14px;">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nombre</th>
                    <th>Nombre</th>

                    <th width="400px">Acciones</th>
                </tr>
            </thead>
            @foreach ($departamentos as $departamento)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $departamento->name }}</td>
                    <td>{{ $departamento->detail }}</td>

                    <td>
                        <div class="btn-group btn-group-md separated">

                            <a class="btn btn-md" style="background-color: #04748c; color: white"
                                href="{{ route('departamentos.show', $departamento->id) }}">Show</a><a class="btn btn-md"
                                style="background-color: #04748c; color: white"
                                href="{{ route('departamentos.edit', $departamento->id) }}">Edit</a>

                            <form action="{{ route('departamentos.destroy', $departamento->id) }}" method="POST">@csrf @method('DELETE')
                                <button type="submit" class="btn btn-md"
                                    style="background-color: #04748c; color: white">Borrar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
