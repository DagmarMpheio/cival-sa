<?php
/**
 * Created by PhpStorm.
 * User: Dagmar Mpheio
 * Date: 10/27/2020
 * Time: 2:57 PM
 */
?>

<div class="row">
    <div class="col-12 col-md-12 col-xxl-9 d-flex">
        <div class="card flex-fill">
            <div class="card-header">
                <label class="card-title mb-0" for="employee_id">Funcionário</label>
                <font color="red">*</font>
            </div>
            <div class="card-body {{ $errors->has('employee_id') ? ' has-error' : '' }} has-feedback">
                {!! Form::select('employee_id', App\Models\User::pluck('name', 'id'), null, [
                    'class' => 'form-control',
                    'id' => 'employee_id',
                    'placeholder' => 'Escolha o funcionário',
                    'required',
                ]) !!}

                @if ($errors->has('employee_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('employee_id') }}</strong>
                    </span>
                @endif
            </div>

            <div class="card-header">
                <label class="card-title mb-0" for="date">Data</label>
                <font color="red">*</font>
            </div>
            <div class="card-body {{ $errors->has('date') ? ' has-error' : '' }}">
                {!! Form::date('date', null, ['class' => 'form-control', 'id' => 'date', 'placeholder' => 'Data', 'required']) !!}

                 @if ($errors->has('date'))
                    <span class="help-block">
                        <strong>{{ $errors->first('date') }}</strong>
                    </span>
                @endif
            </div>

            <div class="card-header">
                <label class="card-title mb-0" for="start_time">Hora de Ínicio</label>
                <font color="red">*</font>
            </div>
            <div class="card-body {{ $errors->has('start_time') ? ' has-error' : '' }}">
                {!! Form::time('start_time', null, [
                    'class' => 'form-control',
                    'id' => 'start_time',
                    'placeholder' => 'Hora de Ínicio',
                    'value' => old('start_time'),
                    'required',
                ]) !!}

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
            <div class="card-body {{ $errors->has('finish_time') ? ' has-error' : '' }}">
                {!! Form::time('finish_time', null, [
                    'class' => 'form-control',
                    'id' => 'finish_time',
                    'placeholder' => 'Hora de Ínicio',
                    'value' => old('finish_time'),
                    'required',
                ]) !!}

                @if ($errors->has('finish_time'))
                    <span class="help-block">
                        <strong>{{ $errors->first('finish_time') }}</strong>
                    </span>
                @endif
            </div>


        </div>

    </div>

</div>

{!! Form::submit('Guardar', ['class' => 'btn btn-primary-yellow']) !!}

<a class="btn btn-dark text-yellow1" href="{{ route('backend.horario-expediente.index') }}"><i class="align-middle"
        data-feather="slash"></i> <span class="align-middle">Cancelar</span></a>
