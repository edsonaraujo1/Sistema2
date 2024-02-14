<?php
/*
 -----------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Informações do Sistema
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 -----------------------------------------
*/

// Resgata a Sessao
//@session_start();
/*
$website	= $_SESSION['website'];
$cpfwebsite = $_SESSION['cpfwebsite'];
$atuali_za  = $_SESSION['atuali_za'];
$criado_za  = $_SESSION['criado_za'];
$logo_sis   = $_SESSION['logo_sis'];
$Titulo     = $_SESSION['Titulo'];
$cnpj_sis   = $_SESSION['cnpj_sis'];
$logo1_sis  = $_SESSION['logo1_sis'];
$logo2_sis  = $_SESSION['logo2_sis'];
$color_bor  = $_SESSION['color_bor'];
$versao_1   = $_SESSION['versao_1'];
$color_menu = $_SESSION['color_menu'];

$nome3 = addslashes($_SESSION["nome_log"]);

*/

print "<style>";
print "<!--";
print ".style6{";
print "color: #336699;";
print "	font-family: Verdana, Arial;";
print "	font-weight: bold;";
print "}";	
print "-->";
print "</style>";
print "<html>";
print "<head>";
print "<title>$Titulo</title>";
print "<link rel='shortcut icon' href='imagens/favicon.ico'/>";
print "</head>";
print "<body>";
print "<style type=text/css>";
print "body { background-image: url($logo_sis);}";
print "<!--.cp {  font: bold 10px Arial; color: black}";
print "<!--.ti {  font: 9px Arial, Helvetica, sans-serif}";
print "<!--.ld { font: bold 15px Arial; color: #000000}";
print "<!--.ct { FONT: 9px 'Arial Narrow'; COLOR: #000033}";
print "<!--.cn { FONT: 9px Arial; COLOR: black }";
print "<!--.bc { font: bold 22px Arial; color: #000000 }";
print "-->";
print "</style>";	

print "</html>";

print "<div align=center>";
print "<br>";
print "<br>";
print "<br>";
print "<br>";
print "<br>";

print "<img src='imagens/stop.gif' width='98' height='98' align='center'>";


print "<table align='center'>";

print "<td align='center'>";
print "<font color='#336699' face=Verdana  size='4'>";
print "<b>Em desenvolvimento<br>Aguardem em breve estaremos disponibilizando um<br>novo sistemas</b>";
print "</font>";
print "</table>";

print "</td>";
print "</div>";


print "          <table border=0  align=center>";
print "          <tr align=center colspan=2>"; 

print "          <form method='POST' action='javascript:window.close()'>";
print "          <td><input type=image name='incluir' src='imagens/botaoazul24.PNG'></td>";
print "          </form>";

print "<SCRIPT LANGUAGE='JavaScript'>";
print "<!--";
print "function Sair()";
print "{";
print "windows.close();";
print "}";
print "//-->";
print "</script>";
?>