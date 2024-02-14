<?php 

ini_set('display_errors', true); 
error_reporting(E_ALL | E_STRICT);



$i_cont      = "3507901";  // 3507901 
$i_valor1    = "150.00";
$i_tipo      = "CONTRIBUICAO";  
$i_servico   = "PAGARPORCAIXA";
$i_usuario   = "TOLLER";
$i_senha     = "wz342y";




 
$url = "http://189.19.215.201:8080/SWAGILEAMPR/servlet/com.swinf.sgs.aswap_sgs_integracao_caixa?modulo=" .$i_tipo. "&servico=" .$i_servico. "&usuario=" .$i_usuario. "&senha=" .$i_senha. "&numero=" .$i_cont. "&valor=" .$i_valor1; 
 
$retorno = get_curl($url); 
 
$xml = simplexml_load_string($retorno); 
$codigo = $xml->cServico->SIGNIFICADO; 
$valor = $xml->cServico->NUMERO; 

echo $codigo;


/* Função para pegar o conteúdo via Curl */ 
function get_curl($url) { 
        $ch = curl_init($url); 
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_ENCODING, ''); // Aceitando compactação (deflate, gzip, etc) 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
        $retorno = curl_exec($ch); 
        curl_close($ch); 
        return $retorno; 
} 

?>

