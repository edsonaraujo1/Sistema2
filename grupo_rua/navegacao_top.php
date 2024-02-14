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

$nome3 = strtoupper($_SESSION["nome_log"]);

// Abre Conexуo com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// resgata Secao
session_start();
$Cod_inicio  = $_SESSION['Inic'];

$nome3_list = strtolower(trim("lista_".$nome3));

$id = $Cod_inicio;
	
$consulta = "SELECT * FROM $nome3_list ORDER BY id ASC LIMIT 0,1";	
// Fim da Funчуo Navegar pelo registro

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id      = @$row["id"];
$Edit0   = @$row["codigo"];
$Edit1   = @$row["nome"];
$Edit2   = @$row["rua"];
$Edit3   = @$row["endereco"];
$Edit4   = @$row["numero"];
$Edit5   = @$row["bairro"];
$Edit6   = @$row["cep"];
$Edit7   = @$row["uf"];
$Edit8   = @$row["funcao"];
$Edit9   = @$row["condominio"];
$Edit10  = @$row["obs"];

// Conta NК de Socios 
$consulta4  = "SELECT * FROM $nome3_list";

$resultado4 = @mysql_query($consulta4);

while ($linha4 = mysql_fetch_array($resultado4))
{
  $cop = $cop + 1;

}

$Edit11 = $cop;

$menssagens = "* * * Visualizar * * *";

// Abrir tabela Senha

$tabela_1 = strtoupper($nome3_list);

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