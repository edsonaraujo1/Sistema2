<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Procura CEP na Inclusao Socios
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

require($path."logar.php");
$nome3 = $_SESSION["nome_log"];

// Abre Conexão com o MySql
include($path."conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass)
        or

die("
     <br>
     <br>
     
	 <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='#4682B4'>
     <tr>
     <td>
     <font face=arial><b>*** Não foi possivel conectar !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

@mysql_select_db($db)
        or

die("
     <br>
     <br>
     
	 <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='#4682B4'>
     <tr>
     <td>
     <font face=arial><b>*** Não Foi possivel selecionar o banco de dados !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");


/*
  -----------------------------
  Rotina Consulta CEP Mostrando
  Logradouro, Cidade e Bairro
  -----------------------------
*/

// Abrir tabela Ruas

$consulta  = "SELECT * FROM ruas WHERE CEP = '$Cep_2x'";

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$cep_2    = @$row["CEP"];

if (!empty($cep_2)){

$rua_2    = @$row["RUA"];
$cep_2    = @$row["CEP"];
$proc_log = @$row["CODLOG"];
$proc_bai = @$row["CODBAI"];
$compl_3  = @$row["COMPL"];
if (substr($compl_3,0,1) == ",")
{
	$compl_1 = $compl_3; 
}

// Abrir tabela Logradou

$consulta2  = "SELECT * FROM logradou WHERE CODLOG = '$proc_log'";

$resultado2 = @mysql_query($consulta2);

$row2 = @mysql_fetch_array($resultado2);

$Logra_2  = @$row2["LOGRADOURO"];

// Abrir tabela Bairro

$consulta3  = "SELECT * FROM bairros WHERE CODBAI = '$proc_bai'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$Bairro_3  = @$row3["EXTENSO"];
$proc_cida = substr($proc_bai,0,6);

// Abrir tabela Cidades

$consulta4  = "SELECT * FROM cidades WHERE CODCID = '$proc_cida'";

$resultado4 = @mysql_query($consulta4);

$row4 = @mysql_fetch_array($resultado4);

$Uf_2     = @$row4["UF"];
$Cidade_2 = @$row4["CIDADE"];

$rua       = $Logra_2;
$endresid  = $rua_2;
$numero    = $compl_1;
$bairrores = $Bairro_3;
$cidaderes = $Cidade_2;
$cepres    = $cep_2;
$estadores = $Uf_2;

$Rua_2     = $Logra_2;
$End_2     = $rua_2;
$Nume_2    = $compl_1;
$Bai_2     = $Bairro_3;
$Cid_2     = $Cidade_2;
$Cep_1     = $cep_2;
$Est_2     = $Uf_2;

//$Edit12		= $Rua_2;
//$Edit13		= $End_2;
//$Edit14		= $Nume_2;
//$Edit15		= $Bai_2;
//$Edit16		= $Cep_1;
//$Edit17		= $Cid_2;
//$Edit18		= $Est_2;

}
// ---- Fim Rotina Cache

require("menu.php");
require("soclayout2.php");


?>