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

                    // Verifica se Socios ja e Remido
					$anosoc = substr("$inscricao", 6, 4);
					
					$hoje   = date("Y");
					
					$v_FIM = $hoje - $anosoc;
					
					if ($v_FIM >= 20)
					{
						
						if (($hoje - $ano_i) >= 1 ){
							
							
						}else{
						
						  $categoria = "R";	
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
				
					}
					
					$consulta4  = "SELECT * FROM oposicao3 Where CPF = '$cpf'";
					
					$resultado4 = @mysql_query($consulta4);
					
					$row4 = mysql_fetch_array($resultado4);
					
					$cod_opo = @$row4["COD"];
					$cpf_opo = @$row4["CPF"];
					
					if ($cod_opo != 0){

						$categoria = "O";
						
					}

					$mes_x     = 0;
					$ano_x     = 0;
					$qtd_fim   = 0;
					$valor_3   = "0.00";
	
                    // Pesquiza quantidade de mensalidades devedora
                    $sql  = "SELECT * FROM aberto_soc WHERE CODP = '$cod' ORDER BY ANO DES, MES DES";	
	
	                $resultado5 = @mysql_query($sql);

                    $row5 = @mysql_fetch_array($resultado5);

                    $id          = @$row5["id"];
					$mes_aber    = @$row5["MES"];
					$ano_aber    = @$row5["ANO"];

					if ($categoria == "F")
					{
					    $cat_fale++;	
					}
					if ($categoria == "A")
					{

                    // Inicio Calculo Aposentado

					    $cat_apos++;
						
						if ($categoria == "A"){
						     $contr_0++;
							if (!empty($id)){
							   $mes_x = $mes_aber;
							   $ano_x = $ano_aber;
							}else{
							   $mes_x = $mes_i;
							   $ano_x = $ano_i;
							}	
	
							$qtd        = 0;
							$qtd_fim    = 0;
							$valor_3    = 0;
							$mes_inicio = $mes_x;
							$ano_inicio = $ano_x;
							$mes_hj     = intval(date("m"));
							$ano_hj     = intval(date("Y"));
							
							//echo "Mes e ano pagos = ".trim($mes_inicio)."/".trim($ano_inicio)."<br><br>";
							
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
							if ($qtd > 0)
							{
							   $qtd_fim = $qtd - 1;
							   $valor_3 = $qtd_fim * 8.00;
							}

						
							if ($qtd_fim <= 4 AND $ano_i == intval(date('Y')))
							{
								$emdia++;
								// Atualizar Etiquetas
													
								$consulta9  = "INSERT INTO etiquetas_socios SELECT * FROM socios WHERE CODP = '$cod'";
									
								@mysql_query($consulta9, $link);
							
							}

							
					      }

                    // Fim Calculo Aposentado

					}


					if ($categoria == "P")
					{
					    $cat_dire++;
						
						// Atualizar Etiquetas
						
						$consulta6  = "INSERT INTO etiquetas_socios SELECT * FROM socios WHERE CODP = '$cod'";
		
			            @mysql_query($consulta6, $link);
	
					}
					if ($categoria == "R")
					{
					    $cat_remi++;
					    
						// Atualizar Etiquetas
						
						$consulta7  = "INSERT INTO etiquetas_socios SELECT * FROM socios WHERE CODP = '$cod'";
		
			            @mysql_query($consulta7, $link);

							
					}
					if ($categoria == "I")
					{
					    $cat_isen++;	
					    
					    // Atualizar Etiquetas
						
						$consulta8  = "INSERT INTO etiquetas_socios SELECT * FROM socios WHERE CODP = '$cod'";
		
			            @mysql_query($consulta8, $link);

					}
					if ($categoria == "O")
					{
					    $cat_opos++;	
					}
					if ($categoria == "D")
					{
					    $cat_dest2++;	
					}
					if ($categoria == "C"){
					     $contr_0++;
						if (!empty($id)){
						   $mes_x = $mes_aber;
						   $ano_x = $ano_aber;
						}else{
						   $mes_x = $mes_i;
						   $ano_x = $ano_i;
						}	

						$qtd        = 0;
						$qtd_fim    = 0;
						$valor_3    = 0;
						$mes_inicio = $mes_x;
						$ano_inicio = $ano_x;
						$mes_hj     = intval(date("m"));
						$ano_hj     = intval(date("Y"));
						
						//echo "Mes e ano pagos = ".trim($mes_inicio)."/".trim($ano_inicio)."<br><br>";
						
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
						if ($qtd > 0)
						{
						   $qtd_fim = $qtd - 1;
						   $valor_3 = $qtd_fim * 8.00;
						}

if ($qtd_fim <= 4 AND $ano_i == intval(date('Y')))
{
	$emdia++;
	// Atualizar Etiquetas
						
	$consulta9  = "INSERT INTO etiquetas_socios SELECT * FROM socios WHERE CODP = '$cod'";
		
	@mysql_query($consulta9, $link);

}

//break;

					}
if ($qtd_fim >= 24)
{
	$qtd_fim   = 0;
	$valor_3   = "0";
	$categoria = "D";
	$desist++;
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