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

    $Edit1 = retirar_carac($_GET["Edit1"]);
    
   // Consulta Socio

	$consulta1  = "SELECT * FROM socios    WHERE CODP = '$Edit1'";
	
	$resultado1 = @mysql_query($consulta1);
	
	$row1 = mysql_fetch_array($resultado1);
	
	$id_soc		= @$row1["id"];
	$cod_soc    = @$row1["COD"];
	$new_fot    = @$row1["CODP"];
	$nu_cod	    = @$row1["NU"];
	$rg_soc     = Trim(@$row1["RGASSOC"]);
	$cpf_soc  	= @$row1["CPF"];
	$insc_soc 	= @$row1["DATINSC"];
	$cate_soc	= @$row1["CATEGORIA"]." - OPOSICAO";
	$edif_soc	= @$row1["CODEDIF"];
	$nome_soc	= @$row1["NOMEASSOC"];
	$end_soc	= Trim(@$row1["RUA"])." ".Trim(@$row1["ENDRESID"]).",".Trim(@$row1["NUMERO"]);
	$cep_soc	= @$row1["CEPRES"];
	$car_tra    = @$row1["CARTTRAB"]."-".@$row1["SERIE"]."-".@$row1["EMISCART"];
	$std_res    = @$row1["ESTADORES"];

	if (!empty($id_soc)){
	
	     $add1 = "UPDATE $nome3a SET Edit1    = '$Edit1',
		                            Edit2    = '$rg_soc',
	                                Edit3    = '$cpf_soc',
	                                Edit4    = '$car_tra',
	                                Edit5    = '$nome_soc',
	                                Edit6    = '$end_soc',
	                                Edit7    = '$cep_soc',
								    Edit8    = '$std_res' WHERE Nome1 = '$nome3a'";
	
	
	}else{
		
    $Edit1 = retirar_carac($_GET["Edit1"]);
	$add1 = "UPDATE $nome3a SET Edit1    = '$Edit1' WHERE Nome1 = '$nome3a'";
		
	}
	
	@mysql_query($add1, $link);


}
if (!empty($_GET["Edit2"]))   {
	
    $Edit2 = retirar_carac($_GET["Edit2"]);
    
   // Consulta Socio

	$consulta1  = "SELECT * FROM socios    WHERE RGASSOC = '$Edit2'";
	
	$resultado1 = @mysql_query($consulta1);
	
	$row1 = mysql_fetch_array($resultado1);
	
	$id_soc		= @$row1["id"];
	$cod_soc    = @$row1["COD"];
	$new_fot    = @$row1["CODP"];
	$nu_cod	    = @$row1["NU"];
	$rg_soc     = Trim(@$row1["RGASSOC"]);
	$cpf_soc  	= @$row1["CPF"];
	$insc_soc 	= @$row1["DATINSC"];
	$cate_soc	= @$row1["CATEGORIA"]." - OPOSICAO";
	$edif_soc	= @$row1["CODEDIF"];
	$nome_soc	= @$row1["NOMEASSOC"];
	$end_soc	= Trim(@$row1["RUA"])." ".Trim(@$row1["ENDRESID"]).",".Trim(@$row1["NUMERO"]);
	$cep_soc	= @$row1["CEPRES"];
	$car_tra    = @$row1["CARTTRAB"]."-".@$row1["SERIE"]."-".@$row1["EMISCART"];
	$std_res    = @$row1["ESTADORES"];

	if (!empty($id_soc)){
	
	     $add2 = "UPDATE $nome3a SET Edit1    = '$new_fot',
		                            Edit2    = '$Edit1',
	                                Edit3    = '$cpf_soc',
	                                Edit4    = '$car_tra',
	                                Edit5    = '$nome_soc',
	                                Edit6    = '$end_soc',
	                                Edit7    = '$cep_soc',
								    Edit8    = '$std_res' WHERE Nome1 = '$nome3a'";
	
	
	}else{
		
    $Edit2 = retirar_carac($_GET["Edit2"]);
	$add2 = "UPDATE $nome3a SET Edit2    = '$Edit2' WHERE Nome1 = '$nome3a'";
		
	}
	
	@mysql_query($add2, $link);


}
if (!empty($_GET["Edit3"]))   {

	$texto_cpf = $_GET["Edit3"];
	
	$resu_t = verificaCPF($texto_cpf);

	if ($resu_t != 1){
	   $menssagem1 = "CPF digitado INVALIDO VERIFIQUE !!!";	
	}else{
		$menssagem1 = "CPF VALIDO !!!";
	}

	$eli_cpf1 = str_replace("-"," ",$texto_cpf);
	$eli_cpf2 = str_replace("."," ",$eli_cpf1);
	$valor_cpf = str_replace(" ","",$eli_cpf2);
	
   // Consulta Socio

	$consulta1  = "SELECT * FROM socios    WHERE CPF = '$valor_cpf'";
	
	$resultado1 = @mysql_query($consulta1);
	
	$row1 = mysql_fetch_array($resultado1);
	
	$id_soc		= @$row1["id"];
	$cod_soc    = @$row1["COD"];
	$new_fot    = @$row1["CODP"];
	$nu_cod	    = @$row1["NU"];
	$rg_soc     = Trim(@$row1["RGASSOC"]);
	$cpf_soc  	= @$row1["CPF"];
	$insc_soc 	= @$row1["DATINSC"];
	$cate_soc	= @$row1["CATEGORIA"]." - OPOSICAO";
	$edif_soc	= @$row1["CODEDIF"];
	$nome_soc	= @$row1["NOMEASSOC"];
	$end_soc	= Trim(@$row1["RUA"])." ".Trim(@$row1["ENDRESID"]).",".Trim(@$row1["NUMERO"]);
	$cep_soc	= @$row1["CEPRES"];
	$car_tra    = @$row1["CARTTRAB"]."-".@$row1["SERIE"]."-".@$row1["EMISCART"];
	$std_res    = @$row1["ESTADORES"];

	if (!empty($id_soc)){
	
	     $add3 = "UPDATE $nome3a SET Edit1    = '$new_fot',
		                            Edit2    = '$rg_soc',
	                                Edit3    = '$texto_cpf',
	                                Edit4    = '$car_tra',
	                                Edit5    = '$nome_soc',
	                                Edit6    = '$end_soc',
	                                Edit7    = '$cep_soc',
								    Edit8    = '$std_res',
									mensage1 = '$menssagem1' WHERE Nome1 = '$nome3a'";
	
	
	}else{
		
    $Edit3 = retirar_carac($_GET["Edit3"]);
	$add3 = "UPDATE $nome3a SET Edit3    = '$Edit3', mensage1 = '$menssagem1' WHERE Nome1 = '$nome3a'";
		
	}
	
	@mysql_query($add3, $link);


}
if (!empty($_GET["Edit4"]))   {

   $Edit4 = retirar_carac($_GET["Edit4"]);
   $add4 = "UPDATE $nome3a SET Edit4    = '$Edit4' WHERE Nome1 = '$nome3a'";
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

// Abrir tabela Ruas
$consulta   = "SELECT * FROM ruas WHERE CEP = '$Edit7'";
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
    $endereco   = retirar_carac($Logra_2)." ".retirar_carac($rua_2)." ".retirar_carac($compl_1);
    $numero     = retirar_carac($compl_1);
    $bairro     = retirar_carac($Bairro_3);
    $cidade     = retirar_carac($Cidade_2);
    $cep        = $cep_2;
    $uf         = retirar_carac($Uf_2);

    // Fim Rotina de CEP

    $Edit7 = retirar_carac($_GET["Edit7"]);
	$add7  = "UPDATE $nome3a SET Edit7     = '$Edit7',
	                            Edit6     = '$endereco',
	                            Edit8     = '$uf' WHERE Nome1 = '$nome3a'";
	@mysql_query($add7, $link);

}else{

    $Edit7 = retirar_carac($_GET["Edit7"]);
    $add7 = "UPDATE $nome3a SET Edit7    = '$Edit7' WHERE Nome1 = '$nome3a'";
    @mysql_query($add7, $link);
	
}

}
if (!empty($_GET["Edit8"]))   {

    $Edit8 = retirar_carac($_GET["Edit8"]);
    $add8 = "UPDATE $nome3a SET Edit8    = '$Edit8' WHERE Nome1 = '$nome3a'";
    @mysql_query($add8, $link);

}
// Cep
if (!empty($_GET["Edit9"]))   {

    $Edit9 = retirar_carac($_GET["Edit9"]);
	$add9  = "UPDATE $nome3a SET Edit9    = '$Edit9' WHERE Nome1 = '$nome3a'";
	@mysql_query($add9, $link);

}
// Codigo do Edificios
if (!empty($_GET["Edit10"]))  {


	$consulta10  = "SELECT * FROM edificios Where COD = '$Edit10'";
	
	$resultado10 = @mysql_query($consulta10);
	
	$row10 = @mysql_fetch_array($resultado10);
	
	$cod_edif   = @$row10["COD"];
	$cond_nome  = trim(retirar_carac(@$row10["COND"].@$row10["NOME"]));
	$cond_end   = trim(retirar_carac(@$row10["RUA"]." ".@$row10["ENDERECO"]." ".@$row10["NUMERO"]));
	$cond_cep   = trim(retirar_carac(@$row10["CEP"]));
	
	//echo $cond;
	
	$nome_do_edif = $cond;

if (!empty($cod_edif)){
	
    $Edit10 = retirar_carac($_GET["Edit10"]);
    $add10 = "UPDATE $nome3a SET Edit10    = '$Edit10',
                                Edit11    = '$cond_nome', 
                                Edit12    = '$cond_end',
                                Edit13    = '$cond_cep' WHERE Nome1 = '$nome3a'";
	                            
}else{

    $Edit10 = retirar_carac($_GET["Edit10"]);
    $add10 = "UPDATE $nome3a SET Edit10    = '$Edit10' WHERE Nome1 = '$nome3a'";
	
}	                            
    @mysql_query($add10, $link);

	
}
if (!empty($_GET["Edit11"]))  {

    $Edit11 = retirar_carac($_GET["Edit11"]);
	$add11 = "UPDATE $nome3a SET Edit11    = '$Edit11' WHERE Nome1 = '$nome3a'";
	@mysql_query($add11, $link);

}
// CNPJ
if (!empty($_GET["Edit12"]))  {

    $Edit12 = retirar_carac($_GET["Edit12"]);
	$add12 = "UPDATE $nome3a SET Edit12    = '$Edit12' WHERE Nome1 = '$nome3a'";
	@mysql_query($add12, $link);

}
if (!empty($_GET["Edit13"]))  {

// Abrir tabela Ruas
$consulta   = "SELECT * FROM ruas WHERE CEP = '$Edit13'";
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
    $endereco   = retirar_carac($Logra_2)." ".retirar_carac($rua_2)." ".retirar_carac($compl_1);
    $numero     = retirar_carac($compl_1);
    $bairro     = retirar_carac($Bairro_3);
    $cidade     = retirar_carac($Cidade_2);
    $cep        = $cep_2;
    $uf         = retirar_carac($Uf_2);

    // Fim Rotina de CEP

    $Edit13 = retirar_carac($_GET["Edit13"]);
	$add13  = "UPDATE $nome3a SET Edit13     = '$Edit13',
	                             Edit12     = '$endereco' WHERE Nome1 = '$nome3a'";
	@mysql_query($add13, $link);

}else{

    $Edit13 = retirar_carac($_GET["Edit13"]);
	$add13 = "UPDATE $nome3a SET Edit13    = '$Edit13' WHERE Nome1 = '$nome3a'";
	@mysql_query($add13, $link);
	
}

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
if (!empty($_GET["Edit16"]))  {
	
    $Edit16 = retirar_carac($_GET["Edit16"]);
	$add16 = "UPDATE $nome3a SET Edit16    = '$Edit16' WHERE Nome1 = '$nome3a'";
	@mysql_query($add16, $link);
}	
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
// Adms
if (!empty($_GET["Edit19"]))  {


	$consulta19  = "SELECT * FROM cadadv Where CODIGO = '$Edit19'";
	
	$resultado19 = @mysql_query($consulta19);
	
	$row19 = @mysql_fetch_array($resultado19);
	
	$adv_nome  = trim(retirar_carac(@$row19["NOME"]));
	
	//echo $adv_nome;
	
if (!empty($adv_nome)){
	
    $Edit19 = retirar_carac($_GET["Edit19"]);
    $add19 = "UPDATE $nome3a SET Edit19    = '$Edit19',
                                Edit22    = '$adv_nome' WHERE Nome1 = '$nome3a'";
	                            
}else{

    $Edit19 = retirar_carac($_GET["Edit19"]);
    $add19 = "UPDATE $nome3a SET Edit19    = '$Edit19' WHERE Nome1 = '$nome3a'";
	
}	                            
    @mysql_query($add19, $link);

}
if (!empty($_GET["Edit20"]))  {

    $Edit20 = $_GET["Edit20"];
	$add20 = "UPDATE $nome3a SET Edit20    = '$Edit20' WHERE Nome1 = '$nome3a'";
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

	$consulta25  = "SELECT * FROM cadadv Where CODIGO = '$Edit25'";
	
	$resultado25 = @mysql_query($consulta25);
	
	$row25 = @mysql_fetch_array($resultado25);
	
	$adv_nome  = trim(retirar_carac(@$row25["NOME"]));
	
if (!empty($adv_nome)){
	
    $Edit25 = retirar_carac($_GET["Edit25"]);
    $add25 = "UPDATE $nome3a SET Edit25    = '$Edit25',
                                Edit28    = '$adv_nome' WHERE Nome1 = '$nome3a'";
	                            
}else{

    $Edit25 = retirar_carac($_GET["Edit25"]);
    $add25 = "UPDATE $nome3a SET Edit25    = '$Edit25' WHERE Nome1 = '$nome3a'";
	
}	                            
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

if (!empty($_GET["Edit29"]))  {

    $Edit29 = $_GET["Edit29"];
	$add29 = "UPDATE $nome3a SET Edit29    = '$Edit29' WHERE Nome1 = '$nome3a'";
	@mysql_query($add29, $link);
}

include("layout_edif.php");

// Função que valida o CNPJ

// Função que valida o CPF
function verificaCPF($cpf)
{	// Verifiva se o número digitado contém todos os digitos
    $cpf = str_pad(@ereg_replace('[^0-9]', '', $cpf), 11, '0', STR_PAD_LEFT);
	
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

$var = @ereg_replace("[ÁÀÂÃ]",      "A",$var);
$var = @ereg_replace("[áàâãª]",     "a",$var);
$var = @ereg_replace("[ÉÈÊ]",       "E",$var);
$var = @ereg_replace("[éèê]",       "e",$var);
$var = @ereg_replace("[ÓÒÔÕ]",      "O",$var);
$var = @ereg_replace("[óòôõº]",     "o",$var);
$var = @ereg_replace("[ÚÙÛ]",       "U",$var);
$var = @ereg_replace("[úùû]",       "u",$var);
$var = @ereg_replace("[íìî]",       "i",$var);
$var = @ereg_replace("[ÍÌÎ]",       "I",$var);
$var = @ereg_replace("[?*#'´`!$%¨]"," ",$var);
$var = str_replace("Ç",            "C",$var);
$var = str_replace("ç",            "c",$var);
$var = str_replace("\\",           " ",$var);

return($var);
}

?>
