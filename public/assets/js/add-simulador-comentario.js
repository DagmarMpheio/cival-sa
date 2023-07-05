// SCRIPT DE ADD SIMULAÇÃO DE COMENTARIO VIA JS
//AUTOR: ANDRÉ LIMA
// DATA: 11 DE JUNHO DE 2022

//PEGAR ELEMENTOS POR ID
var pegaId = function (elementoId) {
    return document.getElementById(elementoId);
} 
var containerComentario = pegaId("comentario-lista")
var campoComentario = pegaId("campo-comentario")
var botaoComentar = pegaId("botao-comentar")
var atual = new Date();
var segAtual = atual.getSeconds();
var minAtual = atual.getMinutes();
var horaAtual = atual.getHours();

//DECLARANDO VARIAVEIS PARA CONTADOR DE REAÇÕES E DE COMENTÁRIOS
var  botaoReagir = pegaId("botao-reagir");
var botaoGostar = pegaId("botao-gostar");
var botaoReacao = document.querySelectorAll(".btn-reacao-js");
var botaoPartilhar = pegaId("botao-partilhar");
var numReacao = pegaId("num-reacao");
var numComentario = pegaId("num-comentario");
var numPartilha = pegaId("num-partilha");
var numInteracao = document.querySelectorAll(".num-interacao");


// ATUALIZAR OS MINUTOS E A HORA PARA A HORA E MINUTOS DOS COMENTÁRIO SEREM TAMBÉM ACTUALIZADIOS
//ESTE SCRIPT PODE SER REAPROVEITADO DO SCRIPT DE HORAS
  setInterval(() => {
    segAtual++
    segAtual = segAtual < 60 ? segAtual : 0
   
    if (segAtual == 0) {
        minAtual++;
    }
    
    minAtual = minAtual < 60 ? minAtual : 0;
    
    if (minAtual== 0) {
       // horaAtual++
        horaAtual = atual.getHours() + 1;
    }
    horaAtual = horaAtual < 24 ? horaAtual : 0;
   
       horaString = horaAtual < 10 ? "0" : "";
       minutoString = minAtual < 10 ? "0" : "";
       segundoString = segAtual < 10 ? "0" : "";

}, 1000);

corpo = document.getElementsByTagName("body")
corpo[0].addEventListener("keypress", () => {
console.log(" Clicou na tecla "+ onkeypress);
//onkeyup
//keydown
})


var comentarioLista = document.querySelectorAll(".comentario-lista-item");
// ADICIONAR COMENTÁRIO
botaoComentar.addEventListener("click", () => {
    
    console.log(" Botao comentar clicado")
    console.log(" O Valor do campo comentar é "+ campoComentario.value);
    if (campoComentario.value != "") {
        
        containerComentario.innerHTML += '  <div class="ocultar card p-2 comentario-lista-item" data-aos="fade-up" data-aos-duration="1500"><div class="area-nome d-flex justify-content-between"> <h5 class=" font-weight-bold">Usuario Anónimo</h5> <span class="text-muted">  Hoje às ' +horaString+horaAtual + 'h'+minutoString+minAtual +' </span> </div> <div class="area-foto-comentario d-flex justify-content-between "> <div class="avatar-usuario-comentario "> <img src="assets/img/time/avatar.jpeg" alt="Imagem ou Avatar Usuário" >  </div> <div class="comentario-texto bg-preto  rounded p-2 "> <span class="text-amarelo">  '+ campoComentario.value +'  </span>  <div class=" m-2 text-right"><span class="btn btn-amarelo btn-apagar-c"> <i class="bi-trash-fill"></i> Apagar </span></div> </div> </div>  </div> ';
        //Depois de comentar, esvaziar a caixa de texto
        campoComentario.value = "";
    
        // comentarioLista = document.querySelectorAll(".comentario-lista");
        // MOSTRAR O COMENTÁRIO COM EFEITO CSS DEPOIS DE 1S
          comentarioLista = document.querySelectorAll(".comentario-lista-item");
       
           // comentarioLista = document.querySelectorAll(".comentario-lista-item");
            setTimeout(()=> {
                comentarioLista[(comentarioLista.length - 1)].classList.remove("ocultar")
                comentarioLista[(comentarioLista.length - 1)].classList.toggle("comentario-item")
               
                console.log("Add a class comebntario item no total "+ comentarioLista.length)
                addTotIteracoes(numInteracao, 1, "+")
                addTotIteracoes(numInteracao, 5, "+")
            }, 100)
        
            btnApagarcoment = document.querySelectorAll(".btn-apagar-c");
            apagarComentario(btnApagarcoment,  comentarioLista);
    
    }
})

