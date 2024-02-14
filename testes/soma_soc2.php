<?php

/**
 * @author holodek
 * @copyright 2007
 */

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// Limpa Tabel Etiquetas_socios
$consulta0 = "TRUNCATE TABLE `etiquetas_socios`";

@mysql_query($consulta0, $link);


$consulta  = "SELECT * FROM socios WHERE id >= 1";
		
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

		
		     while ($linha = mysql_fetch_array($resultado))
		       {
		
				    $id_conf   = $linha["id"];
					$cod       = $linha["CODP"];
					$nome      = $linha["NOMEASSOC"];
					$rua       = trim(strtoupper($linha["RUA"]));
					$endereco  = trim(strtoupper($linha["ENDRESID"]));
					$numero    = trim(strtoupper($linha["NUMERO"]));
					$cep       = trim(strtoupper($linha["CEPRES"]));
					$bairro    = trim(strtoupper($linha["BAIRRORES"]));
					$cidade    = trim(strtoupper($linha["CIDADERES"]));
					$rg        = trim(strtoupper($linha["RGASSOC"]));
					$cpf       = trim(strtoupper($linha["CPF"]));
					
					$categoria = $linha["CATEGORIA"];
					$inscricao = $linha["DATINSC"];
					$mes_i     = $linha["MES"];
					$ano_i     = $linha["ANO"];


                   // Pesquiza quantidade de mensalidades devedora
                    $sql  = "SELECT * FROM aberto_soc WHERE CODP = '$cod' ORDER BY ANO DES, MES DES";	
	
	                $resultado5 = @mysql_query($sql);

                    $row5 = @mysql_fetch_array($resultado5);

                    $id          = @$row5["id"];
					$mes_aber    = @$row5["MES"];
					$ano_aber    = @$row5["ANO"];

					if (!empty($id)){
						$mes_x = $mes_aber;
						$ano_x = $ano_aber;
					}else{
						$mes_x = $mes_i;
						$ano_x = $ano_i;
					}	


					/*
					  ----------------------------------------
					  Funcao para Verificar se o Socio 
					  atingiu o tempo de ser Remido e
					  verificar se o pagamento do Socio
					  esta em Dia...
					  ----------------------------------------
					*/
					
					$anosoc = substr("$inscricao", 6, 4);
					
					$hoje   = date("Y");
					
					$v_FIM = $hoje - $anosoc;
					
					if ($v_FIM >= 20)
					{
						
						if (($hoje - $ano_x) >= 1 ){
							
							
						}else{
						
						  $categoria = "REMIDO";	
						}
							
					}else{
						
					
					/* Variaveis do Sistema */
					$qtd          = 0;
					$qtd_fim      = 0;
					$valor_3      = 0;
					$ins_cri_sa   = $inscricao; 
					$mes_inicio   = $mes_x;
					$ano_inicio   = $ano_x;
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
							
							if ($qtd_fim != 0){
								echo "Socio atrazado  ".$qtd_fim." Mensalidades atrasada num total de R$ ".$valor_3.",00 Reais !!!<br>";
							?>	
							
							<script language='JavaScript'>
							        // alert("Socio ATRASADO COM PAGAMENTO, acertar no CAIXA ! \n Quantidade de <?=$qtd_fim;?> Mensalidades atrasada num total de \n R$ <?=$valor_3;?>,00 Reais !!!");
							</script>
							<?
							}else{
								
								 // Grava Registro na Etiqueta
								 if ($categoria == "C"){
								 	
								     // Atualizar Etiquetas
													
								     $consulta9  = "INSERT INTO etiquetas_socios SELECT * FROM socios WHERE `CATEGORIA`= 'C' AND `MES` >= 4 AND `ANO` >= 2009";

									
								     @mysql_query($consulta9, $link);
								 	
								 }
								 
								
							}
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
						
						$consulta2i = "DELETE FROM etiquetas_socios WHERE CODP = '$cod'";

                        @mysql_query($consulta2i, $link);

						
				
					}
					
					$consulta4  = "SELECT * FROM oposicao3 Where CPF = '$cpf'";
					
					$resultado4 = @mysql_query($consulta4);
					
					$row4 = mysql_fetch_array($resultado4);
					
					$cod_opo = @$row4["COD"];
					$cpf_opo = @$row4["CPF"];
					
					if ($cod_opo != 0){

						$categoria = "O";
						// Excluir
						
						$consulta2w = "DELETE FROM etiquetas_socios WHERE CODP = '$cod'";

                        @mysql_query($consulta2w, $link);
						
					}

}

$total_1 = $contr_0+$desist+$cat_fale+$cat_apos+$cat_dire+$cat_remi+$cat_isen+$cat_opos;
echo "Total de Contribuintes = ".$contr_0."<br>";
echo "Comtribuintes em Dia   = ".$emdia."<br>";
echo "Desistentes            = ".$desist."<br>";
echo "Falecido               = ".$cat_fale."<br>";
echo "Aposentado             = ".$cat_apos."<br>";
echo "Diretor                = ".$cat_dire."<br>";
echo "Remido                 = ".$cat_remi."<br>";
echo "Isento                 = ".$cat_isen."<br>";
echo "Oposicao               = ".$cat_opos."<br><br>";
echo "Total                  = ".$total_1;

?>