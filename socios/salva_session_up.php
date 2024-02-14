<?php
/*
 ----------------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Salvar info. digitadas em Sessao Soc
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ----------------------------------------------------------
*/

// Resgata a Sessao
@session_start();
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
	
    $Edit1 = retirar_carac($_GET["Edit1"]);
	$add1 = "UPDATE $nome3a SET Edit1    = '$Edit1' WHERE Nome1 = '$nome3a'";
	@mysql_query($add1, $link);
}
if (!empty($_GET["Edit2"]))   {
	
    $Edit2 = retirar_carac($_GET["Edit2"]);
	$add2 = "UPDATE $nome3a SET Edit2    = '$Edit2' WHERE Nome1 = '$nome3a'";
	@mysql_query($add2, $link);
}
	
// R.G
if (!empty($_GET["Edit3"]))   {

$texto_rg = $_GET["Edit3"];

$eli_rg1 = str_replace("-"," ",$texto_rg);
$eli_rg2 = str_replace("."," ",$eli_rg1);
$valor_rg = str_replace(" ","",$eli_rg2);
	
// Abre Tabela Oposicao

$consulta6  = "SELECT * FROM oposicao3 Where RGASSOC = '$valor_rg'";

$resultado6 = @mysql_query($consulta6);

$row6 = @mysql_fetch_array($resultado6);

$cod_opo = @$row6["COD"];
$rg_opo  = @$row6["RGASSOC"];
$cpf_opo = @$row6["CPF"];

if (strlen(trim($rg_opo)) > 0){
   $menssagem1 = "Candidato com carta de OPOSICAO !!!";	
}

// Verifica se o Candidato ja esta Cadastrado

$consulta8  = "SELECT * FROM socios    WHERE RGASSOC = '$_GET[Edit3]'";

$resultado8 = @mysql_query($consulta8);

$row8 = @mysql_fetch_array($resultado8);

$id         = @$row8["id"];
$cod_so		= @$row8["COD"];
$cpf_1      = @$row8["CPF"];

if (!empty($cod_so)){
    $menssagem1 = "RG ja Cadastrado VERIFIQUE !!!!!";
}

    $Edit3 = retirar_carac($_GET["Edit3"]);
    $add3 = "UPDATE $nome3a SET Edit3    = '$Edit3', mensage1  = '$menssagem1' WHERE Nome1 = '$nome3a'";
    @mysql_query($add3, $link);

}
// C.P.F
if (!empty($_GET["Edit4"]))   {

// Abre Tabela Oposicao

$texto_cpf = $_GET["Edit4"];

$resu_t = verificaCPF($texto_cpf);

	if ($resu_t != 1){
	   $menssagem1 = "CPF digitado INVALIDO VERIFIQUE !!!";	
	}

$eliminar1 = str_replace("-"," ",$texto_cpf);
$eliminar2 = str_replace("."," ",$eliminar1);
$valor_cp = str_replace(" ","",$eliminar2);

$consulta7  = "SELECT * FROM oposicao3 Where CPF = '$valor_cp'";

$resultado7 = @mysql_query($consulta7);

$row7 = @mysql_fetch_array($resultado7);

$cod_opo = @$row7["COD"];
$rg_opo  = @$row7["RGASSOC"];
$cpf_opo = @$row7["CPF"];

if (strlen(trim($cpf_opo)) > 0){
   $menssagem1 = "Candidato com carta de OPOSIÇÃO !!!";	
}

// Verifica se o Candidato ja esta Cadastrado

$consulta8  = "SELECT * FROM socios    WHERE CPF = '$valor_cp'";

$resultado8 = @mysql_query($consulta8);

$row8 = @mysql_fetch_array($resultado8);

$id         = @$row8["id"];
$cod_so		= @$row8["COD"];
$cpf_1      = @$row8["CPF"];

if (!empty($cod_so)){

    $menssagem1 = "CPF ja Cadastrado VERIFIQUE !!!!!";
}

    $Edit4 = retirar_carac($_GET["Edit4"]);
    $add4 = "UPDATE $nome3a SET Edit4    = '$Edit4', mensage1  = '$menssagem1'  WHERE Nome1 = '$nome3a'";
    @mysql_query($add4, $link);

}
if (!empty($_GET["Edit5"]))   {
	
    $Edit5 = retirar_carac($_GET["Edit5"]);
    $add5 = "UPDATE $nome3a SET Edit5    = '$Edit5' WHERE Nome1 = '$nome3a'";
    @mysql_query($add5, $link);
	
}
if (!empty($_GET["Edit6"]))   {

    $Edit6 = retirar_carac($_GET["Edit6"]);
	$add6 = "UPDATE $nome3a SET Edit6   = '$Edit6' WHERE Nome1 = '$nome3a'";
	@mysql_query($add6, $link);
	
}
if (!empty($_GET["Edit7"]))   {

    $Edit7 = retirar_carac($_GET["Edit7"]);
	$add7 = "UPDATE $nome3a SET Edit7    = '$Edit7' WHERE Nome1 = '$nome3a'";
	@mysql_query($add7, $link);

}
if (!empty($_GET["Edit8"]))   {

    $Edit8 = retirar_carac($_GET["Edit8"]);
	$add8 = "UPDATE $nome3a SET Edit8    = '$Edit8' WHERE Nome1 = '$nome3a'";
	@mysql_query($add8, $link);

}
// Categoria
if (!empty($_GET["Edit9"]))   {
	
// Abre Tabela Categoria

$consulta5  = "SELECT * FROM categ Where CODIGO = '$_GET[Edit9]'";

$resultado5 = @mysql_query($consulta5);

$row5 = @mysql_fetch_array($resultado5);

$categ_1   = @$row5["DESCRICAO"];
	
    $Edit9 = retirar_carac($_GET["Edit9"]);
    $add9 = "UPDATE $nome3a SET Edit9    = '$Edit9', mensage2  = '$categ_1' WHERE Nome1 = '$nome3a'";
    @mysql_query($add9, $link);

}

