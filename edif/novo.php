<?php

/**
 * @author holodek
 * @copyright 2010
 */
include('../config.php');
 
?>

<html>
<head>
<title>:.Boletos.:</title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<script src="XHConn.js"></script>
<script src="aguarde.js"></script>
<link rel="shortcut icon" href="favicon.ico"/>
</head>

<style type=text/css>

body { background-image: url(<?="../".$logo_sis;?>);
       background-attachment: fixed }

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
-->
</style> 
</html>

<?
//echo $_POST['acao'];

$tela1    = $_POST['acao'];


if ($ti_wy == 01){

	if ($tela1 == 'Imprimir'){
	
		$vencto    = addslashes($_POST['vencto']);
		$nudoc     = addslashes($_POST['nudoc']);
		$sacado    = addslashes(strtoupper($_POST['sacado']));
		$CNPJ      = addslashes($_POST['CNPJ']);
		$endereco  = addslashes(strtoupper($_POST['endereco']));
		$bairro    = addslashes(strtoupper($_POST['bairro']));
		$cidade    = addslashes(strtoupper($_POST['cidade']));
		$cep       = addslashes($_POST['cep']);
		$estado    = addslashes(strtoupper($_POST['estado']));
		$valor     = addslashes($_POST['valor']);
		$cod_intru = addslashes($_POST['instrucao_x']);
		
		include('edifguias2.php');
	
	}
	
	if ($tela1 == 'Email'){
	
		$vencto       = addslashes($_POST['vencto']);
		$nudoc        = addslashes($_POST['nudoc']);
		$sacado       = addslashes(strtoupper($_POST['sacado']));
		$CNPJ         = addslashes($_POST['CNPJ']);
		$endereco     = addslashes(strtoupper($_POST['endereco']));
		$bairro       = addslashes(strtoupper($_POST['bairro']));
		$cidade       = addslashes(strtoupper($_POST['cidade']));
		$cep          = addslashes($_POST['cep']);
		$estado       = addslashes(strtoupper($_POST['estado']));
		$valor1       = addslashes($_POST['valor']);
		$cod_intru    = addslashes($_POST['instrucao_x']);
		$tipo         = addslashes(strtoupper($_POST['tipo']));
		$men_digitada = addslashes($_POST['mensagem']);
		$email        = addslashes($_POST['email']);

	
		$for_adms        = 'EDIFICIOS'; // Edificios ou Administradora
		$Edit2_tipo      = addslashes(trim($tipo));       // Tipo Contribuicao
		$vencto1         = addslashes($vencto); // Vencimento
		$cod_intru       = substr($cod_intru,0,1); // Instrucao da guia
		$cod_edif1       = $nudoc;             // Codigo Edif ou Adms
		$Email_sn        = 'SIM';             // Sim/Nao email
		$id_conf_2       = addslashes($_SESSION['Edit7e']);             // E-mail
		$Edit8_sei       = addslashes(strtoupper($_SESSION['Edit8e']));
		$nome_adm        = addslashes(strtoupper($_SESSION['Edit9e'])); // nome Adms
		$exer            = substr($vencto1,6,4);
		$exec            = substr($vencto1,6,4);
		$men_digitada2   = addslashes($_POST['mensagem']);

	    include('organiza_id.php');
	
	
	}
}
if ($ti_wy == 02){
	
	if ($tela1 == 'Imprimir'){
	
		$vencto    = addslashes($_POST['vencto']);
		$venctoX   = addslashes($_POST['vencto']);
		$nudoc     = addslashes($_POST['nudoc']);
		$nudocX    = addslashes($_POST['nudoc']);
		$sacado    = addslashes(strtoupper($_POST['sacado']));
		$cnpj      = addslashes($_POST['CNPJ']);
		$endereco  = addslashes(strtoupper($_POST['endereco']));
		$bairro    = addslashes(strtoupper($_POST['bairro']));
		$cidade    = addslashes(strtoupper($_POST['cidade']));
		$cep       = addslashes($_POST['cep']);
		$estado    = addslashes(strtoupper($_POST['estado']));
		$valor     = addslashes($_POST['valor']);
		$valorX    = addslashes($_POST['valor']);
		$exec      = addslashes($_POST['exec']);
		$coded     = addslashes($_POST['nudoc']);
		$admed     = 0;
		$cod_intru = 1;
		
		include('edif_sind2.php');
	
	}
	
	if ($tela1 == 'Email'){
	
		$vencto       = addslashes($_POST['vencto']);
		$nudoc        = addslashes($_POST['nudoc']);
		$sacado       = addslashes(strtoupper($_POST['sacado']));
		$CNPJ         = addslashes($_POST['CNPJ']);
		$endereco     = addslashes(strtoupper($_POST['endereco']));
		$bairro       = addslashes(strtoupper($_POST['bairro']));
		$cidade       = addslashes(strtoupper($_POST['cidade']));
		$cep          = addslashes($_POST['cep']);
		$estado       = addslashes(strtoupper($_POST['estado']));
		$valor1       = addslashes($_POST['valor']);
		$cod_intru    = addslashes($_POST['instrucao_x']);
		$tipo         = addslashes(strtoupper($_POST['tipo']));
		$cod_intru    = '1';
		$men_digitada = addslashes($_POST['mensagem']);
		$email        = addslashes($_POST['email']);

	
		$for_adms        = 'EDIFICIOS'; // Edificios ou Administradora
		$Edit2_tipo      = trim($tipo);       // Tipo Contribuicao
		$vencto1         = addslashes($vencto); // Vencimento
		$cod_intru       = addslashes($cod_intru); // Instrucao da guia
		$cod_edif1       = addslashes($nudoc);             // Codigo Edif ou Adms
		$Email_sn        = 'SIM';             // Sim/Nao email
		$id_conf_2       = addslashes($_SESSION['Edit7e']);             // E-mail
		$Edit8_sei       = addslashes(strtoupper($_SESSION['Edit8e']));
		$nome_adm        = addslashes(strtoupper($_SESSION['Edit9e'])); // nome Adms
		$exer            = substr($vencto1,6,4);
		$exec            = substr($vencto1,6,4);
		$Edit2_tipo      = 'SINDICAL';
		$men_digitada2   = addslashes($_POST['mensagem']);
	
	    include('organiza_id.php');
	
	
	}
	
	
}	
?>