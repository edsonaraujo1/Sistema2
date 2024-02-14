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

$deixar = acesso_url("GRID_CONF");

if ($deixar == "SIM"){

$titulo_tabela = "'CONTRIBUIÇÕES' - Alterar -'";

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

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// retorna uma pesquisa

$sql  = "SELECT * FROM gerador_conf WHERE controle = '". anti_sql_injection($Cod_2) ."'";

$resultado = @mysql_query($sql);
	
$row = @mysql_fetch_array($resultado);

$id     = @$row["controle"];
$Edit1  = @$row["COD"];
$Edit2  = @$row["VENCTO"];
$Edit3  = @$row["CGC"]; 
$Edit4  = @$row["TIPO_CONT"];  
$Edit5  = @$row["SITUACAO"];
$Edit6  = @$row["PRORROGA"];
$Edit7  = @$row["VALOR"];
$Edit8  = @$row["DATA_BAI"];
$Edit9  = @$row["EXEC"];

//echo $id."<br>";

if (empty($Edit3)){
	
	$sql2  = "SELECT * FROM edificios WHERE COD = '". anti_sql_injection($cod_incl)."'";

	$resul_trans2 = @mysql_query($sql2);
		
	$rowtr2 = @mysql_fetch_array($resul_trans2);
	
	$id        = @$rowtr2["controle"];
	$cod_incl  = @$rowtr2["COD"];
	$cgc1      = @$rowtr2["CGC"];
	//echo 'entrei aqui no primeiro<br>';
	//echo $cgc1."<br>";

}

if (empty($Edit3)){
	
	$Edit3 = $cgc1;
}

//echo $cod_incl."<br>";
//echo $Edit3."<br>";

$faz = 1;

@session_start();
$_SESSION['Procura'] = addslashes($Edit1);
$_SESSION['Opcao']   = "EXCLUIDO";

?>
<br>
<br>
          
<table border=0  align=center>
<tr align=left colspan=2> 
<td><b><?=$titulo_tabela.' CNPJ '.$Edit3;?></b></td>
<div align=center>

<form type="hidden" method="POST" action="cadastrar_grid.php?Acao=update">

<table align=center border='15' bgcolor='#FFFFFF' bordercolor ='<?=$color_bor;?>'>
<tr>
<td>
<table border='1' align=center>
          
<td valign=top><b></b>
<th><b>Cod</b>
<th><b>Ano</b>
<th><b>Vencto</b>
<th><font color="#FF0000"><b>TIPO</b></font>
<th><b>Situação</b>
<th><b>Pago</b>
<th>

<tr> 
<td align='right'> <font style=' font-family: Verdana; font-size: 14px;'> <input type="hidden"   name="id" value="<?=$id;?>"  readonly style=" height:25px;width:0px;">
<td align='center'> <font style=' font-family: Verdana; font-size: 14px;'> <b><input type="text" name="Edit1" value="<?=$Edit1;?>"  readonly style=" font-family: Verdana; font-size: 14px;  height:25px;width:55px;"></b>
<td align='center'> <font style=' font-family: Verdana; font-size: 14px;'> <b><input type="text" name="Edit9" value="<?=$Edit9;?>"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:65px;"></b>
<td align='right'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text"     name="Edit2" value="<?=$Edit2;?>"  maxlength="10" readonly style=" font-family: Verdana; font-size: 14px;  height:25px;width:97px;">
<td align='left'> <font style=' font-family: Verdana; font-size: 12px;'>

 <select type="text"      name="Edit4" value="<?=$Edit4;?>"  maxlength="11"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:130px;">
 
  	<option value="<?=$Edit4;?>"> <?=$Edit4;?> </option>
            <option value="SINDICAL">      SINDICAL </option>
            <option value="ASSISTENCIAL">  ASSISTENCIAL </option>
            <option value="CONFEDERATIVA"> CONFEDERATIVA </option>

</select>
 
<td align='right'> <font style=' font-family: Verdana; font-size: 12px;'>


<select type="text"     name="Edit5" value="<?=$Edit5;?>"  maxlength="13"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:110px;">
 
  	<option value="<?=$Edit5;?>"> <?=$Edit5;?> </option>
            <option value="EM ABERTO"> EM ABERTO </option>
            <option value="PAGO">      PAGO </option>
            <option value="CANCELADO"> CANCELADO </option>

</select>
 
 
<td align='right'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text"     name="Edit7" value="<?=$Edit7;?>"  maxlength="10"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:100px;">
<td>
<input type=image name="Alterar" src='../imagens/atualizar.gif'><td>
<A HREF='mostra_grid.php'><img alt='Cancelar' id='Image2' src='../imagens/cancelar.gif' border='0'></A><td>

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
