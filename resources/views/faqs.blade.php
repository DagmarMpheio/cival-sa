@extends('layouts.site.main')
@section('title', 'Perguntas Frequentes - CIVAL Centro de Inspecção Automóvel do Lubango')

@section('content')


    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>FAQS</h2>
          <ol>
            <li><a href="/">Início</a></li>
            <li>Faqs</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

             <!-- === FAQ === -->
    <section class="faq section-bg px-3 bg-white" id="faq">
      <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="section-title">
          <h2>F.A.Q</h2>
          <p class="text-preto text-uppercase ">Perguntas Frequentes </p>
          <h3>Veja as principais perguntas e respostas dos utentes</h3>
        </div>

        <div class="row justify-content-center">
          <div class="col-xl-10">
          @if(count($faqs) > 0 )
            <ul class="faq-list">
            @foreach($faqs as $faq)
              <li>
                <div class="collapsed question" href="#faq{{$loop->index}}" data-bs-toggle="collapse"> {{$faq->questao}} <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div class="collapse" id="faq{{$loop->index}}" data-bs-parent=".faq-list">
                  <p>
                  {{$faq->resposta}} 
                  </p>
                </div>
              </li>
              @endforeach
            </ul>
          
            @else
            <p class="alert alert-info">
                  Nenhuma pergunta encontrada
            </p>
            @endif
          </div>
        </div>

      </div>
    </section>
    <!-- === FIM FAQ === -->
  

@endsection


