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

include_once("funcoes2.php");
 
$cami2 = '../imagens/fotos/Branco.bmp';  
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

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "  >
<form style="margin-bottom: 0" id="Unit2" name="Unit2" method="post"  action="/advogado_layout.php">
<table  width="10"   style="height:10px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 141px; WIDTH: 724px; POSITION: absolute; TOP: 44px; HEIGHT: 540px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 692 - 16, 508 - 16);
  Shape1_Canvas.fillRect(16, 16, 692 - 16 + 1, 508 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(16, 16, 692 - 16 + 1, 508 - 16 + 1);
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
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 183px; WIDTH: 377px; POSITION: absolute; TOP: 90px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?=$color_bor;?>; background-color: #FFFFFF;height:32px;width:377px;"   ><P><STRONG>Cadastro Convenio Clube</STRONG></P></div>
</div>
<div id="Menssage_outer" style="Z-INDEX: 3; LEFT: 614px; WIDTH: 208px; POSITION: absolute; TOP: 95px; HEIGHT: 24px">
<div id="Menssage" style=" font-family: Verdana; font-size: 14px;  height:24px;width:208px;"  align="Center"   ><STRONG><?=$menssagens;?></STRONG></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 4; LEFT: 174px; WIDTH: 658px; POSITION: absolute; TOP: 133px; HEIGHT: 418px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 656 - 1, 416 - 1);
  Shape3_Canvas.fillRect(1, 1, 656 - 1 + 1, 416 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 656 - 1 + 1, 416 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 5; LEFT: 184px; WIDTH: 99px; POSITION: absolute; TOP: 145px; HEIGHT: 23px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:99px;"   ><STRONG>Codigo Nº.:</STRONG></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 305px; WIDTH: 95px; POSITION: absolute; TOP: 141px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1.$Edit24;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:95px;" disabled   tabindex="0"    />
</div>
<div id="Label3_outer" style="Z-INDEX: 7; LEFT: 412px; WIDTH: 108px; POSITION: absolute; TOP: 145px; HEIGHT: 23px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:108px;"   ><STRONG>Matricula&nbsp;Nº.:</STRONG></div>
</div>
<div id="Edit2_outer" style="Z-INDEX: 8; LEFT: 521px; WIDTH: 95px; POSITION: absolute; TOP: 141px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="<?=$Edit2;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:95px;" disabled   tabindex="0"    />
</div>
<div id="Label4_outer" style="Z-INDEX: 9; LEFT: 644px; WIDTH: 60px; POSITION: absolute; TOP: 145px; HEIGHT: 23px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:60px;"   ><STRONG>Data.:</STRONG></div>
</div>
<div id="Edit3_outer" style="Z-INDEX: 10; LEFT: 697px; WIDTH: 111px; POSITION: absolute; TOP: 141px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?=$Edit3;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:111px;" disabled   tabindex="0"    />
</div>
<div id="Label5_outer" style="Z-INDEX: 11; LEFT: 184px; WIDTH: 99px; POSITION: absolute; TOP: 171px; HEIGHT: 23px">
<div id="Label5" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:99px;"   ><STRONG>Titular.:</STRONG></div>
</div>
<div id="Edit4_outer" style="Z-INDEX: 12; LEFT: 305px; WIDTH: 391px; POSITION: absolute; TOP: 167px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="<?=$Edit4;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:391px;" disabled   tabindex="0"    />
</div>
<div id="Label6_outer" style="Z-INDEX: 13; LEFT: 184px; WIDTH: 115px; POSITION: absolute; TOP: 197px; HEIGHT: 23px">
<div id="Label6" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:115px;"   ><STRONG>Sexo.:</STRONG></div>
</div>
<div id="Edit5_outer" style="Z-INDEX: 14; LEFT: 305px; WIDTH: 47px; POSITION: absolute; TOP: 193px; HEIGHT: 26px">
<input type="text" id="Edit5" name="Edit5" value="<?=$Edit5;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:47px;" disabled   tabindex="0"    />
</div>



<div id="Image2_outer" style="Z-INDEX: 16; LEFT: 711px; WIDTH: 92px; POSITION: absolute; TOP: 293px; HEIGHT: 22px">
<div id="Image2_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="javascript:janelaSecundaria6('capture.php?Cod_cap=<?=$id;?>')"><img alt="Capturar Foto para Cadastro" id="Image2" src="../imagens/botaoazul17.PNG"  width="92"  height="22"  border="0"       /></a></div>
</div>

<?

// salva Secao
session_name("Photto1");
session_start();
$_SESSION['codp'] = $new_fot;
//$new_fot = $_SESSION['codp'];


   if($mostra_branco == "faz"){
   ?>	

<div id="Image1_outer" style="Z-INDEX: 15; LEFT: 704px; WIDTH: 104px; POSITION: absolute; TOP: 176px; HEIGHT: 112px">
<div id="Image1_container" style=" width: 104;  height: 112; overflow: hidden;" ><A href="cadastro.php?cod_5=<?=$id;?>"><img id="Image1" src="ver.php?new_fot=<?=$new_fot;?>"  width="104"  height="112"  border="0"       /></a></div>
</div>

<?
}else{
?>

<div id="Image1_outer" style="Z-INDEX: 15; LEFT: 704px; WIDTH: 104px; POSITION: absolute; TOP: 176px; HEIGHT: 112px">
<div id="Image1_container" style=" width: 104;  height: 112; overflow: hidden;" ><A href="cadastro.php?cod_5=<?=$id;?>"><img id="Image1" src="<?=$cami2;?>"  width="104"  height="112"  border="0"       /></a></div>
</div>

<?
}
?>

<div id="Label7_outer" style="Z-INDEX: 17; LEFT: 364px; WIDTH: 89px; POSITION: absolute; TOP: 197px; HEIGHT: 23px">
<div id="Label7" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:89px;"   ><STRONG>Dat. Nasc.:</STRONG></div>
</div>
<div id="Edit6_outer" style="Z-INDEX: 18; LEFT: 453px; WIDTH: 120px; POSITION: absolute; TOP: 193px; HEIGHT: 26px">
<input type="text" id="Edit6" name="Edit6" value="<?=$Edit6;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:120px;" disabled   tabindex="0"    />
</div>
<div id="Label8_outer" style="Z-INDEX: 19; LEFT: 184px; WIDTH: 120px; POSITION: absolute; TOP: 222px; HEIGHT: 23px">
<div id="Label8" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:120px;"   ><STRONG>Nacionalidade.:</STRONG></div>
</div>
<div id="Edit7_outer" style="Z-INDEX: 20; LEFT: 305px; WIDTH: 151px; POSITION: absolute; TOP: 218px; HEIGHT: 26px">
<input type="text" id="Edit7" name="Edit7" value="<?=$Edit7;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:151px;" disabled   tabindex="0"    />
</div>
<div id="Label9_outer" style="Z-INDEX: 21; LEFT: 461px; WIDTH: 67px; POSITION: absolute; TOP: 223px; HEIGHT: 23px">
<div id="Label9" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:67px;"   ><STRONG>Natural.:</STRONG></div>
</div>
<div id="Edit8_outer" style="Z-INDEX: 22; LEFT: 528px; WIDTH: 168px; POSITION: absolute; TOP: 217px; HEIGHT: 26px">
<input type="text" id="Edit8" name="Edit8" value="<?=$Edit8;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:168px;" disabled   tabindex="0"    />
</div>
<div id="Label10_outer" style="Z-INDEX: 23; LEFT: 184px; WIDTH: 120px; POSITION: absolute; TOP: 247px; HEIGHT: 23px">
<div id="Label10" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:120px;"   ><STRONG>Escolaridade.:</STRONG></div>
</div>
<div id="Edit9_outer" style="Z-INDEX: 24; LEFT: 305px; WIDTH: 151px; POSITION: absolute; TOP: 243px; HEIGHT: 26px">
<input type="text" id="Edit9" name="Edit9" value="<?=$Edit9;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:151px;" disabled   tabindex="0"    />
</div>
<div id="Label11_outer" style="Z-INDEX: 25; LEFT: 496px; WIDTH: 107px; POSITION: absolute; TOP: 248px; HEIGHT: 23px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:107px;"   ><STRONG>Est. Civil.:</STRONG></div>
</div>
<div id="Edit10_outer" style="Z-INDEX: 26; LEFT: 576px; WIDTH: 120px; POSITION: absolute; TOP: 242px; HEIGHT: 26px">
<input type="text" id="Edit10" name="Edit10" value="<?=$Edit10;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:120px;" disabled   tabindex="0"    />
</div>
<div id="Label12_outer" style="Z-INDEX: 27; LEFT: 184px; WIDTH: 120px; POSITION: absolute; TOP: 273px; HEIGHT: 23px">
<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:120px;"   ><STRONG>Endereco.:</STRONG></div>
</div>
<div id="Edit11_outer" style="Z-INDEX: 28; LEFT: 305px; WIDTH: 391px; POSITION: absolute; TOP: 269px; HEIGHT: 26px">
<input type="text" id="Edit11" name="Edit11" value="<?=$Edit11;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:391px;" disabled   tabindex="0"    />
</div>
<div id="Label13_outer" style="Z-INDEX: 29; LEFT: 184px; WIDTH: 120px; POSITION: absolute; TOP: 299px; HEIGHT: 23px">
<div id="Label13" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:120px;"   ><STRONG>Bairro.:</STRONG></div>
</div>
<div id="Edit12_outer" style="Z-INDEX: 30; LEFT: 305px; WIDTH: 151px; POSITION: absolute; TOP: 295px; HEIGHT: 26px">
<input type="text" id="Edit12" name="Edit12" value="<?=$Edit12;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:151px;" disabled   tabindex="0"    />
</div>
<div id="Label14_outer" style="Z-INDEX: 31; LEFT: 478px; WIDTH: 48px; POSITION: absolute; TOP: 299px; HEIGHT: 23px">
<div id="Label14" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:48px;"   ><STRONG>CEP.:</STRONG></div>
</div>
<div id="Edit13_outer" style="Z-INDEX: 32; LEFT: 529px; WIDTH: 167px; POSITION: absolute; TOP: 295px; HEIGHT: 26px">
<input type="text" id="Edit13" name="Edit13" value="<?=$Edit13;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:167px;" disabled   tabindex="0"    />
</div>
<div id="Label15_outer" style="Z-INDEX: 33; LEFT: 184px; WIDTH: 120px; POSITION: absolute; TOP: 325px; HEIGHT: 23px">
<div id="Label15" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:120px;"   ><STRONG>Cidade.:</STRONG></div>
</div>
<div id="Edit14_outer" style="Z-INDEX: 34; LEFT: 305px; WIDTH: 151px; POSITION: absolute; TOP: 321px; HEIGHT: 26px">
<input type="text" id="Edit14" name="Edit14" value="<?=$Edit14;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:151px;" disabled   tabindex="0"    />
</div>
<div id="Label16_outer" style="Z-INDEX: 35; LEFT: 481px; WIDTH: 48px; POSITION: absolute; TOP: 325px; HEIGHT: 23px">
<div id="Label16" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:48px;"   ><STRONG>UF.:</STRONG></div>
</div>
<div id="Edit15_outer" style="Z-INDEX: 36; LEFT: 529px; WIDTH: 63px; POSITION: absolute; TOP: 321px; HEIGHT: 26px">
<input type="text" id="Edit15" name="Edit15" value="<?=$Edit15;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:63px;" disabled   tabindex="0"    />
</div>

<div id="Label17_outer" style="Z-INDEX: 37; LEFT: 599px; WIDTH: 120px; POSITION: absolute; TOP: 325px; HEIGHT: 23px">
<div id="Label17" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:120px;"   ><STRONG>Fone.:</STRONG></div>
</div>
<div id="Edit16_outer" style="Z-INDEX: 38; LEFT: 656px; WIDTH: 152px; POSITION: absolute; TOP: 321px; HEIGHT: 26px">
<input type="text" id="Edit16" name="Edit16" value="<?=$Edit16;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:152px;" disabled   tabindex="0"    />
</div>
<div id="Label18_outer" style="Z-INDEX: 39; LEFT: 185px; WIDTH: 48px; POSITION: absolute; TOP: 351px; HEIGHT: 23px">
<div id="Label18" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:48px;"   ><STRONG>Cel.:</STRONG></div>
</div>
<div id="Edit17_outer" style="Z-INDEX: 40; LEFT: 305px; WIDTH: 151px; POSITION: absolute; TOP: 347px; HEIGHT: 26px">
<input type="text" id="Edit17" name="Edit17" value="<?=$Edit17;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:151px;" disabled   tabindex="0"    />
</div>
<div id="Label19_outer" style="Z-INDEX: 41; LEFT: 468px; WIDTH: 72px; POSITION: absolute; TOP: 352px; HEIGHT: 23px">
<div id="Label19" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:72px;"   ><STRONG>E-mail.:</STRONG></div>
</div>
<div id="Edit18_outer" style="Z-INDEX: 42; LEFT: 529px; WIDTH: 279px; POSITION: absolute; TOP: 347px; HEIGHT: 26px">
<input type="text" id="Edit18" name="Edit18" value="<?=$Edit18;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:279px;" disabled   tabindex="0"    />
</div>
<div id="Label20_outer" style="Z-INDEX: 43; LEFT: 185px; WIDTH: 96px; POSITION: absolute; TOP: 377px; HEIGHT: 23px">
<div id="Label20" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:96px;"   ><STRONG>CPF.:</STRONG></div>
</div>
<div id="Edit19_outer" style="Z-INDEX: 44; LEFT: 305px; WIDTH: 175px; POSITION: absolute; TOP: 373px; HEIGHT: 26px">
<input type="text" id="Edit19" name="Edit19" value="<?=$Edit19;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:175px;" disabled   tabindex="0"    />
</div>
<div id="Label21_outer" style="Z-INDEX: 45; LEFT: 494px; WIDTH: 38px; POSITION: absolute; TOP: 377px; HEIGHT: 23px">
<div id="Label21" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:38px;"   ><STRONG>RG.:</STRONG></div>
</div>
<div id="Edit20_outer" style="Z-INDEX: 46; LEFT: 529px; WIDTH: 167px; POSITION: absolute; TOP: 373px; HEIGHT: 26px">
<input type="text" id="Edit20" name="Edit20" value="<?=$Edit20;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:167px;" disabled   tabindex="0"    />
</div>
<div id="Label22_outer" style="Z-INDEX: 47; LEFT: 702px; WIDTH: 38px; POSITION: absolute; TOP: 377px; HEIGHT: 23px">
<div id="Label22" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:38px;"   ><STRONG>Org.:</STRONG></div>
</div>
<div id="Edit21_outer" style="Z-INDEX: 48; LEFT: 737px; WIDTH: 71px; POSITION: absolute; TOP: 373px; HEIGHT: 26px">
<input type="text" id="Edit21" name="Edit21" value="<?=$Edit21;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:71px;" disabled   tabindex="0"    />
</div>
<div id="Label23_outer" style="Z-INDEX: 49; LEFT: 185px; WIDTH: 38px; POSITION: absolute; TOP: 402px; HEIGHT: 23px">
<div id="Label23" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:38px;"   ><STRONG>Obs.:</STRONG></div>
</div>
<div id="Edit22_outer" style="Z-INDEX: 50; LEFT: 305px; WIDTH: 503px; POSITION: absolute; TOP: 398px; HEIGHT: 58px">
<textarea id="Edit22" name="Edit22"  style=" font-family: Verdana; font-size: 14px;  height:57px;width:503px; color: #696969;" tabindex="0"    /><?=$Edit22;?></textarea>
</div>

</td></tr></table>
</form></body>
</html>
