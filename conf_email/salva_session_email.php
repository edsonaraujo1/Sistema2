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

$Edit1     = $_SESSION['Edit1e'];
$Edit2     = $_SESSION['Edit2e'];
$Edit3     = $_SESSION['Edit3e']; 
$Edit4     = $_SESSION['Edit4e'];
$Edit5     = $_SESSION['Edit5e'];
$Edit6     = $_SESSION['Edit6e'];
$Edit7     = $_SESSION['Edit7e'];


// Salva Sessao
session_name("Val_Email");
session_start();
if (!empty($Var_1)) {    $Edit1     = $Var_1;   }else{	$Edit1     = $_SESSION['Edit1e'];}
if (!empty($Var_2)) {    $Edit2     = $Var_2;   }else{	$Edit2     = $_SESSION['Edit2e'];}
if (!empty($Var_3)) {    $Edit3     = $Var_3;   }else{	$Edit3     = $_SESSION['Edit3e'];}
if (!empty($Var_4)) {    $Edit4     = $Var_4;   }else{	$Edit4     = $_SESSION['Edit4e'];}
if (!empty($Var_5)) {    $Edit5     = $Var_5;   }else{	$Edit5     = $_SESSION['Edit5e'];}
if (!empty($Var_6)) {    $Edit6     = $Var_6;   }else{	$Edit6     = $_SESSION['Edit6e'];}
if (!empty($Var_7)) {    $Edit7     = $Var_7;   }else{	$Edit7     = $_SESSION['Edit7e'];}


$_SESSION['Edit1e']     = $Edit1;
$_SESSION['Edit2e']     = $Edit2;
$_SESSION['Edit3e']     = $Edit3;
$_SESSION['Edit4e']     = $Edit4;
$_SESSION['Edit5e']     = $Edit5;
$_SESSION['Edit6e']     = $Edit6;
$_SESSION['Edit7e']     = $Edit7;

include("enviar_email.php");

?>