// FUNÇÃO PARA REMOVER O COMENTÁRIO. AO OCULTAR OU REMOVER O COMENTÁRIO, NO CONTADOR TAMBÉM DEVE DIMINUIR
function apagarComentario(botaoApagar, elementoApagar) {
   
    console.log("Chamou a função apagar que tem como no total " + botaoApagar.length);
    for (let index = 0; index < (botaoApagar.length ); index++) {
       // const element = array[index];
        botaoApagar[index].addEventListener("click", () => {
            console.log("Clicou no botao apagar do elemento "+(index+2));
           

            elementoApagar[(2+index)].removeAttribute("data-aos")
            elementoApagar[(2+index)].removeAttribute("data-aos-duration")
            elementoApagar[(2+index)].classList.toggle("aos-init")
            elementoApagar[(2+index)].classList.toggle("aos-animate")
            //AS 4 LINHAS ACIMA, É PARA REMOVER POR COMPLETO OS AFEITOS DA LIB AOS
            elementoApagar[(2+index)].classList.add("ocultar")
            elementoApagar[(2+index)].classList.toggle("comentario-item")
           //dar display none após 1s, pois se remover ou dar inner HTML vazio, o conteudo, o botão apagar não saberá qual elemento posteriormente será apagado
           setTimeout(()=> {
            //elementoApagar[(2+index)].innerHTML = ""
          elementoApagar[(2+index)].classList.add("d-none");
            console.log(" Conteudo removido após 1.2s do elemento e adicionado a class d-none. Para ficar completamente oculto");
            addTotIteracoes(numInteracao, 1, "-");
            addTotIteracoes(numInteracao, 5, "-");
           }, 1200)
          
           //addTotIteracoes(numInteracao, 1, "-");
           //addTotIteracoes(numInteracao, 5, "-");
          // ACRESCENTAR O DOIS(2), NA CHAVE DO ELEMENTOAPAGAR POIS OS PRIMEIROS 2 ELEMENTOS, NÃO TÊM O BOTÃO APAGAR
           console.log(" O Elemento comentarioLista "+ elementoApagar[(2+index)].innerText)
           //Subtrair no contador total de comentáruios
          // numComentario.innerHTML =  '<i class="bi-chat-dots-fill"></i> '+ (Number(numComentario.innerText) - 1)
        })  
    }

    
       // comentarioLista[(comentarioLista.length - 1)].classList.remove("ocultar")
   
}



/*
AO CLICAR NO BOTAO REAÇÃO, NO BOTÃO PARTILHAR E NO BOTÃO COMENTAR, O N~~ DE SEUS RESPECTIVOS AUMENTE MAIS UM
*/


function addTotIteracoes(elementoNumIteracao, posicaoArray, operacao) {
        elementoNumIteracao[posicaoArray].innerText = operacao == "+" ?  (Number(elementoNumIteracao[posicaoArray].innerText) + 1) :  (Number(elementoNumIteracao[posicaoArray].innerText) - 1)   
}

// ADD CONTADOR NO REAÇÕES
/*
COMO O REAÇÕE ESTÁ EM MAIS DE UM ELEMENTO HTML, TEREMOS QUE FAZER UMA ITERAÇÃO COM O FOR
*/

// ADD ATRIBUTOS ELEMETADD 

for (contador = 0; contador < botaoReacao.length; contador++) {
    console.log(" O Nº de elementos btn reacao é "+botaoReacao.length)
    botaoReacao[contador].setAttribute("elementoadd", 1);
  //  botaoGostar.setAttribute("elementoadd", 1);
    console.log(" O Elementos tem atributo elementoadd com valor "+  botaoReacao[contador].getAttribute("elementoadd") );
    console.log("O elemento botai gostar tem o atributo elementoadd com valor "+ botaoGostar.getAttribute("elementoadd"));
    console.log(" Contador "+ contador);
    somaSubtraiaReagir(contador);
     }
//ADD O VALOR 1 OU 2 NO ATRIBUTO ELEMENTOADD EM TODOS OS ELEMENTOS, EM CADA CLICK
     function addEmTodosDeUmaVez(num) {
       for (contador = 0; contador < botaoReacao.length; contador++) {
        botaoReacao[contador].setAttribute("elementoadd", num);
      //  botaoGostar.setAttribute("elementoadd", num);
       }
     }

     function somaSubtraiaReagir(contador) {
        //botaoReacao[contador].setAttribute("elementoadd", 1);
        botaoReacao[contador].addEventListener("click", () => {
    
            console.log(" CLICADO "+ contador);
          
            if ( botaoReacao[contador].getAttribute("elementoadd") == 1 ) {
                
                //botaoReacao[contador].setAttribute("elementoadd", 2);
                addEmTodosDeUmaVez(2)
    
                addTotIteracoes(numInteracao, 0, "+");
                addTotIteracoes(numInteracao, 3, "+");
                addTotIteracoes(numInteracao, 4, "+");
               // botaoReacao[zero].elementoadd = 2;
                console.log(" O Elementos tem atributo elementoadd com valor no CLICAR "+  botaoReacao[contador].getAttribute("elementoadd"))
              
               } else {
              //DEPOIS DE CLICAR SE CLICAR MAIS UMA VEZ, REMOVER
             // botaoReacao[contador].setAttribute("elementoadd", 1);
             addEmTodosDeUmaVez(1)
              addTotIteracoes(numInteracao, 0, "-");
              addTotIteracoes(numInteracao, 3, "-");
              addTotIteracoes(numInteracao, 4, "-");
              console.log(" O Elementos tem atributo elementoadd com valor n if "+  botaoReacao[contador].getAttribute("elementoadd") );
               }
             //  console.log(" Minha no click é: "+minha)
        });
     }
 

// A FUNÇÃO DE CLICK NO PARTILHATR
botaoPartilhar.addEventListener("click", () => {
    //CHAMAR A FUNÇÃO PARA AUMENTAR NO Nº DE PARTILHAS
    //addNum("partilhar")
    console.log("clicou em partilhar");
    addTotIteracoes(numInteracao, 2, "+")
    addTotIteracoes(numInteracao, 6, "+")
    // REDIRECIONAR A PÁGINA DE PARTILHA DEPOIS DE X SEGUNDOS: 1000 corresponde a 1 segundo
    setTimeout(() => {
    url = window.location
    //url.href =  "https://www.m.facebook.com/Athenas.ao"
       console.log(" Esperou 1s para redirecionar "+ url)
    }, 2000)
})


// ADD FUNÇAO BOTAO GOSTAR E CHAMAR ADD TOT INTERACOES 
