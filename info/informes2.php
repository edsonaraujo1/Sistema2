<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Tela de Help
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 12/06/2010 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

unset ($_SESSION['Faz_uma']);

$nome3 = strtoupper($_SESSION["nome_log"]);

include_once('../sql_injection.php');

include("../config.php");

?>

<html>
<head>
<!-- <meta http-equiv="refresh" content="30"/> -->
</head>

<body onload="setTimeout('window.location.reload(true)',30000)">

<?php

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);


$consulta_x  = "SELECT * FROM tt_ser_01 WHERE login = '". anti_sql_injection($nome3) ."'";

$resultado_x = @mysql_query($consulta_x);

$row_x = @mysql_fetch_array($resultado_x);

$id          = @$row_x["id"];
$on_line     = trim(@$row_x["messenger"]);
$hora_inicio = strtotime(@$row_x["hora1"]);
$hora_fim    = strtotime(@$row_x["hora2"]);
$semana      = @$row_x["semana"];
$hora_atual  = strtotime(date('H:i'));


if ($hora_atual >= $hora_inicio && $hora_atual <= $hora_fim){
					
    // Acesso liberado
					
}else{

     if(!empty($nome3)){
     	
	        //$data = date("d/m/Y");
		    //?>
			<script>
			//
			//alert("Ola...<?=$nome3;?>... \n Seu horario para uso do Sistema \n expirou caso nessesite usar o Sistema  \n depois do horario contate o \n ADMINSITRADOR do SISTEMA Obrigado !!! \n em  <?=$data;?>");
			//
			</script>
			//
		    <?php
		    //
		    //$consulta3_seg = "DELETE FROM useronline WHERE usuario ='". anti_sql_injection($nome3) ."'";
			//
		    //@mysql_query($consulta3_seg, $link);
		    //
		    //@session_start();
			//@session_destroy();
			//ob_end_flush();   // Limpa o buffer
			//
		    //include('../login.php');
		    //
		    //exit;
		    
     }else{
	
	       @session_start();
	       @session_destroy();
	       ob_end_flush();   // Limpa o buffer

		   include('../login.php');
		    
		   exit;

     }		    

}

// Verifica se ah mensagems

$consulta  = "SELECT * FROM inform_user WHERE user = '". anti_sql_injection($nome3) ."' ORDER BY id ASC";

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id        = @$row["id"];
$user      = @$row["user"];
$mensagem  = trim(@$row["mensagem"]);
$data      = @$row["data"];
$origem    = @$row["origem"];


if (!empty($user)){

    ?>
	<script>
	
	alert("Ola...<?=$nome3;?>... \n <?=$mensagem;?> \n Mensagem enviada de - <?=$origem;?> em <?=$data;?> -");

	</script>

    <?php


	$consulta2 = "DELETE FROM inform_user WHERE id = '". anti_sql_injection($id) ."'";
	
	@mysql_query($consulta2, $link);

}



	// Envia Alerta de Menssagem Privado
	
	$consulta2  = "SELECT * FROM messenger WHERE destino = '". strtolower($nome3) ."' ORDER BY id ASC";
	
	$resultado2 = @mysql_query($consulta2);
	
	$row2 = @mysql_fetch_array($resultado2);
	
	$id2       = @$row2["id"];
	$origem    = @$row2["origem"];
	$destino   = @$row2["destino"];
	$data      = @$row2["data"];
	$hora      = @$row2["hora"];
	$mensagem  = trim(@$row2["texto"]);

	if (!empty($destino)){

         if ($on_line == 'OF'){
         	
	
			?>
			<script>	
			function abrir(pagina,largura,altura) {
			        
			        //pega a resolução do visitante
			        w = screen.width;
			        h = screen.height;
			        
			        //divide a resolução por 2, obtendo o centro do monitor
			        meio_w = w/2;
			        meio_h = h/2;
			        
			        //diminui o valor da metade da resolução pelo tamanho da janela, fazendo com q ela fique centralizada
			        altura2 = altura/2;
			        largura2 = largura/2;
			        meio1 = meio_h-altura2;
			        meio2 = meio_w-largura2;
			        
			        //abre a nova janela, já com a sua devida posição
			        window.open(pagina,'','height=' + altura + ', width=' + largura + ', top='+meio1+', left='+meio2+'');
			 }

		     document.write('<embed src="despertador.wav" autostart="true" hidden="true">'); 
			
			 abrir('../batepapo/messenger.php?nome=<?=$origem;?>&mensa=<?=$mensagem;?>','380','460');
			 
			 </script>
			
		     <?php	
			 $consulta2 = "DELETE FROM messenger WHERE id = '". anti_sql_injection($id2) ."'";
			
			 @mysql_query($consulta2, $link);
	         	
	         }
}


	// Verifica se existe Duas Sessoes abertas

    $select_seg = "SELECT * FROM useronline WHERE sessao = '".session_id()."'";
    
    //$select = "SELECT * FROM useronline WHERE sessao = '".session_id()."'";
    
    $result_zo1 = @mysql_query($select_seg);

    $row_zo1    = @mysql_fetch_array($result_zo1);

    $id_zo1     = @$row_zo1["usuario"];
    $se_ssao    = @$row_zo1["sessao"];

    if($se_ssao != session_id()){
    	
    	if(!empty($nome3)){

   	       @session_start();
		   $ativa_do = $_SESSION['segunda_sessao'];
		   $ippc     = trim($_SERVER['REMOTE_ADDR']);
		
		
		   $data = date("d/m/Y");
		   ?>
		   <script>
				
		   //alert("Ola...<?=$nome3;?>... \n Voce entrou no Sistema em outro Computador \n isso pode interferir no uso do Sistema  \n Sua Sessao neste Micro sera ENCERRADA \n em  <?=$data;?>");
			
		   </script>
			
		   <?php
		    
			    
			    //@session_start();
				//@session_destroy();
				//ob_end_flush();   // Limpa o buffer
	
			    //include('../login.php');
			     //header("Location: ../login.php&causa=".urlencode(''));
			    
			    //exit;

    		
    	}
    	
	}    

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
    
    $tempmins = ($tempmins) ? $tempmins : 680;
//    @mysql_query("DELETE FROM useronline WHERE timestamp<".(time()-($tempmins*60)));
    
    

    $RES       = @mysql_db_query($db, "SELECT * FROM useronline"); 
    $usuarios2 = @mysql_num_rows($RES);

?>

<div style="Z-INDEX: 500; LEFT: 0px; WIDTH: 616px; POSITION: absolute; TOP: 0px; HEIGHT: 19px">
<font color="#4682B4" face="Ariel" size="2">&nbsp;&nbsp;<?=$usuarios2;?> usuário(s) on-line</font>
</div>
<div style="Z-INDEX: 500; LEFT: 0px; WIDTH: 616px; POSITION: absolute; TOP: 17px; HEIGHT: 20px">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../imagens/kitt.GIF"/>
</div>
</body>
</html>

<!--Fim da Funcao PopUP 'Segunda Tela de Ajuda' com a classe popup-->
