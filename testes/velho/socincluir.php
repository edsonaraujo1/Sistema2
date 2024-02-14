<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Incluir Cadastro Socios
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

session_start();

unset ($_SESSION['cod']);
unset ($_SESSION['nu']);
unset ($_SESSION['rgassoc']);
unset ($_SESSION['cpf']);
unset ($_SESSION['datinsc']);
unset ($_SESSION['dat2']);
unset ($_SESSION['dat3']);
unset ($_SESSION['sede']);
unset ($_SESSION['categoria']);
unset ($_SESSION['codedif']);
unset ($_SESSION['nomeassoc']);
unset ($_SESSION['rua']);
unset ($_SESSION['endresid']);
unset ($_SESSION['numero']);
unset ($_SESSION['bairrores']);
unset ($_SESSION['cepres']);
unset ($_SESSION['cidaderes']);
unset ($_SESSION['estadores']);
unset ($_SESSION['telefone']);
unset ($_SESSION['carttrab']);
unset ($_SESSION['serie']);
unset ($_SESSION['emiscart']);
unset ($_SESSION['cargoassoc']);
unset ($_SESSION['datadimis']);
unset ($_SESSION['estcivil']);
unset ($_SESSION['numdep']);
unset ($_SESSION['mes']);
unset ($_SESSION['ano']);
unset ($_SESSION['cad_si']);
unset ($_SESSION['saldo']);
unset ($_SESSION['prest']);
unset ($_SESSION['pago']);
unset ($_SESSION['natural']);
unset ($_SESSION['datnasc']);
unset ($_SESSION['nascion']);
unset ($_SESSION['pai']);
unset ($_SESSION['mae']);
unset ($_SESSION['conjuge']);
unset ($_SESSION['datconj']);
unset ($_SESSION['filho01']);
unset ($_SESSION['dat01']);
unset ($_SESSION['sexo01']);
unset ($_SESSION['filho02']);
unset ($_SESSION['dat02']);
unset ($_SESSION['sexo02']);
unset ($_SESSION['filho03']);
unset ($_SESSION['dat03']);
unset ($_SESSION['sexo03']);
unset ($_SESSION['filho04']);
unset ($_SESSION['dat04']);
unset ($_SESSION['sexo04']);
unset ($_SESSION['filho05']);
unset ($_SESSION['dat05']);
unset ($_SESSION['sexo05']);
unset ($_SESSION['filho06']);
unset ($_SESSION['dat06']);
unset ($_SESSION['sexo06']);
unset ($_SESSION['filho07']);
unset ($_SESSION['dat07']);
unset ($_SESSION['sexo07']);
unset ($_SESSION['filho08']);
unset ($_SESSION['dat08']);
unset ($_SESSION['sexo08']);
unset ($_SESSION['filho09']);
unset ($_SESSION['dat09']);
unset ($_SESSION['sexo09']);
unset ($_SESSION['filho10']);
unset ($_SESSION['dat10']);
unset ($_SESSION['sexo10']);
unset ($_SESSION['obs']);

// Abre Conexão com o MySql
include($path."conexao.php");
// Chama o Banco de Dados

//include("funcoes2.php");

$link = @mysql_connect($host,$user,$pass);

mysql_select_db($db);

// Abrir tabela Socios

$consulta  = "SELECT * FROM socios ORDER BY COD DESC LIMIT 0,1";

$resultado = @mysql_query($consulta);

// Incrementa novo codigo

$row = mysql_fetch_array($resultado);

$id       = @$row["id"];
$cod_2    = @$row["COD"];

$novo_1 = $cod_2+1;
$dat_insc = date("d/m/Y");

$se_1 = "A";

if ($nome3 == "SANTO"){
	$se_1 = "B";
}
if ($nome3 == "ELCIO"){
	$se_1 = "B";
}
if ($nome3 == "SANTANA"){
	$se_1 = "C";
}
if ($nome3 == "TATUAPE"){
	$se_1 = "D";
}

// Resgata Session
session_name("Val_Socio");
session_start();

$cod     = $novo_1; 
$datinsc = $dat_insc;
$codedif = 0;
$numdep  = 0;
$mes     = 0;
$ano     = 0;
$saldo   = 0;
$prest   = 0;
$pago    = 0;


$_SESSION['cod']     = $cod;
$_SESSION['nu']      = $se_1; 
$_SESSION['datinsc'] = $datinsc;
$_SESSION['codedif'] = $codedif;
$_SESSION['numdep']  = $numdep;
$_SESSION['mes']     = $mes;
$_SESSION['ano']     = $ano;
$_SESSION['saldo']   = $saldo;
$_SESSION['prest']   = $prest;
$_SESSION['pago']    = $pago;

// Abrir tabela Senha

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado3 = @mysql_query($consulta3);

$row3 = mysql_fetch_array($resultado3);

$soc1       = @$row3["soc1"];
$soc2       = @$row3["soc2"];
$soc3       = @$row3["soc3"];

/*
  -----------------------------
  Rotina Consulta CEP Mostrando
  Logradouro, Cidade e Bairro
  -----------------------------
*/

// Abrir tabela Ruas

