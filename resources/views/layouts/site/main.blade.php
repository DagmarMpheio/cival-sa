<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <meta name="description" content="Inspeção automóvel, matricula, película">
    <meta name="keywords" content="inspeção, automóvel, agendar">
    <meta name="author" content="AE-Gadget">

    <!-- Favicons L -->
    <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('assets/img/favicon.png')}}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor Ficheiros  -->
    <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- CSS Principal do site -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    @yield('style')
    @yield('scripts2')

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    @if (request()->route()->getName() != 'login' &&
            request()->route()->getName() != 'register')
        <!-- ======= CABEÇALHO ======= -->
        <header class="fixed-top">
            <div id="topo-header" class="bg-amarelo m-0 ">

                <form action="/pesquisar" id="formulario-topo" class="form-inline d-inline-block  p-0 col-5 col-md-6"
                    method="get">

                    <input name="s" class="form-control p-1" type="search" placeholder="Pesquisar na CIVAL..."
                        aria-label="Pesquisar">
                    <button class="btn btn-preto text-amarelo" type="submit">
                        <i class="bi-search"></i>
                    </button>
                </form>

                <div class="social-midia navbar col-8">

                    <ul class="d-flex">
                        <form class="form-inline d-inline-block" action="">
                            <select class="form-control btn btn-preto text-amarelo bi-chevron-down" name="lang"
                                id="lang">
                                <option value="pt">PT</option>
                                <option value="en">EN</option>
                            </select>
                        </form>

                        <li class="dropdown dropdown-login"><a href="#">
                                @auth {{ auth()->user()->name }} @endauth <i class="bi-person-circle "></i><i
                                    class="bi bi-chevron-down"></i></a>
                            <ul>
                                @auth
                                    <li> <a href="/dashboard">Painel</a></li>
                                    <li> <a href="/perfil"> {{ auth()->user()->name }} </a></li>
                                    <form class="text-center justify-content-center" action="logout" method="post">
                                        @csrf
                                        <li>
                                            <button class="btn nav-link bg-transparent border-none text-amarelo px-2"
                                                style="font-size: 12pt" type="submit">
                                                <i class="bi-poweroff"></i>
                                                Sair
                                            </button>
                                        </li>
                                    </form>

                                @endauth

                                @guest
                                    <li> <a href="/login"> Login</a></li>
                                    <li> <a href="/criar-conta"> Criar conta</a></li>
                                @endguest
                            </ul>
                        </li>

                        <li class="nav-link ">
                            <a class="" href="#"><i class="bi-facebook"></i></a>
                        </li>
                        <li class="">
                            <a class="" href="#"><i class="bi-whatsapp"></i></a>
                        </li>
                        <li class="">
                            <a class="" href="#"><i class="bi-youtube"></i></a>
                        </li>

                    </ul>
                </div>
            </div>

            <div id="header"
                class=" container-fluid px-4 d-flex align-items-center justify-content-between   {{ $bg =request()->route()->getName() != 'index'? 'header-inner-pages': '' }} ">

                <!-- <h1 class="logo"><a href="index.html">CIVAL, SA</a></h1> -->
                <!-- EM caso de preferir usar imagem do logo -->
                <a href="/" class="logo"><img src="/assets/img/logo-cival-c.png" alt=""
                        class="img-fluid"></a>

                <nav id="navbar" class="navbar">
                    <ul>
                        <li><a class="nav-link scrollto {{ $active =request()->route()->getName() == 'index'? 'active': '' }}"
                                href="/">Início</a></li>
                        <li><a class="nav-link scrollto" href="/#about">Sobre</a></li>
                        <li><a class="nav-link scrollto" href="/#services">Películas</a></li>
                        <li><a class="nav-link scrollto" href="/#services">Matrículas</a></li>
                        <li><a class="nav-link scrollto" href="/#services">Inspeção</a></li>

                        <!-- documentos dropdow -->
                        <li class="dropdown"><a
                                class=" {{ $active =request()->route()->getName() == 'documentos'? 'active': '' }} "
                                href="#"><span>Documentos</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a class="scrollto" href="/documentos/#matriculas">Legislação Matrículas</a></li>
                                <li class="dropdown"><a href="#"><span>Inspeção</span> <i
                                            class="bi bi-chevron-right"></i></a>
                                    <ul>
                                        <li><a class="scrollto" href="/documentos/#inspensao">Inspeção periódica</a>
                                        </li>
                                        <li><a class="scrollto" href="/documentos/#inspensao">Inspeção obrigatória</a>
                                        </li>
                                        <li><a class="scrollto" href="/documentos/#inspensao">Inspeção</a></li>
                                    </ul>
                                </li>
                                <li><a class="scrollto" href="/documentos/#peliculas">Peliculas</a></li>

                            </ul>
                        </li>
                        <!-- fim documentos dropdow -->
                        <li>
                            <a class="nav-link {{ $active =request()->route()->getName() == 'blog'? 'active': '' }}"
                                href="/blog">Blog</a>
                        </li>



                        <li><a class="nav-link scrollto" href="/#contact">Contacto</a></li>
                        @auth
                            <li><a class="getstarteds bg-preto p-2 rounded scrollto text-amarelo text-center"
                                    href="/backend/agendas">FAZER MARCAÇÃO</a></li>
                        @endauth
                        @guest
                            <li><a class="getstarteds bg-preto p-2 rounded scrollto text-amarelo text-center"
                                    href="/login">FAZER MARCAÇÃO</a></li>
                        @endguest

                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->

            </div>
        </header><!-- FIm Cabecalho -->
    @endif

    <div id="app">
        <main>
            @yield('content')
        </main>

        <!-- ======= Footer - Rodape ======= -->
        <footer id="footer">
            @if (request()->route()->getName() != 'login' &&
                    request()->route()->getName() != 'register')
                <div class="footer-top">
                    <div class="container">
                        <div class="row">

                            <div class="col-lg-3 col-md-6">
                                <div class="footer-info">
                                    <img class="img-fluid" src="/assets/img/logo-cival-c.png" alt="Logo CVAL, SA">
                                    <p>
                                        Lubango, Av 4 de Fevereiro - Laureanos - Rotunda da TPA <br>
                                        Lubango<br><br>
                                        <strong>Phone:</strong> +244 926 951 97 / +244 222 726 958<br>
                                        <strong>Email:</strong> cival.ao@gmail.com<br>
                                    </p>
                                    <div class="social-links mt-3">

                                        <a href="https://www.facebook.com/andrelimaali" class="facebook"><i
                                                class="bx bxl-facebook"></i></a>
                                        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>

                                        <a href="#" class="youtube"><i class="bx bxl-youtube"></i></a>
                                        <a href="#" class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-6 footer-links">
                                <h3 class="text-amarelo text-uppercase h5">Menu</h3>
                                <ul>
                                    <li><i class="bx bx-chevron-right"></i> <a href="/">Início</a></li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="/#about">Sobre</a></li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="/#services">Películas</a></li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="/#services">Matriculas</a></li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="/#services">Inspeção</a></li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="/documentos">Documentos</a></li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="/blog">Blog</a></li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="/#contact">Contactos</a></li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="/faqs">Perguntas Frequentes</a>
                                    </li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="#">Termos</a></li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="#">Políticas</a></li>
                                </ul>
                            </div>

                            <div class="col-lg-3 col-md-6 footer-links">
                                <h3 class="text-amarelo text-uppercase h5">Outros Serviços</h3>
                                <ul>
                                    <li><i class="bx bx-chevron-right"></i> <a href="/#services">Matriculas </a></li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="/#services">Películas</a></li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="/#services">Inspeção</a></li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="/#services">Inspeção
                                            Periódica</a></li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="/documentos">Legislação</a></li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="/documentos">Regulamentação</a>
                                    </li>
                                </ul>
                            </div>

                            <!-- === RECENTES === -->
                            <div class="col-lg-4">
                                <div>
                                    <h3 class="text-amarelo h5"> RECENTES</h3>
                                </div>

                                @php
                                    $posts = \App\Models\Post::with('author')
                                        ->orderBy('id', 'DESC')
                                        ->simplePaginate(6);
                                @endphp

                                @foreach ($posts as $post)
                                    <div class="d-flex justify-content-between m-1 border-bottom w-100">
                                        @if ($post->image_url)
                                            <div class=" m-1 w-25 ">
                                                <img class="img-fluid" src="/img/upload/{{ $post->image }}"
                                                    alt="{{ $post->title}}">
                                            </div>
                                        @endif

                                        <div class="w-75 m-1  ">
                                            <a href="singel-post.html" class="link-amarelo d-block h5 text-truncate">
                                                {{ $post->title }}
                                            </a>
                                            <span class="inline left w-25 text-truncate text-muted">
                                                {{ $post->author->name }}
                                            </span>
                                            <span class="right inline text-muted text-truncate"><i
                                                    class="bi-clock"></i>
                                                {{ date('d M, Y', strtotime($post->published_at)) }}
                                            </span>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <!-- === FIM RECENTES === -->

                        </div>
                    </div>
                </div>
            @endif

            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong><span>CIVAL</span></strong>. Todos os direitos reservados
                </div>
                <div class="credits">
                    <!--  -->
                    Desenvolvido por <a href="#">AE-Gadget</a>
                </div>
            </div>
        </footer><!-- Fim Footer Rodape -->


        <!-- OUTROS PLUGINS -->
        <div id="preloader"></div>
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        @yield('after-footer')
    </div>



    <!-- Vendor Ficheiros JS -->
    <script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
    <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

    <!-- Template Principal Ficheiro JS -->
    <script src="{{asset('assets/js/validacao-form-bootstrap.js')}}"></script>
    <script src="{{asset('assets/js/visualizador-senha.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>

    @yield('scripts')
</body>

</html>