// Codigo do Edificios
if (!empty($_GET["Edit10"]))  {
	
// Abrir Table de Edificios

$consulta4  = "SELECT * FROM edificios Where COD = '$_GET[Edit10]'";

$resultado4 = @mysql_query($consulta4);

$row4 = @mysql_fetch_array($resultado4);

$cod_edif   = @$row4["COD"];
$cond  = trim(retirar_carac(@$row4["COND"].@$row4["NOME"]));
$edif  = trim(@$row4["NOME"]);

if (!empty($cod_edif)){
   $nome_do_edif = trim(retirar_carac($cond));
}else{
   $nome_do_edif = '';
}

    $Edit10 = retirar_carac($_GET["Edit10"]);
	$add10 = "UPDATE $nome3a SET Edit10    = '$Edit10', mensage3  = '$cond' WHERE Nome1 = '$nome3a'";
	@mysql_query($add10, $link);

}

if (!empty($_GET["Edit11"]))  {

    $Edit11 = retirar_carac($_GET["Edit11"]);
	$add11 = "UPDATE $nome3a SET Edit11    = '$Edit11' WHERE Nome1 = '$nome3a'";
	@mysql_query($add11, $link);

}
if (!empty($_GET["Edit12"]))  {

    $Edit12 = retirar_carac($_GET["Edit12"]);
	$add12 = "UPDATE $nome3a SET Edit12    = '$Edit12' WHERE Nome1 = '$nome3a'";
	@mysql_query($add12, $link);

}
if (!empty($_GET["Edit13"]))  {

    $Edit13 = retirar_carac($_GET["Edit13"]);
	$add13 = "UPDATE $nome3a SET Edit13    = '$Edit13' WHERE Nome1 = '$nome3a'";
	@mysql_query($add13, $link);
}
if (!empty($_GET["Edit14"]))  {

    $Edit14 = retirar_carac($_GET["Edit14"]);
	$add14 = "UPDATE $nome3a SET Edit14    = '$Edit14' WHERE Nome1 = '$nome3a'";
	@mysql_query($add14, $link);
}
if (!empty($_GET["Edit15"]))  {

    $Edit15 = retirar_carac($_GET["Edit15"]);
	$add15 = "UPDATE $nome3a SET Edit15    = '$Edit15' WHERE Nome1 = '$nome3a'";
	@mysql_query($add15, $link);
}
// Cep
if (!empty($_GET["Edit16"]))  {

$Edit16 = $_GET["Edit16"];	

/*
// Abrir tabela Ruas
$consulta   = "SELECT * FROM ruas WHERE CEP = '$Edit16'";
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
    $Uf_2       = retirar_carac(@$row["UF"]);
    $Cidade_2   = retirar_carac(@$row["CIDADE"]);
    $rua        = retirar_carac($Logra_2);
    $endereco   = retirar_carac($rua_2);
    $numero     = retirar_carac($compl_1);
    $bairro     = retirar_carac($Bairro_3);
    $cidade     = retirar_carac($Cidade_2);
    $cep        = $cep_2;
    $uf         = retirar_carac($Uf_2);
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
$resultado_busca = busca_cep($Edit16);

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


//echo $rua;

///////////////////////////



    // Fim Rotina de CEP

    $Edit16 = retirar_carac($_GET["Edit16"]);
	$add16 = "UPDATE $nome3a SET Edit12    = '$rua',
	                            Edit13    = '$endereco',
	                            Edit15    = '$bairro',
	                            Edit16    = '$Edit16',
	                            Edit17    = '$cidade',
	                            Edit18    = '$uf' WHERE Nome1 = '$nome3a'";
	@mysql_query($add16, $link);

}
//}
if (!empty($_GET["Edit17"]))  {

    $Edit17 = retirar_carac($_GET["Edit17"]);
	$add17 = "UPDATE $nome3a SET Edit17    = '$Edit17' WHERE Nome1 = '$nome3a'";
	@mysql_query($add17, $link);
}
if (!empty($_GET["Edit18"]))  {

    $Edit18 = retirar_carac($_GET["Edit18"]);
	$add18 = "UPDATE $nome3a SET Edit18    = '$Edit18' WHERE Nome1 = '$nome3a'";
	@mysql_query($add18, $link);
}
if (!empty($_GET["Edit19"]))  {

    $Edit19 = retirar_carac($_GET["Edit19"]);
	$add19 = "UPDATE $nome3a SET Edit19    = '$Edit19' WHERE Nome1 = '$nome3a'";
	@mysql_query($add19, $link);
}
if (!empty($_GET["Edit20"]))  {

    $Edit20 = retirar_carac($_GET["Edit20"]);
	$add20 = "UPDATE $nome3a SET Edit20    = '$Edit20' WHERE Nome1 = '$nome3a'";
	@mysql_query($add20, $link);
}
if (!empty($_GET["Edit21"]))  {

    $Edit21 = retirar_carac($_GET["Edit21"]);
	$add21 = "UPDATE $nome3a SET Edit21    = '$Edit21' WHERE Nome1 = '$nome3a'";
	@mysql_query($add21, $link);
}
if (!empty($_GET["Edit22"]))  {

    $Edit22 = retirar_carac($_GET["Edit22"]);
	$add22 = "UPDATE $nome3a SET Edit22    = '$Edit22' WHERE Nome1 = '$nome3a'";
	@mysql_query($add22, $link);
}
if (!empty($_GET["Edit23"]))  {

    $Edit23 = retirar_carac($_GET["Edit23"]);
	$add23 = "UPDATE $nome3a SET Edit23    = '$Edit23' WHERE Nome1 = '$nome3a'";
	@mysql_query($add23, $link);
}
if (!empty($_GET["Edit24"]))  {

    $Edit24 = retirar_carac($_GET["Edit24"]);
	$add24 = "UPDATE $nome3a SET Edit24    = '$Edit24' WHERE Nome1 = '$nome3a'";
	@mysql_query($add24, $link);
}
if (!empty($_GET["Edit25"]))  {

    $Edit25 = retirar_carac($_GET["Edit25"]);
	$add25 = "UPDATE $nome3a SET Edit25    = '$Edit25' WHERE Nome1 = '$nome3a'";
	@mysql_query($add25, $link);
}
if (!empty($_GET["Edit26"]))  {

    $Edit26 = retirar_carac($_GET["Edit26"]);
	$add26 = "UPDATE $nome3a SET Edit26    = '$Edit26' WHERE Nome1 = '$nome3a'";
	@mysql_query($add26, $link);
}
if (!empty($_GET["Edit27"]))  {

    $Edit27 = retirar_carac($_GET["Edit27"]);
	$add27 = "UPDATE $nome3a SET Edit27    = '$Edit27' WHERE Nome1 = '$nome3a'";
	@mysql_query($add27, $link);
}
if (!empty($_GET["Edit28"]))  {

    $Edit28 = retirar_carac($_GET["Edit28"]);
	$add28 = "UPDATE $nome3a SET Edit28    = '$Edit28' WHERE Nome1 = '$nome3a'";
	@mysql_query($add28, $link);
}
if (!empty($_GET["Edit29"]))  {

/*
  ------------------------
  Função para Informar
  Situação do Cadastro
  ------------------------
*/  

$nome_cad_si = " ";
  
Switch (strtoupper($_GET["Edit29"])){

	Case 'E':
             $nome_cad_si = " ENDERECO DESATUALIZADO";
        break;

	Case 'C':
             $nome_cad_si = " CEP DESATUALIZADO";
        break;

	Case 'N':
             $nome_cad_si = " NOME NAO CONFERE";
        break;

	Case 'R':
             $nome_cad_si = " RG DESATUALIZADO";
        break;

	Case 'P':
             $nome_cad_si = " CPF DESATUALIZADO";
        break;
        
}

    $Edit29 = retirar_carac($_GET["Edit29"]);
	$add29 = "UPDATE $nome3a SET Edit29    = '$Edit29', mensage4  = '$nome_cad_si' WHERE Nome1 = '$nome3a'";
	@mysql_query($add29, $link);
}
if (!empty($_GET["Edit30"]))  {

    $Edit30 = retirar_carac($_GET["Edit30"]);
	$add30 = "UPDATE $nome3a SET Edit30    = '$Edit30' WHERE Nome1 = '$nome3a'";
	@mysql_query($add30, $link);
}
if (!empty($_GET["Edit31"]))  {

    $Edit31 = retirar_carac($_GET["Edit31"]);
	$add31 = "UPDATE $nome3a SET Edit31    = '$Edit31' WHERE Nome1 = '$nome3a'";
	@mysql_query($add31, $link);
}
if (!empty($_GET["Edit32"]))  {

    $Edit32 = retirar_carac($_GET["Edit32"]);
	$add32 = "UPDATE $nome3a SET Edit32    = '$Edit32' WHERE Nome1 = '$nome3a'";
	@mysql_query($add32, $link);
}
if (!empty($_GET["Edit33"]))  {

    $Edit33 = retirar_carac($_GET["Edit33"]);
	$add33 = "UPDATE $nome3a SET Edit33    = '$Edit33' WHERE Nome1 = '$nome3a'";
	@mysql_query($add33, $link);
}
if (!empty($_GET["Edit34"]))  {

    $Edit34 = retirar_carac($_GET["Edit34"]);
	$add34 = "UPDATE $nome3a SET Edit34    = '$Edit34' WHERE Nome1 = '$nome3a'";
	@mysql_query($add34, $link);
}
if (!empty($_GET["Edit35"]))  {

    $Edit35 = retirar_carac($_GET["Edit35"]);
	$add35 = "UPDATE $nome3a SET Edit35    = '$Edit35' WHERE Nome1 = '$nome3a'";
	@mysql_query($add35, $link);
}
if (!empty($_GET["Edit36"]))  {

    $Edit36 = retirar_carac($_GET["Edit36"]);
	$add36 = "UPDATE $nome3a SET Edit36    = '$Edit36' WHERE Nome1 = '$nome3a'";
	@mysql_query($add36, $link);
}

