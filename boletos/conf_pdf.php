<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Gerar Boletos Banco do Brasil em PDF
 Criado em Data.....: 13/11/2009
 Ultima Atualização : 19/11/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

//ini_set('display_errors',1);
//ini_set('display_startup_erro', 1);
//error_reporting(E_ALL);


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

$Edit1_zc     = addslashes($_SESSION['Edit1']); // Vencimento
$Edit2_zc     = addslashes($_SESSION['Edit2']); // Instrucao
$Edit3_zc     = addslashes($_SESSION['Edit3']); // Tipo Contribuição
$Edit4_zc     = addslashes($_SESSION['Edit4']); // Exercicio
$Edit5_zc     = addslashes($_SESSION['Edit5']); // Imprime Verso
$Edit6_zc     = addslashes($_SESSION['Edit6']); // Imprimir para Adms ou Edif
$Edit7_zc     = addslashes($_SESSION['Edit7']); // Iniciar em Cod
$Edit8_zc     = addslashes($_SESSION['Edit8']); // Terminar em Cod
$Edit9_zc     = addslashes($_SESSION['Edit9']); // Enviar por Email
$Edit10_zc    = addslashes($_SESSION['Edit10']); // Email
$impre_verso  = addslashes($_SESSION['Edit5']);
$nurecno      = addslashes($_SESSION['nurecno']);

$sogera_1 = 'NAO';
/*
echo 'vencto '.$Edit1_zc."<br>";
echo 'instru '.$Edit2_zc."<br>";
echo 'tipo '.$Edit3_zc."<br>";
echo 'exec '.$Edit4_zc."<br>";
echo 'verso '.$Edit5_zc."<br>";
echo 'adms edi '.$Edit6_zc."<br>";
echo 'cod 1'.$Edit7_zc."<br>";
echo 'cod 2'.$Edit8_zc."<br>";
echo 'email '.$Edit9_zc."<br>";
echo 'end '.$Edit10_zc."<br><br>";
*/

// Variavei usadas pelo Boleto

if ($Edit6_zc == 'EMPRESAS'){
	
	$for_adms  = 2;     // 1 Para Adms e 2 Para Edif
}
if ($Edit6_zc == 'CONTABILIDADE'){
	
	$for_adms  = 1;     // 1 Para Adms e 2 Para Edif
}
if ($Edit6_zc == 'ADMINISTRADORA'){
	
	$for_adms  = 1;     // 1 Para Adms e 2 Para Edif
}


