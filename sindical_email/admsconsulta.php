<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Consultar Cadastro Empresa
 Criado em Data.....: 07/12/2007
 Ultima Atualiza��o : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

if (!empty($path)){
	
include("../logar.php");
$nome3 = $_SESSION["nome_log"];

// Resgata Sessao
session_name("Val_Etq_Edif");
session_start();

unset ($_SESSION['Acao']);
//unset ($_SESSION['Edit1']);
//unset ($_SESSION['Edit2']);
unset ($_SESSION['Edit3']);
unset ($_SESSION['Edit4']);
unset ($_SESSION['Codigo_ed']);
unset ($_SESSION['Nome_ed']);

$Edit1_ed  = $_SESSION['Edit1'];
$Edit2_ed  = $_SESSION['Edit2'];

?>

<html>
<head>
<title><?=$Titulo;?></title>
</head>
<body>

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

</body>
</html>

<?
include("funcoes2.php");

?>

<html >

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; " onload="document.Form1.Edit1_ed.focus();">
<form name="Form1" type='hidden' method='POST' action='admspesquisa.php'>

<table  width="688"   style="height:232px"  border="0" cellpadding="0" cellspacing="0"  ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 0px; WIDTH: 688px; POSITION: absolute; TOP: 0px; HEIGHT: 232px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(15, 15, 658 - 15, 202 - 15);
  Shape1_Canvas.fillRect(15, 15, 658 - 15 + 1, 202 - 15 + 1);
  Shape1_Canvas.setStroke(15);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
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
  Shape2_Canvas.setColor("<?=$color_bor;?>");
  Shape2_Canvas.drawRect(1, 1, 622 - 1 + 1, 46 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 49px; WIDTH: 543px; POSITION: absolute; TOP: 39px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: #5a9cb1; height:32px;width:543px;"   >  <STRONG>Consultar Administradora</STRONG>  </div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 3; LEFT: 32px; WIDTH: 624px; POSITION: absolute; TOP: 82px; HEIGHT: 118px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 622 - 1, 116 - 1);
  Shape3_Canvas.fillRect(1, 1, 622 - 1 + 1, 116 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 622 - 1 + 1, 116 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 4; LEFT: 48px; WIDTH: 128px; POSITION: absolute; TOP: 100px; HEIGHT: 24px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px;  height:24px;width:128px;"   >  <STRONG>Consultar por:</STRONG>  </div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 5; LEFT: 184px; WIDTH: 176px; POSITION: absolute; TOP: 96px; HEIGHT: 26px">
<select id="Edit1_ed" name="Edit1_ed" value="<?=$Edit1_ed;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:176px;"  onchange="Salva_Etq_adms1(this)"  tabindex="0"    />

	<option value="<?=$Edit1_ed;?>"> <?=$Edit1_ed;?> </option>
            <option value="CODIGO"> CODIGO </option>
            <option value="NOME"> NOME </option>
            <option value="ENDERE�O"> ENDERE�O </option>
            <option value="CNPJ"> CNPJ </option>

</select>


</div>
<div id="Label3_outer" style="Z-INDEX: 6; LEFT: 49px; WIDTH: 128px; POSITION: absolute; TOP: 128px; HEIGHT: 24px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px;  height:24px;width:128px;"   >  <STRONG>Consultar:</STRONG>  </div>
</div>


<?
if ($Edit1_ed == "CNPJ"){
?>
<div id="Edit2_outer" style="Z-INDEX: 7; LEFT: 184px; WIDTH: 440px; POSITION: absolute; TOP: 124px; HEIGHT: 26px">
<input type="text" id="Edit2_ed" name="Edit2_ed" value="<?=$Edit2_ed;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:440px;" onkeypress="return txtBoxFormat(document.Form1, 'Edit2_ed', '99.999.999/9999-99', event);"   tabindex="0"    />
</div>

<?
}else{
?>
	
<div id="Edit2_outer" style="Z-INDEX: 7; LEFT: 184px; WIDTH: 440px; POSITION: absolute; TOP: 124px; HEIGHT: 26px">
<input type="text" id="Edit2_ed" name="Edit2_ed" value="<?=$Edit2_ed;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:440px;"    tabindex="0"    />
</div>

<?
}
?>

<div id="Label4_outer" style="Z-INDEX: 8; LEFT: 416px; WIDTH: 224px; POSITION: absolute; TOP: 48px; HEIGHT: 24px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #FF0000; height:24px;width:224px;"  align="Center"   >  <STRONG><?=$menssagem;?></STRONG>  </div>
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
<?
}else{
	
echo "
            <html>
			<head>
			<title>ERRO AO CONECTAR</title>
			</head>
			<body>
						
			<style type=text/css>
			
			<!--.cp {  font: bold 10px Arial; color: black}
			<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
			<!--.ld { font: bold 15px Arial; color: #000000}
			<!--.ct { FONT: 9px 'Arial Narrow'; COLOR: #000033}
			<!--.cn { FONT: 9px Arial; COLOR: black }
			<!--.bc { font: bold 22px Arial; color: #000000 }
			--></style> 
			
			</HEAD>
			<BODY text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0 leftmargin=0 bottommargin=0 bgcolor='#CDCDC1' background='../$logo_sis'>
			</html>
			
			<br><br><br><br>
				
			<div align=center>
			
			<table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='$color_bor'>
			<tr>
			<td align=center>
			     <font face=arial><b>*** ERRO ACESSO N�O PERMITIDO PARA USUARIO !!! ***<br>
				                     esse acesso gerou um log para o Administrador  <br>
									 TENTATIVA DE INVAS�O</b>
			<table align=center>
			<form method='POST' action='javascript:window.close()'>
			<td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
			</form>  
			</table>
			</td>
			</tr>
			</table>
			</div>";

}
// Resgata Sessao
session_start();

unset ($_SESSION['Edit1']);
unset ($_SESSION['Edit2']);

?>