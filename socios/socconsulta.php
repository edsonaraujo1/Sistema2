<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Consultar Cadastro Socios
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

// include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

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

<html>
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>
<body>
</html>

<?php
$Edit1 = " ";
$Edit2 = " ";
$Edit3 = " ";
$Edit4 = " ";
$Edit5 = " ";
$Edit6 = " ";
$Edit7 = " ";
$Edit7 = " ";
$Edit8 = " ";
$Edit9 = " ";
$Edit10 = " ";
$Edit11 = " ";
$Edit12 = " ";
$Edit13 = " ";
$Edit14 = " ";
$Edit15 = " ";


session_start();

unset ($_SESSION['cod']);
unset ($_SESSION['nu']);
unset ($_SESSION['rgassoc']);
unset ($_SESSION['cpf']);
unset ($_SESSION['datinsc']);
unset ($_SESSION['dat2']);
unset ($_SESSION['dat3']);
unset ($_SESSION['sede']);
unset ($_SESSION['categoria']);
unset ($_SESSION['codedif']);
unset ($_SESSION['nomeassoc']);
unset ($_SESSION['rua']);
unset ($_SESSION['endresid']);
unset ($_SESSION['numero']);
unset ($_SESSION['bairrores']);
unset ($_SESSION['cepres']);
unset ($_SESSION['cidaderes']);
unset ($_SESSION['estadores']);
unset ($_SESSION['telefone']);
unset ($_SESSION['carttrab']);
unset ($_SESSION['serie']);
unset ($_SESSION['emiscart']);
unset ($_SESSION['cargoassoc']);
unset ($_SESSION['datadimis']);
unset ($_SESSION['estcivil']);
unset ($_SESSION['numdep']);
unset ($_SESSION['mes']);
unset ($_SESSION['ano']);
unset ($_SESSION['cad_si']);
unset ($_SESSION['saldo']);
unset ($_SESSION['prest']);
unset ($_SESSION['pago']);
unset ($_SESSION['natural']);
unset ($_SESSION['datnasc']);
unset ($_SESSION['nascion']);
unset ($_SESSION['pai']);
unset ($_SESSION['mae']);
unset ($_SESSION['conjuge']);
unset ($_SESSION['datconj']);
unset ($_SESSION['filho01']);
unset ($_SESSION['dat01']);
unset ($_SESSION['sexo01']);
unset ($_SESSION['filho02']);
unset ($_SESSION['dat02']);
unset ($_SESSION['sexo02']);
unset ($_SESSION['filho03']);
unset ($_SESSION['dat03']);
unset ($_SESSION['sexo03']);
unset ($_SESSION['filho04']);
unset ($_SESSION['dat04']);
unset ($_SESSION['sexo04']);
unset ($_SESSION['filho05']);
unset ($_SESSION['dat05']);
unset ($_SESSION['sexo05']);
unset ($_SESSION['filho06']);
unset ($_SESSION['dat06']);
unset ($_SESSION['sexo06']);
unset ($_SESSION['filho07']);
unset ($_SESSION['dat07']);
unset ($_SESSION['sexo07']);
unset ($_SESSION['filho08']);
unset ($_SESSION['dat08']);
unset ($_SESSION['sexo08']);
unset ($_SESSION['filho09']);
unset ($_SESSION['dat09']);
unset ($_SESSION['sexo09']);
unset ($_SESSION['filho10']);
unset ($_SESSION['dat10']);
unset ($_SESSION['sexo10']);
unset ($_SESSION['obs']);


