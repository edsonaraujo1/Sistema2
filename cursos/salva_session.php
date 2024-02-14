<?php
/*
 ----------------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Salvar info. digitadas em Sessao
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ----------------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

// include("../logar.php");
$nome3a = strtolower($_SESSION["nome_log"]);

// Abre Conexão com o MySql
include("../conexao.php");
$link = @mysql_connect($host,$user,$pass);
@mysql_select_db($db);

// -- Codigo
if (!empty($_GET["Edit1"]))   {

    $Edit1 = retirar_carac($_GET["Edit1"]);
   
    // Consulta Socio

	$consulta10  = "SELECT * FROM socios    WHERE CODP = '$Edit1'";
	
	$resultado10 = @mysql_query($consulta10);
	
	$row10 = mysql_fetch_array($resultado10);
	
	$id_soc		= @$row10["id"];
	$cod_soc    = @$row10["COD"];
	$new_fot    = @$row10["CODP"];
	$nu_cod	    = @$row10["NU"];
	$rg_soc     = Trim(@$row10["RGASSOC"]);
	$cpf_soc  	= @$row10["CPF"];
	$insc_soc 	= @$row10["DATINSC"];
	$cate_soc	= @$row10["CATEGORIA"];
	$edif_soc	= @$row10["CODEDIF"];
	$nome_soc	= @$row10["NOMEASSOC"];
	$end_soc	= Trim(@$row10["RUA"])." ".Trim(@$row10["ENDRESID"]).",".Trim(@$row10["NUMERO"]);
	$cep_soc	= @$row10["CEPRES"];
	$mes_pg_soc = @$row10["MES"];
	$ano_pg_soc = @$row10["ANO"];
	$dat_nascim = @$row10["DATNASC"];
	$carg_asso  = @$row10["CARGOASSOC"];
	$esta_civil = @$row10["ESTCIVIL"];
	$natural_de = @$row10["NASCION"];
	$bairro_res = @$row10["BAIRRORES"];
	$cart_trab  = @$row10["CARTTRAB"]."-".@$row10["SERIE"]."-".@$row10["EMISCART "];

	if (!empty($id_soc)){

		if ($cate_soc == "C"){
			//$menssagem1 = "................................";
		}
		if ($cate_soc == "D"){
			//$menssagem1 = "Candidato DESISTENTE";
		}
		if ($cate_soc == "I"){
			//$menssagem1 = "................................";
		}
		if ($cate_soc == "O"){
			//$menssagem1 = "Candidato com CARTA DE OPOSICAO";
		}
		if ($cate_soc == "F"){
			//$menssagem1 = "Candidato consta como FALECIDO";
		}
		if ($cate_soc == "R"){
			//$menssagem1 = "................................";
		}else{
	
	
			$Edit5  = $insc_soc;
			$Edit27 = $mes_pg_soc;
			$Edit28 = $ano_pg_soc;
			
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
					//echo $cate_soc;

					$texto_rg = $rg_soc;
					
					$eli_rg1 = str_replace("-"," ",$texto_rg);
					$eli_rg2 = str_replace("."," ",$eli_rg1);
					$valor_rg = str_replace(" ","",$eli_rg2);
						
					// Abre Tabela Oposicao
					
					$consulta6  = "SELECT * FROM oposicao3 Where RGASSOC = '$valor_rg'";
					
					$resultado6 = @mysql_query($consulta6);
					
					$row6 = mysql_fetch_array($resultado6);
					
					$cod_opo = @$row6["COD"];
					$rg_opo  = @$row6["RGASSOC"];
					$cpf_opo = @$row6["CPF"];
					
					if (strlen(trim($rg_opo)) > 0){
					   $cate_soc = "O";	
					}

					$texto_cpf = $cpf_soc;
					
					$eliminar1 = str_replace("-"," ",$texto_cpf);
					$eliminar2 = str_replace("."," ",$eliminar1);
					$valor_cp = str_replace(" ","",$eliminar2);
					
					$consulta7  = "SELECT * FROM oposicao3 Where CPF = '$valor_cp'";
					
					$resultado7 = @mysql_query($consulta7);
					
					$row7 = mysql_fetch_array($resultado7);
					
					$cod_opo = @$row7["COD"];
					$rg_opo  = @$row7["RGASSOC"];
					$cpf_opo = @$row7["CPF"];
					
					if (strlen(trim($cpf_opo)) > 0){
					   $cate_soc = "O";	
					}
					
					}
			}
			
			
			if ($cate_soc == "O"){
				
				$menssagem2 = 'Socio com CARTA de OPOSICAO!!!&nbsp;&nbsp;&nbsp;<br />
								      verifique cadastro de associados !!!!'; 
				
			}else{	
			
				if($qtd_fim != 0){
					
					$menssagem2 = "Socio ATRASADO COM PAGAMENTO, acertar no CAIXA !&nbsp;&nbsp;&nbsp;<br />
									      Quantidade de " . $qtd_fim ." Mensalidades atrasada num <br />
									       	  	   total de R$" . $valor_3 .",00 Reais !!!"; 
					
					
				}
			}	


	
		    $add1 = "UPDATE $nome3a SET Edit1    = '$Edit1',
		                                Edit5    = '$rg_soc',
		                                Edit7    = '$cpf_soc',
		                                Edit8    = '$nome_soc',
		                                Edit9    = '$carg_asso',
		                                Edit10   = '$dat_nascim',
			 					        Edit11   = '$esta_civil',
								        Edit12   = '$natural_de',
									    Edit15   = '$end_soc', 
									    Edit16   = '$cep_soc', 
									    Edit17   = '$bairro_res',
									    Edit20   = '$cart_trab',
									    mensage1 = '$menssagem1',
									    mensage2 = '$menssagem2'   WHERE Nome1 = '$nome3a'";
									   
	
	}else{
		
	    $Edit1 = retirar_carac($_GET["Edit1"]);
		$add1 = "UPDATE $nome3a SET Edit1    = '$Edit1',
		                            mensage1 = '$menssagem1',
								    mensage2 = '$menssagem2' WHERE Nome1 = '$nome3a'";
		
	}
	
		@mysql_query($add1, $link);
		

}
if (!empty($_GET["Edit2"]))   {
	
    $Edit2 = retirar_carac($_GET["Edit2"]);
	$add2 = "UPDATE $nome3a SET Edit2    = '$Edit2' WHERE Nome1 = '$nome3a'";
	@mysql_query($add2, $link);
}
if (!empty($_GET["Edit3"]))   {

    $Edit3 = retirar_carac($_GET["Edit3"]);
    $add3 = "UPDATE $nome3a SET Edit3    = '$Edit3'  WHERE Nome1 = '$nome3a'";
    @mysql_query($add3, $link);

}
if (!empty($_GET["Edit4"]))   {

    $Edit4 = retirar_carac($_GET["Edit4"]);
    $add4 = "UPDATE $nome3a SET Edit4    = '$Edit4'  WHERE Nome1 = '$nome3a'";
    @mysql_query($add4, $link);

}
if (!empty($_GET["Edit5"]))   {

    $texto_rg = $_GET["Edit5"];
	
	$eli_rg1 = str_replace("-"," ",$texto_rg);
	$eli_rg2 = str_replace("."," ",$eli_rg1);
	$valor_rg = str_replace(" ","",$eli_rg2);
		
	// Verifica se o Candidato ja esta Cadastrado

	$consulta8  = "SELECT * FROM socios    WHERE RGASSOC = '$valor_rg'";
	
	$resultado8 = @mysql_query($consulta8);
	
	$row8 = mysql_fetch_array($resultado8);
	
	$id_soc		= @$row8["id"];
	$cod_soc    = @$row8["COD"];
	$new_fot    = @$row8["CODP"];
	$nu_cod	    = @$row8["NU"];
	$rg_soc     = Trim(@$row8["RGASSOC"]);
	$cpf_soc  	= @$row8["CPF"];
	$insc_soc 	= @$row8["DATINSC"];
	$cate_soc	= @$row8["CATEGORIA"];
	$edif_soc	= @$row8["CODEDIF"];
	$nome_soc	= @$row8["NOMEASSOC"];
	$end_soc	= Trim(@$row8["RUA"])." ".Trim(@$row8["ENDRESID"]).",".Trim(@$row8["NUMERO"]);
	$cep_soc	= @$row8["CEPRES"];
	$mes_pg_soc = @$row8["MES"];
	$ano_pg_soc = @$row8["ANO"];
	$dat_nascim = @$row8["DATNASC"];
	$carg_asso  = @$row8["CARGOASSOC"];
	$esta_civil = @$row8["ESTCIVIL"];
	$natural_de = @$row8["NASCION"];
	$bairro_res = @$row8["BAIRRORES"];
	$cart_trab  = @$row8["CARTTRAB"]."-".@$row8["SERIE"]."-".@$row8["EMISCART "];

	if (!empty($id_soc)){

		if ($cate_soc == "C"){
			//$menssagem1 = "................................";
		}
		if ($cate_soc == "D"){
			//$menssagem1 = "Candidato DESISTENTE";
		}
		if ($cate_soc == "I"){
			//$menssagem1 = "................................";
		}
		if ($cate_soc == "O"){
			//$menssagem1 = "Candidato com CARTA DE OPOSICAO";
		}
		if ($cate_soc == "F"){
			//$menssagem1 = "Candidato consta como FALECIDO";
		}
		if ($cate_soc == "R"){
			//$menssagem1 = "................................";
		}else{
	
	
			$Edit5  = $insc_soc;
			$Edit27 = $mes_pg_soc;
			$Edit28 = $ano_pg_soc;
			
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
					//echo $cate_soc;

					$texto_rg = $rg_soc;
					
					$eli_rg1 = str_replace("-"," ",$texto_rg);
					$eli_rg2 = str_replace("."," ",$eli_rg1);
					$valor_rg = str_replace(" ","",$eli_rg2);
						
					// Abre Tabela Oposicao
					
					$consulta6  = "SELECT * FROM oposicao3 Where RGASSOC = '$valor_rg'";
					
					$resultado6 = @mysql_query($consulta6);
					
					$row6 = mysql_fetch_array($resultado6);
					
					$cod_opo = @$row6["COD"];
					$rg_opo  = @$row6["RGASSOC"];
					$cpf_opo = @$row6["CPF"];
					
					if (strlen(trim($rg_opo)) > 0){
					   $cate_soc = "O";	
					}

					$texto_cpf = $cpf_soc;
					
					$eliminar1 = str_replace("-"," ",$texto_cpf);
					$eliminar2 = str_replace("."," ",$eliminar1);
					$valor_cp = str_replace(" ","",$eliminar2);
					
					$consulta7  = "SELECT * FROM oposicao3 Where CPF = '$valor_cp'";
					
					$resultado7 = @mysql_query($consulta7);
					
					$row7 = mysql_fetch_array($resultado7);
					
					$cod_opo = @$row7["COD"];
					$rg_opo  = @$row7["RGASSOC"];
					$cpf_opo = @$row7["CPF"];
					
					if (strlen(trim($cpf_opo)) > 0){
					   $cate_soc = "O";	
					}
					
                    if ($cate_soc == "O"){
                    	//include("mensagemop.php");
	                }else{
	                	//include("mensagem.php");
	                }
					}
			}
	
	
			if ($cate_soc == "O"){
				
				$menssagem2 = 'Socio com CARTA de OPOSICAO!!!&nbsp;&nbsp;&nbsp;<br />
								      verifique cadastro de associados !!!!'; 
				
			}else{

				if($qtd_fim != 0){
					
					$menssagem2 = "Socio ATRASADO COM PAGAMENTO, acertar no CAIXA !&nbsp;&nbsp;&nbsp;<br />
									      Quantidade de" . $qtd_fim ." Mensalidades atrasada num <br />
									       	  	   total de R$" . $valor_3 .",00 Reais !!!"; 
					
					
				}	
				
			}	
			

	
		    $add5 = "UPDATE $nome3a SET Edit1    = '$new_fot',
		                                Edit5    = '$rg_soc',
		                                Edit7    = '$cpf_soc',
		                                Edit8    = '$nome_soc',
		                                Edit9    = '$carg_asso',
		                                Edit10   = '$dat_nascim',
			 					        Edit11   = '$esta_civil',
								        Edit12   = '$natural_de',
									    Edit15   = '$end_soc', 
									    Edit16   = '$cep_soc', 
									    Edit17   = '$bairro_res',
									    Edit20   = '$cart_trab',
									    mensage1 = '$menssagem1',
									    mensage2 = '$menssagem2' WHERE Nome1 = '$nome3a'";
	
	}else{

					$texto_rg = $_GET["Edit5"];
					
					$eli_rg1 = str_replace("-"," ",$texto_rg);
					$eli_rg2 = str_replace("."," ",$eli_rg1);
					$valor_rg = str_replace(" ","",$eli_rg2);
						
					// Abre Tabela Oposicao
					
					$consulta6  = "SELECT * FROM oposicao3 Where RGASSOC = '$valor_rg'";
					
					$resultado6 = @mysql_query($consulta6);
					
					$row6 = mysql_fetch_array($resultado6);
					
					$cod_opo = @$row6["COD"];
					$rg_opo  = @$row6["RGASSOC"];
					$cpf_opo = @$row6["CPF"];
					
					if (!empty($rg_opo)){
				
				        $menssagem2 = 'Socio com CARTA de OPOSICAO!!!&nbsp;&nbsp;&nbsp;<br />
								              verifique cadastro de associados !!!!'; 
	                }

		
	    $Edit5 = retirar_carac($_GET["Edit5"]);
		$add5 = "UPDATE $nome3a SET Edit5    = '$Edit5',
		                           mensage1 = '$menssagem1',
								   mensage2 = '$menssagem2' WHERE Nome1 = '$nome3a'";
		
	}
	
		@mysql_query($add5, $link);
	
}
if (!empty($_GET["Edit6"]))   {

    $Edit6 = retirar_carac($_GET["Edit6"]);
    $add6 = "UPDATE $nome3a SET Edit6    = '$Edit6'  WHERE Nome1 = '$nome3a'";
    @mysql_query($add6, $link);

}

if (!empty($_GET["Edit7"]))   {

$texto_cpf = $_GET["Edit7"];

$resu_t = verificaCPF($texto_cpf);

	if ($resu_t != 1){
	   $menssagem2 = "CPF digitado INVALIDO VERIFIQUE !!!";	
	}

	$eli_cpf1 = str_replace("-"," ",$texto_cpf);
	$eli_cpf2 = str_replace("."," ",$eli_cpf1);
	$valor_cpf = str_replace(" ","",$eli_cpf2);
		
	// Verifica se o Candidato ja esta Cadastrado
	
	$consulta9  = "SELECT * FROM socios    WHERE CPF = '$valor_cpf'";
	
	$resultado9 = @mysql_query($consulta9);
	
	$row9 = mysql_fetch_array($resultado9);
	
	$id_soc		= @$row9["id"];
	$cod_soc    = @$row9["COD"];
	$new_fot    = @$row9["CODP"];
	$nu_cod	    = @$row9["NU"];
	$rg_soc     = Trim(@$row9["RGASSOC"]);
	$cpf_soc  	= @$row9["CPF"];
	$insc_soc 	= @$row9["DATINSC"];
	$cate_soc	= @$row9["CATEGORIA"];
	$edif_soc	= @$row9["CODEDIF"];
	$nome_soc	= @$row9["NOMEASSOC"];
	$end_soc	= Trim(@$row9["RUA"])." ".Trim(@$row9["ENDRESID"]).",".Trim(@$row9["NUMERO"]);
	$cep_soc	= @$row9["CEPRES"];
	$mes_pg_soc = @$row9["MES"];
	$ano_pg_soc = @$row9["ANO"];
	$dat_nascim = @$row9["DATNASC"];
	$carg_asso  = @$row9["CARGOASSOC"];
	$esta_civil = @$row9["ESTCIVIL"];
	$natural_de = @$row9["NASCION"];
	$bairro_res = @$row9["BAIRRORES"];
	$cart_trab  = @$row9["CARTTRAB"]."-".@$row9["SERIE"]."-".@$row9["EMISCART "];

	if (!empty($id_soc)){

		if ($cate_soc == "C"){
			//$menssagem1 = "................................";
		}
		if ($cate_soc == "D"){
			//$menssagem1 = "Candidato DESISTENTE";
		}
		if ($cate_soc == "I"){
			//$menssagem1 = "................................";
		}
		if ($cate_soc == "O"){
			//$menssagem1 = "Candidato com CARTA DE OPOSICAO";
		}
		if ($cate_soc == "F"){
			//$menssagem1 = "Candidato consta como FALECIDO";
		}
		if ($cate_soc == "R"){
			//$menssagem1 = "................................";
		}else{
	
	
			$Edit5  = $insc_soc;
			$Edit27 = $mes_pg_soc;
			$Edit28 = $ano_pg_soc;
			
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
					//echo $cate_soc;

					$texto_rg = $rg_soc;
					
					$eli_rg1 = str_replace("-"," ",$texto_rg);
					$eli_rg2 = str_replace("."," ",$eli_rg1);
					$valor_rg = str_replace(" ","",$eli_rg2);
						
					// Abre Tabela Oposicao
					
					$consulta6  = "SELECT * FROM oposicao3 Where RGASSOC = '$valor_rg'";
					
					$resultado6 = @mysql_query($consulta6);
					
					$row6 = mysql_fetch_array($resultado6);
					
					$cod_opo = @$row6["COD"];
					$rg_opo  = @$row6["RGASSOC"];
					$cpf_opo = @$row6["CPF"];
					
					if (strlen(trim($rg_opo)) > 0){
					   $cate_soc = "O";	
					}

					$texto_cpf = $cpf_soc;
					
					$eliminar1 = str_replace("-"," ",$texto_cpf);
					$eliminar2 = str_replace("."," ",$eliminar1);
					$valor_cp = str_replace(" ","",$eliminar2);
					
					$consulta7  = "SELECT * FROM oposicao3 Where CPF = '$valor_cp'";
					
					$resultado7 = @mysql_query($consulta7);
					
					$row7 = mysql_fetch_array($resultado7);
					
					$cod_opo = @$row7["COD"];
					$rg_opo  = @$row7["RGASSOC"];
					$cpf_opo = @$row7["CPF"];
					
					if (strlen(trim($cpf_opo)) > 0){
					   $cate_soc = "O";	
					}
					
                    if ($cate_soc == "O"){
                    	//include("mensagemop.php");
	                }else{
	                	//include("mensagem.php");
	                }
					}
			}
			
			if ($resu_t != 1){
				
	           $menssagem2 = "CPF digitado INVALIDO VERIFIQUE !!!";
			   	
	        }else{
	        	
				if ($cate_soc == "O"){
					
					$menssagem2 = 'Socio com CARTA de OPOSICAO!!!&nbsp;&nbsp;&nbsp;<br />
									      verifique cadastro de associados !!!!'; 
					
				}else{
					
					if($qtd_fim != 0){
						
						$menssagem2 = "Socio ATRASADO COM PAGAMENTO, acertar no CAIXA !&nbsp;&nbsp;&nbsp;<br />
										      Quantidade de" . $qtd_fim ." Mensalidades atrasada num <br />
										       	  	   total de R$" . $valor_3 .",00 Reais !!!"; 
						
					}	
					
				}	
	        	
	        }
	
		    $add7 = "UPDATE $nome3a SET Edit1    = '$new_fot',
		                               Edit5    = '$rg_soc',
		                               Edit7    = '$cpf_soc',
		                               Edit8    = '$nome_soc',
		                               Edit9    = '$carg_asso',
		                               Edit10   = '$dat_nascim',
			 					       Edit11   = '$esta_civil',
								       Edit12   = '$natural_de',
									   Edit15   = '$end_soc', 
									   Edit16   = '$cep_soc', 
									   Edit17   = '$bairro_res',
									   Edit20   = '$cart_trab',
									   mensage1 = '$menssagem1',
									   mensage2 = '$menssagem2' WHERE Nome1 = '$nome3a'";
	
	}else{


					$texto_cpf = $_GET["Edit7"];
					
					$eliminar1 = str_replace("-"," ",$texto_cpf);
					$eliminar2 = str_replace("."," ",$eliminar1);
					$valor_cp = str_replace(" ","",$eliminar2);
					
					$consulta7  = "SELECT * FROM oposicao3 Where CPF = '$valor_cp'";
					
					$resultado7 = @mysql_query($consulta7);
					
					$row7 = mysql_fetch_array($resultado7);
					
					$cod_opo = @$row7["COD"];
					$rg_opo  = @$row7["RGASSOC"];
					$cpf_opo = @$row7["CPF"];
					
					if (strlen(trim($cpf_opo)) > 0){
					   $cate_soc = "O";	
					}
					
					if (!empty($cpf_opo)){

						$menssagem2 = 'Socio com CARTA de OPOSICAO!!!&nbsp;&nbsp;&nbsp;<br />
										      verifique cadastro de associados !!!!'; 

	                }
		
	    $Edit7 = retirar_carac($_GET["Edit7"]);
		$add7 = "UPDATE $nome3a SET Edit7    = '$Edit7',
		                           mensage1 = '$menssagem1',
								   mensage2 = '$menssagem2' WHERE Nome1 = '$nome3a'";
		
	}
	
		@mysql_query($add7, $link);
	
}
if (!empty($_GET["Edit8"]))   {

    $Edit8 = retirar_carac($_GET["Edit8"]);
    $add8 = "UPDATE $nome3a SET Edit8    = '$Edit8' WHERE Nome1 = '$nome3a'";
    @mysql_query($add8, $link);

}
if (!empty($_GET["Edit9"]))   {

    $Edit9 = retirar_carac($_GET["Edit9"]);
    $add9 = "UPDATE $nome3a SET Edit9    = '$Edit9' WHERE Nome1 = '$nome3a'";
    @mysql_query($add9, $link);

}
if (!empty($_GET["Edit10"]))   {

    $Edit10 = retirar_carac($_GET["Edit10"]);
    $add10 = "UPDATE $nome3a SET Edit10    = '$Edit10' WHERE Nome1 = '$nome3a'";
    @mysql_query($add10, $link);

}
if (!empty($_GET["Edit11"]))   {

    $Edit11 = retirar_carac($_GET["Edit11"]);
    $add11 = "UPDATE $nome3a SET Edit11    = '$Edit11' WHERE Nome1 = '$nome3a'";
    @mysql_query($add11, $link);

}
if (!empty($_GET["Edit12"]))   {

    $Edit12 = retirar_carac($_GET["Edit12"]);
    $add12 = "UPDATE $nome3a SET Edit12    = '$Edit12' WHERE Nome1 = '$nome3a'";
    @mysql_query($add12, $link);

}
if (!empty($_GET["Edit13"]))   {

    $Edit13 = retirar_carac($_GET["Edit13"]);
    $add13 = "UPDATE $nome3a SET Edit13    = '$Edit13' WHERE Nome1 = '$nome3a'";
    @mysql_query($add13, $link);

}
if (!empty($_GET["Edit14"]))   {

    $Edit14 = retirar_carac($_GET["Edit14"]);
    $add14 = "UPDATE $nome3a SET Edit14    = '$Edit14' WHERE Nome1 = '$nome3a'";
    @mysql_query($add14, $link);

}
if (!empty($_GET["Edit15"]))   {

    $Edit15 = retirar_carac($_GET["Edit15"]);
    $add15 = "UPDATE $nome3a SET Edit15   = '$Edit15' WHERE Nome1 = '$nome3a'";
    @mysql_query($add15, $link);

}
if (!empty($_GET["Edit16"]))   {

// Abrir tabela Ruas
$consulta   = "SELECT * FROM ruas WHERE CEP = '$_GET[Edit16]'";
$resultado  = @mysql_query($consulta);
$row        = @mysql_fetch_array($resultado);
$cep_2      = @$row["CEP"];

if (!empty($cep_2)){

	$rua_2    = @$row["RUA"];
	$cep_2    = @$row["CEP"];
	$proc_log = @$row["CODLOG"];
	$proc_bai = @$row["CODBAI"];
	$compl_3  = @$row["COMPL"];
    if (substr($compl_3,0,1) == ",")
    {
	   $compl_1 = $compl_3; 
    }

    // Abrir tabela Logradou
    $consulta   = "SELECT * FROM logradou WHERE CODLOG = '$proc_log'";
    $resultado  = @mysql_query($consulta);
    $row        = @mysql_fetch_array($resultado);
    $Logra_2    = @$row["LOGRADOURO"];

    // Abrir tabela Bairro
    $consulta   = "SELECT * FROM bairros WHERE CODBAI = '$proc_bai'";
    $resultado  = @mysql_query($consulta);
    $row        = @mysql_fetch_array($resultado);
    $Bairro_3   = @$row["EXTENSO"];
    $proc_cida  = substr($proc_bai,0,6);

    // Abrir tabela Cidades
    $consulta   = "SELECT * FROM cidades WHERE CODCID = '$proc_cida'";
    $resultado  = @mysql_query($consulta);
    $row        = @mysql_fetch_array($resultado);
    $Uf_2       = retirar_carac(@$row["UF"]);
    $Cidade_2   = retirar_carac(@$row["CIDADE"]);
    $rua        = retirar_carac($Logra_2);
    $endereco   = retirar_carac($rua_2);
    $numero     = retirar_carac($compl_1);
    $bairro     = retirar_carac($Bairro_3);
    $cidade     = retirar_carac($Cidade_2);
    $cep        = retirar_carac($cep_2);
    $uf         = retirar_carac($Uf_2);

    $end_novo = Trim($rua)." ".Trim($endereco)." ".Trim($numero);
    // Fim Rotina de CEP
    
    $Edit16 = retirar_carac($_GET["Edit16"]);
    $add16 = "UPDATE $nome3a SET Edit15   = '$end_novo',
	                            Edit16   = '$Edit16',
	                            Edit17   = '$bairro' WHERE Nome1 = '$nome3a'";
    
}else{

    $Edit16 = retirar_carac($_GET["Edit16"]);
    $add16 = "UPDATE $nome3a SET Edit16   = '$Edit16' WHERE Nome1 = '$nome3a'";

}

    @mysql_query($add16, $link);
    
}
if (!empty($_GET["Edit17"]))   {

    $Edit17 = retirar_carac($_GET["Edit17"]);
    $add17 = "UPDATE $nome3a SET Edit17   = '$Edit17' WHERE Nome1 = '$nome3a'";
    @mysql_query($add17, $link);

}
if (!empty($_GET["Edit18"]))   {

    $Edit18 = retirar_carac($_GET["Edit18"]);
    $add18 = "UPDATE $nome3a SET Edit18   = '$Edit18' WHERE Nome1 = '$nome3a'";
    @mysql_query($add18, $link);

}
if (!empty($_GET["Edit19"]))   {

    $Edit19 = retirar_carac($_GET["Edit19"]);
    $add19 = "UPDATE $nome3a SET Edit19   = '$Edit19' WHERE Nome1 = '$nome3a'";
    @mysql_query($add19, $link);

}
if (!empty($_GET["Edit20"]))   {

    $Edit20 = retirar_carac($_GET["Edit20"]);
    $add20 = "UPDATE $nome3a SET Edit20   = '$Edit20' WHERE Nome1 = '$nome3a'";
    @mysql_query($add20, $link);

}
if (!empty($_GET["Edit21"]))   {

    $Edit21 = retirar_carac($_GET["Edit21"]);
    $add21 = "UPDATE $nome3a SET memo1    = '$Edit21' WHERE Nome1 = '$nome3a'";
    @mysql_query($add21, $link);

}

include("layout_opo.php");

// Função que valida o CNPJ

function validaCNPJ($cnpj) { 
	
    if (strlen($cnpj) <> 18) return 0; 
    $soma1 = ($cnpj[0] * 5) + 

    ($cnpj[1] * 4) + 
    ($cnpj[3] * 3) + 
    ($cnpj[4] * 2) + 
    ($cnpj[5] * 9) + 
    ($cnpj[7] * 8) + 
    ($cnpj[8] * 7) + 
    ($cnpj[9] * 6) + 
    ($cnpj[11] * 5) + 
    ($cnpj[12] * 4) + 
    ($cnpj[13] * 3) + 
    ($cnpj[14] * 2); 
    $resto = $soma1 % 11; 
    $digito1 = $resto < 2 ? 0 : 11 - $resto; 
    $soma2 = ($cnpj[0] * 6) + 

    ($cnpj[1] * 5) + 
    ($cnpj[3] * 4) + 
    ($cnpj[4] * 3) + 
    ($cnpj[5] * 2) + 
    ($cnpj[7] * 9) + 
    ($cnpj[8] * 8) + 
    ($cnpj[9] * 7) + 
    ($cnpj[11] * 6) + 
    ($cnpj[12] * 5) + 
    ($cnpj[13] * 4) + 
    ($cnpj[14] * 3) + 
    ($cnpj[16] * 2); 
    $resto = $soma2 % 11; 
    $digito2 = $resto < 2 ? 0 : 11 - $resto; 
    return (($cnpj[16] == $digito1) && ($cnpj[17] == $digito2)); 
} 


// Função que valida o CPF
function verificaCPF($cpf)
{	// Verifiva se o número digitado contém todos os digitos
    $cpf = str_pad(@ereg_replace('[^0-9]', '', $cpf), 11, '0', STR_PAD_LEFT);
	
	// Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
    if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999')
	{
	return false;
	// echo '<center><font color="#FF0000" size="4">CNPJ Inválido, por favor digite um CNPJ válido.</b></font>'; 
    }
	else
	{   // Calcula os números para verificar se o CPF é verdadeiro
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }

            $d = ((10 * $d) % 11) % 10;

            if ($cpf{$c} != $d) {
                return false;
                // echo '<center><font color="#FF0000" size="4">CNPJ Inválido, por favor digite um CNPJ válido.</b></font>'; 
            }
        }

        return true;
    }
}


/*
 --------------------------------
 Funcao para Retirar os caracter
 estranhos e acentos na hora de
 atualizar Table 
---------------------------------
*/

