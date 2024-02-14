<?php

/**
 * @author holodek
 * @copyright 2010
 */


   if (mysql_errno() == '2005'){

	     echo "<html>
			  <head>
			  <title>ERRO AO CONECTAR</title>
		      <link rel='shortcut icon' href='../imagens/favicon.ico'/>
			  </head>
			  <body>
								
			  <style type=text/css>
					
			  body { background-image: url('$logo_sis');
		             background-attachment: fixed }
					
			  <!--.cp {  font: bold 10px Arial; color: black}
			  <!--.ti {  font: 9px Arial, Helvetica, sans-serif}
			  <!--.ld { font: bold 15px Arial; color: #000000}
			  <!--.ct { FONT: 9px 'Arial Narrow'; COLOR: #000033}
			  <!--.cn { FONT: 9px Arial; COLOR: black }
			  <!--.bc { font: bold 22px Arial; color: #000000 }
			  --></style> 
					
			  </HEAD>
					
		
			  </html>
				
			<br><br><br><br>
						
			<div align=center>
					
			<table align=center border='15' bgcolor='#FFF8DC'  bordercolor ='$color_bor'>
			<tr>
			<td align=center>
			<font face=arial><b>*** <font color = #FF0000> ERRO SERVIDOR FORA DO AR !!!</font> ***<br>
									         <font face=arial>Tente Novamente mais Tarde</b>
			<table align=center>
			<form method='POST' action='login.php'>
			<td><input type=image name='voltar' src='imagens/botao_voltar.PNG'></td>
			</form>
			</table>
			</td>
			</tr>
			</table>
			</div>";
   	        exit;
   	
   }

?>