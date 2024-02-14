<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Incluir Cadastro 
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/20097 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

$Faz_uma_vez = $_SESSION['Faz_uma'];

// include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

include("vaurls.php");

$deixar = acesso_url("NOTICIAS");

if ($deixar == "SIM"){

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

mysql_select_db($db);

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

$nome3a = strtolower($nome3);

// Abrir tabela Senha

$tabela_1 = strtoupper('noticias');


$consulta3 = "SELECT * FROM permissoes WHERE login = '$nome3a' and tabela = '$tabela_1'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];

if ($per1 != "SIM")
{
    include("enaaurlnp.php");
}
else
{


$menssagens = "* * * Incluir * * *";

// Abrir tabela edificios

$consulta_id  = "SELECT * FROM noticias ORDER BY id DESC LIMIT 0,1";

$resultado_id = @mysql_query($consulta_id);

// Incrementa novo codigo

$row_id = @mysql_fetch_array($resultado_id);

$id_id       = @$row_id["id"];
$codigo      = @$row_id["codigo"];

$Edit1 = $codigo+1;
$Edit2 = date("d/m/Y");


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
<script src="function_salva.js"></script>
</head>
<body>

<?php
//include("botoes_ins.php");
include("funcoes2.php");
include("layout2.php");
?>
<tr><td><!-- AQUI SERÁ APRESENTADO O RESULTADO DA BUSCA DINÂMICA.. OU SEJA OS NOMES -->
<div id="pagina" class="invisivel"></div></td></tr>
</body>
</html><?php
}

}else{
	
include("enaaurlnp.php");
	
}
?>
