<?php
/*
 ----------------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Salvar info. digitadas em Sessao
 Criado em Data.....: 07/12/2007
 Ultima Atualiza��o : 07/12/2007 

 DEUS SEJA LOUVADO
 ----------------------------------------------------------
*/
@session_start();

if (!empty($_GET["campo1"]))   {
	
    $Edit1 = $_GET["campo1"];
    $_SESSION['campo1'] = $campo1;

}
if (!empty($_GET["Edit2"]))   {
	
    $Edit2 = $_GET["Edit2"];
    $add2 = "UPDATE $nome3a SET Edit2    = '$Edit2' WHERE Nome1 = '$nome3a'";
    @mysql_query($add2, $link);

}
if (!empty($_GET["Edit3"]))   {

   $Edit3 = $_GET["Edit3"];
   $add3 = "UPDATE $nome3a SET Edit3    = '$Edit3'  WHERE Nome1 = '$nome3a'";
   @mysql_query($add3, $link);

}
if (!empty($_GET["Edit4"]))   {

    $Edit4 = $_GET["Edit4"];
    $add4 = "UPDATE $nome3a SET Edit4    = '$Edit4' WHERE Nome1 = '$nome3a'";
    @mysql_query($add4, $link);

}
if (!empty($_GET["Edit5"]))   {
	
   $Edit5 = $_GET["Edit5"];
   $add5 = "UPDATE $nome3a SET Edit5    = '$Edit5' WHERE Nome1 = '$nome3a'";
   @mysql_query($add5, $link);
	
}
if (!empty($_GET["Edit6"]))   {

    $Edit6 = $_GET["Edit6"];
	$add6 = "UPDATE $nome3a SET Edit6   = '$Edit6' WHERE Nome1 = '$nome3a'";
	@mysql_query($add6, $link);
	
}
if (!empty($_GET["Edit7"]))   {

    $Edit7 = $_GET["Edit7"];
    $add7 = "UPDATE $nome3a SET Edit7    = '$Edit7' WHERE Nome1 = '$nome3a'";
    @mysql_query($add7, $link);

}
if (!empty($_GET["Edit8"]))   {

    $Edit8 = $_GET["Edit8"];
    $add8 = "UPDATE $nome3a SET Edit8    = '$Edit8' WHERE Nome1 = '$nome3a'";
    @mysql_query($add8, $link);

}

/*
 --------------------------------
 Funcao para Retirar os caracter
 estranhos e acentos na hora de
 atualizar Table 
---------------------------------
*/

Function retirar_carac($var){

$var = @ereg_replace("[����]",      "A",$var);
$var = @ereg_replace("[����]",     "a",$var);
$var = @ereg_replace("[���]",       "E",$var);
$var = @ereg_replace("[���]",       "e",$var);
$var = @ereg_replace("[����]",      "O",$var);
$var = @ereg_replace("[�����]",     "o",$var);
$var = @ereg_replace("[���]",       "U",$var);
$var = @ereg_replace("[���]",       "u",$var);
$var = @ereg_replace("[?*#'�`!$%�]"," ",$var);
$var = str_replace("�",            "C",$var);
$var = str_replace("�",            "c",$var);

return($var);
}

?>
