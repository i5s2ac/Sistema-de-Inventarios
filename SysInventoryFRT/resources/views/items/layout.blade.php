<!DOCTYPE html>
<html>

<head>
    <title>Laravel 9 CRUD Application - ItSolutionStuff.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .sidebar {
            height: 100%;
            width: 240px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #ffffff;
            overflow-x: hidden;
            padding-top: 20px;
            transition: all 0.3s;
            z-index: 999;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 10px;
            text-decoration: none;
            font-size: 14px;
            width: calc(100% - 20px);
            /* Establece el ancho en un 100% menos 20px (ajusta según tus necesidades) */
            padding-left: 10px;
            /* Establece el relleno izquierdo */
            padding-right: 10px;
            /* Establece el relleno derecho */
        }

        .sidebar a:hover {
            background-color: #04748c;
            text-decoration: none;
        }


        .sidebar .active {
            background-color: #04748c !important;
            color: white;
        }

        .col-9 {
            flex: 1;
            padding-left: 270px;
            padding-right: 40px;
            transition: all 0.0001s;
        }

        .sidebar .nav-link {
            width: 100%;
        }

        .sidebar img {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .sidebar .dropdown .dropdown-toggle {
            color: white;
        }

        .sidebar .dropdown:hover .dropdown-toggle {
            color: #04748c;
        }

        .sidebar .dropdown-menu {
            margin-top: 8px;
        }
    </style>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark sidebar">
                <div class="d-flex flex-column flex-shrink-0 p-3">

                    <img src="{{ asset('img/FRT.png') }}" alt="Logo" width="180" height="65">


                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto" id="sidebar-menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link active" aria-current="page" data-page="home">
                                <i class="fas fa-home me-2"></i>

                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white" data-page="dashboard">
                                <i class="fas fa-tachometer-alt me-2"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('items.index') }}" class="nav-link text-white" data-page="inventario">
                                <i class="fas fa-box me-2"></i>
                                Inventario
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white" data-page="proveedores">
                                <i class="fas fa-truck me-2"></i>
                                Proveedores
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white" data-page="empleados">
                                <i class="fas fa-users me-2"></i>
                                Empleados
                            </a>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown">
                        <a href="#"
                            class="d-flex align-items-left text-white text-decoration-none dropdown-toggle"
                            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                                class="rounded-circle me-2">
                            <strong>Isaac Cyrman</strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-9">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0-alpha1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl7/1L_dstPt3HV5HzF6Gvk/e3U2XsX6wRdo1Jszcr" crossorigin="anonymous">
    <script>
        $(document).ready(function() {
            $('#sidebar-menu a').on('click', function() {
                $('#sidebar-menu a').removeClass('active');
                $(this).addClass('active');
            });
        });
    </script>
</body>

</html>
