@extends('layouts.backend.main')

@section('title', 'Novo Comentário')

@section('style')
    <link rel="stylesheet" href="/backend/plugins/tag-editor/jquery.tag-editor.css">
    <link rel="stylesheet" href="/backend/css/tempus-dominus.min.css">
    <link rel="stylesheet" href="/backend/css/custom.css">
@endsection

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Novo Comentário</h1>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0"><i class="align-middle" data-feather="message-circle"></i>
                            {{ $post->commentsNumber() }}</h5>
                    </div>
                    <div class="card-body">
                        {{-- comment body --}}
                        <div class="comment-body padding-10">
                            <ul class="comments-list">
                                @foreach ($postComments as $comment)
                                    <li class="comment-item">
                                        <div class="comment-heading clearfix">
                                            <div class="comment-author-meta">
                                                <h4 class="text-yellow1">{{ $comment->author_name }}
                                                    <small class="">{{ $comment->date }}</small>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="comment-content">
                                            {!! $comment->body_html !!}
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

                            <nav>
                                {{ $postComments->links() }}
                            </nav>
                        </div>

                        {{-- comment form --}}
                        <div class="comment-footer padding-10 pt-4">
                            <h3>Deixe um comentário</h3>
                            @if (session('message'))
                                <div class="alert alert-info">
                                    {{ session('message') }}
                                </div>
                            @endif

                            {!! Form::open(['route' => ['backend.blog.comment', $post->id]]) !!}
                            <div class="form-group required {{ $errors->has('author_name') ? 'has-error' : '' }}">
                                <label for="name">Nome</label>
                                {!! Form::text('author_name', null, ['class' => 'form-control']) !!}

                                @if ($errors->has('author_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('author_name') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group required {{ $errors->has('author_email') ? 'has-error' : '' }}">
                                <label for="email">Email</label>
                                {!! Form::email('author_email', null, ['class' => 'form-control']) !!}

                                @if ($errors->has('author_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('author_email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="website">Website</label>
                                {!! Form::text('author_url', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group required {{ $errors->has('body') ? 'has-error' : '' }}">
                                <label for="comment">Comentário</label>
                                {!! Form::textarea('body', null, ['rows' => 6, 'class' => 'form-control']) !!}

                                @if ($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="clearfix">
                                <div class="pull-left pt-2">
                                    <button type="submit" class="btn btn-lg btn-primary-yellow"><i class="align-middle" data-feather="message-circle"></i>
                                        Comentar
                                    </button>
                                </div>
                                <div class="pull-right">
                                    <p class="text-muted">
                                        <span class="required">*</span>
                                        <em>Indica campos obrigatórios</em>
                                    </p>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
