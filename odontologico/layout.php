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
$nome3 = $_SESSION["nome_log"];

include("../logar.php");


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

<html>
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

body { background-image: url(<?="../".$logo_sis;?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
-->
</style> 

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "  >
<form style="margin-bottom: 0" id="Unit2" name="Unit2" method="post"  action="/odontologico.php">
<table  width="10"   style="height:10px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 128px; WIDTH: 760px; POSITION: absolute; TOP: 44px; HEIGHT: 420px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFFF");
  Shape1_Canvas.fillRect(16, 16, 728 - 16, 429 - 16);
  Shape1_Canvas.fillRect(16, 16, 728 - 16 + 1, 429 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(16, 16, 728 - 16 + 1, 429 - 16 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 161px; WIDTH: 694px; POSITION: absolute; TOP: 77px; HEIGHT: 55px">
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
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 178px; WIDTH: 518px; POSITION: absolute; TOP: 86px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?=$color_bor;?>; background-color: #FFFFFF;height:32px;width:518px;"   ><P><STRONG>Atendimento Odontologico</STRONG></P></div>
</div>
<div id="Menssage_outer" style="Z-INDEX: 3; LEFT: 666px; WIDTH: 174px; POSITION: absolute; TOP: 95px; HEIGHT: 24px">
<div id="Menssage" style=" font-family: Verdana; font-size: 14px;  height:24px;width:174px;"  align="Center"   ><STRONG><?=$menssagens;?></STRONG></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 4; LEFT: 161px; WIDTH: 694px; POSITION: absolute; TOP: 133px; HEIGHT: 299px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 692 - 1, 337 - 1);
  Shape3_Canvas.fillRect(1, 1, 692 - 1 + 1, 337 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 692 - 1 + 1, 337 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 5; LEFT: 171px; WIDTH: 141px; POSITION: absolute; TOP: 144px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:141px;"   ><P><STRONG>Matricula.:</STRONG></P></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 10; LEFT: 311px; WIDTH: 89px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:89px;" disabled   tabindex="0"    />
</div>
<div id="Label11_outer" style="Z-INDEX: 6; LEFT: 171px; WIDTH: 141px; POSITION: absolute; TOP: 171px; HEIGHT: 26px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:141px;"   ><STRONG>Titular Socio.:</STRONG>&nbsp;</div>
</div>
<div id="Edit2_outer" style="Z-INDEX: 9; LEFT: 311px; WIDTH: 441px; POSITION: absolute; TOP: 165px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="<?=$Edit2;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:441px;"  disabled  tabindex="3"    />
</div>
<div id="Label12_outer" style="Z-INDEX: 7; LEFT: 171px; WIDTH: 149px; POSITION: absolute; TOP: 195px; HEIGHT: 26px">
<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:149px;"   ><STRONG>Ultimo Pagto.:</STRONG>&nbsp;</div>
</div>
<div id="Edit3_outer" style="Z-INDEX: 8; LEFT: 311px; WIDTH: 49px; POSITION: absolute; TOP: 190px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?=$Edit3;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:49px;"  disabled  tabindex="5"    />
</div>
<div id="Label3_outer" style="Z-INDEX: 11; LEFT: 171px; WIDTH: 149px; POSITION: absolute; TOP: 220px; HEIGHT: 26px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:149px;"   ><P><STRONG>Dependentes.:</STRONG></P></div>
</div>
<div id="Edit4_outer" style="Z-INDEX: 12; LEFT: 374px; WIDTH: 81px; POSITION: absolute; TOP: 190px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="<?=$Edit4;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:81px;"  disabled  tabindex="5"    />
</div>
<div id="Label13_outer" style="Z-INDEX: 15; LEFT: 361px; WIDTH: 13px; POSITION: absolute; TOP: 194px; HEIGHT: 26px">
<div id="Label13" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:13px;"   ><P><STRONG>/</STRONG></P></div>
</div>
<div id="Edit5_outer" style="Z-INDEX: 19; LEFT: 311px; WIDTH: 441px; POSITION: absolute; TOP: 216px; HEIGHT: 26px">
<input type="text" id="Edit5" name="Edit5" value="<?=$Edit5;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:441px;"  disabled  tabindex="5"    />
</div>
<div id="Edit6_outer" style="Z-INDEX: 17; LEFT: 311px; WIDTH: 441px; POSITION: absolute; TOP: 242px; HEIGHT: 26px">
<input type="text" id="Edit6" name="Edit6" value="<?=$Edit6;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:441px;"  disabled  tabindex="5"    />
</div>
<div id="Edit7_outer" style="Z-INDEX: 16; LEFT: 311px; WIDTH: 441px; POSITION: absolute; TOP: 268px; HEIGHT: 26px">
<input type="text" id="Edit7" name="Edit7" value="<?=$Edit7;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:441px;"  disabled  tabindex="5"    />
</div>
<div id="Label5_outer" style="Z-INDEX: 18; LEFT: 171px; WIDTH: 133px; POSITION: absolute; TOP: 271px; HEIGHT: 26px">
<div id="Label5" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:133px;"   ><STRONG>Procedimentos.:</STRONG>&nbsp;</div>
</div>
<div id="Label4_outer" style="Z-INDEX: 20; LEFT: 171px; WIDTH: 133px; POSITION: absolute; TOP: 245px; HEIGHT: 26px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:133px;"   ><STRONG>Dentista.:</STRONG>&nbsp;</div>
</div>
<div id="Label6_outer" style="Z-INDEX: 21; LEFT: 171px; WIDTH: 181px; POSITION: absolute; TOP: 301px; HEIGHT: 26px">
<div id="Label6" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:181px;"   ><STRONG>Ultimo Atendimento.:</STRONG>&nbsp;</div>
</div>


<div id="Label5_outer" style="Z-INDEX: 18; LEFT: 220px; WIDTH: 565px; POSITION: absolute; TOP: 320px; HEIGHT: 26px">

<?
$consulta5 = "SELECT * FROM odontologico WHERE matricula = '$Edit1' ORDER BY str_to_date( data, '%d/%m/%Y') DESC, id DESC";

$resultado5 = mysql_query($consulta5);

?>

<select name="listbox" size="4" style=" font-family: Verdana; font-size: 14px; width:565px; color: #696969;">

<?
while ($linha5 = mysql_fetch_array($resultado5))
{
       $matric_1  = $linha5["matricula"];
       $data_1    = $linha5["data"];
       $depend_1  = $linha5["dependente"];
       $denti_1   = $linha5["dentista"];
       $proce_1   = $linha5["pecedimento"];
       $hora_1    = $linha5["hora"];
      
	   ?>
	   <option value=""><?=$data_1.'|'.$hora_1;?>|&nbsp;<?=$depend_1;?>|&nbsp;<?=$denti_1;?></option>
	   <?
}
?>
</select>

</div>



</td></tr></table>
</form></body>
</html>

<script>
<!--
function Download()
{
	window.location = "captura.exe";     
}

function janelaSecundaria3 (URL){ 
   window.open(URL,"janela3","width=745,height=485,resizable=NO,status=NO,Scrollbars=yes,location=NO,menubar=NO,toolbar=NO"); 
} 

function janelaSecundaria5 (URL){ 
   window.open(URL,"janela5","width=410,height=420,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 


//-->
</script>
