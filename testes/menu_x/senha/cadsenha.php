<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Cadastro de Senha Permissão
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

$nome3 = $_SESSION["nome_log"];

include("../logar.php");

include("menu.php");

include("vaurls.php");

$deixar = acesso_url("FORMSENHA");

if ($deixar == "SIM"){

   include_once('java2_js.php');
?>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>
<body>

<style type=text/css>

body { background-image: url(<?="../".$logo_sis;?>);
       background-attachment: fixed }

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
-->
</style> 

</body>

<?
include("help.php");
?>

</html>

<?

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// Abrir tabela instrucao
$tabela_1  = strtoupper('tt_ser_01');

if (!empty($Cod_xxx))
{

$consulta = "SELECT * FROM tt_ser_01 WHERE login = '$Cod_xxx' ORDER BY login";

}else{
	
$consulta = "SELECT * FROM tt_ser_01  ORDER BY id LIMIT 0,30";
              
}

// Função Navegar pelo registro Proximo e Anterior
If ($Cod_Anterior != 0){
	
	$id = $Cod_Anterior;

    if($Cod_Anterior != 0){
       $id = $id -1;
       }
       else{
           $id = $id +1;
           }

       if ($id) {
       $consulta = "SELECT * FROM tt_ser_01 ORDER BY id LIMIT $id,1";
	
}
}
If ($Cod_Proximo != 0){
	
	$id = $Cod_Proximo;

    if($Cod_Proximo != 0){
       $id = $id -0;
       }
       else{
           $id = $id -1;
           }

       if ($id) {
       $consulta = "SELECT * FROM tt_ser_01 ORDER BY id LIMIT $id,1";
	
}
}

If ($Cod_fim != 0){
	
       $consulta = "SELECT * FROM tt_ser_01 ORDER BY login DESC LIMIT 0,1";
	
}

If ($Cod_inicio != 0){
	
       $consulta = "SELECT * FROM tt_ser_01 ORDER BY login ASC LIMIT 0,1";
	
}
// Fim da Função Navegar pelo registro

$resultado = @mysql_query($consulta)

or

die("
     <br>
     <br>
     
	 <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Tabela Instrução Não Foi encontrada !!! ***</b>
     <table align=center>
     <form method='POST' action='index.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

$row = mysql_fetch_array($resultado);

$id        = @$row["id"];
$login     = @$row["login"];       // 10
$senha     = decode5t_se(@$row["senha"]);       // 10
$data      = @$row["data"];        // 10
$nome      = @$row["nome_l"];      // 45
$permissao = @$row["permissao"];   // 10
$permis2   = @$row["permis2"];     // 10
$programas = @$row["programas"];   
$maquina   = @$row["maquina"];
$acesso    = @$row["conta"];
$hora1     = @$row["hora1"];
$hora2     = @$row["hora2"];
$semana    = @$row["semana"];
$email     = @$row["e_mail"];
$tipo      = @$row["tipo"];

$menssagens = "* * * Visualizar * * *";


// Abrir tabela Senha
$consulta3 = "SELECT * FROM tt_ser_01 Where login = '$nome3' and tabela = '$tabela_1'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$inclu       = @$row3["incluir"];
$alter       = @$row3["alterar"];
$exclu       = @$row3["excluir"];
$impri       = @$row3["excluir"];
$espec       = @$row3["especial"];


// Resgata a Sessao
@session_start();
$_SESSION['var_w1'] = $login;

include("senhalayout.php");

include("botoes.php");

}else{
	
include("enaaurlnp.php");
	
}
?>