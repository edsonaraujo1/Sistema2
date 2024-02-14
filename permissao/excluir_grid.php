<?php
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
$nome3 = $_SESSION["nome_log"];

include_once('../sql_injection.php');

include("vaurls.php");

$deixar = acesso_url("FORM_PERMIS");

if ($deixar == "SIM"){

$titulo_tabela = "'PERMISSOES DE USO - TABELAS' Excluir";

include("../menu_sub2.php");

?>

<html>
<head>
<title><?php echo $titulo_tabela ?></title>
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

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// retorna uma pesquisa

$sql  = "SELECT * FROM permissoes WHERE id = '". anti_sql_injection($_GET['Cod_2']) ."'";

$resultado = @mysql_query($sql);
	
$row = @mysql_fetch_array($resultado);

$id     = @$row["id"];
$Edit1  = @$row["login"];
$Edit2  = @$row["tabela"];
$Edit3  = @$row["incluir"]; 
$Edit4 	= @$row["alterar"];  
$Edit5 	= @$row["excluir"];
$Edit6 	= @$row["imprimir"];

$faz = 1;

?>
          
<table border=0  align=center>
<tr align=left colspan=2> 
<td><b><?php echo $titulo_tabela ?></b></td> 

<div align=center>

<form type="hidden" method="POST" action="cadastrar_grid.php?Acao=deletar">

<table align=center border='15' bgcolor='#FFFFFF' bordercolor ='<?php echo $color_bor ?>'>
<tr>
<td>
<table border='1' align=center>

          
<td valign=top><b></b>
<th><b>LOGIN</b>
<th><b>TABELA</b>
<th><b>INCLUIR</b>
<th><b>ALTERAR</b>
<th><b>EXCLUIR</b>
<th><b>IMPRIMIR</b>
</td>

<tr> 
<td align='right'> <font style=' font-family: Verdana; font-size: 14px;'> <input type="hidden"  name="id"    value="<?php echo $id ?>"  readonly style=" font-family: Verdana; font-size: 14px;  height:25px;width:0px;">

<td align='center'> <font style=' font-family: Verdana; font-size: 12px;'><b><?php echo $Edit1 ?></b>
<td align='right'>  <font style=' font-family: Verdana; font-size: 12px;'>   <?php echo $Edit2 ?>
<td align='center'> <font style=' font-family: Verdana; font-size: 12px;'>   <?php echo $Edit3 ?>
<td align='center'> <font style=' font-family: Verdana; font-size: 12px;'>   <?php echo $Edit4 ?>
<td align='center'> <font style=' font-family: Verdana; font-size: 12px;'>   <?php echo $Edit5 ?>
<td align='center'> <font style=' font-family: Verdana; font-size: 12px;'>   <?php echo $Edit6 ?>
<td>
<input type=image name="excluir" src='../imagens/excluir.gif'><td>
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