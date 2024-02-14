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

require($path."logar.php");

$nome3 = $_SESSION["nome_log"];

require("menu.php");

require("vaurls.php");

$deixar = acesso_url("GRID_CATEGORIA");

if ($deixar == "SIM"){


$titulo_tabela = "Tabela 'CATEGORIA' Alterar";
?>

<html>
<head>
<title><?=$titulo_tabela;?></title>
</head>

<style type=text/css>

body { background-image: url(<?=$logo_sis;?>);}

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
include($path."conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// retorna uma pesquisa

$sql  = "SELECT * FROM categ WHERE id = '$Cod_2'";

$resultado = @mysql_query($sql);
	
$row = mysql_fetch_array($resultado);

$codigo    = @$row["CODIGO"];
$data      = @$row["DATA"];
$operadora = @$row["DESCRICAO"];

$faz = 1;

?>
<br>
<br>
          
<table border=0  align=center>
<tr align=left colspan=2> 
<td><b><?=$titulo_tabela;?></b></td>
<div align=center>

<form type="hidden" method="POST" action="cadastrar.php?Acao=update">

<table align=center border='15' bgcolor='#FFFFFF' bordercolor ='<?=$color_bor;?>'>
<tr>
<td>
<table border='1' align=center>

          
<td valign=top><b>CODIGO</b>
<th align='left'><b>DATA</b>
<th align='left'><b>DESCRICAO</b>
</td>

<tr> 
<td align='left'> <font style=' font-family: Verdana; font-size: 14px;'> <b><input type="text" name="codigo" value="<?=$codigo;?>"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:78px;"></b>
<td align='left'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text" name="data"  value="<?=$data;?>"  maxlength="10"    style=" font-family: Verdana; font-size: 14px;  height:25px;width:78px;">
<td align='left'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text" name="operadora" value="<?=$operadora;?>" maxlength="11" style=" font-family: Verdana; font-size: 14px;  height:25px;width:120px;">
<td>
<input type=image name="Alterar" src='imagens/atualizar.gif'><td>
<A HREF='javascript:history.go(-1)'><img alt='Cancelar' id='Image2' src='imagens/cancelar.gif' border='0'></A><td>

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
	
require("enaaurlnp.php");
	
}
?>