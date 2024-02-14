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

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

// include("../logar.php");

include_once("funcoes2.php");

$deixar_1 = acesso("FORM_ASOC");

if ($deixar_1 == "NAO"){
	
    echo "  <html>
			<head>
			<title>ERRO AO CONECTAR</title>
            <link rel='shortcut icon' href='../imagens/favicon.ico'/>
			</head>
			<body>
						
			<style type=text/css>
			
			body { background-image: url('../$logo_sis');
                   background-attachment: fixed }
			
			<!--.cp {  font: bold 10px Arial; color: black}
			<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
			<!--.ld { font: bold 15px Arial; color: #000000}
			<!--.ct { FONT: 9px 'Arial Narrow'; COLOR: #000033}
			<!--.cn { FONT: 9px Arial; COLOR: black }
			<!--.bc { font: bold 22px Arial; color: #000000 }
			--></style> 
			
			</HEAD>
			

			</html>
			
			<br><br><br><br>
				
			<div align=center>
			
			<table align=center border='15' bgcolor='#FFF8DC'  bordercolor ='$color_bor'>
			<tr>
			<td align=center>
			     <font face=arial><b>*** <font color = #FF0000> ERRO ACESSO NÃO PERMITIDO !!!</font> ***<br>
				                     
									 <font face=arial>Usuário sem Permissão</b>
			<table align=center>
			<form method='POST' action='../avaleht.php?servletjs2=20$$20'>
			<td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
			</form>
			</table>
			</td>
			</tr>
			</table>
			</div>";
	        exit();
}	
 
?>

<script language='javascript'> 

function janelaSecundaria (URL){ 
   window.open(URL,"janela1","width=120,height=30,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 

</script> 

<html >
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<script src="script.js"></script>

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
<form style="margin-bottom: 0" id="Unit2" name="Unit2" method="post"  action="/edifilayout_soc.php">
<table  width="744"   style="height:488px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 5px; WIDTH: 724px; POSITION: absolute; TOP: 4px; HEIGHT: 469px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 692 - 16, 437 - 16);
  Shape1_Canvas.fillRect(16, 16, 692 - 16 + 1, 437 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?php echo $color_bor ?>");
  Shape1_Canvas.drawRect(16, 16, 692 - 16 + 1, 437 - 16 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 38px; WIDTH: 658px; POSITION: absolute; TOP: 37px; HEIGHT: 55px">
<script type="text/javascript">
  var Shape2_Canvas = new jsGraphics("Shape2_outer");
  Shape2_Canvas.setColor("#FFFFFF");
  Shape2_Canvas.fillRect(1, 1, 656 - 1, 53 - 1);
  Shape2_Canvas.fillRect(1, 1, 656 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.setStroke(1);
  Shape2_Canvas.setColor("<?php echo $color_bor ?>");
  Shape2_Canvas.drawRect(1, 1, 656 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 47px; WIDTH: 329px; POSITION: absolute; TOP: 50px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?php echo $color_bor ?>; background-color: #FFFFFF;height:32px;width:329px;"   ><STRONG>Cadastro de&nbsp;Edificios</STRONG></div>
</div>
<div id="Menssage_outer" style="Z-INDEX: 3; LEFT: 478px; WIDTH: 208px; POSITION: absolute; TOP: 55px; HEIGHT: 24px">
<div id="Menssage" style=" font-family: Verdana; font-size: 14px;  height:24px;width:208px;"  align="Center"   ><STRONG><?php echo $menssagens ?></STRONG></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 4; LEFT: 38px; WIDTH: 658px; POSITION: absolute; TOP: 93px; HEIGHT: 347px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 656 - 1, 345 - 1);
  Shape3_Canvas.fillRect(1, 1, 656 - 1 + 1, 345 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?php echo $color_bor ?>");
  Shape3_Canvas.drawRect(1, 1, 656 - 1 + 1, 345 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 5; LEFT: 45px; WIDTH: 64px; POSITION: absolute; TOP: 104px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:64px;"   ><STRONG>Codigo.:</STRONG></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 142px; WIDTH: 56px; POSITION: absolute; TOP: 100px; HEIGHT: 26px">
<input type="text" id="Edit1e" name="Edit1e" value="<?php echo $Edit1e ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:56px; background-color: #FFFFFF;" disabled   tabindex="1"    />
</div>
<div id="Label3_outer" style="Z-INDEX: 7; LEFT: 246px; WIDTH: 84px; POSITION: absolute; TOP: 104px; HEIGHT: 18px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:84px;"   ><STRONG>Atividade.:</STRONG></div>
</div>
<div id="Edit2_outer" style="Z-INDEX: 8; LEFT: 334px; WIDTH: 137px; POSITION: absolute; TOP: 100px; HEIGHT: 26px">
<input type="text" id="Edit2e" name="Edit2e" value="<?php echo $Edit2e ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:137px; background-color: #FFFFFF;" disabled   tabindex="2"    />
</div>
<div id="Label4_outer" style="Z-INDEX: 9; LEFT: 540px; WIDTH: 47px; POSITION: absolute; TOP: 104px; HEIGHT: 18px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:47px;"   ><STRONG>Data.:</STRONG></div>
</div>
<div id="Edit3_outer" style="Z-INDEX: 10; LEFT: 593px; WIDTH: 93px; POSITION: absolute; TOP: 100px; HEIGHT: 26px">
<input type="text" id="Edit3e" name="Edit3e" value="<?php echo $Edit3e ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:93px; background-color: #FFFFFF;" disabled  tabindex="3"    />
</div>
<div id="Label11_outer" style="Z-INDEX: 11; LEFT: 45px; WIDTH: 89px; POSITION: absolute; TOP: 130px; HEIGHT: 26px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Nome.:</STRONG>&nbsp;</div>
</div>
<div id="Edit5_outer" style="Z-INDEX: 12; LEFT: 334px; WIDTH: 352px; POSITION: absolute; TOP: 125px; HEIGHT: 26px">
<input type="text" id="Edit5e" name="Edit5e" value="<?php echo $Edit5e ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:352px; background-color: #FFFFFF;" disabled  tabindex="5"    />
</div>
<div id="Label12_outer" style="Z-INDEX: 13; LEFT: 45px; WIDTH: 89px; POSITION: absolute; TOP: 154px; HEIGHT: 26px">
<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Endereço.:</STRONG>&nbsp;</div>
</div>
<div id="Edit6_outer" style="Z-INDEX: 14; LEFT: 142px; WIDTH: 192px; POSITION: absolute; TOP: 149px; HEIGHT: 26px">
<input type="text" id="Edit6e" name="Edit6e" value="<?php echo $Edit6e ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:192px; background-color: #FFFFFF;" disabled   tabindex="6"    />
</div>
<div id="Edit7_outer" style="Z-INDEX: 15; LEFT: 334px; WIDTH: 352px; POSITION: absolute; TOP: 149px; HEIGHT: 26px">
<input type="text" id="Edit7e" name="Edit7e" value="<?php echo $Edit7e ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:352px; background-color: #FFFFFF;" disabled   tabindex="7"    />
</div>
<div id="Label13_outer" style="Z-INDEX: 16; LEFT: 45px; WIDTH: 89px; POSITION: absolute; TOP: 178px; HEIGHT: 26px">
<div id="Label13" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Numero.:</STRONG>&nbsp;</div>
</div>
<div id="Edit8_outer" style="Z-INDEX: 17; LEFT: 142px; WIDTH: 193px; POSITION: absolute; TOP: 173px; HEIGHT: 26px">
<input type="text" id="Edit8e" name="Edit8e" value="<?php echo $Edit8e ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px; background-color: #FFFFFF;" disabled  tabindex="8"    />
</div>
<div id="Label14_outer" style="Z-INDEX: 18; LEFT: 332px; WIDTH: 62px; POSITION: absolute; TOP: 202px; HEIGHT: 26px">
<div id="Label14" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:62px;"   ><STRONG>Bairro.:</STRONG>&nbsp;</div>
</div>
<div id="Edit10_outer" style="Z-INDEX: 19; LEFT: 396px; WIDTH: 180px; POSITION: absolute; TOP: 197px; HEIGHT: 26px">
<input type="text" id="Edit10e" name="Edit10e" value="<?php echo $Edit10e ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:180px; background-color: #FFFFFF;" disabled  tabindex="10"    />
</div>
<div id="Label15_outer" style="Z-INDEX: 20; LEFT: 45px; WIDTH: 89px; POSITION: absolute; TOP: 202px; HEIGHT: 26px">
<div id="Label15" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Cep.:</STRONG>&nbsp;</div>
</div>
<div id="Edit9_outer" style="Z-INDEX: 21; LEFT: 142px; WIDTH: 83px; POSITION: absolute; TOP: 197px; HEIGHT: 26px">
<input type="text" id="Edit9e" name="Edit9e" value="<?php echo $Edit9e ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:83px; background-color: #FFFFFF;" disabled  tabindex="9"    />
</div>
<div id="Label16_outer" style="Z-INDEX: 22; LEFT: 45px; WIDTH: 70px; POSITION: absolute; TOP: 227px; HEIGHT: 21px">
<div id="Label16" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:70px;"   ><STRONG>CNPJ.:</STRONG>&nbsp;</div>
</div>
<div id="Edit12_outer" style="Z-INDEX: 23; LEFT: 142px; WIDTH: 193px; POSITION: absolute; TOP: 222px; HEIGHT: 26px">
<input type="text" id="Edit12e" name="Edit12e" value="<?php echo $Edit12e ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px; background-color: #FFFFFF;" disabled   tabindex="12"    />
</div>
<div id="Label17_outer" style="Z-INDEX: 24; LEFT: 582px; WIDTH: 70px; POSITION: absolute; TOP: 203px; HEIGHT: 26px">
<div id="Label17" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:70px;"   ><STRONG>Estado.:</STRONG>&nbsp;</div>
</div>
<div id="Edit11_outer" style="Z-INDEX: 25; LEFT: 647px; WIDTH: 39px; POSITION: absolute; TOP: 198px; HEIGHT: 26px">
<input type="text" id="Edit11e" name="Edit11e" value="<?php echo $Edit11e ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:39px; background-color: #FFFFFF;" disabled  tabindex="11"    />
</div>
<div id="Label18_outer" style="Z-INDEX: 26; LEFT: 342px; WIDTH: 52px; POSITION: absolute; TOP: 227px; HEIGHT: 20px">
<div id="Label18" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:20px;width:52px;"   ><STRONG>Fone.:</STRONG>&nbsp;</div>
</div>
<div id="Edit13_outer" style="Z-INDEX: 27; LEFT: 396px; WIDTH: 153px; POSITION: absolute; TOP: 222px; HEIGHT: 26px">
<input type="text" id="Edit13e" name="Edit13e" value="<?php echo $Edit13e ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:153px; background-color: #FFFFFF;" disabled  tabindex="13"    />
</div>
<div id="Label22_outer" style="Z-INDEX: 28; LEFT: 45px; WIDTH: 107px; POSITION: absolute; TOP: 252px; HEIGHT: 26px">
<div id="Label22" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:107px;"   ><STRONG>Tp. Imovel.:</STRONG>&nbsp;</div>
</div>
<div id="Edit15_outer" style="Z-INDEX: 29; LEFT: 142px; WIDTH: 193px; POSITION: absolute; TOP: 247px; HEIGHT: 26px">
<input type="text" id="Edit15e" name="Edit15e" value="<?php echo $Edit15e ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px; background-color: #FFFFFF;" disabled   tabindex="15"    />
</div>
<div id="Label23_outer" style="Z-INDEX: 30; LEFT: 341px; WIDTH: 52px; POSITION: absolute; TOP: 252px; HEIGHT: 21px">
<div id="Label23" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:52px;"   ><STRONG>Zona.:</STRONG>&nbsp;</div>
</div>
<div id="Edit16_outer" style="Z-INDEX: 31; LEFT: 396px; WIDTH: 153px; POSITION: absolute; TOP: 247px; HEIGHT: 26px">
<input type="text" id="Edit16e" name="Edit16e" value="<?php echo $Edit16e ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:153px; background-color: #FFFFFF;" disabled  tabindex="16"    />
</div>
<div id="Label26_outer" style="Z-INDEX: 32; LEFT: 45px; WIDTH: 103px; POSITION: absolute; TOP: 301px; HEIGHT: 26px">
<div id="Label26" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:103px;"   ><STRONG>Cod. Adm.:</STRONG>&nbsp;</div>
</div>
<div id="Label68_outer" style="Z-INDEX: 33; LEFT: 44px; WIDTH: 103px; POSITION: absolute; TOP: 326px; HEIGHT: 24px">
<div id="Label68" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:103px;"   ><STRONG>Observação:</STRONG></div>
</div>
<div id="obs_outer" style="Z-INDEX: 34; LEFT: 142px; WIDTH: 544px; POSITION: absolute; TOP: 322px; HEIGHT: 110px">
<textarea id="obse" name="obse" style=" font-family: Verdana; font-size: 14px;  height:109px;width:544px; color: #696969; background-color: #FFFFFF;"  readonly tabindex="17"    wrap="virtual"><?php echo $Edit20e ?></textarea>
</div>
<div id="Label70_outer" style="Z-INDEX: 35; LEFT: 227px; WIDTH: 100px; POSITION: absolute; TOP: 203px; HEIGHT: 18px">
<div id="Label70" style=" font-family: Verdana; font-size: 13px; color: #0000FF; height:18px;width:100px;"   ><A HREF="http://correios.com.br/servicos/dnec/menuAction.do?Metodo=menuCep"  ><STRONG>Procurar Cep </STRONG></A></div>
</div>
<div id="Edit4_outer" style="Z-INDEX: 36; LEFT: 142px; WIDTH: 193px; POSITION: absolute; TOP: 124px; HEIGHT: 26px">
<input type="text" id="Edit4e" name="Edit4e" value="<?php echo $Edit4e ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px; background-color: #FFFFFF;" disabled   tabindex="4"    />
</div>
<div id="Label5_outer" style="Z-INDEX: 37; LEFT: 561px; WIDTH: 90px; POSITION: absolute; TOP: 228px; HEIGHT: 26px">
<div id="Label5" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:90px;"   ><STRONG>Nº Empre.:</STRONG>&nbsp;</div>
</div>
<div id="Edit14_outer" style="Z-INDEX: 38; LEFT: 647px; WIDTH: 39px; POSITION: absolute; TOP: 223px; HEIGHT: 26px">
<input type="text" id="Edit14e" name="Edit14e" value="<?php echo $Edit14e ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:39px; background-color: #FFFFFF;" disabled  tabindex="14"    />
</div>
<div id="Edit19_outer" style="Z-INDEX: 39; LEFT: 142px; WIDTH: 81px; POSITION: absolute; TOP: 297px; HEIGHT: 26px">
<input type="text" id="Edit19e" name="Edit19e" value="<?php echo $Edit19e ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:81px; background-color: #FFFFFF;" disabled  tabindex="19"    />
</div>
<div id="Label6_outer" style="Z-INDEX: 40; LEFT: 225px; WIDTH: 459px; POSITION: absolute; TOP: 301px; HEIGHT: 18px">
<div id="Label6" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:459px;"   ><STRONG><FONT color=#0000ff><?php echo $nome_adme ?></FONT></STRONG></div>
</div>
<div id="Label7_outer" style="Z-INDEX: 41; LEFT: 45px; WIDTH: 70px; POSITION: absolute; TOP: 277px; HEIGHT: 21px">
<div id="Label7" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:70px;"   ><STRONG>E-Mail.:</STRONG>&nbsp;</div>
</div>
<div id="Edit17_outer" style="Z-INDEX: 42; LEFT: 142px; WIDTH: 346px; POSITION: absolute; TOP: 272px; HEIGHT: 26px">
<input type="text" id="Edit17e" name="Edit17e" value="<?php echo $Edit17e ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:346px; background-color: #FFFFFF;" disabled  tabindex="17"    />
</div>
<div id="Label8_outer" style="Z-INDEX: 43; LEFT: 504px; WIDTH: 147px; POSITION: absolute; TOP: 281px; HEIGHT: 18px">
<div id="Label8" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:147px;"   ><STRONG>Guias por E-mail.:</STRONG></div>
</div>
<div id="Edit18_outer" style="Z-INDEX: 44; LEFT: 647px; WIDTH: 39px; POSITION: absolute; TOP: 274px; HEIGHT: 26px">
<input type="text" id="Edit18e" name="Edit18e" value="<?php echo $Edit18e ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:39px; background-color: #FFFFFF;" disabled  tabindex="18"    />
</div>
<div id="Image1_outer" style="Z-INDEX: 45; LEFT: 560px; WIDTH: 56px; POSITION: absolute; TOP: 251px; HEIGHT: 19px">
<div id="Image1_container" style=" width: 56;  height: 19; overflow: hidden;" ><a href="conf.php?Cod_Edif=<?php echo $Edit1e ?>"><img id="Image1" src="../imagens/conf1.PNG"  width="56"  height="19"  border="0"       /></a></div>
</div>
<div id="Image2_outer" style="Z-INDEX: 46; LEFT: 623px; WIDTH: 56px; POSITION: absolute; TOP: 250px; HEIGHT: 21px">
<div id="Image2_container" style=" width: 56;  height: 21; overflow: hidden;" ><a href="sind.php?Cod_Edif=<?php echo $Edit1e ?>"><img id="Image2" src="../imagens/sind1.PNG"  width="56"  height="21"  border="0"       /></a></div>
</div>
</td></tr></table>
</form></body>
</html>
