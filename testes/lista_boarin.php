<?php

/**
 * @author holodek
 * @copyright 2010
 */

// Abre Conexão com o MySql 
include("conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);


$ano_base = "2010";
$tota_1 = 0;
$tota_2 = 0;
$tota_3 = 0;
$tota_4 = 0;
$tota_5 = 0;
$tota_6 = 0;
$tota_7 = 0;

$consulta = "SELECT * FROM socios WHERE DATINSC LIKE '%$ano_base%'";
	
$resultado = @mysql_query($consulta);


while ($linha = mysql_fetch_array($resultado))
{
	$Edit5   = $linha["DATINSC"];
	$Edit28  = $linha["ANO"];
	$Edit27  = $linha["MES"];
	$catego  = $linha["CATEGORIA"];
	$cpf_soc = $linha["CPF"];
	
	if ($catego == "F"){
		
		$tota_4++;
	}

	
	$tota_1++;
	
	$anosoc = substr("$Edit5", 6, 4);

	$hoje   = date("Y");
	
	$v_FIM = $hoje - $anosoc;
	
	if ($v_FIM >= 20)
	{
		
		if (($hoje - $Edit28) >= 1 ){
			
			
		}else{
		
		  $categ_1 = "REMIDO";	
		}
			
	}else{
		
	
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
		$tota_5++;

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
			?>	
			<script language='JavaScript'>
			        // alert("Socio ATRASADO COM PAGAMENTO, acertar no CAIXA ! \n Quantidade de <?=$qtd_fim;?> Mensalidades atrasada num total de \n R$ <?=$valor_3;?>,00 Reais !!!");
			</script>
			<?
			    if ($qtd_fim >= 12){
			    	
			    	$tota_2++;
			    }
			
			}
			if ($qtd_fim < 12){
				
				$tota_5++;
			}


	}
	}	

	
}

$ano_remido = $ano_base - 20;

//echo "ano remido ".$ano_remido."<br>";

// Saber quem entrou no Remido

$consulta1 = "SELECT * FROM socios WHERE DATINSC LIKE '%$ano_remido%'";
	
$resultado1 = @mysql_query($consulta1);


while ($linha1 = mysql_fetch_array($resultado1))
{
	
	$Edit5  = $linha1["DATINSC"];
	$Edit28 = $linha1["ANO"];
	$Edit27 = $linha1["MES"];

	$anosoc = substr("$Edit5", 6, 4);

	$hoje   = date("Y");
	
	$v_FIM = $hoje - $anosoc;
	
	if ($v_FIM >= 20)
	{
		
		if (($hoje - $Edit28) >= 1 ){
			
			
		}else{
		
		  $tota_3++;
		  	
		}
			
	}else{
		
	
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
			
			if ($qtd_fim != 0){
			?>	
			<script language='JavaScript'>
			        // alert("Socio ATRASADO COM PAGAMENTO, acertar no CAIXA ! \n Quantidade de <?=$qtd_fim;?> Mensalidades atrasada num total de \n R$ <?=$valor_3;?>,00 Reais !!!");
			</script>
			<?
			    if ($qtd_fim >= 12){
			    	
			    	// $tota_2++;
			    }else{
			    	
			    	$tota_3++;
			    }
			
			}

	}
	}	
	
	
}


$consulta4  = "SELECT * FROM oposicao3 WHERE DATINSC LIKE '%$ano_base%'";
					
$resultado4 = @mysql_query($consulta4);


while ($linha4 = mysql_fetch_array($resultado4))
{
	
	$cod_opo  = $linha4["CODP"];

					
	if (!empty($cod_opo)){

		$tota_6++;
						
	}	
}


echo "Total de Socios Incluso no ano de ".$ano_base." = ".$tota_1." Socios <br>";
echo "Toral de Socios Desistentes no ano de ".$ano_base." = ".$tota_2." Socios <br>";
echo "Toral de Socios que ficaram Remido no ano de ".$ano_base." = ".$tota_3." Socios <br>";
echo "Toral de Socios Falecidos no ano de ".$ano_base." = ".$tota_4." Socios <br>";
echo "Toral de Socios que estavao em Dia com a Mensalidade no ano de ".$ano_base." = ".$tota_5." Socios <br>";
echo "Toral de Socios que fiseram Carta de Oposicao no ano de ".$ano_base." = ".$tota_6." Socios <br>";


$total_fim = $tota_1-$tota_2-$tota_3-$tota_4;

echo "<br><br>Toral de Socios no ano de ".$ano_base." = ".$total_fim." Socios <br>";



?>