@extends('items.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New empleado</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('empleados.index') }}"> Back</a>
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

    <form action="{{ route('empleados.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detail:</strong>
                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
                </div>
            </div>

            <div class="col">
                <div class="mb-2">
                    <div id="departamentoDiv">
                        <div class="mb-2">
                            <label for="departamento">Departamento</label>
                        </div>
                        <div style="display: flex;">
                            <select class="form-control" name="departamento_id" id="departamento">
                                <option value="" selected>Selecciona un departamento</option>
                                @foreach ($departamentos as $departamento)
                                    <option value="{{ $departamento->id }}"
                                        {{ old('departamento_id') == $departamento->id ? 'selected' : '' }}>
                                        {{ $departamento->name }}
                                    </option>
                                @endforeach
                            </select>
                            <a class="btn btn-success" href="{{ route('departamentos.create') }}"
                                style="width: 30%; padding: 10px; background-color: #28242c; margin-left: 5px;">
                                <i class="fas fa-building"></i> <span style="padding-left: 10px;">Crear nuevo departamento</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>



    </form>

    <div class="col-xs-12 col-sm-12 col-md-12 text-left">
        <button type="submit" class="btn btn-success">Aceptar</button>
        <a class="btn btn-primary" href="{{ route('empleados.index') }}"> Atrás</a>
    </div>



@endsection
