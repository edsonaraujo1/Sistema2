<?php
/*
 -----------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Informações do Sistema
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/07/2008 

 DEUS SEJA LOUVADO
 -----------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");

include("menu.php");

$nome3 = $_SESSION["nome_log"];

include("funcoes2.php");

$browser_cliet = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT']:"";

if(strpos($browser_cliet, 'Opera')!== false) { $browser = 'Opera';
}elseif(strpos($browser_cliet, 'Gecko')!== false) { $browser = 'Firefox';
}elseif(strpos($browser_cliet, 'MSIE')!== false) { $browser = 'MS Internet Explorer';
}elseif(strpos($browser_cliet, 'Lynx')!== false) { $browser = 'Lynx';
}elseif(strpos($browser_cliet, 'WebTV')!== false) { $browser = 'WebTV';
}elseif(strpos($browser_cliet, 'Konqueror')!== false) { $browser = 'Konqueror';
}elseif(strpos($browser_cliet, 'Google')!== false) { $browser = 'Robôs de Busca';
}else $browser = " Desconhecido"; 

?>

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "  >
<form style="margin-bottom: 0" id="Unit2" name="Unit2" method="post"  action="/info.php">
<table  width="10"   style="height:10px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 181px; WIDTH: 687px; POSITION: absolute; TOP: 44px; HEIGHT: 381px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 655 - 16, 349 - 16);
  Shape1_Canvas.fillRect(16, 16, 655 - 16 + 1, 349 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(16, 16, 655 - 16 + 1, 349 - 16 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 214px; WIDTH: 138px; POSITION: absolute; TOP: 77px; HEIGHT: 107px">
<script type="text/javascript">
  var Shape2_Canvas = new jsGraphics("Shape2_outer");
  Shape2_Canvas.setColor("#FFFFFF");
  Shape2_Canvas.fillRect(1, 1, 136 - 1, 105 - 1);
  Shape2_Canvas.fillRect(1, 1, 136 - 1 + 1, 105 - 1 + 1);
  Shape2_Canvas.setStroke(1);
  Shape2_Canvas.setColor("<?=$color_bor;?>");
  Shape2_Canvas.drawRect(1, 1, 136 - 1 + 1, 105 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Shape3_outer" style="Z-INDEX: 2; LEFT: 214px; WIDTH: 441px; POSITION: absolute; TOP: 284px; HEIGHT: 108px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 439 - 1, 106 - 1);
  Shape3_Canvas.fillRect(1, 1, 439 - 1 + 1, 106 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 439 - 1 + 1, 106 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Shape4_outer" style="Z-INDEX: 3; LEFT: 689px; WIDTH: 146px; POSITION: absolute; TOP: 77px; HEIGHT: 107px">
<script type="text/javascript">
  var Shape4_Canvas = new jsGraphics("Shape4_outer");
  Shape4_Canvas.setColor("#FFFFFF");
  Shape4_Canvas.fillRect(1, 1, 144 - 1, 105 - 1);
  Shape4_Canvas.fillRect(1, 1, 144 - 1 + 1, 105 - 1 + 1);
  Shape4_Canvas.setStroke(1);
  Shape4_Canvas.setColor("<?=$color_bor;?>");
  Shape4_Canvas.drawRect(1, 1, 144 - 1 + 1, 105 - 1 + 1);
  Shape4_Canvas.paint();
</script>

</div>
<div id="Shape5_outer" style="Z-INDEX: 4; LEFT: 354px; WIDTH: 334px; POSITION: absolute; TOP: 77px; HEIGHT: 107px">
<script type="text/javascript">
  var Shape5_Canvas = new jsGraphics("Shape5_outer");
  Shape5_Canvas.setColor("#FFFFFF");
  Shape5_Canvas.fillRect(1, 1, 332 - 1, 105 - 1);
  Shape5_Canvas.fillRect(1, 1, 332 - 1 + 1, 105 - 1 + 1);
  Shape5_Canvas.setStroke(1);
  Shape5_Canvas.setColor("<?=$color_bor;?>");
  Shape5_Canvas.drawRect(1, 1, 332 - 1 + 1, 105 - 1 + 1);
  Shape5_Canvas.paint();
</script>

</div>
<div id="Image1_outer" style="Z-INDEX: 5; LEFT: 233px; WIDTH: 120px; POSITION: absolute; TOP: 82px; HEIGHT: 64px">
<div id="Image1_container" style=" width: 120;  height: 120; overflow: hidden;" ><a href="http://www.ubuntu-br.org/" target="new"><img id="Image1" src="../imagens/Pin_lunix.png"  width="100"  height="100"  border="0"       /></a></div>
</div>
<div id="Image2_outer" style="Z-INDEX: 6; LEFT: 699px; WIDTH: 128px; POSITION: absolute; TOP: 89px; HEIGHT: 96px">
<div id="Image2_container" style=" width: 128;  height: 96; overflow: hidden;" ><a href="http://www.php.net/" target="new"><img id="Image2" src="../imagens/phpmysql.bmp"  width="130"  height="90"  border="0"       /></a></div>
</div>
<div id="Shape6_outer" style="Z-INDEX: 7; LEFT: 656px; WIDTH: 179px; POSITION: absolute; TOP: 255px; HEIGHT: 137px">
<script type="text/javascript">
  var Shape6_Canvas = new jsGraphics("Shape6_outer");
  Shape6_Canvas.setColor("#FFFFFF");
  Shape6_Canvas.fillRect(1, 1, 177 - 1, 135 - 1);
  Shape6_Canvas.fillRect(1, 1, 177 - 1 + 1, 135 - 1 + 1);
  Shape6_Canvas.setStroke(1);
  Shape6_Canvas.setColor("<?=$color_bor;?>");
  Shape6_Canvas.drawRect(1, 1, 177 - 1 + 1, 135 - 1 + 1);
  Shape6_Canvas.paint();
</script>

</div>
<div id="Image3_outer" style="Z-INDEX: 8; LEFT: 669px; WIDTH: 176px; POSITION: absolute; TOP: 260px; HEIGHT: 128px">
<div id="Image3_container" style=" width: 176;  height: 128; " ><a href="<?=$website;?>" target="new"><img id="Image3" src="<?="../".$logo1_sis;?>"  width="158"  height="128"  border="0"       /></a></div>
</div>
<div id="Label1_outer" style="Z-INDEX: 9; LEFT: 376px; WIDTH: 296px; POSITION: absolute; TOP: 122px; HEIGHT: 22px">
<div id="Label1" style=" font-family: Verdana; font-size: 19px;  height:22px;width:296px;"  align="Center"   > <STRONG></STRONG>

<div id="Label1_outer" style="Z-INDEX: 100; LEFT: 0px; WIDTH: 290px; POSITION: absolute; TOP: -30px; HEIGHT: 75px">

<script language="javascript">bName = navigator.appName;bVer = parseInt(navigator.appVersion);
if (bName == "Microsoft Internet Explorer" & bVer >= 4.00){
    document.write("<MARQUEE direction='up' scrolldelay=150 scrollamount=2 style='width:100%; height:75;'>");
    document.write("<center>ERP Sistema de Banco de Dados em PHP</center><br>");
    document.write("<center>Rodando no<br><?=$browser;?></center> ");
    document.write("<center><img id='Image1' src='../imagens/Internet_7.png'  width='80'  height='80'  border='0'/></center>");

    document.write("</marquee>");}else{
    document.write("<MARQUEE direction='up' scrolldelay=150 scrollamount=2 style='width:100%; height:75;'>");
    document.write("<center>ERP Sistema de Banco de Dados em PHP</center> ");
    document.write("<center>Rodando no<?=$browser;?></center> ");
    document.write("<center><img id='Image1' src='../imagens/Firefox.png'  width='80'  height='80'  border='0'/></center>");}
</script>

</div>

 </div>
</div>
<div id="Label2_outer" style="Z-INDEX: 10; LEFT: 224px; WIDTH: 608px; POSITION: absolute; TOP: 192px; HEIGHT: 64px">
<div id="Label2" style=" font-family: Verdana; font-size: 17px;  height:64px;width:608px;"   ><STRONG><FONT face=Arial>PROGRAMADOR..:<I><A href="mailto:edsonaraujo1@hotmail.com"><font color="#0000ff"><U>Edson de Araujo</U></I></FONT></STRONG></A><FONT face=Arial><STRONG> (Desenvolvedor)</STRONG> <BR><B>Desenvolvido em.:<I>PHP/JavaScript/MySQL/AJAX/Server Apache</I></B> <BR><B>Este Programa esta protegido Pela Lei: de Copyrigtht(c) 2007-2010</B> </FONT></div>
</div>
<div id="Shape7_outer" style="Z-INDEX: 11; LEFT: 214px; WIDTH: 441px; POSITION: absolute; TOP: 256px; HEIGHT: 26px">
<script type="text/javascript">
  var Shape7_Canvas = new jsGraphics("Shape7_outer");
  Shape7_Canvas.setColor("#FFFFFF");
  Shape7_Canvas.fillRect(1, 1, 439 - 1, 24 - 1);
  Shape7_Canvas.fillRect(1, 1, 439 - 1 + 1, 24 - 1 + 1);
  Shape7_Canvas.setStroke(1);
  Shape7_Canvas.setColor("<?=$color_bor;?>");
  Shape7_Canvas.drawRect(1, 1, 439 - 1 + 1, 24 - 1 + 1);
  Shape7_Canvas.paint();
</script>

</div>
<div id="Label3_outer" style="Z-INDEX: 12; LEFT: 224px; WIDTH: 408px; POSITION: absolute; TOP: 288px; HEIGHT: 96px">
<div id="Label3" style=" font-family: Verdana; font-size: 17px;  height:96px;width:408px;" align=center><FONT face=Arial><STRONG>Este Produto esta Licenciado para:<BR><FONT color=red><I><?=$Titulo;?></I></FONT></STRONG> <BR><B>CNPJ/CPF:<I><?=$cnpj_sis;?></I></B> <BR><B>Criado em.:<FONT color=green><?=$criado_za;?></B></FONT></FONT><FONT face=Arial> <BR><B>Ultima Atualização em.:<FONT color=blue><?=$atuali_za;?></B></FONT></FONT><FONT face=Arial> </FONT> </div>
</div>
<div id="Label4_outer" style="Z-INDEX: 13; LEFT: 222px; WIDTH: 426px; POSITION: absolute; TOP: 260px; HEIGHT: 19px">
<div id="Label4" style=" font-family: Verdana; font-size: 16px;  height:19px;width:426px;" align=center><FONT face=Arial><STRONG>Usuario..: <?=strtoupper($nome3);?>&nbsp;&nbsp;Versao&nbsp;&nbsp;<?=$versao_1;?></STRONG> </FONT> </div>
</div>


<div style="Z-INDEX: 34; LEFT: 740px; WIDTH: 10px; POSITION: absolute; TOP: 190px; HEIGHT: 80px">

<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="<?=$path;?>index.php"  ><img id="Image3" src="../imagens/botaoazul24.PNG"  width="92"  height="22"  border="0"       /></a></div>

</div>

</td></tr></table>
</form></body>
</html>
