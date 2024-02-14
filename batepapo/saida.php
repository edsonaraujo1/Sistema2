<?php

/**
 * @author holodek
 * @copyright 2010
 */

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

$nome3 = strtolower($_SESSION["nome_log"]);

session_start("chat");
$nick = $nome3;
$sala = date("dmY");
$hora = date("H:i:s");

@unlink("usuarios/$nick.txt");
//session_start("chat");
//session_destroy();
$abrir = @fopen("mensagens/$sala.txt","a+");
$salvar = "<font face=verdana size=1>($hora)</font> <b><font face=verdana size=2 color=$cor>$nick</font></b> <font face=verdana size=2>sai da sala...</font><br>";
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
