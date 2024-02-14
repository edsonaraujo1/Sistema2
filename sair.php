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

include("config.php");

//@session_start();
//unset ($_SESSION["nome_log"]);
//@session_destroy();
//@ob_end_flush();   // Limpa o buffer

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

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

$nome3 = addslashes($_SESSION["nome_log"]);


include_once('sql_injection.php');
			
// Abre Conexão com o MySql
include("conexao.php");
// Chama o Banco de Dados
			
$link = @mysql_connect($host,$user,$pass);
			
@mysql_select_db($db);

$se_ssao    = session_id();
			
$consulta = "DELETE FROM useronline Where usuario = '". anti_sql_injection($nome3) ."' AND sessao = '$se_ssao'";
			
@mysql_query($consulta, $link);


$consulta0   = "SELECT * FROM tt_ser_01 WHERE login='". anti_sql_injection($nome3) ."'";

$result0     = @mysql_query($consulta0);
			
$row_0       = @mysql_fetch_array($result0);
			
$ultima_dat  = @$row_0["saida"];

@mysql_close();

@session_start();
unset ($_SESSION["informes_log"]);
unset ($_SESSION["nome_log"]);

@session_destroy();
ob_end_flush();   // Limpa o buffer

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"></meta>
<link rel="shortcut icon" href="imagens/favicon.ico"/>
<link type="text/css" rel="stylesheet" href="menu.css"/>
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
include("info/help.php");
?>

<style>

.normal {
	
	background-color: white;
}
.anormal {
		background-color: Lavender;
}

</style>

<body background="<?php echo $logo_sis ?>" style=" margin-left: 0px;  margin-top: 3px;  margin-right: 0px;  margin-bottom: 0px; " onkeydown="javascript:if (event.KeyCode==13) event.KeyCode=9; javascript:document.onkeydown = keyCatcher();" onload="document.form1.nome_log.focus();">
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
              <td><div align="center"><img src="imagens/kitt.gif" width="65" height="4"></div></td>
            </tr>
          </table>
    </div></td>
    <td width="81%"><div align="center">
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><div align="center"><img src="<?=$sol_1;?>" width="17" height="17" /><img src="imagens/px1.gif" width="10" height="10" /><font face="Arial"><i><b>
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
    <td><div align="center"><img src="imagens/carta.gif" width="34" height="27" border="0" /></div></td>
    <td valign="bottom"><div align="center">
      <table width="200" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/px1.gif" width="3" height="30" /></td>
          <td><img src="imagens/cadastro.png" width="95" height="26" /></td>
          <td><img src="imagens/px1.gif" width="4" height="30" /></td>
          <td><img src="imagens/contribuicao.png" width="95" height="26" /></td>
          <td><img src="imagens/px1.gif" width="4" height="30" /></td>
          <td><img src="imagens/relatorios.png" width="95" height="26" /></td>
          <td><img src="imagens/px1.gif" width="4" height="30" /></td>
          <td><img src="imagens/saude.png" width="95" height="26" /></td>
          <td><img src="imagens/px1.gif" width="4" height="30" /></td>
          <td><img src="imagens/juridico.png" width="95" height="26" /></td>
          <td><img src="imagens/px1.gif" width="4" height="30" /></td>
          <td><img src="imagens/caixa.png" width="95" height="26" /></td>
          <td><img src="imagens/px1.gif" width="4" height="30" /></td>
          <td><img src="imagens/website.png" width="95" height="26" /></td>
          <td><img src="imagens/px1.gif" width="4" height="30" /></td>
          <td><img src="imagens/operador.png" width="95" height="26" /></td>
          <td><img src="imagens/px1.gif" width="4" height="30" /></td>
          <td><img src="imagens/help.png" width="95" height="26" /></td>
          <td><img src="imagens/px1.gif" width="3" height="30" /></td>
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

            <table width="304" height="219"  border="15" align="center" bordercolor ='<?php echo $color_bor ?>' bgcolor="#FFFFFF">
              <tr>
                <td height="28" align="center" bgcolor="#FFF8DC"> <font face="arial">
                  <div align="center"><b>* * * AT&Eacute; LOGO !!! * * *</b> </div>
                </font></td>
              </tr>
              <form action="info/info.php?inf=345" method="post" name="form1" id="form1">
                <tr>
                  <th height="86" align="center" bgcolor="#FFF8DC">
                    <table width="236" border="0" align="center">
                      <tr>
                        <td width="48" align="center"><div align="right"><font color="#FFFFFF">......</font></div></td>
                        <td width="126" align="center"><font color="#FFFFFF"><img src="imagens/ate_logo.gif" width="125" height="70" /></font></td>
                        <td width="48" align="center">&nbsp;</td>
                      </tr>
                  </table></th>
                </tr>
                <tr>
                  <td align="center" valign="top" bgcolor="#FFF8DC"><table width="203" border="0" align="center">
                      <tr><font face="arial">
                        <td width="233" align="center"><div align="center"><font face="arial"><b>Seu Ultimo acesso foi em</b></font></div></td>
                      </font></tr>
                      <tr>
                        <td height="29" align="center"><div align="center"> <?php echo $ultima_dat ?> </div></td>
                      </tr>
                      <tr>
                        <td align="center"><div align="center"><a href="login.php"><img src="imagens/botao_voltar.PNG" width="92" height="22" border="0" /></a></div></td>
                      </tr>
                    </table>
                      <div align="center"><img src="imagens/px1.gif" width="20" height="10" /></div></td>
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
