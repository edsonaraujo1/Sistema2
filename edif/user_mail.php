<?
/*
 -------------------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Gerar Boletos em PDF e Enviar por E-Mail
 Criado em Data.....: 13/11/2009
 Ultima Atualização : 19/11/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------------------
*/
// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

$nome3 = addslashes($_SESSION["nome_log"]);

include_once('../sql_injection.php');

// Variaveis Retornadas do POST

$for_adms        = addslashes(strtoupper($_SESSION['Edit1e'])); // Edificios ou Administradora
$Edit2_tipo      = addslashes(trim($_SESSION['Edit2e']));       // Tipo Contribuicao
$vencto1         = addslashes(strtoupper($_SESSION['Edit3e'])); // Vencimento
$cod_intru       = addslashes($_SESSION['Edit4e']); // Instrucao da guia
$cod_edif1       = addslashes($_SESSION['Edit5e']);             // Codigo Edif ou Adms
$Email_sn        = addslashes($_SESSION['Edit6e']);             // Sim/Nao email
$id_conf_2       = addslashes($_SESSION['Edit7e']);             // E-mail
$Edit8_sei       = addslashes(strtoupper($_SESSION['Edit8e']));
$nome_adm        = addslashes(strtoupper($_SESSION['Edit9e'])); // nome Adms
$exer            = addslashes(substr($vencto1,6,4));
$exec            = addslashes(substr($vencto1,6,4));
$valor1          = addslashes($_SESSION['Edit10e']);
$men_digitada    = addslashes($_SESSION['Edit11e']);
$email_enviar    = addslashes($_SESSION['Edit12e']);


$smtp_host 		 = trim($_SESSION['smtp_2']);
$e_mail_2  		 = trim($_SESSION['email_2']);
$sen_pas_2 		 = trim($_SESSION['sen_email2']);
$email_ret 		 = trim($_SESSION['email_ret2']);

/*
echo $for_adms."<br>";
echo $Edit2_tipo."<br>";
echo $vencto1."<br>";
echo $cod_intru."<br>";
echo $cod_edif1."<br>";
echo $Email_sn."<br>";
echo $id_conf_2."<br>";
echo $exer."<br>";
*/
//break;

