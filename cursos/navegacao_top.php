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
$Cod_inicio  = $_SESSION['Inic'];

$id = $Cod_inicio;
	
$consulta = "SELECT * FROM cursos ORDER BY id ASC LIMIT 0,1";
	
// Fim da Função Navegar pelo registro

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id     = @$row["id"];
$Edit1  = @$row["CODP"];
$Edit2  = @$row["DATINI"];
$Edit3  = @$row["DATTER"];
$Edit4  = @$row["CURSOS_1"];
$Edit5  = @$row["RG"];
$Edit6  = @$row["PERI"];
$Edit7  = @$row["CPF"];
$Edit8  = @$row["NOME"];
$Edit9  = @$row["OCUPA"];
$Edit10 = @$row["DATNASC"];
$Edit11 = @$row["CIVIL"];
$Edit12 = @$row["NACIONAL"];
$Edit13 = @$row["SEXO"];
$Edit14 = @$row["DATA"];
$Edit15 = @$row["ENDERECO"];
$Edit16 = @$row["CEP"];
$Edit17 = @$row["BAIRRO"];
$Edit18 = @$row["FONE"];
$Edit19 = @$row["ESCOLA"];
$Edit20 = @$row["TECNICO"];
$Edit21 = @$row["OBS"];

$menssagens = "* * * Visualizar * * *";

// Abrir tabela Senha

$tabela_1 = strtoupper('cursos');

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
