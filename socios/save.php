<?php
//This project is done by vamapaull: http://blog.vamapaull.com/
//The php code is done with some help from Mihai Bojin: http://www.mihaibojin.com/


// Resgata a Sessao
@session_start();
@session_name("Foto_cs3");

$noc = $_SESSION['ima_g_1'];

if(isset($GLOBALS["HTTP_RAW_POST_DATA"])){
	$jpg = $GLOBALS["HTTP_RAW_POST_DATA"];
	$img = $_GET["img"];
	$filename = "images/".$noc.".jpg";
	file_put_contents($filename, $jpg);
} else{
	echo "Encoded JPEG information not received.";
}

@session_start();
$_SESSION['ima_g'] = $filename;


?>