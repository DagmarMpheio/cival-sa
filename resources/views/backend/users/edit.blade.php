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

        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Nome</h5>
                    </div>
                    <div class="card-body">
                        <input type="text" class="form-control" placeholder="Nome" value="{{ $user->name }}"
                            name="name" required>
                    </div>

                    <div class="card-header">
                        <h5 class="card-title mb-0">Email</h5>
                    </div>
                    <div class="card-body">
                        <input type="email" class="form-control" placeholder="Email" value="{{ $user->email }}"
                            name="email" required>
                    </div>

                    <div class="card-header">
                        <h5 class="card-title mb-0">Telefone</h5>
                    </div>
                    <div class="card-body">
                        <input type="tel" class="form-control" placeholder="Telefone" value="{{ $user->telefone }}"
                            name="telefone" required>
                    </div>

                    <div class="card-header">
                        <h5 class="card-title mb-0">Morada</h5>
                    </div>
                    <div class="card-body">
                        <input type="address" class="form-control" placeholder="Morada" value="{{ $user->endereco }}"
                            name="endereco" required>
                    </div>
                </div>

            </div>

            <div class="col-12 col-lg-6">

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Biografia</h5>
                    </div>
                    <div class="card-body">
                        <textarea class="form-control" rows="2" placeholder="Textarea" name="bio">{{ $user->bio }}</textarea>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Gênero</h5>
                    </div>
                    <div class="card-body">
                        <div>
                            <label class="form-check">
                                <input class="form-check-input" type="radio" value="Masculino" name="genero" required>
                                <span class="form-check-label">
                                    Masculino
                                </span>
                            </label>
                            <label class="form-check">
                                <input class="form-check-input" type="radio" value="Femenino" name="genero" required>
                                <span class="form-check-label">
                                    Femenino
                                </span>
                            </label>
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary-yellow" type="submit"><i class="align-middle" data-feather="save"></i> <span
                        class="align-middle">Guardar</span></button>
                <a class="btn btn-dark text-yellow1" href="{{ route('backend.users.index') }}"><i class="align-middle"
                        data-feather="slash"></i> <span class="align-middle">Cancelar</span></a>

            </div>
        </div>
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
@endsection
