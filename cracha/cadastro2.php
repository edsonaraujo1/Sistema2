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
@ini_set('display_errors',1);
@ini_set('display_startup_erro',1);
@error_reporting(E_ALL);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"></meta>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<link type="text/css" rel="stylesheet" href="../menu.css"/>
<style type="text/css" media="screen">
</style>

<style>
    .dia {font-family: helvetica, arial; font-size: 8pt; color: #FFFFFF}
    .data {font-family: helvetica, arial; font-size: 8pt; text-decoration:none; color:#191970}
    .mes {font-family: helvetica, arial; font-size: 8pt}
    .Cabecalho_Calendario {font-family: helvetica, arial; font-size: 10pt; color: #000000; text-decoration:none; font-weight:bold}
</style>

	<style type="text/css">
	#ad{
		padding-top:220px;
		padding-left:10px;
	}
	</style>
	<link type="text/css" rel="stylesheet" href="dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
	<script type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>

		
<script language="JavaScript"><!--

//document.onkeydown = keyCatcher;

function keyCatcher() 
{
   var e = event.srcElement.tagName;

   if (event.keyCode == 8 && e != "INPUT" && e != "TEXTAREA") 
   {
      event.cancelBubble = true;
      event.returnValue = false;
   }

}

</script>
</head>		
<?php

include("../config.php");

include_once('../sql_injection.php');

// Resgata a Sessao
@session_start();
$nome3 = $_SESSION["nome_log"];
$servletjs2 = $_SESSION["servletjs2"];
$_SESSION["tela_2"] = 2;

if(!empty($nome3)){

	include("vaurls.php");
	
	$tabela_1 = strtoupper('cracha');
	
	$deixar = acesso_url("FORM_CRACHA");
	
	if ($deixar == "SIM"){
	
		include_once('java2_js.php');
		
		include('../menu_sub2.php');
			
		// Abre Conexão com o MySql
		include("../conexao.php");
		// Chama o Banco de Dados
		$link = @mysql_connect($host,$user,$pass);
				
		@mysql_select_db($db);

		$menssagens = "* * * Visualizar * * *";
		
		$opcao  = @addslashes($_POST['opcao']);
		$navega =  @addslashes($_GET['navega']);
		
		//echo $opcao."<br>";
		//echo $navega."<br>";
		$numero_se = 12;
		
		switch ($opcao){
			case 'incluir':

                $faz_inc  = "";
				for ($inc = 0; $inc > $numero_se; $inc++){
					 $var_camp = trim('campo'.$inc);
					 $campo[$inc] = addslashes(strtoupper($_POST[$var_camp]));
					 echo $campo[$inc]."<br>";
					 echo $inc."<br>";
				}
				echo "entrei <br>";
				break; 
				//$campo0   = addslashes(strtoupper($_POST['campo0']));
				//$campo1   = addslashes(strtoupper($_POST['campo1']));
				//$campo2   = addslashes(strtoupper($_POST['campo2']));
				//$campo3   = addslashes(strtoupper($_POST['campo3']));
				//$campo4   = addslashes(strtoupper($_POST['campo4']));
				//$campo5   = addslashes(strtoupper($_POST['campo5']));
				//$campo6   = addslashes(strtoupper($_POST['campo6']));
				//$campo7   = addslashes(strtoupper($_POST['campo7']));
				//$campo8   = addslashes(strtoupper($_POST['campo8']));
			 	//$campo9   = addslashes(strtoupper($_POST['campo9']));   
				//$campo10  = addslashes(strtoupper($_POST['campo10']));
				//$campo11  = addslashes(strtoupper($_POST['campo11']));
				//$campo12  = addslashes(strtoupper($_POST['campo12']));
				//$campo13  = addslashes(strtolower($_POST['campo13']));
				//$campo14  = addslashes(strtoupper($_POST['campo14']));
				//$limpar   = 'limpa';
				if(empty($campo1)){  $menssagens = "<font color='#FF0000'>Campo em Branco !!!</font>"; $faz_inc = 'nao';}
				if(empty($campo2)){  $menssagens = "<font color='#FF0000'>Campo em Branco !!!</font>"; $faz_inc = 'nao';}
				if(empty($campo3)){  $menssagens = "<font color='#FF0000'>Campo em Branco !!!</font>"; $faz_inc = 'nao';}
				if(empty($campo4)){  $menssagens = "<font color='#FF0000'>Campo em Branco !!!</font>"; $faz_inc = 'nao';}
				if(empty($campo5)){  $menssagens = "<font color='#FF0000'>Campo em Branco !!!</font>"; $faz_inc = 'nao';}
				if(empty($campo6)){  $menssagens = "<font color='#FF0000'>Campo em Branco !!!</font>"; $faz_inc = 'nao';}
				if(empty($campo7)){  $menssagens = "<font color='#FF0000'>Campo em Branco !!!</font>"; $faz_inc = 'nao';}
				if(empty($campo10)){ $menssagens = "<font color='#FF0000'>Campo em Branco !!!</font>"; $faz_inc = 'nao';}
				
				//echo "campo 1 ".$campo1."<br>";
				//echo "campo 2 ".$campo2."<br>";
				//echo "campo 3 ".$campo3."<br>";
				//echo "campo 4 ".$campo4."<br>";
				//cho "campo 5 ".$campo5."<br>";
				//echo "campo 6 ".$campo6."<br>";
				//echo "campo 7 ".$campo7."<br>";
				//echo "campo 8 ".$campo8."<br>";
				//echo "campo 9 ".$campo9."<br>";
				//echo "campo 10".$campo10."<br>";
				//echo "campo 11".$campo11."<br>";
                $faz_inc = "nao";
				if ($faz_inc != 'nao'){
	
					$consulta = "INSERT INTO cracha    (nome_guera,
														nome,
														cargo,
														matricula,
														rg,
														cpf,
														dpto,
														data,
														empresa,
														tipo,
														obs)
				                VALUES
				                                   ('$campo1',
												    '$campo2',
												    '$campo3',
												    '$campo4',
												    '$campo5',
												    '$campo6',
												    '$campo7',
												    '$campo8',
												    '$campo9',
												    '$campo10',
												    '$campo11')";
				


				
				@mysql_query($consulta, $link) or
				
				die("<br><div align=center>
				     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
				     <tr>
				     <td>
				     <font face=arial><b>*** Falha na Inclusão !!! ***</b>
				     <table align=center>
				     <form method='POST' action='cadastro.php'>
				     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
				     </form> 
				     </table>
				     </td>
				     </tr>
				     </table>
				     </div>");
		            
					$menssagens = "<font color='#0000FF'>Incluido com Sucesso</font>";
					
					$consulta = "SELECT * FROM cracha ORDER BY id DESC LIMIT 0,1";
					
				}else{
					
					$consulta = "SELECT id FROM cracha WHERE id = 0 ORDER BY id ASC LIMIT 0,1";
					
					
				}
				
			$faz_inc = 'nao';	
			$_GET['opcao'] = " ";	
			$_GET['navega'] = " ";	
			$opcao = " ";	
			$navega = " ";	
					
			$opcao = " ";	
			break;
			case 'alterar';
			
					$campo0   = addslashes(strtoupper($_POST['matricula']));
					$campo1   = addslashes(strtoupper($_POST['campo1']));
					$campo2   = addslashes(strtoupper($_POST['campo2']));
					$campo3   = addslashes(strtoupper($_POST['campo3']));
					$campo4   = addslashes(strtoupper($_POST['campo4']));
					$campo5   = addslashes(strtoupper($_POST['campo5']));
					$campo6   = addslashes(strtoupper($_POST['campo6']));
					$campo7   = addslashes(strtoupper($_POST['campo7']));
					$campo8   = addslashes(strtoupper($_POST['campo8']));
					$campo9   = addslashes(strtoupper($_POST['campo9']));   
					$campo10  = addslashes(strtoupper($_POST['campo10']));
					$campo11  = addslashes(strtoupper($_POST['campo11']));
					
					$consulta = "UPDATE cracha SET      nome_guera = '$campo1',
														nome       = '$campo2',
														cargo      = '$campo3',
														matricula  = '$campo4',
														rg         = '$campo5',
														cpf        = '$campo6',
														dpto       = '$campo7',
														data       = '$campo8',
														empresa    = '$campo9',
														tipo       = '$campo10',
														obs        = '$campo11'  WHERE id = ". anti_sql_injection($campo0) ."";    
					
					@mysql_query($consulta, $link) or
					
					die("<br><div align=center>
					     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
					     <tr>
					     <td>
					     <font face=arial><b>*** Falha na Alteração !!! ***</b>
					     <table align=center>
					     <form method='POST' action='cadastro.php'>
					     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
					     </form> 
					     </table>
					     </td>
					     </tr>
					     </table>
					     </div>");
					     $consulta = "SELECT * FROM cracha WHERE id = ". anti_sql_injection($campo0) ."";
					
					$menssagens = "<font color='#33CC00'>Alterado com Sucesso</font>";
			$opcao = " ";	
			break;
			case 'excluir';
			
					$var_pes = addslashes($_POST['id']);
					
					$consulta = "DELETE FROM cracha WHERE id = $var_pes";   
					
					@mysql_query($consulta, $link) or
					
					die("<br><div align=center>
					     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
					     <tr>
					     <td>
					     <font face=arial><b>*** Falha na Exclusão !!! ***</b>
					     <table align=center>
					     <form method='POST' action='cadastro.php?Cod_xxx=$campo1'>
					     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
					     </form> 
					     </table>
					     </td>
					     </tr>
					     </table>
					     </div>");
					
					$menssagens = "<font color='#FF0000'>Excluido com Sucesso</font>";
			$opcao = " ";	
			break;
			case 'printer';
				 $menssagens = "Imprimir";
			$opcao = " ";	
			break;	 
			case 'grid';
			     $menssagens = "Lista";
			$opcao = " ";	
			break;
			case 'limpa';
					$menssagens = "Limpa";
					
					$id_1     = 0;
					$id       = 0;
					
					
			        for ($si2 = 0; $si2 < 20; $si2++)
			        {
						$campo[$si2] = " ";
					}
					
					$campo1   = " ";
					$campo2   = " ";
					$campo3   = " ";
					$campo4   = " ";
					$campo5   = " ";
					$campo6   = " ";
					$campo7   = " ";
					$campo8   = " ";
					$campo9   = " ";   
					$campo10  = " ";
					$campo11  = " ";
					$campo12  = " ";
					$campo13  = " ";
					$campo14  = " ";
					$var_pes  = " ";
					$consulta = " ";
	
					$incluir  = " ";
					$lista    = " ";
					$alterar  = " ";
					$excluir  = " ";
					$consulta = " ";
					$imagens  = " ";
					$limpar   = " ";
					$printer  = " ";
		
					$anterior = " ";
					$proximo  = " ";
					$inicio   = " ";
					$fim      = " ";
					$consulta = "SELECT id FROM cracha WHERE id = 0 ORDER BY id ASC LIMIT 0,1";
					
			$_GET['opcao'] = " ";	
			$_GET['navega'] = " ";	
			$opcao = " ";	
			$navega = " ";	
			break;
			case 'pesquisa':
					$menssagens = "Comsulta";
					
					if (empty($_POST['campo1'])){
					}else{	
						$car_pes_lip = "";
						$car_pes_lip = $_POST['campo1'];
		                $consulta = "SELECT *  FROM `cracha` WHERE `nome_guera` LIKE '%$car_pes_lip%'";
		            }
					if (empty($_POST['campo4'])){
					}else{	
						$car_pes_lip = "";
						$car_pes_lip = trim($_POST['campo4']);
		                $consulta = "SELECT *  FROM `cracha` WHERE `matricula` = '$car_pes_lip'";
		            }
		
					//echo "pri ".$_POST['campo1x']."<br>";
					//echo "seg.".$car_pes_lip."<br>";
		            
		            $_GET['opcao'] = " ";	
					$_GET['navega'] = " ";	
					$opcao = " ";	
					$navega = " ";	

		            $resultado = @mysql_query($consulta);
					
					$row = @mysql_fetch_array($resultado);
					
					$id             = @$row["id"];
					$id_1           = @$row["id"];
					$campo1  	    = @$row["nome_guera"];
					$campo2   		= @$row["nome"];
					$campo3 		= @$row["cargo"]; 
					$campo4 		= @$row["matricula"];
					$campo5 		= @$row["rg"];
					$campo6 		= @$row["cpf"];
					$campo7  		= @$row["dpto"];
					$campo8         = @$row["data"];
					$campo9         = @$row["tipo"];
					$campo10        = @$row["empresa"];
					$campo11        = @$row["obs"];
					$Faz_pes = "SIM";
					
					$anterior = "";
					$proximo  = "";
					$inicio   = "";
					$fim      = "";
		
					if(empty($id)){
						
						$menssagens = "<font color='#FF0000'>Registro Não Encontrado</font>";
					}
							
			$opcao = " ";	
			break;     
			default:
			        if(!empty($_GET['Cod_xxx'])){
			        	
			        
					$get_pes = $_GET['Cod_xxx'];
					
				    if (!empty($get_pes) && $get_pes != " "){
			  	    	$Faz_pes = "Faz";
				    	$consulta = "SELECT * FROM cracha WHERE id = '$get_pes' ORDER BY id ASC LIMIT 0,1";
				    	$_GET['Cod_xxx']= " ";
				    	$get_pes = " ";
				    }
				    }
			$opcao = " ";	
			break;
			
		} // Fim do Case
		
		switch ($navega){
			case 'anterior':
		
					$anterior = $_GET['anterior'];
					$Faz_pes = "Faz";
					$id_p = $anterior;
				
				    if($anterior != 0){
				       $id_p = $id_p - 1;
				       }
				       else{
				           $id_p = $id_p +1;
				           }
				
				       //if ($id_p) {
				       $consulta = "SELECT * FROM cracha ORDER BY id LIMIT $id_p,1";
				//}
				       //echo "entrei no 1"."<br>";
			$navega = " ";
			$_GET['navega'] = " ";	
            break;
			case 'proximo':

					$proximo = $_GET['proximo'];
					$Faz_pes = "Faz";
					$id_a = $proximo;
				
				    if($proximo != 0){
				       $id_a = $id_a - 1;
				       }
				       else{
				           $id_a = $id_a -1;
				           }
				
				       //if ($id_a) {
				       $consulta = "SELECT * FROM cracha ORDER BY id LIMIT $id_a,1";
				//}
		
				       //echo "entrei no 2"."<br>";
			$navega = " ";	
			$_GET['navega'] = " ";	
            break;
			case 'fim':

		            $Faz_pes = "Faz";			
				    $consulta = "SELECT * FROM cracha ORDER BY id DESC LIMIT 0,1";
		            //echo "entrei no 3"."<br>";
			$navega = " ";	
			$_GET['navega'] = " ";	
            break;
			case 'inicio':
		
					$Faz_pes = "Faz";
				    $consulta = "SELECT * FROM cracha ORDER BY id ASC LIMIT 0,1";
		    		//echo "entrei no 4"."<br>";
			$navega = " ";	
			$_GET['navega'] = " ";	
			break;
			
		} // Fim do Switch
			
        $resultado = @mysql_query($consulta);
			
		$row = @mysql_fetch_array($resultado);
			
		$id             = @$row["id"];
		$id_1           = @$row["id"];
		$matricula      = @$row["id"];
		$campo1  	    = @$row["nome_guera"];
		$campo2   		= @$row["nome"];
		$campo3 		= @$row["cargo"]; 
		$campo4 		= @$row["matricula"];
		$campo5 		= @$row["rg"];
		$campo6 		= @$row["cpf"];
		$campo7  		= @$row["dpto"];
		$campo8         = @$row["data"];
		$campo9         = @$row["empresa"];
		$campo10        = @$row["tipo"];
		$campo11        = @$row["obs"];
		$campo12        = @$row["url_foto"];
		
		if (empty($campo12)){
			
			$ver_foto = trim("../imagens/foto_branco.jpg");
			
		}else{

            $ver_foto = trim("fotos/".$id.".jpg");
			
		}
 	
 	
		// Tabela de Permissão
		$consulta3 = "SELECT * FROM permissoes WHERE login = '$nome3' and tabela = '$tabela_1'";
				
		$resultado3 = @mysql_query($consulta3);
				
		$row3 = @mysql_fetch_array($resultado3);
				
		$per1       = @$row3["incluir"];
		$per2       = @$row3["alterar"];
		$per3       = @$row3["excluir"];
		$per4       = @$row3["imprimir"];
	 
		?>
		<body background="../<?php echo $logo_sis ?>" style=" margin-left: 0px;  margin-top: 3px;  margin-right: 0px;  margin-bottom: 0px; " onkeydown="javascript:if (event.KeyCode==13) event.KeyCode=9; javascript:document.onkeydown = keyCatcher();" onload="document.form1.campo1x.focus();">
		<div align="center">
		<form name="form1" method="POST" action="cadastro2.php">

		<table width="754" border="16" bordercolor="#5A9CB1" bgcolor="#FFFFFF">
		
		                          <tr>
		                            <td width="714"><div align="center">
		                                <table width="100%" border="0">
		                                  <tr>
		                                    <td width="64%" height="42"><div align="left"><b><font size="5" face="Verdana" color="#5A9CB1"><img src="../imagens/px1.gif" width="10" height="10" />Impress&atilde;o de Gracha</font></b></div></td>
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
		                                
		                                  <table width="100%" border="0">
		                                    <tr>
		                                      <td><div align="center">
		                                          <table width="100%" border="0" cellpadding="1" cellspacing="0">
                                                    <div align="left"></div>
                                                    <tr>
                                                      <td width="25%" class="style3"><div align="right">
                                                          <table width="200" border="0" cellpadding="0" cellspacing="0">
                                                            <tr>
                                                              <td height="28"><div align="right"><b><font size="2" face="Verdana">Codigo.:</font></b></div></td>
                                                            </tr>
                                                            <tr>
                                                              <td height="24"><div align="right"><b><font size="2" face="Verdana">Nome de Guerra.:</font></b></div></td>
                                                            </tr>
                                                            <tr>
                                                              <td height="23"><div align="right"><b><font size="2" face="Verdana">Nome.:</font></b></div></td>
                                                            </tr>
                                                            <tr>
                                                              <td height="23"><div align="right"><b><font size="2" face="Verdana">Cargo.:</font></b></div></td>
                                                            </tr>
                                                          </table>
                                                          <b><font size="2" face="Verdana"> </font></b></div></td>
                                                      <td width="75%"><div align="left">
                                                          <table width="445" height="52" border="0" cellpadding="0" cellspacing="0">
                                                            <tr>
                                                              <td width="380">
                                                                <table width="375" border="0" cellpadding="0" cellspacing="0">
                                                                  <tr>
                                                                    <td width="360"><input name="matricula" type="text" id="matricula" style=" font-family: Verdana; font-size: 14px;  height:23px;width:56px; background-color: #FFFFFF;" value="<?php echo $id ?>"  /></td>
                                                                    <td width="15">&nbsp;</td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td><input name="campo1" type="text" id="campo1" style=" font-family: Verdana; font-size: 14px;  height:23px;width:200px; background-color: #FFFFFF;" value="<?php echo $campo1 ?>"  /></td>
                                                                    <td>&nbsp;</td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td><input name="campo2" type="text" id="campo2" style=" font-family: Verdana; font-size: 14px;  height:23px;width:360px; background-color: #FFFFFF;" value="<?php echo $campo2 ?>"  /></td>
                                                                    <td>&nbsp;</td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td><input name="campo3" type="text" id="campo3" style=" font-family: Verdana; font-size: 14px;  height:23px;width:256px; background-color: #FFFFFF;" value="<?php echo $campo3 ?>"  /></td>
                                                                    <td>&nbsp;</td>
                                                                  </tr>
                                                              </table></td>
                                                              <td width="65"><div align="center"><img src="<?php echo $ver_foto ?>" width="84" height="100" border="1" /></div></td>
                                                              <td width="65"><img src="../imagens/px1.gif" width="35" height="1" /></td>
                                                            </tr>
                                                          </table>
                                                      </div></td>
                                                    </tr>
                                                    <tr>
                                                      <td class="style3"><div align="right"><b><font size="2" face="Verdana">Matricula.:</font></b></div></td>
                                                      <td><div align="left">
                                                          
                                                          <table width="496" border="0" cellpadding="0" cellspacing="0">
                                                            <tr>
                                                              <td width="327"><input name="campo4" type="text" id="campo4" style=" font-family: Verdana; font-size: 14px;  height:23px;width:56px; background-color: #FFFFFF;" value="<?php echo $campo4 ?>" maxlength="5"  /></td>
                                                              <td width="47">&nbsp;</td>
                                                              <td width="122"><div align="left"><img src="../imagens/botaoazul17.PNG" width="92" height="22" /></div></td>
                                                            </tr>
                                                          </table>
                                                        </div></td>
                                                    </tr>
                                                    <tr>
                                                      <td class="style3"><div align="right"><b><font size="2" face="Verdana">Rg.:</font></b></div></td>
                                                      <td><div align="left">
                                                          <input name="campo5" type="text" id="campo5" style=" font-family: Verdana; font-size: 14px;  height:23px;width:156px; background-color: #FFFFFF;" value="<?php echo $campo5 ?>"  />
                                                          <img src="../imagens/px1.gif" width="10" height="10" /> <b><font size="2" face="Verdana">CPF.:
                                                          <input name="campo6" type="text" id="campo6" style=" font-family: Verdana; font-size: 14px;  height:23px;width:156px; background-color: #FFFFFF;" value="<?php echo $campo6 ?>"  />
                                                      </font></b></div></td>
                                                    </tr>
                                                    <tr>
                                                      <td class="style3"><div align="right"><b><font size="2" face="Verdana">Departamento.:</font></b></div></td>
                                                      <td><div align="left">
                                                          <input name="campo7" type="text" id="dpto2" value="<?php echo $campo7 ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:256px; background-color: #FFFFFF;"  />
                                                      </div></td>
                                                    </tr>
                                                    <tr>
                                                      <td class="style3"><div align="right"><b><font size="2" face="Verdana">Data Admi.:</font></b></div></td>
                                                      <td><div align="left">

                                                      <input name="campo8" type="text" id="campo8" style=" font-family: Verdana; font-size: 14px;  height:23px;width:95px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="<?php echo $campo8 ?>" />
                                                      <input type="button" value="" onclick="displayCalendar(document.forms[0].campo8,'dd/mm/yyyy',this)" style="font-family: Verdana; font-size: 5pt; font-weight:bold; color:000000;background:url(../imagens/calendario.gif);border=0;width:20;height:20;">

                                                      </div></td>
                                                    </tr>
                                                    <tr>
                                                      <td class="style3"><div align="right"><b><font size="2" face="Verdana">Frente=<font color="#FF0000">1</font> e Verso=<font color="#FF0000">2</font></font></b></div></td>
                                                      <td><div align="left">
                                                          <input name="campo9" type="text" id="campo9" style=" font-family: Verdana; font-size: 14px;  height:23px;width:56px; background-color: #FFFFFF;" value="<?php echo $campo9 ?>" />
                                                          <img src="../imagens/px1.gif" width="10" height="10" /><b><font size="2" face="Verdana">Sind=<font color="#FF0000">1</font>, Cond=<font color="#FF0000">2</font> ou Fena=<font color="#FF0000">3</font></font></b><img src="../imagens/px1.gif" width="10" height="10" />
                                                          <input name="campo10" type="text" id="campo10" style=" font-family: Verdana; font-size: 14px;  height:23px;width:56px; background-color: #FFFFFF;" value="<?php echo $campo10 ?>"  />
                                                      </div></td>
                                                    </tr>
                                                    <tr>
                                                      <td valign="top" class="style3"><div align="right"><b><font size="2" face="Verdana">Observa&ccedil;&atilde;o.:</font> </b></div></td>
                                                      <td><div align="left">
                                                          <textarea name="campo11" cols="55" rows="5" id="campo11" style=" font-family: Verdana; font-size: 14px;  width:460px; background-color: #FFFFFF;"  ><?php echo $campo11 ?></textarea>
                                                      </div></td>
                                                    </tr>
                                                  </table>
		                                      </div></td>
		                                    </tr>
		                                  </table>
		                                  <img src="../imagens/px1.gif" width="10" height="4" />
		                                
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
								<a href="printer.php?Cod_2=<?php echo $matricula ?>" ><img src="../imagens/botaoazul23.PNG" width="92" height="22" border="0" /></a>
		                    <?php
		                    }else{
							?>
		                        <img src="../imagens/botaoazul01.PNG" width="92" height="22" border="0" />
		                    <?php
							}
		                    ?>
		                        </div></td>
		                        <td width="92"><div align="center"><a href="lis_grid.php?var_w1=<?php echo $campo1 ?>" ><img src="../imagens/botaoazul3.PNG" width="92" height="22" border="0" /></a></div></td>
		                        <td width="92"><div align="center">
		                    <?php
							
							if ($per3 == "SIM"){
								if (!empty($id_1)){
							?>
		                        <input name="opcao" type=image value="excluir" src="../imagens/botaoazul4.PNG" width="92" height="22" border="0"/>
                            <?php
		                    }else{
		                    ?>
		                            <img src="../imagens/botaoazul01.PNG" width="92" height="22" border="0" />
							<?php   	
		                        }							}else{
							?>
		                         <img src="../imagens/botaoazul01.PNG" width="92" height="22" border="0" />
		                    <?php
							}
							?>
		                        </div></td>
		                        <td width="92"><div align="center">
		                    <?php
							if ($per2 == "SIM"){
								if (!empty($id_1)){
							?>
		                        <input name="opcao" type=image value="alterar" src="../imagens/botaoazul5.PNG" width="92" height="22" border="0"/>
		                    <?php
		                        }else{
		                    ?>
		                            <img src="../imagens/botaoazul01.PNG" width="92" height="22" border="0" />
							<?php   	
		                        }
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
								if (empty($id_1)){
							?>
		                            <input name="opcao" type='image' value="incluir" src="../imagens/botaoazul6.PNG" width="92" height="22" border="0"/>
		                    <?php
		                        }else{
		                    ?>
		                            <input name="opcao" type='image' value="limpa" src="../imagens/botaobanco50.png" width="92" height="22" border="0"/>
							<?php   	
		                        } 
							}else{
							?>
		                         <img src="../imagens/botaoazul01.PNG" width="92" height="22" border="0" />
		                    <?php	
							}
		                    ?>
		                                            </div></td>
		                                            <td width="200"><div align="center">
		                    <?php
								if (empty($id_1)){
							?>
		                                            
													    <input name="opcao" type='image' value="pesquisa" src="../imagens/botaoazul7.PNG" width="92" height="22" border="0"/></div></td>
		                    <?php
		                        }else{
		                    ?>
		                         <img src="../imagens/botaoazul01.PNG" width="92" height="22" border="0" />
		                    <?php	
							}
		                    ?>
													    
		                                          </tr>
		                                          <tr>
		                                            <td><div align="center">
		                                                <table width="89" border="0" cellpadding="1" cellspacing="0">
		                                                  <tr>
		                                                    <td width="39">
															<a href="cadastro.php?navega=inicio&inicio=<?php echo $id ?>"><img src="../imagens/inicio.PNG" width="39" height="32" border="0" /></a></td>
		                                                    <td width="94">
															<a href="cadastro.php?navega=anterior&anterior=<?php echo $id-1 ?>"><img src="../imagens/anterior.PNG" width="39" height="32" border="0" /></a></td>
		                                                  </tr>
		                                                </table>
		                                            </div></td>
		                                            <td><div align="center">
		                                                <table width="76" border="0" cellpadding="1" cellspacing="0">
		                                                  <tr>
		                                                    <td width="40">
															<a href="cadastro.php?navega=proximo&proximo=<?php echo $id+1 ?>"><img src="../imagens/proximo.PNG" width="39" height="32" border="0" /></a>
															</td>
		                                                    <td width="26">
															<a href="cadastro.php?navega=fim&fim=<?php echo $id ?>"><img src="../imagens/fim.PNG" width="39" height="32" border="0" /></a></td>
		                                                  </tr>
		                                                </table>
		                                            </div></td>
		                                            <td><div align="center"><a href="#"><img src="../imagens/botaoazul01.PNG" width="92" height="22" border="0" /></a></div></td>
		                                            <td><div align="center"><a href="#"><img src="../imagens/botaoazul01.PNG" width="92" height="22" border="0" /></a></div></td>
		                                            <td><div align="center"><a href="#"><img src="../imagens/botaoazul01.PNG" width="92" height="22" border="0" /></a></div></td>
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
		  </form>
		<div align="center"><a href="<?php echo $website ?>" class='linkmenu2' ><b>Web Site</b></a></div><br>
		</div>
		<script> window.focus();</script>
		</body>
		<script> window.focus();</script>
        <script type="text/javascrip">document.form1.campo1x.focus(); </script>
        </html>

	<?php
	
	}else{
		
	include("enaaurlnp.php");
		
	}

}else{
	include("../login2.php");

}
?>	

<script language='Javascript'>

// **************************************************
// * Autor : Peter M Jordan - uranking@uranking.com *
// * página: www.uranking.com                       *
// **************************************************

// construindo o calendário
function popdate(obj,div,tam,ddd)
{
    if (ddd) 
    {
        day = ""
        mmonth = ""
        ano = ""
        c = 1
        char = ""
        for (s=0;s<parseInt(ddd.length);s++)
        {
            char = ddd.substr(s,1)
            if (char == "/") 
            {
                c++; 
                s++; 
                char = ddd.substr(s,1);
            }
            if (c==1) day    += char
            if (c==2) mmonth += char
            if (c==3) ano    += char
        }
        ddd = mmonth + "/" + day + "/" + ano
    }
  
    if(!ddd) {today = new Date()} else {today = new Date(ddd)}
    date_Form = eval (obj)
    if (date_Form.value == "") { date_Form = new Date()} else {date_Form = new Date(date_Form.value)}
  
    ano = today.getFullYear();
    mmonth = today.getMonth ();
    day = today.toString ().substr (8,2)
  
    umonth = new Array ("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro")
    days_Feb = (!(ano % 4) ? 29 : 28)
    days = new Array (31, days_Feb, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31)

    if ((mmonth < 0) || (mmonth > 11))  alert(mmonth)
    if ((mmonth - 1) == -1) {month_prior = 11; year_prior = ano - 1} else {month_prior = mmonth - 1; year_prior = ano}
    if ((mmonth + 1) == 12) {month_next  = 0;  year_next  = ano + 1} else {month_next  = mmonth + 1; year_next  = ano}
    txt  = "<table bgcolor='#efefff' style='border:solid #330099; border-width:2' cellspacing='0' cellpadding='3' border='0' width='"+tam+"' height='"+tam*1.1 +"'>"
    txt += "<tr bgcolor='#FFFFFF'><td colspan='7' align='center'><table border='0' cellpadding='0' width='100%' bgcolor='#FFFFFF'><tr>"
    txt += "<td width=20% align=center><a href=javascript:popdate('"+obj+"','"+div+"','"+tam+"','"+((mmonth+1).toString() +"/01/"+(ano-1).toString())+"') class='Cabecalho_Calendario' title='Ano Anterior'><<</a></td>"
    txt += "<td width=20% align=center><a href=javascript:popdate('"+obj+"','"+div+"','"+tam+"','"+( "01/" + (month_prior+1).toString() + "/" + year_prior.toString())+"') class='Cabecalho_Calendario' title='Mês Anterior'><</a></td>"
    txt += "<td width=20% align=center><a href=javascript:popdate('"+obj+"','"+div+"','"+tam+"','"+( "01/" + (month_next+1).toString()  + "/" + year_next.toString())+"') class='Cabecalho_Calendario' title='Próximo Mês'>></a></td>"
    txt += "<td width=20% align=center><a href=javascript:popdate('"+obj+"','"+div+"','"+tam+"','"+((mmonth+1).toString() +"/01/"+(ano+1).toString())+"') class='Cabecalho_Calendario' title='Próximo Ano'>>></a></td>"
    txt += "<td width=20% align=right><a href=javascript:force_close('"+div+"') class='Cabecalho_Calendario' title='Fechar Calendário'><b>X</b></a></td></tr></table></td></tr>"
    txt += "<tr><td colspan='7' align='right' bgcolor='#ccccff' class='mes'><a href=javascript:pop_year('"+obj+"','"+div+"','"+tam+"','" + (mmonth+1) + "') class='mes'>" + ano.toString() + "</a>"
    txt += " <a href=javascript:pop_month('"+obj+"','"+div+"','"+tam+"','" + ano + "') class='mes'>" + umonth[mmonth] + "</a> <div id='popd' style='position:absolute'></div></td></tr>"
    txt += "<tr bgcolor='#330099'><td width='14%' class='dia' align=center><b>Dom</b></td><td width='14%' class='dia' align=center><b>Seg</b></td><td width='14%' class='dia' align=center><b>Ter</b></td><td width='14%' class='dia' align=center><b>Qua</b></td><td width='14%' class='dia' align=center><b>Qui</b></td><td width='14%' class='dia' align=center><b>Sex<b></td><td width='14%' class='dia' align=center><b>Sab</b></td></tr>"
    today1 = new Date((mmonth+1).toString() +"/01/"+ano.toString());
    diainicio = today1.getDay () + 1;
    week = d = 1
    start = false;

    for (n=1;n<= 42;n++) 
    {
        if (week == 1)  txt += "<tr bgcolor='#efefff' align=center>"
        if (week==diainicio) {start = true}
        if (d > days[mmonth]) {start=false}
        if (start) 
        {
            dat = new Date((mmonth+1).toString() + "/" + d + "/" + ano.toString())
            day_dat   = dat.toString().substr(0,10)
            day_today  = date_Form.toString().substr(0,10)
            year_dat  = dat.getFullYear ()
            year_today = date_Form.getFullYear ()
            colorcell = ((day_dat == day_today) && (year_dat == year_today) ? " bgcolor='#FFCC00' " : "" )
            txt += "<td"+colorcell+" align=center><a href=javascript:block('"+  d + "/" + (mmonth+1).toString() + "/" + ano.toString() +"','"+ obj +"','" + div +"') class='data'>"+ d.toString() + "</a></td>"
            d ++ 
        } 
        else 
        { 
            txt += "<td class='data' align=center> </td>"
        }
        week ++
        if (week == 8) 
        { 
            week = 1; txt += "</tr>"} 
        }
        txt += "</table>"
        div2 = eval (div)
        div2.innerHTML = txt 
}
  
// função para exibir a janela com os meses
function pop_month(obj, div, tam, ano)
{
  txt  = "<table bgcolor='#CCCCFF' border='0' width=80>"
  for (n = 0; n < 12; n++) { txt += "<tr><td align=center><a href=javascript:popdate('"+obj+"','"+div+"','"+tam+"','"+("01/" + (n+1).toString() + "/" + ano.toString())+"')>" + umonth[n] +"</a></td></tr>" }
  txt += "</table>"
  popd.innerHTML = txt
}

// função para exibir a janela com os anos
function pop_year(obj, div, tam, umonth)
{
  txt  = "<table bgcolor='#CCCCFF' border='0' width=160>"
  l = 1
  for (n=1991; n<2012; n++)
  {  if (l == 1) txt += "<tr>"
     txt += "<td align=center><a href=javascript:popdate('"+obj+"','"+div+"','"+tam+"','"+(umonth.toString () +"/01/" + n) +"')>" + n + "</a></td>"
     l++
     if (l == 4) 
        {txt += "</tr>"; l = 1 } 
  }
  txt += "</tr></table>"
  popd.innerHTML = txt 
}

// função para fechar o calendário
function force_close(div) 
    { div2 = eval (div); div2.innerHTML = ''}
    
// função para fechar o calendário e setar a data no campo de data associado
function block(data, obj, div)
{ 
    force_close (div)
    obj2 = eval(obj)
    obj2.value = data 
}

</script>
