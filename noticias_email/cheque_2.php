<?php

/**
 * @author holodek
 * @copyright 2011
 */
 
 
include('aguarde.php');
 
include("../config.php");
// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

$nome3 = $_SESSION["nome_log"];

include_once("../logar.php");

include("menu.php");

include("vaurls.php");


$deixar = acesso_url("FORM_JORN");

if ($deixar == "SIM"){


include("help.php");
 
@session_start();
$smtp_host = trim($_SESSION['smtp_2']);
$e_mail_2  = trim($_SESSION['email_2']);
$sen_pas_2 = trim($_SESSION['sen_email2']);
$email_ret = trim($_SESSION['email_ret2']);

//echo "<br><br><br><br>";
//echo $smtp_host."<br>";       // SMTP servers
//echo ' '; // $e_mail_2."<br>";        // SMTP username
//echo $sen_pas_2."<br>";       // SMTP password
//echo $email_ret."<br>";       // Retorno CC
//echo $Titulo."<br>";
//echo $id_conf."<br><br>";        // Destino

//$id_conf  = "edsonaraujo1@hotmail.com";
$Faz_01  = "SIM";

//echo "As Mensagens de nº ...<br><br>";

include_once('phpmailer/class.phpmailer.php');

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// Monta o Email com as Noticias Selecionadas
		for ($i= 0; $i < 100; $i++){
			
			   if ($_POST['chd'.$i] > 0){
			   
			      //echo $_POST['chd'.$i]."<br>";
				  
				  // Inicio Enviar E-Mail
				  
					$consulta  = "SELECT * FROM noticias WHERE id = '". $_POST['chd'.$i]. "'";
					
					// Fim da Função Navegar pelo registro
					
					$resultado = @mysql_query($consulta);
					
					$row = @mysql_fetch_array($resultado);
					
					$id_1        = @$row["id"];
					$nome_not1   = @$row["nome"];
					$texto_not1  = @$row["texto"];
		            $Titulo2     = "Sindificios - Sind. Empreg. Edif. SP";
								
					$phpmail = new PHPMailer();
								
					$phpmail->IsSMTP();                    // Envia por SMTP
					$phpmail->Mailer   = "smtp";
					$phpmail->Host     = $smtp_host;       // SMTP servers
					$phpmail->SMTPAuth = true;             // Caso o servidor SMTP precise de autenticação
					$phpmail->Port     = 587;
					$phpmail->Username = $e_mail_2;        // SMTP username
					$phpmail->Password = $sen_pas_2;       // SMTP password
					$phpmail->IsHTML(true);
					$phpmail->From     = $email_ret;       // Retorno CC
					$phpmail->FromName = $Titulo2;
					
							   
					if ($Faz_01 == "SIM"){
						
						$message .= "<table width='200' border='0' align='center'>
														  <tr>
															<td><div align='center'>
															<img src='http://189.19.215.201/Web/imagens/Convite_SD.jpg' width='798' height='628' border='0' usemap='#Map'>
															</div></td>
														  </tr>
					                                </table>"; 
					$message .= "<table width='200' border='0' align='center'>
														   <tr><td><div align='center'>
														   <img src='http://189.19.215.201/Web/imagens/separador01.jpg' width='598' height='40'>
														   </div></td></tr>
					</table>
					 <map name='Map'>
					   <area shape='rect' coords='227,551,314,570' href='http://189.19.215.201/Web/jornal/confirmado.php' target='_blank'>
					</map>";

						$Faz_01 = "NAO";			    
					}		   
											       
					//$message .= "   Para Visualizar e Imprimir Faça o Download do Arquivo PDF em Anexo!&nbsp;&nbsp;<br>";
					                               
					//$message .= "   Qualquer Duvida sobre a autenticidade deste Link ligue para 11-3123-3211 Ramal 3260 ou 3273";
						
					  
					$phpmail->Subject = "Boletim Sindificios";
					$phpmail->Body .= " ";
					$phpmail->Body .= "$message";
					$phpmail->Body .= " <br />";
					//$phpmail->AddAttachment($id_zo1.".pdf");
												    
					  
				  // Fim Envio E-Mail
				  	
			   }
			   }
			
            $phpmail->Body .= "<center>Caso não queira receber mais informa&ccedil;&otilde;es e noticias do Sindificios neste e-mail novamente acesse aqui <a href='http://189.19.215.201/Web/enviar_boletim/nao_receber.php?ident=" . encode5t_se($e_mail_2) . "' target='new'>link.</a></center>";
            
             
            if (!empty($_POST['id_conf'])){
            	
	            $phpmail->ClearAddresses();
            	$phpmail->AddAddress($_POST['id_conf']);        // Destino
	  			$send = $phpmail->Send();
	  			if($send){
	  				
	  			    // OK
	  			    
						// Atualiza HIstorico de envio
						$data       = date("d/m/Y");
						$hora       = date("H:i:s");
						$status     = "ENVIADOS";
						$inform     = "BOLETIM O CONTATO"; 
						$envi_notic = '';
						$id_conf    = $_POST['id_conf'];
						
						for ($i= 0; $i < 100; $i++){
			
			                 if ($_POST['chd'.$i] > 0){
			                
							 $envi_notic = $envi_notic.$_POST['chd'.$i].",";  	
			                 }
						}	 	

								 	
						$consulta_em = "INSERT INTO log_email_boletim (data,
																	hora,
																	estatus,
																	informacao,
																	email,
																	noticias)
									                VALUES
									                                   ('$data',
																	    '$hora',
																		'$status',
																		'$inform',
																		'$id_conf',
																		'$envi_notic')";
	
	
									
						@mysql_query($consulta_em, $link);
	  			    
	  			}else{
	  			    // Cria o log
	  			    
	  			}	

            	
            }else{	
             	

                if ($_POST['id_categoria'] == 'TODOS'){

		            // Busca E-Mail do banco de dados 
		            $consulta3  = "SELECT * FROM email_boletim WHERE excluido != 'SIM'";
					$resultado3 = @mysql_query($consulta3);
                	
                	
                }else{
                	
		            // Busca E-Mail do banco de dados 
		            $consulta3  = "SELECT * FROM email_boletim WHERE categoria = '". $_POST['id_categoria'] ."' AND excluido != 'SIM'";
					$resultado3 = @mysql_query($consulta3);
                	
                }
            	
	            
	            // Envia para todos os E-Mails do banco
		        while ($linha = @mysql_fetch_array($resultado3))
		        {
		
		            $id_arq   = $linha["id"];
				  	$id_conf  = trim($linha["email"]);
					$id_nome  = $linha["nome"];
	                $date1    = date('m/d/Y');
	                $qtd_1    = $linha["qtd"];
	                $qtd_2    = $qtd_1 + 1;
	                
	                $phpmail->ClearAddresses();
	                $phpmail->AddAddress($id_conf);        // Destino
	  			    $send = $phpmail->Send();
	  			    
	  			    if($send){
	  			    	// OK
	  			        $consulta4 = "UPDATE email_boletim SET  enviado   = 'ENVIADOS',
                                                                data_envi = '$date1',
																qtd       = '$qtd_2' WHERE id = '$id_arq'";
	
	                    @mysql_query($consulta4, $link);
	                    
						// Atualiza HIstorico de envio
						$data   = date("d/m/Y");
						$hora   = date("H:i:s");
						$status = "ENVIADOS";
						$inform = "BOLETIM O CONTATO"; 
						$envi_notic = '';
						
						for ($i= 0; $i < 100; $i++){
			
			                 if ($_POST['chd'.$i] > 0){
			                
							 $envi_notic = $envi_notic.$_POST['chd'.$i].",";  	
			                 }
						}	 	

								 	
						$consulta_em = "INSERT INTO log_email_boletim (data,
																	hora,
																	estatus,
																	informacao,
																	email,
																	noticias)
									                VALUES
									                                   ('$data',
																	    '$hora',
																		'$status',
																		'$inform',
																		'$id_conf',
																		'$envi_notic')";
	
	
									
						@mysql_query($consulta_em, $link);
	                    
	  			    	
	  			    }else{
	  			    	// Cria o log
	  			        $consulta4 = "UPDATE email_boletim SET  enviado   = 'NÃO ENVIADOS',
                                                                data_envi = '$date1'
																qtd       = '$qtd_2' WHERE id = '$id_arq'";
	
	                    @mysql_query($consulta4, $link);
	                    
					// Atualiza HIstorico de envio
					$data   = date("d/m/Y");
					$hora   = date("H:i:s");
					$status = "NÃO ENVIADOS";
					$inform = "BOLETIM O CONTATO"; 
					$envi_notic = '';
						
					for ($i= 0; $i < 100; $i++){
			
			             if ($_POST['chd'.$i] > 0){
			                
							 $envi_notic = $envi_notic + $_POST['chd'.$i].",";  	
			             }
					}	 	

								 	
					$consulta_em = "INSERT INTO log_email_boletim  (data,
																	hora,
																	estatus,
																	informacao,
																	email,
																	noticias)
									                VALUES
									                                   ('$data',
																	    '$hora',
																		'$status',
																		'$inform',
																		'$id_conf',
																		'$envi_notic')";


								
					@mysql_query($consulta_em, $link);
	                    

	  			    }	
	  			}    
			
			}

			if($send){
										    	
				echo "<br><br><br><div align='center'>
					  <table width='257' height='170' border='15' bordercolor='$color_bor' bgcolor='#FFFFFF'>
					    <tr>
					      <td><div align='center'><b><font face='Verdana'>
						  <img src='../imagens/imagesCAUG8CE1.jpg' width='42' height='40'><br>
					      Boletim Enviado com<br> 
					      Sucesso!!!<br>
					      <br>
					      <a href='../avaleht.php?servletjs2=20$$20'>
						  <img src='../imagens/botaoazul25.PNG' width='92' height='22' border='0'></a>
						  </font></b></div></td>
					    </tr>
					  </table>
					</div>";
			}else{
										    	
				echo "<br><br><br><div align='center'>
				<table width='257' height='170' border='15' bordercolor='$color_bor' bgcolor='#FFFFFF'>
				      <tr>
				      <td bgcolor='#FFFFFF'><div align='center'><b><font face='Verdana'>
					  <img src='../imagens/imagesCAUG8CE2.png' width='42' height='40'><br>
				      <font color='#FF0000' size='4'>Aten&ccedil;&atilde;o</font>        <br>
				        Boletim N&atilde;o foram<br> 
				      Enviados !!!<br>
				      <br>
				      <a href='javascript:history.back()'>
					  <img src='../imagens/botaoazul25.PNG' width='92' height='22' border='0'></a> <br>
				      </font></b></div></td>
				      </tr>
				      </table
					  </div>";
			}	


//echo " "; // $_POST['id_categoria']."<br>";
//echo " "; // $_POST['id_reenvio']."<br>";

//echo "<br>Serao Enviadas por E-mail.";

}else{
	
include("enaaurlnp.php");
	
}
?>