if (empty($email_enviar)){
	
	echo "
			<html>
			
			<head>
			<title>$Titulo</title>
			<link rel='shortcut icon' href='../imagens/favicon.ico'/>
			</head>
			
			<style type=text/css>
			
			body { background-image: url(../$logo_sis);}
			
			<!--.cp {  font: bold 10px Arial; color: black}
			<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
			<!--.ld { font: bold 15px Arial; color: #000000}
			<!--.ct { FONT: 9px Arial Narrow; COLOR: #000033}
			<!--.cn { FONT: 9px Arial; COLOR: black }
			<!--.bc { font: bold 22px Arial; color: #000000 }
			--></style> 
			
			</HEAD>
	
	
	      <br>
		  <div align=center>
		  <table align=center border='15' bgcolor='#FFF8DC'  bordercolor ='$color_bor'>
		  <tr>
		  <td align=center>
		  <font face=arial><b>*** E-Mail nao Informado!!! ***</b>
		  
		  <table align=center>
		  <form method='POST' action='javascript:window.close()'>
		  <td><input type=image name='consulta' src='../imagens/botaoazul25.PNG'></td>
		  </form> 
		  </table>
		  </td>
		  </tr>
		  </table>
		  </div>";
          exit();
	
	
}

if (empty($vencto1)){
	

	echo "
			<html>
			
			<head>
			<title>$Titulo</title>
			<link rel='shortcut icon' href='../imagens/favicon.ico'/>
			</head>
			
			<style type=text/css>
			
			body { background-image: url(../$logo_sis);}
			
			<!--.cp {  font: bold 10px Arial; color: black}
			<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
			<!--.ld { font: bold 15px Arial; color: #000000}
			<!--.ct { FONT: 9px Arial Narrow; COLOR: #000033}
			<!--.cn { FONT: 9px Arial; COLOR: black }
			<!--.bc { font: bold 22px Arial; color: #000000 }
			--></style> 
			
			</HEAD>
	
	
	      <br>
		  <div align=center>
		  <table align=center border='15' bgcolor='#FFF8DC'  bordercolor ='$color_bor'>
		  <tr>
		  <td align=center>
		  <font face=arial><b>*** Vencimento nao pode ser branco!!! ***</b>
		  
		  <table align=center>
		  <form method='POST' action='javascript:window.close()'>
		  <td><input type=image name='consulta' src='../imagens/botaoazul25.PNG'></td>
		  </form> 
		  </table>
		  </td>
		  </tr>
		  </table>
		  </div>";
          exit();

	
}

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);


// Atualiza arquivo Log
$data_log = date("d/m/Y");
$hora_log = date("H:i:s"); 
$even_log = "ENVIO DE GUIAS POR E-MAIL "."/".$cod_edif1."/".$for_adms;
			
$consulta_log_Z = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
	             VALUES
	             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
@mysql_query($consulta_log_Z, $link);



if ($for_adms == "ADMINISTRADORA"){

	// Tabela Administradora
	
	$consultaxx  = "SELECT * FROM adms WHERE cod = '". anti_sql_injection($cod_edif1) ."'";
		
	$resultadoxx = @mysql_query($consultaxx);
	
	$rowxx = @mysql_fetch_array($resultadoxx);
	
	$id_adms     = @$rowxx["id"];
	$cod_adms    = @$rowxx["cod"];
	$texto_1     = @$rowxx["nomeadm"];
	$cnpj_link   = @$rowxx["cgc"];
	$email_link  = @$rowxx["email"];


    $sql  = "SELECT * FROM edificios WHERE ADM = '". anti_sql_injection($cod_edif1) ."'";
	
}else{
	
	$consulta00  = "SELECT * FROM edificios WHERE COD = '". anti_sql_injection($cod_edif1) ."'";
	
	$resultado00 = @mysql_query($consulta00);
	
	$row00 = @mysql_fetch_array($resultado00);
	
	$id_1             	= @$row00["id"];
	$email_link     	= @$row00["EMAIL"];
	$id_conf2  			= @$row00["EMAIL"];
	$texto_1 			= @$row00["COND"]." ".@$row00["NOME"];
	$link_edif 			= @$row00["COD"];
	$cnpj_link 			= @$row00["CGC"];
	$exec_link 			= @$row00["EXEC"];
	
    $sql  = "SELECT * FROM edificios WHERE COD = '". anti_sql_injection($cod_edif1) ."'";
	
}

// Verifica qual email enviar

    if(empty($email_enviar)){
    	
    	$email_link = $email_link;
    	
    }else{
    	
    	$email_link = $email_enviar;
    }

$resultado = @mysql_query($sql);

// Abrir tabela instrucao

$consultaz  = "SELECT * FROM instrucao WHERE Edit1 = '". anti_sql_injection($cod_intru) ."'";

$resultadoz = @mysql_query($consultaz);

$rowz = @mysql_fetch_array($resultadoz);

$Edit2      = @$rowz['Edit2'];
$Edit3      = @$rowz['Edit3'];
$Edit4      = @$rowz['Edit4'];
$Edit5      = @$rowz['Edit5'];
$Edit6      = @$rowz['Edit6'];
$Edit12	    = @$rowz["Edit12"];
$Edit13	    = @$rowz["Edit13"];
$Edit14	    = @$rowz["Edit14"];
$Edit15	    = @$rowz["Edit15"];
$Edit16	    = @$rowz["Edit16"];
$Edit17	    = @$rowz["Edit17"];
$Edit18	    = @$rowz["Edit18"];

$sed_agecho = trim($Edit13)."/".trim($Edit14).".".trim($Edit15).".".trim($Edit16)."-".$Edit17;

$agen_cod      = $Edit3;    // "020.501.86200-0";
$end_cedente   = $Edit5;    // "RUA SETE DE ABRIL";
$num_cedente   = $Edit6;    // "34";
$cnpj_cedente  = $Edit4;    // "43.070.481/0001-14";


// Criar Numero de Registro

$consulta_zon1  = "SELECT * FROM registro ORDER BY id DESC LIMIT 0,1";
$result_zo1     = @mysql_query($consulta_zon1);
$row_zo1        = @mysql_fetch_array($result_zo1);
$id_zo1         = @$row_zo1["id_nu"];
$id_zo1         = $id_zo1 + 1;
$dat_zo1        = date("d/m/Y");
$tim_zo1        = date("H:i:s");
$descri         = "Envio de Guias por E-mail - ".$for_adms." - ".$cod_edif1." - ".$vencto1." - ".$valor1;
$sql_id_seek    = "INSERT INTO registro (id_nu, data, hora, descricao, email, texto) VALUES ('$id_zo1', '$dat_zo1', '$tim_zo1', '$descri', '$email_link', '$men_digitada')"; 
@mysql_query($sql_id_seek,$link);


if (empty($email_link)){
	
		include('../config.php');						    	
						    	
	echo "
			<html>
			
			<head>
			<title>$Titulo</title>
			<link rel='shortcut icon' href='../imagens/favicon.ico'/>
			</head>
			
			<style type=text/css>
			
			body { background-image: url(../$logo_sis);}
			
			<!--.cp {  font: bold 10px Arial; color: black}
			<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
			<!--.ld { font: bold 15px Arial; color: #000000}
			<!--.ct { FONT: 9px Arial Narrow; COLOR: #000033}
			<!--.cn { FONT: 9px Arial; COLOR: black }
			<!--.bc { font: bold 22px Arial; color: #000000 }
			--></style> 
			
			</HEAD>
	
	
	      <br>
		  <div align=center>
		  <table align=center border='15' bgcolor='#FFF8DC'  bordercolor ='<?=$color_bor;?>'>
		  <tr>
		  <td align=center>
		  <font face=arial><b>*** E-Mail Nao Informado Verifique!!! ***</b>&nbsp;$id_conf
		  
		  <table align=center>
		  <form method='POST' action='javascript:window.close()'>
		  <td><input type=image name='consulta' src='../imagens/botaoazul25.PNG'></td>
		  </form> 
		  </table>
		  </td>
		  </tr>
		  </table>
		  </div>";
exit;

	
}


// Variavei usadas pelo Boleto

if ($Edit2_tipo == "SINDICAL"){

//	$valor1        = "";
//	$agen_cod      = "020.501.86200-0";
//	$end_cedente   = "RUA SETE DE ABRIL";
//	$num_cedente   = "34";
//	$cnpj_cedente  = "43.070.481/0001-14";
	$data_doc      = date("d/m/Y");
	
	$referente     = "BLOQUETO DE CONTRIBUIÇÃO SINDICAL URBANA"; 
	$instrucao1    = "Até o vencimento pagável nas Lotéricas, Agências da CAIXA e Rede Bancária.";
	$instrucao2    = "Documento vencido pagável somente nas Agências da CAIXA.";
	$instrucao3    = "Guia vencida - cobrar multa de 10% nos trinta primeiros dias, com adicional de 2% por";
	$instrucao4    = "mês subsequente de atraso e juros de mora de 1% ao mês e correção monetaria.";
	$instrucao5    = "";
	$conta_pg      = 1;


}else{
	

//	$valor1        = "";
	$codigobanco   = "001";
	$nummoeda 	   = "9";
	$cedente       = "SINDIFICIOS - SIND. DOS TRABALHADORES EM EDIF. DE SÃO PAULO";
	$agen_cod      = "1202-5/17727-X";
	$agencia       = "1202";
	$conta         = "17727";
	$data_doc      = date("d/m/Y");
	$especie_doc   = "RC";
	$aceite        = "N";
	$convenio      = "284723";
	$carteira      = "18";
	$especie       = "R$";
	
	$referente     = "REFERENTE"; 
	$conta_pg      = 1;
	
	// Mostra Nome Mes Referencia
	$monthName = array(1=>"Janeiro",  "Fevereiro", "Marco",
	                      "Abril",    "Maio",      "Junho",    "Julho",   "Agosto",
	                      "Setembro", "Outubro",   "Novembro", "Dezembro");
	
	/* mes referencia */
	
	$rest    = substr($vencto1, 3,2);
	$rest2   = strval($rest)-1;
	$mEs     = $rest2;
	$mes_ref = strtoupper($monthName[$mEs]);

	
}


if ($Edit2_tipo == "SINDICAL"){
    $Contribu2     = "Sindical";
    $venci_01      = $vencto1." Exercicio ".$exer;
//---------------------------- Inicio -----------------------
    include('func_sind.php');

	include('fpdf.php');
	// Inicia Codigo dos Boletos
	include('i25.php');
	
	// Inicio do Boleto
	
	$pdf = new PDF_i25();
	$pdf->Open();
	$pdf->SetAutoPageBreak(0, 0);
	$pdf->SetTopMargin(0);
	$pdf->AddPage();
	$pdf->SetDisplayMode(fullwidth, continuous);
	
	// Inicio do Loop
	while($linha = @mysql_fetch_array($resultado)) {
	
	$conta_pag = $conta_pg++;
	
	$pdf->ln();
	
	// x = horizontal y = vertical z = largura w = altura
	
	$pdf->image("../imagens/cef.png",0,0,211,303);
	
	$vencto       = $vencto1;
	$nudoc        = $linha["COD"];
	$num_doc      = $linha["COD"];
	$estado       = $linha["UF"];
	$valor        = $valor1;
	$sacado       = $linha["COND"]." ".$linha["NOME"];
	$cnpj         = $linha["CGC"];
	$endereco     = $linha["RUA"]." ".$linha["ENDERECO"].",".$linha["NUMERO"];
	$cep          = $linha["CEP"];
	$bairro       = $linha["BAIRRO"];
	$cidade       = $linha["CIDADE"];
	$uf           = $linha["UF"];
	$adm          = $linha["ADM"];
	
	$nov_valor1 = str_replace(".","",$valor1);
	$nov_valor2 = str_replace(",","",$nov_valor1);
	
	$valorz = formata_numero($nov_valor2,10,0);
	
		$banco       = 104;
		$moeda       = 9;
	    $database    = 19971007;
	    $vencimento2 = substr($vencto1,6,4).substr($vencto1,3,2).substr($vencto1,0,2);
	    $fav_venc    = floor(abs(strtotime($database) - strtotime($vencimento2))/86400);
		$valor       = SoNumeros($valor1);
		$valor       = colocaZeroEsquerda($valor, 10);
	    $sico        = 97;
	    $cod_ent     = $Edit16;
	    $cod_cnae    = 9;
	    $tipo_ent    = 1;
	    $sitcs       = 77;
		$cod_cont    = SoNumeros($Edit3);
	    $cnae        = 3;
	    $zero1       = 0;
	    $nosso       = SoNumeros($cnpj);
	    $nosso2      = substr($nosso,0,12);
	    $codent      = $Edit3;
	    $agenced     = $sed_agecho;
	    $cedente     = $Edit2;
	    $local       = "PREFERENCIALMENTE NAS LOTÉRICAS ATÉ O VALOR LIMITE";
	
		$campo1      = $banco.$moeda.$sico.substr($cod_ent,0,3);
		$DV_campo1   = Modulo10($campo1);
		$campo1a     = substr($campo1,0,5).'.'.substr($campo1,5,4).$DV_campo1.'   ';
	
		$campo2      = substr($cod_ent,3,5).$cod_cnae.$tipo_ent.$sitcs.substr($nosso,0,4);
		$DV_campo2   = Modulo10($campo2);
	    $campo2a     = substr($campo2,0,5).'.'.substr($campo2,5,5).$DV_campo2.'   ';
	
		$campo3      = substr($nosso2,4,8).$cnae.$zero1;
		$DV_campo3   = Modulo10($campo3);
	    $campo3a     = substr($campo3,0,5).'.'.substr($campo3,5,5).$DV_campo3.'    ';
	
		$campo4      = substr($campo1,0,4).$fav_venc.$valor.substr($campo1,4,5).$campo2.$campo3;
		$DV_campo4   = Modulo11($campo4);
	    $campo4a     = $DV_campo4.'    ';
	
	    $campo5a     = $fav_venc.$valor; 
	
		$DV_CBarra   = Modulo11($banco.$moeda.$FatorVencimento.$valor.$nosso2.substr($agencia_cod_cedente,0,15));
		$CodigoBarra = $campo1.$DV_campo1.$campo2.$DV_campo2.$campo3.$DV_campo3.$DV_campo4.$campo5a;
		
	    $CodigoBarra = 	Trim(substr($campo1,0,4).$DV_campo4.$campo5a.substr($campo1,4,5).$campo2.$campo3);
	
		$linha2      = $campo1a.$campo2a.$campo3a.$campo4a.$campo5a;
	
	    $codigo_barras      = $CodigoBarra;
	    $linha_digitavel    = $linha2;
	
	
	// Primeira Guia
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Text(104.4,4, $conta_pag);
	
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Text(54,14, 'GRCSU - Guia de Recolhimento da Contribuição Sindical Urbana');

	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(162.3,18.5, 'Vencimento');
	
	$pdf->SetFont('Arial', 'B', 11);
	$pdf->Text(164,22.4, $vencto);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(186.4,18.5, 'Exercicio');
	
	$pdf->SetFont('Arial', 'B', 11);
	$pdf->Text(189,22.4, $exec);
	
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Text(6.5,26, 'Dados da Entidade Sindical');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(7.3,29.4, 'Nome da Entidade');
	
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Text(8,33, $cedente);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(150.3,29.7, 'Codigo da Entidade Sindical');
	
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Text(151,33.4, $agen_cod);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(7.3,37.5, 'Endereço');
	
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Text(8,41, $end_cedente);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(102.3,37.5, 'Número');
	
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Text(107,41, $num_cedente);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(120.3,37.5, 'Complemento');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(150.3,37.5, 'CNPJ da Entidade');
	
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Text(151,41, $cnpj_cedente);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(7.3,46, 'Bairro/Distrito');
	
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Text(8,49.4, 'CENTRO');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(94.3,46, 'CEP');
	
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Text(94.3,49.4, '01044-000');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(120.3,46, 'Cidade/Municipio');
	
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Text(121,49.4, 'SÃO PAULO');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(193,46, 'UF');
	
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Text(193,49.4, 'SP');
	
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Text(6.5,54.5, 'Dados do Contribuinte');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(7.4,58, 'Nome/Razão Social/Denominação Social');
	
	$pdf->SetFont('Arial', '', 10);
	$pdf->Text(8,62, $sacado);
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(124,61.5, '['.colocaZeroEsquerda($num_doc,6).'-'.colocaZeroEsquerda($adm,4).']');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(150.4,58.3, 'CPF/CNPJ/Código do Contribuinte');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(150,62, $cnpj);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(7.4,66, 'Endereço');
	
	$pdf->SetFont('Arial', '', 10);
	$pdf->Text(8,70, $endereco);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(102.4,66, 'Número');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(120,66, 'Complemento');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(7,74.5, 'CEP');
	
	$pdf->SetFont('Arial', '', 10);
	$pdf->Text(8,78, $cep);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(45,74.5, 'Bairro/Distrito');
	
	$pdf->SetFont('Arial', '', 10);
	$pdf->Text(45,78, $bairro);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(120,74.5, 'Cidade/Municipio');
	
	$pdf->SetFont('Arial', '', 10);
	$pdf->Text(121,78, $cidade);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(172,74.5, 'UF');
	
	$pdf->SetFont('Arial', '', 10);
	$pdf->Text(171,78, $uf);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(181,74.5, 'Código Atividade');
	
	$pdf->SetFont('Arial', '', 10);
	$pdf->Text(182,78, $Edit18);
	
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Text(6.5,83, 'Dados de Referencia da Contribuição');
	
	$pdf->SetFont('Arial', '', 8);
	$pdf->Text(7.4,86.5, 'Categoria');
	
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Text(151.6,84, 'Dados da Contribuição');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(152,87, '(=) Valor do Documento');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(13,91.6, 'Patronal/Empregador');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(52,91.6, 'Empregados');
	
	$pdf->SetFont('Arial', '', 8);
	$pdf->Text(47.4,91.7, 'X');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(87,91.6, 'Prof. Liberal');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(118,91.6, 'Autônomos');
	
	$pdf->SetFont('Arial', '', 10);
	$pdf->Text(178,91.6, $valor1);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(7.5,95.6, 'Capital Social - Empresa');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(80.2,95.9, 'Nº Empregados - Contribuintes');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(151.6,95.9, '(-) Desconto/Abatimento');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(7.5,103.5, 'Capital Social - Estabelecimento');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(80.1,103.5, 'Total Remuneração - Contribuintes');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(151.6,103.5, '(-) Outras Deduções');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(80.1,111.4, 'Total Empregados - Estabelecimento');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(151.6,111.4, '(+) Mora/Multa');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(151.6,119, '(+) Outros Acréscimos');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(151.6,126.7, '(=) Valor Cobrado');
	
	$pdf->SetFont('Arial', '', 10);
	$pdf->Text(178,130, $valor1);
	
	$pdf->SetFont('Arial', 'B', 11);
	$pdf->Text(10,116, 'Contribuição Sindical');
	$pdf->Text(10,121, 'conforme Arts. 578 até 610 CLT');
	$pdf->Text(10,126, 'Dúvidas: (11) 3123-3211 ramal 3260 ou 3273');
	
	$pdf->SetFont('Arial', 'B', 13);
	$pdf->Text(8,139, '104-0');
	
	$pdf->SetFont('Arial', 'B', 12);
	$pdf->Text(23,138, $linha_digitavel); 
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(8,143, 'Código do Cedente');
	
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Text(8.6,147.5, $agen_cod);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(50,143, 'Nosso Número');
	
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Text(51,147.5, $nosso2);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(93.5,143, 'Valor do Documento');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(135,143, 'Data Vencimento');
	
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Text(140,147.5, $vencto);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(179,143, 'Exercício');
	
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Text(183,147.5, $exec);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(120,152, 'Autenticação mecânica');
	
	
	// Fihca Compensação
	
	$pdf->SetFont('Arial', 'B', 13);
	$pdf->Text(50,189, '104-0');
	
	$pdf->SetFont('Arial', 'B', 12);
	$pdf->Text(72,188, $linha_digitavel); 
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(7.5,193.5, 'Local de Pagamento');
	
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Text(7.5,197.4, 'PREFERENCIALMENTE NAS LOTÉRICAS ATÉ O VALOR LIMITE');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(159,194, 'Vencimento');
	
	$pdf->SetFont('Arial', 'B', 11);
	$pdf->Text(178,197, $vencto);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(7,201, 'Cedente');
	
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Text(8,205, $cedente);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(159,201, 'Agência/Código Cedente');
	
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Text(159,205, $agenced);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(7,209, 'Data do Documento');
	
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Text(11,213.1, $data_doc);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(34,209, 'Número do Documento');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(37,213.1, colocaZeroEsquerda($num_doc,6));
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(83,209, 'Esp. Docum.');
	
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Text(84.1,213.1, 'GRCSU');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(100,209, 'Aceite');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(100,212.1, $aceite);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(123,209, 'Data Processamento');
	
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Text(133,213.1, $data_doc);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(159,209, 'Nosso Número');
	
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Text(160,213, $nosso2);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(7,217, 'Uso do banco');
	
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Text(8,220.5, 'EXERC   '.trim($exec));
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(34,217, 'Carteira');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(34,220.5, 'SIND');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(52,217, 'Espécie');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(52,220.5, 'R$');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(83,217, 'Quantidade');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(115,217, 'Valor');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(159,217, '(=) Valor do documento');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(185,220.4, $valor1);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(8,225, 'Instruções(Texto de responsabilidade do cedente)');
	
	$pdf->SetFont('Arial', '',9);
	$pdf->Text(39.5,230.1, $referente);
	
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Text(10,234.6, $instrucao1);
	
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Text(10,238.7, $instrucao2);
	
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Text(10,242.7, $instrucao3);
	
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Text(10,247, $instrucao4);
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(10,252, $instrucao5);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(159,225, '(-) Descontos/Abatimentos');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(159,232.6, '(-) Outras Deduções');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(159,240.3, '(+) Mora/Multa');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(159,248, '(+) Outros Acréscimos');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(159,255.6, '(=) Valor Cobrado');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(185,259, $valor1);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(7,264, 'Sacado');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(18,264.5, $sacado);
	$pdf->Text(136,264.5, 'CNPJ.: '.$cnpj);
	$pdf->Text(18,268.2, $endereco);
	$pdf->Text(18,272, $cep.'     -     '.$cidade.'      -     '.$uf);
	
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Text(177.5,264.5, '['.colocaZeroEsquerda($num_doc,6).'-'.colocaZeroEsquerda($adm,4).']');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(7,275, 'Sacador/Avalista:__________');
	$pdf->Text(118,275, '');
	$pdf->Text(146,279, 'Ficha de Compensação/Autenticação Mecânica');
	
	
	// Codigo de Barras
	$pdf->i25(7,280, $codigo_barras);
	
	$pdf->AddPage();
	}
	
	//$pdf->AutoPrint(true);
	$pdf->Output($id_zo1.".pdf","F");


//----------------------------- fim -------------------------	
	
}
if ($Edit2_tipo == "CONFEDERATIVA"){
    $Contribu2     = "Confederativa";
    $venci_01      = $vencto1;

//----------------------------- Inicio -----------------------	
    include('func_conf.php');

	include('fpdf.php');
	// Inicia Codigo dos Boletos
	include('i25.php');
	
	// Inicio do Boleto
	
	$pdf = new PDF_i25();
	$pdf->Open();
	$pdf->SetAutoPageBreak(0, 0);
	$pdf->SetTopMargin(0);
	$pdf->AddPage();
	$pdf->SetDisplayMode(fullwidth, continuous);
	
	// Inicio do Loop
	while($linha = @mysql_fetch_array($resultado)) {
	
	$conta_pag = $conta_pg++;
	
	$pdf->ln();
	
	// x = horizontal y = vertical z = largura w = altura
	
	$pdf->image("../imagens/bb.png",0,0,211,303);
	
	$vencto       = $vencto1;
	$nudoc        = $linha["COD"];
	$num_doc      = $linha["COD"];
	$estado       = $linha["UF"];
	$valor        = $valor1;
	$sacado       = $linha["COND"]." ".$linha["NOME"];
	$cnpj         = $linha["CGC"];
	$endereco     = $linha["RUA"]." ".$linha["ENDERECO"].",".$linha["NUMERO"];
	$cep          = $linha["CEP"];
	$bairro       = $linha["BAIRRO"];
	$cidade       = $linha["CIDADE"];
	$uf           = $linha["UF"];
	$adm          = $linha["ADM"];
	
	$nov_valor1         = str_replace(".","",$valor1);
	$nov_valor2         = str_replace(",","",$nov_valor1);
	$valorz             = formata_numero($nov_valor2,10,0);
	$fator_vencimento 	=  fator_vencimento($vencto);
	$nudoc1             =  formata_numero($nudoc,5,0);
	$nosso_numero       =  $convenio.$nudoc1.'-'.modulo_11($convenio.$nudoc1);
	$nossonumero        =  $nudoc1;
	$conta 				=  formata_numero($conta,8,0);
	$dv 			    =  modulo_11($codigobanco.$nummoeda.$fator_vencimento.$valorz.$convenio.$nossonumero.$agencia.$conta.$carteira);
	$linha 			    =  $codigobanco.$nummoeda.$dv.$fator_vencimento.$valorz.$convenio.$nossonumero.$agencia.$conta.$carteira;
	$linha2             =  monta_linha_digitavel($linha);
	$codigo_barras      = $linha;
	$linha_digitavel    = $linha2;
	
	// Primeira Guia Recibo do Sacado
	
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Text(105,4, $conta_pag);
	
	$pdf->SetFont('Arial', 'B', 14);
	$pdf->Text(4,7, 'Banco do Brasil');
	
	$pdf->SetFont('Arial', 'B', 17);
	$pdf->Text(54,8, '001-9');
	
	$pdf->SetFont('Arial', 'B', 12);
	$pdf->Text(168,9, 'Recibo do Sacado');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,12.5, 'Local de Pagamento');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(5,15.5, 'Pagável em qualquer banco até o vencimento');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(162,12.5, 'Vencimento');
	
	$pdf->SetFont('Arial', 'B', 11);
	$pdf->Text(178,15.8, $vencto);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,19, 'Cedente');
	
	$pdf->SetFont('Arial', '', 8);
	$pdf->Text(5,22.5, $cedente);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(162,19, 'Agência/Código Cedente');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(163,22.5, $agen_cod);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,26, 'Data do Documento');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(9,29, $data_doc);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(31,26, 'Nº do Documento');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(38,29, $num_doc.'/'.$adm);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(80,26, 'Espécie Doc.');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(87,29, $especie_doc);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(105,26, 'Aceite');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(111,29, $aceite);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(124,26, 'Data Processamento');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(133,29, $data_doc);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(162,26, 'Nosso Número');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(163,29, $nosso_numero);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,33, 'Uso do banco');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(48,33, 'Carteira');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(59,36, $carteira);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(81,33, 'Moeda');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(89,36, $especie);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(104,33, 'Quantidade');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(123,33, 'Valor');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(162,33, '(=)Valor documento');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(185,36, $valor);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,39.5, 'Instruções(Texto de responsabilidade do cedente)');
	
	$pdf->SetFont('Arial', '',8);
	$pdf->Text(5,43.4, $referente.':');
	
	$pdf->SetFont('Arial', '',8);
	$pdf->Text(24,43.4, $mes_ref);
	
	$pdf->SetXY(4,44);
	$pdf->MultiCell(150,4, $Edit12, 0, '',0); // J Justificado
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(162,39.5, '(-)Descontos/Abatimentos');
	
	$pdf->Text(162,46, '(-)Outras Deduções');
	
	$pdf->Text(162,53, '(+)Mora/Multa');
	
	$pdf->Text(162,60.2, '(+)Outros Acréscimos');
	
	$pdf->Text(162,66.7, '(=)Valor Cobrado');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(185,69.7, $valor);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,73, 'Sacado');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(25,74, $sacado);
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(148,74, 'CNPJ.: '.$cnpj);
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(25,77.7, $endereco);
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(25,81.4, $cep.'     -     '.$cidade.'      -     '.$uf);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,82.8, 'Sacador/Avalista');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(118,82.8, 'Código de Caixa');
	
	$pdf->SetFont('Arial', '', 6);
	$pdf->Text(5,86.4, 'Recebimento através do cheque número___________________do Banco ___________, Esta quitação  só terá validade  após efetuada  a compensa');
	 
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(177,86.4, 'Autenticação  Mecânica');
	
	 
	// Segunda Guia Ficha do Caixa
	
	$pdf->SetFont('Arial', 'B', 14); 
	$pdf->Text(4,106,'Banco do Brasil'); 
	
	$pdf->SetFont('Arial', 'B', 17);
	$pdf->Text(54,107, '001-9');
	
	$pdf->SetFont('Arial', 'B', 12);
	$pdf->Text(175,108, 'Ficha do Caixa');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,112, 'Local de Pagamento');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(5,115, 'Pagável em qualquer banco até o vencimento');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(162,112, 'Vencimento');
	
	$pdf->SetFont('Arial', 'B', 11);
	$pdf->Text(178,115, $vencto);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,118.8, 'Cedente');
	
	$pdf->SetFont('Arial', '', 8);
	$pdf->Text(5,121.8, $cedente);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(162,118.8, 'Agência/Código Cedente');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(163,122, $agen_cod);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,125, 'Data do Documento');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(9,128.5, $data_doc);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(31,125, 'Nº do Documento');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(38,128.5, $num_doc.'/'.$adm);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(80,125, 'Espécie Doc.');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(87,128.5, $especie_doc);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(105,125, 'Aceite');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(111,128.5, $aceite);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(124,125, 'Data Processamento');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(133,128.5, $data_doc);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(162,125, 'Nosso Número');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(163,128.5, $nosso_numero);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,132.4, 'Uso do banco');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(48,132.4, 'Carteira');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(59,135.4, $carteira);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(81,132.4, 'Moeda');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(89,135.4, $especie);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(104,132.4, 'Quantidade');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(123,132.4, 'Valor');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(162,132.4, '(=)Valor documento');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(185,135.4, $valor);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,139.2, 'Instruções(Texto de responsabilidade do cedente)');
	
	$pdf->SetFont('Arial', '',8);
	$pdf->Text(5,143.4, $referente.':');
	
	$pdf->SetFont('Arial', '',8);
	$pdf->Text(24,143.4, $mes_ref);
	
	$pdf->SetXY(4,144);
	$pdf->MultiCell(150,4, $Edit12, 0, '',0); // J Justificado
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(162,139.2, '(-)Descontos/Abatimentos');
	
	$pdf->Text(162,146, '(-)Outras Deduções');
	
	$pdf->Text(162,153, '(+)Mora/Multa');
	
	$pdf->Text(162,160.2, '(+)Outros Acréscimos');
	
	$pdf->Text(162,166.7, '(=)Valor Cobrado');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(185,169.4, $valor);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,173, 'Sacado');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(25,174, $sacado);
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(148,174, 'CNPJ.: '.$cnpj);
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(25,177.7, $endereco);
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(25,181.4, $cep.'     -     '.$cidade.'      -     '.$uf);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,182.5, 'Sacador/Avalista');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(118,182.2, 'Código de Caixa');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(177,186.1, 'Autenticação  Mecânica');
	
	
	// Terceira Guia Ficha de Compensação
	
	$pdf->SetFont('Arial', 'B', 14);
	$pdf->Text(4,201,'Banco do Brasil'); 
	
	$pdf->SetFont('Arial', 'B', 17);
	$pdf->Text(54,202, '001-9');
	
	$pdf->SetFont('Arial', 'B', 12);
	$pdf->Text(85,202, $linha_digitavel); 
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,207, 'Local de Pagamento');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(5,210.4, 'Pagável em qualquer banco até o vencimento');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(162,207, 'Vencimento');
	
	$pdf->SetFont('Arial', 'B', 11);
	$pdf->Text(178,210.4, $vencto);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,213.7, 'Cedente');
	
	$pdf->SetFont('Arial', '', 8);
	$pdf->Text(5,216.8, $cedente);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(162,213.7, 'Agência/Código Cedente');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(163,217.3, $agen_cod);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,220.4, 'Data do Documento');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(9,223.8, $data_doc);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(31,220.4, 'Nº do Documento');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(38,223.8, $num_doc.'/'.$adm);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(80,220.4, 'Espécie Doc.');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(87,223.8, $especie_doc);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(105,220.4, 'Aceite');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(111,223.8, $aceite);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(124,220.4, 'Data Processamento');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(133,223.8, $data_doc);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(162,220.4, 'Nosso Número');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(163,223.8, $nosso_numero);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,227.5, 'Uso do banco');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(48,227.5, 'Carteira');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(59,230.3, $carteira);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(81,227.5, 'Moeda');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(89,230.3, $especie);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(104,227.5, 'Quantidade');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(123,227.5, 'Valor');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(162,227.5, '(=)Valor documento');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(185,230.4, $valor);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,234, 'Instruções(Texto de responsabilidade do cedente)');
	
	$pdf->SetFont('Arial', '',8);
	$pdf->Text(5,238, $referente.':');
	
	$pdf->SetFont('Arial', '',8);
	$pdf->Text(24,238, $mes_ref);
	
	$pdf->SetXY(4,239);
	$pdf->MultiCell(150,4, $Edit12, 0, '',0); // J Justificado
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(162,234, '(-)Descontos/Abatimentos');
	
	$pdf->Text(162,241, '(-)Outras Deduções');
	
	$pdf->Text(162,248, '(+)Mora/Multa');
	
	$pdf->Text(162,255, '(+)Outros Acréscimos');
	
	$pdf->Text(162,261.5, '(=)Valor Cobrado');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(185,264.5, $valor);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,268, 'Sacado');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(25,269, $sacado);
	$pdf->Text(148,269, 'CNPJ.: '.$cnpj);
	$pdf->Text(25,272.5, $endereco);
	$pdf->Text(25,276, $cep.'     -     '.$cidade.'      -     '.$uf);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,277, 'Sacador/Avalista');
	$pdf->Text(118,277, 'Código de Caixa');
	$pdf->Text(145,281, 'Autenticação Mecânica / FICHA DE COMPENSAÇÃO');
	
	// Codigo de Barras
	$pdf->i25(4,280, $codigo_barras);
	
	$pdf->AddPage();
	}
	
	//$pdf->AutoPrint(true);
	$pdf->Output($id_zo1.".pdf","F");


