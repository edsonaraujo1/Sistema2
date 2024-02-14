<?
/*
 ----------------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Salvar info. digitadas em Sessao Opos
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


// Salva Sessao
session_name("Val_Opos");
session_start();
if (!empty($Var_1)) {    $Edit1  = $Var_1;   }else{	$Edit1   = $_SESSION['Edit1'];}
if (!empty($Var_2)) {    $Edit2  = $Var_2;   }else{	$Edit2   = $_SESSION['Edit2'];} 
if (!empty($Var_3)) {    $Edit3  = $Var_3;   }else{	$Edit3   = $_SESSION['Edit3'];}
if (!empty($Var_4)) {    $Edit4  = $Var_4;   }else{	$Edit4   = $_SESSION['Edit4'];}
if (!empty($Var_5)) {    $Edit5  = $Var_5;   }else{	$Edit5   = $_SESSION['Edit5'];}
if (!empty($Var_6)) {    $Edit6  = $Var_6;   }else{	$Edit6   = $_SESSION['Edit6'];}
if (!empty($Var_7)) {    $Edit7  = $Var_7;   }else{	$Edit7   = $_SESSION['Edit7'];}
if (!empty($Var_8)) {    $Edit8  = $Var_8;   }else{	$Edit8   = $_SESSION['Edit8'];}
if (!empty($Var_9)) {    $Edit9  = $Var_9;   }else{	$Edit9   = $_SESSION['Edit9'];}
if (!empty($Var_10)){    $Edit10 = $Var_10;  }else{	$Edit10  = $_SESSION['Edit10'];}
if (!empty($Var_11)){    $Edit11 = $Var_11;  }else{	$Edit11  = $_SESSION['Edit11'];}
if (!empty($Var_12)){    $Edit12 = $Var_12;  }else{	$Edit12  = $_SESSION['Edit12'];}
if (!empty($Var_13)){    $Edit13 = $Var_13;  }else{	$Edit13  = $_SESSION['Edit13'];}
if (!empty($Var_14)){    $Edit14 = $Var_14;  }else{	$Edit14  = $_SESSION['Edit14'];}
if (!empty($Var_15)){    $Edit15 = $Var_15;  }else{	$Edit15  = $_SESSION['Edit15'];}


$_SESSION['Edit1']     = $Edit1;
$_SESSION['Edit2']     = $Edit2;
$_SESSION['Edit3']     = $Edit3;
$_SESSION['Edit4']     = $Edit4;
$_SESSION['Edit5']     = $Edit5;
$_SESSION['Edit6']     = $Edit6;
$_SESSION['Edit7']     = $Edit7;
$_SESSION['Edit8']     = $Edit8;
$_SESSION['Edit9']     = $Edit9;
$_SESSION['Edit10']    = $Edit10;
$_SESSION['Edit11']    = $Edit11;
$_SESSION['Edit12']    = $Edit12;
$_SESSION['Edit13']    = $Edit13;
$_SESSION['Edit14']    = $Edit14;
$_SESSION['Edit15']    = $Edit15;

include("menu.php");
include("oposlayout3.php");

?>