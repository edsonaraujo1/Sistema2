<?php

/**
 * @author holodek
 * @copyright 2010
 */

	$cria      = fopen("config.txt", "r");
	$linha     = file("config.txt");


	include_once( 'config/aes.class.php');
	
	$key = AES::keygen( AES::KEYGEN_128_BITS, "htwextvghig" );
	
	$aes = new AES( $key );
	

	$total  = count($linha);
	for ($i = "0"; $i < $total; $i++){
	     list($dado1,$dado2,$dado3,$dado4,$dado5,$dado6,$dado7,$dado8,$dado9,$dado10,$dado11,$dado12) = explode(";",$linha[$i]);
	}
	
	
	$website     = $aes->decrypt( $dado1 );  // http://www.sindificios.com.br/index.htm
	$cpfwebsite  = $aes->decrypt( $dado2 );  // http://www.receita.fazenda.gov.br/Aplicacoes/ATCTA/cpf/ConsultaPublica.asp
	$atuali_za   = $aes->decrypt( $dado3 );  // 01/04/2008 às 19:1
	$criado_za   = $aes->decrypt( $dado4 );  // 07/08/2007 às 15:32
	$logo_sis    = $aes->decrypt( $dado5 );  // imagens/logo2.PNG
	$Titulo      = $aes->decrypt( $dado6 );  // Sysmp Sistema ERP - Web
	$cnpj_sis    = $aes->decrypt( $dado7 );  // 43.070.481/0001-14
	$logo1_sis   = $aes->decrypt( $dado8 );  // imagens/Logo1.JPG
	$logo2_sis   = $aes->decrypt( $dado9 );  // imagens/Logo_oficio4.bmp
	$color_bor   = $aes->decrypt( $dado10 ); // #5A9CB1
	$versao_1    = $aes->decrypt( $dado11 ); // 1.2
//	$db_x        = $dado12; // Banco de Dados
	$color_menu  = $aes->decrypt( $dado12 );


//echo $website;

?>