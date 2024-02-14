<?php
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Testa Codigo de Barras
 Criado em Data.....: 19/12/2008
 Ultima Atualização : 19/12/2008 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/
include("../config.php");
// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

$nome3 = $_SESSION["nome_log"];

// include("../logar.php");

include("menu.php");

include("vaurls.php");


$deixar = acesso_url("FORM_JORN");

if ($deixar == "SIM"){


include("funcoes2.php");

$mensagens = "* * * Visualizar * * *";

include("../conexao.php");

$consulta  = "SELECT * FROM form4";

// Fim da Função Navegar pelo registro

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id_1   = @$row["id"];
$Edit1  = @$row["titulo"];
$Edit2  = @$row["texto"];


?>

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

<html>
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>

<style type=text/css>

body { background-image: url(<?php echo "../".$logo_sis ?>);
       background-attachment: fixed }

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
-->

</style> 

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

<!-- TinyMCE -->
<script type="text/javascript" src="../jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups",

		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "paste,pastetext,pasteword,|,bullist,numlist,|,outdent,indent,|,undo,redo,|image|,forecolor,backcolor",
		theme_advanced_toolbar_location : "top",
//		theme_advanced_toolbar_align : "left",
//		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example word content CSS (should be your site CSS) this one removes paragraph margins
		content_css : "css/word.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE -->


<?php
include("help.php");
?>

<style>

.normal {
	
	background-color: white;
}
.anormal {
		background-color: Lavender;
}

</style>


<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; " onkeydown="javascript:if (event.KeyCode==13) event.KeyCode=9; javascript:document.onkeydown = keyCatcher();"  >
<form style="margin-bottom: 0" id="Unit2" name="Unit2" method="post"  action="salva4.php">
<table  width="1000"   style="height:496px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 176px; WIDTH: 648px; POSITION: absolute; TOP: 44px; HEIGHT: 436px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 616 - 16, 404 - 16);
  Shape1_Canvas.fillRect(16, 16, 616 - 16 + 1, 404 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?php echo $color_bor ?>");
  Shape1_Canvas.drawRect(16, 16, 616 - 16 + 1, 404 - 16 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 208px; WIDTH: 584px; POSITION: absolute; TOP: 77px; HEIGHT: 55px">
<script type="text/javascript">
  var Shape2_Canvas = new jsGraphics("Shape2_outer");
  Shape2_Canvas.setColor("#FFFFFF");
  Shape2_Canvas.fillRect(1, 1, 582 - 1, 53 - 1);
  Shape2_Canvas.fillRect(1, 1, 582 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.setStroke(1);
  Shape2_Canvas.setColor("<?php echo $color_bor ?>");
  Shape2_Canvas.drawRect(1, 1, 582 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Shape3_outer" style="Z-INDEX: 2; LEFT: 208px; WIDTH: 584px; POSITION: absolute; TOP: 133px; HEIGHT: 315px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 582 - 1, 313 - 1);
  Shape3_Canvas.fillRect(1, 1, 582 - 1 + 1, 313 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?php echo $color_bor ?>");
  Shape3_Canvas.drawRect(1, 1, 582 - 1 + 1, 313 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 3; LEFT: 224px; WIDTH: 95px; POSITION: absolute; TOP: 156px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:95px;"   ><STRONG>Titulo.:</STRONG></div>
</div>
<div id="Label11_outer" style="Z-INDEX: 4; LEFT: 224px; WIDTH: 103px; POSITION: absolute; TOP: 181px; HEIGHT: 26px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:103px;"   ><STRONG>Texto.:</STRONG>&nbsp;</div>
</div>
<div id="Label1_outer" style="Z-INDEX: 5; LEFT: 221px; WIDTH: 470px; POSITION: absolute; TOP: 87px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?php echo $color_bor ?>; background-color: #FFFFFF;height:32px;width:470px;"   ><STRONG>Fique por Dentro da Noticia</STRONG></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 336px; WIDTH: 440px; POSITION: absolute; TOP: 152px; HEIGHT: 27px">
<input type="text" id="Edit1" name="Edit1" value="<?php echo $Edit1 ?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:440px;"    tabindex="0"    />
</div>
<input type="hidden" name="id" value="<?php echo $id_1 ?>"/>
<div id="Edit2_outer" style="Z-INDEX: 7; LEFT: 224px; WIDTH: 552px; POSITION: absolute; TOP: 202px; HEIGHT: 190px">
<textarea  id="elm1" name="elm1"  style=" font-family: Verdana; font-size: 14px;  height:189px;width:552px;"    tabindex="0"    /><?php echo $Edit2 ?></textarea> 
</div>
<div id="Image1_outer" style="Z-INDEX: 8; LEFT: 407px; WIDTH: 92px; POSITION: absolute; TOP: 416px; HEIGHT: 22px">
<div id="Image1_container" style=" width: 92;  height: 22; overflow: hidden;" >
<input type=image name="guias" src="../imagens/botaoazul_enviar.PNG"></div>
</div>
<div id="Image2_outer" style="Z-INDEX: 9; LEFT: 511px; WIDTH: 92px; POSITION: absolute; TOP: 416px; HEIGHT: 22px">
<div id="Image2_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="../avaleht.php?servletjs2=20$$20" ><img id="Image2" src="../imagens/botaoazul25.PNG"  width="92"  height="22"  border="0"       /></a></div>
</div>
</td></tr></table>
</form></body>
</html>
<?php
}else{
	
include("enaaurlnp.php");
	
}
?>
