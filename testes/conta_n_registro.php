<?php

/**
 * @author holodek
 * @copyright 2011
 */

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// Abre Tabela
$consulta  = "SELECT * FROM log_visita";
	
$resultado = @mysql_query($consulta);

$qtd_ivisita = @mysql_num_rows($resultado);

echo $qtd_ivisita;

?>