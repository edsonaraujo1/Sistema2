<?php
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

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

?>

<html>
<head>
<script src="XHConn.js"></script>
<script src="aguarde.js"></script>
</head>

<style type=text/css>

body { background-image: url(<?php echo "../".$logo_sis;?>);
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
incluir('gerar_link_sindical1');
</script>
