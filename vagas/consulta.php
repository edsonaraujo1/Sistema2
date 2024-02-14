<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Consultar Cadastro
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/2009

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

// Resgata Sessao
session_name("Val_Etq_Edif");
session_start();

$Edit1  = $_SESSION['Edit1'];
$Edit2  = $_SESSION['Edit2'];

include("vaurls.php");

$deixar = acesso_url("FORM_VAGAS");

if ($deixar == "SIM"){

include_once("funcoes2.php");

		session_start();
		unset ($_SESSION['Procura']);
		unset ($_SESSION['Procura_up']);
		unset ($_SESSION['tipo_acao']);
        unset ($_SESSION['Acao']);
        unset ($_SESSION['navega']);
        unset ($_SESSION['Edit1']);
        unset ($_SESSION['Edit2']);
        
?>

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
   
   if (event.keyCode == 27) 
   {
		window.location="cadastro.php";
   }
   
}
//-->
</script>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>

<style>

.normal {
	
	background-color: white;
}
.anormal {
		background-color: Lavender;
}

</style>

<div style="Z-INDEX: 500; LEFT: 00px; WIDTH: 616px; POSITION: absolute; TOP: 157px; HEIGHT: 19px">

<IFRAME src="../info/informes2.php" width="1" height="1" scrolling="no" frameborder="0" align="left"></IFRAME>

</div>

</html>


<html >
<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; " onkeydown="javascript:if (event.KeyCode==13) event.KeyCode=9; javascript:document.onkeydown = keyCatcher();" onload="document.Form1.Edit1.focus();">
<form name="Form1" type='hidden' method='POST' action='pesquisa.php'>

<table  width="904"   style="height:392px"  border="0" cellpadding="0" cellspacing="0"  ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 177px; WIDTH: 680px; POSITION: absolute; TOP: 48px; HEIGHT: 225px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(15, 15, 650 - 15, 195 - 15);
  Shape1_Canvas.fillRect(15, 15, 650 - 15 + 1, 195 - 15 + 1);
  Shape1_Canvas.setStroke(15);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(15, 15, 650 - 15 + 1, 195 - 15 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 209px; WIDTH: 616px; POSITION: absolute; TOP: 128px; HEIGHT: 113px">
<script type="text/javascript">
  var Shape2_Canvas = new jsGraphics("Shape2_outer");
  Shape2_Canvas.setColor("#FFFFFF");
  Shape2_Canvas.fillRect(1, 1, 614 - 1, 111 - 1);
  Shape2_Canvas.fillRect(1, 1, 614 - 1 + 1, 111 - 1 + 1);
  Shape2_Canvas.setStroke(1);
  Shape2_Canvas.setColor("<?=$color_bor;?>");
  Shape2_Canvas.drawRect(1, 1, 614 - 1 + 1, 111 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 225px; WIDTH: 128px; POSITION: absolute; TOP: 144px; HEIGHT: 18px">
<div id="Label1" style=" font-family: Verdana; font-size: 14px; font-weight: bold; height:18px;width:128px;"   > Consultar por: </div>
</div>
<div id="Label2_outer" style="Z-INDEX: 3; LEFT: 225px; WIDTH: 128px; POSITION: absolute; TOP: 173px; HEIGHT: 18px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; font-weight: bold; height:18px;width:128px;"   > Consulta: </div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 4; LEFT: 354px; WIDTH: 169px; POSITION: absolute; TOP: 144px; HEIGHT: 24px">
<select id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:169px;" onfocus="this.className='anormal'" onblur="this.className='normal'"   maxlength='10' onchange="Salva_Etq_edif1(this)"  tabindex="0"    />

	<option value="<?=$Edit1;?>"> <?=$Edit1;?> </option>
            <option value="CODIGO"> CODIGO </option>
            <option value="FUNÇÃO"> FUNÇÃO </option>
            <option value="ADM./EDIF."> ADM./EDIF. </option>
            <option value="CONTATO"> CONTATO </option>

</select>

</div>

<?
if ($Edit1 == "CNPJ"){
?>
<div id="Edit2_outer" style="Z-INDEX: 5; LEFT: 354px; WIDTH: 446px; POSITION: absolute; TOP: 169px; HEIGHT: 24px">
<input type="text" id="Edit2" name="Edit2" value="<?=$Edit2;?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:446px;" onfocus="this.className='anormal'" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit2', '99.999.999/9999-99', event);"  maxlength='18'  tabindex="0"    />
</div>

<?
}else{
?>
	
<div id="Edit2_outer" style="Z-INDEX: 5; LEFT: 354px; WIDTH: 446px; POSITION: absolute; TOP: 169px; HEIGHT: 24px">
<input type="text" id="Edit2" name="Edit2" value="<?=$Edit2;?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:446px;" onfocus="this.className='anormal'" onblur="this.className='normal'"  maxlength=40  tabindex="0"    />
</div>

<?
}
?>

<div id="Shape3_outer" style="Z-INDEX: 6; LEFT: 209px; WIDTH: 616px; POSITION: absolute; TOP: 80px; HEIGHT: 46px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 614 - 1, 44 - 1);
  Shape3_Canvas.fillRect(1, 1, 614 - 1 + 1, 44 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 614 - 1 + 1, 44 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label31_outer" style="Z-INDEX: 7; LEFT: 225px; WIDTH: 320px; POSITION: absolute; TOP: 84px; HEIGHT: 32px">
<div id="Label31" style=" font-family: Verdana; font-size: 26px; color: <?=$color_bor;?>; font-weight: bold;text-align: left; height:32px;width:320px;"   > Consultar Vagas </div>
</div>
<div id="Label6_outer" style="Z-INDEX: 8; LEFT: 522px; WIDTH: 288px; POSITION: absolute; TOP: 93px; HEIGHT: 24px">
<div id="Label6" style=" font-family: Verdana; font-size: 16px;  height:24px;width:288px;"  align="Center"   > <STRONG><font color=red><?=$menssagem;?></font></STRONG> </div>
</div>
</td></tr></table>
</body>

<div style="Z-INDEX: 34; LEFT: 395px; WIDTH: 544px; POSITION: absolute; TOP: 205px; HEIGHT: 80px">
<table border='0'>
         <td> </td>
         <td><input type=image name="consultar" src="../imagens/botaoazul7.PNG"></td>
         </form>

         <form method="POST" action="cadastro.php?Cod_xx=1">
         <td><input type=image name="vontar" src="../imagens/botaoazul9.PNG"></td>
         </form>

</table>
</div>
</html>

<?
}else{
	
include("enaaurlnp.php");
	
}
// Resgata Sessao
session_start();

unset ($_SESSION['Edit1']);
unset ($_SESSION['Edit2']);

?>
