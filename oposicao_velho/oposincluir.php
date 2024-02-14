<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Incluir Cadastro Oposicao
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


// Abrir tabela Oposicao

$consulta  = "SELECT * FROM oposicao3 ORDER BY COD DESC LIMIT 0,1";

$resultado = @mysql_query($consulta);

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

$Edit2 = " ";
$Edit4 = " ";
$Edit5 = " ";
$Edit6 = " ";
$Edit7 = " ";
$Edit8 = " ";
$Edit9 = " ";
$Edit10 = " ";
$Edit11 = " ";
$Edit12 = " ";
$Edit13 = " ";
$Edit14 = " ";
$Edit15 = " ";

$row = @mysql_fetch_array($resultado);

$id       = @$row["id"];
$cod_2    = @$row["COD"];

$Edit1    = $cod_2+1;
$Edit3    = date("d/m/Y");

$Edit8 = 0;
$Edit10 = 0;
$Edit11 = 0;

// Resgata Session
session_name("Val_Opos");
session_start();

$_SESSION['Edit1']  = $Edit1;
$_SESSION['Edit3']  = $Edit3;

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

<table border=0>
<tr align=center colspan=2> 


<form type="hidden" method="POST" action="oposinsert.php">

<body>

<?

include("oposlayoutx2.php");

?>


</body>
</html>
<?
}
?>