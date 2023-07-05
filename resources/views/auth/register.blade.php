@extends('layouts.app')

@section('content')
    <!-- CONTEUDO AQUI -->
    <div id="hero" class=" hero-login">
        <!-- CONTEUDO AQUI -->
        <section class="container-fluid mt-0 ">
            <div class="row justify-content-center p-1  mt-0 mb-4" data-aos="fade-up" data-aos-duration="1500">
                <div class="col-11 m-1 row justify-content-center bg-preto rounded">

                    <div class="col-9 m-1 text-center">
                        <!-- <h1 class="titulo-principal text-warning text-center h4">Cadastrar-se</h1> -->
                        <a class="" href="/">
                            <img class="py-3 img-fluid" alt="Logo" src="/assets/img/logo-cival-c.png">
                        </a>
                    </div>

                    <!--  FORMULARIO AQUI -->
                    <form action="{{ route('register') }}" class="form-de-validacao w-100 row justify-content-center" novalidate="" method="POST">
                        @csrf
                        <div class="col-11 col-md-5">
                            <div class="mb-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="custom-border-left bg-amarelo" id="inputGroupPrepend">
                                            <i class="bi-person-lines-fill"></i>
                                        </span>
                                    </div>

                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" placeholder="Nome" required autocomplete="name"
                                        autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- FIM INPUT GROUP -->
                            </div>
                            <!-- FIM COL -->

                            <div class=" mb-3 ">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="custom-border-left bg-amarelo" id="inputGroupPrepend">
                                            <i class="bi-envelope-fill"></i>
                                        </span>
                                    </div>

                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required placeholder="Email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- FIM INPUT GROUP -->
                            </div>
                            <!-- FIM COL -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 ">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="custom-border-left bg-amarelo">
                                                    <i class="bi bi-telephone-fill"></i>
                                                </span>
                                            </div>

                                            <input id="telefone" type="tel"
                                                class="form-control @error('telefone') is-invalid @enderror" name="telefone"
                                                value="{{ old('telefone') }}" required placeholder="Telefone">

                                            @error('telefone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <!-- FIM INPUT GROUP -->
                                    </div>
                                </div>

                                <!--Data de Nascimento -->
                                <div class="col-md-6">
                                    <div class="mb-3 ">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="custom-border-left bg-amarelo"><i class="bi-calendar-fill"></i>
                                                </span>
                                            </div>

                                            <input id="data_nascimento" type="date"
                                                class="form-control @error('data_nascimento') is-invalid @enderror"
                                                name="data_nascimento" value="{{ old('data_nascimento') }}" required
                                                placeholder="Data de Nascimento">

                                            @error('data_nascimento')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <!-- FIM INPUT GROUP -->
                                    </div>
                                </div>
                            </div>
                            <!-- FIM COL -->

                            <div class=" mb-3 ">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="custom-border-left bg-amarelo" id="inputGroupPrepend">
                                            <i class="bi bi-geo-alt-fill"></i>
                                        </span>
                                    </div>

                                    <input id="endereco" type="address"
                                        class="form-control @error('endereco') is-invalid @enderror" name="email"
                                        value="{{ old('endereco') }}" required placeholder="Endereço">

                                    @error('endereco')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- FIM INPUT GROUP -->
                            </div>
                            <!-- FIM COL -->


                            <div class=" mb-3">

                                <div class="card-body {{ $errors->has('genero') ? ' has-error' : '' }} has-feedback">
                                    <div>
                                        <label class="form-check" for="generoM">
                                            <input class="form-check-input @error('genero') is-invalid @enderror"
                                                type="radio" value="Masculino" name="genero" id="generoM" checked>

                                            <span class="form-check-label text-amarelo">
                                                Masculino
                                            </span>
                                        </label>
                                        <label class="form-check" for="generoF">
                                            <input class="form-check-input @error('genero') is-invalid @enderror"
                                                type="radio" value="Femenino" name="genero" id="generoF">

                                            <span class="form-check-label text-amarelo">
                                                Femenino
                                            </span>
                                        </label>

                                        @if ($errors->has('genero'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('genero') }}</strong>
                                            </span>
                                        @endif

                                        @error('genero')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- FIM COL -->
                            <!-- FIM COL -->
                        </div> <!-- Fim col 5 -->

                        <!-- Col 5 -->
                        <div class="col-11 col-md-5">
                            <div class=" mb-3 ">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="custom-border-left bg-amarelo"><i class="bi-key-fill"></i> </span>
                                    </div>

                                    <input id="password" type="password"
                                        class="form-control campo-senha @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="current-password" placeholder="Senha">

                                    <div class="input-group-prepend">
                                        <a
                                            class="custom-border-left c-pointer label-visualizar-senha btn-visualizar-senha btn btn-amarelo">
                                            <i class="bi-eye-slash-fill"></i>
                                        </a>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <!-- FIM INPUT GROUP -->
                            </div>
                            <!-- FIM COL -->


                            <div class=" mb-3 ">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="custom-border-left bg-amarelo">
                                            <i class="bi-key-fill"></i>
                                        </span>
                                    </div>

                                    <input id="password-confirm" type="password" class="form-control campo-senha-confirm"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="Confirme a Senha">

                                    <div class="input-group-prepend">
                                        <a
                                            class="custom-border-left c-pointer label-visualizar-senha btn-visualizar-senha-confirm btn btn-amarelo">
                                            <i class="bi-eye-slash-fill"></i>
                                        </a>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <!-- FIM INPUT GROUP -->
                            </div>
                            <!-- FIM COL -->


                            <div class=" mb-3 ">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="custom-border-left bg-amarelo" id="inputGroupPrepend">
                                            <i class="bi bi-person-fill"></i>
                                        </span>
                                    </div>

                                    <select name="tipo_cliente" id="tipo_cliente" class="form-control">
                                        <option value="Particular" selected>Particular</option>
                                        <option value="Empresarial">Empresarial</option>
                                    </select>

                                    @error('tipo_cliente')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- FIM INPUT GROUP -->
                            </div>
                            <!-- FIM COL -->



                            <div class="col-8 d-block m-auto ">
                                <button class="btn btn-amarelo text-preto d-block m-auto w-100"
                                    type="submit">Cadastrar-se</button>
                            </div>
                        </div>
                        <!-- Fim col 5 -->

                        <div class="col-11 pt-3 d-block m-auto ">
                            <a class="d-block m-auto text-center link link-warning" href="{{ route('login') }}">
                                Já Tem Uma Conta? Inicie Sessão
                            </a>
                        </div>

                        <div class="col-11 py-3 d-block m-auto ">
                            <a class="d-block m-auto text-center link link-warning" href="index.html"> <i
                                    class="bi-arrow-left-square-fill"></i> Voltar ao início</a>
                        </div>


                    </form>
                    <!-- FIM FORMULARIO -->
                </div>
            </div>
        </section>
    </div>
@endsection
