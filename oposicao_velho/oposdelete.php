<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Excluir Cadastro Oposicao
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

require($path."logar.php");
$nome3 = $_SESSION["nome_log"];

require("menu.php");

?>

<html>
<head>
<title><?=$Titulo;?></title>
</head>
<body>

<?


// Resgata Sessao
session_name("Val_Opos");
session_start();


$Edit1    = strtoupper($_SESSION['Edit1']);
$Edit2    = strtoupper($_SESSION['Edit2']);
$Edit3    = strtoupper($_SESSION['Edit3']);
$Edit4    = strtoupper($_SESSION['Edit4']);
$Edit5    = strtoupper($_SESSION['Edit5']);
$Edit6    = strtoupper($_SESSION['Edit6']);
$Edit7    = strtoupper($_SESSION['Edit7']);
$Edit8    = strtoupper($_SESSION['Edit8']);
$Edit9    = strtoupper($_SESSION['Edit9']);
$Edit10   = strtoupper($_SESSION['Edit10']);
$Edit11   = strtoupper($_SESSION['Edit11']);
$Edit12   = strtoupper($_SESSION['Edit12']);
$Edit13   = strtoupper($_SESSION['Edit13']);
$Edit14   = strtoupper($_SESSION['Edit14']);
$Edit15   = strtoupper($_SESSION['Edit15']);

$menssagem  = "* * * Excluido * * *";

// Abre Conexão com o MySql
include($path."conexao.php");
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
     <td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
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
     <td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

// retorna uma pesquisa


$consulta = "DELETE FROM oposicao3 WHERE COD = '$cod_1'";


@mysql_query($consulta, $link) or


die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Falha na Exclusão !!! ***</b>
     <table align=center>
     <form method='POST' action='cadopos.php'>
     <td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = $menssagem."/".$Edit1;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);


require("funcoes2.php");

?>

<html>


<style type=text/css>

body { background-image: url(<?=$logo_sis;?>);}

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

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "  >
<form type="hidden" method="POST" action="oposdelete.php?cod_1=<?=$Edit1;?>">

