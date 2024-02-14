<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Navegacao do Cadastro
 Criado em Data.....: 30/12/2008
 Ultima Atualizaчуo : 30/12/2008

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

//include("../logar.php");

//include("menu.php");

$nome3 = $_SESSION["nome_log"];

// Abre Conexуo com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// resgata Secao
session_start();
$Cod_Fim  = $_SESSION['Fim'];

$id = $Cod_Fim;

$consulta = "SELECT * FROM recebimentos ORDER BY id DESC LIMIT 0,1";
	
// Fim da Funчуo Navegar pelo registro

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id      = @$row["id"];
$Edit1   = @$row["codigo"];
$Edit2   = @$row["valor"];
$Edit3   = @$row["fornecedor"];
$Edit4   = @$row["produto"];
$Edit5   = @$row["tipo_pagto"];
$Edit6   = @$row["data_cheq"];
$Edit7   = @$row["data_pagto"];
$Edit8   = @$row["obs"];

$menssagens = "* * * Visualizar * * *";

// Abrir tabela Senha

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$aco1       = @$row3["aco1"];
$aco2       = @$row3["aco2"];
$aco3       = @$row3["aco3"];

// Salva Secao
session_start();
$_SESSION['navega'] = $id;
$_SESSION['lista_soc'] = $Edit1;

include("layout.php");

?>