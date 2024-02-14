<?
/*
/**
 *  -----------------------------------------------------
 *  Desenvolvido por...: Edson de Araujo
 *  Finalidade.........: Tratar Retorno Banco do Brasil
 *  Criado em Data.....: 05/02/2010
 *  Ultima Alteracao...: 05/02/2010
 *  
 *  DEUS SEJA LOUVADO
 *  -----------------------------------------------------
**/ 
include("../config.php");

include("../logar.php");

// Abre Conexao com MySql
include("../conexao.php");
// Chama o Banco de Dados
$link = @mysql_connect($hot,$user,$pass);

@mysql_select_db($db);


// Salva Sessao
session_start();

$vencto1  = $_SESSION['vencto1_bb'];
$exec1    = $_SESSION['exec1_bb'];
$recebe   = $_SESSION['recebe3_bb']; 
$cont_rec = 0;
$data_b   = date("d/m/Y");

$mensa_sun  = 0;
$contri_sun = 0;
$duplic     = 0;

$tipo_vencto   = $vencto1;
$tipo_vencto2  = str_replace("/","",$vencto1);

if ($exec1 == 1){
	
   $tipo_contri = "CONFEDERATIVA";
	
}
if ($exec1 == 2){
	
   $tipo_contri = "ASSITENCIAL";
	
}
if ($exec1 >= 1000){
	
   $tipo_contri = "SINDICAL";
	
}

