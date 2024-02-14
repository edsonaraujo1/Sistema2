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

include("../config.php");

// Resgata a Sessao
@session_start();
$nome3 = $_SESSION["nome_log"];
$servletjs2 = $_SESSION["servletjs2"];
$_SESSION["tela_2"] = 2;

if(!empty($nome3)){

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
	
	$bomdia = $situa_1." Seja Bem vindo, ". strtoupper($nome3)." hoje e  ".$dia_semana. strftime(", %d de")." ".$dia_sem_mes.strftime("  de %Y"); 
	
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
	
	<body background="../<?php echo $logo_sis ?>" style=" margin-left: 0px;  margin-top: 3px;  margin-right: 0px;  margin-bottom: 0px; ">
	<!-- start menu HTML -->
	<div align="center" >
	<table width="98%" border="0" cellpadding="0" cellspacing="0">
	  <tr>
	    <td width="11%"><div align="center">
	      <table width="125" border="0" cellspacing="0">
	        <tr>
	          <td width="50"><div align="center"><font color="#669999" size="2" face="Times New Roman, Times, serif">
	          <iframe src="../info/user.php" width="130" height="22" scrolling="no" frameborder="0" align="left"></iframe>
	          </font></div></td>
	        </tr>
	        <tr>
	          <td>
	          <iframe src="../info/informes2.php" width="1" height="1" scrolling="no" frameborder="0" align="left"></iframe>
	          </td>
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
	            <iframe src="../info/informes2.php" width="1" height="1" scrolling="No" frameborder="0" align="left"></iframe>
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
	          <td width="889" valign="top"><div align="left"><b><font size="1" face="Aria"><?php echo "Atualizado em ".$atuali_za ?></font></b></div></td>
	        </tr>
	        <tr>
	          <td height="131"><div align="center">
	            <table width="633"  border="16" bordercolor="<?php echo $color_bor ?>" bgcolor="#FFFFCC">
	              <tr>
	                <td><div align="center">
	                    <table width="100%" height="0%" border="1" cellpadding="0" cellspacing="3" bordercolor="<?php echo $color_bor ?>">
	                      <tr>
	                        <td width="28%" height="113" bgcolor="#FFFFFF"><div align="center"><b><font size="5" face="Verdana" color="#5A9CB1"><img src="../imagens/Pin_lunix.png" width="110" height="91" /></font></b></div></td>
	                        <td width="48%" bgcolor="#FFFFFF"><div align="center"><b><font size="2" face="Verdana">

                            <marquee scrolldelay=150  style="border: #FFFFFF 1px Solid; background: #ffffff; height: 80px; width: 180px;" direction="up" onMouseOver='this.stop()' onMouseOut='this.start()' >
                           

							<center>SBD - Sistema de Banco de Dados em PHP</center><br>
							<center><img id='Image1' src='../imagens/ate_logo.gif'  width='80'  height='60'  border='0'/>
							</center><br>
							<center>* * - Colaboradores - * *</center><br>
							<center>Edson de Araujo</center>
							<center> - </center>
							<center>'Mas a DEUS tudo'</center>
							<center> e Possível !!!''</center>

                            </marquee>


                            </font></b></div></td>
	                        <td width="24%" bgcolor="#FFFFFF"><div align="center"><img src="../imagens/Mysql.jpg" width="129" height="80" /></div></td>
	                      </tr>
	                    </table>
	                    <table width="95%" border="0">
	                      <tr>
	                        <td height="127"><div align="center">
	                            <table width="580" height="125" border="0">
	                              <tr>
	                                <td width="574" height="121"><div align="center">
	                                    <table width="503" border="0" cellspacing="0">
	                                      <tr>
	                                        <td width="407"><strong><font size="3" face="Arial, Helvetica, sans-serif">Programador.:<em> <a href="mailto.edsonaraujo1@hotmail.com">Edson de Araujo</a></em> (Desenvolvedor) </font></strong></td>
	                                        <td width="92"><div align="center"><a href="../menu_1.php"><img src="../imagens/botaoazul24.PNG" width="92" height="22" border="0" /></a></div></td>
	                                      </tr>
	                                      <tr>
	                                        <td><strong><font size="3" face="Arial, Helvetica, sans-serif">Programador.:</font> <font size="3" face="Arial, Helvetica, sans-serif"><a href="mailt.xxxxxxx@.com.br"><em>xxxxxxxxxxxxxxxx</em></a> (Desenvolvedor) </font></strong></td>
	                                        <td>&nbsp;</td>
	                                      </tr>
	                                    </table>
	                                    <font size="3" face="Arial, Helvetica, sans-serif"><strong> <b>Desenvolvido em.: <i>PHP/JavaScript/MySQL/AJAX/Server Apache </i></b><br />
	                                    </strong>
	                                    <strong>Este Programa esta protegido Pela Lei: 9.610, de 02/1998. Copyrigtht(c) </strong></font><strong><font face="Arial, Helvetica, sans-serif"><br />
	                                    </font></strong>
	                                    <table width="510" height="32" border="1" cellpadding="0" cellspacing="0" bordercolor="#5A9CB1">
	                                      <tr>
	                                        <td height="29" bgcolor="#FFFFFF"><div align="center"><strong><font face="Arial, Helvetica, sans-serif">Usuario...: <?php echo strtoupper($nome3) ?>&nbsp;&nbsp;Versao&nbsp;&nbsp;<?php echo $versao_1 ?> </font></strong></div></td>
	                                      </tr>
	                                    </table>
	                                    <strong><font face="Arial, Helvetica, sans-serif"> </font></strong></div></td>
	                              </tr>
	                            </table>
	                        </div></td>
	                      </tr>
	                    </table>
	                    <table width="100%" border="1" bordercolor="#5A9CB1">
	                      <tr>
	                        <td width="72%" height="116" bgcolor="#FFFFFF"><div align="center"><font size="4"><strong><font face="Arial, Helvetica, sans-serif">Este Produto esta Licenciado para:<br />
	                                      <font color="#FF0000"><em><i><?php echo $Titulo ?></i></em></font><br />
	                CNPJ/CPF: <I><?php echo $cnpj_sis ?></I><br />
	                Criado em.: <font color="#66CC00"><b><?php echo $criado_za ?></b></font><br />
	                Ultima Atualiza&ccedil;&atilde;o em.: <font color="#0000FF"><b><?php echo $atuali_za ?></b></font></font></strong></font></div></td>
	                        <td width="28%" bgcolor="#FFFFFF"><div align="center"><a href="<?php echo $website ?>" target="new"><img src="<?php echo "../".$logo1_sis ?>" width="137" height="112" border="0" /></a></div></td>
	                      </tr>
	                    </table>
	                </div></td>
	              </tr>
	            </table>
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
	</body>
	</html>
<?php
}else{
	include("login.php");
	//exit;
}
?>	