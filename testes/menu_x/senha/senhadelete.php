<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Excluir Cadastro Senha
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

include_once('../sql_injection.php');

include("vaurls.php");


$deixar = acesso_url("FORMSENHA");

if ($deixar == "SIM"){

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



<?

$menssagens = "* * * Excluido * * *";

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass)
        or

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Não foi possivel conectar !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
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

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Não Foi possivel selecionar o banco de dados !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");


$consulta_s = "SELECT * FROM tt_ser_01 WHERE id = '$Cod_2'";
$resultado_s = @mysql_query($consulta_s);
$row_s = @mysql_fetch_array($resultado_s);

$id        = @$row_s["id"];
$login     = @$row_s["login"];       // 10
$senha     = @$row_s["senha"];       // 10
$data      = @$row_s["data"];        // 10
$nome      = @$row_s["nome_l"];      // 45
$permissao = @$row_s["permissao"];   // 10
$permis2   = @$row_s["permis2"];     // 10
$programas = @$row_s["programas"];   

$hora1     = @$row_s["hora1"];   
$hora2     = @$row_s["hora2"];   
$semana    = @$row_s["semana"];   

$email     = @$row_s["e_mail"];
$tipo      = @$row_s["tipo"];

// retorna uma pesquisa

$consulta = "DELETE FROM tt_ser_01 WHERE login = '". anti_sql_injection($login) ."'";   

@mysql_query($consulta, $link) or


die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Falha na Exclusão !!! ***</b>
     <table align=center>
     <form method='POST' action='cadsenha.php?Cod_xxx=<?=$login;?>'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");



			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = $menssagem."/".$login;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);

// Organiza tabela
$sql28 = 'ALTER TABLE `tt_ser_01` ORDER BY `login`';
$res28 = mysql_query($sql28);

$sql29 = 'ALTER TABLE `tt_ser_01` DROP `id`';
$res29 = mysql_query($sql29);

$sql30 = 'ALTER TABLE `tt_ser_01` ADD `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST';
$res30 = mysql_query($sql30);

?>

<html>

<?
include("senhalayout.php");
?>

<div style="Z-INDEX: 34; LEFT: 165px; WIDTH: 544px; POSITION: absolute; TOP: 470px; HEIGHT: 80px">

<table border='0' aling=center>
          <td> </td>

          <form method="POST" action="cadsenha.php">
          <td><input type=image name="socios" src="../imagens/botao_voltar.PNG"></td>
          </form>

</table>



<?

// echo "<b>Dados atualizados com sucesso";


?>
</div>
</body>
</html>
<?
}else{

include("enaaurlnp.php");
	
}
?>