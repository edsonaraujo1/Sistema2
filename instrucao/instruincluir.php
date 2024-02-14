<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Incluir Cadastro Instrucao
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

$menssagens = "* * * Incluir * * *";

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// Abrir tabela instrucao

$consulta  = "SELECT * FROM instrucao ORDER BY Edit1 DESC LIMIT 0,1";

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$Edit1	    = @$row["Edit1"];

// Incrementa codigo

$Edit1    = $Edit1+1;

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
     <form method='POST' action='cadinstrucao.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

$row3 = @mysql_fetch_array($resultado3);

$edi1       = @$row3["edi1"];
$edi2       = @$row3["edi2"];
$edi3       = @$row3["edi3"];

?>

<html>
<head>
<title><?=$Titulo;?></title>
</head>
<body>
</html>

<?

//define ("Edit1",     "$Edit1");
define ("Edit2",     "$Edit2");
define ("Edit3",     "$Edit3");
define ("Edit4",     "$Edit4");
define ("Edit5",     "$Edit5");
define ("Edit6",     "$Edit6");
define ("Edit7",     "$Edit7");
define ("Edit8",     "$Edit8");
define ("Edit9",     "$Edit9");
define ("Edit10",    "$Edit10");
define ("Edit11",    "$Edit11");
define ("Edit12",    "$Edit12");
define ("Edit13",    "$Edit13");
define ("Edit14",    "$Edit14");
define ("Edit15",    "$Edit15");
define ("Edit16",    "$Edit16");
define ("Edit17",    "$Edit17");

$menssagens = "*** Incluir ***";

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
<BODY text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0 leftmargin=0 bottommargin=0 onload="document.form1.Edit2.focus();">
<div align=center>
       <br>
       <br>

<table border=0  align=center>
<tr align=center colspan=2> 

<form name="form1" type="hidden" method="POST" action="instruinsert.php">
<br>
<?
include("instrulayout2.php");
?>

<div style="Z-INDEX: 34; LEFT: 10px; WIDTH: 544px; POSITION: absolute; TOP: 549px; HEIGHT: 80px">

<table border='0' aling=center>
          <td> </td>

          <td><input type=image name="guias" src="../imagens/botaoazul10.PNG"></td>

         </form>


          <form method="POST" action="cadinstrucao.php">
          <td><input type=image name="socios" src="../imagens/botaoazul9.PNG"></td>
          </form>

</table>
</div>

</table>
</div>

</body>
</html>