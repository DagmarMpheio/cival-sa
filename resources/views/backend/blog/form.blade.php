<?php
/**
 * Created by PhpStorm.
 * User: Dagmar Mpheio
 * Date: 10/27/2020
 * Time: 2:57 PM
 */
?>

<div class="row">
    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                {!! Form::label('title', 'Título', ['class' => 'card-title mb-0', 'for' => 'title']) !!}
                <font color="red">*</font>
            </div>
            <div class="card-body {{ $errors->has('title') ? ' has-error' : '' }} has-feedback">
                {!! Form::text('title', null, [
                    'class' => 'form-control',
                    'placeholder' => 'Título',
                    'autofocus',
                    'required',
                ]) !!}

                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>

            <div class="card-header">
                {!! Form::label('slug', 'Slug', ['class' => 'card-title mb-0', 'for' => 'slug']) !!}
                <font color="red">*</font>
            </div>
            <div class="card-body {{ $errors->has('slug') ? ' has-error' : '' }} has-feedback">
                {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug', 'required']) !!}

                @if ($errors->has('slug'))
                    <span class="help-block">
                        <strong>{{ $errors->first('slug') }}</strong>
                    </span>
                @endif
            </div>

            <div class="card-header">
                {!! Form::label('excerpt', 'Excerpt', ['class' => 'card-title mb-0', 'for' => 'excerpt']) !!}
                <font color="red">*</font>
            </div>
            <div class="card-body {{ $errors->has('excerpt') ? ' has-error' : '' }} has-feedback">
                {!! Form::textarea('excerpt', null, ['class' => 'form-control']) !!}

                @if ($errors->has('excerpt'))
                    <span class="help-block">
                        <strong>{{ $errors->first('excerpt') }}</strong>
                    </span>
                @endif
            </div>

            <div class="card-header">
                {!! Form::label('body', 'Conteúdo', ['class' => 'card-title mb-0', 'for' => 'body']) !!}
                <font color="red">*</font>
            </div>
            <div class="card-body {{ $errors->has('body') ? ' has-error' : '' }} has-feedback">
                {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

                @if ($errors->has('body'))
                    <span class="help-block">
                        <strong>{{ $errors->first('body') }}</strong>
                    </span>
                @endif
            </div>

        </div>

    </div>

    <div class="col-12 col-lg-6">
        <div class="card">
            <h1 class="h3 blockquote mt-2 mx-2">Publicar</h1>

            <div class="card-header">
                {!! Form::label('published_at', 'Data de Publicação', ['class' => 'card-title mb-0', 'for' => 'published_at']) !!}
                <font color="red">*</font>
            </div>
            <div class="card-body">
                {{-- {!! Form::text('published_at', null, ['class' => 'form-control', 'placeholder' => 'Y-m-d H:i:s']) !!} --}}

                <?php
                    if(request()->route()->getName() == 'backend.blog.create'){
                ?>
                <div class="col-sm-12" id="htmlTarget">
                    <div class="input-group log-event" id="datetimepicker1" data-td-target-input="nearest"
                        data-td-target-toggle="nearest">
                        {!! Form::text('published_at', null, [
                            'class' => 'form-control',
                            'data-td-target' => 'datetimepicker1',
                        ]) !!}
                        <span class="input-group-text" data-td-target="#datetimepicker1"
                            data-td-toggle="datetimepicker">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </div>
                </div>
                <?php
                    }
                    else{
                ?>

                <div class="col-sm-12" id="htmlTarget">
                    <div class="input-group log-event" id="datetimepicker1" data-td-target-input="nearest"
                        data-td-target-toggle="nearest">
                       <input id="published_at" type="text" class="form-control" name="published_at" data-td-target="#datetimepicker1" placeholder="{{$post->dateFormatted(true)}}"/>
                        <span class="input-group-text" data-td-target="#datetimepicker1"
                            data-td-toggle="datetimepicker">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </div>
                </div>
                <?php
                }
                ?>

            </div>

            <div class="card-header">
                {!! Form::label('categoria', 'Categoria', ['class' => 'card-title mb-0', 'for' => 'categoria']) !!}
                <font color="red">*</font>
            </div>
            <div class="card-body {{ $errors->has('excerpt') ? ' has-error' : '' }} has-feedback">
                {!! Form::select('category_id', App\Models\Categoria::pluck('title', 'id'), null, [
                    'class' => 'form-control',
                    'placeholder' => 'Escolha a categoria',
                ]) !!}

                @if ($errors->has('category_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('category_id') }}</strong>
                    </span>
                @endif
            </div>

            <div class="card-header">
                {!! Form::label('post_tags', 'Tags', ['class' => 'card-title mb-0', 'for' => 'post_tags']) !!}
            </div>
            <div class="card-body">
                {!! Form::text('post_tags', null, ['class' => 'form-control', 'placeholder' => 'Tags']) !!}
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                {!! Form::label('image', 'Imagem do Post', [
                    'id' => 'image',
                    'class' => 'card-title mb-0',
                ]) !!}
            </div>
            <div class="card-body {{ $errors->has('image') ? ' has-error' : '' }} has-feedback">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                        <img src="{{ $post->image_thumb_url ? $post->image_thumb_url : '/backend/img/no-image.png' }}"
                            alt="...">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail"
                        style="max-width: 200px; max-height: 150px;"></div>
                    <div>
                        <span class="btn btn-default btn-file"><span class="fileinput-new">Seleccione a
                                imagem</span><span class="fileinput-exists">Mudar</span>{!! Form::file('image') !!}</span>
                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remover</a>
                    </div>
                </div>

                @if ($errors->has('image'))
                    <span class="help-block">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif
            </div>

        </div>

        {!! Form::submit('Publicar', ['class' => 'btn btn-primary']) !!}
        <a class="btn btn-default" href="#" id="draft-btn">
            <i class="align-middle" data-feather="repeat"></i> <span class="align-middle">Guardar o rascunho</span></a>

    </div>
</div>
