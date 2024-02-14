<?
/*
 ----------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Gerar Link de Boletos Sindical
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/04/2009 

 DEUS SEJA LOUVADO
 ----------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

unset ($_SESSION['Faz_uma']);

$nome3 = $_SESSION["nome_log"];

include("../logar.php");

include("menu.php");

$vencto1     = strtoupper($_POST['Edit1']);
$exec1       = strtoupper($_POST['Edit2']);
$recebe      = strtoupper($_POST['recerber']);


// Salva Sessao
session_start();

$_SESSION['vencto1_bb'] = $vencto1;
$_SESSION['exec1_bb']   = $exec1;
$_SESSION['recebe3_bb'] = $recebe; 


//echo $vencto1."<br>";
//echo $exec1."<br>";
//echo $recebe;

//break;

?>

<html>
<head>
<script src="XHConn.js"></script>
<script src="aguarde.js"></script>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>

<style type=text/css>

body { background-image: url(<?='../'.$logo_sis;?>);
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
<div style='Z-INDEX: 34; LEFT: 225px; WIDTH: 544px; POSITION: absolute; TOP: 115px; HEIGHT: 80px'>
<div id="include" align="center">
aqui e que  vai rola o conteudo
</div>
</div>
</body>
</html>
<script>
incluir('tratar_bb');
</script>
