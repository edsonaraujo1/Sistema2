<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Verifica Acesso nao Permitido em URL
 Criado em Data.....: 07/12/2007
 Ultima Atualiza��o : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
@session_start();

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

//include("index.php");

// Resgata a Sessao
@session_start();
$_SESSION['Path1'] = ' ';
$path = '';

//include("config.php");


//include("index.php");

// Abre Conex�o com o MySql
include("conexao.php");
// Chama o Banco de Dados
$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// Atualiza arquivo Log
$data_log = date("d/m/Y");
$hora_log = date("H:i:s"); 
$even_log = "ACESSO NEGADO";
			
$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
                 VALUES
                 ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
@mysql_query($consulta_log, $link);


echo "

            <html>
			<head>
			<title>ERRO AO CONECTAR</title>
            <link rel='shortcut icon' href='imagens/favicon.ico'/>
			</head>
			<body>
						
			<style type=text/css>
			
			body { background-image: url('$logo_sis');
                   background-attachment: fixed }
			
			<!--.cp {  font: bold 10px Arial; color: black}
			<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
			<!--.ld { font: bold 15px Arial; color: #000000}
			<!--.ct { FONT: 9px 'Arial Narrow'; COLOR: #000033}
			<!--.cn { FONT: 9px Arial; COLOR: black }
			<!--.bc { font: bold 22px Arial; color: #000000 }
			--></style> 
			
			</HEAD>
			

			</html>
			
			<br><br><br><br>
				
			<div align=center>
			
			<table align=center border='15' bgcolor='#FFF8DC'  bordercolor ='$color_bor'>
			<tr>
			<td align=center>
			     <font face=arial><b>*** <font color = #FF0000> ERRO ACESSO N�O PERMITIDO !!!</font> ***<br>
				                     
									 Usu�rio sem Permiss�o</b>
			<table align=center>
			<form method='POST' action='javascript:history.back(2)'>
			<td><input type=image name='voltar' src='imagens/botao_voltar.PNG'></td>
			</form>  
			</table>
			</td>
			</tr>
			</table>
			</div>
";

?>