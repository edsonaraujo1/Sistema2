<?php
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Navegacao do Cadastro
 Criado em Data.....: 30/12/2008
 Ultima Atualiza��o : 30/12/2008

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

$nome3 = $_SESSION["nome_log"];

include("../config.php");

// Abre Conex�o com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// resgata Secao
session_start();
$Cod_Proximo  = $_SESSION['Prox'];

$id = $Cod_Proximo + 1;

$consulta = "SELECT * FROM acompa WHERE id = '$id' ORDER BY id ";
	
// Fim da Fun��o Navegar pelo registro

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id1		= @$row["id"];

if (!empty($id1)){
	
$id     = @$row["id"];
$Edit1  = @$row["N_SOCIO"];
$Edit2  = @$row["RG"];
$Edit3  = @$row["CIC"];
$Edit4  = @$row["CART_TRAB"];
$Edit5  = @$row["NOME_SOC"];
$Edit6  = @$row["END_SOC"];
$Edit7  = @$row["CEP_SOC"];
$Edit8  = @$row["EST_SOC"];
$Edit9  = @$row["FONE_SOC"];
$Edit10 = @$row["N_EDIFI"];
$Edit11 = @$row["NOME_EDI"];
$Edit12 = @$row["END_EDI"];
$Edit13 = @$row["CEP_EDI"];
$Edit14 = @$row["FONE_EDI"];
$Edit15 = @$row["OBJETO"];
$Edit16 = @$row["JCJ"];
$Edit17 = @$row["PROC_N"];
$Edit18 = @$row["ANO_N"];
$Edit19 = @$row["N_ADV_1"];
$Edit20 = @$row["TRT"];
$Edit21 = @$row["EM_TRT"];
$Edit22 = @$row["NO_AD_1"];
$Edit23 = @$row["TST"];
$Edit24 = @$row["EM_TST"];
$Edit25 = @$row["N_Adv_2"];
$Edit26 = @$row["SOLUCAO"];
$Edit27 = @$row["SOL_EM"];
$Edit28 = @$row["NO_AD_2"];
$Edit29 = @$row["ASSUNTO"]." ".@$row["ASSU_1"];
$Edit30 = @$row["ASSU_1"];

$nome_adm  = @$row["CAMPO_ADM"];

}else{
	
$id2 = $id + 1;

$consulta = "SELECT * FROM acompa WHERE id = '$id2' ORDER BY id ";
	
// Fim da Fun��o Navegar pelo registro

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

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$aco1       = @$row3["aco1"];
$aco2       = @$row3["aco2"];
$aco3       = @$row3["aco3"];


// Salva Secao
session_start();
$_SESSION['navega'] = $id;
$_SESSION['lista_soc'] = $Edit1;
$_SESSION['id_RG']     = $Edit2;
$_SESSION['id_PROC']   = $Edit17;

include("botoes.php");
include("layout.php");

?>
