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
$sql_r1  = "SELECT * FROM `caixa` WHERE OPERADORA = 'NILVA' AND SUBSTRING(DATA,4,7) = '06/2012' ORDER BY TIPO_MOV ASC";

$resultado_r1 = @mysql_query($sql_r1);

$row_r1 = @mysql_fetch_array($resultado_r1);

$tipo_mov    = @$row_r1["TIPO_MOV"];
$moeda       = @$row_r1["T_MOEDA"];
$qtd         = @$row_r1["QTD"];
$valor       = @$row_r1["VLR_TOT"];

	// Inicio do Loop
	while($linha = @mysql_fetch_array($resultado_r1)) {
		
			$tipo_mov    = $linha["TIPO_MOV"];
			$moeda       = $linha["T_MOEDA"];
			$qtd         = $linha["QTD"];
			$valor       = $linha["VLR_TOT"];
			
			if ($tipo_mov == '145'){
				
				if ($moeda == "D"){  // Dinheiro
				
					$val_din_01 = $val_din_01 +  $valor;
					$cont_din_01++1;
					
				}
				if ($moeda == "C"){  // Cheque
					
					$val_che_01 = $val_che_01 +  $valor;
					$cont_che_01++1;
					
				}
				if ($moeda == "T"){  // Cartao credito debito
					
					$val_car_01 = $val_car_01 +  $valor;
					$cont_car_01++1;
					
				}
				
			} // FIM
		
		
		
		
	}	

echo "145 = Seconci <br>";
echo 'Dinheiro '.$cont_din_01."<br>";
echo 'Qtd Dinheiro '.$cont_din_01."<br>"
echo 'Cheque   '.$cont_che_01."<br>";
echo 'Qtd Cheque '.$cont_che_01."<br>"
echo 'Cartao   '.$cont_car_01."<br>";
echo 'Qtd Cartao '.$cont_car_01."<br>"
$total_01 = $cont_din_01+$cont_che_01+$cont_car_01;
echo "Total Seconci ".$total_01."<br>";


?>