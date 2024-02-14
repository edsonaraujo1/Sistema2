<?php

/**
 * @author holodek
 * @copyright 2007
 */

// Abre Conexão com o MySql
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

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

$consulta  = "SELECT * FROM edificios WHERE ADM = 36039 ORDER BY ID ASC";
		
$resultado = @mysql_query($consulta);

$contr_0    = 0;
$soma = 36038;
		
while ($linha = mysql_fetch_array($resultado))
{
	   	
	   $id_conf   = $linha["id"];
	   $cod       = $linha["COD"];
	   $nome      = $linha["NOME"];
	   $contr_0++;
	   $soma = $soma + 1;
	   
	   echo "ID.: " . $id_conf . "<br>";
	   echo "Codigo.: " . $soma . "<br>";
	   echo "Nome.: " . $nome . "<br><br>";
	   
	   
	   $consulta_up = "UPDATE edificios SET COD = '$soma' WHERE id = '$id_conf'";
						
	   @mysql_query($consulta_up, $link);
                    	
       echo "Atualizado<br><br>";

}

echo "Total de Registros = ".$contr_0."<br>";
echo "Terminou!!!";

?>