@extends('layouts.backend.main')

@section('title', 'Editar Usuário')

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Editar</h1>
        {!! Form::model($user, [
            'method' => 'PUT',
            'autocomplete' => 'off',
            'route' => ['backend.users.update', $user->id],
            'id' => 'user-form',
        ]) !!}

        {{-- <p>{{$user->roles->first()->id}}</p> --}}

        @include('backend.users.form')
        {!! Form::close() !!}

    </div>
@endsection

@section('scripts')
    {{-- selecionar o radio button com base no valor da base de dados --}}
    <script>
        //recuperando valor da base de dados
        var valorGeneroServicoBD = {!! $user !!};
        //console.log("Genero: " + valorGeneroServicoBD.genero);

        //selecionar o radio button correspondente
        var radio = document.getElementsByName('genero');
        var check = document.getElementsByName('servicos');
        for (var i = 0; i < radio.length; i++) {
            if (radio[i].value == valorGeneroServicoBD.genero) {
                radio[i].checked = true;
                break;
            }
        }

        for (var i = 0; i < check.length; i++) {
            if (check[i].value == valorGeneroServicoBD.employeeServices[i].service_id) {
                check[i].checked = true;
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

        /* mostrar e oculta a lista de servicos com base no tipo de funcionario */
        $(document).ready(function() {
            //esconder os campos ao carregar a pagina
            $('#lista-servicos').hide();

            //ver o valor do selectbox actual, ao carregar a pagina
            $selectedValue = $('#role').val();
            if ($selectedValue == '2') {
                $('#lista-servicos').show();
            }

            //add evento change ao selectbox
            $('#role').change(function() {
                //obter o valor selecionado
                var tipoUsuario = $(this).val();

                //mostrar ou ocultar com base no valor selecionado
                if (tipoUsuario == '2') {
                    $('#lista-servicos').show();
                } else {
                    $('#lista-servicos').hide();
                }
            });
        });
    </script>
@endsection
