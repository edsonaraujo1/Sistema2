<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Gerar Boletos Caixa Economica em PDF
 Criado em Data.....: 13/11/2009
 Ultima Atualização : 24/11/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

//$timestamp = $_SERVER['REQUEST_TIME'];
//echo "Data e hora da requisição: " . 
//   date('d/m/Y - H:i:s', $timestamp);

include("../config.php");

include("../logar.php");

$tempo = 0;

ini_set("max_execution_time", 7200); // Setado para 1 hora

//set_time_limit($tempo);

$nome3 = $_SESSION["nome_log"];

// Resgata Sessao
@session_name("Val_Sind");
@session_start();

$Edit1_zx  = $_SESSION['Edit1']; // Vencimento
$Edit2_zx  = $_SESSION['Edit2']; // exercicio
$Edit3_zx  = $_SESSION['Edit3']; // iniciar em Adms 
$Edit4_zx  = $_SESSION['Edit4']; // Terminar em Adms
$Edit5_zx  = $_SESSION['Edit5'];

if (!empty($Edit3_zx)){
	
}else{
	
    $Edit3_zx = 0;
}

if (!empty($Edit4_zx)){
	
}else{
	
    $Edit4_zx = 0;
}

// Variavei usadas pelo Boleto

$for_adms      = 1;     // 1 Para Adms e 2 Para Edif
$cod_intru     = 1;     // 1 Sindificios ou 2 Fenatec

$cod_edif1     = $Edit3_zx;    // Iniciar em
$cod_edif2     = $Edit4_zx;    // Terminar em


$valor1        = "";
$vencto1       = $Edit1_zx;
$exec          = $Edit2_zx;
$data_doc      = date("d/m/Y");

$referente     = "BLOQUETO DE CONTRIBUIÇÃO SINDICAL URBANA"; 
$instrucao1    = "Até o vencimento pagável nas Lotéricas, Agências da CAIXA e Rede Bancária.";
$instrucao2    = "Documento vencido pagável somente nas Agências da CAIXA.";
$instrucao3    = "Guia vencida - cobrar multa de 10% nos trinta primeiros dias, com adicional de 2% por";
$instrucao4    = "mês subsequente de atraso e juros de mora de 1% ao mês e correção monetaria.";
$instrucao5    = "";
$conta_pg      = 1;


// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);


// Atualiza arquivo Log
$data_log = date("d/m/Y");
$hora_log = date("H:i:s"); 
$even_log = "IMPRESSAO SINDICAL. "."/".$cod_edif1;
			
$consulta_log_Z = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
	             VALUES
	             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
@mysql_query($consulta_log_Z, $link);


if ($for_adms == 1){

    $sql  = "SELECT * FROM edificios WHERE ADM >= '$cod_edif1' and ADM <= '$cod_edif2' and ATIV != 'NAO CONTRIBUINTE'  ORDER BY ADM ASC";
	
}else{
	
    $sql  = "SELECT * FROM edificios WHERE COD >= '$cod_edif1' and COD <= '$cod_edif2' and ATIV != 'NAO CONTRIBUINTE' and ADM = 0 ORDER BY COD ASC";
	
}


$resultado = @mysql_query($sql);

// Abrir tabela instrucao

$consultaz  = "SELECT * FROM instrucao WHERE Edit1 = '$cod_intru'";

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

include('fpdf.php');
// Inicia Codigo dos Boletos
include('i25.php');


ini_set("max_execution_time", 7200); // Setado para 1 hora

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
$endereco     = utf8_decode($linha["RUA"]." ".$linha["ENDERECO"].",".$linha["NUMERO"]);
$cep          = $linha["CEP"];
$bairro       = $linha["BAIRRO"];
$cidade       = $linha["CIDADE"];
$uf           = $linha["UF"];
$adm          = $linha["ADM"];


if(strlen($cnpj) < 18){
	
	$cnpj = "00.000.000/0000-00";

}

// Atualiza Tabela Aberto

