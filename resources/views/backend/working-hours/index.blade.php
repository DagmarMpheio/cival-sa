@extends('layouts.backend.main')

@section('title', 'Horário de Expediente')

@section('content')
    <div class="container-fluid p-0">

        @include('backend.partials.message')

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Todos Horário de Expediente</h1>
            <a class="badge bg-dark text-yellow1 ms-2 p-2" href="{{ route('backend.horario-expediente.create') }}" title="Novo Horário de Expediente">
                <i class="align-middle" data-feather="plus-circle"></i> <span class="align-middle"> Novo Horário de Expediente</span>
            </a>
        </div>

        <div class="row">
            <div class="col-12 col-md-12 col-xxl-9 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Horário de Expediente</h5>
                    </div>
                    <table class="table table-hover table-striped my-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Funcionário</th>
                                <th>Data</th>
                                <th>Hora de Ínicio</th>
                                <th>Hora de Término</th>
                                <th colspan="2">Acções</th>
                            </tr>
                        </thead>
                        @php
                            $counter = 1;
                        @endphp
                        <tbody>
                            @foreach ($workingHours as $workingHour)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td>{{ $workingHour->employees->name }}</td>
                                    <td>
                                        <abbr title="{{ $workingHour->dateFormatted(true) }}">{{ $workingHour->dateFormatted() }}</abbr>
                                    </td>
                                    <td>{{ $workingHour->start_time }}</td>
                                    <td>{{ $workingHour->finish_time }}</td>
                                    <td>
                                        <a href="{{ route('backend.horario-expediente.edit', $workingHour->id) }}" class="btn btn-primary-yellow"
                                            title="Editar">
                                            <i class="align-middle" data-feather="edit"></i> <span
                                                class="align-middle">Editar</span>
                                        </a>
                                    </td>
                                    <td>
                                        <form class="" style="display:inline"
                                            action="{{ route('backend.horario-expediente.destroy', $workingHour->id) }}" method="post">
                                            @method('delete')
                                            {{ csrf_field() }}
                                            <button href="#" class="btn btn-dark text-yellow1" title="Excluir" type="submit"
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
                        <p>Total: <b>{{ $workingHoursCount }} Horário de Expediente</b></p>
                    </div>
                    <!-- Mostrar links de paginacao -->
                    <div class="p-4">
                        {{ $workingHours->links() }}
                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
