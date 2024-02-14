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

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");


for ($i= 0; $i < 100; $i++){

	
	   if ($_POST['chd'.$i] > 0){

		   @session_start();
		   $_SESSION['chd'.$i] = $_POST['chd'.$i];
	   
	       //echo $_POST['chd'.$i]."<br>";
       }
}       
?>

<html>
<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<script src="XHConn.js"></script>
<script src="aguarde.js"></script>
<link rel="shortcut icon" href="favicon.ico"/>
</head>

<style type=text/css>

body { background-image: url(<?="../".$logo_sis;?>);
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
incluir('cheque');
</script>
