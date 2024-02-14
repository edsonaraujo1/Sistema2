<?php

/**
 * @author holodek
 * @copyright 2010
 */
$num_java = '';

$ippc_01      = "192.168.1.60";

$eli_rg2      = str_replace(".","",$ippc_01);

echo "IP ".$ippc_01."<br><br>";

echo "primeiro ".trim(substr($eli_rg2,2,1))."<br>";
echo "segundo  ".trim(substr($eli_rg2,4,1))."<br>";
echo "terceiro ".trim(substr($eli_rg2,8,1))."<br><br>";

$num_java1    = trim(substr($eli_rg2,2,1).substr($eli_rg2,4,1).substr($eli_rg2,8,1));
$num_java2    = trim(substr($eli_rg2,7,1)); 
$num_java     = $num_java1.$num_java2;

echo $num_java;

?>