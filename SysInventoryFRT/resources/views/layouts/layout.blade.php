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
            left: -240px;
            background-color: #ffffff;
            overflow-x: hidden;
            padding-top: 20px;
            transition: all 0.3s;
            z-index: 999;
        }

        .sidebar.open {
            left: 0;
        }

        .sidebar a {
            display: block;
            color: #333;
            /* Cambia el color aquí */
            padding: 10px;
            text-decoration: none;
            font-size: 14px;
            width: calc(100% - 20px);
            padding-left: 10px;
            padding-right: 10px;
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
            padding-left: 30px;
            padding-right: 40px;
            transition: all 0.3s;
        }

        .col-9.open {
            padding-left: 270px;
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

        .toggle-btn {
            position: fixed;
            left: 15px;
            top: 15px;
            z-index: 1000;
            cursor: pointer;
            color: #000;
            /* Cambia el color del ícono a negro */
            font-size: 18px;
            /* Aumenta el tamaño del ícono */
        }

        .toggle-btn.open {
            color: #fff;
            /* Cambia el color del ícono a blanco */
        }
    </style>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark sidebar" id="sidebar">
                <div class="d-flex flex-column flex-shrink-0 p-3">

                    <br>
                    <img src="{{ asset('img/FRT.png') }}" alt="Logo" width="180" height="65">

                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto" id="sidebar-menu">

                        <li>
                            <a href="{{ route('home') }}" class="nav-link text-white" data-page="dashboard">
                                <i class="fas fa-home me-2"></i>
                                Home
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
                            <a href="{{ route('empleados.index') }}" class="nav-link text-white" data-page="empleados">
                                <i class="fas fa-users me-2"></i>
                                Empleados
                            </a>
                        </li>
                    </ul>
                    <hr>

                </div>
            </div>
            <div class="col-9" id="main-content">
                <i class="fas fa-bars toggle-btn" id="toggle-btn"></i>
                @yield('content')
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl7/6en8XCp+HHAAK5GSLf2xlYtvJ8U2Q4U+9cuEnJoa3" crossorigin="anonymous">
    </script>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0-alpha1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl7/1L_dstPt3HV5HzF6Gvk/e3U2XsX6wRdo1Jszcr" crossorigin="anonymous">


    <script>
        $(document).ready(function() {
            $('#sidebar-menu a').on('click', function() {
                $('#sidebar-menu a').removeClass('active');
                $(this).addClass('active');
            });


            // Close sidebar when clicking on main content
            $('#main-content').on('click', function() {
                if ($('#sidebar').hasClass('open')) {
                    $('#sidebar, #main-content').removeClass('open');
                }
            });

            // Toggle sidebar on button click
            $('#toggle-btn').on('click', function(event) {
                event.stopPropagation();
                $('#sidebar, #main-content, #toggle-btn').toggleClass('open');
            });

            // Responsiveness: close sidebar if the window width is below 768px
            $(window).resize(function() {
                if ($(window).width() < 768) {
                    if ($('#sidebar').hasClass('open')) {
                        $('#sidebar, #main-content').removeClass('open');
                    }
                }
            });
        });
    </script>
</body>

</html>
