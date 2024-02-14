<?php
/*
 --------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Alteracao do Sistema
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 --------------------------------------------------
*/

include("config.php");

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

$website	= $_SESSION['website'];
$cpfwebsite = $_SESSION['cpfwebsite'];
$atuali_za  = $_SESSION['atuali_za'];
$criado_za  = $_SESSION['criado_za'];
$logo_sis   = $_SESSION['logo_sis'];
$Titulo     = $_SESSION['Titulo'];
$cnpj_sis   = $_SESSION['cnpj_sis'];
$logo1_sis  = $_SESSION['logo1_sis'];
$logo2_sis  = $_SESSION['logo2_sis'];
$color_bor  = $_SESSION['color_bor'];
$versao_1   = $_SESSION['versao_1'];
$color_menu = $_SESSION['color_menu'];

$nome3 = addslashes($_SESSION['nome_user_1']);
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
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<body>

<style type=text/css>

body { background-image: url(<?php echo $logo_sis ?>);
       background-attachment: fixed }

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
-->
</style> 

</body>
</html>

<?php

// Abre Conexão com o MySql
include("conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass)
        or

die("<br>
     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Não foi possivel conectar !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

@mysql_select_db($db)
        or

die("<br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Não Foi possivel selecionar o banco de dados !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

// Abrir tabela Senha

$consulta = "SELECT * FROM time_zone ORDER BY zone_id ASC LIMIT 0,1";

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id_zo1     = @$row["zone_id"];
$id_dat     = @$row["id_date"];

$menssagens = "** ATUALIZAR **";

include("funcoes2.php");

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

<style>

.normal {
	
	background-color: white;
}
.anormal {
		background-color: Lavender;
}

</style>

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; " onkeydown="javascript:if (event.KeyCode==13) event.KeyCode=9; javascript:document.onkeydown = keyCatcher();"  >
<form style="margin-bottom: 0" id="form1" name="form1" method="POST"  action="cadupper.php">
<table  width="688"   style="height:400px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 0px; WIDTH: 674px; POSITION: absolute; TOP: 0px; HEIGHT: 400px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 642 - 16, 368 - 16);
  Shape1_Canvas.fillRect(16, 16, 642 - 16 + 1, 368 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?php echo $color_bor ?>");
  Shape1_Canvas.drawRect(16, 16, 642 - 16 + 1, 368 - 16 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 33px; WIDTH: 607px; POSITION: absolute; TOP: 34px; HEIGHT: 55px">
<script type="text/javascript">
  var Shape2_Canvas = new jsGraphics("Shape2_outer");
  Shape2_Canvas.setColor("#FFFFFF");
  Shape2_Canvas.fillRect(1, 1, 605 - 1, 53 - 1);
  Shape2_Canvas.fillRect(1, 1, 605 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.setStroke(1);
  Shape2_Canvas.setColor("<?php echo $color_bor ?>");
  Shape2_Canvas.drawRect(1, 1, 605 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 49px; WIDTH: 393px; POSITION: absolute; TOP: 44px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?php echo $color_bor ?>; background-color: #FFFFFF;height:32px;width:393px;"   >  <STRONG>Manutenção do Sistema</STRONG>  </div>
</div>
<div id="Menssage_outer" style="Z-INDEX: 3; LEFT: 455px; WIDTH: 169px; POSITION: absolute; TOP: 52px; HEIGHT: 24px">
<div id="Menssage" style=" font-family: Verdana; font-size: 14px;  height:24px;width:169px;"  align="Center"   ><STRONG><?php echo $menssagens ?></STRONG></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 4; LEFT: 33px; WIDTH: 607px; POSITION: absolute; TOP: 91px; HEIGHT: 173px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 605 - 1, 171 - 1);
  Shape3_Canvas.fillRect(1, 1, 605 - 1 + 1, 171 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?php echo $color_bor ?>");
  Shape3_Canvas.drawRect(1, 1, 605 - 1 + 1, 171 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Image1_outer" style="Z-INDEX: 5; LEFT: 453px; WIDTH: 160px; POSITION: absolute; TOP: 99px; HEIGHT: 154px">
<div id="Image1_container" style=" width: 160;  height: 154; overflow: hidden;" ><img id="Image1" src="<?php echo $logo1_sis ?>"  width="160"  height="154"  border="0"  style=" border-color: #000000 "       /></div>
</div>
<div id="Label69_outer" style="Z-INDEX: 6; LEFT: 46px; WIDTH: 338px; POSITION: absolute; TOP: 208px; HEIGHT: 22px">
<div id="Label69" style=" font-family: Verdana; font-size: 13px; color: #0000FF; height:22px;width:338px;"   ><A href="mailto:edsonaraujo1@hotmail.com">  Para pedir um Serial valido clique aqui  </A></div>
</div>
<div id="Label4_outer" style="Z-INDEX: 7; LEFT: 41px; WIDTH: 391px; POSITION: absolute; TOP: 102px; HEIGHT: 26px">
<div id="Label4" style=" font-family: Verdana; font-size: 16px; color: #000000;font-weight: normal; height:26px;width:391px;"  align="Center"   ><STRONG><FONT face=Arial>Este Produto esta Licenciado para:</FONT></STRONG></div>
</div>
<div id="Label5_outer" style="Z-INDEX: 8; LEFT: 41px; WIDTH: 391px; POSITION: absolute; TOP: 122px; HEIGHT: 26px">
<div id="Label5" style=" font-family: Verdana; font-size: 16px; color: #000000;font-weight: normal; height:26px;width:391px;"  align="Center"   ><FONT face=Arial><EM><FONT color=#ff0000><STRONG><?php echo $Titulo ?></STRONG></FONT></EM> </FONT></div>
</div>
<div id="Label6_outer" style="Z-INDEX: 9; LEFT: 41px; WIDTH: 391px; POSITION: absolute; TOP: 142px; HEIGHT: 26px">
<div id="Label6" style=" font-family: Verdana; font-size: 16px; color: #000000;font-weight: normal; height:26px;width:391px;"  align="Center"   ><FONT face=Arial><STRONG>CNPJ/CPF:<I><?php echo $cnpj_sis ?></I></STRONG> </FONT></div>
</div>
<div id="Label7_outer" style="Z-INDEX: 10; LEFT: 41px; WIDTH: 391px; POSITION: absolute; TOP: 162px; HEIGHT: 26px">
<div id="Label7" style=" font-family: Verdana; font-size: 16px; color: #000000;font-weight: normal; height:26px;width:391px;"  align="Center"   ><FONT face=Arial><STRONG>Criado em.:<FONT color=green><?php echo $criado_za ?></FONT></STRONG><FONT face=Arial> </FONT></FONT></div>
</div>
<div id="Label8_outer" style="Z-INDEX: 11; LEFT: 41px; WIDTH: 383px; POSITION: absolute; TOP: 183px; HEIGHT: 26px">
<div id="Label8" style=" font-family: Verdana; font-size: 16px; color: #000000;font-weight: normal; height:26px;width:383px;"  align="Center"   ><FONT face=Arial><STRONG>Ultima Atualização em.:<FONT color=blue><?php echo $atuali_za ?></FONT></STRONG></FONT></div>
</div>
<div id="Shape4_outer" style="Z-INDEX: 12; LEFT: 33px; WIDTH: 607px; POSITION: absolute; TOP: 266px; HEIGHT: 69px">
<script type="text/javascript">
  var Shape4_Canvas = new jsGraphics("Shape4_outer");
  Shape4_Canvas.setColor("#FFFFFF");
  Shape4_Canvas.fillRect(1, 1, 605 - 1, 67 - 1);
  Shape4_Canvas.fillRect(1, 1, 605 - 1 + 1, 67 - 1 + 1);
  Shape4_Canvas.setStroke(1);
  Shape4_Canvas.setColor("<?php echo $color_bor ?>");
  Shape4_Canvas.drawRect(1, 1, 605 - 1 + 1, 67 - 1 + 1);
  Shape4_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 13; LEFT: 64px; WIDTH: 95px; POSITION: absolute; TOP: 277px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #FF0000;font-weight: normal; height:26px;width:95px;"   >  <STRONG>Serial Key:</STRONG>  </div>
</div>
<div id="Label3_outer" style="Z-INDEX: 14; LEFT: 64px; WIDTH: 103px; POSITION: absolute; TOP: 303px; HEIGHT: 26px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:103px;"   >  <STRONG>Autorização:</STRONG>  </div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 15; LEFT: 166px; WIDTH: 439px; POSITION: absolute; TOP: 273px; HEIGHT: 26px">
<input type="text" id="CodigoX" name="CodigoX" value="<?php echo $cod ?>" onfocus="this.className='anormal'" onblur="this.className='normal'" style=" font-family: Verdana; font-size: 14px;  height:25px;width:439px;"    tabindex="0"    />
</div>
<div id="Edit2_outer" style="Z-INDEX: 16; LEFT: 166px; WIDTH: 439px; POSITION: absolute; TOP: 299px; HEIGHT: 26px">
<input type="password" id="Descricao" name="Descricao"  value="<?php echo $descricao ?>" onfocus="this.className='anormal'" onblur="this.className='normal'" style=" font-family: Verdana; font-size: 14px;  height:25px;width:439px;"    tabindex="1"    />
</div>
<div id="Label9_outer" style="Z-INDEX: 19; LEFT: 43px; WIDTH: 389px; POSITION: absolute; TOP: 232px; HEIGHT: 24px">
<div id="Label9" style=" font-family: Verdana; font-size: 14px;  height:24px;width:389px;"  align="Center"   >  <STRONG>Usuario..: <?php echo strtoupper($nome3) ?>&nbsp;&nbsp;Versao&nbsp;&nbsp;<?php echo $versao_1 ?></STRONG>  </div>
</div>
</td></tr></table>

<div id="Image2_outer" style="Z-INDEX: 17; LEFT: 224px; WIDTH: 92px; POSITION: absolute; TOP: 341px; HEIGHT: 22px">
<div id="Image2_container" style=" width: 92;  height: 22; overflow: hidden;" >

<input type=image name="Salvar" src="imagens/botaoazul10.PNG">

</div>
</div>
</form>

<div id="Image3_outer" style="Z-INDEX: 18; LEFT: 328px; WIDTH: 92px; POSITION: absolute; TOP: 341px; HEIGHT: 22px">
<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="javascript:window.close()"  ><img id="Image3" src="imagens/botaoazul33.PNG"  width="92"  height="22"  border="0"       /></a></div>
</div>

</body>
</html>
