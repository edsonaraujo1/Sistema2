<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Tela de Help
 Criado em Data.....: 07/12/2007
 Ultima Atualiza��o : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

unset ($_SESSION['Faz_uma']);

$nome3 = strtoupper($_SESSION["nome_log"]);

?>

<style type=text/css>

#topo {
width:45px;
height:40px;
border: 0px;
margin:16px;
padding:0;
right:0px;
bottom:-6px;
position:fixed;
}

* html img#topo {
position: absolute;
}

								/* cria a div pop-up*/
#popup{
position: relative; 			/*Define a posi��o absoluta da pop-up*/
top: 0%; 						/*Distancia da margem superior da p�gina */
left: 0%; 						/*Distancia da margem esquerda da p�gina */
width: 400px; 					/*Largura da pop-up*/
height: 100px; 					/*Altura da pop-up*/
padding: 20px 20px 20px 20px; 	/*Margem interna da pop-up*/
border-width: 17px; 			/*Largura da borda da pop-up*/
border-style: solid; 			/*Estilo da borda da pop-up*/
border-color: #5A9CB1;          /*Cor da Borda*/
background: #fff; 				/*Cor de fundo da pop-up*/
color: #000066; 				/*Cor do texto da pop-up*/
display: none; 					/* Estilo da pop-up*/
								/*fim pop-up*/
}

#div1{z-index: 1;}
#div2{z-index: 45;}

</style> 

<!--Inicio da Funcao PopUP 'Segunda Tela de Ajuda' com a classe popup-->

<script language='javascript'>
// Fun��o que fecha o pop-up ao clicar no botao fechar
function fechar(){
document.getElementById('popup').style.display = 'none';
}
// Aqui definimos o tempo para fechar o pop-up automaticamente
function abrir(){
document.getElementById('popup').style.display = 'block';
setTimeout ('fechar()', 45000);
}
</script>

<body>

<div id='popup' class='popup' style="Z-INDEX: 50; LEFT: 189px; WIDTH: 632px; POSITION: absolute; TOP: 112px; HEIGHT: 320px" align="center">
<table align="center" border="15" bgcolor="#FFFFFF" bordercolor ='<?=$color_bor;?>'></table>

<td align="center">
<b>Ola...<?=$nome3;?></b><br />

<img src="../imagens/stop.gif" width="98" height="98" align="center"><br />
<b>EM DESENVOLVIMENTO !!!</b>
<br />
Essas informa��es s�o para auxiliar no uso do Sistema
Qualquer duvida voc� pode consultar o Help, onde voc� ter�.
a funcionalidade de cada Tecla e bot�o constantes no Sistema
Qualquer outra duvida sobre o sistema ou sugest�es
Entre em contato como o Criador do Sistema
Obrigado e Bom Uso !!!!

<br />
<br />
<br />
<br />
<br />
<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="javascript: fechar();"  ><img id="Image3" src="../imagens/botaoazul24.PNG"  width="92"  height="22"  border="0"       /></a></div>

</div>
<a href="javascript: abrir();"><img id="topo" src="../imagens/qmark.gif" /></a>
</td>
</body>

<!--Fim da Funcao PopUP 'Segunda Tela de Ajuda' com a classe popup-->

