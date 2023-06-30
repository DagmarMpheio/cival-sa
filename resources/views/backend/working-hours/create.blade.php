@extends('layouts.backend.main')

@section('title', 'Novo Horário de Expediente')

@section('style')
    <link rel="stylesheet" href="/backend/plugins/tag-editor/jquery.tag-editor.css">
    <link rel="stylesheet" href="/backend/css/tempus-dominus.min.css">
@endsection


@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Novo Horário de Expediente</h1>

        {!! Form::model($workingHour, [
            'method' => 'POST',
            'route' => 'backend.horario-expediente.store',
            'id' => 'workingHour-form',
        ]) !!}

        @csrf

        @include('backend.working-hours.form')

        {!! Form::close() !!}

    </div>
@endsection

@section('scripts')
    <script src="/backend/js/popper.min.js"></script>
    <script src="/backend/js/tempus-dominus.min.js"></script>
    <script>
        var today = new Date().toISOString().split('T')[0];
        var todayHour = new Date().toISOString().split('T')[1];
        document.getElementsByName("date")[0].setAttribute('min', today);

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
@endsection
