<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Abrir Telas em iFrame
 Criado em Data.....: 01/04/2009
 Ultima Atualização : 01/04/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

require($path."logar.php");
$nome3 = $_SESSION["nome_log"];

?>
<!DOCTYPE>

<html>
<head>
<title><?=$Titulo;?></title>
</head>
<body>

<style type='text/css'>
* {margin: 0; padding: 0;}
html, body {height: 100%; Background: transparent; background-image: url("../imagens/logo2.PNG");
       background-attachment: fixed}
* html #tudo {height: 100%;}
#tudo {width: 100%; margin: 0 auto; text-align: left; position: relative; min-height: 100%;}
#conteudo {padding-bottom: 50px; background: transparent;}
#rodape {position: absolute; bottom: 17px; height: 35px; line-height: 35px; text-align: center; width: 100%;}
#cabecalho { padding-bottom: 50px;}
</style>

<?

// Abre Conexão com o MySql
include($path."conexao.php");
// Chama o Banco de Dados

$link = mysql_connect($host,$user,$pass);

mysql_select_db($db);


  //--- Informa quantos usuarios estao conectados ao sistema
  $timestamp=time(); 
  $timeout=time()-100; // valor em segundos 
  $result=mysql_db_query($db, "INSERT INTO useronline VALUES ('$timestamp','$REMOTE_ADDR','$PHP_SELF')");
  $result=mysql_db_query($db, "DELETE FROM useronline WHERE timestamp<$timeout"); 
  $result=mysql_db_query($db, "SELECT DISTINCT ip FROM useronline"); 
  $usuarios=mysql_num_rows($result); 
  mysql_close();   

?>

<div id="Label71_outer" style="Z-INDEX: 7; LEFT: 0px; WIDTH: 200px; POSITION: absolute; TOP: 0px; HEIGHT: 0px">
<?
if (!empty($usuarios)){
?>
<font color="#4682B4" face="Ariel" size="2"><?=$usuarios;?> usuário(s) on-line</font>
<?
}
?>   
</div>

<?
include("help.php");
?>


<div id='conteudo' style="Z-INDEX: 7; LEFT: 0px; WIDTH: 900px; POSITION: absolute; TOP: 0px;">

<iframe id="idCabeca" src="menu.php" name="idCabeca" width='900' height='60' scrolling="NO" frameborder="0" align="center" allowtransparency="true" ></iframe>


<iframe id="idCabeca" src="../info/informes.php" name="idCabeca" width='50' height='50' scrolling="NO" frameborder="0" align="center" allowtransparency="true" ></iframe>


<div style="Z-INDEX: 7; LEFT: 120px; WIDTH: 750px; POSITION: absolute; TOP: 60px;">

<iframe id="idPrincipal" src="layout.php" name="idPrincipal" width='750' height='550' scrolling="auto" frameborder="1" align="center" allowtransparency="true" ></iframe>

</div>

</div>
<div id='rodape'>

</div>
</body>
</html>
