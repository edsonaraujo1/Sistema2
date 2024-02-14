<?

// Resgata a Sessao
session_start();

$path = strtoupper($_SESSION['Path1']);

$nick = strtolower($_SESSION["nome_log"]);

$_SESSION['Privado'] = strtolower($nome);

include("../config.php");

//echo "Eu      ".$nick."<br>";
//echo "Usuario ".$nome;

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// Muda estatos para On-line
   $nuda = 'ON';
   
$consulta4 = "UPDATE tt_ser_01 SET  messenger   = '$nuda'  WHERE login = '$nick'";

   @mysql_query($consulta4, $link) OR
   
   die("<div align=center>
	
	     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
	     <tr>
	     <td>
	     <font face=arial><b>*** Falha no Envio do Texto !!! ***</b>
	     <table align=center>
	     <form method='POST' action='../index.php'>
	     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
	     </form> 
	     </table>
	     </td>
	     </tr>
	     </table>
	     </div>");



// Identifica Usuario
$consulta3  = "SELECT * FROM tt_ser_01 Where login = '$nick'";

$resultado3 = @mysql_query($consulta3);

$row3       = @mysql_fetch_array($resultado3);

$id_log3    = @$row3["id"];

// Identifica 2 Usuario
$consulta4  = "SELECT * FROM tt_ser_01 Where login = '$nome'";

$resultado4 = @mysql_query($consulta4);

$row4       = @mysql_fetch_array($resultado4);

$id_log4    = @$row4["id"];


if ($id_log3 > $id_log4){
	
   $nome_txt = trim($id_log4.$id_log3); 	
}
if ($id_log3 < $id_log4){
	
   $nome_txt = trim($id_log3.$id_log4); 	
}

// Resgata a Sessao
session_start();

$_SESSION["nome_txt"]   = strtolower($nome_txt);
$_SESSION["nome_txt_3"] = strtolower($nome_txt);

//echo "Arquivo  ".$nome_txt.date("dmY");


$sala2    = strtolower($nome_txt.$nick.date("dmY"));
$sala2_pr = strtolower($nome_txt.$nome.date("dmY"));

if(file_exists("usuarios")){}else{if(mkdir("usuarios", 0777)){}else{echo"Erro!";}}
if(file_exists("privado/$sala2.txt")){
	
	
$arquivo = fopen("privado/$sala2.txt","r");
$while = fread($arquivo,filesize("privado/$sala2.txt"));
fclose($arquivo);
	
}else{
	
$criar = fopen("privado/$sala2.txt", "w");
$permissao = chmod("privado/$sala2.txt", 0777);
$abrir = fopen("privado/$sala2.txt","w");
fwrite($abrir,"0");
fclose($abrir);

}

if(file_exists("privado/$sala2_pr.txt")){
	
// Texto Privado
$arquivo_pr = fopen("privado/$sala2_pr.txt","r");
$while_pr = fread($arquivo_pr,filesize("privado/$sala2_pr.txt"));
fclose($arquivo_pr);
	
}else{
	
// Texto Privado
$criar_pr = fopen("privado/$sala2_pr.txt", "w");
$permissao_pr = chmod("privado/$sala2_pr.txt", 0777);
$abrir_pr = fopen("privado/$sala2_pr.txt","w");
fwrite($abrir_pr,"0");
fclose($abrir_pr);
}


$mensagem2 = $mensa;
if (!empty($nome)){
	$nick = strtolower($nome);
}else{
    $nick = strtolower($_SESSION["nome_log"]);

}
$cor = $_SESSION["cor"];
$sala2 = strtolower($nome_txt.date("dmY"));
$hora = date("H:i:s");

// Resgata a Sessao
session_start();
$_SESSION["sala_del"] = strtolower($nick);

//$abrir = @fopen("privado/$sala2.txt","a+");
//$salvar = "<b>&nbsp;On-line!!!</b><br>";
//@fwrite($abrir,"$salvar");
//@fclose($abrir);

?>
<html>
<head>
<title>Bate-Papo</title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type=text/css>

body { background-image: url(<?="../".$logo_sis;?>);
       background-attachment: fixed }
</style>

</head>

<frameset rows="*" cols="*,-5" framespacing="0" frameborder="NO" border="0">
  <frameset rows="*,100" frameborder="NO" border="0" framespacing="0">
    <frameset rows="80,*" frameborder="NO" border="1" framespacing="0">
      <frame src="cima_pri.php" name="cima" scrolling="NO" noresize>
      <frame src="texto_pri.php" name="texto" scrolling="NO">
    </frameset>
    <frame src="menu_pri.php" name="menu" scrolling="NO" noresize>
  </frameset>
</frameset>
<noframes><body>
</body></noframes>
</html>
