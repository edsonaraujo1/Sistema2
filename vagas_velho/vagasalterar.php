<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Alteracao Cadastro Adms
 Criado em Data.....: 07/12/2007
 Ultima Atualiza��o : 07/07/2008 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

require("../logar.php");
$nome3 = $_SESSION["nome_log"];

require("menu.php");

?>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>
<body>
</html>

<?

// Abre Conex�o com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass)
        or

die("
     <br>
     <br>
     
	 <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** N�o foi possivel conectar !!! ***</b>
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
     <font face=arial><b>*** N�o Foi possivel selecionar o banco de dados !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

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
     <font face=arial><b>*** Registro N�o Encontrado !!! ***</b>
     <table align=center>
     <form method='POST' action='cadadms.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

$row3 = @mysql_fetch_array($resultado3);

$vag1       = @$row3["vag1"];
$vag2       = @$row3["vag2"];
$vag3       = @$row3["vag3"];

if ($vag2 == "NAO")
{
   require("cadvagas.php");
}

else
{

// retorna uma pesquisa

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


$consulta  = "SELECT * FROM vaga Where COD = $Cod_2";

$resultado = @mysql_query($consulta)
        or

die("
     <br>
     <br>
     
	 <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Registro N�o Encontrado !!! ***</b>
     <table align=center>
     <form method='POST' action='cadvagas.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

$row = @mysql_fetch_array($resultado);

$Edit1  = @$row["COD"];
$Edit2  = @$row["SITU"];
$Edit3  = @$row["DATA"];
$Edit4  = @$row["FUNCAO"];
$Edit5  = @$row["QTD"];
$Edit6  = @$row["ENCA"];
$Edit7  = @$row["NOME"];
$Edit8  = @$row["ENDERECO"];
$Edit9  = @$row["BAIRRO"];
$Edit10 = @$row["CIDADE"];
$Edit11 = @$row["ESTADO"]; 
$Edit12 = @$row["CEP"];
$Edit13 = @$row["TELEFONE"];
$Edit14 = @$row["CONTATO"];
$Edit15 = @$row["OBS"];

$menssagens = "* * * Alterar * * *";


// Resgata Session
session_name("Val_Vagas");
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

<table border=0  align=center>
<tr align=center colspan=2> 


<form type="hidden" method="POST" action="admsupdate.php">

<body>

<?

require("vagaslayout3.php");

?>


</body>
</html>
<?
}
?>