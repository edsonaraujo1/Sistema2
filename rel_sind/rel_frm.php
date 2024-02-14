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

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");

include("menu.php");

$nome3 = $_SESSION["nome_log"];

include("vaurls.php");

$deixar = acesso_url("REL_SIND_P");

if ($deixar == "SIM"){


// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

include("funcoes2.php");

?>

<html>
<head>
<title><?=$Titulo;?></title>
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
<form style="margin-bottom: 0" id="form1" name="form1" method="post"  action="acao_tes.php" target="new">
<table  width="824"   style="height:344px"  border="0" cellpadding="0" cellspacing="0"  ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 264px; WIDTH: 488px; POSITION: absolute; TOP: 80px; HEIGHT: 240px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(15, 15, 458 - 15, 210 - 15);
  Shape1_Canvas.fillRect(15, 15, 458 - 15 + 1, 210 - 15 + 1);
  Shape1_Canvas.setStroke(15);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(15, 15, 458 - 15 + 1, 210 - 15 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 296px; WIDTH: 424px; POSITION: absolute; TOP: 112px; HEIGHT: 48px">
<script type="text/javascript">
  var Shape2_Canvas = new jsGraphics("Shape2_outer");
  Shape2_Canvas.setColor("#FFFFFF");
  Shape2_Canvas.fillRect(1, 1, 422 - 1, 46 - 1);
  Shape2_Canvas.fillRect(1, 1, 422 - 1 + 1, 46 - 1 + 1);
  Shape2_Canvas.setStroke(1);
  Shape2_Canvas.setColor("<?=$color_bor;?>");
  Shape2_Canvas.drawRect(1, 1, 422 - 1 + 1, 46 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 313px; WIDTH: 383px; POSITION: absolute; TOP: 119px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?=$color_bor;?>; height:32px;width:383px;"   ><STRONG>Sindical Pagas</STRONG></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 3; LEFT: 296px; WIDTH: 424px; POSITION: absolute; TOP: 162px; HEIGHT: 126px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 422 - 1, 124 - 1);
  Shape3_Canvas.fillRect(1, 1, 422 - 1 + 1, 124 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 422 - 1 + 1, 124 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 4; LEFT: 350px; WIDTH: 176px; POSITION: absolute; TOP: 180px; HEIGHT: 24px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px;  height:24px;width:176px;"   ><STRONG>Codigo do Edificios:</STRONG></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 5; LEFT: 513px; WIDTH: 101px; POSITION: absolute; TOP: 175px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:101px;"    tabindex="0"    />
</div>
<div style="Z-INDEX: 34; LEFT:379px; WIDTH: 544px; POSITION: absolute; TOP: 208px; HEIGHT: 80px">
<table border='0' aling=center>
<td>
<input type='radio' Name='recerber'  Value='1' checked onFocus="nextfield ='Edit1';"><font style=" font-family: Verdana; font-size: 14px; font-weight: bold;"><b>HTML</b>
<input type='radio' Name='recerber'  Value='2'         onFocus="nextfield ='Edit1';"><font style=" font-family: Verdana; font-size: 14px; font-weight: bold;"><b>Excel</b>
<input type='radio' Name='recerber'  Value='3'         onFocus="nextfield ='Edit1';"><font style=" font-family: Verdana; font-size: 14px; font-weight: bold;"><b>PDF</b>
</table>
</div>          
</td></tr></table>
</body>

<div style="Z-INDEX: 34; LEFT: 410px; WIDTH: 544px; POSITION: absolute; TOP: 250px; HEIGHT: 80px">
<table border='0'>
         <td> </td>
         <td><input type=image name="guias" src="../imagens/botaoazul23.PNG"></td>
         </form>

         <form method="POST" action="<?=$path;?>avaleht.php?servletjs2=20$$20">
         <td><input type=image name="socios" src="../imagens/botaoazul9.PNG"></td>
         </form>

</table>
</div>

</html>
<script>
<!--
function janelaSecundaria (URL){ 
   window.open(URL,"janela2","width=260,height=390,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 

//-->
</script>
<?
}else{
	
include("enaaurlnp.php");
	
}
?>
