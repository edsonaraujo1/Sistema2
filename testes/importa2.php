<?php

/**
 * @author holodek
 * @copyright 2010
 */

// Abre Conexão com o MySql
$host = 'localhost';
$user = 'root';
$pass = '12345';
$db   = 'bancodados';

$cod_n = 1;

$i = 0;

$link = @mysql_connect($host,$user,$pass);

mysql_select_db($db);

$consulta0 = "SELECT * FROM edificios_cnpj";
	
$resultado0 = mysql_query($consulta0);


while ($linha0 = mysql_fetch_array($resultado0))
{


switch ($i) { 
case 0: 
     $dados[$si] = $linha0["dados"];
     $cnpj = substr($dados[$si],12,200);
     
     $cnpj_1 = substr($cnpj,0,2);
     $cnpj_2 = substr($cnpj,2,3);
     $cnpj_3 = substr($cnpj,5,3);
     $cnpj_4 = substr($cnpj,8,4);
     $cnpj_5 = substr($cnpj,12,2);
     
     $cnpj = $cnpj_1.".".$cnpj_2.".".$cnpj_3."/".$cnpj_4."-".$cnpj_5;
     
     echo "CNPJ = ".$cnpj."<br>";
     $i++;
     break; 

case 1: 
     $dados[$si] = $linha0["dados"];
     $nome = retirar_carac2(substr($dados[$si],12,200));
     echo "NOME = ".substr($dados[$si],12,200)."<br>";
     $i++;
     break; 

case 2: 
     $dados[$si] = $linha0["dados"];
     $endereco = retirar_carac2(substr($dados[$si],12,200));
     echo "ENDERECO = ".substr($dados[$si],12,200)."<br>";
     $i++;
     break; 

case 3: 
     $dados[$si] = $linha0["dados"];
     $bairro = retirar_carac2(substr($dados[$si],12,200));
     echo "BAIRRO = ".substr($dados[$si],12,200)."<br>";
     $i++;
     break; 

case 4: 
     $dados[$si] = $linha0["dados"];
     $cep = retirar_carac2(substr($dados[$si],12,200));
     echo "CEP = ".substr($dados[$si],12,200)."<br>";
     $i++;
     break; 

case 5: 
     $dados[$si] = $linha0["dados"];
     $space = retirar_carac2(substr($dados[$si],12,200));
     echo " = ".substr($dados[$si],12,200)."<br><br>";
     $i=0;
     
$data = "20/09/2010";
$adm_n = 618;
$nu_emp = 0;

$salvar = "INSERT INTO edificios2     (COD,
                                       ATIV,
                                       UF,
                                       ADM,
                                       NU_EMP,
                                       DATA,
                                       NOME,
                                       ENDERECO,
                                       CGC,
									   BAIRRO,
									   CEP)
									   
							VALUES 
							           ('$cod_n',
							            'CONTRIBUINTE',
							            'SP',
							            '$adm_n',
							            '$nu_emp',
									    '$data',
									    '$nome',
									    '$endereco',
									    '$cnpj',
										'$bairro',
										'$cep')";
mysql_query($salvar, $link) or 

die("erro: na inclusao !!!!");
     break; 
     
} 

										
$cod_n++; 
}
     
echo "<br>Quantidade de Registros lidos = ".$cod_n;

Function retirar_carac2($var){

$var = ereg_replace("[ÁÀÂÃ]",        "A",$var);
$var = ereg_replace("[áàâãª]",       "a",$var);
$var = ereg_replace("[ÉÈÊ]",         "E",$var);
$var = ereg_replace("[éèê]",         "e",$var);
$var = ereg_replace("[ÓÒÔÕ]",        "O",$var);
$var = ereg_replace("[óòôõº]",       "o",$var);
$var = ereg_replace("[ÚÙÛ]",         "U",$var);
$var = ereg_replace("[úùû]",         "u",$var);
$var = ereg_replace("[?*#'´`!$%¨;]", " ",$var);
$var = str_replace("Ç",              "C",$var);
$var = str_replace("ç",              "c",$var);
$var = str_replace(" or ",           " ",$var);
$var = str_replace("select ",        " ",$var);
$var = str_replace("delete ",        " ",$var);
$var = str_replace("create ",        " ",$var);
$var = str_replace("drop ",          " ",$var);
$var = str_replace("update ",        " ",$var);
$var = str_replace("drop table",     " ",$var);
$var = str_replace("show table",     " ",$var);
$var = str_replace("applet",         " ",$var);
$var = str_replace("objetc",         " ",$var);

return($var);
}

?>