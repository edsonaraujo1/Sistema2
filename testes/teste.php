<?php

/**
 * @author holodek
 * @copyright 2010
 */


// Funcao Verifica Versao do Browse
if((ereg("Nav", getenv("HTTP_USER_AGENT"))) || (ereg("Gold", getenv("HTTP_USER_AGENT"))) || (ereg("X11", getenv("HTTP_USER_AGENT"))) || (ereg("Mozilla", getenv("HTTP_USER_AGENT"))) || (ereg("Netscape", getenv("HTTP_USER_AGENT"))) AND (!ereg("MSIE", getenv("HTTP_USER_AGENT")) AND (!ereg("Konqueror", getenv("HTTP_USER_AGENT"))))) $browser = " Netscape"; 
elseif(ereg("MSIE", getenv("HTTP_USER_AGENT"))) $browser = " MS Internet Explorer"; 
elseif(ereg("Lynx", getenv("HTTP_USER_AGENT"))) $browser = " Lynx"; 
elseif(ereg("Opera", getenv("HTTP_USER_AGENT"))) $browser = " Opera"; 
elseif(ereg("WebTV", getenv("HTTP_USER_AGENT"))) $browser = " WebTV"; 
elseif(ereg("Konqueror", getenv("HTTP_USER_AGENT"))) $browser = " Konqueror"; 
elseif((eregi("bot", getenv("HTTP_USER_AGENT"))) || (ereg(" Google", getenv("HTTP_USER_AGENT"))) || (ereg("Slurp", getenv("HTTP_USER_AGENT"))) || (ereg("Scooter", getenv("HTTP_USER_AGENT"))) || (eregi("Spider", getenv("HTTP_USER_AGENT"))) || (eregi("Infoseek", getenv("HTTP_USER_AGENT")))) $browser = " Robôs de Busca"; 
else $browser = " Desconhecido"; 

echo $browser;

?>