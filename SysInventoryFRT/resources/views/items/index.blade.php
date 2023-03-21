@extends('items.layout')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarjeta de conteo de elementos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #0d6efd;
            margin: 0;
            padding: 0;
        }

        .card {
            max-width: 250px;
            min-height: 120px;
            margin: 50px;
            border: none;
            border-radius: 10px;
            background-color: #1f1f1f;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            overflow: hidden;
            padding: 15px;
            text-align: center;
            position: absolute;
            left: 235px;
            border-left: 20px solid #0d6efd;
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
    </style>
</head>

<body>

    <div class="card">
        <span class="material-icons">
            inventory_2
        </span>
        <h5 class="card-title">Items</h5>
        <p class="card-text">150</p>
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
                <th>Name</th>
                <th>Details</th>
                <th>SKU</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        @foreach ($items as $item)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
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
