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
            background-color: #0d6efd;
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
            background-color: #0d6efd;
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
            color: #0d6efd;
        }

        .material-icons {
            font-size: 40px;
            color: #0d6efd;
            margin-bottom: 5px;
        }

        td {
            vertical-align: middle;
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
                <a class="btn btn-success" href="{{ route('items.create') }}"> Create New item</a>
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
                <th width="500px">Acciones</th>
            </tr>
        </thead>
        @foreach ($items as $item)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->typeItem }}</td>
                <td>{{ $item->sku }}</td>
                <td>
                    <form action="{{ route('items.destroy', $item->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('items.show', $item->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('items.edit', $item->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                </td>
            </tr>
        @endforeach
    </table>
@endsection
