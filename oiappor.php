<?php

/**
 * @author holodek
 * @copyright 2010
 */

// Abre Conexão com o MySql
include("conexao.php");

include_once('sql_injection.php');

// Chama o Banco de Dados
$link = @mysql_connect($host,$user,$pass);
@mysql_select_db($db);
@mysql_query("DELETE FROM useronline WHERE usuario = '". anti_sql_injection($nome3) ."'");
$tempmins = ($tempmins) ? $tempmins : 5;
@mysql_query("DELETE FROM useronline WHERE timestamp<".(time()-($tempmins*60)));


@session_start();
unset ($_SESSION["informes_log"]);
unset ($_SESSION["nome_log"]);

@session_destroy();

include("login.php");

?>