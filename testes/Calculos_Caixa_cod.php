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


$mes_ano = '06/2012';
// Abrir Receita
$sql_r1  = "SELECT * FROM `caixa` WHERE OPERADORA = 'NILVA' AND SUBSTRING(DATA,4,7) = '$mes_ano' ORDER BY TIPO_MOV ASC";

$resultado_r1 = @mysql_query($sql_r1);

$row_r1 = @mysql_fetch_array($resultado_r1);

$tipo_mov    = @$row_r1["TIPO_MOV"];
$moeda       = @$row_r1["T_MOEDA"];
$qtd         = @$row_r1["QTD"];
$valor       = @$row_r1["VLR_TOT"];


// 145

$cod_tipo = '145';

$cont_din_01 = 0;
$cont_che_01 = 0;
$cont_car_01 = 0;

$total_01    = 0;
$val_din_01  = 0;
$val_che_01  = 0;
$val_car_01  = 0;


	// Inicio do Loop
	while($linha = @mysql_fetch_array($resultado_r1)) {
		
			$tipo_mov    = $linha["TIPO_MOV"];
			$moeda       = $linha["T_MOEDA"];
			$qtd         = $linha["QTD"];
			$valor       = $linha["VLR_TOT"];
			
			
			// Abrir Receita
			$sql_r2  = "SELECT * FROM `caddesc` WHERE CODIGO = '$cod_tipo'";
			
			$resultado_r2 = @mysql_query($sql_r2);
			
			$row_r2 = @mysql_fetch_array($resultado_r2);
			
			$nome_mov    = @$row_r2["DESCRICAO"];
			
			if ($tipo_mov == $cod_tipo){
				
				if ($moeda == "D"){  // Dinheiro
				
					$val_din_01 = $val_din_01 +  $valor;
					$cont_din_01++;
					
				}
				if ($moeda == "C"){  // Cheque
					
					$val_che_01 = $val_che_01 +  $valor;
					$cont_che_01++;
					
				}
				if ($moeda == "T"){  // Cartao credito debito
					
					$val_car_01 = $val_car_01 +  $valor;
					$cont_car_01++;
					
				}
				
			} // FIM
		
		
		
		
	}	
$total_01    = $val_din_01+$val_che_01+$val_car_01;
$total_0a    = $val_din_01+$val_che_01+$val_car_01;

?>


<table width="525" border="1">
  <tr>
    <td><div align="center">Relatório Caixa Convênios - Sindificios - Mês <?=$mes_ano;?></div></td>
  </tr>
</table>
<br />

