<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Cronometro 
 Criado em Data.....: 18/06/2009
 Ultima Atualização : 18/06/2009

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

include ("funcoes2.php");
 
?>

<script language="javascript">
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

<html>
<head>
<title><?=$Titulo;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<style type=text/css>

body { background-image: url(<?=$logo_sis;?>);
       background-attachment: fixed }

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
-->
</style> 

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "  >
<form style="margin-bottom: 0" id="Unit2" name="display" onreset="startover()">
<table  width="1"   style="height:1px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 0px; WIDTH: 392px; POSITION: absolute; TOP: 0px; HEIGHT: 208px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(15, 15, 362 - 15, 178 - 15);
  Shape1_Canvas.fillRect(15, 15, 362 - 15 + 1, 178 - 15 + 1);
  Shape1_Canvas.setStroke(15);
  Shape1_Canvas.setColor("#5a9cb1");
  Shape1_Canvas.drawRect(15, 15, 362 - 15 + 1, 178 - 15 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 32px; WIDTH: 328px; POSITION: absolute; TOP: 80px; HEIGHT: 96px">
<script type="text/javascript">
  var Shape2_Canvas = new jsGraphics("Shape2_outer");
  Shape2_Canvas.setColor("#FFFFFF");
  Shape2_Canvas.fillRect(1, 1, 326 - 1, 94 - 1);
  Shape2_Canvas.fillRect(1, 1, 326 - 1 + 1, 94 - 1 + 1);
  Shape2_Canvas.setStroke(1);
  Shape2_Canvas.setColor("#5a9cb1");
  Shape2_Canvas.drawRect(1, 1, 326 - 1 + 1, 94 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>

<div id="Shape3_outer" style="Z-INDEX: 3; LEFT: 32px; WIDTH: 328px; POSITION: absolute; TOP: 32px; HEIGHT: 46px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 326 - 1, 44 - 1);
  Shape3_Canvas.fillRect(1, 1, 326 - 1 + 1, 44 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("#5a9cb1");
  Shape3_Canvas.drawRect(1, 1, 326 - 1 + 1, 44 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label31_outer" style="Z-INDEX: 4; LEFT: 48px; WIDTH: 192px; POSITION: absolute; TOP: 37px; HEIGHT: 32px">
<div id="Label31" style=" font-family: Verdana; font-size: 26px; color: #5a9cb1;font-weight: bold;text-align: left; height:32px;width:192px;"   ><P>Cronometro</P></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 2; LEFT: 63px; WIDTH: 80px; POSITION: absolute; TOP: 96px; HEIGHT: 24px">
<input type="text" id="Edit1" name="minutes" value="00" style=" font-family: Verdana; font-size: 16px;  height:23px;width:80px;"  maxlength=7  tabindex="0"    />
</div>
<div id="Edit2_outer" style="Z-INDEX: 5; LEFT: 151px; WIDTH: 80px; POSITION: absolute; TOP: 96px; HEIGHT: 24px">
<input type="text" id="Edit2" name="seconds" value="00" style=" font-family: Verdana; font-size: 16px;  height:23px;width:80px;"  maxlength=7  tabindex="0"    />
</div>
<div id="Edit3_outer" style="Z-INDEX: 6; LEFT: 239px; WIDTH: 80px; POSITION: absolute; TOP: 96px; HEIGHT: 24px">
<input type="text" id="Edit3" name="milsecs" value="00" style=" font-family: Verdana; font-size: 16px;  height:23px;width:80px;"  maxlength=7  tabindex="0"    />
</div>

<div id="Label1_outer" style="Z-INDEX: 10; LEFT: 64px; WIDTH: 56px; POSITION: absolute; TOP: 83px; HEIGHT: 12px">
<div id="Label1" style=" font-family: Verdana; font-size: 10px;  height:12px;width:56px;"   >minutos</div>
</div>
<div id="Label2_outer" style="Z-INDEX: 11; LEFT: 153px; WIDTH: 56px; POSITION: absolute; TOP: 83px; HEIGHT: 12px">
<div id="Label2" style=" font-family: Verdana; font-size: 10px;  height:12px;width:56px;"   >segundos</div>
</div>

<div id="Image1_outer" style="Z-INDEX: 7; LEFT: 48px; WIDTH: 92px; POSITION: absolute; TOP: 136px; HEIGHT: 22px">
<div id="Image1_container" style=" width: 92;  height: 22; overflow: hidden;" >
<img src='imagens/start.PNG' onclick="keepgoin=true;timer()"/>
</div>
</div>
<div id="Image2_outer" style="Z-INDEX: 8; LEFT: 144px; WIDTH: 92px; POSITION: absolute; TOP: 136px; HEIGHT: 22px">
<div id="Image2_container" style=" width: 92;  height: 22; overflow: hidden;" >
<img src='imagens/pausa.PNG' onclick="keepgoin=false;" type="button" value="Pausa" name="pause"></div>
</div>
<div id="Image3_outer" style="Z-INDEX: 9; LEFT: 240px; WIDTH: 92px; POSITION: absolute; TOP: 136px; HEIGHT: 22px">
<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" >
<img src='imagens/zerar.PNG' onclick="document.forms[0].reset()" name="start">
</div>

</div>
</td></tr></table>
</form></body>
</html>