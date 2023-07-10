@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @if(!$posts->count())
                    <div class="alert alert-warning">
                        <p>Nenhum Encontrado</p>
                    </div>
                @else
                    @include('blog.alert')

                    @foreach($posts as $post)
                        <article class="post-item">
                            @if($post->image_url)
                                <div class="post-item-image">
                                    <a href="{{route('blog.show',$post->slug)}}">
                                        <img src="/img/{{$post->image}}" alt="{{$post->title}}" width="400" height="500">
                                    </a>
                                </div>
                            @endif
                            <div class="post-item-body">
                                <div class="padding-10">
                                    <h2><a href="{{route('blog.show',$post->slug)}}">{{$post->title}}</a>
                                    </h2>
                                    {!! $post->excerpt_html!!}{{--excerpt html--}}
                                </div>

                                <div class="post-meta padding-10 clearfix">
                                    <div class="pull-left">
                                        <ul class="post-meta-group">
                                            <li><i class="fa fa-user"></i><a
                                                        href="{{route('author',$post->author->slug)}}"> {{$post->author->name}}</a>
                                            </li>
                                            <li><i class="fa fa-clock-o"></i>
                                                <time> {{$post->date}}</time>
                                            </li>
                                            <li><i class="fa fa-folder"></i><a
                                                        href="{{route('category',$post->category->slug)}}"> {{$post->category->title}}</a>
                                            </li>
                                            <li><i class="fa fa-tags"></i>{!! $post->tags_html !!}</li>
                                            <li><i class="fa fa-comment"></i><a href="{{route('blog.show',$post->slug)}}#post-comments">{{$post->commentsNumber()}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{route('blog.show',$post->slug)}}">Continuar a ler &raquo;</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach

                @endif
                {{--<nav>
                    <ul class="pager">
                        <li class="previous disabled"><a href="#"><span aria-hidden="true">&larr;</span> Recente</a>
                        </li>
                        <li class="next"><a href="#">Antigo<span aria-hidden="true">&rarr;</span></a></li>
                    </ul>
                </nav>--}}
                {{$posts->appends(request()->only(['term','month','year']))->links()}}{{--paginacao com ou sem o termo de pesquisa--}}

            </div>
            @include('layouts.sidebar')
        </div>
    </div>
@endsection
