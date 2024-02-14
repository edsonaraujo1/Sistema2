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
@session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");

$nome3 = $_SESSION["nome_log"];

include("menu.php");

include("vaurls.php");

$deixar = acesso_url("GRID_CONF");

if ($deixar == "SIM"){

$titulo_tabela = "'CONTRIBUIÇÕES' - Incluir -'";


// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

$consulta  = "SELECT * FROM edificios WHERE COD = '$cod_incl3'";
	
// Fim da Função Navegar pelo registro

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id      = @$row["id"];
$Edit1   = @$row["COD"];
$Edit3   = @$row["CGC"];
$Edit2   = "";
$Edit4   = "";
$Edit5   = "";
$Edit7   = "";

//echo $cod_incl3."<br>";
//echo $Edit1;

//break;
/*
$Edit2   = @$row["ATIV"];
$Edit3   = @$row["DATA"];
$Edit4   = @$row["COND"];
$Edit5   = @$row["NOME"];
$Edit6   = @$row["RUA"];
$Edit7   = @$row["ENDERECO"];
$Edit8   = @$row["NUMERO"];
$Edit9   = @$row["CEP"];
$Edit10  = @$row["BAIRRO"];
$Edit11  = @$row["UF"]; 
$Edit12  = @$row["CGC"];
$Edit13  = @$row["FONE"];
$Edit14  = @$row["NU_EMP"];
$Edit15  = @$row["TIPOIMOV"];
$Edit16  = @$row["ZONA"];
$Edit17  = @$row["EMAIL"];
$Edit18  = @$row["T_MAIL"];
$Edit19  = @$row["ADM"];
$Edit20  = @$row["OBS"];
*/

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

//$Edit1 = $cod_incl2;
//$Edit3 = $crc;

// Resgata a Sessao
@session_start();
$cod_incl = $_SESSION['cod_incl'];

// retorna uma pesquisa

        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit1").focus();	
		}
		</script>
<?

if (!empty($Edit1)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit2").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit2)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit3").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit3)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit4").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit4)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit5").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit5)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit6").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit6)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit7").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit7)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("done").focus();	
		}
		
		</script>
		<?
}

?>
<script LANGUAGE="JavaScript">
<!-- Begin
nextfield = "Edit2";
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
<?
$Edit6 = $dat_insc = date("d/m/Y");
?>
<br>
<br>
          
<table border=0  align=center>
<tr align=left colspan=2> 
<td><b><?=$titulo_tabela. ' CNPJ '.$Edit3;?></b></td>
<div align=center>
<body onload="foco();">
<form id="form1" name="form1" method="POST" action="cadastrar_grid.php?Acao=insert">

<table align=center border='15' bgcolor='#FFFFFF' bordercolor ='<?=$color_bor;?>'>
<tr>
<td>
<table border='1' align=center>

<td valign=top><b>COD</b>
<th><b>ANO</b>
<th><b>VENCTO</b>
<th><font color="#FF0000"><b>TIPO</b></font>
<th><b>SITUAÇÃO</b>
<th><b>VALOR PAGO</b>
<th><b>BAIXA</b>
<th>

<tr> 
<td align='center'> <font style=' font-family: Verdana; font-size: 14px;'> <b><input type="text" name="Edit1" value="<?=$cod_incl3;?>"  readonly style=" font-family: Verdana; font-size: 14px;  height:25px;width:55px;"></b>
<td align='center'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text"    name="Edit9" value="<?=$Edit9;?>"  maxlength="10" style=" font-family: Verdana; font-size: 14px;  height:25px;width:98px;">
<td align='right'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text"     name="Edit2" value="<?=$Edit2;?>"  maxlength="10" onkeypress="return txtBoxFormat(document.form1, 'Edit2', '99/99/9999', event);" style=" font-family: Verdana; font-size: 14px;  height:25px;width:98px;">
<td align='left'> <font style=' font-family: Verdana; font-size: 12px;'>

 <select type="text"      name="Edit4" value="<?=$Edit4;?>"  maxlength="11"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:120px;">
 
  	<option value="<?=$Edit4;?>"> <?=$Edit4;?> </option>
            <option value="SINDICAL">      SINDICAL </option>
            <option value="ASSISTENCIAL">  ASSISTENCIAL </option>
            <option value="CONFEDERATIVA"> CONFEDERATIVA </option>

</select>
 
<td align='right'> <font style=' font-family: Verdana; font-size: 12px;'>


<select type="text"     name="Edit5" value="<?=$Edit5;?>"  maxlength="13"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:100px;">
 
  	<option value="<?=$Edit5;?>"> <?=$Edit5;?> </option>
            <option value="EM ABERTO"> EM ABERTO </option>
            <option value="PAGO">      PAGO </option>
            <option value="CANCELADO"> CANCELADO </option>

</select>
 
 
<td align='right'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text"     name="Edit7" value="<?=$Edit7;?>"  maxlength="10"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:120px;">
<td align='left'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text"      name="Edit8" value="<?=$Edit6;?>"  maxlength="10" onkeypress="return txtBoxFormat(document.form1, 'Edit8', '99/99/9999', event);"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:110px;">
<td>
<input type=image name="Incluir" src='../imagens/cadastrar.gif'><td>

<?
if ($empr == 1){
?>
<A HREF='mostra_grid.php'><img alt='Cancelar' id='Image2' src='../imagens/cancelar.gif' border='0'></A><td>
<?
}else{
?>	
	
<A HREF='../edif/cadastro.php?Cod_xx=<?=$Edit1;?>'><img alt='Cancelar' id='Image2' src='../imagens/cancelar.gif' border='0'></A><td>
	
	
<?	
}
?>
</form>
</body>
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
