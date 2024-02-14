<?php

/**
 * @author holodek
 * @copyright 2007
 */

// Abre Conexão com o MySql

ini_set('display_errors',1);
ini_set('display_startup_erro', 1);
error_reporting(E_ALL);


$faz_qual = 2;

if ($faz_qual == 1)
{
	
	$host = "localhost";
	$user = "root";
	$pass = "12345";
	$db   = "bancodados";
	
}else{
	
	$host = "192.168.1.61";
	$user = "sindificios";
	$pass = "@12XLSIN_!?";
	$db   = "bancodados";
	
}


// Chama o Banco de Dados

// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

$consulta  = "SELECT * FROM TABLE_355_a ORDER BY ID ASC";
		
$resultado = @mysql_query($consulta);

$contr_0    = 0;
$soma = 35323;
		
while ($linha = @mysql_fetch_array($resultado))
{
	   $nome      = $linha["NOME"];
	   $id        = $linha["ID"];
	   $contr_0++;
	   $soma++;
	   
	   $consulta_up = "UPDATE TABLE_355_a SET COD = $soma WHERE ID = $id";
						
	   @mysql_query($consulta_up, $link);
                    	
       echo "Atualizado<br><br>";
       echo $nome."<br>";

}

//echo "Total de Registros Atualizados = ".$contr_0."<br>";
//echo "Terminou!!!";

?>