@extends('layouts.backend.main')

@section('title', 'Confirmação de Eliminação')

@section('content')
    <div class="container-fluid p-0">

        @include('backend.partials.message')

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Confirmação de Eliminação</h1>
            <a class="badge btn btn-primary-yellow text-white ms-2 p-2" href="{{ route('backend.users.index') }}" title="Voltar">
                <i class="align-middle" data-feather="arrow-left"></i> <span class="align-middle"> Voltar</span>
            </a>
        </div>

        <!-- Main content -->
        <div class="row">
            <div class="col-12 col-lg-6">
                {!! Form::model($user, [
                    'method' => 'DELETE',
                    'route' => ['backend.users.destroy', $user->id],
                ]) !!}

                <div class="card">

                    <div class="card-body">
                        <p>
                            Você especificou esse usuário para exclusão:
                        </p>
                        <p>
                            ID #{{ $user->id }}: <b>{{ $user->name }}</b>
                        </p>
                        <p>
                            O quê será feito com os conteúdos desse usuário?
                        </p>
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">Opções:</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input type="radio" name="delete_option" id="radio1" value="delete"
                                            class="form-check-input" checked>
                                        <label for="radio1" class="form-check-label"> Excluir Todos
                                            Conteúdos</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="radio" name="delete_option" id="radio2" value="attribute"
                                            class="form-check-input">
                                        <label for="radio2" class="form-check-label"> Atribuir conteúdos
                                            para:</label>
                                        {!! Form::select('selected_user', $users, null,['class' => 'form-control', 'placeholder' => 'Escolha um usuário','required'],) !!}
                                        {{-- App\User::pluck('name','id') --}}
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-dark text-yellow1"><i class="fa fa-check"></i>
                                            <i class="align-middle" data-feather="trash"></i> <span class="align-middle">  Confirmar Exclusão</span>
                                        </button>
                                        <a href="{{ route('backend.users.index') }}" class="btn btn-primary-yellow text-white">
                                            <i class="align-middle" data-feather="slash"></i> <span class="align-middle"> Cancelar</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        {{--
                             <p>


                             </p> --}}

                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
        <!-- ./row -->
    </div>
    <!-- /.content-wrapper -->
@endsection
