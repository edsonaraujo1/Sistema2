<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Excluir Cadastro Empresa
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

require($path."logar.php");
$nome3 = $_SESSION["nome_log"];

require("menu.php");

?>

<html>
<head>
<title><?=$Titulo;?></title>
</head>
<body>

<?


// Resgata Sessao
session_name("Val_Socio");
session_start();

$Edit1 		= strtoupper($_SESSION['cod']);
$Edit2 		= strtoupper($_SESSION['nu']);
$Edit3 		= strtoupper($_SESSION['rgassoc']);
$Edit4 		= strtoupper($_SESSION['cpf']);
$Edit5 		= strtoupper($_SESSION['datinsc']);
$Edit6 		= strtoupper($_SESSION['dat2']);
$Edit7 		= strtoupper($_SESSION['dat3']);
$Edit8 		= strtoupper($_SESSION['sede']);
$Edit9 		= strtoupper($_SESSION['categoria']);
$Edit10		= strtoupper($_SESSION['codedif']);
$Edit11		= strtoupper($_SESSION['nomeassoc']);
$Edit12		= strtoupper($_SESSION['rua']);
$Edit13		= strtoupper($_SESSION['endresid']);
$Edit14		= strtoupper($_SESSION['numero']);
$Edit15		= strtoupper($_SESSION['bairrores']);
$Edit16		= strtoupper($_SESSION['cepres']);
$Edit17		= strtoupper($_SESSION['cidaderes']);
$Edit18		= strtoupper($_SESSION['estadores']);
$Edit19		= strtoupper($_SESSION['telefone']);
$Edit20		= strtoupper($_SESSION['carttrab']);
$Edit21		= strtoupper($_SESSION['serie']);
$Edit22		= strtoupper($_SESSION['emiscart']);
$Edit23		= strtoupper($_SESSION['cargoassoc']);
$Edit24		= strtoupper($_SESSION['datadimis']);
$Edit25		= strtoupper($_SESSION['estcivil']);
$Edit26		= strtoupper($_SESSION['numdep']);
$Edit27		= strtoupper($_SESSION['mes']);
$Edit28		= strtoupper($_SESSION['ano']);
$Edit29		= strtoupper($_SESSION['cad_si']);
$Edit30		= strtoupper($_SESSION['saldo']);
$Edit31		= strtoupper($_SESSION['prest']);
$Edit32		= strtoupper($_SESSION['pago']);
$Edit33		= strtoupper($_SESSION['natural']);
$Edit34		= strtoupper($_SESSION['datnasc']);
$Edit35		= strtoupper($_SESSION['nascion']);
$Edit36		= strtoupper($_SESSION['pai']);
$Edit37		= strtoupper($_SESSION['mae']);
$Edit38		= strtoupper($_SESSION['conjuge']);
$Edit39		= strtoupper($_SESSION['datconj']);
$Edit40		= strtoupper($_SESSION['filho01']);
$Edit41		= strtoupper($_SESSION['dat01']);
$Edit42		= strtoupper($_SESSION['sexo01']);
$Edit43		= strtoupper($_SESSION['filho02']);
$Edit44		= strtoupper($_SESSION['dat02']);
$Edit45		= strtoupper($_SESSION['sexo02']);
$Edit46		= strtoupper($_SESSION['filho03']);
$Edit47		= strtoupper($_SESSION['dat03']);
$Edit48		= strtoupper($_SESSION['sexo03']);
$Edit49		= strtoupper($_SESSION['filho04']);
$Edit50		= strtoupper($_SESSION['dat04']);
$Edit51		= strtoupper($_SESSION['sexo04']);
$Edit52		= strtoupper($_SESSION['filho05']);
$Edit53		= strtoupper($_SESSION['dat05']);
$Edit54		= strtoupper($_SESSION['sexo05']);
$Edit55		= strtoupper($_SESSION['filho06']);
$Edit56		= strtoupper($_SESSION['dat06']);
$Edit57		= strtoupper($_SESSION['sexo06']);
$Edit58		= strtoupper($_SESSION['filho07']);
$Edit59		= strtoupper($_SESSION['dat07']);
$Edit60		= strtoupper($_SESSION['sexo07']);
$Edit61		= strtoupper($_SESSION['filho08']);
$Edit62		= strtoupper($_SESSION['dat08']);
$Edit63		= strtoupper($_SESSION['sexo08']);
$Edit64		= strtoupper($_SESSION['filho09']);
$Edit65		= strtoupper($_SESSION['dat09']);
$Edit66		= strtoupper($_SESSION['sexo09']);
$Edit67		= strtoupper($_SESSION['filho10']);
$Edit68		= strtoupper($_SESSION['dat10']);
$Edit69		= strtoupper($_SESSION['sexo10']);
$Edit70		= strtoupper($_SESSION['obs']);

$menssagem = "*** Excluido ***";


