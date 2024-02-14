<?php

/**
 * @author holodek
 * @copyright 2010
 */


function anti_sql_injection($string)
{
$string = get_magic_quotes_gpc() ? stripslashes($string) : $string;

$string = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($string) : mysql_escape_string($string);

return $string;
}


$cont = mysql_quey("SELECT usuario, senha FROM usuarios WHERE usuario = ‘" . anti_sql_injection($_POST[’usename’]) . "’ AND senha = ‘" . anti_sql_injection($_POST[’password’]) . "’");

?>