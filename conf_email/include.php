<?php
/*
 ----------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Funcao Include
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/04/2009 

 DEUS SEJA LOUVADO
 ----------------------------------------------------
*/

//require("../logar.php");

$index_1 = "../index.php";

$pagina =$_GET['variavel'];

 if(file_exists($pagina.'.php'))
 {
       include($pagina.'.php');
 } 
 else {
 echo "       <div align=center>
			  <table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='#5A9CB1'>
			  <tr>
			  <td align=center>
			  <font face=arial><b>*** Essa Pagina nao Existe !!! ***<br>
		      </b>              
			  <table align=center>
			  <form method='POST' action='$index_1'>
			  <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
			  </form></p>
			  </table>
			  </td>
			  </tr>
			  </table>
			  </div>";
 }

?>
