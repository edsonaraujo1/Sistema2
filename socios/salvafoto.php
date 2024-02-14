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

// Funcao Verifica Versao do Browse
$browser_cliet = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT']:"";

if(strpos($browser_cliet, 'Opera')!== false) { $browser = 'Opera';
}elseif(strpos($browser_cliet, 'Gecko')!== false) { $browser = 'Firefox';
}elseif(strpos($browser_cliet, 'MSIE')!== false) { $browser = 'MS Internet Explorer';
}elseif(strpos($browser_cliet, 'Lynx')!== false) { $browser = 'Lynx';
}elseif(strpos($browser_cliet, 'WebTV')!== false) { $browser = 'WebTV';
}elseif(strpos($browser_cliet, 'Konqueror')!== false) { $browser = 'Konqueror';
}elseif(strpos($browser_cliet, 'Google')!== false) { $browser = 'Robôs de Busca';
}else $browser = " Desconhecido"; 

@session_start();
$path = strtoupper($_SESSION['Path1']);

//// include("../logar.php");
$nome3 = strtoupper($_SESSION["nome_log"]);

include("menu.php");

include_once('../sql_injection.php');

include_once("funcoes2.php");

$deixar_1 = acesso("FORM_FOTOS2");

if ($deixar_1 == "SIM"){
	
// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

// Resgata a Sessao
@session_name("Photto1");
@session_start();
$fot_id = $_SESSION['id'];
$mat    = $_SESSION['codp'];
if(!empty($mat)){
   $mat    = $_SESSION['codp'];
}

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

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

if(!empty($imagem)){
	$acao = "cadastrar";
}else{
	$acao = "entrar";
}
if($acao == 'cadastrar') { // Cadastra a imagem no banco de dados


$id_9 = $_POST['mat'];
$mat  = trim($_POST['mat']).trim(strtoupper($_POST['mat2']));

	$consulta = "SELECT * FROM tb_segunda WHERE codp = '". anti_sql_injection($mat) ."'";
		
	$resultado = @mysql_query($consulta);
	
	$row = @mysql_fetch_array($resultado);
	
	$id_9a 	   = @$row["cod_foto"];
	$id_imagem = @$row["id_imagem"];
	
	if(!empty($id_imagem)){
	
	$consulta2 = "DELETE FROM tb_segunda WHERE id_imagem = '". anti_sql_injection($id_imagem) ."'";
	
	@mysql_query($consulta2, $link);
	
    }

$fp = fopen($imagem,"rb");
$imagem_temp = fread($fp,filesize($imagem));
fclose($fp);
$imagem_temp = addslashes($imagem_temp);


//echo "<br><br><br>";
//echo $imagem."<br>";
//echo $mat."<br>";
//echo $id_9."<br>";
//echo $imagem_name."<br>";
//echo $imagem_type."<br>";
//echo $imagem_size."<br>";
//echo $imagem_temp."<br>";


$sql = @mysql_query("INSERT INTO tb_segunda(codp,cod_foto,imagem,tipo_imagem,bytes_imagem,dados_imagem)
VALUES('$mat','$id_9','$imagem_name','$imagem_type','$imagem_size','$imagem_temp')",$link)
or die("<br><br><br>
	  <div align=center>
	  <table align=center border='15' bgcolor='#FFF8DC'  bordercolor ='$color_bor'>
	  <tr>
	  <td align=center>
	  <font face=arial><b>*** Erro no: " . @mysql_error() . "!!! ***<br>
      </b>              
	  <table align=center>
	  <form method='POST' action='../index.php'>
	  <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
	  </form>  
	  </table>
	  </td>
	  </tr>
	  </table>
	  </div>");


echo "<br><br><br>
	  <div align=center>
	  <table align=center border='15' bgcolor='#FFF8DC'  bordercolor ='$color_bor'>
	  <tr>
	  <td align=center>
	  <font face=arial><b>*** Foto inserida com SUCESSO no cadastro !!! ***<br>
      </b>              
	  <table align=center>
	  <form method='POST' action='../avaleht.php?servletjs2=20$$20'>
	  <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
	  </form>  
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
<form name="frm_imagem" method="POST" action="<?phpecho $PHP_SELF ?>?acao=cadastrar" enctype="multipart/form-data">
<table  width="10"   style="height:10px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 325px; WIDTH: 391px; POSITION: absolute; TOP: 60px; HEIGHT: 220px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 359 - 16, 188 - 16);
  Shape1_Canvas.fillRect(16, 16, 359 - 16 + 1, 188 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?php echo $color_bor ?>");
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
  Shape2_Canvas.setColor("<?php echo $color_bor ?>");
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
  Shape3_Canvas.setColor("<?php echo $color_bor ?>");
  Shape3_Canvas.drawRect(1, 1, 324 - 1 + 1, 114 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>

<?php
if ($browser == " MS Internet Explorer"){
?>

<div id="Cond_outer" style="Z-INDEX: 4; LEFT: 422px; WIDTH: 154px; POSITION: absolute; TOP: 140px; HEIGHT: 46px">
<input type="file" name="imagem" style=" font-family: Verdana; font-size: 14px;  height:25px;width:234px;"    tabindex="3"    />
</div>

<?php
}else{
?>	

<div id="Cond_outer" style="Z-INDEX: 4; LEFT: 422px; WIDTH: 4px; POSITION: absolute; TOP: 140px; HEIGHT: 46px">
<input type="file" name="imagem" style=" font-family: Verdana; font-size: 12px;  height:30px;width:0px;"    tabindex="3"    />
</div>

<?php	
}
?>

<div id="Label2_outer" style="Z-INDEX: 6; LEFT: 365px; WIDTH: 51px; POSITION: absolute; TOP: 144px; HEIGHT: 16px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:16px;width:51px;"   ><STRONG>Foto.:</STRONG></div>
</div>
<div id="Label3_outer" style="Z-INDEX: 9; LEFT: 373px; WIDTH: 139px; POSITION: absolute; TOP: 216px; HEIGHT: 16px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:16px;width:139px;"   ><STRONG>Socio Matricula.:</STRONG></div>
</div>
<div id="Edit2_outer" style="Z-INDEX: 20; LEFT: 510px; WIDTH: 100px; POSITION: absolute; TOP: 217px; HEIGHT: 24px">
<input type="text" id="mat" name="mat" value="<?php echo $mat ?>                        " style=" font-family: Courier New; font-size: 14px;  height:23px;width:100px;" style="text-transform: uppercase;"   tabindex="1"    />
</div>

<div id="Edit3_outer" style="Z-INDEX: 20; LEFT: 610px; WIDTH: 50px; POSITION: absolute; TOP: 217px; HEIGHT: 24px">
<input type="text" id="mat2" name="mat2" value="<?php echo $mat2 ?>                     " style=" font-family: Courier New; font-size: 14px;  height:23px;width:50px;"  style="text-transform: uppercase;"  tabindex="2"    />
</div>

</td></tr></table>
</body>

<div style="Z-INDEX: 34; LEFT: 255px; WIDTH: 544px; POSITION: absolute; TOP: 185px; HEIGHT: 80px">
<table border='0'>
         <td> </td>
         <td><input type=image name="salvar" src="../imagens/botaoazul10.PNG"></td>
         </form>

         <form method="POST" action="../avaleht.php?servletjs2=20$$20">
         <td><input type=image name="vontar" src="../imagens/botaoazul9.PNG"></td>
         </form>

</table>
</div>

<?php}/* fecha acao=entrar */?>
</body>
</html>
<?php
}else{
	
     include("enaaurlnp.php");

}
?>
