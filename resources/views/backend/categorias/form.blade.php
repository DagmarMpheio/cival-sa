<?php
/**
 * Created by PhpStorm.
 * User: Dagmar Mpheio
 * Date: 10/27/2020
 * Time: 2:57 PM
 */
?>

<div class="col-xs-9">
    <div class="box">
        <!-- /.box-header -->
        <div class="box-body ">

            @csrf
            @if(!isset($hideOtherFields))
                <div class="form-group {{$errors->has('name') ? ' has-error' : ''}} has-feedback">
                    {!! Form::label('name','Nome') !!}<font color="red">*</font>
                    {!! Form::text('name',null,['class'=>'form-control']) !!}

                    @if ($errors->has('name'))
                        <span class="help-block">
                        <strong>{{ $errors->first('name')}}</strong>
                    </span>
                    @endif
                </div>


                <div class="form-group {{$errors->has('email') ? ' has-error' : ''}} has-feedback">
                    {!! Form::label('email') !!}<font color="red">*</font>
                    {!! Form::email('email',null,['class'=>'form-control']) !!}

                    @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email')}}</strong>
                    </span>
                    @endif
                </div>

                {{-- ocultar os campos de password quando estiver a ver o perfil e mostrar botao para alterar senha--}}
                @if(isset($hidePasswordFields))
                    <div class="form-group">
                        <a href="{{url('/change-password')}}" class="btn btn-outline-dark"><i class="fa fa-lock"></i>&nbsp;Alterar
                            a senha</a>
                    </div>
                @else
                    <div class="form-group {{$errors->has('password') ? ' has-error' : ''}} has-feedback">
                        {!! Form::label('password') !!}<font color="red">*</font>
                        {!! Form::input('password','password',$user->exists ? $user->password : null,['class'=>'form-control','autocomplete'=>'new-password']) !!}
                        {{--<input type="password" name="password" class="form-control">--}}

                        @if ($errors->has('password'))
                            <span class="help-block">
                        <strong>{{ $errors->first('password')}}</strong>
                    </span>
                        @endif
                    </div>

                    <div class="form-group {{$errors->has('password_confirmation') ? ' has-error' : ''}} has-feedback">
                        {!! Form::label('password_confirmation','Confirmar a Password') !!}<font color="red">*</font>
                        {!! Form::input('password','password_confirmation',$user->exists ? $user->password : null,['class'=>'form-control','autocomplete'=>'new-password']) !!}
                        {{-- {!! Form::password('password_confirmation',['class'=>'form-control','autocomplete'=>'new-password']) !!}--}}

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation')}}</strong>
                    </span>
                        @endif
                    </div>
                @endif


                <div class="form-group excerpt">
                    {!! Form::label('bio','Biografia') !!}
                    {!! Form::textarea('bio',null,['class'=>'form-control']) !!}

                    @if ($errors->has('bio'))
                        <span class="help-block">
                        <strong>{{ $errors->first('bio')}}</strong>
                    </span>
                    @endif
                </div>

                {{--alterar a senha--}}
            @else
                <div class="form-group {{$errors->has('password-antiga') ? ' has-error' : ''}} has-feedback">
                    {!! Form::label('password-antiga','Password Antiga') !!}<font color="red">*</font>
                    {!! Form::input('password','password-antiga',null,['class'=>'form-control','autocomplete'=>'off']) !!}
                    {{--<input type="password" name="password" class="form-control">--}}

                    @if ($errors->has('password-antiga'))
                        <span class="help-block">
                        <strong>{{ $errors->first('password-antiga')}}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group {{$errors->has('password') ? ' has-error' : ''}} has-feedback">
                    {!! Form::label('password','Nova Password') !!}<font color="red">*</font>
                    {!! Form::input('password','password',null,['class'=>'form-control','autocomplete'=>'new-password']) !!}
                    {{--<input type="password" name="password" class="form-control">--}}

                    @if ($errors->has('password'))
                        <span class="help-block">
                        <strong>{{ $errors->first('password')}}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group {{$errors->has('password_confirmation') ? ' has-error' : ''}} has-feedback">
                    {!! Form::label('password_confirmation','Confirmar a Password') !!}<font color="red">*</font>
                    {!! Form::input('password','password_confirmation',null,['class'=>'form-control','autocomplete'=>'new-password']) !!}
                    {{-- {!! Form::password('password_confirmation',['class'=>'form-control','autocomplete'=>'new-password']) !!}--}}

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation')}}</strong>
                    </span>
                    @endif
                </div>
            @endif

        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary-yellow">{{$user->exists ? 'Actualizar' : 'Salvar'}}</button>
            <a href="{{route('backend.users.index')}}" class="btn btn-default">Cancelar</a>
        </div>
    </div>
    <!-- /.box -->
</div>