$consulta_aber  = "SELECT * FROM ABERTO WHERE CONFCOD = '$nudoc' AND VENCTO = '$vencto'";

$resultado_aber = @mysql_query($consulta_aber);

$row_aber = @mysql_fetch_array($resultado_aber);

$id       = @$row_aber["id"];
$QTD_x    = @$row_aber["QTD"];

if (empty($id)){
	// Inclui

    $qtd_aber  = 1;
    $ipag4     = date('d/m/Y');
    $descri_ca = "SINDICAL";
    $local     = "...";
    $dia_x     = date('d');
    $mes_x     = date('m');
    $ano_x     = date('Y');

    $consulta_at9 = "INSERT INTO  aberto  (CONFCOD,
	                                       QTD, 	  
                                           DATA,
										   VENCTO,
										   DESCRICAO,
										   DIA,
										   MES,
										   ANO,
										   LOCAL)
                                           
								VALUES    ('$nudoc',
								           '$qtd_aber',
								           '$ipag4',
										   '$vencto',
										   '$descri_ca',
										   '$dia_x',
										   '$mes_x',
										   '$ano_x',
										   '$local')";

    @mysql_query($consulta_at9, $link);

}else{
	// Altera

    $qtd_aber = $QTD_x + 1;
    $ipag4    = date('d/m/Y');
    $hora_x   = date("H:i:s");

    $consulta_at9 = "UPDATE aberto  SET QTD 	  = '$qtd_aber',
                                        DATA	  = '$ipag4' WHERE CONFCOD = '$nudoc' AND VENCTO = '$vencto'";
	@mysql_query($consulta_at9, $link);

}

$ipag4    = date('d/m/Y');
$hora_x   = date("H:i:s");

$con_fim_his = "insert into historico_sind (COD,
                                            DATA,
									        HORA,
									        NOME,
									        ENDERECO,
									        VENCIMENTO,
									        QUANTIDADE,
									        USUARIO)
						 values
						              ('$nudoc',
									   '$ipag4',
									   '$hora_x',
									   '$sacado',
									   '$endereco',
									   '$vencto',
									   '1',
									   '$nome3')";

@mysql_query($con_fim_his, $link);

// Fim da Atualizacao do Aberto


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
$pdf->Text(159,205, '0249/'.$agen_cod);

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

$pdf->AutoPrint(true);
$pdf->Output();

@mysql_close();   

// Inicio das Funcoes do Boleto

/*
Fator vencimento, phpboleto
*/
function fator_vencimento($data) {
	$data = split("/",$data);
	$ano = $data[2];
	$mes = $data[1];
	$dia = $data[0];
    return(abs((_dateToDays("1997","10","07")) - (_dateToDays($ano, $mes, $dia))));
}

function _dateToDays($year,$month,$day)
{
    $century = substr($year, 0, 2);
    $year = substr($year, 2, 2);
    if ($month > 2) {
        $month -= 3;
    } else {
        $month += 9;
        if ($year) {
            $year--;
        } else {
            $year = 99;
            $century --;
        }
    }

    return ( floor((  146097 * $century)    /  4 ) +
            floor(( 1461 * $year)        /  4 ) +
            floor(( 153 * $month +  2) /  5 ) +
                $day +  1721119);
}

function Modulo10($X){
	$peso = 1;
	for($i=1;$i<=strlen($X);$i++){
	$peso = ($peso == 2)? 1:2;
		$num[$i] = substr($X, strlen($X)-$i,1)*$peso;
		if(($num[$i])>9){	$num[$i] = substr($num[$i],0,1)+substr($num[$i],1,1);	}
		$soma += $num[$i];
	}
	$resto = $soma % 10;
	if($resto == 0)	$resultado = 0;
	else $resultado = 10 - $resto;
	
	return $resultado;
}

