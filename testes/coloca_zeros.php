<?php

/**
 * @author holodek
 * @copyright 2012
 */

$valor = 34759;
$cgc = '43070481000114';
$noves  = '9999';
//$final_1 = $cgc;

$final_1 = str_pad($valor, 14, '0', STR_PAD_LEFT);


echo str_pad($valor, 14, '0', STR_PAD_LEFT);

$final_1 = ltrim($noves.str_pad($valor, 10, '0', STR_PAD_LEFT));

$cg1 = substr($final_1,0,2);
$cg2 = substr($final_1,2,3);
$cg3 = substr($final_1,5,3);
$cg4 = substr($final_1,8,4);
$cg5 = substr($final_1,12,2);

$cgc6 = $cg1.".".$cg2.".".$cg3."/".$cg4.".".$cg5;

echo "<br><br>".$cg1.".".$cg2.".".$cg3."/".$cg4.".".$cg5;

echo "<br><br>".strlen($final_1)."<br><br>";

echo strlen($cgc6);

$valor_ant = 140.00;
$valor_rea = 150.00;
$port_cent = 1;

$val_final = ($valor_rea - $valor_rea) / 100;

echo "<br><br>".$val_final;
?>