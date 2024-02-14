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
$Cod_inicio  = $_SESSION['Inic'];

$id = $Cod_inicio;
	
$consulta = "SELECT * FROM edificios ORDER BY id ASC LIMIT 0,1";
	
// Fim da Funчуo Navegar pelo registro

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id      = @$row["id"];
$Edit1   = @$row["COD"];
$Edit2   = @$row["ATIV"];
$Edit3   = @$row["DATA"];
$Edit4   = @$row["COND"];
$Edit5   = @$row["NOME"];
$Edit6   = @$row["RUA"];
$Edit7   = @$row["ENDERECO"];
$Edit8   = @$row["NUMERO"];
$Edit9   = @$row["CEP"];
$Edit10  = @$row["BAIRRO"];
$Edit11  = @$row["UF"]; 
$Edit12  = @$row["CGC"];
$Edit13  = @$row["FONE"];
$Edit14  = @$row["NU_EMP"];
$Edit15  = @$row["TIPOIMOV"];
$Edit16  = @$row["ZONA"];
$Edit17  = @$row["EMAIL"];
$Edit18  = @$row["T_MAIL"];
$Edit19  = @$row["ADM"];
$Edit20  = @$row["OBS"];

$nome_adm  = @$row["CAMPO_ADM"];

$menssagens = "* * * Visualizar * * *";

// Abrir tabela Senha

$tabela_1 = strtoupper('edificios');

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

// Conta NК de Socios 
$consulta4  = "SELECT * FROM socios WHERE CODEDIF = '$Edit1'";

$resultado4 = @mysql_query($consulta4);

while ($linha4 = @mysql_fetch_array($resultado4))
{
  $cop = $cop + 1;

}

$Edit14 = $cop;

// Salva Secao
@session_start();
$_SESSION['navega'] = $id;
$_SESSION['lista_soc'] = $Edit1;

include("layout.php");

?>