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
