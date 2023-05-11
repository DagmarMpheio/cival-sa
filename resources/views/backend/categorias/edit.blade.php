@extends('layouts.backend.main')

@section('title', 'Editar Categoria')

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Editar Categoria</h1>

         {!! Form::model($categoria, [
            'method' => 'PUT',
            'route' => ['backend.categorias.update', $categoria->id],
            'id' => 'categoria-form',
        ]) !!}
        
            @csrf
            <div class="row">
                <div class="col-12 col-md-12 col-xxl-9 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <label class="card-title mb-0" for="title">Título</label>
                            <font color="red">*</font>
                        </div>
                        <div class="card-body">
                            <input type="text" id="title" class="form-control @error('title') is-invalid @enderror"
                                placeholder="Título" value="{{ $categoria->title }}" name="title" autofocus required>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="card-header">
                            <label class="card-title mb-0" for="title">Slug</label>
                            <font color="red">*</font>
                        </div>
                        <div class="card-body">
                            <input type="text" id="slug" class="form-control @error('slug') is-invalid @enderror"
                                placeholder="Slug" value="{{ $categoria->slug }}" name="slug" autofocus required>

                            @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                </div>

            </div>
            <button class="btn btn-primary" type="submit"><i class="align-middle" data-feather="save"></i>
                <span class="align-middle">Guardar</span></button>
            <a class="btn btn-danger" href="{{ route('backend.categorias.index') }}"><i class="align-middle"
                    data-feather="slash"></i> <span class="align-middle">Cancelar</span></a>
        {!! Form::close() !!}

    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        /*criar o slug automaticamente*/
        $('#title').on('blur', function() {
            var theTitle = this.value.toLowerCase().trim(),
                slugInput = $('#slug'),
                theSlug = theTitle.replace(/&/g, '-and-')
                .replace(/[^a-z0-9-]+/g, '-')
                .replace(/\-\-+/g, '-')
                .replace(/^-+|-+$/g, '');

            slugInput.val(theSlug);
        });
    </script>
@endsection
