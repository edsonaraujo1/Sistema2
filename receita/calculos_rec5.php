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
		$sql1ax  = "SELECT * FROM `caixa` WHERE SUBSTRING(DATA,1,2) = '$semana1' AND OPERADORA = '$operadora' AND SUBSTRING(DATA,4,7) = '$inicio' AND T_MOEDA = 'D' AND TIPO_MOV = '30'";
			
		$resultado1ax = @mysql_query($sql1ax);
		
        $row_1ax =  @mysql_fetch_array($resultado1ax);

        $sub_tra = @$row_1ax["VLR_TOT"];

		$sql1a  = "SELECT * FROM `caixa` WHERE SUBSTRING(DATA,1,2) = '$semana1' AND OPERADORA = '$operadora' AND SUBSTRING(DATA,4,7) = '$inicio' AND T_MOEDA = 'C' AND TIPO_MOV != '69'";
			
		$resultado1a = @mysql_query($sql1a);
			
		// Inicio do Loop
		while($linhaa = @mysql_fetch_array($resultado1a)) {
	
		    $vlr_tot     = $linhaa["VLR_TOT"];

			$total_semana1 = $total_semana1 + $vlr_tot;
            $total_sub1a1 = $total_sub1a1 +  $vlr_tot;
		}
			$total_semana1 = $total_semana1 - $sub_tra;
            $total_sub1a1 = $total_sub1a1 - $sub_tra;


		$pdf->SetXY(12,$lin+30);
		$pdf->MultiCell(35,5, 'Cheque', 1, 'L',0); // J Justificado
		
		// Semana 1
		$pdf->SetXY(47,$lin+30);
		$pdf->MultiCell(25,5, number_format($total_semana1,2,",","."), 1, 'R',0); // J Justificado


		$sql1bx  = "SELECT * FROM `caixa` WHERE SUBSTRING(DATA,1,2) = '$semana2' AND OPERADORA = '$operadora' AND SUBSTRING(DATA,4,7) = '$inicio' AND T_MOEDA = 'D' AND TIPO_MOV = '30' ";
			
		$resultado1bx = @mysql_query($sql1bx);
		
        $row_1bx =  @mysql_fetch_array($resultado1bx);

        $sub_trb = @$row_1bx["VLR_TOT"];

		$sql1b  = "SELECT * FROM `caixa` WHERE SUBSTRING(DATA,1,2) = '$semana2' AND OPERADORA = '$operadora' AND SUBSTRING(DATA,4,7) = '$inicio' AND T_MOEDA = 'C' AND TIPO_MOV != '69'";
			
		$resultado1b = @mysql_query($sql1b);
			
		// Inicio do Loop
		while($linhab = @mysql_fetch_array($resultado1b)) {
	
		    $vlr_tot     = $linhab["VLR_TOT"];
	
			$total_semana2 = $total_semana2 + $vlr_tot;
			$total_sub2a1 = $total_sub2a1 +  $vlr_tot;


		}
			$total_semana2 = $total_semana2 - $sub_trb;
			$total_sub2a1 = $total_sub2a1 -  $sub_trb;
		    
		// Semana 2
		$pdf->SetXY(72,$lin+30);               
		$pdf->MultiCell(25,5, number_format($total_semana2,2,",","."), 1, 'R',0); // J Justificado
		

		$sql1cx  = "SELECT * FROM `caixa` WHERE SUBSTRING(DATA,1,2) = '$semana3' AND OPERADORA = '$operadora' AND SUBSTRING(DATA,4,7) = '$inicio' AND T_MOEDA = 'D' AND TIPO_MOV = '30' ";
			
		$resultado1cx = @mysql_query($sql1cx);
		
        $row_1cx =  @mysql_fetch_array($resultado1cx);

        $sub_trc = @$row_1cx["VLR_TOT"];

		$sql1c  = "SELECT * FROM `caixa` WHERE SUBSTRING(DATA,1,2) = '$semana3' AND OPERADORA = '$operadora' AND SUBSTRING(DATA,4,7) = '$inicio' AND T_MOEDA = 'C' AND TIPO_MOV != '69'";
			
		$resultado1c = @mysql_query($sql1c);
			
		// Inicio do Loop
		while($linhac = @mysql_fetch_array($resultado1c)) {
	
		    $vlr_tot     = $linhac["VLR_TOT"];
	
			$total_semana3 = $total_semana3 + $vlr_tot;
            $total_sub3a1 = $total_sub3a1 +  $vlr_tot;
		}
			$total_semana3 = $total_semana3 - $sub_trc;
            $total_sub3a1 = $total_sub3a1 -  $sub_trc;
		
		// Semana 3
		$pdf->SetXY(97,$lin+30);              
		$pdf->MultiCell(25,5, number_format($total_semana3,2,",","."), 1, 'R',0); // J Justificado
		

		$sql1dx  = "SELECT * FROM `caixa` WHERE SUBSTRING(DATA,1,2) = '$semana4' AND OPERADORA = '$operadora' AND SUBSTRING(DATA,4,7) = '$inicio' AND T_MOEDA = 'D' AND TIPO_MOV = '30' ";
			
		$resultado1dx = @mysql_query($sql1dx);
		
        $row_1dx =  @mysql_fetch_array($resultado1dx);

        $sub_trd = @$row_1dx["VLR_TOT"];

		
		$sql1d  = "SELECT * FROM `caixa` WHERE SUBSTRING(DATA,1,2) = '$semana4' AND OPERADORA = '$operadora' AND SUBSTRING(DATA,4,7) = '$inicio' AND T_MOEDA = 'C' AND TIPO_MOV != '69'";
			
		$resultado1d = @mysql_query($sql1d);
			
		// Inicio do Loop
		while($linhad = @mysql_fetch_array($resultado1d)) {
	
		    $vlr_tot     = $linhad["VLR_TOT"];
	
			$total_semana4 = $total_semana4 + $vlr_tot;
			$total_sub4a1 = $total_sub4a1 +  $vlr_tot;

		}
			$total_semana4 = $total_semana4 - $sub_trd;
			$total_sub4a1 = $total_sub4a1 -  $sub_trd;
		
		// Semana 4
		$pdf->SetXY(122,$lin+30);            
		$pdf->MultiCell(25,5, number_format($total_semana4,2,",","."), 1, 'R',0); // J Justificado
		
		$sql1ex  = "SELECT * FROM `caixa` WHERE SUBSTRING(DATA,1,2) = '$semana5' AND OPERADORA = '$operadora' AND SUBSTRING(DATA,4,7) = '$inicio' AND T_MOEDA = 'D' AND TIPO_MOV = '30' ";
			
		$resultado1ex = @mysql_query($sql1ex);
		
        $row_1ex =  @mysql_fetch_array($resultado1ex);

        $sub_tre = @$row_1ex["VLR_TOT"];

		$sql1e  = "SELECT * FROM `caixa` WHERE SUBSTRING(DATA,1,2) = '$semana5' AND OPERADORA = '$operadora' AND SUBSTRING(DATA,4,7) = '$inicio' AND T_MOEDA = 'C' AND TIPO_MOV != '69'";
			
		$resultado1e = @mysql_query($sql1e);
			
		// Inicio do Loop
		while($linhae = @mysql_fetch_array($resultado1e)) {
	
		    $vlr_tot     = $linhae["VLR_TOT"];
		    
		    
	        
			$total_semana5 = $total_semana5 + $vlr_tot;
			$total_sub5a1 = $total_sub5a1 +  $vlr_tot;

		}
			$total_semana5 = $total_semana5 - $sub_tre;
			$total_sub5a1 = $total_sub5a1 -  $sub_tre;
		
		// Semana 5
		$pdf->SetXY(147,$lin+30);              
		$pdf->MultiCell(25,5, number_format($total_semana5,2,",","."), 1, 'R',0); // J Justificado

		$sql1fx  = "SELECT * FROM `caixa` WHERE SUBSTRING(DATA,1,2) = '$semana6' AND OPERADORA = '$operadora' AND SUBSTRING(DATA,4,7) = '$inicio' AND T_MOEDA = 'D' AND TIPO_MOV = '30' ";
			
		$resultado1fx = @mysql_query($sql1fx);
		
        $row_1fx =  @mysql_fetch_array($resultado1fx);

        $sub_trf = @$row_1fx["VLR_TOT"];

		$sql1f  = "SELECT * FROM `caixa` WHERE SUBSTRING(DATA,1,2) = '$semana6' AND OPERADORA = '$operadora' AND SUBSTRING(DATA,4,7) = '$inicio' AND T_MOEDA = 'C' AND TIPO_MOV != '69'";
			
		$resultado1f = @mysql_query($sql1f);
			
		// Inicio do Loop
		while($linhaf = @mysql_fetch_array($resultado1f)) {
	
		    $vlr_tot     = $linhaf["VLR_TOT"];
	
			$total_semana6 = $total_semana6 + $vlr_tot;
			$total_sub6a1 = $total_sub6a1 +  $vlr_tot;

		}
			$total_semana6 = $total_semana6 - $sub_trf;
			$total_sub6a1 = $total_sub6a1 -  $sub_trf;
		
		// Semana 6
		$pdf->SetXY(172,$lin+30);              
		$pdf->MultiCell(25,5, number_format($total_semana6,2,",","."), 1, 'R',0); // J Justificado

		$sql1gx  = "SELECT * FROM `caixa` WHERE SUBSTRING(DATA,1,2) = '$semana7' AND OPERADORA = '$operadora' AND SUBSTRING(DATA,4,7) = '$inicio' AND T_MOEDA = 'D' AND TIPO_MOV = '30'";
			
		$resultado1gx = @mysql_query($sql1gx);
		
        $row_1gx =  @mysql_fetch_array($resultado1gx);

        $sub_trg = @$row_1gx["VLR_TOT"];

		$sql1g  = "SELECT * FROM `caixa` WHERE SUBSTRING(DATA,1,2) = '$semana7' AND OPERADORA = '$operadora' AND SUBSTRING(DATA,4,7) = '$inicio' AND T_MOEDA = 'C' AND TIPO_MOV != '69'";
			
		$resultado1g = @mysql_query($sql1g);
			
		// Inicio do Loop
		while($linhag = @mysql_fetch_array($resultado1g)) {
	
		    $vlr_tot     = $linhag["VLR_TOT"];
	
			$total_semana7 = $total_semana7 + $vlr_tot;
			$total_sub7a1 = $total_sub7a1 +  $vlr_tot;

		}

			$total_semana7 = $total_semana7 - $sub_trg;
			$total_sub7a1 = $total_sub7a1 -  $sub_trg;
		
		// Semana 7
		$pdf->SetXY(197,$lin+30);              
		$pdf->MultiCell(25,5, number_format($total_semana7,2,",","."), 1, 'R',0); // J Justificado

        $total_1a   = $total_semana1+$total_semana2+$total_semana3+$total_semana4+$total_semana5+$total_semana6+$total_semana7+$total_semana8;

		$pdf->SetXY(222,$lin+30);
		$pdf->MultiCell(25,5, number_format($total_1a,2,",","."), 1, 'R',0); // J Justificado


?>