Function retirar_carac($var){

$var = @ereg_replace("[ÁÀÂÃ]",      "A",$var);
$var = @ereg_replace("[áàâãª]",     "a",$var);
$var = @ereg_replace("[ÉÈÊ]",       "E",$var);
$var = @ereg_replace("[éèê]",       "e",$var);
$var = @ereg_replace("[ÓÒÔÕ]",      "O",$var);
$var = @ereg_replace("[óòôõº]",     "o",$var);
$var = @ereg_replace("[ÚÙÛ]",       "U",$var);
$var = @ereg_replace("[úùû]",       "u",$var);
$var = @ereg_replace("[íìî]",       "i",$var);
$var = @ereg_replace("[ÍÌÎ]",       "I",$var);
$var = @ereg_replace("[?*#'´`!$%¨]"," ",$var);
$var = str_replace("Ç",            "C",$var);
$var = str_replace("ç",            "c",$var);

return($var);
}

/*
  ---------------------------
  Função para Subtrair Data
  ---------------------------
*/

function SubtraiData($data, $dias, $meses, $ano)
{
   //passe a data no formato dd/mm/yyyy 
   $data = explode("/", $data);
   $newData = date("d/m/Y", mktime(0, 0, 0, $data[1] - $meses,
    $data[0] - $dias, $data[2] - $ano) );
   return $newData;
}

/*
  ------------------------
  Função para Somar Data
  ------------------------
*/

function SomarData($data, $dias, $meses, $ano)
{
   //passe a data no formato dd/mm/yyyy 
   $data = explode("/", $data);
   $newData = date("d/m/Y", mktime(0, 0, 0, $data[1] + $meses,
    $data[0] + $dias, $data[2] + $ano) );
   return $newData;
}

?>
