<div id="postComments-lista">
    <h3><i class="fa fa-comments"></i> {{$post->commentsNumber()}}</h3>
    <!-- postComments item -->
    @foreach($postComments as $comment)
            <div class="postComments-item postComments-lista-item card p-2" data-aos="fade-up"
                data-aos-duration="1500">
                <div class="area-nome d-flex justify-content-between">
                    <h5 class=" font-weight-bold">{{$comment->author_name}}</h5>
                    <span class="text-muted">{{$comment->date}}</span>
                </div>
                <!-- FIM AREA NOME -->
                <div class="area-foto-postComments d-flex justify-content-between ">
                    <div class="avatar-usuario-postComments ">
                        <img src="assets/img/time/avatar.jpeg" alt="Imagem ou Avatar Usuário"
                            class=" ">
                    </div>
                    <div class="postComments-texto bg-preto  rounded p-2 ">
                        <span class="text-amarelo" id="campo-postComments">
                            {{ $comment->postComments }}
                            @auth
                                @if (Auth::user()->name == $comment->author_name)
                                    <form action="/singel-post{{ $comment->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-danger delete-btn">Deletar</button>
                                    </form>
                                @endif
                            @endauth

                        </span>
                    </div>
                </div>
            </div>
    @endforeach
    <!-- fim postComments item -->

    <!-- postComments item -->

    <!-- fim postComments item -->

</div>