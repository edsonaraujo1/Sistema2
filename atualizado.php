<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Update Cadastro Categoria
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
@session_start();
$nome3 = $_SESSION["nome_log"];

include('logar.php');

?>

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


<?php
echo ("

            <html>
			<head>
			<title>ATUALIZADO</title>
            <link rel='shortcut icon' href='favicon.ico'/>
			</head>
			<body>
						
			<style type=text/css>
			
		
			<!--.cp {  font: bold 10px Arial; color: black}
			<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
			<!--.ld { font: bold 15px Arial; color: #000000}
			<!--.ct { FONT: 9px 'Arial Narrow'; COLOR: #000033}
			<!--.cn { FONT: 9px Arial; COLOR: black }
			<!--.bc { font: bold 22px Arial; color: #000000 }
			--></style> 
			
			</HEAD>
			<BODY text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0 leftmargin=0 bottommargin=0  background='$logo_sis'>
			</html>
			
			<br><br><br><br>
				
			<div align=center>
			
			<table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
			<tr>
			<td align=center>
			     <font face=arial><b>*** PARABÉNS ATUALIZAÇÃO EFETUADA !!! ***<br>

			<table align=center>
			<form method='POST' action='index.php'>
			<td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
			</form> 
			</table>
			</td>
			</tr>
			</table>
			</div> ");

?>