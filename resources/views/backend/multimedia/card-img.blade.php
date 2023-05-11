 @foreach ($multimedias as $multimedia)
     <?php
     $nomeImagem = explode('.', $multimedia->ficheiro)[0];
     ?>
     <div class="col-12 col-md-4">
         <div class="card">
             <img class="card-img-top" src="/multimedia/uploadImage/{{ $multimedia->ficheiro }}"
                 alt="{{ $multimedia->ficheiro }}">
             <div class="card-header">
                 <h5 class="card-title mb-0">{{ $nomeImagem }}</h5>
             </div>
             <div class="card-body">
                 <p class="card-text">
                     {{ $multimedia->descricao }}
                 </p>
                 <div class="row">

                     <div class="col-md-4">
                         <a href="/multimedia/uploadImage/{{ $multimedia->ficheiro }}" class="btn text-yellow1" title="Ver"
                             target="_blank">
                             <i class="align-middle" data-feather="eye"></i>
                         </a>
                     </div>
                     <div class="col-md-4">
                         <a href="/multimedia/uploadImage/{{ $multimedia->ficheiro }}" class="btn text-yellow1" title="Download"
                             download>
                             <i class="align-middle" data-feather="download"></i>
                         </a>
                     </div>
                     <div class="col-md-4">
                         {!! Form::open(['method' => 'DELETE', 'route' => ['backend.multimedias.destroy', $multimedia->id]]) !!}
                         @method('delete')
                         {{ csrf_field() }}
                         <button href="#" class="btn text-yellow1" title="Excluir" type="submit"
                             onclick="return confirm('Tem a certeza?')">
                             <i class="align-middle" data-feather="trash"></i>
                         </button>
                         {!! Form::close() !!}

                     </div>
                 </div>

             </div>
         </div>
     </div>
 @endforeach
