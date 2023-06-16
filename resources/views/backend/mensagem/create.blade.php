@extends('layouts.backend.main')

@section('title', 'Nova Mensagem')

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Nova Mensagem</h1>

        <form action="{{route('backend.mensagens.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-12 col-md-12 col-xxl-9 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <label class="card-title mb-0" for="name">Nome</label>
                            <font color="red">*</font>
                        </div>
                        <div class="card-body {{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                            <input type="text" id="name" class="form-control"
                                placeholder="Nome" value="{{ old('name') }}" name="name" autofocus required>


                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="card-header">
                            <label class="card-title mb-0" for="email">Email</label>
                            <font color="red">*</font>
                        </div>
                        <div class="card-body {{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                            <input type="email" id="email" class="form-control"
                                placeholder="Email" value="{{ old('email') }}" name="email" required>


                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="card-header">
                            <label class="card-title mb-0" for="assunto">Assunto</label>
                            <font color="red">*</font>
                        </div>
                        <div class="card-body {{ $errors->has('assunto') ? ' has-error' : '' }} has-feedback">
                            <input type="text" id="assunto" class="form-control"
                                placeholder="Assunto" value="{{ old('assunto') }}" name="assunto" required>


                            @if ($errors->has('assunto'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('assunto') }}</strong>
                                </span>
                            @endif
                        </div>


                        <div class="card-header">
                            <h5 class="card-title mb-0">Mensagem</h5>
                        </div>
                        <div class="card-body {{ $errors->has('mensagem') ? 'has-error' : '' }} has-feedback">
                            <textarea class="form-control @error('mensagem') is-invalid @enderror" rows="2" placeholder="Mensagem"
                                name="mensagem">{{ old('mensagem') }}</textarea>

                                @if ($errors->has('mensagem'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('mensagem') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                </div>

            </div>
            <button class="btn btn-primary-yellow" type="submit"><i class="align-middle" data-feather="save"></i>
                <span class="align-middle">Guardar</span>
            </button>
            <a class="btn btn-dark text-yellow" href="{{ route('backend.mensagens.index') }}"><i class="align-middle"
                    data-feather="slash"></i> <span class="align-middle">Cancelar</span></a>
        </form>

    </div>
@endsection
