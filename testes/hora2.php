<?php

/**
 * @author holodek
 * @copyright 2010
 */


$hora_atual  = strtotime(date('H:i'));

$hora_inicio = strtotime('08:00');
$hora_fim    = strtotime('16:00');


echo $hora_atual."<br>";
echo $hora_inicio."<br>";
echo $hora_fim."<br>";


if ($hora_atual >= $hora_inicio && $hora_atual <= $hora_fim){
	
	echo "<br>Horario Permitido !!!<br>";
}else{
	
	echo "<br>Nao Permitido nesse Horario !!!<br>";
	
}

?>
