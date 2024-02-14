<?
/*
*******************************************************************************************************************************
*	Rotina para gerar códigos de barra padrão 2of5 .
*	Este script foi testado com o leitor de código de barras e esta OK.
*	Basta chamar a função fbarcode("01202") com o valor
**********************************************************************************************************************************
*/

$frente 		= 2;
$nome_guerra 	= "Edson de Araujo";
$nome   		= "Edson de Araujo";
$funcao 		= "Programador"; 
$matricula 		= "00146";
$rgfunc 		= "17.441.692-1";
$cpffunc 		= "135.521.198-09";


$valor = isset($valor) ? $valor : $matricula; // Valor Inicial

$valor_m11 = modulo_11($valor);

// echo "Digito e. ".$valor_m11."<br>";

$codigo_barras = trim($valor) . trim($valor_m11);


include('fpdf.php');
// Inicia Codigo dos Boletos
include('i25.php');

// Inicio do Boleto

$pdf = new PDF_i25('L','mm','A4');
$pdf->Open();
$pdf->SetAutoPageBreak(0, 0);
$pdf->SetTopMargin(0);
$pdf->AddPage();
$pdf->SetDisplayMode(fullwidth, continuous);


$conta_pag = $conta_pg++;

$pdf->ln();

// x = horizontal y = vertical z = largura w = altura

if ($frente == 1){
	

	$pdf->image("../imagens/Cracha_01_frente.JPG",0,0,86,54);

	$conf_fot = "fotos/".$valor.".jpg";
	$conf_bra = "../imagens/Branco.jpg";
	
	if(file_exists($conf_fot)){
	
	   $pdf->image($conf_fot,60,13,22,27);
	
	}else{
		
	   $pdf->image($conf_bra,60,13,22,27);
		
	}
	
	// Nome
	$pdf->SetFont('Arial', 'B', 10);
	
	$pdf->SetXY(5,27);
	$pdf->MultiCell(50,5, strtoupper($nome_guerra), 0, 'C',0); // J Justificado

	$pdf->SetFont('Arial', '', 9);
	
	$pdf->SetXY(5,36.7);
	$pdf->MultiCell(50,5, strtoupper($funcao), 0, 'C',0); // J Justificado

}else{
	
	$pdf->image("../imagens/Cracha_01_verso.JPG",0,0,86,54);
	
	// Nome
	$pdf->SetFont('Arial', 'B', 7);
	
	$pdf->SetXY(5,17.3);
	$pdf->MultiCell(100,5, strtoupper($nome), 0, 'J',0); // J Justificado
	
	$pdf->SetXY(5,22.3);
	$pdf->MultiCell(100,5, strtoupper($funcao), 0, 'J',0); // J Justificado
	
		
	$pdf->SetXY(5,29.2);
	$pdf->MultiCell(100,5, strtoupper($matricula), 0, 'J',0); // J Justificado
		

	$pdf->SetXY(26,29.2);
	$pdf->MultiCell(100,5, strtoupper($rgfunc), 0, 'J',0); // J Justificado

	$pdf->SetXY(47,29.2);
	$pdf->MultiCell(100,5, strtoupper($cpffunc), 0, 'J',0); // J Justificado

	// Codigo de Barras
	$pdf->i25(25,39, $codigo_barras);

	
}

$pdf->AddPage();


$pdf->AutoPrint(true);
$pdf->Output();
@mysql_close(); 


function modulo_11($num, $base=9, $r=0) {
/**
* Autor:
* Pablo Costa <pablo@users.sourceforge.net>
*
* Função:
* Calculo do Modulo 11 para geracao do digito verificador 
* de boletos bancarios conforme documentos obtidos 
* da Febraban - www.febraban.org.br 
*
* Entrada:
* $num: string numérica para a qual se deseja calcularo digito verificador;
* $base: valor maximo de multiplicacao [2-$base]
* $r: quando especificado um devolve somente o resto
*
* Saída:
* Retorna o Digito verificador.
*
* Observações:
* - Script desenvolvido sem nenhum reaproveitamento de código pré existente.
* - Assume-se que a verificação do formato das variáveis de entrada é feita antes da execução deste script.
*/ 

$soma = 0;
$fator = 2;

/* Separacao dos numeros */
for ($i = strlen($num); $i > 0; $i--) {
// pega cada numero isoladamente
$numeros[$i] = substr($num,$i-1,1);
// Efetua multiplicacao do numero pelo falor
$parcial[$i] = $numeros[$i] * $fator;
// Soma dos digitos
$soma += $parcial[$i];
if ($fator == $base) {
// restaura fator de multiplicacao para 2 
$fator = 1;
}
$fator++;
}

/* Calculo do modulo 11 */
if ($r == 0) {
$soma *= 10;
$digito = $soma % 11;
if ($digito == 10) {
$digito = 0;
}
return $digito;
} elseif ($r == 1){
$resto = $soma % 11;
return $resto;
}
}
?>