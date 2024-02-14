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

//include("menu.php");

include("vaurls.php");


$deixar = acesso_url("FORM_CONFIG");

if ($deixar == "SIM"){


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
	 
		$Edit1  = $website;
		$Edit2  = $cpfwebsite;
		$Edit3  = $atuali_za;
		$Edit4  = $criado_za;
		$Edit5  = $logo_sis; 
		$Edit6  = $Titulo;
		$Edit7  = $cnpj_sis;
		$Edit8  = $logo1_sis;
		$Edit9  = $logo2_sis;
		$Edit10 = $color_bor;
		$Edit11 = $color_menu;
		$Edit12 = $versao_1;
		
		$Edit13 = $smtp_2;
		$Edit14 = $email_2;
		$Edit15 = $sen_email2;
		$Edit16 = $email_ret2;
	    $Edit17 = $port_smtp;
	
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
		    <td height="644">&nbsp;</td>
		    <td valign="top">
		      <table width="889" border="0" align="center" cellpadding="0" cellspacing="0">
		        <tr>
		          <td width="889" valign="top"><div align="left"><b><font size="1" face="Aria"><?php echo "Atualizado em ".$atuali_za ?></font></b></div></td>
		        </tr>
		        <tr>
		          <td height="131"><div align="center">
	<!-- Inicio do Formulario -->
	
	<table width="766" border="16" bordercolor="#5A9CB1" bgcolor="#FFFFFF">
	            <tr>
	              <td><div align="center">
	                  <table width="100%" border="0">
	                    <tr>
	                      <td width="71%" height="42"><div align="left"><b><font size="5" face="Verdana" color="#5A9CB1"><img src="../imagens/px1.gif" width="10" height="10">Configurações do Sistema</font></b></div></td>
	                      <td width="29%"><div align="center"><b><font size="2" face="Verdana"><?php echo $menssagens ?></font></b></div></td>
	                    </tr>
	                </table>
	              </div></td>
	            </tr>
	            <tr>
	              <td valign="top">                <div align="center">
					<form name="form1" method="post" action="salva_config.php">
					  <table width="95%" border="0">
	                    <tr>
	                      <td><div align="center">
	                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
	                          <tr>
	                            <td width="22%"><div align="right"><b><font size="2" face="Verdana">Site Empresa.:</font></b></div></td>
	                            <td width="78%"><div align="left">
	                              <input name="Edit1" type="text" id="Edit1" style=" font-family: Verdana; font-size: 14px;  height:23px;width:410px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?php echo $Edit1 ?>" >
	                            </div></td>
	                          </tr>
	                          <tr>
	                            <td><div align="right"><b><font size="2" face="Verdana">Site Receita.:</font></b></div></td>
	                            <td><div align="left">
	                              <input name="Edit2" type="text" id="Edit2" style=" font-family: Verdana; font-size: 14px;  height:23px;width:410px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?php echo $Edit2 ?>" >
	                            </div></td>
	                          </tr>
	                          <tr>
	                            <td><div align="right"><b><font size="2" face="Verdana">Ultima Altera&ccedil;&atilde;o.:</font></b></div></td>
	                            <td><div align="left">
	                              <input name="Edit3" type="text" id="Edit3" style=" font-family: Verdana; font-size: 14px;  height:23px;width:210px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?php echo $Edit3 ?>" >
	                            </div></td>
	                          </tr>
	                          <tr>
	                            <td><div align="right"><b><font size="2" face="Verdana">Data Cria&ccedil;&atilde;o .:</font></b></div></td>
	                            <td><div align="left">
	                              <input name="Edit4" type="text" id="Edit4" style=" font-family: Verdana; font-size: 14px;  height:23px;width:210px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?php echo $Edit4 ?>" >
	                            </div></td>
	                          </tr>
	                          <tr>
	                            <td><div align="right"><b><font size="2" face="Verdana">Tela de Fundo.:</font></b></div></td>
	                            <td><div align="left">
	                              <input name="Edit5" type="text" id="Edit5" style=" font-family: Verdana; font-size: 14px;  height:23px;width:410px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?php echo $Edit5 ?>" >
	                            <img src="../imagens/px1.gif" width="10" height="10"><a href="#"><img src="../imagens/botao_procura.PNG" width="92" height="22" border="0"></a></div></td>
	                          </tr>
	                          <tr>
	                            <td><div align="right"><b><font size="2" face="Verdana">Nome da Empresa.:</font></b></div></td>
	                            <td><div align="left">
	                              <input name="Edit6" type="text" id="Edit6" style=" font-family: Verdana; font-size: 14px;  height:23px;width:410px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?php echo $Edit6 ?>" >
	                            </div></td>
	                          </tr>
	                          <tr>
	                            <td><div align="right"><b><font size="2" face="Verdana">CNPJ/CPF.:</font></b></div></td>
	                            <td><div align="left">
	                              <input name="Edit7" type="text" id="Edit7" style=" font-family: Verdana; font-size: 14px;  height:23px;width:210px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?php echo $Edit7 ?>" >
	                            </div></td>
	                          </tr>
	                          <tr>
	                            <td><div align="right"><b><font size="2" face="Verdana">Logo Empresa.:</font></b></div></td>
	                            <td><div align="left">
	                              <input name="Edit8" type="text" id="Edit8" style=" font-family: Verdana; font-size: 14px;  height:23px;width:410px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?php echo $Edit8 ?>" >
	                            <img src="../imagens/px1.gif" width="10" height="10"><a href="#"><img src="../imagens/botao_procura.PNG" width="92" height="22" border="0"></a></div></td>
	                          </tr>
	                          <tr>
	                            <td><div align="right"><b><font size="2" face="Verdana">Imagem Oficio.:</font></b></div></td>
	                            <td><div align="left">
	                              <input name="Edit9" type="text" id="Edit9" style=" font-family: Verdana; font-size: 14px;  height:23px;width:410px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?php echo $Edit9 ?>" >
	                            <img src="../imagens/px1.gif" width="10" height="10"><a href="#"><img src="../imagens/botao_procura.PNG" width="92" height="22" border="0"></a></div></td>
	                          </tr>
	                          <tr>
	                            <td><div align="right"><b><font size="2" face="Verdana">Cor Borda.:</font></b></div></td>
	                            <td><div align="left">
	                              <select name="Edit10" type="text" id="Edit10" style=" font-family: Verdana; font-size: 14px;  height:23px;width:165px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?php echo $Edit10 ?>" >
	    
								<option style='background-color: <?=$Edit10;?>; color: rgb(0,0,0)'><font color='<?=$Edit10;?>'></font>
							      <?=$Edit10;?>
								    </option>
								    <option style='background-color: #99CCFF; color: rgb(0,0,0)'><font color='#99CCFF'></font>#99CCFF</option>
								    <option style='background-color: #E6E6FA; color: rgb(0,0,0)'><font color='#E6E6FA'></font>#E6E6FA</option>
								    <option style='background-color: #FFA54F; color: rgb(0,0,0)'><font color='#FFA54F'></font>#FFA54F</option>
								    <option style='background-color: #EE82EE; color: rgb(0,0,0)'><font color='#EE82EE'></font>#EE82EE</option>
								    <option style='background-color: #CAE1FF; color: rgb(0,0,0)'><font color='#CAE1FF'></font>#CAE1FF</option>
								    <option style='background-color: #FF4040; color: rgb(0,0,0)'><font color='#FF4040'></font>#FF4040</option>
								    <option style='background-color: #FFFF00; color: rgb(0,0,0)'><font color='#FFFF00'></font>#FFFF00</option>
								    <option style='background-color: #66CD00; color: rgb(0,0,0)'><font color='#66CD00'></font>#66CD00</option>
								    <option style='background-color: #000000; color: rgb(0,0,0)'><font color='#000000'></font>#000000</option>
								    <option style='background-color: #0000FF; color: rgb(0,0,0)'><font color='#0000FF'></font>#0000FF</option>
								    <option style='background-color: #CFCFCF; color: rgb(0,0,0)'><font color='#CFCFCF'></font>#CFCFCF</option>
								    
								
							      </select>
	                            </div></td>
	                          </tr>
	                          <tr>
	                            <td><div align="right"><b><font size="2" face="Verdana">Cor Menu .:</font></b></div></td>
	                            <td><div align="left">
	                              <select name="Edit11" type="text" id="Edit11" style=" font-family: Verdana; font-size: 14px;  height:23px;width:165px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?php echo $Edit11 ?>" >
	    
								<option style='background-color: <?=$Edit11;?>; color: rgb(0,0,0)'><font color='<?=$Edit11;?>'></font>
							      <?=$Edit11;?>
								    </option>
								    <option style='background-color: #5A9CB1; color: rgb(0,0,0)'><font color='#5A9CB1'></font>#5A9CB1</option>
								    <option style='background-color: #E6E6FA; color: rgb(0,0,0)'><font color='#E6E6FA'></font>#E6E6FA</option>
								    <option style='background-color: #FFA54F; color: rgb(0,0,0)'><font color='#FFA54F'></font>#FFA54F</option>
								    <option style='background-color: #EE82EE; color: rgb(0,0,0)'><font color='#EE82EE'></font>#EE82EE</option>
								    <option style='background-color: #CAE1FF; color: rgb(0,0,0)'><font color='#CAE1FF'></font>#CAE1FF</option>
								    <option style='background-color: #FF4040; color: rgb(0,0,0)'><font color='#FF4040'></font>#FF4040</option>
								    <option style='background-color: #FFFF00; color: rgb(0,0,0)'><font color='#FFFF00'></font>#FFFF00</option>
								    <option style='background-color: #66CD00; color: rgb(0,0,0)'><font color='#66CD00'></font>#66CD00</option>
								    <option style='background-color: #000000; color: rgb(0,0,0)'><font color='#000000'></font>#000000</option>
								    <option style='background-color: #0000FF; color: rgb(0,0,0)'><font color='#0000FF'></font>#0000FF</option>
								    <option style='background-color: #CFCFCF; color: rgb(0,0,0)'><font color='#CFCFCF'></font>#CFCFCF</option>
								    <option style='background-color: #B6B6B6; color: rgb(0,0,0)'><font color='#B6B6B6'></font>#B6B6B6</option>
								    
								</select>
	                            </div></td>
	                          </tr>
	                          <tr>
	                            <td><div align="right"><b><font size="2" face="Verdana">Vers&atilde;o.:</font></b></div></td>
	                            <td><div align="left">
	                              <input name="Edit12" type="text" id="Edit12" style=" font-family: Verdana; font-size: 14px;  height:23px;width:163px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?php echo $Edit12 ?>" >
	                            </div></td>
	                          </tr>
	                          <tr>
	                            <td><div align="right"><b><font size="2" face="Verdana">SMTP.:</font></b></div></td>
	                            <td><div align="left">
	                              <input name="Edit13" type="text" id="Edit13" style=" font-family: Verdana; font-size: 14px;  height:23px;width:410px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?php echo $Edit13 ?>" >
	                            </div></td>
	                          </tr>
	                          <tr>
	                            <td><div align="right"><b><font size="2" face="Verdana">E-Mail.:</font></b></div></td>
	                            <td><div align="left">
	                              <input name="Edit14" type="text" id="Edit14" style=" font-family: Verdana; font-size: 14px;  height:23px;width:410px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?php echo $Edit14 ?>" >
	                            </div></td>
	                          </tr>
	                          <tr>
	                            <td><div align="right"><b><font size="2" face="Verdana">Senha E-Mail.:</font></b></div></td>
	                            <td><div align="left">
	                              <input name="Edit15" type="password" id="Edit15" style=" font-family: Verdana; font-size: 14px;  height:23px;width:163px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?php echo $Edit15 ?>" >
	                            </div></td>
	                          </tr>
	                            <tr>
	                            <td><div align="right"><b><font size="2" face="Verdana">E-Mail Ret.:</font></b></div></td>
	                            <td><div align="left">
	                              <input name="Edit16" type="text" id="Edit16" style=" font-family: Verdana; font-size: 14px;  height:23px;width:410px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?php echo $Edit16 ?>" >
	                            </div></td>
	                          </tr>
	                          <tr>
	                            <td><div align="right"><b><font size="2" face="Verdana">Porta SMTP.:</font></b></div></td>
	                            <td><div align="left">
	                              <input name="Edit17" type="text" id="Edit17" style=" font-family: Verdana; font-size: 14px;  height:23px;width:100px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?php echo $Edit17 ?>" >
	                            </div></td>
	                          </tr>
	                        </table>
	                        </div></td>
	                    </tr>
	                </table>
	                  <img src="../imagens/px1.gif" width="10" height="4">
	                  <table width="726" border="0">
	                    <tr>
	                      <td width="20"><img src="../imagens/px1.gif" width="15" height="8"></td>
	                      <td width="665"><div align="center">
	                          <!-- Inicio do Botoes de chamada -->
	                          <table width="242" border="0">
	                            <tr>
	                            <td width="313"><div align="center">
	                              <input name="guias" type=image src="../imagens/botaoazul10.PNG" width="92" height="22" border="0"/>
	                              </div></td>          
	                              <td width="263"><div align="center"><a href="../menu_1.php" ><img src="../imagens/botaoazul9.PNG" width="92" height="22" border="0"></a></div></td>
	                            </tr>
	                          </table>
	                          <!--  Fim dos Botoes de chamada -->
	                      </div></td>
	                      <td width="27" valign="bottom"><img src="../imagens/vacina.JPG" width="27" height="38"></td>
	                    </tr>
	                </table>
	                                </form>
	
	              </div></tr>
	          </table>
	
	
	<!-- Fim do Formulario -->
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

}else{
	
include("enaaurlnp.php");
	
}
?>	