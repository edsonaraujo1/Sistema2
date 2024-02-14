<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Layout Cadastro 
 Criado em Data.....: 28/02/2008
 Ultima Atualização : 21/01/2009

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/
// salva Secao
@session_start();
$_SESSION['Inic'] = $id;
$_SESSION['Ante'] = $id;
$_SESSION['Prox'] = $id;
$_SESSION['Fim']  = $id;
$_SESSION['tipo_acao'] = 'alterar_1';
// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

// include("../logar.php");


// Resgata a Sessao
@session_start();
$Procura = strtoupper($_SESSION['Procura']);
$Opcao   = strtoupper($_SESSION['Opcao']);

include_once("funcoes2.php");

include('../config.php');
 
?>

<html >
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<script src="script.js"></script>
<script>


function janelaSecundaria (URL){ 
   window.open(URL,"janela1","width=120,height=30,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 


function Inicio()
{
url="navegacao_top.php";
ajax(url);
}
function Proximo()
{
url="navegacao_next.php";
ajax(url);
}
function Anterior()
{
url="navegacao_prev.php";
ajax(url);
}
function Fim()
{
url="navegacao_end.php";
ajax(url);
}

</script>

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
<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "  >
<form style="margin-bottom: 0" id="Unit2" name="Unit2" method="post"  action="/estoque_lay.php">
<table  width="1000"   style="height:648px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 141px; WIDTH: 724px; POSITION: absolute; TOP: 44px; HEIGHT: 519px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 692 - 16, 487 - 16);
  Shape1_Canvas.fillRect(16, 16, 692 - 16 + 1, 487 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("#5A9CB1");
  Shape1_Canvas.drawRect(16, 16, 692 - 16 + 1, 487 - 16 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 174px; WIDTH: 658px; POSITION: absolute; TOP: 77px; HEIGHT: 55px">
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
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 183px; WIDTH: 441px; POSITION: absolute; TOP: 90px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: #5A9CB1; background-color: #FFFFFF;height:32px;width:441px;"   ><STRONG>Cadastro de&nbsp;Estoque</STRONG></div>
</div>
<div id="Menssage_outer" style="Z-INDEX: 3; LEFT: 614px; WIDTH: 208px; POSITION: absolute; TOP: 95px; HEIGHT: 24px">
<div id="Menssage" style=" font-family: Verdana; font-size: 14px;  height:24px;width:208px;"  align="Center"   ><STRONG><?php echo $menssagens ?> </STRONG></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 4; LEFT: 174px; WIDTH: 658px; POSITION: absolute; TOP: 133px; HEIGHT: 397px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 656 - 1, 395 - 1);
  Shape3_Canvas.fillRect(1, 1, 656 - 1 + 1, 395 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("#5A9CB1");
  Shape3_Canvas.drawRect(1, 1, 656 - 1 + 1, 395 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 5; LEFT: 181px; WIDTH: 91px; POSITION: absolute; TOP: 144px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 12px; color: #000000;font-weight: normal; height:26px;width:91px;"   ><STRONG>Codigo.:</STRONG></div>
</div>
<div id="Edit1a_outer" style="Z-INDEX: 6; LEFT: 278px; WIDTH: 90px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit1a" name="Edit1a" value="<?php echo $Edit1 ?>" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:25px;width:90px;" disabled   tabindex="1"    />
</div>
<div id="Label3_outer" style="Z-INDEX: 7; LEFT: 382px; WIDTH: 106px; POSITION: absolute; TOP: 144px; HEIGHT: 18px">
<div id="Label3" style=" font-family: Verdana; font-size: 12px; color: #000000;font-weight: normal; height:18px;width:106px;"   ><STRONG>Data.:</STRONG></div>
</div>
<div id="Edit2a_outer" style="Z-INDEX: 8; LEFT: 430px; WIDTH: 98px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit2a" name="Edit2a" value="<?php echo $Edit2 ?>" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:25px;width:98px;" disabled   tabindex="2"    />
</div>
<div id="Label11_outer" style="Z-INDEX: 9; LEFT: 181px; WIDTH: 123px; POSITION: absolute; TOP: 170px; HEIGHT: 26px">
<div id="Label11" style=" font-family: Verdana; font-size: 12px; color: #000000;font-weight: normal; height:26px;width:123px;"   ><STRONG>Descrição.:</STRONG>&nbsp;</div>
</div>
<div id="Label12_outer" style="Z-INDEX: 10; LEFT: 181px; WIDTH: 115px; POSITION: absolute; TOP: 194px; HEIGHT: 26px">
<div id="Label12" style=" font-family: Verdana; font-size: 12px; color: #000000;font-weight: normal; height:26px;width:115px;"   ><STRONG>Unidade.:</STRONG>&nbsp;</div>
</div>
<div id="Edit4a_outer" style="Z-INDEX: 11; LEFT: 278px; WIDTH: 74px; POSITION: absolute; TOP: 189px; HEIGHT: 26px">
<input type="text" id="Edit4a" name="Edit4a" value="<?php echo $Edit4 ?>" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:25px;width:74px;" disabled   tabindex="4"    />
</div>
<div id="Label13_outer" style="Z-INDEX: 12; LEFT: 181px; WIDTH: 89px; POSITION: absolute; TOP: 218px; HEIGHT: 26px">
<div id="Label13" style=" font-family: Verdana; font-size: 12px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Classe.:</STRONG>&nbsp;</div>
</div>
<div id="Edit7a_outer" style="Z-INDEX: 13; LEFT: 278px; WIDTH: 162px; POSITION: absolute; TOP: 213px; HEIGHT: 26px">
<input type="text" id="Edit7a" name="Edit7a" value="<?php echo $Edit7 ?>" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:25px;width:162px;" disabled   tabindex="7"    />
</div>
<div id="Label68_outer" style="Z-INDEX: 14; LEFT: 180px; WIDTH: 132px; POSITION: absolute; TOP: 346px; HEIGHT: 24px">
<div id="Label68" style=" font-family: Verdana; font-size: 12px; color: #000000;font-weight: normal; height:24px;width:132px;"   ><STRONG>Observação:</STRONG></div>
</div>
<div id="Edit3a_outer" style="Z-INDEX: 16; LEFT: 278px; WIDTH: 410px; POSITION: absolute; TOP: 164px; HEIGHT: 26px">
<input type="text" id="Edit3a" name="Edit3a" value="<?php echo $Edit3 ?>" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:25px;width:410px;" disabled   tabindex="3"    />
</div>
<div id="Label4_outer" style="Z-INDEX: 32; LEFT: 359px; WIDTH: 113px; POSITION: absolute; TOP: 194px; HEIGHT: 26px">
<div id="Label4" style=" font-family: Verdana; font-size: 12px; color: #000000;font-weight: normal; height:26px;width:113px;"   ><STRONG>Qtd.Estoq.:</STRONG>&nbsp;</div>
</div>
<div id="Edit5a_outer" style="Z-INDEX: 33; LEFT: 456px; WIDTH: 72px; POSITION: absolute; TOP: 189px; HEIGHT: 26px">
<input type="text" id="Edit5a" name="Edit5a" value="<?php echo $Edit5 ?>" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:25px;width:72px;" disabled   tabindex="5"    />
</div>
<div id="Label5_outer" style="Z-INDEX: 34; LEFT: 537px; WIDTH: 103px; POSITION: absolute; TOP: 194px; HEIGHT: 26px">
<div id="Label5" style=" font-family: Verdana; font-size: 12px; color: #000000;font-weight: normal; height:26px;width:103px;"   ><STRONG>Qtd.Min.:</STRONG>&nbsp;</div>
</div>
<div id="Edit6a_outer" style="Z-INDEX: 35; LEFT: 616px; WIDTH: 72px; POSITION: absolute; TOP: 189px; HEIGHT: 26px">
<input type="text" id="Edit6a" name="Edit6a" value="<?php echo $Edit6 ?>" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:25px;width:72px;" disabled   tabindex="6"    />
</div>
<div id="Label6_outer" style="Z-INDEX: 36; LEFT: 451px; WIDTH: 133px; POSITION: absolute; TOP: 218px; HEIGHT: 26px">
<div id="Label6" style=" font-family: Verdana; font-size: 12px; color: #000000;font-weight: normal; height:26px;width:133px;"   ><STRONG>Vencimento.:</STRONG>&nbsp;</div>
</div>
<div id="Edit8a_outer" style="Z-INDEX: 37; LEFT: 548px; WIDTH: 140px; POSITION: absolute; TOP: 213px; HEIGHT: 26px">
<input type="text" id="Edit8a" name="Edit8a" value="<?php echo $Edit8 ?>" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:25px;width:140px;" disabled   tabindex="8"    />
</div>
<div id="Label7_outer" style="Z-INDEX: 38; LEFT: 181px; WIDTH: 139px; POSITION: absolute; TOP: 243px; HEIGHT: 26px">
<div id="Label7" style=" font-family: Verdana; font-size: 12px; color: #000000;font-weight: normal; height:26px;width:139px;"   ><STRONG>Fornecedor.:</STRONG>&nbsp;</div>
</div>
<div id="Edit9a_outer" style="Z-INDEX: 39; LEFT: 278px; WIDTH: 410px; POSITION: absolute; TOP: 237px; HEIGHT: 26px">
<input type="text" id="Edit9a" name="Edit9a" value="<?php echo $Edit9 ?>" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:25px;width:410px;" disabled   tabindex="9"    />
</div>
<div id="Label8_outer" style="Z-INDEX: 40; LEFT: 181px; WIDTH: 123px; POSITION: absolute; TOP: 267px; HEIGHT: 26px">
<div id="Label8" style=" font-family: Verdana; font-size: 12px; color: #000000;font-weight: normal; height:26px;width:123px;"   ><STRONG>Referência.:</STRONG>&nbsp;</div>
</div>
<div id="Edit10a_outer" style="Z-INDEX: 41; LEFT: 278px; WIDTH: 250px; POSITION: absolute; TOP: 261px; HEIGHT: 26px">
<input type="text" id="Edit10a" name="Edit10a" value="<?php echo $Edit10 ?>" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:25px;width:250px;" disabled   tabindex="10"    />
</div>
<div id="Label9_outer" style="Z-INDEX: 42; LEFT: 181px; WIDTH: 91px; POSITION: absolute; TOP: 291px; HEIGHT: 26px">
<div id="Label9" style=" font-family: Verdana; font-size: 12px; color: #000000;font-weight: normal; height:26px;width:91px;"   ><STRONG>Saldo.:</STRONG></div>
</div>
<div id="Edit11a_outer" style="Z-INDEX: 43; LEFT: 278px; WIDTH: 114px; POSITION: absolute; TOP: 287px; HEIGHT: 26px">
<input type="text" id="Edit11a" name="Edit11a" value="<?php echo $Edit11 ?>" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:25px;width:114px;" disabled   tabindex="11"    />
</div>
<div id="Label10_outer" style="Z-INDEX: 44; LEFT: 406px; WIDTH: 84px; POSITION: absolute; TOP: 291px; HEIGHT: 18px">
<div id="Label10" style=" font-family: Verdana; font-size: 12px; color: #000000;font-weight: normal; height:18px;width:84px;"   ><STRONG>Valor.:</STRONG></div>
</div>
<div id="Edit12a_outer" style="Z-INDEX: 45; LEFT: 463px; WIDTH: 105px; POSITION: absolute; TOP: 287px; HEIGHT: 26px">
<input type="text" id="Edit12a" name="Edit12a" value="<?php echo $Edit12 ?>" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:25px;width:105px;" disabled   tabindex="12"    />
</div>
<div id="Edit13a_outer" style="Z-INDEX: 15; LEFT: 278px; WIDTH: 544px; POSITION: absolute; TOP: 344px; HEIGHT: 104px">
<textarea id="Edit13a" name="Edit13a" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:103px;width:544px;" disabled  readonly tabindex="13"    wrap="virtual"><?php echo $Edit13 ?></textarea>
</div>

<div id="Image1_outer" style="Z-INDEX: 31; LEFT: 704px; WIDTH: 112px; POSITION: absolute; TOP: 147px; HEIGHT: 125px">
<div id="Image1_container" style=" width: 112;  height: 125; overflow: hidden;" ><img id="Image1" src="../imagens/Fotobranco.jpg"  width="112"  height="125"  border="1"  style=" border-color: #000000 "       /></div>
</div>

<div id="Image2_outer" style="Z-INDEX: 46; LEFT: 712px; WIDTH: 92px; POSITION: absolute; TOP: 279px; HEIGHT: 22px">
<div id="Image2_container" style=" width: 92;  height: 22; overflow: hidden;" ><img id="Image2" src="../imagens/botaoazul1.PNG"  width="92"  height="22"  border="0"       /></div>
</div>
</td></tr></table>
</form></body>
</html>