if ($recebe == 2){  // Retorno Banco do Brasil Contribuicao e Mensalidades

//    echo $tipo_vencto."<br>";
//    echo $tipo_vencto2."<br>";
//    echo $tipo_contri."<br>";
//    echo "entrei aqui na confederativa/assistencial -- Banco do Brasil --";
    //break;
    
	for ($iv_t = 289; $iv_t < 500; $iv_t++){
		
	    if($iv_t < 10){
	    	$i_conp == "00";
	    }
	    if($iv_t >= 10 and $iv_t < 100){
	    	$i_conp == "0";
	    }
	    if($iv_t >= 100 and $iv_t < 1000){
	    	$i_conp == "";
	    }
	    $i_sequenc = $i_conp.$iv_t;
	
		$linha = @file("txt/CBR64".trim($i_sequenc).".RET");
		
		$total = count($linha);
		
		for ($si = 0; $si < $total; $si++ ){
			
			list($dados1,$dados2,$dados3,$dados4,$dados5,) = explode("\t", $linha[$si]);
		
			// Manupula Dados
			
			// Mensalidades Socios
			if(substr($dados1,31,7) == "1449863"){
				$mensa_sun++;
				$cont_rec++;
			
			   if(substr($dados1,77,1) == "1"){
			   	$iv_comple_cod = "A";
			   }
			   if(substr($dados1,77,1) == "2"){
			   	$iv_comple_cod = "B";
			   }
			   if(substr($dados1,77,1) == "3"){
			   	$iv_comple_cod = "C";
			   }
			   if(substr($dados1,77,1) == "4"){
			   	$iv_comple_cod = "D";
			   }
			   if(substr($dados1,77,1) == "5"){
			   	$iv_comple_cod = "E";
			   }
			
				$ivDATA_VENCTO = substr($dados1,110,7);
				$dv1           = substr($ivDATA_VENCTO,0,2);
				$dv2           = substr($ivDATA_VENCTO,2,2);
				$dv3           = "20".substr($ivDATA_VENCTO,4,2);
				$ivDATA_VENCTO = $dv1+"/"+$dv2+"/"+$dv3;
				$ivMESANO      = substr($dados1,78,2)."/".$dv3;
				if (substr($dados1,78,2) == "02"){
					$iv_Vencto_mes = "28/".substr($dados1,78,2)."/".$dv3;
				}else{
				  	$iv_Vencto_mes = "30/".substr($dados1,78,2)."/".$dv3;
				}
	/*			  
				echo "i_IDENTIFICACAO = ".substr($dados1,31,7)."<br>";
				echo "ivCOD_soc		  = ".substr($dados1,70,7).$iv_comple_cod."<br>";
				echo "iv_NU 		  = ".substr($dados1,77,1)."<br>";
				echo "iv_MES_PG 	  = ".substr($dados1,78,2)."<br>";
				echo "ivDATA_VENCTO   = ".substr($dados1,110,7)."<br>";
				echo "ivVALOR 		  = ".substr($dados1,146,19)."<br>";
				echo "ivAGENCIA 	  = ".substr($dados1,165,4)."<br>";
				echo "ivDATA_PAGTO    = ".substr($dados1,175,6)."<br>";
				echo "Vencimento      = ".$iv_Vencto_mes."<br>";
				echo "Mes e Ano       = ".$ivMESANO."<br>";
				echo $dados54."fim da linha  ASSOCIADOS<br><br><br>";
	*/
			    $isVALOR       = substr($dados1,146,19);
			    $isV1          = substr($isVALOR,17,2);
			    $isV2          = substr($isVALOR,0,17);
			    $isVALOR       = $isV2.".".$isV1;
	
	
	            $i_cod    = substr($dados1,70,7);
	            $Edit1    = intval(substr($dados1,70,7)).$iv_comple_cod;
	            $data_sys = date("d/m/Y");
	            $Edit2    = $isVALOR;
	            $Edit3    = $iv_Vencto_mes;
	            $agen_sys = substr($dados1,165,4);
	            $inst_sys = "MENSALIDADE";
	            $Edit4    = $ivMESANO;
	            $Edit5    = substr($dados1,78,2);
	            $Edit6    = $dv3;
	            
	            if ($Edit2 == '10.00'){
	            	
	            	
	            	$inst_sys = "MENSA. TIETE";
	            	
		            // Atualiza Mensalidade Clube Tiete
					$consulta_t = "INSERT INTO aberto_soc_tiete (COD,
						                                       CODP,
															   DATA,
															   TOTAL,
															   PAGTO,
															   VENCTO,
															   AGENCIA,
															   DAT_BAI,
															   DESCRICAO,
															   VENC_DATA,
															   MESANO,
															   MES,
															   ANO)
															
					                           VALUES ('$i_cod',
											           '$Edit1',
													   '$data_sys',
													   '$Edit2',
													   '$data_sys',
													   '$Edit3',
													   '$agen_sys',
													   '$data_sys',
													   '$inst_sys',
													   '$Edit3',
													   '$Edit4',
													   '$Edit5',
													   '$Edit6')";
					
					@mysql_query($consulta_t, $link);
	            	
	            }else{
	            	

	            $consulta_mens_p  = "SELECT * FROM aberto_soc WHERE CODP = '$Edit1' AND TOTAL = '$Edit2' AND MESANO = '$Edit4'";
						
				$resultado_mens_p = @mysql_query($consulta_mens_p);
						
				$row_mens_p = @mysql_fetch_array($resultado_mens_p);
						
				$conf_id_cod     = @$row_mens_p["id"];

                if (!empty($conf_id_cod)){

                    // Ja Cadastrado
                    $duplic++;
                    
	            }else{
		            // Atualiza Arquivo Aberto_soc
					$consulta = "INSERT INTO aberto_soc (COD,
					                                     CODP,
														 DATA,
														 TOTAL,
														 PAGTO,
														 VENCTO,
														 AGENCIA,
														 DAT_BAI,
														 DESCRICAO,
														 VENC_DATA,
														 MESANO,
														 MES,
														 ANO)
															
					                           VALUES ('$i_cod',
											           '$Edit1',
													   '$data_sys',
													   '$Edit2',
													   '$data_sys',
													   '$Edit3',
													   '$agen_sys',
													   '$data_sys',
													   '$inst_sys',
													   '$Edit3',
													   '$Edit4',
													   '$Edit5',
													   '$Edit6')";
					
					@mysql_query($consulta, $link);
				}	
	           }
				
			}
			// Pagamentos de Conf/Assist
			if(substr($dados1,31,7) == "284723 "){
			    $contri_sun++;
				$cont_rec++;
				 
				// Achar Vencimento
				$var_dias = "";
				$var_dia  = 07;
				$var_mes  = 10;
				$var_ano  =1997;
				$data_fim = mktime(24*$var_dias, 0, 0, $var_mes, $var_dia, $var_ano);
				$data_ven = date('d/m/Y', $data_fim); 
				 
				 
				 
				$iv_DATA_PACTO = substr($dados1,175,6);
				$dt1           = substr($iv_DATA_PACTO,0,2);
				$dt2           = substr($iv_DATA_PACTO,2,2);
				$dt3           = "20".substr($iv_DATA_PACTO,4,2);
				$ivDATA_VENCTO = $dt1."/".$dt2."/".$dt3;
				$ivMESANO      = "  /  ";
				$iv_comple_cod = " ";
			
			    $ivVALOR       = substr($dados1,146,19);
			    $ivV1          = substr($ivVALOR,17,2);
			    $ivV2          = substr($ivVALOR,0,17);
			    $ivVALOR       = $ivV2.".".$ivV1;
	/*		
				echo "i_IDENTIFICACAO = ".substr($dados1,31,7)."<br>";
				echo "ivCOD_edif	  = ".substr($dados1,68,5)."<br>";
				echo "iv_NU 		  = ".substr($dados1,77,1)."<br>";
				echo "iv_MES_PG 	  = ".substr($dados1,78,2)."<br>";
				echo "ivDATA_VENCTO   = ".substr($dados1,110,7)."<br>";
				echo "ivVALOR 		  = ".substr($dados1,146,19)."<br>";
				echo "ivAGENCIA 	  = ".substr($dados1,165,4)."<br>";
				echo "ivDATA_PAGTO    = ".substr($dados1,175,6)."<br>";
				echo "Vencimento      = ".$ivDATA_VENCTO."<br>";
				echo "Valor           = ".$ivVALOR."<br>";
			
			    echo $dados54."fim da linha CONTRIBUICAO<br><br><br>";
	*/
	            $Edit1    = intval(substr($dados1,68,5));
	            $Edit2    = $tipo_vencto;
	            $Edit3    = $ivVALOR;
	            $Edit4    = substr($dados1,165,4);
	            $Edit5    = $tipo_contri;
	            $Edit6    = $ivDATA_VENCTO;
	            $data_sys = date("d/m/Y");
	            //$Edit7    = date($tipo_vencto);
	            

	            $consulta_sind_p  = "SELECT * FROM conf WHERE CONFCOD = '$Edit1' AND TOTAL = '$Edit3' AND VENCTO = '$Edit2'";
						
				$resultado_sind_p = @mysql_query($consulta_sind_p);
						
				$row_sind_p = @mysql_fetch_array($resultado_sind_p);
						
				$conf_id_cod     = @$row_sind_p["id"];

                if (!empty($conf_id_cod)){


                    // Ja Cadastrado
                    $duplic++;
                        	
                    // Grava Informacoes na Tabela
					$consulta1_d = "INSERT INTO conf_duplic    (CONFCOD,
					                                     		VENCTO,
														 		TOTAL,
														 		AGENCIA,
														 		DESCRICAO,
														 		DAT_BAI,
					                                     		DATA,
					                                     		PAGTO)
															
					                           VALUES ('$Edit1',
											           '$Edit2',
													   '$Edit3',
													   '$Edit4',
													   '$Edit5',
													   '$data_sys',
													   '$data_sys',
													   '$Edit6')";
					
					@mysql_query($consulta1_d, $link);

	            
	            }else{
	            	
	            	
					$consulta1 = "INSERT INTO conf      (CONFCOD,
					                                     VENCTO,
														 TOTAL,
														 AGENCIA,
														 DESCRICAO,
														 DAT_BAI,
					                                     DATA,
					                                     PAGTO)
															
					                           VALUES ('$Edit1',
											           '$Edit2',
													   '$Edit3',
													   '$Edit4',
													   '$Edit5',
													   '$data_sys',
													   '$data_sys',
													   '$Edit6')";
					
					@mysql_query($consulta1, $link)
					
	                or 
							die("
							     <br>
							     <br>
							     
								 <div align=center>
							
							     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
							     <tr>
							     <td>
							     <font face=arial><b>*** Falha ao exportar Arquivo !!! ***</b>
							     <table align=center>
							     <form method='POST' action='../avaleht.php?servletjs2=20$$20'>
							     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
							     </form> 
							     </table>
							     </td>
							     </tr>
							     </table>
							     </div>");				
	            	
	            	
	            	
	            }
			
			}
	}	
	}
}

