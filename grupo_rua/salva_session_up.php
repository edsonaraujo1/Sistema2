<?
/*
 ----------------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Salvar info. digitadas em Sessao
 Criado em Data.....: 07/12/2007
 Ultima Atualiza��o : 07/12/2007 

 DEUS SEJA LOUVADO
 ----------------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

// Abre Conex�o com o MySql
include("../conexao.php");
$link = @mysql_connect($host,$user,$pass);
@mysql_select_db($db);

$nome3a = strtolower($nome3);

// -- Codigo
if (!empty($_GET["Edit0"]))   {

    $Edit0 = $_GET["Edit0"];
    
    // Consulta Socio

	$consulta10  = "SELECT * FROM socios    WHERE CODP = '$Edit0'";
	
	$resultado10 = @mysql_query($consulta10);
	
	$row10 = mysql_fetch_array($resultado10);
	
	$id_soc		= @$row10["id"];
	$cod_soc    = @$row10["COD"];
	$new_fot    = @$row10["CODP"];
	$nu_cod	    = @$row10["NU"];
	$rg_soc     = Trim(@$row10["RGASSOC"]);
	$cpf_soc  	= @$row10["CPF"];
	$insc_soc 	= @$row10["DATINSC"];
	$cate_soc	= @$row10["CATEGORIA"];
	$edif_soc	= @$row10["CODEDIF"];
	$nome_soc	= @$row10["NOMEASSOC"];
	$rua_soc	= Trim(@$row10["RUA"]);
	$end_soc    = Trim(@$row10["ENDRESID"]);
	$nun_soc    = Trim(@$row10["NUMERO"]);
	$cep_soc	= @$row10["CEPRES"];
	$uf_soc     = Trim(@$row10["ESTADORES"]);
	$mes_pg_soc = @$row10["MES"];
	$ano_pg_soc = @$row10["ANO"];
	$dat_nascim = @$row10["DATNASC"];
	$carg_asso  = @$row10["CARGOASSOC"];
	$esta_civil = @$row10["ESTCIVIL"];
	$natural_de = @$row10["NASCION"];
	$bairro_res = @$row10["BAIRRORES"];
	$cart_trab  = @$row10["CARTTRAB"]."-".@$row10["SERIE"]."-".@$row10["EMISCART "];
	$nome_edif  = trim(@$row10["CAMPO_EDIF"]);


	$consulta4_s  = "SELECT * FROM edificios Where COD = '$edif_soc'";
	
	$resultado4_s = @mysql_query($consulta4_s);
	
	$row4_s = @mysql_fetch_array($resultado4_s);
	
	$cod_edif   = @$row4_s["COD"];
	
	if (!empty($cod_edif)){
		
		$nome_edif  = @$row4_s["COD"]." - ".trim(retirar_carac(@$row4_s["COND"]))." ".trim(retirar_carac(@$row4_s["NOME"]));
		$rua_soc    = trim(retirar_carac(@$row4_s["RUA"]));
		$end_soc    = trim(retirar_carac(@$row4_s["ENDERECO"]));
		$nun_soc    = trim(retirar_carac(@$row4_s["NUMERO"]));
		$bairro_res = trim(retirar_carac(@$row4_s["BAIRRO"]));
		$cep_soc    = trim(retirar_carac(@$row4_s["CEP"]));
		$uf_soc     = trim(retirar_carac(@$row4_s["UF"]));
		
	}else{
		
		$nome_edif  = " ";
		$rua_soc    = " ";
		$end_soc    = " ";
		$nun_soc    = " ";
		$bairro_res = " ";
		$cep_soc    = " ";
		$uf_soc     = " ";
		
	}

    if (!empty($id_soc)){
    	
		    $add0 = "UPDATE $nome3 SET Edit0    = '$Edit0',
		                               Edit1    = '$nome_soc',
		                               Edit2    = '$rua_soc',
		                               Edit3    = '$end_soc',
		                               Edit4    = '$nun_soc',
		                               Edit5    = '$bairro_res',
			 					       Edit6    = '$cep_soc',
								       Edit7    = '$uf_soc',
									   Edit8    = '$carg_asso', 
									   Edit9    = '$nome_edif' WHERE Nome1 = '$nome3'";
	

     }else{

	     $Edit0 = $_GET["Edit0"];
		 $add0 = "UPDATE $nome3a SET Edit0    = '$Edit0' WHERE Nome1 = '$nome3a'";
}

		 @mysql_query($add0, $link);
}

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
    $add9 = "UPDATE $nome3a SET Edit9    = '$Edit9' WHERE Nome1 = '$nome3a'";
    @mysql_query($add9, $link);

}
// Codigo do Edificios
if (!empty($_GET["Edit10"]))  {
	
    $Edit10 = $_GET["Edit10"];
    $add10 = "UPDATE $nome3a SET memo1    = '$Edit10' WHERE Nome1 = '$nome3a'";
    @mysql_query($add10, $link);

}
if (!empty($_GET["Edit11"]))  {

    $Edit11 = $_GET["Edit11"];
	$add11 = "UPDATE $nome3a SET Edit11    = '$Edit11' WHERE Nome1 = '$nome3a'";
	@mysql_query($add11, $link);

}
if (!empty($_GET["Edit12"]))  {

    $Edit12 = $_GET["Edit12"];
	$add12 = "UPDATE $nome3a SET Edit12    = '$Edit12' WHERE Nome1 = '$nome3a'";
	@mysql_query($add12, $link);

}
if (!empty($_GET["Edit13"]))  {

    $Edit13 = $_GET["Edit13"];
	$add13 = "UPDATE $nome3a SET Edit13    = '$Edit13' WHERE Nome1 = '$nome3a'";
	@mysql_query($add13, $link);

}

include("layout_edif_up.php");

// Fun��o que valida o CNPJ

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

$var = ereg_replace("[����]",      "A",$var);
$var = ereg_replace("[����]",     "a",$var);
$var = ereg_replace("[���]",       "E",$var);
$var = ereg_replace("[���]",       "e",$var);
$var = ereg_replace("[����]",      "O",$var);
$var = ereg_replace("[�����]",     "o",$var);
$var = ereg_replace("[���]",       "U",$var);
$var = ereg_replace("[���]",       "u",$var);
$var = ereg_replace("[?*#'�`!$%�]"," ",$var);
$var = str_replace("�",            "C",$var);
$var = str_replace("�",            "c",$var);

return($var);
}

?>