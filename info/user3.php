<?php
// Abre Conexão com o MySql
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
<div style="Z-INDEX: 500; LEFT: 0px; WIDTH: 616px; POSITION: absolute; TOP: 0px; HEIGHT: 19px">
<font color="#4682B4" face="Ariel" size="2">&nbsp;&nbsp;<?=$usuarios2;?> usuário(s) on-line</font>
</div>
