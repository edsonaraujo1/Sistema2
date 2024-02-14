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


// Resgata a Sessao
session_start();
$fot_id = $_SESSION['id'];
$mat    = $_SESSION['codp'];

session_start();
$path = strtoupper($_SESSION['Path1']);

require($path."logar.php");
$nome3 = $_SESSION["nome_log"];

// Abre Conexão com o MySql
include($path."conexao.php");
// Chama o Banco de Dados

require("funcoes2.php");
require("menu.php");

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

if($acao == 'cadastrar') {

$consulta = "SELECT * FROM tb_segunda WHERE cod_foto = '$fot_id'";
	
$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id_9 	   = @$row["cod_foto"];
$id_imagem = @$row["id_imagem"];

if(!empty($id_imagem)){

$consulta2 = "DELETE FROM tb_segunda WHERE id_imagem = '$id_imagem'";

@mysql_query($consulta2, $link);
	
}
}
      
$id_9 = $fot_id;     

?>
<html>
<head>
<title><?=$Titulo;?></title>
</head>
<body bgcolor="#FFFFFF" text="#000000">

<style type=text/css>

body { background-image: url(<?=$logo_sis;?>);}

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

<?
if(!empty($imagem)){
	$acao = "cadastrar";
}else{
	$acao = "entrar";
}
if($acao == 'cadastrar') { // Cadastra a imagem no banco de dados
$fp = fopen($imagem,"rb");
$imagem_temp = fread($fp,filesize($imagem));
fclose($fp);
$imagem_temp = addslashes($imagem_temp);
$sql = @mysql_query("INSERT INTO tb_segunda(codp,cod_foto,imagem,tipo_imagem,bytes_imagem,dados_imagem)
VALUES('$mat','$id_9','$imagem_name','$imagem_type','$imagem_size','$imagem_temp')",$link)
or die("Erro no SQL: ".@mysql_error());
echo "<br><br>
	  <div align=center>
	  <table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='#4682B4'>
	  <tr>
	  <td align=center>
	  <font face=arial><b>*** Foto inserida com SUCESSO no cadastro !!! ***<br>
      </b>              
	  <table align=center>
	  <form method='POST' action='javascript:history.go(-2)'>
	  <td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
	  </form></p>
	  </table>
	  </td>
	  </tr>
	  </table>
	  </div>";
	  
	  
			// Atualiza arquivo Log
			$menssagens = "SALVAR FOTO NO DB";
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = $menssagens."/".$mat;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);
     
	  
}else{
/*fecha acao=entrar */?>

<div align="center">
<br/><br/><br/>
<form name="frm_imagem" method="POST" action="<?echo $PHP_SELF;?>?acao=cadastrar" enctype="multipart/form-data">
<table  width="1000"   style="height:496px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 325px; WIDTH: 391px; POSITION: absolute; TOP: 60px; HEIGHT: 220px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 359 - 16, 188 - 16);
  Shape1_Canvas.fillRect(16, 16, 359 - 16 + 1, 188 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("#4682B4");
  Shape1_Canvas.drawRect(16, 16, 359 - 16 + 1, 188 - 16 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 357px; WIDTH: 326px; POSITION: absolute; TOP: 93px; HEIGHT: 37px">
<script type="text/javascript">
  var Shape2_Canvas = new jsGraphics("Shape2_outer");
  Shape2_Canvas.setColor("#FFFFFF");
  Shape2_Canvas.fillRect(1, 1, 324 - 1, 35 - 1);
  Shape2_Canvas.fillRect(1, 1, 324 - 1 + 1, 35 - 1 + 1);
  Shape2_Canvas.setStroke(1);
  Shape2_Canvas.setColor("#4682B4");
  Shape2_Canvas.drawRect(1, 1, 324 - 1 + 1, 35 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 394px; WIDTH: 256px; POSITION: absolute; TOP: 102px; HEIGHT: 24px">
<div id="Label1" style=" font-family: Verdana; font-size: 14px;  height:24px;width:256px;"  align="Center"   ><STRONG>Incluir Foto do Associado</STRONG></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 3; LEFT: 357px; WIDTH: 326px; POSITION: absolute; TOP: 131px; HEIGHT: 116px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 324 - 1, 114 - 1);
  Shape3_Canvas.fillRect(1, 1, 324 - 1 + 1, 114 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("#4682B4");
  Shape3_Canvas.drawRect(1, 1, 324 - 1 + 1, 114 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>

<div id="Cond_outer" style="Z-INDEX: 4; LEFT: 422px; WIDTH: 154px; POSITION: absolute; TOP: 140px; HEIGHT: 46px">
<input type="file" name="imagem" style=" font-family: Verdana; font-size: 14px;  height:25px;width:234px;"    tabindex="3"    />
</div>
<div id="Label2_outer" style="Z-INDEX: 6; LEFT: 365px; WIDTH: 51px; POSITION: absolute; TOP: 144px; HEIGHT: 16px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:16px;width:51px;"   ><STRONG>Foto.:</STRONG></div>
</div>
<div id="Label3_outer" style="Z-INDEX: 9; LEFT: 373px; WIDTH: 139px; POSITION: absolute; TOP: 216px; HEIGHT: 16px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:16px;width:139px;"   ><STRONG>Socio Matricula.:</STRONG></div>
</div>
<div id="Label4_outer" style="Z-INDEX: 10; LEFT: 510px; WIDTH: 130px; POSITION: absolute; TOP: 217px; HEIGHT: 16px">
<div id="Label4" style=" font-family: Verdana; font-size: 16px; color: #000000;font-weight: normal; height:16px;width:130px;"  align="Center"   ><STRONG><FONT color=#ff0000><?=$mat;?></FONT></STRONG></div>
</div>
</td></tr></table>
</body>

<div style="Z-INDEX: 34; LEFT: 255px; WIDTH: 544px; POSITION: absolute; TOP: 185px; HEIGHT: 80px">
<table border='0'>
         <td> </td>
         <td><input type=image name="salvar" src="imagens/botaoazul10.PNG"></td>
         </form>

         <form method="POST" action="cadsocios.php?Cod_xxx=<?=$id;?>">
         <td><input type=image name="vontar" src="imagens/botaoazul9.PNG"></td>
         </form>

</table>
</div>

<?}/* fecha acao=entrar */?>
</body>
</html>