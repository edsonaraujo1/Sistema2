<?php

/**
 * @author holodek
 * @copyright 2010
 */

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

$nome3 = strtolower($_SESSION["nome_log"]);

$nome_txt = $_SESSION["sala_del"];




// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// Muda estatos para On-line
   $nuda = 'OF';
   
$consulta4 = "UPDATE tt_ser_01 SET  messenger   = '$nuda'  WHERE login = '$nome3'";

   @mysql_query($consulta4, $link) OR
   
   die("<div align=center>
	
	     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
	     <tr>
	     <td>
	     <font face=arial><b>*** Falha no Envio do Texto !!! ***</b>
	     <table align=center>
	     <form method='POST' action='../index.php'>
	     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
	     </form> 
	     </table>
	     </td>
	     </tr>
	     </table>
	     </div>");


session_start("chat");
$nick  = $nome3;
$sala2 = $nome_txt;
$hora  = date("H:i:s");

@unlink("privado/$sala2.txt");
session_start("chat");
//session_destroy();
//$abrir = @fopen("privado/$sala2.txt","a+");
$salvar = "<font face=verdana size=1>($hora)<b>"." ".strtolower($nick)."</b> Esta Off-line!!!<br>";
@fwrite($abrir,"$salvar");
@fclose($abrir);

//@unlink("usuarios/$nick.txt");

?>

<script>


	
//	$pergunta = window.confirm("Deseja sair do Bate_Papo");
	
 window.close();

</script>



<?

echo "<font size='5'><b>Ate logo...</b>";

?>
