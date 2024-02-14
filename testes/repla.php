<?php

/**
 * @author holodek
 * @copyright 2010
 */

$program    = "2,JANAINA LIMA SOUTO CASTRO";
$string     = $program;
$array      = explode(',', $string);

for ($si = 0; $si < strlen($program); $si++)
{
    $linha = $Campo."$si";
    echo $array[$si]."<br>";
    $novo[$si] = $array[$si];
    if (empty($array[$si])){
    	echo 'parei<br><br>';
    	break;
    }
}
if (!empty($novo[0])){ echo 'nome0  = '.$novo[0]."<br>"; }
if (!empty($novo[1])){ echo 'nome1  = '.$novo[1]."<br>"; }
if (!empty($novo[2])){ echo 'nome2  = '.$novo[2]."<br>"; }
if (!empty($novo[3])){ echo 'nome3  = '.$novo[3]."<br>"; }
if (!empty($novo[4])){ echo 'nome4  = '.$novo[4]."<br>"; }
if (!empty($novo[5])){ echo 'nome5  = '.$novo[5]."<br>"; }
if (!empty($novo[6])){ echo 'nome6  = '.$novo[6]."<br>"; }
if (!empty($novo[7])){ echo 'nome7  = '.$novo[7]."<br>"; }
if (!empty($novo[8])){ echo 'nome8  = '.$novo[8]."<br>"; }
if (!empty($novo[9])){ echo 'nome9  = '.$novo[9]."<br>"; }
if (!empty($novo[10])){ echo 'nome10 = '.$novo[10]."<br>"; }
if (!empty($novo[11])){ echo 'nome11 = '.$novo[11]."<br>"; }

?>