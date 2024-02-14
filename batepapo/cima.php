<?
// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../config.php");

include("funcoes2.php");

?>
<html>
<head>
<title>Bate-papo</title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type=text/css>

body { background-image: url(<?="../".$logo_sis;?>);
       background-attachment: fixed }
</style>

</head>
<body>

<table  width="800"   style="height:600px"  border="0" cellpadding="0" cellspacing="0"  ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 10px; WIDTH: 576px; POSITION: absolute; TOP: 8px; HEIGHT: 64px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(5, 5, 566 - 5, 54 - 5);
  Shape1_Canvas.fillRect(5, 5, 566 - 5 + 1, 54 - 5 + 1);
  Shape1_Canvas.setStroke(5);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(5, 5, 566 - 5 + 1, 54 - 5 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Label1_outer" style="Z-INDEX: 1; LEFT: 32px; WIDTH: 438px; POSITION: absolute; TOP: 21px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?=$color_bor;?>; background-color: #FFFFFF;height:32px;width:438px;"   ><STRONG>Bate-Papo (Chat)</STRONG> <font size="4">&nbsp;&nbsp;&nbsp;&nbsp;On-Line</font></div>
</div>
</td></tr></table>

</body>
</html>
