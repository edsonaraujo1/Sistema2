<?
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


include("vaurls.php");


		
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
		
		    // Descriptografar arquivo config.ini
		    $Edit1  = $Titulo;
			$Edit2  = $server_sq2;
			$Edit3  = $server_sq3;
			$Edit4  = $user_sq2;
			$Edit5  = $pass_sq2;
			$Edit6  = $banco_sq2;
		
			
			$mensagens = "* * * Visualizar * * *";
			
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
			      <table width="133" border="0">
                    <tr>
                      <td width="127">
                        <div align="center"><font color="#339999" size="2">off-line</font></div></td>
                    </tr>
                    <tr>
                      <td><div align="center"><img src="../imagens/kitt.gif" width="65" height="4" /></div></td>
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
			          <td width="889" valign="top"><b><font size="1" face="Aria"><?php echo "Atualizado em ".$atuali_za ?></font></b></td>
			        </tr>
			        <tr>
			          <td height="131"><div align="center">
			            <table width="469" border="16" bordercolor="#5A9CB1" bgcolor="#FFFFFF">
		                  <tr>
		                    <td width="429"><div align="center">
		                        <table width="99%" border="0">
		                          <tr>
		                            <td width="85%" height="42"><div align="left"><b><font size="5" face="Verdana" color="#5A9CB1"><img src="../imagens/px1.gif" width="10" height="10" />Configura&ccedil;&otilde;es SQL</font></b></div></td>
		                            <td width="15%"><div align="center"><b><font size="2" face="Verdana">
		                               <?php echo $menssagens ?>
		                            </font></b></div></td>
		                          </tr>
		                        </table>
		                    </div></td>
		                  </tr>
		                  <tr>
		                    <td valign="top">
		                      <div align="center">
		                        <form action="salva_servs.php" method="post" name="form1" id="form1">
		                          <table width="97%" border="0">
		                            <tr>
		                              <td><div align="center">
		                                  <table width="103%" border="0" cellpadding="0">
		                                    <tr>
		                                      <td width="43%"><div align="right"><b><font size="2" face="Verdana">Empresa .:</font></b></div></td>
		                                      <td width="57%"><input name="Edit1" type="text" id="Edit1" style=" font-family: Verdana; font-size: 14px;  height:23px;width:200px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?=$Edit1;?>" /></td>
		                                    </tr>
		                                    <tr>
		                                      <td><div align="right"><b><font size="2" face="Verdana">Servidor 1 .:</font></b></div></td>
		                                      <td><input name="Edit2" type="text" id="Edit2" style=" font-family: Verdana; font-size: 14px;  height:23px;width:200px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?=$Edit2;?>" /></td>
		                                    </tr>
		                                    <tr>
		                                      <td><div align="right"><b><font size="2" face="Verdana">Servidor 2 .:</font></b></div></td>
		                                      <td><input name="Edit3" type="text" id="Edit3" style=" font-family: Verdana; font-size: 14px;  height:23px;width:200px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?=$Edit3;?>" /></td>
		                                    </tr>
		                                    <tr>
		                                      <td><div align="right"><b><font size="2" face="Verdana">Usuario .:</font></b></div></td>
		                                      <td><input name="Edit4" type="text" id="Edit4" style=" font-family: Verdana; font-size: 14px;  height:23px;width:200px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?=$Edit4;?>" /></td>
		                                    </tr>
		                                    <tr>
		                                      <td><div align="right"><b><font size="2" face="Verdana">Senha .:</font></b></div></td>
		                                      <td><input name="Edit5" type="password" id="Edit5" style=" font-family: Verdana; font-size: 14px;  height:23px;width:200px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?=$Edit5;?>" /></td>
		                                    </tr>
		                                    <tr>
		                                      <td><div align="right"><b><font size="2" face="Verdana">Banco de Dados .:</font></b></div></td>
		                                      <td><input name="Edit6" type="text" id="Edit6" style=" font-family: Verdana; font-size: 14px;  height:23px;width:200px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?=$Edit6;?>" />
		                                      </td>
		                                    </tr>
		                                  </table>
		                              </div></td>
		                            </tr>
		                          </table>
		                          <img src="../imagens/px1.gif" width="10" height="4" />
		                        
		                        <table width="420" border="0">
		                          <tr>
		                            <td width="16"><img src="../imagens/px1.gif" width="15" height="8" /></td>
		                            <td width="351"><div align="center">
		                                <!-- Inicio do Botoes de chamada -->
		                                <table width="242" border="0">
		                                  <tr>
		                                    <td width="313"><div align="center">
		                                        <input name="guias" type="image" src="../imagens/botaoazul10.PNG" width="92" height="22" border="0"/>
		                                    </div></td>
		                                    <td width="263"><div align="center"><a href="../login.php" ><img src="../imagens/botaoazul9.PNG" width="92" height="22" border="0" /></a></div></td>
		                                  </tr>
		                                </table>
		                                <!--  Fim dos Botoes de chamada -->
		                            </div></td>
		                            <td width="27" valign="bottom"><img src="../imagens/vacina.JPG" width="27" height="38" /></td>
		                          </tr>
		                        </table></form>
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
