<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Tela de Mensagem
 Criado em Data.....: 07/12/2007
 Ultima Atualiza��o : 07/12/2007 

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
position: relative; 			/*Define a posi��o absoluta da pop-up*/
top: 0%; 						/*Distancia da margem superior da p�gina */
left: 0%; 						/*Distancia da margem esquerda da p�gina */
width: 400px; 					/*Largura da pop-up*/
height: 100px; 					/*Altura da pop-up*/
padding: 20px 20px 20px 20px; 	/*Margem interna da pop-up*/
border-width: 17px; 			/*Largura da borda da pop-up*/
border-style: solid; 			/*Estilo da borda da pop-up*/
border-color: <?=$color_bor;?>;          /*Cor da Borda*/
background: white; 				/*Cor de fundo da pop-up*/
color: #000066; 				/*Cor do texto da pop-up*/
display: none; 					/* Estilo da pop-up*/
								/*fim pop-up*/
}
</style> 
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<!--Inicio da Funcao PopUP 'Segunda Tela de Ajuda' com a classe popup-->
<body>
<div id='popup' class='popup' style="Z-INDEX: 1000; LEFT: 189px; WIDTH: 632px; POSITION: absolute; TOP: 215px; HEIGHT: 320px" align="center">
<div align=center>
<table align=center border='15' bgcolor='#FFFFFF' bordercolor ='<?=$color_bor;?>'>
<tr align="center"><td>
<font face=arial><img src="../imagens/W95MBX03.ICO" width="55" height="55" align="center"><br />
     <b>&nbsp;&nbsp;&nbsp;Socio ja Foi Atendido...Verifique !!!&nbsp;&nbsp;&nbsp;
  	                   
					 </b><br /></font>
<table align=center>
<form method='POST' action='javascript:history.back(1)'>
<td><input type=image name='sim' src='../imagens/botaoazul24.PNG'></td>
</form></table></td></tr></table></div>
</div>
</body>
<!--Fim da Funcao PopUP 'Segunda Tela de Ajuda' com a classe popup-->