<table width="528" border="1">
  <tr>
    <td width="259"><div align="left"><strong><?=$cod_tipo."  ".$nome_mov."   ";?></strong></div></td>
    <td width="253"><div align="right"></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Dinheiro</strong></div></td>
    <td><div align="right"><?=number_format($val_din_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Qtd Recebimentos em Dineiro </strong></div></td>
    <td><div align="right"><?=$cont_din_01;?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Cheque</strong></div></td>
    <td><div align="right"><?=number_format($val_che_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Qtd Recebimentos em Cheque </strong></div></td>
    <td><div align="right"><?=$cont_che_01;?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Cart&atilde;o</strong></div></td>
    <td><div align="right"><?=number_format($val_car_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Qtd Recebimento em Cart&atilde;o </strong></div></td>
    <td><div align="right"><?=$cont_car_01;?></div></td>
  </tr>
  <tr>
    <td><div align="left">&ensp;</div></td>
    <td><div align="right">&ensp;</div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Total <?=$nome_mov;?> </strong></div></td>
    <td><div align="right"><?=number_format($total_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left">&ensp;</div></td>
    <td><div align="right">&ensp;</div></td>
  </tr>
</table><br />


<?

// Abrir Receita
$sql_r1  = "SELECT * FROM `caixa` WHERE OPERADORA = 'NILVA' AND SUBSTRING(DATA,4,7) = '$mes_ano' ORDER BY TIPO_MOV ASC";

$resultado_r1 = @mysql_query($sql_r1);

$row_r1 = @mysql_fetch_array($resultado_r1);

$tipo_mov    = @$row_r1["TIPO_MOV"];
$moeda       = @$row_r1["T_MOEDA"];
$qtd         = @$row_r1["QTD"];
$valor       = @$row_r1["VLR_TOT"];

// 146

$cod_tipo = '146';

$cont_din_01 = 0;
$cont_che_01 = 0;
$cont_car_01 = 0;

$total_01    = 0;
$val_din_01  = 0;
$val_che_01  = 0;
$val_car_01  = 0;


	// Inicio do Loop
	while($linha = @mysql_fetch_array($resultado_r1)) {
		
			$tipo_mov    = $linha["TIPO_MOV"];
			$moeda       = $linha["T_MOEDA"];
			$qtd         = $linha["QTD"];
			$valor       = $linha["VLR_TOT"];
			
			
			// Abrir Receita
			$sql_r2  = "SELECT * FROM `caddesc` WHERE CODIGO = '$cod_tipo'";
			
			$resultado_r2 = @mysql_query($sql_r2);
			
			$row_r2 = @mysql_fetch_array($resultado_r2);
			
			$nome_mov    = @$row_r2["DESCRICAO"];
			
			if ($tipo_mov == $cod_tipo){
				
				if ($moeda == "D"){  // Dinheiro
				
					$val_din_01 = $val_din_01 +  $valor;
					$cont_din_01++;
					
				}
				if ($moeda == "C"){  // Cheque
					
					$val_che_01 = $val_che_01 +  $valor;
					$cont_che_01++;
					
				}
				if ($moeda == "T"){  // Cartao credito debito
					
					$val_car_01 = $val_car_01 +  $valor;
					$cont_car_01++;
					
				}
				
			} // FIM
		
		
		
		
	}	
$total_01    = $val_din_01+$val_che_01+$val_car_01;
$total_0b    = $val_din_01+$val_che_01+$val_car_01;

?>

<table width="528" border="1">
  <tr>
    <td width="259"><div align="left"><strong><?=$cod_tipo."  ".$nome_mov."   ";?></strong></div></td>
    <td width="253"><div align="right"></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Dinheiro</strong></div></td>
    <td><div align="right"><?=number_format($val_din_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Qtd Recebimentos em Dineiro </strong></div></td>
    <td><div align="right"><?=$cont_din_01;?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Cheque</strong></div></td>
    <td><div align="right"><?=number_format($val_che_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Qtd Recebimentos em Cheque </strong></div></td>
    <td><div align="right"><?=$cont_che_01;?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Cart&atilde;o</strong></div></td>
    <td><div align="right"><?=number_format($val_car_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Qtd Recebimento em Cart&atilde;o </strong></div></td>
    <td><div align="right"><?=$cont_car_01;?></div></td>
  </tr>
  <tr>
    <td><div align="left">&ensp;</div></td>
    <td><div align="right">&ensp;</div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Total <?=$nome_mov;?> </strong></div></td>
    <td><div align="right"><?=number_format($total_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left">&ensp;</div></td>
    <td><div align="right">&ensp;</div></td>
  </tr>
</table><br />



<?

// Abrir Receita
$sql_r1  = "SELECT * FROM `caixa` WHERE OPERADORA = 'NILVA' AND SUBSTRING(DATA,4,7) = '$mes_ano' ORDER BY TIPO_MOV ASC";

$resultado_r1 = @mysql_query($sql_r1);

$row_r1 = @mysql_fetch_array($resultado_r1);

$tipo_mov    = @$row_r1["TIPO_MOV"];
$moeda       = @$row_r1["T_MOEDA"];
$qtd         = @$row_r1["QTD"];
$valor       = @$row_r1["VLR_TOT"];

// 147

$cod_tipo = '147';

$cont_din_01 = 0;
$cont_che_01 = 0;
$cont_car_01 = 0;

$total_01    = 0;
$val_din_01  = 0;
$val_che_01  = 0;
$val_car_01  = 0;


	// Inicio do Loop
	while($linha = @mysql_fetch_array($resultado_r1)) {
		
			$tipo_mov    = $linha["TIPO_MOV"];
			$moeda       = $linha["T_MOEDA"];
			$qtd         = $linha["QTD"];
			$valor       = $linha["VLR_TOT"];
			
			
			// Abrir Receita
			$sql_r2  = "SELECT * FROM `caddesc` WHERE CODIGO = '$cod_tipo'";
			
			$resultado_r2 = @mysql_query($sql_r2);
			
			$row_r2 = @mysql_fetch_array($resultado_r2);
			
			$nome_mov    = @$row_r2["DESCRICAO"];
			
			if ($tipo_mov == $cod_tipo){
				
				if ($moeda == "D"){  // Dinheiro
				
					$val_din_01 = $val_din_01 +  $valor;
					$cont_din_01++;
					
				}
				if ($moeda == "C"){  // Cheque
					
					$val_che_01 = $val_che_01 +  $valor;
					$cont_che_01++;
					
				}
				if ($moeda == "T"){  // Cartao credito debito
					
					$val_car_01 = $val_car_01 +  $valor;
					$cont_car_01++;
					
				}
				
			} // FIM
		
		
		
		
	}	
$total_01    = $val_din_01+$val_che_01+$val_car_01;
$total_0c    = $val_din_01+$val_che_01+$val_car_01;

?>

<table width="528" border="1">
  <tr>
    <td width="259"><div align="left"><strong><?=$cod_tipo."  ".$nome_mov."   ";?></strong></div></td>
    <td width="253"><div align="right"></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Dinheiro</strong></div></td>
    <td><div align="right"><?=number_format($val_din_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Qtd Recebimentos em Dineiro </strong></div></td>
    <td><div align="right"><?=$cont_din_01;?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Cheque</strong></div></td>
    <td><div align="right"><?=number_format($val_che_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Qtd Recebimentos em Cheque </strong></div></td>
    <td><div align="right"><?=$cont_che_01;?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Cart&atilde;o</strong></div></td>
    <td><div align="right"><?=number_format($val_car_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Qtd Recebimento em Cart&atilde;o </strong></div></td>
    <td><div align="right"><?=$cont_car_01;?></div></td>
  </tr>
  <tr>
    <td><div align="left">&ensp;</div></td>
    <td><div align="right">&ensp;</div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Total <?=$nome_mov;?> </strong></div></td>
    <td><div align="right"><?=number_format($total_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left">&ensp;</div></td>
    <td><div align="right">&ensp;</div></td>
  </tr>
</table><br />


<?

// Abrir Receita
$sql_r1  = "SELECT * FROM `caixa` WHERE OPERADORA = 'NILVA' AND SUBSTRING(DATA,4,7) = '$mes_ano' ORDER BY TIPO_MOV ASC";

$resultado_r1 = @mysql_query($sql_r1);

$row_r1 = @mysql_fetch_array($resultado_r1);

$tipo_mov    = @$row_r1["TIPO_MOV"];
$moeda       = @$row_r1["T_MOEDA"];
$qtd         = @$row_r1["QTD"];
$valor       = @$row_r1["VLR_TOT"];

// 148

$cod_tipo = '148';

$cont_din_01 = 0;
$cont_che_01 = 0;
$cont_car_01 = 0;

$total_01    = 0;
$val_din_01  = 0;
$val_che_01  = 0;
$val_car_01  = 0;


	// Inicio do Loop
	while($linha = @mysql_fetch_array($resultado_r1)) {
		
			$tipo_mov    = $linha["TIPO_MOV"];
			$moeda       = $linha["T_MOEDA"];
			$qtd         = $linha["QTD"];
			$valor       = $linha["VLR_TOT"];
			
			
			// Abrir Receita
			$sql_r2  = "SELECT * FROM `caddesc` WHERE CODIGO = '$cod_tipo'";
			
			$resultado_r2 = @mysql_query($sql_r2);
			
			$row_r2 = @mysql_fetch_array($resultado_r2);
			
			$nome_mov    = @$row_r2["DESCRICAO"];
			
			if ($tipo_mov == $cod_tipo){
				
				if ($moeda == "D"){  // Dinheiro
				
					$val_din_01 = $val_din_01 +  $valor;
					$cont_din_01++;
					
				}
				if ($moeda == "C"){  // Cheque
					
					$val_che_01 = $val_che_01 +  $valor;
					$cont_che_01++;
					
				}
				if ($moeda == "T"){  // Cartao credito debito
					
					$val_car_01 = $val_car_01 +  $valor;
					$cont_car_01++;
					
				}
				
			} // FIM
		
		
		
		
	}	
$total_01    = $val_din_01+$val_che_01+$val_car_01;
$total_0d    = $val_din_01+$val_che_01+$val_car_01;

?>

<table width="528" border="1">
  <tr>
    <td width="259"><div align="left"><strong><?=$cod_tipo."  ".$nome_mov."   ";?></strong></div></td>
    <td width="253"><div align="right"></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Dinheiro</strong></div></td>
    <td><div align="right"><?=number_format($val_din_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Qtd Recebimentos em Dineiro </strong></div></td>
    <td><div align="right"><?=$cont_din_01;?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Cheque</strong></div></td>
    <td><div align="right"><?=number_format($val_che_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Qtd Recebimentos em Cheque </strong></div></td>
    <td><div align="right"><?=$cont_che_01;?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Cart&atilde;o</strong></div></td>
    <td><div align="right"><?=number_format($val_car_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Qtd Recebimento em Cart&atilde;o </strong></div></td>
    <td><div align="right"><?=$cont_car_01;?></div></td>
  </tr>
  <tr>
    <td><div align="left">&ensp;</div></td>
    <td><div align="right">&ensp;</div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Total <?=$nome_mov;?> </strong></div></td>
    <td><div align="right"><?=number_format($total_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left">&ensp;</div></td>
    <td><div align="right">&ensp;</div></td>
  </tr>
</table><br />


<?

// Abrir Receita
$sql_r1  = "SELECT * FROM `caixa` WHERE OPERADORA = 'NILVA' AND SUBSTRING(DATA,4,7) = '$mes_ano' ORDER BY TIPO_MOV ASC";

$resultado_r1 = @mysql_query($sql_r1);

$row_r1 = @mysql_fetch_array($resultado_r1);

$tipo_mov    = @$row_r1["TIPO_MOV"];
$moeda       = @$row_r1["T_MOEDA"];
$qtd         = @$row_r1["QTD"];
$valor       = @$row_r1["VLR_TOT"];

// 149

$cod_tipo = '149';

$cont_din_01 = 0;
$cont_che_01 = 0;
$cont_car_01 = 0;

$total_01    = 0;
$val_din_01  = 0;
$val_che_01  = 0;
$val_car_01  = 0;


	// Inicio do Loop
	while($linha = @mysql_fetch_array($resultado_r1)) {
		
			$tipo_mov    = $linha["TIPO_MOV"];
			$moeda       = $linha["T_MOEDA"];
			$qtd         = $linha["QTD"];
			$valor       = $linha["VLR_TOT"];
			
			
			// Abrir Receita
			$sql_r2  = "SELECT * FROM `caddesc` WHERE CODIGO = '$cod_tipo'";
			
			$resultado_r2 = @mysql_query($sql_r2);
			
			$row_r2 = @mysql_fetch_array($resultado_r2);
			
			$nome_mov    = @$row_r2["DESCRICAO"];
			
			if ($tipo_mov == $cod_tipo){
				
				if ($moeda == "D"){  // Dinheiro
				
					$val_din_01 = $val_din_01 +  $valor;
					$cont_din_01++;
					
				}
				if ($moeda == "C"){  // Cheque
					
					$val_che_01 = $val_che_01 +  $valor;
					$cont_che_01++;
					
				}
				if ($moeda == "T"){  // Cartao credito debito
					
					$val_car_01 = $val_car_01 +  $valor;
					$cont_car_01++;
					
				}
				
			} // FIM
		
		
		
		
	}	
$total_01    = $val_din_01+$val_che_01+$val_car_01;
$total_0e    = $val_din_01+$val_che_01+$val_car_01;

?>

<table width="528" border="1">
  <tr>
    <td width="259"><div align="left"><strong><?=$cod_tipo."  ".$nome_mov."   ";?></strong></div></td>
    <td width="253"><div align="right"></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Dinheiro</strong></div></td>
    <td><div align="right"><?=number_format($val_din_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Qtd Recebimentos em Dineiro </strong></div></td>
    <td><div align="right"><?=$cont_din_01;?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Cheque</strong></div></td>
    <td><div align="right"><?=number_format($val_che_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Qtd Recebimentos em Cheque </strong></div></td>
    <td><div align="right"><?=$cont_che_01;?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Cart&atilde;o</strong></div></td>
    <td><div align="right"><?=number_format($val_car_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Qtd Recebimento em Cart&atilde;o </strong></div></td>
    <td><div align="right"><?=$cont_car_01;?></div></td>
  </tr>
  <tr>
    <td><div align="left">&ensp;</div></td>
    <td><div align="right">&ensp;</div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Total <?=$nome_mov;?> </strong></div></td>
    <td><div align="right"><?=number_format($total_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left">&ensp;</div></td>
    <td><div align="right">&ensp;</div></td>
  </tr>
</table><br />


<?

// Abrir Receita
$sql_r1  = "SELECT * FROM `caixa` WHERE OPERADORA = 'NILVA' AND SUBSTRING(DATA,4,7) = '$mes_ano' ORDER BY TIPO_MOV ASC";

$resultado_r1 = @mysql_query($sql_r1);

$row_r1 = @mysql_fetch_array($resultado_r1);

$tipo_mov    = @$row_r1["TIPO_MOV"];
$moeda       = @$row_r1["T_MOEDA"];
$qtd         = @$row_r1["QTD"];
$valor       = @$row_r1["VLR_TOT"];

// 150

$cod_tipo = '150';

$cont_din_01 = 0;
$cont_che_01 = 0;
$cont_car_01 = 0;

$total_01    = 0;
$val_din_01  = 0;
$val_che_01  = 0;
$val_car_01  = 0;


	// Inicio do Loop
	while($linha = @mysql_fetch_array($resultado_r1)) {
		
			$tipo_mov    = $linha["TIPO_MOV"];
			$moeda       = $linha["T_MOEDA"];
			$qtd         = $linha["QTD"];
			$valor       = $linha["VLR_TOT"];
			
			
			// Abrir Receita
			$sql_r2  = "SELECT * FROM `caddesc` WHERE CODIGO = '$cod_tipo'";
			
			$resultado_r2 = @mysql_query($sql_r2);
			
			$row_r2 = @mysql_fetch_array($resultado_r2);
			
			$nome_mov    = @$row_r2["DESCRICAO"];
			
			if ($tipo_mov == $cod_tipo){
				
				if ($moeda == "D"){  // Dinheiro
				
					$val_din_01 = $val_din_01 +  $valor;
					$cont_din_01++;
					
				}
				if ($moeda == "C"){  // Cheque
					
					$val_che_01 = $val_che_01 +  $valor;
					$cont_che_01++;
					
				}
				if ($moeda == "T"){  // Cartao credito debito
					
					$val_car_01 = $val_car_01 +  $valor;
					$cont_car_01++;
					
				}
				
			} // FIM
		
		
		
		
	}	
$total_01    = $val_din_01+$val_che_01+$val_car_01;
$total_0f    = $val_din_01+$val_che_01+$val_car_01;

?>

<table width="528" border="1">
  <tr>
    <td width="259"><div align="left"><strong><?=$cod_tipo."  ".$nome_mov."   ";?></strong></div></td>
    <td width="253"><div align="right"></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Dinheiro</strong></div></td>
    <td><div align="right"><?=number_format($val_din_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Qtd Recebimentos em Dineiro </strong></div></td>
    <td><div align="right"><?=$cont_din_01;?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Cheque</strong></div></td>
    <td><div align="right"><?=number_format($val_che_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Qtd Recebimentos em Cheque </strong></div></td>
    <td><div align="right"><?=$cont_che_01;?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Cart&atilde;o</strong></div></td>
    <td><div align="right"><?=number_format($val_car_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Qtd Recebimento em Cart&atilde;o </strong></div></td>
    <td><div align="right"><?=$cont_car_01;?></div></td>
  </tr>
  <tr>
    <td><div align="left">&ensp;</div></td>
    <td><div align="right">&ensp;</div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Total <?=$nome_mov;?> </strong></div></td>
    <td><div align="right"><?=number_format($total_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left">&ensp;</div></td>
    <td><div align="right">&ensp;</div></td>
  </tr>
</table><br />


<?

// Abrir Receita
$sql_r1  = "SELECT * FROM `caixa` WHERE OPERADORA = 'NILVA' AND SUBSTRING(DATA,4,7) = '$mes_ano' ORDER BY TIPO_MOV ASC";

$resultado_r1 = @mysql_query($sql_r1);

$row_r1 = @mysql_fetch_array($resultado_r1);

$tipo_mov    = @$row_r1["TIPO_MOV"];
$moeda       = @$row_r1["T_MOEDA"];
$qtd         = @$row_r1["QTD"];
$valor       = @$row_r1["VLR_TOT"];

// 151

$cod_tipo = '151';

$cont_din_01 = 0;
$cont_che_01 = 0;
$cont_car_01 = 0;

$total_01    = 0;
$val_din_01  = 0;
$val_che_01  = 0;
$val_car_01  = 0;


	// Inicio do Loop
	while($linha = @mysql_fetch_array($resultado_r1)) {
		
			$tipo_mov    = $linha["TIPO_MOV"];
			$moeda       = $linha["T_MOEDA"];
			$qtd         = $linha["QTD"];
			$valor       = $linha["VLR_TOT"];
			
			
			// Abrir Receita
			$sql_r2  = "SELECT * FROM `caddesc` WHERE CODIGO = '$cod_tipo'";
			
			$resultado_r2 = @mysql_query($sql_r2);
			
			$row_r2 = @mysql_fetch_array($resultado_r2);
			
			$nome_mov    = @$row_r2["DESCRICAO"];
			
			if ($tipo_mov == $cod_tipo){
				
				if ($moeda == "D"){  // Dinheiro
				
					$val_din_01 = $val_din_01 +  $valor;
					$cont_din_01++;
					
				}
				if ($moeda == "C"){  // Cheque
					
					$val_che_01 = $val_che_01 +  $valor;
					$cont_che_01++;
					
				}
				if ($moeda == "T"){  // Cartao credito debito
					
					$val_car_01 = $val_car_01 +  $valor;
					$cont_car_01++;
					
				}
				
			} // FIM
		
		
		
		
	}	
$total_01    = $val_din_01+$val_che_01+$val_car_01;
$total_0g    = $val_din_01+$val_che_01+$val_car_01;

?>

<table width="528" border="1">
  <tr>
    <td width="259"><div align="left"><strong><?=$cod_tipo."  ".$nome_mov."   ";?></strong></div></td>
    <td width="253"><div align="right"></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Dinheiro</strong></div></td>
    <td><div align="right"><?=number_format($val_din_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Qtd Recebimentos em Dineiro </strong></div></td>
    <td><div align="right"><?=$cont_din_01;?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Cheque</strong></div></td>
    <td><div align="right"><?=number_format($val_che_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Qtd Recebimentos em Cheque </strong></div></td>
    <td><div align="right"><?=$cont_che_01;?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Cart&atilde;o</strong></div></td>
    <td><div align="right"><?=number_format($val_car_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Qtd Recebimento em Cart&atilde;o </strong></div></td>
    <td><div align="right"><?=$cont_car_01;?></div></td>
  </tr>
  <tr>
    <td><div align="left">&ensp;</div></td>
    <td><div align="right">&ensp;</div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Total <?=$nome_mov;?> </strong></div></td>
    <td><div align="right"><?=number_format($total_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left">&ensp;</div></td>
    <td><div align="right">&ensp;</div></td>
  </tr>
</table><br />


<?

// Abrir Receita
$sql_r1  = "SELECT * FROM `caixa` WHERE OPERADORA = 'NILVA' AND SUBSTRING(DATA,4,7) = '$mes_ano' ORDER BY TIPO_MOV ASC";

$resultado_r1 = @mysql_query($sql_r1);

$row_r1 = @mysql_fetch_array($resultado_r1);

$tipo_mov    = @$row_r1["TIPO_MOV"];
$moeda       = @$row_r1["T_MOEDA"];
$qtd         = @$row_r1["QTD"];
$valor       = @$row_r1["VLR_TOT"];

// 152

$cod_tipo = '152';

$cont_din_01 = 0;
$cont_che_01 = 0;
$cont_car_01 = 0;

$total_01    = 0;
$val_din_01  = 0;
$val_che_01  = 0;
$val_car_01  = 0;


	// Inicio do Loop
	while($linha = @mysql_fetch_array($resultado_r1)) {
		
			$tipo_mov    = $linha["TIPO_MOV"];
			$moeda       = $linha["T_MOEDA"];
			$qtd         = $linha["QTD"];
			$valor       = $linha["VLR_TOT"];
			
			
			// Abrir Receita
			$sql_r2  = "SELECT * FROM `caddesc` WHERE CODIGO = '$cod_tipo'";
			
			$resultado_r2 = @mysql_query($sql_r2);
			
			$row_r2 = @mysql_fetch_array($resultado_r2);
			
			$nome_mov    = @$row_r2["DESCRICAO"];
			
			if ($tipo_mov == $cod_tipo){
				
				if ($moeda == "D"){  // Dinheiro
				
					$val_din_01 = $val_din_01 +  $valor;
					$cont_din_01++;
					
				}
				if ($moeda == "C"){  // Cheque
					
					$val_che_01 = $val_che_01 +  $valor;
					$cont_che_01++;
					
				}
				if ($moeda == "T"){  // Cartao credito debito
					
					$val_car_01 = $val_car_01 +  $valor;
					$cont_car_01++;
					
				}
				
			} // FIM
		
		
		
		
	}	
$total_01    = $val_din_01+$val_che_01+$val_car_01;
$total_0h    = $val_din_01+$val_che_01+$val_car_01;

?>

<table width="528" border="1">
  <tr>
    <td width="259"><div align="left"><strong><?=$cod_tipo."  ".$nome_mov."   ";?></strong></div></td>
    <td width="253"><div align="right"></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Dinheiro</strong></div></td>
    <td><div align="right"><?=number_format($val_din_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Qtd Recebimentos em Dineiro </strong></div></td>
    <td><div align="right"><?=$cont_din_01;?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Cheque</strong></div></td>
    <td><div align="right"><?=number_format($val_che_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Qtd Recebimentos em Cheque </strong></div></td>
    <td><div align="right"><?=$cont_che_01;?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Cart&atilde;o</strong></div></td>
    <td><div align="right"><?=number_format($val_car_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Qtd Recebimento em Cart&atilde;o </strong></div></td>
    <td><div align="right"><?=$cont_car_01;?></div></td>
  </tr>
  <tr>
    <td><div align="left">&ensp;</div></td>
    <td><div align="right">&ensp;</div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Total <?=$nome_mov;?> </strong></div></td>
    <td><div align="right"><?=number_format($total_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left">&ensp;</div></td>
    <td><div align="right">&ensp;</div></td>
  </tr>
</table><br />


<?

// Abrir Receita
$sql_r1  = "SELECT * FROM `caixa` WHERE OPERADORA = 'NILVA' AND SUBSTRING(DATA,4,7) = '$mes_ano' ORDER BY TIPO_MOV ASC";

$resultado_r1 = @mysql_query($sql_r1);

$row_r1 = @mysql_fetch_array($resultado_r1);

$tipo_mov    = @$row_r1["TIPO_MOV"];
$moeda       = @$row_r1["T_MOEDA"];
$qtd         = @$row_r1["QTD"];
$valor       = @$row_r1["VLR_TOT"];

// 153

$cod_tipo = '153';

$cont_din_01 = 0;
$cont_che_01 = 0;
$cont_car_01 = 0;

$total_01    = 0;
$val_din_01  = 0;
$val_che_01  = 0;
$val_car_01  = 0;


	// Inicio do Loop
	while($linha = @mysql_fetch_array($resultado_r1)) {
		
			$tipo_mov    = $linha["TIPO_MOV"];
			$moeda       = $linha["T_MOEDA"];
			$qtd         = $linha["QTD"];
			$valor       = $linha["VLR_TOT"];
			
			
			// Abrir Receita
			$sql_r2  = "SELECT * FROM `caddesc` WHERE CODIGO = '$cod_tipo'";
			
			$resultado_r2 = @mysql_query($sql_r2);
			
			$row_r2 = @mysql_fetch_array($resultado_r2);
			
			$nome_mov    = @$row_r2["DESCRICAO"];
			
			if ($tipo_mov == $cod_tipo){
				
				if ($moeda == "D"){  // Dinheiro
				
					$val_din_01 = $val_din_01 +  $valor;
					$cont_din_01++;
					
				}
				if ($moeda == "C"){  // Cheque
					
					$val_che_01 = $val_che_01 +  $valor;
					$cont_che_01++;
					
				}
				if ($moeda == "T"){  // Cartao credito debito
					
					$val_car_01 = $val_car_01 +  $valor;
					$cont_car_01++;
					
				}
				
			} // FIM
		
		
		
		
	}	
$total_01    = $val_din_01+$val_che_01+$val_car_01;
$total_0i    = $val_din_01+$val_che_01+$val_car_01;

?>

<table width="528" border="1">
  <tr>
    <td width="259"><div align="left"><strong><?=$cod_tipo."  ".$nome_mov."   ";?></strong></div></td>
    <td width="253"><div align="right"></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Dinheiro</strong></div></td>
    <td><div align="right"><?=number_format($val_din_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Qtd Recebimentos em Dineiro </strong></div></td>
    <td><div align="right"><?=$cont_din_01;?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Cheque</strong></div></td>
    <td><div align="right"><?=number_format($val_che_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Qtd Recebimentos em Cheque </strong></div></td>
    <td><div align="right"><?=$cont_che_01;?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Cart&atilde;o</strong></div></td>
    <td><div align="right"><?=number_format($val_car_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Qtd Recebimento em Cart&atilde;o </strong></div></td>
    <td><div align="right"><?=$cont_car_01;?></div></td>
  </tr>
  <tr>
    <td><div align="left">&ensp;</div></td>
    <td><div align="right">&ensp;</div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Total <?=$nome_mov;?> </strong></div></td>
    <td><div align="right"><?=number_format($total_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left">&ensp;</div></td>
    <td><div align="right">&ensp;</div></td>
  </tr>
</table><br />


<?

// Abrir Receita
$sql_r1  = "SELECT * FROM `caixa` WHERE OPERADORA = 'NILVA' AND SUBSTRING(DATA,4,7) = '$mes_ano' ORDER BY TIPO_MOV ASC";

$resultado_r1 = @mysql_query($sql_r1);

$row_r1 = @mysql_fetch_array($resultado_r1);

$tipo_mov    = @$row_r1["TIPO_MOV"];
$moeda       = @$row_r1["T_MOEDA"];
$qtd         = @$row_r1["QTD"];
$valor       = @$row_r1["VLR_TOT"];

// 154

$cod_tipo = '154';

$cont_din_01 = 0;
$cont_che_01 = 0;
$cont_car_01 = 0;

$total_01    = 0;
$val_din_01  = 0;
$val_che_01  = 0;
$val_car_01  = 0;


	// Inicio do Loop
	while($linha = @mysql_fetch_array($resultado_r1)) {
		
			$tipo_mov    = $linha["TIPO_MOV"];
			$moeda       = $linha["T_MOEDA"];
			$qtd         = $linha["QTD"];
			$valor       = $linha["VLR_TOT"];
			
			
			// Abrir Receita
			$sql_r2  = "SELECT * FROM `caddesc` WHERE CODIGO = '$cod_tipo'";
			
			$resultado_r2 = @mysql_query($sql_r2);
			
			$row_r2 = @mysql_fetch_array($resultado_r2);
			
			$nome_mov    = @$row_r2["DESCRICAO"];
			
			if ($tipo_mov == $cod_tipo){
				
				if ($moeda == "D"){  // Dinheiro
				
					$val_din_01 = $val_din_01 +  $valor;
					$cont_din_01++;
					
				}
				if ($moeda == "C"){  // Cheque
					
					$val_che_01 = $val_che_01 +  $valor;
					$cont_che_01++;
					
				}
				if ($moeda == "T"){  // Cartao credito debito
					
					$val_car_01 = $val_car_01 +  $valor;
					$cont_car_01++;
					
				}
				
			} // FIM
		
		
		
		
	}	
$total_01    = $val_din_01+$val_che_01+$val_car_01;
$total_0j    = $val_din_01+$val_che_01+$val_car_01;

?>

<table width="528" border="1">
  <tr>
    <td width="259"><div align="left"><strong><?=$cod_tipo."  ".$nome_mov."   ";?></strong></div></td>
    <td width="253"><div align="right"></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Dinheiro</strong></div></td>
    <td><div align="right"><?=number_format($val_din_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Qtd Recebimentos em Dineiro </strong></div></td>
    <td><div align="right"><?=$cont_din_01;?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Cheque</strong></div></td>
    <td><div align="right"><?=number_format($val_che_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Qtd Recebimentos em Cheque </strong></div></td>
    <td><div align="right"><?=$cont_che_01;?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Cart&atilde;o</strong></div></td>
    <td><div align="right"><?=number_format($val_car_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Qtd Recebimento em Cart&atilde;o </strong></div></td>
    <td><div align="right"><?=$cont_car_01;?></div></td>
  </tr>
  <tr>
    <td><div align="left">&ensp;</div></td>
    <td><div align="right">&ensp;</div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Total <?=$nome_mov;?> </strong></div></td>
    <td><div align="right"><?=number_format($total_01,2,",",".");?></div></td>
  </tr>
  <tr>
    <td><div align="left">&ensp;</div></td>
    <td><div align="right">&ensp;</div></td>
  </tr>
</table><br />
<br />
<?

$total_fim = $total_0a+$total_0b+$total_0c+$total_0d+$total_0e+$total_0f+$total_0g+$total_0h+$total_0i+$total_0j;
//echo number_format($total_fim,2,",",".");
?>

<table width="528" border="1">
  <tr>
    <td width="259"><div align="left">Total Final</div></td>
    <td width="253"><div align="right"><?=number_format($total_fim,2,",",".");?></div></td>
  </tr>
</table>
