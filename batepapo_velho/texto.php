<?
include("../config.php");

// Resgata Sessao
session_name("Val_Etq_Edif");
session_start();

$receber  = $_SESSION['Edit1'];

?>
<head>
<title>Bate-Papo</title>
<meta http-equiv="refresh" content="15">
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<script language=JavaScript>
function rolar() {
    scrollTo(0,100000);
  //setTimeout("rolar()", 100);
}
</script>

<?

$receber = '1';

if ($receber == '1'){
?>

	<body onload="rolar();" bgcolor="#CCCCFF">
	<?php
	$sala = date("dmY");
	$banco = "mensagens/$sala.txt";
	if(file_exists($banco))
	{
	$arquivo = fopen($banco,"r");
	$while = fread($arquivo,filesize($banco));
	if($while == "0"){}else{echo"$while";}
	fclose($arquivo);
	}
	else
	{
	echo"Não foi possível localizar o banco de dados!";
	}
	
}else{
?>	
	<body  valign="bottom" bgcolor="#CCCCFF">
	<?php
	$sala = date("dmY");
	$banco = "mensagens/$sala.txt";
	if(file_exists($banco))
	{
	$arquivo = fopen($banco,"r");
	$while = fread($arquivo,filesize($banco));
	if($while == "0"){}else{echo"$while";}
	fclose($arquivo);
	}
	else
	{
	echo"Não foi possível localizar o banco de dados!";
	}
	
	
}
?>

</body>
<!--
    <td valign="bottom">
    <div style="Z-INDEX: 7; LEFT: 0px; POSITION: absolute; TOP: 530px">
	<input type='checkbox' name='receber' value="1" onchange="Salva_Checkbox(this)" />Rolar a Tela
    </div>

    </td>
-->