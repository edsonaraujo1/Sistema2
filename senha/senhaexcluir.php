<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Deletar Cadastro Senha
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

// Abrir tabela Senha

// retorna uma pesquisa

$consulta  = "SELECT * FROM tt_ser_01 WHERE login = '$Cod_2'";

$resultado = @mysql_query($consulta)
        or

die("
     <br>
     <br>
     
	 <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Registro Não Encontrado !!! ***</b>
     <table align=center>
     <form method='POST' action='cadsenha.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

$row = @mysql_fetch_array($resultado);

$id        = @$row["id"];
$login     = @$row["login"];       // 10
$senha     = @$row["senha"];       // 10
$data      = @$row["data"];        // 10
$nome      = @$row["nome_l"];      // 45
$permissao = @$row["permissao"];   // 10
$permis2   = @$row["permis2"];     // 10
$programas = @$row["programas"];   

$hora1     = @$row["hora1"];
$hora2     = @$row["hora2"];
$semana    = @$row["semana"];

$email     = @$row["e_mail"];
$tipo      = @$row["tipo"];

$menssagens = "* * * Excluir * * *";

?>

<div align=center>
       <br>
       <br>

<table border=0  align=center>
<tr align=center colspan=2> 

<form name="form1" type="hidden" method="POST" action="senhadelete.php?Cod_2=<?=$id;?>">
<br>
<?
include("senhalayout.php");
?>

<div style="Z-INDEX: 34; LEFT: 10px; WIDTH: 544px; POSITION: absolute; TOP: 470px; HEIGHT: 80px">

<table border='0' aling=center>
          <td> </td>

          <td><input type=image name="guias" src="../imagens/botaoazul4.PNG"></td>

         </form>


          <form method="POST" action="cadsenha.php?Cod_xxx=<?=$login;?>">
          <td><input type=image name="socios" src="../imagens/botaoazul9.PNG"></td>
          </form>

</table>
</div>

</table>
</div>

</body>
</html>
<?
}else{

include("enaaurlnp.php");
	
}
?>