if (!empty($_GET["Edit37"]))  {

    $Edit37 = retirar_carac($_GET["Edit37"]);
	$add37 = "UPDATE $nome3a SET Edit37    = '$Edit37' WHERE Nome1 = '$nome3a'";
	@mysql_query($add37, $link);
}

if (!empty($_GET["Edit38"]))  {

    $Edit38 = retirar_carac($_GET["Edit38"]);
	$add38 = "UPDATE $nome3a SET Edit38    = '$Edit38' WHERE Nome1 = '$nome3a'";
	@mysql_query($add38, $link);
}

if (!empty($_GET["Edit39"]))  {

    $Edit39 = retirar_carac($_GET["Edit39"]);
	$add39 = "UPDATE $nome3a SET Edit39    = '$Edit39' WHERE Nome1 = '$nome3a'";
	@mysql_query($add39, $link);
}

if (!empty($_GET["Edit40"]))  {

    $Edit40 = retirar_carac($_GET["Edit40"]);
	$add40 = "UPDATE $nome3a SET Edit40    = '$Edit40' WHERE Nome1 = '$nome3a'";
	@mysql_query($add40, $link);
}

if (!empty($_GET["Edit41"]))  {

    $Edit41 = retirar_carac($_GET["Edit41"]);
	$add41 = "UPDATE $nome3a SET Edit41    = '$Edit41' WHERE Nome1 = '$nome3a'";
	@mysql_query($add41, $link);
}

