@extends('layouts.backend.main')

@section('title', 'Calendário de Agendamentos')

@section('style')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
@endsection

@section('content')
    <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Calendário de Agendamentos</h1>
            <a class="badge btn bg-dark text-yellow1 ms-2 p-2" href="{{ route('backend.agendas.index') }}"
                title="Voltar">
                <i class="align-middle" data-feather="arrow-left"></i> <span class="align-middle"> Voltar</span>
            </a>
            <div class="pull-right" style="padding: 7px 0;">
                @if (Auth::user()->hasRole('admin'))
                    <a class="" href="/backend/agendas?status=particulares" title="Particulares">
                        <i class="align-middle" data-feather="user"></i> <span class="align-middle"> Particulares</span>
                    </a>
                    |
                    <a class="" href="/backend/agendas?status=todos" title="Todos">
                        <i class="align-middle" data-feather="list"></i> <span class="align-middle"> Todos</span>
                    </a>
                    |
                @endif
                <a class="{{ request()->route()->getName() == 'backend.agendas.showCalendar'? 'selected-status': '' }}"
                    href="{{ route('backend.agendas.showCalendar') }}" title="Calendário de Agendamentos">
                    <i class="align-middle" data-feather="calendar"></i> <span class="align-middle"> Calendário de
                        Agendamentos</span>
                </a>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-xxl-9 d-flex">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js'></script>

        <script>
            $(document).ready(function() {
                // page is now ready, initialize the calendar...
                $('#calendar').fullCalendar({
                    header: {
                        center: 'month,agendaWeek,list'
                    },
                    events: [
                        @foreach ($agendas as $agenda)
                            {
                                title: '{{ $agenda->employee->name }}',
                                start: '{{ $agenda->start_time }}',
                                end: '{{ $agenda->finish_time }}'
                            },
                        @endforeach
                    ]
                })
            });
        </script>
    @endsection
