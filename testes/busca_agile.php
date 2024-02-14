<?php

header("Content-Type: text/html; charset=ISO-8859-1", true);

/**
 * @author Edson de Araujo
 * @copyright 2011
 * @tutorial Integração Agile em PHP usando (simpleXML_load_file e fopen)
 */
 

$condi_cao1  = 1;
$i_cont      = '4430783';

if ($condi_cao1 == 1){ 

    $modulo      =  'CONTRIBUICAO';
    $servico     =  'CALCULAR'; 
    $i_usuario   =  "TOLLER";
    $i_senha     =  "wz342y";
    $i_base      =  '1500.00';
    $i_func      =  '0';

    $rss_file = '';
    $xml      = '';
    $url      = '';
    
	// Calcular
	$url = "http://189.19.215.201:8080/SWAGILEAMPR/servlet/com.swinf.sgs.aswap_sgs_integracao_caixa?modulo=". $modulo ."&servico=" . $servico . "&usuario=" . $i_usuario . "&senha=" . $i_senha . "&numero=" . $i_cont . "&base=" . $i_base . "&funcionarios=" . $i_func . ""; 
	
	
	$rss_file = fopen($url, r);
	$xml = simpleXML_load_file($url);
	echo '<pre>'.htmlentities(print_r($xml, 1)).'</pre>';
	foreach ($xml as $item){
	
	echo utf8_decode($item->MENSAGEM) . '<br />';	
	echo trim($item->SIGNIFICADO);
	echo trim($item->NUMERO) . '<br />';
	echo trim($item->CNPJ) . '<br />';
	echo utf8_decode($item->NOME) . '<br />';
	echo trim($item->TIPO) . '<br />';
	echo trim($item->MES) . '<br />';
	echo trim($item->VENCIMENTO) . '<br />';
	echo trim($item->VALOR) . '<br />';
	echo trim($item->TAXA) . '<br />';
	echo trim($item->CORRECAO) . '<br />';
	echo trim($item->MULTA) . '<br />';
	echo trim($item->JURO) . '<br />';
	echo trim($item->APAGAR) . '<br />';
	
	}
	
	fclose($rss_file);
}

if ($condi_cao1 == 2){ 

    $modulo      =  'CONTRIBUICAO';
    $servico     =  'PAGARPORCAIXA'; 
    $i_usuario   =  "TOLLER";
    $i_senha     =  "wz342y";
    $i_valor     =  '150.00';
    $i_func      =  '0';

    $rss_file2 = '';
    $xml2      = '';
    $url2      = '';
    
	// Pagar
	//$url2 = "http://189.19.215.201:8080/SWAGILEAMPR/servlet/com.swinf.sgs.aswap_sgs_integracao_caixa?modulo=CONTRIBUICAO&servico=PAGARPORCAIXA&usuario=TOLLER&senha=wz342y&numero=3507901&valor=120.00";
	$url2 = "http://189.19.215.201:8080/SWAGILEAMPR/servlet/com.swinf.sgs.aswap_sgs_integracao_caixa?modulo=". $modulo ."&servico=" . $servico . "&usuario=" . $i_usuario . "&senha=" . $i_senha . "&numero=" . $i_cont . "&valor=" . $i_valor . " "; 
	
	
	$rss_file2 = fopen($url2, r);
	$xml2 = simpleXML_load_file($url2);
	echo '<pre>'.htmlentities(print_r($xml2, 1)).'</pre>';
	foreach ($xml2 as $item){
	
	echo utf8_decode($item->MENSAGEM) . '<br />';	
	echo trim($item->SIGNIFICADO);
	echo trim($item->NUMERO) . '<br />';
	echo trim($item->CNPJ) . '<br />';
	echo utf8_decode($item->NOME) . '<br />';
	echo trim($item->TIPO) . '<br />';
	echo trim($item->MES) . '<br />';
	echo trim($item->VENCIMENTO) . '<br />';
	echo trim($item->VALOR) . '<br />';
	echo trim($item->TAXA) . '<br />';
	echo trim($item->CORRECAO) . '<br />';
	echo trim($item->MULTA) . '<br />';
	echo trim($item->JURO) . '<br />';
	echo trim($item->APAGAR) . '<br />';
	echo trim($item->PAGO) . '<br />';
	echo trim($item->SALDO) . '<br />';
	echo trim($item->LOTE) . '<br />';
	
	}
	
	fclose($rss_file2);
}


if ($condi_cao1 == 3){ 

    $modulo      =  'CONTRIBUICAO';
    $servico     =  'CANCELARPAGAMENTOPORCAIXA'; 
    $i_usuario   =  "TOLLER";
    $i_senha     =  "wz342y";

    $rss_file3 = '';
    $xml3      = '';
    $url3      = '';
    
	// Cancelar
	$url3 = "http://189.19.215.201:8080/SWAGILEAMPR/servlet/com.swinf.sgs.aswap_sgs_integracao_caixa?modulo=". $modulo ."&servico=" . $servico . "&usuario=" . $i_usuario . "&senha=" . $i_senha . "&numero=" . $i_cont . " ";
	
	
	$rss_file3 = fopen($url3, r);
	$xml3 = simpleXML_load_file($url3);
	echo '<pre>'.htmlentities(print_r($xml3, 1)).'</pre>';
	foreach ($xml3 as $item){
	
	echo utf8_decode($item->MENSAGEM) . '<br />';	
	echo trim($item->SIGNIFICADO);
	echo trim($item->NUMERO) . '<br />';
	echo trim($item->CNPJ) . '<br />';
	echo utf8_decode($item->NOME) . '<br />';
	echo trim($item->TIPO) . '<br />';
	echo trim($item->MES) . '<br />';
	echo trim($item->VENCIMENTO) . '<br />';
	echo trim($item->VALOR) . '<br />';
	echo trim($item->TAXA) . '<br />';
	echo trim($item->CORRECAO) . '<br />';
	echo trim($item->MULTA) . '<br />';
	echo trim($item->JURO) . '<br />';
	echo trim($item->APAGAR) . '<br />';
	echo trim($item->PAGO) . '<br />';
	echo trim($item->SALDO) . '<br />';
	echo trim($item->LOTE) . '<br />';
	
	}
	
	fclose($rss_file3);
}
	
// Fim da Rotina XML

?>