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
@session_start();
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
@session_start();
$Cod_Anterior  = $_SESSION['Ante'];

$id = $Cod_Anterior - 1;

$consulta = "SELECT * FROM vaga WHERE id = '$id' ORDER BY id ";
	
// Fim da Funчуo Navegar pelo registro

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id			= @$row["id"];

if (empty($id)){

	$consulta = "SELECT * FROM vaga WHERE id = 1 ORDER BY id ";
		
	// Fim da Funчуo Navegar pelo registro
	
	$resultado = @mysql_query($consulta);
	
	$row = @mysql_fetch_array($resultado);
	
}	

$id     = @$row["id"];
$Edit1  = @$row["COD"];
$Edit2  = @$row["SITU"];
$Edit3  = @$row["DATA"];
$Edit4  = @$row["FUNCAO"];
$Edit5  = @$row["QTD"];
$Edit6  = @$row["ENCA"];
$Edit7  = @$row["NOME"];
$Edit8  = @$row["ENDERECO"];
$Edit9  = @$row["BAIRRO"];
$Edit10 = @$row["CIDADE"];
$Edit11 = @$row["ESTADO"]; 
$Edit12 = @$row["CEP"];
$Edit13 = @$row["TELEFONE"];
$Edit14 = @$row["CONTATO"];
$Edit15 = @$row["OBS"];
$Edit16 = @$row["IDADE"];

$nome_adm  = @$row["CAMPO_ADM"];

$menssagens = "* * * Visualizar * * *";

// Abrir tabela Senha

$tabela_1 = strtoupper('vaga');

$consulta3 = "SELECT * FROM permissoes WHERE login = '$nome3' and tabela = '$tabela_1'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];

// Abrir tabela Administradora

$consulta2 = "SELECT * FROM Adms Where cod = $Edit19";

$resultado2 = @mysql_query($consulta2);

$row2 = @mysql_fetch_array($resultado2);

$cod_adm      = @$row2["cod"];
$nome_adm     = @$row2["nomeadm"];



// Salva Secao
@session_start();
$_SESSION['navega'] = $id;
$_SESSION['lista_soc'] = $Edit1;

include("layout.php");

?>