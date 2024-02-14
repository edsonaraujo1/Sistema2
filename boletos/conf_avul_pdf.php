<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Gerar Boletos Banco do Brasil em PDF
 Criado em Data.....: 13/11/2009
 Ultima Atualização : 19/11/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/
include("../logar.php");

$nome3 = $_SESSION["nome_log"];

include_once('../sql_injection.php');

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// Resgata Sessao
session_name("Val_Sind");
@session_start();

$Edit1_zc  = addslashes($_SESSION['Edit1']); // Vencimento
$Edit2_zc  = addslashes($_SESSION['Edit2']); // Instrucao
$Edit3_zc  = addslashes($_SESSION['Edit3']); // Iniciar em Adms
$Edit4_zc  = addslashes($_SESSION['Edit4']); // Terminar em Adms
$Edit5_zc  = addslashes($_SESSION['Edit5']);
$impre_verso = addslashes($_SESSION['Edit5']);

if (!empty($Edit3_zc)){
	
}else{
	
    $Edit3_zc = 0;
}

if (!empty($Edit4_zc)){
	
}else{
	
    $Edit4_zc = 0;
}

// Variavei usadas pelo Boleto

$for_adms      = 2;     // 1 Para Adms e 2 Para Edif
$cod_intru     = $Edit2_zc;     // Instrucao

$cod_edif1     = $Edit3_zc; // Iniciar em 
$cod_edif2     = $Edit4_zc; // Terminar em
 
$valor1        = "";
$vencto1       = $Edit1_zc;

// Abrir tabela instrucao

$consultaz  = "SELECT * FROM instrucao WHERE Edit1 = '$cod_intru'";

$resultadoz = @mysql_query($consultaz);

$rowz = @mysql_fetch_array($resultadoz);

$Edit2      = @$rowz['Edit2'];
$Edit3      = @$rowz['Edit3'];
$Edit12	    = @$rowz["Edit12"];
$Edit13	    = @$rowz["Edit13"];
$Edit14	    = @$rowz["Edit14"];
$Edit15	    = @$rowz["Edit15"];
$Edit16	    = @$rowz["Edit16"];
$Edit17	    = @$rowz["Edit17"];

$sed_agecho = trim($Edit13)."-".trim($Edit14)."/".trim($Edit16)."-".$Edit17;

$codigobanco   = "001";
$nummoeda 	   = "9";
$cedente       = $Edit2;
$pagavel_1     = "Pagável em qualquer banco até o vencimento";
$agen_cod      = $sed_agecho; // "1202-5/17727-X";
$agencia       = trim($Edit13);
$conta         = trim($Edit16);
$data_doc      = date("d/m/Y");
$especie_doc   = "RC";
$aceite        = "N";
$convenio      = $Edit3;
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


// Atualiza arquivo Log
$data_log = date("d/m/Y");
$hora_log = date("H:i:s"); 
$even_log = "IMPRESSAO CONF/ASSIST. "."/".$cod_edif1;
			
$consulta_log_Z = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
	             VALUES
	             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
@mysql_query($consulta_log_Z, $link);


if ($for_adms == 1){

    $sql  = "SELECT * FROM edificios WHERE ADM >= '$cod_edif1' and ADM <= '$cod_edif2' and ATIV != 'NAO CONTRIBUINTE'";
	
//    $sql = "INSERT INTO gerador_conf SELECT * FROM edificios WHERE ADM >= '$cod_edif1' and ADM <= '$cod_edif2' and ATIV != 'NAO CONTRIBUINTE' ORDER BY ADM ASC";
	
}else{
	
    $sql  = "SELECT * FROM edificios WHERE COD >= '$cod_edif1' and COD <= '$cod_edif2' and ATIV != 'NAO CONTRIBUINTE'";

//    $sql = "INSERT INTO gerador_conf SELECT * FROM edificios WHERE COD >= '$cod_edif1' and COD <= '$cod_edif2' and ATIV != 'NAO CONTRIBUINTE'  ORDER BY COD";
}

$resultado = @mysql_query($sql);


