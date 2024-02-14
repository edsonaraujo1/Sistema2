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

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

$consulta  = "SELECT * FROM table_354 ORDER BY COD ASC";
		
$resultado = @mysql_query($consulta);

$contr_0    = 0;
$soma = 35323;
		
while ($linha = @mysql_fetch_array($resultado))
{
	   $cod       = $linha["COD"];
	   $nome      = $linha["NOME"];
	   $endereco  = $linha["ENDERECO"];
	   $bairro    = $linha["BAIRRO"];
	   $cep       = $linha["CEP"];
	   $fone      = $linha["FONE"];
	   $cidade    = $linha["CIDADE"];
	   $uf        = $linha["UF"];
	   $ativ      = $linha["ATIV"];
	   $cgc       = $linha["CGC"];
	   $adm       = $linha["ADM"];
	   $data      = date("d/m/Y");
	   
	   //$id        = $linha["id"];
	   $contr_0++;
	   $soma++;
	   
	   //$consulta_up = "UPDATE table_354 SET COD = $soma WHERE id = $id";
						
	   //@mysql_query($consulta_up, $link);
	   
	   
	   $sql = "INSERT INTO edificios  (COD,
	                                   NOME,
			                           ENDERECO,
			                           BAIRRO,
			                           CEP,
			                           FONE,
			                           CIDADE,
			                           UF,
			                           ATIV,
			                           CGC,
			                           ADM,
			                           DATA)
	                               
					VALUES ('$cod',
					        '$nome',
					        '$endereco',
					        '$bairro',
					        '$cep',
					        '$fone',
					        '$cidade',
					        '$uf',
					        '$ativ',
					        '$cgc',
					        '$adm',
					        '$data')";
	
	   @mysql_query($sql, $link); 	
                    	
       echo "Atualizado<br><br>";
       echo $nome."<br>";

}

//echo "Total de Registros Atualizados = ".$contr_0."<br>";
//echo "Terminou!!!";

?>