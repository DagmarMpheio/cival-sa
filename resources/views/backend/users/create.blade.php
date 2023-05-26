@extends('layouts.backend.main')

@section('title', 'Novo Usuário')

@section('style')
    <link rel="stylesheet" href="/backend/plugins/tag-editor/jquery.tag-editor.css">
@endsection

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
    <script src="/backend/plugins/tag-editor/jquery.caret.min.js"></script>
    <script src="/backend/plugins/tag-editor/jquery.tag-editor.min.js"></script>
    <script src="/backend/js/popper.min.js"></script>

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


        /* mostrar e oculta a lista de servicos com base no tipo de funcionario */
        $(document).ready(function(){
            //esconder os campos ao carregar a pagina
            $('#lista-servicos').hide();

            //add evento change ao selectbox
            $('#role').change(function(){
                //obter o valor selecionado
                var tipoUsuario=$(this).val();
                
                //mostrar ou ocultar com base no valor selecionado
                if(tipoUsuario=='2'){
                    $('#lista-servicos').show();
                }else{
                    $('#lista-servicos').hide();
                }
            });
        });
    </script>
@endsection
