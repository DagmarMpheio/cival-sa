@extends('layouts.backend.main')

@section('title', 'Categorias')

@section('content')
    <div class="container-fluid p-0">

        @include('backend.partials.message')

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Todos Categorias</h1>
            <a class="badge bg-dark text-white ms-2 p-2" href="{{route('backend.categorias.create')}}" title="Nova Categoria">
               <i class="align-middle" data-feather="plus-circle"></i> <span class="align-middle"> Nova Categoria</span>
            </a>
        </div>

        <div class="row">
            <div class="col-12 col-md-12 col-xxl-9 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Categorias</h5>
                    </div>
                    <table class="table table-hover table-striped my-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Titulo</th>
                                <th>Nº de Post</th>
                                <th colspan="2">Acções</th>
                            </tr>
                        </thead>
                        @php
                            $counter = 1;
                        @endphp
                        <tbody>
                            @foreach ($categorias as $categoria)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td>{{ $categoria->title }}</td>
                                    <td>{{ $categoria->posts->count() }}</td>
                                    <td>
                                        <a href="{{ route('backend.categorias.edit', $categoria->id) }}" class="btn btn-primary"
                                            title="Editar">
                                            <i class="align-middle" data-feather="edit"></i> <span
                                                class="align-middle">Editar</span>
                                        </a>
                                    </td>
                                    <td>
                                        <form class="" style="display:inline"
                                            action="{{ route('backend.categorias.destroy', $categoria->id) }}" method="post">
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
                        <p>Total: <b>{{ $categoriasCount }} categorias</b></p>
                    </div>
                    <!-- Mostrar links de paginacao -->
                    <div class="p-4">
                        {{ $categorias->links() }}
                    </div>
                    

                </div>
            </div>

        </div>

    </div>
@endsection
