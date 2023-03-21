@extends('items.layout')

@section('content')


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


    <form action="{{ route('items.store') }}" method="POST">
        @csrf

        <br>
        <br>

        <div class="container">

            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Agregar nuevo item</h2>
                    </div>
                </div>
            </div>


            <br>


            <div class="row justify-content-start">
                <div class="col-sm-4 col-md-8">
                    <div class="mb-2">
                        <label for="name">Nombre</label>
                    </div>
                    <input type="name" class="form-control" name="name" placeholder="Enter name">
                </div>

                <div class="col-4">
                    <div class="mb-2">
                        <label for="quantity">Cantidad</label>
                    </div>
                    <input type="number" class="form-control" name="quantity" placeholder="Enter quantity">

                </div>
            </div>

            <div class="mt-3">
                <div class="mb-2">
                    <label for="exampleFormControlTextarea1">Descripción del item</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
                </div>
            </div>

            <div class="mt-3">
                <div class="row align-items-start">
                    <div class="col">
                        <div class="mb-2">
                            <label for="acquisition_cost">Costo de adquisición</label>
                        </div>
                        <input type="number" class="form-control" name="acquisition_cost"
                            placeholder="Enter acquisition_cost">

                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <label for="acquisition_date">Fecha de adquisición</label>
                        </div>
                        <input type="date" class="form-control" name="acquisition_date"
                            placeholder="Enter acquisition_date">

                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <label for="storage_cost">Costo de almacenaje</label>
                        </div>
                        <input type="number" class="form-control" name="storage_cost" placeholder="Enter storage cost">
                    </div>
                </div>
            </div>

            <br>

            <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                <button type="submit" class="btn btn-success">Aceptar</button>
                <a class="btn btn-primary" href="{{ route('items.index') }}"> Atrás</a>
            </div>

        </div>

    </form>
@endsection
