<?php
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Navegacao do Cadastro
 Criado em Data.....: 30/12/2008
 Ultima Atualiza��o : 30/12/2008

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

//// include("../logar.php");

//include("menu.php");

$nome3 = $_SESSION["nome_log"];

// Abre Conex�o com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// resgata Secao
session_start();
$Cod_Fim  = $_SESSION['Fim'];

$id = $Cod_Fim;

$consulta = "SELECT * FROM noticias ORDER BY id DESC LIMIT 0,1";
	
// Fim da Fun��o Navegar pelo registro

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id         = @$row["id"];
$Edit1 		= @$row["codigo"];
$Edit2 	    = @$row["data"];
$Edit3   	= @$row["nome"];
$Edit4    	= @$row["texto"]; 
$Edit5      = @$row["categoria"];

$nome_adm  = @$row["CAMPO_ADM"];

$menssagens = "* * * Visualizar * * *";

// Abrir tabela Senha

// Abrir tabela Senha

$tabela_1 = strtoupper('noticias');

$consulta3 = "SELECT * FROM permissoes WHERE login = '$nome3' and tabela = '$tabela_1'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];


// Salva Secao
session_start();
$_SESSION['navega'] = $id;
$_SESSION['lista_soc'] = $Edit1;

include("layout.php");

?>
