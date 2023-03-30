@extends('items.layout')

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Inicio</title>

    <style>
        .custom-card {
            border: none;
            border-radius: 10px;
            background-color: #04748c;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            overflow: hidden;
            padding: 18px;
            text-align: center;
            color: #1f1f1f;
        }

        .custom-card h3 {
            font-size: 1.4em;
            margin-bottom: 10px;
        }

        .custom-card p {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 5px;
        }
    </style>

</head>

<body>
    @section('content')
        <div class="card mt-5 custom-card">
            <div class="card-body">
                <h3 class="card-title">Bienvenido Isaac!</h3>
                <p class="card-text">Flowing Rivers Technologies</p>
                <p class="card-text">Director de IT</p>
            </div>
        </div>
    @endsection
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
