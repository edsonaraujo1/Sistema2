<?php

/**
 * @author holodek
 * @copyright 2010
 */

// Abre Conexão com o MySql
include("conexao.php");
// Chama o Banco de Dados


$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);


// Abrir Receita
$sql_r1  = "SELECT * FROM `receita` ORDER BY id DESC";

$resultado_r1 = @mysql_query($sql_r1);

$row_r1 = @mysql_fetch_array($resultado_r1);

$operadora   = @$row_r1["OPERADORA"];
$mesano      = @$row_r1["DATA"];
$semana[1]     = @$row_r1["SEMANA1"];
$semana[2]     = @$row_r1["SEMANA2"];
$semana[3]     = @$row_r1["SEMANA3"];
$semana[4]     = @$row_r1["SEMANA4"];
$semana[5]     = @$row_r1["SEMANA5"];
$semana[6]     = @$row_r1["SEMANA6"];
$semana[7]     = @$row_r1["SEMANA7"];

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
$total_1 = 0;
echo $inicio."<br>";
echo $semana1."<br>";

		
		$sql1  = "SELECT * FROM `caixa` WHERE SUBSTRING(DATA,4,7) = '$inicio' AND OPERADORA = '$operadora'";
		
		$resultado1 = @mysql_query($sql1);
		
		$qtd_reg = @mysql_num_rows($resultado1);
		
		while($linha1 = @mysql_fetch_array($resultado1))
		{
			
            $operadora =  $linha1['OPERADORA'];                
			$data      =  $linha1['DATA'];                
			$t_moeda   =  $linha1['T_MOEDA'];                
			$t_mov     =  $linha1['TIPO_MOV'];                
			$vlr_uni   =  $linha1['VLR_UNI'];                
			$t_qtd     =  $linha1['QTD'];                
			$vlr_tot   =  $linha1['VLR_TOT'];                

	        // Confederativa
			$mensa    = '3';
	
	        if ($t_mov == '3' and substr($data,0,2) == $semana1){
	        	
	        	$soma = $soma + $vlr_tot;
	        }
	        echo $soma;
	

/*	
            for ($si = 0; $si < $qtd_reg; $si++){

				if ($t_mov == $mensa1 AND substr($data,0,2) == $semana[$si])
	            {
	            	$total_semana[$si] = $total_semana[$si] + $vlr_tot;
	            	
	            	echo number_format($total_semana[$si],2,",",".")." - ";
	            	
					$total_1 = $total_1 + $vlr_tot;
				}
            }
            echo "<br>";
            for ($si = 0; $si < $qtd_reg; $si++){

				if ($t_mov == $mensa2 AND substr($data,0,2) == $semana[$si])
	            {
	            	$total_semana[$si] = $total_semana[$si] + $vlr_tot;
	            	
	            	echo number_format($total_semana[$si],2,",",".")." - ";
	            	
					$total_1 = $total_1 + $vlr_tot;
				}
            }
*/			
         } // Fim do While




