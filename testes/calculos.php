<?php

/**
 * @author holodek
 * @copyright 2010
 */

// Abrir Receita
$sql_r1  = "SELECT * FROM `receita` ORDER BY id DESC";

$resultado_r1 = @mysql_query($sql_r1);

$row_r1 = @mysql_fetch_array($resultado_r1);

$operadora   = @$row_r1["OPERADORA"];
$mesano      = @$row_r1["DATA"];
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

$sql1  = "SELECT * FROM `caixa` WHERE OPERADORA = '$operadora' AND SUBSTRING(DATA,4,7) = '$inicio'";
	
$resultado1 = @mysql_query($sql1);


	// Inicio do Loop
	while($linha = @mysql_fetch_array($resultado1)) {

        // Confederativa
		$mensa = 3;
		if ($tipo_mov == $mensa AND $data_dia == $semana1){$total_semana1 = $total_semana1 + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana2){$total_semana2 = $total_semana2 + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana3){$total_semana3 = $total_semana3 + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana4){$total_semana4 = $total_semana4 + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana5){$total_semana5 = $total_semana5 + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana6){$total_semana6 = $total_semana6 + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana7){$total_semana7 = $total_semana7 + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana8){$total_semana8 = $total_semana8 + $vlr_tot;}	

        $total_1 = $total_semana1+
		            $total_semana2+
					$total_semana3+
					$total_semana4+
					$total_semana5+
					$total_semana6+
					$total_semana7+
					$total_semana8;
	


        // Assistencial
		$mensa = 13;
		if ($tipo_mov == $mensa AND $data_dia == $semana1){$total_semana1a = $total_semana1a + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana2){$total_semana2a = $total_semana2a + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana3){$total_semana3a = $total_semana3a + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana4){$total_semana4a = $total_semana4a + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana5){$total_semana5a = $total_semana5a + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana6){$total_semana6a = $total_semana6a + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana7){$total_semana7a = $total_semana7a + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana8){$total_semana8a = $total_semana8a + $vlr_tot;}	

        $total_1a = $total_semana1a+
		            $total_semana2a+
					$total_semana3a+
					$total_semana4a+
					$total_semana5a+
					$total_semana6a+
					$total_semana7a+
					$total_semana8a;


        // Sindical
		$mensa = 11;
		if ($tipo_mov == $mensa AND $data_dia == $semana1){$total_semana1b = $total_semana1b + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana2){$total_semana2b = $total_semana2b + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana3){$total_semana3b = $total_semana3b + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana4){$total_semana4b = $total_semana4b + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana5){$total_semana5b = $total_semana5b + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana6){$total_semana6b = $total_semana6b + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana7){$total_semana7b = $total_semana7b + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana8){$total_semana8b = $total_semana8b + $vlr_tot;}	

        $total_1b = $total_semana1b+
		            $total_semana2b+
					$total_semana3b+
					$total_semana4b+
					$total_semana5b+
					$total_semana6b+
					$total_semana7b+
					$total_semana8b;

        // Taxa Associativa
		$mensa = 12;
		if ($tipo_mov == $mensa AND $data_dia == $semana1){$total_semana1c = $total_semana1c + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana2){$total_semana2c = $total_semana2c + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana3){$total_semana3c = $total_semana3c + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana4){$total_semana4c = $total_semana4c + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana5){$total_semana5c = $total_semana5c + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana6){$total_semana6c = $total_semana6c + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana7){$total_semana7c = $total_semana7c + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana8){$total_semana8c = $total_semana8c + $vlr_tot;}	

        $total_1c = $total_semana1c+
		            $total_semana2c+
					$total_semana3c+
					$total_semana4c+
					$total_semana5c+
					$total_semana6c+
					$total_semana7c+
					$total_semana8c;

        // Mensalidade
		$mensa = 1;
		if ($tipo_mov == $mensa AND $data_dia == $semana1){$total_semana1d = $total_semana1d + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana2){$total_semana2d = $total_semana2d + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana3){$total_semana3d = $total_semana3d + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana4){$total_semana4d = $total_semana4d + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana5){$total_semana5d = $total_semana5d + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana6){$total_semana6d = $total_semana6d + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana7){$total_semana7d = $total_semana7d + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana8){$total_semana8d = $total_semana8d + $vlr_tot;}	

        $total_1d = $total_semana1d+
		            $total_semana2d+
					$total_semana3d+
					$total_semana4d+
					$total_semana5d+
					$total_semana6d+
					$total_semana7d+
					$total_semana8d;

        // Homologacao
		$mensa = 2;
		if ($tipo_mov == $mensa AND $data_dia == $semana1){$total_semana1e = $total_semana1e + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana2){$total_semana2e = $total_semana2e + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana3){$total_semana3e = $total_semana3e + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana4){$total_semana4e = $total_semana4e + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana5){$total_semana5e = $total_semana5e + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana6){$total_semana6e = $total_semana6e + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana7){$total_semana7e = $total_semana7e + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana8){$total_semana8e = $total_semana8e + $vlr_tot;}	

        $total_1e = $total_semana1e+
		            $total_semana2e+
					$total_semana3e+
					$total_semana4e+
					$total_semana5e+
					$total_semana6e+
					$total_semana7e+
					$total_semana8e;

        // Calculos
		$mensa = 8;
		if ($tipo_mov == $mensa AND $data_dia == $semana1){$total_semana1f = $total_semana1f + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana2){$total_semana2f = $total_semana2f + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana3){$total_semana3f = $total_semana3f + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana4){$total_semana4f = $total_semana4f + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana5){$total_semana5f = $total_semana5f + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana6){$total_semana6f = $total_semana6f + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana7){$total_semana7f = $total_semana7f + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana8){$total_semana8f = $total_semana8f + $vlr_tot;}	

        $total_1f = $total_semana1f+
		            $total_semana2f+
					$total_semana3f+
					$total_semana4f+
					$total_semana5f+
					$total_semana6f+
					$total_semana7f+
					$total_semana8f;

        // Cursos 
		$mensa = 10;
		if ($tipo_mov == $mensa AND $data_dia == $semana1){$total_semana1g = $total_semana1g + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana2){$total_semana2g = $total_semana2g + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana3){$total_semana3g = $total_semana3g + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana4){$total_semana4g = $total_semana4g + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana5){$total_semana5g = $total_semana5g + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana6){$total_semana6g = $total_semana6g + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana7){$total_semana7g = $total_semana7g + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana8){$total_semana8g = $total_semana8g + $vlr_tot;}	

        $total_1g = $total_semana1g+
		            $total_semana2g+
					$total_semana3g+
					$total_semana4g+
					$total_semana5g+
					$total_semana6g+
					$total_semana7g+
					$total_semana8g;

        // Convensao
		$mensa = 16;
		if ($tipo_mov == $mensa AND $data_dia == $semana1){$total_semana1h = $total_semana1h + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana2){$total_semana2h = $total_semana2h + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana3){$total_semana3h = $total_semana3h + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana4){$total_semana4h = $total_semana4h + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana5){$total_semana5h = $total_semana5h + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana6){$total_semana6h = $total_semana6h + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana7){$total_semana7h = $total_semana7h + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana8){$total_semana8h = $total_semana8h + $vlr_tot;}	

        $total_1h = $total_semana1h+
		            $total_semana2h+
					$total_semana3h+
					$total_semana4h+
					$total_semana5h+
					$total_semana6h+
					$total_semana7h+
					$total_semana8h;


        // Exames Medicos
		$mensa = 6;
		if ($tipo_mov == $mensa AND $data_dia == $semana1){$total_semana1i = $total_semana1i + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana2){$total_semana2i = $total_semana2i + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana3){$total_semana3i = $total_semana3i + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana4){$total_semana4i = $total_semana4i + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana5){$total_semana5i = $total_semana5i + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana6){$total_semana6i = $total_semana6i + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana7){$total_semana7i = $total_semana7i + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana8){$total_semana8i = $total_semana8i + $vlr_tot;}	

        $total_1i = $total_semana1i+
		            $total_semana2i+
					$total_semana3i+
					$total_semana4i+
					$total_semana5i+
					$total_semana6i+
					$total_semana7i+
					$total_semana8i;

        // Calculo / Urologia
		$mensa = 121;
		if ($tipo_mov == $mensa AND $data_dia == $semana1){$total_semana1j = $total_semana1j + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana2){$total_semana2j = $total_semana2j + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana3){$total_semana3j = $total_semana3j + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana4){$total_semana4j = $total_semana4j + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana5){$total_semana5j = $total_semana5j + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana6){$total_semana6j = $total_semana6j + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana7){$total_semana7j = $total_semana7j + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana8){$total_semana8j = $total_semana8j + $vlr_tot;}	

        $total_1j = $total_semana1j+
		            $total_semana2j+
					$total_semana3j+
					$total_semana4j+
					$total_semana5j+
					$total_semana6j+
					$total_semana7j+
					$total_semana8j;

        // Consulta / Dermatologia
		$mensa = 122;
		if ($tipo_mov == $mensa AND $data_dia == $semana1){$total_semana1k = $total_semana1k + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana2){$total_semana2k = $total_semana2k + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana3){$total_semana3k = $total_semana3k + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana4){$total_semana4k = $total_semana4k + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana5){$total_semana5k = $total_semana5k + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana6){$total_semana6k = $total_semana6k + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana7){$total_semana7k = $total_semana7k + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana8){$total_semana8k = $total_semana8k + $vlr_tot;}	

        $total_1k = $total_semana1k+
		            $total_semana2k+
					$total_semana3k+
					$total_semana4k+
					$total_semana5k+
					$total_semana6k+
					$total_semana7k+
					$total_semana8k;

        // Consulta / Homeopatiaa
		$mensa = 123;
		if ($tipo_mov == $mensa AND $data_dia == $semana1){$total_semana1l = $total_semana1l + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana2){$total_semana2l = $total_semana2l + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana3){$total_semana3l = $total_semana3l + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana4){$total_semana4l = $total_semana4l + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana5){$total_semana5l = $total_semana5l + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana6){$total_semana6l = $total_semana6l + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana7){$total_semana7l = $total_semana7l + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana8){$total_semana8l = $total_semana8l + $vlr_tot;}	

        $total_1l = $total_semana1l+
		            $total_semana2l+
					$total_semana3l+
					$total_semana4l+
					$total_semana5l+
					$total_semana6l+
					$total_semana7l+
					$total_semana8l;

        // Consulta / Ortopedia
		$mensa = 124;
		if ($tipo_mov == $mensa AND $data_dia == $semana1){$total_semana1m = $total_semana1m + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana2){$total_semana2m = $total_semana2m + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana3){$total_semana3m = $total_semana3m + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana4){$total_semana4m = $total_semana4m + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana5){$total_semana5m = $total_semana5m + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana6){$total_semana6m = $total_semana6m + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana7){$total_semana7m = $total_semana7m + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana8){$total_semana8m = $total_semana8m + $vlr_tot;}	

        $total_1m = $total_semana1m+
		            $total_semana2m+
					$total_semana3m+
					$total_semana4m+
					$total_semana5m+
					$total_semana6m+
					$total_semana7m+
					$total_semana8m;

        //Terapia / Holistica
		$mensa = 125;
		if ($tipo_mov == $mensa AND $data_dia == $semana1){$total_semana1n = $total_semana1n + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana2){$total_semana2n = $total_semana2n + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana3){$total_semana3n = $total_semana3n + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana4){$total_semana4n = $total_semana4n + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana5){$total_semana5n = $total_semana5n + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana6){$total_semana6n = $total_semana6n + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana7){$total_semana7n = $total_semana7n + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana8){$total_semana8n = $total_semana8n + $vlr_tot;}	

        $total_1n = $total_semana1n+
		            $total_semana2n+
					$total_semana3n+
					$total_semana4n+
					$total_semana5n+
					$total_semana6n+
					$total_semana7n+
					$total_semana8n;

        // Consulta / Pisicologia
		$mensa = 126;
		if ($tipo_mov == $mensa AND $data_dia == $semana1){$total_semana1o = $total_semana1o + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana2){$total_semana2o = $total_semana2o + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana3){$total_semana3o = $total_semana3o + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana4){$total_semana4o = $total_semana4o + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana5){$total_semana5o = $total_semana5o + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana6){$total_semana6o = $total_semana6o + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana7){$total_semana7o = $total_semana7o + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana8){$total_semana8o = $total_semana8o + $vlr_tot;}	

        $total_1o = $total_semana1o+
		            $total_semana2o+
					$total_semana3o+
					$total_semana4o+
					$total_semana5o+
					$total_semana6o+
					$total_semana7o+
					$total_semana8o;

        // Consulta / Psicopedagogia
		$mensa = 127;
		if ($tipo_mov == $mensa AND $data_dia == $semana1){$total_semana1p = $total_semana1p + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana2){$total_semana2p = $total_semana2p + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana3){$total_semana3p = $total_semana3p + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana4){$total_semana4p = $total_semana4p + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana5){$total_semana5p = $total_semana5p + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana6){$total_semana6p = $total_semana6p + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana7){$total_semana7p = $total_semana7p + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana8){$total_semana8p = $total_semana8p + $vlr_tot;}	

        $total_1p = $total_semana1p+
		            $total_semana2p+
					$total_semana3p+
					$total_semana4p+
					$total_semana5p+
					$total_semana6p+
					$total_semana7p+
					$total_semana8p;

        // Cirurgia ? Medicaa
		$mensa = 128;
		if ($tipo_mov == $mensa AND $data_dia == $semana1){$total_semana1q = $total_semana1q + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana2){$total_semana2q = $total_semana2q + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana3){$total_semana3q = $total_semana3q + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana4){$total_semana4q = $total_semana4q + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana5){$total_semana5q = $total_semana5q + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana6){$total_semana6q = $total_semana6q + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana7){$total_semana7q = $total_semana7q + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana8){$total_semana8q = $total_semana8q + $vlr_tot;}	

        $total_1q = $total_semana1q+
		            $total_semana2q+
					$total_semana3q+
					$total_semana4q+
					$total_semana5q+
					$total_semana6q+
					$total_semana7q+
					$total_semana8q;

        // Cirurgia / Odontologica
		$mensa = 131;
		if ($tipo_mov == $mensa AND $data_dia == $semana1){$total_semana1r = $total_semana1r + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana2){$total_semana2r = $total_semana2r + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana3){$total_semana3r = $total_semana3r + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana4){$total_semana4r = $total_semana4r + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana5){$total_semana5r = $total_semana5r + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana6){$total_semana6r = $total_semana6r + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana7){$total_semana7r = $total_semana7r + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana8){$total_semana8r = $total_semana8r + $vlr_tot;}	

        $total_1r = $total_semana1r+
		            $total_semana2r+
					$total_semana3r+
					$total_semana4r+
					$total_semana5r+
					$total_semana6r+
					$total_semana7r+
					$total_semana8r;

        // Tramento de Canal
		$mensa = 132;
		if ($tipo_mov == $mensa AND $data_dia == $semana1){$total_semana1s = $total_semana1s + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana2){$total_semana2s = $total_semana2s + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana3){$total_semana3s = $total_semana3s + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana4){$total_semana4s = $total_semana4s + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana5){$total_semana5s = $total_semana5s + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana6){$total_semana6s = $total_semana6s + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana7){$total_semana7s = $total_semana7s + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana8){$total_semana8s = $total_semana8s + $vlr_tot;}	

        $total_1s = $total_semana1s+
		            $total_semana2s+
					$total_semana3s+
					$total_semana4s+
					$total_semana5s+
					$total_semana6s+
					$total_semana7s+
					$total_semana8s;

        // Exame Laboratorial
		$mensa = 141;
		if ($tipo_mov == $mensa AND $data_dia == $semana1){$total_semana1t = $total_semana1t + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana2){$total_semana2t = $total_semana2t + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana3){$total_semana3t = $total_semana3t + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana4){$total_semana4t = $total_semana4t + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana5){$total_semana5t = $total_semana5t + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana6){$total_semana6t = $total_semana6t + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana7){$total_semana7t = $total_semana7t + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana8){$total_semana8t = $total_semana8t + $vlr_tot;}	

        $total_1t = $total_semana1t+
		            $total_semana2t+
					$total_semana3t+
					$total_semana4t+
					$total_semana5t+
					$total_semana6t+
					$total_semana7t+
					$total_semana8t;

        // Exame Imagem
		$mensa = 142;
		if ($tipo_mov == $mensa AND $data_dia == $semana1){$total_semana1u = $total_semana1u + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana2){$total_semana2u = $total_semana2u + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana3){$total_semana3u = $total_semana3u + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana4){$total_semana4u = $total_semana4u + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana5){$total_semana5u = $total_semana5u + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana6){$total_semana6u = $total_semana6u + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana7){$total_semana7u = $total_semana7u + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana8){$total_semana8u = $total_semana8u + $vlr_tot;}	

        $total_1u = $total_semana1u+
		            $total_semana2u+
					$total_semana3u+
					$total_semana4u+
					$total_semana5u+
					$total_semana6u+
					$total_semana7u+
					$total_semana8u;

        // Colonia de Ferias
		$mensa = 4;
		if ($tipo_mov == $mensa AND $data_dia == $semana1){$total_semana1v = $total_semana1v + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana2){$total_semana2v = $total_semana2v + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana3){$total_semana3v = $total_semana3v + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana4){$total_semana4v = $total_semana4v + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana5){$total_semana5v = $total_semana5v + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana6){$total_semana6v = $total_semana6v + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana7){$total_semana7v = $total_semana7v + $vlr_tot;}	
		if ($tipo_mov == $mensa AND $data_dia == $semana8){$total_semana8v = $total_semana8v + $vlr_tot;}	

        $total_1v = $total_semana1v+
		            $total_semana2v+
					$total_semana3v+
					$total_semana4v+
					$total_semana5v+
					$total_semana6v+
					$total_semana7v+
					$total_semana8v;

}
?>