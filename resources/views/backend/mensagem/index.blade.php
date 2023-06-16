@extends('layouts.backend.main')

@section('title', 'Mensagens')

@section('content')
    <div class="container-fluid p-0">

        @include('backend.partials.message')

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Todas Mensagens</h1>
            <a class="badge bg-dark text-yellow1 ms-2 p-2" href="{{route('backend.mensagens.create')}}" title="Navo Mensagem">
               <i class="align-middle" data-feather="plus-circle"></i> <span class="align-middle"> Nova Mensagem</span>
            </a>
        </div>

        <div class="row">
            <div class="col-12 col-md-12 col-xxl-9 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Mensagens</h5>
                    </div>
                    <table class="table table-hover table-striped my-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Assunto</th>
                                <th>Mensagem</th>
                                <th colspan="2">Acções</th>
                            </tr>
                        </thead>
                        @php
                            $counter = 1;
                        @endphp
                        <tbody>
                            @foreach ($mensagens as $mensagem)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td>{{ $mensagem->name }}</td>
                                    <td>{{ $mensagem->email }}</td>
                                    <td>{{ $mensagem->assunto }}</td>
                                    <td>{{ $mensagem->mensagem }}</td>
                                    <td>
                                        <a href="{{ route('backend.mensagens.edit', $mensagem->id) }}" class="btn btn-primary-yellow"
                                            title="Editar">
                                            <i class="align-middle" data-feather="edit"></i> <span
                                                class="align-middle">Editar</span>
                                        </a>
                                    </td>
                                    <td>
                                        <form class="" style="display:inline"
                                            action="{{ route('backend.mensagens.destroy', $mensagem->id) }}" method="post">
                                            @method('delete')
                                            {{ csrf_field() }}
                                            <button href="#" class="btn btn-danger" title="Excluir" type="submit"
                                                onclick="return confirm('Tem a certeza?')">
                                                <i class="align-middle" data-feather="trash"></i> <span
                                                    class="align-middle">Excluir</span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="mx-4 mt-2">
                        <p>Total: <b>{{ $mensagensCount }} Mensagens</b></p>
                    </div>
                    <!-- Mostrar links de paginacao -->
                    <div class="p-4">
                        {{ $mensagens->links() }}
                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
