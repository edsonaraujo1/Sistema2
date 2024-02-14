<?
include("../config.php");

// Resgata Sessao
session_name("Val_Etq_Edif");
session_start();

$receber  = strtolower($_SESSION['Edit1']);

?>
<head>
<title>Bate-Papo</title>
<!-- <meta http-equiv="refresh" content="15"> -->
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">   
        #scroll { border: 1px solid black; height: 185px; width: 575px; overflow: auto }   

body { background-image: url(<?="../".$logo_sis;?>);
       background-attachment: fixed }

</style>

</head>


<body onload="setTimeout('window.location.reload(true)',15000)" >

<div id="scroll" style="background-color: #FFFFFF;">   

<?

$receber = '1';

if ($receber != '1'){
?>

	<body bgcolor="#FFFFFFF">
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
	?>
	</body>
	<?
	
}else{
?>	
	<body  valign="bottom" bgcolor="#FFFFFF">
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
	?>
	</body>
	<?
	
}
?>

</div>

</body>
<script type="text/javascript">   
    var div = document.getElementById("scroll");   
    div.scrollTop = div.scrollHeight*div.scrollHeight;   
</script>   

<!--
    <td valign="bottom">
    <div style="Z-INDEX: 7; LEFT: 0px; POSITION: absolute; TOP: 530px">
	<input type='checkbox' name='receber' value="1" onchange="Salva_Checkbox(this)" />Rolar a Tela
    </div>

    </td>
-->