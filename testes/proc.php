<?
session_start();
foreach($_SESSION as $session => $valor){
	echo "\$_SESSION['$session'] = ". $valor. "<br>";
}

print_r($_SESSION);
?>
 