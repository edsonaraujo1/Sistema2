<?php

/**
 * @author holodek
 * @copyright 2010
 */


// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

$nome3 = addslashes($_SESSION["nome_log"]);


include_once('sql_injection.php');
			
// Abre Conexão com o MySql
include("conexao.php");
// Chama o Banco de Dados
			
$link = @mysql_connect($host,$user,$pass);
			
@mysql_select_db($db);
			
$se_ssao    = session_id();
			
$consulta = "DELETE FROM useronline Where usuario = '". anti_sql_injection($nome3) ."' AND sessao = '$se_ssao'";
			
@mysql_query($consulta, $link);

@mysql_close();

@session_start();
unset ($_SESSION["informes_log"]);
unset ($_SESSION["nome_log"]);

@session_destroy();
ob_end_flush();   // Limpa o buffer


include("login.php");
			
?>

