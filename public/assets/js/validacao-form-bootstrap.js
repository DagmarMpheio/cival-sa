
// JavaScript inicial para desativar envios de formulário, se houver campos inválidos, com classes do bootstrap.
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Pega todos os formulários que nós queremos aplicar estilos de validação Bootstrap personalizados.
    var forms = document.getElementsByClassName('form-de-validacao');
    // Faz um loop neles e evita o envio
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();



  // Mensagem de agradecimento no formulario de contacto
  function msgObrigadoContacto() {
    
    var validacao = document.querySelector(".form-de-validacao");
    var nome = document.getElementById("nome");
    var email = document.getElementById("email");
    var mensagem = document.getElementById("mensagem");
    let dadosEmissor = document.querySelectorAll(".dados-emissor");
    var btnEnviar = document.getElementById("botao-enviar");
    var msgAlerta = document.getElementById("msg-alerta");
    var modalObrigado = document.getElementById("modal-agradecimento");

        btnEnviar.addEventListener("click", function() {
          console.log(" Clicou no botao enviar");
        
          if (nome.value != "" && email.value !="" && mensagem.value != "" ) {
           console.log(" Em condições de Chamar o Modal");
           console.log(" A mensagem é "+ mensagem.value + " Nome "+nome.value + " Email " + email.value )
           /*
            data-toggle="modal" data-target="#modal-agradecimento"
           */
            
            //btnEnviar.classList.add("d-none");
            btnEnviar.innerHTML = "<i class='bi-send'></i> POR FAVOR AGUARDE..."
            validacao.innerHTML += " <div class='imagem-processa'> <img style='width:45px;' src='assets/img/logos/radial-dark.gif' class='m-auto' > </div> "
        
           // nome.value = " ";
           // email.value = "";
           // mensagem.value = "";
            let imagemProcessa = document.querySelector(".imagem-processa");
           

           //  btnEnviar.setAttribute("data-toggle", "modal");
             // btnEnviar.setAttribute("data-target", "#modal-agradecimento")
            /* document.body.classList.add("modal-open")
             document.body.style = "padding-right: 16px; "
             modalObrigado.classList.add("show")
             modalObrigado.style = "padding-right: 16px; display: block; background: rgba(100,50 , 0, .7)"
             */

           dadosEmissor[0].innerHTML = nome.value
           dadosEmissor[1].innerHTML = mensagem.value
           dadosEmissor[2].innerHTML = nome.value
           dadosEmissor[3].innerHTML = email.value
         // nome.value = "";
         // email.value = "";
           
           //mensagem.innerText = "Limpo texto";
           // mUDAR O ÌCONE DE ENVIAR E COLOCAR UM DE ROLAGEM E APÓS 2S RETIRAR

           // FUNCAO PARA COLOCAR

           //FUÇÃO TIMEOUT PARA RETIRAR
           setTimeout(() => {
            //btnEnviar.innerHTML = "GIRAR"
            imagemProcessa.classList.add("d-none");
            validacao.classList.add("d-none");
            msgAlerta.classList.remove("d-none");
           }, 3500);
           setTimeout(() => {
            
            msgAlerta.classList.remove("ocultar");
            msgAlerta.classList.add("d-block")
            msgAlerta.classList.add("mostrar");
            
           }, 4000);
           //Fazer com que o evento sumbit nao recarregue a página
           validacao.addEventListener("submit", function(e){
            e.preventDefault();
            e.stopPropagation();
         })
            
          } else {
            if (btnEnviar.getAttribute("data-toggle") == "modal" && btnEnviar.getAttribute("data-target") == "#modal-agradecimento" ) {
              console.log(" Os atributos de chamar o modal existem")
             // btnEnviar.removeAttribute("data-toggle", "modal");
              //btnEnviar.removeAttribute("data-target", "#modal-agradecimento")
              //btnEnviar.classList.remove("d-none");
            }
            }
           
        });
    
  }
