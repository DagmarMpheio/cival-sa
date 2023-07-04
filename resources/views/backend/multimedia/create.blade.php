@extends('layouts.backend.main')

@section('title', 'Fazer Upload')

@section('style')
    <link rel="stylesheet" href="/backend/plugins/tag-editor/jquery.tag-editor.css">
    <link rel="stylesheet" href="/backend/css/custom.css">
@endsection

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Fazer Upload</h1>


        {!! Form::model($multimedia, [
            'method' => 'POST',
            'route' => 'backend.multimedias.store',
            'files' => true,
            'id' => 'multimedia-form',
        ]) !!}

        @csrf

        @include('backend.multimedia.form')

        {!! Form::close() !!}

    </div>
@endsection


@section('scripts')
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script>
        $(document).ready(function() {
            //ocultar os mesmo inicialmente
            $('#tipo-documento').hide();
            $('#album-fotos').hide();

            $('#ficheiro').change(function() {
                var ficheiro = $(this).val();
                var extensao = ficheiro.split('.').pop().toLowerCase();

                console.log("Extesao: "+extensao);

                if (extensao === 'pdf') {
                    $('#tipo-documento').show();
                    $('#album-fotos').hide();
                } else if (extensao === 'jpg' || extensao === 'png') {
                    $('#tipo-documento').hide();
                    $('#album-fotos').show();
                } else {
                    $('#tipo-documento').hide();
                    $('#album-fotos').hide();
                }
            });
        });
    </script>
@endsection
