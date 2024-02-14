<?php

/**
 * @author holodek
 * @copyright 2011
 */

else{
						
						
						// Verifica se ja existe consulta pelo NOME
	
						$consulta4  = "SELECT * FROM plan_josenildo Where NOME = '$nome'";
						
						$resultado4 = @mysql_query($consulta4);
						
						$row4 = @mysql_fetch_array($resultado4);
						
						$cod_nome  = @$row4["NOME"];
 					    $id_conf   = @$row4["id"];

					    echo "Segundo teste NOME ". $nome ."<br>";
						
						if (!empty($cod_nome)){
							
						    echo "2º Achou...<br><br>";
							
							// Atualiza
							
							$consulta_up = "UPDATE plan_josenildo SET EXISTIA = 'SIM',
								                                      CPF     = '$cpf',
																	  MES     = '$mes',
																	  ANO     = '$ano',
																	  INSCRI  = '$insc' WHERE id = '$id_conf'";
							
							@mysql_query($consulta_up, $link);
	                    	
	                    	$consta++;
	 						
				
						}else{
							
						
							// Verifica se ja existe consulta pelo CPF
		
							$consulta5  = "SELECT * FROM plan_josenildo Where CPF = '$cpf'";
							
							$resultado5 = @mysql_query($consulta5);
							
							$row5 = @mysql_fetch_array($resultado5);
							
							$cod_cpf   = @$row5["CPF"];
							$id_conf   = @$row5["id"];

                            
							echo "Terceiro teste CPF ". $cpf ."<br><br>";

							if (!empty($cod_cpf)){
								
								echo "3º Achou...<br><br>";

								// Atualiza
								
								$consulta_up = "UPDATE plan_josenildo SET EXISTIA = 'SIM',
								                                          CPF     = '$cpf',
																		  MES     = '$mes',
																		  ANO     = '$ano',
																		  INSCRI  = '$insc' WHERE id = '$id_conf'";
								
								@mysql_query($consulta_up, $link);
		                    	
		                    	$consta++;
		 						
					
							}

?>