<table  width="1000"   style="height:600px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 141px; WIDTH: 724px; POSITION: absolute; TOP: 44px; HEIGHT: 524px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 692 - 16, 474 - 16);
  Shape1_Canvas.fillRect(16, 16, 692 - 16 + 1, 474 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(16, 16, 692 - 16 + 1, 474 - 16 + 1);
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
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 183px; WIDTH: 329px; POSITION: absolute; TOP: 90px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: #5A9CB1;font-weight: bold; background-color: #FFFFFF;height:32px;width:329px;"   >Cadastro de&nbsp;Oposição</div>
</div>
<div id="Menssage_outer" style="Z-INDEX: 3; LEFT: 614px; WIDTH: 208px; POSITION: absolute; TOP: 95px; HEIGHT: 24px">
<div id="Menssage" style=" font-family: Verdana; font-size: 14px;  height:24px;width:208px;"  align="Center"   ><STRONG><?=$menssagens;?></STRONG></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 4; LEFT: 174px; WIDTH: 658px; POSITION: absolute; TOP: 133px; HEIGHT: 402px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 656 - 1, 382 - 1);
  Shape3_Canvas.fillRect(1, 1, 656 - 1 + 1, 382 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 656 - 1 + 1, 382 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 5; LEFT: 181px; WIDTH: 64px; POSITION: absolute; TOP: 144px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: bold; height:26px;width:64px;"   >Codigo.:</div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 278px; WIDTH: 56px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:56px;" disabled   tabindex="0"    />
</div>
<div id="Label3_outer" style="Z-INDEX: 7; LEFT: 382px; WIDTH: 84px; POSITION: absolute; TOP: 144px; HEIGHT: 18px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:84px;"   ><STRONG>R.G.:</STRONG></div>
</div>
<div id="Edit2_outer" style="Z-INDEX: 8; LEFT: 470px; WIDTH: 137px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="<?=$Edit2;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:137px;"  disabled  tabindex="1"    />
</div>
<div id="Label4_outer" style="Z-INDEX: 9; LEFT: 676px; WIDTH: 47px; POSITION: absolute; TOP: 144px; HEIGHT: 18px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:47px;"   ><STRONG>Data.:</STRONG></div>
</div>
<div id="Edit3_outer" style="Z-INDEX: 10; LEFT: 729px; WIDTH: 93px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?=$Edit3;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:93px;"  disabled  tabindex="2"    />
</div>
<div id="Label11_outer" style="Z-INDEX: 11; LEFT: 181px; WIDTH: 89px; POSITION: absolute; TOP: 196px; HEIGHT: 26px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Sede.:</STRONG></div>
</div>
<div id="Edit7_outer" style="Z-INDEX: 12; LEFT: 565px; WIDTH: 42px; POSITION: absolute; TOP: 190px; HEIGHT: 26px">
<input type="text" id="Edit7" name="Edit7" value="<?=$Edit7;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:42px;"  disabled  tabindex="4"    />
</div>
<div id="Label12_outer" style="Z-INDEX: 13; LEFT: 181px; WIDTH: 89px; POSITION: absolute; TOP: 220px; HEIGHT: 26px">
<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Cod. Edif.:</STRONG></div>
</div>
<div id="Edit8_outer" style="Z-INDEX: 14; LEFT: 278px; WIDTH: 66px; POSITION: absolute; TOP: 215px; HEIGHT: 26px">
<input type="text" id="Edit8" name="Edit8" value="<?=$Edit8;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:66px;"  disabled  tabindex="5"    />
</div>
<div id="Label13_outer" style="Z-INDEX: 15; LEFT: 181px; WIDTH: 89px; POSITION: absolute; TOP: 245px; HEIGHT: 26px">
<div id="Label13" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>CNPJ.:</STRONG></div>
</div>
<div id="Edit9_outer" style="Z-INDEX: 16; LEFT: 278px; WIDTH: 193px; POSITION: absolute; TOP: 239px; HEIGHT: 26px">
<input type="text" id="Edit9" name="Edit9" value="<?=$Edit9;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px;"  disabled  tabindex="6"    />
</div>
<div id="Label15_outer" style="Z-INDEX: 17; LEFT: 181px; WIDTH: 99px; POSITION: absolute; TOP: 268px; HEIGHT: 26px">
<div id="Label15" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:99px;"   ><STRONG>Cod. Adm.:</STRONG></div>
</div>
<div id="Edit10_outer" style="Z-INDEX: 18; LEFT: 278px; WIDTH: 66px; POSITION: absolute; TOP: 263px; HEIGHT: 26px">
<input type="text" id="Edit10" name="Edit10" value="<?=$Edit10;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:66px;"  disabled  tabindex="7"    />
</div>
<div id="Label16_outer" style="Z-INDEX: 19; LEFT: 181px; WIDTH: 70px; POSITION: absolute; TOP: 293px; HEIGHT: 21px">
<div id="Label16" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:70px;"   ><STRONG>Matricula.:</STRONG></div>
</div>
<div id="Edit11_outer" style="Z-INDEX: 20; LEFT: 278px; WIDTH: 66px; POSITION: absolute; TOP: 288px; HEIGHT: 26px">
<input type="text" id="Edit11" name="Edit11" value="<?=$Edit11;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:66px;"  disabled  tabindex="8"    />
</div>
<div id="Edit12_outer" style="Z-INDEX: 21; LEFT: 345px; WIDTH: 31px; POSITION: absolute; TOP: 288px; HEIGHT: 26px">
<input type="text" id="Edit12" name="Edit12" value="<?=$Edit12;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:31px;"  disabled  tabindex="9"    />
</div>
<div id="Label22_outer" style="Z-INDEX: 22; LEFT: 181px; WIDTH: 107px; POSITION: absolute; TOP: 318px; HEIGHT: 26px">
<div id="Label22" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:107px;"   ><STRONG>Nome.:</STRONG></div>
</div>
<div id="Edit13_outer" style="Z-INDEX: 23; LEFT: 278px; WIDTH: 458px; POSITION: absolute; TOP: 313px; HEIGHT: 26px">
<input type="text" id="Edit13" name="Edit13" value="<?=$Edit13;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:458px;"  disabled  tabindex="10"    />
</div>
<div id="Label26_outer" style="Z-INDEX: 24; LEFT: 181px; WIDTH: 103px; POSITION: absolute; TOP: 342px; HEIGHT: 26px">
<div id="Label26" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:103px;"   ><STRONG>Endereço.:</STRONG></div>
</div>
<div id="Label68_outer" style="Z-INDEX: 25; LEFT: 180px; WIDTH: 103px; POSITION: absolute; TOP: 367px; HEIGHT: 24px">
<div id="Label68" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:103px;"   ><STRONG>Observação:</STRONG></div>
</div>
<div id="Edit15_outer" style="Z-INDEX: 26; LEFT: 278px; WIDTH: 544px; POSITION: absolute; TOP: 363px; HEIGHT: 80px">
<textarea id="Edit15" name="Edit15" style=" font-family: Verdana; font-size: 14px;  height:79px;width:544px;" disabled   tabindex="12"    wrap="virtual"><?=$Edit15;?></textarea>
</div>
<div id="Edit6_outer" style="Z-INDEX: 27; LEFT: 278px; WIDTH: 193px; POSITION: absolute; TOP: 190px; HEIGHT: 26px">
<input type="text" id="Edit6" name="Edit6" value="<?=$Edit6;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px;"  disabled  tabindex="3"    />
</div>
<div id="Edit14_outer" style="Z-INDEX: 28; LEFT: 278px; WIDTH: 458px; POSITION: absolute; TOP: 338px; HEIGHT: 26px">
<input type="text" id="Edit14" name="Edit14" value="<?=$Edit14;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:458px;"  disabled  tabindex="11"    />
</div>
<div id="Label7_outer" style="Z-INDEX: 29; LEFT: 474px; WIDTH: 86px; POSITION: absolute; TOP: 195px; HEIGHT: 18px">
<div id="Label7" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:86px;"   ><STRONG>Categoria.:</STRONG></div>
</div>
<div id="Label8_outer" style="Z-INDEX: 30; LEFT: 347px; WIDTH: 389px; POSITION: absolute; TOP: 219px; HEIGHT: 18px">
<div id="Label8" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:389px;"   ><FONT color=#0000ff><?=$nome_do_edif;?></FONT></div>
</div>
<div id="Label9_outer" style="Z-INDEX: 31; LEFT: 347px; WIDTH: 459px; POSITION: absolute; TOP: 269px; HEIGHT: 18px">
<div id="Label9" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:459px;"   ><FONT color=#0000ff><?=$nome2_adms;?></FONT></div>
</div>
<div id="Label5_outer" style="Z-INDEX: 32; LEFT: 611px; WIDTH: 215px; POSITION: absolute; TOP: 196px; HEIGHT: 18px">
<div id="Label5" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:215px;"   ><FONT color=#0000ff><?=$categ_1;?></FONT></div>
</div>
<div id="Label6_outer" style="Z-INDEX: 33; LEFT: 183px; WIDTH: 105px; POSITION: absolute; TOP: 169px; HEIGHT: 18px">
<div id="Label6" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:105px;"   ><STRONG>Data Saida.:</STRONG></div>
</div>
<div id="Edit4_outer" style="Z-INDEX: 34; LEFT: 278px; WIDTH: 93px; POSITION: absolute; TOP: 165px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="<?=$Edit4;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:93px;" disabled   tabindex="2"    />
</div>
<div id="Label10_outer" style="Z-INDEX: 35; LEFT: 382px; WIDTH: 84px; POSITION: absolute; TOP: 169px; HEIGHT: 18px">
<div id="Label10" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:84px;"   ><STRONG>C.P.F.:</STRONG></div>
</div>
<div id="Edit5_outer" style="Z-INDEX: 36; LEFT: 470px; WIDTH: 137px; POSITION: absolute; TOP: 165px; HEIGHT: 26px">
<input type="text" id="Edit5" name="Edit5" value="<?=$Edit5;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:137px;"  disabled  tabindex="1"    />
</div>
<div id="Label14_outer" style="Z-INDEX: 37; LEFT: 503px; WIDTH: 65px; POSITION: absolute; TOP: 106px; HEIGHT: 22px">
<div id="Label14" style=" font-family: Verdana; font-size: 15px; color: #5A9CB1;font-weight: bold; background-color: #FFFFFF;height:22px;width:65px;"   >Carta</div>
</div>
</td></tr></table>
</form></body>
</html>

<div style="Z-INDEX: 34; LEFT: 179px; WIDTH: 544px; POSITION: absolute; TOP: 463px; HEIGHT: 80px">
<table border='0' aling=center>
          <td> </td>

          <form method="POST" action="cadopos.php?cod_1=<?=$Edit1;?>">
          <td><input type=image name="socios" src="imagens/botao_voltar.PNG"></td>
          </form>

</table>
</div>

<?

// echo "<b>Dados atualizados com sucesso";


?>
</body>
</html>