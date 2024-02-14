<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Tela de Mensagem
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");

$nome3 = strtoupper($_SESSION["nome_log"]);

?>

<style type=text/css>
							    
#popup{
position: relative; 			/*Define a posição absoluta da pop-up*/
top: 0%; 						/*Distancia da margem superior da página */
left: 0%; 						/*Distancia da margem esquerda da página */
width: 400px; 					/*Largura da pop-up*/
height: 100px; 					/*Altura da pop-up*/
/* padding: 20px 20px 20px 20px; 	/*Margem interna da pop-up*/
/* border-width: 17px; 			/*Largura da borda da pop-up*/
/* border-style: solid; 			/*Estilo da borda da pop-up*/
/* border-color: #5A9CB1;          /*Cor da Borda*/
/* background: white; 				/*Cor de fundo da pop-up*/
color: #000066; 				/*Cor do texto da pop-up*/
display: block; 					/* Estilo da pop-up*/
z-index: 1000;
								/*fim pop-up*/
}
</style> 
<!--Inicio da Funcao PopUP 'Segunda Tela de Ajuda' com a classe popup-->

<script language="JavaScript"><!--

document.onkeydown = keyCatcher;

function keyCatcher() 
{
   var e = event.srcElement.tagName;

   if (event.keyCode == 8 && e != "INPUT" && e != "TEXTAREA") 
   {
      event.cancelBubble = true;
      event.returnValue = false;
   }
}
//-->
</script>

<body>

<div id='popup' class='popup' style="Z-INDEX: 100; LEFT: 189px; WIDTH: 632px; POSITION: absolute; TOP: 218px; HEIGHT: 320px" align="center">
<div align=center style="Z-INDEX: 100;">
<table align=center border='15' bgcolor='#FFFFFF' bordercolor ='<?=$color_bor;?>'>
<tr align="center"><td>
<font face=arial><img src="../imagens/W95MBX03.ICO" width="55" height="55" align="center"><br />
     <b>&nbsp;&nbsp;&nbsp;Candidato(a) com CARTA de OPOSICAO!!!&nbsp;&nbsp;&nbsp;<br />
  	                  verifique cadastro de Oposicao !!!!<br />
					 	  	   </b><br /></font>
<table align=center>
<form method='POST' action='javascript:history.back(1)'>
<td><input type=image name='sim' src='../imagens/botaoazul24.PNG'></td>
</form></table></td></tr></table></div>
</div>


</body>
<!--Fim da Funcao PopUP 'Segunda Tela de Ajuda' com a classe popup-->

