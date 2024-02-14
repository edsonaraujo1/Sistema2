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
$Cod_inicio  = $_SESSION['Inic'];

$id = $Cod_inicio;
	
$consulta = "SELECT * FROM clube_tiete ORDER BY id ASC LIMIT 0,1";
	
// Fim da Função Navegar pelo registro

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id      = @$row["id"];
$Edit1   = @$row["CODIGO"];    
$Edit2   = @$row["MATRICULA"]; 
$Edit3   = @$row["DATA"];  
$Edit4   = @$row["NOME"];  
$Edit5   = @$row["SEXO"];  
$Edit6   = @$row["DATNASC"];  
$Edit7   = @$row["NACION1"];  
$Edit8   = @$row["NATURA1"];  
$Edit9   = @$row["ESCOLA"];  
$Edit10  = @$row["CIVIL"];  
$Edit11  = @$row["ENDER"];  
$Edit12  = @$row["BAIRRO"];  
$Edit13  = @$row["CEP"];  
$Edit14  = @$row["CIDADE"];  
$Edit15  = @$row["UF"];  
$Edit16  = @$row["FONE"];  
$Edit17  = @$row["CEL"];  
$Edit18  = @$row["EMAIL"];  
$Edit19  = @$row["CPF"];  
$Edit20  = @$row["RG"];  
$Edit21  = @$row["ORG"];  
$Edit22  = @$row["OBS"];  
$Edit23  = @$row["LOG"]; 
$Edit24  = @$row["LETRA"];

$nome_adm  = @$row["CAMPO_ADM"];

$new_fot = trim($Edit1.$Edit24);

$menssagens = "* * * Visualizar * * *";

// Abrir tabela Senha

$tabela_1 = strtoupper('clube_tiete');

$consulta3 = "SELECT * FROM permissoes WHERE login = '$nome3' and tabela = '$tabela_1'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];

$consulta10 = "SELECT * FROM tb_quarta WHERE codp = '$new_fot'";
	
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
