<?php

/**
 * @author holodek
 * @copyright 2009
 */

$Edit5  = "01/07/1952";
$Edit27 = 12;
$Edit28 = 2010;

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
	echo "Socio em Dia !!!";
}else{
	/* Verifica mes e ano de pagamento */
	if($mes_inicio == 0 and $ano_inicio == 0){
		$mes_inicio = intval($fim_insc_mes);
		$ano_inicio = intval($fim_insc_ano);
	}

		echo "Mes e ano pagos = ".trim($mes_inicio)."/".trim($ano_inicio)."<br><br>";
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
		echo "Quantidade de mensalidades devedora  = ".$qtd_fim." valor devedor = ".$valor_3.".00";
}

?>