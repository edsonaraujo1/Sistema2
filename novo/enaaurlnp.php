<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Verifica Acesso nao Permitido em URL
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

// Abre Conexão com o MySql
include($path."conexao.php");
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
			</head>
			<body>
						
			<style type=text/css>
			
			
			<!--.cp {  font: bold 10px Arial; color: black}
			<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
			<!--.ld { font: bold 15px Arial; color: #000000}
			<!--.ct { FONT: 9px 'Arial Narrow'; COLOR: #000033}
			<!--.cn { FONT: 9px Arial; COLOR: black }
			<!--.bc { font: bold 22px Arial; color: #000000 }
			--></style> 
			
			</HEAD>
			<BODY text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0 leftmargin=0 bottommargin=0 bgcolor='#CDCDC1' background='$logo_sis'>
			</html>
			
			<br><br><br><br>
				
			<div align=center>
			
			<table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='<?=$color_bor;?>'>
			<tr>
			<td align=center>
			     <font face=arial><b>*** ERRO ACESSO NÃO PERMITIDO PARA USUARIO !!! ***<br>
				                     esse acesso gerou um log para o Administrador  <br>
									 TENTATIVA DE INVASÃO</b>
			<table align=center>
			<form method='POST' action='javascript:window.close()'>
			<td><input type=image name='voltar' src='imagens/botao_voltar.PNG'></td>
			</form></p>
			</table>
			</td>
			</tr>
			</table>
			</div>
";

?>