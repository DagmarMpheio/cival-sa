@extends('layouts.backend.main')

@section('title', 'Multimédia')

@section('style')
    <link rel="stylesheet" href="/backend/css/custom.css">
@endsection

@section('content')
    <div class="container-fluid p-0">

        @include('backend.partials.message')

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Multimédia</h1>
            <a class="badge bg-dark text-white ms-2 p-2" href="{{ route('backend.multimedias.create') }}" title="Fazer Upload">
                <i class="align-middle" data-feather="plus-circle"></i> <span class="align-middle"> Fazer Upoload</span>
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
        {{-- style="color: #f7941d !important;" --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Listar todos os ficheiros</h5>
                    </div>
                    <div class="card-body">
                        @if (!$multimedias->count())
                            <div class="alert alert-danger">
                                <strong>Nenhum Ficheiro Encotrado!</strong>
                            </div>
                        @elseif(Request::get('status') == 'imagens')
                            <div class="row">
                                @include('backend.multimedia.card-img')
                            </div>
                        @elseif(Request::get('status') == 'videos')
                            <div class="row">
                                @include('backend.multimedia.card-video')
                            </div>
                        @elseif(Request::get('status') == 'audios')
                            <div class="row">
                                @include('backend.multimedia.card-audio')
                            </div>
                        @elseif(Request::get('status') == 'documentos')
                            <div class="row">
                                @include('backend.multimedia.table-doc')
                            </div>
                        @else
                            @include('backend.multimedia.table')
                        @endif
                        <div class="row pt-4">
                            <div class="col-xxl-9 text-start">
                                {{ $multimedias->appends(Request::query())->links() }}
                            </div>
                            <div class="col-xxl-9 text-end">
                                <small class="text-lg">{{ $multimediaCount }}
                                    {{ Str::Plural('Item', $multimediaCount) }}</small>
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
