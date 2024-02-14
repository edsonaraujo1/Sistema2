<?php
include('config.php');

?>
<html>
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="imagens/favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>


<script language=javascript> 

// bloqueando a tecla Ctrl
if (document.all) {
    document.onkeydown = function() {
        var teclaCtrl = event.keyCode ? event.keyCode : (event.which ? event.which : event.charCode);
        if (teclaCtrl == 17) {
            alert('Opção Invalida !!!');
            return false;
        }
    }
}
// Bloqueia Botao direito do mouse
function click() { 
if (event.button==2||event.button==3) { 
alert('Botão desativado !!!') 
} 
} 
document.onmousedown=click 

var currentsec=0; 
var currentmin=0; 
var currentmil=0;
var keepgoin=false;
function timer(){
if(keepgoin){
currentmil+=1;
if (currentmil==10){
currentmil=0; 
currentsec+=1;
}
if (currentsec==60){
currentsec=0; 
currentmin+=1;
}
Strsec=''+currentsec;
Strmin=''+currentmin;
Strmil=''+currentmil;
if (Strsec.length!=2){
Strsec='0'+currentsec;
}
if (Strmin.length!=2){
Strmin="0"+currentmin;
}
document.display.seconds.value=Strsec
document.display.minutes.value=Strmin;
document.display.milsecs.value=Strmil;
setTimeout("timer()", 100);
}
}
function startover(){
keepgoin=false;
currentsec=0;
currentmin=0;
currentmil=0;
Strsec="00";
Strmin="00";
Strmil="00";
}
</script>

<script language="JavaScript"><!--

document.onkeydown = keyCatcher;

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

<style type=text/css>

body { background-image: url(<?php echo $logo_sis ?>);
       background-attachment: fixed }

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
-->
</style> 

<body>
<form style="margin-bottom: 0" id="Unit2" name="display" onreset="startover()">
<div align="center">
  <table width="402" height="219" border="16" bordercolor="<?php echo $color_bor ?>" bgcolor="#FFFFFF">
    <tr>
      <td width="391" height="62" bgcolor="#FFFFFF"><img src="imagens/px1.gif" width="10" height="10"><b><font color="#5A9CB1" size="6" face="Verdana, Arial, Helvetica, sans-serif">Cronometro</font></b></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><div align="center">
        <table width="49%" border="0" cellspacing="5">
          <tr>
            <td width="27%">minutos</td>
            <td width="27%">segundos</td>
            <td width="46%">milesimos</td>
          </tr>
          <tr>
            <td><input type="text" name="minutes" value="00" style=" font-family: Verdana; font-size: 16px;  height:23px;width:80px;"  maxlength=7  tabindex="0"></td>
            <td><input type="text" name="seconds" value="00" style=" font-family: Verdana; font-size: 16px;  height:23px;width:80px;"  maxlength=7  tabindex="0"></td>
            <td><input type="text" name="milsecs" value="00" style=" font-family: Verdana; font-size: 16px;  height:23px;width:80px;"  maxlength=7  tabindex="0"></td>
          </tr>
        </table>
        <table width="200" border="0" cellspacing="15">
          <tr>
            <td><img src='imagens/start.PNG' onclick="keepgoin=true;timer()" width="92" height="22"/></td>
            <td><img src='imagens/pausa.PNG' onclick="keepgoin=false;" type="button" value="Pausa" name="pause" width="92" height="22"/></td>
            <td><img src='imagens/zerar.PNG' onclick="document.forms[0].reset()" name="start" width="92" height="22"/></td>
          </tr>
        </table>
      </div></td>
    </tr>
  </table>
</div>
</form>
</body>
</html>
