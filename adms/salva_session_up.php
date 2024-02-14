<?php
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

// include("../logar.php");
$nome3 = $_SESSION["nome_log"];

// Abre Conexão com o MySql
include("../conexao.php");
$link = @mysql_connect($host,$user,$pass);
@mysql_select_db($db);

$nome3a = strtolower($nome3);

// -- Codigo
if (!empty($_GET["Edit1"]))   {
	
    $Edit1 = $_GET["Edit1"];
	$add1 = "UPDATE $nome3a SET Edit1    = '$Edit1' WHERE Nome1 = '$nome3a'";
	@mysql_query($add1, $link);
}
if (!empty($_GET["Edit2"]))   {
	
    $Edit2 = $_GET["Edit2"];
	$add2 = "UPDATE $nome3a SET Edit2    = '$Edit2' WHERE Nome1 = '$nome3a'";
	@mysql_query($add2, $link);
}
if (!empty($_GET["Edit3"]))   {

    $Edit3 = $_GET["Edit3"];
    $add3 = "UPDATE $nome3a SET Edit3    = '$Edit3'  WHERE Nome1 = '$nome3a'";
    @mysql_query($add3, $link);

}
if (!empty($_GET["Edit4"]))   {

    $Edit4 = $_GET["Edit4"];
    $add4 = "UPDATE $nome3a SET Edit4    = '$Edit4' WHERE Nome1 = '$nome3a'";
    @mysql_query($add4, $link);

}
if (!empty($_GET["Edit5"]))   {
	
    $Edit5 = $_GET["Edit5"];
    $add5 = "UPDATE $nome3a SET Edit5    = '$Edit5' WHERE Nome1 = '$nome3a'";
    @mysql_query($add5, $link);
	
}
if (!empty($_GET["Edit6"]))   {

    $Edit6 = $_GET["Edit6"];
	$add6 = "UPDATE $nome3a SET Edit6   = '$Edit6' WHERE Nome1 = '$nome3a'";
	@mysql_query($add6, $link);
	
}
if (!empty($_GET["Edit7"]))   {

    $Edit7 = $_GET["Edit7"];
    $add7 = "UPDATE $nome3a SET Edit7    = '$Edit7' WHERE Nome1 = '$nome3a'";
    @mysql_query($add7, $link);

}
if (!empty($_GET["Edit8"]))   {

    $Edit8 = $_GET["Edit8"];
    $add8 = "UPDATE $nome3a SET Edit8    = '$Edit8' WHERE Nome1 = '$nome3a'";
    @mysql_query($add8, $link);

}
// Cep
if (!empty($_GET["Edit9"]))   {

$Edit9 = $_GET["Edit9"];
/*
// Abrir tabela Ruas
$consulta   = "SELECT * FROM ruas WHERE CEP = '$Edit9'";
$resultado  = @mysql_query($consulta);
$row        = @mysql_fetch_array($resultado);
$cep_2      = @$row["CEP"];

if (!empty($cep_2)){

	$rua_2    = @$row["RUA"];
	$cep_2    = @$row["CEP"];
	$proc_log = @$row["CODLOG"];
	$proc_bai = @$row["CODBAI"];
	$compl_3  = @$row["COMPL"];
    if (substr($compl_3,0,1) == ",")
    {
	   $compl_1 = $compl_3; 
    }

    // Abrir tabela Logradou
    $consulta   = "SELECT * FROM logradou WHERE CODLOG = '$proc_log'";
    $resultado  = @mysql_query($consulta);
    $row        = @mysql_fetch_array($resultado);
    $Logra_2    = @$row["LOGRADOURO"];

    // Abrir tabela Bairro
    $consulta   = "SELECT * FROM bairros WHERE CODBAI = '$proc_bai'";
    $resultado  = @mysql_query($consulta);
    $row        = @mysql_fetch_array($resultado);
    $Bairro_3   = @$row["EXTENSO"];
    $proc_cida  = substr($proc_bai,0,6);

    // Abrir tabela Cidades
    $consulta   = "SELECT * FROM cidades WHERE CODCID = '$proc_cida'";
    $resultado  = @mysql_query($consulta);
    $row        = @mysql_fetch_array($resultado);
    $Uf_2       = @$row["UF"];
    $Cidade_2   = @$row["CIDADE"];
    $rua        = $Logra_2;
    $endereco   = $rua_2;
    $numero     = $compl_1;
    $bairro     = $Bairro_3;
    $cidade     = $Cidade_2;
    $cep        = $cep_2;
    $uf         = $Uf_2;

    // Fim Rotina de CEP

}
*/

///////////////////////////


function busca_cep($cep){
$resultado = @file_get_contents('http://republicavirtual.com.br/web_cep.php?cep='.urlencode($cep).'&formato=query_string');
if(!$resultado){
$resultado = '&resultado=0&resultado_txt=erro+ao+buscar+cep';
}
parse_str($resultado, $retorno);
return $retorno;
}

/*
* Exemplo de utilização
*/

//Vamos buscar o CEP 90020022
//$resultado_busca = busca_cep(’90020022');
$resultado_busca = busca_cep($Edit9);

//echo "  Array Retornada:
//".print_r($resultado_busca, true)."<br><br><br>";

switch($resultado_busca['resultado']){
case '2':


    $cidade     = retirar_carac($resultado_busca['cidade']);
    $cep        = $cep_2;
    $uf         = retirar_carac($resultado_busca['uf']);

break;

case '1':



    $rua        = retirar_carac($resultado_busca['tipo_logradouro']);
    $endereco   = retirar_carac($resultado_busca['logradouro']);
    $numero     = retirar_carac($compl_1);
    $bairro     = retirar_carac($resultado_busca['bairro']);
    $cidade     = retirar_carac($resultado_busca['cidade']);
    $cep        = $cep_2;
    $uf         = retirar_carac($resultado_busca['uf']);


break;

default:
//$texto = "Fala ao buscar cep: ".$resultado_busca['resultado'];
break;
}


    $Edit9 = $_GET["Edit9"];
	$add9  = "UPDATE $nome3a SET Edit6    = '$rua',
	                             Edit7    = '$endereco',
	                             Edit9    = '$Edit9',
	                             Edit10   = '$bairro',
	                             Edit11   = '$uf' WHERE Nome1 = '$nome3a'";
	@mysql_query($add9, $link);

}
// Codigo do Edificios
if (!empty($_GET["Edit10"]))  {
	
    $Edit10 = $_GET["Edit10"];
    $add10 = "UPDATE $nome3a SET Edit10    = '$Edit10' WHERE Nome1 = '$nome3a'";
    @mysql_query($add10, $link);

}
if (!empty($_GET["Edit11"]))  {

    $Edit11 = $_GET["Edit11"];
	$add11 = "UPDATE $nome3a SET Edit11    = '$Edit11' WHERE Nome1 = '$nome3a'";
	@mysql_query($add11, $link);

}
// CNPJ
if (!empty($_GET["Edit12"]))  {

$texto_cnpj = $_GET["Edit12"];

if (!validaCNPJ($texto_cnpj)){
	
	$menssagem3 = "CNPJ digitado INVALIDO VERIFIQUE !!!";	
}else{
	$menssagem3 = "CNPJ Valido !!                      ";	
}

    $Edit12 = $_GET["Edit12"];
	$add12 = "UPDATE $nome3a SET Edit12    = '$Edit12', mensage1  = '$menssagem3' WHERE Nome1 = '$nome3a'";
	@mysql_query($add12, $link);

}
if (!empty($_GET["Edit13"]))  {

    $Edit13 = $_GET["Edit13"];
	$add13 = "UPDATE $nome3a SET Edit13    = '$Edit13' WHERE Nome1 = '$nome3a'";
	@mysql_query($add13, $link);
}
if (!empty($_GET["Edit14"]))  {

    $Edit14 = $_GET["Edit14"];
	$add14 = "UPDATE $nome3a SET Edit14    = '$Edit14' WHERE Nome1 = '$nome3a'";
	@mysql_query($add14, $link);
}
if (!empty($_GET["Edit15"]))  {

    $Edit15 = $_GET["Edit15"];
	$add15 = "UPDATE $nome3a SET Edit15    = '$Edit15' WHERE Nome1 = '$nome3a'";
	@mysql_query($add15, $link);
}
if (!empty($_GET["Edit16"]))  {
	
    $Edit16 = $_GET["Edit16"];
	$add16 = "UPDATE $nome3a SET Edit16    = '$Edit16' WHERE Nome1 = '$nome3a'";
	@mysql_query($add16, $link);
}	
if (!empty($_GET["Edit17"]))  {

    $Edit17 = $_GET["Edit17"];
	$add17 = "UPDATE $nome3a SET Edit17    = '$Edit17' WHERE Nome1 = '$nome3a'";
	@mysql_query($add17, $link);
}
if (!empty($_GET["Edit18"]))  {

    $Edit18 = $_GET["Edit18"];
	$add18 = "UPDATE $nome3a SET memo1    = '$Edit18' WHERE Nome1 = '$nome3a'";
	@mysql_query($add18, $link);
}
if (!empty($_GET["Edit19"]))  {

    $Edit19 = $_GET["Edit19"];
    $add19 = "UPDATE $nome3a SET Edit19    = '$Edit19' WHERE Nome1 = '$nome3a'";
    @mysql_query($add19, $link);

}
if (!empty($_GET["Edit20"]))  {

    $Edit20 = $_GET["Edit20"];
	$add20 = "UPDATE $nome3a SET memo1    = '$Edit20' WHERE Nome1 = '$nome3a'";
	@mysql_query($add20, $link);
}
if (!empty($_GET["Edit21"]))  {

    $Edit21 = $_GET["Edit21"];
	$add21 = "UPDATE $nome3a SET Edit21    = '$Edit21' WHERE Nome1 = '$nome3a'";
	@mysql_query($add21, $link);
}
if (!empty($_GET["Edit22"]))  {

    $Edit22 = $_GET["Edit22"];
	$add22 = "UPDATE $nome3a SET Edit22    = '$Edit22' WHERE Nome1 = '$nome3a'";
	@mysql_query($add22, $link);
}
if (!empty($_GET["Edit23"]))  {

    $Edit23 = $_GET["Edit23"];
	$add23 = "UPDATE $nome3a SET Edit23    = '$Edit23' WHERE Nome1 = '$nome3a'";
	@mysql_query($add23, $link);
}
if (!empty($_GET["Edit24"]))  {

    $Edit24 = $_GET["Edit24"];
	$add24 = "UPDATE $nome3a SET Edit24    = '$Edit24' WHERE Nome1 = '$nome3a'";
	@mysql_query($add24, $link);
}
if (!empty($_GET["Edit25"]))  {

    $Edit25 = $_GET["Edit25"];
	$add25 = "UPDATE $nome3a SET Edit25    = '$Edit25' WHERE Nome1 = '$nome3a'";
	@mysql_query($add25, $link);
}
if (!empty($_GET["Edit26"]))  {

    $Edit26 = $_GET["Edit26"];
	$add26 = "UPDATE $nome3a SET Edit26    = '$Edit26' WHERE Nome1 = '$nome3a'";
	@mysql_query($add26, $link);
}
if (!empty($_GET["Edit27"]))  {

    $Edit27 = $_GET["Edit27"];
	$add27 = "UPDATE $nome3a SET Edit27    = '$Edit27' WHERE Nome1 = '$nome3a'";
	@mysql_query($add27, $link);
}
if (!empty($_GET["Edit28"]))  {

    $Edit28 = $_GET["Edit28"];
	$add28 = "UPDATE $nome3a SET Edit28    = '$Edit28' WHERE Nome1 = '$nome3a'";
	@mysql_query($add28, $link);
}

include("layout_adm_up.php");

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

$var = @ereg_replace("[ÁÀÂÃ]",      "A",$var);
$var = @ereg_replace("[áàâãª]",     "a",$var);
$var = @ereg_replace("[ÉÈÊ]",       "E",$var);
$var = @ereg_replace("[éèê]",       "e",$var);
$var = @ereg_replace("[ÓÒÔÕ]",      "O",$var);
$var = @ereg_replace("[óòôõº]",     "o",$var);
$var = @ereg_replace("[ÚÙÛ]",       "U",$var);
$var = @ereg_replace("[úùû]",       "u",$var);
$var = @ereg_replace("[?*#'´`!$%¨]"," ",$var);
$var = str_replace("Ç",            "C",$var);
$var = str_replace("ç",            "c",$var);

return($var);
}

?>
