// SCRIPT DE VISUALI<AR SENHA EM CAMPO DE SENHA PARA FORMULARIOS
//AUTOR: ANDRÉ LIMA
// DATA: 11 DE JUNHO DE 2022

var campoSenha = document.querySelector(".campo-senha");
var btnVisualizarSenha = document.querySelector(".btn-visualizar-senha");

btnVisualizarSenha.addEventListener("click", () => {
    console.log(" elemento tem atributo? "+ campoSenha.type);

    if (campoSenha.type != null ) {
        btnVisualizarSenha.classList.toggle("label-visualizar-senha-v")

        if (campoSenha.getAttribute("type") == "password") {
            btnVisualizarSenha.innerHTML = "<i class='bi-eye-fill'></i> ";
            console.log(" O Valor do Atributo é " + campoSenha.getAttribute("type") + " e vai receber text");
            campoSenha.type = "text";
        } else {
            btnVisualizarSenha.innerHTML = "<i class='bi-eye-slash-fill'></i> ";
            console.log(" O Valor do Atributo é " + campoSenha.getAttribute("type") + " e vai receber password");
            campoSenha.type = "password";
        }
         
     } else {
         console.log(" Este elemento não tem atributo type");
     }
  //console.log(" O Atributo type é " + campoSenha.getAttribute("type"))
    console.log("clicou no botao");
})


var btnVisualizarSenhaConfirm = document.querySelector(".btn-visualizar-senha-confirm");
var campoSenhaConfirm = document.querySelector(".campo-senha-confirm");

btnVisualizarSenhaConfirm.addEventListener("click", () => {
    console.log(" elemento tem atributo? "+ campoSenhaConfirm.type);

    if (campoSenhaConfirm.type !=null ) {
        btnVisualizarSenhaConfirm.classList.toggle("label-visualizar-senha-v")

        if (campoSenhaConfirm.getAttribute("type") == "password") {
            btnVisualizarSenhaConfirm.innerHTML = "<i class='bi-eye-fill'></i> ";
            console.log(" O Valor do Atributo é " + campoSenhaConfirm.getAttribute("type") + " e vai receber text");
            campoSenhaConfirm.type = "text";
        } else {
            btnVisualizarSenhaConfirm.innerHTML = "<i class='bi-eye-slash-fill'></i> ";
            console.log(" O Valor do Atributo é " + campoSenhaConfirm.getAttribute("type") + " e vai receber password");
            campoSenhaConfirm.type = "password";
        }
         
     } else {
         console.log(" Este elemento não tem atributo type");
     }
  //console.log(" O Atributo type é " + campoSenha.getAttribute("type"))
    console.log("clicou no botao btnVisualizarSenhaConfirm");
})