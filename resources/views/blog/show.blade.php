<?php
/**
 * Created by PhpStorm.
 * User: Dagmar Mpheio
 * Date: 10/19/2020
 * Time: 3:56 PM
 */
?>
@extends('layouts.site.main')
@section('title', 'CIVAL - Single Post')

@section('content')
    <!-- CONTEUDO AQUI -->
    <section class="container" data-aos="fade-in" data-aos-duration="1500">
        <div class="row justify-content-center mt-1">
            <div class="col-11 col-md-10 col-lg-7 card p-2 p-md-2 m-1">
                <h1 class="titulo-principal text-center h2 mb-2">{{ $post->title }}</h1>
                <div class="info-post m-auto">
                    <span class="h6  text-muted m-2"><i class="bi-person-fill"></i> Por: {{ $post->author->name }}</span>
                    <span class="h6 text-end text-muted m-2"><i class="bi-calendar-fill"></i>
                        {{ date('d/m/Y', strtotime($post->date)) }}</span>
                </div>
                @if ($post->image_url)
                    <img alt="{{ $post->title }}" src="/img/upload/{{ $post->image }}" class="img-fluid mt-2"
                        data-aos="fade-up" data-aos-duration="1500">
                @endif



                <div class="d-flex justify-content-center card-header  m-1 rounded" data-aos="fade-up"
                    data-aos-duration="1500">
                    <span class="h6 text-inline text-muted m-2"> <i class="bi-eye-fill"></i> 222</span>
                    <span class="h6 text-inline text-muted m-2" id="num-reacao"><i class="bi-hand-thumbs-up-fill"></i> <span
                            class="num-interacao"> 340</span> </span>
                    <span class="h6 text-inline text-muted m-2" id="num-postComments"><i class="bi-chat-dots-fill"></i>
                        <span class="num-interacao"> 2</span> </span>

                    <span class="h6 text-inline text-muted m-2"><i class="fas fa-share"></i> <span class="num-interacao">
                            17</span> </span>



                </div>
                <!-- TEXTO POST -->
                <div class="card-body text-justify" data-aos="fade-up" data-aos-duration="1500">
                    <p data-aos="fade-up" data-aos-duration="1500">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, atque delectus neque dolores
                        culpa, repudiandae omnis ipsam quisquam vel ea, iure expedita illo officia ullam libero similique
                        explicabo aperiam. Necessitatibus!
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos soluta perferendis, distinctio
                        excepturi laudantium inventore repudiandae quia fugiat quas provident qui. Iste minus at sunt
                        tempora possimus blanditiis eos quam.
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda incidunt, sequi sunt quis magni
                        et ex dolores pariatur blanditiis quae ut illo earum velit aliquid vero quo ratione aperiam? Itaque.
                    </p>
                    <h3 data-aos="fade-up" data-aos-duration="1500">Um subtitulo dessa seção</h3>

                    <p data-aos="fade-up" data-aos-duration="1500">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis, suscipit illo eligendi nemo,
                        assumenda sint in sunt quibusdam tenetur officia veritatis dolores non ducimus dignissimos aliquam
                        fuga corrupti? Quaerat, accusantium?
                    </p>
                </div>

                <!-- FIM TEXTO POST -->


                <div class="card-footer bg-azul-site rounded" data-aos="fade-up" data-aos-duration="1500">

                    <!-- PESSOAS QUE REAGIRAM -->
                    <div class="d-block mt-2 mr-auto ml-auto w-100 text-warning ">
                        <a class="  d-block text-truncate  col-11 c-pointer  text-center"> <img class="img-reacao "
                                src="assets/img/reacoes/gosto.png" alt="adoro">
                            <img class="img-reacao " src="assets/img/reacoes/adoro.png" alt="adoro"> <span
                                class="m-1 ">Tu e <span class="num-interacao"> 340 </span> outras pessoas reagiram a
                                isto</span> </a>
                    </div>
                    <!-- FIM PESSOAS QUE R -->
                    <div class="reagir d-flex justify-content-center  mt-1 ">



                        <!-- BOTOES DE ITERAÇÃO -->
                        <div class="botoes-de-interacao d-flex justify-content-center ">
                            <a class="h5 text-inline d-inline-block m-2 btn btn-amarelo  arrendonado  btn-reacao-js"
                                id="botao-gostar"><i class="bi-hand-thumbs-up-fill"></i> <span class="num-interacao">
                                    340</span> </a>

                            <button type="button" class="h5 text-inline m-2 btn btn-amarelo arrendonado " id="botao-reagir"
                                data-toggle="modal" data-target="#modal-reagirPost"><i class="bi-emoji-smile-fill"></i>
                                REAGIIR</button>

                            <a class="h5 text-inline m-2 btn btn-amarelo arrendonado " href="#comentarios-post"><i
                                    class="bi-chat-dots-fill"></i> <span class="num-interacao"> {{$post->commentsNumber()}}</span> </a>

                            <a class="h5 text-inline m-2 btn btn-amarelo arrendonado "
                                href="https://m.facebook.com/sharer?u=https://facebook.com/AthenasPub.ao" target="_blank"
                                id="botao-partilhar"><i class="fas fa-share"></i> <span class="num-interacao"> 17</span></a>

                        </div>
                        <!-- FIM BOTOES DE INTERAÇÃO -->



                    </div>
                    <!-- FIM D-FLEX -->

                </div>
                <!-- FIM CARD FOOTER -->



                <!-- COMENTÁRIOS SEÇÃO-->

                <div class="w-100 mt-5 border-top " id="comentarios-post" data-aos="fade-up" data-aos-duration="1500">
                    <h2 class="titulo-principal my-3">COMENTÁRIOS</h2>

                    <!-- LISTA COMENTARIO -->

                    @include('blog.comments');
                    <!-- FIM LISTA COMENTARIOS -->

                    <!-- FORMULARIO COMENTAR -->
                    @auth
                        <form action="{{ route('blog.comments', $post->slug) }}" method="POST" class="form-group mt-4"
                            novalidate data-aos="fade-up" data-aos-duration="1500">
                            @csrf
                            <div class="col-11">
                                <span class="h2">Deixe o seu comentário</span>
                            </div>

                            <textarea class="form-control col-11 d-inline-block m-1 " id="campo-postComments" name="postComments" cols="30"
                                rows="5" placeholder="Diga-nos oque você pensa sobre isto"></textarea>
                            <button type="submit" class=" btn btn-amarelo">COMENTAR</button>
                        </form>
                    @else
                        <div class="col-11">
                            <span class="h2">Faça login para poder interagir <a class=" btn btn-amarelo"
                                    href="/login">FAZER LOGIN</a></span>
                        </div>
                    @endauth
                    <!-- FIM FORMULARIO COMENTAR -->

                </div>

                <!-- FIM COMENTÁRIOS SEC -->

            </div>
            <!-- FIM COL -->

            <!-- SEMELHANTES SUGESTAO -->

            <div class="col-11 card col-md-10 col-lg-4 py-2 m-1" data-aos="fade-up" data-aos-duration="1500">
                <div class="section-title">
                    <p>SUGESTAO</p>
                </div>

                <div class="d-flex justify-content-between m-1 border-bottom border-danger w-100" data-aos="fade-up"
                    data-aos-duration="1500">
                    <div class=" m-1 w-25 ">
                        <img class="img-fluid" src="/assets/img/post/" alt="Imagem de Destaque">
                    </div>
                    <div class="w-75 m-1  ">
                        <a href="/blog/" class=" titulo-link d-block  h5 text-truncate "></a>
                        <span class=" inline left  w-25 text-truncate text-muted"></span>
                        <span class="right inline text-muted text-truncate"><i class="bi-clock"></i>
                            {{ date('d/m/Y', strtotime($post->date)) }}</span>
                    </div>
                </div>

                <!-- FIM D-FLEX -->

                <!-- FIM D-FLEX -->


                <!-- SEC DE ANÚNCIOS -->
                <div class="d-flex justify-content-center mt-3" data-aos="fade-up" data-aos-duration="1500">
                    <div class=" d-block m-auto  ">
                        <a href="#">
                            <img class=" w-100" src="assets/img/ads1.jpg" alt="Imagem anúncio">
                        </a>
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-3" data-aos="fade-up" data-aos-duration="1500">
                    <div class=" d-block m-auto  ">
                        <a href="#">
                            <img class=" w-100" src="assets/img/ads1.jpg" alt="Imagem anúncio">
                        </a>
                    </div>
                </div>



                <!-- FIMM SEC DE ANÚNCIOS -->

            </div>
            <!-- FIM SUGESTAO -->
        </div>

    </section>
    <!-- FIM CONTEUDO -->
