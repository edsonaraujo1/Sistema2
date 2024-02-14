<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Testa Codigo de Barras
 Criado em Data.....: 19/12/2008
 Ultima Atualização : 19/12/2008 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/
include("../config.php");
// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

$nome3 = $_SESSION["nome_log"];

include_once("../logar.php");

include("menu.php");

include("vaurls.php");


$deixar = acesso_url("FORM_CONFIG");

if ($deixar == "SIM"){

// Descriptografar arquivo config.ini


$Edit1  = $website;
$Edit2  = $cpfwebsite;
$Edit3  = $atuali_za;
$Edit4  = $criado_za;
$Edit5  = $logo_sis; 
$Edit6  = $Titulo;
$Edit7  = $cnpj_sis;
$Edit8  = $logo1_sis;
$Edit9  = $logo2_sis;
$Edit10 = $color_bor;
$Edit11 = $versao_1;
$Edit12 = $color_menu;

$Edit13 = $smtp_2;
$Edit14 = $email_2;
$Edit15 = $sen_email2;
$Edit16 = $email_ret2;

include("funcoes2.php");

$mensagens = "* * * Visualizar * * *";

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
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>

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
}
//-->
</script>


<?
include("help.php");
?>

<style>

.normal {
	
	background-color: white;
}
.anormal {
		background-color: Lavender;
}

</style>