if ($Edit3_zc == 'CONFEDERATIVA' OR $Edit3_zc == 'ASSISTENCIAL'){


     include('funcoes_bole1.php');

		$cod_intru     = $Edit2_zc;     // Instrucao
		
		$cod_edif1     = $Edit7_zc; // Iniciar em 
		$cod_edif2     = $Edit8_zc; // Terminar em
		 
		$valor1        = "";
		$vencto1       = $Edit1_zc;
		
		// Abrir tabela instrucao
		
		$consultaz  = "SELECT * FROM instrucao WHERE Edit1 = '$Edit2_zc'";
		
		$resultadoz = @mysql_query($consultaz);
		
		$rowz = @mysql_fetch_array($resultadoz);
		
		$Edit2      = @$rowz['Edit2']; // sacado nome
		$Edit3      = @$rowz['Edit3']; // cod sindical
		$Edit4	    = @$rowz["Edit4"]; // Cnpj
		$Edit5	    = @$rowz["Edit5"]; // endereco
		$Edit6	    = @$rowz["Edit6"]; // numero
		$Edit7	    = @$rowz["Edit7"]; // Bairro
		$Edit8	    = @$rowz["Edit8"]; // Cep
		$Edit9	    = @$rowz["Edit9"]; // Cidade
		$Edit10	    = @$rowz["Edit10"]; // Uf
		$Edit12	    = @$rowz["Edit12"]; 
		$Edit11	    = @$rowz["Edit12"];
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
		while($linha = @mysql_fetch_array($resultado)  OR $nurecno > 0) {
		
		$vencto       = $vencto1;
		$id           = $linha["id"];
		$nudoc1       = $linha["COD"];
		$num_doc1     = $linha["COD"];
		$estado       = $linha["UF"];
		$valor        = $valor1;
		$sacado       = retirar_carac($linha["COND"]." ".$linha["NOME"]);
		$cnpj         = $linha["CGC"];
		$endereco     = retirar_carac($linha["RUA"]." ".$linha["ENDERECO"].",".$linha["NUMERO"]);
		$cep          = $linha["CEP"];
		$bairro       = retirar_carac($linha["BAIRRO"]);
		$cidade       = retirar_carac($linha["CIDADE"]);
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
		$tipo_cont_1  = $Edit3_zc;
		$situa_cont   = 'EM ABERTO';
		$date_3p      = date('d/m/Y'). " as ".date("H:i:s");
		
		IF (empty($valor)){
			
			$valor = 0;
		}
		
		//echo $sacado."<br>";
		//echo $nudoc1."<br>";
		
		// Verifica se Boleto ja foi gerado
		
		$consulta_gera  = "SELECT * FROM gerador_conf WHERE COD = '$nudoc1' AND VENCTO = '$vencto1' AND TIPO_CONT = '$tipo_cont_1'";
		
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
														DATA_EMI,
														TIPO_CONT,
														SITUACAO,
														INSTRUCAO,
														EXEC)
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
												   '$date_3p',
												   '$tipo_cont_1',
												   '$situa_cont',
												   '$Edit2_zc',
												   '$Edit4_zc')";
		
		
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
		echo $tipo_cont_1."<br>";
		echo $situa_cont."<br>";
		
		break;
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
		$nurecno = $nurecno -1;
		if ($nurecno == 0){
			//exit;
		}
		 
		}
