@extends('layouts.site.main')
@section('title', 'Pesquisado Por: '.$pesquisa . ' - CIVAL SA ')

@section('content')


    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>PESQUISAR</h2>
          <ol>
            <li><a href="/">Início</a></li>
            <li><a href="/">log</a></li>
            <li> resusjs </li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

 
<div class="inner-page">
<section class="container pt-5">
  <div class="row justify-content-center mt-3">
    <div class="col-11 mx-auto mb-3">
      <h1 class="titulo-principal text-center">Resultados de pesquisa</h1>
    </div>

    <div class="col-10 justify-content-center ">
      <form action="/pesquisar" class="form-inline d-flex justify-content-center w-100">
        <div class="col-8 m-2">
          <input class="form-control " type="search" name="s" >
        </div>
        <div class="col-3 m-2">
          <button class="rounded btn btn-amarelo" type="submit"><i class="bi-search"></i></button>
        </div>
          
           
      </form>
    </div>
  </div>




  <div class="row justify-content-center">

    <div class="col-11 mt-4">
      <h2>Pesquisar por: {{ $pesquisa }} - <strong> {{ count($resultado) }} </strong>  </h2>
    </div>
     
      @if(count($resultado) > 0 )

      @foreach($resultado as $res)
        <!-- ITEM ARTIGO -->
        <div class="bg-preto row justify-content-center m-2" data-aos="fade-up" data-aos-duration="1500">


          <div class="col-11 col-md-4">
            <div class="grelha-imagem w-100">
              <img class="img-fluid" src="/assets/img/img7.jpg" alt="Imagem Artigo" >
           </div>
          </div>
          <!-- COTEUDO ARTIGO -->
          <div class="col-11 col-md-8">
                <div class="card-header">
                  <span class="badge badge-danger text-warning">Actualidade</span>
                  <span class="mx-1">&bullet;</span>
                  <span class="text-muted">Maio 15, 2022</span>
                  <a class="d-block mt-2 titulo-link h5 text-uppercase" href="#"> {{ $res->title }}  </a>
                </div>
  
                <div class="card-body text-light ">
                  <p class="text-truncate">
                    {{ $res->body }} 
                  </p>
                  <a href="#" class="btn btn-amarelo">Ler tudo</a>
                </div>
            
          </div>
          <!-- FIM CONTEUDO ARTIGO -->
        </div>
      <!-- FIM ITEM ARTIGO -->
     @endforeach
 
    <nav aria-label="Navegação por paginação " class="mt-3 " data-aos="fade-up" data-aos-duration="1500">
      <ul class="pagination justify-content-center">
        <li class="page-item disabled">
          <a class="page-link  bg-dark " href="#" tabindex="-1">Anterior</a>
        </li>
        <li class="page-item"><a class="page-link bg-dark text-warning" href="#">1</a></li>
        <li class="page-item active">
          <a class="page-links btn btn-amarelo" href="#">2 <span class="sr-only">(atual)</span></a>
        </li>
        <li class="page-item"><a class="page-link  bg-dark text-warning" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link  btn btn-amarelo" href="#">Próximo</a>
        </li>
      </ul>
    </nav>

 @else 

<div class="p-3 m-auto alert alert-danger"> 
Upps! Nenhum resultado encontrado para a pesquisa
</div>


@endif

  </div>

</section>
</div>


@endsection


