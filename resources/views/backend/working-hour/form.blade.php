<?php
/**
 * Created by PhpStorm.
 * User: Dagmar Mpheio
 * Date: 10/27/2020
 * Time: 2:57 PM
 */
?>

<div class="row">
    <div class="col-12 col-lg-6 mx-auto">
        <div class="card">
            <div class="card-header">
                {!! Form::label('ficheiro', 'Escolher ficheiro', ['class' => 'card-title mb-0', 'for' => 'ficheiro']) !!}
                <font color="red">*</font>
            </div>
            <div class="card-body {{ $errors->has('ficheiro') ? ' has-error' : '' }} has-feedback">
                {!! Form::file('ficheiro',null,['class' => 'form-control','id'=>'ficheiro']) !!}

                @if ($errors->has('ficheiro'))
                    <span class="help-block">
                        <strong>{{ $errors->first('ficheiro') }}</strong>
                    </span>
                @endif
            </div>

            <input type="hidden" class='form-control' name="tipo" id="tipo" value="">

            <div class="card-header">
                {!! Form::label('descricao', 'Descrição', ['class' => 'card-title mb-0', 'for' => 'descricao']) !!}
                <font color="red">*</font>
            </div>
            <div class="card-body {{ $errors->has('descricao') ? ' has-error' : '' }} has-feedback">
                {!! Form::textarea('descricao', null, ['class' => 'form-control', 'rows' => 2,'id' => 'descricao','required' => 'required']) !!}

                @if ($errors->has('descricao'))
                    <span class="help-block">
                        <strong>{{ $errors->first('descricao') }}</strong>
                    </span>
                @endif
            </div>

        </div>
        {!! Form::submit('Upload', ['class' => 'btn btn-primary-yellow']) !!}
        <a class="btn btn-dark text-yellow1" href="{{ route('backend.multimedias.index') }}" id="draft-btn">
            <i class="align-middle" data-feather="slash"></i> <span class="align-middle">Cancelar</span></a>
    </div>


</div>
