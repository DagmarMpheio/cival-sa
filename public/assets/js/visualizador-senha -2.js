// SCRIPT DE VISUALI<AR SENHA EM CAMPO DE SENHA PARA FORMULARIOS
//AUTOR: ANDRÉ LIMA
// DATA: 11 DE JUNHO DE 2022

var campoSenha = document.querySelectorAll(".campo-senha");
var btnVisualizarSenha = document.querySelectorAll(".btn-visualizar-senha");

for (let index = 0; index < btnVisualizarSenha.length; index++) {
    
    btnVisualizarSenha[index].addEventListener("click", () => {
       // console.log(" elemento tem atributo? "+ campoSenha.type);
        if (campoSenha[index].type != null ) {
            btnVisualizarSenha[index].classList.toggle("label-visualizar-senha-v")
            if ( campoSenha[index].getAttribute("type") == "password" ) {
                btnVisualizarSenha[index].innerHTML = "<i class='bi-eye-fill'></i> ";
               // console.log(" O Valor do Atributo é " + campoSenha[index].getAttribute("type") + " e vai receber text");
                campoSenha[index].type = "text";
            } else {
                btnVisualizarSenha[index].innerHTML = "<i class='bi-eye-slash-fill'></i> ";
               // console.log(" O Valor do Atributo é " + campoSenha.getAttribute("type") + " e vai receber password");
                campoSenha[index].type = "password";  
    
            }
             
         } else {
             //console.log(" Este elemento não tem atributo type");
         }
      //console.log(" O Atributo type é " + campoSenha.getAttribute("type"))
       // console.log("clicou no botao");
    })
    
}

