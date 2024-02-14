<?
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

//include("../logar.php");

//include("menu.php");

$nome3 = $_SESSION["nome_log"];

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// resgata Secao
session_start();
$Cod_Fim  = $_SESSION['Fim'];

$id = $Cod_Fim;

$consulta = "SELECT * FROM aposentados ORDER BY id DESC LIMIT 0,1";
	
// Fim da Função Navegar pelo registro

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id      = @$row["id"];
$Edit1   = @$row["CODIGO"];
$Edit2   = @$row["NOME"];
$Edit3   = @$row["CPF"];
$Edit4   = @$row["RG"];
$Edit5   = @$row["OAB"];
$Edit6   = @$row["FONE"];
$Edit7   = @$row["CELULAR"];
$Edit8   = @$row["EMAIL"];
$Edit9   = @$row["ENDER"];
$Edit10  = @$row["BAIRRO"];
$Edit11  = @$row["ESTADO"];
$Edit12  = @$row["CEP"];
$Edit13  = @$row["OBS"];
$Edit14  = @$row["FOTO"];

$nome_adm  = @$row["CAMPO_ADM"];

$menssagens = "* * * Visualizar * * *";

// Abrir tabela Senha

// Abrir tabela Senha

$tabela_1 = strtoupper('aposentados');

$consulta3 = "SELECT * FROM permissoes WHERE login = '$nome3' and tabela = '$tabela_1'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];

$consulta10 = "SELECT * FROM tb_terceira WHERE codp = '$Edit1'";
	
$resultado10 = @mysql_query($consulta10);

$row10 = @mysql_fetch_array($resultado10);

$id_9 	   = @$row10["cod_foto"];
$id_imagem = @$row10["id_imagem"];

if(!empty($id_imagem)){
	
   $mostra_branco = "faz";	
}else{
   $mostra_branco = "nao";	
	
}	

// Salva Secao
session_start();
$_SESSION['navega'] = $id;
$_SESSION['lista_soc'] = $Edit1;

include("layout.php");

?>
