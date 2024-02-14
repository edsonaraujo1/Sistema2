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
$Cod_inicio  = $_SESSION['Inic'];

$id = $Cod_inicio;
	
$consulta = "SELECT * FROM oposicao3 ORDER BY id ASC LIMIT 0,1";
	
// Fim da Funчуo Navegar pelo registro

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id     		= @$row["id"];
$Edit1  		= @$row["COD"];
$Edit2  		= @$row["DAT2"];
$Edit3  		= @$row["DATINSC"];
$Edit4  		= @$row["RGASSOC"];
$Edit5  		= @$row["CPF"];
$Edit6  		= @$row["CODP"];
$Edit7  		= @$row["CATEGORIA"];
$Edit8  		= @$row["NOMEASSOC"];
$Edit9  		= @$row["ENDRESID"];
$Edit10 		= @$row["CEPRES"];
$Edit11 		= @$row["CODEDIF"];
$Edit12 		= @$row["CNPJ"];
$Edit13 		= @$row["ADMS"];
$Edit14 		= @$row["CNPJ2"];
$Edit15       	= @$row["OBS"];
$nome_do_edif 	= @$row["NOMEEDIF"];
$nome_da_adms 	= @$row["NOMEADMS"];

$menssagens = "* * * Visualizar * * *";

// Abrir tabela Senha

$tabela_1 = strtoupper('oposicao3');

$consulta3 = "SELECT * FROM permissoes WHERE login = '$nome3' and tabela = '$tabela_1'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];

// Abre Tabela Categoria

$consulta1  = "SELECT * FROM categ Where CODIGO = '$Edit7'";

$resultado1 = @mysql_query($consulta1);

$row1 = @mysql_fetch_array($resultado1);

$categ_1   = @$row1["DESCRICAO"];

// Abrir Table de Edificios

$consulta2  = "SELECT * FROM edificios Where COD = '$Edit11'";

$resultado2 = @mysql_query($consulta2);

$row2 = @mysql_fetch_array($resultado2);

$cod_edif   = @$row2["COD"];
$cond  = trim(@$row2["COND"].@$row2["NOME"]);
$edif  = trim(@$row2["Nome"]);

$nome_do_edif = $cond;

// Abrir tabela Administradora

$consulta3 = "SELECT * FROM adms WHERE cod = '$Edit13'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$nome1_adms  = @$row3["nome1"];
$nome2_adms  = @$row3["nomeadm"];

$nome_da_adms = $nome2_adms;
 
// Salva Secao
session_start();
$_SESSION['navega'] = $id;
$_SESSION['lista_soc'] = $Edit1;

include("layout.php");

?>