<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Incluir Cadastro Senha
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
@session_start();
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

include("vaurls.php");

$deixar = acesso_url("FORMSENHA");

if ($deixar == "SIM"){


?>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>
<body>

<style type=text/css>

body { background-image: url(<?="../".$logo_sis;?>);
       background-attachment: fixed }

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
-->
</style> 

</body>
</html>

<?

$login     = " ";
$senha     = " ";
$data      = date("d/m/Y");
$nome      = " ";
$permissao = 0;
$permis2   = 0;
$programas = " ";

$adm1      = " ";
$adm2      = " ";
$adm3      = " ";

$soc1      = " ";
$soc2      = " ";
$soc3      = " ";

$cat1      = " ";
$cat2      = " ";
$cat3      = " ";

$edi1      = " ";
$edi2      = " ";
$edi3      = " ";

$opo1      = " ";
$opo2      = " ";
$opo3      = " ";

$vag1      = " ";
$vag2      = " ";
$vag3      = " ";

$fen1      = " ";
$fen2      = " ";
$fen3      = " ";

$int1      = " ";
$int2      = " ";
$int3      = " ";

$aco1      = " ";
$aco2      = " ";
$aco3      = " ";

$mens1     = " ";
$mens2     = " ";
$mens3     = " ";

$menssagens = "* * * Incluir * * *";

?>

<html>
<body text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0 leftmargin=0 bottommargin=0 onload="document.form1.Edit1.focus();">
<div align=center>
       <br>
       <br>

<table border=0  align=center>
<tr align=center colspan=2> 

<form name="form1" type="hidden" method="POST" action="senhainsert.php">
<br/>
<?
include("senhalayout2.php");
?>

<div style="Z-INDEX: 34; LEFT: 10px; WIDTH: 544px; POSITION: absolute; TOP: 470px; HEIGHT: 20px">

<table border='0' aling=center>
          <td> </td>

          <td><input type=image name="guias" src="../imagens/botaoazul10.PNG"></td>

         </form>


          <form method="POST" action="cadsenha.php">
          <td><input type=image name="socios" src="../imagens/botaoazul9.PNG"></td>
          </form>

</table>
</div>

</table>
</div>

</body>
</html>
<?
}else{

include("enaaurlnp.php");
	
}
?>