// Inicio do Loop
while($linha = @mysql_fetch_array($resultado)) {

$vencto       = $vencto1;
$id           = $linha["id"];
$nudoc1        = $linha["COD"];
$num_doc1      = $linha["COD"];
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
$ativ_e       = $linha["ATIV"];     
$e_mail_ed    = $linha["EMAIL"];
$tipo_imo     = $linha["TIPOIMOV"];
$zona         = $linha["ZONA"];     
$date_1       = date('d/m/Y');
$hora         = date("H:i:s");
$multa        = 0;
$juros        = 0;
$correcao     = 0;
$qtd_inst     = 1;
$tipo_cont_1  = '';
$situa_cont   = 'EM ABERTO';

IF (empty($valor)){
	
	$valor = 0;
}


//echo $sacado."<br>";
//echo $nudoc1."<br>";

// Verifica se Boleto ja foi gerado

$consulta_gera  = "SELECT * FROM gerador_conf WHERE COD = '$nudoc1' AND VENCTO = '$vencto1'  AND TIPO_CONT = '$tipo_cont_1'";

$resultado_gera = @mysql_query($consulta_gera);

$row_gera = @mysql_fetch_array($resultado_gera);

$id_gera  = @$row_gera["controle"];
$QTD      = @$row_gera["QTD"];

//echo $id_gera."<br>";



if (empty($id_gera)){
	// Gera Boleto (Inclui)
	
//	echo "entrei aqui"."<br>";

		$consulta1 = "INSERT INTO gerador_conf (COD,
											    ATIV,
		                                    	DATA,
												NOME,
												ENDERECO,
												CEP,
												BAIRRO,
												UF,
												CGC,
												TIPOIMOV,
												ZONA,
												EMAIL,
												ADM,
												HORA,
												VENCTO,
												VALOR,
												MULTA,
												JUROS,
												CORRECAO,
										        LOG_SSOC,
												QTD,
												TIPO_CONT,
												SITUACAO,
												INSTRUCAO)
		                VALUES
		                                  ('$nudoc1',
										   '$ativ_e',
										   '$date_1',
										   '$sacado',
										   '$endereco',
										   '$cep',
										   '$bairro',
										   '$uf',
										   '$cnpj',
										   '$tipo_imo',
										   '$zona',
										   '$e_email_ed',
										   '$adm',
										   '$hora',
										   '$vencto',
										   '$valor',
										   '$multa',
										   '$juros',
										   '$correcao',
										   '$nome3',
										   '$qtd_inst',
										   '$tipo_cont_1',
										   '$situa_cont',
										   '$Edit2_zc')";


/*
echo $vencto."<br>";
echo $nudoc1."<br>";
echo $num_doc1."<br>";
echo $estado."<br>";
echo $valor."<br>";
echo $sacado."<br>";
echo $cnpj."<br>";
echo $endereco."<br>";
echo $cep."<br>";
echo $bairro."<br>";
echo $cidade."<br>";
echo $uf."<br>";
echo $adm."<br>";
echo $ativ_e."<br>";     
echo $e_mail_ed."<br>";
echo $tipo_imo."<br>";
echo $zona."<br>";     
echo $date_1."<br>";
echo $hora."<br>";
echo $multa."<br>";
echo $juros."<br>";
echo $correcao."<br>";
*/
		
	mysql_query($consulta1, $link) or
		
		die("
		     <br>
		     <br>
		     
			 <div align=center>
		
		     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
		     <tr>
		     <td>
		     <font face=arial><b>*** Falha na inclusao !!! ***</b>
		     <table align=center>
		     <form method='POST' action='confederativa_adms1.php'>
		     <td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
		     </form> 
		     </table>
		     </td>
		     </tr>
		     </table>
		     </div>");
	
}else{

	$so_qt_nov = $QTD + 1;
	$date_3x   = date('d/m/Y'). " as ".date("H:i:s");
	
	$consulta_upd = "UPDATE gerador_conf  SET QTD 	      = '$so_qt_nov',
                                              DATA_EMI	  = '$date_3x' WHERE COD = '$nudoc1' AND VENCTO = '$vencto1'  AND TIPO_CONT = '$tipo_cont_1'";
	@mysql_query($consulta_upd, $link);

	
}

}

//break;
// Abre Arquivo Gerado


if ($for_adms == 1){

    $sql_x  = "SELECT * FROM gerador_conf WHERE ADM >= '$cod_edif1' and ADM <= '$cod_edif2' and VENCTO = '$vencto'  AND TIPO_CONT = '$tipo_cont_1' ORDER BY ADM ASC";
	
}else{
	
    $sql_x  = "SELECT * FROM gerador_conf WHERE COD >= '$cod_edif1' and COD <= '$cod_edif2' and VENCTO = '$vencto'  AND TIPO_CONT = '$tipo_cont_1' ORDER BY COD";
}

$resultado_fim = @mysql_query($sql_x);

