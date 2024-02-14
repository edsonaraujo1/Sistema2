/**
 * Autor: Henrique J. P. Barcelos
 * MSN: rick_hjpbarcelos@hotmail.com
 * Data: 25/04/2009
 */

//ao carregar a janela...
window.onload = function(){
	//pego todos os elementos LI dentro do menu
    var itens = document.getElementById("menu").getElementsByTagName("li");
    for (var i = 0; i < itens.length; i++) {
    	
		//Efeito Rollover para IE6, que não suporta a pseudo-classe :hover do CSS em elementos LI
        itens[i].onmouseover = function(){
            //se o elemento for o que estiver selecionado, eu adiciono a classe over. Ficará assim class="selecionado, over"...
			if (this.className.match("selecionado")) {
                this.className += ", over";
            }
			//se não for o seleiconado, apenas defino o nome da classe como sendo over
            else {
                this.className = "over";
            }
        }
		
		//Mesma intenção do bloco acima, adiciona o Efeito Rollout para o IE6
        itens[i].onmouseout = function(){
			//se a classe do elemento contiver a palavra 'selecionado', 
			//defino esse como sendo o nome da classe quando o mouse sair de cima dele
            if (this.className.match("selecionado")) {
                this.className = "selecionado";
            }
			//se não, atribuo o valor vazio para a classe
            else {
                this.className = "";
            }
        }
		
		//Essa função faz a mudança de classe quando o elemento é clicado.
		//É necessária tanto no IE quanto no Fx, Op, Ch, Sa, etc...
        itens[i].onclick = function(){
			//faço com que todos os elementos voltem ao seu estado "natural", limpando o nome da classe...
            for (var i = 0; i < itens.length; i++) {
                itens[i].className = "";
            }
			//em seguida, faço com que o elemento clicado receba a classe 'selecionado'
            this.className = "selecionado";
			//isto aqui apenas impede que o link seja executado, no caso porque meus links são "#"...
			//Retire essa linha caso for utilizar...
            return false;
        }
    }
}
