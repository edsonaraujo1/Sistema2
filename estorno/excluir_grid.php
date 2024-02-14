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
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");

$nome3 = $_SESSION["nome_log"];

include("menu.php");

include("vaurls.php");

$deixar = acesso_url("GRID_ESTORNO");

if ($deixar == "SIM"){

$titulo_tabela = "Tabela 'ESTORNO' Excluir";
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

$sql  = "SELECT * FROM estorno WHERE id = $Cod_2";

$resultado = @mysql_query($sql);
	
$row = mysql_fetch_array($resultado);

$id      = @$row["id"];
$Edit1   = @$row["DATA"];
$Edit2   = @$row["QTDEST"];
$Edit3   = @$row["OPERADORA"];

$faz = 1;

?>
<br>
<br>
          
<table border=0  align=center>
<tr align=left colspan=2> 
<td><b><?=$titulo_tabela;?></b></td> 

<div align=center>

<form type="hidden" method="POST" action="cadastrar_grid.php?Acao=deletar">

<table align=center border='15' bgcolor='#FFFFFF' bordercolor ='<?=$color_bor;?>'>
<tr>
<td>
<table border='1' align=center>

          
<td valign=top><b>COD</b>
<th align='left'><b>DATA</b>
<th align='left'><b>QTEST</b>
<th align='left'><b>OPERADORA</b>
</td>

<tr> 
<td align='left'> <font style=' font-family: Verdana; font-size: 14px;'> <b><input type="text" name="id" value="<?=$id;?>" readonly style=" font-family: Verdana; font-size: 14px;  height:25px;width:78px;"></b>
<td align='left'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text" name="Edit1" value="<?=$Edit1;?>" readonly  maxlength="10"    style=" font-family: Verdana; font-size: 14px;  height:25px;width:98px;">
<td align='left'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text" name="Edit2" value="<?=$Edit2;?>" readonly maxlength="2" style=" font-family: Verdana; font-size: 14px;  height:25px;width:68px;">
<td align='left'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text" name="Edit3" value="<?=$Edit3;?>"  readonly maxlength="11" style=" font-family: Verdana; font-size: 14px;  height:25px;width:120px;">
<td>
<input type=image name="excluir" src='../imagens/excluir.gif'><td>
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