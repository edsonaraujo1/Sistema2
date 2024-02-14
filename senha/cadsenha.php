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

if ($_GET['opcao'] == "pesquisa"){
	
	echo $_GET['campo1'];
}


include("../config.php");

// Resgata a Sessao
@session_start();
$nome3 = $_SESSION["nome_log"];
$servletjs2 = $_SESSION["servletjs2"];
$_SESSION["tela_2"] = 2;


include("vaurls.php");

$tabela_1 = strtoupper('tt_ser_01');

$deixar = acesso_url("FORM_SENHAS");

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
			
			include_once('java2_js.php');
		
			// Abre Conexão com o MySql
			include("../conexao.php");
			// Chama o Banco de Dados
			
			$link = @mysql_connect($host,$user,$pass);
			
			@mysql_select_db($db);

            $consulta = "SELECT * FROM tt_ser_01 ORDER BY login ASC LIMIT 0,1";
	
            $resultado = @mysql_query($consulta);
			
			$row = mysql_fetch_array($resultado);
			
			$id       = @$row["id"];
			$campo1   = @$row["login"];       // 10
			$campo2   = decode5t_se(@$row["senha"]);       // 10
			$campo3   = @$row["data"];        // 10
			$campo4   = @$row["nome_l"];      // 45
			$campo5   = @$row["maquina"];
			$campo6   = @$row["permissao"];   // 10
			$campo7   = @$row["permis2"];     // 10
			$campo8   = @$row["conta"];
			$campo9   = @$row["programas"];   
			$campo10  = @$row["hora1"];
			$campo11  = @$row["hora2"];
			$campo12  = @$row["semana"];
			$campo13  = @$row["e_mail"];
			$campo14  = @$row["tipo"];

			// Tabela de Permissão
			$consulta3 = "SELECT * FROM permissoes WHERE login = '$nome3' and tabela = '$tabela_1'";
			
			$resultado3 = @mysql_query($consulta3);
			
			$row3 = @mysql_fetch_array($resultado3);
			
			$per1       = @$row3["incluir"];
			$per2       = @$row3["alterar"];
			$per3       = @$row3["excluir"];
			$per4       = @$row3["imprimir"];
			
			$menssagens = "* * * Visualizar * * *";
			
			
			?>
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/></meta>
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
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
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
			      <table width="97" border="0" cellspacing="0">
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
			            <table width="721" border="16" bordercolor="#5A9CB1" bgcolor="#FFFFFF">
                          <tr>
                            <td width="681"><div align="center">
                                <table width="100%" border="0">
                                  <tr>
                                    <td width="64%" height="42"><div align="left"><b><font size="5" face="Verdana" color="#5A9CB1"><img src="../imagens/px1.gif" width="10" height="10" />Cadastro de Permiss&otilde;es </font></b></div></td>
                                    <td width="36%"><div align="center"><b><font size="2" face="Verdana">
                                        <?php echo $menssagens ?>
                                    </font></b></div></td>
                                  </tr>
                                </table>
                            </div></td>
                          </tr>
                          <tr>
                            <td valign="top">
                              <div align="center">
                                <form action="cad_senha.php" method="post" name="form1" id="form1">
                                  <table width="100%" border="0">
                                    <tr>
                                      <td><div align="center">
                                          <table width="100%" border="0" cellpadding="0">
                                            <tr>
                                              <td width="19%"><div align="right"><b><font size="2" face="Verdana">Login.:</font></b></div></td>
                                              <td width="25%"><input name="campo1" type="text" id="campo1" style=" font-family: Verdana; font-size: 14px;  height:23px;width:156px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?php echo $campo1 ?>" /></td>
                                              <td width="12%"><div align="right"><b><font size="2" face="Verdana">Senha.:</font></b></div></td>
                                              <td width="18%"><input name="campo2" type="text" id="campo22" style=" font-family: Verdana; font-size: 14px;  height:23px;width:106px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?php echo $campo2 ?>" /></td>
                                              <td width="10%"><div align="right"><b><font size="2" face="Verdana">Data.:</font></b></div></td>
                                              <td width="16%"><input name="campo3" type="text" id="campo32" style=" font-family: Verdana; font-size: 14px;  height:23px;width:95px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?php echo $campo3 ?>" /></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellpadding="0">
                                            <tr>
                                              <td width="19%"><div align="right"><b><font size="2" face="Verdana">Nome.:</font></b></div></td>
                                              <td width="47%"><input name="campo4" type="text" id="campo4" style=" font-family: Verdana; font-size: 14px;  height:23px;width:296px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?php echo $campo4 ?>" /></td>
                                              <td width="12%"><div align="right"><b><font size="2" face="Verdana">Maquina.:</font></b></div></td>
                                              <td width="22%"><input name="campo5" type="text" id="campo5" style=" font-family: Verdana; font-size: 14px;  height:23px;width:135px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?php echo $campo5 ?>" /></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellpadding="0">
                                            <tr>
                                              <td width="19%"><div align="right"><b><font size="2" face="Verdana">Permiss&atilde;o.:</font></b></div></td>
                                              <td width="26%"><input name="campo6" type="text" id="campo6" style=" font-family: Verdana; font-size: 14px;  height:23px;width:156px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?php echo $campo6 ?>" /></td>
                                              <td width="11%"><div align="right"><b><font size="2" face="Verdana">Nivel.:</font></b></div></td>
                                              <td width="12%"><input name="campo7" type="text" id="campo7" style=" font-family: Verdana; font-size: 14px;  height:23px;width:56px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?php echo $campo7 ?>" /></td>
                                              <td width="10%"><div align="right"><b><font size="2" face="Verdana">Conta.:</font></b></div></td>
                                              <td width="22%">
											  <select name="campo8" type="text" id="campo8" style=" font-family: Verdana; font-size: 14px;  height:29px;width:139px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?php echo $campo8 ?>" >
                                                  <option value="<?php echo $campo8 ?>"><?php echo $campo8 ?></option>
                                                  <option value="ATIVA">ATIVA</option>
                                                  <option value="BLOQUEADA">BLOQUEADA</option>
                                                  <option value="DESATIVADA">DESATIVADA</option>
                                              </select>
                                              </td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellpadding="0">
                                            <tr>
                                              <td width="19%" valign="top"><div align="right"><b><font size="2" face="Verdana">Programas Permitidos .:</font></b></div></td>
                                              <td width="81%"><textarea name="campo9" cols="55" rows="5" id="campo9" style=" font-family: Verdana; font-size: 14px;  width:514px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" ><?php echo $campo9 ?></textarea></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellpadding="0">
                                            <tr>
                                              <td width="19%">&nbsp;</td>
                                              <td width="20%"><div align="center"><b><font size="2" face="Verdana">Inicio</font></b></div></td>
                                              <td width="16%"><div align="center"><b><font size="2" face="Verdana">Fim</font></b></div></td>
                                              <td width="11%">&nbsp;</td>
                                              <td width="34%"><div align="center"><b><font size="2" face="Verdana">Dias da Semana </font></b></div></td>
                                            </tr>
                                            <tr>
                                              <td><div align="right"><b><font size="2" face="Verdana">Horario.:</font></b></div></td>
                                              <td><input name="campo10" type="text" id="campo10" style=" font-family: Verdana; font-size: 14px;  height:23px;width:95px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?php echo $campo10 ?>" />
                                                  <strong><font size="2" face="Verdana">as:</font></strong> </td>
                                              <td><input name="campo11" type="text" id="campo11" style=" font-family: Verdana; font-size: 14px;  height:23px;width:95px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?php echo $campo11 ?>" /></td>
                                              <td><b><font size="2" face="Verdana">Semana:</font></b></td>
                                              <td><input name="campo12" type="text" id="campo12" style=" font-family: Verdana; font-size: 14px;  height:23px;width:210px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?php echo $campo12 ?>" /></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellpadding="0">
                                            <tr>
                                              <td width="19%"><div align="right"><b><font size="2" face="Verdana">E-mail.:</font></b></div></td>
                                              <td width="36%"><input name="campo13" type="text" id="campo13" style=" font-family: Verdana; font-size: 14px;  height:23px;width:231px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?php echo $campo13 ?>" /></td>
                                              <td width="11%"><div align="right"><b><font size="2" face="Verdana">Tipo.:</font></b></div></td>
                                              <td width="34%">
											  <select name="campo14" type="text" id="campo14" style=" font-family: Verdana; font-size: 14px;  height:29px;width:216px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?php echo $campo14 ?>" >
                                                  <option value="<?php echo $campo14 ?>"><?php echo $campo14 ?></option>
                                                  <option value="USUARIO">USUARIO</option>
                                                  <option value="OP. CAIXA">OP.CAIXA</option>
                                                  <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                                  <option value="ADM. USUARIO">ADM. USUARIO</option>
                                                  <option value="DEMOSTRACAO">DEMOSTRACAO</option>
                                                  <option value="AVALIACAO">AVALIACAO</option>
                                                </select>
                                              </td>
                                            </tr>
                                          </table>
                                      </div></td>
                                    </tr>
                                  </table>
                                  <img src="../imagens/px1.gif" width="10" height="4" />
                                </form>
                                <table width="633" border="0">
                                  <tr>
                                    <td width="4"><img src="imagens/px1.gif" width="15" height="1" /></td>
                                    <td width="590"><div align="center">
                                        <!-- Inicio do Botoes de chamada -->
                                        <table width="590" border="0">
                                          <tr>
                                            <td width="92"><div align="center">
                                                <?php
					if ($per4 == "SIM"){
					?>
                                                <a href="print_senha.php?opcao=printer&amp;Cod_2=<?php echo $campo1 ?>" ><img src="../imagens/botaoazul23.PNG" width="92" height="22" border="0" /></a>
                                                <?php
                    }else{
					?>
                                                <img src="../imagens/botaoazul01.PNG" width="92" height="22" border="0" />
                                                <?php
					}
                    ?>
                                            </div></td>
                                            <td width="92"><div align="center"><a href="cad_senha.php?opcao=lis_grid&amp;Cod_2=<?php echo $campo1 ?>" ><img src="../imagens/botaoazul3.PNG" width="92" height="22" border="0" /></a></div></td>
                                            <td width="92"><div align="center">
                                                <?php
					
					
					if ($per3 == "SIM"){
					?>
                                                <a href="cad_senha.php?opcao=excluir&amp;Cod_2=<?php echo $campo1 ?>"> <img src="../imagens/botaoazul4.PNG" width="92" height="22" border="0" /></a>
                                                <?php
					}else{
					?>
                                                <img src="../imagens/botaoazul01.PNG" width="92" height="22" border="0" />
                                                <?php
					}
					?>
                                            </div></td>
                                            <td width="92"><div align="center">
                                                <?php
					if ($per2 == "SIM"){
					?>
                                                <a href="cad_senha.php?opcao=alterar&amp;Cod_2=<?php echo $campo ?>"> <img src="../imagens/botaoazul5.PNG" width="92" height="22" border="0" /></a>
                                                <?php
					}else{
					?>
                                                <img src="../imagens/botaoazul01.PNG" width="92" height="22" border="0" />
                                                <?php
					}
                    ?>
                                            </div></td>
                                            <td width="92"><div align="center">
                                                <?php
					if ($per1 == "SIM"){
					?>
                                                <a href="cad_senha.php?opcao=incluir&amp;Cod_2=<?php echo $campo1 ?>"> <img src="../imagens/botaoazul6.PNG" width="92" height="22" border="0" /></a>
                                                <?php
					}else{
					?>
                                                <img src="../imagens/botaoazul01.PNG" width="92" height="22" border="0" />
                                                <?php	
					}
                    ?>
                                            </div></td>
                                            <td width="200"><div align="center"><a href="cadsenha.php?opcao=pesquisa&Cod_2=<?php echo $campo1 ?>"  ><img src="../imagens/botaoazul7.PNG" width="92" height="22" border="0" /></a></div></td>
                                          </tr>
                                          <tr>
                                            <td><div align="center">
                                                <table width="89" border="0" cellpadding="1" cellspacing="0">
                                                  <tr>
                                                    <td width="39"><a href="cad_senha.php?opcao=navegar1&amp;Inicio=<?php echo $campo ?>" ><img src="../imagens/inicio.PNG" width="39" height="32" border="0" /></a></td>
                                                    <td width="94"><a href="cad_senha.php?opcao=navegar2&amp;Anterior=<?php echo $campo1 ?>" ><img src="../imagens/anterior.PNG" width="39" height="32" border="0" /></a></td>
                                                  </tr>
                                                </table>
                                            </div></td>
                                            <td><div align="center">
                                                <table width="76" border="0" cellpadding="1" cellspacing="0">
                                                  <tr>
                                                    <td width="40"><a href="cad_senha.php?opcao=navegar3&amp;Proximo=<?php echo $campo1 ?>" ><img src="../imagens/proximo.PNG" width="40" height="32" border="0" /></a></td>
                                                    <td width="26"><a href="cad_senha.php?opcao=navegar4&amp;Fim=<?php echo $campo1 ?>"><img src="../imagens/fim.PNG" width="39" height="32" border="0" /></a></td>
                                                  </tr>
                                                </table>
                                            </div></td>
                                            <td><div align="center"><a href="#" target="new" ><img src="../imagens/botaoazul01.PNG" width="92" height="22" border="0" /></a></div></td>
                                            <td><div align="center"><a href="#" target="new" ><img src="../imagens/botaoazul01.PNG" width="92" height="22" border="0" /></a></div></td>
                                            <td><div align="center"><a href="#" target="new" ><img src="../imagens/botaoazul01.PNG" width="92" height="22" border="0" /></a></div></td>
                                            <td><div align="center"><a href="../menu_1.php"><img src="../imagens/botaoazul24.PNG" width="92" height="22" border="0" /></a></div></td>
                                          </tr>
                                        </table>
                                        <!--  Fim dos Botoes de chamada -->
                                    </div></td>
                                    <td width="33" valign="bottom"><img src="../imagens/vacina.JPG" width="27" height="38" /></td>
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
			      <br />			      <div align="center"></div>      </td>
			    <td>&nbsp;</td>
			  </tr>
			</table>
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