<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; " onkeydown="javascript:if (event.KeyCode==13) event.KeyCode=9; javascript:document.onkeydown = keyCatcher();"  >
<form style="margin-bottom: 0" id="Unit2" name="Unit2" method="post"  action="salva_config.php">
<table  width="936"   style="height:528px"  border="0" cellpadding="0" cellspacing="0"   align="Center"  ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 128px; WIDTH: 760px; POSITION: absolute; TOP: 44px; HEIGHT: 461px; ">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFFF");
  Shape1_Canvas.fillRect(16, 16, 728 - 16, 540 - 16);
  Shape1_Canvas.fillRect(16, 16, 728 - 16 + 1, 540 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(16, 16, 728 - 16 + 1, 540 - 16 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 161px; WIDTH: 694px; POSITION: absolute; TOP: 77px; HEIGHT: 55px; background-color: #FFFFFF; ">
<script type="text/javascript">
  var Shape2_Canvas = new jsGraphics("Shape2_outer");
  Shape2_Canvas.setColor("#FFFFFF");
  Shape2_Canvas.fillRect(1, 1, 692 - 1, 53 - 1);
  Shape2_Canvas.fillRect(1, 1, 692 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.setStroke(1);
  Shape2_Canvas.setColor("<?=$color_bor;?>");
  Shape2_Canvas.drawRect(1, 1, 692 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 178px; WIDTH: 518px; POSITION: absolute; TOP: 86px; HEIGHT: 32px; background-color: #FFFFFF; ">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?=$color_bor;?>; background-color: #FFFFFF; height:32px;width:518px;"   ><STRONG>Configuracoes do Sistema</STRONG></div>
</div>
<div id="Menssage_outer" style="Z-INDEX: 3; LEFT: 666px; WIDTH: 174px; POSITION: absolute; TOP: 95px; HEIGHT: 24px; background-color: #FFFFFF; ">
<div id="Menssage" style=" font-family: Verdana; font-size: 14px;  height:24px;width:174px; background-color: #FFFFFF; "  align="Center"   ><STRONG><?=$mensagens;?></STRONG></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 4; LEFT: 161px; WIDTH: 694px; POSITION: absolute; TOP: 133px; HEIGHT: 339px; background-color: #FFFFFF; ">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 692 - 1, 449 - 1);
  Shape3_Canvas.fillRect(1, 1, 692 - 1 + 1, 449 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 692 - 1 + 1, 449 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 5; LEFT: 171px; WIDTH: 141px; POSITION: absolute; TOP: 144px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:141px;"   ><STRONG>Site Empresa.:</STRONG></div>
</div>
<div id="Label11_outer" style="Z-INDEX: 6; LEFT: 171px; WIDTH: 141px; POSITION: absolute; TOP: 171px; HEIGHT: 26px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:141px;"   ><STRONG>Site Receita.:</STRONG>&nbsp;</div>
</div>
<div id="Label12_outer" style="Z-INDEX: 7; LEFT: 171px; WIDTH: 149px; POSITION: absolute; TOP: 195px; HEIGHT: 26px">
<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:149px;"   ><STRONG>Ultima Alteracao.:</STRONG>&nbsp;</div>
</div>
<div id="Edit3_outer" style="Z-INDEX: 8; LEFT: 311px; WIDTH: 165px; POSITION: absolute; TOP: 190px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?=$Edit3;?>" onfocus="this.className='anormal'" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:165px;"    tabindex="5"    />
</div>
<div id="Edit2_outer" style="Z-INDEX: 9; LEFT: 311px; WIDTH: 441px; POSITION: absolute; TOP: 165px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="<?=$Edit2;?>" onfocus="this.className='anormal'" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:441px;"    tabindex="3"    />
</div>
<div id="Edit1_outer" style="Z-INDEX: 10; LEFT: 311px; WIDTH: 442px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" onfocus="this.className='anormal'" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:442px;" tabindex="0"    />
</div>
<div id="Label3_outer" style="Z-INDEX: 11; LEFT: 171px; WIDTH: 149px; POSITION: absolute; TOP: 220px; HEIGHT: 26px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:149px;"   ><STRONG>Data Criacao.:</STRONG>&nbsp;</div>
</div>
<div id="Edit4_outer" style="Z-INDEX: 12; LEFT: 311px; WIDTH: 165px; POSITION: absolute; TOP: 215px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="<?=$Edit4;?>" onfocus="this.className='anormal'" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:165px;"  readonly  tabindex="5"    />
</div>
<div id="Label4_outer" style="Z-INDEX: 13; LEFT: 171px; WIDTH: 149px; POSITION: absolute; TOP: 245px; HEIGHT: 26px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:149px;"   ><STRONG>Tela de Fundo.:</STRONG>&nbsp;</div>
</div>
<div id="Edit5_outer" style="Z-INDEX: 14; LEFT: 311px; WIDTH: 441px; POSITION: absolute; TOP: 240px; HEIGHT: 26px">
<input type="text" id="Edit5" name="Edit5" value="<?=$Edit5;?>" onfocus="this.className='anormal'" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:441px;"    tabindex="5"    />
</div>
<div id="Label5_outer" style="Z-INDEX: 15; LEFT: 171px; WIDTH: 149px; POSITION: absolute; TOP: 271px; HEIGHT: 26px">
<div id="Label5" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:149px;"   ><STRONG>Nome Empresa.:</STRONG>&nbsp;</div>
</div>
<div id="Edit6_outer" style="Z-INDEX: 16; LEFT: 311px; WIDTH: 441px; POSITION: absolute; TOP: 266px; HEIGHT: 26px">
<input type="text" id="Edit6" name="Edit6" value="<?=$Edit6;?>" onfocus="this.className='anormal'" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:441px;"    tabindex="5"    />
</div>
<div id="Label6_outer" style="Z-INDEX: 17; LEFT: 171px; WIDTH: 149px; POSITION: absolute; TOP: 297px; HEIGHT: 26px">
<div id="Label6" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:149px;"   ><STRONG>CNPJ.:</STRONG>&nbsp;</div>
</div>
<div id="Edit7_outer" style="Z-INDEX: 18; LEFT: 311px; WIDTH: 249px; POSITION: absolute; TOP: 292px; HEIGHT: 26px">
<input type="text" id="Edit7" name="Edit7" value="<?=$Edit7;?>" onfocus="this.className='anormal'" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:170px;"    tabindex="5"    />
</div>
<div id="Label7_outer" style="Z-INDEX: 19; LEFT: 171px; WIDTH: 149px; POSITION: absolute; TOP: 323px; HEIGHT: 26px">
<div id="Label7" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:149px;"   ><STRONG>Logo Empresa.:</STRONG>&nbsp;</div>
</div>
<div id="Edit8_outer" style="Z-INDEX: 20; LEFT: 311px; WIDTH: 441px; POSITION: absolute; TOP: 318px; HEIGHT: 26px">
<input type="text" id="Edit8" name="Edit8" value="<?=$Edit8;?>" onfocus="this.className='anormal'" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:441px;"    tabindex="5"    />
</div>
<div id="Label8_outer" style="Z-INDEX: 21; LEFT: 171px; WIDTH: 149px; POSITION: absolute; TOP: 349px; HEIGHT: 26px">
<div id="Label8" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:149px;"   ><STRONG>Imagen Oficio.:</STRONG>&nbsp;</div>
</div>
<div id="Edit9_outer" style="Z-INDEX: 22; LEFT: 311px; WIDTH: 441px; POSITION: absolute; TOP: 344px; HEIGHT: 26px">
<input type="text" id="Edit9" name="Edit9" value="<?=$Edit9;?>" onfocus="this.className='anormal'" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:441px;"    tabindex="5"    />
</div>
<div id="Label9_outer" style="Z-INDEX: 23; LEFT: 171px; WIDTH: 149px; POSITION: absolute; TOP: 375px; HEIGHT: 26px">
<div id="Label9" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:149px;"   ><STRONG>Cor Bordas.:</STRONG>&nbsp;</div>
</div>
<div id="Edit10_outer" style="Z-INDEX: 24; LEFT: 311px; WIDTH: 165px; POSITION: absolute; TOP: 370px; HEIGHT: 26px">
<select type="text" id="Edit10" name="Edit10" value="<?=$Edit10;?>" onfocus="this.className='anormal'" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:165px;"    tabindex="5"    />


<option style='background-color: <?=$Edit10;?>; color: rgb(0,0,0)'><font color='<?=$Edit10;?>'></font><?=$Edit10;?></option>
<option style='background-color: #5A9CB1; color: rgb(0,0,0)'><font color='#5A9CB1'></font>#5A9CB1</option>
<option style='background-color: #E6E6FA; color: rgb(0,0,0)'><font color='#E6E6FA'></font>#E6E6FA</option>
<option style='background-color: #FFA54F; color: rgb(0,0,0)'><font color='#FFA54F'></font>#FFA54F</option>
<option style='background-color: #EE82EE; color: rgb(0,0,0)'><font color='#EE82EE'></font>#EE82EE</option>
<option style='background-color: #CAE1FF; color: rgb(0,0,0)'><font color='#CAE1FF'></font>#CAE1FF</option>
<option style='background-color: #FF4040; color: rgb(0,0,0)'><font color='#FF4040'></font>#FF4040</option>
<option style='background-color: #FFFF00; color: rgb(0,0,0)'><font color='#FFFF00'></font>#FFFF00</option>
<option style='background-color: #66CD00; color: rgb(0,0,0)'><font color='#66CD00'></font>#66CD00</option>
<option style='background-color: #000000; color: rgb(0,0,0)'><font color='#000000'></font>#000000</option>
<option style='background-color: #0000FF; color: rgb(0,0,0)'><font color='#0000FF'></font>#0000FF</option>
<option style='background-color: #CFCFCF; color: rgb(0,0,0)'><font color='#CFCFCF'></font>#CFCFCF</option>
<option style='background-color: #B6B6B6; color: rgb(0,0,0)'><font color='#B6B6B6'></font>#B6B6B6</option>

</select>
</div>



<div id="Label12_outer" style="Z-INDEX: 25; LEFT: 171px; WIDTH: 149px; POSITION: absolute; TOP: 400px; HEIGHT: 26px">
<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:149px;"   ><STRONG>Cor Menu.:</STRONG>&nbsp;</div>
</div>
<div id="Edit12_outer" style="Z-INDEX: 26; LEFT: 311px; WIDTH: 165px; POSITION: absolute; TOP: 392px; HEIGHT: 26px">
<select type="text" id="Edit12" name="Edit12" value="<?=$Edit12;?>" onfocus="this.className='anormal'" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:165px;"    tabindex="5"    />


<option style='background-color: <?=$Edit12;?>; color: rgb(0,0,0)'><font color='<?=$Edit12;?>'></font><?=$Edit12;?></option>
<option style='background-color: #99CCFF; color: rgb(0,0,0)'><font color='#99CCFF'></font>#99CCFF</option>
<option style='background-color: #E6E6FA; color: rgb(0,0,0)'><font color='#E6E6FA'></font>#E6E6FA</option>
<option style='background-color: #FFA54F; color: rgb(0,0,0)'><font color='#FFA54F'></font>#FFA54F</option>
<option style='background-color: #EE82EE; color: rgb(0,0,0)'><font color='#EE82EE'></font>#EE82EE</option>
<option style='background-color: #CAE1FF; color: rgb(0,0,0)'><font color='#CAE1FF'></font>#CAE1FF</option>
<option style='background-color: #FF4040; color: rgb(0,0,0)'><font color='#FF4040'></font>#FF4040</option>
<option style='background-color: #FFFF00; color: rgb(0,0,0)'><font color='#FFFF00'></font>#FFFF00</option>
<option style='background-color: #66CD00; color: rgb(0,0,0)'><font color='#66CD00'></font>#66CD00</option>
<option style='background-color: #000000; color: rgb(0,0,0)'><font color='#000000'></font>#000000</option>
<option style='background-color: #0000FF; color: rgb(0,0,0)'><font color='#0000FF'></font>#0000FF</option>
<option style='background-color: #CFCFCF; color: rgb(0,0,0)'><font color='#CFCFCF'></font>#CFCFCF</option>


</select>
</div>

<div id="Label10_outer" style="Z-INDEX: 25; LEFT: 171px; WIDTH: 149px; POSITION: absolute; TOP: 423px; HEIGHT: 26px">
<div id="Label10" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:149px;"   ><STRONG>Versao.:</STRONG>&nbsp;</div>
</div>
<div id="Edit11_outer" style="Z-INDEX: 26; LEFT: 311px; WIDTH: 165px; POSITION: absolute; TOP: 414px; HEIGHT: 26px">
<input type="text" id="Edit11" name="Edit11" value="<?=$Edit11;?>" onfocus="this.className='anormal'" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:165px;"    tabindex="5"    />
</div>


<div id="Button1_outer" style="Z-INDEX: 27; LEFT: 753px; WIDTH: 80px; POSITION: absolute; TOP: 241px; HEIGHT: 24px">
<input type="submit" id="Button1" name="Button1" value="Procurar"   style=" font-family: Verdana; font-size: 14px;  height:24px;width:80px;"   tabindex="0"    />
</div>
<div id="Button2_outer" style="Z-INDEX: 28; LEFT: 753px; WIDTH: 80px; POSITION: absolute; TOP: 318px; HEIGHT: 24px">
<input type="submit" id="Button2" name="Button2" value="Procurar"  style=" font-family: Verdana; font-size: 14px;  height:24px;width:80px;"   tabindex="0"    />
</div>


<div id="Button3_outer" style="Z-INDEX: 29; LEFT: 753px; WIDTH: 80px; POSITION: absolute; TOP: 345px; HEIGHT: 24px">
<input type="submit" id="Button3" name="Button3" value="Procurar"  style=" font-family: Verdana; font-size: 14px;  height:24px;width:80px;"   tabindex="0"    />
</div>
<div id="Button4_outer" style="Z-INDEX: 30; LEFT: 479px; WIDTH: 39px; POSITION: absolute; TOP: 372px; HEIGHT: 25px">
<input type="submit" id="Button4" name="Button4" value="Cor"  style=" font-family: Verdana; font-size: 10px; font-weight: bold; height:25px;width:39px;"   tabindex="0"    />
</div>


<div id="Label10_outer" style="Z-INDEX: 25; LEFT: 171px; WIDTH: 149px; POSITION: absolute; TOP: 449px; HEIGHT: 26px">
<div id="Label10" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:149px;"   ><STRONG>SMTP.:</STRONG>&nbsp;</div>
</div>
<div id="Edit11_outer" style="Z-INDEX: 26; LEFT: 311px; WIDTH: 165px; POSITION: absolute; TOP: 439px; HEIGHT: 26px">
<input type="text" id="Edit13" name="Edit13" value="<?=$Edit13;?>" onfocus="this.className='anormal'" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:441px;"    tabindex="6"    />
</div>


<div id="Label10_outer" style="Z-INDEX: 25; LEFT: 171px; WIDTH: 149px; POSITION: absolute; TOP: 472px; HEIGHT: 26px">
<div id="Label10" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:149px;"   ><STRONG>E-mail.:</STRONG>&nbsp;</div>
</div>
<div id="Edit11_outer" style="Z-INDEX: 26; LEFT: 311px; WIDTH: 165px; POSITION: absolute; TOP: 464px; HEIGHT: 26px">
<input type="text" id="Edit14" name="Edit14" value="<?=$Edit14;?>" onfocus="this.className='anormal'" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:441px;"    tabindex="5"    />
</div>


<div id="Label10_outer" style="Z-INDEX: 25; LEFT: 171px; WIDTH: 149px; POSITION: absolute; TOP: 496px; HEIGHT: 26px">
<div id="Label10" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:149px;"   ><STRONG>Senha e-mail.:</STRONG>&nbsp;</div>
</div>
<div id="Edit11_outer" style="Z-INDEX: 26; LEFT: 311px; WIDTH: 165px; POSITION: absolute; TOP: 490px; HEIGHT: 26px">
<input type="text" id="Edit15" name="Edit15" value="<?=$Edit15;?>" onfocus="this.className='anormal'" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:341px;"    tabindex="5"    />
</div>


<div id="Label10_outer" style="Z-INDEX: 25; LEFT: 171px; WIDTH: 149px; POSITION: absolute; TOP: 520px; HEIGHT: 26px">
<div id="Label10" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:149px;"   ><STRONG>e-mail Ret.:</STRONG>&nbsp;</div>
</div>
<div id="Edit11_outer" style="Z-INDEX: 26; LEFT: 311px; WIDTH: 165px; POSITION: absolute; TOP: 516px; HEIGHT: 26px">
<input type="text" id="Edit16" name="Edit16" value="<?=$Edit16;?>" onfocus="this.className='anormal'" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:341px;"    tabindex="5"    />
</div>


<div id="Image1_outer" style="Z-INDEX: 31; LEFT: 183px; WIDTH: 92px; POSITION: absolute; TOP: 550px; HEIGHT: 22px">
<input type=image name="guias" src="../imagens/botaoazul10.PNG">
</div>
<div id="Image2_outer" style="Z-INDEX: 32; LEFT: 282px; WIDTH: 92px; POSITION: absolute; TOP: 550px; HEIGHT: 22px">
<div id="Image2_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="../avaleht.php?servletjs2=20$$20" ><img id="Image2" src="../imagens/botaoazul9.PNG"  width="92"  height="22"  border="0"       /></a></div>
</div>
</td></tr></table>
</form></body>
</html>
<?
}else{
	
include("enaaurlnp.php");
	
}
?>
