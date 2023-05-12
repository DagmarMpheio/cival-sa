@extends('layouts.backend.main')

@section('title', 'Nova FAQ')

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Novo Usuário</h1>

        <form action="{{ route('backend.faqs.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-12 col-md-12 col-xxl-9 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <label class="card-title mb-0" for="questao">Pergunta Frequente</label>
                            <font color="red">*</font>
                        </div>
                        <div class="card-body">
                            <input type="text" id="questao" class="form-control @error('questao') is-invalid @enderror"
                                placeholder="Questão" value="{{ old('questao') }}" name="questao" autofocus required>

                            @error('questao')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="card-header">
                            <h5 class="card-title mb-0">Resposta</h5>
                        </div>
                        <div class="card-body">
                            <textarea class="form-control @error('resposta') is-invalid @enderror" rows="2" placeholder="Textarea"
                                name="resposta">{{ old('resposta') }}</textarea>

                            @error('resposta')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                </div>

            </div>
            <button class="btn btn-primary-yellow-yellow" type="submit"><i class="align-middle" data-feather="save"></i>
                <span class="align-middle">Guardar</span></button>
            <a class="btn btn-dark text-yellow" href="{{ route('backend.faqs.index') }}"><i class="align-middle"
                    data-feather="slash"></i> <span class="align-middle">Cancelar</span></a>
        </form>

    </div>
@endsection
