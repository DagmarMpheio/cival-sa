@extends('layouts.site.main')
@section('title', 'Documentos - CIVAL Centro de Inspecção Automóvel do Lubango')

@section('content')


    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>DOCUMENTOS</h2>
          <ol>
            <li><a href="/">Início</a></li>
            <li>Documentos</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">

        <!-- ==MATRICULAS === -->
        <div id="matriculas" class="row justify-content-center ">
          <div class="section-title">
            <h2>Matriculas</h2>
            <p>MAtriculas</p>
          </div>

          @if($docs_matriculaCounts==0)
              <div class="col-10-justify-content-center">
                <p class="alert alert-info">
                  Nenhum documento encotrado relacionado a matrículas
                </p>
              </div>
          @else 

          @foreach($docs_matricula as $doc)
          <!-- card -->
          <div class="card col-5 col-md-3 p-3 m-2">
            <div class="d-flex">
              <div class="w-25">
                <span class="h1 text-amarelo"><i class="bi-file-pdf-fill"></i></span>
              </div>
              <div class="w-75">
                <h4 class="text-amarelo text-truncate"> {{$doc->nome_ficheiro}} </h4>
                <p>{{$doc->descricao}}</p>
              </div>
            </div>
            
            <a class="btn btn-preto text-amarelo" href="multimedia/uploadDocs/{{$doc->ficheiro}}" target="_blank"><i class="bi-box-arrow-in-down"></i> Baixar</a>
          </div>
          <!-- fim card -->
          @endforeach

          @endif


        </div>
        <!-- === FIM MTRICULAS === -->

        <!-- === PELICULAS === -->
        <div id="peliculas" class="row justify-content-center my-5  ">
          <div class="section-title">
            <h2>Películas</h2>
            <p>Películas</p>
          </div>
		  
		   @if($docs_peliculaCounts==0)
              <div class="col-10-justify-content-center">
                <p class="alert alert-info">
                  Nenhum documento encotrado relacionado a películas
                </p>
              </div>
          @else 

          <!-- card -->
          @foreach($docs_pelicula as $doc)
          <!-- card -->
          <div class="card col-5 col-md-3 p-3 m-2">
            <div class="d-flex">
              <div class="w-25">
                <span class="h1 text-amarelo"><i class="bi-file-pdf-fill"></i></span>
              </div>
              <div class="w-75">
                <h4 class="text-amarelo text-truncate"> {{$doc->nome_ficheiro}} </h4>
                <p>{{$doc->descricao}}</p>
              </div>
            </div>
            
            <a class="btn btn-preto text-amarelo" href="multimedia/uploadDocs/{{$doc->ficheiro}}" target="_blank"><i class="bi-box-arrow-in-down"></i> Baixar</a>
          </div>
          @endforeach
		  @endif
          <!-- fim card -->          
        </div>
        <!-- === FIM PELICULAS === -->

          <!-- === ISPENSÃO === -->
          <div id="inspensao" class="row justify-content-center my-5">
            <div class="section-title">
              <h2>Documentos Inspeção</h2>
              <p>Inspeção</p>
            </div>
			
			@if($docs_inpecaoCounts==0)
              <div class="col-10-justify-content-center">
                <p class="alert alert-info">
                  Nenhum documento encotrado relacionado a inspenção
                </p>
              </div>
          @else 
			  
		  @foreach($docs_inpecao as $doc)
            <!-- card -->
            <div class="card col-5 col-md-3 p-3 m-2">
            <div class="d-flex">
              <div class="w-25">
                <span class="h1 text-amarelo"><i class="bi-file-pdf-fill"></i></span>
              </div>
              <div class="w-75">
                <h4 class="text-amarelo text-truncate"> {{$doc->nome_ficheiro}} </h4>
                <p>{{$doc->descricao}}</p>
              </div>
            </div>
            
            <a class="btn btn-preto text-amarelo" href="multimedia/uploadDocs/{{$doc->ficheiro}}" target="_blank"><i class="bi-box-arrow-in-down"></i> Baixar</a>
          </div>
			@endforeach
		  @endif
            <!-- fim card -->
            
          </div>
          <!-- === FIM INSPENSÃO === -->

      </div>
    </section>
@endsection