if ($sogera_1 == 'NAO'){
	
		
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
		$controle_zta = str_pad($nudoc, 12, '0', STR_PAD_LEFT);
		//$cnpj         = $controle_zta;

		//$num_doc      = $linha1["COD"];
		$num_doc      = $linha1["controle"];
		$estado       = $linha1["UF"];
		$valor        = $valor1;
		$sacado       = retirar_carac($linha1["COND"]." ".$linha1["NOME"]);
		$cnpj         = $linha1["CGC"];
		
		$endereco     = retirar_carac($linha1["RUA"]." ".$linha1["ENDERECO"].",".$linha1["NUMERO"]);
		$cep          = $linha1["CEP"];
		$bairro       = retirar_carac($linha1["BAIRRO"]);
		$cidade       = retirar_carac($linha1["CIDADE"]);
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
			
			$pdf->image("../imagens/bb_verso2.jpg",0,0,211,303);
			
			$pdf->SetFont('Arial', 'B', 13);
			$pdf->Text(163,12, '');
			$pdf->Text(164,16, '');
			
			$pdf->SetFont('Arial', '', 9);
			$pdf->Text(166,21, '');
			$pdf->Text(167,25, '');
			
			$pdf->SetFont('Arial', 'B', 9);
			$pdf->Text(166,29, '');
			
			// Destinatario
			$pdf->SetFont('Arial', '', 7);
			      //   col,Lin
			$pdf->Text(30,170, 'Destinatário:');
			
			$pdf->SetFont('Arial', '', 9);
			$pdf->Text(30,174, $sacado);
			$pdf->SetFont('Arial', 'B', 9);
			$pdf->Text(145,174, ''.colocaZeroEsquerda($num_doc,6).'/'.colocaZeroEsquerda($adm,4).'');
			$pdf->SetFont('Arial', '', 9);
			$pdf->Text(30,177.7, $endereco);
			$pdf->Text(32,181.4, $cep.'     -     '.$cidade.'      -     '.$uf);

			// Remetente
			$pdf->SetFont('Arial', '', 7);
			      //   col,Lin
			$pdf->Text(65,224, 'Remetente:');
			
			$pdf->SetFont('Arial', '', 9);
			$pdf->Text(66,228, $Edit2);
			$pdf->SetFont('Arial', 'B', 9);
			$pdf->Text(170,228, ''); //.colocaZeroEsquerda($adm,4).'');
			$pdf->SetFont('Arial', '', 9);
			$pdf->Text(66,231.7, $Edit5. ", ". $Edit6);
			$pdf->Text(66,235.4, $Edit8.'    -     '.$Edit9.'      -     '.$Edit10);
			
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
		unset ($_SESSION['Edit6']);
		unset ($_SESSION['Edit7']);
		unset ($_SESSION['Edit8']);
		unset ($_SESSION['Edit9']);
		unset ($_SESSION['Edit10']);
		unset ($_SESSION['nurecno']);
		
}		
		
		
}else{
	
	    // Boleto Sindical
     include('funcoes_bole2.php');

		// Variavei usadas pelo Boleto
		
		
		if ($Edit6_zc == 'EMPRESAS'){
			
			$for_adms  = 2;     // 1 Para Adms e 2 Para Edif
		}
		if ($Edit6_zc == 'CONTABILIDADE'){
			
			$for_adms  = 1;     // 1 Para Adms e 2 Para Edif
		}
		if ($Edit6_zc == 'ADMINISTRADORA'){
			
			$for_adms  = 1;     // 1 Para Adms e 2 Para Edif
		}
		
		$cod_intru     = $Edit2_zc;     // 1 Sindificios ou 2 Fenatec
		
		$cod_edif1     = $Edit7_zc;    // Iniciar em
		$cod_edif2     = $Edit8_zc;    // Terminar em
		
		
		$valor1        = "";
		$vencto1       = $Edit1_zc;
		$exec          = $Edit4_zc;
		$data_doc      = date("d/m/Y");
		
		
		// Abrir tabela instrucao
		
		$consultaz  = "SELECT * FROM instrucao WHERE Edit1 = '". anti_sql_injection($cod_intru) ."'";
		
		$resultadoz = @mysql_query($consultaz);
		
		$rowz = @mysql_fetch_array($resultadoz);
		
		$Edit2      = @$rowz['Edit2'];
		$Edit3      = @$rowz['Edit3'];
		$Edit4      = @$rowz['Edit4'];
		$Edit5      = @$rowz['Edit5'];
		$Edit6      = @$rowz['Edit6'];
		$Edit10	    = @$rowz["Edit10"];  // Uf
		$Edit11	    = @$rowz["Edit11"];
		$Edit12	    = @$rowz["Edit12"];
		$Edit13	    = @$rowz["Edit13"];
		$Edit14	    = @$rowz["Edit14"];
		$Edit15	    = @$rowz["Edit15"];
		$Edit16	    = @$rowz["Edit16"];
		$Edit17	    = @$rowz["Edit17"];
		$Edit18	    = @$rowz["Edit18"];
		
		$sed_agecho = trim($Edit13)."/".trim($Edit14).".".trim($Edit15).".".trim($Edit16)."-".$Edit17;
		
		$sed_agecho_2 = trim($Edit13)."/".trim($Edit15);
		
		$agen_cod      = $Edit3;    // "020.501.86200-0";
		$end_cedente   = $Edit5;    // "RUA SETE DE ABRIL";
		$num_cedente   = $Edit6;    // "34";
		$cnpj_cedente  = $Edit4;    // "43.070.481/0001-14";
		
		$Edit7 = @$rowz["Edit7"];   // Bairro
		$Edit8 = @$rowz["Edit8"];   // Cep
		$Edit9 = @$rowz["Edit9"];   // Cidade
		
 		
		//$referente     = "BLOQUETO DE CONTRIBUIÇÃO SINDICAL URBANA"; 
		//$instrucao1    = "Até o vencimento pagável nas Lotéricas, Agências da CAIXA e Rede Bancária.";
		//$instrucao2    = "Documento vencido pagável somente nas Agências da CAIXA.";
		//$instrucao3    = "Guia vencida - cobrar multa de 10% nos trinta primeiros dias, com adicional de 2% por";
		//$instrucao4    = "mês subsequente de atraso e juros de mora de 1% ao mês e correção monetaria.";
		//$instrucao5    = "";
		$conta_pg      = 1;
		
		
		// Atualiza arquivo Log
		$data_log = date("d/m/Y");
		$hora_log = date("H:i:s"); 
		$even_log = "IMPRESSAO SINDICAL. "."/".$cod_edif1;
					
		$consulta_log_Z = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
					
		@mysql_query($consulta_log_Z, $link);
		
		
		if ($for_adms == 1){
		
		    $sql  = "SELECT * FROM edificios WHERE ADM >= '$cod_edif1' and ADM <= '$cod_edif2' and ATIV != 'NAO CONTRIBUINTE' ORDER BY ADM ASC";
			
		//    $sql = "INSERT INTO gerador_conf SELECT * FROM edificios WHERE ADM >= '$cod_edif1' and ADM <= '$cod_edif2' and ATIV != 'NAO CONTRIBUINTE' ORDER BY ADM ASC";
			
		}else{
			
		    $sql  = "SELECT * FROM edificios WHERE COD >= '$cod_edif1' and COD <= '$cod_edif2' and ATIV != 'NAO CONTRIBUINTE' ORDER BY ADM ASC";
		
		//    $sql = "INSERT INTO gerador_conf SELECT * FROM edificios WHERE COD >= '$cod_edif1' and COD <= '$cod_edif2' and ATIV != 'NAO CONTRIBUINTE'  ORDER BY ADM ASC";
		}
		
		$resultado = @mysql_query($sql);
		
		
		// Inicio do Loop
		while($linha = @mysql_fetch_array($resultado) OR $nurecno > 0) {
		
		$vencto       = $vencto1;
		$id           = $linha["id"];
		$nudoc1       = $linha["COD"];
		$num_doc1     = $linha["COD"];
		$estado       = $linha["UF"];
		$valor        = $valor1;
		$sacado       = retirar_carac($linha["COND"]." ".$linha["NOME"]);
		$cnpj         = $linha["CGC"];
		$endereco     = retirar_carac($linha["RUA"]." ".$linha["ENDERECO"].",".$linha["NUMERO"]);
		$cep          = $linha["CEP"];
		$bairro       = retirar_carac($linha["BAIRRO"]);
		$cidade       = retirar_carac($linha["CIDADE"]);
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
		$tipo_cont_1  = 'SINDICAL';
		$situa_cont   = 'EM ABERTO';
		
		IF (empty($valor)){
			
			$valor = 0;
		}

		if(strlen($cep) < 9 ){
			
			$cep = mask($cep,'#####-###');
		}
		
		
		if(strlen($cnpj) < 18){
			
			//$cnpj = "00.000.000/0000-00";
			$cnpj = mask($cnpj,'##.###.###/####-##');
		
		}
		
		//echo $sacado."<br>";
		//echo $nudoc1."<br>";
		
		// Verifica se Boleto ja foi gerado
		
		$consulta_gera  = "SELECT * FROM gerador_conf WHERE COD = '$nudoc1' AND VENCTO = '$vencto1' AND TIPO_CONT = '$tipo_cont_1'";
		
		$resultado_gera = @mysql_query($consulta_gera);
		
		$row_gera = @mysql_fetch_array($resultado_gera);
		
		$id_gera  = @$row_gera["controle"];
		$QTD      = @$row_gera["QTD"];
		
		//echo $id_gera."<br>";
		
		
		
		if (empty($id_gera)){
			// Gera Boleto (Inclui)
			
		//	echo "entrei aqui"."<br>";
		
				$consulta1a = "INSERT INTO gerador_conf (COD,
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
														INSTRUCAO,
														EXEC,
														CIDADE)
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
												   '$cod_intru',
												   '$exec',
												   '$cidade')";
		
		
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
				
			@mysql_query($consulta1a, $link) or
				
				die("
				     <br>
				     <br>
				     
					 <div align=center>
				
				     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
				     <tr>
				     <td>
				     <font face=arial><b>*** Falha na inclusao !!! (1)***</b>
				     <table align=center>
				     <form method='POST' action='confederativa_adms1.php'>
				     <td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
				     </form> 
				     </table>
				     </td>
				     </tr>
				     </table>
				     </div><br>" . mysql_error() . "<br>" . mysql_errno());
			
		}else{
		
			$so_qt_nov = $QTD + 1;
			$date_3x   = date('d/m/Y'). " as ".date("H:i:s");
			
			$consulta_upd = "UPDATE gerador_conf  SET QTD 	      = '$so_qt_nov',
		                                              DATA_EMI	  = '$date_3x',
													  CIDADE	  = '$cidade' WHERE COD = '$nudoc1' AND VENCTO = '$vencto1' AND TIPO_CONT = '$tipo_cont_1'";
			@mysql_query($consulta_upd, $link);
		
			
		}
		
		$nurecno = $nurecno -1;
		
		if ($nurecno == 0){
			//echo 'parei';
			//break;
		}

        //echo $nurecno."<br>";
		}
		
		//break;
		// Abre Arquivo Gerado

