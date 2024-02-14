<?
/*
 -------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Verifica Acesso da URL do Sistema
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 -------------------------------------------
*/

/*
  ----------------------------------------
  Função para Verificar Senha e Nome do
  usuario na entrada do Sistema
  ----------------------------------------

*/


Function acesso_url($prog){

$nome3 = $_SESSION["nome_log"];

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../conexao.php");

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

$consulta1 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado1 = @mysql_query($consulta1);

$row1 = @mysql_fetch_array($resultado1);

$edi1       = @$row1["edi1"];
$edi2       = @$row1["edi2"];
$edi3       = @$row1["edi3"];

$soc1       = @$row1["soc1"];
$soc2       = @$row1["soc2"];
$soc3       = @$row1["soc3"];

$adm1       = @$row1["adm1"];
$adm2       = @$row1["adm2"];
$adm3       = @$row1["adm3"];

$opo1       = @$row1["opo1"];
$opo2       = @$row1["opo2"];
$opo3       = @$row1["opo3"];

$program    = @$row1["programas"];
$string     = $program;
$array      = explode(',', $string);

for ($si = 0; $si < strlen($program); $si++)
{
    $linha = $Campo."$si";
    $open_2 = "NAO";
    
    if ($array[$si] == $prog)
    {
       $open_2 = "SIM";
       break;
    }
}

return($open_2);

}

?>