if ($recebe == 1){  // Retorno Caixa Economica Nossa Caixa

//    echo $tipo_vencto."<br>";
//    echo $tipo_vencto2."<br>";
//    echo $tipo_contri."<br>";
//    echo "entrei aqui na Sindical -- Caixa Economica --"."<br>";
//    break;

    $cnpj_achado = 0;
    $controle_achado = 0;
    $achados_1 = 0;
    
	for ($iv_t = 0; $iv_t < 99999; $iv_t++){
		
	    if($iv_t < 10){
	    	$i_conp == "0000";
	    }
	    if($iv_t >= 10 and $iv_t < 100){
	    	$i_conp == "000";
	    }
	    if($iv_t >= 100 and $iv_t < 1000){
	    	$i_conp == "0";
	    }
	    if($iv_t >= 1000 and $iv_t < 10000){
	    	$i_conp == "";
	    }
	    $i_sequenc = $i_conp.$iv_t;
	
		//$linha = @file("retorno/caixa/caixa1/T50".trim($i_sequenc).".RET");
        $linha = @file("retorno/caixa2/T50".trim($i_sequenc).".RET");

        //echo "<hr>";
        //echo "T50".trim($i_sequenc).".RET"."<br><hr>";		
/*		

		T1000001
		T1000010
		T1000100
		T1001000
		T1010000
*/		
		$total = count($linha);
		
		for ($si = 0; $si < $total; $si++ ){
			
			list($dados1,$dados2,$dados3,$dados4,$dados5,$dados6,$dados7,$dados8,) = explode("\t", $linha[$si]);

/*
            if (!empty($dados1)){ echo "d 1 = ".$dados1."<br><br>"; }
            if (!empty($dados2)){ echo "d 2 = ".$dados2."<br><br>"; }
            if (!empty($dados3)){ echo "d 3 = ".$dados3."<br><br>"; }
            if (!empty($dados4)){ echo "d 4 = ".$dados4."<br><br>"; }
            if (!empty($dados5)){ echo "d 5 = ".$dados5."<br><br>"; }
            if (!empty($dados6)){ echo "d 6 = ".$dados6."<br><br>"; }
*/            
			$indt_lin = substr($dados1,13,1);

	        if ($indt_lin == "T"){	
	        	$cont_rec++;
				// Manipula Dados
				
				// CNPJ
				$cnpj_sind1    = substr($dados1,133,15);
				$cnp_2         = substr($dados1,136,2);
				$cnp_3         = substr($dados1,138,3);
				$cnp_4         = substr($dados1,141,3);
				$cnp_5         = substr($dados1,144,4);
				$cod_sind      = substr($dados1,39,5);
				
	            $cnpj_sind  = $cnp_2.".".$cnp_3.".".$cnp_4."/".$cnp_5;
	            
	            
	            $wcgc       = $cnp_2.$cnp_3.$cnp_4.$cnp_5;
	
				$v = preg_replace ('/[^0-9]/', '', $cnpj_sind);
				
				$ok = false;
				if (strlen($v) == 9) {
				  $novo_cnpj = cpf_calc($v);
				  $ok = true;
				}
				if (strlen($v) == 12) {
				  $novo_cnpj = cnpj_calc($v);
				  $ok = true;
				}
	
	
	            // Vencimento
	            $venc_sind = substr($dados1,73,8);
	            $_dia      = substr($dados1,73,2);
	            $_mes      = substr($dados1,75,2);
	            $_ano      = substr($dados1,77,4);
	            
	            $venc_sind = trim($_dia)."/".trim($_mes)."/".trim($_ano);

				$i_vencto_n    = substr($dados1,71,10);
				
            }
           
		        if ($indt_lin == "U"){
		        	
		        	$i_valor1   = substr($dados1,80,12);
					$i_valor2   = substr($i_valor1,0,10).".".substr($i_valor1,10,2);
					$i_valor_2f = floatval($i_valor2);
					
					$i_valor_tes1 = (int)$i_valor2;
					$i_valor_tes2 = number_format($i_valor2, 2, '.', '');
					$i_valor_tes3 = floatval($i_valor2);
					
				
					$i_credi1   = substr($dados1,95,12);
					$i_credi2   = substr($i_credi1,0,10).".".substr($i_credi1,10,2); 
                    $i_credi_2f = floatval($i_credi2);

                    $i_valor_tes4 = floatval($i_credi2);
                    
                    
					$i_locpag = substr($dados1,180,18);
					
					$i_data_credito = substr($dados1,146,10); 

                    $i_valor_n     = substr($dados1,80,12);
					
		            $_dia_pag      = substr($dados1,137,2);
		            $_mes_pag      = substr($dados1,139,2);
		            $_ano_pag      = substr($dados1,141,4);
		            
		            $i_data_pag_n = trim($_dia_pag)."/".trim($_mes_pag)."/".trim($_ano_pag);

					
		            $_dia_cre       = substr($dados1,145,2);
		            $_mes_cre       = substr($dados1,147,2);
		            $_ano_cre       = substr($dados1,149,4);
		            
		             $i_data_cred_n = trim($_dia_cre)."/".trim($_mes_cre)."/".trim($_ano_cre);

			         $data_b   = date("d/m/Y");
					 
                     $novo_cnpj3  = limpaCPF_CNPJ($novo_cnpj); 
					 $novo_cnpj3  = substr($novo_cnpj3,0,12);                     
                     $testa_zeros = substr($novo_cnpj3,0,5); 
					 If ($testa_zeros == "00000"){
					 	
					 	 $novo_cnpj2 = $novo_cnpj3;
					 	 
					 }else{
					 	 $novo_cnpj2 = limpaCPF_CNPJ($novo_cnpj);
					 }
                     
					 // Cria Arquivos de Baixas  
					 /*
                     $consulta_novo4 = "INSERT INTO gerador_baixa_conf ( CONTROLE,
					                                                    VENCIMENTO,
							                                            PAGO,
																		CREDI,
																		LPAGO,
																		DATBAI,
																		DAT_PAG,
																		DAT_CRE)
																	
							                           VALUES ('$novo_cnpj2',
													           '$venc_sind',
															   '$i_valor_2f',
															   '$i_credi_2f',
															   '$i_locpag',
															   '$data_b',
															   '$i_data_pag_n',
															   '$i_data_cred_n')";
	
					*/		
					//@mysql_query($consulta_novo4, $link);

// Gerar Relatorio Codigo Sindical

echo "Novo_cnpj ".$novo_cnpj2."<br>";
echo "Vencimento ".$venc_sind."<br>";
echo "Valor ".$i_valor_2f."<br>";
echo "Credi ".$i_credi_2f."<br>";
echo "Local Pagto ".$i_locpag."<br>";
echo "data ".$data_b."<br>";
echo "data pag ".$i_data_pag_n."<br>";
echo "data Cred ".$i_data_cred_n."<br>";
echo "Codsind ".$cod_sind."<br><br>";


                     $consulta_novo4 = "INSERT INTO gerador_baixa_conf_rel3 (CONTROLE,
					                                                        VENCIMENTO,
							                                                PAGO,
																		    CREDI,
																		 	LPAGO,
																			DATBAI,
																			DAT_PAG,
																			DAT_CRE,
																			CODSIND)
																	
							                           VALUES ('$novo_cnpj2',
													           '$venc_sind',
															   '$i_valor_2f',
															   '$i_credi_2f',
															   '$i_locpag',
															   '$data_b',
															   '$i_data_pag_n',
															   '$i_data_cred_n',
															   '$cod_sind')";
	
							
					@mysql_query($consulta_novo4, $link) or die("Não foi possivel salvar"  . mysql_error() . "");
					



// Fim do Relatorio Codigo Sindical 



                    $controle_consul = (int)$novo_cnpj2;
                    // Consulta e Atualiza Baixas Gerador_conf
			        $consulta_sind_px  = "SELECT * FROM `gerador_conf` WHERE  `controle` = $controle_consul AND VENCTO = '$venc_sind'";

					$resultado_sind_px = @mysql_query($consulta_sind_px);
						
					$row_sind_px = @mysql_fetch_array($resultado_sind_px);
						
					$sind_id_codx     = @$row_sind_px['controle'];
					$sind_id_codigo   = @$row_sind_px['COD'];
					$sind_id_nome     = @$row_sind_px['NOME'];
					$sind_id_cnpj     = @$row_sind_px['CNPJ'];
					$sind_id_bairro   = @$row_sind_px['BAIRRO'];
					$sind_id_adm      = @$row_sind_px['ADM'];
					

					if (!empty($sind_id_codx)){
						
						/*
					    echo "Controle Busca..".$controle_consul."<br>";
					    echo "CONTROLE..".$sind_id_codx."<br>";
					    echo "Codigo... ".$sind_id_codigo."<br>";
					    echo "Nome......".$sind_id_nome."<br>";
					    echo "CNPJ......".$sind_id_cnpj."<br>";
					    echo "Bairro....".$sind_id_bairro."<br>";
					    echo "ADM.......".$sind_id_adm."<br>";
					    echo "Valor.....".$i_valor_2f."<br><hr>";
					    */
					    $achados_1 = $achados_1 + 1; 
						//exit;	
					}



                    if (!empty($sind_id_codx)){
                    	
                    	
						$so_qt_nov = $QTD + 1;
						$date_3x   = date('d/m/Y');
						
						$consulta_upd = "UPDATE gerador_conf  SET DATA_BAI	  = '$date_3x',
					                                              VALOR 	  = '$i_valor_2f',
					                                              VALCRED     = '$i_credi_2f',
																  SITUACAO    = 'PAGO' WHERE controle = $controle_consul  AND VENCTO = '$venc_sind'";
						//@mysql_query($consulta_upd, $link);
                    	
                        	//  COD = '$edif_cgc' AND VENCTO = '$venc_sind'  AND TIPO_CONT = '$tipo_cont_1'
                        	//break;
                        	//echo 'oi aqui<br>';
                        	
                    }else{

                    	//echo 'nao achei<br>';
                    }	
                    // Fim Atualizacao Gerador_conf
			        
                    /* 
					if (!empty($id_cgc)){
						
						if(strlen($emp_edif)<=0){
						  $emp_edif   = 0; 	
						}


	                    $consulta_sind_p  = "SELECT * FROM sindical WHERE SINDCOD = '$edif_cgc' AND TOTAL  = '$i_valor' AND VENCTO = '$venc_sind'";
					 
						$resultado_sind_p = @mysql_query($consulta_sind_p);
						
						$row_sind_p = @mysql_fetch_array($resultado_sind_p);
						
						$sind_id_cod     = @$row_sind_p["id"];

                        if (!empty($sind_id_cod)){
                        	
                        	// Ja Cadastrado
                        	$duplic++;
                        	
                        			                    // Grava Informacoes na Tabela
							$consulta_cgc1 = "INSERT INTO sindical_duplica ( SINDCOD,
							                                                TOTAL,
																			VENCTO,
																			EXER,
																			DESCRICAO,
																			PAGTO,
									                                        DATA,
																			EMPR_E,
																			LOCALP,
																			VALOR_CRED)
																	
							                           VALUES ('$edif_cgc',
													           '$i_valor',
															   '$venc_sind',
															   '$_ano',
															   'SINDICAL',
															   '$data_b',
															   '$data_b',
															   '$emp_edif',
															   '$i_locpag',
															   '$i_credi')";
	
							
							 //@mysql_query($consulta_cgc1, $link);
                        	
                        	
                        }else{
                        	
		                    // Grava Informacoes na Tabela
							$consulta_cgc2 = "INSERT INTO sindical  (SINDCOD,
							                                        TOTAL,
																	VENCTO,
																	EXER,
																	DESCRICAO,
																	PAGTO,
							                                        DATA,
																	EMPR_E,
																	LOCALP,
																	VALOR_CRED)
																	
							                           VALUES ('$edif_cgc',
													           '$i_valor',
															   '$venc_sind',
															   '$_ano',
															   'SINDICAL',
															   '$data_b',
															   '$data_b',
															   '$emp_edif',
															   '$i_locpag',
															   '$i_credi')";
	
							/*
							 @mysql_query($consulta_cgc2, $link)
							              or 
							
							 die("
							      <br>
							      <br>
							     
							 	  <div align=center>
							
							      <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
							      <tr>
							      <td>
							      <font face=arial><b>*** Falha ao exportar Arquivo !!! ***</b>
							      <table align=center>
							      <form method='POST' action='../avaleht.php?servletjs2=20$$20'>
							      <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
							      </form> 
							      </table>
							      </td>
							      </tr>
							      </table>
							      </div>");
							     
						 }    
	
	                }else{
	                	 // Grava arquivo CNPJ nao cadastrado
	                	
	                	 $consulta_sav = "INSERT INTO sind_cnpj_nao (CNPJ,
											                         VALOR,
		                                                             VENCIMENTO,
											                         EXER,
											                         DESCRICAO,
											                         PAGTO,
											                         DATA,
											                         NUMERO,
																	 LOCAL,
																	 VALOR_CRED)
		                                           VALUES
		                                                  ('$novo_cnpj',
												           '$i_valor',
														   '$venc_sind',
														   '$_ano',
														   'SINDICAL',
														   '$data_b',
														   '$data_b',
														   '$emp_edif',
														   '$i_locpag',
														   '$i_credi')";
		
		               //@mysql_query($consulta_sav, $link);

	                	
	                	
	                }
	                */
		        }	

			
        }
        
    }
}


