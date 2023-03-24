@extends('items.layout')

@section('content')
    <div class="container mt-5">


        <style>
            .card-custom {
                border-left: 4px solid #007bff;
                background-color: #fafafa;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                border-radius: 0.25rem;

            }

            .image-container {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
            }

            .image-container img {
                max-width: 109%;
                margin-bottom: 15px;
            }
        </style>

        <div class="row mb-4">
            <div class="col-md-3">
                <div class="image-container">
                    <img src="{{ Storage::url($item->photo) }}" alt="Item photo" />
                    <img src="{{ Storage::url($item->barcode_image_path) }}" alt="{{ $item->barcode_image_path }}" />
                </div>
            </div>
            <div class="col-md-9">
                <div class="p-4 card-custom">
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <h2 class="text-left">
                                <i class="fas fa-clipboard-list" style="margin-right: 10px;"></i>
                                Datos del item
                            </h2>
                            <hr style="border-style: solid; border-width: 1px 0 0;">

                        </div>
                    </div>
                    <strong>Nombre:</strong> {{ $item->name }}<br>
                    <strong>SKU:</strong> {{ $item->sku }}<br>
                    <strong>Cantidad:</strong> {{ $item->quantity }}<br>
                    <strong>Descripción:</strong> {{ $item->description }}<br>
                    <strong>Fecha de adquisición:</strong> {{ $item->acquisition_date }}<br>
                    <strong>Costo de adquisición:</strong> {{ $item->acquisition_cost }}<br>
                    <strong>Costo de almacenaje:</strong> {{ $item->storage_cost }}<br>
                    <strong>Tipo de ítem:</strong> {{ $item->typeItem }}<br>
                    <strong>Status:</strong> {{ $item->available }}<br>
                    <strong>ID empleado:</strong> {{ $item->idEmployee }}

                    <br>
                    <br>
                    <br>

                    <div class="row">
                        <div class="col text-left">
                            <a class="btn btn-primary" href="{{ route('items.index') }}">
                                Atrás</a>
                            <a class="btn btn-danger" href="{{ route('items.index') }}">
                                <i class="fas fa-file-pdf"></i> Descargar en PDF
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
