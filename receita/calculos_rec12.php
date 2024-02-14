<?php

/**
 * @author holodek
 * @copyright 2010
 */

$total_semana1 = 0;
$total_semana2 = 0;
$total_semana3 = 0;
$total_semana4 = 0;
$total_semana5 = 0;
$total_semana6 = 0;
$total_semana7 = 0;

// Primeiro Bloco

		$operadora = 'NILVA';
		$sql1a  = "SELECT * FROM `caixa` WHERE SUBSTRING(DATA,1,2) = '$semana1' AND OPERADORA = '$operadora' AND SUBSTRING(DATA,4,7) = '$inicio' AND (TIPO_MOV = '1' OR TIPO_MOV = '6')";
			
		$resultado1a = @mysql_query($sql1a);
			
		$qtd_reg1a = @mysql_num_rows($resultado1a);
			
		$pdf->SetXY(12,$lin+30);
		$pdf->MultiCell(35,5, 'Nº Atend. Socios', 1, 'L',0); // J Justificado
		
		// Semana 1
		$pdf->SetXY(47,$lin+30);
		$pdf->MultiCell(25,5, $qtd_reg1a, 1, 'R',0); // J Justificado


		$sql1b  = "SELECT * FROM `caixa` WHERE SUBSTRING(DATA,1,2) = '$semana2' AND OPERADORA = '$operadora' AND SUBSTRING(DATA,4,7) = '$inicio' AND (TIPO_MOV = '1' OR TIPO_MOV = '6')";
			
		$resultado1b = @mysql_query($sql1b);
			
		$qtd_reg2a = @mysql_num_rows($resultado1b);
		    
		// Semana 2
		$pdf->SetXY(72,$lin+30);               
		$pdf->MultiCell(25,5, $qtd_reg2a, 1, 'R',0); // J Justificado
		

		$sql1c  = "SELECT * FROM `caixa` WHERE SUBSTRING(DATA,1,2) = '$semana3' AND OPERADORA = '$operadora' AND SUBSTRING(DATA,4,7) = '$inicio' AND (TIPO_MOV = '1' OR TIPO_MOV = '6')";
			
		$resultado1c = @mysql_query($sql1c);
			
		$qtd_reg3a = @mysql_num_rows($resultado1c);
		
		// Semana 3
		$pdf->SetXY(97,$lin+30);              
		$pdf->MultiCell(25,5, $qtd_reg3a, 1, 'R',0); // J Justificado
		
		
		$sql1d  = "SELECT * FROM `caixa` WHERE SUBSTRING(DATA,1,2) = '$semana4' AND OPERADORA = '$operadora' AND SUBSTRING(DATA,4,7) = '$inicio' AND (TIPO_MOV = '1' OR TIPO_MOV = '6')";
			
		$resultado1d = @mysql_query($sql1d);
			
		$qtd_reg4a = @mysql_num_rows($resultado1d);
		
		// Semana 4
		$pdf->SetXY(122,$lin+30);            
		$pdf->MultiCell(25,5, $qtd_reg4a, 1, 'R',0); // J Justificado
		

		$sql1e  = "SELECT * FROM `caixa` WHERE SUBSTRING(DATA,1,2) = '$semana5' AND OPERADORA = '$operadora' AND SUBSTRING(DATA,4,7) = '$inicio' AND (TIPO_MOV = '1' OR TIPO_MOV = '6')";
			
		$resultado1e = @mysql_query($sql1e);
			
		$qtd_reg5a = @mysql_num_rows($resultado1e);
		
		// Semana 5
		$pdf->SetXY(147,$lin+30);              
		$pdf->MultiCell(25,5, $qtd_reg5a, 1, 'R',0); // J Justificado


		$sql1f  = "SELECT * FROM `caixa` WHERE SUBSTRING(DATA,1,2) = '$semana6' AND OPERADORA = '$operadora' AND SUBSTRING(DATA,4,7) = '$inicio' AND (TIPO_MOV = '1' OR TIPO_MOV = '6')";
			
		$resultado1f = @mysql_query($sql1f);
			
		$qtd_reg6a = @mysql_num_rows($resultado1f);
		
		// Semana 6
		$pdf->SetXY(172,$lin+30);              
		$pdf->MultiCell(25,5, $qtd_reg6a, 1, 'R',0); // J Justificado


		$sql1g  = "SELECT * FROM `caixa` WHERE SUBSTRING(DATA,1,2) = '$semana7' AND OPERADORA = '$operadora' AND SUBSTRING(DATA,4,7) = '$inicio' AND (TIPO_MOV = '1' OR TIPO_MOV = '6')";
			
		$resultado1g = @mysql_query($sql1g);
			
		$qtd_reg7a = @mysql_num_rows($resultado1g);
		
		// Semana 7
		$pdf->SetXY(197,$lin+30);              
		$pdf->MultiCell(25,5, $qtd_reg7a, 1, 'R',0); // J Justificado

        $total_1a   = $qtd_reg1a+$qtd_reg2a+$qtd_reg3a+$qtd_reg4a+$qtd_reg5a+$qtd_reg6a+$qtd_reg7a;

		$pdf->SetXY(222,$lin+30);
		$pdf->MultiCell(25,5, $total_1a, 1, 'R',0); // J Justificado


?>