//echo "<br>";
//echo "Numero de Registros..:"  . $cont_rec . "<br>";
//echo "Atualizados        ..:"  . $achados_1 . "<br>";
$soma_fi_1 = $cont_rec - $achados_1;
//echo "Erros              ..:"  . $soma_fi_1."<br>";


    
if ($recebe == 3){  // Retorno Bradesco


//    echo $tipo_vencto."<br>";
//    echo $tipo_vencto2."<br>";
//    echo $tipo_contri."<br>";
//    echo "entrei aqui -- Bradesco -- ";
//    break;

}
/**
 * 
 * Renomeia Arquivos ja processados
 * 
**/

function Retira_Hifem($str){
if(strlen($str) > 0) {
//$str=trim(str_replace("-","",$str)); 
$str=trim(str_replace("RET",date("d-m-Y"),$str));
return $str;
}
}


function Retira_Hifem2($str){
if(strlen($str) > 0) {
//$str=trim(str_replace("-","",$str)); 
$str=trim(str_replace("RET",date("d-m-Y"),$str));
return $str;
}
}


if ($recebe == 2){
$dir = "txt";

if ($handle = opendir($dir)) {
$contador = 0;
while (false !== ($file = readdir($handle))) {
@rename("txt/".$file."","txt/".Retira_Hifem($file).$contador."");

$contador++;
}
$total = $contador - 2 ;
//echo "<center><b>Foram Tratados(s) ".$total." arquivos.</b></center>";
}
}


