<?php
/*
 -----------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Acesso ao Sistema
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 -----------------------------------------
*/

// Resgata a Sessao
@session_start();
$nome3 = $_SESSION["nome_log"];
$servletjs2 = $_SESSION["servletjs2"];

if ($servletjs2 == '20$$20'){


// Resgata a Sessao
@session_start();

include_once('config.php');

$website	= $_SESSION['website'];
$cpfwebsite = $_SESSION['cpfwebsite'];
$atuali_za  = $_SESSION['atuali_za'];
$criado_za  = $_SESSION['criado_za'];
$logo_sis   = $_SESSION['logo_sis'];
$Titulo     = $_SESSION['Titulo'];
$cnpj_sis   = $_SESSION['cnpj_sis'];
$logo1_sis  = $_SESSION['logo1_sis'];
$logo2_sis  = $_SESSION['logo2_sis'];
$color_bor  = $_SESSION['color_bor'];
$versao_1   = $_SESSION['versao_1'];
$color_menu = $_SESSION['color_menu'];

@session_start();
$nome3 = addslashes($_SESSION["nome_log"]);

//include("config.php");

@session_name("MeuLogin");
@session_start();
@session_destroy();
ob_end_flush();   // Limpa o buffer

$nome3 = "";
$nome2 = "";

if($_GET['login'] == "falhou") {
    print $_GET['causa'];
}

?>

<script>

x=screen.width; 
if (x < 800)
{
	//window.location = "error2.php";
}

x=screen.width; 
if (x != 1024)
{
//	alert("ATENÇÃO altere resolução para 1024 x 768 !!!");
//	window.location = "error.php";
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
}
//-->
</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html>
<head>
<title>Segurança</title>
<link rel="shortcut icon" href="imagens/favicon.ico"/>
</head>
<body>

<style type=text/css>

body { background-image: url(<?=$logo_sis;?>);
       background-attachment: fixed }

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
-->

    A:link,a:active,a:visited{ color:white; text-decoration:none; }
    A:hover{ color:#FF3333; text-decoration:none; }
	A:visited {color:#0000cc;}
	A:active {color:#0000cc;}
	
	A.clase1:visited {color:#000000;}
	A.clase1:active {color:#000000;} 
	A.clase1:link {color:#000000}
	A.clase1:hover {color:#FFFFFF}

</style> 

</html>

<?php

// Saldação ao usuario

$hora = date("H"); //Extrai apenas a hora
if ($hora >= 0 and $hora < 6) {
 $situa_1 = "Boa Madrugada";
 $sol_1   = "imagens/noite.bmp";
 } elseif ($hora >=6 and $hora <12) {
 $situa_1 = "Bom Dia";
 $sol_1   = "imagens/dia.bmp";
 } elseif ($hora >=12 and $hora <19) {
 $situa_1 = "Boa Tarde";
 $sol_1   = "imagens/dia.bmp";
 }else {
 $situa_1 = "Boa Noite";
 $sol_1   = "imagens/noite.bmp";
}

setlocale(LC_TIME,"portuguese");

$dia_semana  = strftime("%A");
$dia_sem_mes = strftime("%B");

// Converte Dia da Semana Ingles Portugues
if (strftime("%A") == "Sunday")   { $dia_semana = "Domingo"; }
if (strftime("%A") == "Monday")   { $dia_semana = "Segunda-feira"; }
if (strftime("%A") == "Tuesday")  { $dia_semana = "Terça-feira"; }
if (strftime("%A") == "Wednesday"){ $dia_semana = "Quarta-feira"; }
if (strftime("%A") == "Thursday") { $dia_semana = "Quinta-feira"; }
if (strftime("%A") == "Friday")   { $dia_semana = "Sexta-feira"; }
if (strftime("%A") == "Saturday") { $dia_semana = "Sabado"; }

// Converte Meses do Ano Ingles Portugues
if (strftime("%B") == "January")   { $dia_sem_mes = "Janeiro"; }
if (strftime("%B") == "February")  { $dia_sem_mes = "Fevereiro"; }
if (strftime("%B") == "March")     { $dia_sem_mes = "Março"; }
if (strftime("%B") == "April")     { $dia_sem_mes = "Abril"; }
if (strftime("%B") == "May")       { $dia_sem_mes = "Maio"; }
if (strftime("%B") == "June")      { $dia_sem_mes = "Junho"; }
if (strftime("%B") == "July")      { $dia_sem_mes = "Julho"; }
if (strftime("%B") == "August")    { $dia_sem_mes = "Agosto"; }
if (strftime("%B") == "September") { $dia_sem_mes = "Setembro"; }
if (strftime("%B") == "October")   { $dia_sem_mes = "Outubro"; }
if (strftime("%B") == "November")  { $dia_sem_mes = "Novembro"; }
if (strftime("%B") == "December")  { $dia_sem_mes = "Dezembro"; }

$bomdia = $situa_1." Seja Bem vindo, ".$nome3." hoje e  ".$dia_semana. strftime(", %d de")." ".$dia_sem_mes.strftime("  de %Y"); 

?>

<html>

<div align=center>

<div id="Label71_outer" style="Z-INDEX: 7; LEFT: 132px; WIDTH: 716px; POSITION: absolute; TOP: 4px; HEIGHT: 19px">
<div id="Label71" style=" font-family: Arial; font-size: 16px; color: #000000; height:19px; width:716px;"   ><img id="Image99" src="<?=$sol_1;?>"  width="20"  height="17"  border="0"  />&nbsp;&nbsp;<b><i><?=$bomdia;?></i></b></div>
</div>
</div>

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "  >
<table  width="10"   style="height:19px"  border="0" cellpadding="0" cellspacing="0"  ><tr><td valign="top">

<div id="Image1_outer" style="Z-INDEX: 1; LEFT: 107px; WIDTH: 95px; POSITION: absolute; TOP: 26px; HEIGHT: 25px">
<div id="Image1_container" style=" width: 95;  height: 25; " ><img id="Image1" src="imagens/menu.png"  width="95"  height="25"  border="0"       /></div>
</div>
<div id="Image2_outer" style="Z-INDEX: 2; LEFT: 204px; WIDTH: 95px; POSITION: absolute; TOP: 26px; HEIGHT: 25px">
<div id="Image2_container" style=" width: 95;  height: 25; " ><img id="Image2" src="imagens/menu.png"  width="95"  height="25"  border="0"       /></div>
</div>
<div id="Image3_outer" style="Z-INDEX: 3; LEFT: 301px; WIDTH: 95px; POSITION: absolute; TOP: 26px; HEIGHT: 25px">
<div id="Image3_container" style=" width: 95;  height: 25; overflow: hidden;" ><img id="Image3" src="imagens/menu.png"  width="95"  height="25"  border="0"       /></div>
</div>
<div id="Image4_outer" style="Z-INDEX: 4; LEFT: 398px; WIDTH: 95px; POSITION: absolute; TOP: 26px; HEIGHT: 25px">
<div id="Image4_container" style=" width: 95;  height: 25; overflow: hidden;" ><img id="Image4" src="imagens/menu.png"  width="95"  height="25"  border="0"       /></div>
</div>
<div id="Image5_outer" style="Z-INDEX: 5; LEFT: 495px; WIDTH: 95px; POSITION: absolute; TOP: 26px; HEIGHT: 25px">
<div id="Image5_container" style=" width: 95;  height: 25; overflow: hidden;" ><img id="Image5" src="imagens/menu.png"  width="95"  height="25"  border="0"       /></div>
</div>
<div id="Image6_outer" style="Z-INDEX: 6; LEFT: 592px; WIDTH: 95px; POSITION: absolute; TOP: 26px; HEIGHT: 25px">
<div id="Image6_container" style=" width: 95;  height: 25; overflow: hidden;" ><img id="Image6" src="imagens/menu.png"  width="95"  height="25"  border="0"       /></div>
</div>
<div id="Image7_outer" style="Z-INDEX: 7; LEFT: 786px; WIDTH: 95px; POSITION: absolute; TOP: 26px; HEIGHT: 25px">
<div id="Image7_container" style=" width: 95;  height: 25; overflow: hidden;" ><img id="Image7" src="imagens/menu.png"  width="95"  height="25"  border="0"       /></div>
</div>
<div id="Image8_outer" style="Z-INDEX: 16; LEFT: 689px; WIDTH: 95px; POSITION: absolute; TOP: 26px; HEIGHT: 25px">
<div id="Image8_container" style=" width: 95;  height: 25; overflow: hidden;" ><img id="Image8" src="imagens/menu.png"  width="95"  height="25"  border="0"       /></div>
</div>
<div id="Label1_outer" style="Z-INDEX: 8; LEFT: 113px; WIDTH: 85px; POSITION: absolute; TOP: 30px; HEIGHT: 19px">
<div id="Label1" style=" font-family: Arial; font-size: 13px; font-weight: bold; height:19px;width:85px;"  align="Center"   >Cadastros</div>
</div>
<div id="Label2_outer" style="Z-INDEX: 9; LEFT: 210px; WIDTH: 85px; POSITION: absolute; TOP: 30px; HEIGHT: 19px">
<div id="Label2" style=" font-family: Arial; font-size: 13px; font-weight: bold; height:19px;width:85px;"  align="Center"   ><b>Contribuição</b></div>
</div>
<div id="Label3_outer" style="Z-INDEX: 10; LEFT: 307px; WIDTH: 85px; POSITION: absolute; TOP: 30px; HEIGHT: 19px">
<div id="Label3" style=" font-family: Arial; font-size: 13px; font-weight: bold; height:19px;width:85px;"  align="Center"   >Relatórios</div>
</div>
<div id="Label4_outer" style="Z-INDEX: 11; LEFT: 404px; WIDTH: 85px; POSITION: absolute; TOP: 30px; HEIGHT: 19px">
<div id="Label4" style=" font-family: Arial; font-size: 13px; font-weight: bold; height:19px;width:85px;"  align="Center"   >Saúde</div>
</div>
<div id="Label5_outer" style="Z-INDEX: 12; LEFT: 501px; WIDTH: 85px; POSITION: absolute; TOP: 30px; HEIGHT: 19px">
<div id="Label5" style=" font-family: Arial; font-size: 13px; font-weight: bold; height:19px;width:85px;"  align="Center"   >Caixa</div>
</div>
<div id="Label6_outer" style="Z-INDEX: 13; LEFT: 598px; WIDTH: 85px; POSITION: absolute; TOP: 30px; HEIGHT: 19px">
<div id="Label6" style=" font-family: Arial; font-size: 13px; font-weight: bold; height:19px;width:85px;"  align="Center"   >Juridico</div>
</div>
<div id="Label7_outer" style="Z-INDEX: 14; LEFT: 792px; WIDTH: 85px; POSITION: absolute; TOP: 30px; HEIGHT: 19px">
<div id="Label7" style=" font-family: Arial; font-size: 13px; font-weight: bold; height:19px;width:85px;"  align="Center"   >Operador</div>
</div>
<div id="Label9_outer" style="Z-INDEX: 17; LEFT: 695px; WIDTH: 85px; POSITION: absolute; TOP: 30px; HEIGHT: 19px">
<div id="Label9" style=" font-family: Arial; font-size: 13px; font-weight: bold; height:19px;width:85px;"  align="Center"   >Web Site</div>
</div>
</td></tr></table>
</form></body>

<style>

.normal {
	
	background-color: white;
}
.anormal {
		background-color: Lavender;
}

</style>


<body onkeydown="javascript:if (event.KeyCode==13) event.KeyCode=9; javascript:document.onkeydown = keyCatcher();" onload="document.form1.nome_log.focus();">

<br/>
<br/>
<br/>
<br/>

<div align=center>

<table  border="15" align="center" bordercolor ='<?=$color_bor;?>' bgcolor="#FFFFFF">

<tr>
<td height="28" bgcolor="#FFF8DC">

      <font face=arial><b>*** Digite sua Senha de Acesso ***</b></font>

</td>
</tr>

      <form name="form1" method="post" autocomplete="off" action="logar.php?acao=logar">

<tr>
    <th height="70" bgcolor="#FFF8DC">
	<table width="10" height="64" border="0" align="center">
      <tr>
        <td width="97" height="29"><div align="right"><font color="#FFFFFF">......</font><font face=arial><b>Usu&aacute;rio:</b></div></td>
        <td width="137"><div align="left"><input type="text" name="nome_log" style="width:125px; height:25px" onfocus="this.className='anormal'" onblur="this.className='normal'" onchange="this.value.toUpperCase" style="text-transform: uppercase;" ></div>          </td>
        <td width="17"><img src="imagens/px1.gif" width="30" height="10"></td>
      </tr>
      <tr>
        <td height="29"><div align="right"><font face=arial><b>Senha:</b></div></td>
        <td><div align="left"><input type="password" name="pwd"  style="width:125px; height:25px" onfocus="this.className='anormal'" onblur="this.className='normal'" onchange="this.value.toUpperCase" style="password-transform: uppercase;" /></div>          </td>
        <td><div align="left"><a href="info/ajuda.php"><img src="imagens/ajud-1.png" width="13" height="13" border="0"></a></div></td>
      </tr>
    </table>
	
	<table width="100%" border="0">
      <tr>
        <td width="6%" align="center"><img src="imagens/cadeado.gif" width="90" height="41" border="0"></td>
        <td width="38%" align="center"><font size="1"><img src="imagens/px1.gif" width="1" height="1"><br>
        </font>
          <input name="guias" type=image src="imagens/login.PNG" width="92" height="22" /></td>
        <td width="56%">&nbsp;</td>
      </tr>
    </table>
	
	</th>
</tr>

  </form>
</table >

<script> window.focus();</script>
</body>
</html>



<script> window.focus();</script>
<script type="text/javascrip">document.form1.nome_log.focus(); </script>

<?php
}else{

header('Location:index.php');

	
}
?>