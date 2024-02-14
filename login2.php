<?php
/*
 -----------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Tela de Logim
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 -----------------------------------------
*/

include("../config.php");

@session_start();
unset ($_SESSION["nome_log"]);
@session_destroy();
@ob_end_flush();   // Limpa o buffer

// Saldação ao usuario

$hora = date("H"); //Extrai apenas a hora
if ($hora >= 0 and $hora < 6) {
 $situa_1 = "Boa Madrugada";
 $sol_1   = "../imagens/noite.bmp";
 } elseif ($hora >=6 and $hora <12) {
 $situa_1 = "Bom Dia";
 $sol_1   = "../imagens/dia.bmp";
 } elseif ($hora >=12 and $hora <19) {
 $situa_1 = "Boa Tarde";
 $sol_1   = "../imagens/dia.bmp";
 }else {
 $situa_1 = "Boa Noite";
 $sol_1   = "../imagens/noite.bmp";
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"></meta>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<link type="text/css" rel="stylesheet" href="../menu.css"/>
<style type="text/css" media="screen">
</style>

<script language="JavaScript">
<!--

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
<style>


A.linkmenu2 {
	FONT-WEIGHT: bold; COLOR: #000000; TEXT-DECORATION: none; font-size: 14px
}
A.linkmenu2:visited {
	TEXT-DECORATION: none; font-size: 14px
}
A.linkmenu2:hover {
	COLOR: #000000; TEXT-DECORATION: none; font-size: 14px
}
A.linkmenu2:active {
	COLOR: #000000; TEXT-DECORATION: none; font-size: 14px
}
</style>

<title><?php echo $Titulo ?></title>
</head>
<?php
include("../info/help2.php");
?>

<style>

.normal {
	
	background-color: white;
}
.anormal {
		background-color: Lavender;
}

</style>

<body background="../<?php echo $logo_sis ?>" style=" margin-left: 0px;  margin-top: 3px;  margin-right: 0px;  margin-bottom: 0px; " onkeydown="javascript:if (event.KeyCode==13) event.KeyCode=9; javascript:document.onkeydown = keyCatcher();" onload="document.form1.nome_log.focus();">
<!-- start menu HTML -->
<div align="center" >
<table width="98%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="11%"><div align="center">
      <table width="133" border="0">
            <tr>
              <td width="127">                <div align="center"><font color="#339999" size="2">off-line</font></div></td>
            </tr>
            <tr>
              <td><div align="center"><img src="../imagens/kitt.gif" width="65" height="4"></div></td>
            </tr>
          </table>
    </div></td>
    <td width="81%"><div align="center">
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><div align="center"><img src="<?=$sol_1;?>" width="17" height="17" /><img src="../imagens/px1.gif" width="10" height="10" /><font face="Arial"><i><b>
              <?=$bomdia;?>
          </b></i></font></div></td>
        </tr>
      </table>
    </div></td>
    <td width="11%"><div align="center">
      <table width="125" border="0" cellspacing="0">
        <tr>
          <td width="50"><div align="center"><font color="#669999" size="2" face="Times New Roman, Times, serif">
              
          </font></div></td>
        </tr>
        <tr>
          <td>
            
          </td>
        </tr>
      </table>
    </div></td>
  </tr>
  <tr>
    <td><div align="center"><img src="../imagens/carta.gif" width="34" height="27" border="0" /></div></td>
    <td valign="bottom"><div align="center">
      <table width="200" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="../imagens/px1.gif" width="3" height="30" /></td>
          <td><img src="../imagens/cadastro.png" width="95" height="26" /></td>
          <td><img src="../imagens/px1.gif" width="4" height="30" /></td>
          <td><img src="../imagens/contribuicao.png" width="95" height="26" /></td>
          <td><img src="../imagens/px1.gif" width="4" height="30" /></td>
          <td><img src="../imagens/relatorios.png" width="95" height="26" /></td>
          <td><img src="../imagens/px1.gif" width="4" height="30" /></td>
          <td><img src="../imagens/saude.png" width="95" height="26" /></td>
          <td><img src="../imagens/px1.gif" width="4" height="30" /></td>
          <td><img src="../imagens/juridico.png" width="95" height="26" /></td>
          <td><img src="../imagens/px1.gif" width="4" height="30" /></td>
          <td><img src="../imagens/caixa.png" width="95" height="26" /></td>
          <td><img src="../imagens/px1.gif" width="4" height="30" /></td>
          <td><img src="../imagens/website.png" width="95" height="26" /></td>
          <td><img src="../imagens/px1.gif" width="4" height="30" /></td>
          <td><img src="../imagens/operador.png" width="95" height="26" /></td>
          <td><img src="../imagens/px1.gif" width="4" height="30" /></td>
          <td><img src="../imagens/help.png" width="95" height="26" /></td>
          <td><img src="../imagens/px1.gif" width="3" height="30" /></td>
        </tr>
      </table>
    </div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td valign="top">
      <table width="889" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="889" align="left" valign="top"><b><font size="1" face="Aria"><?php echo "Atualizado em ".$atuali_za ?></font></b></td>
        </tr>
        <tr>
          <td height="131"><div align="center">

            <br />
            <table  border="15" align="center" bordercolor="<?php echo $color_bor ?>" bgcolor="#FFFFFF">

<tr>
<td height="28" bgcolor="#FFF8DC">

<?php
if($_GET['login'] == "falhou"){
?>

   <font face=arial color="red"><b>*** Usuario ou Senha Invalido ***</b></font>
      
<?php
}else{
?>

   <font face=arial><b>*** Digite sua Senha de Acesso ***</b></font>
   
<?php
}
?>       
</td>
</tr>

      <form name="form1" method="post" autocomplete="off" action="../logar.php?acao=logar">

<tr>
    <th height="70" bgcolor="#FFF8DC">
	<table width="10" height="64" border="0" align="center">
      <tr>
        <td width="97" height="29"><div align="right"><font color="#FFFFFF">......</font><font face=arial><b>Usu&aacute;rio:</b></font></div></td>
        <td width="137"><div align="left"><input type="text" name="nome_log" style="width:125px; height:25px; text-transform: uppercase;" onfocus="this.className='anormal'" onblur="this.className='normal'" onchange="this.value.toUpperCase"></div>          </td>
        <td width="17"><img src="../imagens/px1.gif" width="30" height="10"></td>
      </tr>
      <tr>
        <td height="29"><div align="right"><font face=arial><b>Senha:</b></font></div></td>
        <td><div align="left"><input type="password" name="pwd"  style="width:125px; height:25px; password-transform: uppercase;" onfocus="this.className='anormal'" onblur="this.className='normal'" onchange="this.value.toUpperCase" /></div>          </td>
        <td><div align="left"><a href="../info/ajuda.php"><img src="../imagens/ajud-1.png" width="13" height="13" border="0"></a></div></td>
      </tr>
    </table>
	
	<table width="100%" border="0">
      <tr>
        <td width="6%" align="center"><img src="../imagens/cadeado.gif" width="90" height="41" border="0"></td>
        <td width="38%" align="center"><font size="1"><img src="../imagens/px1.gif" width="1" height="1"><br>
        </font>
          <input name="guias" type=image src="../imagens/login.PNG" width="92" height="22" /></td>
        <td width="56%">&nbsp;</td>
      </tr>
    </table>
	
	</th>
</tr>

  </form>
</table >


          </div></td>
        </tr>
        <tr>
          <td height="23"><div align="center"><a href="<?php echo $website ?>" class='linkmenu2' ><b>Web Site</b></a></div></td>
        </tr>
      </table>      
      <div align="center"></div>      <p align="center">&nbsp;</p></td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
</div> 
<script> window.focus();</script>
</body>
<script> window.focus();</script>
<script type="text/javascrip">document.form1.nome_log.focus(); </script>

</html>
