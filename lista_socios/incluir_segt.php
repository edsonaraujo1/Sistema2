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

$deixar = acesso_url("GRID_CATEGORIA");

if ($deixar == "SIM"){

$titulo_tabela = "2ª Tela de 'Funcionarios' - ".$cod_7." - Incluir";

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

   $consulta  = "SELECT * FROM lis_fun_sind WHERE cnpj = '$cod_7'";
	

// Fim da Função Navegar pelo registro

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id            = @$row["id"];
$cod           = @$row["codigo"];
$Edit1         = @$row["cnpj"];
$nome_do_edif  = @$row["nome"];
$Edit3         = @$row["data"];
$Edit4         = @$row["obs"];

$faz = 1;

?>
<br/>
<br/>

<script language="JavaScript">
<!-- Begin
nextfield = "nome";
netscape = "";
ver = navigator.appVersion; len = ver.length;
function keyDown(DnEvents) {
k = (netscape) ? DnEvents.which : window.event.keyCode;
if (k == 13) {
if (nextfield == '') {
return false;
} else {
eval('document.Form1.' + nextfield + '.focus()');
return false;}}}
document.onkeydown = keyDown;
if (netscape) document.captureEvents(Event.KEYDOWN|Event.KEYUP);
// End -->

function txtBoxFormat(objForm, strField, sMask, evtKeyPress) {
var i, nCount, sValue, fldLen, mskLen,bolMask, sCod, nTecla;

     if(document.all) { nTecla = evtKeyPress.keyCode; }
else if(document.getElementById) { nTecla = evtKeyPress.which; }

sValue = objForm[strField].value;
sValue = sValue.toString().replace( "-", "" );
sValue = sValue.toString().replace( "-", "" );
sValue = sValue.toString().replace( ".", "" );
sValue = sValue.toString().replace( ".", "" );
sValue = sValue.toString().replace( "/", "" );
sValue = sValue.toString().replace( "/", "" );
sValue = sValue.toString().replace( "(", "" );
sValue = sValue.toString().replace( "(", "" );
sValue = sValue.toString().replace( ")", "" );
sValue = sValue.toString().replace( ")", "" );
sValue = sValue.toString().replace( " ", "" );
sValue = sValue.toString().replace( " ", "" );
fldLen = sValue.length;
mskLen = sMask.length;
i = 0;
nCount = 0;
sCod = "";
mskLen = fldLen;
while (i <= mskLen) {
bolMask = ((sMask.charAt(i) == "-") || (sMask.charAt(i) == ".") || (sMask.charAt(i) == "/"))
bolMask = bolMask || ((sMask.charAt(i) == "(") || (sMask.charAt(i) == ")") || (sMask.charAt(i) == " "))
if (bolMask) {
sCod += sMask.charAt(i);
mskLen++; }
else {
sCod += sValue.charAt(nCount);
nCount++;
}
i++;
}
objForm[strField].value = sCod;
if (nTecla != 8) { 
if (sMask.charAt(i-1) == "9") { 
return ((nTecla > 47) && (nTecla < 58)); } 
else { 
return true;
} }
else {
return true;
}
}
// Fim
</script>

<script language="JavaScript"><!--

//document.onkeydown = keyCatcher;

function keyCatcher() 
{
   var e = event.srcElement.tagName;

   if (event.keyCode == 8 && e != "INPUT" && e != "TEXTAREA") 
   {
      event.cancelBubble = true;
      event.returnValue = false;
   }
}
//-->
</script>

        <script language="JavaScript">
        function foco(){
		document.getElementById("nome").focus();	
		}
		
		</script>
		
<style>

.normal {
	
	background-color: white;
}
.anormal {
		background-color: Lavender;
}

</style>
		
<body onkeydown="javascript:if (event.KeyCode==13) event.KeyCode=9; javascript:document.onkeydown = keyCatcher();" onload="foco();">          
<table border=0  align=center>
<tr align=left colspan=2> 
<td><b><?=$titulo_tabela;?></b></td>
<div align=center>

<form type="hidden" method="POST" action="cadastrar.php?Acao=insert" >

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
<input type="text" name="nome" value=""  style=" font-family: Verdana; font-size: 14px;  height:25px;width:300px;" onfocus="this.className='anormal'; nextfield ='salario';" onblur="this.className='normal'"></b>
<td align='right'>    <font style=' font-family: Verdana; font-size: 12px;'>
<input type="text" name="salario" value=""  style=" font-family: Verdana; font-size: 14px;  height:25px;width:100px;" onfocus="this.className='anormal'; nextfield ='desconto';" onblur="this.className='normal'"></b>
<td align='right'>    <font style=' font-family: Verdana; font-size: 12px;'>
<input type="text" name="desconto" value=""  style=" font-family: Verdana; font-size: 14px;  height:25px;width:100px;" onfocus="this.className='anormal'; nextfield ='done';" onblur="this.className='normal'"></b>
<input type="hidden" name="cnpj" value="<?=$cod_7;?>"/>
<input type="hidden" name="codigo" value="<?=$cod;?>"/>
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
</body>
<?
}else{
	
include("enaaurlnp.php");
	
}
?>
