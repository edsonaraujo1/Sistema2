<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Gerar Relatorio Receita Diaria em PDF
 Criado em Data.....: 13/11/2009
 Ultima Atualização : 13/10/2010 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

//$timestamp = $_SERVER['REQUEST_TIME'];
//echo "Data e hora da requisição: " . 
//   date('d/m/Y - H:i:s', $timestamp);

include("../config.php");

//include("../logar.php");

$nome3 = strtoupper($_SESSION["nome_log"]);

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

include_once("funcoes2.php");

$deixar_1 = acesso("FORM_RECEITA");

if ($deixar_1 == "NAO"){
	
    echo "<html>
			<head>
			<title>Receita</title>
            <link rel='shortcut icon' href='../imagens/favicon.ico'/>
			</head>
			<body>
						
			<style type=text/css>
			
			body { background-image: url('../$logo_sis');
                   background-attachment: fixed }
			
			<!--.cp {  font: bold 10px Arial; color: black}
			<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
			<!--.ld { font: bold 15px Arial; color: #000000}
			<!--.ct { FONT: 9px 'Arial Narrow'; COLOR: #000033}
			<!--.cn { FONT: 9px Arial; COLOR: black }
			<!--.bc { font: bold 22px Arial; color: #000000 }
			--></style> 
			
			</HEAD>
			

			</html>
			
			<br><br><br><br>
				
			<div align=center>
			
			<table align=center border='15' bgcolor='#FFF8DC'  bordercolor ='$color_bor'>
			<tr>
			<td align=center>
			     <font face=arial><b>*** <font color = #FF0000> ERRO ACESSO NÃO PERMITIDO !!!</font> ***<br>
				                     
									 <font face=arial>Usuário sem Permissão</b>
			<table align=center>
			<form method='POST' action='javascript:window.close()'>
			<td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
			</form>
			</table>
			</td>
			</tr>
			</table>
			</div>";
	        exit();
}	


$tempo       = 0;
$cont_linha  = 0;
$lin         = 0;
$data        = date("d/m/Y"); 
$hora        = date("H:M:S");
$Pagina      = 1;
$conta_pag   = 1;
$total       = 0;
$pagi_lim    = 29;
//$inicio      = $_POST['Edit1'];
//$fim         = $_POST['Edit2'];
$recebe      = $_POST['recerber'];
$data_post   = $_POST['Edit1'];
$semana_post = $_POST['Edit2'];

ini_set("max_execution_time", 7200); // Setado para 1 hora

// Abrir Receita
$sql_r1  = "SELECT * FROM `receita` WHERE DATA = '$data_post' AND SEMANA = '$semana_post' ORDER BY id DESC";

//$sql_r1  = "SELECT * FROM `receita` ORDER BY id DESC";

$resultado_r1 = @mysql_query($sql_r1);

$row_r1 = @mysql_fetch_array($resultado_r1);

$operadora   = @$row_r1["OPERADORA"];
$mesano      = @$row_r1["DATA"];
$semana      = @$row_r1["SEMANA"];
$semana1     = @$row_r1["SEMANA1"];
$semana2     = @$row_r1["SEMANA2"];
$semana3     = @$row_r1["SEMANA3"];
$semana4     = @$row_r1["SEMANA4"];
$semana5     = @$row_r1["SEMANA5"];
$semana6     = @$row_r1["SEMANA6"];
$semana7     = @$row_r1["SEMANA7"];

$mes = substr($mesano,0,2);
$ano = substr($mesano,3,4);

if ($mes == '01'){	$nome_mes = 'Janeiro'; }
if ($mes == '02'){	$nome_mes = 'Fevereiro'; }
if ($mes == '03'){	$nome_mes = 'Março'; }
if ($mes == '04'){	$nome_mes = 'Abril'; }
if ($mes == '05'){	$nome_mes = 'Maio'; }
if ($mes == '06'){	$nome_mes = 'Junho'; }
if ($mes == '07'){	$nome_mes = 'Julho'; }
if ($mes == '08'){	$nome_mes = 'Agosto'; }
if ($mes == '09'){	$nome_mes = 'Setembro'; }
if ($mes == '10'){	$nome_mes = 'Outubro'; }
if ($mes == '11'){	$nome_mes = 'Novembro'; }
if ($mes == '12'){	$nome_mes = 'Dezembro'; }

$inicio = $mesano;

// Atualiza arquivo Log
$data_log = date("d/m/Y");
$hora_log = date("H:i:s"); 
$even_log = "IMPRESSAO DE REL.Conf/Assist/".$inicio_x;
			
$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
@mysql_query($consulta_log, $link);

	
	include('fpdf.php');
	// Inicia Codigo dos Boletos
	include('i25.php');
	
	
	ini_set("max_execution_time", 7200); // Setado para 1 hora
	
	// Inicio do Boleto
	
	$pdf = new PDF_i25();
	$pdf->Open();
	$pdf->SetAutoPageBreak(0, 0);
	$pdf->SetTopMargin(0);
	$pdf->AddPage('L');
	$pdf->SetDisplayMode(fullwidth, continuous);
	
	// Inicio do Loop
$sql1  = "SELECT * FROM `demostrativo` WHERE CODIGO < 145 ORDER BY id ASC";
	
	// WHERE  SUBSTRING(DATA,4,7) = '$inicio' AND OPERADORA = '$operadora'
$resultado1 = @mysql_query($sql1);
	
	// Inicio do Loop
	while($linha = @mysql_fetch_array($resultado1)) {
	

		$t_id        = $linha["CODIGO"];
		$t_descri    = $linha["DESCRICAO"];

	    $pdf->ln();

	
	if ($cont_linha == 0){
		// Cabecalho do Relatorio
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Text(12,10, '______________________________________________________________________________________________________________________________________________________________________________');
		$pdf->Text(12,11, '______________________________________________________________________________________________________________________________________________________________________________');
		$pdf->Text(14,16, 'Sindificios - Sind. Empreg. Edif. SP');
		$pdf->Text(126,16, $data);
		$pdf->Text(237,16, 'Pagina.: '.$Pagina);
		$pdf->Text(12,18, '______________________________________________________________________________________________________________________________________________________________________________');
		$pdf->Text(12,19, '______________________________________________________________________________________________________________________________________________________________________________');
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->SetXY(12,20);
		
	
		$pdf->MultiCell(268,5, 'DEMOSTRATIVO FINANCEIRO - RELATÓRIO DIÁRIO DE DESPESAS', 0, 'C',0); // J Justificado
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Text(12,25, '______________________________________________________________________________________________________________________________________________________________________________');
		$pdf->Text(12,26, '______________________________________________________________________________________________________________________________________________________________________________');
			//               012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890
			//               1         2         3         4         5         6         7         8         9         10        11        12        13        14        15          
			//                   Codigo      

		$pdf->SetXY(12,30);
		$pdf->MultiCell(35,5, 'MÊS:       '.$nome_mes.'/'.$ano , 1, 'L',0); // J Justificado
		
		$pdf->SetXY(47,30);
		$pdf->MultiCell(175,5, 'Operadora    '.$operadora."                                FATURAMENTO  DIARIO  Semana  ".$semana, 1, 'L',0); // J Justificado

		$pdf->SetXY(222,30);
		$pdf->MultiCell(25,10, 'Fat/Semanal', 1, 'C',0); // J Justificado
		

		$pdf->SetXY(12,35);
		$pdf->MultiCell(35,5, 'MOV.FINANCEIRO', 1, 'L',0); // J Justificado

		$pdf->SetXY(47,35);
		$pdf->MultiCell(25,5, '2ª/ '.$semana1, 1, 'C',0); // J Justificado

		$pdf->SetXY(72,35);
		$pdf->MultiCell(25,5, '3ª/ '.$semana2, 1, 'C',0); // J Justificado

		$pdf->SetXY(97,35);
		$pdf->MultiCell(25,5, '4ª/ '.$semana3, 1, 'C',0); // J Justificado

		$pdf->SetXY(122,35);
		$pdf->MultiCell(25,5, '5ª/ '.$semana4, 1, 'C',0); // J Justificado

		$pdf->SetXY(147,35);
		$pdf->MultiCell(25,5, '6ª/ '.$semana5, 1, 'C',0); // J Justificado

		$pdf->SetXY(172,35);
		$pdf->MultiCell(25,5, 'Sab / '.$semana6, 1, 'C',0); // J Justificado

		$pdf->SetXY(197,35);
		$pdf->MultiCell(25,5, 'Dom / '.$semana7, 1, 'C',0); // J Justificado
		$cont_linha = 1;

	}

	// Conta numero de linha
	if ($lin == 0){
		$lin = 41;
	}else{
		$lin = $lin + 5;
	}

    include('calculos_rec.php');		


	$conta_pag++;
	$total++;

	// Verifica Numero de linha e cria outra pagina
	if ($conta_pag == $pagi_lim){   // 80 em Retrato 54 em Paisagem
	   $conta_pag  = 1;
	   $Pagina++;
	   $lin = 0;
	   $cont_linha = 0;
	   $pdf->AddPage('L');
	}	

	}
    
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->SetXY(12,$lin+5);
	$pdf->MultiCell(35,5, 'TOTAL RECEITA', 1, 'L',0); // J Justificado

    // Semana 1
	$pdf->SetXY(47,$lin+5);
	$pdf->MultiCell(25,5, number_format($total_rec1,2,",","."), 1, 'R',0); // J Justificado
	
    // Semana 2
	$pdf->SetXY(72,$lin+5);
	$pdf->MultiCell(25,5, number_format($total_rec2,2,",","."), 1, 'R',0); // J Justificado

    // Semana 3
	$pdf->SetXY(97,$lin+5);
	$pdf->MultiCell(25,5, number_format($total_rec3,2,",","."), 1, 'R',0); // J Justificado

    // Semana 4
	$pdf->SetXY(122,$lin+5);
	$pdf->MultiCell(25,5, number_format($total_rec4,2,",","."), 1, 'R',0); // J Justificado

    // Semana 6
	$pdf->SetXY(147,$lin+5);
	$pdf->MultiCell(25,5, number_format($total_rec5,2,",","."), 1, 'R',0); // J Justificado

    // Semana 7
	$pdf->SetXY(172,$lin+5);
	$pdf->MultiCell(25,5, number_format($total_rec6,2,",","."), 1, 'R',0); // J Justificado

    // Semana 8
	$pdf->SetXY(197,$lin+5);
	$pdf->MultiCell(25,5, number_format($total_rec7,2,",","."), 1, 'R',0); // J Justificado
	
    $total_geral = $total_rec1+$total_rec2+$total_rec3+$total_rec4+$total_rec5+$total_rec6+$total_rec7+$total_rec8;
 
	$pdf->SetXY(222,$lin+5);
	$pdf->MultiCell(25,5, number_format($total_geral,2,",","."), 1, 'R',0); // J Justificado
	
    
    $total_rec_menos1 = $total_rec1;
    $total_rec_menos2 = $total_rec2;
    $total_rec_menos3 = $total_rec3;
    $total_rec_menos4 = $total_rec4;
    $total_rec_menos5 = $total_rec5;
    $total_rec_menos6 = $total_rec6;
    $total_rec_menos7 = $total_rec7;



  
// Santo Amaro
$sql2  = "SELECT * FROM `demostrativo` WHERE CODIGO = '888' ORDER BY id ASC";
	
	// WHERE  SUBSTRING(DATA,4,7) = '$inicio' AND OPERADORA = '$operadora'
$resultado2 = @mysql_query($sql2);
	
	// Inicio do Loop
	while($linha2 = @mysql_fetch_array($resultado2)) {
	

		$t_id        = $linha2["CODIGO"];
		$t_descri    = $linha2["DESCRICAO"];
		$t_descri    = $linha2["DESCRICAO"];

	    $pdf->ln();


	// Conta numero de linha
	if ($lin == 0){
		$lin = 5;
	}else{
		$lin = $lin + 5;
	}

    include('calculos_rec2.php');		


	$conta_pag++;
	$total++;
	
	// Verifica Numero de linha e cria outra pagina
	if ($conta_pag == $pagi_lim){   // 80 em Retrato 54 em Paisagem
	   $conta_pag  = 1;
	   $lin = 0;
	   $cont_linha = 0;
	   $Pagina++;
	   $pdf->AddPage('L');

	}	


		if ($cont_linha == 0){
			// Cabecalho do Relatorio
			$pdf->SetFont('Arial', 'B', 7);
			$pdf->Text(12,10, '______________________________________________________________________________________________________________________________________________________________________________');
			$pdf->Text(12,11, '______________________________________________________________________________________________________________________________________________________________________________');
			$pdf->Text(14,16, 'Sindificios - Sind. Empreg. Edif. SP');
			$pdf->Text(126,16, $data);
			$pdf->Text(237,16, 'Pagina.: '.$Pagina);
			$pdf->Text(12,18, '______________________________________________________________________________________________________________________________________________________________________________');
			$pdf->Text(12,19, '______________________________________________________________________________________________________________________________________________________________________________');
			$pdf->SetFont('Arial', 'B', 10);
			$pdf->SetXY(12,20);
			
		
			$pdf->MultiCell(268,5, 'DEMOSTRATIVO FINANCEIRO - RELATÓRIO DIÁRIO DE DESPESAS', 0, 'C',0); // J Justificado
			$pdf->SetFont('Arial', 'B', 7);
			$pdf->Text(12,25, '______________________________________________________________________________________________________________________________________________________________________________');
			$pdf->Text(12,26, '______________________________________________________________________________________________________________________________________________________________________________');
				//               012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890
				//               1         2         3         4         5         6         7         8         9         10        11        12        13        14        15          
				//                   Codigo      
	
			$pdf->SetXY(12,30);
			$pdf->MultiCell(35,5, 'MÊS:       '.$nome_mes.'/'.$ano , 1, 'L',0); // J Justificado
			
			$pdf->SetXY(47,30);
			$pdf->MultiCell(175,5, 'Operadora    '.$operadora."                                FATURAMENTO  DIARIO  Semana  ".$semana, 1, 'L',0); // J Justificado
	
			$pdf->SetXY(222,30);
			$pdf->MultiCell(25,10, 'Fat/Semanal', 1, 'C',0); // J Justificado
			
	
			$pdf->SetXY(12,35);
			$pdf->MultiCell(35,5, 'MOV.FINANCEIRO', 1, 'L',0); // J Justificado
	
			$pdf->SetXY(47,35);
			$pdf->MultiCell(25,5, '2ª/ '.$semana1, 1, 'C',0); // J Justificado
	
			$pdf->SetXY(72,35);
			$pdf->MultiCell(25,5, '3ª/ '.$semana2, 1, 'C',0); // J Justificado
	
			$pdf->SetXY(97,35);
			$pdf->MultiCell(25,5, '4ª/ '.$semana3, 1, 'C',0); // J Justificado
	
			$pdf->SetXY(122,35);
			$pdf->MultiCell(25,5, '5ª/ '.$semana4, 1, 'C',0); // J Justificado
	
			$pdf->SetXY(147,35);
			$pdf->MultiCell(25,5, '6ª/ '.$semana5, 1, 'C',0); // J Justificado
	
			$pdf->SetXY(172,35);
			$pdf->MultiCell(25,5, 'Sab / '.$semana6, 1, 'C',0); // J Justificado
	
			$pdf->SetXY(197,35);
			$pdf->MultiCell(25,5, 'Dom / '.$semana7, 1, 'C',0); // J Justificado
			$cont_linha = 1;
	
		}



	}
	
    
// Santana
$sql3  = "SELECT * FROM `demostrativo` WHERE CODIGO = '999' ORDER BY id ASC";
	
	// WHERE  SUBSTRING(DATA,4,7) = '$inicio' AND OPERADORA = '$operadora'
$resultado3 = @mysql_query($sql3);
	
	// Inicio do Loop
	while($linha3 = @mysql_fetch_array($resultado3)) {
	

		$t_id        = $linha2["CODIGO"];
		$t_descri    = $linha2["DESCRICAO"];
		$t_descri    = $linha2["DESCRICAO"];

	    $pdf->ln();


	// Conta numero de linha
	if ($lin == 0){
		$lin = 30;
	}else{
		$lin = $lin + 5;
	}

    include('calculos_rec3.php');		


	$conta_pag++;
	$total++;

	// Verifica Numero de linha e cria outra pagina
	if ($conta_pag == $pagi_lim){   // 80 em Retrato 54 em Paisagem
	   $conta_pag  = 1;
	   $Pagina++;
       $pdf->AddPage('L');
	}	
	}
	

// Tatuape
$sql3  = "SELECT * FROM `demostrativo` WHERE CODIGO = '777' ORDER BY id ASC";
	
	// WHERE  SUBSTRING(DATA,4,7) = '$inicio' AND OPERADORA = '$operadora'
$resultado3 = @mysql_query($sql3);
	
	// Inicio do Loop
	while($linha3 = @mysql_fetch_array($resultado3)) {
	

		$t_id        = $linha2["CODIGO"];
		$t_descri    = $linha2["DESCRICAO"];
		$t_descri    = $linha2["DESCRICAO"];

	    $pdf->ln();


	// Conta numero de linha
	if ($lin == 0){
		$lin = 40;
	}else{
		$lin = $lin + 5;
	}

    include('calculos_rec4.php');		

	$conta_pag++;
	$total++;

	// Verifica Numero de linha e cria outra pagina
	
	if ($conta_pag == $pagi_lim){   // 80 em Retrato 54 em Paisagem
	   $conta_pag  = 1;
	   $Pagina++;
	   $lin = 0;
	   $cont_linha = 0;
	   $pdf->AddPage('L');
	}
		if ($cont_linha == 0){
		// Cabecalho do Relatorio
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Text(12,10, '______________________________________________________________________________________________________________________________________________________________________________');
		$pdf->Text(12,11, '______________________________________________________________________________________________________________________________________________________________________________');
		$pdf->Text(14,16, 'Sindificios - Sind. Empreg. Edif. SP');
		$pdf->Text(126,16, $data);
		$pdf->Text(237,16, 'Pagina.: '.$Pagina);
		$pdf->Text(12,18, '______________________________________________________________________________________________________________________________________________________________________________');
		$pdf->Text(12,19, '______________________________________________________________________________________________________________________________________________________________________________');
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->SetXY(12,20);
		
	
		$pdf->MultiCell(268,5, 'DEMOSTRATIVO FINANCEIRO - RELATÓRIO DIÁRIO DE DESPESAS', 0, 'C',0); // J Justificado
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Text(12,25, '______________________________________________________________________________________________________________________________________________________________________________');
		$pdf->Text(12,26, '______________________________________________________________________________________________________________________________________________________________________________');
			//               012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890
			//               1         2         3         4         5         6         7         8         9         10        11        12        13        14        15          
			//                   Codigo      

		$pdf->SetXY(12,30);
		$pdf->MultiCell(35,5, 'MÊS:       '.$nome_mes.'/'.$ano , 1, 'L',0); // J Justificado
		
		$pdf->SetXY(47,30);
		$pdf->MultiCell(175,5, 'Operadora    '.$operadora."                                FATURAMENTO  DIARIO  Semana  ".$semana, 1, 'L',0); // J Justificado

		$pdf->SetXY(222,30);
		$pdf->MultiCell(25,10, 'Fat/Semanal', 1, 'C',0); // J Justificado
		

		$pdf->SetXY(12,35);
		$pdf->MultiCell(35,5, 'MOV.FINANCEIRO', 1, 'L',0); // J Justificado

		$pdf->SetXY(47,35);
		$pdf->MultiCell(25,5, '2ª/ '.$semana1, 1, 'C',0); // J Justificado

		$pdf->SetXY(72,35);
		$pdf->MultiCell(25,5, '3ª/ '.$semana2, 1, 'C',0); // J Justificado

		$pdf->SetXY(97,35);
		$pdf->MultiCell(25,5, '4ª/ '.$semana3, 1, 'C',0); // J Justificado

		$pdf->SetXY(122,35);
		$pdf->MultiCell(25,5, '5ª/ '.$semana4, 1, 'C',0); // J Justificado

		$pdf->SetXY(147,35);
		$pdf->MultiCell(25,5, '6ª/ '.$semana5, 1, 'C',0); // J Justificado

		$pdf->SetXY(172,35);
		$pdf->MultiCell(25,5, 'Sab / '.$semana6, 1, 'C',0); // J Justificado

		$pdf->SetXY(197,35);
		$pdf->MultiCell(25,5, 'Dom / '.$semana7, 1, 'C',0); // J Justificado
		$cont_linha = 1;

	}
	
	}
	
	
	
	

// Lapa
$sql2  = "SELECT * FROM `demostrativo` WHERE CODIGO = '555' ORDER BY id ASC";
	
	// WHERE  SUBSTRING(DATA,4,7) = '$inicio' AND OPERADORA = '$operadora'
$resultado2 = @mysql_query($sql2);
	
	// Inicio do Loop
	while($linha2 = @mysql_fetch_array($resultado2)) {
	

		$t_id        = $linha2["CODIGO"];
		$t_descri    = $linha2["DESCRICAO"];
		$t_descri    = $linha2["DESCRICAO"];

	    $pdf->ln();


	// Conta numero de linha
	if ($lin == 0){
		$lin = 5;
	}else{
		$lin = $lin + 5;
	}

    include('calculos_rec13.php');		


	$conta_pag++;
	$total++;
	
	// Verifica Numero de linha e cria outra pagina
	if ($conta_pag == $pagi_lim){   // 80 em Retrato 54 em Paisagem
	   $conta_pag  = 1;
	   $lin = 0;
	   $cont_linha = 0;
	   $Pagina++;
	   $pdf->AddPage('L');

	}	


		if ($cont_linha == 0){
			// Cabecalho do Relatorio
			$pdf->SetFont('Arial', 'B', 7);
			$pdf->Text(12,10, '______________________________________________________________________________________________________________________________________________________________________________');
			$pdf->Text(12,11, '______________________________________________________________________________________________________________________________________________________________________________');
			$pdf->Text(14,16, 'Sindificios - Sind. Empreg. Edif. SP');
			$pdf->Text(126,16, $data);
			$pdf->Text(237,16, 'Pagina.: '.$Pagina);
			$pdf->Text(12,18, '______________________________________________________________________________________________________________________________________________________________________________');
			$pdf->Text(12,19, '______________________________________________________________________________________________________________________________________________________________________________');
			$pdf->SetFont('Arial', 'B', 10);
			$pdf->SetXY(12,20);
			
		
			$pdf->MultiCell(268,5, 'DEMOSTRATIVO FINANCEIRO - RELATÓRIO DIÁRIO DE DESPESAS', 0, 'C',0); // J Justificado
			$pdf->SetFont('Arial', 'B', 7);
			$pdf->Text(12,25, '______________________________________________________________________________________________________________________________________________________________________________');
			$pdf->Text(12,26, '______________________________________________________________________________________________________________________________________________________________________________');
				//               012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890
				//               1         2         3         4         5         6         7         8         9         10        11        12        13        14        15          
				//                   Codigo      
	
			$pdf->SetXY(12,30);
			$pdf->MultiCell(35,5, 'MÊS:       '.$nome_mes.'/'.$ano , 1, 'L',0); // J Justificado
			
			$pdf->SetXY(47,30);
			$pdf->MultiCell(175,5, 'Operadora    '.$operadora."                                FATURAMENTO  DIARIO  Semana  ".$semana, 1, 'L',0); // J Justificado
	
			$pdf->SetXY(222,30);
			$pdf->MultiCell(25,10, 'Fat/Semanal', 1, 'C',0); // J Justificado
			
	
			$pdf->SetXY(12,35);
			$pdf->MultiCell(35,5, 'MOV.FINANCEIRO', 1, 'L',0); // J Justificado
	
			$pdf->SetXY(47,35);
			$pdf->MultiCell(25,5, '2ª/ '.$semana1, 1, 'C',0); // J Justificado
	
			$pdf->SetXY(72,35);
			$pdf->MultiCell(25,5, '3ª/ '.$semana2, 1, 'C',0); // J Justificado
	
			$pdf->SetXY(97,35);
			$pdf->MultiCell(25,5, '4ª/ '.$semana3, 1, 'C',0); // J Justificado
	
			$pdf->SetXY(122,35);
			$pdf->MultiCell(25,5, '5ª/ '.$semana4, 1, 'C',0); // J Justificado
	
			$pdf->SetXY(147,35);
			$pdf->MultiCell(25,5, '6ª/ '.$semana5, 1, 'C',0); // J Justificado
	
			$pdf->SetXY(172,35);
			$pdf->MultiCell(25,5, 'Sab / '.$semana6, 1, 'C',0); // J Justificado
	
			$pdf->SetXY(197,35);
			$pdf->MultiCell(25,5, 'Dom / '.$semana7, 1, 'C',0); // J Justificado
			$cont_linha = 1;
	
		}



	}

	
	


	
	
		// Conta numero de linha
	if ($lin == 0){
		$lin = 25;
	}else{
		$lin = $lin + 5;
	}
	
	
	
	
	
  
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->SetXY(12,$lin+15);
	$pdf->MultiCell(35,5, 'TOTAL SubSede', 1, 'L',0); // J Justificado

    // Semana 1
	$pdf->SetXY(47,$lin+15);
	$pdf->MultiCell(25,5, number_format($total_sub1a,2,",","."), 1, 'R',0); // J Justificado
	
    // Semana 2
	$pdf->SetXY(72,$lin+15);
	$pdf->MultiCell(25,5, number_format($total_sub2a,2,",","."), 1, 'R',0); // J Justificado

    // Semana 3
	$pdf->SetXY(97,$lin+15);
	$pdf->MultiCell(25,5, number_format($total_sub3a,2,",","."), 1, 'R',0); // J Justificado

    // Semana 4
	$pdf->SetXY(122,$lin+15);
	$pdf->MultiCell(25,5, number_format($total_sub4a,2,",","."), 1, 'R',0); // J Justificado

    // Semana 6
	$pdf->SetXY(147,$lin+15);
	$pdf->MultiCell(25,5, number_format($total_sub5a,2,",","."), 1, 'R',0); // J Justificado

    // Semana 7
	$pdf->SetXY(172,$lin+15);
	$pdf->MultiCell(25,5, number_format($total_sub6a,2,",","."), 1, 'R',0); // J Justificado

    // Semana 8
	$pdf->SetXY(197,$lin+15);
	$pdf->MultiCell(25,5, number_format($total_sub7a,2,",","."), 1, 'R',0); // J Justificado
	
    $total_geral_suba = $total_sub1a+$total_sub2a+$total_sub3a+$total_sub4a+$total_sub5a+$total_sub6a+$total_sub7a+$total_sub8a;
 
	$pdf->SetXY(222,$lin+15);
	$pdf->MultiCell(25,5, number_format($total_geral_suba,2,",","."), 1, 'R',0); // J Justificado
	
   
    $sub_total1 = $total_rec1+$total_sub1a;
    $sub_total2 = $total_rec2+$total_sub2a;
    $sub_total3 = $total_rec3+$total_sub3a;
    $sub_total4 = $total_rec4+$total_sub4a;
    $sub_total5 = $total_rec5+$total_sub5a;
    $sub_total6 = $total_rec6+$total_sub6a;
    $sub_total7 = $total_rec7+$total_sub7a;
	 
	 
		// Conta numero de linha
	if ($lin == 0){
		$lin = 25;
	}else{
		$lin = $lin + 5;
	}
	 
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->SetXY(12,$lin+20);
	$pdf->MultiCell(35,5, 'SUB-TOTAL', 1, 'L',0); // J Justificado

    // Semana 1
	$pdf->SetXY(47,$lin+20);
	$pdf->MultiCell(25,5, number_format($sub_total1,2,",","."), 1, 'R',0); // J Justificado
	
    // Semana 2
	$pdf->SetXY(72,$lin+20);
	$pdf->MultiCell(25,5, number_format($sub_total2,2,",","."), 1, 'R',0); // J Justificado

    // Semana 3
	$pdf->SetXY(97,$lin+20);
	$pdf->MultiCell(25,5, number_format($sub_total3,2,",","."), 1, 'R',0); // J Justificado

    // Semana 4
	$pdf->SetXY(122,$lin+20);
	$pdf->MultiCell(25,5, number_format($sub_total4,2,",","."), 1, 'R',0); // J Justificado

    // Semana 6
	$pdf->SetXY(147,$lin+20);
	$pdf->MultiCell(25,5, number_format($sub_total5,2,",","."), 1, 'R',0); // J Justificado

    // Semana 7
	$pdf->SetXY(172,$lin+20);
	$pdf->MultiCell(25,5, number_format($sub_total6,2,",","."), 1, 'R',0); // J Justificado

    // Semana 8
	$pdf->SetXY(197,$lin+20);
	$pdf->MultiCell(25,5, number_format($sub_total7,2,",","."), 1, 'R',0); // J Justificado
	
    $sub_total_geral = $sub_total1+$sub_total2+$sub_total3+$sub_total4+$sub_total5+$sub_total6+$sub_total7;
 
	$pdf->SetXY(222,$lin+20);
	$pdf->MultiCell(25,5, number_format($sub_total_geral,2,",","."), 1, 'R',0); // J Justificado


    $lin = $lin + 20;
    
	$conta_pag++;
	$total++;


// Nova Codificação Laboratorios


// SECONCI
$sql3  = "SELECT * FROM `demostrativo` WHERE CODIGO = '145' ORDER BY id ASC";
	
	// WHERE  SUBSTRING(DATA,4,7) = '$inicio' AND OPERADORA = '$operadora'
$resultado3 = @mysql_query($sql3);
	
	// Inicio do Loop
	while($linha3 = @mysql_fetch_array($resultado3)) {
	

	    $pdf->ln();


	// Conta numero de linha
	if ($lin == 0){
		$lin = 10;
	}else{
		$lin = $lin + 2;
	}

    include('calculos_rec14.php');		

	$conta_pag++;
	$total++;

	// Verifica Numero de linha e cria outra pagina
	if ($conta_pag == $pagi_lim){   // 80 em Retrato 54 em Paisagem
	   $conta_pag  = 1;
	   $Pagina++;
	   $lin = 0;
	   $cont_linha = 0;
	   $pdf->AddPage('L');
	}	
	}


    $lin = $lin + 3;
    
	$conta_pag++;
	$total++;
   

$sql3  = "SELECT * FROM `demostrativo` WHERE CODIGO = '146' ORDER BY id ASC";
	
	// WHERE  SUBSTRING(DATA,4,7) = '$inicio' AND OPERADORA = '$operadora'
$resultado3 = @mysql_query($sql3);
	
	// Inicio do Loop
	while($linha3 = @mysql_fetch_array($resultado3)) {
	

	    $pdf->ln();


	// Conta numero de linha
	if ($lin == 0){
		$lin = 10;
	}else{
		$lin = $lin + 2;
	}

    include('calculos_rec15.php');		

	$conta_pag++;
	$total++;

	// Verifica Numero de linha e cria outra pagina
	if ($conta_pag == $pagi_lim){   // 80 em Retrato 54 em Paisagem
	   $conta_pag  = 1;
	   $Pagina++;
	   $lin = 0;
	   $cont_linha = 0;
	   $pdf->AddPage('L');
	}	
	}


    $lin = $lin + 3;
    
	$conta_pag++;
	$total++;
   

$sql3  = "SELECT * FROM `demostrativo` WHERE CODIGO = '147' ORDER BY id ASC";
	
	// WHERE  SUBSTRING(DATA,4,7) = '$inicio' AND OPERADORA = '$operadora'
$resultado3 = @mysql_query($sql3);
	
	// Inicio do Loop
	while($linha3 = @mysql_fetch_array($resultado3)) {
	

	    $pdf->ln();


	// Conta numero de linha
	if ($lin == 0){
		$lin = 10;
	}else{
		$lin = $lin + 2;
	}

    include('calculos_rec16.php');		

	$conta_pag++;
	$total++;

	// Verifica Numero de linha e cria outra pagina
	if ($conta_pag == $pagi_lim){   // 80 em Retrato 54 em Paisagem
	   $conta_pag  = 1;
	   $Pagina++;
	   $lin = 0;
	   $cont_linha = 0;
	   $pdf->AddPage('L');
	}	
	}



    $lin = $lin + 3;
    
	$conta_pag++;
	$total++;
   

$sql3  = "SELECT * FROM `demostrativo` WHERE CODIGO = '148' ORDER BY id ASC";
	
	// WHERE  SUBSTRING(DATA,4,7) = '$inicio' AND OPERADORA = '$operadora'
$resultado3 = @mysql_query($sql3);
	
	// Inicio do Loop
	while($linha3 = @mysql_fetch_array($resultado3)) {

	    $pdf->ln();


	// Conta numero de linha
	if ($lin == 0){
		$lin = 10;
	}else{
		$lin = $lin + 2;
	}

    include('calculos_rec17.php');		

	$conta_pag++;
	$total++;

	// Verifica Numero de linha e cria outra pagina
	if ($conta_pag == $pagi_lim){   // 80 em Retrato 54 em Paisagem
	   $conta_pag  = 1;
	   $Pagina++;
	   $lin = 0;
	   $cont_linha = 0;
	   $pdf->AddPage('L');
	}	
	}


    $lin = $lin + 3;
    
	$conta_pag++;
	$total++;
   

$sql3  = "SELECT * FROM `demostrativo` WHERE CODIGO = '149' ORDER BY id ASC";
	
	// WHERE  SUBSTRING(DATA,4,7) = '$inicio' AND OPERADORA = '$operadora'
$resultado3 = @mysql_query($sql3);
	
	// Inicio do Loop
	while($linha3 = @mysql_fetch_array($resultado3)) {

	    $pdf->ln();


	// Conta numero de linha
	if ($lin == 0){
		$lin = 10;
	}else{
		$lin = $lin + 2;
	}

    include('calculos_rec18.php');		

	$conta_pag++;
	$total++;

	// Verifica Numero de linha e cria outra pagina
	if ($conta_pag == $pagi_lim){   // 80 em Retrato 54 em Paisagem
	   $conta_pag  = 1;
	   $Pagina++;
	   $lin = 0;
	   $cont_linha = 0;
	   $pdf->AddPage('L');
	}	
	}


    $lin = $lin + 3;
    
	$conta_pag++;
	$total++;
   

$sql3  = "SELECT * FROM `demostrativo` WHERE CODIGO = '150' ORDER BY id ASC";
	
	// WHERE  SUBSTRING(DATA,4,7) = '$inicio' AND OPERADORA = '$operadora'
$resultado3 = @mysql_query($sql3);
	
	// Inicio do Loop
	while($linha3 = @mysql_fetch_array($resultado3)) {
	

	    $pdf->ln();


	// Conta numero de linha
	if ($lin == 0){
		$lin = 10;
	}else{
		$lin = $lin + 2;
	}

    include('calculos_rec19.php');		

	$conta_pag++;
	$total++;

	// Verifica Numero de linha e cria outra pagina
	if ($conta_pag == $pagi_lim){   // 80 em Retrato 54 em Paisagem
	   $conta_pag  = 1;
	   $Pagina++;
	   $lin = 0;
	   $cont_linha = 0;
	   $pdf->AddPage('L');
	}	
	}


    $lin = $lin + 3;
    
	$conta_pag++;
	$total++;
   

$sql3  = "SELECT * FROM `demostrativo` WHERE CODIGO = '151' ORDER BY id ASC";
	
	// WHERE  SUBSTRING(DATA,4,7) = '$inicio' AND OPERADORA = '$operadora'
$resultado3 = @mysql_query($sql3);
	
	// Inicio do Loop
	while($linha3 = @mysql_fetch_array($resultado3)) {
	
	    $pdf->ln();


	// Conta numero de linha
	if ($lin == 0){
		$lin = 10;
	}else{
		$lin = $lin + 2;
	}

    include('calculos_rec20.php');		

	$conta_pag++;
	$total++;

	// Verifica Numero de linha e cria outra pagina
	if ($conta_pag == $pagi_lim){   // 80 em Retrato 54 em Paisagem
	   $conta_pag  = 1;
	   $Pagina++;
	   $lin = 0;
	   $cont_linha = 0;
	   $pdf->AddPage('L');
	}	
	}



		// Conta numero de linha
	if ($lin == 0){
		$lin = 25;
	}else{
		$lin = $lin + 2;
	}
	

    $total_dinh_4 = $total_dinhei4a+$total_dinhei4b+$total_dinhei4c+$total_dinhei4d+$total_dinhei4e+$total_dinhei4f+$total_dinhei4g+$total_dinhei4h;
	
  
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->SetXY(12,$lin+15);
	$pdf->MultiCell(35,5, 'TL CLINICAS Dinheiro', 1, 'L',0); // J Justificado

    // Semana 1
	$pdf->SetXY(47,$lin+15);
	$pdf->MultiCell(25,5, number_format($total_dinh_1,2,",","."), 1, 'R',0); // J Justificado  
	
    // Semana 2
	$pdf->SetXY(72,$lin+15);
	$pdf->MultiCell(25,5, number_format($total_dinh_2,2,",","."), 1, 'R',0); // J Justificado

    // Semana 3
	$pdf->SetXY(97,$lin+15);
	$pdf->MultiCell(25,5, number_format($total_dinh_3,2,",","."), 1, 'R',0); // J Justificado

    // Semana 4
	$pdf->SetXY(122,$lin+15);
	$pdf->MultiCell(25,5, number_format($total_dinh_4,2,",","."), 1, 'R',0); // J Justificado

    // Semana 6
	$pdf->SetXY(147,$lin+15);
	$pdf->MultiCell(25,5, number_format($total_dinh_5,2,",","."), 1, 'R',0); // J Justificado

    // Semana 7
	$pdf->SetXY(172,$lin+15);
	$pdf->MultiCell(25,5, number_format($total_dinh_6,2,",","."), 1, 'R',0); // J Justificado

    // Semana 8
	$pdf->SetXY(197,$lin+15);
	$pdf->MultiCell(25,5, number_format($total_dinh_7,2,",","."), 1, 'R',0); // J Justificado
	
    $total_geral_suba_CLI_d = $total_dinh_1+$total_dinh_2+$total_dinh_3+$total_dinh_4+$total_dinh_5+$total_dinh_6+$total_dinh_7;
 
	$pdf->SetXY(222,$lin+15);
	$pdf->MultiCell(25,5, number_format($total_geral_suba_CLI_d,2,",","."), 1, 'R',0); // J Justificado
	


// Clinica CArtao
   
		// Conta numero de linha
	if ($lin == 0){
		$lin = 25;
	}else{
		$lin = $lin + 5;
	}
	

    $total_cart_4 = $total_cart4a+$total_cart4b+$total_cart4c+$total_cart4d+$total_cart4e+$total_cart4f+$total_cart4g+$total_cart4h;

	
  
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->SetXY(12,$lin+15);
	$pdf->MultiCell(35,5, 'TL CLINICAS Cartão', 1, 'L',0); // J Justificado

    // Semana 1
	$pdf->SetXY(47,$lin+15);
	$pdf->MultiCell(25,5, number_format($total_cart_1,2,",","."), 1, 'R',0); // J Justificado  
	
    // Semana 2
	$pdf->SetXY(72,$lin+15);
	$pdf->MultiCell(25,5, number_format($total_cart_2,2,",","."), 1, 'R',0); // J Justificado

    // Semana 3
	$pdf->SetXY(97,$lin+15);
	$pdf->MultiCell(25,5, number_format($total_cart_3,2,",","."), 1, 'R',0); // J Justificado

    // Semana 4
	$pdf->SetXY(122,$lin+15);          
	$pdf->MultiCell(25,5, number_format($total_cart_4,2,",","."), 1, 'R',0); // J Justificado

    // Semana 6
	$pdf->SetXY(147,$lin+15);
	$pdf->MultiCell(25,5, number_format($total_cart_5,2,",","."), 1, 'R',0); // J Justificado

    // Semana 7
	$pdf->SetXY(172,$lin+15);
	$pdf->MultiCell(25,5, number_format($total_cart_6,2,",","."), 1, 'R',0); // J Justificado

    // Semana 8
	$pdf->SetXY(197,$lin+15);
	$pdf->MultiCell(25,5, number_format($total_cart_7,2,",","."), 1, 'R',0); // J Justificado
	
    $total_geral_suba_CLI_t = $total_cart_1+$total_cart_2+$total_cart_3+$total_cart_4+$total_cart_5+$total_cart_6+$total_cart_7;
 
	$pdf->SetXY(222,$lin+15);
	$pdf->MultiCell(25,5, number_format($total_geral_suba_CLI_t,2,",","."), 1, 'R',0); // J Justificado
	
 
    $lin = $lin - 5;
    
	$conta_pag++;
	$total++;

 
   
// Fim Nova Codificação

   
// Separacao Cheque

$sql3  = "SELECT * FROM `demostrativo2` WHERE CODIGO = '1' ORDER BY id ASC";
	
	// WHERE  SUBSTRING(DATA,4,7) = '$inicio' AND OPERADORA = '$operadora'
$resultado3 = @mysql_query($sql3);
	
	// Inicio do Loop
	while($linha3 = @mysql_fetch_array($resultado3)) {
	

	    $pdf->ln();


	// Conta numero de linha
	if ($lin == 0){
		$lin = 10;
	}else{
		$lin = $lin + 2;
	}

    include('calculos_rec5.php');		

	$conta_pag++;
	$total++;

	// Verifica Numero de linha e cria outra pagina
	if ($conta_pag == $pagi_lim){   // 80 em Retrato 54 em Paisagem
	   $conta_pag  = 1;
	   $Pagina++;
	   $lin = 0;
	   $cont_linha = 0;
	   $pdf->AddPage('L');
	}	
	}


// Separacao Dinheiro

$sql3  = "SELECT * FROM `demostrativo2` WHERE CODIGO = '2' ORDER BY id ASC";
	
	// WHERE  SUBSTRING(DATA,4,7) = '$inicio' AND OPERADORA = '$operadora'
$resultado3 = @mysql_query($sql3);
	
	// Inicio do Loop
	while($linha3 = @mysql_fetch_array($resultado3)) {
	

	    $pdf->ln();


	// Conta numero de linha
	if ($lin == 0){
		$lin = 40;
	}else{
		$lin = $lin + 5;
	}

    include('calculos_rec6.php');		

	$conta_pag++;
	$total++;

	// Verifica Numero de linha e cria outra pagina
	if ($conta_pag == $pagi_lim){   // 80 em Retrato 54 em Paisagem
	   $conta_pag  = 1;
	   $Pagina++;
	   $lin = 0;
	   $cont_linha = 0;
	   $pdf->AddPage('L');
	}	
	}
	
	
// Cartao Debito

$sql3  = "SELECT * FROM `demostrativo2` WHERE CODIGO = '3' ORDER BY id ASC";
	
	// WHERE  SUBSTRING(DATA,4,7) = '$inicio' AND OPERADORA = '$operadora'
$resultado3 = @mysql_query($sql3);
	
	// Inicio do Loop
	while($linha3 = @mysql_fetch_array($resultado3)) {
	

	    $pdf->ln();


	// Conta numero de linha
	if ($lin == 0){
		$lin = 40;
	}else{
		$lin = $lin + 5;
	}

    include('calculos_rec7.php');		

	$conta_pag++;
	$total++;

	// Verifica Numero de linha e cria outra pagina
	if ($conta_pag == $pagi_lim){   // 80 em Retrato 54 em Paisagem
	   $conta_pag  = 1;
	   $Pagina++;
	   $lin = 0;
	   $cont_linha = 0;
	   $pdf->AddPage('L');
	}	
	}


// Cheque S/Pre

$sql3  = "SELECT * FROM `demostrativo2` WHERE CODIGO = '4' ORDER BY id ASC";
	
	// WHERE  SUBSTRING(DATA,4,7) = '$inicio' AND OPERADORA = '$operadora'
$resultado3 = @mysql_query($sql3);
	
	// Inicio do Loop
	while($linha3 = @mysql_fetch_array($resultado3)) {
	

	    $pdf->ln();


	// Conta numero de linha
	if ($lin == 0){
		$lin = 40;
	}else{
		$lin = $lin + 5;
	}

    include('calculos_rec8.php');		

	$conta_pag++;
	$total++;

	// Verifica Numero de linha e cria outra pagina
	if ($conta_pag == $pagi_lim){   // 80 em Retrato 54 em Paisagem
	   $conta_pag  = 1;
	   $Pagina++;
	   $lin = 0;
	   $cont_linha = 0;
	   $pdf->AddPage('L');
	}	
	}


// Cheque S/Pre

$sql3  = "SELECT * FROM `demostrativo2` WHERE CODIGO = '5' ORDER BY id ASC";
	
	// WHERE  SUBSTRING(DATA,4,7) = '$inicio' AND OPERADORA = '$operadora'
$resultado3 = @mysql_query($sql3);
	
	// Inicio do Loop
	while($linha3 = @mysql_fetch_array($resultado3)) {
	

	    $pdf->ln();


	// Conta numero de linha
	if ($lin == 0){
		$lin = 40;
	}else{
		$lin = $lin + 5;
	}

    include('calculos_rec9.php');		

	$conta_pag++;
	$total++;

	// Verifica Numero de linha e cria outra pagina
	if ($conta_pag == $pagi_lim){   // 80 em Retrato 54 em Paisagem
	   $conta_pag  = 1;
	   $Pagina++;
	   $lin = 0;
	   $cont_linha = 0;
	   $pdf->AddPage('L');
	}	
	}
	

    //$total_geral_suba_CLI_d = $total_dinh_1+$total_dinh_2+$total_dinh_3+$total_dinh_4+$total_dinh_5+$total_dinh_6+$total_dinh_7;
    //$total_geral_suba_CLI_t = $total_cart_1+$total_cart_2+$total_cart_3+$total_cart_4+$total_cart_5+$total_cart_6+$total_cart_7;



    $sub_total1a = $total_sub1a1+$total_sub1a2+$total_sub1a3+$total_sub1a4+$total_sub1a5+$total_sub1a6+$total_sub1a7;
    $sub_total2a = $total_sub2a1+$total_sub2a2+$total_sub2a3+$total_sub2a4+$total_sub2a5+$total_sub2a6+$total_sub2a7;
    $sub_total3a = $total_sub3a1+$total_sub3a2+$total_sub3a3+$total_sub3a4+$total_sub3a5+$total_sub3a6+$total_sub3a7;
    $sub_total4a = $total_sub4a1+$total_sub4a2+$total_sub4a3+$total_sub4a4+$total_sub4a5+$total_sub4a6+$total_sub4a7-$total_dinh_4-$total_cart_4;
    $sub_total5a = $total_sub5a1+$total_sub5a2+$total_sub5a3+$total_sub5a4+$total_sub5a5+$total_sub5a6+$total_sub5a7;
    $sub_total6a = $total_sub6a1+$total_sub6a2+$total_sub6a3+$total_sub6a4+$total_sub6a5+$total_sub6a6+$total_sub6a7;
    $sub_total7a = $total_sub7a1+$total_sub7a2+$total_sub7a3+$total_sub7a4+$total_sub7a5+$total_sub7a6+$total_sub7a7;

   
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->SetXY(12,$lin+35);
	$pdf->MultiCell(35,5, 'TOTAL RECEITA', 1, 'L',0); // J Justificado

    // Semana 1
	$pdf->SetXY(47,$lin+35);
	$pdf->MultiCell(25,5, number_format($sub_total1a,2,",","."), 1, 'R',0); // J Justificado
	
    // Semana 2
	$pdf->SetXY(72,$lin+35);
	$pdf->MultiCell(25,5, number_format($sub_total2a,2,",","."), 1, 'R',0); // J Justificado

    // Semana 3
	$pdf->SetXY(97,$lin+35);
	$pdf->MultiCell(25,5, number_format($sub_total3a,2,",","."), 1, 'R',0); // J Justificado

    // Semana 4
	$pdf->SetXY(122,$lin+35);
	$pdf->MultiCell(25,5, number_format($sub_total4a,2,",","."), 1, 'R',0); // J Justificado

    // Semana 6
	$pdf->SetXY(147,$lin+35);
	$pdf->MultiCell(25,5, number_format($sub_total5a,2,",","."), 1, 'R',0); // J Justificado

    // Semana 7
	$pdf->SetXY(172,$lin+35);
	$pdf->MultiCell(25,5, number_format($sub_total6a,2,",","."), 1, 'R',0); // J Justificado

    // Semana 8
	$pdf->SetXY(197,$lin+35);
	$pdf->MultiCell(25,5, number_format($sub_total7a,2,",","."), 1, 'R',0); // J Justificado
	
    $total_geral_suba = $sub_total1a+$sub_total2a+$sub_total3a+$sub_total4a+$sub_total5a+$sub_total6a+$sub_total7a+$sub_total8a;
 
	$pdf->SetXY(222,$lin+35);
	$pdf->MultiCell(25,5, number_format($total_geral_suba,2,",","."), 1, 'R',0); // J Justificado
	

// Receita
    $lin = $lin + 10;
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->SetXY(12,$lin+35);
	$pdf->MultiCell(35,5, 'RECEITA', 1, 'L',0); // J Justificado


    $total_rec1 = $sub_total1a - $total_sub1a4;
    $total_rec2 = $sub_total2a - $total_sub2a4;
    $total_rec3 = $sub_total3a - $total_sub3a4;
    $total_rec4 = $sub_total4a - $total_sub4a4;
    $total_rec5 = $sub_total5a - $total_sub5a4;
    $total_rec6 = $sub_total6a - $total_sub6a4;
    $total_rec7 = $sub_total7a - $total_sub7a4;
    
    // Semana 1
	$pdf->SetXY(47,$lin+35);
	$pdf->MultiCell(25,5, number_format($total_rec1,2,",","."), 1, 'R',0); // J Justificado
	
    // Semana 2
	$pdf->SetXY(72,$lin+35);
	$pdf->MultiCell(25,5, number_format($total_rec2,2,",","."), 1, 'R',0); // J Justificado

    // Semana 3
	$pdf->SetXY(97,$lin+35);
	$pdf->MultiCell(25,5, number_format($total_rec3,2,",","."), 1, 'R',0); // J Justificado

    // Semana 4
	$pdf->SetXY(122,$lin+35);
	$pdf->MultiCell(25,5, number_format($total_rec4,2,",","."), 1, 'R',0); // J Justificado

    // Semana 6
	$pdf->SetXY(147,$lin+35);
	$pdf->MultiCell(25,5, number_format($total_rec5,2,",","."), 1, 'R',0); // J Justificado

    // Semana 7
	$pdf->SetXY(172,$lin+35);
	$pdf->MultiCell(25,5, number_format($total_rec6,2,",","."), 1, 'R',0); // J Justificado

    // Semana 8
	$pdf->SetXY(197,$lin+35);
	$pdf->MultiCell(25,5, number_format($total_rec7,2,",","."), 1, 'R',0); // J Justificado
	
    $total_geral_subx = $total_rec1+$total_rec2+$total_rec3+$total_rec4+$total_rec5+$total_rec6+$total_rec7+$total_rec8;
 
	$pdf->SetXY(222,$lin+35);
	$pdf->MultiCell(25,5, number_format($total_geral_subx,2,",","."), 1, 'R',0); // J Justificado

$lin = $lin + 5;
// Despesas

$sql3  = "SELECT * FROM `demostrativo2` WHERE CODIGO = '6' ORDER BY id ASC";
	
	// WHERE  SUBSTRING(DATA,4,7) = '$inicio' AND OPERADORA = '$operadora'
$resultado3 = @mysql_query($sql3);
	
	// Inicio do Loop
	while($linha3 = @mysql_fetch_array($resultado3)) {
	

	    $pdf->ln();


	// Conta numero de linha
	if ($lin == 0){
		$lin = 40;
	}else{
		$lin = $lin + 5;
	}

    include('calculos_rec10.php');		

	}


    $sal_atual_1 = $total_rec1 - $total_sub1a7;
    $sal_atual_2 = $total_rec2 - $total_sub2a7;
    $sal_atual_3 = $total_rec3 - $total_sub3a7;
    $sal_atual_4 = $total_rec4 - $total_sub4a7;
    $sal_atual_5 = $total_rec5 - $total_sub5a7;
    $sal_atual_6 = $total_rec6 - $total_sub6a7;
    $sal_atual_7 = $total_rec7 - $total_sub7a7;
    
// Saldo Atual
    //$lin = $lin + 10;
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->SetXY(12,$lin+35);
	$pdf->MultiCell(35,5, 'SALDO ATUAL', 1, 'L',0); // J Justificado

    // Semana 1
	$pdf->SetXY(47,$lin+35);
	$pdf->MultiCell(25,5, number_format($sal_atual_1,2,",","."), 1, 'R',0); // J Justificado
	
    // Semana 2
	$pdf->SetXY(72,$lin+35);
	$pdf->MultiCell(25,5, number_format($sal_atual_2,2,",","."), 1, 'R',0); // J Justificado

    // Semana 3
	$pdf->SetXY(97,$lin+35);
	$pdf->MultiCell(25,5, number_format($sal_atual_3,2,",","."), 1, 'R',0); // J Justificado

    // Semana 4
	$pdf->SetXY(122,$lin+35);
	$pdf->MultiCell(25,5, number_format($sal_atual_4,2,",","."), 1, 'R',0); // J Justificado

    // Semana 6
	$pdf->SetXY(147,$lin+35);
	$pdf->MultiCell(25,5, number_format($sal_atual_5,2,",","."), 1, 'R',0); // J Justificado

    // Semana 7
	$pdf->SetXY(172,$lin+35);
	$pdf->MultiCell(25,5, number_format($sal_atual_6,2,",","."), 1, 'R',0); // J Justificado

    // Semana 8
	$pdf->SetXY(197,$lin+35);
	$pdf->MultiCell(25,5, number_format($sal_atual_7,2,",","."), 1, 'R',0); // J Justificado
	
    $total_geral_suby = $sal_atual_1+$sal_atual_2+$sal_atual_3+$sal_atual_4+$sal_atual_5+$sal_atual_6+$sal_atual_7;
 
	$pdf->SetXY(222,$lin+35);
	$pdf->MultiCell(25,5, number_format($total_geral_suby,2,",","."), 1, 'R',0); // J Justificado



// Saldo Lig. Dinheiro

    $total_liqui1 = $total_sub1a2-$total_sub1a7;
    $total_liqui2 = $total_sub2a2-$total_sub2a7;
    $total_liqui3 = $total_sub3a2-$total_sub3a7;
    $total_liqui4 = $total_sub4a2-$total_sub4a7;
    $total_liqui5 = $total_sub5a2-$total_sub5a7;
    $total_liqui6 = $total_sub6a2-$total_sub6a7;
    $total_liqui7 = $total_sub7a2-$total_sub7a7;
	 
    $lin = $lin + 5;
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->SetXY(12,$lin+35);
	$pdf->MultiCell(35,5, 'SALDO LIQ.-Dinheiro', 1, 'L',0); // J Justificado

    // Semana 1
	$pdf->SetXY(47,$lin+35);
	$pdf->MultiCell(25,5, number_format($total_liqui1,2,",","."), 1, 'R',0); // J Justificado
	
    // Semana 2
	$pdf->SetXY(72,$lin+35);
	$pdf->MultiCell(25,5, number_format($total_liqui2,2,",","."), 1, 'R',0); // J Justificado

    // Semana 3
	$pdf->SetXY(97,$lin+35);
	$pdf->MultiCell(25,5, number_format($total_liqui3,2,",","."), 1, 'R',0); // J Justificado

    // Semana 4
	$pdf->SetXY(122,$lin+35);
	$pdf->MultiCell(25,5, number_format($total_liqui4,2,",","."), 1, 'R',0); // J Justificado

    // Semana 6
	$pdf->SetXY(147,$lin+35);
	$pdf->MultiCell(25,5, number_format($total_liqui5,2,",","."), 1, 'R',0); // J Justificado

    // Semana 7
	$pdf->SetXY(172,$lin+35);
	$pdf->MultiCell(25,5, number_format($total_liqui6,2,",","."), 1, 'R',0); // J Justificado

    // Semana 8
	$pdf->SetXY(197,$lin+35);
	$pdf->MultiCell(25,5, number_format($total_liqui7,2,",","."), 1, 'R',0); // J Justificado
	
    $total_geral_subw = $total_liqui1+$total_liqui2+$total_liqui3+$total_liqui4+$total_liqui5+$total_liqui6+$total_liqui7;
 
	$pdf->SetXY(222,$lin+35);
	$pdf->MultiCell(25,5, number_format($total_geral_subw,2,",","."), 1, 'R',0); // J Justificado
	
    $cont_linha2 = 0;

$lin = $lin + 10;

// AQUI


	$conta_pag++;
	$total++;
	
	// Verifica Numero de linha e cria outra pagina
//	if ($conta_pag == $pagi_lim){   // 80 em Retrato 54 em Paisagem
	   $conta_pag  = 1;
	   $lin = 0;
	   $cont_linha = 0;
	   $Pagina++;
	   $pdf->AddPage('L');

//	}	


		if ($cont_linha == 0){
			// Cabecalho do Relatorio
			$pdf->SetFont('Arial', 'B', 7);
			$pdf->Text(12,10, '______________________________________________________________________________________________________________________________________________________________________________');
			$pdf->Text(12,11, '______________________________________________________________________________________________________________________________________________________________________________');
			$pdf->Text(14,16, 'Sindificios - Sind. Empreg. Edif. SP');
			$pdf->Text(126,16, $data);
			$pdf->Text(237,16, 'Pagina.: '.$Pagina);
			$pdf->Text(12,18, '______________________________________________________________________________________________________________________________________________________________________________');
			$pdf->Text(12,19, '______________________________________________________________________________________________________________________________________________________________________________');
			$pdf->SetFont('Arial', 'B', 10);
			$pdf->SetXY(12,20);
			
		
			$pdf->MultiCell(268,5, 'DEMOSTRATIVO FINANCEIRO - RELATÓRIO DIÁRIO DE DESPESAS', 0, 'C',0); // J Justificado
			$pdf->SetFont('Arial', 'B', 7);
			$pdf->Text(12,25, '______________________________________________________________________________________________________________________________________________________________________________');
			$pdf->Text(12,26, '______________________________________________________________________________________________________________________________________________________________________________');
				//               012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890
				//               1         2         3         4         5         6         7         8         9         10        11        12        13        14        15          
				//                   Codigo      
	
			$pdf->SetXY(12,30);
			$pdf->MultiCell(35,5, 'MÊS:       '.$nome_mes.'/'.$ano , 1, 'L',0); // J Justificado
			
			$pdf->SetXY(47,30);
			$pdf->MultiCell(175,5, 'Operadora    '.$operadora."                                FATURAMENTO  DIARIO  Semana  ".$semana, 1, 'L',0); // J Justificado
	
			$pdf->SetXY(222,30);
			$pdf->MultiCell(25,10, 'Fat/Semanal', 1, 'C',0); // J Justificado
			
	
			$pdf->SetXY(12,35);
			$pdf->MultiCell(35,5, 'MOV.FINANCEIRO', 1, 'L',0); // J Justificado
	
			$pdf->SetXY(47,35);
			$pdf->MultiCell(25,5, '2ª/ '.$semana1, 1, 'C',0); // J Justificado
	
			$pdf->SetXY(72,35);
			$pdf->MultiCell(25,5, '3ª/ '.$semana2, 1, 'C',0); // J Justificado
	
			$pdf->SetXY(97,35);
			$pdf->MultiCell(25,5, '4ª/ '.$semana3, 1, 'C',0); // J Justificado
	
			$pdf->SetXY(122,35);
			$pdf->MultiCell(25,5, '5ª/ '.$semana4, 1, 'C',0); // J Justificado
	
			$pdf->SetXY(147,35);
			$pdf->MultiCell(25,5, '6ª/ '.$semana5, 1, 'C',0); // J Justificado
	
			$pdf->SetXY(172,35);
			$pdf->MultiCell(25,5, 'Sab / '.$semana6, 1, 'C',0); // J Justificado
	
			$pdf->SetXY(197,35);
			$pdf->MultiCell(25,5, 'Dom / '.$semana7, 1, 'C',0); // J Justificado
			$cont_linha = 1;
	
		}



// Total de Cheques
$sql3  = "SELECT * FROM `demostrativo2` WHERE CODIGO = '7' ORDER BY id ASC";
	
	// WHERE  SUBSTRING(DATA,4,7) = '$inicio' AND OPERADORA = '$operadora'
$resultado3 = @mysql_query($sql3);
	
	// Inicio do Loop
	while($linha3 = @mysql_fetch_array($resultado3)) {
	

	    $pdf->ln();


	// Conta numero de linha
	if ($lin == 0){
		$lin = 10;
	}else{
		$lin = $lin + 5;
	}

    include('calculos_rec11.php');		

	}

//$lin = $lin + 10;
// Total de Cheques
$sql3  = "SELECT * FROM `demostrativo2` WHERE CODIGO = '8' ORDER BY id ASC";
	
	// WHERE  SUBSTRING(DATA,4,7) = '$inicio' AND OPERADORA = '$operadora'
$resultado3 = @mysql_query($sql3);
	
	// Inicio do Loop
	while($linha3 = @mysql_fetch_array($resultado3)) {
	

	    $pdf->ln();


	// Conta numero de linha
	if ($lin == 0){
		$lin = 40;
	}else{
		$lin = $lin + 5;
	}

    include('calculos_rec12.php');		

	}

    $liqui1 = 0;
    $liqui2 = 0;
    $liqui3 = 0;
    $liqui4 = 0;
    $liqui5 = 0;
    $liqui6 = 0;
    $liqui7 = 0;
    
    //$lin = $lin + 5;
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->SetXY(12,$lin+35);
	$pdf->MultiCell(35,5, 'Nº Promissoria - S/CH', 1, 'L',0); // J Justificado

    // Semana 1
	$pdf->SetXY(47,$lin+35);
	$pdf->MultiCell(25,5, $liqui1, 1, 'R',0); // J Justificado
	
    // Semana 2
	$pdf->SetXY(72,$lin+35);
	$pdf->MultiCell(25,5, $liqui2, 1, 'R',0); // J Justificado

    // Semana 3
	$pdf->SetXY(97,$lin+35);
	$pdf->MultiCell(25,5, $liqui3, 1, 'R',0); // J Justificado

    // Semana 4
	$pdf->SetXY(122,$lin+35);
	$pdf->MultiCell(25,5, $liqui4, 1, 'R',0); // J Justificado

    // Semana 6
	$pdf->SetXY(147,$lin+35);
	$pdf->MultiCell(25,5, $liqui5, 1, 'R',0); // J Justificado

    // Semana 7
	$pdf->SetXY(172,$lin+35);
	$pdf->MultiCell(25,5, $liqui6, 1, 'R',0); // J Justificado

    // Semana 8
	$pdf->SetXY(197,$lin+35);
	$pdf->MultiCell(25,5, $liqui7, 1, 'R',0); // J Justificado
	
    $total_geral_subt = 0;
 
	$pdf->SetXY(222,$lin+35);
	$pdf->MultiCell(25,5, $total_geral_subt, 1, 'R',0); // J Justificado


// DIFERENCAS                                     
    $total_liqui1f = $total_rec_menos1-$total_rec1+$total_carta+$total_sub1a_CLI;
    $total_liqui2f = $total_rec_menos2-$total_rec2+$total_cartb+$total_sub2a_CLI;
    $total_liqui3f = $total_rec_menos3-$total_rec3+$total_cartc+$total_sub3a_CLI;
    $total_liqui4f = $total_rec_menos4-$total_rec4+$total_cartd+$total_sub4a_CLI-$total_dinh_4-$total_cart_4;
    $total_liqui5f = $total_rec_menos5-$total_rec5+$total_carte+$total_sub5a_CLI;
    $total_liqui6f = $total_rec_menos6-$total_rec6+$total_cartf+$total_sub6a_CLI;
    $total_liqui7f = $total_rec_menos7-$total_rec7+$total_cartg+$total_sub7a_CLI;
	 
    $lin = $lin + 10;
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->SetXY(12,$lin+35);
	$pdf->MultiCell(35,5, 'Diferença', 1, 'L',0); // J Justificado

    // Semana 1
	$pdf->SetXY(47,$lin+35);
	$pdf->MultiCell(25,5, number_format($total_liqui1f,2,",","."), 1, 'R',0); // J Justificado
	
    // Semana 2
	$pdf->SetXY(72,$lin+35);
	$pdf->MultiCell(25,5, number_format($total_liqui2f,2,",","."), 1, 'R',0); // J Justificado

    // Semana 3
	$pdf->SetXY(97,$lin+35);
	$pdf->MultiCell(25,5, number_format($total_liqui3f,2,",","."), 1, 'R',0); // J Justificado

    // Semana 4
	$pdf->SetXY(122,$lin+35);
	$pdf->MultiCell(25,5, number_format($total_liqui4f,2,",","."), 1, 'R',0); // J Justificado

    // Semana 6
	$pdf->SetXY(147,$lin+35);
	$pdf->MultiCell(25,5, number_format($total_liqui5f,2,",","."), 1, 'R',0); // J Justificado

    // Semana 7
	$pdf->SetXY(172,$lin+35);
	$pdf->MultiCell(25,5, number_format($total_liqui6f,2,",","."), 1, 'R',0); // J Justificado

    // Semana 8
	$pdf->SetXY(197,$lin+35);
	$pdf->MultiCell(25,5, number_format($total_liqui7f,2,",","."), 1, 'R',0); // J Justificado
	
    $total_geral_subw = $total_liqui1f+$total_liqui2f+$total_liqui3f+$total_liqui4f+$total_liqui5f+$total_liqui6f+$total_liqui7f;
 
	$pdf->SetXY(222,$lin+35);
	$pdf->MultiCell(25,5, number_format($total_geral_subw,2,",","."), 1, 'R',0); // J Justificado

	
//	$pdf->AutoPrint(true);
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
