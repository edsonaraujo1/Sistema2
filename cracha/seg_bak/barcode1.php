<?
/*
*******************************************************************************************************************************
*	Rotina para gerar códigos de barra padrão 2of5 .
*	Este script foi testado com o leitor de código de barras e esta OK.
*	Basta chamar a função fbarcode("01202") com o valor
**********************************************************************************************************************************
*/


$frente 		= $_POST['tipo'];
$id 		    = $_POST['id'];


// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

	
$consulta  = "SELECT * FROM cracha WHERE id = '$id' ORDER BY id ASC LIMIT 0,50";

$resultado = mysql_query($consulta);

$row = mysql_fetch_array($resultado);

$id             = @$row["id"];
$matricula 		= @$row["matricula"];
$guerra 	    = @$row["nome_guera"];
$nome   		= @$row["nome"];
$funcao 		= @$row["cargo"]; 
$rgfunc 		= @$row["rg"];
$cpffunc 		= @$row["cpf"];
$dpto   		= @$row["dpto"];
$data           = @$row["data"];
$obs            = @$row["obs"];
$empresa        = @$row["empresa"];



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

	if ($tipo2 == 1){
	

		$pdf->image("../imagens/Cracha_01_frente.JPG",0,0,86,54);
		
    }else{
    	
		$pdf->image("../imagens/Cracha_01_frente_edif.JPG",0,0,86,54);
    	
    }
	$conf_fot = "fotos/".$valor.".jpg";
	$conf_bra = "../imagens/Branco.jpg";
	
	if(file_exists($conf_fot)){
	
	   $pdf->image($conf_fot,59.6,13,22,27);
	
	}else{
		
	   $pdf->image($conf_bra,59.6,13,22,27);
		
	}
	
	// Nome

	$pdf->SetFont('Arial', '', 5);
	
	$pdf->SetXY(5,23.9);
	$pdf->MultiCell(50,5, "NOME", 0, 'J',0); // J Justificado

	$pdf->SetFont('Arial', 'B', 10);
	
	$pdf->SetXY(5,27);
	$pdf->MultiCell(50,5, strtoupper($nome_guerra), 0, 'C',0); // J Justificado


	$pdf->SetFont('Arial', '', 5);
	
	$pdf->SetXY(5,33.9);
	$pdf->MultiCell(50,5, "DEPARTAMENTO", 0, 'J',0); // J Justificado

	$pdf->SetFont('Arial', '', 9);
	
	$pdf->SetXY(5,36.7);
	$pdf->MultiCell(50,5, strtoupper($dpto), 0, 'C',0); // J Justificado

	$pdf->SetFont('Arial', '', 4);
	
	$pdf->SetXY(30,49);
	$pdf->MultiCell(100,5, "Sindificios®", 0, 'C',0); // J Justificado

}else{
	
	
	if ($tipo2 == 1){
		
		$pdf->image("../imagens/Cracha_01_verso.JPG",0,0,86,54);
	
	
		$pdf->SetFont('Arial', '', 5);
		
		$pdf->SetXY(5,5);
		$pdf->MultiCell(50,5, "NOME EMPRESA", 0, 'J',0); // J Justificado
	
	
		$pdf->SetFont('Arial', 'B', 6);
		
		$pdf->SetXY(5,7.2);
		$pdf->MultiCell(150,5, "SINDICATO DOS EMPREGADOS DE EDIFICIOS DE SÃO PAULO", 0, 'J',0); // J Justificado
		
		
		$pdf->SetFont('Arial', '', 5);
		
		$pdf->SetXY(5,10);
		$pdf->MultiCell(50,5, "CNPJ", 0, 'J',0); // J Justificado
	
		$pdf->SetFont('Arial', 'B', 6);
		
		$pdf->SetXY(5,12.1);
		$pdf->MultiCell(150,5, "43.070.481/0001-14", 0, 'J',0); // J Justificado
		
		
	}else{
	
		$pdf->image("../imagens/Cracha_01_verso_edif.JPG",0,0,86,54);
	
	
		$pdf->SetFont('Arial', '', 5);
		
		$pdf->SetXY(5,5);
		$pdf->MultiCell(50,5, "NOME EMPRESA", 0, 'J',0); // J Justificado
	
	
		$pdf->SetFont('Arial', 'B', 6);
		
		$pdf->SetXY(5,7.2);
		$pdf->MultiCell(150,5, "CONDOMINIO EDIFICIO LAURINDO FERRARI", 0, 'J',0); // J Justificado
		
		
		$pdf->SetFont('Arial', '', 5);
		
		$pdf->SetXY(5,10);
		$pdf->MultiCell(50,5, "CNPJ", 0, 'J',0); // J Justificado
	
		$pdf->SetFont('Arial', 'B', 6);
		
		$pdf->SetXY(5,12.1);
		$pdf->MultiCell(150,5, "57.348.179/0001-90", 0, 'J',0); // J Justificado
	
	}
	// Nome
	
	$pdf->SetFont('Arial', '', 5);
	
	$pdf->SetXY(5,15);
	$pdf->MultiCell(50,5, "NOME DO FUNCIONARIO", 0, 'J',0); // J Justificado
	
	$pdf->SetFont('Arial', 'B', 7);
	
	$pdf->SetXY(5,17.3);
	$pdf->MultiCell(100,5, strtoupper($nome), 0, 'J',0); // J Justificado
	
	
	$pdf->SetFont('Arial', '', 5);
	
	$pdf->SetXY(5,20);
	$pdf->MultiCell(50,5, "CARGO", 0, 'J',0); // J Justificado

	$pdf->SetFont('Arial', 'B', 7);
	
	$pdf->SetXY(5,22.3);
	$pdf->MultiCell(100,5, strtoupper($funcao), 0, 'J',0); // J Justificado
	

	$pdf->SetFont('Arial', '', 5);
	
	$pdf->SetXY(5,26.5);
	$pdf->MultiCell(50,5, "MATRICULA", 0, 'J',0); // J Justificado


	$pdf->SetXY(26,26.5);
	$pdf->MultiCell(50,5, "R.G.", 0, 'J',0); // J Justificado

	$pdf->SetXY(47,26.5);
	$pdf->MultiCell(50,5, "CPF", 0, 'J',0); // J Justificado

	$pdf->SetFont('Arial', 'B', 7);

		
	$pdf->SetXY(5,29.2);
	$pdf->MultiCell(100,5, strtoupper($matricula), 0, 'J',0); // J Justificado
		

	$pdf->SetXY(26,29.2);
	$pdf->MultiCell(100,5, strtoupper($rgfunc), 0, 'J',0); // J Justificado

	$pdf->SetXY(47,29.2);
	$pdf->MultiCell(100,5, strtoupper($cpffunc), 0, 'J',0); // J Justificado

	// Codigo de Barras
	
	if (strlen($codigo_barras) <= 6){

	    $pdf->i25(25,39, $codigo_barras);
		
	}  
	if (strlen($codigo_barras) >= 7){

	    $pdf->i25(15,39, $codigo_barras);
		
	}  

	$pdf->SetFont('Arial', '', 4);
	
	$pdf->SetXY(30,49);
	$pdf->MultiCell(100,5, "Sindificios®", 0, 'C',0); // J Justificado

	
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