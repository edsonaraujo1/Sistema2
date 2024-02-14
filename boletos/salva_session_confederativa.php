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

include_once('../sql_injection.php');

// Resgata Sessao
session_name("Val_Sind");
@session_start();

$Edit1     = addslashes($_SESSION['Edit1']);
$Edit2     = addslashes($_SESSION['Edit2']);
$Edit3     = addslashes($_SESSION['Edit3']); 
$Edit4     = addslashes($_SESSION['Edit4']);
$Edit5     = addslashes($_SESSION['Edit5']);
$Edit6     = addslashes($_SESSION['Edit6']);
$Edit7     = addslashes($_SESSION['Edit7']);
$Edit8     = addslashes($_SESSION['Edit8']);
$Edit9     = addslashes($_SESSION['Edit9']);
$Edit10    = addslashes($_SESSION['Edit10']);


// Salva Sessao
session_name("Val_Sind");
@session_start();
if (!empty($Var_1)) {    $Edit1     = $Var_1;   }else{	$Edit1     = $_SESSION['Edit1'];}
if (!empty($Var_2)) {    $Edit2     = $Var_2;   }else{	$Edit2     = $_SESSION['Edit2'];}
if (!empty($Var_3)) {    $Edit3     = $Var_3;   }else{	$Edit3     = $_SESSION['Edit3'];}
if (!empty($Var_4)) {    $Edit4     = $Var_4;   }else{	$Edit4     = $_SESSION['Edit4'];}
if (!empty($Var_5)) {    $Edit5     = $Var_5;   }else{	$Edit5     = $_SESSION['Edit5'];}
if (!empty($Var_5)) {    $Edit5     = $Var_5;   }else{	$Edit5     = $_SESSION['Edit5'];}
if (!empty($Var_6)) {    $Edit6     = $Var_6;   }else{	$Edit6     = $_SESSION['Edit6'];}
if (!empty($Var_7)) {    $Edit7     = $Var_7;   }else{	$Edit7     = $_SESSION['Edit7'];}
if (!empty($Var_8)) {    $Edit8     = $Var_8;   }else{	$Edit8     = $_SESSION['Edit8'];}
if (!empty($Var_9)) {    $Edit9     = $Var_9;   }else{	$Edit9     = $_SESSION['Edit9'];}
if (!empty($Var_10)) {   $Edit10    = $Var_10;  }else{	$Edit10    = $_SESSION['Edit10'];}


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

if ($Edit6 == 'CONTABILIDADE' OR  $Edit6 == 'ADMINISTRADORA'){
   // Abre Conexão com o MySql
   include("../conexao.php");
   // Chama o Banco de Dados

   $link = @mysql_connect($host,$user,$pass);

   @mysql_select_db($db);

$query = "select * from edificios where ADM >= ". anti_sql_injection($Edit7) ." AND ADM <= ". anti_sql_injection($Edit8) ." AND ATIV = 'CONTRIBUINTE'";
$result = @mysql_query ($query, $link);
if (@mysql_num_rows($result) > 0); //linha 23
{
	
$nurecno = @mysql_num_rows($result);	
}
}
if ($Edit6 == 'EMPRESAS'){
   // Abre Conexão com o MySql
   include("../conexao.php");
   // Chama o Banco de Dados

   $link = @mysql_connect($host,$user,$pass);

   @mysql_select_db($db);

$query = "select * from edificios where COD >= ". anti_sql_injection($Edit7) ." AND COD <= ". anti_sql_injection($Edit8) ." AND ATIV = 'CONTRIBUINTE'";
$result = @mysql_query ($query, $link);
if (@mysql_num_rows($result) > 0); //linha 23
{
	
$nurecno = @mysql_num_rows($result);	
}

}


if (!empty($Edit2)){
	
	// Abre Conexão com o MySql
	include("../conexao.php");
	// Chama o Banco de Dados
	
	$link = @mysql_connect($host,$user,$pass);
	
	@mysql_select_db($db);
	
	$consultaz  = "SELECT * FROM instrucao WHERE Edit1 = ". anti_sql_injection($Edit2) ."";
			
	$resultadoz = @mysql_query($consultaz);
			
	$rowz = @mysql_fetch_array($resultadoz);
			
	$cedente_nome  = @$rowz['Edit2'];
	
	
}else{

	// Abre Conexão com o MySql
	include("../conexao.php");
	// Chama o Banco de Dados
	
	$link = @mysql_connect($host,$user,$pass);
	
	@mysql_select_db($db);
	
	$consultaz  = "SELECT * FROM instrucao WHERE Edit1 = ". anti_sql_injection($Edit2) ."";
			
	$resultadoz = @mysql_query($consultaz);
			
	$rowz = @mysql_fetch_array($resultadoz);
			
	$cedente_nome  = @$rowz['Edit2'];


}	

$_SESSION['nurecno']     = $nurecno; 
$_SESSION['cedente_nome'] = $cedente_nome;


include("confederativa_adms1.php");

?>
