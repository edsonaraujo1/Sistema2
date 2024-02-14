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

include("../logar.php");

include_once("funcoes2.php");

$deixar_1 = acesso("FORM_LIS_SIND");

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
            </style> 
			</html>
			<br><br><br><br>
			<div align=center>
			<table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='$color_bor'>
			<tr>
			<td align=center>
			     <font face=arial><b>*** ERRO ACESSO NÃO PERMITIDO PARA USUARIO !!! ***<br>
				                     Entre em Contato com o Administrador do Programa <br>
									 erro: TENTATIVA DE ACESSO</b>
			<table align=center>
			<form method='POST' action='../index.php'>
			<td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
			</form></table></td></tr></table>
			</div>";
	        exit();
}	
// Resgata a Sessao
session_start();
$Procura = strtoupper($_SESSION['Procura']);
$Opcao   = strtoupper($_SESSION['Opcao']);

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

//   if (event.keyCode == 8 && e != "INPUT" && e != "TEXTAREA") 
//   {
      event.cancelBubble = true;
      event.returnValue = false;
//   }
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
<form style="margin-bottom: 0" id="Unit2" name="Unit2" method="post"  action="/lista_funcionarios.php">
<table  width="10"   style="height:10px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 141px; WIDTH: 724px; POSITION: absolute; TOP: 44px; HEIGHT: 316px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 692 - 16, 284 - 16);
  Shape1_Canvas.fillRect(16, 16, 692 - 16 + 1, 284 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(16, 16, 692 - 16 + 1, 284 - 16 + 1);
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
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?=$color_bor;?>; background-color: #FFFFFF;height:32px;width:417px;"   ><STRONG>Lista Funcionarios Sindical</STRONG></div>
</div>
<div id="Menssage_outer" style="Z-INDEX: 3; LEFT: 614px; WIDTH: 208px; POSITION: absolute; TOP: 95px; HEIGHT: 24px">
<div id="Menssage" style=" font-family: Verdana; font-size: 14px;  height:24px;width:208px;"  align="Center"   ><STRONG><?=$menssagens;?></STRONG></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 4; LEFT: 174px; WIDTH: 658px; POSITION: absolute; TOP: 133px; HEIGHT: 195px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 656 - 1, 193 - 1);
  Shape3_Canvas.fillRect(1, 1, 656 - 1 + 1, 193 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 656 - 1 + 1, 193 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 5; LEFT: 181px; WIDTH: 67px; POSITION: absolute; TOP: 144px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:67px;"   ><STRONG>CNPJ.:</STRONG></div>
</div>
<div id="Codigo_outer" style="Z-INDEX: 6; LEFT: 253px; WIDTH: 194px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:194px; background-color: #FFFFFF;" disabled tabindex="0"    />
</div>


<div id="Label3_outer" style="Z-INDEX: 121; LEFT: 181px; WIDTH: 67px; POSITION: absolute; TOP: 171px; HEIGHT: 26px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:67px;"   ><STRONG>Nome.:</STRONG></div>
</div>


<div id="label1_outer" style="Z-INDEX: 123; LEFT: 250px; WIDTH: 442px; POSITION: absolute; TOP: 171px; HEIGHT: 20px">
<input type="text" id="label1" name="label1" value="<?=$nome_do_edif;?>" style=" font-family: Verdana; font-size: 14px; color: #0000FF;font-weight: bold; border-width: 0px; border-style: none;height:20px;width:442px;"  readonly  tabindex="0"    />
</div>


<div id="Label4_outer" style="Z-INDEX: 22; LEFT: 181px; WIDTH: 75px; POSITION: absolute; TOP: 199px; HEIGHT: 27px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:27px;width:75px;"   ><STRONG>No Emp.:</STRONG></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 23; LEFT: 253px; WIDTH: 61px; POSITION: absolute; TOP: 195px; HEIGHT: 27px">
<input type="text" id="Edit2" name="Edit2" value="<?=$Edit3;?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:61px; background-color: #FFFFFF;" disabled   tabindex="0"    />
</div>
</td></tr></table>
</form></body>
</html>
