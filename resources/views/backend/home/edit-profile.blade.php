@extends('layouts.backend.main')

@section('title', 'Editar Perfil')

@section('content')
    <div class="container-fluid p-0">

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Editar Perfil</h1>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Nome</h5>
                    </div>
                    <div class="card-body">
                        <input type="text" class="form-control" placeholder="Nome">
                    </div>

                    <div class="card-header">
                        <h5 class="card-title mb-0">Email</h5>
                    </div>
                    <div class="card-body">
                        <input type="email" class="form-control" placeholder="Email">
                    </div>

                    <div class="card-header">
                        <h5 class="card-title mb-0">Telefone</h5>
                    </div>
                    <div class="card-body">
                        <input type="tel" class="form-control" placeholder="Telefone">
                    </div>

                    <div class="card-header">
                        <h5 class="card-title mb-0">Morada</h5>
                    </div>
                    <div class="card-body">
                        <input type="address" class="form-control" placeholder="Morada">
                    </div>
                </div>
                
            </div>

            <div class="col-12 col-lg-6">

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Sobre Mim</h5>
                    </div>
                    <div class="card-body">
                        <textarea class="form-control" rows="2" placeholder="Textarea"></textarea>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Gênero</h5>
                    </div>
                    <div class="card-body">
                        <div>
                            <label class="form-check">
                                <input class="form-check-input" type="radio" value="option1" name="radios-example"
                                    checked>
                                <span class="form-check-label">
                                   Masculino
                                </span>
                            </label>
                            <label class="form-check">
                                <input class="form-check-input" type="radio" value="option2" name="radios-example">
                                <span class="form-check-label">
                                    Femenino
                                </span>
                            </label>
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary-yellow">Guardar</button>
                <button class="btn btn-danger">Cancelar</button>

            </div>
        </div>

    </div>
@endsection
