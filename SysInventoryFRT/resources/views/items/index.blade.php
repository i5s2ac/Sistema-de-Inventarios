@extends('items.layout')

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
            display: flex;
            justify-content: center;
            align-items: center;
            height: 30vh;
            margin: 0 -5px;
        }

        .card {
            width: calc(25.7% - 10px);
            margin: 0 10px;
            border: none;
            left: 115px;
            border-radius: 10px;
            background-color: #1f1f1f;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            overflow: hidden;
            padding: 15px;
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
            margin-right: 5px;
        }

    </style>
</head>

<body>

    <div class="card-container">
        <div class="card">
            <span class="material-icons">
                inventory_2
            </span>
            <h5 class="card-title">Items</h5>
            <p class="card-text">150</p>
        </div>

        <div class="card">
            <span class="material-icons">
                local_shipping
            </span>
            <h5 class="card-title">Productos</h5>
            <p class="card-text">80</p>
        </div>

        <div class="card">
            <span class="material-icons">
                store
            </span>
            <h5 class="card-title">Sucursales</h5>
            <p class="card-text">12</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('items.create') }}"
                    style="width: 100%; padding: 10px; background-color: #04748c;">
                    <i class="fas fa-box"></i> <span style="padding-left: 10px;">Create New item</span>
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table" style="font-size: 14px;">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nombre</th>
                <th>Tipo de item</th>
                <th>SKU</th>
                <th>Status</th>
                <th width="400px">Acciones</th>
            </tr>
        </thead>
        @foreach ($items as $item)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->typeItem }}</td>
                <td>{{ $item->sku }}</td>
                <td>{{ $item->available }}</td>
                <td>

                    <div class="btn-group btn-group-md separated">
                        <form action="{{ route('unassign', $item->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-md">
                                Desasignar </button>
                        </form>

                        <button type="button" class="btn btn-warning btn-md" data-id="{{ $item->id }}"
                            data-bs-toggle="modal" data-bs-target="#asignar-{{ $item->id }}">Asignar
                        </button>

                        <a class="btn btn-info" href="{{ route('items.show', $item->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('items.edit', $item->id) }}">Edit</a>

                        <form action="{{ route('items.destroy', $item->id) }}" method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-md">Borrar</button>
                        </form>
                    </div>

                </td>
            </tr>

            <div class="modal fade" id="asignar-{{ $item->id }}" tabindex="-1" aria-labelledby="asignar"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="asignar">
                                Asignar Empleado
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ route('assign', $item->id) }}" method="post">
                                @csrf
                                <label for="employee_id">Employee</label>

                                <select class="form-control" name="employee_id" required>
                                    <option value="" selected>Selecciona un empleado</option>
                                    <option value="1">David</option>
                                    <option value="2">Isaac</option>
                                    <option value="3">Luis</option>
                                </select>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Asignar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </table>
@endsection
