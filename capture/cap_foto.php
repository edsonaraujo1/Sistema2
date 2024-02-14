<?
// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

unset ($_SESSION['Faz_uma']);

$nome3 = $_SESSION["nome_log"];

include("../config.php");

include("funcoes2.php");

$deixar_1 = acesso("FORM_ASOC");

if ($deixar_1 == "NAO"){
	
    echo "  <html>
			<head>
			<title>ERRO AO CONECTAR</title>
            <link rel='shortcut icon' href='../imagens/favicon.ico'/>
			</head>
			<body>
						
			<style type=text/css>
			
			body { background-image: url('../$logo_sis');
                   background-attachment: fixed }
			
			<!--.cp {  font: bold 10px Arial; color: black}
			<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
			<!--.ld { font: bold 15px Arial; color: #000000}
			<!--.ct { FONT: 9px 'Arial Narrow'; COLOR: #000033}
			<!--.cn { FONT: 9px Arial; COLOR: black }
			<!--.bc { font: bold 22px Arial; color: #000000 }
			--></style> 
			
			</HEAD>
			

			</html>
			
			<br><br><br><br>
				
			<div align=center>
			
			<table align=center border='15' bgcolor='#FFF8DC'  bordercolor ='$color_bor'>
			<tr>
			<td align=center>
			     <font face=arial><b>*** <font color = #FF0000> ERRO ACESSO NÃO PERMITIDO !!!</font> ***<br>
				                     
									 <font face=arial>Usuário sem Permissão</b>
			<table align=center>
			<form method='POST' action='../avaleht.php?servletjs2=20$$20'>
			<td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
			</form>
			</table>
			</td>
			</tr>
			</table>
			</div>
";
	        exit();
}	

// Abre Conexão com o MySql
include("conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass)
        or

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Não foi possivel conectar !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

@mysql_select_db($db)
        or

die("
     <br>
     <br>

     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Não Foi possivel selecionar o banco de dados !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

// Resgata a Sessao
@session_start();
@session_name("Foto_cs3");

$_SESSION['ima_g_1'] = $Cod_cap;
$_SESSION['ima_g_2'] = $Cod_nu;




				// Atualiza arquivo Log
				$data_log = date("d/m/Y");
				$hora_log = date("H:i:s"); 
				$even_log = "CAPTURAR FOTO SOCIOS/".$Cod_cap;
				
				$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
				             VALUES
				             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
				
				@mysql_query($consulta_log, $link);

?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<script language="javascript">AC_FL_RunContent = 0;</script>
<script src="AC_RunActiveContent.js" language="javascript"></script>
</head>

<!--url's used in the movie-->
<!--text used in the movie-->
<!--
<p align="left"><font face="Impact" size="15" color="#cccccc" letterSpacing="0.000000" kerning="1">Gallery URL: &nbsp;<a href="http://vamapaull.com/photobooth/images/" target = "_blank">http://vamapaull.com/photobooth/images/</a></font></p>
-->
<!-- saved from url=(0013)about:internet -->

<style type=text/css>

body { background-image: url(<?="../".$logo_sis;?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
-->
</style> 

<body  style=" margin-left: 38px;  margin-top: 85px;  margin-right: 20px;  margin-bottom: 0px; " bgcolor="#ffffff">


<script language="javascript">
	if (AC_FL_RunContent == 0) {
		alert("This page requires AC_RunActiveContent.js.");
	} else {
		AC_FL_RunContent(
			'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0',
			'width', '700',
			'height', '329',
			'src', 'take_picture',
			'quality', 'high',
			'pluginspage', 'http://www.macromedia.com/go/getflashplayer',
			'align', 'middle',
			'play', 'true',
			'loop', 'true',
			'scale', 'showall',
			'wmode', 'window',
			'devicefont', 'false',
			'id', 'take_picture',
			'bgcolor', '#ffffff',
			'name', 'take_picture',
			'menu', 'true',
			'allowFullScreen', 'false',
			'allowScriptAccess','sameDomain',
			'movie', 'take_picture',
			'salign', ''
			); //end AC code
	}
</script>
<noscript>
	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="700" height="329" id="take_picture" align="middle">
	<param name="allowScriptAccess" value="sameDomain" />
	<param name="allowFullScreen" value="false" />
	<param name="movie" value="take_picture.swf" /><param name="quality" value="high" /><param name="bgcolor" value="#ffffff" />	<embed src="take_picture.swf" quality="high" bgcolor="#ffffff" width="700" height="329" name="take_picture" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
	</object>
</noscript>

<form style="margin-bottom: 0" id="Unit7" name="Unit7" method="post"  action="/Capture.php">
<table  width="704" height="500"   border="0" cellpadding="0" cellspacing="0"  ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 0px; WIDTH: 696px; POSITION: absolute; TOP: 0px; HEIGHT: 464px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 743 - 16, 458 - 16);
  Shape1_Canvas.fillRect(16, 16, 743 - 16 + 1, 458 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(16, 16, 743 - 16 + 1, 458 - 16 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 34px; WIDTH: 628px; POSITION: absolute; TOP: 34px; HEIGHT: 46px">
<script type="text/javascript">
  var Shape2_Canvas = new jsGraphics("Shape2_outer");
  Shape2_Canvas.setColor("#FFFFFF");
  Shape2_Canvas.fillRect(1, 1, 705 - 1, 44 - 1);
  Shape2_Canvas.fillRect(1, 1, 705 - 1 + 1, 44 - 1 + 1);
  Shape2_Canvas.setStroke(1);
  Shape2_Canvas.setColor("<?=$color_bor;?>");
  Shape2_Canvas.drawRect(1, 1, 705 - 1 + 1, 44 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 47px; WIDTH: 321px; POSITION: absolute; TOP: 41px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?=$color_bor;?>; background-color: #FFFFFF;height:32px;width:321px;"   ><STRONG>Captura foto&nbsp;Socios</STRONG></div>
</div>

<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 630px; WIDTH: 107px; POSITION: absolute; TOP: 65px; HEIGHT: 11px">
<div id="Label1" style=" font-family: Verdana; font-size: 10px; color: <?=$color_bor;?>; background-color: #FFFFFF;height:11px;width:107px;"   ><STRONG>created by Edson</STRONG></div>
</div>

<div id="Shape3_outer" style="Z-INDEX: 3; LEFT: 34px; WIDTH: 628px; POSITION: absolute; TOP: 82px; HEIGHT: 348px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 705 - 1, 372 - 1);
  Shape3_Canvas.fillRect(1, 1, 705 - 1 + 1, 372 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 705 - 1 + 1, 372 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>


<div id="Image3a_outer" style="Z-INDEX: 50000; LEFT: 310px; WIDTH: 212px; POSITION: absolute; TOP: 414px; HEIGHT: 24px">
<div id="Image3a_container" style=" width: 212;  overflow: hidden;" ><A HREF="javascript:window.close()"><img id="Image3" src="../imagens/fechar_cap.png"  border="0"       /></a></div>
</div>

</td></tr></table>

</form>


</body>


</html>
