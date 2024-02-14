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

// Abre Tabela Categoria

$consulta1  = "SELECT * FROM categ Where CODIGO = '$Edit7'";

$resultado1 = @mysql_query($consulta1);

$row1 = @mysql_fetch_array($resultado1);

$categ_1   = @$row1["DESCRICAO"];

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

require($path."logar.php");


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

<style type=text/css>

body { background-image: url(<?=$logo_sis;?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
-->
</style> 

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "  >
<form style="margin-bottom: 0" id="Unit2" name="Unit2" method="post"  action="oposicaolayout.php">
<table  width="1"   style="height:1px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 141px; WIDTH: 724px; POSITION: absolute; TOP: 44px; HEIGHT: 541px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 692 - 16, 509 - 16);
  Shape1_Canvas.fillRect(16, 16, 692 - 16 + 1, 509 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
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
  Shape2_Canvas.setColor("<?=$color_bor;?>");
  Shape2_Canvas.drawRect(1, 1, 656 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 183px; WIDTH: 417px; POSITION: absolute; TOP: 90px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?=$color_bor;?>; background-color: #FFFFFF;height:32px;width:417px;"   ><STRONG>Cadastro de&nbsp;Carta Oposicao</STRONG>&nbsp;</div>
</div>
<div id="Menssage_outer" style="Z-INDEX: 3; LEFT: 614px; WIDTH: 208px; POSITION: absolute; TOP: 95px; HEIGHT: 24px">
<div id="Menssage" style=" font-family: Verdana; font-size: 14px;  height:24px;width:208px;"  align="Center"   ><STRONG><?=$menssagens;?></STRONG></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 4; LEFT: 174px; WIDTH: 658px; POSITION: absolute; TOP: 133px; HEIGHT: 419px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 656 - 1, 417 - 1);
  Shape3_Canvas.fillRect(1, 1, 656 - 1 + 1, 417 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 656 - 1 + 1, 417 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 5; LEFT: 181px; WIDTH: 64px; POSITION: absolute; TOP: 144px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:64px;"   ><STRONG>Codigo.:</STRONG></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 278px; WIDTH: 63px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:63px;" disabled   tabindex="1"    />
</div>
<div id="Label3_outer" style="Z-INDEX: 7; LEFT: 352px; WIDTH: 114px; POSITION: absolute; TOP: 144px; HEIGHT: 18px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:114px;"   ><P><STRONG>Data Saida.:</STRONG></P></div>
</div>
<div id="Edit2_outer" style="Z-INDEX: 8; LEFT: 470px; WIDTH: 93px; POSITION: absolute; TOP: 139px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="<?=$Edit2;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:93px;" disabled   tabindex="2"    />
</div>
<div id="Label4_outer" style="Z-INDEX: 9; LEFT: 676px; WIDTH: 47px; POSITION: absolute; TOP: 144px; HEIGHT: 18px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:47px;"   ><STRONG>Data.:</STRONG></div>
</div>
<div id="Edit3_outer" style="Z-INDEX: 10; LEFT: 729px; WIDTH: 93px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?=$Edit3;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:93px;" disabled   tabindex="3"    />
</div>
<div id="Label11_outer" style="Z-INDEX: 11; LEFT: 181px; WIDTH: 89px; POSITION: absolute; TOP: 170px; HEIGHT: 26px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>R.G.:</STRONG>&nbsp;</div>
</div>
<div id="Edit4_outer" style="Z-INDEX: 28; LEFT: 278px; WIDTH: 193px; POSITION: absolute; TOP: 165px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="<?=$Edit4;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px;" disabled   tabindex="4"    />
</div>
<div id="Edit5_outer" style="Z-INDEX: 12; LEFT: 568px; WIDTH: 254px; POSITION: absolute; TOP: 165px; HEIGHT: 26px">
<input type="text" id="Edit5" name="Edit5" value="<?=$Edit5;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:254px;" disabled   tabindex="5"    />
</div>
<div id="Label12_outer" style="Z-INDEX: 13; LEFT: 181px; WIDTH: 89px; POSITION: absolute; TOP: 194px; HEIGHT: 26px">
<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Matricula.:</STRONG>&nbsp;</div>
</div>
<div id="Edit6_outer" style="Z-INDEX: 14; LEFT: 278px; WIDTH: 98px; POSITION: absolute; TOP: 190px; HEIGHT: 26px">
<input type="text" id="Edit6" name="Edit6" value="<?=$Edit6;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:98px;" disabled   tabindex="6"    />
</div>
<div id="Edit7_outer" style="Z-INDEX: 15; LEFT: 568px; WIDTH: 254px; POSITION: absolute; TOP: 190px; HEIGHT: 26px">
<input type="text" id="Edit7" name="Edit7" value="<?=$Edit7;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:254px;" disabled   tabindex="7"    />
</div>
<div id="Label13_outer" style="Z-INDEX: 16; LEFT: 181px; WIDTH: 89px; POSITION: absolute; TOP: 218px; HEIGHT: 26px">
<div id="Label13" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Nome.:</STRONG>&nbsp;</div>
</div>
<div id="Edit8_outer" style="Z-INDEX: 17; LEFT: 278px; WIDTH: 434px; POSITION: absolute; TOP: 215px; HEIGHT: 26px">
<input type="text" id="Edit8" name="Edit8" value="<?=$Edit8;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:434px;" disabled   tabindex="8"    />
</div>
<div id="Label15_outer" style="Z-INDEX: 18; LEFT: 645px; WIDTH: 45px; POSITION: absolute; TOP: 242px; HEIGHT: 19px">
<div id="Label15" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:45px;"   ><STRONG>Cep.:</STRONG>&nbsp;</div>
</div>
<div id="Edit10_outer" style="Z-INDEX: 19; LEFT: 692px; WIDTH: 90px; POSITION: absolute; TOP: 240px; HEIGHT: 26px">
<input type="text" id="Edit10" name="Edit10" value="<?=$Edit10;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:90px;" disabled   tabindex="9"    />
</div>
<div id="Label16_outer" style="Z-INDEX: 20; LEFT: 181px; WIDTH: 91px; POSITION: absolute; TOP: 267px; HEIGHT: 21px">
<div id="Label16" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:91px;"   ><STRONG>Cod. Edif.:</STRONG>&nbsp;</div>
</div>
<div id="Edit11_outer" style="Z-INDEX: 21; LEFT: 278px; WIDTH: 74px; POSITION: absolute; TOP: 265px; HEIGHT: 26px">
<input type="text" id="Edit11" name="Edit11" value="<?=$Edit11;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:74px;" disabled   tabindex="12"    />
</div>
<div id="Label22_outer" style="Z-INDEX: 22; LEFT: 181px; WIDTH: 107px; POSITION: absolute; TOP: 292px; HEIGHT: 26px">
<div id="Label22" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:107px;"   ><STRONG>CNPJ Edif.:</STRONG>&nbsp;</div>
</div>
<div id="Edit12_outer" style="Z-INDEX: 23; LEFT: 278px; WIDTH: 193px; POSITION: absolute; TOP: 290px; HEIGHT: 26px">
<input type="text" id="Edit12" name="Edit12" value="<?=$Edit12;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px;" disabled   tabindex="15"    />
</div>
<div id="Label26_outer" style="Z-INDEX: 24; LEFT: 181px; WIDTH: 103px; POSITION: absolute; TOP: 341px; HEIGHT: 26px">
<div id="Label26" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:103px;"   ><STRONG>CNPJ Adm.:</STRONG>&nbsp;</div>
</div>
<div id="Label68_outer" style="Z-INDEX: 25; LEFT: 180px; WIDTH: 103px; POSITION: absolute; TOP: 366px; HEIGHT: 24px">
<div id="Label68" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:103px;"   ><STRONG>Observação:</STRONG></div>
</div>
<div id="Edit15_outer" style="Z-INDEX: 26; LEFT: 278px; WIDTH: 544px; POSITION: absolute; TOP: 365px; HEIGHT: 107px">
<textarea id="Edit15" name="Edit15" style=" font-family: Verdana; font-size: 14px;  height:106px;width:544px;color: #696969;" tabindex="17" readonly  wrap="virtual"><?=$Edit15;?></textarea>
</div>
<div id="Edit14_outer" style="Z-INDEX: 29; LEFT: 278px; WIDTH: 194px; POSITION: absolute; TOP: 340px; HEIGHT: 26px">
<input type="text" id="Edit14" name="Edit14" value="<?=$Edit14;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:194px;" disabled   tabindex="19"    />
</div>
<div id="Label7_outer" style="Z-INDEX: 31; LEFT: 181px; WIDTH: 99px; POSITION: absolute; TOP: 317px; HEIGHT: 21px">
<div id="Label7" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:99px;"   ><STRONG>Cod. Adm.:</STRONG></div>
</div>
<div id="Edit13_outer" style="Z-INDEX: 32; LEFT: 278px; WIDTH: 74px; POSITION: absolute; TOP: 315px; HEIGHT: 26px">
<input type="text" id="Edit13" name="Edit13" value="<?=$Edit13;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:74px;" disabled   tabindex="17"    />
</div>
<div id="Label9_outer" style="Z-INDEX: 47; LEFT: 512px; WIDTH: 56px; POSITION: absolute; TOP: 172px; HEIGHT: 18px">
<div id="Label9" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:56px;"   ><STRONG>C.P.F.:</STRONG></div>
</div>
<div id="Label10_outer" style="Z-INDEX: 48; LEFT: 478px; WIDTH: 87px; POSITION: absolute; TOP: 195px; HEIGHT: 18px">
<div id="Label10" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:87px;"   ><STRONG>Categoria.:</STRONG></div>
</div>
<div id="Label14_outer" style="Z-INDEX: 49; LEFT: 181px; WIDTH: 91px; POSITION: absolute; TOP: 243px; HEIGHT: 21px">
<div id="Label14" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:91px;"   ><STRONG>Endereco.:</STRONG>&nbsp;</div>
</div>
<div id="Edit9_outer" style="Z-INDEX: 50; LEFT: 278px; WIDTH: 354px; POSITION: absolute; TOP: 240px; HEIGHT: 26px">
<input type="text" id="Edit9" name="Edit9" value="<?=$Edit9;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:354px;" disabled   tabindex="12"    />
</div>


<div id="Edit16_outer" style="Z-INDEX: 54; LEFT: 352px; WIDTH: 464px; POSITION: absolute; TOP: 265px; HEIGHT: 26px">
<input type="text" id="Edit16" name="Edit16" value="<?=$nome_do_edif;?>" style=" font-family: Verdana; font-size: 14px; color: #0000FF; font-weight: bold; border-style: none;height:25px;width:464px;" readonly tabindex="8"    />
</div>
<div id="Edit17_outer" style="Z-INDEX: 55; LEFT: 352px; WIDTH: 464px; POSITION: absolute; TOP: 315px; HEIGHT: 26px">
<input type="text" id="Edit17" name="Edit17" value="<?=$nome_da_adms;?>" style=" font-family: Verdana; font-size: 14px; color: #0000FF; font-weight: bold; border-style: none;height:25px;width:464px;" readonly   tabindex="8"    />
</div>

<div id="Label70_outer" style="Z-INDEX: 27; LEFT: 788px; WIDTH: 37px; POSITION: absolute; TOP: 243px; HEIGHT: 18px">
<div id="Label70" style=" font-family: Verdana; font-size: 13px; color: #0000FF; height:18px;width:37px;"   ><A HREF="http://correios.com.br/servicos/dnec/menuAction.do?Metodo=menuCep" target="new" ><u> Cep </u></A></div>
</div>

<div id="Label8_outer" style="Z-INDEX: 52; LEFT: 478px; WIDTH: 85px; POSITION: absolute; TOP: 295px; HEIGHT: 18px">
<div id="Label8" style=" font-family: Verdana; font-size: 13px; color: #0000FF; height:18px;width:85px;"   ><A HREF="http://www.receita.fazenda.gov.br/PessoaJuridica/CNPJ/cnpjreva/Cnpjreva_Solicitacao.asp" target="new" ><u>click CNPJ</u></A></div>
</div>
<div id="Label17_outer" style="Z-INDEX: 53; LEFT: 478px; WIDTH: 85px; POSITION: absolute; TOP: 344px; HEIGHT: 18px">
<div id="Label17" style=" font-family: Verdana; font-size: 13px; color: #0000FF; height:18px;width:85px;"   ><A HREF="http://www.receita.fazenda.gov.br/PessoaJuridica/CNPJ/cnpjreva/Cnpjreva_Solicitacao.asp" target="new" ><u>click CNPJ</u></A></div>
</div>
</td></tr></table>
</form></body>
</html>