if ($sogera_1 == 'NAO'){		
		
		if ($for_adms == 1){
		
		    $sql_x  = "SELECT * FROM gerador_conf WHERE ADM >= '$cod_edif1' and ADM <= '$cod_edif2' and VENCTO = '$vencto' AND TIPO_CONT = '$tipo_cont_1' ORDER BY ADM ASC";
			
		}else{
			
		    $sql_x  = "SELECT * FROM gerador_conf WHERE COD >= '$cod_edif1' and COD <= '$cod_edif2' and VENCTO = '$vencto' AND TIPO_CONT = '$tipo_cont_1' ORDER BY COD";
		}
		
		$resultado_fim = @mysql_query($sql_x);
		
		
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
		while($linha = @mysql_fetch_array($resultado_fim)) {
		
		$conta_pag = $conta_pg++;
		
		$pdf->ln();
		
		// x = horizontal y = vertical z = largura w = altura
		
		$pdf->image("../imagens/cef.jpg",0,0,211,303);  // logo-caixa.png
		
		$vencto       = $vencto1;
		$nudoc        = $linha["controle"];
		$num_doc      = $linha["controle"];
		$cod_edi_x    = $linha["COD"];
		$controle_zta = str_pad($num_doc, 12, '0', STR_PAD_LEFT);
		//$cnpj         = $controle_zta;
		
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
		$prorr_ga     = $linha1["PRORROGA"];
		
		
		IF (!empty($prorr_ga)){
			
			$vencto = $prorr_ga;
			
		}
		
		IF ($valor == 0){
			
			$valor = '';
		}
		
		
		if(strlen($cep) < 9 ){
			
			$cep = mask($cep,'#####-###');
		}
		
		
		if(strlen($cnpj) < 18){
			
			//$cnpj = "00.000.000/0000-00";
			$cnpj = mask($cnpj,'##.###.###/####-##');
		
		}
		
		
		$final_1 = str_pad($cod_edi_x, 14, '0', STR_PAD_LEFT);

		$cg1 = substr($final_1,0,2);
		$cg2 = substr($final_1,2,3);
		$cg3 = substr($final_1,5,3);
		$cg4 = substr($final_1,8,4);
		$cg5 = substr($final_1,12,2);
		
		// Usar caso nao tenha CNPJ	
		//$cnpj = $cg1.".".$cg2.".".$cg3."/".$cg4.".".$cg5;

		
		
		// Atualiza Tabela Aberto
		
		$consulta_aber  = "SELECT * FROM ABERTO WHERE CONFCOD = '". anti_sql_injection($nudoc) ."' AND VENCTO = '". anti_sql_injection($vencto) ."'";
		
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
		                                        DATA	  = '$ipag4' WHERE CONFCOD = '". anti_sql_injection($nudoc) ."' AND VENCTO = '". anti_sql_injection($vencto) ."'";
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
		    $cod_cnae    = 8;  // 9
		    $tipo_ent    = 2; // 1 = Sindicato, 2 = Federação, 3 = Confederação, 4 = MTE/CEES    Alterado
		    $sitcs       = 77;
			$cod_cont    = SoNumeros($Edit3);
		    $cnae        = 1;  // 3
		    $zero1       = 1; // 0
		    
			$nosso       = SoNumeros($cnpj);
		    //$nosso2      = substr($nosso,0,12);
		    
		    //$nosso       = substr($controle_zta,0,12);
		    
		    $nosso2      = substr($controle_zta,0,12);
		    
		    $codent      = $Edit3;
		    $agenced     = $sed_agecho;
		    $cedente     = $Edit2;
		    $local       = "PREFERENCIALMENTE NAS LOTÉRICAS ATÉ O VALOR LIMITE";
		
			$campo1      = $banco.$moeda.$sico.substr($cod_ent,0,3);
			$DV_campo1   = Modulo10($campo1);
			$campo1a     = substr($campo1,0,5).'.'.substr($campo1,5,4).$DV_campo1.'   ';
		
			$campo2      = substr($cod_ent,3,5).$cod_cnae.$tipo_ent.$sitcs.substr($nosso2,0,4);
			$DV_campo2   = Modulo10($campo2);
			
			//$campo2      = substr($cod_ent,3,5).$cod_cnae.$tipo_ent.$sitcs.$nosso2;
            //$DV_campo2   = Modulo10($campo2);

			
		    $campo2a     = substr($campo2,0,5).'.'.substr($campo2,5,5).$DV_campo2.'   ';
		
			//$campo3      = substr($nosso2,4,8).$cnae.$zero1;
			
			$campo3      = substr($nosso2,4,8).$cnae.$zero1;
			
			$DV_campo3   = Modulo10($campo3);
		    $campo3a     = substr($campo3,0,5).'.'.substr($campo3,5,5).$DV_campo3.'    ';
		
			$campo4      = substr($campo1,0,4).$fav_venc.$valor.substr($campo1,4,5).$campo2.$campo3;
			$DV_campo4   = Modulo11($campo4);
		    $campo4a     = $DV_campo4.'    ';
		
		    $campo5a     = $fav_venc.$valor; 
		
			$DV_CBarra   = Modulo11($banco.$moeda.$FatorVencimento.$valor.$nosso2.substr($agencia_cod_cedente,0,15));
			//$CodigoBarra = $campo1.$DV_campo1.$campo2.$DV_campo2.$campo3.$DV_campo3.$DV_campo4.$campo5a;
			
		    $CodigoBarra = 	Trim(substr($campo1,0,4).$DV_campo4.$campo5a.substr($campo1,4,5).$campo2.$campo3);
		
			$linha2      = $campo1a.$campo2a.$campo3a.$campo4a.$campo5a;
			
			/*
			echo $campo1a."<br>";
			echo $campo2a."<br>";
			echo $campo3a."<br>";
			echo $campo4a."<br>";
			echo $campo5a."<br>";
		    break;
		    */
		    
		    $codigo_barras      =  $CodigoBarra;
		    
		    //echo $codigo_barras."<br>";
		    //break;
		    
		    $linha_digitavel    = $linha2;
		    //$impre_verso        = 0;
		
		// Primeira Guia
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Text(104.4,4, $conta_pag);
		
		$pdf->SetFont('Arial', 'B', 9);
		$pdf->Text(54,14, 'GRCSU - Guia de Recolhimento da Contribuição Sindical Urbana');
		
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->Text(55,17, 'SAC CAIXA 08007260101 Ouvidoria 08007257474');
		$pdf->Text(55,19, 'Para pessoas com deficiência auditiva ou de fala 08007262492');
		$pdf->Text(75,21, 'www.caixa.gov.br');
		
		
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
		$pdf->Text(151,33.4, trim($Edit15));
		
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
		$pdf->Text(8,49.4, $Edit7);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(94.3,46, 'CEP');
		
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Text(94.3,49.4, $Edit8);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(120.3,46, 'Cidade/Municipio');
		
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Text(121,49.4, $Edit9);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(193,46, 'UF');
		
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Text(193,49.4, $Edit10);
		
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Text(6.5,54.5, 'Dados do Contribuinte');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(7.4,58, 'Nome/Razão Social/Denominação Social');
		
		$pdf->SetFont('Arial', '', 10);
		$pdf->Text(8,62, $sacado);
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(124,61.5, '['.colocaZeroEsquerda($cod_edi_x,6).'-'.colocaZeroEsquerda($adm,4).']');
		
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
		
		$pdf->SetFont('Arial', '', 7);
		
		$pdf->SetXY(10,111.7);
		$pdf->MultiCell(150,4, $Edit11, 0, '',0); // J Justificado
		
		/*
		$pdf->Text(10,116, 'Mensagem Desitinada ao Contribuinte');
		
		$pdf->Text(10,121, 'conforme Arts. 578 até 610 CLT');
		$pdf->Text(10,126, 'Dúvidas: (11) 3123-3211 ramal 3260 ou 3273');
		*/
		
		$pdf->SetFont('Arial', 'B', 13);
		$pdf->Text(8,139, '104-0');
		
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Text(23,138, $linha_digitavel); 
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(8,143, 'Código do Cedente');
		
		$pdf->SetFont('Arial', 'B', 9);
		$pdf->Text(8.6,147.5, trim($Edit15));
		
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
		$pdf->Text(120,152, 'Recibo do Contribuinte / Autenticação mecânica');
		
		
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
		$pdf->Text(159,205, $sed_agecho_2);
		
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
		$pdf->Text(11,230.1, 'Referente.: '.$vencto);
		
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->SetXY(8,231.7);
		$pdf->MultiCell(148,4, $Edit12, 0, '',0); // J Justificado
		
		/*
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
		*/
		
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
		$pdf->Text(177.5,264.5, '['.colocaZeroEsquerda($cod_edi_x,6).'-'.colocaZeroEsquerda($adm,4).']');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(7,275, 'Sacador/Avalista:__________');
		$pdf->Text(118,275, '');
		
        $pdf->SetFont('Arial', '', 6);
     	$pdf->Text(8,279, 'Código de Barras');
	
	    $pdf->SetFont('Arial', '', 7);
		$pdf->Text(146,279, 'Ficha de Compensação/Autenticação Mecânica');
		
		
		// Codigo de Barras
		$pdf->i25(7,280, $codigo_barras);
		//$pdf->Text(136,283, $codigo_barras);
		
		if ($impre_verso == "SIM"){
			
		
			$pdf->AddPage();
			
			// Imprime verso
			
			$pdf->image("../imagens/bb_verso2.jpg",0,0,211,303);
			
			$pdf->SetFont('Arial', 'B', 13);
			$pdf->Text(163,12, '');
			$pdf->Text(164,16, '');
			
			$pdf->SetFont('Arial', '', 9);
			$pdf->Text(166,21, '');
			$pdf->Text(167,25, '');
			
			$pdf->image("../imagens/logo_caixa.jpg",25,110,35,8);  // logo-caixa.png
			
			$pdf->SetFont('Arial', 'B', 10);
			$pdf->Text(166,29, '');
			
			$pdf->Text(30,155, $cedente);
			
			// Destinatario
			$pdf->SetFont('Arial', '', 7);
			      //   col,Lin
			$pdf->Text(30,170, 'Destinatário:');
			
			$pdf->SetFont('Arial', '', 9);
			$pdf->Text(30,174, $sacado);
			$pdf->SetFont('Arial', 'B', 9);
			$pdf->Text(145,174, ''.colocaZeroEsquerda($cod_edi_x,6).'/'.colocaZeroEsquerda($adm,4).'');
			$pdf->SetFont('Arial', '', 9);
			$pdf->Text(30,177.7, $endereco);
			$pdf->Text(32,181.4, $cep.'     -     '.$cidade.'      -     '.$uf);

			// Remetente
			$pdf->SetFont('Arial', '', 7);
			      //   col,Lin
			$pdf->Text(65,224, 'Remetente:');
			
			$pdf->SetFont('Arial', '', 9);
			$pdf->Text(66,228, $cedente);
			$pdf->SetFont('Arial', 'B', 9);
			$pdf->Text(170,228, ''); //.colocaZeroEsquerda($adm,4).'');
			$pdf->SetFont('Arial', '', 9);
			$pdf->Text(66,231.7, $end_cedente. ", ". $num_cedente);
			$pdf->Text(66,235.4, $Edit8.'    -     '.$Edit9.'      -     '.$Edit10);


		
		}
		
		
		$pdf->AddPage();
		}
		
		$pdf->AutoPrint(true);
		//$pdf->Output("Boletos".".pdf","F");
		$pdf->Output();
		?>
		<!--
		<center><a href="Boletos.pdf"><img id="Image3" src="../imagens/botaoazul1.PNG"  width="92"  height="22"  border="0"/></a></center>
		-->
		<?
		@mysql_close();   
		
		@session_start();
		
		unset ($_SESSION['Edit1']);
		unset ($_SESSION['Edit2']);
		unset ($_SESSION['Edit3']); 
		unset ($_SESSION['Edit4']);
		unset ($_SESSION['Edit5']);
		unset ($_SESSION['Edit6']);
		unset ($_SESSION['Edit7']);
		unset ($_SESSION['Edit8']);
		unset ($_SESSION['Edit9']);
		unset ($_SESSION['Edit10']);
		unset ($_SESSION['nurecno']);
		unset ($_SESSION['cedente_nome']);

}
	
}

