<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Layout Cadastro 
 Criado em Data.....: 28/02/2008
 Ultima Atualiza��o : 21/01/2009

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

include("../logar.php");


// Resgata a Sessao
session_start();
$Procura = strtoupper($_SESSION['Procura']);
$Opcao   = strtoupper($_SESSION['Opcao']);

include_once("funcoes2.php");
 
?>

<script language='javascript'> 

function janelaSecundaria (URL){ 
   window.open(URL,"janela1","width=120,height=30,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 

</script> 

<html >
<head>
<title><?=$Titulo;?></title>
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

document.onkeydown = keyCatcher;

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

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; " >
<form style="margin-bottom: 0" id="Unit2" name="Unit2" method="post"  action="/protocolo_layout.php">
<table  width="10"   style="height:10px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 141px; WIDTH: 724px; POSITION: absolute; TOP: 44px; HEIGHT: 532px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 692 - 16, 500 - 16);
  Shape1_Canvas.fillRect(16, 16, 692 - 16 + 1, 500 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(16, 16, 692 - 16 + 1, 500 - 16 + 1);
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
  Shape2_Canvas.setColor("<?=$color_bor;?>");
  Shape2_Canvas.drawRect(1, 1, 656 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 183px; WIDTH: 361px; POSITION: absolute; TOP: 90px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?=$color_bor;?>; background-color: #FFFFFF;height:32px;width:361px;"   > <STRONG>Listagem de Socios</STRONG> </div>
</div>
<div id="Menssage_outer" style="Z-INDEX: 3; LEFT: 614px; WIDTH: 208px; POSITION: absolute; TOP: 95px; HEIGHT: 24px">
<div id="Menssage" style=" font-family: Verdana; font-size: 14px;  height:24px;width:208px;"  align="Center"   ><STRONG><?=$menssagens;?></STRONG></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 4; LEFT: 174px; WIDTH: 658px; POSITION: absolute; TOP: 133px; HEIGHT: 409px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 656 - 1, 407 - 1);
  Shape3_Canvas.fillRect(1, 1, 656 - 1 + 1, 407 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 656 - 1 + 1, 407 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 5; LEFT: 189px; WIDTH: 64px; POSITION: absolute; TOP: 145px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:64px;"   ><STRONG>Codigo.:</STRONG></div>
</div>
<div id="Edit0_outer" style="Z-INDEX: 6; LEFT: 305px; WIDTH: 103px; POSITION: absolute; TOP: 141px; HEIGHT: 26px">
<input type="text" id="Edit0" name="Edit0" value="<?=$Edit0;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:103px;" disabled   tabindex="0"    />
</div>

<div id="Label13_outer" style="Z-INDEX: 41; LEFT: 417px; WIDTH: 127px; POSITION: absolute; TOP: 142px; HEIGHT: 22px">
<div id="Label13" style=" font-family: Verdana; font-size: 17px; color: <?=$color_bor;?>; background-color: #FFFFFF;height:22px;width:127px;"   > <STRONG>Lista do(a).:</STRONG> </div>
</div>
<div id="Label14_outer" style="Z-INDEX: 42; LEFT: 442px; WIDTH: 258px; POSITION: absolute; TOP: 143px; HEIGHT: 24px">
<div id="Label14" style=" font-family: Verdana; font-size: 14px;  height:24px;width:258px;"  align="Center"   ><STRONG><?=$nome3;?></STRONG></div>
</div>

<div id="Label3_outer" style="Z-INDEX: 7; LEFT: 189px; WIDTH: 107px; POSITION: absolute; TOP: 170px; HEIGHT: 26px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:107px;"   ><STRONG>Nome Socio.:</STRONG></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 8; LEFT: 305px; WIDTH: 495px; POSITION: absolute; TOP: 166px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:495px;" disabled   tabindex="0"    />
</div>
<div id="Label4_outer" style="Z-INDEX: 9; LEFT: 189px; WIDTH: 107px; POSITION: absolute; TOP: 196px; HEIGHT: 26px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:107px;"   > <STRONG>Rua.:</STRONG> </div>
</div>
<div id="Edit2_outer" style="Z-INDEX: 10; LEFT: 305px; WIDTH: 167px; POSITION: absolute; TOP: 192px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="<?=$Edit2;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:167px;" disabled   tabindex="0"    />
</div>
<div id="Label5_outer" style="Z-INDEX: 11; LEFT: 189px; WIDTH: 99px; POSITION: absolute; TOP: 221px; HEIGHT: 26px">
<div id="Label5" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:99px;"   > <STRONG>Endereco.:</STRONG> </div>
</div>
<div id="Edit3_outer" style="Z-INDEX: 12; LEFT: 305px; WIDTH: 495px; POSITION: absolute; TOP: 217px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?=$Edit3;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:495px;" disabled   tabindex="0"    />
</div>
<div id="Label6_outer" style="Z-INDEX: 13; LEFT: 189px; WIDTH: 115px; POSITION: absolute; TOP: 247px; HEIGHT: 26px">
<div id="Label6" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:115px;"   ><STRONG>Numero.:</STRONG></div>
</div>
<div id="Edit4_outer" style="Z-INDEX: 14; LEFT: 305px; WIDTH: 167px; POSITION: absolute; TOP: 243px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="<?=$Edit4;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:167px;" disabled   tabindex="0"    />
</div>
<div id="Label7_outer" style="Z-INDEX: 15; LEFT: 189px; WIDTH: 115px; POSITION: absolute; TOP: 273px; HEIGHT: 26px">
<div id="Label7" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:115px;"   ><STRONG>Bairro.:</STRONG></div>
</div>
<div id="Edit5_outer" style="Z-INDEX: 16; LEFT: 305px; WIDTH: 223px; POSITION: absolute; TOP: 269px; HEIGHT: 26px">
<input type="text" id="Edit5" name="Edit5" value="<?=$Edit5;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:223px;" disabled   tabindex="0"    />
</div>
<div id="Label8_outer" style="Z-INDEX: 17; LEFT: 533px; WIDTH: 123px; POSITION: absolute; TOP: 275px; HEIGHT: 27px">
<div id="Label8" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:27px;width:123px;"   ><STRONG>CEP.:</STRONG></div>
</div>
<div id="Edit6_outer" style="Z-INDEX: 18; LEFT: 582px; WIDTH: 114px; POSITION: absolute; TOP: 269px; HEIGHT: 27px">
<input type="text" id="Edit6" name="Edit6" value="<?=$Edit6;?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:114px;" disabled   tabindex="0"    />
</div>
<div id="Label9_outer" style="Z-INDEX: 19; LEFT: 704px; WIDTH: 43px; POSITION: absolute; TOP: 275px; HEIGHT: 26px">
<div id="Label9" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:43px;"   ><STRONG>UF.:</STRONG></div>
</div>
<div id="Edit7_outer" style="Z-INDEX: 20; LEFT: 737px; WIDTH: 63px; POSITION: absolute; TOP: 271px; HEIGHT: 26px">
<input type="text" id="Edit7" name="Edit7" value="<?=$Edit7;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:63px;" disabled   tabindex="0"    />
</div>
<div id="Label10_outer" style="Z-INDEX: 35; LEFT: 191px; WIDTH: 97px; POSITION: absolute; TOP: 299px; HEIGHT: 26px">
<div id="Label10" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:97px;"   ><STRONG>Funcao.:</STRONG></div>
</div>
<div id="Edit8_outer" style="Z-INDEX: 36; LEFT: 305px; WIDTH: 391px; POSITION: absolute; TOP: 295px; HEIGHT: 26px">
<input type="text" id="Edit8" name="Edit8" value="<?=$Edit8;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:391px;" disabled   tabindex="0"    />
</div>
<div id="Label11_outer" style="Z-INDEX: 37; LEFT: 190px; WIDTH: 105px; POSITION: absolute; TOP: 325px; HEIGHT: 26px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:105px;"   ><STRONG>Condominio.:</STRONG></div>
</div>
<div id="Edit9_outer" style="Z-INDEX: 38; LEFT: 305px; WIDTH: 391px; POSITION: absolute; TOP: 321px; HEIGHT: 26px">
<input type="text" id="Edit9" name="Edit9" value="<?=$Edit9;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:391px;" disabled   tabindex="0"    />
</div>
<div id="Label12_outer" style="Z-INDEX: 39; LEFT: 190px; WIDTH: 113px; POSITION: absolute; TOP: 351px; HEIGHT: 26px">
<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:113px;"   ><STRONG>Observacao.:</STRONG></div>
</div>
<div id="Edit10_outer" style="Z-INDEX: 40; LEFT: 305px; WIDTH: 495px; POSITION: absolute; TOP: 347px; HEIGHT: 77px">
<textarea type="text" id="Edit10" name="Edit10" style=" font-family: Verdana; font-size: 14px;  height:76px;width:495px;  color: #696969; background-color: #FFFFFF;"  readonly  tabindex="0"    /><?=$Edit10;?></textarea>
</div>
<div id="Label15_outer" style="Z-INDEX: 43; LEFT: 188px; WIDTH: 131px; POSITION: absolute; TOP: 428px; HEIGHT: 20px">
<div id="Label15" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:20px;width:131px;"   ><STRONG>Total da Lista.:</STRONG></div>
</div>
<div id="Edit11_outer" style="Z-INDEX: 44; LEFT: 305px; WIDTH: 79px; POSITION: absolute; TOP: 424px; HEIGHT: 26px">
<input type="text" id="Edit11" name="Edit11" value="<?=$Edit11;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:79px;" disabled   tabindex="0"    />
</div>
<!-- 
<div id="Image1_outer" style="Z-INDEX: 45; LEFT: 702px; WIDTH: 19px; POSITION: absolute; TOP: 323px; HEIGHT: 19px">
<div id="Image1_container" style=" width: 19;  height: 19; overflow: hidden;" ><img id="Image1" src="../imagens/lupa.PNG"  width="17"  height="18"  border="0"       /></div>
</div>
-->
</td></tr></table></form></body>
</html>