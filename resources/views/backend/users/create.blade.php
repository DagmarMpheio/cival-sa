@extends('layouts.backend.main')

@section('title', 'Novo Usuário')

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Novo Usuário</h1>
        {!! Form::model($user, [
            'method' => 'POST',
            'route' => 'backend.users.store',
            'id' => 'user-form',
        ]) !!}

        @include('backend.users.form')

        {!! Form::close() !!}

    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        /*criar o slug automaticamente*/
        $('#name').on('blur', function() {
            var theTitle = this.value.toLowerCase().trim(),
                slugInput = $('#slug'),
                theSlug = theTitle.replace(/&/g, '-and-')
                .replace(/[^a-z0-9-]+/g, '-')
                .replace(/\-\-+/g, '-')
                .replace(/^-+|-+$/g, '');

            slugInput.val(theSlug);
        });

        /*activar markdowns na biografia*/
        var simplemde1 = new SimpleMDE({
            element: $('#bio')[0]
        });
    </script>
@endsection
