<?php

/**
 * @author holodek
 * @copyright 2010
 */

// Abre Conexão com o MySql

//$host  = "192.168.1.50";   // Host do servidor
//$user  = "sindificios";     // Conta do Usuario
//$pass  = "@12XLSIN_!?";     // Senha do Usuario
//$db    = "bancodados";     // Banco de Dados

$host = 'localhost';
$user = 'root';
$pass = '12345';
$db   = 'bancodados';

$cod_n = 1;
$i = 0;

$link = @mysql_connect($host,$user,$pass);

mysql_select_db($db);

$consulta0 = "SELECT * FROM edificios2";
	
$resultado0 = mysql_query($consulta0);

$conta_edif = 0;
$nao_consta = 0;

while ($linha0 = mysql_fetch_array($resultado0))
{

	$Edit1   = $linha0["COD"];
	$Edit2   = $linha0["ATIV"];
	$Edit3   = $linha0["DATA"];
	$Edit5   = $linha0["NOME"];
	$Edit7   = $linha0["ENDERECO"];
	$Edit9   = $linha0["CEP"];
	$Edit10  = $linha0["BAIRRO"];
	$Edit11  = $linha0["UF"]; 
	$Edit12  = $linha0["CGC"];

	$consulta2 = "SELECT * FROM edificios Where CGC = '$Edit12'";
	
	$resultado2 = @mysql_query($consulta2);
	
	$row2 = @mysql_fetch_array($resultado2);
	
	$id_edif    = @$row2["id"];
	$nome_edif  = @$row2["NOME"];
	$cnpj_edif  = @$row2["CGC"];
	
	if (!empty($id_edif)){
		
		echo "CNPJ ja conta no Cadastro = ".$cnpj_edif."<br>";
		echo "Nome = ".$nome_edif."<br><br>";
		$conta_edif++;
	}else{
		
		$nao_consta++;
		
		$consulta_e  = "SELECT * FROM edificios ORDER BY COD DESC LIMIT 0,1";
		
		$resultado_e = @mysql_query($consulta_e);
		
		// Incrementa novo codigo
		
		$row_e = @mysql_fetch_array($resultado_e);
		
		$cod_2    = @$row_e["COD"];
		
		$novo_1 = $cod_2+1;
		$dat_insc = date("d/m/Y");
		
		$consulta_d = "INSERT INTO edificios (COD,
											  ATIV,
		                                      DATA,
											  NOME,
											  ENDERECO,
											  CEP,
											  BAIRRO,
											  UF,
											  CGC,
											  NU_EMP,
											  ADM,
											  OBS)
		                VALUES
		                                  ('$novo_1',
										   'CONTRIBUINTE',
										   '$dat_insc',
										   '$Edit5',
										   '$Edit7',
										   '$Edit9',
										   '$Edit10',
										   '$Edit11',
										   '$Edit12',
										   '0',
										   '9999',
										   'Informacoes inseridas do arquivo fornecido')";
		
		@mysql_query($consulta_d, $link);

		
		
	}	

    
}
echo "Total de CNPJ que ja conta no cadastro = ".$conta_edif."<br>";
echo "Total de CNPJ que nao conta no cadastro = ".$nao_consta;
?>