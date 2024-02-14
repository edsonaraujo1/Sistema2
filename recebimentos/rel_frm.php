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


</script>


        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit1").focus();	
		}
		
		</script>

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; " onload="foco();" >
<form style="margin-bottom: 0" id="form1" name="form1" method="post"  action="rel_pdf.php" target="new">
<table  width="1000"   style="height:560px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 232px; WIDTH: 544px; POSITION: absolute; TOP: 44px; HEIGHT: 246px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 512 - 16, 214 - 16);
  Shape1_Canvas.fillRect(16, 16, 512 - 16 + 1, 214 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(16, 16, 512 - 16 + 1, 214 - 16 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 265px; WIDTH: 478px; POSITION: absolute; TOP: 78px; HEIGHT: 55px">
<script type="text/javascript">
  var Shape2_Canvas = new jsGraphics("Shape2_outer");
  Shape2_Canvas.setColor("#FFFFFF");
  Shape2_Canvas.fillRect(1, 1, 476 - 1, 53 - 1);
  Shape2_Canvas.fillRect(1, 1, 476 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.setStroke(1);
  Shape2_Canvas.setColor("<?=$color_bor;?>");
  Shape2_Canvas.drawRect(1, 1, 476 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Shape3_outer" style="Z-INDEX: 2; LEFT: 265px; WIDTH: 478px; POSITION: absolute; TOP: 133px; HEIGHT: 123px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 476 - 1, 121 - 1);
  Shape3_Canvas.fillRect(1, 1, 476 - 1 + 1, 121 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 476 - 1 + 1, 121 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 3; LEFT: 281px; WIDTH: 139px; POSITION: absolute; TOP: 147px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:139px;"   ><STRONG>Iniciar em.:</STRONG></div>
</div>
<div id="Label11_outer" style="Z-INDEX: 4; LEFT: 281px; WIDTH: 155px; POSITION: absolute; TOP: 172px; HEIGHT: 26px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:155px;"   ><STRONG>Terminar em.:</STRONG>&nbsp;</div>
</div>
<div id="Label1_outer" style="Z-INDEX: 5; LEFT: 274px; WIDTH: 380px; POSITION: absolute; TOP: 87px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?=$color_bor;?>; background-color: #FFFFFF;height:32px;width:380px;"   ><P><STRONG>Relatorios Pagtos Diarios.</STRONG></P></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 440px; WIDTH: 128px; POSITION: absolute; TOP: 143px; HEIGHT: 27px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" onkeypress="return txtBoxFormat(document.form1, 'Edit1', '99/99/9999', event);" style=" font-family: Verdana; font-size: 14px;  height:26px;width:128px;"    tabindex="0"    />
</div>
<div id="Edit2_outer" style="Z-INDEX: 7; LEFT: 440px; WIDTH: 128px; POSITION: absolute; TOP: 169px; HEIGHT: 27px">
<input type="text" id="Edit2" name="Edit2" value="<?=$Edit2;?>" onkeypress="return txtBoxFormat(document.form1, 'Edit2', '99/99/9999', event);" style=" font-family: Verdana; font-size: 14px;  height:26px;width:128px;"    tabindex="0"    />
</div>
</td></tr></table>
</body>

<div style="Z-INDEX: 34; LEFT: 400px; WIDTH: 544px; POSITION: absolute; TOP: 220px; HEIGHT: 80px">
<table border='0'>
         <td> </td>
         <td><input type=image name="imprimir" src="../imagens/botaoazul23.PNG"></td>
         </form>

         <form method="POST" action="cadastro.php">
         <td><input type=image name="voltar" src="../imagens/botaoazul9.PNG"></td>
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
