@extends('layouts.backend.main')

@section('title', 'Confirmação de Eliminação')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Usuários
                <small>Confirmação de Eliminação</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Dashboard</a>
                </li>
                <li><a href="{{route('backend.users.index')}}">Usuários</a></li>
                <li class="active">Confirmar Eliminação</li>

            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {!!  Form::model($user,[
                            'method' => 'DELETE',
                            'route' => ['backend.users.destroy',$user->id],
                            ])!!}

                <div class="col-xs-9">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body ">
                            <p>
                                Você especificou esse usuário para exclusão:
                            </p>
                            <p>
                                ID #{{$user->id}}: <b>{{$user->name}}</b>
                            </p>
                            <p>
                                O quê será feito com os conteúdos desse usuário?
                            </p>
                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0">Opções:</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input type="radio" name="delete_option" id="radio1" value="delete"
                                                   class="form-check-input" checked>
                                            <label for="radio1" class="form-check-label"> Excluir Todos
                                                Conteúdos</label>
                                        </div>

                                        <div class="form-check">
                                            <input type="radio" name="delete_option" id="radio2" value="attribute"
                                                   class="form-check-input">
                                            <label for="radio2" class="form-check-label"> Atribuir conteúdos
                                                para:</label>
                                            {!! Form::select('selected_user',$users,null) !!}
                                            {{--App\User::pluck('name','id')--}}
                                        </div>

                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-check"></i>
                                                Confirmar Exclusão
                                            </button>
                                            <a href="{{route('backend.users.index')}}" class="btn btn-default">
                                                <i class="fa fa-ban"></i> Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            {{--
                             <p>


                             </p>--}}
                        </div>
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
