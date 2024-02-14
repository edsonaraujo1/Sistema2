<?php

/**
 * @author holodek
 * @copyright 2010
 */
?>
<html>
<body onload="setTimeout('window.location.reload(true)',30)">

<?
// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

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


$query_Recordset1a = "SELECT usuario FROM user_logados";
$Recordset1a = @mysql_query($query_Recordset1a, $conn); // or die(mysql_error());
$row_Recordset1a = @mysql_fetch_assoc($Recordset1a);
$totalRows_Recordset1a = @mysql_num_rows($Recordset1a);


?>

	<table width="131" height="46" border="0" cellpadding="0" cellspacing="1" bordercolor="#FF6600">
  <tr>
    <td width="140" height="44" align="center" valign="top">
	<table width="100%" border="0">
        <tr>
          <td width="99" align="center"><b><font size="1"><img src="../graphics/todos.gif" width="17" height="15">
		  <font face="Verdana">ON-L</font></font></b><font size="1" face="Verdana"><b>INE</b></font>
		  <font size="1">&nbsp; </font></td>
        </tr>
        <tr>
          <td align="left" bgcolor="#D7DFEE"><table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
			  
<?
Do {  

	if (strtolower(trim($row_Recordset1a['usuario'])) == $nome3){

		echo "<td width='10'><img src='../graphics/enviar/voce.gif' width='17' height='15'>";
        echo "<td width='190'><font size='2' face='Verdana'><b>". strtolower($row_Recordset1a['usuario'])."</b></td>";
		
	}else{
		
		
		echo "<tr><td width='10'><a href=javascript:janela_priva('messenger.php?nome=".strtolower($row_Recordset1a['usuario'])."')><img src=../graphics/room_user.gif border=0></a>";
        echo "<td width='190'><font size='2' face='Verdana'>". strtolower($row_Recordset1a['usuario'])."</td>";
		
	}
echo "</td></tr>";
}
while ($row_Recordset1a = mysql_fetch_assoc($Recordset1a));
      $rows = mysql_num_rows($Recordset1a);
      if($rows > 0) {
         mysql_data_seek($Recordset1a, 0);
	     $row_Recordset1a = mysql_fetch_assoc($Recordset1a);
      }


?>
			  
</font></td>

			  
			  
            </tr>
          </table></td>
        </tr>
    </table> </td>
  </tr>
</table>

</body>
</html>