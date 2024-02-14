<?php

/**
 * @author holodek
 * @copyright 2011
 */



// Funcao Verifica Versao do Browse

$browser_cliet = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT']:"";
$navegador = $_SERVER['HTTP_USER_AGENT'];

if(strpos($browser_cliet, 'Opera')!== false) { $browser = 'Opera';
}elseif(strpos($browser_cliet, 'Gecko')!== false) { $browser = 'Firefox';
}elseif(strpos($browser_cliet, 'MSIE')!== false) { $browser = 'MS Internet Explorer';
}elseif(strpos($browser_cliet, 'Lynx')!== false) { $browser = 'Lynx';
}elseif(strpos($browser_cliet, 'WebTV')!== false) { $browser = 'WebTV';
}elseif(strpos($browser_cliet, 'Konqueror')!== false) { $browser = 'Konqueror';
}elseif(strpos($browser_cliet, 'Google')!== false) { $browser = 'Robôs de Busca';
}elseif(strpos($browser_cliet, 'Chrome/')!== false) { $browser = 'Chome';
}else $browser = " Desconhecido"; 

echo $browser."<br>"; 
echo $browser_cliet."<br>";


if(strstr($navegador, 'MSIE')){
	echo 'MS Internet Explorer';
}
else if(strstr($navegador, 'KHTML')){
	echo 'chromo';
}
else if(strstr($navegador, 'Mozilla')){
	echo 'FireFox';
}
else if(strstr($navegador, 'Safari')){
	echo 'Safari';
}
else if(strstr($navegador, 'Opera')){
	echo 'Opera';
}
else{
	echo 'Desconhecido';
	
}
?>