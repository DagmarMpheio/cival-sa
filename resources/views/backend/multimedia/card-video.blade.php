 @foreach ($multimedias as $multimedia)
     <?php
     $nomeVideo = explode('.', $multimedia->ficheiro)[0];
     ?>
     <div class="col-12 col-md-4">
         <div class="card">
             <video src="/multimedia/uploadVideo/{{ $multimedia->ficheiro }}" controls="controls" width="300"
                 height="200">
             </video>
             <div class="card-header">
                 <h5 class="card-title mb-0">{{ $nomeVideo }}</h5>
             </div>
             <div class="card-body">
                 <p class="card-text">
                     {{ $multimedia->descricao }}
                 </p>
                 <div class="row">
                     <div class="col-md-6 text-start">
                         <a href="/multimedia/uploadVideo/{{ $multimedia->ficheiro }}" class="btn text-yellow1"
                             title="Download" download>
                             <i class="align-middle" data-feather="download"></i>
                         </a>
                     </div>
                     <div class="col-md-6 text-end">
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
