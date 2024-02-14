<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Listagem na Tela por Codigo
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

include_once('../sql_injection.php');

include("vaurls.php");

$deixar = acesso_url("FORM_ASOC");

if ($deixar == "SIM"){

$titulo_tabela = "'MENSALIDADE' Alterar";
?>

<html>
<head>
<title><?=$titulo_tabela;?></title>
</head>

<style type=text/css>

body { background-image: url(<?="../".$logo_sis;?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
--></style> 

</html>

<?

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// retorna uma pesquisa

$sql  = "SELECT * FROM aberto_soc WHERE id = '". anti_sql_injection($Cod_2) ."'";

$resultado = @mysql_query($sql);
	
$row = @mysql_fetch_array($resultado);

$id     = @$row["id"];
$Edit1  = @$row["CODP"];
$Edit2  = @$row["TOTAL"];
$Edit3  = @$row["VENCTO"]; 
$Edit4 	= @$row["MESANO"];  
$Edit5 	= @$row["MES"];
$Edit6 	= @$row["ANO"];
$Edit7  = @$row["DAT_BAI"];

$faz = 1;

?>
<br>
<br>
          
<table border=0  align=center>
<tr align=left colspan=2> 
<td><b><?=$titulo_tabela;?></b></td>
<div align=center>

<form type="hidden" method="POST" action="update_mensa.php?Acao=update">

<table align=center border='15' bgcolor='#FFFFFF' bordercolor ='<?=$color_bor;?>'>
<tr>
<td>
<table border='1' align=center>

          
<td valign=top><b></b>
<th><b>MATRICULA</b>
<th><b>VALOR</b>
<th><b>VENCTO</b>
<th><b>MESANO</b>
<th><b>MES</b>
<th><b>ANO</b>
<th><b>BAIXA</b>
</td>

<tr> 
<td align='right'> <font style=' font-family: Verdana; font-size: 14px;'> <input type="hidden"  name="id"    value="<?=$id;?>"  readonly style=" font-family: Verdana; font-size: 14px;  height:25px;width:0px;">
<td align='left'>  <font style=' font-family: Verdana; font-size: 12px;'> <input type="text"    name="Edit1" value="<?=$Edit1;?>" maxlength="8" readonly  style=" font-family: Verdana; font-size: 14px;  height:25px;width:100px;">
<td align='right'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text"    name="Edit2" value="<?=$Edit2;?>" maxlength="9"     style=" font-family: Verdana; font-size: 14px;  height:25px;width:100px;">
<td align='left'>  <font style=' font-family: Verdana; font-size: 12px;'> <input type="text"    name="Edit3" value="<?=$Edit3;?>" maxlength="10"    style=" font-family: Verdana; font-size: 14px;  height:25px;width:100px;">
<td align='left'>  <font style=' font-family: Verdana; font-size: 12px;'> <input type="text"    name="Edit4" value="<?=$Edit4;?>" maxlength="7"     style=" font-family: Verdana; font-size: 14px;  height:25px;width:100px;">
<td align='left'>  <font style=' font-family: Verdana; font-size: 12px;'> <input type="text"    name="Edit5" value="<?=$Edit5;?>" maxlength="2"     style=" font-family: Verdana; font-size: 14px;  height:25px;width:40px;">
<td align='left'>  <font style=' font-family: Verdana; font-size: 12px;'> <input type="text"    name="Edit6" value="<?=$Edit6;?>" maxlength="4"     style=" font-family: Verdana; font-size: 14px;  height:25px;width:50px;">
<td align='left'>  <font style=' font-family: Verdana; font-size: 12px;'> <input type="text"    name="Edit6" value="<?=$Edit7;?>" maxlength="4" readonly  style=" font-family: Verdana; font-size: 14px;  height:25px;width:100px;">
<td>
<input type=image name="Alterar" src='../imagens/atualizar.gif'><td>
<A HREF='javascript:history.go(-1)'><img alt='Cancelar' id='Image2' src='../imagens/cancelar.gif' border='0'></A><td>

</form>
</font>
</td>
</table>
<?

echo "
		      
	</table>
	</td>
	</tr>
	</table>
	</div>";

?>
<div align="center">
</div>
<?
}else{
	
include("enaaurlnp.php");
	
}
?>