//----------------------------- fim --------------------------	
}
if ($Edit2_tipo == "ASSISTENCIAL"){
	$Contribu2     = "Assitencial";
	$venci_01      = $vencto1;
//---------------------------- Inicio ------------------------
    include('func_conf.php');
	
	include('fpdf.php');
	// Inicia Codigo dos Boletos
	include('i25.php');
	
	// Inicio do Boleto
	
	$pdf = new PDF_i25();
	$pdf->Open();
	$pdf->SetAutoPageBreak(0, 0);
	$pdf->SetTopMargin(0);
	$pdf->AddPage();
	$pdf->SetDisplayMode(fullwidth, continuous);
	
	// Inicio do Loop
	while($linha = @mysql_fetch_array($resultado)) {
	
	$conta_pag = $conta_pg++;
	
	$pdf->ln();
	
	// x = horizontal y = vertical z = largura w = altura
	
	$pdf->image("../imagens/bb.png",0,0,211,303);
	
	$vencto       = $vencto1;
	$nudoc        = $linha["COD"];
	$num_doc      = $linha["COD"];
	$estado       = $linha["UF"];
	$valor        = $valor1;
	$sacado       = $linha["COND"]." ".$linha["NOME"];
	$cnpj         = $linha["CGC"];
	$endereco     = $linha["RUA"]." ".$linha["ENDERECO"].",".$linha["NUMERO"];
	$cep          = $linha["CEP"];
	$bairro       = $linha["BAIRRO"];
	$cidade       = $linha["CIDADE"];
	$uf           = $linha["UF"];
	$adm          = $linha["ADM"];
	
	$nov_valor1         = str_replace(".","",$valor1);
	$nov_valor2         = str_replace(",","",$nov_valor1);
	$valorz             = formata_numero($nov_valor2,10,0);
	$fator_vencimento 	=  fator_vencimento($vencto);
	$nudoc1             =  formata_numero($nudoc,5,0);
	$nosso_numero       =  $convenio.$nudoc1.'-'.modulo_11($convenio.$nudoc1);
	$nossonumero        =  $nudoc1;
	$conta 				=  formata_numero($conta,8,0);
	$dv 			    =  modulo_11($codigobanco.$nummoeda.$fator_vencimento.$valorz.$convenio.$nossonumero.$agencia.$conta.$carteira);
	$linha 			    =  $codigobanco.$nummoeda.$dv.$fator_vencimento.$valorz.$convenio.$nossonumero.$agencia.$conta.$carteira;
	$linha2             =  monta_linha_digitavel($linha);
	$codigo_barras      = $linha;
	$linha_digitavel    = $linha2;
	
	// Primeira Guia Recibo do Sacado
	
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Text(105,4, $conta_pag);
	
	$pdf->SetFont('Arial', 'B', 14);
	$pdf->Text(4,7, 'Banco do Brasil');
	
	$pdf->SetFont('Arial', 'B', 17);
	$pdf->Text(54,8, '001-9');
	
	$pdf->SetFont('Arial', 'B', 12);
	$pdf->Text(168,9, 'Recibo do Sacado');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,12.5, 'Local de Pagamento');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(5,15.5, 'Pagável em qualquer banco até o vencimento');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(162,12.5, 'Vencimento');
	
	$pdf->SetFont('Arial', 'B', 11);
	$pdf->Text(178,15.8, $vencto);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,19, 'Cedente');
	
	$pdf->SetFont('Arial', '', 8);
	$pdf->Text(5,22.5, $cedente);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(162,19, 'Agência/Código Cedente');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(163,22.5, $agen_cod);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,26, 'Data do Documento');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(9,29, $data_doc);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(31,26, 'Nº do Documento');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(38,29, $num_doc.'/'.$adm);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(80,26, 'Espécie Doc.');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(87,29, $especie_doc);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(105,26, 'Aceite');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(111,29, $aceite);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(124,26, 'Data Processamento');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(133,29, $data_doc);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(162,26, 'Nosso Número');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(163,29, $nosso_numero);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,33, 'Uso do banco');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(48,33, 'Carteira');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(59,36, $carteira);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(81,33, 'Moeda');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(89,36, $especie);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(104,33, 'Quantidade');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(123,33, 'Valor');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(162,33, '(=)Valor documento');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(185,36, $valor);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,39.5, 'Instruções(Texto de responsabilidade do cedente)');
	
	$pdf->SetFont('Arial', '',8);
	$pdf->Text(5,43.4, $referente.':');
	
	$pdf->SetFont('Arial', '',8);
	$pdf->Text(24,43.4, $mes_ref);
	
	$pdf->SetXY(4,44);
	$pdf->MultiCell(150,4, $Edit12, 0, '',0); // J Justificado
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(162,39.5, '(-)Descontos/Abatimentos');
	
	$pdf->Text(162,46, '(-)Outras Deduções');
	
	$pdf->Text(162,53, '(+)Mora/Multa');
	
	$pdf->Text(162,60.2, '(+)Outros Acréscimos');
	
	$pdf->Text(162,66.7, '(=)Valor Cobrado');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(185,69.7, $valor);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,73, 'Sacado');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(25,74, $sacado);
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(148,74, 'CNPJ.: '.$cnpj);
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(25,77.7, $endereco);
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(25,81.4, $cep.'     -     '.$cidade.'      -     '.$uf);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,82.8, 'Sacador/Avalista');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(118,82.8, 'Código de Caixa');
	
	$pdf->SetFont('Arial', '', 6);
	$pdf->Text(5,86.4, 'Recebimento através do cheque número___________________do Banco ___________, Esta quitação  só terá validade  após efetuada  a compensa');
	 
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(177,86.4, 'Autenticação  Mecânica');
	
	 
	// Segunda Guia Ficha do Caixa
	
	$pdf->SetFont('Arial', 'B', 14); 
	$pdf->Text(4,106,'Banco do Brasil'); 
	
	$pdf->SetFont('Arial', 'B', 17);
	$pdf->Text(54,107, '001-9');
	
	$pdf->SetFont('Arial', 'B', 12);
	$pdf->Text(175,108, 'Ficha do Caixa');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,112, 'Local de Pagamento');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(5,115, 'Pagável em qualquer banco até o vencimento');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(162,112, 'Vencimento');
	
	$pdf->SetFont('Arial', 'B', 11);
	$pdf->Text(178,115, $vencto);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,118.8, 'Cedente');
	
	$pdf->SetFont('Arial', '', 8);
	$pdf->Text(5,121.8, $cedente);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(162,118.8, 'Agência/Código Cedente');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(163,122, $agen_cod);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,125, 'Data do Documento');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(9,128.5, $data_doc);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(31,125, 'Nº do Documento');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(38,128.5, $num_doc.'/'.$adm);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(80,125, 'Espécie Doc.');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(87,128.5, $especie_doc);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(105,125, 'Aceite');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(111,128.5, $aceite);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(124,125, 'Data Processamento');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(133,128.5, $data_doc);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(162,125, 'Nosso Número');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(163,128.5, $nosso_numero);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,132.4, 'Uso do banco');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(48,132.4, 'Carteira');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(59,135.4, $carteira);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(81,132.4, 'Moeda');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(89,135.4, $especie);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(104,132.4, 'Quantidade');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(123,132.4, 'Valor');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(162,132.4, '(=)Valor documento');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(185,135.4, $valor);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,139.2, 'Instruções(Texto de responsabilidade do cedente)');
	
	$pdf->SetFont('Arial', '',8);
	$pdf->Text(5,143.4, $referente.':');
	
	$pdf->SetFont('Arial', '',8);
	$pdf->Text(24,143.4, $mes_ref);
	
	$pdf->SetXY(4,144);
	$pdf->MultiCell(150,4, $Edit12, 0, '',0); // J Justificado
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(162,139.2, '(-)Descontos/Abatimentos');
	
	$pdf->Text(162,146, '(-)Outras Deduções');
	
	$pdf->Text(162,153, '(+)Mora/Multa');
	
	$pdf->Text(162,160.2, '(+)Outros Acréscimos');
	
	$pdf->Text(162,166.7, '(=)Valor Cobrado');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(185,169.4, $valor);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,173, 'Sacado');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(25,174, $sacado);
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(148,174, 'CNPJ.: '.$cnpj);
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(25,177.7, $endereco);
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(25,181.4, $cep.'     -     '.$cidade.'      -     '.$uf);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,182.5, 'Sacador/Avalista');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(118,182.2, 'Código de Caixa');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(177,186.1, 'Autenticação  Mecânica');
	
	
	// Terceira Guia Ficha de Compensação
	
	$pdf->SetFont('Arial', 'B', 14);
	$pdf->Text(4,201,'Banco do Brasil'); 
	
	$pdf->SetFont('Arial', 'B', 17);
	$pdf->Text(54,202, '001-9');
	
	$pdf->SetFont('Arial', 'B', 12);
	$pdf->Text(85,202, $linha_digitavel); 
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,207, 'Local de Pagamento');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(5,210.4, 'Pagável em qualquer banco até o vencimento');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(162,207, 'Vencimento');
	
	$pdf->SetFont('Arial', 'B', 11);
	$pdf->Text(178,210.4, $vencto);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,213.7, 'Cedente');
	
	$pdf->SetFont('Arial', '', 8);
	$pdf->Text(5,216.8, $cedente);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(162,213.7, 'Agência/Código Cedente');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(163,217.3, $agen_cod);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,220.4, 'Data do Documento');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(9,223.8, $data_doc);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(31,220.4, 'Nº do Documento');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(38,223.8, $num_doc.'/'.$adm);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(80,220.4, 'Espécie Doc.');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(87,223.8, $especie_doc);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(105,220.4, 'Aceite');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(111,223.8, $aceite);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(124,220.4, 'Data Processamento');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(133,223.8, $data_doc);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(162,220.4, 'Nosso Número');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(163,223.8, $nosso_numero);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,227.5, 'Uso do banco');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(48,227.5, 'Carteira');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(59,230.3, $carteira);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(81,227.5, 'Moeda');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(89,230.3, $especie);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(104,227.5, 'Quantidade');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(123,227.5, 'Valor');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(162,227.5, '(=)Valor documento');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(185,230.4, $valor);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,234, 'Instruções(Texto de responsabilidade do cedente)');
	
	$pdf->SetFont('Arial', '',8);
	$pdf->Text(5,238, $referente.':');
	
	$pdf->SetFont('Arial', '',8);
	$pdf->Text(24,238, $mes_ref);
	
	$pdf->SetXY(4,239);
	$pdf->MultiCell(150,4, $Edit12, 0, '',0); // J Justificado
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(162,234, '(-)Descontos/Abatimentos');
	
	$pdf->Text(162,241, '(-)Outras Deduções');
	
	$pdf->Text(162,248, '(+)Mora/Multa');
	
	$pdf->Text(162,255, '(+)Outros Acréscimos');
	
	$pdf->Text(162,261.5, '(=)Valor Cobrado');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(185,264.5, $valor);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,268, 'Sacado');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(25,269, $sacado);
	$pdf->Text(148,269, 'CNPJ.: '.$cnpj);
	$pdf->Text(25,272.5, $endereco);
	$pdf->Text(25,276, $cep.'     -     '.$cidade.'      -     '.$uf);
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(5,277, 'Sacador/Avalista');
	$pdf->Text(118,277, 'Código de Caixa');
	$pdf->Text(145,281, 'Autenticação Mecânica / FICHA DE COMPENSAÇÃO');
	
	// Codigo de Barras
	$pdf->i25(4,280, $codigo_barras);
	
	$pdf->AddPage();
	}
	
	//$pdf->AutoPrint(true);
	$pdf->Output($id_zo1.".pdf","F");
	
	
