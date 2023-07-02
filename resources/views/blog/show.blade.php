<?php
/**
 * Created by PhpStorm.
 * User: Dagmar Mpheio
 * Date: 10/19/2020
 * Time: 3:56 PM
 */
?>
@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <article class="post-item post-detail">
                            <div class="post-item-image">
                                @if($post->image_url)
                                    <img src="{{$post->image_url}}" alt="{{$post->title}}" width="400" height="500">
                                @endif
                            </div>

                            <div class="post-item-body">
                                <div class="padding-10">
                                    <h1>{{$post->title}}</h1>

                                    <div class="post-meta no-border">
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
                                            <li><i class="fa fa-comments"></i><a
                                                        href="#post-comments">{{$post->commentsNumber()}}</a></li>
                                        </ul>
                                    </div>

                                    {!! $post->body_html !!}{{--para formatar em html--}}
                                </div>
                            </div>
                        </article>

                        <article class="post-author padding-10">
                            <div class="media">
                                <div class="media-left">
                                    <?php $author = $post->author;?>
                                    <a href="{{route("author",$author->slug)}}">
                                        <img alt="{{$author->name}}"
                                             src="{{asset("img/author-default.png")}}{{--{{$author->gravatar()}}--}}"
                                             class="media-object" width="50" height="50">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"><a
                                                href="{{route('author',$author->slug)}}">{{$author->name}}</a>
                                    </h4>
                                    <div class="post-author-count">
                                        <a href="{{route('author',$author->slug)}}">
                                            <i class="fa fa-clone"></i>
                                            <?php $postCount = $author->posts()->published()->count()?>
                                            {{$postCount}} {{Str::plural('post',$postCount)}}
                                        </a>
                                    </div>
                                    {!!$author->bio_html!!} {{--biografia--}}
                                </div>
                            </div>
                        </article>

                        {{--comentarios aqui--}}
                        @include('blog.comments');

                    </div>

                    @include('layouts.sidebar')
                </div>
            </div>


        </div>
    </div>
@endsection