define ("Edit1",    "$cod");
define ("Edit2",    "$nu");
define ("Edit3",    "$cpf");
define ("Edit4",    "$rgassoc");
define ("Edit5",    "$datinsc");
define ("Edit6",    "$dat2");
define ("Edit7",    "$dat3");
define ("Edit8",    "$sede");
define ("Edit9",    "$categoria");
define ("Edit10",   "$codedif");
define ("Edit11",   "$nomeassoc");
define ("Edit12",   "$rua");
define ("Edit13",   "$endresid");
define ("Edit14",   "$numero");
define ("Edit15",   "$bairrores");
define ("Edit16",   "$cepres");
define ("Edit17",   "$cidaderes");
define ("Edit18",   "$estadores");
define ("Edit19",   "$telefone");
define ("Edit20",   "$carttrab");
define ("Edit21",   "$serie");
define ("Edit22",   "$emiscart");
define ("Edit23",   "$cargoassoc");
define ("Edit24",   "$datadimis");
define ("Edit25",   "$estcivil");
define ("Edit26",   "$numdep");
define ("Edit27",   "$mes");
define ("Edit28",   "$ano");
define ("Edit29",   "$cad_si");
define ("Edit30",   "$saldo");
define ("Edit31",   "$prest");
define ("Edit32",   "$pago");
define ("Edit33",   "$natural");
define ("Edit34",   "$datnasc");
define ("Edit35",   "$nascion");
define ("Edit36",   "$pai");
define ("Edit37",   "$mae");
define ("Edit38",   "$conjuge");
define ("Edit39",   "$datconj");
define ("Edit40",   "$filho01");
define ("Edit41",   "$dat01");
define ("Edit42",   "$sexo01");
define ("Edit43",   "$filho02");
define ("Edit44",   "$dat02");
define ("Edit45",   "$sexo02");
define ("Edit46",   "$filho03");
define ("Edit47",   "$dat03");
define ("Edit48",   "$sexo03");
define ("Edit49",   "$filho04");
define ("Edit50",   "$dat04");
define ("Edit51",   "$sexo04");
define ("Edit52",   "$filho05");
define ("Edit53",   "$dat05");
define ("Edit54",   "$sexo05");
define ("Edit55",   "$filho06");
define ("Edit56",   "$dat06");
define ("Edit57",   "$sexo06");
define ("Edit58",   "$filho07");
define ("Edit59",   "$dat07");
define ("Edit60",   "$sexo07");
define ("Edit61",   "$filho08");
define ("Edit62",   "$dat08");
define ("Edit63",   "$sexo08");
define ("Edit64",   "$filho09");
define ("Edit65",   "$dat09");
define ("Edit66",   "$sexo09");
define ("Edit67",   "$filho10");
define ("Edit68",   "$dat10");
define ("Edit69",   "$sexo10");
define ("Edit70",   "$obs");


?>

<html>


<style type=text/css>

