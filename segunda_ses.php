<?php

/**
 * @author holodek
 * @copyright 2010
 */


//@ini_set('display_errors',1);
//@ini_set('display_startup_erro',1);
//@error_reporting(E_ALL);

include_once('sql_injection.php');

// Resgata a Sessao
@session_start();
$nome3 = $_SESSION["nome_log"];

// Abre Conexão com o MySql
include("conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

$se_ssao    = session_id();

@mysql_query("DELETE FROM useronline WHERE usuario ='". anti_sql_injection($nome3) ."'");

//@mysql_query("DELETE FROM useronline WHERE sessao = '".session_id()."'");
   
//echo "aiii";
//break;

    $date_time = date("d/m/Y");
    $hora_time = date("H:i:s");
    $timestamp = time();
    $ip = $_SERVER['REMOTE_ADDR'];
    $php_url    = $_SERVER['SCRIPT_NAME'];
    $se_ssao    = session_id();
    
    @mysql_query("INSERT INTO useronline VALUES ('$timestamp','$REMOTE_ADDR','$php_url','$date_time','$hora_time','$nome3','$se_ssao')");

include('user.php');
include('menu_1.php');

?>