if ($recebe == 1){
$dir = "retorno/caixa";

if ($handle = opendir($dir)) {
$contador = 0;
while (false !== ($file = readdir($handle))) {
@rename("retorno/caixa/".$file."","retorno/caixa".Retira_Hifem2($file).$contador."");

$contador++;
}
$total = $contador - 2 ;
//echo "<center><b>Foram Tratados(s) ".$total." arquivos.</b></center>";
}
}

closedir($handle);


?>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>
<body>

<style type=text/css>

body { background-image: url(<?='../'.$logo_sis;?>);
       background-attachment: fixed }

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
-->
</style> 

</body>

<div align=center>




<table width="336" height="202"  align="center" border="15" bgcolor="#FFFFFF" bordercolor ='<?=$color_bor;?>'>

<td align="center"><br />
<img src="../imagens/exclam.gif" width="100" height="100" align="center"/><br />
<img src="../imagens/px1.gif" width="10" height="10" align="center"/><br />
<font color="#336699" face=Verdana  size="4">
<b>Arquivos do Banco<br>Tratados com Susseso<br/></font><?=$tipo_contri;?><br />
<font size="4">No Reg.:&nbsp;&nbsp;&nbsp;<?=$cont_rec;?><br />
<b>Arquivos Atualizados.:&nbsp;&nbsp;&nbsp;<?php echo $achados_1; ?></b><br />
<b>Arquivos com <font color="#CC0000"> Erro.:&nbsp;&nbsp;&nbsp;<?php echo $soma_fi_1; ?></font></b><br />



