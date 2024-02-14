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
@session_start();
$_SESSION['Inic'] = $id;
$_SESSION['Ante'] = $id;
$_SESSION['Prox'] = $id;
$_SESSION['Fim']  = $id;
$_SESSION['tipo_acao'] = 'alterar_1';
// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");


// Resgata a Sessao
@session_start();
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

//document.onkeydown = keyCatcher;

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

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; " onkeydown="javascript:document.onkeydown = keyCatcher();" >
<form style="margin-bottom: 0" id="Unit2" name="Unit2" method="post"  action="vagaslayout.php">
<table  width="10"   style="height:10px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 145px; WIDTH: 724px; POSITION: absolute; TOP: 44px; HEIGHT: 532px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 692 - 16, 478 - 16);
  Shape1_Canvas.fillRect(16, 16, 692 - 16 + 1, 478 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(16, 16, 692 - 16 + 1, 478 - 16 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 178px; WIDTH: 658px; POSITION: absolute; TOP: 77px; HEIGHT: 55px">
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
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 187px; WIDTH: 449px; POSITION: absolute; TOP: 90px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?=$color_bor;?>; background-color: #FFFFFF;height:32px;width:449px;"   ><strong>Cadastro de&nbsp;Vagas</strong></div>
</div>
<div id="Menssage_outer" style="Z-INDEX: 3; LEFT: 618px; WIDTH: 208px; POSITION: absolute; TOP: 95px; HEIGHT: 24px">
<div id="Menssage" style=" font-family: Verdana; font-size: 14px;  height:24px;width:208px;"  align="Center"   ><strong><?=$menssagens;?></strong></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 4; LEFT: 178px; WIDTH: 658px; POSITION: absolute; TOP: 133px; HEIGHT: 410px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 656 - 1, 386 - 1);
  Shape3_Canvas.fillRect(1, 1, 656 - 1 + 1, 386 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 656 - 1 + 1, 386 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 5; LEFT: 185px; WIDTH: 64px; POSITION: absolute; TOP: 144px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:64px;"   ><strong>Codigo.:</strong></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 282px; WIDTH: 56px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:56px; background-color: #FFFFFF;" disabled   tabindex="0"    />
</div>
<div id="Label3_outer" style="Z-INDEX: 7; LEFT: 356px; WIDTH: 152px; POSITION: absolute; TOP: 144px; HEIGHT: 18px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:152px;"   > <strong>Vaga Preenchida.:</strong> </div>
</div>
<div id="Edit2_outer" style="Z-INDEX: 8; LEFT: 498px; WIDTH: 34px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="<?=$Edit2;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:34px; background-color: #FFFFFF;"  disabled  tabindex="1"    />
</div>
<div id="Label4_outer" style="Z-INDEX: 9; LEFT: 680px; WIDTH: 47px; POSITION: absolute; TOP: 144px; HEIGHT: 18px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:47px;"   ><strong>Data.:</strong></div>
</div>
<div id="Edit3_outer" style="Z-INDEX: 10; LEFT: 733px; WIDTH: 93px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?=$Edit3;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:93px; background-color: #FFFFFF;" disabled   tabindex="2"    />
</div>
<div id="Label11_outer" style="Z-INDEX: 11; LEFT: 185px; WIDTH: 89px; POSITION: absolute; TOP: 170px; HEIGHT: 26px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Funcao.:</strong>&nbsp;</div>
</div>
<div id="Edit5_outer" style="Z-INDEX: 12; LEFT: 602px; WIDTH: 32px; POSITION: absolute; TOP: 164px; HEIGHT: 26px">
<input type="text" id="Edit5" name="Edit5" value="<?=$Edit5;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:32px; background-color: #FFFFFF;"  disabled  tabindex="4"    />
</div>
<div id="Label12_outer" style="Z-INDEX: 13; LEFT: 185px; WIDTH: 89px; POSITION: absolute; TOP: 194px; HEIGHT: 26px">
<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Adm./Edif..:</strong>&nbsp;</div>
</div>
<div id="Edit7_outer" style="Z-INDEX: 14; LEFT: 282px; WIDTH: 450px; POSITION: absolute; TOP: 189px; HEIGHT: 26px">
<input type="text" id="Edit7" name="Edit7" value="<?=$Edit7;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:450px; background-color: #FFFFFF;"  disabled  tabindex="5"    />
</div>
<div id="Label13_outer" style="Z-INDEX: 15; LEFT: 185px; WIDTH: 89px; POSITION: absolute; TOP: 218px; HEIGHT: 26px">
<div id="Label13" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Endereco.:</strong>&nbsp;</div>
</div>
<div id="Edit8_outer" style="Z-INDEX: 16; LEFT: 282px; WIDTH: 450px; POSITION: absolute; TOP: 213px; HEIGHT: 26px">
<input type="text" id="Edit8" name="Edit8" value="<?=$Edit8;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:450px; background-color: #FFFFFF;"  disabled  tabindex="7"    />
</div>
<div id="Label14_outer" style="Z-INDEX: 17; LEFT: 187px; WIDTH: 62px; POSITION: absolute; TOP: 243px; HEIGHT: 26px">
<div id="Label14" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:62px;"   ><strong>Bairro.:</strong>&nbsp;</div>
</div>
<div id="Edit9_outer" style="Z-INDEX: 18; LEFT: 282px; WIDTH: 180px; POSITION: absolute; TOP: 238px; HEIGHT: 26px">
<input type="text" id="Edit9" name="Edit9" value="<?=$Edit9;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:180px; background-color: #FFFFFF;"  disabled  tabindex="9"    />
</div>

<div id="Label15_outer" style="Z-INDEX: 19; LEFT: 185px; WIDTH: 89px; POSITION: absolute; TOP: 268px; HEIGHT: 26px">
<div id="Label15" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Cep.:</strong>&nbsp;</div>
</div>

<div id="Edit12_outer" style="Z-INDEX: 20; LEFT: 282px; WIDTH: 83px; POSITION: absolute; TOP: 263px; HEIGHT: 26px">
<input type="text" id="Edit12" name="Edit12" value="<?=$Edit12;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:83px; background-color: #FFFFFF;" disabled   tabindex="8"    />
</div>



<div id="Label15_outer" style="Z-INDEX: 19; LEFT: 474px; WIDTH: 89px; POSITION: absolute; TOP: 268px; HEIGHT: 26px">
<div id="Label15" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Idade.:</strong>&nbsp;</div>
</div>

<div id="Edit16_outer" style="Z-INDEX: 20; LEFT: 531px; WIDTH: 201px; POSITION: absolute; TOP: 263px; HEIGHT: 26px">
<input type="text" id="Edit16" name="Edit16" value="<?=$Edit16;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:201px; background-color: #FFFFFF;" disabled   tabindex="9"    />
</div>



<div id="Label16_outer" style="Z-INDEX: 21; LEFT: 185px; WIDTH: 139px; POSITION: absolute; TOP: 293px; HEIGHT: 21px">
<div id="Label16" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:139px;"   ><strong>Telefone.:</strong>&nbsp;</div>
</div>
<div id="Edit13_outer" style="Z-INDEX: 22; LEFT: 282px; WIDTH: 218px; POSITION: absolute; TOP: 288px; HEIGHT: 26px">
<input type="text" id="Edit13" name="Edit13" value="<?=$Edit13;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:218px; background-color: #FFFFFF;"  disabled  tabindex="10"    />
</div>
<div id="Label17_outer" style="Z-INDEX: 23; LEFT: 757px; WIDTH: 36px; POSITION: absolute; TOP: 244px; HEIGHT: 26px">
<div id="Label17" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:36px;"   ><strong>Uf.:</strong>&nbsp;</div>
</div>
<div id="Edit11_outer" style="Z-INDEX: 24; LEFT: 787px; WIDTH: 39px; POSITION: absolute; TOP: 238px; HEIGHT: 26px">
<input type="text" id="Edit11" name="Edit11" value="<?=$Edit11;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:39px; background-color: #FFFFFF;"  disabled  tabindex="11"    />
</div>
<div id="Label18_outer" style="Z-INDEX: 25; LEFT: 505px; WIDTH: 82px; POSITION: absolute; TOP: 293px; HEIGHT: 20px">
<div id="Label18" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:20px;width:82px;"   ><strong>Contato.:</strong>&nbsp;</div>
</div>
<div id="Edit14_outer" style="Z-INDEX: 26; LEFT: 581px; WIDTH: 244px; POSITION: absolute; TOP: 288px; HEIGHT: 26px">
<input type="text" id="Edit14" name="Edit14" value="<?=$Edit14;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:244px; background-color: #FFFFFF;"  disabled  tabindex="13"    />
</div>
<div id="Label70_outer" style="Z-INDEX: 29; LEFT: 367px; WIDTH: 100px; POSITION: absolute; TOP: 269px; HEIGHT: 18px">
<div id="Label70" style=" font-family: Verdana; font-size: 13px; color: #0000FF; height:18px;width:100px;"   ><A HREF="http://correios.com.br/servicos/dnec/menuAction.do?Metodo=menuCep" target="new" ><strong><font color="#0000ff"><u>Procurar Cep</u></font></strong></A></div>
</div>
<div id="Edit4_outer" style="Z-INDEX: 30; LEFT: 282px; WIDTH: 193px; POSITION: absolute; TOP: 164px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="<?=$Edit4;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px; background-color: #FFFFFF;"  disabled  tabindex="3"    />
</div>
<div id="Label6_outer" style="Z-INDEX: 31; LEFT: 481px; WIDTH: 120px; POSITION: absolute; TOP: 168px; HEIGHT: 18px">
<div id="Label6" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:120px;"   > <strong>Qtd. de Vagas.:</strong> </div>
</div>
<div id="Label7_outer" style="Z-INDEX: 32; LEFT: 662px; WIDTH: 120px; POSITION: absolute; TOP: 168px; HEIGHT: 18px">
<div id="Label7" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:120px;"   > <strong>Encaminhados.:</strong> </div>
</div>
<div id="Edit6_outer" style="Z-INDEX: 33; LEFT: 788px; WIDTH: 38px; POSITION: absolute; TOP: 164px; HEIGHT: 26px">
<input type="text" id="Edit6" name="Edit6" value="<?=$Edit6;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:38px; background-color: #FFFFFF;"   disabled tabindex="4"    />
</div>
<div id="Label8_outer" style="Z-INDEX: 34; LEFT: 467px; WIDTH: 62px; POSITION: absolute; TOP: 243px; HEIGHT: 26px">
<div id="Label8" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:62px;"   ><strong>Cidade.:</strong>&nbsp;</div>
</div>
<div id="Edit10_outer" style="Z-INDEX: 35; LEFT: 531px; WIDTH: 201px; POSITION: absolute; TOP: 238px; HEIGHT: 26px">
<input type="text" id="Edit10" name="Edit10" value="<?=$Edit10;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:201px; background-color: #FFFFFF;"  disabled  tabindex="9"    />
</div>
<div id="Label68_outer" style="Z-INDEX: 27; LEFT: 184px; WIDTH: 103px; POSITION: absolute; TOP: 317px; HEIGHT: 24px">
<div id="Label68" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:103px;"   ><strong>Observacao:</strong></div>
</div>
<div id="Edit15_outer" style="Z-INDEX: 28; LEFT: 282px; WIDTH: 544px; POSITION: absolute; TOP: 313px; HEIGHT: 183px">
<textarea id="Edit15" name="Edit15" style=" font-family: Verdana; font-size: 14px;  height:130px;width:544px; color: #696969; background-color: #FFFFFF;"  readonly tabindex="17"    wrap="virtual"><?=$Edit15;?></textarea>
</div>
</td></tr></table>
</form></body>

</html>