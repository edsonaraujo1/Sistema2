<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Deletar Cadastro
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

$nome3 = $_SESSION["nome_log"];

// include("../logar.php");

include("menu.php");

include("vaurls.php");

$deixar = acesso_url("CADASTRO");

if ($deixar == "SIM"){

// Regata Secao
session_start();
$id_navega = $_SESSION['navega'];

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
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>
<body>

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

</body>
</html>

<?php

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass)
        or

die("

     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Não foi possivel conectar !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

@mysql_select_db($db)
        or

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Não Foi possivel selecionar o banco de dados !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

// Abrir tabela Senha

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado3 = @mysql_query($consulta3);

$row3 = mysql_fetch_array($resultado3);

$aco1       = @$row3["aco1"];
$aco2       = @$row3["aco2"];
$aco3       = @$row3["aco3"];


if ($aco3 == "NAO")
{
   include("cadastro.php");
}

else
{

// retorna uma pesquisa

if (!empty($Cod_2)){
	
   $consulta  = "SELECT * FROM acompa Where id = '$Cod_2'";
	
}

if (!empty($id_navega)){

   $consulta  = "SELECT * FROM acompa Where id = '$id_navega'";
	
}

//echo $Cod_2."<br>";
//echo $id_navega."<br>";

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id      = @$row["id"];

if (empty($id)){
	
   $consulta  = "SELECT * FROM acompa Where id = '$id_navega'";
	
}

$resultado = @mysql_query($consulta);

$row = mysql_fetch_array($resultado);

$id     = @$row["id"];
$Edit1  = @$row["N_SOCIO"];
$Edit2  = @$row["RG"];
$Edit3  = @$row["CIC"];
$Edit4  = @$row["CART_TRAB"];
$Edit5  = @$row["NOME_SOC"];
$Edit6  = @$row["END_SOC"];
$Edit7  = @$row["CEP_SOC"];
$Edit8  = @$row["EST_SOC"];
$Edit9  = @$row["FONE_SOC"];
$Edit10 = @$row["N_EDIF"];
$Edit11 = @$row["NOME_EDI"];
$Edit12 = @$row["END_EDI"];
$Edit13 = @$row["CEP_EDI"];
$Edit14 = @$row["FONE_EDI"];
$Edit15 = @$row["OBJETO"];
$Edit16 = @$row["JCJ"];
$Edit17 = @$row["PROC_N"];
$Edit18 = @$row["ANO_N"];
$Edit19 = @$row["N_ADV_1"];
$Edit20 = @$row["TRT"];
$Edit21 = @$row["EM_TRT"];
$Edit22 = @$row["NO_AD_1"];
$Edit23 = @$row["TST"];
$Edit24 = @$row["EM_TST"];
$Edit25 = @$row["N_ADV_2"];
$Edit26 = @$row["SOLUCAO"];
$Edit27 = @$row["SOL_EM"];
$Edit28 = @$row["NO_AD_2"];
$Edit29 = @$row["ASSUNTO"]." ".@$row["ASSU_1"];
$Edit30 = @$row["ASSU_1"];

$menssagens = "* * * Excluir * * *";

include("funcoes2.php");
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


<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "  >
<form style="margin-bottom: 0" id="Unit2" name="Unit2" method="post"  action="/acompanhalayout.php">
<table  width="1000"   style="height:600px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 141px; WIDTH: 724px; POSITION: absolute; TOP: 44px; HEIGHT: 541px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 692 - 16, 509 - 16);
  Shape1_Canvas.fillRect(16, 16, 692 - 16 + 1, 509 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?php echo $color_bor ?>");
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
  Shape2_Canvas.setColor("<?php echo $color_bor ?>");
  Shape2_Canvas.drawRect(1, 1, 656 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 183px; WIDTH: 449px; POSITION: absolute; TOP: 90px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 22px; color: <?php echo $color_bor ?>; background-color: #FFFFFF;height:32px;width:449px;"   ><STRONG>Cadastro de&nbsp;Acompanhamento</STRONG></div>
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
  Shape3_Canvas.setColor("<?php echo $color_bor ?>");
  Shape3_Canvas.drawRect(1, 1, 656 - 1 + 1, 417 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 5; LEFT: 181px; WIDTH: 91px; POSITION: absolute; TOP: 144px; HEIGHT: 24px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:91px;"   ><STRONG>No Socio.:</STRONG></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 278px; WIDTH: 77px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?php echo $Edit1 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:77px; background-color: #FFFFFF;" disabled   tabindex="1"    />
</div>
<div id="Label3_outer" style="Z-INDEX: 7; LEFT: 359px; WIDTH: 57px; POSITION: absolute; TOP: 144px; HEIGHT: 18px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:57px;"   ><STRONG>R.G.:</STRONG></div>
</div>
<div id="Edit2_outer" style="Z-INDEX: 8; LEFT: 400px; WIDTH: 163px; POSITION: absolute; TOP: 139px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="<?php echo $Edit2 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:163px; background-color: #FFFFFF;" disabled   tabindex="2"    />
</div>
<div id="Label4_outer" style="Z-INDEX: 9; LEFT: 597px; WIDTH: 51px; POSITION: absolute; TOP: 144px; HEIGHT: 18px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:51px;"   ><STRONG>CPF.:</STRONG></div>
</div>
<div id="Edit3_outer" style="Z-INDEX: 10; LEFT: 640px; WIDTH: 182px; POSITION: absolute; TOP: 139px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?php echo $Edit3 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:182px; background-color: #FFFFFF;" disabled   tabindex="3"    />
</div>
<div id="Label5_outer" style="Z-INDEX: 25; LEFT: 181px; WIDTH: 91px; POSITION: absolute; TOP: 170px; HEIGHT: 24px">
<div id="Label5" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:91px;"   ><STRONG>CTPS.:</STRONG></div>
</div>
<div id="Edit4_outer" style="Z-INDEX: 26; LEFT: 278px; WIDTH: 122px; POSITION: absolute; TOP: 166px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="<?php echo $Edit4 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:122px; background-color: #FFFFFF;" disabled   tabindex="1"    />
</div>
<div id="Label6_outer" style="Z-INDEX: 27; LEFT: 405px; WIDTH: 67px; POSITION: absolute; TOP: 169px; HEIGHT: 18px">
<div id="Label6" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:67px;"   ><STRONG>Nome.:</STRONG></div>
</div>
<div id="Edit5_outer" style="Z-INDEX: 28; LEFT: 462px; WIDTH: 360px; POSITION: absolute; TOP: 165px; HEIGHT: 26px">
<input type="text" id="Edit5" name="Edit5" value="<?php echo $Edit5 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:360px; background-color: #FFFFFF;" disabled   tabindex="3"    />
</div>
<div id="Label7_outer" style="Z-INDEX: 29; LEFT: 184px; WIDTH: 104px; POSITION: absolute; TOP: 196px; HEIGHT: 18px">
<div id="Label7" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:104px;"   ><STRONG>Endereco.:</STRONG></div>
</div>
<div id="Edit6_outer" style="Z-INDEX: 30; LEFT: 278px; WIDTH: 370px; POSITION: absolute; TOP: 192px; HEIGHT: 26px">
<input type="text" id="Edit6" name="Edit6" value="<?php echo $Edit6 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:370px; background-color: #FFFFFF;" disabled   tabindex="3"    />
</div>
<div id="Label8_outer" style="Z-INDEX: 31; LEFT: 661px; WIDTH: 51px; POSITION: absolute; TOP: 196px; HEIGHT: 24px">
<div id="Label8" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:51px;"   ><STRONG>CEP.:</STRONG></div>
</div>
<div id="Edit7_outer" style="Z-INDEX: 32; LEFT: 706px; WIDTH: 117px; POSITION: absolute; TOP: 192px; HEIGHT: 26px">
<input type="text" id="Edit7" name="Edit7" value="<?php echo $Edit7 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px; background-color: #FFFFFF;" disabled   tabindex="1"    />
</div>
<div id="Label9_outer" style="Z-INDEX: 33; LEFT: 184px; WIDTH: 88px; POSITION: absolute; TOP: 223px; HEIGHT: 18px">
<div id="Label9" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:88px;"   ><STRONG>Estado.:</STRONG></div>
</div>
<div id="Edit8_outer" style="Z-INDEX: 34; LEFT: 278px; WIDTH: 182px; POSITION: absolute; TOP: 218px; HEIGHT: 26px">
<input type="text" id="Edit8" name="Edit8" value="<?php echo $Edit8 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:182px; background-color: #FFFFFF;" disabled   tabindex="3"    />
</div>
<div id="Label10_outer" style="Z-INDEX: 35; LEFT: 472px; WIDTH: 56px; POSITION: absolute; TOP: 223px; HEIGHT: 18px">
<div id="Label10" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:56px;"   ><STRONG>Fone:</STRONG></div>
</div>
<div id="Edit9_outer" style="Z-INDEX: 36; LEFT: 520px; WIDTH: 303px; POSITION: absolute; TOP: 218px; HEIGHT: 26px">
<input type="text" id="Edit9" name="Edit9" value="<?php echo $Edit9 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:303px; background-color: #FFFFFF;" disabled   tabindex="3"    />
</div>
<div id="Label11_outer" style="Z-INDEX: 37; LEFT: 182px; WIDTH: 91px; POSITION: absolute; TOP: 248px; HEIGHT: 24px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:91px;"   ><STRONG>No Edif.:</STRONG></div>
</div>
<div id="Edit10_outer" style="Z-INDEX: 38; LEFT: 278px; WIDTH: 77px; POSITION: absolute; TOP: 244px; HEIGHT: 26px">
<input type="text" id="Edit10" name="Edit10" value="<?php echo $Edit10 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:77px; background-color: #FFFFFF;" disabled   tabindex="1"    />
</div>
<div id="Label12_outer" style="Z-INDEX: 39; LEFT: 359px; WIDTH: 57px; POSITION: absolute; TOP: 248px; HEIGHT: 18px">
<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:57px;"   ><STRONG>Nome.:</STRONG></div>
</div>
<div id="Edit11_outer" style="Z-INDEX: 40; LEFT: 416px; WIDTH: 407px; POSITION: absolute; TOP: 244px; HEIGHT: 26px">
<input type="text" id="Edit11" name="Edit11" value="<?php echo $Edit11 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:407px; background-color: #FFFFFF;" disabled   tabindex="2"    />
</div>
<div id="Label13_outer" style="Z-INDEX: 41; LEFT: 184px; WIDTH: 104px; POSITION: absolute; TOP: 274px; HEIGHT: 18px">
<div id="Label13" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:104px;"   ><STRONG>Endereco.:</STRONG></div>
</div>
<div id="Edit12_outer" style="Z-INDEX: 42; LEFT: 278px; WIDTH: 370px; POSITION: absolute; TOP: 270px; HEIGHT: 26px">
<input type="text" id="Edit12" name="Edit12" value="<?php echo $Edit12 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:370px; background-color: #FFFFFF;" disabled   tabindex="3"    />
</div>
<div id="Label14_outer" style="Z-INDEX: 43; LEFT: 661px; WIDTH: 51px; POSITION: absolute; TOP: 274px; HEIGHT: 24px">
<div id="Label14" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:51px;"   ><STRONG>CEP.:</STRONG></div>
</div>
<div id="Edit13_outer" style="Z-INDEX: 44; LEFT: 706px; WIDTH: 117px; POSITION: absolute; TOP: 270px; HEIGHT: 26px">
<input type="text" id="Edit13" name="Edit13" value="<?php echo $Edit13 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px; background-color: #FFFFFF;" disabled   tabindex="1"    />
</div>
<div id="Label15_outer" style="Z-INDEX: 45; LEFT: 184px; WIDTH: 102px; POSITION: absolute; TOP: 301px; HEIGHT: 18px">
<div id="Label15" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:102px;"   ><STRONG>Fone:</STRONG></div>
</div>
<div id="Edit14_outer" style="Z-INDEX: 46; LEFT: 278px; WIDTH: 186px; POSITION: absolute; TOP: 296px; HEIGHT: 26px">
<input type="text" id="Edit14" name="Edit14" value="<?php echo $Edit14 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:186px; background-color: #FFFFFF;" disabled   tabindex="3"    />
</div>
<div id="Label16_outer" style="Z-INDEX: 47; LEFT: 478px; WIDTH: 202px; POSITION: absolute; TOP: 301px; HEIGHT: 18px">
<div id="Label16" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:202px;"   ><STRONG>Objeto da Reclamacao.:</STRONG></div>
</div>
<div id="Edit15_outer" style="Z-INDEX: 48; LEFT: 672px; WIDTH: 152px; POSITION: absolute; TOP: 296px; HEIGHT: 26px">
<input type="text" id="Edit15" name="Edit15" value="<?php echo $Edit15 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:152px; background-color: #FFFFFF;" disabled   tabindex="3"    />
</div>
<div id="Edit16_outer" style="Z-INDEX: 49; LEFT: 184px; WIDTH: 88px; POSITION: absolute; TOP: 322px; HEIGHT: 26px">
<input type="text" id="Edit16" name="Edit16" value="<?php echo $Edit16 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:88px; background-color: #FFFFFF;" disabled   tabindex="3"    />
</div>
<div id="Label17_outer" style="Z-INDEX: 50; LEFT: 272px; WIDTH: 144px; POSITION: absolute; TOP: 325px; HEIGHT: 18px">
<div id="Label17" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:144px;"   ><STRONG>o J.C.J. - Proc. no</STRONG></div>
</div>
<div id="Edit17_outer" style="Z-INDEX: 51; LEFT: 416px; WIDTH: 64px; POSITION: absolute; TOP: 322px; HEIGHT: 26px">
<input type="text" id="Edit17" name="Edit17" value="<?php echo $Edit17 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:64px; background-color: #FFFFFF;" disabled   tabindex="3"    />
</div>
<div id="Label18_outer" style="Z-INDEX: 52; LEFT: 484px; WIDTH: 16px; POSITION: absolute; TOP: 325px; HEIGHT: 18px">
<div id="Label18" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:16px;"   ><STRONG>/</STRONG></div>
</div>
<div id="Edit18_outer" style="Z-INDEX: 53; LEFT: 496px; WIDTH: 64px; POSITION: absolute; TOP: 322px; HEIGHT: 26px">
<input type="text" id="Edit18" name="Edit18" value="<?php echo $Edit18 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:64px; background-color: #FFFFFF;" disabled   tabindex="3"    />
</div>
<div id="Label19_outer" style="Z-INDEX: 54; LEFT: 566px; WIDTH: 153px; POSITION: absolute; TOP: 326px; HEIGHT: 24px">
<div id="Label19" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:153px;"   ><STRONG>No Advogado(a).:</STRONG></div>
</div>
<div id="Edit19_outer" style="Z-INDEX: 55; LEFT: 707px; WIDTH: 117px; POSITION: absolute; TOP: 322px; HEIGHT: 26px">
<input type="text" id="Edit19" name="Edit19" value="<?php echo $Edit19 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px; background-color: #FFFFFF;" disabled   tabindex="1"    />
</div>
<div id="Label20_outer" style="Z-INDEX: 56; LEFT: 182px; WIDTH: 91px; POSITION: absolute; TOP: 350px; HEIGHT: 24px">
<div id="Label20" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:91px;"   ><STRONG>T.R.T. no</STRONG></div>
</div>
<div id="Edit20_outer" style="Z-INDEX: 57; LEFT: 278px; WIDTH: 58px; POSITION: absolute; TOP: 346px; HEIGHT: 26px">
<input type="text" id="Edit20" name="Edit20" value="<?php echo $Edit20 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:58px; background-color: #FFFFFF;" disabled   tabindex="1"    />
</div>
<div id="Label21_outer" style="Z-INDEX: 58; LEFT: 338px; WIDTH: 58px; POSITION: absolute; TOP: 350px; HEIGHT: 24px">
<div id="Label21" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:58px;"   ><STRONG>- em</STRONG></div>
</div>
<div id="Edit21_outer" style="Z-INDEX: 59; LEFT: 375px; WIDTH: 102px; POSITION: absolute; TOP: 347px; HEIGHT: 26px">
<input type="text" id="Edit21" name="Edit21" value="<?php echo $Edit21 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:102px; background-color: #FFFFFF;" disabled   tabindex="3"    />
</div>
<div id="Label22_outer" style="Z-INDEX: 60; LEFT: 480px; WIDTH: 56px; POSITION: absolute; TOP: 352px; HEIGHT: 18px">
<div id="Label22" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:56px;"   ><STRONG>Nome.:</STRONG></div>
</div>
<div id="Edit22_outer" style="Z-INDEX: 61; LEFT: 536px; WIDTH: 288px; POSITION: absolute; TOP: 347px; HEIGHT: 26px">
<input type="text" id="Edit22" name="Edit22" value="<?php echo $Edit22 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:288px; background-color: #FFFFFF;" disabled   tabindex="3"    />
</div>
<div id="Label23_outer" style="Z-INDEX: 62; LEFT: 182px; WIDTH: 91px; POSITION: absolute; TOP: 375px; HEIGHT: 24px">
<div id="Label23" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:91px;"   ><STRONG>T.R.T. no</STRONG></div>
</div>
<div id="Edit23_outer" style="Z-INDEX: 63; LEFT: 278px; WIDTH: 58px; POSITION: absolute; TOP: 371px; HEIGHT: 26px">
<input type="text" id="Edit23" name="Edit23" value="<?php echo $Edit23 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:58px; background-color: #FFFFFF;" disabled   tabindex="1"    />
</div>
<div id="Label24_outer" style="Z-INDEX: 64; LEFT: 338px; WIDTH: 58px; POSITION: absolute; TOP: 375px; HEIGHT: 24px">
<div id="Label24" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:58px;"   ><STRONG>- em</STRONG></div>
</div>
<div id="Edit24_outer" style="Z-INDEX: 65; LEFT: 375px; WIDTH: 102px; POSITION: absolute; TOP: 372px; HEIGHT: 26px">
<input type="text" id="Edit24" name="Edit24" value="<?php echo $Edit24 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:102px; background-color: #FFFFFF;" disabled   tabindex="3"    />
</div>
<div id="Label25_outer" style="Z-INDEX: 66; LEFT: 480px; WIDTH: 64px; POSITION: absolute; TOP: 377px; HEIGHT: 18px">
<div id="Label25" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:64px;"   ><STRONG>No Adv.</STRONG></div>
</div>
<div id="Edit25_outer" style="Z-INDEX: 67; LEFT: 536px; WIDTH: 80px; POSITION: absolute; TOP: 372px; HEIGHT: 26px">
<input type="text" id="Edit25" name="Edit25" value="<?php echo $Edit25 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:80px; background-color: #FFFFFF;" disabled   tabindex="3"    />
</div>
<div id="Label26_outer" style="Z-INDEX: 68; LEFT: 182px; WIDTH: 91px; POSITION: absolute; TOP: 400px; HEIGHT: 24px">
<div id="Label26" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:91px;"   ><STRONG>Situacao.:</STRONG></div>
</div>
<div id="Edit26_outer" style="Z-INDEX: 69; LEFT: 278px; WIDTH: 58px; POSITION: absolute; TOP: 396px; HEIGHT: 26px">
<input type="text" id="Edit26" name="Edit26" value="<?php echo $Edit26 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:58px; background-color: #FFFFFF;" disabled   tabindex="1"    />
</div>
<div id="Label27_outer" style="Z-INDEX: 70; LEFT: 338px; WIDTH: 58px; POSITION: absolute; TOP: 400px; HEIGHT: 24px">
<div id="Label27" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:58px;"   ><STRONG>- em</STRONG></div>
</div>
<div id="Edit27_outer" style="Z-INDEX: 71; LEFT: 375px; WIDTH: 102px; POSITION: absolute; TOP: 397px; HEIGHT: 26px">
<input type="text" id="Edit27" name="Edit27" value="<?php echo $Edit27 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:102px; background-color: #FFFFFF;" disabled   tabindex="3"    />
</div>
<div id="Label28_outer" style="Z-INDEX: 72; LEFT: 480px; WIDTH: 56px; POSITION: absolute; TOP: 402px; HEIGHT: 18px">
<div id="Label28" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:56px;"   ><STRONG>Nome.:</STRONG></div>
</div>
<div id="Edit28_outer" style="Z-INDEX: 73; LEFT: 536px; WIDTH: 288px; POSITION: absolute; TOP: 397px; HEIGHT: 26px">
<input type="text" id="Edit28" name="Edit28" value="<?php echo $Edit28 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:288px; background-color: #FFFFFF;" disabled   tabindex="3"    />
</div>
<div id="Label29_outer" style="Z-INDEX: 74; LEFT: 182px; WIDTH: 91px; POSITION: absolute; TOP: 425px; HEIGHT: 24px">
<div id="Label29" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:91px;"   ><STRONG>Assunto.:</STRONG></div>
</div>
<div id="Edit29_outer" style="Z-INDEX: 75; LEFT: 278px; WIDTH: 546px; POSITION: absolute; TOP: 422px; HEIGHT: 42px">
<textarea  id="Edit29" name="Edit29" style=" font-family: Verdana; font-size: 14px;  height:41px;width:546px; color: #696969; background-color: #FFFFFF;"" readonly   tabindex="1"  wrap="virtual" > <?php echo $Edit29 ?> </textarea>
</div>
</td></tr></table>
</form></body>

<div style="Z-INDEX: 34; LEFT: 185px; WIDTH: 544px; POSITION: absolute; TOP: 490px; HEIGHT: 80px">
<table border='0' aling=center>
          <td> </td>
          <form type="hidden" method="POST" action="delete.php?Cod_2=<?php echo $id ?>">
          <td><input type=image name="Deletar" src="../imagens/botaoazul4.PNG"></td>
          </form>

          <form method="POST" action="cadastro.php?Cod_xx=<?php echo $id_navega ?>">
          <td><input type=image name="Descartar" src="../imagens/botaoazul9.PNG"></td>
          </form>

</table>

</div>

</body>
</html>
<?php
}	
?>
<?php
}else{
	
include("enaaurlnp.php");
	
}
?>
