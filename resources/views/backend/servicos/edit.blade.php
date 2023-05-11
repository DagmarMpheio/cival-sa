@extends('layouts.backend.main')

@section('title', 'Editar Usuário')

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Editar FAQ</h1>

         {!! Form::model($servico, [
            'method' => 'PUT',
            'route' => ['backend.servicos.update', $servico->id],
            'id' => 'servico-form',
        ]) !!}
        
            @csrf
            <div class="row">
                <div class="col-12 col-md-12 col-xxl-9 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <label class="card-title mb-0" for="servico">Pergunta Frequente</label>
                            <font color="red">*</font>
                        </div>
                        <div class="card-body">
                            <input type="text" id="servico" class="form-control @error('servico') is-invalid @enderror"
                                placeholder="Questão" value="{{ $servico->servico }}" name="servico" autofocus required>

                            @error('servico')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="card-header">
                            <label class="card-title mb-0" for="preco">Preço</label>
                            <font color="red">*</font>
                        </div>
                        <div class="card-body">
                            <input type="number" id="preco" class="form-control @error('preco') is-invalid @enderror"
                                placeholder="Preço" value="{{ old('preco') }}" name="preco" step="0.01" min="0" autofocus required>

                            @error('preco')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="card-header">
                            <h5 class="card-title mb-0">Resposta</h5>
                        </div>
                        <div class="card-body">
                            <textarea class="form-control @error('descricao') is-invalid @enderror" rows="2" placeholder="Textarea"
                                name="descricao">{{ $servico->descricao }}</textarea>

                            @error('descricao')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                </div>

            </div>
            <button class="btn btn-primary" type="submit"><i class="align-middle" data-feather="save"></i>
                <span class="align-middle">Guardar</span></button>
            <a class="btn btn-danger" href="{{ route('backend.servicos.index') }}"><i class="align-middle"
                    data-feather="slash"></i> <span class="align-middle">Cancelar</span></a>
        {!! Form::close() !!}

    </div>
@endsection
