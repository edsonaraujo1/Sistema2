<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Alteracao de Confederativa
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

$deixar = acesso_url("CADASTRO");

if ($deixar == "SIM"){

$titulo_tabela = "'Contribui��o' Alterar";
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

// Abre Conex�o com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// retorna uma pesquisa

$sql  = "SELECT * FROM conf WHERE id = $Cod_2";

$resultado = @mysql_query($sql);
	
$row = mysql_fetch_array($resultado);

$id       = @$row["id"];
$Edit1    = @$row["CONFCOD"];
$vencto   = @$row["VENCTO"];
$total    = @$row["TOTAL"];
$descri   = @$row["DESCRICAO"];
$emissao  = @$row["DATA"];
$dat_bai  = @$row["DAT_BAI"];
$dat_pag  = @$row["PAGTO"];
$qtd      = @$row["QTD"];
$local    = @$row["AGENCIA"];
$acordo   = @$row["ACORDO"];

$faz = 1;

?>
<br/>
<br/>
          
<table border=0  align=center>
<tr align=left colspan=2> 
<td><b><?=$titulo_tabela;?></b></td>
<div align=center>

<form type="hidden" method="POST" action="update_conf.php?Acao=update">

<table align=center border='15' bgcolor='#FFFFFF' bordercolor ='<?=$color_bor;?>'>
<tr>
<td>
<table border='1' align=center>

          
<td valign=top><b></b>
<th><b>CONFCOD</b>
<th><b>VENCTO</b>
<th><b>PAGAMENTO</b>
<th><b>VALOR R$</b>
<th><b>AGENCIA</b>
<th><b>DAT-BAIXA</b>
<th><b>DESCRICAO</b>
</td>

<tr> 
<td align='center'> <font style=' font-family: Verdana; font-size: 14px;'> <input type="hidden"  name="id"    value="<?=$id;?>"  readonly style=" font-family: Verdana; font-size: 14px;  height:25px;width:0px;">
<td align='center'>  <font style=' font-family: Verdana; font-size: 12px;'> <input type="text"    name="Edit1" value="<?=$Edit1;?>" maxlength="5"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:70px;">
<td align='center'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text"    name="Edit2" value="<?=$vencto;?>" maxlength="10"  readonly   style=" font-family: Verdana; font-size: 14px;  height:25px;width:95px;">
<td align='center'>  <font style=' font-family: Verdana; font-size: 12px;'> <input type="text"    name="Edit3" value="<?=$dat_pag;?>" maxlength="10"    style=" font-family: Verdana; font-size: 14px;  height:25px;width:95px;">
<td align='center'>  <font style=' font-family: Verdana; font-size: 12px;'> <input type="text"    name="Edit4" value="<?=$total ;?>" maxlength="10"     style=" font-family: Verdana; font-size: 14px;  height:25px;width:90px;">
<td align='center'>  <font style=' font-family: Verdana; font-size: 12px;'> <input type="text"    name="Edit5" value="<?=$local;?>" maxlength="4"     style=" font-family: Verdana; font-size: 14px;  height:25px;width:50px;">
<td align='center'>  <font style=' font-family: Verdana; font-size: 12px;'> <input type="text"    name="Edit6" value="<?=$dat_bai;?>" maxlength="10"     style=" font-family: Verdana; font-size: 14px;  height:25px;width:95px;">
<td align='center'>  <font style=' font-family: Verdana; font-size: 12px;'> <input type="text"    name="Edit7" value="<?=$descri;?>" maxlength="15"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:150px;">
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
