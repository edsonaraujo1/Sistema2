<?php

/**
 * @author holodek
 * @copyright 2011
 */

// Abre Conexão com o MySql
include("conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

$consulta  = "SELECT * FROM fenatec WHERE id >= 1 ORDER BY id ASC";
		
$resultado = @mysql_query($consulta);

$contr_0    = 0;
$contr_1    = 0;
		
while ($linha = mysql_fetch_array($resultado))
{
		
				    $id_conf   = $linha["id"];
					$nome      = trim(strtoupper(retirar_carac($linha["Edit5"])));
					$endereco  = trim(strtoupper(retirar_carac($linha["Edit7"])));
					$cep       = trim(strtoupper(retirar_carac($linha["Edit9"])));
					$cidade    = trim(strtoupper(retirar_carac($linha["Edit10"])));
					$uf        = trim(strtoupper(retirar_carac($linha["Edit11"])));
					$bairro    = trim(strtoupper(retirar_carac($linha["Edit12"])));
					$adms      = 77777;
					$nu_emp    = 0;
					

                    //echo "Retornado<br><br>";
					//echo $cod."<br>";
                    //echo $nome."<br>";
                    //echo $cod_edif."<br>";

					// Abrir tabela edificios
					
					$consulta_e  = "SELECT * FROM edificios ORDER BY COD DESC LIMIT 0,1";
					
					$resultado_e = @mysql_query($consulta_e);
					
					// Incrementa novo codigo
					
					$row_e = @mysql_fetch_array($resultado_e);
					
					$id       = @$row_e["id"];
					$cod_2    = @$row_e["COD"];
					
					$novo_1 = $cod_2+1;
					$dat_insc = date("d/m/Y");


	                    	// Atualiza Edificios
	                    	
	                    	
							$consulta_up = "INSERT INTO edificios (COD,
							                                       DATA,
							                                       NOME,
																   ENDERECO,
																   BAIRRO,
																   CEP,
																   CIDADE,
																   UF,
																   ADM,
																   NU_EMP)
							 
							 
							VALUES ('$novo_1',
							        '$dat_insc',
							        '$nome',
									'$endereco',
									'$bairro',
									'$cep',
									'$cidade',
									'$uf',
									'$adms',
									'$nu_emp')";
								
							@mysql_query($consulta_up, $link);
	                    	
	                    	$contr_0++;
	                    	
	                    	echo "Atualizado<br><br>";
							echo $Edit1."<br>";
	                    	echo $Edit11."<br>";
                    	
                    	//echo "Socio ja Consta na Tabela!!<br><br>";
                    	$contr_1++;
                    

}

echo "Total Atualizado = ".$contr_0."<br>";
echo "Total Não Atualizado = ".$contr_1."<br>";

/*
 --------------------------------
 Funcao para Retirar os caracter
 estranhos e acentos na hora de
 atualizar Table 
---------------------------------
*/

Function retirar_carac($var){

$var = ereg_replace("[ÁÀÂÃ]",        "A",$var);
$var = ereg_replace("[áàâãª]",       "a",$var);
$var = ereg_replace("[ÉÈÊ]",         "E",$var);
$var = ereg_replace("[éèê]",         "e",$var);
$var = ereg_replace("[ÓÒÔÕ]",        "O",$var);
$var = ereg_replace("[óòôõº]",       "o",$var);
$var = ereg_replace("[ÚÙÛ]",         "U",$var);
$var = ereg_replace("[úùû]",         "u",$var);
$var = ereg_replace("[?*#'´`!$%¨]",  " ",$var);
$var = str_replace("Ç",              "C",$var);
$var = str_replace("ç",              "c",$var);
$var = str_replace("\\",             " ",$var);
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
$var = str_replace("where",          " ",$var);

return($var);
}


?>