<html>
<style>

body {
	
  background-color: #cecece;
  border: solid 1px Gray;
  font: bold 9px Verdana; color: #000000; 

}

</style>
<!-- <body onload="setTimeout('window.location.reload(true)',30000)" style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px;">-->
<body style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px;">

<?php
/*
// Resgata a Sessao
@session_start();

$nome3 = strtoupper($_SESSION["nome_log"]);

include_once('sql_injection.php');

// Abre Conexão com o MySql
include("conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);


    $date_time = date("d/m/Y");
    $hora_time = date("H:i:s");
    $timestamp = time();
    $arqui     = $PHP_SELF;
    
    $ip = $_SERVER['REMOTE_ADDR'];

    $select = "SELECT * FROM useronline WHERE usuario ='". anti_sql_injection($nome3) ."'";
    
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


if (!empty($nome3)){
	
	$line_z = "&nbsp;&nbsp;<font color='#0000FF'>Você esta On-line</font>";
}else{
	$line_z = "&nbsp;&nbsp;<font color='#FF0000'>Você esta Off-line</font>";

}
*/
?>

<div align="center">
<b>
<center>-&nbsp;&nbsp; Criado por iSysmp.com&nbsp;&nbsp;-</center><br />
</b>
</div>
</body>
</html>


<?php
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
