<?php
/**
 * Created by PhpStorm.
 * User: Dagmar Mpheio
 * Date: 10/27/2020
 * Time: 2:57 PM
 */
?>

@csrf
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                {!! Form::label('name', 'Nome', ['class' => 'card-title mb-0', 'for' => 'name']) !!}
                <font color="red">*</font>
            </div>
            <div class="card-body {{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome', 'autofocus', 'required']) !!}

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="card-header">
                {!! Form::label('slug', 'Slug', ['class' => 'card-title mb-0', 'for' => 'slug']) !!}
                <font color="red">*</font>
            </div>
            <div class="card-body {{ $errors->has('slug') ? ' has-error' : '' }} has-feedback">
                {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug', 'required']) !!}

                @if ($errors->has('slug'))
                    <span class="help-block">
                        <strong>{{ $errors->first('slug') }}</strong>
                    </span>
                @endif
            </div>

            <div class="card-header">
                {!! Form::label('email', 'Email', ['class' => 'card-title mb-0', 'for' => 'email']) !!}
                <font color="red">*</font>
            </div>
            <div class="card-body {{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'required']) !!}

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="card-header">
                {!! Form::label('telefone', 'Telefone', ['class' => 'card-title mb-0', 'for' => 'telefone']) !!}
                <font color="red">*</font>
            </div>
            <div class="card-body {{ $errors->has('telefone') ? ' has-error' : '' }} has-feedback">
                {!! Form::tel('telefone', null, ['class' => 'form-control', 'placeholder' => 'Telefone', 'required']) !!}

                @if ($errors->has('telefone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('telefone') }}</strong>
                    </span>
                @endif
            </div>

            <div class="card-header">
                {!! Form::label('endereco', 'Endereço', ['class' => 'card-title mb-0', 'for' => 'endereco']) !!}
                <font color="red">*</font>
            </div>
            <div class="card-body {{ $errors->has('endereco') ? ' has-error' : '' }} has-feedback">
                {!! Form::text('endereco', null, ['class' => 'form-control', 'placeholder' => 'Endereço', 'required']) !!}

                @if ($errors->has('endereco'))
                    <span class="help-block">
                        <strong>{{ $errors->first('endereco') }}</strong>
                    </span>
                @endif
            </div>

            <div class="card-header">
                {!! Form::label('role', 'Cargo',['class' => 'card-title mb-0', 'for' => 'role']) !!}
                <font color="red">*</font>
            </div>

            <div class="card-body {{ $errors->has('role') ? ' has-error' : '' }} has-feedback">
                @if ($user->exists && ($user->id == config('cms.default_user_id') || isset($hideRoleDropdown)))
                    {!! Form::hidden('role', $user->roles->first()->id) !!}
                    <p class="form-control-static">{{ $user->roles->first()->display_name }}</p>
                @else
                    {!! Form::select(
                        'role',
                        App\Models\Role::pluck('display_name', 'id'),
                        $user->exists ? $user->roles->first()->id : null,
                        ['class' => 'form-control', 'placeholder' => 'Escolha um cargo','required'],
                    ) !!}
                @endif

                @if ($errors->has('role'))
                    <span class="help-block">
                        <strong>{{ $errors->first('role') }}</strong>
                    </span>
                @endif
            </div>

            {{-- lista dos servicos --}}
            <div id='lista-servicos'>
                <div class="card-header">
                    {!! Form::label('services_label', 'Serviço Prestados',['class' => 'card-title mb-0']) !!}
                    <font color="red">*</font>
                </div>
                <div class="card-body {{ $errors->has('services') ? ' has-error' : '' }} has-feedback">
                    @foreach ($servicos as $servico)
                       <label class="form-check form-check-inline" for="{{$servico->id}}">
                            <input class="form-check-input" type="checkbox" value="{{$servico->id}}" id="{{$servico->id}}" name="services[]">
                            <span class="form-check-label">
                               {{ $servico->servico}}
                            </span>
                        </label>
                    @endforeach
                    
                    @if ($errors->has('services'))
                        <span class="help-block">
                            <strong>{{ $errors->first('services') }}</strong>
                        </span>
                    @endif

                    
                </div>
            </div>

        </div>

    </div>

    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <label class="card-title mb-0" for="genero">Gênero</label>
            </div>
            <div class="card-body {{ $errors->has('genero') ? ' has-error' : '' }} has-feedback">
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

                    @if ($errors->has('genero'))
                        <span class="help-block">
                            <strong>{{ $errors->first('genero') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                {!! Form::label('password', 'Password', [
                    'for' => 'password',
                    'class' => 'card-title mb-0',
                    'for' => 'password',
                ]) !!}<font color="red">*</font>
            </div>
            <div class="card-body {{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                {!! Form::input('password', 'password', $user->exists ? $user->password : null, [
                    'id' => 'password',
                    'class' => 'form-control',
                    'autocomplete' => 'new-password',
                    'placeholder' => 'Password',
                    'required' => 'required',
                ]) !!}

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="card-header">
                {!! Form::label('password_confirmation', 'Confirmar a Password', [
                    'class' => 'card-title mb-0',
                    'for' => 'password_confirmation',
                ]) !!}<font color="red">*</font>
            </div>
            <div class="card-body {{ $errors->has('password_confirmation') ? ' has-error' : '' }} has-feedback">
                {!! Form::input('password', 'password_confirmation', $user->exists ? $user->password : null, [
                    'id' => 'password_confirmation',
                    'class' => 'form-control',
                    'autocomplete' => 'new-password',
                    'placeholder' => 'Password',
                    'required' => 'required',
                ]) !!}


                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>


            <div class="card-header">
                {!! Form::label('bio', 'Biografia', ['class' => 'card-title mb-0', 'for' => 'bio']) !!}
            </div>
            <div class="card-body excerpt {{ $errors->has('genero') ? ' has-error' : '' }} has-feedback">
                {!! Form::textarea('bio', null, ['class' => 'form-control', 'rows' => '2']) !!}

                @if ($errors->has('bio'))
                    <span class="help-block">
                        <strong>{{ $errors->first('bio') }}</strong>
                    </span>
                @endif
            </div>


        </div>

        <button class="btn btn-primary-yellow" type="submit"><i class="align-middle" data-feather="save"></i>
            <span class="align-middle">Guardar</span></button>
        <a class="btn btn-dark text-yellow1" href="{{ route('backend.users.index') }}"><i class="align-middle"
                data-feather="slash"></i> <span class="align-middle">Cancelar</span></a>

    </div>
</div>
