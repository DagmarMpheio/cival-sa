<table class="table table-hover table-striped my-0">
    <thead>
        <tr>
            <th>#</th>
            <td>Título</td>
            <td width="120">Autor</td>
            <td width="200">Categoria</td>
            <td width="180">Data</td>
            <th colspan="2">Acções</th>

        </tr>
    </thead>
    @php
        $counter = 1;
        $request = request();
    @endphp
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $counter++ }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->author->name }}</td>
                <td>{{ $post->category->title }}</td>
                <td>
                    <abbr title="{{ $post->dateFormatted(true) }}">{{ $post->dateFormatted() }}</abbr>
                    |
                    {!! $post->publicationLabel() !!}
                </td>
                
                {{-- ADD permissoes em breve --}}
                <td>
                   {!! Form::open(['style'=>'display:inline-block;','method' => 'PUT', 'route'=>['backend.blog.restore',$post->id]]) !!}
                        {{ csrf_field() }}
                        <button class="btn btn-success" title="Restaurar" type="submit"
                            onclick="return confirm('Tem a certeza?')">
                            <i class="align-middle" data-feather="rotate-ccw"></i> <span class="align-middle">Restaurar</span>
                        </button>
                   {!! Form::close() !!}
                </td>

                {{-- ADD permissoes em breve --}}
                <td>
                   {!! Form::open(['style'=>'display:inline-block;','method' => 'DELETE', 'route'=>['backend.blog.force-destroy',$post->id]]) !!}
                        @method('delete')
                        {{ csrf_field() }}
                        <button title="Eliminar Permanentemente" class="btn btn-danger" type="submit"
                            onclick="return confirm('Você está prestes a excluir permanentemente o seu post. Tem a certeza?')">
                            <i class="align-middle" data-feather="trash"></i> <span class="align-middle">Excluir</span>
                        </button>
                   {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