<?
if ($recebe == 2){
?>

	<br />
	Mensalidades:&nbsp;&nbsp;&nbsp;<?=$mensa_sun;?><br />
	Contribuição:&nbsp;&nbsp;&nbsp;<?=$contri_sun;?><br />
	Reg. Duplicados:&nbsp;&nbsp;&nbsp;<?=$duplic;?>

<?
}else{
?>

	<br />
	Reg. Duplicados:&nbsp;&nbsp;&nbsp;<?=$duplic;?>

<?
}
?>

</b></font>

<br/>
<div align="center">
          <table border=0  align=center>
          <tr align=center colspan=2><br /> 

	      <a href="../avaleht.php?servletjs2=20$$20">
	      <img alt="sair" src="../imagens/botaoazul25.PNG" border="0"></a>
	      </tr>
	      </table>
</div>
</td>
</table>
</div>

</html>

<?



function cpf_calc ($cpf) {
  if (strlen($cpf) != 9) {
    return "xxx.xxx.xxx-xx";
  }
  for ($vez = 0; $vez < 2; $vez++) {
    $mult = 10 + $vez;
    $soma = 0;
    for ($indice = 0; $indice < 9; $indice++) {
      $soma += $mult * intval(substr($cpf,$indice,1));
      $mult--;
    }
    if ($vez) {
      $soma += $digito[0] * 2;
    }
    $valint = intval($soma/11) * 11;
    $res = $soma - $valint;
    if ($res <= 1) {
      $digito[$vez] = 0;
    } else {
      $digito[$vez] = 11 - $res;
    }
  }
  return substr($cpf,0,3).".".substr($cpf,3,3).".".substr($cpf,6).
    "-".$digito[0].$digito[1]; 
}

