<?php

/**
 * @author holodek
 * @copyright 2009
 */

$mes_ano_soc = "";
$inscrica    = "01/09/2001";
$mes_i = 5;
$ano_i = 2001;
$categoria = "C";
$conta = 0;

while ($conta < 3){

if ($categoria == "C"){

if (!empty($mes_ano_soc)){
   $mes_x = substr("$mes_ano_soc", 0, 2);
   $ano_x = substr("$mes_ano_soc", 3, 4);
}else{
   $mes_x = $mes_i;
   $ano_x = $ano_i;
}	

$ano_hj = date("Y");
$mes_hj = date("m");

if ($mes_x == 0 and $ano_x == 0){
	
	$mes_x = substr("$inscrica",3,2);
	$ano_x = substr("$inscrica",6,4);
}

$som_qtd = 0;	
$valor_2 = 0;
	
while($ano_x < $ano_hj){
	$mes_x++;
	if ($mes_x >= 13){
		$mes_x = 1;
		$ano_x++;
	}
	$som_qtd++;
	$valor_2 = $som_qtd * 8.00;
	if ($ano_x == $ano_hj){
		break;
	}
	echo $som_qtd."<br>";
} 
}
$conta++;
}
echo $som_qtd."<br>";
echo $valor_2.',00'."<br>";

?>