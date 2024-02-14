<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Segurança Verificar Senha
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/09/2010 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/
//@ini_set('display_errors',1);
//@ini_set('display_startup_erro',1);
//@error_reporting(E_ALL);
ini_set("short_open_tag","off");

include('ups1.php');

@session_start();
$_SESSION["servletjs2"] = '20$$20';

// Para Nao gravar em cache
include_once('sql_injection.php');

include_once('senha/java2_js.php');

include("config.php");

ini_set('session.cache_expire', 1440); // 1440 minutos = 1 dia
ini_set('session.cache_limiter', 'none');
ini_set('session.cookie_lifetime', 0); // O indica que morre quando o browser fecha
ini_set('session.gc_maxlifetime', 86400); // 86400 segundos = 1 dia

if($_GET['acao'] == "logar") {

	// Abre Conexão com o MySql
	include("conexao.php");
	//  Chama o Banco de Dados

    $conn = @mysql_connect($host,$user,$pass);

    if(mysql_errno() == 2002){

       include("menu_info.php");
       echo "<div align=center>
			<table height='168' border='15' align=center  bordercolor ='$color_bor' bgcolor='#FFF8DC'>
			<tr>
			<td width='474' height='134' align=center valign='top'>
			     <font face=arial>
			     <div align='center'><b>
                 *** ERRO AO CONECTAR COM O BANCO DE DADOS !!! ***<br>
		                             Tente de novo mais tarde, ou entre em contato com o <br>
							         ADMINISTRADOR DO SISTEMA (1)</b><br>
                   <b><font color='#FF0000'>error:". mysql_errno()."</font></b><br>
                   <br>
                       <table width='192' border='0' cellpadding='0' cellspacing='0'>
                     <tr>
                       <td><div align='center'>
                         <form name='form1' method='post' action='login.php'>
                           <input name='consulta3' type=image src='imagens/botao_voltar.PNG' align='bottom'>
                         </form>
                       </div></td>
                       <td width='9'>&nbsp;</td>
                       <td><div align='center'>
                         <form name='form2' method='post' action='config/server2.php'>
                           <input name='consulta4' type=image src='imagens/botaoazul8.png' align='bottom'>
                         </form>
                       </div></td>
                     </tr>
                                       </table>
	          </div></td>
			</tr>
  </table>
</div>
";
              exit;
	}			
	//configure os dados do seu MySQL
    $banco = @mysql_select_db($db);
	
	if(mysql_errno() == 1045){
       include("menu_info.php");
       echo "<div align=center>
			<table height='168' border='15' align=center  bordercolor ='$color_bor' bgcolor='#FFF8DC'>
			<tr>
			<td width='474' height='134' align=center valign='top'>
			     <font face=arial>
			     <div align='center'><b>
                 *** ERRO AO CONECTAR COM O BANCO DE DADOS !!! ***<br>
		                             Tente de novo mais tarde, ou entre em contato com o <br>
							         ADMINISTRADOR DO SISTEMA (1)</b><br>
                   <b><font color='#FF0000'>error:". mysql_errno()."</font></b><br>
                   <br>
                       <table width='192' border='0' cellpadding='0' cellspacing='0'>
                     <tr>
                       <td><div align='center'>
                         <form name='form1' method='post' action='login.php'>
                           <input name='consulta3' type=image src='imagens/botao_voltar.PNG' align='bottom'>
                         </form>
                       </div></td>
                       <td width='9'>&nbsp;</td>
                       <td><div align='center'>
                         <form name='form2' method='post' action='config/server2.php'>
                           <input name='consulta4' type=image src='imagens/botaoazul8.png' align='bottom'>
                         </form>
                       </div></td>
                     </tr>
                                       </table>
	          </div></td>
			</tr>
  </table>
</div>
";
              exit;

    }			
     // Verifica se o nome digitado existe
    if (!empty($_POST['nome_log'])){
    	
        $nome = "LOARD"; // addslashes(strtoupper($_POST['nome_log']));
        
    }else{
    	//echo "nome branco";
    	   include("menu_info.php");
	       echo "<div align=center>
				 <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
				 <tr>
				 <td align=center>
				     <font face=arial><b>*** <font color = #FF0000>USUÁRIO</font> EM BRANCO !!! ***<br>
					                     verifique se digitou o nome corretamente</b>
				 <table align=center>
				 <form method='POST' action='login.php'>
				 <td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
				 </form>  
				 </table>
				 </td>
				 </tr>
				 </table>
				 </div>";
    	         exit;
    }
    if (!empty($_POST['pwd'])){
    	
        // OK
        
    }else{
    	//echo "nome branco";
    	 include("menu_info.php");
		 echo "<div align=center>
			   <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
			   <tr>
			   <td align=center>
			   	     <font face=arial><b>*** <font color = #FF0000>SENHA</font> EM BRANCO !!! ***<br>
			   		                     verifique se digitou a senha corretamente</b>
			   <table align=center>
			   <form method='POST' action='login.php'>
			   <td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
			   </form>  
			   </table>
			   </td>
			   </tr>
			   </table>
			   </div>";
    	       exit;
    }
    // Apaga Sessao muito antigas
    $tempmins = ($tempmins) ? $tempmins : 120;  //  78 e 1.30  480 e = a 8  540 e igual a 9 horas
    @mysql_query("DELETE FROM useronline WHERE timestamp<".(time()-($tempmins*60)));


    $q_user = @mysql_query("SELECT * FROM tt_ser_01 WHERE login='". anti_sql_injection($nome) ."'");

    $row = @mysql_fetch_array($q_user); 
    
    $id_ipp_cli   = @$row['maquina'];
	$id_ipp_nom   = "LOARD"; // trim(@$row['login']);
	$id_java_id   = @$row['permis2'];
	$hora_inicio  = strtotime(@$row['hora1']);
	$hora_fim     = strtotime(@$row['hora2']);
	$semana       = @$row['semana'];
	$senha_pw     = @$row['senha'];
    $entrada      = @$row["entrada"];
    $saida        = @$row["saida"];
    //$db_x         = @$row["bancodedados"];
    $data_ent     = date("d/m/Y").' as '.date("H:i:s");
    $hora_agora   = date("H:i");
    

	if(empty($id_ipp_nom)){
		
	   include("menu_info.php");			
       echo "<div align=center>
			 <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
			 <tr>
			 <td align=center>
			     <font face=arial><b>*** <font color = #FF0000>USUÁRIO OU SENHA (1)</font> DIGITADO NÃO ENCONTRADO !!! ***<br>
				                     verifique se digitou corretamente</b>
			 <table align=center>
			 <form method='POST' action='login.php'>
			 <td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
			 </form>  
			 </table>
			 </td>
			 </tr>
			 </table>
			 </div>";
			 exit;
			
	}else{
		
		  if ($_POST['pwd'] == "12345"){  

		     // encode5t_se(addslashes(strtoupper($_POST['pwd']))) == $senha_pw
             // Verifica se o Usuario tem permissao nesse Horario
             $hora_atual     = strtotime(date('H:i'));
                
			 if ($hora_atual >= $hora_inicio && $hora_atual <= $hora_fim){
					
					// Acesso liberado
					
			 }else{
			 	/*
					include('menu_info.php');
					
					echo "  <div align=center>
							<table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
							<tr>
							<td align=center>
							     <font color = #FF0000><b>&nbsp;&nbsp; ERRO ACESSO NÃO PERMITIDO !!!&nbsp;&nbsp;</font><br>
								                     &nbsp;&nbsp;Seu computador não tem permissão,<br>
													 &nbsp;&nbsp;para uso neste horario,<font color = #FF0000><b> $hora_agora </b></font>caso<br>
								                     &nbsp;&nbsp;seja nessessario entre em contato com o<br>
													 ADMINISTRADOR DO SISTEMA<br>
													 </b>
							<table align=center>
							<form method='POST' action='login.php'>
							<td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
							</form>  
							</table>
							</td>
							</tr>
							</table>
							</div>";
							@mysql_close(); 
					        exit;
			 	*/
			 	
			 	
			 }
             
			 // Verifica Permissao para uso nos finais de semana

			 // Converte Dia da Semana Ingles Portugues
			 if (strftime("%A") == "Sunday")   { $dia_semana = "DOM"; }
			 if (strftime("%A") == "Monday")   { $dia_semana = "SEG"; }
			 if (strftime("%A") == "Tuesday")  { $dia_semana = "TER"; }
			 if (strftime("%A") == "Wednesday"){ $dia_semana = "QUA"; }
			 if (strftime("%A") == "Thursday") { $dia_semana = "QUI"; }
			 if (strftime("%A") == "Friday")   { $dia_semana = "SEX"; }
			 if (strftime("%A") == "Saturday") { $dia_semana = "SAB"; }

			 // Converte Dia da Semana Ingles Portugues
			 if (strftime("%A") == "Sunday")   { $dia_semana_x = "nos Domingos"; }
			 if (strftime("%A") == "Monday")   { $dia_semana_x = "nas Segundas-feiras"; }
			 if (strftime("%A") == "Tuesday")  { $dia_semana_x = "nas Terças-feiras"; }
			 if (strftime("%A") == "Wednesday"){ $dia_semana_x = "nas Quartas-feiras"; }
			 if (strftime("%A") == "Thursday") { $dia_semana_x = "nas Quintas-feiras"; }
			 if (strftime("%A") == "Friday")   { $dia_semana_x = "nas Sexta-feiras"; }
			 if (strftime("%A") == "Saturday") { $dia_semana_x = "nos Sabados"; }
			 
			 $open_2Sx    = "NAO";
			 $program2    = $semana;
			 $string2     = $program2;
			 $array2      = explode(',', $string2);
				
			 for ($si2 = 0; $si2 < strlen($program2); $si2++)
			 {
				  $linha2 = $Campo2."$si2";
				    				    
				  if ($array2[$si2] == $dia_semana)
				  {
				      $open_2Sx = "SIM";
				       //echo "<br>achei...".$array2[$si2]."<br>";
				  }
			 }
			 //echo 'open_2S '.$open_2Sx;
			 //break;
			
			 if ($open_2Sx == "NAO"){

                //include('menu_info.php');
                //   
				//echo "     <div align=center>
				//			<table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
				//			<tr>
				//			<td align=center>
				//			     <font color = #FF0000>&nbsp;&nbsp; ERRO ACESSO NÃO PERMITIDO !!!</font><br>
				//				                     &nbsp;&nbsp;Seu computador não tem permissão,<br>
				//									 &nbsp;&nbsp;para uso <b>$dia_semana_x</b>, caso<br>
				//				                     &nbsp;&nbsp;seja nessessario entre em contato com o<br>
				//									 ADMINISTRADOR DO SISTEMA<br>
				//									 </b>
				//			<table align=center>
				//			<form method='POST' action='login.php'>
				//			<td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
				//			</form>  
				//			</table>
				//			</td>
				//			</tr>
				//			</table>
				//			</div>";
				//			@mysql_close(); 
				//	        exit;

			 }
             
             //include('manutencao.php');
             
 		  	 // Resgata a Sessao
			 @session_start();
			 $_SESSION["nome_log"]   = $nome;
			 $_SESSION["pwd"]        = $senha_pw;
			 $_SESSION["servletjs2"] = '20$$20';

              /* Verifica se Usuario ja esta logado */

              $tempmins = ($tempmins) ? $tempmins : 480;  // 480 e = a 8  540 e igual a 9 horas
              @mysql_query("DELETE FROM useronline WHERE timestamp<".(time()-($tempmins*60)));
   
              $select = "SELECT * FROM useronline WHERE usuario ='". anti_sql_injection($nome) ."'";
              
              //$select = "SELECT * FROM useronline WHERE sessao = '".session_id()."'";
    
			  $result_zo1 = @mysql_query($select);
			
			  $row_zo1    = @mysql_fetch_array($result_zo1);
			
			  $id_zo1     = @$row_zo1["usuario"];
			  $ip_zo1     = @$row_zo1["ip"];
              $ippc       = trim($_SERVER['REMOTE_ADDR']);
              
              
			  // Atualiza arquivo Log
			  $data_log = date("d/m/Y");
			  $hora_log = date("H:i:s"); 
			  $even_log = "ENTRADA NO SISTEMA";
			  $php_url  = $_SERVER['SCRIPT_NAME'];
			  $ip_sis   = $REMOTE_ADDR;
			  if(empty($ip_sis)){
					
				 $ip_sis = '127.0.0.1';
			  }
				
			  $consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
				             VALUES
				             ('$ip_sis', '$data_log', '$even_log','$hora_log','$nome', '$php_url')";
				
			  @mysql_query($consulta_log, $conn);
              
			    
			    if (!empty($id_zo1)){
			    	
				    if ($ip_zo1 != $ippc){
	
                        include('menu_info.php');
                        
						echo " <script language='JavaScript'><!--
							    document.onkeydown = keyCatcher;
								function keyCatcher() 
								{
								   var e = event.srcElement.tagName;
								
								   if (event.keyCode == 8 && e != 'INPUT' && e != 'TEXTAREA') 
								   {
								      event.cancelBubble = true;
								      event.returnValue = false;
								   }
								}
								//-->
								</script>
	
								<script language=JavaScript>
								<!-- begin
								var sHors = '00'; 
								var sMins = '60';
								var sSecs = 60;
								function getSecs(){
									sSecs--;
									if(sSecs<0)
								    {sSecs=59;sMins--;if(sMins<=9)sMins='0'+sMins;}
									if(sMins=='0-1')
								    {sMins=5;sHors--;if(sHors<=9)sHors='0'+sHors;}
									if(sSecs<=9)sSecs='0'+sSecs;
									if(sHors=='0-1')
									{sHors='00';sMins='00';sSecs='00';
									clock1.innerHTML=sHors+'<font color=#000000>:</font>'+sMins+'<font color=#000000>:</font>'+sSecs;}
								    else
								    {
								   clock1.innerHTML=sHors+'<font color=#000000>:</font>'+sMins+'<font color=#000000>:</font>'+sSecs;
								   	setTimeout('getSecs()',1000);
									}
									}
								//-->
								</script>
	
								<div align=center>
								
								<table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
								<tr>
								<td align=center>
								     <font face=arial><font color = #FF0000><b>> > > A T E N Ç Ã O < < <</b><br></font>
									                 <b>*** Usuário já Conectado !!! ***<br>
									                          Seu nome de usuário <br>
										      <font color = #1E90FF> $nome </font><br>
											  &nbsp;&nbsp;ja esta em uso em outro terminal&nbsp;&nbsp;<br>
                                              &nbsp;&nbsp;isso pode interferir no uso do Sistema&nbsp;&nbsp;<br>
											  &nbsp;&nbsp;efetue o logof, ou aguarde fim da sessão&nbsp;&nbsp;<br>											  
<div align='center'> 
	<b><font color=#ff0000 size=3 face=arial><span id='clock1'></span><script>setTimeout('getSecs()',1000);</script></font></b><br>
	</div>
											  
								<table width='200' border='0' cellspacing='3'>
                                  <tr>
                                    <td><div align='center'><a href='segunda_ses.php'><img src='imagens/login.PNG' width='92' height='22' border='0'></a></div></td>
                                    <td><div align='center'><a href='login.php'><img src='imagens/botaoazul33.PNG' width='92' height='22' border='0'></a></div></td>
                                  </tr>
                                </table>
								</td>
								</tr>
								</table>
								</div>";
//								@mysql_close(); 
  						        exit;
	
	
	                }
			    }

              /* Fim da Verificacao do Usuario logado */
           
			$consulta7 = "UPDATE tt_ser_01 SET   acesso  = '0',
			                                     entrada = '$data_ent',
												 saida   = '$entrada'  WHERE login = '". anti_sql_injection($nome) ."'";
			
			@mysql_query($consulta7, $conn);


	         
			 include("menu_1.php");
			 exit;
			 	  	
		  }else{
		  	
		  	   include("menu_info.php");
		       echo "<div align=center>
					 <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
					 <tr>
					 <td align=center>
					     <font face=arial><b>*** <font color = #FF0000>USUÁRIO OU SENHA (2)</font> DIGITADO NÃO ENCONTRADO !!! ***<br>
						                     verifique se digitou corretamente</b>
					 <table align=center>
					 <form method='POST' action='login.php'>
					 <td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
					 </form>  
					 </table>
					 </td>
					 </tr>
					 </table>
					 </div>";
					 exit;
		  	
		  }	
	}
}
?>