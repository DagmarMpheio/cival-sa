@extends('layouts.site.main')
@section('title', 'Bem Vindo a CIVAL - Centro de Inspecção Automóvel do Lubango')
@section('style')
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css' rel='stylesheet' />
@endsection

@section('scripts2')
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js'></script>
@endsection

@section('content')
    <!-- ======= Secção 1 ======= -->
    <section id="hero" class="hero-index">
        <div class="hero-container" data-aos="fade-up" data-aos-delay="150">
            <h1>Lançamento</h1>
            <h2>Somos uma equipa taletosa disposta em solucioar seus problemas</h2>
            <div class="d-flex">
                <a href="/criar-conta" class="btn-get-started scrollto">FAZER MARCAÇÃO</a>
                <a href="https://youtu.be/6f-w80E7P1o" class="glightbox btn-watch-video"><i
                        class="bi bi-play-circle"></i><span>Assista o Vídeo</span></a>
            </div>
        </div>
    </section>
    <!-- Fim Secção 1 -->

    <!-- ======= Secção serviços ======= -->
    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">

            <!-- <div class="section-title">
                  <h2>Serviços</h2>
                  <p>Confira nossos serviços</p>
                </div> -->

            <div class="row row-servicos" data-aos="fade-up" data-aos-delay="200">
                <div class="col-md-6">
                    <div class="icon-box">
                        <i class="bi bi-laptop"></i>
                        <h4><a href="#">MATRÍCULAS</a></h4>
                        <p>Agendamento de matrículas, do número e da chapa de matrícula de veículos e o registro Nacional de
                            Matrículas aos veículos em circulação no território nacional </p>
                    </div>
                </div>
                <div class="col-md-6 mt-4 mt-md-0">
                    <div class="icon-box">
                        <i class="bi bi-bar-chart"></i>
                        <h4><a href="#">PELÍCULAS</a></h4>
                        <p>Atribuição de películas para todos tipo de veículo automóveis em circulação no território
                            nacional</p>
                    </div>
                </div>
                <div class="col-md-6 mt-4 mt-md-0">
                    <div class="icon-box">
                        <i class="bi bi-brightness-high"></i>
                        <h4><a href="#">INSPEÇÃO</a></h4>
                        <p> Agendamento de inspeção periódica para todo topo de veículos automóveis em circulação no
                            território nacional</p>
                    </div>
                </div>


                <div class="col-md-6 mt-4 mt-md-0">
                    <div class="icon-box">
                        <i class="bi bi-clock"></i>
                        <h4><a href="#">REGULAMENTAÇÃO</a></h4>
                        <p> Regulamentação sobre atribuição de de matrículas a automóveis e seus reboques, motocíclos,
                            ciclomotores, quadriciclos; máquinas idustriais, máquinas industriais rebocáveis; tratores
                            agrícolas e seus reboqueis e respectivas chapas </p>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- Fim secção serviços -->

    <!-- ==========Secção Noticias Principais======== -->
    <section id="principais" class="container">
        <div class="row section-title">
            <h2 class="">Notícias</h2>
            <p class="text-preto ">DESTAQUE</p>
        </div>

        <div class="row justify-content-center">

            @foreach ($posts as $post)
                <!-- card -->
                <div class="card col-md-5 col-lg-3 m-1 p-0 bg-preto" data-aos-duration="1000" data-aos="fade-up"
                    data-aos-delay="1000">
                    @if ($post->image_url)
                        <div class="item-imagem">
                            <img class="img-top img-fluid" alt="{{ $post->title }}" src="/img/upload/{{ $post->image }}">
                        </div>
                    @endif
                    <div class="post-meta my-2 p-3">
                        <span class="bg-info p-1 rounded my-1"> {{ $post->category->title }} </span>
                        <span class="mx-1 text-muted">•</span>
                        <span class="text-muted">{{ date('d M, Y', strtotime($post->published_at)) }}</span>
                        <a class="d-block  titulo-link h5 text-uppercase" href="{{ route('blog.show', $post->slug) }}">
                            {{ $post->title }}
                        </a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a class="col-6 btn btn-amarelo mb-2" href="{{ route('blog.show', $post->slug) }}">
                            Saiba mais <i class="bi-arrow-right-circle-fill"></i>
                        </a>
                    </div>

                </div>
                <!-- fim card -->
            @endforeach

            <div class="col-5 mx-auto text-center mt-2" data-aos="fade-up" data-aos-duration="2000">
                <a href="/blog" class="btn btn-warning">Ver mais</a>
            </div>
        </div>
    </section>
    <!-- ==== FIM Noticias Principais ====== -->

    <!-- ======= Secção Sobre ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
            <!--  Marcacoes Feitas -->
            <div class="row justify-content-end">
                <div class="col-lg-11">
                    <div class="row justify-content-center">

                        <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                            <div class="count-box">
                                <i class="bi bi-emoji-smile"></i>
                                <span data-purecounter-start="0" data-purecounter-end="125" data-purecounter-duration="1"
                                    class="purecounter"></span>
                                <p>Clientes Felizes</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                            <div class="count-box">
                                <i class="bi bi-journal-richtext"></i>
                                <span data-purecounter-start="0" data-purecounter-end="22" data-purecounter-duration="1"
                                    class="purecounter"></span>
                                <p>Marcações Realizadas</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                            <div class="count-box">
                                <i class="bi bi-clock"></i>
                                <span data-purecounter-start="0" data-purecounter-end="5" data-purecounter-duration="1"
                                    class="purecounter"></span>
                                <p>Anos de experiência</p>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
            <!--  Fim Marcações Feitas -->
            <div class="row">
                <div class=" section-title">
                    <h2>Sobre</h2>
                    <p>Sobre nós</p>
                </div>

                <div class="col-lg-6 video-box align-self-baseline" data-aos="zoom-in" data-aos-delay="100">
                    <img src="/assets/img/img1.jpg" class="img-fluid" alt="">
                    <a href="https://youtu.be/6f-w80E7P1o" class="glightbox play-btn mb-4"></a>
                </div>

                <div class="col-lg-6 pt-3 pt-lg-0 content">
                    <h3>Lorem ipsum dolor sit ame</h3>
                    <p class="fst-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore
                        magna aliqua.
                    </p>
                    <ul>
                        <li><i class="bx bx-check-double"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </li>
                        <li><i class="bx bx-check-double"></i> Duis aute irure dolor in reprehenderit in voluptate velit.
                        </li>
                        <li><i class="bx bx-check-double"></i> Voluptate repellendus pariatur reprehenderit corporis sint.
                        </li>
                        <li><i class="bx bx-check-double"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu
                            fugiat nulla pariatur.</li>
                    </ul>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorum aliquid modi laboriosam
                        asperiores, facilis ipsum quasi est exercitationem illum nostrum, iure recusandae unde mollitia, ex
                        ullam alias molestias? Tempora, ex?
                    </p>
                </div>

            </div>

        </div>
        <!-- ============ ROW CARD===== -->
        <div id="missao-valores" class="row justify-content-center px-3 py-2">
            <div class="card col-sm-5 col-md-3  m-1 pb-3" data-aos="fade-up" data-aos-duration="1000">
                <div class="text-center text-amarelo display-3">
                    <i class="bi-bookmark-star-fill"></i>
                </div>
                <h2 class="text-preto text-center mt-1"> MISSÃO </h2>
                <div class="text-preto">
                    <p class="text-lead">
                        Corrensponder as exigências do mercado, com as melhores
                        soluções, produtos, serviços e preços, garantindo o progresso sustentado
                        e estável negócios, parcerias e sobretudo a satisfação plena dos nossos
                        clientes e colaboradores
                    </p>
                </div>

                <!-- <div class="col-11 text-center">
                    <a class="btn btn-amarelo" href="#">Ver mais  <i class="bi-arrow-right"></i></a>
                  </div> -->

            </div>

            <div class="card col-sm-5 col-md-3 m-1 pb-3" data-aos="fade-up" data-aos-duration="1000">
                <div class="text-center text-amarelo display-3">
                    <i class="bi-bookmark-heart-fill"></i>
                </div>
                <h2 class="text-preto text-center mt-1"> VISÃO </h2>
                <div class="text-preto">
                    <p class="text-lead">
                        ser uma marca líder no ramo da inspeçção automóvel e inspirar
                        credibilidade para os nossos utentes
                    </p>
                </div>

                <!-- <div class="col-11 text-center">
                    <a class="btn btn-amarelo" href="#">Ver mais  <i class="bi-arrow-right"></i></a>
                  </div> -->

            </div>

            <div class="card col-sm-5 col-md-3  m-1 pb-3" data-aos="fade-up" data-aos-duration="1000">
                <div class="text-center text-amarelo display-3">
                    <i class="bi-bookmark-check-fill"></i>
                </div>
                <h2 class="text-preto text-center mt-1"> VALORES </h2>
                <div class="text-preto">
                    <p class="text-lead">
                        Integridade e Honestidade; Abertura e Respeito; Vontade de
                        Abraçar Grandes Desafios; Atitude Crítica; Responsabilidade.
                    </p>
                </div>

                <!-- <div class="col-11 text-center">
                    <a class="btn btn-amarelo" href="#">Ver mais <i class="bi-arrow-right"></i></a>
                  </div> -->

            </div>


        </div>
        <!-- ====== FIM ROW CARD ===== -->
    </section><!-- Fim secção sobre -->

    <!-- PROVINCIA GALERIA -->
    <section id="portfolio" class="portfolio bg-preto">
        <div class="section-title px-5">
            <h2 class="text-amarelo ">Galeria</h2>
            <p class="text-amarelo">Veja a nossa Galeria </p>
        </div>

        <div class="container" data-aos="fade-up">
            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">Tudo</li>
                        @foreach ($albums as $album)
                            <li data-filter=".filter-{{Str::slug($album->nome_album)}}">{{$album->nome_album}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                @foreach($imgs as $img)
                <div class="col-lg-4 col-md-6 portfolio-item filter-{{Str::slug($img->album->nome_album)}}">
                    <img src="/multimedia/uploadImage/{{$img->ficheiro}}" class="img-fluid" alt="{{$img->nome_ficheiro}}" style="width: 400px; height: 250px;">
                    <div class="portfolio-info">
                        <h4>{{$img->nome_ficheiro}}</h4>
                        <p class="text-truncate">{{$img->descricao}}</p>
                        <a href="/multimedia/uploadImage/{{$img->ficheiro}}" data-gallery="portfolioGallery"
                            class="portfolio-lightbox preview-link" title="{{$img->nome_ficheiro}}">
                            <i class="bx bx-plus"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- FIM NOSSA PROVINCIA -->

    <!-- ======= Secção clietes e parceiros ======= -->
    <section id="clients" class="clients">
        <div class=" section-title">
            <h2>Parceiros</h2>
            <p>NOSSOS PARCEIROS</p>
        </div>
        <div class="container" data-aos="zoom-in">



            <div class="row">

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="/assets/img/clients/client-1.png" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="/assets/img/clients/client-2.png" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="/assets/img/clients/client-3.png" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="/assets/img/clients/client-4.png" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="/assets/img/clients/client-5.png" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="/assets/img/clients/client-6.png" class="img-fluid" alt="">
                </div>

            </div>

        </div>
    </section><!-- Fim secção  -->





    <!-- ======= Secção testemuhas ======= -->
    <!-- Fim secção testemunhas-->

    <!-- ======= Portfolio  ======= -->
    <!-- Fim Portfolio -->

    <!-- ======= Equipa ======= -->
    <!-- Fim Equipa -->

    <!-- ======= Secção de Contactos ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class=" section-title">
                <h2>Contactos</h2>
                <p>Fale Conosco</p>
            </div>

            <div class="row">

                <div class="col-lg-6">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box">
                                <i class="bx bx-map"></i>
                                <h3>Endereço</h3>
                                <p>Lubango, Av 4 de Fevereiro - Laureanos - Rotunda da TPA </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-envelope"></i>
                                <h3>Email</h3>
                                <p>cival.ao@gmail.com</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-phone-call"></i>
                                <h3>Telefone</h3>
                                <p>+244 926 951 917<br>+244 930 060 036</p>
                            </div>
                        </div>
                    </div>

                </div>

                <!--Mensagem-->
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <form action="/mensagem" method="post" role="form" class="php-email-form php-email-form-js">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Seu Nome" required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Seu Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject"
                                placeholder="Assunto" required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="Mensagem" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">A carregar</div>
                            @if (session('msgerror'))
                                <div id="messageForm" class="alert alert-danger">
                                    {{ session('msgerror') }}
                                </div>
                            @endif
                            <div class="error-message"></div>

                            @if (session('msg'))
                                <div id="messageForm" class="alert alert-success sent-messages">
                                    {{ session('msg') }}
                                </div>
                            @endif
                            <div class="sent-message">Sua mensagem foi enviada com sucesso. Agradecemos!</div>
                        </div>
                        <div class="text-center "><button class="text-dark" type="submit">Enviar Mensagem</button></div>
                    </form>
                </div>
                <!--Fim de Mensagem-->

            </div>

            <div class=" section-title mt-3">
                <h2>Mapa</h2>
                <p>Geo Localização</p>
            </div>

            <div class=" py-5">
                <div id='map' style='width: 100%; height: 300px;' class="py-5"></div>
                <script>
                    // TO MAKE THE MAP APPEAR YOU MUST
                    // ADD YOUR ACCESS TOKEN FROM
                    // https://account.mapbox.com
                    mapboxgl.accessToken =
                        'pk.eyJ1IjoiZGFnbWFybXBoZWlvIiwiYSI6ImNsaHN1ZGgwaTBjZTkzZ256aTJ3dDMxOXMifQ.qKcg3fNuluzmSF7FRrrhWw';
                    const map = new mapboxgl.Map({
                        container: 'map', // container ID
                        style: 'mapbox://styles/mapbox/streets-v12', // style URL
                        center: [13.5050, -14.9288], // starting position [lng, lat]
                        zoom: 15, // starting zoom
                    });
                    var marker = new mapboxgl.Marker().setLngLat([13.5050, -14.9288]).addTo(map);
                </script>
            </div>

        </div>
    </section><!-- Fim secção contacto -->

    <!-- === FAQ === -->
    <section class="faq section-bg px-3" id="faq">
        <div class="container aos-init aos-animate" data-aos="fade-up">

            <div class="section-title">
                <h2>F.A.Q</h2>
                <p class="text-preto text-uppercase ">Perguntas Frequentes </p>
                <h3>Veja as principais perguntas e respostas dos utentes</h3>
            </div>

            <div class="row justify-content-center">
                <div class="col-xl-10">
                    @if ($faqs)
                        <ul class="faq-list">
                            @foreach ($faqs as $faq)
                                <li>
                                    <div class="collapsed question" href="#faq{{ $loop->index }}"
                                        data-bs-toggle="collapse"> {{ $faq->questao }} <i
                                            class="bi bi-chevron-down icon-show"></i><i
                                            class="bi bi-chevron-up icon-close"></i></div>
                                    <div class="collapse" id="faq{{ $loop->index }}" data-bs-parent=".faq-list">
                                        <p>
                                            {{ $faq->resposta }}
                                        </p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="col-5">
                            <a href="/faqs" class="btn btn-warning">Ver mais</a>
                        </div>
                    @else
                        <p class="alert alert-info">
                            Nenhuma pergunta encontrada
                        </p>
                    @endif
                </div>
            </div>

        </div>
    </section>
    <!-- === FIM FAQ === -->



@endsection
@section('scripts')
    <script src="/assets/vendor/php-email-form/validates.js"></script>
@endsection
