@extends('layouts.backend.main')

@section('title', 'Novo Usuário')

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Novo Usuário</h1>

        <form action="{{ route('backend.users.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <label class="card-title mb-0" for="name">Nome</label><font color="red">*</font>
                        </div>
                        <div class="card-body">
                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Nome" value="{{ old('name') }}" name="name" autofocus required>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="card-header">
                            <label class="card-title mb-0" for="email">Email</label><font color="red">*</font>
                        </div>
                        <div class="card-body">
                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="Email" value="{{ old('email') }}" name="email" required>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="card-header">
                            <label class="card-title mb-0" for="telefone">Telefone</label><font color="red">*</font>
                        </div>
                        <div class="card-body">
                            <input type="tel" id="telefone"
                                class="form-control @error('telefone') is-invalid @enderror" placeholder="Telefone"
                                value="{{ old('telefone') }}" name="telefone" required>

                            @error('telefone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="card-header">
                            <label class="card-title mb-0" for="endereco">Morada</label><font color="red">*</font>
                        </div>
                        <div class="card-body">
                            <input type="address" id="endereco"
                                class="form-control @error('endereco') is-invalid @enderror" placeholder="Morada"
                                value="{{ old('endereco') }}" name="endereco" required>

                            @error('endereco')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <label class="card-title mb-0" for="genero">Gênero</label>
                        </div>
                        <div class="card-body">
                            <div>
                                <label class="form-check" for="generoM">
                                    <input class="form-check-input @error('genero') is-invalid @enderror" type="radio"
                                        value="Masculino" name="genero" id="generoM" checked>

                                    <span class="form-check-label">
                                        Masculino
                                    </span>
                                </label>
                                <label class="form-check" for="generoF">
                                    <input class="form-check-input @error('genero') is-invalid @enderror" type="radio"
                                        value="Femenino" name="genero" id="generoF">

                                    <span class="form-check-label">
                                        Femenino
                                    </span>
                                </label>

                                @error('genero')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            {!! Form::label('password','Password',['for'=>'password','class'=>'card-title mb-0','for'=>'password']) !!}<font color="red">*</font>
                        </div>
                        <div class="card-body">
                            {!! Form::input('password','password',$user->exists ? $user->password : null,['id'=>'password','class'=>'form-control','autocomplete'=>'new-password','placeholder'=>'Password','required'=>'required']) !!}

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="card-header">
                            {!! Form::label('password_confirmation','Confirmar a Password',['class'=>'card-title mb-0','for'=>'password_confirmation']) !!}<font color="red">*</font>
                        </div>
                        <div class="card-body">
                            {!! Form::input('password','password_confirmation',$user->exists ? $user->password : null,['id'=>'password_confirmation','class'=>'form-control','autocomplete'=>'new-password','placeholder'=>'Password','required'=>'required']) !!}

                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        

                    </div>

                    <button class="btn btn-primary-yellow" type="submit"><i class="align-middle" data-feather="save"></i>
                        <span class="align-middle">Guardar</span></button>
                    <a class="btn btn-dark text-yellow1" href="{{ route('backend.users.index') }}"><i class="align-middle"
                            data-feather="slash"></i> <span class="align-middle">Cancelar</span></a>

                </div>
            </div>
        </form>

    </div>
@endsection
