<?php

/**
 * @author holodek
 * @copyright 2007
 */

// Abre Conexão com o MySql
include("conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

$consulta  = "SELECT * FROM socios WHERE id >= '1'";
//$consulta  = "SELECT * FROM socios WHERE CODP = '1A'";
		
$resultado = @mysql_query($consulta);

$contr_0    = 0;
$emdia      = 0;
$desist     = 0;
$cat_fale   = 0;
$cat_apos   = 0;
$cat_dire   = 0;
$cat_remi   = 0;
$cat_isen   = 0;
$cat_opos   = 0;
$soma_idade = 0;

		
		     while ($linha = mysql_fetch_array($resultado))
		       {
		
				    $id_conf    = $linha["id"];
					$cod        = $linha["CODP"];
					$nome       = $linha["NOMEASSOC"];
					$rua        = trim(strtoupper($linha["RUA"]));
					$endereco   = trim(strtoupper($linha["ENDRESID"]));
					$numero     = trim(strtoupper($linha["NUMERO"]));
					$cep        = trim(strtoupper($linha["CEPRES"]));
					$bairro     = trim(strtoupper($linha["BAIRRORES"]));
					$cidade     = trim(strtoupper($linha["CIDADERES"]));
					$rg         = trim(strtoupper($linha["RGASSOC"]));
					$cpf        = trim(strtoupper($linha["CPF"]));
                    $cargo      =  trim(strtoupper($linha["CARGOASSOC"]));
                    $nascimento = trim(strtoupper($linha["DATNASC"]));
                    $sexo_soc   = trim(strtoupper($linha["SEXO_SOC"]));
                    $cod_edif   = trim(strtoupper($linha["CODEDIF"]));
					
					if ($sexo_soc == "M"){
						
						$sexo_conj = "F";
						
					}
					
					if ($sexo_soc == "F"){
					
						$sexo_conj = "M";
					}
					
					// Idade do SocioTitular
					$nasc_dia = substr($nascimento,0,2);
					$nasc_mes = substr($nascimento,3,2);
					$nasc_ano = substr($nascimento,6,4);
					
					
					$soma_idade = date('Y') - intval($nasc_ano);
					
										
					// Dependentes Nº
					$dep_[1]     = $linha["CONJUGE"];
					$aniver_[1]  = date('Y') - intval(substr($linha["DATCONJ"],6,4));
					$sexo_[1]    = $sexo_conj;
					$parent_[1]  = "CONJUGE";
					
					$dep_[2]     = $linha["FILHO01"];
					$aniver_[2]  = date('Y') - intval(substr($linha["DAT01"],6,4));
					$sexo_[2]    = $linha["SEXO01"];
					$parent_[2]  = "FILHO(A)";
					
					$dep_[3]     = $linha["FILHO02"];
					$aniver_[3]  = date('Y') - intval(substr($linha["DAT02"],6,4));
					$sexo_[3]    = $linha["SEXO02"];
					$parent_[3]  = "FILHO(A)";
					
					$dep_[4]     = $linha["FILHO03"];
					$aniver_[4]  = date('Y') - intval(substr($linha["DAT03"],6,4));
					$sexo_[4]    = $linha["SEXO03"];
					$parent_[4]  = "FILHO(A)";
					
					$dep_[5]     = $linha["FILHO04"];
					$aniver_[5]  = date('Y') - intval(substr($linha["DAT04"],6,4));
					$sexo_[5]    = $linha["SEXO04"];
					$parent_[5]  = "FILHO(A)";
					
					$dep_[6]     = $linha["FILHO05"];
					$aniver_[6]  = date('Y') - intval(substr($linha["DAT05"],6,4));
					$sexo_[6]    = $linha["SEXO05"];
					$parent_[6]  = "FILHO(A)";
					
					$dep_[7]     = $linha["FILHO06"];
					$aniver_[7]  = date('Y') - intval(substr($linha["DAT06"],6,4));
					$sexo_[7]    = $linha["SEXO06"];
					$parent_[7]  = "FILHO(A)";
					
					$dep_[8]     = $linha["FILHO07"];
					$aniver_[8]  = date('Y') - intval(substr($linha["DAT07"],6,4));
					$sexo_[8]    = $linha["SEXO07"];
					$parent_[8]  = "FILHO(A)";
					
					$dep_[9]     = $linha["FILHO08"];
					$aniver_[9]  = date('Y') - intval(substr($linha["DAT08"],6,4));
					$sexo_[9]    = $linha["SEXO08"];
					$parent_[9]  = "FILHO(A)";
					
					$dep_[10]     = $linha["FILHO09"];
					$aniver_[10]  = date('Y') - intval(substr($linha["DAT09"],6,4));
					$sexo_[10]    = $linha["SEXO09"];
					$parent_[10]  = "FILHO(A)";
					
					$dep_[11]     = $linha["FILHO010"];
					$aniver_[11]  = date('Y') - intval(substr($linha["DAT010"],6,4));
					$sexo_[11]    = $linha["SEXO010"];
					$parent_[11]  = "FILHO(A)";
				
					
					$categoria = $linha["CATEGORIA"];
					$inscricao = $linha["DATINSC"];
					$mes_i     = $linha["MES"];
					$ano_i     = $linha["ANO"];


// Calcula Socio em Dia com Sindicato

                    if ($categoria == "C" OR $categoria == "A"){

					    $Edit5  = $inscricao;
						$Edit27 = $mes_i;
						$Edit28 = $ano_i;  // total de 2 anos devedor
						
						/* Variaveis do Sistema */
						$qtd          = 0;
						$qtd_fim      = 0;
						$valor_3      = 0;
						$ins_cri_sa   = $Edit5; 
						$mes_inicio   = $Edit27;
						$ano_inicio   = $Edit28;
						$mes_hj       = intval(date("m"));
						$ano_hj       = intval(date("Y"));
						$fim_insc_ano = substr($ins_cri_sa,6,4); /* Retira o ano da Inscricao */
						$fim_insc_mes = substr($ins_cri_sa,3,2); /* Retira o mes da Inscricao */
						
						/* Compara Ano e Mes de Inscricao */
						if (intval($fim_insc_ano) >= $ano_hj and intval($fim_insc_mes) >= $mes_hj){
							/* Socios em Dia com Pagamento */
							//echo "Socio em Dia !!!";
						}else{
							/* Verifica mes e ano de pagamento */
							if($mes_inicio == 0 and $ano_inicio == 0){
								$mes_inicio = intval($fim_insc_mes);
								$ano_inicio = intval($fim_insc_ano);
							}
						
								//echo "Mes e ano pagos = ".trim($mes_inicio)."/".trim($ano_inicio)."<br><br>";
								/* Calcula quantidade me mensalidade devedora */
								while ($ano_inicio < $ano_hj)
								{
									$qtd++;
									If($mes_inicio != 12)
									{
									    $mes_inicio++;
									}else{
										$mes_inicio = 1;
										$ano_inicio++;
									}
								}
								while($ano_inicio == $ano_hj)
								{
									if($ano_inicio == $ano_hj and $mes_inicio >= $mes_hj)
									{
									   $qtd = 0;
									   break;
									}
									$mes_inicio++;
									$qtd++;
									if($mes_inicio == $mes_hj)
									{
										break;
									}
								}
								/* Calcula Valor devedor */
								if ($qtd > 0)
								{
								   $qtd_fim = $qtd - 1;
								   $valor_3 = $qtd_fim * 8.00;
								}
								//echo "Quantidade de mensalidades devedora  = ".$qtd_fim." valor devedor = ".$valor_3.".00";
								//echo "<br>";
								
								if ($qtd_fim <= 24){
									
									$grava = 'Faz';
									
								}else{
									
									
									$grava = 'Nao';
								}
						}
	

                    	
                    }	

	


// Fim Calculo em Dia



                  // Pesquiza Edificio
                    $sql  = "SELECT * FROM edificios WHERE COD = '$cod_edif'";	
	
	                $resultado5 = @mysql_query($sql);

                    $row5 = @mysql_fetch_array($resultado5);

                    $id_edif     = @$row5["id"];
                    $edif_cgc    = @$row5["CGC"];
                    $edif_zona   = @$row5["ZONA"];


                    // Mostra na Tela

                    echo "Nome Socio =".$nome."<br>";
                    //echo "Sexo =".$sexo_soc."<br>";
                    //echo "Categoria =".$categoria."<br>";
                    //echo "Cargo =".$cargo."<br>";
                    //echo "Bairro =".$bairro."<br>";
                    //echo "Zona =".$edif_zona."<br><br>";
					
					// Idade do SocioTitular
					//echo "Idade =".$soma_idade."<br><br>";
										
					// Dependentes Nº
					
					
					for ($si = 1; $si < 12; $si++){
	
	
						if (!empty($dep_[$si])){
					      //echo "Dependente =" .$dep_[$si]."<br>";
					      if (empty($aniver_[$si])){
					      	$aniver_[$si] = ' ';
					      }
					      if ($aniver_[$si] > 90){
					      	
					      	$aniver_[$si] = ' '; 
					      }
					      if (empty($parent_[$si])){
					      	
					      	 $parent_[$si] = " ";
					      }
					      if (empty($sexo_[$si])){
					      	
					      	 $sexo_[$si] = " ";
					      }
					      //echo "Idade =" .$aniver_[$si]."<br>";
					      //echo "Sexo =" .$sexo_[$si]."<br>";
					      //echo "Parentesco =".$parent_[$si]."<br><br>";
						}else{
							
							$parent_[$si] = " ";
							$aniver_[$si] = '';
							$sexo_[$si] = " ";
						}
					}


                    // Exclui Socio com Oposicao
                    
					$consulta3  = "SELECT * FROM oposicao3 Where RGASSOC = '$rg'";
					
					$resultado3 = @mysql_query($consulta3);
					
					$row3 = mysql_fetch_array($resultado3);
					
					$cod_opo = @$row3["COD"];
					$rg_opo  = @$row3["RGASSOC"];
					
					if ($cod_opo != 0){
						
						$categoria = "O";
						// Excluir
						
				
					}
					
					$consulta4  = "SELECT * FROM oposicao3 Where CPF = '$cpf'";
					
					$resultado4 = @mysql_query($consulta4);
					
					$row4 = mysql_fetch_array($resultado4);
					
					$cod_opo = @$row4["COD"];
					$cpf_opo = @$row4["CPF"];
					
					if ($cod_opo != 0){

						$categoria = "O";
						// Excluir
				
					}
					
										
					if ($categoria != 'O'){
						
						if ($categoria == "F"){
							
							$forma_categ = 'Normal';
						}
						
					     //echo "CArta de Opsicao - Não<br>";	
						
					}else{

						if ($categoria == "F"){
							
							$forma_categ = 'Normal';
						}
						
					     //echo "CArta de Opsicao - Sim<br>";	
						
					}

if ($categoria == "R"){
	
	$grava = 'Faz';
}					
if ($categoria == "P"){
	
	$grava = 'Faz';
}					
if ($categoria == "I"){
	
	$grava = 'Faz';
}					
					
					
if ($grava == 'Faz'){					
					

if ($soma_idade <= 88){
	

					// Cria Arquivo
					
					$consulta_bb = "INSERT INTO etaria (NOME,
					                                    SEXO_SOC,
													    CATEGORIA,
													    CARGO,
													    BAIRRO,
													    EDIF_ZONA,
													    SOMA_IDADE,
													    DEP_01,
														ANIVER_01,
														SEXO_01,
														PARENT_01,
														
													    DEP_02,
														ANIVER_02,
														SEXO_02,
														PARENT_02,
														
													    DEP_03,
														ANIVER_03,
														SEXO_03,
														PARENT_03,
														
													    DEP_04,
														ANIVER_04,
														SEXO_04,
														PARENT_04,
														
													    DEP_05,
														ANIVER_05,
														SEXO_05,
														PARENT_05,
														
													    DEP_06,
														ANIVER_06,
														SEXO_06,
														PARENT_06,
														
													    DEP_07,
														ANIVER_07,
														SEXO_07,
														PARENT_07,
														
													    DEP_08,
														ANIVER_08,
														SEXO_08,
														PARENT_08,
														
													    DEP_09,
														ANIVER_09,
														SEXO_09,
														PARENT_09,
														
													    DEP_10,
														ANIVER_10,
														SEXO_10,
														PARENT_10,
														
													    DEP_11,
														ANIVER_11,
														SEXO_11,
														PARENT_11,
														
														obs)
					                VALUES
					                                   ('$nome',
													    '$sexo_soc',
														'$categoria',
														'$cargo',
														'$bairro',
														'$edif_zona',
														'$soma_idade',
														'$dep_[1]',
														'$aniver_[1]',
														'$sexo_[1]',
														'$parent_[1]',
														
														'$dep_[2]',
														'$aniver_[2]',
														'$sexo_[2]',
														'$parent_[2]',
														
														'$dep_[3]',
														'$aniver_[3]',
														'$sexo_[3]',
														'$parent_[3]',
														
														'$dep_[4]',
														'$aniver_[4]',
														'$sexo_[4]',
														'$parent_[4]',
														
														'$dep_[5]',
														'$aniver_[5]',
														'$sexo_[5]',
														'$parent_[5]',
														
														'$dep_[6]',
														'$aniver_[6]',
														'$sexo_[6]',
														'$parent_[6]',
														
														'$dep_[7]',
														'$aniver_[7]',
														'$sexo_[7]',
														'$parent_[7]',
														
														'$dep_[8]',
														'$aniver_[8]',
														'$sexo_[8]',
														'$parent_[8]',
														
														'$dep_[9]',
														'$aniver_[9]',
														'$sexo_[9]',
														'$parent_[9]',
														
														'$dep_[10]',
														'$aniver_[10]',
														'$sexo_[10]',
														'$parent_[10]',
														
														'$dep_[11]',
														'$aniver_[11]',
														'$sexo_[11]',
														'$parent_[11]',
														
														'$obs')";
							
					@mysql_query($consulta_bb, $link);					
	
	
}					

}

$nome = '';
$sexo_soc = '';
$categoria = '';
$cargo = '';
$bairro = '';
$edif_zona = '';
$soma_idade = '';
$dep_[1] = '';
$aniver_[1] = '';
$sexo_[1] = '';
$parent_[1] = '';
$dep_[2] = '';
$aniver_[2] = '';
$sexo_[2] = '';
$parent_[2] = '';
$dep_[3] = '';
$aniver_[3] = '';
$sexo_[3] = '';
$parent_[3] = '';
$dep_[4] = '';
$aniver_[4] = '';
$sexo_[4] = '';
$parent_[4] = '';
$dep_[5] = '';
$aniver_[5] = '';
$sexo_[5] = '';
$parent_[5] = '';
$dep_[6] = '';
$aniver_[6] = '';
$sexo_[6] = '';
$parent_[6] = '';
$dep_[7] = '';
$aniver_[7] = '';
$sexo_[7] = '';
$parent_[7] = '';
$dep_[8] = '';
$aniver_[8] = '';
$sexo_[8] = '';
$parent_[8] = '';
$dep_[9] = '';
$aniver_[9] = '';
$sexo_[9] = '';
$parent_[9] = '';
$dep_[10] = '';
$aniver_[10] = '';
$sexo_[10] = '';
$parent_[10] = '';
$dep_[11] = '';
$aniver_[11] = '';
$sexo_[11] = '';
$parent_[11] = '';


}
echo "Fim da Importacao";
?>