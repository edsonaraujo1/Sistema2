<?php

/**
 * @author holodek
 * @copyright 2009
 */
//            0123456789
$inscricao = "03/03/2009";


$mes_x_1 = substr($inscricao,3,2);  // 03
$ano_x_1 = substr($inscricao,6,4);  // 2009
$mes_ano = substr($inscricao,3,8);  // 2009

echo $mes_x_1."<br>";
echo $ano_x_1."<br>";
echo $mes_ano."<br>";


?>