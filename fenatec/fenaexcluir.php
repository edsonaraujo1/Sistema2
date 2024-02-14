<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Deletar Cadastro Fenatec
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

?>

<html>
<head>
<title><?=$Titulo;?></title>
</head>
<body>
</html>

<?

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

$resultado3 = @mysql_query($consulta3)
       or

die("
     <br>
     <br>
     
	 <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Registro Não Encontrado !!! ***</b>
     <table align=center>
     <form method='POST' action='cadfenatec.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

$row3 = mysql_fetch_array($resultado3);

$adm1       = @$row3["adm1"];
$adm2       = @$row3["adm2"];
$adm3       = @$row3["adm3"];


if ($adm3 == "NAO")
{
   include("cadfenatec.php");
}

else
{


// retorna uma pesquisa

$consulta  = "SELECT * FROM fenatec Where Edit1 = $Cod_2";

$resultado = @mysql_query($consulta)
        or

die("
     <br>
     <br>
     
	 <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Registro Não Encontrado !!! ***</b>
     <table align=center>
     <form method='POST' action='cadfenatec.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

$row = mysql_fetch_array($resultado);

$id     = @$row["id"];
$Edit1  = @$row["Edit1"];
$Edit2  = @$row["Edit2"];
$Edit3  = @$row["Edit3"];
$Edit4  = @$row["Edit4"];
$Edit5  = @$row["Edit5"];
$Edit6  = @$row["Edit6"];
$Edit7  = @$row["Edit7"];
$Edit8  = @$row["Edit8"];
$Edit9  = @$row["Edit9"];
$Edit10 = @$row["Edit10"];
$Edit11 = @$row["Edit11"]; 
$Edit12 = @$row["Edit12"];
$Edit13 = @$row["Edit13"];
$Edit14 = @$row["Edit14"];
$Edit15 = @$row["Edit15"];

$menssagens = "* * * Excluir * * *";

// Salva Sessao
session_name("Val_fena");
session_start();

$_SESSION['Edit1']      = $Edit1;     
$_SESSION['Edit2']      = $Edit2;     
$_SESSION['Edit3']      = $Edit3;     
$_SESSION['Edit4']      = $Edit4;     
$_SESSION['Edit5']      = $Edit5;     
$_SESSION['Edit6']      = $Edit6;     
$_SESSION['Edit7']      = $Edit7;     
$_SESSION['Edit8']      = $Edit8;     
$_SESSION['Edit9']      = $Edit9;     
$_SESSION['Edit10']     = $Edit10;     
$_SESSION['Edit11']     = $Edit11;     
$_SESSION['Edit12']     = $Edit12;     
$_SESSION['Edit13']     = $Edit13;     
$_SESSION['Edit14']     = $Edit14;     
$_SESSION['Edit15']     = $Edit15;     

include("funcoes2.php");
?>

<html>

<style type=text/css>

body { background-image: url(<?="../".$logo_sis;?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
--></style> 

</HEAD>
<BODY text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0 leftmargin=0 bottommargin=0>

<table border=0  align=center>
<tr align=center colspan=2> 


<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "  >
<form style="margin-bottom: 0" id="Unit2" name="Unit2" method="post"  action="fenadelete.php?cod_1=<?=$Edit1;?>">
<table  width="1000"   style="height:496px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 141px; WIDTH: 724px; POSITION: absolute; TOP: 44px; HEIGHT: 398px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 692 - 16, 366 - 16);
  Shape1_Canvas.fillRect(16, 16, 692 - 16 + 1, 366 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(16, 16, 692 - 16 + 1, 366 - 16 + 1);
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
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 183px; WIDTH: 449px; POSITION: absolute; TOP: 90px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?=$color_bor;?>; background-color: #FFFFFF;height:32px;width:449px;"   ><STRONG>Cadastro Etiquetas Fenatec</STRONG></div>
</div>
<div id="Menssage_outer" style="Z-INDEX: 3; LEFT: 614px; WIDTH: 208px; POSITION: absolute; TOP: 95px; HEIGHT: 24px">
<div id="Menssage" style=" font-family: Verdana; font-size: 14px;  height:24px;width:208px;"  align="Center"   ><STRONG><?=$menssagens;?></STRONG></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 4; LEFT: 174px; WIDTH: 658px; POSITION: absolute; TOP: 133px; HEIGHT: 276px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 656 - 1, 274 - 1);
  Shape3_Canvas.fillRect(1, 1, 656 - 1 + 1, 274 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 656 - 1 + 1, 274 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 5; LEFT: 181px; WIDTH: 64px; POSITION: absolute; TOP: 144px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:64px;"   ><STRONG>Codigo.:</STRONG></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 278px; WIDTH: 56px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:56px; background-color: #FFFFFF;" disabled   tabindex="0"    />
</div>
<div id="Label3_outer" style="Z-INDEX: 7; LEFT: 382px; WIDTH: 84px; POSITION: absolute; TOP: 144px; HEIGHT: 18px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:84px;"   > <STRONG>Atividade.:</STRONG> </div>
</div>
<div id="Edit2_outer" style="Z-INDEX: 8; LEFT: 470px; WIDTH: 137px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="<?=$Edit2;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:137px; background-color: #FFFFFF;" disabled   tabindex="1"    />
</div>
<div id="Label4_outer" style="Z-INDEX: 9; LEFT: 676px; WIDTH: 47px; POSITION: absolute; TOP: 144px; HEIGHT: 18px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:47px;"   ><STRONG>Data.:</STRONG></div>
</div>
<div id="Edit3_outer" style="Z-INDEX: 10; LEFT: 729px; WIDTH: 93px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?=$Edit3;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:93px; background-color: #FFFFFF;"  disabled  tabindex="2"    />
</div>
<div id="Label11_outer" style="Z-INDEX: 11; LEFT: 181px; WIDTH: 89px; POSITION: absolute; TOP: 170px; HEIGHT: 26px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Nome.:</STRONG>&nbsp;</div>
</div>
<div id="Edit5_outer" style="Z-INDEX: 12; LEFT: 470px; WIDTH: 352px; POSITION: absolute; TOP: 165px; HEIGHT: 26px">
<input type="text" id="Edit5" name="Edit5" value="<?=$Edit5;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:352px; background-color: #FFFFFF;" disabled   tabindex="4"    />
</div>
<div id="Label12_outer" style="Z-INDEX: 13; LEFT: 181px; WIDTH: 89px; POSITION: absolute; TOP: 194px; HEIGHT: 26px">
<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Endereço.:</STRONG>&nbsp;</div>
</div>
<div id="Edit6_outer" style="Z-INDEX: 14; LEFT: 278px; WIDTH: 192px; POSITION: absolute; TOP: 189px; HEIGHT: 26px">
<input type="text" id="Edit6" name="Edit6" value="<?=$Edit6;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:192px; background-color: #FFFFFF;"  disabled  tabindex="5"    />
</div>
<div id="Edit7_outer" style="Z-INDEX: 15; LEFT: 470px; WIDTH: 352px; POSITION: absolute; TOP: 189px; HEIGHT: 26px">
<input type="text" id="Edit7" name="Edit7" value="<?=$Edit7;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:352px; background-color: #FFFFFF;" disabled   tabindex="6"    />
</div>
<div id="Label13_outer" style="Z-INDEX: 16; LEFT: 181px; WIDTH: 89px; POSITION: absolute; TOP: 218px; HEIGHT: 26px">
<div id="Label13" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Numero.:</STRONG>&nbsp;</div>
</div>
<div id="Edit8_outer" style="Z-INDEX: 17; LEFT: 278px; WIDTH: 193px; POSITION: absolute; TOP: 213px; HEIGHT: 26px">
<input type="text" id="Edit8" name="Edit8" value="<?=$Edit8;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px; background-color: #FFFFFF;" disabled   tabindex="7"    />
</div>
<div id="Label14_outer" style="Z-INDEX: 18; LEFT: 468px; WIDTH: 62px; POSITION: absolute; TOP: 242px; HEIGHT: 26px">
<div id="Label14" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:62px;"   ><STRONG>Bairro.:</STRONG>&nbsp;</div>
</div>
<div id="Edit10_outer" style="Z-INDEX: 19; LEFT: 532px; WIDTH: 180px; POSITION: absolute; TOP: 237px; HEIGHT: 26px">
<input type="text" id="Edit10" name="Edit10" value="<?=$Edit10;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:180px; background-color: #FFFFFF;" disabled   tabindex="9"    />
</div>
<div id="Label15_outer" style="Z-INDEX: 20; LEFT: 181px; WIDTH: 89px; POSITION: absolute; TOP: 242px; HEIGHT: 26px">
<div id="Label15" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Cep.:</STRONG>&nbsp;</div>
</div>
<div id="Edit9_outer" style="Z-INDEX: 21; LEFT: 278px; WIDTH: 83px; POSITION: absolute; TOP: 237px; HEIGHT: 26px">
<input type="text" id="Edit9" name="Edit9" value="<?=$Edit9;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:83px; background-color: #FFFFFF;"  disabled  tabindex="8"    />
</div>
<div id="Label16_outer" style="Z-INDEX: 22; LEFT: 181px; WIDTH: 70px; POSITION: absolute; TOP: 267px; HEIGHT: 21px">
<div id="Label16" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:70px;"   ><STRONG>Contato.:</STRONG>&nbsp;</div>
</div>
<div id="Edit12_outer" style="Z-INDEX: 23; LEFT: 278px; WIDTH: 193px; POSITION: absolute; TOP: 262px; HEIGHT: 26px">
<input type="text" id="Edit12" name="Edit12" value="<?=$Edit12;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px; background-color: #FFFFFF;" disabled   tabindex="11"    />
</div>
<div id="Label17_outer" style="Z-INDEX: 24; LEFT: 718px; WIDTH: 70px; POSITION: absolute; TOP: 243px; HEIGHT: 26px">
<div id="Label17" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:70px;"   ><STRONG>Estado.:</STRONG>&nbsp;</div>
</div>
<div id="Edit11_outer" style="Z-INDEX: 25; LEFT: 783px; WIDTH: 39px; POSITION: absolute; TOP: 237px; HEIGHT: 26px">
<input type="text" id="Edit11" name="Edit11" value="<?=$Edit11;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:39px; background-color: #FFFFFF;"  disabled  tabindex="10"    />
</div>
<div id="Label18_outer" style="Z-INDEX: 26; LEFT: 478px; WIDTH: 52px; POSITION: absolute; TOP: 267px; HEIGHT: 20px">
<div id="Label18" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:20px;width:52px;"   ><STRONG>Fone.:</STRONG>&nbsp;</div>
</div>
<div id="Edit13_outer" style="Z-INDEX: 27; LEFT: 532px; WIDTH: 153px; POSITION: absolute; TOP: 262px; HEIGHT: 26px">
<input type="text" id="Edit13" name="Edit13" value="<?=$Edit13;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:153px; background-color: #FFFFFF;"  disabled  tabindex="12"    />
</div>
<div id="Label68_outer" style="Z-INDEX: 28; LEFT: 180px; WIDTH: 103px; POSITION: absolute; TOP: 291px; HEIGHT: 24px">
<div id="Label68" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:103px;"   ><STRONG>Observação:</STRONG></div>
</div>
<div id="Edit15_outer" style="Z-INDEX: 29; LEFT: 278px; WIDTH: 544px; POSITION: absolute; TOP: 287px; HEIGHT: 82px">
<textarea id="Edit15" name="Edit15" style=" font-family: Verdana; font-size: 14px;  height:81px;width:544px; background-color: #FFFFFF;"  disabled  tabindex="17"    wrap="virtual"><?=$Edit15;?></textarea>
</div>
<div id="Label70_outer" style="Z-INDEX: 30; LEFT: 363px; WIDTH: 100px; POSITION: absolute; TOP: 243px; HEIGHT: 18px">
<div id="Label70" style=" font-family: Verdana; font-size: 13px; color: #0000FF; height:18px;width:100px;"   ><A HREF="http://correios.com.br/servicos/dnec/menuAction.do?Metodo=menuCep"  ><STRONG><u>Procurar Cep</u> </STRONG></A></div>
</div>
<div id="Edit4_outer" style="Z-INDEX: 31; LEFT: 278px; WIDTH: 193px; POSITION: absolute; TOP: 164px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="<?=$Edit4;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px; background-color: #FFFFFF;"  disabled  tabindex="3"    />
</div>
<div id="Label5_outer" style="Z-INDEX: 32; LEFT: 689px; WIDTH: 103px; POSITION: absolute; TOP: 268px; HEIGHT: 17px">
<div id="Label5" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:17px;width:103px;"   ><STRONG>Nº Predios.:</STRONG>&nbsp;</div>
</div>
<div id="Edit14_outer" style="Z-INDEX: 33; LEFT: 783px; WIDTH: 39px; POSITION: absolute; TOP: 262px; HEIGHT: 26px">
<input type="text" id="Edit14" name="Edit14" value="<?=$Edit14;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:39px; background-color: #FFFFFF;" disabled   tabindex="13"    />
</div>
</td></tr></table>
</form></body>
</html>

<div style="Z-INDEX: 34; LEFT: 175px; WIDTH: 544px; POSITION: absolute; TOP: 375px; HEIGHT: 80px">
<table border='0' aling=center>
          <td> </td>
          <form type="hidden" method="POST" action="fenadelete.php?cod_1=<?=$Edit1;?>">
          <td><input type=image name="guias" src="../imagens/botaoazul4.PNG"></td>
          </form>

          <form method="POST" action="cadfenatec.php?Cod_xxx=<?=$Edit1;?>">
          <td><input type=image name="socios" src="../imagens/botaoazul9.PNG"></td>
          </form>

</table>

</div>
</table>
</body>
<?
}
?>