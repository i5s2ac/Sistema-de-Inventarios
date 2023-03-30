@extends('items.layout')

@section('content')

    <br>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New departamento</h2>
            </div>
        </div>
    </div>

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

    <form action="{{ route('departamentos.store') }}" method="POST">
        @csrf

        <div class="mt-3">
            <div class="row align-items-start">
                <div class="col">
                    <div class="mb-2">
                        <label for="name">Nombre del departamento</label>
                    </div>
                    <input type="name" class="form-control" id="name" name="name" placeholder="Enter name">
                </div>

                <div class="col">
                    <div class="mb-2">
                        <div id="Encargado_idDiv">
                            <div class="mb-2">
                                <label for="encargado_id">Empleado encargado</label>
                            </div>
                            <div style="display: flex;">
                                <select class="form-control" name="encargado_id" id="encargado_id">
                                    <option value="" selected>Selecciona un empleado</option>
                                    @foreach ($empleados as $empleado)
                                        <option value="{{ $empleado->id }}"
                                            {{ old('encargado_id') == $empleado->id ? 'selected' : '' }}>
                                            {{ $empleado->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-3">
            <div class="col">
                <div class="mb-2">
                    <label for="exampleFormControlTextarea1">Descripcion del departamento</label>
                </div>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
            </div>
        </div>

        <br>
        <br>

        <div class="col-xs-12 col-sm-12 col-md-12 text-left">
            <button type="submit" class="btn btn-success">Aceptar</button>
            <a class="btn btn-primary" href="{{ route('empleados.index') }}"> Atrás</a>
        </div>



    </form>
@endsection
