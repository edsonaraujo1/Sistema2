<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Incluir Cadastro Fenatec
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

include("vaurls.php");

$deixar = acesso_url("FORM_FENATEC");

if ($deixar == "SIM"){

// Abre Conexão com o MySql
include("../conexao.php");
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
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
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
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

// Abrir tabela Administradora

$consulta  = "SELECT * FROM fenatec ORDER BY Edit1 DESC LIMIT 0,1";

$resultado = @mysql_query($consulta)
        or

die("
     <br>
     <br>
     
	 <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Registro Não Encontrado !!! ***</b>
     <table align=center>
     <form method='POST' action='cadfenatec.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");


// Incrementa novo codigo

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


$row = mysql_fetch_array($resultado);

$id       = @$row["id"];
$cod_2    = @$row["Edit1"];

$Edit1   = $cod_2+1;
$Edit3   = date("d/m/Y");
$Edit14  = 0;

// Resgata Session
session_name("Val_fena");
session_start();

$cod     = $Edit1; 
$datinsc = $Edit3;

$_SESSION['Edit1']   = $Edit1;
$_SESSION['Edit3']   = $Edit3;
$_SESSION['Edit14']  = $Edit14;

// Abrir tabela Senha

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado3 = @mysql_query($consulta3)
       or

die("
     <br>
     <br>
     
	 <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Registro Não Encontrado !!! ***</b>
     <table align=center>
     <form method='POST' action='cadfenatec.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

$row3 = @mysql_fetch_array($resultado3);

$adm1       = @$row3["adm1"];
$adm2       = @$row3["adm2"];
$adm3       = @$row3["adm3"];



if ($adm1 != "SIM")
{
    include("enaaurlnp.php");
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

include("menu.php");

define ("Edit1",        "$Edit1");
define ("Edit2",        "$Edit2");
define ("Edit3",        "$Edit3");
define ("Edit4",        "$Edit4");
define ("Edit5",        "$Edit5");
define ("Edit6",        "$Edit6");
define ("Edit7",        "$Edit7");
define ("Edit8",        "$Edit8");
define ("Edit9",        "$Edit9");
define ("Edit10",       "$Edit10");
define ("Edit11",       "$Edit11");
define ("Edit12",       "$Edit12");
define ("Edit13",       "$Edit13");
define ("Edit14",       "$Edit14");
define ("Edit15",       "$Edit15");

$menssagens = "* * * Incluir * * *";

$Edit14 = 0;
?>

<html>


<style type=text/css>

body { background-image: url(<?="../".$logo_sis;?>);}

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


<form type="hidden" method="POST" action="admsinsert.php">

<body>

<?

include("fenalayout2.php");

?>


</body>
</html>
<?
}
}else{
	
include("enaaurlnp.php");
	
}
?>
