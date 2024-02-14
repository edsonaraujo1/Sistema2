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

include("../config.php");

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

$consulta = "SELECT * FROM adms WHERE id = '$id' ORDER BY id ";
	
// Fim da Função Navegar pelo registro

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id			= @$row["id"];

if (empty($id)){

	$consulta = "SELECT * FROM adms WHERE id = 1 ORDER BY id ";
		
	// Fim da Função Navegar pelo registro
	
	$resultado = @mysql_query($consulta);
	
	$row = @mysql_fetch_array($resultado);
	
}	

$id     = @$row["id"];
$Edit1  = @$row["cod"];
$Edit2  = @$row["ativa"];
$Edit3  = @$row["data"];
$Edit4  = @$row["nome1"];
$Edit5  = @$row["nomeadm"];
$Edit6  = @$row["rua"];
$Edit7  = @$row["endadm"];
$Edit8  = @$row["numero"];
$Edit9  = @$row["cep"];
$Edit10 = @$row["bairroadm"];
$Edit11 = @$row["ufadm"]; 
$Edit12 = @$row["cgc"];
$Edit13 = @$row["fone"];
$Edit14 = @$row["nu_pred"];
$Edit15 = @$row["zona"];
$Edit16 = @$row["email"];
$Edit17 = @$row["t_mail"];
$Edit18 = @$row["obs"];

$menssagens = "* * * Visualizar * * *";

// Abrir tabela Senha

$tabela_1 = strtoupper('adms');

$consulta3 = "SELECT * FROM permissoes WHERE login = '$nome3' and tabela = '$tabela_1'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];

// Conta Nº de Socios 
$consulta4  = "SELECT * FROM edificios WHERE ADM = '$Edit1'";

$resultado4 = @mysql_query($consulta4);

while ($linha4 = mysql_fetch_array($resultado4))
{
  $cop = $cop + 1;

}

$Edit14 = $cop;

// Salva Secao
session_start();
$_SESSION['navega'] = $id;
$_SESSION['lista_soc'] = $Edit1;

include("layout.php");

?>
