<?

// Funcao Verifica Versao do Browse
if((ereg("Nav", getenv("HTTP_USER_AGENT"))) || (ereg("Gold", getenv("HTTP_USER_AGENT"))) || (ereg("X11", getenv("HTTP_USER_AGENT"))) || (ereg("Mozilla", getenv("HTTP_USER_AGENT"))) || (ereg("Netscape", getenv("HTTP_USER_AGENT"))) AND (!ereg("MSIE", getenv("HTTP_USER_AGENT")) AND (!ereg("Konqueror", getenv("HTTP_USER_AGENT"))))) $browser = " Netscape"; 
elseif(ereg("MSIE", getenv("HTTP_USER_AGENT"))) $browser = " MS Internet Explorer"; 
elseif(ereg("Lynx", getenv("HTTP_USER_AGENT"))) $browser = " Lynx"; 
elseif(ereg("Opera", getenv("HTTP_USER_AGENT"))) $browser = " Opera"; 
elseif(ereg("WebTV", getenv("HTTP_USER_AGENT"))) $browser = " WebTV"; 
elseif(ereg("Konqueror", getenv("HTTP_USER_AGENT"))) $browser = " Konqueror"; 
elseif((eregi("bot", getenv("HTTP_USER_AGENT"))) || (ereg(" Google", getenv("HTTP_USER_AGENT"))) || (ereg("Slurp", getenv("HTTP_USER_AGENT"))) || (ereg("Scooter", getenv("HTTP_USER_AGENT"))) || (eregi("Spider", getenv("HTTP_USER_AGENT"))) || (eregi("Infoseek", getenv("HTTP_USER_AGENT")))) $browser = " Robôs de Busca"; 
else $browser = " Desconhecido"; 
//echo $browser; 


// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

$nome3 = strtolower($_SESSION["nome_log"]);

session_start("chat");
$nick = strtolower($nome3);

include("../config.php");

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


$query_Recordset1a = "SELECT usuario FROM useronline";
$Recordset1a = @mysql_query($query_Recordset1a, $conn); // or die(mysql_error());
$row_Recordset1a = @mysql_fetch_assoc($Recordset1a);
$totalRows_Recordset1a = @mysql_num_rows($Recordset1a);

?>
<html>
<head>
<title><?=$Titulo;?></title>
<!-- <meta http-equiv="refresh" content="5"> -->
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<STYLE TYPE="TEXT/CSS">
body {
margin-left: 0px;
margin-top: 0px;
margin-bottom: 0px;
margin-right: 0px;
}
A:link { text-decoration: none;font-family: Verdana;font-size: 14px;color: #000000;}
A:visited { text-decoration: none;font-family: Verdana;font-size: 14px;color: #000000;}
A:hover { text-decoration: none;font-family: Verdana;font-size: 14px;color: #000000;}
</STYLE>

<style type=text/css>

body { background-image: url(<?="../".$logo_sis;?>);
       background-attachment: fixed }
</style>

</head>
<body onload="setTimeout('window.location.reload(true)',15000)" bgcolor="#FFFFFF">
<div style="padding: 2px;font-family: Verdana;font-size: 15px;color: #000000;">
<center><img src="../imagens/todos.gif"/><b> Usuários</b></center>
<?
if($_GET['acao'] == "inserir")
{
$nick = strtolower($_SESSION["vc"]);
$abrir = fopen("usuarios/$nick.txt","w");
fwrite($abrir,"$_GET[nome]");
fclose($abrir);
echo"<script>top.menu.window.location='menu.php';</script>";
}

//if ($handle = opendir('usuarios')) {
//echo "<div style=background:#ffffff;><img src=../imagens/voce.gif border=0>Todos</div>";

Do {  

	if (strtolower(trim($row_Recordset1a['usuario'])) == $nome3){

/*
		echo "<b>";
		echo "<div style=background:#ffffff;><img src=../imagens/room_user.gif border=0>"." ".strtolower($row_Recordset1a['usuario'])."";
		echo "</div>";
		echo "</b>";		
*/		
	}else{
		
         if ($browser == " MS Internet Explorer"){

		
			 echo "<a href=javascript:janela_priva('messenger.php?nome=".strtolower($row_Recordset1a['usuario'])."')><div style=background:#ffffff;><img src=../imagens/room_user.gif border=0>"." ".strtolower($row_Recordset1a['usuario'])."</a>";
			 echo "<a href=javascript:janela_priva('messenger.php?nome=".strtolower($row_Recordset1a['usuario'])."')><img src=../imagens/speek.png width='20'  height='20' border='0'/></a></div>";
		  
		  }else{
		  	
			 echo "<a href=javascript:janela_priva('messenger.php?nome=".strtolower($row_Recordset1a['usuario'])."')><div style=background:#ffffff;><img src=../imagens/room_user.gif border=0>"." ".strtolower($row_Recordset1a['usuario'])."</a>";
			 echo "<a href=javascript:janela_priva('messenger.php?nome=".strtolower($row_Recordset1a['usuario'])."')><img src=../imagens/speek.png width='20'  height='20' border='0'/></a></div>";
		  	
		  }
	}

}
while ($row_Recordset1a = mysql_fetch_assoc($Recordset1a));
      $rows = mysql_num_rows($Recordset1a);
      if($rows > 0) {
         mysql_data_seek($Recordset1a, 0);
	     $row_Recordset1a = mysql_fetch_assoc($Recordset1a);
      }


?>
</div>
</body>
</html>

<script>

function janela_priva (URL){ 
   window.open(URL,"janela5","width=530,height=470,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 

</script>
