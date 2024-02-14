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

$deixar = acesso_url("GRID_RECEITA");

if ($deixar == "SIM"){

$titulo_tabela = "Tabela 'RECEITA' Incluir";
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

$sql  = "SELECT * FROM receita ORDER BY codigo DESC LIMIT 0,1";

$resultado = @mysql_query($sql);
	
$row = mysql_fetch_array($resultado);

$cod_2    = @$row["CODIGO"];

$novo_1 = $cod_2+1;
	
$faz = 1;

?>
<br>
<br>
          
<table border=0  align=center>
<tr align=left colspan=2> 
<td><b><?=$titulo_tabela;?></b></td>
<div align=center>

<form type="hidden" method="POST" action="cadastrar_receita.php?Acao=insert">

<table align=center border='15' bgcolor='#FFFFFF' bordercolor ='<?=$color_bor;?>'>
<tr>
<td>
<table border='1' align=center>

          
<td valign=top><b>COD</b>
<th align='left'><b>DATA</b>
<th align='left'><b>OPERADORA</b>
<th align='left'><b>Semana</b>
<th align='left'><b>Seg</b>
<th align='left'><b>Ter</b>
<th align='left'><b>Qua</b>
<th align='left'><b>Qui</b>
<th align='left'><b>Sex</b>
<th align='left'><b>Sab</b>
<th align='left'><b>Dom</b></td>

<tr> 
<td align='left'> <font style=' font-family: Verdana; font-size: 14px;'> <b><input type="text" name="codigo" value="<?=$novo_1;?>" readonly style=" font-family: Verdana; font-size: 14px;  height:25px;width:78px;"></b>
<td align='left'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text" name="data"  value=""      style=" font-family: Verdana; font-size: 14px;  height:25px;width:78px;">
<td align='left'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text" name="operadora" value="" style=" font-family: Verdana; font-size: 14px;  height:25px;width:120px;">
<td align='left'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text" name="semana"  value=""   style=" font-family: Verdana; font-size: 14px;  height:25px;width:55px;">
<td align='left'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text" name="semana1" value=""   style=" font-family: Verdana; font-size: 14px;  height:25px;width:40px;">
<td align='left'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text" name="semana2" value=""   style=" font-family: Verdana; font-size: 14px;  height:25px;width:40px;">
<td align='left'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text" name="semana3" value=""   style=" font-family: Verdana; font-size: 14px;  height:25px;width:40px;">
<td align='left'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text" name="semana4" value=""   style=" font-family: Verdana; font-size: 14px;  height:25px;width:40px;">
<td align='left'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text" name="semana5" value=""   style=" font-family: Verdana; font-size: 14px;  height:25px;width:40px;">
<td align='left'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text" name="semana6" value=""   style=" font-family: Verdana; font-size: 14px;  height:25px;width:40px;">
<td align='left'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text" name="semana7" value=""   style=" font-family: Verdana; font-size: 14px;  height:25px;width:40px;">
<td>
<input type=image name="Incluir" src='../imagens/cadastrar.gif'><td>
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