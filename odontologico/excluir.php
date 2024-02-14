<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Deletar Cadastro
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

$nome3 = $_SESSION["nome_log"];

include("../logar.php");

include("menu.php");

include("vaurls.php");

$deixar = acesso_url("FORM_ODONTO");

if ($deixar == "SIM"){

// Regata Secao
session_start();
$id_navega = $_SESSION['navega'];

?>

<script language="JavaScript"><!--

document.onkeydown = keyCatcher;

function keyCatcher() 
{
   var e = event.srcElement.tagName;

   if (event.keyCode == 8 && e != "INPUT" && e != "TEXTAREA") 
   {
      event.cancelBubble = true;
      event.returnValue = false;
   }
}
//-->
</script>

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

// Abre Conexão com o MySql
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

// Abrir tabela Senha

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado3 = @mysql_query($consulta3);

$row3 = mysql_fetch_array($resultado3);

$odo1       = @$row3["odo1"];
$odo2       = @$row3["odo2"];
$odo3       = @$row3["odo3"];


if ($odo3 == "NAO")
{
   include("cadastro.php");
}

else
{

// retorna uma pesquisa

if (!empty($Cod_2)){
	
   $consulta  = "SELECT * FROM odontologico Where id = '$Cod_2'";
	
}

if (!empty($id_navega)){

   $consulta  = "SELECT * FROM odontologico Where id = '$id_navega'";
	
}

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id      = @$row["id"];

if (empty($id)){
	
   $consulta  = "SELECT * FROM odontologico Where matricula = '$id_navega'";
	
}

$resultado = @mysql_query($consulta);

$row = mysql_fetch_array($resultado);

$id     = @$row["id"];
$Edit1  = @$row["matricula"];
$Edit2  = @$row["titular"];
$Edit3  = @$row["mes"];
$Edit4  = @$row["ano"];
$Edit5  = @$row["dependente"];
$Edit6  = @$row["dentista"];
$Edit7  = @$row["procedimento"];

$menssagens = "* * * Excluir * * *";

?>

<html>

<?
include("layout.php");
?>

<div style="Z-INDEX: 34; LEFT: 185px; WIDTH: 544px; POSITION: absolute; TOP: 425px; HEIGHT: 80px">
<table border='0' aling=center>
          <td> </td>
          <form type="hidden" method="POST" action="delete.php?Cod_2=<?=$id;?>">
          <td><input type=image name="Deletar" src="../imagens/botaoazul4.PNG"></td>
          </form>

          <form method="POST" action="cadastro.php?Cod_xx=<?=$id_navega;?>">
          <td><input type=image name="Descartar" src="../imagens/botaoazul9.PNG"></td>
          </form>

</table>

</div>

</body>
</html>
<?
}	
?>
<?
}else{
	
include("enaaurlnp.php");
	
}
?>
