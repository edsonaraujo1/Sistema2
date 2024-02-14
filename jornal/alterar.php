<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Alterar Cadastro
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

// include("../logar.php");
$nome3 = $_SESSION["nome_log"];

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados
	
$link = @mysql_connect($host,$user,$pass);
		
@mysql_select_db($db);

include("funcoes2.php");

?>

<html>
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>
<body>

<style type=text/css>

body { background-image: url(<?php echo "../".$logo_sis ?>);
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
</html>

<?php

		
// Resgata Secao
session_start();
$id_navega = $_SESSION['navega'];
		
if (!empty($id_navega)){
	$Cod_3 = $_SESSION['navega'];
	$consulta0  = "SELECT * FROM noticias Where id = '$Cod_3'";

}else{
			
	$consulta0  = "SELECT * FROM noticias Where id = '$Cod_2'";
			
}
	
$resultado0 = @mysql_query($consulta0);
		
$row0 = mysql_fetch_array($resultado0);

$id         = @$row0["id"];
$Edit1 		= @$row0["codigo"];
$Edit2 	    = @$row0["data"];
$Edit3   	= @$row0["nome"];
$Edit4    	= @$row0["texto"]; 
$Edit5    	= @$row0["categoria"]; 

// Abrir tabela Senha

$tabela_1 = strtoupper('noticias');

$consulta3 = "SELECT * FROM permissoes WHERE login = '$nome3' and tabela = '$tabela_1'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];

if ($per2 == "NAO")
{
   include("cadastro.php");
}

else
{

include("menu.php");

$menssagens = "* * * Alterar * * *";

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<style type="text/css" media="print">
div.invisivel {
visibility: hidden; 
}
</style>
<script src="script.js"></script>
<script src="function_salva_up.js"></script>
</head>
<body>

<?php
//include("botoes_up.php");
include("layout3.php");
?>
<tr><td><!-- AQUI SERÁ APRESENTADO O RESULTADO DA BUSCA DINÂMICA.. OU SEJA OS NOMES -->
<div id="pagina" class="invisivel"></div></td></tr>
</body>
</html><?php
}



?>