//----------------------------- fim --------------------------	
}

if ($Email_sn == "NAO")
{
	$id_conf = Trim($id_conf_2);	
}else{
	       	
	$id_conf = $email_link;
}


//echo "arquivo Gerado com Sucesso !!!";

// ENVIA EMAIL


include_once('phpmailer/class.phpmailer.php');
		   
		   
			
$phpmail = new PHPMailer();
			

$phpmail->IsSMTP();                    // Envia por SMTP
$phpmail->Mailer   = "smtp";
$phpmail->Host     = $smtp_host;       // SMTP servers
$phpmail->SMTPAuth = true;             // Caso o servidor SMTP precise de autenticação
$phpmail->Port     = 25;
$phpmail->Username = $e_mail_2;        // SMTP username
$phpmail->Password = $sen_pas_2;       // SMTP password
$phpmail->IsHTML(true);
$phpmail->From     = $email_ret;       // Retorno CC
$phpmail->FromName = $Titulo;
$phpmail->AddAddress($id_conf);       // Destino

//$phpmail->AddAddress("isysmp@isysmp.com"); // Trocar CCo
		   
		   
$message .= "   <center><img src='http://www.sindificios.com.br/sistemaXP/imagens/Logo1.JPG'></center><br><br>
	            Sindicato dos Empregados de Edificios e Condominios Residenciais e Comerciais<br>
	            de Sao Paulo, Zelador, Porteiros, Cabineiros, Vigias, Faxineiros, Serventes e Outros<br>
	            Sede - Rua Sete de Abril, 34 Centro - Sao Paulo - Cep 01044-901<br>
		        <b>Segue em Anexo a(s) guia(s) Referente contribuicao&nbsp; $Contribu2&nbsp;de&nbsp;$venci_01</b><br><br>";
		                       
