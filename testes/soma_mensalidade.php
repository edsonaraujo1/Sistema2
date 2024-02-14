<?php

/**
 * @author holodek
 * @copyright 2007
 */

$qtd        = 0;
$qtd_fim    = 0;
$valor_3    = 0;
$mes_inicio = 5;
$ano_inicio = 2001;
$mes_hj     = intval(date("m"));
$ano_hj     = intval(date("Y"));

echo "Mes e ano pagos = ".trim($mes_inicio)."/".trim($ano_inicio)."<br><br>";

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
echo "Quantidade de mensalidades devedora  = ".$qtd_fim." valor devedor = ".$valor_3.".00";
?>