@extends('layouts.backend.main')

@section('title', 'Calendário de Agendamentos')

@section('style')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
@endsection

@section('content')
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Calendário de Agendamentos</h1>
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
                            title: '{{ $agenda->user->name }}',
                            start: '{{ $agenda->start_time }}',
                            end: '{{ $agenda->finish_time }}'
                        },
                    @endforeach
                ]
            })
        });
    </script>
@endsection
