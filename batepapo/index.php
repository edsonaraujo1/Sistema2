<?php
// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

$nome3 = strtolower($_SESSION["nome_log"]);

session_start("chat");
$nick = strtolower($nome3);

include("../config.php");

include("vaurls.php");


$deixar = acesso_url("FORM_BATEPAPO");

if ($deixar == "SIM"){


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
<body>
<?php
//$nick = $_POST['nick'];$cor  = $_POST['cor'];
$sala = date("dmY");
if(file_exists("usuarios")){}else{if(mkdir("usuarios", 0777)){}else{echo"Erro!";}}
if(file_exists("mensagens/$sala.txt")){}else
{
$criar = fopen("mensagens/$sala.txt", "w");
$permissao = chmod("mensagens/$sala.txt", 0777);
$abrir = fopen("mensagens/$sala.txt","w");
fwrite($abrir,"0");
fclose($abrir);
}
$arquivo = fopen("mensagens/$sala.txt","r");
$while = fread($arquivo,filesize("mensagens/$sala.txt"));
fclose($arquivo);
//if($_POST['acao'] == "Ok")
//{
//if(empty($nick)){echo("<script>alert(\"Digite um Nick!\");</script>");}
   //elseif(file_exists("usuarios/$nick.txt"))
   
   //{echo("<script>alert(\"Usuário já existente!\");</script>");}
//else{
$criar = fopen("usuarios/$nick.txt" , "w");
fwrite($criar,"Todos");
fclose($criar);
$hora = date("H:i:s");
if($while == "0"){$perm = "w";}else{$perm = "a+";}
$abrir = fopen("mensagens/$sala.txt","$perm");
$salvar = "<font face=verdana size=1>($hora)</font> <font face=verdana size=2 color=$cor>$nick</font> <font face=verdana size=2>entra na sala...</font><br>";
fwrite($abrir,"$salvar");
fclose($abrir);
$vc = $nick;
session_register("vc","cor");
echo"<script>window.location='sala.php';</script>";
//}
//}
?>

<?
}else{
	
include("enaaurlnp.php");
	
}
?>
