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

$total_cart1a = 0;
$total_cart2a = 0;
$total_cart3a = 0;
$total_cart4a = 0;
$total_cart5a = 0;
$total_cart6a = 0;
$total_cart7a = 0;

$total_dinhei1a = 0;
$total_dinhei2a = 0;
$total_dinhei3a = 0;
$total_dinhei4a = 0;
$total_dinhei5a = 0;
$total_dinhei6a = 0;
$total_dinhei7a = 0;
// Primeiro Bloco

		$operadora_sub = 'NILVA';
		$mensa = 145;
		$sql1a  = "SELECT * FROM `caixa` WHERE TIPO_MOV = '$mensa' AND SUBSTRING(DATA,1,2) = '$semana1' AND OPERADORA = '$operadora_sub' AND SUBSTRING(DATA,4,7) = '$inicio'";
			
		$resultado1a = @mysql_query($sql1a);
			
		// Inicio do Loop
		while($linhaa = @mysql_fetch_array($resultado1a)) {
	
		    $vlr_tot     = $linhaa["VLR_TOT"];
	
			$total_semana1 = $total_semana1 + $vlr_tot;
            $total_sub1a_CLI = $total_sub1a_CLI +  $vlr_tot;
            
			$t_moe_cart1   = $linhaa["T_MOEDA"];
			if ($t_moe_cart1 == 'T'){
				
				$total_cart1a = $total_cart1a + $vlr_tot;
				
			}else{
				
				$total_dinhei1a = $total_dinhei1a + $vlr_tot;
			}
            
		}


		$pdf->SetXY(12,$lin+10);
		$pdf->MultiCell(35,5, 'SECONCI', 1, 'L',0); // J Justificado
		
		// Semana 1
		$pdf->SetXY(47,$lin+10);
		$pdf->MultiCell(25,5, number_format($total_semana1,2,",","."), 1, 'R',0); // J Justificado


		$sql1b  = "SELECT * FROM `caixa` WHERE TIPO_MOV = '$mensa' AND  SUBSTRING(DATA,1,2) = '$semana2' AND OPERADORA = '$operadora_sub' AND SUBSTRING(DATA,4,7) = '$inicio'";
			
		$resultado1b = @mysql_query($sql1b);
			
		// Inicio do Loop
		while($linhab = @mysql_fetch_array($resultado1b)) {
	
		    $vlr_tot     = $linhab["VLR_TOT"];
	
			$total_semana2 = $total_semana2 + $vlr_tot;
			$total_sub2a_CLI = $total_sub2a_CLI +  $vlr_tot;

			$t_moe_cart1   = $linhab["T_MOEDA"];
			if ($t_moe_cart1 == 'T'){
				
				$total_cart2a = $total_cart2a + $vlr_tot;
				
			}else{
				
				$total_dinhei2a = $total_dinhei2a + $vlr_tot;
			}

		}

		    
		// Semana 2
		$pdf->SetXY(72,$lin+10);               
		$pdf->MultiCell(25,5, number_format($total_semana2,2,",","."), 1, 'R',0); // J Justificado
		

		$sql1c  = "SELECT * FROM `caixa` WHERE TIPO_MOV = '$mensa' AND  SUBSTRING(DATA,1,2) = '$semana3' AND OPERADORA = '$operadora_sub' AND SUBSTRING(DATA,4,7) = '$inicio'";
			
		$resultado1c = @mysql_query($sql1c);
			
		// Inicio do Loop
		while($linhac = @mysql_fetch_array($resultado1c)) {
	
		    $vlr_tot     = $linhac["VLR_TOT"];
	
			$total_semana3 = $total_semana3 + $vlr_tot;
            $total_sub3a_CLI = $total_sub3a_CLI +  $vlr_tot;

			$t_moe_cart1   = $linhac["T_MOEDA"];
			if ($t_moe_cart1 == 'T'){
				
				$total_cart3a = $total_cart3a + $vlr_tot;
				
			}else{
				
				$total_dinhei3a = $total_dinhei3a + $vlr_tot;
			}

		}
		
		// Semana 3
		$pdf->SetXY(97,$lin+10);              
		$pdf->MultiCell(25,5, number_format($total_semana3,2,",","."), 1, 'R',0); // J Justificado
		
		
		$sql1d  = "SELECT * FROM `caixa` WHERE TIPO_MOV = '$mensa' AND  SUBSTRING(DATA,1,2) = '$semana4' AND OPERADORA = '$operadora_sub' AND SUBSTRING(DATA,4,7) = '$inicio'";
			
		$resultado1d = @mysql_query($sql1d);
			
		// Inicio do Loop
		while($linhad = @mysql_fetch_array($resultado1d)) {
	
		    $vlr_tot     = $linhad["VLR_TOT"];
	
			$total_semana4 = $total_semana4 + $vlr_tot;
			$total_sub4a_CLI = $total_sub4a_CLI +  $vlr_tot;

			$t_moe_cart1   = $linhad["T_MOEDA"];
			if ($t_moe_cart1 == 'T'){
				
				$total_cart4a = $total_cart4a + $vlr_tot;
				
			}else{
				
				$total_dinhei4a = $total_dinhei4a + $vlr_tot;
			}

		}
		
		// Semana 4
		$pdf->SetXY(122,$lin+10);            
		$pdf->MultiCell(25,5, number_format($total_semana4,2,",","."), 1, 'R',0); // J Justificado
		

		$sql1e  = "SELECT * FROM `caixa` WHERE TIPO_MOV = '$mensa' AND  SUBSTRING(DATA,1,2) = '$semana5' AND OPERADORA = '$operadora_sub' AND SUBSTRING(DATA,4,7) = '$inicio'";
			
		$resultado1e = @mysql_query($sql1e);
			
		// Inicio do Loop
		while($linhae = @mysql_fetch_array($resultado1e)) {
	
		    $vlr_tot     = $linhae["VLR_TOT"];
	
			$total_semana5 = $total_semana5 + $vlr_tot;
			$total_sub5a_CLI = $total_sub5a_CLI +  $vlr_tot;
			
			$t_moe_cart1   = $linhae["T_MOEDA"];
			if ($t_moe_cart1 == 'T'){
				
				$total_cart5 = $total_cart5 + $vlr_tot;
			}
			
			

		}
		
		// Semana 5
		$pdf->SetXY(147,$lin+10);              
		$pdf->MultiCell(25,5, number_format($total_semana5,2,",","."), 1, 'R',0); // J Justificado


		$sql1f  = "SELECT * FROM `caixa` WHERE TIPO_MOV = '$mensa' AND  SUBSTRING(DATA,1,2) = '$semana6' AND OPERADORA = '$operadora_sub' AND SUBSTRING(DATA,4,7) = '$inicio'";
			
		$resultado1f = @mysql_query($sql1f);
			
		// Inicio do Loop
		while($linhaf = @mysql_fetch_array($resultado1f)) {
	
		    $vlr_tot     = $linhaf["VLR_TOT"];
	
			$total_semana6 = $total_semana6 + $vlr_tot;
			$total_sub6a_CLI = $total_sub6a_CLI +  $vlr_tot;

		}
		
		// Semana 6
		$pdf->SetXY(172,$lin+10);              
		$pdf->MultiCell(25,5, number_format($total_semana6,2,",","."), 1, 'R',0); // J Justificado


		$sql1g  = "SELECT * FROM `caixa` WHERE TIPO_MOV = '$mensa' AND  SUBSTRING(DATA,1,2) = '$semana7' AND OPERADORA = '$operadora_sub' AND SUBSTRING(DATA,4,7) = '$inicio'";
			
		$resultado1g = @mysql_query($sql1g);
			
		// Inicio do Loop
		while($linhag = @mysql_fetch_array($resultado1g)) {
	
		    $vlr_tot     = $linhag["VLR_TOT"];
	
			$total_semana7 = $total_semana7 + $vlr_tot;
			$total_sub7a_CLI = $total_sub7a_CLI +  $vlr_tot;

		}
		
		// Semana 7
		$pdf->SetXY(197,$lin+10);              
		$pdf->MultiCell(25,5, number_format($total_semana7,2,",","."), 1, 'R',0); // J Justificado

        $total_1a_CLI   = $total_semana1+$total_semana2+$total_semana3+$total_semana4+$total_semana5+$total_semana6+$total_semana7+$total_semana8;


		$toral_cart_CLIa   = $total_cart1+$total_cart2+$total_cart3+$total_cart4+$total_cart5+$total_cart6+$total_cart7;
				
		$total_dinhei_CLIa = $total_dinhei1+$total_dinhei2+$total_dinhei3+$total_dinhei4+$total_dinhei5+$total_dinhei6+$total_dinhei7;


		$pdf->SetXY(222,$lin+10);
		$pdf->MultiCell(25,5, number_format($total_1a,2,",","."), 1, 'R',0); // J Justificado


?>