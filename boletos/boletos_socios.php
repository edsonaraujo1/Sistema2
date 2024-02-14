<?
include("../config.php");
// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");

include("menu.php");

$nome3 = $_SESSION["nome_log"];

include_once('../sql_injection.php');

include("vaurls.php");

$deixar = acesso_url("BOLETOS_SOC");

if ($deixar == "SIM"){

$mensagem = "  ";

include("funcoes2.php");


// Resgata Secao
@session_start();
$cod_matr_1x = $_SESSION['bole_soc'];

$Edit_matr_1 = '';
$Edit_matr_2 = '';

if (!empty($cod_matr_3)){
	
	$Edit_matr_1 = $cod_matr_3;
	$Edit_matr_2 = $cod_matr_3;
	
}

if (!empty($cod_matr_1x)){
	
	$Edit_matr_1 = $cod_matr_1x;
	$Edit_matr_2 = $cod_matr_1x;
	
}

if (!empty($cod_matr_1)){
	
	$Edit_matr_1 = $cod_matr_1;
	$Edit_matr_2 = $cod_matr_1;
	
}

$Edit1   = date('Y');
$Edit2   = '12';
$Edit3   = '8.00'; 
$Edit4   = $Edit_matr_1;
$Edit5   = $Edit_matr_2;

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

$consultaxx  = "SELECT * FROM edificios WHERE COD = '". anti_sql_injection($Edit5) ."'";
     
$resultadoxx = @mysql_query($consultaxx);

$rowxx = @mysql_fetch_array($resultadoxx);

?>

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

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<title><?=$Titulo;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<style type="text/css">
<!--

body { background-image: url(<?="../".$logo_sis;?>);}

.style1 {
	font-family: Arial;
	font-weight: bold;
	font-size: 18px;
}
.style3 {
	color: #6699FF;
	font-size: 21px;
}
.style6 {font-family: Arial; font-weight: bold; font-size: 14px; }
.style7 {
	font-size: 20px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #000000;
}
.style9 {font-family: Arial; font-weight: bold; font-size: 16px; color: #0000CC; }
-->

.normal {
	
	background-color: white;
}
.anormal {
		background-color: Lavender;
}

</style>
</head>

<?
include("help.php");
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
		document.getElementById("Edit5").focus();	
		}
		
		</script>
		<?
}

?>

<script language="JavaScript">
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
eval('document.Unit5.' + nextfield + '.focus()');
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

<script language="JavaScript">
var copytoclip=1
function HighlightAll(theField) {
var tempval=eval("document."+theField)
tempval.focus()
tempval.select()
 if (document.all&&copytoclip==1){
  therange=tempval.createTextRange()
  therange.execCommand("Copy")
  window.status="Conteúdo selecionado e copiado para a área de transferência!"
  setTimeout("window.status=''",2400);
  }
}

function highlight(field) {
       field.focus();
       field.select();
}

function goToURL() { window.location = "javascript:HighlightAll('forms[0].Edit1')"; }
</script>

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

<script language='javascript'> 

