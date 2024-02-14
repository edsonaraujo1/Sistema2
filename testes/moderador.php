<?php

/**
 * @author holodek
 * @copyright 2010
 */


$host     = "localhost";      // Host do servidor
$user     = "root";        // Conta do Usuario
$pass     = "12345";      // Senha do Usuario
$db2      = "site";     // Banco de Dados


$conexao = @mysql_connect($host,$user,$pass);

$db = @mysql_select_db($db2, $conexao);





echo retiraCaracteres(strtolower(retirar_carac("PORRA puxa vida hem essa vaca filho da p u t a vai da a buceta p u t i s bu ce tu da porra! to ma nu cú no seu c ú, seu cuzão ou se preferir  cu zã o")))."<br><br>";

echo retiraCaracteres(strtolower(retirar_carac("Meus caros compatriota e com orgulho que com muita curiosidade venho busca uma po nao sei mais oque fala foi mal meus cumprimentos comer ovo com a baba cuzuda")))."<br><br>";






function retiraCaracteres($menssagem)
{
	$resultado = mysql_query("SELECT * FROM palavrao");
	while ($mostra = mysql_fetch_array($resultado)){

		$menssagem = ereg_replace(retirar_carac($mostra['MsgErrada']), "<img src='c-angry.jpg' width=46 height=16>", $menssagem);
	}	             
	return $menssagem;
	
}

Function retirar_carac($var){

$var = ereg_replace("[ÁÀÂ]",        "A",$var);
$var = ereg_replace("[áàâª]",       "a",$var);
$var = ereg_replace("[ÉÈÊ]",         "E",$var);
$var = ereg_replace("[éèê]",         "e",$var);
$var = ereg_replace("[ÓÒÔÕ]",        "O",$var);
$var = ereg_replace("[óòôõº]",       "o",$var);
$var = ereg_replace("[ÚÙÛ]",         "U",$var);
$var = ereg_replace("[úùû]",         "u",$var);
$var = ereg_replace("[*#'´`!$%¨]",  " ",$var);
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