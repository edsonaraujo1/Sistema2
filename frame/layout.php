<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Layout de Telas em iFrame
 Criado em Data.....: 01/04/2009
 Ultima Atualização : 01/04/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

require($path."logar.php");
$nome3 = $_SESSION["nome_log"];

require("funcoes2.php");
?>

<html >


<head>
<title>ediflayout</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript" src="vcl/js/common.js"></script>
<script type="text/javascript" src="vcl/walterzorn/wz_jsgraphics.js"></script>

<style type="text/css">
body { Background: transparent; }
</style>
</head>

<body style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px;" >
<form style="margin-bottom: 0" id="Unit2" name="Unit2" method="post"  action="/teste.php">
<table  width="0"   style="height:0px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 5px; WIDTH: 724px; POSITION: absolute; TOP: -14px; HEIGHT: 541px">

<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 692 - 16, 509 - 16);
  Shape1_Canvas.fillRect(16, 16, 692 - 16 + 1, 509 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("#5A9CB1");
  Shape1_Canvas.drawRect(16, 16, 692 - 16 + 1, 509 - 16 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 38px; WIDTH: 658px; POSITION: absolute; TOP: 19px; HEIGHT: 55px">
<script type="text/javascript">
  var Shape2_Canvas = new jsGraphics("Shape2_outer");
  Shape2_Canvas.setColor("#FFFFFF");
  Shape2_Canvas.fillRect(1, 1, 656 - 1, 53 - 1);
  Shape2_Canvas.fillRect(1, 1, 656 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.setStroke(1);
  Shape2_Canvas.setColor("#5A9CB1");
  Shape2_Canvas.drawRect(1, 1, 656 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 47px; WIDTH: 417px; POSITION: absolute; TOP: 50px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: #5A9CB1; background-color: #FFFFFF;height:32px;width:417px;"   ><STRONG>Cadastro de&nbsp;Carta Oposicao</STRONG>&nbsp;</div>
</div>
<div id="Menssage_outer" style="Z-INDEX: 3; LEFT: 478px; WIDTH: 208px; POSITION: absolute; TOP: 55px; HEIGHT: 24px">
<div id="Menssage" style=" font-family: Verdana; font-size: 14px;  height:24px;width:208px;"  align="Center"   ><STRONG>Menssagem </STRONG></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 4; LEFT: 38px; WIDTH: 658px; POSITION: absolute; TOP: 75px; HEIGHT: 419px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 656 - 1, 417 - 1);
  Shape3_Canvas.fillRect(1, 1, 656 - 1 + 1, 417 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("#5A9CB1");
  Shape3_Canvas.drawRect(1, 1, 656 - 1 + 1, 417 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 5; LEFT: 45px; WIDTH: 64px; POSITION: absolute; TOP: 104px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:64px;"   ><STRONG>Codigo.:</STRONG></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 142px; WIDTH: 63px; POSITION: absolute; TOP: 100px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="" style=" font-family: Verdana; font-size: 14px;  height:25px;width:63px;" disabled   tabindex="1"    />
</div>
<div id="Label3_outer" style="Z-INDEX: 7; LEFT: 216px; WIDTH: 114px; POSITION: absolute; TOP: 104px; HEIGHT: 18px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:114px;"   ><STRONG>Data Saida.:</STRONG></div>
</div>
<div id="Edit2_outer" style="Z-INDEX: 8; LEFT: 334px; WIDTH: 93px; POSITION: absolute; TOP: 99px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="" style=" font-family: Verdana; font-size: 14px;  height:25px;width:93px;" disabled   tabindex="2"    />
</div>
<div id="Label4_outer" style="Z-INDEX: 9; LEFT: 540px; WIDTH: 47px; POSITION: absolute; TOP: 104px; HEIGHT: 18px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:47px;"   ><STRONG>Data.:</STRONG></div>
</div>
<div id="Edit3_outer" style="Z-INDEX: 10; LEFT: 593px; WIDTH: 93px; POSITION: absolute; TOP: 100px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="" style=" font-family: Verdana; font-size: 14px;  height:25px;width:93px;" disabled   tabindex="3"    />
</div>
<div id="Label11_outer" style="Z-INDEX: 11; LEFT: 45px; WIDTH: 89px; POSITION: absolute; TOP: 130px; HEIGHT: 26px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>R.G.:</STRONG>&nbsp;</div>
</div>
<div id="Edit5_outer" style="Z-INDEX: 12; LEFT: 432px; WIDTH: 254px; POSITION: absolute; TOP: 125px; HEIGHT: 26px">
<input type="text" id="Edit5" name="Edit5" value="" style=" font-family: Verdana; font-size: 14px;  height:25px;width:254px;" disabled   tabindex="5"    />
</div>
<div id="Label12_outer" style="Z-INDEX: 13; LEFT: 45px; WIDTH: 89px; POSITION: absolute; TOP: 154px; HEIGHT: 26px">
<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Matricula.:</STRONG>&nbsp;</div>
</div>
<div id="Edit6_outer" style="Z-INDEX: 14; LEFT: 142px; WIDTH: 98px; POSITION: absolute; TOP: 150px; HEIGHT: 26px">
<input type="text" id="Edit6" name="Edit6" value="" style=" font-family: Verdana; font-size: 14px;  height:25px;width:98px;" disabled   tabindex="6"    />
</div>
<div id="Edit7_outer" style="Z-INDEX: 15; LEFT: 432px; WIDTH: 254px; POSITION: absolute; TOP: 150px; HEIGHT: 26px">
<input type="text" id="Edit7" name="Edit7" value="" style=" font-family: Verdana; font-size: 14px;  height:25px;width:254px;" disabled   tabindex="7"    />
</div>
<div id="Label13_outer" style="Z-INDEX: 16; LEFT: 45px; WIDTH: 89px; POSITION: absolute; TOP: 178px; HEIGHT: 26px">
<div id="Label13" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Nome.:</STRONG>&nbsp;</div>
</div>
<div id="Edit8_outer" style="Z-INDEX: 17; LEFT: 142px; WIDTH: 434px; POSITION: absolute; TOP: 175px; HEIGHT: 26px">
<input type="text" id="Edit8" name="Edit8" value="" style=" font-family: Verdana; font-size: 14px;  height:25px;width:434px;" disabled   tabindex="8"    />
</div>
<div id="Label15_outer" style="Z-INDEX: 18; LEFT: 509px; WIDTH: 45px; POSITION: absolute; TOP: 202px; HEIGHT: 19px">
<div id="Label15" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:45px;"   ><STRONG>Cep.:</STRONG>&nbsp;</div>
</div>
<div id="Edit10_outer" style="Z-INDEX: 19; LEFT: 556px; WIDTH: 90px; POSITION: absolute; TOP: 200px; HEIGHT: 26px">
<input type="text" id="Edit10" name="Edit10" value="" style=" font-family: Verdana; font-size: 14px;  height:25px;width:90px;" disabled   tabindex="9"    />
</div>
<div id="Label16_outer" style="Z-INDEX: 20; LEFT: 45px; WIDTH: 91px; POSITION: absolute; TOP: 227px; HEIGHT: 21px">
<div id="Label16" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:91px;"   ><STRONG>Cod. Edif.:</STRONG>&nbsp;</div>
</div>
<div id="Edit11_outer" style="Z-INDEX: 21; LEFT: 142px; WIDTH: 74px; POSITION: absolute; TOP: 225px; HEIGHT: 26px">
<input type="text" id="Edit11" name="Edit11" value="" style=" font-family: Verdana; font-size: 14px;  height:25px;width:74px;" disabled   tabindex="12"    />
</div>
<div id="Label22_outer" style="Z-INDEX: 22; LEFT: 45px; WIDTH: 107px; POSITION: absolute; TOP: 252px; HEIGHT: 26px">
<div id="Label22" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:107px;"   ><STRONG>CNPJ Edif.:</STRONG>&nbsp;</div>
</div>
<div id="Edit12_outer" style="Z-INDEX: 23; LEFT: 142px; WIDTH: 193px; POSITION: absolute; TOP: 250px; HEIGHT: 26px">
<input type="text" id="Edit12" name="Edit12" value="" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px;" disabled   tabindex="15"    />
</div>
<div id="Label26_outer" style="Z-INDEX: 24; LEFT: 45px; WIDTH: 103px; POSITION: absolute; TOP: 301px; HEIGHT: 26px">
<div id="Label26" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:103px;"   ><STRONG>CNPJ Adm.:</STRONG>&nbsp;</div>
</div>
<div id="Label68_outer" style="Z-INDEX: 25; LEFT: 44px; WIDTH: 103px; POSITION: absolute; TOP: 326px; HEIGHT: 24px">
<div id="Label68" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:103px;"   ><STRONG>Observação:</STRONG></div>
</div>
<div id="Edit15_outer" style="Z-INDEX: 26; LEFT: 142px; WIDTH: 544px; POSITION: absolute; TOP: 325px; HEIGHT: 107px">
<textarea id="Edit15" name="Edit15" style=" font-family: Verdana; font-size: 14px;  height:106px;width:544px;"   readonly tabindex="17"    wrap="virtual"></textarea>
</div>
<div id="Label70_outer" style="Z-INDEX: 27; LEFT: 652px; WIDTH: 37px; POSITION: absolute; TOP: 203px; HEIGHT: 18px">
<div id="Label70" style=" font-family: Verdana; font-size: 13px; color: #0000FF; height:18px;width:37px;"   ><A HREF="http://correios.com.br/servicos/dnec/menuAction.do?Metodo=menuCep"  ><STRONG>Cep </STRONG></A></div>
</div>
<div id="Edit4_outer" style="Z-INDEX: 28; LEFT: 142px; WIDTH: 193px; POSITION: absolute; TOP: 125px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px;" disabled   tabindex="4"    />
</div>
<div id="Edit14_outer" style="Z-INDEX: 29; LEFT: 142px; WIDTH: 194px; POSITION: absolute; TOP: 300px; HEIGHT: 26px">
<input type="text" id="Edit14" name="Edit14" value="" style=" font-family: Verdana; font-size: 14px;  height:25px;width:194px;" disabled   tabindex="19"    />
</div>
<div id="Label6_outer" style="Z-INDEX: 30; LEFT: 221px; WIDTH: 459px; POSITION: absolute; TOP: 229px; HEIGHT: 18px">
<div id="Label6" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:459px;"   ><STRONG><FONT color=#0000ff>nomeedif</FONT></STRONG></div>
</div>
<div id="Label7_outer" style="Z-INDEX: 31; LEFT: 45px; WIDTH: 99px; POSITION: absolute; TOP: 277px; HEIGHT: 21px">
<div id="Label7" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:99px;"   ><STRONG>Cod. Adm.:</STRONG></div>
</div>
<div id="Edit13_outer" style="Z-INDEX: 32; LEFT: 142px; WIDTH: 74px; POSITION: absolute; TOP: 275px; HEIGHT: 26px">
<input type="text" id="Edit13" name="Edit13" value="" style=" font-family: Verdana; font-size: 14px;  height:25px;width:74px;" disabled   tabindex="17"    />
</div>
<div id="Label9_outer" style="Z-INDEX: 47; LEFT: 376px; WIDTH: 56px; POSITION: absolute; TOP: 132px; HEIGHT: 18px">
<div id="Label9" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:56px;"   ><STRONG>C.P.F.:</STRONG></div>
</div>
<div id="Label10_outer" style="Z-INDEX: 48; LEFT: 342px; WIDTH: 87px; POSITION: absolute; TOP: 155px; HEIGHT: 18px">
<div id="Label10" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:87px;"   ><STRONG>Categoria.:</STRONG></div>
</div>
<div id="Label14_outer" style="Z-INDEX: 49; LEFT: 45px; WIDTH: 91px; POSITION: absolute; TOP: 203px; HEIGHT: 21px">
<div id="Label14" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:91px;"   ><STRONG>Endereco.:</STRONG>&nbsp;</div>
</div>
<div id="Edit9_outer" style="Z-INDEX: 50; LEFT: 142px; WIDTH: 354px; POSITION: absolute; TOP: 200px; HEIGHT: 26px">
<input type="text" id="Edit9" name="Edit9" value="" style=" font-family: Verdana; font-size: 14px;  height:25px;width:354px;" disabled   tabindex="12"    />
</div>
<div id="Label5_outer" style="Z-INDEX: 51; LEFT: 221px; WIDTH: 459px; POSITION: absolute; TOP: 278px; HEIGHT: 18px">
<div id="Label5" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:459px;"   ><STRONG><FONT color=#0000ff>nomeadm</FONT></STRONG></div>
</div>
<div id="Label8_outer" style="Z-INDEX: 52; LEFT: 342px; WIDTH: 85px; POSITION: absolute; TOP: 255px; HEIGHT: 18px">
<div id="Label8" style=" font-family: Verdana; font-size: 13px; color: #0000FF; height:18px;width:85px;"   ><A HREF="http://correios.com.br/servicos/dnec/menuAction.do?Metodo=menuCep"  ><STRONG>click CNPJ </STRONG></A></div>
</div>
<div id="Label17_outer" style="Z-INDEX: 53; LEFT: 342px; WIDTH: 85px; POSITION: absolute; TOP: 304px; HEIGHT: 18px">
<div id="Label17" style=" font-family: Verdana; font-size: 13px; color: #0000FF; height:18px;width:85px;"   ><A HREF="http://correios.com.br/servicos/dnec/menuAction.do?Metodo=menuCep"  ><STRONG>click CNPJ </STRONG></A></div>
</div>
</td></tr></table>
</form></body>
</html>
<?
require("botoes.php");
?>
<!-- Unit2 end -->
