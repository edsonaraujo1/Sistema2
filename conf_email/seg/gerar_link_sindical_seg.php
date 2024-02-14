<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Gerar Link para Sindical
 Criado em Data.....: 19/12/2008
 Ultima Atualização : 19/12/2008 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

require($path."logar.php");
$nome3 = $_SESSION["nome_log"];

require("menu.php");

$index_1 = $path."index.php";

// <bgsound src="imagens/onestop.mid" Delay=5 Loop=2 Volume=0 Balance=0>

?>

<html>
<head>
<title><?=$Titulo;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<style type="text/css" media="print">
div.invisivel {
visibility: hidden; 
}
</style>
<script src="script.js"></script>
</head>

<style type=text/css>

body { background-image: url(<?=$logo_sis;?>);
       background-attachment: fixed }

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
-->
</style> 

<body>



<?
print "<div style='Z-INDEX: 34; LEFT: 450px; WIDTH: 544px; POSITION: absolute; TOP: 115px; HEIGHT: 80px'>";
print "<script>	document.getElementById('include').innerHTML = '<img src='imagens/reloader.gif' />'</script>";
print "<font color='#336699' face=Verdana  size='4'><b>&nbsp;Por favor<br>Aguarde....<br/></b></font>";
print "</div>";	

require("gerar_link_sindical1.php");

?>

<tr><td><!-- AQUI SERÁ APRESENTADO O RESULTADO DA BUSCA DINÂMICA.. OU SEJA OS NOMES -->
<div id="pagina" class="invisivel"></div></td></tr>
</body>
</html>
