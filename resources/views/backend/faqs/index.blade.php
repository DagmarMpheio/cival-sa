@extends('layouts.backend.main')

@section('title', 'FAQS')

@section('content')
    <div class="container-fluid p-0">

        @include('backend.partials.message')

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Todas FAQS</h1>
            <a class="badge bg-dark text-white ms-2 p-2" href="{{route('backend.faqs.create')}}" title="Navo FAQ">
               <i class="align-middle" data-feather="plus-circle"></i> <span class="align-middle"> Nova FAQ</span>
            </a>
        </div>

        <div class="row">
            <div class="col-12 col-md-12 col-xxl-9 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">

                        <h5 class="card-title mb-0">FAQS</h5>
                    </div>
                    <table class="table table-hover table-striped my-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Questão</th>
                                <th colspan="2">Acções</th>
                            </tr>
                        </thead>
                        @php
                            $counter = 1;
                        @endphp
                        <tbody>
                            @foreach ($faqs as $faq)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td>{{ $faq->questao }}</td>
                                    <td>
                                        <a href="{{ route('backend.faqs.edit', $faq->id) }}" class="btn btn-primary"
                                            title="Editar">
                                            <i class="align-middle" data-feather="edit"></i> <span
                                                class="align-middle">Editar</span>
                                        </a>
                                    </td>
                                    <td>
                                        <form class="" style="display:inline"
                                            action="{{ route('backend.faqs.destroy', $faq->id) }}" method="post">
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
                        <p>Total: <b>{{ $faqsCount }} faqs</b></p>
                    </div>
                    <!-- Mostrar links de paginacao -->
                    <div class="p-4">
                        {{ $faqs->links() }}
                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
