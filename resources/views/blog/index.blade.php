@extends('layouts.site.main')
@section('title', 'CIVAL - Blog')

@section('content')
    <!-- CONTEUDO AQUI -->
    <div class="inner-page">
        <!-- CONTEUDO AQUI -->
        <div class="col-12 mt-4 d-flex justify-content-center " data-aos="zoom-in" data-aos-duration="1000">
            <a href="#">
                <img class="img-fluid" src="assets/img/ads1.jpg" alt="">
            </a>

        </div>
        <!-- ==========Secção Noticias Principais======== -->
        <section class="container mt-4  py-0">
            <div class="section-title pb-2">
                <h2 class="">Notícias</h2>
                <p class="text-preto ">DESTAQUE</p>
            </div>

            <div class="row justify-content-center">

                <!-- card -->
                @if (!$posts->count())
                    <div class="alert alert-warning">
                        <p>Nenhum Encontrado</p>
                    </div>
                @else
                    @include('blog.alert')

                    @foreach ($posts as $post)
                        <div class="card col-md-5 col-lg-3 m-1 p-0 bg-preto" data-aos-duration="1000" data-aos="fade-up"
                            data-aos-delay="1000">
                            @if ($post->image_url)
                                <div class="post-imagem">
                                    <img class="img-top img-fluid" src="/img/upload/{{ $post->image }}"
                                        alt="{{ $post->title }}">
                                </div>
                            @endif
                            <div class="post-meta my-2 p-3">
                                <span class="bg-info p-1 rounded my-1">{{ $post->category->title }}</span>
                                <span class="mx-1 text-muted">•</span>
                                <span class="text-muted">{{ $post->date }}</span>
                                <a class="d-block  titulo-link h5 text-uppercase" href="{{route('blog.show', $post->slug)}}">
                                {{ $post->title }}
                            </a>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a class="col-6 btn btn-amarelo mb-2" href="{{ route('blog.show', $post->slug) }}">
                                    Saiba mais <i class="bi-arrow-right-circle-fill"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>
        <!-- ==== FIM Noticias Principais ====== -->

        <section class="container-fluid mt-0">
            <article class="row justify-content-center" id="grelha-categoria">

                <div class="col-10 mt-1 section-title">
                    <h2>Categoria </h2>
                    <p>CATEGORIAS</p>
                </div>

                <!-- ARTIGOS CATEGORIA -->
                <div class="col-11 col-lg-8">

                    <!-- ITEM ARTIGO -->
                    <div class="bg-preto row justify-content-center m-2" data-aos="fade-up" data-aos-duration="1500">


                        <div class="col-11 col-md-4">
                            <div class="grelha-imagem w-100">
                                <img class="img-fluid" src="assets/img/img12.jpg" alt="Imagem Artigo">
                            </div>
                        </div>
                        <!-- COTEUDO ARTIGO -->
                        <div class="col-11 col-md-8">
                            <div class="card-header">
                                <span class="badge badge-danger text-warning">Actualidade</span>
                                <span class="mx-1">&bullet;</span>
                                <span class="text-muted">Maio 01, 2023</span>
                                <a class="d-block mt-2 titulo-link h5 text-uppercase" href="singel-post.html">ANGOLA CONTA
                                    COM NOVO CENTRO DE INSPENÇÃO</a>
                            </div>

                            <div class="card-body text-light ">
                                <p class="text-truncates">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. At, cupiditate ipsum commodi
                                    aperiam animi eaque saepe sit consequuntur corrupti suscipit repellat nemo repellendus
                                    culpa neque numquam voluptates labore, magni veniam?
                                </p>
                                <a href="singel-post.html" class="btn btn-amarelo m-2">Ler tudo</a>
                            </div>

                        </div>
                        <!-- FIM CONTEUDO ARTIGO -->



                    </div>
                    <!-- FIM ITEM ARTIGO -->

                    <!-- ITEM ARTIGO -->
                    <div class="bg-preto row justify-content-center m-2" data-aos="fade-up" data-aos-duration="1500">


                        <div class="col-11 col-md-4">
                            <div class="grelha-imagem w-100">
                                <img class="img-fluid" src="assets/img/img7.jpg" alt="Imagem Artigo">
                            </div>
                        </div>
                        <!-- COTEUDO ARTIGO -->
                        <div class="col-11 col-md-8">
                            <div class="card-header">
                                <span class="badge badge-danger text-warning">Actualidade</span>
                                <span class="mx-1">&bullet;</span>
                                <span class="text-muted">Abril 30, 2023</span>
                                <a class="d-block mt-2 titulo-link h5 text-uppercase" href="singel-post.html">PROVÍNCIA DA
                                    HUÍLA GANHA NOVO CENTRO DE INSPENÇÃO</a>
                            </div>

                            <div class="card-body text-light ">
                                <p class="text-truncates">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. At, cupiditate ipsum commodi
                                    aperiam animi eaque saepe sit consequuntur corrupti suscipit repellat nemo repellendus
                                    culpa neque numquam voluptates labore, magni veniam?
                                </p>
                                <a href="singel-post.html" class="btn btn-amarelo m-2">Ler tudo</a>
                            </div>

                        </div>
                        <!-- FIM CONTEUDO ARTIGO -->



                    </div>
                    <!-- FIM ITEM ARTIGO -->


                    <!-- ITEM ARTIGO -->
                    <div class="bg-preto row justify-content-center m-2" data-aos="fade-up" data-aos-duration="1500">


                        <div class="col-11 col-md-4">
                            <div class="grelha-imagem w-100">
                                <img class="img-fluid" src="assets/img/img12.jpg" alt="Imagem Artigo">
                            </div>
                        </div>
                        <!-- COTEUDO ARTIGO -->
                        <div class="col-11 col-md-8">
                            <div class="card-header">
                                <span class="badge badge-danger text-warning">Actualidade</span>
                                <span class="mx-1">&bullet;</span>
                                <span class="text-muted">Maio 01, 2023</span>
                                <a class="d-block mt-2 titulo-link h5 text-uppercase" href="singel-post.html">ANGOLA CONTA
                                    COM NOVO CENTRO DE INSPENÇÃO</a>
                            </div>

                            <div class="card-body text-light ">
                                <p class="text-truncates">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. At, cupiditate ipsum commodi
                                    aperiam animi eaque saepe sit consequuntur corrupti suscipit repellat nemo repellendus
                                    culpa neque numquam voluptates labore, magni veniam?
                                </p>
                                <a href="singel-post.html" class="btn btn-amarelo m-2">Ler tudo</a>
                            </div>

                        </div>
                        <!-- FIM CONTEUDO ARTIGO -->



                    </div>
                    <!-- FIM ITEM ARTIGO -->


                </div>
                <!-- FIM ARTIGO CATEGORIA -->

                <!-- LATERAL -->
                <aside class="col-11 col-lg-3 m-1 bg-preto" data-aos="fade-up" data-aos-duration="1500">
                    <div class="col-11 my-4 section-title">
                        <h2 class="text-center text-muted"> Últimas</h2>
                        <p class="text-amarelo"><i class="bi-clock"></i> ÚLTIMAS</p>
                    </div>


                    @foreach ($posts as $post)
                        <div class="d-flex justify-content-between m-1  border-bottom border-dark w-100"
                            data-aos="fade-up" data-aos-duration="1500">
                            <div class=" m-1 w-25">
                                <img class="img-fluid" src="/assets/img/noticia/{{ $post->image }}"
                                    alt="Imagem Destaque">
                            </div>

                            <div class="w-75 m-1  ">
                                <a href="{{route('blog.show', $post->slug)}}"
                                class="titulo-link d-block  h5 text-truncate ">{{ $post->title }}</a>
                                <span class=" inline left  w-25 text-truncate text-muted">{{ $post->author->name }}</span>
                                <span class="right inline text-muted text-truncate"><i
                                        class="bi-clock"></i>{{ date('d/m/Y', strtotime($post->date)) }}</span>
                            </div>

                        </div>
                    @endforeach

                    <!-- FIM D-FLEX -->


                    <!-- ANUNCIOS -->
                    <div class="col-11 mt-4 mx-auto" data-aos="fade-up" data-aos-duration="1500">
                        <div class="col-11 section-title">
                            <h2 class="text-muted text-center"><i class="bi-header"></i> Anúncios</h2>
                            <p class="text-amarelo">ANÚNCIO</p>
                        </div>

                        <img src="assets/img/ads1.jpg" alt="Imagem Anúncio" class="img-fluid d-block m-auto">

                    </div>
                    <!-- FIM ANUNCIOS -->

                </aside>
                <!-- FIM LATERAL -->


            </article>
        </section>
        <!-- FIM CONTEUDO -->
    </div>
@endsection
