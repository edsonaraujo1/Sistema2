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


$data       = "01/2012";

// -------------- Inicio
$link_consu = "/Web/aposentados/aposentados.php";

$consulta1  = "SELECT * FROM log_visita2 WHERE ARQUIVO = '$link_consu' AND SUBSTRING(DATA,4,7) = '$data'";
	
$resultado1 = @mysql_query($consulta1);

$row1 = @mysql_fetch_array($resultado1);

$qtd_ivisita1 = @mysql_num_rows($resultado1);


echo "Aposentados ".$qtd_ivisita1."<br>";
//----------------- Fim

// -------------- Inicio

$link_consu = "/Web/convencoes/convencoes.php";

$consulta1  = "SELECT * FROM log_visita2 WHERE ARQUIVO = '$link_consu' AND SUBSTRING(DATA,4,7) = '$data'";
	
$resultado1 = @mysql_query($consulta1);

$row1 = @mysql_fetch_array($resultado1);

$qtd_ivisita2 = @mysql_num_rows($resultado1);


echo "Convencoes ".$qtd_ivisita2."<br>";
//----------------- Fim


// -------------- Inicio

$link_consu = "/Web/juridico/juridico.php";

$consulta1  = "SELECT * FROM log_visita2 WHERE ARQUIVO = '$link_consu' AND SUBSTRING(DATA,4,7) = '$data'";
	
$resultado1 = @mysql_query($consulta1);

$row1 = @mysql_fetch_array($resultado1);

$qtd_ivisita3 = @mysql_num_rows($resultado1);


echo "juridico ".$qtd_ivisita3."<br>";
//----------------- Fim

// -------------- Inicio

$link_consu = "/Web/saude/saude.php";

$consulta1  = "SELECT * FROM log_visita2 WHERE ARQUIVO = '$link_consu' AND SUBSTRING(DATA,4,7) = '$data'";
	
$resultado1 = @mysql_query($consulta1);

$row1 = @mysql_fetch_array($resultado1);

$qtd_ivisita4 = @mysql_num_rows($resultado1);


echo "Saude ".$qtd_ivisita4."<br>";
//----------------- Fim

// -------------- Inicio

$link_consu = "/Web/odonto/odonto.php";

$consulta1  = "SELECT * FROM log_visita2 WHERE ARQUIVO = '$link_consu' AND SUBSTRING(DATA,4,7) = '$data'";
	
$resultado1 = @mysql_query($consulta1);

$row1 = @mysql_fetch_array($resultado1);

$qtd_ivisita5 = @mysql_num_rows($resultado1);


echo "Odonto ".$qtd_ivisita5."<br>";
//----------------- Fim

// -------------- Inicio

$link_consu = "/Web/servicos/servicos.php";

$consulta1  = "SELECT * FROM log_visita2 WHERE ARQUIVO = '$link_consu' AND SUBSTRING(DATA,4,7) = '$data'";
	
$resultado1 = @mysql_query($consulta1);

$row1 = @mysql_fetch_array($resultado1);

$qtd_ivisita6 = @mysql_num_rows($resultado1);


echo "Servicos ".$qtd_ivisita6."<br>";
//----------------- Fim

// -------------- Inicio

$link_consu = "/Web/boletos/boletos.php";

$consulta1  = "SELECT * FROM log_visita2 WHERE ARQUIVO = '$link_consu' AND SUBSTRING(DATA,4,7) = '$data'";
	
$resultado1 = @mysql_query($consulta1);

$row1 = @mysql_fetch_array($resultado1);

$qtd_ivisita7 = @mysql_num_rows($resultado1);


echo "Boletos ".$qtd_ivisita7."<br>";
//----------------- Fim

// -------------- Inicio

$link_consu = "/Web/links/links.php";

$consulta1  = "SELECT * FROM log_visita2 WHERE ARQUIVO = '$link_consu' AND SUBSTRING(DATA,4,7) = '$data'";
	
$resultado1 = @mysql_query($consulta1);

$row1 = @mysql_fetch_array($resultado1);

$qtd_ivisita8 = @mysql_num_rows($resultado1);


echo "Links ".$qtd_ivisita8."<br>";
//----------------- Fim

// -------------- Inicio

$link_consu = "/Web/cursos/cursos.php";

$consulta1  = "SELECT * FROM log_visita2 WHERE ARQUIVO = '$link_consu' AND SUBSTRING(DATA,4,7) = '$data'";
	
$resultado1 = @mysql_query($consulta1);

$row1 = @mysql_fetch_array($resultado1);

$qtd_ivisita9 = @mysql_num_rows($resultado1);


echo "Cursos ".$qtd_ivisita9."<br>";
//----------------- Fim

// -------------- Inicio

$link_consu = "/Web/lazer/lazer.php";

$consulta1  = "SELECT * FROM log_visita2 WHERE ARQUIVO = '$link_consu' AND SUBSTRING(DATA,4,7) = '$data'";
	
$resultado1 = @mysql_query($consulta1);

$row1 = @mysql_fetch_array($resultado1);

