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

$nome3 = $_SESSION["nome_log"];

// Abre Conexуo com o MySql
include($path."conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// resgata Secao
session_start();
$Cod_Proximo  = $_SESSION['Prox'];

$id = $Cod_Proximo + 1;

$consulta = "SELECT * FROM oposicao3 WHERE id = '$id' ORDER BY id ";
	
// Fim da Funчуo Navegar pelo registro

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id1		= @$row["id"];

if (!empty($id1)){
	
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

}else{
	
$id2 = $id + 1;

$consulta = "SELECT * FROM oposicao3 WHERE id = '$id2' ORDER BY id ";
	
// Fim da Funчуo Navegar pelo registro

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id			= @$row["id"];

// Salva Secao
session_start();
$_SESSION['Prox'] = $id;

require("navegacao_next.php");
exit;
	
}

$menssagens = "* * * Visualizar * * *";

// Abrir tabela Senha

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$opo1       = @$row3["opo1"];
$opo2       = @$row3["opo2"];
$opo3       = @$row3["opo3"];

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

require("layout.php");

?>