body { background-image: url(<?php echo "../".$logo_sis ?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
--></style> 

<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; " onload="document.form1.Edit1.focus();" >
<form name="form1" type='hidden' method='POST' action='socpesquisa.php'>
<table  width="1000"   style="height:424px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 91px; WIDTH: 819px; POSITION: absolute; TOP: 45px; HEIGHT: 356px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 787 - 16, 324 - 16);
  Shape1_Canvas.fillRect(16, 16, 787 - 16 + 1, 324 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?php echo $color_bor ?>");
  Shape1_Canvas.drawRect(16, 16, 787 - 16 + 1, 324 - 16 + 1);
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
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?php echo $color_bor ?>; background-color: #FFFFFF;height:32px;width:283px;"   ><STRONG>Cadastro de&nbsp;Socios</STRONG></div>
</div>
<div id="Menssage_outer" style="Z-INDEX: 3; LEFT: 613px; WIDTH: 208px; POSITION: absolute; TOP: 95px; HEIGHT: 24px">
<div id="Menssage" style=" font-family: Verdana; color: #FF0000; font-size: 14px;  height:24px;width:208px;"  align="Center"   ><STRONG>*** Consulta ***</STRONG></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 4; LEFT: 124px; WIDTH: 752px; POSITION: absolute; TOP: 136px; HEIGHT: 232px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 750 - 1, 230 - 1);
  Shape3_Canvas.fillRect(1, 1, 750 - 1 + 1, 230 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?php echo $color_bor ?>");
  Shape3_Canvas.drawRect(1, 1, 750 - 1 + 1, 230 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 5; LEFT: 131px; WIDTH: 64px; POSITION: absolute; TOP: 155px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #FF0000;font-weight: normal; height:26px;width:64px;"   ><STRONG>Codigo</STRONG></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 225px; WIDTH: 56px; POSITION: absolute; TOP: 151px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?php echo $Edit1 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:56px;"    tabindex="0"    />
</div>
<div id="Edit2_outer" style="Z-INDEX: 7; LEFT: 283px; WIDTH: 33px; POSITION: absolute; TOP: 151px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="<?php echo $Edit2 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:33px;" style="text-transform: uppercase;"   tabindex="0"    />
</div>
<div id="Label3_outer" style="Z-INDEX: 8; LEFT: 384px; WIDTH: 32px; POSITION: absolute; TOP: 155px; HEIGHT: 18px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #FF0000;font-weight: normal; height:18px;width:32px;"   ><STRONG>RG:.</STRONG></div>
</div>
<div id="Edit3_outer" style="Z-INDEX: 9; LEFT: 417px; WIDTH: 137px; POSITION: absolute; TOP: 151px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?php echo $Edit3 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:137px;"  style="text-transform: uppercase;"  tabindex="0"    />
</div>
<div id="Label4_outer" style="Z-INDEX: 10; LEFT: 592px; WIDTH: 47px; POSITION: absolute; TOP: 155px; HEIGHT: 18px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #FF0000;font-weight: normal; height:18px;width:47px;"   ><STRONG>CPF:.</STRONG></div>
</div>
<div id="Edit4_outer" style="Z-INDEX: 11; LEFT: 634px; WIDTH: 137px; POSITION: absolute; TOP: 151px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="<?php echo $Edit4 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:137px;"  style="text-transform: uppercase;"  tabindex="0"    />
</div>
<div id="Label5_outer" style="Z-INDEX: 12; LEFT: 131px; WIDTH: 96px; POSITION: absolute; TOP: 179px; HEIGHT: 26px">
<div id="Label5" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:96px;"   > <STRONG>Data Insc.:</STRONG> </div>
</div>
<div id="Edit5_outer" style="Z-INDEX: 13; LEFT: 225px; WIDTH: 91px; POSITION: absolute; TOP: 175px; HEIGHT: 26px">
<input type="text" id="Edit5" name="Edit5" value="" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;" disabled  style="text-transform: uppercase;" tabindex="0"    />
</div>
<div id="Label6_outer" style="Z-INDEX: 14; LEFT: 320px; WIDTH: 96px; POSITION: absolute; TOP: 179px; HEIGHT: 26px">
<div id="Label6" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:96px;"   > <STRONG>Data Saida.:</STRONG> </div>
</div>
<div id="Edit6_outer" style="Z-INDEX: 15; LEFT: 417px; WIDTH: 91px; POSITION: absolute; TOP: 175px; HEIGHT: 26px">
<input type="text" id="Edit6" name="Edit6" value="" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;" disabled  style="text-transform: uppercase;" tabindex="0"    />
</div>
<div id="Label7_outer" style="Z-INDEX: 16; LEFT: 515px; WIDTH: 128px; POSITION: absolute; TOP: 179px; HEIGHT: 26px">
<div id="Label7" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:128px;"   > <STRONG>Data Retorno.:</STRONG> </div>
</div>
<div id="Edit7_outer" style="Z-INDEX: 17; LEFT: 634px; WIDTH: 91px; POSITION: absolute; TOP: 175px; HEIGHT: 26px">
<input type="text" id="Edit7" name="Edit7" value="" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;" disabled style="text-transform: uppercase;"  tabindex="0"    />
</div>
<div id="Image1_outer" style="Z-INDEX: 18; LEFT: 749px; WIDTH: 112px; POSITION: absolute; TOP: 179px; HEIGHT: 146px">
<div id="Image1_container" style=" width: 112;  height: 146; overflow: hidden;" ><img id="Image1" src="<?php echo $cami2 ?>"  width="107"  height="137"  border="1"  style=" border-color: #000000 "       /></div>
</div>
<div id="Label8_outer" style="Z-INDEX: 19; LEFT: 131px; WIDTH: 96px; POSITION: absolute; TOP: 203px; HEIGHT: 26px">
<div id="Label8" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:96px;"   > <STRONG>Sede.:</STRONG> </div>
</div>
<div id="Edit8_outer" style="Z-INDEX: 20; LEFT: 225px; WIDTH: 159px; POSITION: absolute; TOP: 199px; HEIGHT: 26px">
<input type="text" id="Edit8" name="Edit8" value="" style=" font-family: Verdana; font-size: 14px;  height:25px;width:159px;" disabled   tabindex="0"    />
</div>
<div id="Label9_outer" style="Z-INDEX: 21; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 228px; HEIGHT: 26px">
<div id="Label9" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Categoria.:</STRONG>&nbsp;</div>
</div>
<div id="Edit9_outer" style="Z-INDEX: 22; LEFT: 225px; WIDTH: 28px; POSITION: absolute; TOP: 223px; HEIGHT: 26px">
<input type="text" id="Edit9" name="Edit9" value="" style=" font-family: Verdana; font-size: 14px;  height:25px;width:28px;" disabled   tabindex="0"    />
</div>
<div id="Label10_outer" style="Z-INDEX: 23; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 252px; HEIGHT: 26px">
<div id="Label10" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Cod. Edif.:</STRONG>&nbsp;</div>
</div>
<div id="Edit10_outer" style="Z-INDEX: 24; LEFT: 225px; WIDTH: 55px; POSITION: absolute; TOP: 247px; HEIGHT: 26px">
<input type="text" id="Edit10" name="Edit10" value="" style=" font-family: Verdana; font-size: 14px;  height:25px;width:55px;" disabled   tabindex="0"    />
</div>
<div id="Label11_outer" style="Z-INDEX: 25; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 276px; HEIGHT: 26px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #FF0000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Nome.:</STRONG>&nbsp;</div>
</div>
<div id="Edit11_outer" style="Z-INDEX: 26; LEFT: 225px; WIDTH: 423px; POSITION: absolute; TOP: 271px; HEIGHT: 26px">
<input type="text" id="Edit11" name="Edit11" value="<?php echo $Edit11 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:423px;"  style="text-transform: uppercase;"  tabindex="0"    />
</div>
<div id="Label12_outer" style="Z-INDEX: 27; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 300px; HEIGHT: 26px">
<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #FF0000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Endereço.:</STRONG>&nbsp;</div>
</div>
<div id="Edit12_outer" style="Z-INDEX: 28; LEFT: 225px; WIDTH: 127px; POSITION: absolute; TOP: 295px; HEIGHT: 26px">
<input type="text" id="Edit12" name="Edit12" value="<?php echo $Edit12 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:127px;" disabled style="text-transform: uppercase;"   tabindex="0"    />
</div>
<div id="Edit13_outer" style="Z-INDEX: 29; LEFT: 352px; WIDTH: 385px; POSITION: absolute; TOP: 295px; HEIGHT: 26px">
<input type="text" id="Edit13" name="Edit13" value="<?php echo $Edit13 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:385px;" style="text-transform: uppercase;"  tabindex="0"    />
</div>
<div id="Label69_outer" style="Z-INDEX: 30; LEFT: 774px; WIDTH: 77px; POSITION: absolute; TOP: 156px; HEIGHT: 20px">
<div id="Label69" style=" font-family: Verdana; font-size: 13px; color: #4682B4; height:20px;width:77px;"   ><A HREF="http://receita.fazenda.gov.br/Aplicacoes/ATCTA/cpf/ConsultaPublica.asp"  >Clique Aqui</A></div>
</div>
</td></tr></table>


<div style="Z-INDEX: 34; LEFT: 125px; WIDTH: 544px; POSITION: absolute; TOP: 328px; HEIGHT: 80px">
<table border='0' aling=center>

          <td> 

          <input type="radio" Name="receber" Value="1"><b>Codigo</b>
          <input type="radio" Name="receber" Value="2"><b>RG</b>
          <input type="radio" Name="receber" Value="3"><b>CPF</b>
          <input type="radio" Name="receber" Value="4"><b>Nome</b>
          <input type="radio" Name="receber" Value="5"><b>Endereço</b>&nbsp;&nbsp;&nbsp;&nbsp;
          <td><input type=image name="guias" src="../imagens/botaoazul7.PNG"></td>

         </form>

          <form method="POST" action="cadsocios.php">
          <td><input type=image name="socios" src="../imagens/botaoazul9.PNG"></td>
          </form>


</table>


</div>
</table>
</div>

</form></body>
</html>