if (!empty($_GET["Edit42"]))  {

    $Edit42 = retirar_carac($_GET["Edit42"]);
	$add42 = "UPDATE $nome3a SET Edit42    = '$Edit42' WHERE Nome1 = '$nome3a'";
	@mysql_query($add42, $link);
}

if (!empty($_GET["Edit43"]))  {

    $Edit43 = retirar_carac($_GET["Edit43"]);
	$add43 = "UPDATE $nome3a SET Edit43    = '$Edit43' WHERE Nome1 = '$nome3a'";
	@mysql_query($add43, $link);
}

if (!empty($_GET["Edit44"]))  {

    $Edit44 = retirar_carac($_GET["Edit44"]);
	$add44 = "UPDATE $nome3a SET Edit44    = '$Edit44' WHERE Nome1 = '$nome3a'";
	@mysql_query($add44, $link);
}

if (!empty($_GET["Edit45"]))  {

    $Edit45 = retirar_carac($_GET["Edit45"]);
	$add45 = "UPDATE $nome3a SET Edit45    = '$Edit45' WHERE Nome1 = '$nome3a'";
	@mysql_query($add45, $link);
}

if (!empty($_GET["Edit46"]))  {

    $Edit46 = retirar_carac($_GET["Edit46"]);
	$add46 = "UPDATE $nome3a SET Edit46    = '$Edit46' WHERE Nome1 = '$nome3a'";
	@mysql_query($add46, $link);
}

