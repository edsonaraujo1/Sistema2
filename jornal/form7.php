<?php

/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Captura e Upload da Foto no Cadastro de Socios
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

//echo $browser; 

session_start();
$path = strtoupper($_SESSION['Path1']);

// include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

include_once("funcoes2.php");

$deixar_1 = acesso("FORM_JORN");

if ($deixar_1 == "NAO"){
	
    echo "  </html>
			
			<br><br><br><br>
				
			<div align=center>
			
			<table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='$color_bor'>
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
include("../conexao.php");
// Chama o Banco de Dados

// Resgata a Sessao
session_name("Photto1");
session_start();
$fot_id = $_SESSION['id'];
$mat    = $_SESSION['codp'];
if(!empty($mat)){
   $mat    = $_SESSION['codp'];
}

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// Regata Secao
session_start();
$id1 = $_SESSION['navega'];

?>
<html>
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>
<body bgcolor="#FFFFFF" text="#000000">

<style type=text/css>

body { background-image: url(<?php echo "../".$logo_sis ?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
-->

div.fileinputs {
	position: relative;
}
div.fakefile {
	position: absolute;
	top: 0px;
	left: 0px;
	z-index: 1;
}
input.file {
	position: relative;
	text-align: right;
	-moz-opacity:0 ;
	filter:alpha(opacity: 0);
	opacity: 0;
	z-index: 2;
}
</style> 

<?php
//$Edit1 = $_POST['Edit'];

$acao = "entrar";

if(!empty($Edit1)){
	$acao = "cadastrar";
}
if(!empty($Edit2)){
	$acao = "cadastrar";
}
if(!empty($Edit3)){
	$acao = "cadastrar";
}
if(!empty($Edit4)){
	$acao = "cadastrar";
}
if(!empty($Edit5)){
	$acao = "cadastrar";
}
if(!empty($Edit6)){
	$acao = "cadastrar";
}
if(!empty($Edit7)){
	$acao = "cadastrar";
}
if(!empty($Edit8)){
	$acao = "cadastrar";
}
if(!empty($Edit9)){
	$acao = "cadastrar";
}


if($acao == 'cadastrar') { // Cadastra a imagem no banco de dados

if (!empty($Edit1)){
	
	$new_fot = 1;
	
	$fp = fopen($Edit1,"rb");
	$imagem_temp = fread($fp,filesize($Edit1));
	fclose($fp);
	$imagem_temp = addslashes($imagem_temp);
	$sql = @mysql_query("UPDATE fotos_site SET imagem1       = '$Edit1_name',
	                                           tipo_imagem1  = '$Edit1_type',
											   bytes_imagem1 = '$Edit1_size',
											   dados_imagem1 = '$imagem_temp' WHERE codp = '$new_fot'",$link)
	or die("Erro no SQL: ".@mysql_error());
	echo "<br><br>
		  <div align=center>
		  <table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='$color_bor'>
		  <tr>
		  <td align=center>
		  <font face=arial><b>*** Foto 1 inserida com SUCESSO no cadastro !!! ***<br>
	      </b>              
		  <table align=center>
		  <form method='POST' action='form7.php'>
		  <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
		  </form>  
		  </table>
		  </td>
		  </tr>
		  </table>
		  </div>";
	
}

if (!empty($Edit2)){
	
	$new_fot = 2;
	
	$fp = fopen($Edit2,"rb");
	$imagem_temp = fread($fp,filesize($Edit2));
	fclose($fp);
	$imagem_temp = addslashes($imagem_temp);
	$sql = @mysql_query("UPDATE fotos_site SET imagem1       = '$Edit2_name',
	                                           tipo_imagem1  = '$Edit2_type',
											   bytes_imagem1 = '$Edit2_size',
											   dados_imagem1 = '$imagem_temp' WHERE codp = '$new_fot'",$link)
	or die("Erro no SQL: ".@mysql_error());
	echo "<br><br>
		  <div align=center>
		  <table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='$color_bor'>
		  <tr>
		  <td align=center>
		  <font face=arial><b>*** Foto 2 inserida com SUCESSO no cadastro !!! ***<br>
	      </b>              
		  <table align=center>
		  <form method='POST' action='form7.php'>
		  <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
		  </form>  
		  </table>
		  </td>
		  </tr>
		  </table>
		  </div>";
	
}

if (!empty($Edit3)){
	
	$new_fot = 3;
	
	$fp = fopen($Edit3,"rb");
	$imagem_temp = fread($fp,filesize($Edit3));
	fclose($fp);
	$imagem_temp = addslashes($imagem_temp);
	$sql = @mysql_query("UPDATE fotos_site SET imagem1       = '$Edit3_name',
	                                           tipo_imagem1  = '$Edit3_type',
											   bytes_imagem1 = '$Edit3_size',
											   dados_imagem1 = '$imagem_temp' WHERE codp = '$new_fot'",$link)
	or die("Erro no SQL: ".@mysql_error());
	echo "<br><br>
		  <div align=center>
		  <table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='$color_bor'>
		  <tr>
		  <td align=center>
		  <font face=arial><b>*** Foto 3 inserida com SUCESSO no cadastro !!! ***<br>
	      </b>              
		  <table align=center>
		  <form method='POST' action='form7.php'>
		  <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
		  </form>  
		  </table>
		  </td>
		  </tr>
		  </table>
		  </div>";
	
}

if (!empty($Edit4)){
	
	$new_fot = 4;
	
	$fp = fopen($Edit4,"rb");
	$imagem_temp = fread($fp,filesize($Edit4));
	fclose($fp);
	$imagem_temp = addslashes($imagem_temp);
	$sql = @mysql_query("UPDATE fotos_site SET imagem1       = '$Edit4_name',
	                                           tipo_imagem1  = '$Edit4_type',
											   bytes_imagem1 = '$Edit4_size',
											   dados_imagem1 = '$imagem_temp' WHERE codp = '$new_fot'",$link)
	or die("Erro no SQL: ".@mysql_error());
	echo "<br><br>
		  <div align=center>
		  <table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='$color_bor'>
		  <tr>
		  <td align=center>
		  <font face=arial><b>*** Foto 4 inserida com SUCESSO no cadastro !!! ***<br>
	      </b>              
		  <table align=center>
		  <form method='POST' action='form7.php'>
		  <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
		  </form>  
		  </table>
		  </td>
		  </tr>
		  </table>
		  </div>";
	
}

if (!empty($Edit5)){
	
	$new_fot = 5;
	
	$fp = fopen($Edit5,"rb");
	$imagem_temp = fread($fp,filesize($Edit5));
	fclose($fp);
	$imagem_temp = addslashes($imagem_temp);
	$sql = @mysql_query("UPDATE fotos_site SET imagem1       = '$Edit5_name',
	                                           tipo_imagem1  = '$Edit5_type',
											   bytes_imagem1 = '$Edit5_size',
											   dados_imagem1 = '$imagem_temp' WHERE codp = '$new_fot'",$link)
	or die("Erro no SQL: ".@mysql_error());
	echo "<br><br>
		  <div align=center>
		  <table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='$color_bor'>
		  <tr>
		  <td align=center>
		  <font face=arial><b>*** Foto 5 inserida com SUCESSO no cadastro !!! ***<br>
	      </b>              
		  <table align=center>
		  <form method='POST' action='form7.php'>
		  <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
		  </form>  
		  </table>
		  </td>
		  </tr>
		  </table>
		  </div>";
	
}

if (!empty($Edit6)){
	
	$new_fot = 6;
	
	$fp = fopen($Edit6,"rb");
	$imagem_temp = fread($fp,filesize($Edit6));
	fclose($fp);
	$imagem_temp = addslashes($imagem_temp);
	$sql = @mysql_query("UPDATE fotos_site SET imagem1       = '$Edit6_name',
	                                           tipo_imagem1  = '$Edit6_type',
											   bytes_imagem1 = '$Edit6_size',
											   dados_imagem1 = '$imagem_temp' WHERE codp = '$new_fot'",$link)
	or die("Erro no SQL: ".@mysql_error());
	echo "<br><br>
		  <div align=center>
		  <table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='$color_bor'>
		  <tr>
		  <td align=center>
		  <font face=arial><b>*** Foto 6 inserida com SUCESSO no cadastro !!! ***<br>
	      </b>              
		  <table align=center>
		  <form method='POST' action='form7.php'>
		  <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
		  </form>  
		  </table>
		  </td>
		  </tr>
		  </table>
		  </div>";
	
}

if (!empty($Edit7)){
	
	$new_fot = 7;
	
	$fp = fopen($Edit7,"rb");
	$imagem_temp = fread($fp,filesize($Edit7));
	fclose($fp);
	$imagem_temp = addslashes($imagem_temp);
	$sql = @mysql_query("UPDATE fotos_site SET imagem1       = '$Edit7_name',
	                                           tipo_imagem1  = '$Edit7_type',
											   bytes_imagem1 = '$Edit7_size',
											   dados_imagem1 = '$imagem_temp' WHERE codp = '$new_fot'",$link)
	or die("Erro no SQL: ".@mysql_error());
	echo "<br><br>
		  <div align=center>
		  <table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='$color_bor'>
		  <tr>
		  <td align=center>
		  <font face=arial><b>*** Foto 7 inserida com SUCESSO no cadastro !!! ***<br>
	      </b>              
		  <table align=center>
		  <form method='POST' action='form7.php'>
		  <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
		  </form>  
		  </table>
		  </td>
		  </tr>
		  </table>
		  </div>";
	
}

if (!empty($Edit8)){
	
	$new_fot = 8;
	
	$fp = fopen($Edit8,"rb");
	$imagem_temp = fread($fp,filesize($Edit8));
	fclose($fp);
	$imagem_temp = addslashes($imagem_temp);
	$sql = @mysql_query("UPDATE fotos_site SET imagem1       = '$Edit8_name',
	                                           tipo_imagem1  = '$Edit8_type',
											   bytes_imagem1 = '$Edit8_size',
											   dados_imagem1 = '$imagem_temp' WHERE codp = '$new_fot'",$link)
	or die("Erro no SQL: ".@mysql_error());
	echo "<br><br>
		  <div align=center>
		  <table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='$color_bor'>
		  <tr>
		  <td align=center>
		  <font face=arial><b>*** Foto 8 inserida com SUCESSO no cadastro !!! ***<br>
	      </b>              
		  <table align=center>
		  <form method='POST' action='form7.php'>
		  <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
		  </form>  
		  </table>
		  </td>
		  </tr>
		  </table>
		  </div>";
	
}

if (!empty($Edit9)){
	
	$new_fot = 9;
	
	$fp = fopen($Edit9,"rb");
	$imagem_temp = fread($fp,filesize($Edit9));
	fclose($fp);
	$imagem_temp = addslashes($imagem_temp);
	$sql = @mysql_query("UPDATE fotos_site SET imagem1       = '$Edit9_name',
	                                           tipo_imagem1  = '$Edit9_type',
											   bytes_imagem1 = '$Edit9_size',
											   dados_imagem1 = '$imagem_temp' WHERE codp = '$new_fot'",$link)
	or die("Erro no SQL: ".@mysql_error());
	echo "<br><br>
		  <div align=center>
		  <table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='$color_bor'>
		  <tr>
		  <td align=center>
		  <font face=arial><b>*** Foto 9 inserida com SUCESSO no cadastro !!! ***<br>
	      </b>              
		  <table align=center>
		  <form method='POST' action='form7.php'>
		  <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
		  </form>  
		  </table>
		  </td>
		  </tr>
		  </table>
		  </div>";
	
}
	  
}else{
/*fecha acao=entrar */?>

<div align="center">
<br/><br/><br/>
<form name="frm_imagem" method="POST" action="<?php echo $PHP_SELF ?>?acao=cadastrar" enctype="multipart/form-data">
<table  width="1000"   style="height:496px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 120px; WIDTH: 760px; POSITION: absolute; TOP: 44px; HEIGHT: 436px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 728 - 16, 404 - 16);
  Shape1_Canvas.fillRect(16, 16, 728 - 16 + 1, 404 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?php echo $color_bor ?>");
  Shape1_Canvas.drawRect(16, 16, 728 - 16 + 1, 404 - 16 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 152px; WIDTH: 696px; POSITION: absolute; TOP: 77px; HEIGHT: 55px">
<script type="text/javascript">
  var Shape2_Canvas = new jsGraphics("Shape2_outer");
  Shape2_Canvas.setColor("#FFFFFF");
  Shape2_Canvas.fillRect(1, 1, 694 - 1, 53 - 1);
  Shape2_Canvas.fillRect(1, 1, 694 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.setStroke(1);
  Shape2_Canvas.setColor("<?php echo $color_bor ?>");
  Shape2_Canvas.drawRect(1, 1, 694 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Shape3_outer" style="Z-INDEX: 2; LEFT: 152px; WIDTH: 696px; POSITION: absolute; TOP: 133px; HEIGHT: 315px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 694 - 1, 313 - 1);
  Shape3_Canvas.fillRect(1, 1, 694 - 1 + 1, 313 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?php echo $color_bor ?>");
  Shape3_Canvas.drawRect(1, 1, 694 - 1 + 1, 313 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label1_outer" style="Z-INDEX: 3; LEFT: 163px; WIDTH: 370px; POSITION: absolute; TOP: 87px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?php echo $color_bor ?>; background-color: #FFFFFF;height:32px;width:370px;"   ><STRONG>Fotos do Site</STRONG></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 4; LEFT: 460px; WIDTH: 272px; POSITION: absolute; TOP: 152px; HEIGHT: 27px">
<input type="file" id="Edit1" name="Edit1" style=" font-family: Verdana; font-size: 14px;  height:26px;width:372px;"    tabindex="0"    />
</div>
<input type="hidden" name="id" value="<?php echo $id_1 ?>"/>

<div id="Shape4_outer" style="Z-INDEX: 7; LEFT: 168px; WIDTH: 208px; POSITION: absolute; TOP: 144px; HEIGHT: 288px">
<script type="text/javascript">
  var Shape4_Canvas = new jsGraphics("Shape4_outer");
  Shape4_Canvas.setColor("#FFFFFF");
  Shape4_Canvas.fillRect(1, 1, 206 - 1, 286 - 1);
  Shape4_Canvas.fillRect(1, 1, 206 - 1 + 1, 286 - 1 + 1);
  Shape4_Canvas.setStroke(1);
  Shape4_Canvas.setColor("#000000");
  Shape4_Canvas.drawRect(1, 1, 206 - 1 + 1, 286 - 1 + 1);
  Shape4_Canvas.paint();
</script>

</div>
<div id="Shape5_outer" style="Z-INDEX: 8; LEFT: 176px; WIDTH: 192px; POSITION: absolute; TOP: 152px; HEIGHT: 24px">
<script type="text/javascript">
  var Shape5_Canvas = new jsGraphics("Shape5_outer");
  Shape5_Canvas.setColor("#FF8040");
  Shape5_Canvas.fillRect(1, 1, 190 - 1, 22 - 1);
  Shape5_Canvas.fillRect(1, 1, 190 - 1 + 1, 22 - 1 + 1);
  Shape5_Canvas.setStroke(1);
  Shape5_Canvas.setColor("#000000");
  Shape5_Canvas.drawRect(1, 1, 190 - 1 + 1, 22 - 1 + 1);
  Shape5_Canvas.paint();
</script>

</div>
<div id="Shape6_outer" style="Z-INDEX: 9; LEFT: 294px; WIDTH: 24px; POSITION: absolute; TOP: 209px; HEIGHT: 32px">
<script type="text/javascript">
  var Shape6_Canvas = new jsGraphics("Shape6_outer");
  Shape6_Canvas.setColor("#0080FF");
  Shape6_Canvas.fillRect(1, 1, 22 - 1, 30 - 1);
  Shape6_Canvas.fillRect(1, 1, 22 - 1 + 1, 30 - 1 + 1);
  Shape6_Canvas.setStroke(1);
  Shape6_Canvas.setColor("#000000");
  Shape6_Canvas.drawRect(1, 1, 22 - 1 + 1, 30 - 1 + 1);
  Shape6_Canvas.paint();
</script>

</div>
<div id="Shape7_outer" style="Z-INDEX: 10; LEFT: 289px; WIDTH: 32px; POSITION: absolute; TOP: 266px; HEIGHT: 24px">
<script type="text/javascript">
  var Shape7_Canvas = new jsGraphics("Shape7_outer");
  Shape7_Canvas.setColor("#80FF00");
  Shape7_Canvas.fillRect(1, 1, 30 - 1, 22 - 1);
  Shape7_Canvas.fillRect(1, 1, 30 - 1 + 1, 22 - 1 + 1);
  Shape7_Canvas.setStroke(1);
  Shape7_Canvas.setColor("#000000");
  Shape7_Canvas.drawRect(1, 1, 30 - 1 + 1, 22 - 1 + 1);
  Shape7_Canvas.paint();
</script>

</div>
<div id="Shape8_outer" style="Z-INDEX: 11; LEFT: 327px; WIDTH: 32px; POSITION: absolute; TOP: 230px; HEIGHT: 40px">
<script type="text/javascript">
  var Shape8_Canvas = new jsGraphics("Shape8_outer");
  Shape8_Canvas.setColor("#FF0080");
  Shape8_Canvas.fillRect(1, 1, 30 - 1, 38 - 1);
  Shape8_Canvas.fillRect(1, 1, 30 - 1 + 1, 38 - 1 + 1);
  Shape8_Canvas.setStroke(1);
  Shape8_Canvas.setColor("#000000");
  Shape8_Canvas.drawRect(1, 1, 30 - 1 + 1, 38 - 1 + 1);
  Shape8_Canvas.paint();
</script>

</div>
<div id="Shape9_outer" style="Z-INDEX: 12; LEFT: 251px; WIDTH: 104px; POSITION: absolute; TOP: 184px; HEIGHT: 16px">
<script type="text/javascript">
  var Shape9_Canvas = new jsGraphics("Shape9_outer");
  Shape9_Canvas.setColor("#FFFF00");
  Shape9_Canvas.fillRect(1, 1, 102 - 1, 14 - 1);
  Shape9_Canvas.fillRect(1, 1, 102 - 1 + 1, 14 - 1 + 1);
  Shape9_Canvas.setStroke(1);
  Shape9_Canvas.setColor("#000000");
  Shape9_Canvas.drawRect(1, 1, 102 - 1 + 1, 14 - 1 + 1);
  Shape9_Canvas.paint();
</script>

</div>
<div id="Shape10_outer" style="Z-INDEX: 13; LEFT: 328px; WIDTH: 32px; POSITION: absolute; TOP: 336px; HEIGHT: 24px">
<script type="text/javascript">
  var Shape10_Canvas = new jsGraphics("Shape10_outer");
  Shape10_Canvas.setColor("#FF0000");
  Shape10_Canvas.fillRect(1, 1, 30 - 1, 22 - 1);
  Shape10_Canvas.fillRect(1, 1, 30 - 1 + 1, 22 - 1 + 1);
  Shape10_Canvas.setStroke(1);
  Shape10_Canvas.setColor("#000000");
  Shape10_Canvas.drawRect(1, 1, 30 - 1 + 1, 22 - 1 + 1);
  Shape10_Canvas.paint();
</script>

</div>
<div id="Shape11_outer" style="Z-INDEX: 14; LEFT: 248px; WIDTH: 72px; POSITION: absolute; TOP: 384px; HEIGHT: 32px">
<script type="text/javascript">
  var Shape11_Canvas = new jsGraphics("Shape11_outer");
  Shape11_Canvas.setColor("#408080");
  Shape11_Canvas.fillRect(1, 1, 70 - 1, 30 - 1);
  Shape11_Canvas.fillRect(1, 1, 70 - 1 + 1, 30 - 1 + 1);
  Shape11_Canvas.setStroke(1);
  Shape11_Canvas.setColor("#000000");
  Shape11_Canvas.drawRect(1, 1, 70 - 1 + 1, 30 - 1 + 1);
  Shape11_Canvas.paint();
</script>

</div>
<div id="Shape12_outer" style="Z-INDEX: 15; LEFT: 180px; WIDTH: 32px; POSITION: absolute; TOP: 304px; HEIGHT: 56px">
<script type="text/javascript">
  var Shape12_Canvas = new jsGraphics("Shape12_outer");
  Shape12_Canvas.setColor("#800000");
  Shape12_Canvas.fillRect(1, 1, 30 - 1, 54 - 1);
  Shape12_Canvas.fillRect(1, 1, 30 - 1 + 1, 54 - 1 + 1);
  Shape12_Canvas.setStroke(1);
  Shape12_Canvas.setColor("#000000");
  Shape12_Canvas.drawRect(1, 1, 30 - 1 + 1, 54 - 1 + 1);
  Shape12_Canvas.paint();
</script>

</div>
<div id="Shape13_outer" style="Z-INDEX: 16; LEFT: 392px; WIDTH: 65px; POSITION: absolute; TOP: 154px; HEIGHT: 24px">
<script type="text/javascript">
  var Shape13_Canvas = new jsGraphics("Shape13_outer");
  Shape13_Canvas.setColor("#FF8040");
  Shape13_Canvas.fillRect(1, 1, 63 - 1, 22 - 1);
  Shape13_Canvas.fillRect(1, 1, 63 - 1 + 1, 22 - 1 + 1);
  Shape13_Canvas.setStroke(1);
  Shape13_Canvas.setColor("#000000");
  Shape13_Canvas.drawRect(1, 1, 63 - 1 + 1, 22 - 1 + 1);
  Shape13_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 17; LEFT: 395px; WIDTH: 60px; POSITION: absolute; TOP: 158px; HEIGHT: 13px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px;  height:13px;width:60px;"  align="Center"   >Foto1</div>
</div>
<div id="Shape14_outer" style="Z-INDEX: 18; LEFT: 392px; WIDTH: 65px; POSITION: absolute; TOP: 180px; HEIGHT: 24px">
<script type="text/javascript">
  var Shape14_Canvas = new jsGraphics("Shape14_outer");
  Shape14_Canvas.setColor("#FFFF00");
  Shape14_Canvas.fillRect(1, 1, 63 - 1, 22 - 1);
  Shape14_Canvas.fillRect(1, 1, 63 - 1 + 1, 22 - 1 + 1);
  Shape14_Canvas.setStroke(1);
  Shape14_Canvas.setColor("#000000");
  Shape14_Canvas.drawRect(1, 1, 63 - 1 + 1, 22 - 1 + 1);
  Shape14_Canvas.paint();
</script>

</div>
<div id="Edit2_outer" style="Z-INDEX: 19; LEFT: 460px; WIDTH: 272px; POSITION: absolute; TOP: 178px; HEIGHT: 27px">
<input type="file" id="Edit2" name="Edit2" value="" style=" font-family: Verdana; font-size: 14px;  height:26px;width:372px;"    tabindex="0"    />
</div>
<div id="Shape15_outer" style="Z-INDEX: 20; LEFT: 392px; WIDTH: 65px; POSITION: absolute; TOP: 206px; HEIGHT: 24px">
<script type="text/javascript">
  var Shape15_Canvas = new jsGraphics("Shape15_outer");
  Shape15_Canvas.setColor("#0080FF");
  Shape15_Canvas.fillRect(1, 1, 63 - 1, 22 - 1);
  Shape15_Canvas.fillRect(1, 1, 63 - 1 + 1, 22 - 1 + 1);
  Shape15_Canvas.setStroke(1);
  Shape15_Canvas.setColor("#000000");
  Shape15_Canvas.drawRect(1, 1, 63 - 1 + 1, 22 - 1 + 1);
  Shape15_Canvas.paint();
</script>

</div>
<div id="Edit3_outer" style="Z-INDEX: 21; LEFT: 460px; WIDTH: 272px; POSITION: absolute; TOP: 204px; HEIGHT: 27px">
<input type="file" id="Edit3" name="Edit3" value="" style=" font-family: Verdana; font-size: 14px;  height:26px;width:372px;"    tabindex="0"    />
</div>
<div id="Shape16_outer" style="Z-INDEX: 22; LEFT: 392px; WIDTH: 65px; POSITION: absolute; TOP: 232px; HEIGHT: 24px">
<script type="text/javascript">
  var Shape16_Canvas = new jsGraphics("Shape16_outer");
  Shape16_Canvas.setColor("#FF0080");
  Shape16_Canvas.fillRect(1, 1, 63 - 1, 22 - 1);
  Shape16_Canvas.fillRect(1, 1, 63 - 1 + 1, 22 - 1 + 1);
  Shape16_Canvas.setStroke(1);
  Shape16_Canvas.setColor("#000000");
  Shape16_Canvas.drawRect(1, 1, 63 - 1 + 1, 22 - 1 + 1);
  Shape16_Canvas.paint();
</script>

</div>
<div id="Edit4_outer" style="Z-INDEX: 23; LEFT: 460px; WIDTH: 272px; POSITION: absolute; TOP: 230px; HEIGHT: 27px">
<input type="file" id="Edit4" name="Edit4" value="" style=" font-family: Verdana; font-size: 14px;  height:26px;width:372px;"    tabindex="0"    />
</div>
<div id="Shape17_outer" style="Z-INDEX: 24; LEFT: 392px; WIDTH: 65px; POSITION: absolute; TOP: 258px; HEIGHT: 24px">
<script type="text/javascript">
  var Shape17_Canvas = new jsGraphics("Shape17_outer");
  Shape17_Canvas.setColor("#80FF00");
  Shape17_Canvas.fillRect(1, 1, 63 - 1, 22 - 1);
  Shape17_Canvas.fillRect(1, 1, 63 - 1 + 1, 22 - 1 + 1);
  Shape17_Canvas.setStroke(1);
  Shape17_Canvas.setColor("#000000");
  Shape17_Canvas.drawRect(1, 1, 63 - 1 + 1, 22 - 1 + 1);
  Shape17_Canvas.paint();
</script>

</div>
<div id="Edit5_outer" style="Z-INDEX: 25; LEFT: 460px; WIDTH: 272px; POSITION: absolute; TOP: 256px; HEIGHT: 27px">
<input type="file" id="Edit5" name="Edit5" value="" style=" font-family: Verdana; font-size: 14px;  height:26px;width:372px;"    tabindex="0"    />
</div>
<div id="Shape18_outer" style="Z-INDEX: 26; LEFT: 392px; WIDTH: 65px; POSITION: absolute; TOP: 284px; HEIGHT: 24px">
<script type="text/javascript">
  var Shape18_Canvas = new jsGraphics("Shape18_outer");
  Shape18_Canvas.setColor("#800000");
  Shape18_Canvas.fillRect(1, 1, 63 - 1, 22 - 1);
  Shape18_Canvas.fillRect(1, 1, 63 - 1 + 1, 22 - 1 + 1);
  Shape18_Canvas.setStroke(1);
  Shape18_Canvas.setColor("#000000");
  Shape18_Canvas.drawRect(1, 1, 63 - 1 + 1, 22 - 1 + 1);
  Shape18_Canvas.paint();
</script>

</div>
<div id="Edit6_outer" style="Z-INDEX: 27; LEFT: 460px; WIDTH: 272px; POSITION: absolute; TOP: 282px; HEIGHT: 27px">
<input type="file" id="Edit6" name="Edit6" value="" style=" font-family: Verdana; font-size: 14px;  height:26px;width:372px;"    tabindex="0"    />
</div>
<div id="Shape19_outer" style="Z-INDEX: 28; LEFT: 392px; WIDTH: 65px; POSITION: absolute; TOP: 310px; HEIGHT: 24px">
<script type="text/javascript">
  var Shape19_Canvas = new jsGraphics("Shape19_outer");
  Shape19_Canvas.setColor("#FF0000");
  Shape19_Canvas.fillRect(1, 1, 63 - 1, 22 - 1);
  Shape19_Canvas.fillRect(1, 1, 63 - 1 + 1, 22 - 1 + 1);
  Shape19_Canvas.setStroke(1);
  Shape19_Canvas.setColor("#000000");
  Shape19_Canvas.drawRect(1, 1, 63 - 1 + 1, 22 - 1 + 1);
  Shape19_Canvas.paint();
</script>

</div>
<div id="Edit7_outer" style="Z-INDEX: 29; LEFT: 460px; WIDTH: 272px; POSITION: absolute; TOP: 308px; HEIGHT: 27px">
<input type="file" id="Edit7" name="Edit7" value="" style=" font-family: Verdana; font-size: 14px;  height:26px;width:372px;"    tabindex="0"    />
</div>
<div id="Shape20_outer" style="Z-INDEX: 30; LEFT: 392px; WIDTH: 65px; POSITION: absolute; TOP: 336px; HEIGHT: 24px">
<script type="text/javascript">
  var Shape20_Canvas = new jsGraphics("Shape20_outer");
  Shape20_Canvas.setColor("#408080");
  Shape20_Canvas.fillRect(1, 1, 63 - 1, 22 - 1);
  Shape20_Canvas.fillRect(1, 1, 63 - 1 + 1, 22 - 1 + 1);
  Shape20_Canvas.setStroke(1);
  Shape20_Canvas.setColor("#000000");
  Shape20_Canvas.drawRect(1, 1, 63 - 1 + 1, 22 - 1 + 1);
  Shape20_Canvas.paint();
</script>

</div>
<div id="Edit8_outer" style="Z-INDEX: 31; LEFT: 460px; WIDTH: 272px; POSITION: absolute; TOP: 334px; HEIGHT: 27px">
<input type="file" id="Edit8" name="Edit8" value="" style=" font-family: Verdana; font-size: 14px;  height:26px;width:372px;"    tabindex="0"    />
</div>
<div id="Shape21_outer" style="Z-INDEX: 32; LEFT: 392px; WIDTH: 65px; POSITION: absolute; TOP: 362px; HEIGHT: 24px">
<script type="text/javascript">
  var Shape21_Canvas = new jsGraphics("Shape21_outer");
  Shape21_Canvas.setColor("#FFFFFF");
  Shape21_Canvas.fillRect(1, 1, 63 - 1, 22 - 1);
  Shape21_Canvas.fillRect(1, 1, 63 - 1 + 1, 22 - 1 + 1);
  Shape21_Canvas.setStroke(1);
  Shape21_Canvas.setColor("#000000");
  Shape21_Canvas.drawRect(1, 1, 63 - 1 + 1, 22 - 1 + 1);
  Shape21_Canvas.paint();
</script>

</div>
<div id="Edit9_outer" style="Z-INDEX: 33; LEFT: 460px; WIDTH: 272px; POSITION: absolute; TOP: 360px; HEIGHT: 27px">
<input type="file" id="Edit9" name="Edit9" value="" style=" font-family: Verdana; font-size: 14px;  height:26px;width:372px;"    tabindex="0"    />
</div>
<div id="Label3_outer" style="Z-INDEX: 34; LEFT: 395px; WIDTH: 60px; POSITION: absolute; TOP: 184px; HEIGHT: 13px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px;  height:13px;width:60px;"  align="Center"   >Foto2</div>
</div>
<div id="Label4_outer" style="Z-INDEX: 35; LEFT: 395px; WIDTH: 60px; POSITION: absolute; TOP: 210px; HEIGHT: 13px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px;  height:13px;width:60px;"  align="Center"   >Foto3</div>
</div>
<div id="Label5_outer" style="Z-INDEX: 36; LEFT: 395px; WIDTH: 60px; POSITION: absolute; TOP: 236px; HEIGHT: 13px">
<div id="Label5" style=" font-family: Verdana; font-size: 14px;  height:13px;width:60px;"  align="Center"   >Foto4</div>
</div>
<div id="Label6_outer" style="Z-INDEX: 37; LEFT: 395px; WIDTH: 60px; POSITION: absolute; TOP: 314px; HEIGHT: 13px">
<div id="Label6" style=" font-family: Verdana; font-size: 14px;  height:13px;width:60px;"  align="Center"   >Foto7</div>
</div>
<div id="Label7_outer" style="Z-INDEX: 38; LEFT: 395px; WIDTH: 60px; POSITION: absolute; TOP: 340px; HEIGHT: 13px">
<div id="Label7" style=" font-family: Verdana; font-size: 14px;  height:13px;width:60px;"  align="Center"   >Foto8</div>
</div>
<div id="Label8_outer" style="Z-INDEX: 39; LEFT: 395px; WIDTH: 60px; POSITION: absolute; TOP: 288px; HEIGHT: 13px">
<div id="Label8" style=" font-family: Verdana; font-size: 14px;  height:13px;width:60px;"  align="Center"   >Foto6</div>
</div>
<div id="Label9_outer" style="Z-INDEX: 40; LEFT: 395px; WIDTH: 60px; POSITION: absolute; TOP: 262px; HEIGHT: 13px">
<div id="Label9" style=" font-family: Verdana; font-size: 14px;  height:13px;width:60px;"  align="Center"   >Foto5</div>
</div>
<div id="Label10_outer" style="Z-INDEX: 41; LEFT: 395px; WIDTH: 60px; POSITION: absolute; TOP: 366px; HEIGHT: 13px">
<div id="Label10" style=" font-family: Verdana; font-size: 14px;  height:13px;width:60px;"  align="Center"   >Foto9</div>
</div>
</td></tr></table>

<div id="Image1_outer" style="Z-INDEX: 5; LEFT: 495px; WIDTH: 92px; POSITION: absolute; TOP: 409px; HEIGHT: 22px">

<table border='0'>
         <td> </td>
         <td><input type=image name="salvar" src="../imagens/botaoazul10.PNG"></td>
         </form>

         <form method="POST" action="../avaleht.php?servletjs2=20$$20">
         <td><input type=image name="vontar" src="../imagens/botaoazul25.PNG"></td>
         </form>

</table>
</div>

<?php}/* fecha acao=entrar */?>
</body>
</html>


