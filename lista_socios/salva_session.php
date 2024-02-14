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

	$consulta1  = "SELECT * FROM edificios Where CGC = '$Edit1'";
	
	$resultado1 = @mysql_query($consulta1);
	
	$row1 = @mysql_fetch_array($resultado1);
	
	$cod_edif   = @$row1["COD"];
	$cond_nome  = trim(retirar_carac(@$row1["COND"].@$row1["NOME"]));
	$cond_end   = trim(retirar_carac(@$row1["RUA"]." ".@$row1["ENDERECO"]." ".@$row1["NUMERO"]));
	$cond_cep   = trim(retirar_carac(@$row1["CEP"]));
	
	//echo $cond;
	
	$nome_do_edif = $cond_nome;

if (!empty($cod_edif)){
	
    $Edit1 = retirar_carac($_GET["Edit1"]);
    $add1 = "UPDATE $nome3a SET Edit1     = '$Edit1',
                                mensage3  = '$cond_nome', 
                                Edit4     = '$cod_edif' WHERE Nome1 = '$nome3a'";
	                            
}else{

    $Edit1 = retirar_carac($_GET["Edit1"]);
    $add1 = "UPDATE $nome3a SET Edit1    = '$Edit1' WHERE Nome1 = '$nome3a'";
	
}	                            
    @mysql_query($add1, $link);

	
}

include("layout_edif.php");

// Função que valida o CNPJ

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
$var = str_replace("\\",           " ",$var);

return($var);
}

?>
