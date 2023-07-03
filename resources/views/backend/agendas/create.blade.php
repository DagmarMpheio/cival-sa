@extends('layouts.backend.main')

@section('title', 'Novo Agendamento')

@section('style')
    <link rel="stylesheet" href="/backend/css/tempus-dominus.min.css">

    {{-- livewire styles --}}
    @livewireStyles

    {{-- custom css - step form --}}
    <style>
        .stepwizard-step p {
            margin-top: 10px;
        }

        .stepwizard-row {
            display: table-row;
        }

        .stepwizard {
            display: table;
            width: 100%;
            position: relative;
        }

        .stepwizard-step button[disabled] {
            opacity: 1 !important;
            filter: alpha(opacity=100) !important;
        }

        .stepwizard-row:before {
            top: 14px;
            bottom: 0;
            position: absolute;
            content: " ";
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-order: 0;
        }

        .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;
        }

        .btn-circle {
            width: 30px;
            height: 30px;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 15px;
        }

        .displayNone {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Novo Agendamento</h1>

        <form action="{{ route('backend.agendas.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-8 col-md-8 col-xxl-9 d-flex">
                    <div class="card flex-fill">
                        <div>
                            <livewire:create-agenda />
                        </div>
                    </div>

                </div>
            </div>
        </form>

    </div>
@endsection

@section('scripts')
    <script src="/backend/js/jquery-3.2.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/backend/js/popper.min.js"></script>
    <script src="/backend/js/tempus-dominus.min.js"></script>
    <script>
        var today = new Date().toISOString().split('T')[0];
        document.getElementsByName("data")[0].setAttribute('min', today);

        const picker = new tempusDominus.TempusDominus(document.getElementById('datetimepicker1'), {
            //configuracoes aqui
            /*display: {
            	viewMode: 'years'
            }*/
            localization: {
                format: 'yyyy-MM-dd HH:mm:ss',
            }
        });
    </script>

    {{--  livewire scripts --}}
    @livewireScripts
@endsection
