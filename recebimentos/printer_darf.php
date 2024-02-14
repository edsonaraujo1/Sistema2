<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Gerar Guia DARF Comum em PDF
 Criado em Data.....: 09/02/2010
 Ultima Atualização : 09/02/2010 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

$Edit1        = strtoupper($_POST['Edit1']);
$Edit2        = strtoupper($_POST['Edit2']);
$Edit3        = strtoupper($_POST['Edit3']);
$Edit4        = strtoupper($_POST['Edit4']);
$Edit5        = strtoupper($_POST['Edit5']);
$Edit6        = strtoupper($_POST['Edit6']);
$Edit7        = strtoupper($_POST['Edit7']);

$Edit8        = strtoupper($_POST['Edit8']);
$Edit9        = strtoupper($_POST['Edit9']);
$Edit10       = strtoupper($_POST['Edit10']);

$Edit11       = strtoupper($_POST['Edit11']);
$Edit12       = $_POST['Edit12'];
$Edit13       = $_POST['Edit13'];
$Edit14       = $_POST['Edit14'];
$Edit15       = $_POST['Edit15'];

// Funcao para trocar , por .
$Edit8  = str_replace(",",".",$Edit8);
$Edit9  = str_replace(",",".",$Edit9);
$Edit10 = str_replace(",",".",$Edit10);

/*
echo $Edit1."<br>";
echo $Edit2."<br>";
echo $Edit3."<br>";
echo $Edit4."<br>";
echo $Edit5."<br>";
echo $Edit6."<br>";
echo $Edit7."<br>";
echo $Edit8."<br>";
echo $Edit9."<br>";
echo $Edit10."<br>";
echo $Edit11."<br>";
echo $Edit12."<br>";
echo $Edit13."<br>";
echo $Edit14."<br>";
echo $Edit15."<br>";
*/

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
$pdf->SetMargins(0,0,0);

$pdf->ln();

// x = horizontal y = vertical z = largura w = altura

$pdf->image("../imagens/Darf.JPG",0,0,190,232);

// Primeira Via

$pdf->SetFont('Arial', 'B', 7);
$pdf->Text(105,4, $conta_pag);

$pdf->SetFont('Arial', '', 9);

$pdf->SetXY(136,10); // Periodo de Apuracao
$pdf->MultiCell(45,4, $Edit3, 0, 'R',0); // J Justificado

$pdf->SetXY(136,17); // CNPJ / CPF
$pdf->MultiCell(45,4, $Edit4, 0, 'R',0); // J Justificado

$pdf->SetXY(136,24.2); // Codigo Receita
$pdf->MultiCell(45,4, $Edit5, 0, 'R',0); // J Justificado

$pdf->SetXY(136,32); // Numero Referencia
$pdf->MultiCell(45,4, $Edit6, 0, 'R',0); // J Justificado

$pdf->SetXY(136,42); // Vencimento
$pdf->MultiCell(45,4, $Edit7, 0, 'R',0); // J Justificado

$pdf->SetFont('Arial', '', 9);
$pdf->SetXY(10,41); // Nome
$pdf->MultiCell(90,4, $Edit1, 0, '',0); // J Justificado

$pdf->SetXY(10,49); // Telefone
$pdf->MultiCell(45,4, $Edit2, 0, 'L',0); // J Justificado

$pdf->SetFont('Arial', '', 9);
$pdf->SetXY(10,55); // Destinatario
$pdf->MultiCell(90,4, $Edit11, 0, 'L',0); // J Justificado

$pdf->SetXY(136,55); // Valor
$pdf->MultiCell(45,4, $Edit8, 0, 'R',0); // J Justificado

if (empty($Edit9)){
	$Edit9 = "0,00";
}
if (empty($Edit10)){
	$Edit10 = "0,00";
}

$pdf->SetXY(136,62); // Multa
$pdf->MultiCell(45,4, $Edit9, 0, 'R',0); // J Justificado

$pdf->SetXY(136,69); // Valor do Juros
$pdf->MultiCell(45,4, $Edit10, 0, 'R',0); // J Justificado

$vl_total  = $Edit8 + $Edit9 + $Edit10;
$vl_total1 = number_format($vl_total,2,",","."); 

$pdf->SetXY(136,78); // Valor do Juros
$pdf->MultiCell(45,4, $vl_total1, 0, 'R',0); // J Justificado

$pdf->SetXY(9,91); // Obs
$pdf->MultiCell(90,4, $Edit12, 0, '',0); // J Justificado


// Segunda Via

$pdf->SetFont('Arial', 'B', 7);
$pdf->Text(105,4, $conta_pag);

$pdf->SetFont('Arial', '', 9);

$pdf->SetXY(136,133); // Periodo de Apuracao
$pdf->MultiCell(45,4, $Edit3, 0, 'R',0); // J Justificado

$pdf->SetXY(136,141); // CNPJ / CPF
$pdf->MultiCell(45,4, $Edit4, 0, 'R',0); // J Justificado

$pdf->SetXY(136,147.6); // Codigo Receita
$pdf->MultiCell(45,4, $Edit5, 0, 'R',0); // J Justificado

$pdf->SetXY(136,155); // Numero Referencia
$pdf->MultiCell(45,4, $Edit6, 0, 'R',0); // J Justificado

$pdf->SetXY(136,166); // Vencimento
$pdf->MultiCell(45,4, $Edit7, 0, 'R',0); // J Justificado

$pdf->SetFont('Arial', '', 9);
$pdf->SetXY(10,164); // Nome
$pdf->MultiCell(90,4, $Edit1, 0, '',0); // J Justificado

$pdf->SetXY(10,172); // Telefone
$pdf->MultiCell(45,4, $Edit2, 0, 'L',0); // J Justificado

$pdf->SetFont('Arial', '', 9);
$pdf->SetXY(10,179); // Destinatario
$pdf->MultiCell(90,4, $Edit11, 0, 'L',0); // J Justificado

if (empty($Edit9)){
	$Edit9 = "0,00";
}
if (empty($Edit10)){
	$Edit10 = "0,00";
}

$pdf->SetXY(136,179); // Valor
$pdf->MultiCell(45,4, $Edit8, 0, 'R',0); // J Justificado

$pdf->SetXY(136,186); // Multa
$pdf->MultiCell(45,4, $Edit9, 0, 'R',0); // J Justificado

$pdf->SetXY(136,193); // Valor do Juros
$pdf->MultiCell(45,4, $Edit10, 0, 'R',0); // J Justificado


$vl_total  = $Edit8 + $Edit9 + $Edit10;
$vl_total1 = number_format($vl_total,2,",","."); 

$pdf->SetXY(136,202); // Valor do Juros
$pdf->MultiCell(45,4, $vl_total1, 0, 'R',0); // J Justificado

$pdf->SetXY(9,215); // Obs
$pdf->MultiCell(90,4, $Edit12, 0, '',0); // J Justificado

// Codigo de Barras
//$pdf->i25(4,280, $codigo_barras);

//$pdf->AddPage();

$pdf->AutoPrint(true);
$pdf->Output();


?>