/*
 --------------------------------
 Funcao para Retirar os caracter
 estranhos e acentos na hora de
 atualizar Table 
---------------------------------
*/

Function retirar_carac($var){

$var = ereg_replace("[ÁÀÂÃ]",        "A",$var);
$var = ereg_replace("[áàâãª]",       "a",$var);
$var = ereg_replace("[ÉÈÊ]",         "E",$var);
$var = ereg_replace("[éèê]",         "e",$var);
$var = ereg_replace("[ÓÒÔÕ]",        "O",$var);
$var = ereg_replace("[óòôõº]",       "o",$var);
$var = ereg_replace("[ÚÙÛ]",         "U",$var);
$var = ereg_replace("[úùû]",         "u",$var);
$var = ereg_replace("[?*#'´`!$%¨]",  " ",$var);
$var = str_replace("Ç",              "C",$var);
$var = str_replace("ç",              "c",$var);
$var = str_replace("\\",             " ",$var);
$var = str_replace(" or ",           " ",$var);
$var = str_replace("select ",        " ",$var);
$var = str_replace("delete ",        " ",$var);
$var = str_replace("create ",        " ",$var);
$var = str_replace("drop ",          " ",$var);
$var = str_replace("update ",        " ",$var);
$var = str_replace("drop table",     " ",$var);
$var = str_replace("show table",     " ",$var);
$var = str_replace("applet",         " ",$var);
$var = str_replace("objetc",         " ",$var);
$var = str_replace("where",          " ",$var);

return($var);
}

function mask($val, $mask)
{
 $maskared = '';
 $k = 0;
 for($i = 0; $i<=strlen($mask)-1; $i++)
 {
 if($mask[$i] == '#')
 {
 if(isset($val[$k]))
 $maskared .= $val[$k++];
 }
 else
 {
 if(isset($mask[$i]))
 $maskared .= $mask[$i];
 }
 }
 return $maskared;
}

?>

