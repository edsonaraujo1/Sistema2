<?php

/**
 * @author holodek
 * @copyright 2010
 */


// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

unset ($_SESSION['Faz_uma']);

$nome3 = strtoupper($_SESSION["nome_log"]);


include("../config.php");

?>

<script language="JavaScript">

<!--

document.onkeydown = keyCatcher;

function keyCatcher() 
{
   var e = event.srcElement.tagName;

   if (event.keyCode == 8 && e != "INPUT" && e != "TEXTAREA") 
   {
      event.cancelBubble = true;
      event.returnValue = false;
   }
}
//-->
</script>

 <html>
<head>
<!-- <meta http-equiv="refresh" content="30"/> -->
</head>

<body onload="setTimeout('window.location.reload(true)',30000)">

<style type=text/css>

body { background-image: url(<?="../".$logo_sis;?>);
       background-attachment: fixed }

</style>



<?
// Abre Conex�o com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);


    $date_time = date("d/m/Y");
    $hora_time = date("H:i:s");
    $timestamp = time();
    $arqui     = $PHP_SELF;
    
    $ip = $_SERVER['REMOTE_ADDR'];

    $select = "SELECT * FROM useronline WHERE usuario ='$nome3'";
    
    $result_zo1 = @mysql_query($select);

    $row_zo1    = @mysql_fetch_array($result_zo1);

    $id_zo1     = @$row_zo1["usuario"];
    
    if (!empty($id_zo1)){
    	
//        @mysql_query("UPDATE useronline SET timestamp='".time()."', ip = '$REMOTE_ADDR' WHERE usuario ='$nome3'");
    	
    }else{
    	
    	if (!empty($nome3)){
            @mysql_query("INSERT INTO useronline VALUES ('$timestamp','$REMOTE_ADDR','$PHP_SELF','$date_time','$hora_time','$nome3')");
    	}
    	
    }
    
    $tempmins = ($tempmins) ? $tempmins : 60;  // 480 e = a 8 horas - 540 e igual a 9 horas - 60 e igual a 1 hora
    @mysql_query("DELETE FROM useronline WHERE timestamp<".(time()-($tempmins*60)));
    
    

    $RES       = @mysql_db_query($db, "SELECT * FROM useronline"); 
    $usuarios2 = @mysql_num_rows($RES);

//    @mysql_close();   

?>
<div style="Z-INDEX: 500; LEFT: 0px; WIDTH: 616px; POSITION: absolute; TOP: 0px; HEIGHT: 20px">
<font color="#4682B4" face="Ariel" size="2">&nbsp;&nbsp;<?=$usuarios2;?> usu�rio(s) on-line</font>
</div>
<div style="Z-INDEX: 500; LEFT: 0px; WIDTH: 616px; POSITION: absolute; TOP: 17px; HEIGHT: 20px">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../imagens/kitt.GIF" />
</div>
</body>
</html>


<?
/*
  //--- Informa quantos usuarios estao conectados ao sistema
  $date_time = date("d/m/Y");
  $hora_time = date("H:i:s");
  $timestamp=time(); 
  $timeout=time()-100; // valor em segundos 
  $result=@mysql_db_query($db, "INSERT INTO useronline VALUES ('$timestamp','$REMOTE_ADDR','$PHP_SELF','$date_time','$hora_time','$nome3')");
  $result=@mysql_db_query($db, "DELETE FROM useronline WHERE timestamp<$timeout"); 
  $result=@mysql_db_query($db, "SELECT DISTINCT ip FROM useronline"); 
  $usuarios=@mysql_num_rows($result); 
*/

?>