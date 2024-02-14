<?php
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Organizar id das Tabelas
 Criado em Data.....: 19/12/2008
 Ultima Atualização : 19/12/2008 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

include("logar.php");
@session_start();
$nome3 = addslashes($_SESSION["nome_log"]);

include("menu.php");

// <bgsound src="imagens/onestop.mid" Delay=5 Loop=2 Volume=0 Balance=0>

?>

<html>
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<body>

<style type=text/css>

body { background-image: url(<?php echo $logo_sis ?>);
       background-attachment: fixed }

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
-->
</style> 

</body>

<div align=center>
<br/>
<br/>
<br/>
<br/>
<br/>

<img src="imagens/reloader.gif" width="50" height="50" align="center"/>


<table align="center">

<td align="center">
<font color="#336699" face=Verdana  size="4">
<b>Por favor<br>Aguarde....<br/></b>
</font>
</table>

</td>
</div>

<meta http-equiv='refresh' content='5;URL=relatorio_adms.php'>

