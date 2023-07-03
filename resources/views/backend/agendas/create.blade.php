@extends('layouts.backend.main')

@section('title', 'Novo Agendamento')

@section('style')
    <link rel="stylesheet" href="/backend/css/tempus-dominus.min.css">

    {{-- livewire styles --}}
    @livewireStyles

    {{-- custom css - step form --}}
    <style>
        .stepwizard-step p {
            margin-top: 10px;
        }

        .stepwizard-row {
            display: table-row;
        }

        .stepwizard {
            display: table;
            width: 100%;
            position: relative;
        }

        .stepwizard-step button[disabled] {
            opacity: 1 !important;
            filter: alpha(opacity=100) !important;
        }

        .stepwizard-row:before {
            top: 14px;
            bottom: 0;
            position: absolute;
            content: " ";
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-order: 0;
        }

        .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;
        }

        .btn-circle {
            width: 30px;
            height: 30px;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 15px;
        }

        .displayNone {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Novo Agendamento</h1>

        <form action="{{ route('backend.agendas.store') }}" method="post">
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
                            <label class="card-title mb-0" for="data">Data</label>
                            <font color="red">*</font>
                        </div>
                        <div class="card-body {{ $errors->has('data') ? ' has-error' : '' }}">
                            {!! Form::date('data', null, ['class' => 'form-control', 'id' => 'data', 'placeholder' => 'Data', 'required']) !!}

                            @if ($errors->has('data'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('data') }}</strong>
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
                            <select name="start_time" id="start_time" class="form-control">
                                @foreach ($horariosDisponiveis as $horario)
                                    <option value="{{ $horario }}">{{ $horario }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('start_time'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('start_time') }}</strong>
                                </span>
                            @endif
                        </div>


                        <div class="card-header">
                            <h5 class="card-title mb-0" for="comments">Comentário <font color="red">*</font>
                            </h5>
                        </div>
                        <div class="card-body {{ $errors->has('comments') ? ' has-error' : '' }} has-feedback">
                            <textarea class="form-control @error('comments') is-invalid @enderror" rows="2" placeholder="Textarea"
                                name="comments" id="comments">{{ old('comments') }}</textarea>

                            @if ($errors->has('comments'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('comments') }}</strong>
                                </span>
                            @endif


                            <input type="hidden" value="{{ Auth::id() }}" name="user_id">
                        </div>
                    </div>


                    <div class="card-body">
                        <livewire:create-agenda />
                    </div>

                </div>

            </div>
            <button class="btn btn-primary-yellow" type="submit"><i class="align-middle" data-feather="save"></i>
                <span class="align-middle">Guardar</span>
            </button>
            <a class="btn btn-dark text-yellow1" href="{{ route('backend.agendas.index') }}"><i class="align-middle"
                    data-feather="slash"></i> <span class="align-middle">Cancelar</span></a>
        </form>

    </div>
@endsection

@section('scripts')
    <script src="/backend/js/jquery-3.2.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/backend/js/popper.min.js"></script>
    <script src="/backend/js/tempus-dominus.min.js"></script>
    <script>
        var today = new Date().toISOString().split('T')[0];
        document.getElementsByName("data")[0].setAttribute('min', today);

        const picker = new tempusDominus.TempusDominus(document.getElementById('datetimepicker1'), {
            //configuracoes aqui
            /*display: {
            	viewMode: 'years'
            }*/
            localization: {
                format: 'yyyy-MM-dd HH:mm:ss',
            }
        });
    </script>

    {{--  livewire scripts --}}
    @livewireScripts
@endsection