function janelaSecundaria (URL){ 
   window.open(URL,"janela1","resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 

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

<br /><br /><br />
<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; " onkeydown="javascript:if (event.KeyCode==13) event.KeyCode=9; javascript:document.onkeydown = keyCatcher();" onload="foco();" >

<div style="Z-INDEX: 500; LEFT: 00px; WIDTH: 616px; POSITION: absolute; TOP: 157px; HEIGHT: 19px">

<IFRAME src="../info/informes2.php" width="1" height="1" scrolling="no" frameborder="0" align="left"></IFRAME>

</div>


<table width="451" border="15" align="center" cellspacing="0" bordercolor="<?=$color_bor;?>" bgcolor="#FFFFFF">
  <tr>
    <td valign="top"><div align="center">
      <table width="100%" border="1" cellspacing="0" bordercolor="<?=$color_bor;?>" bgcolor="#FFFFFF">
	  <form name="form1" method="post"  action="bolesoc_pdf.php" target="new">
        <tr>
          <td height="38" valign="top"><div align="left">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="34"><span class="style1"><span class="style3"><img src="../imagens/px1.gif" width="9" height="1"><span class="style7">Impress&atilde;o de Boletos Mensalidade</span></span></span></td>
              </tr>
            </table>
            </div></td>
        </tr>
        <tr>
          <td height="202" align="center" valign="top"><table width="100%" border="0" cellspacing="0">
            <tr>
              <td width="53%"><div align="left"><span class="style6"><img src="../imagens/px1.gif" width="10" height="8">At&eacute; o Ano de : </span></div></td>
              <td width="47%"><div align="left">
                <input name="Edit1" type="text" value="<?=$Edit1;?>" onfocus="this.className='anormal'" onblur="this.className='normal'" size="5">
              </div></td>
              </tr>
            <tr>
              <td><div align="left"><span class="style6"><img src="../imagens/px1.gif" width="10" height="8">At&eacute; o M&ecirc;s de: </span></div></td>
              <td><div align="left">
                <input name="Edit2" type="text" value="<?=$Edit2;?>" onfocus="this.className='anormal'" onblur="this.className='normal'"  size="2" >
              </div></td>
              </tr>
            <tr>
              <td><div align="left"><span class="style6"><img src="../imagens/px1.gif" width="10" height="8">Valor.: </span></div></td>
              <td>                <div align="left">
                  <input name="Edit3" type="text" value="<?=$Edit3;?>" onfocus="this.className='anormal'" onblur="this.className='normal'" size="5" >
				</div></td>
              </tr>
            <tr>
              <td align="left"><div align="left"><span class="style6"><img src="../imagens/px1.gif" width="10" height="8">Iniciar em C&oacute;digo.:</span></div></td>
              <td align="left"><div align="left">
</div>
              <div align="left">
			      <input name="Edit4" type="text" value="<?=$Edit4;?>" size="6" onfocus="this.className='anormal'" onblur="this.className='normal'" style="text-transform: uppercase;" />
				
              </div></td>
            </tr>
            <tr>
              <td align="left"><span class="style6"><img src="../imagens/px1.gif" width="10" height="8">Terminar em  C&oacute;digo.:</span></td>
              <td align="left"><input name="Edit5" value="<?=$Edit5;?>" type="text" size="6" onfocus="this.className='anormal'" onblur="this.className='normal'" style="text-transform: uppercase;" />                </td>
            </tr>
            <tr>
              <td align="left">&nbsp;</td>
            </tr>
          </table>
            <br/>
			<input type=image name="guias" src="../imagens/botaoazul23.PNG" width="92" height="22"/>
			<img src="../imagens/px1.gif" width="10" height="1">
            <?
            if (!empty($cod_matr_3)){
            ?>	
                <a href='<?="../socios/cadsocios.php?cod_5=$Edit4";?>'><img src="../imagens/botao_voltar.PNG" width="92" height="22" border="0"></a><br>
            <?
            }else{
            ?>	
                <a href='<?="../avaleht.php?servletjs2=20$$20";?>'><img src="../imagens/botaoazul24.PNG" width="92" height="22" border="0"></a><br>
            <?	
            }
            ?>
            <img src="../imagens/px1.gif" width="10" height="12"></td>
        </tr>
		</form>
      </table>
    </div></td>
  </tr>
</table>
<div align="center"></div>


<div style="Z-INDEX: 35; LEFT: 670px; WIDTH: 25px; POSITION: absolute; TOP: 300px; HEIGHT: 35px" align="center">
<img id="Image3" src="../imagens/vacina.JPG"  width="25"  height="35"  border="0"       />
</div>

</body>
</html>


<?

Function retirar_ponto($var){

$var = str_replace(".",             "",$var);

return($var);
}

?>
<script>
function janelaSecundaria3 (URL){ 
   window.open(URL,"janela3","width=670,height=730,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 

function janelaSecundaria4 (URL){ 
   window.open(URL,"janela2","width=690,height=235,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO");
} 

</script>

<?
}else{
	
include("enaaurlnp.php");
	
}
?>
