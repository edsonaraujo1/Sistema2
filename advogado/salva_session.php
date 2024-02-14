<?
/*
 ----------------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Salvar info. digitadas em Sessao
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

// Abre Conexão com o MySql
include("../conexao.php");
$link = @mysql_connect($host,$user,$pass);
@mysql_select_db($db);

// -- Codigo
if (!empty($_GET["Edit1"]))   {

    $Edit1 = $_GET["Edit1"];
	$add1 = "UPDATE $nome3 SET Edit1    = '$Edit1' WHERE Nome1 = '$nome3'";
	@mysql_query($add1, $link);
}
if (!empty($_GET["Edit2"]))   {
	
    $Edit2 = $_GET["Edit2"];
	$add2 = "UPDATE $nome3 SET Edit2    = '$Edit2' WHERE Nome1 = '$nome3'";
	@mysql_query($add2, $link);
}
if (!empty($_GET["Edit3"]))   {

   $Edit3 = $_GET["Edit3"];
   $add3 = "UPDATE $nome3 SET Edit3    = '$Edit3'  WHERE Nome1 = '$nome3'";
   @mysql_query($add3, $link);

}
if (!empty($_GET["Edit4"]))   {

   $Edit4 = $_GET["Edit4"];
   $add4 = "UPDATE $nome3 SET Edit4    = '$Edit4' WHERE Nome1 = '$nome3'";
   @mysql_query($add4, $link);

}
if (!empty($_GET["Edit5"]))   {
	
   $Edit5 = $_GET["Edit5"];
   $add5 = "UPDATE $nome3 SET Edit5    = '$Edit5' WHERE Nome1 = '$nome3'";
   @mysql_query($add5, $link);
	
}
if (!empty($_GET["Edit6"]))   {

    $Edit6 = $_GET["Edit6"];
	$add6 = "UPDATE $nome3 SET Edit6   = '$Edit6' WHERE Nome1 = '$nome3'";
	@mysql_query($add6, $link);
	
}
if (!empty($_GET["Edit7"]))   {

    $Edit7 = $_GET["Edit7"];
    $add7 = "UPDATE $nome3 SET Edit7    = '$Edit7' WHERE Nome1 = '$nome3'";
    @mysql_query($add7, $link);

}
if (!empty($_GET["Edit8"]))   {

    $Edit8 = $_GET["Edit8"];
    $add8 = "UPDATE $nome3 SET Edit8    = '$Edit8' WHERE Nome1 = '$nome3'";
    @mysql_query($add8, $link);

}
// Cep
if (!empty($_GET["Edit9"]))   {

    $Edit9 = $_GET["Edit9"];
    $add9 = "UPDATE $nome3 SET Edit9    = '$Edit9' WHERE Nome1 = '$nome3'";
    @mysql_query($add9, $link);

}
// Codigo do Edificios
if (!empty($_GET["Edit10"]))  {
	
    $Edit10 = $_GET["Edit10"];
    $add10 = "UPDATE $nome3 SET Edit10    = '$Edit10' WHERE Nome1 = '$nome3'";
    @mysql_query($add10, $link);

}
if (!empty($_GET["Edit11"]))  {

    $Edit11 = $_GET["Edit11"];
	$add11 = "UPDATE $nome3 SET Edit11    = '$Edit11' WHERE Nome1 = '$nome3'";
	@mysql_query($add11, $link);

}

if (!empty($_GET["Edit12"]))  {

    $Edit12 = $_GET["Edit12"];
	$add12 = "UPDATE $nome3 SET Edit12    = '$Edit12' WHERE Nome1 = '$nome3'";
	@mysql_query($add12, $link);

}
if (!empty($_GET["Edit13"]))  {

    $Edit13 = $_GET["Edit13"];
	$add13 = "UPDATE $nome3 SET memo1     = '$Edit13' WHERE Nome1 = '$nome3'";
	@mysql_query($add13, $link);

}

include("layout_edif.php");

// Função que valida o CNPJ

function validaCNPJ($cnpj) { 
	
    if (strlen($cnpj) <> 18) return 0; 
    $soma1 = ($cnpj[0] * 5) + 

    ($cnpj[1] * 4) + 
    ($cnpj[3] * 3) + 
    ($cnpj[4] * 2) + 
    ($cnpj[5] * 9) + 
    ($cnpj[7] * 8) + 
    ($cnpj[8] * 7) + 
    ($cnpj[9] * 6) + 
    ($cnpj[11] * 5) + 
    ($cnpj[12] * 4) + 
    ($cnpj[13] * 3) + 
    ($cnpj[14] * 2); 
    $resto = $soma1 % 11; 
    $digito1 = $resto < 2 ? 0 : 11 - $resto; 
    $soma2 = ($cnpj[0] * 6) + 

    ($cnpj[1] * 5) + 
    ($cnpj[3] * 4) + 
    ($cnpj[4] * 3) + 
    ($cnpj[5] * 2) + 
    ($cnpj[7] * 9) + 
    ($cnpj[8] * 8) + 
    ($cnpj[9] * 7) + 
    ($cnpj[11] * 6) + 
    ($cnpj[12] * 5) + 
    ($cnpj[13] * 4) + 
    ($cnpj[14] * 3) + 
    ($cnpj[16] * 2); 
    $resto = $soma2 % 11; 
    $digito2 = $resto < 2 ? 0 : 11 - $resto; 
    return (($cnpj[16] == $digito1) && ($cnpj[17] == $digito2)); 
} 

/*
 --------------------------------
 Funcao para Retirar os caracter
 estranhos e acentos na hora de
 atualizar Table 
---------------------------------
*/

Function retirar_carac($var){

$var = ereg_replace("[ÁÀÂÃ]",      "A",$var);
$var = ereg_replace("[áàâãª]",     "a",$var);
$var = ereg_replace("[ÉÈÊ]",       "E",$var);
$var = ereg_replace("[éèê]",       "e",$var);
$var = ereg_replace("[ÓÒÔÕ]",      "O",$var);
$var = ereg_replace("[óòôõº]",     "o",$var);
$var = ereg_replace("[ÚÙÛ]",       "U",$var);
$var = ereg_replace("[úùû]",       "u",$var);
$var = ereg_replace("[?*#'´`!$%¨]"," ",$var);
$var = str_replace("Ç",            "C",$var);
$var = str_replace("ç",            "c",$var);

return($var);
}

?>