function cnpj_calc ($cnpj) {
  if (strlen($cnpj) != 12) {
    return "xx.xxx.xxx/xxxx-xx";
  }
  for ($vez = 0; $vez < 2; $vez++) {
    $mult = 5 + $vez;
    $soma = 0;
    for ($indice = 0; $indice < 12; $indice++) {
      $soma += $mult * intval(substr($cnpj,$indice,1));
      $mult--;
      if ($mult == 1) { $mult = 9; }
    }
    if ($vez) {
      $soma += $digito[0] * 2;
    }
    $valint = intval($soma/11) * 11;
    $res = $soma - $valint;
    if ($res <= 1) {
      $digito[$vez] = 0;
    } else {
      $digito[$vez] = 11 - $res;
    }
  }
  return substr($cnpj,0,2).".".substr($cnpj,2,3).".".substr($cnpj,5,3).
    "/".substr($cnpj,8,4)."-".$digito[0].$digito[1]; 
}

function limpaCPF_CNPJ($valor){
 $valor = trim($valor);
 $valor = str_replace(".", "", $valor);
 $valor = str_replace(",", "", $valor);
 $valor = str_replace("-", "", $valor);
 $valor = str_replace("/", "", $valor);
 return $valor;
}



function validaCnpj($cnpj)
{
    $cnpj = trim($cnpj);
    $soma = 0;
    $multiplicador = 0;
    $multiplo = 0;
   
   
    # [^0-9]: RETIRA TUDO QUE NÃO É NUMÉRICO,  "^" ISTO NEGA A SUBSTITUIÇÃO, OU SEJA, SUBSTITUA TUDO QUE FOR DIFERENTE DE 0-9 POR "";
    $cnpj = preg_replace('/[^0-9]/', '', $cnpj);
   
    if(empty($cnpj) || strlen($cnpj) != 14) 
        return FALSE;

    # VERIFICAÇÃO DE VALORES REPETIDOS NO CNPJ DE 0 A 9 (EX. '00000000000000')    
    for($i = 0; $i <= 9; $i++)
    {
        $repetidos = str_pad('', 14, $i);
       
        if($cnpj === $repetidos)
            return FALSE;
    }
   
    # PEGA A PRIMEIRA PARTE DO CNPJ, SEM OS DÍGITOS VERIFICADORES    
 $parte1 = substr($cnpj, 0, 12);   
   
    # INVERTE A 1ª PARTE DO CNPJ PARA CONTINUAR A VALIDAÇÃO    $parte1_invertida = strrev($parte1);
   
    # PERCORRENDO A PARTE INVERTIDA PARA OBTER O FATOR DE CALCULO DO 1º DÍGITO VERIFICADOR
    for ($i = 0; $i <= 11; $i++)
    {
        $multiplicador = ($i == 0) || ($i == 8) ? 2 : $multiplicador;

        $multiplo = ($parte1_invertida[$i] * $multiplicador);

        $soma += $multiplo;
       
        $multiplicador++;
    }
   
    # OBTENDO O 1º DÍGITO VERIFICADOR        
    $rest = $soma % 11;
   
    $dv1 = ($rest == 0 || $rest == 1) ? 0 : 11 - $rest;
       
    # PEGA A PRIMEIRA PARTE DO CNPJ CONCATENANDO COM O 1º DÍGITO OBTIDO 
    $parte1 .= $dv1;
   
    # MAIS UMA VEZ INVERTE A 1ª PARTE DO CNPJ PARA CONTINUAR A VALIDAÇÃO 
    $parte1_invertida = strrev($parte1);
       
    $soma = 0;
   
    # MAIS UMA VEZ PERCORRE A PARTE INVERTIDA PARA OBTER O FATOR DE CALCULO DO 2º DÍGITO VERIFICADOR       
    for ($i = 0; $i <= 12; $i++)
    {
        $multiplicador = ($i == 0) || ($i == 8) ? 2 : $multiplicador;

        $multiplo = ($parte1_invertida[$i] * $multiplicador);

        $soma += $multiplo;
       
        $multiplicador++;
    }
       
    # OBTENDO O 2º DÍGITO VERIFICADOR
    $rest = $soma % 11;
   
    $dv2 = ($rest == 0 || $rest == 1) ? 0 : 11 - $rest;
   
    # AO FINAL COMPARA SE OS DÍGITOS OBTIDOS SÃO IGUAIS AOS INFORMADOS (OU A SEGUNDA PARTE DO CNPJ)   
    return ($dv1 == $cnpj[12] && $dv2 == $cnpj[13]) ? TRUE : FALSE;
    //echo ($dv1 == $cnpj[12] && $dv2 == $cnpj[13]) ? 'TRUE' : 'FALSE';} 
}    
?>