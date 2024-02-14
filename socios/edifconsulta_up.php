<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Consultar Cadastro Empresa
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

// include("../logar.php");
$nome3 = $_SESSION["nome_log"];

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
			</div>
";
	        exit();
}	

// Resgata Sessao
@session_name("Val_Etq_Edif");
@session_start();

$Edit1_ed  = $_SESSION['Edit1'];
$Edit2_ed  = $_SESSION['Edit2'];

unset ($_SESSION['Acao']);
unset ($_SESSION['Edit1']);
unset ($_SESSION['Edit2']);

?>

<html>
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<body>

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

<html >

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; " onload="document.Form1.Edit1_ed.focus();">
<form name="Form1" type='hidden' method='POST' action='edifpesquisa_up.php'>

<table  width="688"   style="height:232px"  border="0" cellpadding="0" cellspacing="0"  ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 0px; WIDTH: 688px; POSITION: absolute; TOP: 0px; HEIGHT: 232px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(15, 15, 658 - 15, 202 - 15);
  Shape1_Canvas.fillRect(15, 15, 658 - 15 + 1, 202 - 15 + 1);
  Shape1_Canvas.setStroke(15);
  Shape1_Canvas.setColor("<?php echo $color_bor ?>");
  Shape1_Canvas.drawRect(15, 15, 658 - 15 + 1, 202 - 15 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 32px; WIDTH: 624px; POSITION: absolute; TOP: 32px; HEIGHT: 48px">
<script type="text/javascript">
  var Shape2_Canvas = new jsGraphics("Shape2_outer");
  Shape2_Canvas.setColor("#FFFFFF");
  Shape2_Canvas.fillRect(1, 1, 622 - 1, 46 - 1);
  Shape2_Canvas.fillRect(1, 1, 622 - 1 + 1, 46 - 1 + 1);
  Shape2_Canvas.setStroke(1);
  Shape2_Canvas.setColor("<?php echo $color_bor ?>");
  Shape2_Canvas.drawRect(1, 1, 622 - 1 + 1, 46 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 49px; WIDTH: 543px; POSITION: absolute; TOP: 39px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?php echo $color_bor ?>; height:32px;width:543px;"   ><STRONG>Consultar Empresa</STRONG></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 3; LEFT: 32px; WIDTH: 624px; POSITION: absolute; TOP: 82px; HEIGHT: 118px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 622 - 1, 116 - 1);
  Shape3_Canvas.fillRect(1, 1, 622 - 1 + 1, 116 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?php echo $color_bor ?>");
  Shape3_Canvas.drawRect(1, 1, 622 - 1 + 1, 116 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 4; LEFT: 48px; WIDTH: 128px; POSITION: absolute; TOP: 100px; HEIGHT: 24px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px;  height:24px;width:128px;"   ><STRONG>Consultar por:</STRONG></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 5; LEFT: 184px; WIDTH: 176px; POSITION: absolute; TOP: 96px; HEIGHT: 26px">
<select id="Edit1_ed" name="Edit1_ed" value="<?php echo $Edit1_ed ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:176px; background-color: #FFFFFF;"  onchange="Salva_Etq_edif2(this)"  tabindex="0"    />

	<option value="<?php echo $Edit1_ed ?>"> <?php echo $Edit1_ed ?> </option>
            <option value="CODIGO"> CODIGO </option>
            <option value="NOME"> NOME </option>
            <option value="ENDEREÇO"> ENDEREÇO </option>
            <option value="CNPJ"> CNPJ </option>

</select>


</div>
<div id="Label3_outer" style="Z-INDEX: 6; LEFT: 49px; WIDTH: 128px; POSITION: absolute; TOP: 128px; HEIGHT: 24px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px;  height:24px;width:128px;"   ><STRONG>Consultar:</STRONG></div>
</div>

<?php
if ($Edit1_ed == "CNPJ"){
?>
<div id="Edit2_outer" style="Z-INDEX: 7; LEFT: 184px; WIDTH: 440px; POSITION: absolute; TOP: 124px; HEIGHT: 26px">
<input type="text" id="Edit2_ed" name="Edit2_ed" value="<?php echo $Edit2_ed ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:440px; background-color: #FFFFFF;" onkeypress="return txtBoxFormat(document.Form1, 'Edit2_ed', '99.999.999/9999-99', event);"   tabindex="0"    />
</div>

<?php
}else{
?>
	
<div id="Edit2_outer" style="Z-INDEX: 7; LEFT: 184px; WIDTH: 440px; POSITION: absolute; TOP: 124px; HEIGHT: 26px">
<input type="text" id="Edit2_ed" name="Edit2_ed" value="<?php echo $Edit2_ed ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:440px; background-color: #FFFFFF;"    tabindex="0"    />
</div>

<?php
}
?>


<div id="Label4_outer" style="Z-INDEX: 8; LEFT: 416px; WIDTH: 224px; POSITION: absolute; TOP: 48px; HEIGHT: 24px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #FF0000; height:24px;width:224px;"  align="Center"   ><STRONG><?php echo $menssagem ?></STRONG></div>
</div>
</td></tr></table>
</body>

<div style="Z-INDEX: 34; LEFT: 240px; WIDTH: 544px; POSITION: absolute; TOP: 165px; HEIGHT: 80px">
<table border='0'>
         <td> </td>
         <td><input type=image name="consultar" src="../imagens/botaoazul7.PNG"></td>
         </form>

         <form method="POST" action="javascript:window.close()">
         <td><input type=image name="vontar" src="../imagens/botaoazul9.PNG"></td>
         </form>

</table>
</div>
</html>