$qtd_ivisita10 = @mysql_num_rows($resultado1);


echo "Lazer ".$qtd_ivisita10."<br>";
//----------------- Fim

// -------------- Inicio

$link_consu = "/Web/subsede/subsede.php";

$consulta1  = "SELECT * FROM log_visita2 WHERE ARQUIVO = '$link_consu' AND SUBSTRING(DATA,4,7) = '$data'";
	
$resultado1 = @mysql_query($consulta1);

$row1 = @mysql_fetch_array($resultado1);

$qtd_ivisita11 = @mysql_num_rows($resultado1);


echo "Subsedes ".$qtd_ivisita11."<br>";
//----------------- Fim

// -------------- Inicio

$link_consu = "/Web/filie_se/filie_se.php";

$consulta1  = "SELECT * FROM log_visita2 WHERE ARQUIVO = '$link_consu' AND SUBSTRING(DATA,4,7) = '$data'";
	
$resultado1 = @mysql_query($consulta1);

$row1 = @mysql_fetch_array($resultado1);

$qtd_ivisita12 = @mysql_num_rows($resultado1);


echo "Filie-se ".$qtd_ivisita12."<br>";
//----------------- Fim

// -------------- Inicio

$link_consu = "/Web/pisos/pisos.php";

$consulta1  = "SELECT * FROM log_visita2 WHERE ARQUIVO = '$link_consu' AND SUBSTRING(DATA,4,7) = '$data'";
	
$resultado1 = @mysql_query($consulta1);

$row1 = @mysql_fetch_array($resultado1);

$qtd_ivisita13 = @mysql_num_rows($resultado1);


echo "Pisos ".$qtd_ivisita13."<br>";
//----------------- Fim

// -------------- Inicio

$link_consu = "/Web/forum/forum.php";

$consulta1  = "SELECT * FROM log_visita2 WHERE ARQUIVO = '$link_consu' AND SUBSTRING(DATA,4,7) = '$data'";
	
$resultado1 = @mysql_query($consulta1);

$row1 = @mysql_fetch_array($resultado1);

$qtd_ivisita14 = @mysql_num_rows($resultado1);


echo "Forum ".$qtd_ivisita14."<br>";
//----------------- Fim

// -------------- Inicio

$link_consu = "/Web/presidente/layout.php";

$consulta1  = "SELECT * FROM log_visita2 WHERE ARQUIVO = '$link_consu' AND SUBSTRING(DATA,4,7) = '$data'";
	
$resultado1 = @mysql_query($consulta1);

$row1 = @mysql_fetch_array($resultado1);

$qtd_ivisita15 = @mysql_num_rows($resultado1);


echo "Palavra do Presidente ".$qtd_ivisita15."<br>";
//----------------- Fim

// -------------- Inicio

$link_consu = "/Web/noticias/noticias.php";

$consulta1  = "SELECT * FROM log_visita2 WHERE ARQUIVO = '$link_consu' AND SUBSTRING(DATA,4,7) = '$data'";
	
$resultado1 = @mysql_query($consulta1);

$row1 = @mysql_fetch_array($resultado1);

$qtd_ivisita16 = @mysql_num_rows($resultado1);


echo "Noticias ".$qtd_ivisita16."<br>";
//----------------- Fim

// -------------- Inicio

$link_consu = "/Web/jornal/jornal.php";

$consulta1  = "SELECT * FROM log_visita2 WHERE ARQUIVO = '$link_consu' AND SUBSTRING(DATA,4,7) = '$data'";
	
$resultado1 = @mysql_query($consulta1);

$row1 = @mysql_fetch_array($resultado1);

$qtd_ivisita17 = @mysql_num_rows($resultado1);


echo "Jornal ".$qtd_ivisita17."<br>";
//----------------- Fim

// -------------- Inicio

$link_consu = "/Web/fale/fale.php";

$consulta1  = "SELECT * FROM log_visita2 WHERE ARQUIVO = '$link_consu' AND SUBSTRING(DATA,4,7) = '$data'";
	
$resultado1 = @mysql_query($consulta1);

$row1 = @mysql_fetch_array($resultado1);

$qtd_ivisita18 = @mysql_num_rows($resultado1);


echo "Fale conosco ".$qtd_ivisita18."<br>";
//----------------- Fim

// -------------- Inicio

$link_consu = "/Web/enderecos/enderecos.php";

$consulta1  = "SELECT * FROM log_visita2 WHERE ARQUIVO = '$link_consu' AND SUBSTRING(DATA,4,7) = '$data'";
	
$resultado1 = @mysql_query($consulta1);

$row1 = @mysql_fetch_array($resultado1);

$qtd_ivisita19 = @mysql_num_rows($resultado1);


echo "Enderecos ".$qtd_ivisita19."<br>";
//----------------- Fim

// -------------- Inicio

$link_consu = "/Web/boletim/boletim.php";

$consulta1  = "SELECT * FROM log_visita2 WHERE ARQUIVO = '$link_consu' AND SUBSTRING(DATA,4,7) = '$data'";
	