$sed_agecho = trim($Edit13)."-".trim($Edit14)."/".trim($Edit16)."-".$Edit17;


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
while($linha1 = @mysql_fetch_array($resultado_fim)) {

$conta_pag = $conta_pg++;

$pdf->ln();

// x = horizontal y = vertical z = largura w = altura

$pdf->image("../imagens/bb.png",0,0,211,303);

$vencto       = $vencto1;
$nudoc        = $linha1["controle"];
//$num_doc      = $linha1["COD"];
$num_doc      = $linha1["controle"];
$estado       = $linha1["UF"];
$valor        = $valor1;
$sacado       = $linha1["COND"]." ".$linha1["NOME"];
$cnpj         = $linha1["CGC"];
$endereco     = $linha1["RUA"]." ".$linha1["ENDERECO"].",".$linha1["NUMERO"];
$cep          = $linha1["CEP"];
$bairro       = $linha1["BAIRRO"];
$cidade       = $linha1["CIDADE"];
$uf           = $linha1["UF"];
$adm          = $linha1["ADM"];
$prorr_ga     = $linha1["PRORROGA"];


IF (!empty($prorr_ga)){
	
	$vencto = $prorr_ga;
	
}

IF ($valor == 0){
	
	$valor = '';
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
    $descri_ca = "CONF./ASSIST.";
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

$con_fim_his = "insert into historico_conf (COD,
                                            DATA,
									        HORA,
									        NOME,
									        ENDERECO,
									        VENCIMENTO,
									        QUANTIDADE,
									        USUARIO,
											ADM,
											CEP)
						 values
						              ('$nudoc',
									   '$ipag4',
									   '$hora_x',
									   '$sacado',
									   '$endereco',
									   '$vencto',
									   '1',
									   '$nome3',
									   '$adm',
									   '$cep')";

@mysql_query($con_fim_his, $link);

// Fim da Atualizacao do Aberto


$nov_valor1         = str_replace(".","",$valor1);
$nov_valor2         = str_replace(",","",$nov_valor1);
$valorz             = formata_numero($nov_valor2,10,0);
$fator_vencimento 	=  fator_vencimento($vencto);
$nudoc1             =  formata_numero($nudoc,5,0);
$nosso_numero       =  $convenio.$nudoc1.'-'.modulo_11($convenio.$nudoc1);
$nossonumero        =  $nudoc1;
$conta 				=  formata_numero($conta,8,0);
$dv 			    =  modulo_11($codigobanco.$nummoeda.$fator_vencimento.$valorz.$convenio.$nossonumero.$agencia.$conta.$carteira);
$linha_cb  	        =  $codigobanco.$nummoeda.$dv.$fator_vencimento.$valorz.$convenio.$nossonumero.$agencia.$conta.$carteira;
$linha2_cb          =  monta_linha_digitavel($linha_cb);
$codigo_barras      = $linha_cb;
$linha_digitavel    = $linha2_cb;
//$impre_verso        = 0;

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
$pdf->Text(5,15.5, $pagavel_1);

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
$pdf->Text(38,29, $nudoc1.'/'.$adm);

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
$pdf->Text(5,115, $pagavel_1);

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
$pdf->Text(38,128.5, $nudoc1.'/'.$adm);

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
$pdf->Text(5,210.4, $pagavel_1);

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
$pdf->Text(38,223.8, $nudoc1.'/'.$adm);

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


if ($impre_verso == "SIM"){
	

	$pdf->AddPage();
	
	// Imprime verso
	
	$pdf->image("../imagens/bb_verso.jpg",0,0,211,303);
	
	$pdf->SetFont('Arial', 'B', 13);
	$pdf->Text(163,12, 'Impresso');
	$pdf->Text(164,16, 'Especial');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(166,21, '000000000');
	$pdf->Text(167,25, 'xxxxxxxxx');
	
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Text(166,29, 'CORREIOS');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(25,67, 'Destinatario:');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(25,74, $sacado);
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Text(130,74, $num_doc.'/'.$adm);
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(25,77.7, $endereco);
	$pdf->Text(25,81.4, $cep.'     -     '.$cidade.'      -     '.$uf);

}

$pdf->AddPage();

}

$pdf->AutoPrint(true);
$pdf->Output();
@mysql_close(); 

@session_start();

unset ($_SESSION['Edit1']);
unset ($_SESSION['Edit2']);
unset ($_SESSION['Edit3']); 
unset ($_SESSION['Edit4']);
unset ($_SESSION['Edit5']);
unset ($_SESSION['nurecno']);

// Inicio das Funcoes do Boleto

/*
  Fator vencimento Modulo 10 e 11 
  Gerador de Linha digitavel
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

function modulo_10($num) { 
	$numtotal10 = 0;
	$fator = 2;
 
	for ($i = strlen($num); $i > 0; $i--) {
		$numeros[$i] = substr($num,$i-1,1);
		$parcial10[$i] = $numeros[$i] * $fator;
		$numtotal10 .= $parcial10[$i];
		if ($fator == 2) {
			$fator = 1;
		}
		else {
			$fator = 2; 
		}
	}
	
	$soma = 0;
	for ($i = strlen($numtotal10); $i > 0; $i--) {
		$numeros[$i] = substr($numtotal10,$i-1,1);
		$soma += $numeros[$i]; 
	}
	$resto = $soma % 10;
	$digito = 10 - $resto;
	if ($resto == 0) {
		$digito = 0;
	}

	return $digito;
}

function modulo_11($num, $base=9, $r=0) {
	$soma = 0;
	$fator = 2; 
	for ($i = strlen($num); $i > 0; $i--) {
		$numeros[$i] = substr($num,$i-1,1);
		$parcial[$i] = $numeros[$i] * $fator;
		$soma += $parcial[$i];
		if ($fator == $base) {
			$fator = 1;
		}
		$fator++;
	}
	if ($r == 0) {
		$soma *= 10;
		$digito = $soma % 11;
		
		//corrigido
		if ($digito == 10) {
			$digito = "X";
		}

		if (strlen($num) == "43") {
			//então estamos checando a linha digitável
			if ($digito == "0" or $digito == "X" or $digito > 9) {
					$digito = 1;
			}
		}
		return $digito;
	} 
	elseif ($r == 1){
		$resto = $soma % 11;
		return $resto;
	}
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
