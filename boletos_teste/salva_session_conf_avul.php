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

include("../logar.php");

$nome3 = $_SESSION["nome_log"];


// Resgata Sessao
session_name("Val_Sind");
@session_start();

$Edit1     = $_SESSION['Edit1'];
$Edit2     = $_SESSION['Edit2'];
$Edit3     = $_SESSION['Edit3']; 
$Edit4     = $_SESSION['Edit4'];


// Salva Sessao
session_name("Val_Sind");
@session_start();
if (!empty($Var_1)) {    $Edit1     = $Var_1;   }else{	$Edit1     = $_SESSION['Edit1'];}
if (!empty($Var_2)) {    $Edit2     = $Var_2;   }else{	$Edit2     = $_SESSION['Edit2'];}
if (!empty($Var_3)) {    $Edit3     = $Var_3;   }else{	$Edit3     = $_SESSION['Edit3'];}
if (!empty($Var_4)) {    $Edit4     = $Var_4;   }else{	$Edit4     = $_SESSION['Edit4'];}
if (!empty($Var_5)) {    $Edit5     = $Var_5;   }else{	$Edit5     = $_SESSION['Edit5'];}


$_SESSION['Edit1']     = $Edit1;
$_SESSION['Edit2']     = $Edit2;
$_SESSION['Edit3']     = $Edit3;
$_SESSION['Edit4']     = $Edit4;
$_SESSION['Edit5']     = $Edit5;

if (!empty($Edit4)){
   // Abre Conexão com o MySql
   include("../conexao.php");
   // Chama o Banco de Dados

   $link = @mysql_connect($host,$user,$pass);

   @mysql_select_db($db);

$query = "select * from edificios where COD >= '$Edit3' AND COD <= '$Edit4' AND ADM = 0 AND ATIV = 'CONTRIBUINTE'";
$result = @mysql_query ($query, $link);
if (@mysql_num_rows($result) > 0); //linha 23
{
	
$nurecno = @mysql_num_rows($result);	
}
}
if ($Edit4 == 0){
   // Abre Conexão com o MySql
   include("../conexao.php");
   // Chama o Banco de Dados

   $link = @mysql_connect($host,$user,$pass);

   @mysql_select_db($db);

$query = "select * from edificios where COD >= '$Edit3' AND COD <= '$Edit4' AND ADM = 0 AND ATIV = 'CONTRIBUINTE'";
$result = @mysql_query ($query, $link);
if (@mysql_num_rows($result) > 0); //linha 23
{
	
$nurecno = @mysql_num_rows($result);	
}

}

$_SESSION['nurecno']     = $nurecno; 

include("confederativa_avul1.php");

?>
