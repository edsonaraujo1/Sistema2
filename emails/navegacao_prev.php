<?php
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Navegacao do Cadastro
 Criado em Data.....: 30/12/2008
 Ultima Atualização : 30/12/2008

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

//// include("../logar.php");

//include("menu.php");

$nome3 = $_SESSION["nome_log"];

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// resgata Secao
session_start();
$Cod_Anterior  = $_SESSION['Ante'];

$id = $Cod_Anterior - 1;

$consulta = "SELECT * FROM email_boletim WHERE id = '$id' ORDER BY id ";
	
// Fim da Função Navegar pelo registro

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id			= @$row["id"];

if (empty($id)){

	$consulta = "SELECT * FROM email_boletim WHERE id = 1 ORDER BY id ";
		
	// Fim da Função Navegar pelo registro
	
	$resultado = @mysql_query($consulta);
	
	$row = @mysql_fetch_array($resultado);
	
}	

$id         = @$row["id"];
$Edit1 		= @$row["id"];
$Edit2   	= @$row["nome"];
$Edit3   	= @$row["email"];
$Edit4 		= @$row["categoria"]; 
$Edit5	    = @$row["enviado"];
$Edit6 		= @$row["data_envi"];
$Edit7     	= @$row["historico"];

$menssagens = "* * * Visualizar * * *";

// Abrir tabela Senha

$tabela_1 = strtoupper('email_boletim');

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
