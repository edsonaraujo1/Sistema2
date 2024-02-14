<?php
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

$Edit5     = $_SESSION['Edit5e'];


// Salva Sessao
session_name("Val_Email");
session_start();
if (!empty($Var_5)) {    $Edit5     = $Var_5;   }else{	$Edit5     = $_SESSION['Edit5e'];}


$_SESSION['Edit5e']     = $Edit5;

include("enviar_email.php");

?>
