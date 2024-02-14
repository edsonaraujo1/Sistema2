<?
/*
 ----------------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Salvar info. digitadas em Sessao Edif
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ----------------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");

$nome3 = $_SESSION["nome_log"];


// Resgata Sessao
session_name("Val_Email");
session_start();

$Edit2     = $_SESSION['Edit2e'];


// Salva Sessao
session_name("Val_Email");
session_start();
if (!empty($Var_2)) {    $Edit2     = $Var_2;   }else{	$Edit2     = $_SESSION['Edit2e'];}


$_SESSION['Edit2e']     = $Edit2;

include("enviar_email.php");

?>