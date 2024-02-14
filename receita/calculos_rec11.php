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
		$sql1a  = "SELECT * FROM `caixa` WHERE SUBSTRING(DATA,1,2) = '$semana1' AND OPERADORA = '$operadora' AND SUBSTRING(DATA,4,7) = '$inicio' AND T_MOEDA = 'C'";
			
		$resultado1a = @mysql_query($sql1a);
			
		// Inicio do Loop
		while($linhaa = @mysql_fetch_array($resultado1a)) {
	
		    $vlr_tot     = $linhaa["QTD"];
	
			$total_semana1 = $total_semana1 + $vlr_tot;
            $total_sub1ac = $total_sub1ac +  $vlr_tot;
		}
			
		$pdf->SetXY(12,$lin+30);
		$pdf->MultiCell(35,5, 'Nº Tottal Cheques', 1, 'L',0); // J Justificado
		
		// Semana 1
		$pdf->SetXY(47,$lin+30);
		$pdf->MultiCell(25,5, $total_semana1, 1, 'R',0); // J Justificado


		$sql1b  = "SELECT * FROM `caixa` WHERE SUBSTRING(DATA,1,2) = '$semana2' AND OPERADORA = '$operadora' AND SUBSTRING(DATA,4,7) = '$inicio' AND T_MOEDA = 'C'";
			
		$resultado1b = @mysql_query($sql1b);
			
		// Inicio do Loop
		while($linhab = @mysql_fetch_array($resultado1b)) {
	
		    $vlr_tot     = $linhab["QTD"];
	
			$total_semana2 = $total_semana2 + $vlr_tot;
            $total_sub1bc = $total_sub1bc +  $vlr_tot;
		}
		    
		// Semana 2
		$pdf->SetXY(72,$lin+30);               
		$pdf->MultiCell(25,5, $total_semana2, 1, 'R',0); // J Justificado
		

		$sql1c  = "SELECT * FROM `caixa` WHERE SUBSTRING(DATA,1,2) = '$semana3' AND OPERADORA = '$operadora' AND SUBSTRING(DATA,4,7) = '$inicio' AND T_MOEDA = 'C'";
			
		$resultado1c = @mysql_query($sql1c);
			
		// Inicio do Loop
		while($linhac = @mysql_fetch_array($resultado1c)) {
	
		    $vlr_tot     = $linhac["QTD"];
	
			$total_semana3 = $total_semana3 + $vlr_tot;
            $total_sub1cc = $total_subcc +  $vlr_tot;
		}
		
		// Semana 3
		$pdf->SetXY(97,$lin+30);              
		$pdf->MultiCell(25,5, $total_semana3, 1, 'R',0); // J Justificado
		
		
		$sql1d  = "SELECT * FROM `caixa` WHERE SUBSTRING(DATA,1,2) = '$semana4' AND OPERADORA = '$operadora' AND SUBSTRING(DATA,4,7) = '$inicio' AND T_MOEDA = 'C'";
			
		$resultado1d = @mysql_query($sql1d);
			
		// Inicio do Loop
		while($linhad = @mysql_fetch_array($resultado1d)) {
	
		    $vlr_tot     = $linhad["QTD"];
	
			$total_semana4 = $total_semana4 + $vlr_tot;
            $total_sub1dc = $total_sub1dc +  $vlr_tot;
		}
		
		// Semana 4
		$pdf->SetXY(122,$lin+30);            
		$pdf->MultiCell(25,5, $total_semana4, 1, 'R',0); // J Justificado
		

		$sql1e  = "SELECT * FROM `caixa` WHERE SUBSTRING(DATA,1,2) = '$semana5' AND OPERADORA = '$operadora' AND SUBSTRING(DATA,4,7) = '$inicio' AND T_MOEDA = 'C'";
			
		$resultado1e = @mysql_query($sql1e);
			
		// Inicio do Loop
		while($linhae = @mysql_fetch_array($resultado1e)) {
	
		    $vlr_tot     = $linhae["QTD"];
	
			$total_semana5 = $total_semana5 + $vlr_tot;
            $total_sub1ec = $total_sub1ec +  $vlr_tot;
		}
		
		// Semana 5
		$pdf->SetXY(147,$lin+30);              
		$pdf->MultiCell(25,5, $total_semana5, 1, 'R',0); // J Justificado


		$sql1f  = "SELECT * FROM `caixa` WHERE SUBSTRING(DATA,1,2) = '$semana6' AND OPERADORA = '$operadora' AND SUBSTRING(DATA,4,7) = '$inicio' AND T_MOEDA = 'C'";
			
		$resultado1f = @mysql_query($sql1f);
			
		// Inicio do Loop
		while($linhaf = @mysql_fetch_array($resultado1f)) {
	
		    $vlr_tot     = $linhaf["QTD"];
	
			$total_semana5 = $total_semana5 + $vlr_tot;
            $total_sub1fc = $total_sub1fc +  $vlr_tot;
		}
		
		// Semana 6
		$pdf->SetXY(172,$lin+30);              
		$pdf->MultiCell(25,5, $total_semana6, 1, 'R',0); // J Justificado


		$sql1g  = "SELECT * FROM `caixa` WHERE SUBSTRING(DATA,1,2) = '$semana7' AND OPERADORA = '$operadora' AND SUBSTRING(DATA,4,7) = '$inicio' AND T_MOEDA = 'C'";
			
		$resultado1g = @mysql_query($sql1g);
			
		// Inicio do Loop
		while($linhag = @mysql_fetch_array($resultado1g)) {
	
		    $vlr_tot     = $linhag["QTD"];
	
			$total_semana5 = $total_semana5 + $vlr_tot;
            $total_sub1gc = $total_sub1gc +  $vlr_tot;
		}
		
		// Semana 7
		$pdf->SetXY(197,$lin+30);              
		$pdf->MultiCell(25,5, $total_semana7, 1, 'R',0); // J Justificado

        $total_1a   = $total_sub1ac+$total_sub1bc+$total_sub1cc+$total_sub1dc+$total_sub1ec+$total_sub1fc+$total_sub1gc;

		$pdf->SetXY(222,$lin+30);
		$pdf->MultiCell(25,5, $total_1a, 1, 'R',0); // J Justificado


?>