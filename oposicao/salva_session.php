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
if (!empty($_GET["Edit3"]))   {

    $Edit3 = retirar_carac($_GET["Edit3"]);
    $add3 = "UPDATE $nome3a SET Edit3    = '$Edit3'  WHERE Nome1 = '$nome3a'";
    @mysql_query($add3, $link);

}
if (!empty($_GET["Edit4"]))   {

$texto_rg = $_GET["Edit4"];

$eli_rg1 = str_replace("-"," ",$texto_rg);
$eli_rg2 = str_replace("."," ",$eli_rg1);
$valor_rg = str_replace(" ","",$eli_rg2);
	
// Verifica se o Candidato ja esta Cadastrado

$consulta8  = "SELECT * FROM socios    WHERE RGASSOC = '$valor_rg'";

$resultado8 = @mysql_query($consulta8);

$row8 = mysql_fetch_array($resultado8);

$id			= @$row8["id"];
$cod_soc    = @$row8["COD"];
$new_fot    = @$row8["CODP"];
$nu_cod	    = @$row8["NU"];
$rg_soc     = Trim(@$row8["RGASSOC"]);
$cpf_soc  	= @$row8["CPF"];
$insc_soc 	= @$row8["DATINSC"];
$cate_soc	= @$row8["CATEGORIA"];
$edif_soc	= @$row8["CODEDIF"];
$nome_soc	= @$row8["NOMEASSOC"];
$end_soc	= Trim(@$row8["RUA"])." ".Trim(@$row8["ENDRESID"]).",".Trim(@$row8["NUMERO"]);
$cep_soc	= @$row8["CEPRES"];

if (!empty($id)){

    $Edit4 = retirar_carac($_GET["Edit4"]);
    $add4 = "UPDATE $nome3a SET Edit6    = '$new_fot',
                               Edit4    = '$Edit4',
                               Edit5    = '$cpf_soc',
                               Edit7    = '$cate_soc',
                               Edit11   = '$edif_soc',
                               Edit8    = '$nome_soc',
							   Edit9    = '$end_soc',
							   Edit10   = '$cep_soc' WHERE Nome1 = '$nome3a'";


}else{

    $Edit4 = retirar_carac($_GET["Edit4"]);
    $add4 = "UPDATE $nome3a SET Edit4    = '$Edit4' WHERE Nome1 = '$nome3a'";

}							   
    @mysql_query($add4, $link);

}
// Consulta CPF
if (!empty($_GET["Edit5"]))   {

$texto_cpf = $_GET["Edit5"];

$resu_t = verificaCPF($texto_cpf);

	if ($resu_t != 1){
	   $menssagem1 = "CPF digitado INVALIDO VERIFIQUE !!!";	
	}

$eli_cpf1 = str_replace("-"," ",$texto_cpf);
$eli_cpf2 = str_replace("."," ",$eli_cpf1);
$valor_cpf = str_replace(" ","",$eli_cpf2);
	
// Verifica se o Candidato ja esta Cadastrado

$consulta9  = "SELECT * FROM socios    WHERE CPF = '$valor_cpf'";

$resultado9 = @mysql_query($consulta9);

$row9 = @mysql_fetch_array($resultado9);

$id			= @$row9["id"];
$cod_soc    = @$row9["COD"];
$new_fot    = @$row9["CODP"];
$nu_cod	    = @$row9["NU"];
$rg_soc     = Trim(@$row9["RGASSOC"]);
$cpf_soc  	= @$row9["CPF"];
$insc_soc 	= @$row9["DATINSC"];
$cate_soc	= @$row9["CATEGORIA"];
$edif_soc	= @$row9["CODEDIF"];
$nome_soc	= @$row9["NOMEASSOC"];
$end_soc	= Trim(@$row9["RUA"])." ".Trim(@$row9["ENDRESID"]).",".Trim(@$row9["NUMERO"]);
$cep_soc	= @$row9["CEPRES"];

if (!empty($id)){

    $Edit5 = retirar_carac($_GET["Edit5"]);

//echo $valor_cpf."<br>";
//echo $cod_soc."<br>";
//echo $Edit5."<br>";
//echo $cate_soc."<br>";
//echo $nome_soc."<br>";


    $add5 = "UPDATE $nome3a SET Edit6    = '$new_fot',
                               Edit4    = '$rg_soc',
                               Edit5    = '$Edit5',
                               Edit7    = '$cate_soc',
                               Edit11   = '$edif_soc',
                               Edit8    = '$nome_soc',
							   Edit9    = '$end_soc',
							   Edit10   = '$cep_soc',
							   mensage1 = '$menssagem1' WHERE Nome1 = '$nome3a'";


//    $add5 = "UPDATE $nome3a SET Edit6    = '$new_fot',
 //                              Edit4    = '$rg_soc,
 //                              Edit5    = '$Edit5',
 //                              Edit7    = '$cate_soc',
 //                              Edit11   = '$edif_soc',
 //                              Edit8    = '$nome_soc',
//							   Edit9    = '$end_soc',
//							   Edit10   = '$cep_soc',
//							   mensage1 = '$menssagem1' WHERE Nome1 = '$nome3a'";


}else{
	
    $Edit5 = retirar_carac($_GET["Edit5"]);
    $add5 = "UPDATE $nome3a SET Edit5    = '$Edit5',
	                           mensage1 = '$menssagem1' WHERE Nome1 = '$nome3a'";
	
}
    @mysql_query($add5, $link);

}
if (!empty($_GET["Edit6"]))   {

    $Edit6 = retirar_carac($_GET["Edit6"]);
   
    // Consulta Socio

	$consulta10  = "SELECT * FROM socios    WHERE CODP = '$Edit6'";
	
	$resultado10 = @mysql_query($consulta10);
	
	$row10 = mysql_fetch_array($resultado10);
	
	$id_soc		= @$row10["id"];
	$cod_soc    = @$row10["COD"];
	$new_fot    = @$row10["CODP"];
	$nu_cod	    = @$row10["NU"];
	$rg_soc     = Trim(@$row10["RGASSOC"]);
	$cpf_soc  	= @$row10["CPF"];
	$insc_soc 	= @$row10["DATINSC"];
	$cate_soc	= @$row10["CATEGORIA"]." - OPOSICAO";
	$edif_soc	= @$row10["CODEDIF"];
	$nome_soc	= @$row10["NOMEASSOC"];
	$end_soc	= Trim(@$row10["RUA"])." ".Trim(@$row10["ENDRESID"]).",".Trim(@$row10["NUMERO"]);
	$cep_soc	= @$row10["CEPRES"];



	if (!empty($id_soc)){
	
	     $add6 = "UPDATE $nome3a SET Edit6    = '$Edit6',
	                                Edit4    = '$rg_soc',
	                                Edit5    = '$cpf_soc',
	                                Edit7    = '$cate_soc',
	                                Edit11   = '$edif_soc',
	                                Edit8    = '$nome_soc',
								    Edit9    = '$end_soc',
								    Edit10   = '$cep_soc' WHERE Nome1 = '$nome3a'";
	
	
	}else{
		
	    $Edit6 = retirar_carac($_GET["Edit6"]);
		$add6 = "UPDATE $nome3a SET Edit6   = '$Edit6' WHERE Nome1 = '$nome3a'";
		
	}
	
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
if (!empty($_GET["Edit9"]))   {

    $Edit9 = retirar_carac($_GET["Edit9"]);
    $add9 = "UPDATE $nome3a SET Edit9    = '$Edit9' WHERE Nome1 = '$nome3a'";
    @mysql_query($add9, $link);

}
if (!empty($_GET["Edit10"]))   {

    $Edit10 = retirar_carac($_GET["Edit10"]);
    $add10 = "UPDATE $nome3a SET Edit10    = '$Edit10' WHERE Nome1 = '$nome3a'";
    @mysql_query($add10, $link);

}
if (!empty($_GET["Edit11"]))   {

$consulta10  = "SELECT * FROM edificios Where COD = '$Edit11'";

$resultado10 = @mysql_query($consulta10);

$row10 = @mysql_fetch_array($resultado10);

$cod_edif   = @$row10["COD"];
$cond  = trim(retirar_carac(@$row10["COND"].@$row10["NOME"]));
$Cnpj_Edif  = @$row10["CGC"];

//echo $cond;

$nome_do_edif = $cond;

if (!empty($cod_edif)){
	
    $Edit11 = retirar_carac($_GET["Edit11"]);
    $add11 = "UPDATE $nome3a SET Edit11    = '$Edit11',
                                Edit12    = '$Cnpj_Edif', 
	                            mensage2  = '$cond' WHERE Nome1 = '$nome3a'";
	                            
}else{

    $Edit11 = retirar_carac($_GET["Edit11"]);
    $add11 = "UPDATE $nome3a SET Edit11    = '$Edit11' WHERE Nome1 = '$nome3a'";
	
}	                            
    @mysql_query($add11, $link);

}
if (!empty($_GET["Edit12"]))   {

//$Edit12 = $_GET["Edit12"];

$consulta12  = "SELECT * FROM edificios Where CGC = '$Edit12'";

$resultado12 = @mysql_query($consulta12);

$row12 = @mysql_fetch_array($resultado12);

$cod_edif   = @$row12["COD"];
$cond  = trim(retirar_carac(@$row12["COND"].@$row12["NOME"]));
$Cnpj_Edif  = @$row12["CGC"];

$nome_do_edif = $cond;

if (!empty($cod_edif)){
	
    $Edit12 = retirar_carac($_GET["Edit12"]);
    $add12 = "UPDATE $nome3a SET Edit12    = '$Edit12',
                                Edit11    = '$cod_edif',
	                            mensage2  = '$cond' WHERE Nome1 = '$nome3a'";
	                            
}else{

    $Edit12 = retirar_carac($_GET["Edit12"]);
    $add12 = "UPDATE $nome3a SET Edit12    = '$Edit12' WHERE Nome1 = '$nome3a'";
	
}	                            

    @mysql_query($add12, $link);

}
if (!empty($_GET["Edit13"]))   {

    $consulta13  = "SELECT * FROM adms WHERE cod = '$Edit13'";

    $resultado13 = @mysql_query($consulta13);

    $row13 = @mysql_fetch_array($resultado13);

    $Cod_adms   = @$row13["cod"];
    $Nome_adms  = trim(retirar_carac(@$row13["nomeadm"]));
    $Cnpj_Adms  = @$row13["cgc"];

if (!empty($Cod_adms)){
	
    $Edit13 = retirar_carac($_GET["Edit13"]);
    $add13 = "UPDATE $nome3a SET Edit13    = '$Edit13',
                                Edit14    = '$Cnpj_Adms',
	                            mensage3  = '$Nome_adms' WHERE Nome1 = '$nome3a'";
	
}else{

    $Edit13 = retirar_carac($_GET["Edit13"]);
    $add13 = "UPDATE $nome3a SET Edit13    = '$Edit13' WHERE Nome1 = '$nome3a'";
	
}    
    @mysql_query($add13, $link);

}
if (!empty($_GET["Edit14"]))   {

    $consulta14  = "SELECT * FROM adms WHERE cgc = '$Edit14'";

    $resultado14 = @mysql_query($consulta14);

    $row14 = @mysql_fetch_array($resultado14);

    $Cod_adms   = @$row14["cod"];
    $Nome_adms  = trim(retirar_carac(@$row14["nomeadm"]));
    $Cnpj_Adms  = @$row14["cgc"];

if (!empty($Cod_adms)){
	
    $Edit14 = retirar_carac($_GET["Edit14"]);
    $add14 = "UPDATE $nome3a SET Edit13    = '$Cod_adms',
                                Edit14    = '$Cnpj_Adms',
	                            mensage3  = '$Nome_adms' WHERE Nome1 = '$nome3a'";
	
}else{

    $Edit14 = retirar_carac($_GET["Edit14"]);
    $add14 = "UPDATE $nome3a SET Edit14    = '$Edit14' WHERE Nome1 = '$nome3a'";

}

    @mysql_query($add14, $link);

}
if (!empty($_GET["Edit15"]))   {

    $Edit15 = retirar_carac($_GET["Edit15"]);
    $add15 = "UPDATE $nome3a SET memo1    = '$Edit15' WHERE Nome1 = '$nome3a'";
    @mysql_query($add15, $link);

}

include("layout_opo.php");

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

$var = ereg_replace("[ÁÀÂÃ]",      "A",$var);
$var = ereg_replace("[áàâãª]",     "a",$var);
$var = ereg_replace("[ÉÈÊ]",       "E",$var);
$var = ereg_replace("[éèê]",       "e",$var);
$var = ereg_replace("[ÓÒÔÕ]",      "O",$var);
$var = ereg_replace("[óòôõº]",     "o",$var);
$var = ereg_replace("[ÚÙÛ]",       "U",$var);
$var = ereg_replace("[úùû]",       "u",$var);
$var = ereg_replace("[íìî]",       "i",$var);
$var = ereg_replace("[ÍÌÎ]",       "I",$var);
$var = ereg_replace("[?*#'´`!$%¨]"," ",$var);
$var = str_replace("Ç",            "C",$var);
$var = str_replace("ç",            "c",$var);

return($var);
}

?>