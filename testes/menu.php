<!--
==========================================================================
============================ CódigoFonte.net =============================
==========================================================================
   Adicione este código entre os campos <BODY> aqui </BODY> de seu site, 
     utilizando um editor de textos (Bloco de Notas) ou um editor HTML     
=======  Duvidas acesse nosso fórum: http://forum.codigofonte.net ========
==========================================================================
==========================================================================
-->


<div id="point1" STYLE="position:absolute;visibility:visible;">
<table width="100" border="1" bordercolor="#ABABAB" cellspacing="0" cellpadding="4">
<tr>
<td align=center bgcolor=#ABABAB>
<font face=Verdana size=2 color=#000000><strong>MENU</strong></font>
</td>
</tr>
<tr>
<td align=center bgcolor=#f2f2f2>
<a href="link1.html"><font face=Verdana size=2 color=#FF6600>Link 1</font></a>
</td>
</tr>
<tr>
<td align=center bgcolor=#f2f2f2>
<font size="2"><a href="link2.html"><font face=Verdana size=2 color=#FF6600>Link 2</font></a></font>
</td>
</tr>
<tr>
<td align=center bgcolor=#f2f2f2>
<font size="2"><a href="link3.html"><font face=Verdana size=2 color=#FF6600>Link 3</font></a></font>
</td>
</tr>
<tr>
<td align=center bgcolor=#f2f2f2>
<font size="2"><a href="link4.html"><font face=Verdana size=2 color=#FF6600>Link 4</font></a></font>
</td>
</tr>
<tr>
<td align=center bgcolor=#f2f2f2>
<font size="2"><a href="link5.html"><font face=Verdana size=2 color=#FF6600>Link 5</font></a></font>
</td>
</tr>
</table>
</div>

<script language="JavaScript">

var XX=20; // X position of the scrolling objects
var xstep=1;
var delay_time=1000000000000020;

//Begin of the unchangable area, please do not modify this area
var YY=0;  
var ch=0;
var oh=0;
var yon=0;

var ns4=document.layers?1:0
var ie=document.all?1:0
var ns6=document.getElementById&&!document.all?1:0

if(ie){
YY=document.body.clientHeight;
point1.style.top=YY;
}
else if (ns4){
YY=window.innerHeight;
document.point1.pageY=YY;
document.point1.visibility="hidden";
}
else if (ns6){
YY=window.innerHeight
document.getElementById('point1').style.top=YY
}


function reloc1()
{

if(yon==0){YY=YY-xstep;}
else{YY=YY+xstep;}
if (ie){
ch=document.body.clientHeight;
oh=point1.offsetHeight;
}
else if (ns4){
ch=window.innerHeight;
oh=document.point1.clip.height;
}
else if (ns6){
ch=window.innerHeight
oh=document.getElementById("point1").offsetHeight
}
		
if(YY<0){yon=1;YY=0;}
if(YY>=(ch-oh)){yon=0;YY=(ch-oh);}
if(ie){
point1.style.left=XX;
point1.style.top=YY+document.body.scrollTop;
}
else if (ns4){
document.point1.pageX=XX;
document.point1.pageY=YY+window.pageYOffset;
}
else if (ns6){
document.getElementById("point1").style.left=XX
document.getElementById("point1").style.top=YY+window.pageYOffset
}

}

function onad()
{
if(ns4)
document.point1.visibility="visible";
loopfunc();
}
function loopfunc()
{
reloc1();
setTimeout('loopfunc()',delay_time);
}

if (ie||ns4||ns6)
window.onload=onad

</script>