<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Alteracao Cadastro Socios
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

mysql_select_db($db)
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

$resultado3 = mysql_query($consulta3)
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

$row3 = mysql_fetch_array($resultado3);


$soc1       = @$row3["soc1"];
$soc2       = @$row3["soc2"];
$soc3       = @$row3["soc3"];


if ($soc2 == "NAO")
{
   require("cadsocios.php");
}

else
{

// retorna uma pesquisa

$Cod_P = $Cod_2;

$consulta  = "SELECT * FROM socios Where CODP = '$Cod_P'";

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
unset ($_SESSION['Procura_up']);
unset ($_SESSION['Procura']);

$row = mysql_fetch_array($resultado);

$id			= @$row["id"];
$Edit1		= Trim(@$row["COD"]);
$Edit2	    = Trim(@$row["NU"]);
$Edit3      = Trim(@$row["RGASSOC"]);
$Edit4  	= Trim(@$row["CPF"]);
$Edit5  	= Trim(@$row["DATINSC"]);
$Edit6		= Trim(@$row["DAT2"]);
$Edit7		= Trim(@$row["DAT3"]);
$Edit8		= Trim(@$row["SEDE"]);
$Edit9		= Trim(@$row["CATEGORIA"]);
$Edit10		= Trim(@$row["CODEDIF"]);
$Edit11		= Trim(@$row["NOMEASSOC"]);
$Edit12		= Trim(@$row["RUA"]);
$Edit13 	= Trim(@$row["ENDRESID"]);
$Edit14		= Trim(@$row["NUMERO"]);
$Edit15		= Trim(@$row["BAIRRORES"]);
$Edit16		= Trim(@$row["CEPRES"]);
$Edit17		= Trim(@$row["CIDADERES"]);
$Edit18		= Trim(@$row["ESTADORES"]);
$Edit19		= Trim(@$row["TELEFONE"]);
$Edit20		= Trim(@$row["CARTTRAB"]);
$Edit21		= Trim(@$row["SERIE"]);
$Edit22		= Trim(@$row["EMISCART"]);
$Edit23		= Trim(@$row["CARGOASSOC"]);
$Edit24		= Trim(@$row["DATADIMIS"]);
$Edit25		= Trim(@$row["ESTCIVIL"]);
$Edit26		= Trim(@$row["NUMDEP"]);
$Edit27		= Trim(@$row["MES"]);
$Edit28		= Trim(@$row["ANO"]);
$Edit29		= Trim(@$row["CAD_SI"]);
$Edit30		= Trim(@$row["SALDO"]);
$Edit31		= Trim(@$row["PREST"]);
$Edit32		= Trim(@$row["PAGO"]);
$Edit33		= Trim(@$row["NATURAL1"]);
$Edit34		= Trim(@$row["DATNASC"]);
$Edit35		= Trim(@$row["NASCION"]);
$Edit36		= Trim(@$row["PAI"]);
$Edit37		= Trim(@$row["MAE"]);
$Edit38		= Trim(@$row["CONJUGE"]);
$Edit39		= Trim(@$row["DATCONJ"]);
$Edit40		= Trim(@$row["FILHO01"]);
$Edit41		= Trim(@$row["DAT01"]);
$Edit42		= Trim(@$row["SEXO01"]);
$Edit43		= Trim(@$row["FILHO02"]);
$Edit44		= Trim(@$row["DAT02"]);
$Edit45		= Trim(@$row["SEXO02"]);
$Edit46		= Trim(@$row["FILHO03"]);
$Edit47		= Trim(@$row["DAT03"]);
$Edit48		= Trim(@$row["SEXO03"]);
$Edit49		= Trim(@$row["FILHO04"]);
$Edit50		= Trim(@$row["DAT04"]);
$Edit51		= Trim(@$row["SEXO04"]);
$Edit52		= Trim(@$row["FILHO05"]);
$Edit53		= Trim(@$row["DAT05"]);
$Edit54		= Trim(@$row["SEXO05"]);
$Edit55		= Trim(@$row["FILHO06"]);
$Edit56		= Trim(@$row["DAT06"]);
$Edit57		= Trim(@$row["SEXO06"]);
$Edit58		= Trim(@$row["FILHO07"]);
$Edit59		= Trim(@$row["DAT07"]);
$Edit60		= Trim(@$row["SEXO07"]);
$Edit61		= Trim(@$row["FILHO08"]);
$Edit62		= Trim(@$row["DAT08"]);
$Edit63		= Trim(@$row["SEXO08"]);
$Edit64 	= Trim(@$row["FILHO09"]);
$Edit65		= Trim(@$row["DAT09"]);
$Edit66		= Trim(@$row["SEXO09"]);
$Edit67		= Trim(@$row["FILHO10"]);
$Edit68		= Trim(@$row["DAT10"]);
$Edit69		= Trim(@$row["SEXO10"]);
$Edit70		= Trim(@$row["OBS"]);

$log_ssoc	= @$row["LOG_SSOC"];
$hora		= @$row["HORA"];
$sexo		= @$row["SEXO"];
$campo1		= @$row["CAMPO1"];
$campo2		= @$row["CAMPO2"];


// Resgata Session
session_name("Val_Socio");
session_start();

$_SESSION['cod']      	= $Edit1;
$_SESSION['nu']      	= $Edit2; 
$_SESSION['rgassoc']    = $Edit3;
$_SESSION['cpf']      	= $Edit4;
$_SESSION['datinsc']    = $Edit5;
$_SESSION['dat2']      	= $Edit6;
$_SESSION['dat3']      	= $Edit7;
$_SESSION['sede']      	= $Edit8;
$_SESSION['categoria']  = $Edit9;
$_SESSION['codedif']    = $Edit10;
$_SESSION['nomeassoc']  = $Edit11;
$_SESSION['rua']      	= $Edit12;
$_SESSION['endresid']   = $Edit13;
$_SESSION['numero']     = $Edit14;
$_SESSION['bairrores']  = $Edit15;
$_SESSION['cepres']     = $Edit16;
$_SESSION['cidaderes']  = $Edit17;
$_SESSION['estadores']  = $Edit18;
$_SESSION['telefone']   = $Edit19;
$_SESSION['carttrab']   = $Edit20;
$_SESSION['serie']      = $Edit21;
$_SESSION['emiscart']   = $Edit22;
$_SESSION['cargoassoc'] = $Edit23;
$_SESSION['datadimis']  = $Edit24;
$_SESSION['estcivil']   = $Edit25;
$_SESSION['numdep']     = $Edit26;
$_SESSION['mes']      	= $Edit27;
$_SESSION['ano']      	= $Edit28;
$_SESSION['cad_si']     = $Edit29;
$_SESSION['saldo']      = $Edit30;
$_SESSION['prest']      = $Edit31;
$_SESSION['pago']       = $Edit32;
$_SESSION['natural']    = $Edit33;
$_SESSION['datnasc']    = $Edit34;
$_SESSION['nascion']    = $Edit35;
$_SESSION['pai']      	= $Edit36;
$_SESSION['mae']        = $Edit37;
$_SESSION['conjuge']    = $Edit38;
$_SESSION['datconj']    = $Edit39;
$_SESSION['filho01']    = $Edit40;
$_SESSION['dat01']      = $Edit41;
$_SESSION['sexo01']     = $Edit42;
$_SESSION['filho02']    = $Edit43;
$_SESSION['dat02']      = $Edit44;
$_SESSION['sexo02']     = $Edit45;
$_SESSION['filho03']    = $Edit46;
$_SESSION['dat03']      = $Edit47;
$_SESSION['sexo03']     = $Edit48;
$_SESSION['filho04']    = $Edit49;
$_SESSION['dat04']      = $Edit50;
$_SESSION['sexo04']     = $Edit51;
$_SESSION['filho05']    = $Edit52;
$_SESSION['dat05']      = $Edit53;
$_SESSION['sexo05']     = $Edit54;
$_SESSION['filho06']    = $Edit55;
$_SESSION['dat06']      = $Edit56;
$_SESSION['sexo06']     = $Edit57;
$_SESSION['filho07']    = $Edit58;
$_SESSION['dat07']      = $Edit59;
$_SESSION['sexo07']     = $Edit60;
$_SESSION['filho08']    = $Edit61;
$_SESSION['dat08']      = $Edit62;
$_SESSION['sexo08']     = $Edit63;
$_SESSION['filho09']    = $Edit64;
$_SESSION['dat09']      = $Edit65;
$_SESSION['sexo09']     = $Edit66;
$_SESSION['filho10']    = $Edit67;
$_SESSION['dat10']      = $Edit68;
$_SESSION['sexo10']     = $Edit69;
$_SESSION['obs']        = $Edit70;

// Abrir Table de Edificios

$consulta4  = "SELECT * FROM edificios Where COD = '$Edit10'";

$resultado4 = mysql_query($consulta4);

$row4 = mysql_fetch_array($resultado4);

$cod_edif   = @$row4["COD"];
$cond  = trim(@$row4["COND"].@$row4["NOME"]);
$edif  = trim(@$row4["NOME"]);

$nome_do_edif = $cond;

$consulta7 = "SELECT * FROM tb_segunda WHERE cod_foto = '$id'";
	
$resultado7 = @mysql_query($consulta7);

$row7 = @mysql_fetch_array($resultado7);

$id_9 	   = @$row7["cod_foto"];
$id_imagem = @$row7["id_imagem"];

if(!empty($id_imagem)){
$mostra_branco = "faz";	
}else{
$mostra_branco = "nao";	
	
}	

$menssagens = "* * * Alterar * * *";

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

<form name="form1" type="hidden" method="POST" action="socupdate.php?Cod_P=<?=$Cod_P;?>">

<body>

<?
require("soclayout3.php");
?>

</body>
</html>
<?
}
?>