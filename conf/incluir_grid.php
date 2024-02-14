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

include("../logar.php");

$nome3 = $_SESSION["nome_log"];

include("menu.php");

include("vaurls.php");

$deixar = acesso_url("GRID_CONF");

if ($deixar == "SIM"){

$titulo_tabela = "'CONTRIBUIÇÕES - EMPRESAS'";
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

<?php

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);


$Edit1 = $cod_incl;

// Resgata a Sessao
@session_start();
$cod_incl = $_SESSION['cod_incl'];

// retorna uma pesquisa

$sql  = "SELECT * FROM conf LIMIT 0,1";

$resultado = @mysql_query($sql);
	
$row = @mysql_fetch_array($resultado);

$dat_ins = date("d/m/Y");

        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit1").focus();	
		}
		</script>
<?php

if (!empty($Edit1)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit2").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit2)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit3").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit3)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit4").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit4)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit5").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit5)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit6").focus();	
		}
		
		</script>
		<?php
}
?>
<script LANGUAGE="JavaScript">
<!-- Begin
nextfield = "Edit1";
netscape = "";
ver = navigator.appVersion; len = ver.length;
function keyDown(DnEvents) {
k = (netscape) ? DnEvents.which : window.event.keyCode;
if (k == 13) {
if (nextfield == 'done') {
return false;
} else {
eval('document.form1.' + nextfield + '.focus()');
return false;}}}
document.onkeydown = keyDown;
if (netscape) document.captureEvents(Event.KEYDOWN|Event.KEYUP);
// End -->
</script>

<br>
<br>
          
<table border=0  align=center>
<tr align=left colspan=2> 
<td><b><?=$titulo_tabela;?></b></td>
<div align=center>
<body onload="foco();">
<form id="form1" name="form1" method="POST" action="cadastrar_grid.php?Acao=insert">

<table align=center border='15' bgcolor='#FFFFFF' bordercolor ='<?=$color_bor;?>'>
<tr>
<td>
<table border='1' align=center>

<td valign=top><b>COD</b>
<th><b>VENCTO</b>
<th><b>VALOR</b>
<th><b>AGENCIA</b>
<th><b>DESCRICAO</b>
<th><b>DAT_BAI</b>
</td>

<tr> 
<td align='left'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text"    name="Edit1" value="<?=$cod_incl;?>" readonly maxlength="11"    style=" font-family: Verdana; font-size: 14px;  height:25px;width:70px;" onFocus="nextfield ='Edit2';">
<td align='right'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text"   name="Edit2" maxlength="10"  onkeypress="return txtBoxFormat(document.form1, 'Edit2', '99/99/9999', event);"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:100px;" onFocus="nextfield ='Edit3';">
<td align='right'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text"    name="Edit3" maxlength="12"    style=" font-family: Verdana; font-size: 14px;  height:25px;width:100px;" onFocus="nextfield ='Edit4';">
<td align='left'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text"    name="Edit4" maxlength="4"     style=" font-family: Verdana; font-size: 14px;  height:25px;width:75px;" onFocus="nextfield ='Edit5';">
<td align='left'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text"    name="Edit5" maxlength="15"    style=" font-family: Verdana; font-size: 14px;  height:25px;width:132px;" onFocus="nextfield ='Edit6';">
<td align='left'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text"    name="Edit6" maxlength="10" value="<?=$dat_ins;?>"  readonly  style=" font-family: Verdana; font-size: 14px;  height:25px;width:100px;">
<td>
<input type=image name="Incluir" src='../imagens/cadastrar.gif'><td>
<A HREF='mostra_grid.php?empr=1'><img alt='Cancelar' id='Image2' src='../imagens/cancelar.gif' border='0'></A><td>

</form>
</body>
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
