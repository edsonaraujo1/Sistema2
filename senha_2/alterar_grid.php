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

// include("../logar.php");

$nome3 = $_SESSION["nome_log"];

include("menu.php");

include("vaurls.php");

$deixar = acesso_url("GRID_MENSALIDADE");

if ($deixar == "SIM"){

$titulo_tabela = "'PERMISSOES DE USO - TABELAS' Alterar";
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

$sql  = "SELECT * FROM permissoes WHERE id = '". $_GET['Cod_2'] ."'";

$resultado = @mysql_query($sql);
	
$row = mysql_fetch_array($resultado);

$id     = @$row["id"];
$Edit1  = @$row["login"];
$Edit2  = @$row["tabela"];
$Edit3  = @$row["incluir"]; 
$Edit4 	= @$row["alterar"];  
$Edit5 	= @$row["excluir"];
$Edit6 	= @$row["imprimir"];

$faz = 1;

?>
<br>
<br>
          
<table border=0  align=center>
<tr align=left colspan=2> 
<td><b><?php echo $titulo_tabela ?></b></td>
<div align=center>

<form type="hidden" method="POST" action="cadastrar_grid.php?Acao=update">

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

<td align='left'>  <font style=' font-family: Verdana; font-size: 12px;'> <input type="text"    name="Edit1" value="<?php echo $Edit1 ?>" readonly  style=" font-family: Verdana; font-size: 14px; width:120px; color: #696969;">
<td align='right'> <font style=' font-family: Verdana; font-size: 12px;'>

  <select type="text"  name="Edit2" value="<?php echo $Edit2 ?>" style=" font-family: Verdana; font-size: 14px;">
 
 <?php

// iniciando a query que irá mostrar as tabelas desta base
$executa="SHOW TABLES";
	
$query=mysql_query($executa,$link) or die(mysql_error());

if (!empty($Edit2)){
	
	?>
	<option value="<?php echo $Edit2 ?>"><?php echo $Edit2 ?></option>
	<?php
	
	while ($dados=mysql_fetch_array($query))
	{
	    // imprimindo o nome das tabelas existentes no banco
		?>
		<option value="<?php echo $dados[0] ?>"><?php echo $dados[0] ?></option>
		<?php
	
	}
}else{

	?>
	<option value="Selecione Tabela">Selecione Tabela</option>
	<?php
	
	while ($dados=mysql_fetch_array($query))
	{
	    // imprimindo o nome das tabelas existentes no banco
		?>
		<option value="<?php echo $dados[0] ?>"><?php echo $dados[0] ?></option>
		<?php
	
	}
}	
?>
</select>


 
<td align='center'>  <font style=' font-family: Verdana; font-size: 12px;'> 

 <select type="text"    name="Edit3"  value="<?php echo $Edit3 ?>" style=" font-family: Verdana; font-size: 14px; ">
 
 	<option value="<?php echo $Edit3 ?>"> <?php echo $Edit3 ?> </option>
            <option value="SIM"> SIM </option>
            <option value="NAO"> NAO </option>

</select>

<td align='center'>  <font style=' font-family: Verdana; font-size: 12px;'>
 
  <select type="text"    name="Edit4"  value="<?php echo $Edit4 ?>" style=" font-family: Verdana; font-size: 14px; ">
 
  	<option value="<?php echo $Edit4 ?>"> <?php echo $Edit4 ?> </option>
            <option value="SIM"> SIM </option>
            <option value="NAO"> NAO </option>

</select>

<td align='center'>  <font style=' font-family: Verdana; font-size: 12px;'>

 <select type="text"    name="Edit5"  value="<?php echo $Edit5 ?>" style=" font-family: Verdana; font-size: 14px; ">
 
  	<option value="<?php echo $Edit5 ?>"> <?php echo $Edit5 ?> </option>
            <option value="SIM"> SIM </option>
            <option value="NAO"> NAO </option>

</select>
 
 
<td align='center'>  <font style=' font-family: Verdana; font-size: 12px;'>
 
  <select type="text"    name="Edit6"  value="<?php echo $Edit6 ?>" style=" font-family: Verdana; font-size: 14px; ">
 
  	<option value="<?php echo $Edit6 ?>"> <?php echo $Edit6 ?> </option>
            <option value="SIM"> SIM </option>
            <option value="NAO"> NAO </option>

</select>

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