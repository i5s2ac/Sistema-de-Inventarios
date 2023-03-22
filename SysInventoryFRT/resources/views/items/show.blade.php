@extends('items.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Datos del Item</h2>
                <br>
            </div>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-4">
            <div class="p-3 border bg-light">
                <strong>Nombre:</strong>
                {{ $item->name }}
            </div>

        </div>
        <div class="col-4">
            <div class="p-3 border bg-light">
                <strong>SKU:</strong>
                {{ $item->sku }}
            </div>

        </div>

        <div class="col-4">
            <div class="p-3 border bg-light">
                <strong>Cantidad:</strong>
                {{ $item->quantity }}
            </div>
        </div>

        <div class="col-12">
            <div class="p-4 border bg-light">
                <strong>Descripción:</strong>
                {{ $item->description }}
            </div>
        </div>

        <div class="col-4">
            <div class="p-3 border bg-light">
                <strong>Fecha de adquisición:</strong>
                {{ $item->acquisition_date }}
            </div>
        </div>

        <div class="col-4">
            <div class="p-3 border bg-light">
                <strong>Costo de adquisición:</strong>
                {{ $item->acquisition_cost }}
            </div>
        </div>

        <div class="col-4">
            <div class="p-3 border bg-light">
                <strong>Costo de almacenaje:</strong>
                {{ $item->storage_cost }}
            </div>
        </div>

        <div class="col-4">
            <div class="p-3 border bg-light">
                <strong>Tipo de item:</strong>
                {{ $item->typeItem }}
            </div>
        </div>

    </div>

    <br>

    <div class="row">
        <div class="col-md-12 offset-md-12">
            <img src="{{ Storage::url($item->barcode_image_path) }}" alt="{{ $item->barcode_image_path }}">
        </div>
    </div>

    <br>
    <br>

    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('items.index') }}">
            Atrás</a>
    </div>

@endsection
