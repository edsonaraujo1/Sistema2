<?php

include("../conexao.php");


$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

//$database =	$db;     // Banco de Dados


// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

$nick = strtolower($_SESSION["nome_log"]);

$nome = strtolower($_SESSION['Privado']);

$nome_txt = strtolower($_SESSION["nome_txt"]);

include("../config.php");

include("moderador.php");

?>
<html>
<head>
<title>Bate-Papo</title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type=text/css>

body { background-image: url(<?="../".$logo_sis;?>);
       background-attachment: fixed }
       
.normal {
	
	background-color: white;
}
.anormal {
		background-color: Lavender;
}
       
</style>

</head>
<body>
<?php
$mensagem2 = retiraCaracteres(encode_msg($_POST['mensagem2'].$_POST['smile']));
$nick      = strtolower($_SESSION["nome_log"]);
$nick_pr   = strtolower($_SESSION["nome_log"]);
$cor       = $_SESSION["cor"];
$sala2     = strtolower($nome_txt.$nick.date("dmY"));
$sala2_pr  = strtolower($nome_txt.$nome.date("dmY"));

$hora  = date("H:i:s");
$hora2 = date("H:i");
$data2 = date("d/m/Y");
if($_POST['acao'] == "Enviar")
{
$abrir = @fopen("privado/$sala2.txt","a+");
$salvar = "<font face=verdana size=1>($hora)</font> <font face=verdana size=2 color=$cor><b>$nick&nbsp;diz:</b></font> <font face=verdana size=2> $mensagem2</font><br>";
@fwrite($abrir,"$salvar");
@fclose($abrir);

// Texto Privado
$abrir_pr = @fopen("privado/$sala2_pr.txt","a+");
$salvar_pr = "<font face=verdana size=1>($hora)</font> <font face=verdana size=2 color=$cor><b>$nick_pr&nbsp;diz:</b></font> <font face=verdana size=2> $mensagem2</font><br>";
@fwrite($abrir_pr,"$salvar_pr");
@fclose($abrir_pr);

// Grava mensagem para Alerta Privado
    $nick_2 = strtolower($_SESSION["nome_log"]);
    $nome_x = strtolower($_SESSION['Privado']);

	$consulta = "INSERT INTO `messenger` (  `origem` ,
											`destino` ,
											`data` ,
											`hora`) 
								
						VALUES ('$nick_2',
						        '$nome_x',
								'$data2',
								'$hora2')";
	
	@mysql_query($consulta, $link);


	$consulta7 = "INSERT INTO `messenger_priv` (  `origem` ,
											      `destino` ,
											      `data` ,
											      `hora`,
												  `texto`) 
								
						VALUES ('$nick_2',
						        '$nome_x',
								'$data2',
								'$hora2',
								'$salvar')";
	
	@mysql_query($consulta7, $link);

// --- Fim

echo"<script>top.texto.window.location='texto_pri.php?chamar_x=1&Faz=sim';</script>";
//echo"<script>javascript:window.focus();</scritp>";
}
if($_POST['acao'] == "Sair")
{
@unlink("privado/$sala2.txt");
session_start("chat");
//session_destroy();

$abrir = @fopen("privado/$sala2.txt","a+");
$salvar = "<font face=verdana size=1>($hora)</font> <font face=verdana size=2 color=$cor>$nick</font> <font face=verdana size=2>sai da sala...</font><br>";
@fwrite($abrir,"$salvar");
@fclose($abrir);


include("saida.php");
exit;
?>

<script>

javascript:window.close()

</script>
<?
}
?>
<table border="0" cellpadding="0" cellspacing="2">
<form name="form" method="post">
  <tr> 
    <td>
    
    <select name="smile" type="text" id="dia" value="" onfocus="this.className='anormal'" onblur="this.className='normal'">
        

      <option value="">   </option>
      <option value=":)"> Sorriso </option>
	  <option value=":)"> Risada  </option>
      <option value=";-)"> Piscando  </option>
      <option value=":-(">Triste  </option>
      <option value=":[">Mau  </option>
      <option value=":z)">Doido  </option>
      <option value=":y)">Chorando  </option>
      <option value=":o)">Dormindo  </option>
      <option value=":a)">Alien 1 </option>
      <option value=":1)">Alien 2 </option>
      <option value=":s)">Fumando  </option>
      <option value=":l)">Amor  </option>
      <option value=":L)">Amando  </option>
      <option value=":]">Grande Sorriso  </option>
      <option value=":-/">Pulando  </option>
      <option value=":b)">Rodando  </option>
      <option value=":&)">Palhaço  </option>
      <option value=":?)">Confuso  </option>
      <option value=":c)">Legal  </option>
      <option value=":e)">Assustado  </option>
      <option value=":f)">Rápido  </option>
      <option value=":g)">Garota  </option>
      <option value=":i)">Idéia  </option>
      <option value=":r)">Cara Vermelha  </option>
      <option value=":8)">Vesgo  </option>
      <option value=":}">Bobo  </option>
      <option value=":t)">Gostoso  </option>
      <option value=":ty"> Digitando </option>

</select>

   <img src='../imagens/room_user.gif' border='0'/> 
    
<script>
var navegador = navigator.appName;
if(navegador == "Netscape")
{
document.write("<textarea rows=2 name=mensagem2 cols=30 onfocus=this.className='anormal' onblur=this.className='normal'></textarea>");
}
else
{
document.write("<textarea rows=3 name=mensagem2 cols=30 onfocus=this.className='anormal' onblur=this.className='normal'></textarea>");
}
</script>
    </td>
    <td valign="top">
    <div style="padding: 2px;"><input type="submit" value="Enviar" name="acao" style="font-family: Verdana; font-size: 10pt; font-weight:bold; color:000000;background:url(../imagens/botaoazul01.PNG);border=0;width:92;"></div>
    <div style="padding: 2px;">
	
	
	</div>
    </td>
    <td valign="top" style="font-size: 12px;font-family: Verdana;">
<?php
$arquivo = @fopen("usuarios/$nick.txt","r");
$falar = @fread($arquivo,filesize("usuarios/$nick.txt"));
if($falar == "0"){ }else{echo"";}
@fclose($arquivo);

// Texto Privado
$arquivo_pr = @fopen("usuarios/$nick_pr.txt","r");
$falar_pr = @fread($arquivo_pr,filesize("usuarios/$nick_pr.txt"));
if($falar_pr == "0"){ }else{echo"";}
@fclose($arquivo_pr);

?>
<input type="hidden" value="<?php echo"$falar";?>" name="falar">
    </td>
  </tr>
</form>
</table>
</body>
</html>

