@extends('layouts.backend.main')

@section('title', 'Editar Usuário')

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Editar</h1>
        {!! Form::model($user, [
            'method' => 'PUT',
            'route' => ['backend.users.update', $user->id],
            'id' => 'user-form',
        ]) !!}

         @include('backend.users.form')
        {!! Form::close() !!}

    </div>
@endsection

@section('scripts')
    {{-- selecionar o radio button com base no valor da base de dados --}}
    <script>
        //recuperando valor da base de dados
        var valorGeneroBD = {!! $user !!};
        //console.log("Genero: " + valorGeneroBD.genero);
        //selecionar o radio button correspondente
        var radio = document.getElementsByName('genero');
        for (var i = 0; i < radio.length; i++) {
            if (radio[i].value == valorGeneroBD.genero) {
                radio[i].checked = true;
                break;
            }
        }
    </script>

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
