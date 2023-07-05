@extends('layouts.app')

@section('content')
    <!-- CONTEUDO AQUI -->
    <div id="hero" class=" hero-login">
        <section class="container-fluid mt-0 ">
            <div class="row justify-content-center p-1  mt-4" data-aos="fade-up" data-aos-duration="1500">

                <div class="col-11 col-md-5 col-lg-5 m-1 row justify-content-center bg-preto rounded">

                    <div class="col-9 m-1">
                        <!-- <h1 class="titulo-principal text-warning text-center ">Login</h1> -->
                        <img src="assets/img/logo-cival-c.png" alt="Logotipo CIVAL SA" class="my-4 img-fluid">
                    </div>

                    <!--  FORMULARIO AQUI -->
                    <form action="{{ route('login') }}" class="form-de-validacao w-100 " method="POST">
                        @csrf
                        <div class="mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="custom-border-left bg-amarelo" id="inputGroupPrepend">
                                        <i class="bi-envelope-fill"></i>
                                    </span>
                                </div>

                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- FIM INPUT GROUP -->
                        </div>
                        <!-- FIM COL -->

                        <div class="mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="custom-border-left bg-amarelo"><i class="bi-key-fill"></i> </span>
                                </div>

                                <input id="password" type="password"
                                    class="form-control campo-senha @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password" placeholder="Senha">

                                <div class="input-group-prepend">
                                    <a
                                        class="custom-border-right c-pointer label-visualizar-senha btn-visualizar-senha btn btn-amarelo">
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

                        <div class="col-8 d-block m-auto ">
                            <button class="btn btn-amarelo text-preto d-block m-auto w-100" type="submit">Entrar</button>
                        </div>

                        <div class="col-11 pt-3 d-block m-auto ">
                            @if (Route::has('password.request'))
                                <a class="d-block m-auto text-center link link-warning"
                                    href="{{ route('password.request') }}">
                                    {{ __('Esqueceu a Senha?') }}
                                </a>
                            @endif
                        </div>
                        <div class="col-11 pt-3 d-block m-auto ">
                            <a class="d-block m-auto text-center link link-warning" href="{{ route('register') }}">Não tem
                                conta?
                                Cadastre-se Agora</a>
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
