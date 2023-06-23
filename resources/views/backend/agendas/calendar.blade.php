@extends('layouts.backend.main')

@section('title', 'Calendário de Agendamentos')

@section('style')
    <style>
        #calendar {
            max-width: 1100px;
            margin: 0 auto;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Calendário de Agendamentos</h1>
            <a class="badge btn bg-dark text-yellow1 ms-2 p-2" href="{{ route('backend.agendas.index') }}" title="Voltar">
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
                <div class="col-12 col-md-12 col-xxl-9 d-flex mt-4">
                    <div class="flex-fill">
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script src='/backend/js/index.global.js'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var dataActual= new Date();
                var calendarEl = document.getElementById('calendar');

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    headerToolbar: {
                        left: 'prevYear,prev,next,nextYear today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                    },
					nowIndicator: true,
                    initialDate: dataActual,
                    navLinks: true, // can click day/week names to navigate views
                    editable: true,
                    dayMaxEvents: true, // allow "more" link when too many events
                    events: [
                        @foreach ($agendas as $agenda)
                        {
                            title: '{{ $agenda->service->servico }}',
                            start: '{{ $agenda->data }}T{{ $agenda->start_time }}',
                            end: '{{ $agenda->data }}T{{ $agenda->finish_time }}',
                        },
                        @endforeach
                        
                    ]
                });

                calendar.render();
            });
        </script>
    @endsection
