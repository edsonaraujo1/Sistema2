<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Alterar Cadastro Oposicao
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

// Abre Conexão com o MySql
include($path."conexao.php");
// Chama o Banco de Dados

//include("funcoes2.php");

$link = @mysql_connect($host,$user,$pass)
        or

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
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

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
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


session_start();

unset ($_SESSION['Edit1']);
unset ($_SESSION['Edit2']);
unset ($_SESSION['Edit3']);
unset ($_SESSION['Edit4']);
unset ($_SESSION['Edit5']);
unset ($_SESSION['Edit6']);
unset ($_SESSION['Edit7']);
unset ($_SESSION['Edit8']);
unset ($_SESSION['Edit9']);
unset ($_SESSION['Edit10']);
unset ($_SESSION['Edit11']);
unset ($_SESSION['Edit12']);
unset ($_SESSION['Edit13']);
unset ($_SESSION['Edit14']);
unset ($_SESSION['Edit15']);


// Abrir tabela oposicao

$consulta  = "SELECT * FROM oposicao3 Where COD = $Cod_2";

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id     = @$row["id"];
$Edit1  = @$row["COD"];
$Edit2  = @$row["RGASSOC"];
$Edit3  = @$row["DATINSC"];
$Edit4  = @$row["DAT2"];
$Edit5  = @$row["CPF"];
$Edit6  = @$row["SEDE"];
$Edit7  = @$row["CATEGORIA"];
$Edit8  = @$row["CODEDIF"];
$Edit9  = @$row["CNPJ"];
$Edit10 = @$row["ADMS"];
$Edit11 = @$row["MATRICULA"];
$Edit12 = @$row["NU1"];
$Edit13 = @$row["NOMEASSOC"];
$Edit14 = @$row["ENDRESID"];
$Edit15 = @$row["OBS"];


// Resgata Session
session_name("Val_Opos");
session_start();

$_SESSION['Edit1']     = $Edit1;
$_SESSION['Edit2']     = $Edit2;
$_SESSION['Edit3']     = $Edit3;
$_SESSION['Edit4']     = $Edit4;
$_SESSION['Edit5']     = $Edit5;
$_SESSION['Edit6']     = $Edit6;
$_SESSION['Edit7']     = $Edit7;
$_SESSION['Edit8']     = $Edit8;
$_SESSION['Edit9']     = $Edit9;
$_SESSION['Edit10']    = $Edit10;
$_SESSION['Edit11']    = $Edit11;
$_SESSION['Edit12']    = $Edit12;
$_SESSION['Edit13']    = $Edit13;
$_SESSION['Edit14']    = $Edit14;
$_SESSION['Edit15']    = $Edit15;

// Abrir tabela Senha

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$opo1       = @$row3["opo1"];
$opo2       = @$row3["opo2"];
$opo3       = @$row3["opo3"];


if ($opo1 == "NAO")
{
   require("cadopos.php");
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


<form type="hidden" method="POST" action="oposupdate.php">

<body>

<?

include("oposlayout3.php");

?>

</body>
</html>
<?
}
?>