$resultado1 = @mysql_query($consulta1);

$row1 = @mysql_fetch_array($resultado1);

$qtd_ivisita20 = @mysql_num_rows($resultado1);


echo "Boletim ".$qtd_ivisita20."<br>";
//----------------- Fim

// -------------- Inicio

$link_consu = "/Web/agenda/agenda.php";

$consulta1  = "SELECT * FROM log_visita2 WHERE ARQUIVO = '$link_consu' AND SUBSTRING(DATA,4,7) = '$data'";
	
$resultado1 = @mysql_query($consulta1);

$row1 = @mysql_fetch_array($resultado1);

$qtd_ivisita21 = @mysql_num_rows($resultado1);


echo "Agenda Homologacao ".$qtd_ivisita21."<br>";
//----------------- Fim

// -------------- Inicio

$link_consu = "/Web/buscar/buscar.php";

$consulta1  = "SELECT * FROM log_visita2 WHERE ARQUIVO = '$link_consu' AND SUBSTRING(DATA,4,7) = '$data'";
	
$resultado1 = @mysql_query($consulta1);

$row1 = @mysql_fetch_array($resultado1);

$qtd_ivisita22 = @mysql_num_rows($resultado1);


echo "Busca no site ".$qtd_ivisita22."<br>";
//----------------- Fim

// -------------- Inicio

$link_consu = "/Web/historia/historia.php";

$consulta1  = "SELECT * FROM log_visita2 WHERE ARQUIVO = '$link_consu' AND SUBSTRING(DATA,4,7) = '$data'";
	
$resultado1 = @mysql_query($consulta1);

$row1 = @mysql_fetch_array($resultado1);

$qtd_ivisita23 = @mysql_num_rows($resultado1);


echo "Historia ".$qtd_ivisita23."<br>";
//----------------- Fim

// -------------- Inicio

$link_consu = "/Web/players/players.php";

$consulta1  = "SELECT * FROM log_visita2 WHERE ARQUIVO = '$link_consu' AND SUBSTRING(DATA,4,7) = '$data'";
	
$resultado1 = @mysql_query($consulta1);

$row1 = @mysql_fetch_array($resultado1);

$qtd_ivisita24 = @mysql_num_rows($resultado1);


echo "Radio ".$qtd_ivisita24."<br>";
//----------------- Fim

// -------------- Inicio

$link_consu = "/Web/enviar_boletim/enviar1.php";

$consulta1  = "SELECT * FROM log_visita2 WHERE ARQUIVO = '$link_consu' AND SUBSTRING(DATA,4,7) = '$data'";
	
$resultado1 = @mysql_query($consulta1);

$row1 = @mysql_fetch_array($resultado1);

$qtd_ivisita24 = @mysql_num_rows($resultado1);


echo "Cadastro de Boletim ".$qtd_ivisita24."<br>";
//----------------- Fim


// -------------- Inicio

$link_consu = "/Web/index.php";

$consulta1  = "SELECT * FROM log_visita2 WHERE ARQUIVO = '$link_consu' AND SUBSTRING(DATA,4,7) = '$data'";
	
$resultado1 = @mysql_query($consulta1);

$row1 = @mysql_fetch_array($resultado1);

$qtd_ivisita25 = @mysql_num_rows($resultado1);


echo "Entraram na Pagina ".$qtd_ivisita25."<br>";
//----------------- Fim

// -------------- Inicio

$link_consu = "/Web/ler.php";

$consulta1  = "SELECT * FROM log_visita2 WHERE ARQUIVO = '$link_consu' AND SUBSTRING(DATA,4,7) = '$data'";
	
$resultado1 = @mysql_query($consulta1);

$row1 = @mysql_fetch_array($resultado1);

$qtd_ivisita26 = @mysql_num_rows($resultado1);


echo "Ler noticias ".$qtd_ivisita26."<br>";
//----------------- Fim



//SELECT * FROM log_visita2 WHERE ARQUIVO = '/Web/convencoes/convencoes.php'  AND SUBSTRING(DATA,4,7) = '12/2011'

echo "<br><br>";
$total_vi = $qtd_ivisita1  + $qtd_ivisita11 + $qtd_ivisita21 +
            $qtd_ivisita2  + $qtd_ivisita12 + $qtd_ivisita22 +
            $qtd_ivisita3  + $qtd_ivisita13 + $qtd_ivisita23 +
            $qtd_ivisita4  + $qtd_ivisita14 + $qtd_ivisita24 +
            $qtd_ivisita5  + $qtd_ivisita15 + $qtd_ivisita25 +
            $qtd_ivisita6  + $qtd_ivisita16 + $qtd_ivisita26 + 
            $qtd_ivisita7  + $qtd_ivisita17 +  
            $qtd_ivisita8  + $qtd_ivisita18 +  
            $qtd_ivisita9  + $qtd_ivisita19 +  
            $qtd_ivisita10 + $qtd_ivisita20;

echo "Total de Visitas ".$total_vi;
?>