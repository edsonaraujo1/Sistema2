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
session_start();
$_SESSION['Inic'] = $id;
$_SESSION['Ante'] = $id;
$_SESSION['Prox'] = $id;
$_SESSION['Fim']  = $id;
$_SESSION['tipo_acao'] = 'alterar_1';

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../config.php");


// Resgata a Sessao
session_start();
$Procura = strtoupper($_SESSION['Procura']);
$Opcao   = strtoupper($_SESSION['Opcao']);

include("funcoes2.php");
 
?>

<script language='javascript'> 

function janelaSecundaria (URL){ 
   window.open(URL,"janela1","width=120,height=30,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 

</script> 

<html>
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<script src="script.js"></script>
<script>
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

   if (event.keyCode == 67) 
   {
	  window.location="consulta.php";
   }

   if (event.keyCode == 39) 
   {
		url="navegacao_next.php";
		ajax(url);
   }

   if (event.keyCode == 37) 
   {
		url="navegacao_prev.php";
		ajax(url);
   }

   if (event.keyCode == 38) 
   {
		url="navegacao_top.php";
		ajax(url);
   }

   if (event.keyCode == 40) 
   {
		url="navegacao_end.php";
		ajax(url);
   }


   if (event.keyCode == 45) 
   {
		window.location="incluir.php";
   }

   if (event.keyCode == 27) 
   {
		window.location="../avaleht.php";
   }

}
//-->
</script>

<style type=text/css>

body { background-image: url(<?php echo "../".$logo_sis ?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
-->
</style> 

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; " onkeydown="javascript:document.onkeydown = keyCatcher();"  >
<form style="margin-bottom: 0" id="Unit2" name="Unit2" method="post"  action="cursoslayout.php">

<table  width="10"   style="height:10px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 141px; WIDTH: 724px; POSITION: absolute; TOP: 44px; HEIGHT: 541px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 692 - 16, 509 - 16);
  Shape1_Canvas.fillRect(16, 16, 692 - 16 + 1, 509 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("#000000");
  Shape1_Canvas.drawRect(16, 16, 692 - 16 + 1, 509 - 16 + 1);
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
  Shape2_Canvas.setColor("#000000");
  Shape2_Canvas.drawRect(1, 1, 656 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 183px; WIDTH: 417px; POSITION: absolute; TOP: 90px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?php echo $color_bor ?>; background-color: #FFFFFF;height:32px;width:417px;"   ><STRONG>Cadastro de&nbsp;Cursos</STRONG></div>
</div>
<div id="Menssage_outer" style="Z-INDEX: 3; LEFT: 614px; WIDTH: 208px; POSITION: absolute; TOP: 95px; HEIGHT: 24px">
<div id="Menssage" style=" font-family: Verdana; font-size: 14px;  height:24px;width:208px;"  align="Center"   ><STRONG><?php echo $menssagens ?></STRONG></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 4; LEFT: 174px; WIDTH: 658px; POSITION: absolute; TOP: 133px; HEIGHT: 419px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 656 - 1, 417 - 1);
  Shape3_Canvas.fillRect(1, 1, 656 - 1 + 1, 417 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("#000000");
  Shape3_Canvas.drawRect(1, 1, 656 - 1 + 1, 417 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 5; LEFT: 181px; WIDTH: 107px; POSITION: absolute; TOP: 144px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:107px;"   ><STRONG>Matricula.:</STRONG></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 278px; WIDTH: 77px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?php echo $Edit1 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:77px; background-color: #FFFFFF;" disabled   tabindex="1"    />
</div>
<div id="Label3_outer" style="Z-INDEX: 7; LEFT: 359px; WIDTH: 114px; POSITION: absolute; TOP: 144px; HEIGHT: 18px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:114px;"   ><STRONG>Inicio Curso.:</STRONG></div>
</div>
<div id="Edit2_outer" style="Z-INDEX: 8; LEFT: 470px; WIDTH: 93px; POSITION: absolute; TOP: 139px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="<?php echo $Edit2 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:93px; background-color: #FFFFFF;" disabled   tabindex="2"    />
</div>
<div id="Label4_outer" style="Z-INDEX: 9; LEFT: 597px; WIDTH: 139px; POSITION: absolute; TOP: 144px; HEIGHT: 18px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:139px;"   ><STRONG>Termino Curso.:</STRONG></div>
</div>
<div id="Edit3_outer" style="Z-INDEX: 10; LEFT: 729px; WIDTH: 93px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?php echo $Edit3 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:93px; background-color: #FFFFFF;" disabled   tabindex="3"    />
</div>
<div id="Label11_outer" style="Z-INDEX: 11; LEFT: 181px; WIDTH: 89px; POSITION: absolute; TOP: 170px; HEIGHT: 26px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Curso.:</STRONG>&nbsp;</div>
</div>
<div id="Edit14_outer" style="Z-INDEX: 12; LEFT: 692px; WIDTH: 94px; POSITION: absolute; TOP: 265px; HEIGHT: 26px">
<input type="text" id="Edit14" name="Edit14" value="<?php echo $Edit14 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:94px; background-color: #FFFFFF;" disabled   tabindex="5"    />
</div>
<div id="Label12_outer" style="Z-INDEX: 13; LEFT: 181px; WIDTH: 89px; POSITION: absolute; TOP: 194px; HEIGHT: 26px">
<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Periodo.:</STRONG>&nbsp;</div>
</div>
<div id="Edit6_outer" style="Z-INDEX: 14; LEFT: 278px; WIDTH: 194px; POSITION: absolute; TOP: 190px; HEIGHT: 26px">
<input type="text" id="Edit6" name="Edit6" value="<?php echo $Edit6 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:194px; background-color: #FFFFFF;" disabled   tabindex="6"    />
</div>
<div id="Label13_outer" style="Z-INDEX: 15; LEFT: 181px; WIDTH: 89px; POSITION: absolute; TOP: 218px; HEIGHT: 26px">
<div id="Label13" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Nome.:</STRONG>&nbsp;</div>
</div>
<div id="Edit8_outer" style="Z-INDEX: 16; LEFT: 278px; WIDTH: 314px; POSITION: absolute; TOP: 215px; HEIGHT: 26px">
<input type="text" id="Edit8" name="Edit8" value="<?php echo $Edit8 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:314px; background-color: #FFFFFF;" disabled   tabindex="8"    />
</div>
<div id="Label15_outer" style="Z-INDEX: 17; LEFT: 569px; WIDTH: 119px; POSITION: absolute; TOP: 244px; HEIGHT: 19px">
<div id="Label15" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:119px;"   ><STRONG>Nacionalidade.:</STRONG>&nbsp;</div>
</div>
<div id="Edit12_outer" style="Z-INDEX: 18; LEFT: 692px; WIDTH: 129px; POSITION: absolute; TOP: 240px; HEIGHT: 26px">
<input type="text" id="Edit12" name="Edit12" value="<?php echo $Edit12 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:129px; background-color: #FFFFFF;" disabled   tabindex="9"    />
</div>
<div id="Label16_outer" style="Z-INDEX: 19; LEFT: 181px; WIDTH: 91px; POSITION: absolute; TOP: 267px; HEIGHT: 21px">
<div id="Label16" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:91px;"   ><STRONG>Sexo.:</STRONG>&nbsp;</div>
</div>
<div id="Edit13_outer" style="Z-INDEX: 20; LEFT: 278px; WIDTH: 146px; POSITION: absolute; TOP: 265px; HEIGHT: 26px">
<input type="text" id="Edit13" name="Edit13" value="<?php echo $Edit13 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:146px; background-color: #FFFFFF;" disabled   tabindex="12"    />
</div>
<div id="Label22_outer" style="Z-INDEX: 21; LEFT: 181px; WIDTH: 107px; POSITION: absolute; TOP: 292px; HEIGHT: 26px">
<div id="Label22" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:107px;"   ><STRONG>Endereco.:</STRONG>&nbsp;</div>
</div>
<div id="Edit15_outer" style="Z-INDEX: 22; LEFT: 278px; WIDTH: 394px; POSITION: absolute; TOP: 290px; HEIGHT: 26px">
<input type="text" id="Edit15" name="Edit15" value="<?php echo $Edit15 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:394px; background-color: #FFFFFF;" disabled   tabindex="15"    />
</div>
<div id="Label26_outer" style="Z-INDEX: 23; LEFT: 181px; WIDTH: 103px; POSITION: absolute; TOP: 341px; HEIGHT: 26px">
<div id="Label26" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:103px;"   ><STRONG>Formacao.:</STRONG>&nbsp;</div>
</div>
<div id="Label68_outer" style="Z-INDEX: 24; LEFT: 180px; WIDTH: 103px; POSITION: absolute; TOP: 366px; HEIGHT: 24px">
<div id="Label68" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:103px;"   ><STRONG>Observacao:</STRONG></div>
</div>
<div id="Edit21_outer" style="Z-INDEX: 25; LEFT: 278px; WIDTH: 544px; POSITION: absolute; TOP: 365px; HEIGHT: 107px">
<textarea id="Edit21" name="Edit21" style=" font-family: Verdana; font-size: 14px;  height:106px;width:544px;  color: #696969; background-color: #FFFFFF;"  readonly tabindex="17"    wrap="virtual"><?php echo $Edit21 ?></textarea>
</div>
<div id="Label70_outer" style="Z-INDEX: 26; LEFT: 388px; WIDTH: 37px; POSITION: absolute; TOP: 321px; HEIGHT: 18px">
<div id="Label70" style=" font-family: Verdana; font-size: 13px; color: #0000FF; height:18px;width:37px;"   ><A HREF="http://correios.com.br/servicos/dnec/menuAction.do?Metodo=menuCep"  ><STRONG>Cep </STRONG></A></div>
</div>
<div id="Edit4_outer" style="Z-INDEX: 27; LEFT: 278px; WIDTH: 194px; POSITION: absolute; TOP: 165px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="<?php echo $Edit4 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:194px; background-color: #FFFFFF;" disabled   tabindex="4"    />
</div>
<div id="Edit19_outer" style="Z-INDEX: 28; LEFT: 278px; WIDTH: 194px; POSITION: absolute; TOP: 340px; HEIGHT: 26px">
<input type="text" id="Edit19" name="Edit19" value="<?php echo $Edit19 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:194px; background-color: #FFFFFF;" disabled   tabindex="19"    />
</div>
<div id="Label7_outer" style="Z-INDEX: 29; LEFT: 181px; WIDTH: 99px; POSITION: absolute; TOP: 317px; HEIGHT: 21px">
<div id="Label7" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:99px;"   ><STRONG>Cep.:</STRONG></div>
</div>
<div id="Edit16_outer" style="Z-INDEX: 30; LEFT: 278px; WIDTH: 106px; POSITION: absolute; TOP: 315px; HEIGHT: 26px">
<input type="text" id="Edit16" name="Edit16" value="<?php echo $Edit16 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:106px; background-color: #FFFFFF;" disabled   tabindex="17"    />
</div>
<div id="Label9_outer" style="Z-INDEX: 45; LEFT: 640px; WIDTH: 51px; POSITION: absolute; TOP: 269px; HEIGHT: 18px">
<div id="Label9" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:51px;"   ><STRONG>Data.:</STRONG></div>
</div>
<div id="Label14_outer" style="Z-INDEX: 46; LEFT: 181px; WIDTH: 91px; POSITION: absolute; TOP: 243px; HEIGHT: 21px">
<div id="Label14" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:91px;"   ><STRONG>Dt.Nasc.:</STRONG>&nbsp;</div>
</div>
<div id="Edit10_outer" style="Z-INDEX: 47; LEFT: 278px; WIDTH: 93px; POSITION: absolute; TOP: 240px; HEIGHT: 26px">
<input type="text" id="Edit10" name="Edit10" value="<?php echo $Edit10 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:93px; background-color: #FFFFFF;" disabled   tabindex="12"    />
</div>
<div id="Label5_outer" style="Z-INDEX: 48; LEFT: 601px; WIDTH: 91px; POSITION: absolute; TOP: 219px; HEIGHT: 18px">
<div id="Label5" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:91px;"   ><STRONG>Ocupacao.:</STRONG></div>
</div>
<div id="Edit9_outer" style="Z-INDEX: 49; LEFT: 692px; WIDTH: 130px; POSITION: absolute; TOP: 215px; HEIGHT: 26px">
<input type="text" id="Edit9" name="Edit9" value="<?php echo $Edit9 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:130px; background-color: #FFFFFF;" disabled   tabindex="5"    />
</div>
<div id="Label6_outer" style="Z-INDEX: 50; LEFT: 371px; WIDTH: 112px; POSITION: absolute; TOP: 245px; HEIGHT: 18px">
<div id="Label6" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:112px;"   ><STRONG>Estado Civil.:</STRONG></div>
</div>
<div id="Edit11_outer" style="Z-INDEX: 51; LEFT: 472px; WIDTH: 93px; POSITION: absolute; TOP: 240px; HEIGHT: 26px">
<input type="text" id="Edit11" name="Edit11" value="<?php echo $Edit11 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:93px; background-color: #FFFFFF;" disabled   tabindex="2"    />
</div>
<div id="Label10_outer" style="Z-INDEX: 52; LEFT: 531px; WIDTH: 53px; POSITION: absolute; TOP: 170px; HEIGHT: 22px">
<div id="Label10" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:22px;width:53px;"   ><STRONG>R.G.:</STRONG>&nbsp;</div>
</div>
<div id="Edit5_outer" style="Z-INDEX: 53; LEFT: 592px; WIDTH: 230px; POSITION: absolute; TOP: 165px; HEIGHT: 26px">
<input type="text" id="Edit5" name="Edit5" value="<?php echo $Edit5 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:230px; background-color: #FFFFFF;" disabled   tabindex="4"    />
</div>
<div id="Label18_outer" style="Z-INDEX: 54; LEFT: 531px; WIDTH: 61px; POSITION: absolute; TOP: 195px; HEIGHT: 17px">
<div id="Label18" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:17px;width:61px;"   ><STRONG>C.P.F.:</STRONG>&nbsp;</div>
</div>
<div id="Edit7_outer" style="Z-INDEX: 55; LEFT: 592px; WIDTH: 230px; POSITION: absolute; TOP: 190px; HEIGHT: 26px">
<input type="text" id="Edit7" name="Edit7" value="<?php echo $Edit7 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:230px; background-color: #FFFFFF;" disabled   tabindex="4"    />
</div>
<div id="Label8_outer" style="Z-INDEX: 56; LEFT: 431px; WIDTH: 64px; POSITION: absolute; TOP: 320px; HEIGHT: 19px">
<div id="Label8" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:64px;"   ><STRONG>Bairro.:</STRONG></div>
</div>
<div id="Edit17_outer" style="Z-INDEX: 57; LEFT: 495px; WIDTH: 106px; POSITION: absolute; TOP: 315px; HEIGHT: 26px">
<input type="text" id="Edit17" name="Edit17" value="<?php echo $Edit17 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:106px; background-color: #FFFFFF;" disabled   tabindex="17"    />
</div>
<div id="Label19_outer" style="Z-INDEX: 58; LEFT: 604px; WIDTH: 64px; POSITION: absolute; TOP: 320px; HEIGHT: 19px">
<div id="Label19" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:64px;"   ><STRONG>Fone.:</STRONG></div>
</div>
<div id="Edit18_outer" style="Z-INDEX: 59; LEFT: 668px; WIDTH: 154px; POSITION: absolute; TOP: 315px; HEIGHT: 26px">
<input type="text" id="Edit18" name="Edit18" value="<?php echo $Edit18 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:154px; background-color: #FFFFFF;" disabled   tabindex="17"    />
</div>
<div id="Label17_outer" style="Z-INDEX: 60; LEFT: 537px; WIDTH: 56px; POSITION: absolute; TOP: 345px; HEIGHT: 19px">
<div id="Label17" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:56px;"   ><STRONG>CTPS.:</STRONG></div>
</div>
<div id="Edit20_outer" style="Z-INDEX: 61; LEFT: 600px; WIDTH: 222px; POSITION: absolute; TOP: 340px; HEIGHT: 26px">
<input type="text" id="Edit20" name="Edit20" value="<?php echo $Edit20 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:222px; background-color: #FFFFFF;" disabled   tabindex="17"    />
</div>
</td></tr></table>
</form></body>
</html>

<script>
<!--
function Download()
{
	window.location = "captura.exe";     
}

function janelaSecundaria3 (URL){ 
   window.open(URL,"janela3","width=745,height=485,resizable=NO,status=NO,Scrollbars=yes,location=NO,menubar=NO,toolbar=NO"); 
} 

function janelaSecundaria5 (URL){ 
   window.open(URL,"janela5","width=410,height=420,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 


//-->
</script>
