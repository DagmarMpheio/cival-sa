@extends('layouts.backend.main')

@section('title', 'Volume de Vendas')

@section('style')
    <link rel="stylesheet" href="/backend/css/custom.css">
@endsection

@section('content')
    <div class="container-fluid p-0">

        @include('backend.partials.message')

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Resultados Financeiros</h1>
        </div>

        <div class="row">
            <div class="col-12 col-md-12 col-xxl-9 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Finanças</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
@endsection
