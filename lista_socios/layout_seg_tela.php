<?
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

include("../logar.php");


// Resgata a Sessao
session_start();
$Procura = strtoupper($_SESSION['Procura']);
$Opcao   = strtoupper($_SESSION['Opcao']);

include ("funcoes2.php");
 
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
url="navegacao_top_seg_tel.php";
ajax(url);
}
function Proximo()
{
url="navegacao_next_seg_tel.php";
ajax(url);
}
function Anterior()
{
url="navegacao_prev_seg_tel.php";
ajax(url);
}
function Fim()
{
url="navegacao_end_seg_tel.php";
ajax(url);
}

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



<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "  >
<form style="margin-bottom: 0" id="Unit2" name="Unit2" method="post"  action="/acompa_2layout.php">
<table  width="1000"   style="height:600px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 141px; WIDTH: 724px; POSITION: absolute; TOP: 44px; HEIGHT: 357px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 692 - 16, 325 - 16);
  Shape1_Canvas.fillRect(16, 16, 692 - 16 + 1, 325 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(16, 16, 692 - 16 + 1, 325 - 16 + 1);
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
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 192px; WIDTH: 449px; POSITION: absolute; TOP: 90px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 25px; color: <?=$color_bor;?>; background-color: #FFFFFF;height:32px;width:449px;"   >  <STRONG>Tela de Andamento</STRONG>  </div>
</div>
<div id="Menssage_outer" style="Z-INDEX: 3; LEFT: 614px; WIDTH: 208px; POSITION: absolute; TOP: 95px; HEIGHT: 24px">
<div id="Menssage" style=" font-family: Verdana; font-size: 14px;  height:24px;width:208px;"  align="Center"   ><STRONG><?=$Menssagem;?> </STRONG></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 4; LEFT: 174px; WIDTH: 658px; POSITION: absolute; TOP: 133px; HEIGHT: 235px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 656 - 1, 233 - 1);
  Shape3_Canvas.fillRect(1, 1, 656 - 1 + 1, 233 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 656 - 1 + 1, 233 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 5; LEFT: 193px; WIDTH: 91px; POSITION: absolute; TOP: 144px; HEIGHT: 24px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:91px;"   >  <STRONG>Data.:</STRONG>  </div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 302px; WIDTH: 114px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:114px;" disabled   tabindex="1"    />
</div>
<div id="Label3_outer" style="Z-INDEX: 7; LEFT: 192px; WIDTH: 112px; POSITION: absolute; TOP: 176px; HEIGHT: 18px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:112px;"   >  <STRONG>Andamento.:</STRONG>  </div>
</div>
<div id="Edit2_outer" style="Z-INDEX: 8; LEFT: 302px; WIDTH: 496px; POSITION: absolute; TOP: 167px; HEIGHT: 133px">
<input type="text" id="Edit2" name="Edit2" value="<?=$Edit2;?>" style=" font-family: Verdana; font-size: 14px;  height:132px;width:496px;" disabled   tabindex="2"    />
</div>
<div id="Image9_outer" style="Z-INDEX: 9; LEFT: 411px; WIDTH: 92px; POSITION: absolute; TOP: 320px; HEIGHT: 22px">
<div id="Image9_container" style=" width: 92;  height: 22; overflow: hidden;" ><img id="Image9" src="../imagens/botaoazul4.PNG"  width="92"  height="22"  border="0"       /></div>
</div>
<div id="Image10_outer" style="Z-INDEX: 10; LEFT: 507px; WIDTH: 92px; POSITION: absolute; TOP: 320px; HEIGHT: 22px">
<div id="Image10_container" style=" width: 92;  height: 22; overflow: hidden;" ><img id="Image10" src="../imagens/botaoazul5.PNG"  width="92"  height="22"  border="0"       /></div>
</div>
<div id="Image11_outer" style="Z-INDEX: 11; LEFT: 603px; WIDTH: 92px; POSITION: absolute; TOP: 320px; HEIGHT: 22px">
<div id="Image11_container" style=" width: 92;  height: 22; overflow: hidden;" ><img id="Image11" src="../imagens/botaoazul6.PNG"  width="92"  height="22"  border="0"       /></div>
</div>
<div id="Image12_outer" style="Z-INDEX: 12; LEFT: 699px; WIDTH: 92px; POSITION: absolute; TOP: 320px; HEIGHT: 22px">
<div id="Image12_container" style=" width: 92;  height: 22; overflow: hidden;" ><img id="Image12" src="../imagens/botao_voltar.PNG"  width="92"  height="22"  border="0"       /></div>
</div>
<div id="Image13_outer" style="Z-INDEX: 13; LEFT: 224px; WIDTH: 39px; POSITION: absolute; TOP: 316px; HEIGHT: 32px">
<div id="Image13_container" style=" width: 39;  height: 32; overflow: hidden;" ><img id="Image13" src="../imagens/inicio.PNG"  width="39"  height="32"  border="0"       /></div>
</div>
<div id="Image14_outer" style="Z-INDEX: 14; LEFT: 269px; WIDTH: 39px; POSITION: absolute; TOP: 316px; HEIGHT: 32px">
<div id="Image14_container" style=" width: 39;  height: 32; overflow: hidden;" ><img id="Image14" src="../imagens/anterior.PNG"  width="39"  height="32"  border="0"       /></div>
</div>
<div id="Image15_outer" style="Z-INDEX: 15; LEFT: 315px; WIDTH: 40px; POSITION: absolute; TOP: 316px; HEIGHT: 32px">
<div id="Image15_container" style=" width: 40;  height: 32; overflow: hidden;" ><img id="Image15" src="../imagens/proximo.PNG"  width="40"  height="32"  border="0"       /></div>
</div>
<div id="Image16_outer" style="Z-INDEX: 16; LEFT: 362px; WIDTH: 39px; POSITION: absolute; TOP: 316px; HEIGHT: 32px">
<div id="Image16_container" style=" width: 39;  height: 32; overflow: hidden;" ><img id="Image16" src="../imagens/fim.PNG"  width="39"  height="32"  border="0"       /></div>
</div>
</td></tr></table>
</form></body>

</html>