function Modulo11($X){
	$peso = 2;
	for($i=strlen($X)-1;$i>=0;$i--){
		$num[$i] = substr($X, $i,1)*$peso;
		$soma += $num[$i];
		$peso++;
		if($peso == 10){	$peso=2;	}
	}
	$resto = $soma % 11;
	$resultado = 11 - $resto;
	if($resultado>9 || $resultado<=1){	$resultado=1;	}
	return $resultado;
}

function calcNossoNumero($X){
	$peso = 2;
	for($i=strlen($X)-1;$i>=0;$i--){
		$num[$i] = substr($X, $i,1)*$peso;
		$soma += $num[$i];
		$peso++;
		if($peso == 10){	$peso=2;	}
	}
	$resto = $soma % 11;
	$resultado = 11 - $resto;
	if($resultado>9){	$resultado=0;	}
	return $resultado;
}

function MUDA_CNPJ($CNPJ2){
	if(strlen($CNPJ2) == 14){
		$X = substr($CNPJ2, 0, 2).'.'.substr($CNPJ2, 2, 3).'.'.substr($CNPJ2, 5, 3).'/'.substr($CNPJ2, 8, 4).'-'.substr($CNPJ2, 12, 2);
		return $X;
	}
	elseif(strlen($CNPJ2) == 11){
		$X = substr($CNPJ2, 0, 3).'.'.substr($CNPJ2, 3, 3).'.'.substr($CNPJ2, 6, 3).'-'.substr($CNPJ2, 9, 2);
		return $X;
	}
}

function SoNumeros($X){
	$tira = array(" ", ",", ".", "-","/");
	for($i=0;$i<strlen($X);$i++){	$X = str_replace($tira[$i],"", $X);	}
	return $X;
}

function colocaZeroEsquerda($X, $digitos){
	$zeros = $digitos - strlen($X);
	for($i=0;$i<$zeros;$i++){	$x .= 0;	}
	$X = $x.$X;
	return $X;
}

function esquerda($entra,$comp){
	return substr($entra,0,$comp);
}

function direita($entra,$comp){
	return substr($entra,strlen($entra)-$comp,$comp);
}

function formata_numero($numero,$loop,$insert,$tipo = "geral") {
	if ($tipo == "geral") {
		$numero = str_replace(",","",$numero);
		while(strlen($numero)<$loop){
			$numero = $insert . $numero;
		}
	}
	if ($tipo == "valor") {
		/*
		retira as virgulas
		formata o numero
		preenche com zeros
		*/
		$numero = str_replace(",","",$numero);
		while(strlen($numero)<$loop){
			$numero = $insert . $numero;
		}
	}
	if ($tipo = "convenio") {
		while(strlen($numero)<$loop){
			$numero = $numero . $insert;
		}
	}
	return $numero;
}
function monta_linha_digitavel($linha) {

    $p1 = substr($linha, 0, 4);
    $p2 = substr($linha, 19, 5);
    $p3 = modulo_10("$p1$p2");
    $p4 = "$p1$p2$p3";
    $p5 = substr($p4, 0, 5);
    $p6 = substr($p4, 5);
    $campo1 = "$p5.$p6";

    // 2. Campo - composto pelas posiçoes 6 a 15 do campo livre
    // e livre e DV (modulo10) deste campo
    $p1 = substr($linha, 24, 10);
    $p2 = modulo_10($p1);
    $p3 = "$p1$p2";
    $p4 = substr($p3, 0, 5);
    $p5 = substr($p3, 5);
    $campo2 = "$p4.$p5";

    // 3. Campo composto pelas posicoes 16 a 25 do campo livre
    // e livre e DV (modulo10) deste campo
    $p1 = substr($linha, 34, 10);
    $p2 = modulo_10($p1);
    $p3 = "$p1$p2";
    $p4 = substr($p3, 0, 5);
    $p5 = substr($p3, 5);
    $campo3 = "$p4.$p5";

    // 4. Campo - digito verificador do codigo de barras
    $campo4 = substr($linha, 4, 1);

    $campo5 = substr($linha, 5, 14);

    return "$campo1 $campo2 $campo3 $campo4 $campo5"; 
}

?>
