<?php

include("../conexao.php");


$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

//$database =	$db;     // Banco de Dados

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

$nome3 = strtolower($_SESSION["nome_log"]);

session_start("chat");
$nick = $nome3;

include("../config.php");

include("moderador.php");

include("../conexao.php");

$hostname_conn = $host;
$database_conn = $db;
$username_conn = $user;
$password_conn = $pass;

// Conectamos ao nosso servidor MySQL
if(!($conn = mysql_connect($hostname_conn,$username_conn,$password_conn))) 
{
   echo "Erro ao conectar ao MySQL.";
   exit;
}
// Selecionamos nossa base de dados MySQL
if(!($con = mysql_select_db($database_conn,$conn))) 
{
   echo "Erro ao selecionar ao MySQL.";
   exit;
}

$con = mysql_connect($hostname_conn,$username_conn,$password_conn);
$bd  = mysql_select_db($database_conn);


$query_Recordset1a = "SELECT usuario FROM useronline WHERE usuario != '$nome3'";
$Recordset1a = @mysql_query($query_Recordset1a, $conn); // or die(mysql_error());
$row_Recordset1a = @mysql_fetch_assoc($Recordset1a);
$totalRows_Recordset1a = @mysql_num_rows($Recordset1a);


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
<body >
<?php
session_start();
$_SESSION["cor"] = $_POST['cor'];
$mensagem = retiraCaracteres(encode_msg($_POST['mensagem'].$_POST['smile']));
$nick = $_SESSION["vc"];
$cor = $_SESSION["cor"];
$sala = date("dmY");
$hora = date("H:i:s");
if($_POST['acao'] == "Enviar")
{
$abrir = @fopen("mensagens/$sala.txt","a+");
$salvar = "<font face=verdana size=1>($hora)</font> <b><font face=verdana size=2 color=$cor>$nick</font></b> <font face=verdana size=2>fala para <b>$para:</b> $mensagem</font><br>";
@fwrite($abrir,"$salvar");
@fclose($abrir);
echo"<script>top.texto.window.location='texto.php';</script>";
}
if($_POST['acao'] == "Sair")
{
@unlink("usuarios/$nick.txt");
session_start("chat");
//session_destroy();
$abrir = @fopen("mensagens/$sala.txt","a+");
$salvar = "<font face=verdana size=1>($hora)</font> <b><font face=verdana size=2 color=$cor>$nick</font></b> <font face=verdana size=2>sai da sala...</font><br>";
@fwrite($abrir,"$salvar");
@fclose($abrir);

include("saida.php");

exit;

}
?>


<table border="0" cellpadding="0" cellspacing="2">
<form name="form" method="post">
  <tr> 
    <td>
    
    
<font face="Verdana" size="2">Cor do Nick:</font>
<select style="WIDTH: 100" name="cor" onfocus="this.className='anormal'" onblur="this.className='normal'">
<option value="<?=$cor;?>"></option>
<option value="#000000">Preto</option>
<option value="#ff0000" style="color:#ff0000;">Vermelho</option>
<option value="#996633" style="color:#996633;">Marrom</option>
<option value="#008000" style="color:#008000;">Verde</option>
<option value="#0099FF" style="color:#0099FF;">Azul</option>
<option value="#FF6600" style="color:#FF6600;">Laranja</option>
<option value="#FF00FF" style="color:#FF00FF;">Rosa</option>
<option value="#660066" style="color:#660066;">Roxo</option>
</select>

<font face="Verdana" size="2px">
<?php
$arquivo = @fopen("usuarios/$nick.txt","r");
$falar = @fread($arquivo,filesize("usuarios/$nick.txt"));
if($falar == "0"){}else{echo"  De <b>$nick</b> para <b>";


echo "<select name='para' onfocus=this.className='anormal' onblur=this.className='normal'>";
echo "<option value='$para'>$para</option>";
echo "<option value='Todos'>Todos</option>";


Do {  


   echo "<option value='".strtolower($row_Recordset1a['usuario']). "'>" . strtolower($row_Recordset1a['usuario'])." </option>";
		

}
while ($row_Recordset1a = mysql_fetch_assoc($Recordset1a));
      $rows = mysql_num_rows($Recordset1a);
      if($rows > 0) {
         mysql_data_seek($Recordset1a, 0);
	     $row_Recordset1a = mysql_fetch_assoc($Recordset1a);
      }

echo "</select>";
}

@fclose($arquivo);
?>
<input type="hidden" value="<?php echo"$falar";?>" name="falar2"/>
 </font>   
<script>
var navegador = navigator.appName;
if(navegador == "Netscape")
{
document.write("<textarea rows=2 name=mensagem cols=48 onfocus=this.className='anormal' onblur=this.className='normal'></textarea>");
}
else
{
document.write("<textarea rows=3 name=mensagem cols=52 onfocus=this.className='anormal' onblur=this.className='normal'></textarea>");
}
</script>
    </td>
    <td valign="top">
    <div style="padding: 2px;"><input type="submit" value="Enviar" name="acao" style="font-family: Verdana; font-size: 10pt; font-weight:bold; color:000000;background:url(../imagens/botaoazul01.PNG);border=0;width:92;"></div>
    <b>Emoticons</b>
    <div style="padding: 2px;">
	


    <select name="smile" type="submit" id="dia" value="" onfocus="this.className='anormal'" onblur="this.className='normal'">
        

      <option value="">   </option>
      <option value=":)"> Sorriso  </option>
	  <option value=":-)"> Risada  </option>
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

	
	
	</div>

    </td>
    <td valign="top" style="font-size: 12px;font-family: Verdana;">

    </td>
  </tr>
</form>
</table>
</body>
</html>

