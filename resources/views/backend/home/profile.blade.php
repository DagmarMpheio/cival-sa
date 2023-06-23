@extends('layouts.backend.main')

@section('title', 'Perfil')

@section('style')
    <style>
        .round-div {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            margin: 10px;
            display: inline-block;
            text-align: center;
            line-height: 36px;
            font-size: 20px;
            font-weight: bold;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid p-0">

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Perfil</h1>
        </div>
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Detalhes do Perfil</h5>
                    </div>
                    <div class="card-body text-center">
                        <img src="backend/img/avatars/avatar-4.jpg" alt="Christina Mason"
                            class="img-fluid rounded-circle mb-2" width="128" height="128" />
                        <h5 class="card-title mb-0">{{ $user->name }}</h5>
                        <div class="text-muted mb-2">{{ $user->roles->first()->display_name }}</div>

                        <div>
                            <a class="btn btn-primary-yellow btn-sm" href="{{ route('editar-perfil') }}">
                                <span data-feather="edit"></span>
                                Editar
                            </a>
                            <a class="btn btn-dark text-yellow1 btn-sm" href="#">
                                <span data-feather="trash"></span>
                                Excluir
                            </a>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <h5 class="h6 card-title">Sobre</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Vive em <a
                                    href="#">{{ $user->endereco }}</a></li>
                            <li class="mb-1"><span data-feather="map-pin" class="feather-sm me-1"></span> De <a
                                    href="#">Angola</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-xl-9">
                <div class="card">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Agendamentos</h5>
                    </div>
                    <div class="card-body h-100">
                        @foreach ($agendamentos as $agendamento)
                            <div class="d-flex align-items-start">
                                <img src="backend/img/avatars/avatar-5.jpg" width="36" height="36"
                                    class="rounded-circle me-2" alt="Vanessa Tucker">
                                {{-- <div id="container">
                                    {{ $agendamento->service_id }}
                                </div> --}}

                                <div class="flex-grow-1">
                                    <small class="float-end text-navy">{{ $agendamento->getDateAttribute($agendamento->created_at) }}</small>
                                    <strong>{{ $agendamento->user->name }}</strong> agendou um serviço de
                                    <strong>{{ $agendamento->service->servico }}</strong><br />
                                    <small class="text-muted">{{ $agendamento->data }}</small><br />

                                </div>
                            </div>
                            <hr />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script>
        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        function createRandomDivs() {
            var container = document.getElementById("container");
            var texts = ["Texto 1", "Texto 2", "Texto 3"]; // Substitua por seus dados da base de dados

            for (var i = 0; i < texts.length; i++) {
                var div = document.createElement("div");
                div.className = "round-div";
                div.style.backgroundColor = getRandomColor();

                var initials = texts[i].substring(0, 2).toUpperCase();
                div.innerText = initials;

                container.appendChild(div);
            }
        }

        createRandomDivs();
    </script>
@endsection
