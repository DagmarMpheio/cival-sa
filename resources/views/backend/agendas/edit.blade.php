@extends('layouts.backend.main')

@section('title', 'Nova FAQ')

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Novo Usuário</h1>


        {!! Form::model($agenda, [
            'method' => 'PUT',
            'route' => ['backend.agendas.update', $agenda->id],
            'id' => 'agendas-form',
        ]) !!}

        @csrf
        <div class="row">
            <div class="col-12 col-md-12 col-xxl-9 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        <label class="card-title mb-0" for="service_id">Servico</label>
                        <font color="red">*</font>
                    </div>
                    <div class="card-body {{ $errors->has('service_id') ? ' has-error' : '' }} has-feedback">
                        {!! Form::select('service_id', App\Models\Servico::pluck('servico', 'id'), null, [
                            'class' => 'form-control',
                            'placeholder' => 'Escolha um serviço',
                            'required',
                        ]) !!}

                        @if ($errors->has('service_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('service_id') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="card-header">
                        <label class="card-title mb-0" for="date">Data</label>
                        <font color="red">*</font>
                    </div>
                    <div class="card-body {{ $errors->has('date') ? ' has-error' : '' }} has-feedback">
                        <input type="date" id="date" class="form-control" placeholder="Data"
                            value="{{$agenda->date}}" name="date" required>

                        @if ($errors->has('date'))
                            <span class="help-block">
                                <strong>{{ $errors->first('date') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="card-header">
                        <label class="card-title mb-0" for="employee_id">Atendente</label>
                        <font color="red">*</font>
                    </div>
                    <div class="card-body {{ $errors->has('employee_id') ? ' has-error' : '' }} has-feedback">
                        {!! Form::select(
                            'employee_id',
                            App\Models\User::whereHas('roles', function ($query) {
                                $query->where('id', '2');
                            })->pluck('name', 'id'),
                            null,
                            [
                                'class' => 'form-control',
                                'id' => 'employee_id',
                                'placeholder' => 'Escolha o atendente',
                                'required',
                            ],
                        ) !!}

                        @if ($errors->has('employee_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('employee_id') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="card-header">
                        <label class="card-title mb-0" for="start_time">Hora de Início</label>
                        <font color="red">*</font>
                    </div>
                    <div class="card-body {{ $errors->has('start_time') ? ' has-error' : '' }} has-feedback">
                        <input type="time" id="start_time" class="form-control" placeholder="Hora de Início"
                            value="{{ $agenda->start_time }}" name="start_time" required>

                        @if ($errors->has('start_time'))
                            <span class="help-block">
                                <strong>{{ $errors->first('start_time') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="card-header">
                        <label class="card-title mb-0" for="finish_time">Hora de Término</label>
                        <font color="red">*</font>
                    </div>
                    <div class="card-body {{ $errors->has('finish_time') ? ' has-error' : '' }} has-feedback">
                        <input type="time" id="finish_time" class="form-control" placeholder="Hora de Início"
                            value="{{ $agenda->finish_time }}" name="finish_time" required>

                        @if ($errors->has('finish_time'))
                            <span class="help-block">
                                <strong>{{ $errors->first('finish_time') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="card-header">
                        <h5 class="card-title mb-0" for="comments">Comentário <font color="red">*</font>
                        </h5>
                    </div>
                    <div class="card-body {{ $errors->has('comments') ? ' has-error' : '' }} has-feedback">
                        <textarea class="form-control @error('comments') is-invalid @enderror" rows="2" placeholder="Textarea"
                            name="comments" id="comments">{{ $agenda->comments }}</textarea>

                        @if ($errors->has('comments'))
                            <span class="help-block">
                                <strong>{{ $errors->first('comments') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

            </div>

        </div>
        <button class="btn btn-primary-yellow" type="submit"><i class="align-middle" data-feather="save"></i>
            <span class="align-middle">Actualizar</span></button>
        <a class="btn btn-dark text-yellow1" href="{{ route('backend.agendas.index') }}"><i class="align-middle"
                data-feather="slash"></i> <span class="align-middle">Cancelar</span></a>
        {!! Form::close() !!}

    </div>
@endsection

@section('scripts')
    <script src="/js/moment.min.js"></script>
    <script>
        var today = new Date().toISOString().split('T')[0];
        document.getElementsByName("date")[0].setAttribute('min', today);
    </script>
@endsection