if (!empty($_GET["Edit47"]))  {

    $Edit47 = retirar_carac($_GET["Edit47"]);
	$add47 = "UPDATE $nome3a SET Edit47    = '$Edit47' WHERE Nome1 = '$nome3a'";
	@mysql_query($add47, $link);
}

if (!empty($_GET["Edit48"]))  {

    $Edit48 = retirar_carac($_GET["Edit48"]);
	$add48 = "UPDATE $nome3a SET Edit48    = '$Edit48' WHERE Nome1 = '$nome3a'";
	@mysql_query($add48, $link);
}

if (!empty($_GET["Edit49"]))  {

    $Edit49 = retirar_carac($_GET["Edit49"]);
	$add49 = "UPDATE $nome3a SET Edit49    = '$Edit49' WHERE Nome1 = '$nome3a'";
	@mysql_query($add49, $link);
}

if (!empty($_GET["Edit50"]))  {

    $Edit50 = retirar_carac($_GET["Edit50"]);
	$add50 = "UPDATE $nome3a SET Edit50    = '$Edit50' WHERE Nome1 = '$nome3a'";
	@mysql_query($add50, $link);
}

if (!empty($_GET["Edit51"]))  {

    $Edit51 = retirar_carac($_GET["Edit51"]);
	$add51 = "UPDATE $nome3a SET Edit51    = '$Edit51' WHERE Nome1 = '$nome3a'";
	@mysql_query($add51, $link);
}

if (!empty($_GET["Edit52"]))  {

    $Edit52 = retirar_carac($_GET["Edit52"]);
	$add52 = "UPDATE $nome3a SET Edit52    = '$Edit52' WHERE Nome1 = '$nome3a'";
	@mysql_query($add52, $link);
}

