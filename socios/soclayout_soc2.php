<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Layout Cadastro Socios Incluir Retorno
 Criado em Data.....: 07/12/2007
 Ultima Atualiza��o : 21/01/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

// include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include_once('../sql_injection.php');

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
			     <font face=arial><b>*** <font color = #FF0000> ERRO ACESSO N�O PERMITIDO !!!</font> ***<br>
				                     
									 <font face=arial>Usu�rio sem Permiss�o</b>
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

$del_2 = $cam_foto;
$ext2  = '.bmp';
$cami2 = Trim($del_2.$Edit1.$Edit2.$ext2);

$cami2 = '../imagens/fotos/Branco.bmp'; 

// Abre Conex�o com o MySql
include("../conexao.php");
$link = @mysql_connect($host,$user,$pass);
@mysql_select_db($db);

// Abre Tabela Tenporaria

$consulta0  = "SELECT * FROM $nome3 WHERE Nome1 = '$nome3'";
	
$resultado0 = @mysql_query($consulta0);

$row0 = @mysql_fetch_array($resultado0);

$Edit1      = @$row0["Edit1"];
$Edit2		= @$row0["Edit2"];
$Edit3		= @$row0["Edit3"];
$Edit4		= @$row0["Edit4"];
$Edit5		= @$row0["Edit5"];
$Edit6		= @$row0["Edit6"];
$Edit7		= @$row0["Edit7"];
$Edit8		= @$row0["Edit8"];
$Edit9		= @$row0["Edit9"];
$Edit10	    = @$row0["Edit10"];
$Edit11	    = @$row0["Edit11"];
$Edit12	    = @$row0["Edit12"];
$Edit13	    = @$row0["Edit13"];
$Edit14	    = @$row0["Edit14"];
$Edit15	    = @$row0["Edit15"];
$Edit16	    = @$row0["Edit16"];
$Edit17	    = @$row0["Edit17"];
$Edit18	    = @$row0["Edit18"];
$Edit19	    = @$row0["Edit19"];
$Edit20	    = @$row0["Edit20"];
$Edit21	    = @$row0["Edit21"];
$Edit22	    = @$row0["Edit22"];
$Edit23	    = @$row0["Edit23"];
$Edit24	    = @$row0["Edit24"];
$Edit25	    = @$row0["Edit25"];
$Edit26	    = @$row0["Edit26"];
$Edit27	    = @$row0["Edit27"];
$Edit28	    = @$row0["Edit28"];
$Edit30	    = @$row0["Edit30"];
$Edit31     = @$row0["Edit31"];
$Edit32	    = @$row0["Edit32"];
$Edit33	    = @$row0["Edit33"];
$Edit34	    = @$row0["Edit34"];
$Edit35	    = @$row0["Edit35"];
$Edit36	    = @$row0["Edit36"];
$Edit37	    = @$row0["Edit37"];
$Edit38	    = @$row0["Edit38"];
$Edit39	    = @$row0["Edit39"];
$Edit40	    = @$row0["Edit40"];
$Edit41	    = @$row0["Edit41"];
$Edit42	    = @$row0["Edit42"];
$Edit43	    = @$row0["Edit43"];
$Edit44	    = @$row0["Edit44"];
$Edit45	    = @$row0["Edit45"];
$Edit46	    = @$row0["Edit46"];
$Edit47	    = @$row0["Edit47"];
$Edit48	    = @$row0["Edit48"];
$Edit49	    = @$row0["Edit49"];
$Edit50	    = @$row0["Edit50"];
$Edit51	    = @$row0["Edit51"];
$Edit52	    = @$row0["Edit52"];
$Edit53	    = @$row0["Edit53"];
$Edit54	    = @$row0["Edit54"];
$Edit55	    = @$row0["Edit55"];
$Edit56	    = @$row0["Edit56"];
$Edit57	    = @$row0["Edit57"];
$Edit58	    = @$row0["Edit58"];
$Edit59	    = @$row0["Edit59"];
$Edit60	    = @$row0["Edit60"];
$Edit61	    = @$row0["Edit61"];
$Edit62	    = @$row0["Edit62"];
$Edit63	    = @$row0["Edit63"];
$Edit64	    = @$row0["Edit64"];
$Edit65	    = @$row0["Edit65"];
$Edit66	    = @$row0["Edit66"];
$Edit67	    = @$row0["Edit67"];
$Edit68	    = @$row0["Edit68"];
$Edit69	    = @$row0["Edit69"];
$Edit70	    = @$row0["memo1"];
$alerta_1   = @$row0["mensage1"];
$categ_1    = @$row0["mensage2"];
$nome_do_edif = @$row0["mensage3"];
$nome_cad_si  = @$row0["mensage4"];

// Abrir tabela Senha

$tabela_1 = strtoupper('socios');

$consulta3 = "SELECT * FROM permissoes WHERE login = '". anti_sql_injection($nome3) ."' and tabela = '". anti_sql_injection($tabela_1) ."'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];

