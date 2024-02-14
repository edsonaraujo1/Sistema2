<?
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
@session_start();
$path = strtoupper($_SESSION['Path1']);

$nome3 = $_SESSION["nome_log"];

//include_once("../logar.php");

//include("menu2.php");

include("vaurls.php");


$deixar = "SIM";

if ($deixar == "SIM"){

// Descriptografar arquivo config.ini


$Edit1  = $server_sq2;
$Edit5  = $server_sq3;
$Edit2  = $user_sq2;
$Edit3  = $pass_sq2;
$Edit4  = $banco_sq2;


include("funcoes2.php");

$mensagens = "* * * Visualizar * * *";

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
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>

<style type=text/css>

body { background-image: url(<?="../".$logo_sis;?>);
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


<?
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
<form style="margin-bottom: 0" id="Unit2" name="Unit2" method="post"  action="salva_servs2.php">
<table  width="936"   style="height:528px"  border="0" cellpadding="0" cellspacing="0"   align="Center"  ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 263px; WIDTH: 460px; POSITION: absolute; TOP: 44px; HEIGHT: 340px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 428 - 16, 308 - 16);
  Shape1_Canvas.fillRect(16, 16, 428 - 16 + 1, 308 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(16, 16, 428 - 16 + 1, 308 - 16 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 296px; WIDTH: 394px; POSITION: absolute; TOP: 77px; HEIGHT: 55px">
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
<div id="Shape3_outer" style="Z-INDEX: 2; LEFT: 296px; WIDTH: 394px; POSITION: absolute; TOP: 133px; HEIGHT: 218px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 392 - 1, 216 - 1);
  Shape3_Canvas.fillRect(1, 1, 392 - 1 + 1, 216 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 392 - 1 + 1, 216 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 3; LEFT: 319px; WIDTH: 95px; POSITION: absolute; TOP: 156px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:95px;"   ><STRONG>Servidor 1.:</STRONG></div>
</div>
<div id="Label5_outer" style="Z-INDEX: 14; LEFT: 319px; WIDTH: 95px; POSITION: absolute; TOP: 183px; HEIGHT: 26px">
<div id="Label5" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:95px;"   ><STRONG>Servidor 2.:</STRONG></div>
</div>
<div id="Label11_outer" style="Z-INDEX: 4; LEFT: 319px; WIDTH: 103px; POSITION: absolute; TOP: 210px; HEIGHT: 26px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:103px;"   ><STRONG>Usuario.:</STRONG>&nbsp;</div>
</div>
<div id="Label1_outer" style="Z-INDEX: 5; LEFT: 309px; WIDTH: 370px; POSITION: absolute; TOP: 87px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?=$color_bor;?>; background-color: #FFFFFF;height:32px;width:370px;"   ><P><STRONG>Configuraçoes SQL</STRONG></P></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 464px; WIDTH: 200px; POSITION: absolute; TOP: 152px; HEIGHT: 27px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:200px;"    tabindex="0"    />
</div>
<div id="Edit5_outer" style="Z-INDEX: 15; LEFT: 464px; WIDTH: 200px; POSITION: absolute; TOP: 178px; HEIGHT: 27px">
<input type="text" id="Edit5" name="Edit5" value="<?=$Edit5;?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:200px;"    tabindex="0"    />
</div>

<div id="Edit2_outer" style="Z-INDEX: 9; LEFT: 464px; WIDTH: 200px; POSITION: absolute; TOP: 204px; HEIGHT: 27px">
<input type="text" id="Edit2" name="Edit2" value="<?=$Edit2;?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:200px;"    tabindex="0"    />
</div>
<div id="Label3_outer" style="Z-INDEX: 10; LEFT: 319px; WIDTH: 102px; POSITION: absolute; TOP: 238px; HEIGHT: 26px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:102px;"   ><STRONG>Senha.:</STRONG>&nbsp;</div>
</div>
<div id="Edit3_outer" style="Z-INDEX: 11; LEFT: 464px; WIDTH: 200px; POSITION: absolute; TOP: 231px; HEIGHT: 27px">
<input type="password" id="Edit3" name="Edit3" value="<?=$Edit3;?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:200px;"    tabindex="0"    />
</div>
<div id="Label4_outer" style="Z-INDEX: 12; LEFT: 320px; WIDTH: 144px; POSITION: absolute; TOP: 267px; HEIGHT: 26px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:144px;"   ><STRONG>Banco de Dados.:</STRONG>&nbsp;</div>
</div>
<div id="Edit4_outer" style="Z-INDEX: 13; LEFT: 464px; WIDTH: 200px; POSITION: absolute; TOP: 258px; HEIGHT: 27px">
<input type="text" id="Edit4" name="Edit4" value="<?=$Edit4;?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:200px;"    tabindex="0"    />
</div>


<div id="Image1_outer" style="Z-INDEX: 31; LEFT: 399px; WIDTH: 92px; POSITION: absolute; TOP: 311px; HEIGHT: 22px">
<input type=image name="guias" src="../imagens/botaoazul10.PNG">
</div>
<div id="Image2_outer" style="Z-INDEX: 32; LEFT: 503px; WIDTH: 92px; POSITION: absolute; TOP: 311px; HEIGHT: 22px">
<div id="Image2_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="../avaleht.php?servletjs2=20$$20" ><img id="Image2" src="../imagens/botaoazul9.PNG"  width="92"  height="22"  border="0"       /></a></div>
</div>


<div style="Z-INDEX: 35; LEFT: 655px; WIDTH: 25px; POSITION: absolute; TOP: 311px; HEIGHT: 35px" align="center">
<img id="Image3" src="../imagens/vacina.JPG"  width="25"  height="35"  border="0"       />
</div>

</td></tr></table></form></body>
</html>
<?
}else{
	
include("enaaurlnp.php");
	
}
?>
