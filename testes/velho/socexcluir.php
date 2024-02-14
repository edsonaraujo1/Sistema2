<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Deletar Cadastro Socios
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
</html>

<?

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

// Abrir tabela Senha

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado3 = @mysql_query($consulta3)
       or

die("
     <br>
     <br>
     
	 <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='#4682B4'>
     <tr>
     <td>
     <font face=arial><b>*** Registro Não Encontrado !!! ***</b>
     <table align=center>
     <form method='POST' action='cadsocios.php'>
     <td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

$row3 = @mysql_fetch_array($resultado3);

$soc1       = @$row3["soc1"];
$soc2       = @$row3["soc2"];
$soc3       = @$row3["soc3"];


if ($soc3 == "NAO")
{
   require("cadsocios.php");
}

else
{

// retorna uma pesquisa

$consulta  = "SELECT * FROM socios WHERE CODP = '$Cod_2'";

$resultado = @mysql_query($consulta)
        or

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='#4682B4'>
     <tr>
     <td>
     <font face=arial><b>*** Registro Não Encontrado !!! ***</b>
     <table align=center>
     <form method='POST' action='cadsocios.php'>
     <td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

$row = @mysql_fetch_array($resultado);

$id         = @$row["id"];
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

$menssagens = "* * * Excluir * * *";

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
<div align=center>

<table border=0  align=center>
<tr align=center colspan=2> 


<form type="hidden" method="POST" action="socdelete.php?Cod_2=<?=$id;?>">

<?
require("soclayout4.php");
?>

</body>
</html>
<?
}
?>