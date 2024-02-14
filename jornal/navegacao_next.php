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
$Cod_Proximo  = $_SESSION['Prox'];

$id = $Cod_Proximo + 1;

?>

</script>

<!-- TinyMCE -->
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme_advanced_toolbar_location : "top",
		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE -->

<?php
$consulta = "SELECT * FROM noticias WHERE id = '$id' ORDER BY id ";
	
// Fim da Função Navegar pelo registro

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id1		= @$row["id"];

if (!empty($id1)){
	
$id         = @$row["id"];
$Edit1 		= @$row["codigo"];
$Edit2 	    = @$row["data"];
$Edit3   	= @$row["nome"];
$Edit4    	= @$row["texto"]; 
$Edit5      = @$row["categoria"];

}else{
	
$id2 = $id + 1;

$consulta = "SELECT * FROM noticias WHERE id = '$id2' ORDER BY id ";
	
// Fim da Função Navegar pelo registro

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id			= @$row["id"];

// Salva Secao
session_start();
$_SESSION['Prox'] = $id;

include("navegacao_next.php");
exit;
	
}

$menssagens = "* * * Visualizar * * *";

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

?>

<!-- TinyMCE -->
<script type="text/javascript" src="../jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme_advanced_toolbar_location : "top",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE -->

<?php
include("layout.php");

?>
