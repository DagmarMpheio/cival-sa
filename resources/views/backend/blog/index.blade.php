@extends('layouts.backend.main')

@section('title', 'Blog')

@section('style')
    <link rel="stylesheet" href="/backend/css/custom.css">
@endsection

@section('content')
<!--<?php
phpinfo();
?>-->
    <div class="container-fluid p-0">

        @include('backend.partials.message')

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Blog</h1>
            <a class="badge bg-dark text-white ms-2 p-2" href="{{ route('backend.blog.create') }}" title="Novo Post">
                <i class="align-middle" data-feather="plus-circle"></i> <span class="align-middle"> Novo Post</span>
            </a>

            <div class="pull-right" style="padding: 7px 0;">
                <?php $links = []; ?>
                @foreach ($statusList as $key => $value)
                    @if ($value)
                        <?php $selected = Request::get('status') == $key ? 'selected-status' : ''; ?>
                        <?php $links[] = "<a class=\"{$selected}\" href=\"?status={$key}\">" . ucwords($key) . "({$value})</a>"; ?>
                    @endif
                @endforeach
                {!! implode(' | ', $links) !!}
            </div>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Listar todos os posts</h5>
                    </div>
                    <div class="card-body">
                        @if (!$posts->count())
                            <div class="alert alert-danger">
                                <strong>Nenhum Post Encotrado!</strong>
                            </div>
                        @else
                            @if ($onlyTrashed)
                                @include('backend.blog.table-trash')
                            @else
                                @include('backend.blog.table')
                            @endif
                        @endif
                        <div class="row pt-4">
                            <div class="col-xxl-9 text-start">
                                {{ $posts->appends(Request::query())->links() }}
                            </div>
                            <div class="col-xxl-9 text-end">
                                <small class="text-lg">{{ $postCount }} {{ Str::Plural('Item', $postCount) }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('ul.pagination').addClass('no-margin pagination-sm');
    </script>
@endsection
