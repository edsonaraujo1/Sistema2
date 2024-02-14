<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Cadastro de Socios
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

require($path."logar.php");
$nome3 = $_SESSION["nome_log"];

$faz = 0;

// Resgata Sessao
session_name("Val_Socio");
session_start();

$Edit1 		= $_SESSION['cod'];
$Edit2 		= $_SESSION['nu'];
$Edit3 		= $_SESSION['rgassoc'];
$Edit4 		= $_SESSION['cpf'];
$Edit5 		= $_SESSION['datinsc'];
$Edit6 		= $_SESSION['dat2'];
$Edit7 		= $_SESSION['dat3'];
$Edit8 		= $_SESSION['sede'];
$Edit9 		= $_SESSION['categoria'];
$Edit10		= $_SESSION['codedif'];
$Edit11		= $_SESSION['nomeassoc'];
$Edit12		= $_SESSION['rua'];
$Edit13		= $_SESSION['endresid'];
$Edit14		= $_SESSION['numero'];
$Edit15		= $_SESSION['bairrores'];
$Edit16		= $_SESSION['cepres'];
$Edit17		= $_SESSION['cidaderes'];
$Edit18		= $_SESSION['estadores'];
$Edit19		= $_SESSION['telefone'];
$Edit20		= $_SESSION['carttrab'];
$Edit21		= $_SESSION['serie'];
$Edit22		= $_SESSION['emiscart'];
$Edit23		= $_SESSION['cargoassoc'];
$Edit24		= $_SESSION['datadimis'];
$Edit25		= $_SESSION['estcivil'];
$Edit26		= $_SESSION['numdep'];
$Edit27		= $_SESSION['mes'];
$Edit28		= $_SESSION['ano'];
$Edit29		= strtoupper($_SESSION['cad_si']);
$Edit30		= $_SESSION['saldo'];
$Edit31		= $_SESSION['prest'];
$Edit32		= $_SESSION['pago'];
$Edit33		= $_SESSION['natural'];
$Edit34		= $_SESSION['datnasc'];
$Edit35		= $_SESSION['nascion'];
$Edit36		= $_SESSION['pai'];
$Edit37		= $_SESSION['mae'];
$Edit38		= $_SESSION['conjuge'];
$Edit39		= $_SESSION['datconj'];
$Edit40		= $_SESSION['filho01'];
$Edit41		= $_SESSION['dat01'];
$Edit42		= $_SESSION['sexo01'];
$Edit43		= $_SESSION['filho02'];
$Edit44		= $_SESSION['dat02'];
$Edit45		= $_SESSION['sexo02'];
$Edit46		= $_SESSION['filho03'];
$Edit47		= $_SESSION['dat03'];
$Edit48		= $_SESSION['sexo03'];
$Edit49		= $_SESSION['filho04'];
$Edit50		= $_SESSION['dat04'];
$Edit51		= $_SESSION['sexo04'];
$Edit52		= $_SESSION['filho05'];
$Edit53		= $_SESSION['dat05'];
$Edit54		= $_SESSION['sexo05'];
$Edit55		= $_SESSION['filho06'];
$Edit56		= $_SESSION['dat06'];
$Edit57		= $_SESSION['sexo06'];
$Edit58		= $_SESSION['filho07'];
$Edit59		= $_SESSION['dat07'];
$Edit60		= $_SESSION['sexo07'];
$Edit61		= $_SESSION['filho08'];
$Edit62		= $_SESSION['dat08'];
$Edit63		= $_SESSION['sexo08'];
$Edit64		= $_SESSION['filho09'];
$Edit65		= $_SESSION['dat09'];
$Edit66		= $_SESSION['sexo09'];
$Edit67		= $_SESSION['filho10'];
$Edit68		= $_SESSION['dat10'];
$Edit69		= $_SESSION['sexo10'];
$Edit70		= $_SESSION['obs'];

// Abre Conexão com o MySql
include($path."conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

mysql_select_db($db);

// Abre Tabela Socios

$resultado1 = str_replace('.','',$Cpf_2x);
$Cpf_2x     = str_replace('-','',$resultado1);

$consulta  = "SELECT * FROM socios    WHERE CPF = '$Cpf_2x'";

$resultado = @mysql_query($consulta);

$row = mysql_fetch_array($resultado);

$id         = @$row["id"];
$cod_so		= @$row["COD"];
$cpf        = @$row["CPF"];

// salva Secao
session_start();
$_SESSION['cod_id'] = $id;

if (!empty($cod_so)){

	?>	
		<script LANGUAGE='JavaScript'>
		<!--
		alert("CPF já Cadastrado VERIFIQUE !!!");
		//-->
		</script>
	<?

	// Resgata a Sessao
	session_start();
	$Cod_xxx = strtoupper($_SESSION['cod_id']);

    require_once("cadsocios.php");
	exit;
	}

// Abre Tabela Oposicao

$consulta6  = "SELECT * FROM oposicao3 Where CPF = '$Cpf_2x'";

$resultado6 = @mysql_query($consulta6);

$row6 = mysql_fetch_array($resultado6);

$cod_opo = @$row6["COD"];
$cpf_opo  = @$row6["RGASSOC"];

if (strlen(ltrim($cod_opo)) > 0){
	?>	
		<script LANGUAGE='JavaScript'>
		<!--
		alert("Verifique com carta de OPOSIÇÃO !!!");
		//-->
		</script>
	<?
	$faz = 1;	
    require("cadsocios.php");
	
	}

if ($faz == 0)
{
    require("menu.php");
    require("soclayout3.php");
	
}

?>


</body>
</html>