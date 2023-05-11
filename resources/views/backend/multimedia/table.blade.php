<table class="table table-hover table-striped my-0">
    <thead>
        <tr>
            <th>#</th>
            <td>Nome</td>
            <td width="120">Descrição</td>
            <td width="120">Tipo</td>
            <td width="180">Data</td>
            <th colspan="2">Acções</th>

        </tr>
    </thead>
    @php
        $counter = 1;
        $request = request();
    @endphp
    <tbody>
        @foreach ($multimedias as $multimedia)
            <tr>
                <td>{{ $counter++ }}</td>
                <td>{{ $multimedia->ficheiro }}</td>
                <td>{{ $multimedia->descricao }}</td>
                <td>{{ $multimedia->tipo }}</td>
                <td>
                    <abbr title="{{ $multimedia->dateFormatted(true) }}">{{ $multimedia->dateFormatted() }}</abbr>
                </td>

                {{-- ADD permissoes em breve --}}
                <td>
                    <a href="{{ route('backend.multimedias.edit', $multimedia->id) }}" class="btn btn-primary-yellow"
                        title="Editar">
                        <i class="align-middle" data-feather="edit"></i> <span class="align-middle">Editar</span>
                    </a>
                </td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['backend.multimedias.destroy', $multimedia->id]]) !!}
                    @method('delete')
                    {{ csrf_field() }}
                    <button href="#" class="btn btn-dark text-yellow1" title="Excluir" type="submit"
                        onclick="return confirm('Tem a certeza?')">
                        <i class="align-middle" data-feather="trash"></i> <span class="align-middle">Excluir</span>
                    </button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
