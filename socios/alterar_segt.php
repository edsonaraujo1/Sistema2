<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Listagem na Tela por Codigo
 Criado em Data.....: 07/12/2007
 Ultima Atualiza��o : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/
// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

// include("../logar.php");

$nome3 = $_SESSION["nome_log"];

include("menu.php");

include_once('../sql_injection.php');

include("vaurls.php");

$deixar = acesso_url("GRID_DEBITO");

if ($deixar == "SIM"){


$titulo_tabela = "DEBITOS E PROMISS�RIAS - Socios -";
?>

<html>
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>

<style type=text/css>

body { background-image: url(<?php echo "../".$logo_sis ?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
--></style> 

</html>

<?php

// Abre Conex�o com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// retorna uma pesquisa

$sql  = "SELECT * FROM debito WHERE id = '". anti_sql_injection($Cod_2) ."'";

$resultado = @mysql_query($sql);
	
$row = @mysql_fetch_array($resultado);

$id_codigo = @$row["id"];
$cod_p     = @$row["CODP"];
$descricao = @$row["DESCRICAO"];
$valor     = @$row["VALOR"];
$data      = @$row["DATA"];
$PARCELA   = @$row["PARCELA"];
$vencto    = @$row["VENCIMENTO"];

$faz = 1;

?>
<br/>
<br/>
          
<table border=0  align=center>
<tr align=left colspan=2> 
<td><b><?php echo $titulo_tabela ?></b></td>
<div align=center>

<form type="hidden" method="POST" action="cadastrar.php?Acao=update">

<table align=center border='15' bgcolor='#FFFFFF' bordercolor ='<?php echo $color_bor ?>'>
<tr>
<td>
<table border='1' align=center>

          
		   <td valign=top><b>MATRICULA</b>
		   <th><b>DESCRI��O</b>
		   <th><b>VALOR</b>
		   <th><b>PARCELA</b>
		   <th><b>VENCIMENTO</b>
		   </td>

<tr> 

<td align='center'> <font style=' font-family: Verdana; font-size: 12px;'><b><input type="text" name="Edit1" value="<?php echo $cod_p ?>" readonly  style=" font-family: Verdana; font-size: 14px;  height:25px;width:100px;"></b>
<td align='left'>   <font style=' font-family: Verdana; font-size: 12px;'><input type="text" name="Edit2" value="<?php echo $descricao ?>"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:150px;">
<td align='right'>  <font style=' font-family: Verdana; font-size: 12px;'><input type="text" name="Edit3" value="<?php echo $valor ?>"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:100px;">
<td align='right'>  <font style=' font-family: Verdana; font-size: 12px;'><input type="text" name="PARCELA1" value="<?php echo $PARCELA ?>"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:120px;">
<td align='center'> <font style=' font-family: Verdana; font-size: 12px;'><input type="text" name="Edit6" value="<?php echo $vencto ?>"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:110px;" onkeypress="return txtBoxFormat(document.Form1, 'Edit6', '99/99/9999', event);">
<input type="hidden" name="id" value="<?php echo $id_codigo ?>"/>
<td>


<input type=image name="Alterar" src='../imagens/atualizar.gif'><td>
<A HREF='javascript:history.go(-1)'><img alt='Cancelar' id='Image2' src='../imagens/cancelar.gif' border='0'></A><td>

</form>
</font>
</td>
</table>
<?php

echo "
		      
	</table>
	</td>
	</tr>
	</table>
	</div>";

?>
<div align="center">
</div>
<?php
}else{
	
include("enaaurlnp.php");
	
}
?>