// Abre Conexão com o MySql
include($path."conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass)
        or

die("
     <br>
     <br>
     
	 <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='#4682B4'>
     <tr>
     <td>
     <font face=arial><b>*** Não foi possivel conectar !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

@mysql_select_db($db)
        or

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='#4682B4'>
     <tr>
     <td>
     <font face=arial><b>*** Não Foi possivel selecionar o banco de dados !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

// retorna uma pesquisa

$Cod_p = Trim($cod.$nu);

$consulta = "DELETE FROM socios WHERE id = '$Cod_2'";

@mysql_query($consulta, $link);

$consulta  = "SELECT * FROM socios ORDER BY COD ASC LIMIT 0,50";

$resultado = @mysql_query($consulta);

$row = mysql_fetch_array($resultado);

$id			= @$row["id"];
$Edit1		= @$row["COD"];
$Edit2	    = @$row["NU"];
$Edit3      = Trim(@$row["RGASSOC"]);
$Edit4  	= @$row["CPF"];
$Edit5  	= @$row["DATINSC"];
$Edit6		= @$row["DAT2"];
$Edit7		= @$row["DAT3"];
$Edit8		= @$row["SEDE"];
$Edit9		= @$row["CATEGORIA"];
$Edit10		= @$row["CODEDIF"];
$Edit11		= @$row["NOMEASSOC"];
$Edit12		= @$row["RUA"];
$Edit13 	= @$row["ENDRESID"];
$Edit14		= @$row["NUMERO"];
$Edit15		= @$row["BAIRRORES"];
$Edit16		= @$row["CEPRES"];
$Edit17		= @$row["CIDADERES"];
$Edit18		= @$row["ESTADORES"];
$Edit19		= @$row["TELEFONE"];
$Edit20		= @$row["CARTTRAB"];
$Edit21		= @$row["SERIE"];
$Edit22		= @$row["EMISCART"];
$Edit23		= @$row["CARGOASSOC"];
$Edit24		= @$row["DATADIMIS"];
$Edit25		= @$row["ESTCIVIL"];
$Edit26		= @$row["NUMDEP"];
$Edit27		= @$row["MES"];
$Edit28		= @$row["ANO"];
$Edit29		= @$row["CAD_SI"];
$Edit30		= @$row["SALDO"];
$Edit31		= @$row["PREST"];
$Edit32		= @$row["PAGO"];
$Edit33		= @$row["CRIACAO"];
$Edit34		= @$row["DATNASC"];
$Edit35		= @$row["NASCION"];
$Edit36		= @$row["PAI"];
$Edit37		= @$row["MAE"];
$Edit38		= @$row["CONJUGE"];
$Edit39		= @$row["DATCONJ"];
$Edit40		= @$row["FILHO01"];
$Edit41		= @$row["DAT01"];
$Edit42		= @$row["SEXO01"];
$Edit43		= @$row["FILHO02"];
$Edit44		= @$row["DAT02"];
$Edit45		= @$row["SEXO02"];
$Edit46		= @$row["FILHO03"];
$Edit47		= @$row["DAT03"];
$Edit48		= @$row["SEXO03"];
$Edit49		= @$row["FILHO04"];
$Edit50		= @$row["DAT04"];
$Edit51		= @$row["SEXO04"];
$Edit52		= @$row["FILHO05"];
$Edit53		= @$row["DAT05"];
$Edit54		= @$row["SEXO05"];
$Edit55		= @$row["FILHO06"];
$Edit56		= @$row["DAT06"];
$Edit57		= @$row["SEXO06"];
$Edit58		= @$row["FILHO07"];
$Edit59		= @$row["DAT07"];
$Edit60		= @$row["SEXO07"];
$Edit61		= @$row["FILHO08"];
$Edit62		= @$row["DAT08"];
$Edit63		= @$row["SEXO08"];
$Edit64 	= @$row["FILHO09"];
$Edit65		= @$row["DAT09"];
$Edit66		= @$row["SEXO09"];
$Edit67		= @$row["FILHO10"];
$Edit68		= @$row["DAT10"];
$Edit69		= @$row["SEXO10"];
$Edit70		= @$row["OBS"];


// Abrir tabela Senha

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado3 = @mysql_query($consulta3);

$row3 = mysql_fetch_array($resultado3);

$soc1       = @$row3["soc1"];
$soc2       = @$row3["soc2"];
$soc3       = @$row3["soc3"];

// Abrir Table de Edificios

$consulta4  = "SELECT * FROM edificios Where COD = '$Edit10'";

$resultado4 = @mysql_query($consulta4);

$row4 = @mysql_fetch_array($resultado4);

$cod_edif   = @$row4["COD"];
$cond  = trim(@$row4["COND"].@$row4["NOME"]);
$edif  = trim(@$row4["NOME"]);

$nome_do_edif = $cond;

// Abre Tabela Categoria

$consulta5  = "SELECT * FROM categ Where CODIGO = '$Edit9'";

$resultado5 = @mysql_query($consulta5);

$row5 = @mysql_fetch_array($resultado5);

$categ_1   = @$row5["DESCRICAO"];


			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = $menssagem."/".$Cod_2;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);

?>

<html>


<style type=text/css>

body { background-image: url(<?=$logo_sis;?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
--></style>

</HEAD>
<BODY text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0 leftmargin=0 bottommargin=0>

<?
require("soclayout.php");
?>


</body>
</html>
