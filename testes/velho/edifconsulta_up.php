<?
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
session_start();
$path = strtoupper($_SESSION['Path1']);

require($path."logar.php");
$nome3 = $_SESSION["nome_log"];

require("menu.php");
unset ($_SESSION['Acao_up']);
unset ($_SESSION['Procura_up']);

?>

<html>
<head>
<title><?=$Titulo;?></title>
</head>
<body>
</html>

<?
require("funcoes2.php");

$Edit1_ed = " ";
$Edit2_ed = " ";
?>

<html >

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; " onload="document.form1.Edit1_ed.focus();">
<form name="form1" type='hidden' method='POST' action='edifpesquisa_up.php'>

<table  width="904"   style="height:392px"  border="0" cellpadding="0" cellspacing="0"  ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 177px; WIDTH: 680px; POSITION: absolute; TOP: 48px; HEIGHT: 225px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(15, 15, 650 - 15, 195 - 15);
  Shape1_Canvas.fillRect(15, 15, 650 - 15 + 1, 195 - 15 + 1);
  Shape1_Canvas.setStroke(15);
  Shape1_Canvas.setColor("#5a9cb1");
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
  Shape2_Canvas.setColor("#5a9cb1");
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
<select id="Edit1_ed" name="Edit1_ed" value="<?=$Edit1_ed;?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:169px;"  maxlength=10  tabindex="0"    />

	<option value="<?=$Edit1_ed;?>"> <?=$Edit1_ed;?> </option>
            <option value="CODIGO"> CODIGO </option>
            <option value="NOME"> NOME </option>
            <option value="ENDEREÇO"> ENDEREÇO </option>
            <option value="CNPJ"> CNPJ </option>

</select>

</div>
<div id="Edit2_outer" style="Z-INDEX: 5; LEFT: 354px; WIDTH: 446px; POSITION: absolute; TOP: 169px; HEIGHT: 24px">
<input type="text" id="Edit2_ed" name="Edit2_ed" value="<?=$Edit2_ed;?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:446px;"  maxlength=40  tabindex="0"    />
</div>
<div id="Shape3_outer" style="Z-INDEX: 6; LEFT: 209px; WIDTH: 616px; POSITION: absolute; TOP: 80px; HEIGHT: 46px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 614 - 1, 44 - 1);
  Shape3_Canvas.fillRect(1, 1, 614 - 1 + 1, 44 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("#5a9cb1");
  Shape3_Canvas.drawRect(1, 1, 614 - 1 + 1, 44 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label31_outer" style="Z-INDEX: 7; LEFT: 225px; WIDTH: 320px; POSITION: absolute; TOP: 84px; HEIGHT: 32px">
<div id="Label31" style=" font-family: Verdana; font-size: 26px; color: #5a9cb1;font-weight: bold;text-align: left; height:32px;width:420px;"   > Consultar Condominio </div>
</div>
<div id="Label6_outer" style="Z-INDEX: 8; LEFT: 522px; WIDTH: 288px; POSITION: absolute; TOP: 93px; HEIGHT: 24px">
<div id="Label6" style=" font-family: Verdana; font-size: 16px;  height:24px;width:288px;"  align="Center"   > <STRONG><font color=red><?=$menssagem;?></font></STRONG> </div>
</div>
</td></tr></table>
</body>

<div style="Z-INDEX: 34; LEFT: 395px; WIDTH: 544px; POSITION: absolute; TOP: 205px; HEIGHT: 80px">
<table border='0'>
         <td> </td>
         <td><input type=image name="consultar" src="imagens/botaoazul7.PNG"></td>
         </form>

         <form method="POST" action="javascript:history.go(-1)">
         <td><input type=image name="vontar" src="imagens/botaoazul9.PNG"></td>
         </form>

</table>
</div>
</html>