if (!empty($_GET["Edit53"]))  {

    $Edit53 = retirar_carac($_GET["Edit53"]);
	$add53 = "UPDATE $nome3a SET Edit53    = '$Edit53' WHERE Nome1 = '$nome3a'";
	@mysql_query($add53, $link);
}

if (!empty($_GET["Edit54"]))  {

    $Edit54 = retirar_carac($_GET["Edit54"]);
	$add54 = "UPDATE $nome3a SET Edit54    = '$Edit54' WHERE Nome1 = '$nome3a'";
	@mysql_query($add54, $link);
}

if (!empty($_GET["Edit55"]))  {

    $Edit55 = retirar_carac($_GET["Edit55"]);
	$add55 = "UPDATE $nome3a SET Edit55    = '$Edit55' WHERE Nome1 = '$nome3a'";
	@mysql_query($add55, $link);
}

if (!empty($_GET["Edit56"]))  {

    $Edit56 = retirar_carac($_GET["Edit56"]);
	$add56 = "UPDATE $nome3a SET Edit56    = '$Edit56' WHERE Nome1 = '$nome3a'";
	@mysql_query($add56, $link);
}

if (!empty($_GET["Edit57"]))  {

    $Edit57 = retirar_carac($_GET["Edit57"]);
	$add57 = "UPDATE $nome3a SET Edit57    = '$Edit57' WHERE Nome1 = '$nome3a'";
	@mysql_query($add57, $link);
}

if (!empty($_GET["Edit58"]))  {

    $Edit58 = retirar_carac($_GET["Edit58"]);
	$add58 = "UPDATE $nome3a SET Edit58    = '$Edit58' WHERE Nome1 = '$nome3a'";
	@mysql_query($add58, $link);
}

if (!empty($_GET["Edit59"]))  {

    $Edit59 = retirar_carac($_GET["Edit59"]);
	$add59 = "UPDATE $nome3a SET Edit59    = '$Edit59' WHERE Nome1 = '$nome3a'";
	@mysql_query($add59, $link);
}

if (!empty($_GET["Edit60"]))  {

    $Edit60 = retirar_carac($_GET["Edit60"]);
	$add60 = "UPDATE $nome3a SET Edit60    = '$Edit60' WHERE Nome1 = '$nome3a'";
	@mysql_query($add60, $link);
}

if (!empty($_GET["Edit61"]))  {

    $Edit61 = retirar_carac($_GET["Edit61"]);
	$add61 = "UPDATE $nome3a SET Edit61    = '$Edit61' WHERE Nome1 = '$nome3a'";
	@mysql_query($add61, $link);
}

if (!empty($_GET["Edit62"]))  {

    $Edit62 = retirar_carac($_GET["Edit62"]);
	$add62 = "UPDATE $nome3a SET Edit62    = '$Edit62' WHERE Nome1 = '$nome3a'";
	@mysql_query($add62, $link);
}

if (!empty($_GET["Edit63"]))  {

    $Edit63 = retirar_carac($_GET["Edit63"]);
	$add63 = "UPDATE $nome3a SET Edit63    = '$Edit63' WHERE Nome1 = '$nome3a'";
	@mysql_query($add63, $link);
}

if (!empty($_GET["Edit64"]))  {

    $Edit64 = retirar_carac($_GET["Edit64"]);
	$add64 = "UPDATE $nome3a SET Edit64    = '$Edit64' WHERE Nome1 = '$nome3a'";
	@mysql_query($add64, $link);
}

if (!empty($_GET["Edit65"]))  {

    $Edit65 = retirar_carac($_GET["Edit65"]);
	$add65 = "UPDATE $nome3a SET Edit65    = '$Edit65' WHERE Nome1 = '$nome3a'";
	@mysql_query($add65, $link);
}

if (!empty($_GET["Edit66"]))  {

    $Edit66 = retirar_carac($_GET["Edit66"]);
	$add66 = "UPDATE $nome3a SET Edit66    = '$Edit66' WHERE Nome1 = '$nome3a'";
	@mysql_query($add66, $link);
}

