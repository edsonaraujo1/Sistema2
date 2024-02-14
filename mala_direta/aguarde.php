<?php

/**
 * @author holodek
 * @copyright 2010
 */


//include('menu.php');

?>

<script language="Javascript">
function loadImages() {
if (document.getElementById) {  // DOM3 = IE5, NS6
document.getElementById('hidepage').style.visibility = 'hidden';
}
else {
if (document.layers) {  // Netscape 4
document.hidepage.visibility = 'hidden';
}
else {  // IE 4
document.all.hidepage.style.visibility = 'hidden';
}
}
}
</script>

</head>

<body onload="loadImages();">

<div id="hidepage" style="position: absolute; layer-background-color: #FFFFCC; width: 100%;"> 

<br /><br /><br /><br />
<div align=center><table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='<?=$color_bor;?>'>
<tr>
<td align=center><font face=arial size='4'><b>&nbsp;&nbsp;&nbsp;&nbsp;* * * Enviando E-Mail !!! * * *&nbsp;&nbsp;&nbsp;&nbsp;<br>
<table align=center><img src='../imagens/ajax-loader.gif' width='70' height='70'><br>
</table><center><font color='#336699' face=Verdana  size='2'><b>&nbsp;Por favor Aguarde....<br/></b>
</font></center></td></tr></table>
</div>

</div>
</body>