?>
<html>
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; " onload="foco();">
<form style="margin-bottom: 0" id="Form1" name="Form1" method="post"  action="socinsert.php">
<table  width="794"   style="height:188px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 91px; WIDTH: 819px; POSITION: absolute; TOP: 45px; HEIGHT: 55px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 787 - 16, 884 - 16);
  Shape1_Canvas.fillRect(16, 16, 787 - 16 + 1, 884 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?php echo $color_bor ?>");
  Shape1_Canvas.drawRect(16, 16, 787 - 16 + 1, 884 - 16 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 124px; WIDTH: 752px; POSITION: absolute; TOP: 79px; HEIGHT: 55px">
<script type="text/javascript">
  var Shape2_Canvas = new jsGraphics("Shape2_outer");
  Shape2_Canvas.setColor("#FFFFFF");
  Shape2_Canvas.fillRect(1, 1, 750 - 1, 53 - 1);
  Shape2_Canvas.fillRect(1, 1, 750 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.setStroke(1);
  Shape2_Canvas.setColor("<?php echo $color_bor ?>");
  Shape2_Canvas.drawRect(1, 1, 750 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 135px; WIDTH: 283px; POSITION: absolute; TOP: 90px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?php echo $color_bor ?>; background-color: #FFFFFF;height:32px;width:283px;"   ><strong>Cadastro de&nbsp;Socios</strong></div>
</div>
<div id="Menssage_outer" style="Z-INDEX: 3; LEFT: 613px; WIDTH: 208px; POSITION: absolute; TOP: 95px; HEIGHT: 24px">
<div id="Menssage" style=" font-family: Verdana; font-size: 14px;  height:24px;width:208px;"  align="Center"   ><strong><?php echo $menssagens ?> </strong></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 4; LEFT: 124px; WIDTH: 752px; POSITION: absolute; TOP: 136px; HEIGHT: 792px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 750 - 1, 790 - 1);
  Shape3_Canvas.fillRect(1, 1, 750 - 1 + 1, 790 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?php echo $color_bor ?>");
  Shape3_Canvas.drawRect(1, 1, 750 - 1 + 1, 790 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 5; LEFT: 131px; WIDTH: 64px; POSITION: absolute; TOP: 155px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:64px;"   ><STRONG>Codigo</STRONG></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 225px; WIDTH: 56px; POSITION: absolute; TOP: 151px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?php echo $Edit1 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:56px;" readonly="readonly" tabindex="1" maxlength="11"  />
</div>
<div id="Edit2_outer" style="Z-INDEX: 7; LEFT: 283px; WIDTH: 33px; POSITION: absolute; TOP: 151px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="<?php echo $Edit2 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:33px;" onchange="Salva2(this.value)"  onFocus="nextfield ='Edit3';" style="text-transform: uppercase;"   tabindex="2"  maxlength="1"  />
</div>
<div id="Label3_outer" style="Z-INDEX: 8; LEFT: 384px; WIDTH: 32px; POSITION: absolute; TOP: 155px; HEIGHT: 18px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:32px;"   ><STRONG>RG:.</STRONG></div>
</div>

<div id="Edit3_outer" style="Z-INDEX: 9; LEFT: 417px; WIDTH: 137px; POSITION: absolute; TOP: 151px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?php echo $Edit3 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:137px;" onchange="Salva3(this.value)"  onFocus="nextfield ='Edit4';"  tabindex="14" maxlength="14"    />
</div>



<div id="Label4_outer" style="Z-INDEX: 10; LEFT: 592px; WIDTH: 47px; POSITION: absolute; TOP: 155px; HEIGHT: 18px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:47px;"   ><STRONG>CPF:.</STRONG></div>
</div>
<div id="Edit4_outer" style="Z-INDEX: 11; LEFT: 634px; WIDTH: 137px; POSITION: absolute; TOP: 151px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="<?php echo $Edit4 ?>"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:137px;"  onkeypress="return txtBoxFormat(document.Form1, 'Edit4', '999.999.999-99', event);"  onchange="Salva4(this.value)"  onFocus="nextfield ='Edit6';"  tabindex="4" maxlength="14"   />
</div>
<div id="Label5_outer" style="Z-INDEX: 12; LEFT: 131px; WIDTH: 96px; POSITION: absolute; TOP: 179px; HEIGHT: 26px">
<div id="Label5" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:96px;"   > <STRONG>Data Insc.:</STRONG> </div>
</div>
<div id="Edit5_outer" style="Z-INDEX: 13; LEFT: 225px; WIDTH: 91px; POSITION: absolute; TOP: 175px; HEIGHT: 26px">
<input type="text" id="Edit5" name="Edit5" value="<?php echo $Edit5 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;"  readonly="readonly"  tabindex="5"  maxlength="10"  />
</div>
<div id="Label6_outer" style="Z-INDEX: 14; LEFT: 320px; WIDTH: 96px; POSITION: absolute; TOP: 179px; HEIGHT: 26px">
<div id="Label6" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:96px;"   > <STRONG>Data Saida.:</STRONG> </div>
</div>
<div id="Edit6_outer" style="Z-INDEX: 15; LEFT: 417px; WIDTH: 91px; POSITION: absolute; TOP: 175px; HEIGHT: 26px">
<input type="text" id="Edit6" name="Edit6" value="<?php echo $Edit6 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;" onkeypress="return txtBoxFormat(document.Form1, 'Edit6', '99/99/9999', event);" onchange="Salva6(this.value)"  onFocus="nextfield ='Edit7';" style="text-transform: uppercase;"  tabindex="6"  maxlength="10"  />
</div>
<div id="Label7_outer" style="Z-INDEX: 16; LEFT: 515px; WIDTH: 128px; POSITION: absolute; TOP: 179px; HEIGHT: 26px">
<div id="Label7" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:128px;"   > <STRONG>Data Retorno.:</STRONG> </div>
</div>
<div id="Edit7_outer" style="Z-INDEX: 17; LEFT: 634px; WIDTH: 91px; POSITION: absolute; TOP: 175px; HEIGHT: 26px">
<input type="text" id="Edit7" name="Edit7" value="<?php echo $Edit7 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;" onkeypress="return txtBoxFormat(document.Form1, 'Edit7', '99/99/9999', event);" onchange="Salva7(this.value)"  onFocus="nextfield ='Edit8';" style="text-transform: uppercase;"  tabindex="7"  maxlength="10"  />
</div>
<div id="Image1_outer" style="Z-INDEX: 18; LEFT: 749px; WIDTH: 112px; POSITION: absolute; TOP: 179px; HEIGHT: 146px">
<div id="Image1_container" style=" width: 112;  height: 146; overflow: hidden;" ><img id="Image1" src='<?php echo $cami2 ?>'  width="107"  height="137"  border="1"  style=" border-color: #000000 "       /></div>
</div>

<div id="Label71_outer" style="Z-INDEX: 150; LEFT: 387px; WIDTH: 359px; POSITION: absolute; TOP: 203px; HEIGHT: 20px">
<div id="Label71" style=" font-family: Verdana; font-size: 14px; color: #0000FF;font-weight: normal; height:20px;width:359px;"   ><STRONG><FONT color=#ff0000><?php echo $alerta_1 ?></FONT></STRONG>&nbsp;</div>
</div>


<div id="Label8_outer" style="Z-INDEX: 19; LEFT: 131px; WIDTH: 96px; POSITION: absolute; TOP: 203px; HEIGHT: 26px">
<div id="Label8" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:96px;"   > <STRONG>Sede.:</STRONG> </div>
</div>
<div id="Edit8_outer" style="Z-INDEX: 20; LEFT: 225px; WIDTH: 159px; POSITION: absolute; TOP: 201px; HEIGHT: 26px">
<select id="Edit8" name="Edit8" value="<?php echo $Edit8 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:159px;"  onchange="Salva8(this.value)"  onFocus="nextfield ='Edit9';"    style="text-transform: uppercase;"  tabindex="8"  maxlength="20"  />

<?php

if (!empty($Edit8))
{
?>	
	<option value="<?php echo $Edit8 ?>"> <?php echo $Edit8 ?> </option>
            <option value="SETE DE ABRIL">  SETE DE ABRIL </option>
            <option value="SANTO AMARO"> SANTO AMARO </option>
            <option value="SANTANA"> SANTANA </option>
            <option value="TATUAPE"> TATUAPE </option>
<?php	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="SETE DE ABRIL">  SETE DE ABRIL </option>
            <option value="SANTO AMARO"> SANTO AMARO </option>
            <option value="SANTANA"> SANTANA </option>
            <option value="TATUAPE"> TATUAPE </option>
<?php            
 }
?>

</select>

</div>
<div id="Label9_outer" style="Z-INDEX: 21; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 228px; HEIGHT: 26px">
<div id="Label9" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Categoria.:</STRONG>&nbsp;</div>
</div>
<div id="Edit9_outer" style="Z-INDEX: 22; LEFT: 225px; WIDTH: 28px; POSITION: absolute; TOP: 223px; HEIGHT: 26px">
<input type="text" id="Edit9" name="Edit9" value="<?php echo $Edit9 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:28px;"  onchange="Salva9(this.value)" onFocus="nextfield ='Edit10';" style="text-transform: uppercase;"  tabindex="9"  maxlength="1"  />
</div>
<div id="Label10_outer" style="Z-INDEX: 23; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 252px; HEIGHT: 26px">
<div id="Label10" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Cod. Edif.:</STRONG>&nbsp;</div>
</div>
<div id="Edit10_outer" style="Z-INDEX: 24; LEFT: 225px; WIDTH: 55px; POSITION: absolute; TOP: 247px; HEIGHT: 26px">
<input type="text" id="Edit10" name="Edit10" value="<?php echo $Edit10 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:55px;"  onchange="Salva10(this.value)"  onFocus="nextfield ='Edit11';" style="text-transform: uppercase;" tabindex="10" maxlength="11"    />
</div>
<div id="Label11_outer" style="Z-INDEX: 25; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 276px; HEIGHT: 26px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Nome.:</STRONG>&nbsp;</div>
</div>
<div id="Edit11_outer" style="Z-INDEX: 26; LEFT: 225px; WIDTH: 423px; POSITION: absolute; TOP: 271px; HEIGHT: 26px">
<input type="text" id="Edit11" name="Edit11" value="<?php echo $Edit11 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:423px;"  onchange="Salva11(this.value)"  onFocus="nextfield ='Edit12';" style="text-transform: uppercase;" tabindex="11"  maxlength="60"   />
</div>
<div id="Label12_outer" style="Z-INDEX: 27; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 300px; HEIGHT: 26px">
<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Endereco.:</STRONG>&nbsp;</div>
</div>
<div id="Edit12_outer" style="Z-INDEX: 28; LEFT: 225px; WIDTH: 127px; POSITION: absolute; TOP: 295px; HEIGHT: 26px">
<input type="text" id="Edit12" name="Edit12" value="<?php echo $Edit12 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:127px;"  onchange="Salva12(this.value)"  onFocus="nextfield ='Edit13';" style="text-transform: uppercase;" tabindex="12"  maxlength="20"   />
</div>
<div id="Edit13_outer" style="Z-INDEX: 29; LEFT: 352px; WIDTH: 385px; POSITION: absolute; TOP: 295px; HEIGHT: 26px">
<input type="text" id="Edit13" name="Edit13" value="<?php echo $Edit13 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:385px;"  onchange="Salva13(this.value)"  onFocus="nextfield ='Edit14';" style="text-transform: uppercase;" tabindex="13"  maxlength="75"   />
</div>
<div id="Label13_outer" style="Z-INDEX: 30; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 324px; HEIGHT: 26px">
<div id="Label13" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Numero.:</STRONG>&nbsp;</div>
</div>
<div id="Edit14_outer" style="Z-INDEX: 31; LEFT: 225px; WIDTH: 127px; POSITION: absolute; TOP: 319px; HEIGHT: 26px">
<input type="text" id="Edit14" name="Edit14" value="<?php echo $Edit14 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:127px;" onchange="Salva14(this.value)"  onFocus="nextfield ='Edit15';" style="text-transform: uppercase;"  tabindex="14"  maxlength="40"   />
</div>
<div id="Label14_outer" style="Z-INDEX: 32; LEFT: 351px; WIDTH: 62px; POSITION: absolute; TOP: 324px; HEIGHT: 26px">
<div id="Label14" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:62px;"   ><STRONG>Bairro.:</STRONG>&nbsp;</div>
</div>
<div id="Edit15_outer" style="Z-INDEX: 33; LEFT: 416px; WIDTH: 216px; POSITION: absolute; TOP: 319px; HEIGHT: 26px">
<input type="text" id="Edit15" name="Edit15" value="<?php echo $Edit15 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:216px;"  onchange="Salva15(this.value)"  onFocus="nextfield ='Edit16';" style="text-transform: uppercase;" tabindex="15"  maxlength="35"   />
</div>
<div id="Label15_outer" style="Z-INDEX: 34; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 348px; HEIGHT: 26px">
<div id="Label15" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Cep.:</STRONG>&nbsp;</div>
</div>
<div id="Edit16_outer" style="Z-INDEX: 35; LEFT: 225px; WIDTH: 83px; POSITION: absolute; TOP: 343px; HEIGHT: 26px">
<input type="text" id="Edit16" name="Edit16" value="<?php echo $Edit16 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:83px;" onkeypress="return txtBoxFormat(document.Form1, 'Edit16', '99999-999', event);" onchange="Salva16(this.value)"  onFocus="nextfield ='Edit17';" style="text-transform: uppercase;" tabindex="16"  maxlength="9"   />
</div>
<div id="Label16_outer" style="Z-INDEX: 36; LEFT: 351px; WIDTH: 70px; POSITION: absolute; TOP: 348px; HEIGHT: 26px">
<div id="Label16" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:70px;"   ><STRONG>Cidade.:</STRONG>&nbsp;</div>
</div>
<div id="Edit17_outer" style="Z-INDEX: 37; LEFT: 416px; WIDTH: 216px; POSITION: absolute; TOP: 343px; HEIGHT: 26px">
<input type="text" id="Edit17" name="Edit17" value="<?php echo $Edit17 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:216px;"  onchange="Salva17(this.value)"  onFocus="nextfield ='Edit18';" style="text-transform: uppercase;" tabindex="17"  maxlength="15"   />
</div>
<div id="Label17_outer" style="Z-INDEX: 38; LEFT: 634px; WIDTH: 70px; POSITION: absolute; TOP: 347px; HEIGHT: 26px">
<div id="Label17" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:70px;"   ><STRONG>Estado.:</STRONG>&nbsp;</div>
</div>
<div id="Edit18_outer" style="Z-INDEX: 39; LEFT: 699px; WIDTH: 36px; POSITION: absolute; TOP: 345px; HEIGHT: 26px">
<select type="text" id="Edit18" name="Edit18" value="<?php echo $Edit18 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:46px;"  onchange="Salva18(this.value)"  onFocus="nextfield ='Edit19';" style="text-transform: uppercase;" tabindex="18"  maxlength="2"   />

<?php

if (!empty($Edit18))
{
?>	
	<option value="<?php echo $Edit18 ?>"> <?php echo $Edit18 ?> </option>
            <option value="SP"> SP </option>
            <option value="AC"> AC </option>
            <option value="AL"> AL </option>
            <option value="AM"> AM </option>
            <option value="AP"> AP </option>
            <option value="BA"> BA </option>
            <option value="CE"> CE </option>
            <option value="DF"> DF </option>
            <option value="ES"> ES </option>
            <option value="GO"> GO </option>
            <option value="MA"> MA </option>
            <option value="MG"> MG </option>
            <option value="MS"> MS </option>
            <option value="MT"> MT </option>
            <option value="PA"> PA </option>
            <option value="PB"> PB </option>
            <option value="PE"> PE </option>
            <option value="PI"> PI </option>
            <option value="PR"> PR </option>
            <option value="RN"> RN </option>
            <option value="RO"> RO </option>
            <option value="RR"> RR </option>
            <option value="RJ"> RJ </option>
            <option value="RS"> RS </option>
            <option value="SC"> SC </option>
            <option value="SE"> SE </option>
            <option value="TO"> TO </option>

<?php	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="SP"> SP </option>
            <option value="AC"> AC </option>
            <option value="AL"> AL </option>
            <option value="AM"> AM </option>
            <option value="AP"> AP </option>
            <option value="BA"> BA </option>
            <option value="CE"> CE </option>
            <option value="DF"> DF </option>
            <option value="ES"> ES </option>
            <option value="GO"> GO </option>
            <option value="MA"> MA </option>
            <option value="MG"> MG </option>
            <option value="MS"> MS </option>
            <option value="MT"> MT </option>
            <option value="PA"> PA </option>
            <option value="PB"> PB </option>
            <option value="PE"> PE </option>
            <option value="PI"> PI </option>
            <option value="PR"> PR </option>
            <option value="RN"> RN </option>
            <option value="RO"> RO </option>
            <option value="RR"> RR </option>
            <option value="RJ"> RJ </option>
            <option value="RS"> RS </option>
            <option value="SC"> SC </option>
            <option value="SE"> SE </option>
            <option value="TO"> TO </option>
<?php            
 }
?>

</select>

</div>
<div id="Label18_outer" style="Z-INDEX: 40; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 372px; HEIGHT: 26px">
<div id="Label18" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Fone.:</STRONG>&nbsp;</div>
</div>
<div id="Edit19_outer" style="Z-INDEX: 41; LEFT: 225px; WIDTH: 117px; POSITION: absolute; TOP: 367px; HEIGHT: 26px">
<input type="text" id="Edit19" name="Edit19" value="<?php echo $Edit19 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px;"  onchange="Salva19(this.value)"  onFocus="nextfield ='Edit20';" style="text-transform: uppercase;" tabindex="19"  maxlength="25"   />
</div>
<div id="Label19_outer" style="Z-INDEX: 42; LEFT: 363px; WIDTH: 55px; POSITION: absolute; TOP: 372px; HEIGHT: 21px">
<div id="Label19" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:55px;"   ><STRONG>CTPS.:</STRONG>&nbsp;</div>
</div>
<div id="Edit20_outer" style="Z-INDEX: 43; LEFT: 416px; WIDTH: 116px; POSITION: absolute; TOP: 367px; HEIGHT: 26px">
<input type="text" id="Edit20" name="Edit20" value="<?php echo $Edit20 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:116px;"  onchange="Salva20(this.value)"  onFocus="nextfield ='Edit21';" style="text-transform: uppercase;" tabindex="20"  maxlength="10"   />
</div>
<div id="Label20_outer" style="Z-INDEX: 44; LEFT: 583px; WIDTH: 55px; POSITION: absolute; TOP: 372px; HEIGHT: 21px">
<div id="Label20" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:55px;"   ><STRONG>Serie.:</STRONG>&nbsp;</div>
</div>
<div id="Edit21_outer" style="Z-INDEX: 45; LEFT: 634px; WIDTH: 102px; POSITION: absolute; TOP: 367px; HEIGHT: 26px">
<input type="text" id="Edit21" name="Edit21" value="<?php echo $Edit21 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:102px;"  onchange="Salva21(this.value)"  onFocus="nextfield ='Edit22';" style="text-transform: uppercase;" tabindex="21"  maxlength="5"   />
</div>
<div id="Label21_outer" style="Z-INDEX: 46; LEFT: 741px; WIDTH: 70px; POSITION: absolute; TOP: 371px; HEIGHT: 26px">
<div id="Label21" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:70px;"   ><STRONG>Emissor.:</STRONG>&nbsp;</div>
</div>
<div id="Edit22_outer" style="Z-INDEX: 47; LEFT: 815px; WIDTH: 42px; POSITION: absolute; TOP: 369px; HEIGHT: 26px">
<select type="text" id="Edit22" name="Edit22" value="<?php echo $Edit22 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:45px;"  onchange="Salva22(this.value)"  onFocus="nextfield ='Edit23';" style="text-transform: uppercase;" tabindex="22"  maxlength="2"   />

<?php

if (!empty($Edit22))
{
?>	
	<option value="<?php echo $Edit22 ?>"> <?php echo $Edit22 ?> </option>
            <option value="SP"> SP </option>
            <option value="AC"> AC </option>
            <option value="AL"> AL </option>
            <option value="AM"> AM </option>
            <option value="AP"> AP </option>
            <option value="BA"> BA </option>
            <option value="CE"> CE </option>
            <option value="DF"> DF </option>
            <option value="ES"> ES </option>
            <option value="GO"> GO </option>
            <option value="MA"> MA </option>
            <option value="MG"> MG </option>
            <option value="MS"> MS </option>
            <option value="MT"> MT </option>
            <option value="PA"> PA </option>
            <option value="PB"> PB </option>
            <option value="PE"> PE </option>
            <option value="PI"> PI </option>
            <option value="PR"> PR </option>
            <option value="RN"> RN </option>
            <option value="RO"> RO </option>
            <option value="RR"> RR </option>
            <option value="RJ"> RJ </option>
            <option value="RS"> RS </option>
            <option value="SC"> SC </option>
            <option value="SE"> SE </option>
            <option value="TO"> TO </option>

<?php	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="SP"> SP </option>
            <option value="AC"> AC </option>
            <option value="AL"> AL </option>
            <option value="AM"> AM </option>
            <option value="AP"> AP </option>
            <option value="BA"> BA </option>
            <option value="CE"> CE </option>
            <option value="DF"> DF </option>
            <option value="ES"> ES </option>
            <option value="GO"> GO </option>
            <option value="MA"> MA </option>
            <option value="MG"> MG </option>
            <option value="MS"> MS </option>
            <option value="MT"> MT </option>
            <option value="PA"> PA </option>
            <option value="PB"> PB </option>
            <option value="PE"> PE </option>
            <option value="PI"> PI </option>
            <option value="PR"> PR </option>
            <option value="RN"> RN </option>
            <option value="RO"> RO </option>
            <option value="RR"> RR </option>
            <option value="RJ"> RJ </option>
            <option value="RS"> RS </option>
            <option value="SC"> SC </option>
            <option value="SE"> SE </option>
            <option value="TO"> TO </option>
<?php            
 }
?>

</select>

</div>
<div id="Label22_outer" style="Z-INDEX: 48; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 396px; HEIGHT: 26px">
<div id="Label22" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Funcao.:</STRONG>&nbsp;</div>
</div>
<div id="Edit23_outer" style="Z-INDEX: 49; LEFT: 225px; WIDTH: 117px; POSITION: absolute; TOP: 391px; HEIGHT: 26px">
<input type="text" id="Edit23" name="Edit23" value="<?php echo $Edit23 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px;"  onchange="Salva23(this.value)"  onFocus="nextfield ='Edit24';" style="text-transform: uppercase;" tabindex="23"  maxlength="15"   />
</div>
<div id="Label23_outer" style="Z-INDEX: 50; LEFT: 347px; WIDTH: 75px; POSITION: absolute; TOP: 396px; HEIGHT: 21px">
<div id="Label23" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:75px;"   ><STRONG>Dt.Adm.:</STRONG>&nbsp;</div>
</div>
<div id="Edit24_outer" style="Z-INDEX: 51; LEFT: 416px; WIDTH: 91px; POSITION: absolute; TOP: 391px; HEIGHT: 26px">
<input type="text" id="Edit24" name="Edit24" value="<?php echo $Edit24 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;"  onkeypress="return txtBoxFormat(document.Form1, 'Edit24', '99/99/9999', event);" onchange="Salva24(this.value)"  onFocus="nextfield ='Edit25';" style="text-transform: uppercase;" tabindex="24"  maxlength="10"   />
</div>
<div id="Edit25_outer" style="Z-INDEX: 52; LEFT: 225px; WIDTH: 117px; POSITION: absolute; TOP: 416px; HEIGHT: 26px">
<input type="text" id="Edit25" name="Edit25" value="<?php echo $Edit25 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px;" onchange="Salva25(this.value)"  onFocus="nextfield ='Edit26';" style="text-transform: uppercase;" tabindex="25"  maxlength="10"   />
</div>
<div id="Label24_outer" style="Z-INDEX: 53; LEFT: 349px; WIDTH: 69px; POSITION: absolute; TOP: 420px; HEIGHT: 21px">
<div id="Label24" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:69px;"   ><STRONG>No.Dep.:</STRONG>&nbsp;</div>
</div>
<div id="Edit26_outer" style="Z-INDEX: 54; LEFT: 416px; WIDTH: 34px; POSITION: absolute; TOP: 415px; HEIGHT: 26px">
<input type="text" id="Edit26" name="Edit26" value="<?php echo $Edit26 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:34px;"  onchange="Salva26(this.value)"  onFocus="nextfield ='Edit29';" style="text-transform: uppercase;" tabindex="26"  maxlength="2"   />
</div>
<div id="Label25_outer" style="Z-INDEX: 55; LEFT: 459px; WIDTH: 179px; POSITION: absolute; TOP: 419px; HEIGHT: 21px">
<div id="Label25" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:179px;"   ><STRONG>Mes/Ano Pagamento.:</STRONG>&nbsp;</div>
</div>

<?php

if ($per3 == "SIM"){

?>

<div id="Edit27_outer" style="Z-INDEX: 56; LEFT: 634px; WIDTH: 34px; POSITION: absolute; TOP: 416px; HEIGHT: 26px">
<input type="text" id="Edit27" name="Edit27" value="<?php echo $Edit27 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:34px;"  onchange="Salva27(this.value)"  onFocus="nextfield ='Edit28';" style="text-transform: uppercase;" tabindex="27"  maxlength="2"   />
</div>
<div id="Edit28_outer" style="Z-INDEX: 57; LEFT: 668px; WIDTH: 62px; POSITION: absolute; TOP: 416px; HEIGHT: 26px">
<input type="text" id="Edit28" name="Edit28" value="<?php echo $Edit28 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:62px;" onchange="Salva28(this.value)"  onFocus="nextfield ='Edit29';" style="text-transform: uppercase;" tabindex="28"  maxlength="4"   />
</div>
<?php
}else{
?>
	
<div id="Edit27_outer" style="Z-INDEX: 56; LEFT: 634px; WIDTH: 34px; POSITION: absolute; TOP: 416px; HEIGHT: 26px">
<input type="text" id="Edit27" name="Edit27" value="<?php echo $Edit27 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:34px;"  readonly onchange="Salva27(this.value)"  onFocus="nextfield ='Edit28';" style="text-transform: uppercase;" tabindex="27"  maxlength="2"   />
</div>
<div id="Edit28_outer" style="Z-INDEX: 57; LEFT: 668px; WIDTH: 62px; POSITION: absolute; TOP: 416px; HEIGHT: 26px">
<input type="text" id="Edit28" name="Edit28" value="<?php echo $Edit28 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:62px;" readonly onchange="Salva28(this.value)"  onFocus="nextfield ='Edit29';" style="text-transform: uppercase;" tabindex="28"  maxlength="4"   />
</div>
	
<?php	
}
?>

<div id="Label26_outer" style="Z-INDEX: 58; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 420px; HEIGHT: 26px">
<div id="Label26" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Est.Civil.:</STRONG>&nbsp;</div>
</div>
<div id="Label27_outer" style="Z-INDEX: 59; LEFT: 128px; WIDTH: 182px; POSITION: absolute; TOP: 445px; HEIGHT: 22px">
<div id="Label27" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:22px;width:182px;"   ><STRONG>Situacao do Cadastro.:</STRONG>&nbsp;</div>
</div>
<div id="Edit29_outer" style="Z-INDEX: 60; LEFT: 313px; WIDTH: 29px; POSITION: absolute; TOP: 441px; HEIGHT: 26px">
<input type="text" id="Edit29" name="Edit29" value="<?php echo $Edit29 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:29px;"  onchange="Salva29(this.value)"  onFocus="nextfield ='Edit30';" style="text-transform: uppercase;" tabindex="29"  maxlength="1"   />
</div>
<div id="Label28_outer" style="Z-INDEX: 61; LEFT: 128px; WIDTH: 75px; POSITION: absolute; TOP: 469px; HEIGHT: 22px">
<div id="Label28" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:22px;width:75px;"   ><STRONG>Saldo.:</STRONG>&nbsp;</div>
</div>
<div id="Edit30_outer" style="Z-INDEX: 62; LEFT: 225px; WIDTH: 117px; POSITION: absolute; TOP: 466px; HEIGHT: 26px">
<input type="text" id="Edit30" name="Edit30" value="<?php echo $Edit30 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px;"  onchange="Salva30(this.value)"  onFocus="nextfield ='Edit31';" style="text-transform: uppercase;" tabindex="30"  maxlength="14"   />
</div>
<div id="Label29_outer" style="Z-INDEX: 63; LEFT: 384px; WIDTH: 35px; POSITION: absolute; TOP: 469px; HEIGHT: 22px">
<div id="Label29" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:22px;width:35px;"   ><STRONG>de.:</STRONG>&nbsp;</div>
</div>
<div id="Edit31_outer" style="Z-INDEX: 64; LEFT: 416px; WIDTH: 34px; POSITION: absolute; TOP: 466px; HEIGHT: 26px">
<input type="text" id="Edit31" name="Edit31" value="<?php echo $Edit31 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:34px;"  onchange="Salva31(this.value)"  onFocus="nextfield ='Edit32';" style="text-transform: uppercase;" tabindex="31"  maxlength="4"   />
</div>
<div id="Label30_outer" style="Z-INDEX: 65; LEFT: 543px; WIDTH: 92px; POSITION: absolute; TOP: 470px; HEIGHT: 23px">
<div id="Label30" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:92px;"   ><STRONG>x / Pagos.:</STRONG>&nbsp;</div>
</div>
<div id="Edit32_outer" style="Z-INDEX: 66; LEFT: 634px; WIDTH: 92px; POSITION: absolute; TOP: 463px; HEIGHT: 28px">
<input type="text" id="Edit32" name="Edit32" value="<?php echo $Edit32 ?>" style=" font-family: Verdana; font-size: 14px;  height:27px;width:92px;"  onchange="Salva32(this.value)"  onFocus="nextfield ='Edit33';" style="text-transform: uppercase;" tabindex="32"  maxlength="14"   />
</div>
<div id="Label31_outer" style="Z-INDEX: 67; LEFT: 128px; WIDTH: 99px; POSITION: absolute; TOP: 494px; HEIGHT: 22px">
<div id="Label31" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:22px;width:99px;"   ><STRONG>Natural de.:</STRONG>&nbsp;</div>
</div>
<div id="Edit33_outer" style="Z-INDEX: 68; LEFT: 225px; WIDTH: 117px; POSITION: absolute; TOP: 491px; HEIGHT: 26px">
<input type="text" id="Edit33" name="Edit33" value="<?php echo $Edit33 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px;"  onchange="Salva33(this.value)"  onFocus="nextfield ='Edit34';" style="text-transform: uppercase;" tabindex="33"  maxlength="20"   />
</div>
<div id="Label32_outer" style="Z-INDEX: 69; LEFT: 347px; WIDTH: 75px; POSITION: absolute; TOP: 496px; HEIGHT: 21px">
<div id="Label32" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:75px;"   ><STRONG>Dt.Nasc.:</STRONG>&nbsp;</div>
</div>
<div id="Edit34_outer" style="Z-INDEX: 70; LEFT: 416px; WIDTH: 91px; POSITION: absolute; TOP: 491px; HEIGHT: 26px">
<input type="text" id="Edit34" name="Edit34" value="<?php echo $Edit34 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;"  onkeypress="return txtBoxFormat(document.Form1, 'Edit34', '99/99/9999', event);"  onchange="Salva34(this.value)"  onFocus="nextfield ='Edit35';" style="text-transform: uppercase;" tabindex="34"  maxlength="10"   />
</div>
<div id="Label33_outer" style="Z-INDEX: 71; LEFT: 509px; WIDTH: 127px; POSITION: absolute; TOP: 497px; HEIGHT: 23px">
<div id="Label33" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:127px;"   ><STRONG>Nacionalidade.:</STRONG>&nbsp;</div>
</div>
<div id="Edit35_outer" style="Z-INDEX: 72; LEFT: 634px; WIDTH: 179px; POSITION: absolute; TOP: 490px; HEIGHT: 28px">
<input type="text" id="Edit35" name="Edit35" value="<?php echo $Edit35 ?>" style=" font-family: Verdana; font-size: 14px;  height:27px;width:179px;"  onchange="Salva35(this.value)"  onFocus="nextfield ='Edit36';" style="text-transform: uppercase;" tabindex="35"  maxlength="10"   />
</div>
<div id="Label34_outer" style="Z-INDEX: 73; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 521px; HEIGHT: 26px">
<div id="Label34" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Pai.:</STRONG>&nbsp;</div>
</div>
<div id="Edit36_outer" style="Z-INDEX: 74; LEFT: 225px; WIDTH: 409px; POSITION: absolute; TOP: 516px; HEIGHT: 27px">
<input type="text" id="Edit36" name="Edit36" value="<?php echo $Edit36 ?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:409px;"  onchange="Salva36(this.value)"  onFocus="nextfield ='Edit37';" style="text-transform: uppercase;" tabindex="36"  maxlength="45"   />
</div>
<div id="Label35_outer" style="Z-INDEX: 75; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 546px; HEIGHT: 26px">
<div id="Label35" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Mae.:</STRONG>&nbsp;</div>
</div>
<div id="Edit37_outer" style="Z-INDEX: 76; LEFT: 225px; WIDTH: 409px; POSITION: absolute; TOP: 541px; HEIGHT: 26px">
<input type="text" id="Edit37" name="Edit37" value="<?php echo $Edit37 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:409px;"  onchange="Salva37(this.value)"  onFocus="nextfield ='Edit38';" style="text-transform: uppercase;" tabindex="37"  maxlength="45"   />
</div>
<div id="Label36_outer" style="Z-INDEX: 77; LEFT: 129px; WIDTH: 89px; POSITION: absolute; TOP: 571px; HEIGHT: 26px">
<div id="Label36" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Conjugue.:</STRONG>&nbsp;</div>
</div>
<div id="Edit38_outer" style="Z-INDEX: 78; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 566px; HEIGHT: 26px">
<input type="text" id="Edit38" name="Edit38" value="<?php echo $Edit38 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px;"  onchange="Salva38(this.value)"  onFocus="nextfield ='Edit39';" style="text-transform: uppercase;" tabindex="38"  maxlength="35"   />
</div>
<div id="Label37_outer" style="Z-INDEX: 79; LEFT: 564px; WIDTH: 75px; POSITION: absolute; TOP: 574px; HEIGHT: 21px">
<div id="Label37" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:75px;"   ><STRONG>Dt.Nasc.:</STRONG>&nbsp;</div>
</div>
<div id="Edit39_outer" style="Z-INDEX: 80; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 566px; HEIGHT: 26px">
<input type="text" id="Edit39" name="Edit39" value="<?php echo $Edit39 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;"  onkeypress="return txtBoxFormat(document.Form1, 'Edit39', '99/99/9999', event);" onchange="Salva39(this.value)"  onFocus="nextfield ='Edit40';" style="text-transform: uppercase;" tabindex="39"  maxlength="10"   />
</div>
<div id="Label38_outer" style="Z-INDEX: 81; LEFT: 129px; WIDTH: 89px; POSITION: absolute; TOP: 599px; HEIGHT: 26px">
<div id="Label38" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>1o Filho.:</STRONG>&nbsp;</div>
</div>
<div id="Edit40_outer" style="Z-INDEX: 82; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 591px; HEIGHT: 26px">
<input type="text" id="Edit40" name="Edit40" value="<?php echo $Edit40 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px;"  onchange="Salva40(this.value)"  onFocus="nextfield ='Edit41';" style="text-transform: uppercase;" tabindex="40"  maxlength="35"   />
</div>
<div id="Label39_outer" style="Z-INDEX: 83; LEFT: 564px; WIDTH: 75px; POSITION: absolute; TOP: 600px; HEIGHT: 21px">
<div id="Label39" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:75px;"   ><STRONG>Dt.Nasc.:</STRONG>&nbsp;</div>
</div>
<div id="Edit41_outer" style="Z-INDEX: 84; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 591px; HEIGHT: 26px">
<input type="text" id="Edit41" name="Edit41" value="<?php echo $Edit41 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;" onkeypress="return txtBoxFormat(document.Form1, 'Edit41', '99/99/9999', event);"   onchange="Salva41(this.value)"  onFocus="nextfield ='Edit42';" style="text-transform: uppercase;" tabindex="41"  maxlength="10"   />
</div>
<div id="Label40_outer" style="Z-INDEX: 85; LEFT: 761px; WIDTH: 52px; POSITION: absolute; TOP: 599px; HEIGHT: 21px">
<div id="Label40" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:52px;"   ><STRONG>Sexo.:</STRONG>&nbsp;</div>
</div>
<div id="Edit42_outer" style="Z-INDEX: 86; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 594px; HEIGHT: 26px">
<select type="text" id="Edit42" name="Edit42" value="<?php echo $Edit42 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px;" onchange="Salva42(this.value)"  onFocus="nextfield ='Edit43';" style="text-transform: uppercase;" tabindex="42"  maxlength="1"   />

<?php

if (!empty($Edit42))
{
?>	
	<option value="<?php echo $Edit42 ?>"> <?php echo $Edit42 ?> </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>

<?php	

}else{
	
?>	
            <option value=" ">  </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>
<?php            
 }
?>

</select>

</div>
<div id="Label41_outer" style="Z-INDEX: 87; LEFT: 129px; WIDTH: 89px; POSITION: absolute; TOP: 624px; HEIGHT: 26px">
<div id="Label41" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>2o Filho.:</STRONG>&nbsp;</div>
</div>
<div id="Edit43_outer" style="Z-INDEX: 88; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 616px; HEIGHT: 26px">
<input type="text" id="Edit43" name="Edit43" value="<?php echo $Edit43 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px;"  onchange="Salva43(this.value)"  onFocus="nextfield ='Edit44';" style="text-transform: uppercase;" tabindex="43"  maxlength="35"   />
</div>
<div id="Label42_outer" style="Z-INDEX: 89; LEFT: 564px; WIDTH: 75px; POSITION: absolute; TOP: 625px; HEIGHT: 21px">
<div id="Label42" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:75px;"   ><STRONG>Dt.Nasc.:</STRONG>&nbsp;</div>
</div>
<div id="Edit44_outer" style="Z-INDEX: 90; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 616px; HEIGHT: 26px">
<input type="text" id="Edit44" name="Edit44" value="<?php echo $Edit44 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;" onkeypress="return txtBoxFormat(document.Form1, 'Edit44', '99/99/9999', event);"   onchange="Salva44(this.value)"  onFocus="nextfield ='Edit45';" style="text-transform: uppercase;" tabindex="44"  maxlength="10"   />
</div>
<div id="Label43_outer" style="Z-INDEX: 91; LEFT: 761px; WIDTH: 52px; POSITION: absolute; TOP: 625px; HEIGHT: 21px">
<div id="Label43" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:52px;"   ><STRONG>Sexo.:</STRONG>&nbsp;</div>
</div>
<div id="Edit45_outer" style="Z-INDEX: 92; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 619px; HEIGHT: 26px">
<select type="text" id="Edit45" name="Edit45" value="<?php echo $Edit45 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px;"  onchange="Salva45(this.value)"  onFocus="nextfield ='Edit46';" style="text-transform: uppercase;" tabindex="45"  maxlength="1"   />

<?php

if (!empty($Edit45))
{
?>	
	<option value="<?php echo $Edit45 ?>"> <?php echo $Edit45 ?> </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>

<?php	

}else{
	
?>	
            <option value=" ">  </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>
<?php            
 }
?>

</select>

</div>
<div id="Image3_outer" style="Z-INDEX: 93; LEFT: 702px; WIDTH: 112px; POSITION: absolute; TOP: 526px; HEIGHT: 24px">
<div id="Image3_container" style=" width: 112;  overflow: hidden;" ><A HREF="<?php echo $path ?>ts2.php" target="new"  ><img id="Image3" src="../imagens/botaoazul21.PNG"     border="0"       /></A></div>
</div>


<div id="Image2_outer" style="Z-INDEX: 94; LEFT: 761px; WIDTH: 112px; POSITION: absolute; TOP: 331px; HEIGHT: 24px">
<div id="Image2_container" style=" width: 112;   overflow: hidden;" ><img id="Image2" src="../imagens/botaoazul17.PNG"  border="0"       /></div>
</div>


<div id="Label44_outer" style="Z-INDEX: 95; LEFT: 129px; WIDTH: 89px; POSITION: absolute; TOP: 674px; HEIGHT: 24px">
<div id="Label44" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:89px;"   ><STRONG>4o Filho.:</STRONG>&nbsp;</div>
</div>
<div id="Label45_outer" style="Z-INDEX: 96; LEFT: 564px; WIDTH: 75px; POSITION: absolute; TOP: 674px; HEIGHT: 19px">
<div id="Label45" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:75px;"   ><STRONG>Dt.Nasc.:</STRONG>&nbsp;</div>
</div>
<div id="Label46_outer" style="Z-INDEX: 97; LEFT: 761px; WIDTH: 52px; POSITION: absolute; TOP: 673px; HEIGHT: 19px">
<div id="Label46" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:52px;"   ><STRONG>Sexo.:</STRONG>&nbsp;</div>
</div>
<div id="Label47_outer" style="Z-INDEX: 98; LEFT: 129px; WIDTH: 89px; POSITION: absolute; TOP: 649px; HEIGHT: 24px">
<div id="Label47" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:89px;"   ><STRONG>3o Filho.:</STRONG>&nbsp;</div>
</div>
<div id="Label48_outer" style="Z-INDEX: 99; LEFT: 564px; WIDTH: 75px; POSITION: absolute; TOP: 650px; HEIGHT: 19px">
<div id="Label48" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:75px;"   ><STRONG>Dt.Nasc.:</STRONG>&nbsp;</div>
</div>
<div id="Label49_outer" style="Z-INDEX: 100; LEFT: 761px; WIDTH: 52px; POSITION: absolute; TOP: 650px; HEIGHT: 19px">
<div id="Label49" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:52px;"   ><STRONG>Sexo.:</STRONG>&nbsp;</div>
</div>
<div id="Label50_outer" style="Z-INDEX: 101; LEFT: 129px; WIDTH: 89px; POSITION: absolute; TOP: 774px; HEIGHT: 24px">
<div id="Label50" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:89px;"   ><STRONG>8o Filho.:</STRONG>&nbsp;</div>
</div>
<div id="Label51_outer" style="Z-INDEX: 102; LEFT: 564px; WIDTH: 75px; POSITION: absolute; TOP: 772px; HEIGHT: 19px">
<div id="Label51" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:75px;"   ><STRONG>Dt.Nasc.:</STRONG>&nbsp;</div>
</div>
<div id="Label52_outer" style="Z-INDEX: 103; LEFT: 761px; WIDTH: 52px; POSITION: absolute; TOP: 772px; HEIGHT: 19px">
<div id="Label52" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:52px;"   ><STRONG>Sexo.:</STRONG>&nbsp;</div>
</div>
<div id="Label53_outer" style="Z-INDEX: 104; LEFT: 129px; WIDTH: 89px; POSITION: absolute; TOP: 749px; HEIGHT: 24px">
<div id="Label53" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:89px;"   ><STRONG>7o Filho.:</STRONG>&nbsp;</div>
</div>
<div id="Label54_outer" style="Z-INDEX: 105; LEFT: 564px; WIDTH: 75px; POSITION: absolute; TOP: 747px; HEIGHT: 19px">
<div id="Label54" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:75px;"   ><STRONG>Dt.Nasc.:</STRONG>&nbsp;</div>
</div>
<div id="Label55_outer" style="Z-INDEX: 106; LEFT: 761px; WIDTH: 52px; POSITION: absolute; TOP: 747px; HEIGHT: 19px">
<div id="Label55" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:52px;"   ><STRONG>Sexo.:</STRONG>&nbsp;</div>
</div>
<div id="Label56_outer" style="Z-INDEX: 107; LEFT: 129px; WIDTH: 89px; POSITION: absolute; TOP: 724px; HEIGHT: 24px">
<div id="Label56" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:89px;"   ><STRONG>6o Filho.:</STRONG>&nbsp;</div>
</div>
<div id="Label57_outer" style="Z-INDEX: 108; LEFT: 761px; WIDTH: 52px; POSITION: absolute; TOP: 723px; HEIGHT: 19px">
<div id="Label57" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:52px;"   ><STRONG>Sexo.:</STRONG>&nbsp;</div>
</div>
<div id="Label58_outer" style="Z-INDEX: 109; LEFT: 761px; WIDTH: 52px; POSITION: absolute; TOP: 698px; HEIGHT: 19px">
<div id="Label58" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:52px;"   ><STRONG>Sexo.:</STRONG>&nbsp;</div>
</div>
<div id="Label59_outer" style="Z-INDEX: 110; LEFT: 564px; WIDTH: 70px; POSITION: absolute; TOP: 698px; HEIGHT: 19px">
<div id="Label59" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:70px;"   ><STRONG>Dt.Nasc.:</STRONG>&nbsp;</div>
</div>
<div id="Label60_outer" style="Z-INDEX: 111; LEFT: 129px; WIDTH: 89px; POSITION: absolute; TOP: 698px; HEIGHT: 24px">
<div id="Label60" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:89px;"   ><STRONG>5o Filho.:</STRONG>&nbsp;</div>
</div>
<div id="Label61_outer" style="Z-INDEX: 112; LEFT: 564px; WIDTH: 68px; POSITION: absolute; TOP: 722px; HEIGHT: 19px">
<div id="Label61" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:68px;"   ><STRONG>Dt.Nasc.:</STRONG>&nbsp;</div>
</div>
<div id="Label62_outer" style="Z-INDEX: 113; LEFT: 129px; WIDTH: 89px; POSITION: absolute; TOP: 797px; HEIGHT: 24px">
<div id="Label62" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:89px;"   ><STRONG>9o Filho.:</STRONG>&nbsp;</div>
</div>
<div id="Label63_outer" style="Z-INDEX: 114; LEFT: 129px; WIDTH: 89px; POSITION: absolute; TOP: 821px; HEIGHT: 24px">
<div id="Label63" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:89px;"   ><STRONG>10o Filho.:</STRONG>&nbsp;</div>
</div>
<div id="Label64_outer" style="Z-INDEX: 115; LEFT: 564px; WIDTH: 75px; POSITION: absolute; TOP: 796px; HEIGHT: 19px">
<div id="Label64" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:75px;"   ><STRONG>Dt.Nasc.:</STRONG>&nbsp;</div>
</div>
<div id="Label65_outer" style="Z-INDEX: 116; LEFT: 564px; WIDTH: 75px; POSITION: absolute; TOP: 821px; HEIGHT: 19px">
<div id="Label65" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:75px;"   ><STRONG>Dt.Nasc.:</STRONG>&nbsp;</div>
</div>
<div id="Label66_outer" style="Z-INDEX: 117; LEFT: 761px; WIDTH: 52px; POSITION: absolute; TOP: 798px; HEIGHT: 19px">
<div id="Label66" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:52px;"   ><STRONG>Sexo.:</STRONG>&nbsp;</div>
</div>
<div id="Label67_outer" style="Z-INDEX: 118; LEFT: 761px; WIDTH: 52px; POSITION: absolute; TOP: 822px; HEIGHT: 19px">
<div id="Label67" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:52px;"   ><STRONG>Sexo.:</STRONG>&nbsp;</div>
</div>
<div id="Label68_outer" style="Z-INDEX: 119; LEFT: 127px; WIDTH: 103px; POSITION: absolute; TOP: 843px; HEIGHT: 24px">
<div id="Label68" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:103px;"   ><STRONG>Observacao:</STRONG></div>
</div>
<div id="Memo1_outer" style="Z-INDEX: 120; LEFT: 225px; WIDTH: 501px; POSITION: absolute; TOP: 842px; HEIGHT: 78px">
<textarea id="Edit70" name="Edit70" style=" font-family: Verdana; font-size: 14px;  height:77px;width:501px;"  onchange="Salva70(this.value)"  onFocus="nextfield ='done';" style="text-transform: uppercase;" tabindex="70"    wrap="virtual"><?php echo $Edit70 ?></textarea>
</div>
<div id="Label69_outer" style="Z-INDEX: 121; LEFT: 774px; WIDTH: 77px; POSITION: absolute; TOP: 156px; HEIGHT: 20px">
<div id="Label69" style=" font-family: Verdana; font-size: 13px; color: #4682B4; height:20px;width:77px;"   ><A HREF="http://www.receita.fazenda.gov.br/Aplicacoes/ATCTA/cpf/ConsultaPublica.asp" target="new" >Clique Aqui</A></div>
</div>
<div id="Label70_outer" style="Z-INDEX: 122; LEFT: 310px; WIDTH: 31px; POSITION: absolute; TOP: 349px; HEIGHT: 18px">
<div id="Label70" style=" font-family: Verdana; font-size: 13px; color: #4682B4; height:18px;width:31px;"   ><A HREF="http://correios.com.br/servicos/dnec/menuAction.do?Metodo=menuCep" target="new" ><STRONG>Cep </STRONG></A></div>
</div>

<div id="Label72_outer" style="Z-INDEX: 123; LEFT: 305px; WIDTH: 442px; POSITION: absolute; TOP: 249px; HEIGHT: 20px">
<div id="Label72" style=" font-family: Verdana; font-size: 14px; color: #0000FF;font-weight: normal; height:20px;width:442px;"   ><strong><?php echo $nome_do_edif ?></strong>&nbsp;</div>
</div>
<div id="Image4_outer" style="Z-INDEX: 150; LEFT: 283px; WIDTH: 17px; POSITION: absolute; TOP: 250px; HEIGHT: 18px">
<div id="Image4_container" style=" width: 17;  height: 18; overflow: hidden;" ><A HREF="edifconsulta.php?Cod_pp=<?php echo $Edit1.$Edit2 ?>"  ><img id="Image4" src="../imagens/lupa.PNG"  width="17"  height="18"  border="0"       /></A></div>
</div>
<div id="Label73_outer" style="Z-INDEX: 124; LEFT: 257px; WIDTH: 462px; POSITION: absolute; TOP: 227px; HEIGHT: 20px">
<div id="Label73" style=" font-family: Verdana; font-size: 14px; color: #4682B4;font-weight: normal; height:20px;width:462px;"   ><STRONG><?php echo $categ_1 ?></STRONG>&nbsp;</div>
</div>
<div id="Label74_outer" style="Z-INDEX: 125; LEFT: 345px; WIDTH: 511px; POSITION: absolute; TOP: 445px; HEIGHT: 20px">
<div id="Label74" style=" font-family: Verdana; font-size: 14px; color: #4682B4;font-weight: normal; height:20px;width:511px;"   ><STRONG><?php echo $nome_cad_si ?></STRONG>&nbsp;</div>
</div>           
<div id="Edit46_outer" style="Z-INDEX: 126; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 641px; HEIGHT: 26px">
<input type="text" id="Edit46" name="Edit46" value="<?php echo $Edit46 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px;"  onchange="Salva46(this.value)"  onFocus="nextfield ='Edit47';" style="text-transform: uppercase;" tabindex="46" maxlength="35"    />
</div>
<div id="Edit47_outer" style="Z-INDEX: 127; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 641px; HEIGHT: 26px">
<input type="text" id="Edit47" name="Edit47" value="<?php echo $Edit47 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;" onkeypress="return txtBoxFormat(document.Form1, 'Edit47', '99/99/9999', event);"  onchange="Salva47(this.value)"  onFocus="nextfield ='Edit48';" style="text-transform: uppercase;" tabindex="47"  maxlength="10"   />
</div>
<div id="Edit48_outer" style="Z-INDEX: 128; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 644px; HEIGHT: 26px">
<select type="text" id="Edit48" name="Edit48" value="<?php echo $Edit48 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px;" onchange="Salva48(this.value)"  onFocus="nextfield ='Edit49';" style="text-transform: uppercase;" tabindex="48"  maxlength="1"   />

<?php

if (!empty($Edit48))
{
?>	
	<option value="<?php echo $Edit48 ?>"> <?php echo $Edit48 ?> </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>

<?php	

}else{
	
?>	
            <option value=" ">  </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>
<?php            
 }
?>

</select>

</div>
<div id="Edit49_outer" style="Z-INDEX: 129; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 666px; HEIGHT: 26px">
<input type="text" id="Edit49" name="Edit49" value="<?php echo $Edit49 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px;"  onchange="Salva49(this.value)"  onFocus="nextfield ='Edit50';" style="text-transform: uppercase;" tabindex="49"  maxlength="35"   />
</div>
<div id="Edit50_outer" style="Z-INDEX: 130; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 666px; HEIGHT: 26px">
<input type="text" id="Edit50" name="Edit50" value="<?php echo $Edit50 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;" onkeypress="return txtBoxFormat(document.Form1, 'Edit50', '99/99/9999', event);"   onchange="Salva50(this.value)"  onFocus="nextfield ='Edit51';" style="text-transform: uppercase;" tabindex="50"  maxlength="10"   />
</div>
<div id="Edit51_outer" style="Z-INDEX: 131; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 669px; HEIGHT: 26px">
<select type="text" id="Edit51" name="Edit51" value="<?php echo $Edit51 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px;"  onchange="Salva51(this.value)"  onFocus="nextfield ='Edit52';" style="text-transform: uppercase;" tabindex="51" maxlength="1"    />

<?php

if (!empty($Edit51))
{
?>	
	<option value="<?php echo $Edit51 ?>"> <?php echo $Edit51 ?> </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>

<?php	

}else{
	
?>	
            <option value=" ">  </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>
<?php            
 }
?>

</select>

</div>
<div id="Edit52_outer" style="Z-INDEX: 132; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 691px; HEIGHT: 26px">
<input type="text" id="Edit52" name="Edit52" value="<?php echo $Edit52 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px;"  onchange="Salva52(this.value)"  onFocus="nextfield ='Edit53';" style="text-transform: uppercase;" tabindex="52"  maxlength="35"   />
</div>
<div id="Edit53_outer" style="Z-INDEX: 133; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 691px; HEIGHT: 26px">
<input type="text" id="Edit53" name="Edit53" value="<?php echo $Edit53 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;" onkeypress="return txtBoxFormat(document.Form1, 'Edit53', '99/99/9999', event);"   onchange="Salva53(this.value)"  onFocus="nextfield ='Edit54';" style="text-transform: uppercase;" tabindex="53"  maxlength="10"   />
</div>
<div id="Edit54_outer" style="Z-INDEX: 134; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 694px; HEIGHT: 26px">
<select type="text" id="Edit54" name="Edit54" value="<?php echo $Edit54 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px;"  onchange="Salva54(this.value)"  onFocus="nextfield ='Edit55';" style="text-transform: uppercase;" tabindex="54"  maxlength="1"   />

<?php

if (!empty($Edit54))
{
?>	
	<option value="<?php echo $Edit54 ?>"> <?php echo $Edit54 ?> </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>

<?php	

}else{
	
?>	
            <option value=" ">  </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>
<?php            
 }
?>

</select>

</div>
<div id="Edit55_outer" style="Z-INDEX: 135; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 716px; HEIGHT: 26px">
<input type="text" id="Edit55" name="Edit55" value="<?php echo $Edit55 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px;"  onchange="Salva55(this.value)"  onFocus="nextfield ='Edit56';" style="text-transform: uppercase;" tabindex="55"  maxlength="35"   />
</div>
<div id="Edit56_outer" style="Z-INDEX: 136; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 716px; HEIGHT: 26px">
<input type="text" id="Edit56" name="Edit56" value="<?php echo $Edit56 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;" onkeypress="return txtBoxFormat(document.Form1, 'Edit56', '99/99/9999', event);"   onchange="Salva56(this.value)"  onFocus="nextfield ='Edit57';" style="text-transform: uppercase;" tabindex="56"  maxlength="10"   />
</div>
<div id="Edit57_outer" style="Z-INDEX: 137; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 719px; HEIGHT: 26px">
<select type="text" id="Edit57" name="Edit57" value="<?php echo $Edit57 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px;" onchange="Salva57(this.value)"  onFocus="nextfield ='Edit58';" style="text-transform: uppercase;" tabindex="57"  maxlength="1"   />

<?php

if (!empty($Edit57))
{
?>	
	<option value="<?php echo $Edit57 ?>"> <?php echo $Edit57 ?> </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>

<?php	

}else{
	
?>	
            <option value=" ">  </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>
<?php            
 }
?>

</select>

</div>
<div id="Edit58_outer" style="Z-INDEX: 138; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 741px; HEIGHT: 26px">
<input type="text" id="Edit58" name="Edit58" value="<?php echo $Edit58 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px;" onchange="Salva58(this.value)"  onFocus="nextfield ='Edit59';" style="text-transform: uppercase;" tabindex="58"  maxlength="35"   />
</div>
<div id="Edit59_outer" style="Z-INDEX: 139; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 741px; HEIGHT: 26px">
<input type="text" id="Edit59" name="Edit59" value="<?php echo $Edit59 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;" onkeypress="return txtBoxFormat(document.Form1, 'Edit59', '99/99/9999', event);"  onchange="Salva59(this.value)"  onFocus="nextfield ='Edit60';" style="text-transform: uppercase;" tabindex="59"  maxlength="10"   />
</div>
<div id="Edit60_outer" style="Z-INDEX: 140; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 744px; HEIGHT: 26px">
<select type="text" id="Edit60" name="Edit60" value="<?php echo $Edit60 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px;" onchange="Salva60(this.value)"  onFocus="nextfield ='Edit61';" style="text-transform: uppercase;" tabindex="60"  maxlength="1"   />

<?php

if (!empty($Edit60))
{
?>	
	<option value="<?php echo $Edit60 ?>"> <?php echo $Edit60 ?> </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>

<?php	

}else{
	
?>	
            <option value=" ">  </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>
<?php            
 }
?>

</select>

</div>
<div id="Edit61_outer" style="Z-INDEX: 141; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 766px; HEIGHT: 26px">
<input type="text" id="Edit61" name="Edit61" value="<?php echo $Edit61 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px;" onchange="Salva61(this.value)"  onFocus="nextfield ='Edit62';" style="text-transform: uppercase;" tabindex="61"  maxlength="35"   />
</div>
<div id="Edit62_outer" style="Z-INDEX: 142; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 766px; HEIGHT: 26px">
<input type="text" id="Edit62" name="Edit62" value="<?php echo $Edit62 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;"  onkeypress="return txtBoxFormat(document.Form1, 'Edit62', '99/99/9999', event);"  onchange="Salva62(this.value)"  onFocus="nextfield ='Edit63';" style="text-transform: uppercase;" tabindex="62"  maxlength="10"   />
</div>
<div id="Edit63_outer" style="Z-INDEX: 143; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 769px; HEIGHT: 26px">
<select type="text" id="Edit63" name="Edit63" value="<?php echo $Edit63 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px;" onchange="Salva63(this.value)"  onFocus="nextfield ='Edit64';" style="text-transform: uppercase;" tabindex="63"  maxlength="1"   />

<?php

if (!empty($Edit63))
{
?>	
	<option value="<?php echo $Edit63 ?>"> <?php echo $Edit63 ?> </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>

<?php	

}else{
	
?>	
            <option value=" ">  </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>
<?php            
 }
?>

</select>

</div>
<div id="Edit64_outer" style="Z-INDEX: 144; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 791px; HEIGHT: 26px">
<input type="text" id="Edit64" name="Edit64" value="<?php echo $Edit64 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px;" onchange="Salva64(this.value)"  onFocus="nextfield ='Edit65';" style="text-transform: uppercase;" tabindex="64"  maxlength="35"   />
</div>
<div id="Edit65_outer" style="Z-INDEX: 145; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 791px; HEIGHT: 26px">
<input type="text" id="Edit65" name="Edit65" value="<?php echo $Edit65 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;" onkeypress="return txtBoxFormat(document.Form1, 'Edit65', '99/99/9999', event);"   onchange="Salva65(this.value)"  onFocus="nextfield ='Edit66';" style="text-transform: uppercase;" tabindex="65"  maxlength="10"   />
</div>
<div id="Edit66_outer" style="Z-INDEX: 146; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 794px; HEIGHT: 26px">
<select type="text" id="Edit66" name="Edit66" value="<?php echo $Edit66 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px;" onchange="Salva66(this.value)"  onFocus="nextfield ='Edit67';" style="text-transform: uppercase;" tabindex="66"  maxlength="1"   />

<?php

if (!empty($Edit66))
{
?>	
	<option value="<?php echo $Edit66 ?>"> <?php echo $Edit66 ?> </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>

<?php	

}else{
	
?>	
            <option value=" ">  </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>
<?php            
 }
?>

</select>

</div>
<div id="Edit67_outer" style="Z-INDEX: 147; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 816px; HEIGHT: 26px">
<input type="text" id="Edit67" name="Edit67" value="<?php echo $Edit67 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px;" onchange="Salva67(this.value)"  onFocus="nextfield ='Edit68';" style="text-transform: uppercase;" tabindex="67"  maxlength="35"   />
</div>
<div id="Edit68_outer" style="Z-INDEX: 148; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 816px; HEIGHT: 26px">
<input type="text" id="Edit68" name="Edit68" value="<?php echo $Edit68 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;" onkeypress="return txtBoxFormat(document.Form1, 'Edit68', '99/99/9999', event);"   onchange="Salva68(this.value)"  onFocus="nextfield ='Edit69';" style="text-transform: uppercase;" tabindex="68"  maxlength="10"   />
</div>
<div id="Edit69_outer" style="Z-INDEX: 149; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 819px; HEIGHT: 26px">
<select type="text" id="Edit69" name="Edit69" value="<?php echo $Edit69 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px;" onchange="Salva69(this.value)"  onFocus="nextfield ='Edit70';" style="text-transform: uppercase;" tabindex="69"  maxlength="1"   />

<?php

if (!empty($Edit69))
{
?>	
	<option value="<?php echo $Edit69 ?>"> <?php echo $Edit69 ?> </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>

<?php	

}else{
	
?>	
            <option value=" ">  </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>
<?php            
 }
?>

</select>

</div>

<div style="Z-INDEX: 35; LEFT: 840px; WIDTH: 25px; POSITION: absolute; TOP: 882px; HEIGHT: 35px" align="center">
<img id="Image3" src="../imagens/vacina.JPG"  width="25"  height="35"  border="0"       />
</div>

</td></tr></table>
</form></body>
</html>