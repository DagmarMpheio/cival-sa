<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CIVAL - Centro de Inspensão Automóvel do Lubango') }}</title>
    <meta name="description" content="Inspeção automóvel, matricula, película">
    <meta name="keywords" content="inspeção, automóvel, agendar">
    <meta name="author" content="AE-Gadget">

    <!-- Favicons L -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/favicon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor Ficheiros  -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- CSS Principal do site -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

    <!-- ======= CABEÇALHO ======= -->
    <header class="fixed-top">
        <div id="topo-header" class="bg-amarelo m-0 ">

            <form action="/pesquisa" id="formulario-topo" class="form-inline d-inline-block  p-0 col-5 col-md-6"
                method="GET">
                @csrf
                <input class="form-control  p-1" type="text" id="search"
                    name="search"placeholder="Pesquisar na CIVAL..." aria-label="Pesquisar">
                <button class=" btn btn-preto" type="submit">
                    <i class="bi-search"></i>
                </button>

            </form>
            <div class="social-midia  navbar col-8">

                <ul class="d-flex">
                    <form class="form-inline d-inline-block" action="">
                        <select class="form-control btn btn-preto bi-chevron-down" name="lang" id="lang">
                            <option value="pt">PT</option>
                            <option value="en">EN</option>
                        </select>
                    </form>

                    <li class="dropdown dropdown-login"><a href="#"><i class="bi-person-circle "></i><i
                                class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li> <a href="/login"> Login</a></li>
                            <li> <a href="/register"> Criar conta</a></li>
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

        <div id="header" class="container-fluid px-4 d-flex align-items-center justify-content-between">

            <!-- <h1 class="logo"><a href="index.html">CIVAL, SA</a></h1> -->
            <!-- EM caso de preferir usar imagem do logo -->
            <a href="index.html" class="logo"><img src="assets/img/logo-cival-c.png" alt=""
                    class="img-fluid"></a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="/">Início</a></li>
                    <li><a class="nav-link scrollto" href="/#about">Sobre</a></li>
                    <li><a class="nav-link scrollto" href="/#services">Películas</a></li>
                    <li><a class="nav-link scrollto" href="/#services">Matrículas</a></li>
                    <li><a class="nav-link scrollto" href="/#services">Inspenção</a></li>

                    <!-- documentos dropdow -->
                    <li class="dropdown"><a href="#"><span>Documentos</span> <i
                                class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a class="scrollto" href="documentos.html#matriculas">Legislação Matrículas</a></li>
                            <li class="dropdown"><a href="#"><span>Inspenção</span> <i
                                        class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a class="scrollto" href="documentos.html#inspensao">Inpenção periódica</a>
                                    </li>
                                    <li><a class="scrollto" href="documentos.html#inspensao">Inpenção obrigatória</a>
                                    </li>
                                    <li><a class="scrollto" href="documentos.html#inspensao">inspensao</a></li>
                                </ul>
                            </li>
                            <li><a class="scrollto" href="documentos.html#peliculas">Peliculas</a></li>

                        </ul>
                    </li>
                    <!-- fim documentos dropdow -->
                    <li><a class="nav-link active" href="/blog">Blog</a></li>



                    <li><a class="nav-link scrollto" href="/#contact">Contacto</a></li>
                    <li><a class="getstarteds bg-preto p-2 rounded scrollto text-amarelo text-center"
                            href="login.html">FAZER MARCAÇÃO</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>

        </div>
    </header><!-- FIm Cabecalho -->

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="hero-login py-5" id="hero">
            @yield('content')
        </main>

        <!-- ======= Footer - Rodape ======= -->
        <footer id="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 col-md-6">
                            <div class="footer-info">
                                <img class="img-fluid" src="assets/img/logo-cival-c.png" alt="Logo CVAL, SA">
                                <p>
                                    Av 23 de Maio <br>
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
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Início</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Sobre</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Películas</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="">Matriculas</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Inspensão</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Inspensão</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Blog</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Contactos</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Marcação</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Termos</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Políticas</a></li>
                            </ul>
                        </div>

                        <div class="col-lg-3 col-md-6 footer-links">
                            <h3 class="text-amarelo text-uppercase h5">Outros Serviços</h3>
                            <ul>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Matriculas </a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Películas</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Inspensão</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Inspensão Periódica</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Legislação</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Regulamentação</a></li>
                            </ul>
                        </div>

                        <!-- === RECENTES === -->
                        <div class="col-lg-4">
                            <div>
                                <h3 class="text-amarelo h5"> RECENTES</h3>
                            </div>
                            <div class="d-flex justify-content-between m-1 border-bottom w-100">
                                <div class=" m-1 w-25 ">
                                    <img class="img-fluid" src="assets/img/img10.jpg" alt="Imagem de Destaque">
                                </div>

                                <div class="w-75 m-1  ">
                                    <a href="singel-post.html" class="link-amarelo d-block  h5 text-truncate "> CIVAL,
                                        conheça a nossa empresa </a>
                                    <span class=" inline left  w-25 text-truncate text-muted">Autor</span>
                                    <span class="right inline text-muted text-truncate"><i class="bi-clock"></i> Abril
                                        16, 2023 </span>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between m-1 border-bottom w-100">
                                <div class=" m-1 w-25 ">
                                    <img class="img-fluid" src="assets/img/img11.jpg" alt="Imagem de Destaque">
                                </div>

                                <div class="w-75 m-1  ">
                                    <a href="singel-post.html" class="link-amarelo d-block  h5 text-truncate ">
                                        Atribuição de Matrículas </a>
                                    <span class=" inline left  w-25 text-truncate text-muted">Autor</span>
                                    <span class="right inline text-muted text-truncate"><i class="bi-clock"></i> Abril
                                        16, 2023 </span>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between m-1 border-bottom w-100">
                                <div class=" m-1 w-25 ">
                                    <img class="img-fluid" src="assets/img/img6.jpg" alt="Imagem de Destaque">
                                </div>

                                <div class="w-75 m-1  ">
                                    <a href="singel-post.html" class="link-amarelo d-block  h5 text-truncate ">
                                        Atribuição de Matrículas </a>
                                    <span class=" inline left  w-25 text-truncate text-muted">Autor</span>
                                    <span class="right inline text-muted text-truncate"><i class="bi-clock"></i> Abril
                                        16, 2023 </span>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between m-1 border-bottom w-100">
                                <div class=" m-1 w-25 ">
                                    <img class="img-fluid" src="assets/img/img2.jpg" alt="Imagem de Destaque">
                                </div>

                                <div class="w-75 m-1  ">
                                    <a href="singel-post.html" class="link-amarelo d-block  h5 text-truncate ">
                                        Atribuição de Matrículas </a>
                                    <span class=" inline left  w-25 text-truncate text-muted">Autor</span>
                                    <span class="right inline text-muted text-truncate"><i class="bi-clock"></i> Abril
                                        16, 2023 </span>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between m-1 border-bottom w-100">
                                <div class=" m-1 w-25 ">
                                    <img class="img-fluid" src="assets/img/img9.jpg" alt="Imagem de Destaque">
                                </div>

                                <div class="w-75 m-1  ">
                                    <a href="singel-post.html" class="link-amarelo d-block  h5 text-truncate ">
                                        Atribuição de Matrículas </a>
                                    <span class=" inline left  w-25 text-truncate text-muted">Autor</span>
                                    <span class="right inline text-muted text-truncate"><i class="bi-clock"></i> Abril
                                        16, 2023 </span>
                                </div>
                            </div>

                        </div>
                        <!-- === FIM RECENTES === -->

                    </div>
                </div>
            </div>

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
    </div>



    <!-- Vendor Ficheiros JS -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Principal Ficheiro JS -->
    <script src="assets/js/validacao-form-bootstrap.js"></script>
    <script src="assets/js/visualizador-senha.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>
