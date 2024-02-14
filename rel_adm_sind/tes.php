<?php

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$cod = 109;

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

$consulta4x  = "SELECT * FROM conf WHERE CONFCOD = '$cod' AND VENCTO = '05/09/2009'";
                     
$resultado4x = @mysql_query($consulta4x);
		
$row4x = @mysql_fetch_array($resultado4x);
		
$tot_cod = @$row4x["TOTAL"];

echo $tot_cod;


?>