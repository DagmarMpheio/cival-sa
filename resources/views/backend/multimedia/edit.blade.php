@extends('layouts.backend.main')

@section('title', 'Editar Ficheiro')

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Editar Ficheiro</h1>

        {!! Form::model($multimedia, [
            'method' => 'PUT',
            'route' => ['backend.multimedias.update', $multimedia->id],
            'files' => true,
            'id' => 'multimedia-form',
        ]) !!}

        @csrf

        @include('backend.multimedia.form')

        {!! Form::close() !!}

    </div>
@endsection
