@extends('items.layout')

@section('content')

    <br>
    <br>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar item</h2>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Hubo problemas con los datos ingresados.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('items.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')

        <br>

        <div class="row justify-content-start">
            <div class="col-12">
                <div class="mb-2">
                    <label for="name">Nombre</label>
                </div>
                <input type="text" class="form-control" name="name" placeholder="Enter name"
                    value='{{ $item->name }}'>
            </div>
        </div>

        <div class="mt-3">
            <div class="mb-2">
                <label for="exampleFormControlTextarea1">Descripción del item</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3">{{ $item->description }}</textarea>
            </div>
        </div>

        <div class="mt-3">
            <div class="row align-items-start">
                <div class="col">
                    <div class="mb-2">
                        <label for="acquisition_cost">Costo de adquisición</label>
                    </div>
                    <input type="number" class="form-control" name="acquisition_cost" placeholder="Enter acquisition_cost"
                        value='{{ $item->acquisition_cost }}'>

                </div>
                <div class="col">
                    <div class="mb-2">
                        <label for="acquisition_date">Fecha de adquisición</label>
                    </div>
                    <input type="date" class="form-control" name="acquisition_date" placeholder="Enter acquisition_date"
                        value='{{ $item->acquisition_date }}'>

                </div>
                <div class="col">
                    <div class="mb-2">
                        <label for="storage_cost">Costo de almacenaje</label>
                    </div>
                    <input type="number" class="form-control" name="storage_cost" placeholder="Enter storage cost"
                        value='{{ $item->storage_cost }}'>
                </div>
            </div>
        </div>

        <div class="mt-3">
            <div id="typeItem">
                <div class="mb-2">
                    <label for="typeItem">Tipo de item</label>
                </div>
                <select class="form-control" name="typeItem" id="typeItem">
                    <option value="" disabled selected>Selecciona un tipo</option>
                    <option value="{{ $item->typeItem }}"disabled selected>{{ $item->typeItem }}</option>
                </select>
            </div>
        </div>



        <br>
        <br>

        <div class="col-xs-12 col-sm-12 col-md-12 text-left">
            <button type="submit" class="btn btn-success">Aceptar</button>
            <a class="btn btn-primary" href="{{ route('items.index') }}"> Atrás</a>
        </div>
        </div>

    </form>

@endsection
