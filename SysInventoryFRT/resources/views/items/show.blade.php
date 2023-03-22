@extends('items.layout')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <h2 class="text-center">Datos del Item</h2>
            </div>
        </div>

        <style>
            .card-custom {
                border-left: 4px solid #007bff;
                background-color: #fafafa;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                border-radius: 0.25rem;
            }
        </style>

        <div class="row row-cols-1 row-cols-md-3 g-4 mb-4">
            @foreach(['Nombre' => $item->name, 'SKU' => $item->sku, 'Cantidad' => $item->quantity] as $title => $value)
                <div class="col-4">
                    <div class="p-3 card-custom">
                        <strong>{{ $title }}:</strong>
                        {{ $value }}
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row mb-4">
            <div class="col-12">
                <div class="p-4 card-custom">
                    <strong>Descripción:</strong>
                    {{ $item->description }}
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4 mb-4">
            @foreach(['Fecha de adquisición' => $item->acquisition_date, 'Costo de adquisición' => $item->acquisition_cost, 'Costo de almacenaje' => $item->storage_cost] as $title => $value)
                <div class="col-4">
                    <div class="p-3 card-custom">
                        <strong>{{ $title }}:</strong>
                        {{ $value }}
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row mb-4">
            <div class="col-4">
                <div class="p-3 card-custom">
                    <strong>Tipo de ítem:</strong>
                    {{ $item->typeItem }}
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-12 text-center">
                <img src="{{ Storage::url($item->barcode_image_path) }}" alt="{{ $item->barcode_image_path }}"
                    class="img-fluid">
            </div>
        </div>

        <div class="row">
            <div class="col text-center">
                <a class="btn btn-primary" href="{{ route('items.index') }}">
                    Atrás
                </a>
            </div>
        </div>
    </div>
@endsection
