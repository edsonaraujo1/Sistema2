<?
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
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");

$nome3 = $_SESSION["nome_log"];

include("menu.php");

include("vaurls.php");

$deixar = acesso_url("GRID_CATEGORIA");

if ($deixar == "SIM"){

?>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
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

// Abre Conex�o com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// retorna uma pesquisa

$sql  = "SELECT * FROM lis_fun_sind2 WHERE id = '$Cod_2'";

$resultado = @mysql_query($sql);
	
$row = mysql_fetch_array($resultado);

$id         = @$row["id"];
$cnpj       = @$row["cnpj"];
$cod        = @$row["codigo"];
$nome       = @$row["nome"];
$salario  	= @$row["salario"];
$desconto   = @$row["desconto"];

$titulo_tabela = "2� Tela de 'Funcionarios' - ".$cnpj." - Excluir";

$faz = 1;

?>
<br/>
<br/>
          
<table border=0  align=center>
<tr align=left colspan=2> 
<td><b><?=$titulo_tabela;?></b></td> 

<div align=center>

<form type="hidden" method="POST" action="cadastrar.php?Acao=deletar">

<table align=center border='15' bgcolor='#FFFFFF' bordercolor ='<?=$color_bor;?>'>
<tr>
<td>
<table border='1' align=center>

          
		   <td valign=top><b>Codigo</b>
		   <th><b>Funcionario</b>
		   <th><b>Salario</b>
		   <th><b>Desconto</b>
		   </td>

<tr> 
<td align='right'>  <font style=' font-family: Verdana; font-size: 12px;'>
<input type="text" name="codigo" value="<?=$cod;?>" disabled style=" font-family: Verdana; font-size: 14px;  height:25px;width:100px;"></b>

<td align='left'>    <font style=' font-family: Verdana; font-size: 12px;'>
<input type="text" name="nome" value="<?=$nome;?>" disabled style=" font-family: Verdana; font-size: 14px;  height:25px;width:300px;" onfocus="this.className='anormal'; nextfield ='salario';" onblur="this.className='normal'"></b>
<td align='right'>    <font style=' font-family: Verdana; font-size: 12px;'>
<input type="text" name="salario" value="<?=$salario;?>" disabled style=" font-family: Verdana; font-size: 14px;  height:25px;width:100px;" onfocus="this.className='anormal'; nextfield ='desconto';" onblur="this.className='normal'"></b>
<td align='right'>    <font style=' font-family: Verdana; font-size: 12px;'>
<input type="text" name="desconto" value="<?=$desconto;?>" disabled style=" font-family: Verdana; font-size: 14px;  height:25px;width:100px;" onfocus="this.className='anormal'; nextfield ='done';" onblur="this.className='normal'"></b>
<input type="hidden" name="cnpj" value="<?=$cod_7;?>"/>
<input type="hidden" name="codigo" value="<?=$cod;?>"/>
<input type="hidden" name="id" value="<?=$id;?>"/>
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