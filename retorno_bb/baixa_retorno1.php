<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Operador Aplicativos
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

include("../logar.php");

include("menu.php");

$nome3 = $_SESSION["nome_log"];

include("vaurls.php");

$deixar = acesso_url("FORM_RETORNO");

if ($deixar == "SIM"){


// Resgata Sessao
session_name("Val_Sind");
session_start();

$Edit1   = $_SESSION['Edit1'];
$Edit2   = $_SESSION['Edit2'];
$Edit3   = $_SESSION['Edit3']; 
$Edit4   = $_SESSION['Edit4'];
$Edit5   = $_SESSION['Edit5'];
$nurecno = $_SESSION['nurecno'];

if (!empty($Edit3)){
	
}else{
	
    $Edit3 = 0;
}

if (!empty($Edit4)){
	
}else{
	
    $Edit4 = 0;
}
	

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// Conta quantas guias vao ser impressas

include_once("../funcoes2.php");


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
		document.getElementById("Edit1").focus();	
		}
		
		</script>
		<?
}


?>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>

<style type=text/css>

body { background-image: url(<?='../'.$logo_sis;?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
--></style> 

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

// End -->
</script>

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "  >
<form style="margin-bottom: 0" id="form1" name="form1" method="post"  action="TRBrasil_id.php">
<table  width="1000"   style="height:496px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 279px; WIDTH: 460px; POSITION: absolute; TOP: 44px; HEIGHT: 388px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 428 - 16, 356 - 16);
  Shape1_Canvas.fillRect(16, 16, 428 - 16 + 1, 356 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(16, 16, 428 - 16 + 1, 356 - 16 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 312px; WIDTH: 394px; POSITION: absolute; TOP: 77px; HEIGHT: 55px">
<script type="text/javascript">
  var Shape2_Canvas = new jsGraphics("Shape2_outer");
  Shape2_Canvas.setColor("#FFFFFF");
  Shape2_Canvas.fillRect(1, 1, 392 - 1, 53 - 1);
  Shape2_Canvas.fillRect(1, 1, 392 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.setStroke(1);
  Shape2_Canvas.setColor("<?=$color_bor;?>");
  Shape2_Canvas.drawRect(1, 1, 392 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Shape3_outer" style="Z-INDEX: 2; LEFT: 312px; WIDTH: 394px; POSITION: absolute; TOP: 133px; HEIGHT: 266px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 392 - 1, 264 - 1);
  Shape3_Canvas.fillRect(1, 1, 392 - 1 + 1, 264 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 392 - 1 + 1, 264 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 3; LEFT: 329px; WIDTH: 139px; POSITION: absolute; TOP: 212px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:139px;"   ><STRONG>Vencimento.:</STRONG></div>
</div>
<div id="Label11_outer" style="Z-INDEX: 4; LEFT: 329px; WIDTH: 155px; POSITION: absolute; TOP: 237px; HEIGHT: 26px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:155px;"   ><STRONG>Ano Exercicio.:</STRONG>&nbsp;</div>
</div>
<div id="Label22_outer" style="Z-INDEX: 5; LEFT: 320px; WIDTH: 107px; POSITION: absolute; TOP: 275px; HEIGHT: 26px">
<div id="Label22" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:107px;"   ><STRONG>Nº Registros:</STRONG></div>
</div>
<div id="Label26_outer" style="Z-INDEX: 6; LEFT: 320px; WIDTH: 161px; POSITION: absolute; TOP: 301px; HEIGHT: 26px">
<div id="Label26" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:161px;"   ><STRONG>Total Mensalidade.:</STRONG></div>
</div>
<div id="Label4_outer" style="Z-INDEX: 7; LEFT: 484px; WIDTH: 135px; POSITION: absolute; TOP: 276px; HEIGHT: 18px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #FF0000;font-weight: normal; height:18px;width:135px;"   ><STRONG>000</STRONG></div>
</div>
<div id="Label68_outer" style="Z-INDEX: 8; LEFT: 487px; WIDTH: 109px; POSITION: absolute; TOP: 302px; HEIGHT: 24px">
<div id="Label68" style=" font-family: Verdana; font-size: 14px; color: #FF0000;font-weight: normal; height:24px;width:109px;"   ><STRONG>000</STRONG></div>
</div>
<div id="Label1_outer" style="Z-INDEX: 9; LEFT: 325px; WIDTH: 370px; POSITION: absolute; TOP: 87px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?=$color_bor;?>; background-color: #FFFFFF;height:32px;width:370px;"   ><STRONG>Tratar Retorno</STRONG></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 10; LEFT: 488px; WIDTH: 96px; POSITION: absolute; TOP: 208px; HEIGHT: 27px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:96px;"  onkeypress="return txtBoxFormat(document.form1, 'Edit1', '99/99/9999', event);"  tabindex="0"    />
</div>
<div id="Edit2_outer" style="Z-INDEX: 11; LEFT: 488px; WIDTH: 61px; POSITION: absolute; TOP: 234px; HEIGHT: 27px">
<input type="text" id="Edit2" name="Edit2" value="<?=$Edit2;?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:61px;"    tabindex="0"    /></div>



<div style="Z-INDEX: 34; LEFT: 340px; WIDTH: 544px; POSITION: absolute; TOP: 140px; HEIGHT: 80px">
<table border='0' aling=center>
<td>
<input type='radio' Name='recerber'  Value='1' checked  onFocus="nextfield ='Edit1';"/>&nbsp;&nbsp;&nbsp;&nbsp;<img id="Image1" src="../imagens/logo_caixa.bmp"  width="44"  height="38"  border="0"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='radio' Name='recerber'  Value='2'          onFocus="nextfield ='Edit1';"/>&nbsp;&nbsp;&nbsp;&nbsp;<img id="Image2" src="../imagens/bb.bmp"  width="45"  height="45"  border="0"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='radio' Name='recerber'  Value='3'          onFocus="nextfield ='Edit1';"/>&nbsp;&nbsp;&nbsp;&nbsp;<img id="Image3" src="../imagens/Bradesco.bmp"  width="42"  height="42"  border="0"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</table>
</div>          




<div id="Label3_outer" style="Z-INDEX: 18; LEFT: 320px; WIDTH: 161px; POSITION: absolute; TOP: 329px; HEIGHT: 26px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:161px;"   ><STRONG>Total Contribuição.:</STRONG></div>
</div>
<div id="Label5_outer" style="Z-INDEX: 19; LEFT: 487px; WIDTH: 109px; POSITION: absolute; TOP: 330px; HEIGHT: 24px">
<div id="Label5" style=" font-family: Verdana; font-size: 14px; color: #FF0000;font-weight: normal; height:24px;width:109px;"   ><STRONG>000</STRONG></div>
</div>
</td>
</tr>
</table>

<div id="Image4_outer" style="Z-INDEX: 20; LEFT: 369px; WIDTH: 92px; POSITION: absolute; TOP: 363px; HEIGHT: 22px">
<input type=image name='incluir' src="../imagens/botaoazul_enviar.PNG"/>
</div>

</form></body>

<!--
<div id="Image4_outer" style="Z-INDEX: 20; LEFT: 369px; WIDTH: 92px; POSITION: absolute; TOP: 363px; HEIGHT: 22px">
<div id="Image4_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="TRBrasil_id.php?vencto1=<?=$Edit1;?>&exec1=<?=$Edit2;?>&recebe=<?=$receber;?>"><img id="Image4" src="../imagens/botaoazul_enviar.PNG"  width="92"  height="22"  border="0"       /></a></div>
</div>
-->

<div id="Image5_outer" style="Z-INDEX: 21; LEFT: 467px; WIDTH: 92px; POSITION: absolute; TOP: 363px; HEIGHT: 22px">
<div id="Image5_container" style=" width: 92;  height: 22; overflow: hidden;" ><img id="Image5" src="../imagens/botaoazul10.PNG"  width="92"  height="22"  border="0"       /></div>
</div>
<div id="Image6_outer" style="Z-INDEX: 22; LEFT: 565px; WIDTH: 92px; POSITION: absolute; TOP: 363px; HEIGHT: 22px">
<div id="Image6_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="../avaleht.php?servletjs2=20$$20" ><img id="Image6" src="../imagens/botaoazul33.PNG"  width="92"  height="22"  border="0"       /></a></div>
</div>


</html>
<?
}else{
	
include("enaaurlnp.php");
	
}
?>
