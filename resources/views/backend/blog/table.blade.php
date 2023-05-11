<table class="table table-hover table-striped my-0">
    <thead>
        <tr>
            <th>#</th>
            <td>Título</td>
            <td width="125">Autor</td>
            <td width="180">Categoria</td>
            <td width="185">Data</td>
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
                    <a href="{{ route('backend.blog.edit', $post->id) }}" class="btn btn-primary-yellow" title="Editar">
                        <i class="align-middle" data-feather="edit"></i>
                    </a>
                </td>
                <td>
                    <a href="{{ route('backend.blog.show', $post->id) }}" class="btn btn-primary-yellow" title="Comentar">
                        <i class="align-middle" data-feather="message-circle"></i>
                    </a>
                </td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['backend.blog.destroy', $post->id]]) !!}
                    @method('delete')
                    {{ csrf_field() }}
                    <button href="#" class="btn btn-dark text-yellow1" title="Mover para Reciclagem" type="submit"
                        onclick="return confirm('Tem a certeza?')">
                        <i class="align-middle" data-feather="trash"></i>
                    </button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
