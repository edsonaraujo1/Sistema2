<?php

/**
 * @author holodek
 * @copyright 2009
 * @Importar TXT para MySQL
 */


$host      = "localhost"; 
$user      = "root"; 
$password  = "12345"; 
$db        = "bancodados"; 

$conexao  = mysql_connect($host, $user, $password) or die(mysql_error()); 
$banco    = mysql_select_db($db) or die(mysql_error()); 

$abrir = fopen("clientes.txt","a+");

$linha = file("clientes.txt");

$total = count($linha);

for ($si = 0; $si < $total; $si++ ){
	
	list($dados1,$dados2,$dados3,$dados4,$dados5,$dados6,$dados7,$dados8,$dados9,$dados10,$dados11,$dados12,$dados13,$dados14,$dados15,$dados16,$dados17,$dados18,$dados19,$dados20,$dados21,$dados22,$dados23,$dados24,$dados25,$dados26,$dados27,$dados28,$dados29,$dados30,$dados31,$dados32,$dados33,$dados34,$dados35,$dados36,$dados37,$dados38,$dados39,$dados40,$dados41,$dados42,$dados43,$dados44,$dados45,$dados46,$dados47,$dados48,$dados49,$dados50,$dados51,$dados52,$dados53,$dados54,) = explode("\t", $linha[$si]);
	
	
$cep = $dados9;

$VAR_cep1 = SUBSTR($cep,0,5);
$VAR_cep2 = SUBSTR($cep,5,3);
	
$cep_fim = trim($VAR_cep1."-".$VAR_cep2);

	
echo $dados1."<br>";
echo $dados2."<br>";
echo $dados3."<br>";
echo $dados4."<br>";
echo $dados5."<br>";
echo $dados6."<br>";
echo $dados7."<br>";
echo $dados8."<br>";
echo $dados9."<br>";
echo $dados10."<br>";
echo $dados11."<br>";
echo $dados12."<br>";
echo $dados13."<br>";
echo $dados14."<br>";
echo $dados15."<br>";
echo $dados16."<br>";
echo $dados17."<br>";
echo $dados18."<br>";
echo $dados19."<br>";
echo $dados20."<br>";
echo $dados21."<br>";
echo $dados22."<br>";
echo $dados23."<br>";
echo $dados24."<br>";
echo $dados25."<br>";
echo $dados26."<br>";
echo $dados27."<br>";
echo $dados28."<br>";
echo $dados29."<br>";
echo $dados30."<br>";
echo $dados31."<br>";
echo $dados32."<br>";
echo $dados33."<br>";
echo $dados34."<br>";
echo $dados35."<br>";
echo $dados36."<br>";
echo $dados37."<br>";
echo $dados38."<br>";
echo $dados39."<br>";
echo $dados40."<br>";
echo $dados41."<br>";
echo $dados42."<br>";
echo $dados43."<br>";
echo $dados44."<br>";
echo $dados45."<br>";
echo $dados46."<br>";
echo $dados47."<br>";
echo $dados48."<br>";
echo $dados49."<br>";
echo $dados50."<br>";
echo $dados51."<br>";
echo $dados52."<br>";
echo $dados53."<br>";
echo $dados54."fim da linha<br><br><br>";


	$sql = "INSERT INTO clientes  (Campo1,
                                   Campo2,
		                           Campo3,
		                           Campo4,
		                           Campo5,
		                           Campo6,
		                           Campo7,
		                           Campo8,
		                           Campo9,
		                           Campo10,
		                           Campo11,
		                           Campo12,
		                           Campo13,
		                           Campo14,
		                           Campo15,
		                           Campo16,
		                           Campo17,
		                           Campo18,
		                           Campo19,
		                           Campo20,
		                           Campo21,
		                           Campo22,
		                           Campo23,
		                           Campo24,
		                           Campo25,
		                           Campo26,
		                           Campo27,
		                           Campo28,
		                           Campo29,
		                           Campo30,
		                           Campo31,
		                           Campo32,
		                           Campo33,
		                           Campo34,
		                           Campo35,
		                           Campo36,
		                           Campo37,
		                           Campo38,
		                           Campo39,
		                           Campo40,
		                           Campo41,
		                           Campo42,
		                           Campo43,
		                           Campo44)
                               
				VALUES ('$dados1',
				        '$dados2',
				        '$dados3',
				        '$dados4',
				        '$dados5',
				        '$dados6',
				        '$dados7',
				        '$dados8',
				        '$dados9',
				        '$dados10',
				        '$dados11',
				        '$dados12',
				        '$dados13',
				        '$dados14',
				        '$dados15',
				        '$dados16',
				        '$dados17',
				        '$dados18',
				        '$dados19',
				        '$dados20',
				        '$dados21',
				        '$dados22',
				        '$dados23',
				        '$dados24',
				        '$dados25',
				        '$dados26',
				        '$dados27',
				        '$dados28',
				        '$dados29',
				        '$dados30',
				        '$dados31',
				        '$dados32',
				        '$dados33',
				        '$dados34',
				        '$dados35',
				        '$dados36',
				        '$dados37',
				        '$dados38',
				        '$dados39',
				        '$dados40',
				        '$dados41',
				        '$dados42',
				        '$dados43',
				        '$dados44')";

@mysql_query($sql); 	
	
}
?>