if (!empty($_GET["Edit67"]))  {

    $Edit67 = retirar_carac($_GET["Edit67"]);
	$add67 = "UPDATE $nome3a SET Edit67    = '$Edit67' WHERE Nome1 = '$nome3a'";
	@mysql_query($add67, $link);
}

if (!empty($_GET["Edit68"]))  {

    $Edit68 = retirar_carac($_GET["Edit68"]);
	$add68 = "UPDATE $nome3a SET Edit68    = '$Edit68' WHERE Nome1 = '$nome3a'";
	@mysql_query($add68, $link);
}

if (!empty($_GET["Edit69"]))  {

    $Edit69 = retirar_carac($_GET["Edit69"]);
	$add69 = "UPDATE $nome3a SET Edit69    = '$Edit69' WHERE Nome1 = '$nome3a'";
	@mysql_query($add69, $link);
}

if (!empty($_GET["Edit70"]))  {

    $Edit70 = retirar_carac($_GET["Edit70"]);
	$add70 = "UPDATE $nome3a SET memo1 = '$Edit70' WHERE Nome1 = '$nome3a'";
	@mysql_query($add70, $link);
}

if (!empty($_GET["Edit71"]))  {

    $Edit71 = retirar_carac($_GET["Edit71"]);
	$add71 = "UPDATE $nome3a SET Edit71 = '$Edit71' WHERE Nome1 = '$nome3a'";
	@mysql_query($add71, $link);
}

if (!empty($_GET["Edit72"]))  {

    $Edit72 = retirar_carac($_GET["Edit72"]);
	$add72 = "UPDATE $nome3a SET Edit72 = '$Edit72' WHERE Nome1 = '$nome3a'";
	@mysql_query($add72, $link);
}

include("soclayout_soc_up.php");

// Função que valida o CPF
function verificaCPF($cpf)
{	// Verifiva se o número digitado contém todos os digitos
    $cpf = str_pad(ereg_replace('[^0-9]', '', $cpf), 11, '0', STR_PAD_LEFT);
	
	// Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
    if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999')
	{
	return false;
	// echo '<center><font color="#FF0000" size="4">CNPJ Inválido, por favor digite um CNPJ válido.</b></font>'; 
    }
	else
	{   // Calcula os números para verificar se o CPF é verdadeiro
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }

            $d = ((10 * $d) % 11) % 10;

            if ($cpf{$c} != $d) {
                return false;
                // echo '<center><font color="#FF0000" size="4">CNPJ Inválido, por favor digite um CNPJ válido.</b></font>'; 
            }
        }

        return true;
    }
}

/*
 --------------------------------
 Funcao para Retirar os caracter
 estranhos e acentos na hora de
 atualizar Table 
---------------------------------
*/

Function retirar_carac($var){

$var = ereg_replace("[ÁÀÂÃ]",        "A",$var);
$var = ereg_replace("[áàâãª]",       "a",$var);
$var = ereg_replace("[ÉÈÊ]",         "E",$var);
$var = ereg_replace("[éèê]",         "e",$var);
$var = ereg_replace("[ÓÒÔÕ]",        "O",$var);
$var = ereg_replace("[óòôõº]",       "o",$var);
$var = ereg_replace("[ÚÙÛ]",         "U",$var);
$var = ereg_replace("[úùû]",         "u",$var);
$var = ereg_replace("[íìî]",         "i",$var);
$var = ereg_replace("[ÍÌÎ]",         "I",$var);
$var = ereg_replace("[?*#'´`!$%¨]",  " ",$var);
$var = str_replace("Ç",              "C",$var);
$var = str_replace("ç",              "c",$var);
$var = str_replace("\\",             " ",$var);
$var = str_replace(" or ",           " ",$var);
$var = str_replace("select ",        " ",$var);
$var = str_replace("delete ",        " ",$var);
$var = str_replace("create ",        " ",$var);
$var = str_replace("drop ",          " ",$var);
$var = str_replace("update ",        " ",$var);
$var = str_replace("drop table",     " ",$var);
$var = str_replace("show table",     " ",$var);
$var = str_replace("applet",         " ",$var);
$var = str_replace("objetc",         " ",$var);
$var = str_replace("where",          " ",$var);

return($var);
}
?>
