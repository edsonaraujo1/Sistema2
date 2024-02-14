<?php

/**
 * @author holodek
 * @copyright 2010
 *
 Função que pega o MAC da placa de Rede.
 
**/

function pegaMac(){
	exec("ipconfig /all", $output);
	foreach($output as $line){
		if (preg_match("/(.*)Endereço físico(.*)/", $line)){
			$mac = $line;
			$mac = str_replace("Endereço físico . . . . . . . . . . :","",$mac);
		}
	}
	return $mac;
}

/*
Exemplo de uso.
*/

$id_mac = trim(pegaMac());

echo $id_mac."<br>";

if ($id_mac == "00-40-F4-A2-C3-6F"){
	
   echo "Mac da Placa VALIDO: ".pegaMac()."<br><br><br>";
	
}else{

   echo "Mac da Placa INVALIDO: ".pegaMac()."<br><br><br>";
	
}


$ippc = $_SERVER['REMOTE_ADDR'];

$macpc = trim(shell_exec("sudo arp -n | grep $ippc | awk '{print $3}'"));

echo "confere <br>";
echo "Seu Ip: $ippc<br>";
echo $macpc;

echo $REMOTE_LLADDR=`sudo arping -c1 -D $REMOTE_ADDR | fgrep [ | cut -f2 -d"[" | cut -f1 -d"]"`; 


echo ' Client IP: ' ; 
if ( isset( $_SERVER [ "REMOTE_ADDR" ]) )    { 
echo '' . $_SERVER [ "REMOTE_ADDR" ] . ' ' ; 
} else if ( isset( $_SERVER [ "HTTP_X_FORWARDED_FOR" ]) )    { 
echo '' . $_SERVER [ "HTTP_X_FORWARDED_FOR" ] . ' ' ; 
} else if ( isset( $_SERVER [ "HTTP_CLIENT_IP" ]) )    { 
echo '' . $_SERVER [ "HTTP_CLIENT_IP" ] . ' ' ; 
} 



?>