$consulta  = "SELECT * FROM ruas WHERE cep = '$Cep_2x'";

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id       = @$row["id"];
$rua_2    = @$row["rua"];
$cep_2    = @$row["cep"];
$proc_log = @$row["codlog"];
$proc_bai = @$row["codbai"];
$compl_3  = @$row["compl"];
if (substr($compl_3,0,1) == ",")
{
	$compl_1 = $compl_3; 
}

// Abrir tabela Logradou

$consulta2  = "SELECT * FROM logradou WHERE codlog = '$proc_log'";

$resultado2 = @mysql_query($consulta2);

$row2 = @mysql_fetch_array($resultado2);

$id       = @$row2["id"];
$Logra_2  = @$row2["logradouro"];

// Abrir tabela Bairro

$consulta3  = "SELECT * FROM bairros WHERE codbai = '$proc_bai'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$id        = @$row3["id"];
$Bairro_3  = @$row3["extenso"];
$proc_cida = substr($proc_bai,0,6);

// Abrir tabela Cidades

$consulta4  = "SELECT * FROM cidades WHERE codcid = '$proc_cida'";

$resultado4 = @mysql_query($consulta4);

$row4 = @mysql_fetch_array($resultado4);

$id       = @$row4["id"];
$Uf_2     = @$row4["uf"];
$Cidade_2 = @$row4["cidade"];

$rua       = $Logra_2;
$endereco  = $rua_2;
$numero    = $compl_1;
$bairro    = $Bairro_3;
$cidade    = $Cidade_2;
$cep       = $cep_2;
$uf        = $Uf_2;

// Fim Rotina de CEP

if ($soc1 == "NAO")
{
   require("cadsocios.php");
}

else
{

?>

<html>
<head>
<title><?=$Titulo;?></title>
</head>
<body>
</html>

<?

require("menu.php");

define ("Edit1",    "$cod");
define ("Edit2",    "$nu");
define ("Edit3",    "$cpf");
define ("Edit4",    "$rgassoc");
define ("Edit5",    "$datinsc");
define ("Edit6",    "$dat2");
define ("Edit7",    "$dat3");
define ("Edit8",    "$sede");
define ("Edit9",    "$categoria");
define ("Edit10",   "$codedif");
define ("Edit11",   "$nomeassoc");
define ("Edit12",   "$rua");
define ("Edit13",   "$endresid");
define ("Edit14",   "$numero");
define ("Edit15",   "$bairrores");
define ("Edit16",   "$cepres");
define ("Edit17",   "$cidaderes");
define ("Edit18",   "$estadores");
define ("Edit19",   "$telefone");
define ("Edit20",   "$carttrab");
define ("Edit21",   "$serie");
define ("Edit22",   "$emiscart");
define ("Edit23",   "$cargoassoc");
define ("Edit24",   "$datadimis");
define ("Edit25",   "$estcivil");
define ("Edit26",   "$numdep");
define ("Edit27",   "$mes");
define ("Edit28",   "$ano");
define ("Edit29",   "$cad_si");
define ("Edit30",   "$saldo");
define ("Edit31",   "$prest");
define ("Edit32",   "$pago");
define ("Edit33",   "$natural");
define ("Edit34",   "$datnasc");
define ("Edit35",   "$nascion");
define ("Edit36",   "$pai");
define ("Edit37",   "$mae");
define ("Edit38",   "$conjuge");
define ("Edit39",   "$datconj");
define ("Edit40",   "$filho01");
define ("Edit41",   "$dat01");
define ("Edit42",   "$sexo01");
define ("Edit43",   "$filho02");
define ("Edit44",   "$dat02");
define ("Edit45",   "$sexo02");
define ("Edit46",   "$filho03");
define ("Edit47",   "$dat03");
define ("Edit48",   "$sexo03");
define ("Edit49",   "$filho04");
define ("Edit50",   "$dat04");
define ("Edit51",   "$sexo04");
define ("Edit52",   "$filho05");
define ("Edit53",   "$dat05");
define ("Edit54",   "$sexo05");
define ("Edit55",   "$filho06");
define ("Edit56",   "$dat06");
define ("Edit57",   "$sexo06");
define ("Edit58",   "$filho07");
define ("Edit59",   "$dat07");
define ("Edit60",   "$sexo07");
define ("Edit61",   "$filho08");
define ("Edit62",   "$dat08");
define ("Edit63",   "$sexo08");
define ("Edit64",   "$filho09");
define ("Edit65",   "$dat09");
define ("Edit66",   "$sexo09");
define ("Edit67",   "$filho10");
define ("Edit68",   "$dat10");
define ("Edit69",   "$sexo10");
define ("Edit70",   "$obs");

$edit10 = 0;

session_start();
unset ($_SESSION['Procura']);

$menssagens = "* * * Incluir * * *";

$mes   = 0;
$ano   = 0;
$saldo = 0;
$prest = 0;
$pago  = 0;

$cami2 = 'imagens/fotos/Branco.bmp'; 

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

<table border=0  align=center>
<tr align=center colspan=2> 


<form name="form1" type="hidden" method="POST" action="socinsert.php">

<body>

<?

include("soclayout2.php");

?>

</body>
</html>
<?
}
?>