/*			
			
			$vlr_tot     = $linha1["VLR_TOT"];
			$total_semana1 = $total_semana1 + $vlr_tot;}
		$sql2  = "SELECT * FROM `caixa` WHERE  TIPO_MOV = '$mensa' AND SUBSTRING(DATA,4,7) = '$inicio' AND SUBSTRING(DATA,1,2) = '$semana2' AND OPERADORA = '$operadora'";
		$resultado2 = @mysql_query($sql2);
		while($linha2 = @mysql_fetch_array($resultado2)) {$vlr_tot     = $linha2["VLR_TOT"];
			$total_semana2 = $total_semana2 + $vlr_tot;}
		$sql3  = "SELECT * FROM `caixa` WHERE  TIPO_MOV = '$mensa' AND SUBSTRING(DATA,4,7) = '$inicio' AND SUBSTRING(DATA,1,2) = '$semana3' AND OPERADORA = '$operadora'";
		$resultado3 = @mysql_query($sql3);
		while($linha3 = @mysql_fetch_array($resultado3)) {$vlr_tot     = $linha3["VLR_TOT"];
			$total_semana3 = $total_semana3 + $vlr_tot;}
		$sql4  = "SELECT * FROM `caixa` WHERE  TIPO_MOV = '$mensa' AND SUBSTRING(DATA,4,7) = '$inicio' AND SUBSTRING(DATA,1,2) = '$semana4' AND OPERADORA = '$operadora'";
		$resultado4 = @mysql_query($sql4);
		while($linha4 = @mysql_fetch_array($resultado4)) {$vlr_tot     = $linha4["VLR_TOT"];
			$total_semana4 = $total_semana4 + $vlr_tot;}
		$sql5  = "SELECT * FROM `caixa` WHERE  TIPO_MOV = '$mensa' AND SUBSTRING(DATA,4,7) = '$inicio' AND SUBSTRING(DATA,1,2) = '$semana5' AND OPERADORA = '$operadora'";
		$resultado5 = @mysql_query($sql5);
		while($linha5 = @mysql_fetch_array($resultado5)) {$vlr_tot     = $linha5["VLR_TOT"];
			$total_semana5 = $total_semana5 + $vlr_tot;}
		$sql6  = "SELECT * FROM `caixa` WHERE  TIPO_MOV = '$mensa' AND SUBSTRING(DATA,4,7) = '$inicio' AND SUBSTRING(DATA,1,2) = '$semana6' AND OPERADORA = '$operadora'";
		$resultado6 = @mysql_query($sql6);
		while($linha6 = @mysql_fetch_array($resultado6)) {$vlr_tot     = $linha6["VLR_TOT"];
			$total_semana6 = $total_semana6 + $vlr_tot;}
		$sql7  = "SELECT * FROM `caixa` WHERE  TIPO_MOV = '$mensa' AND SUBSTRING(DATA,4,7) = '$inicio' AND SUBSTRING(DATA,1,2) = '$semana7' AND OPERADORA = '$operadora'";
		$resultado7 = @mysql_query($sql7);
		while($linha7 = @mysql_fetch_array($resultado7)) {$vlr_tot     = $linha7["VLR_TOT"];
			$total_semana7 = $total_semana7 + $vlr_tot;}
		$sql8  = "SELECT * FROM `caixa` WHERE  TIPO_MOV = '$mensa' AND SUBSTRING(DATA,4,7) = '$inicio' AND SUBSTRING(DATA,1,2) = '$semana8' AND OPERADORA = '$operadora'";
		$resultado8 = @mysql_query($sql8);
		while($linha8 = @mysql_fetch_array($resultado8)) {$vlr_tot     = $linha8["VLR_TOT"];
			$total_semana8 = $total_semana8 + $vlr_tot;}
            $total_1 = $total_semana1+
		               $total_semana2+
		    		   $total_semana3+
					   $total_semana4+
					   $total_semana5+
					   $total_semana6+
					   $total_semana7+
					   $total_semana8;

		echo number_format($total_semana1,2,",",".")." - ";
		echo number_format($total_semana2,2,",",".")." - ";
		echo number_format($total_semana3,2,",",".")." - ";
		echo number_format($total_semana4,2,",",".")." - ";
		echo number_format($total_semana5,2,",",".")." - ";
		echo number_format($total_semana6,2,",",".")." - ";
		echo number_format($total_semana7,2,",",".")." - ";
		echo number_format($total_semana8,2,",",".")." - ";
		echo number_format($total_1,2,",",".")."<br>";
		@mysql_close();   

       $total_1 = 0;
	   $total_semana1 = 0;
	   $total_semana2 = 0;
	   $total_semana3 = 0;
	   $total_semana4 = 0;
	   $total_semana5 = 0;
	   $total_semana6 = 0;
	   $total_semana7 = 0;
	   $total_semana8 = 0;

        // Assistencial
		$mensa = '1';
		$sql1  = "SELECT * FROM `caixa` WHERE  TIPO_MOV = '$mensa' AND SUBSTRING(DATA,4,7) = '$inicio' AND SUBSTRING(DATA,1,2) = '$semana1' AND OPERADORA = '$operadora'";
		$resultado1 = @mysql_query($sql1);
		while($linha1 = @mysql_fetch_array($resultado1)) {$vlr_tot     = $linha1["VLR_TOT"];
			$total_semana1 = $total_semana1 + $vlr_tot;}
		$sql2  = "SELECT * FROM `caixa` WHERE  TIPO_MOV = '$mensa' AND SUBSTRING(DATA,4,7) = '$inicio' AND SUBSTRING(DATA,1,2) = '$semana2' AND OPERADORA = '$operadora'";
		$resultado2 = @mysql_query($sql2);
		while($linha2 = @mysql_fetch_array($resultado2)) {$vlr_tot     = $linha2["VLR_TOT"];
			$total_semana2 = $total_semana2 + $vlr_tot;}
		$sql3  = "SELECT * FROM `caixa` WHERE  TIPO_MOV = '$mensa' AND SUBSTRING(DATA,4,7) = '$inicio' AND SUBSTRING(DATA,1,2) = '$semana3' AND OPERADORA = '$operadora'";
		$resultado3 = @mysql_query($sql3);
		while($linha3 = @mysql_fetch_array($resultado3)) {$vlr_tot     = $linha3["VLR_TOT"];
			$total_semana3 = $total_semana3 + $vlr_tot;}
		$sql4  = "SELECT * FROM `caixa` WHERE  TIPO_MOV = '$mensa' AND SUBSTRING(DATA,4,7) = '$inicio' AND SUBSTRING(DATA,1,2) = '$semana4' AND OPERADORA = '$operadora'";
		$resultado4 = @mysql_query($sql4);
		while($linha4 = @mysql_fetch_array($resultado4)) {$vlr_tot     = $linha4["VLR_TOT"];
			$total_semana4 = $total_semana4 + $vlr_tot;}
		$sql5  = "SELECT * FROM `caixa` WHERE  TIPO_MOV = '$mensa' AND SUBSTRING(DATA,4,7) = '$inicio' AND SUBSTRING(DATA,1,2) = '$semana5' AND OPERADORA = '$operadora'";
		$resultado5 = @mysql_query($sql5);
		while($linha5 = @mysql_fetch_array($resultado5)) {$vlr_tot     = $linha5["VLR_TOT"];
			$total_semana5 = $total_semana5 + $vlr_tot;}
		$sql6  = "SELECT * FROM `caixa` WHERE  TIPO_MOV = '$mensa' AND SUBSTRING(DATA,4,7) = '$inicio' AND SUBSTRING(DATA,1,2) = '$semana6' AND OPERADORA = '$operadora'";
		$resultado6 = @mysql_query($sql6);
		while($linha6 = @mysql_fetch_array($resultado6)) {$vlr_tot     = $linha6["VLR_TOT"];
			$total_semana6 = $total_semana6 + $vlr_tot;}
		$sql7  = "SELECT * FROM `caixa` WHERE  TIPO_MOV = '$mensa' AND SUBSTRING(DATA,4,7) = '$inicio' AND SUBSTRING(DATA,1,2) = '$semana7' AND OPERADORA = '$operadora'";
		$resultado7 = @mysql_query($sql7);
		while($linha7 = @mysql_fetch_array($resultado7)) {$vlr_tot     = $linha7["VLR_TOT"];
			$total_semana7 = $total_semana7 + $vlr_tot;}
		$sql8  = "SELECT * FROM `caixa` WHERE  TIPO_MOV = '$mensa' AND SUBSTRING(DATA,4,7) = '$inicio' AND SUBSTRING(DATA,1,2) = '$semana8' AND OPERADORA = '$operadora'";
		$resultado8 = @mysql_query($sql8);
		while($linha8 = @mysql_fetch_array($resultado8)) {$vlr_tot     = $linha8["VLR_TOT"];
			$total_semana8 = $total_semana8 + $vlr_tot;}
            $total_1 = $total_semana1+
		               $total_semana2+
		    		   $total_semana3+
					   $total_semana4+
					   $total_semana5+
					   $total_semana6+
					   $total_semana7+
					   $total_semana8;
					   
       $total_1 = 0;
	   $total_semana1 = 0;
	   $total_semana2 = 0;
	   $total_semana3 = 0;
	   $total_semana4 = 0;
	   $total_semana5 = 0;
	   $total_semana6 = 0;
	   $total_semana7 = 0;
	   $total_semana8 = 0;
					   

		echo number_format($total_semana1,2,",",".")." - ";
		echo number_format($total_semana2,2,",",".")." - ";
		echo number_format($total_semana3,2,",",".")." - ";
		echo number_format($total_semana4,2,",",".")." - ";
		echo number_format($total_semana5,2,",",".")." - ";
		echo number_format($total_semana6,2,",",".")." - ";
		echo number_format($total_semana7,2,",",".")." - ";
		echo number_format($total_semana8,2,",",".")." - ";
		echo number_format($total_1,2,",",".")."<br>";


*/
?>