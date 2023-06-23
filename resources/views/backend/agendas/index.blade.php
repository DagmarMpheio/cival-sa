@extends('layouts.backend.main')

@section('title', 'Agendamentos')

@section('content')
    <div class="container-fluid p-0">

        @include('backend.partials.message')

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Todos Agendamentos</h1>
            <a class="badge bg-dark text-yellow1 ms-2 p-2" href="{{ route('backend.agendas.create') }}"
                title="Novo Agendamento">
                <i class="align-middle" data-feather="plus-circle"></i> <span class="align-middle"> Novo Agendamento</span>
            </a>

            <div class="pull-right" style="padding: 7px 0;">
                @if (Auth::user()->hasRole('admin'))
                    <?php $links = []; ?>
                    @foreach ($statusList as $key => $value)
                        @if ($value)
                            <?php $selected = Request::get('status') == $key ? 'selected-status' : ''; ?>
                            <?php $links[] = "<a class=\"{$selected}\" href=\"?status={$key}\">" . ucwords($key) . "({$value})</a>"; ?>
                        @endif
                    @endforeach
                    {!! implode(' | ', $links) !!}
                    |
                @endif
                <a class="{{ request()->route()->getName() == 'backend.agendas.showCalendar'? 'selected-status': '' }}"
                    href="{{ route('backend.agendas.showCalendar') }}" title="Calendário de Agendamentos">
                    <i class="align-middle" data-feather="calendar"></i> <span class="align-middle"> Calendário de
                        Agendamentos</span>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-12 col-xxl-9 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Agendamentos</h5>
                    </div>
                    <table class="table table-hover table-striped my-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Servico</th>
                                <th>Data</th>
                                <th>Funcionário</th>
                                <th>Hora de Início</th>
                                <th>Hora de Término</th>
                                <th>Comentário</th>
                                <th colspan="2">Acções</th>
                            </tr>
                        </thead>
                        @php
                            $counter = 1;
                        @endphp
                        <tbody>
                            @foreach ($agendas as $agenda)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td>{{ $agenda->service->servico }}</td>
                                    <td>{{ $agenda->data }}</td>
                                    <td>{{ $agenda->employee->name }}</td>
                                    <td>{{ $agenda->start_time }}</td>
                                    <td>{{ $agenda->finish_time }}</td>
                                    <td>{{ $agenda->comments }}</td>
                                    <td>
                                        <a href="{{ route('backend.agendas.edit', $agenda->id) }}"
                                            class="btn btn-primary-yellow" title="Editar">
                                            <i class="align-middle" data-feather="edit"></i> <span
                                                class="align-middle">Editar</span>
                                        </a>
                                    </td>
                                    <td>
                                        <form class="" style="display:inline"
                                            action="{{ route('backend.agendas.destroy', $agenda->id) }}" method="post">
                                            @method('delete')
                                            {{ csrf_field() }}
                                            <button href="#" class="btn btn-dark text-yellow1" title="Excluir"
                                                type="submit" onclick="return confirm('Tem a certeza?')">
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
                        <p>Total: <b>{{ $agendasCount }} agendas</b></p>
                    </div>
                    <!-- Mostrar links de paginacao -->
                    <div class="p-4">
                        {{ $agendas->links() }}
                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