$message .= "   <table width='100%' border='0'>
                <tr>
				<td width='50%'>Nome da empresa:&nbsp;&nbsp;&nbsp;<b>$texto_1</b></td>
				<td width='30%'>CNPJ:&nbsp;&nbsp;<b>$cnpj_link</b></td>
				</tr>
				</table>";
						       
						       
$message .= "   Para Visualizar e Imprimir Faça o Download do Arquivo PDF em Anexo!&nbsp;&nbsp;<br>";
                               
$message .= "   Qualquer Duvida sobre a autenticidade deste Link ligue para 11-3123-3211 Ramal 3260 ou 3273<br><br>";
	
$message .= $men_digitada."<br>";
  
$phpmail->Subject = "Envio de Boletos";
$phpmail->Body .= " ";
$phpmail->Body .= "$message";
$phpmail->Body .= " ".nl2br($_POST['mensagem'])."<br />";
$phpmail->AddAttachment($id_zo1.".pdf");
							    
$send = $phpmail->Send();
							
if($send){
							    	
	include('../config.php');						    	
	echo "
			<html>
			
			<head>
			<title>$Titulo</title>
			<link rel='shortcut icon' href='../imagens/favicon.ico'/>
			</head>
			
			<style type=text/css>
			
			body { background-image: url(../$logo_sis);}
			
			<!--.cp {  font: bold 10px Arial; color: black}
			<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
			<!--.ld { font: bold 15px Arial; color: #000000}
			<!--.ct { FONT: 9px Arial Narrow; COLOR: #000033}
			<!--.cn { FONT: 9px Arial; COLOR: black }
			<!--.bc { font: bold 22px Arial; color: #000000 }
			--></style> 
			
			</HEAD>
	
	
	      <br>
		  <div align=center>
		  <table align=center border='15' bgcolor='#FFF8DC'  bordercolor ='$color_bor'>
		  <tr>
		  <td align=center>
		  <font face=arial><b>*** E-Mail Enviados com SUCESSO !!! ***<br>Para</b>&nbsp;$texto_1<br>
		  <b>no e-mail.:</b>&nbsp;$id_conf</br>
		  									                    
		  <table align=center>
		  <form method='POST' action='javascript:window.close()'>
		  <td><input type=image name='consulta' src='../imagens/botaoazul25.PNG'></td>
		  </form> 
		  </table>
		  </td>
		  </tr>
		  </table>
		  </div>";
													    	
}else{
		include('../config.php');						    	
						    	
	echo "
			<html>
			
			<head>
			<title>$Titulo</title>
			<link rel='shortcut icon' href='../imagens/favicon.ico'/>
			</head>
			
			<style type=text/css>
			
			body { background-image: url(../$logo_sis);}
			
			<!--.cp {  font: bold 10px Arial; color: black}
			<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
			<!--.ld { font: bold 15px Arial; color: #000000}
			<!--.ct { FONT: 9px Arial Narrow; COLOR: #000033}
			<!--.cn { FONT: 9px Arial; COLOR: black }
			<!--.bc { font: bold 22px Arial; color: #000000 }
			--></style> 
			
			</HEAD>
	
	
	      <br>
		  <div align=center>
		  <table align=center border='15' bgcolor='#FFF8DC'  bordercolor ='$color_bor'>
		  <tr>
		  <td align=center>
		  <font face=arial><b>*** E-Mail Naoo Foi Enviados Tente novamente!!! ***<br>Para</b>&nbsp;$id_conf
		  
		  <table align=center>
		  <form method='POST' action='javascript:window.close()'>
		  <td><input type=image name='consulta' src='../imagens/botaoazul25.PNG'></td>
		  </form> 
		  </table>
		  </td>
		  </tr>
		  </table>
		  </div>";
}	
  
// FIM DO ENVIA EMAIL

?>