@endsection

@section('after-footer')
    <!-- MODAIS REAGIR E PARTILHAR -->
    <div class="modal fade" id="modal-reagirPost" tabindex="-1" role="dialog" aria-labelledby="ModalReagir"
        aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content bg-preto px-2 py-3 ">
                <div class="text-end">
                    <button type="button" class="close text-light m-2" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <h4 class="text-amarelo text-center titulo-principal mb-3">REAGIR</h4>

                <div class="d-flex justify-content-center">
                    <a class="c-pointer  btn-reacao btn-reacao-js text-light col-2" data-dismiss="modal"> <img
                            class="" src="assets/img/reacoes/adoro.png" alt="adoro"> </a>

                    <a class="c-pointer  btn-reacao btn-reacao-js text-light  col-2" data-dismiss="modal"> <img
                            class="" src="assets/img/reacoes/gosto.png" alt="gosto"> </a>

                    <a class="c-pointer  btn-reacao btn-reacao-js text-light col-2" data-dismiss="modal"> <img
                            class="" src="assets/img/reacoes/ira.png" alt="Ira"> </a>

                    <a class="c-pointer  btn-reacao btn-reacao-js text-light col-2" data-dismiss="modal"> <img
                            class="" src="assets/img/reacoes/tristeza.png" alt="trizteza"> </a>

                    <a class="c-pointer  btn-reacao btn-reacao-js text-light col-2" data-dismiss="modal"> <img
                            class="" src="assets/img/reacoes/uao.png" alt="uao"> </a>
                </div>


            </div>
        </div>
    </div>
    <!--  FIM MODAIS -->
@endsection


@section('scripts')
    <script src="assets/js/add-simulador-comentario.js"></script>
    <script type="text/javascript">
        function mensagem() {
            document.querySelector('div.diveM').className = "div-alertM"
        }

        function naoM() {
            document.querySelector('div.div-alertM').className = "diveM"
        }
    </script>
@endsection
