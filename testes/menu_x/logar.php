<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Segurança Verificar Senha
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/09/2010 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

//ob_start(); // Para Evitar warning
@session_start();
$_SESSION["servletjs2"] = '20$$20';

// Para Nao gravar em cache

include_once('sql_injection.php');

include_once('senha/java2_js.php');

include("config.php");

ini_set('session.cache_expire', 1440); // 1440 minutos = 1 dia
ini_set('session.cache_limiter', 'none');
ini_set('session.cookie_lifetime', 0); // O indica que morre quando o browser fecha
ini_set('session.gc_maxlifetime', 86400); // 86400 segundos = 1 dia


@session_name("MeuLogin");
$nome2 = addslashes(strtoupper($_POST['nome_log'])); // Evitando SQL injection as aspas

if($_GET['acao'] == "logar") {

// Abre Conexão com o MySql
include("conexao.php");
//  Chama o Banco de Dados

    $conn = @mysql_connect($host,$user,$pass)
	
	or die("<script language='JavaScript'><!--
		    document.onkeydown = keyCatcher;
			function keyCatcher() 
			{
			   var e = event.srcElement.tagName;
			
			   if (event.keyCode == 8 && e != 'INPUT' && e != 'TEXTAREA') 
			   {
			      event.cancelBubble = true;
			      event.returnValue = false;
			   }
			}
			//-->
			</script>
	
	        <html>
			<head>
			<title>ERRO AO CONECTAR</title>
            <link rel='shortcut icon' href='favicon.ico'/>
			</head>
			<body>
						
			<style type=text/css>
			
			
			<!--.cp {  font: bold 10px Arial; color: black}
			<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
			<!--.ld { font: bold 15px Arial; color: #000000}
			<!--.ct { FONT: 9px 'Arial Narrow'; COLOR: #000033}
			<!--.cn { FONT: 9px Arial; COLOR: black }
			<!--.bc { font: bold 22px Arial; color: #000000 }
			--></style> 
			
			</HEAD>
			<BODY text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0 leftmargin=0 bottommargin=0 bgcolor='#CDCDC1' background='$logo_sis'>
			</html>
			
			<br><br><br><br>
				
			<div align=center>
			
			<table align=center border='15' bgcolor='#FFF8DC'  bordercolor ='$color_bor'>
			<tr>
			<td align=center>
			     <font face=arial><b>*** ERRO AO CONECTAR COM O BANCO DE DADOS !!! ***<br>
				                     Tente de novo mais tarde, ou entre em contato com o <br>
									 ADMINISTRADOR DO SISTEMA (1)<br>
									 error:". mysql_errno()."</b>
			<table align=center>
			<form method='POST' action='login.php'>
			<td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
			</form>  
			</table>
			</td>
			</tr>
			</table>
			</div>");
			
	//configure os dados do seu MySQL
    $banco = @mysql_select_db($db)
	
    or die("<script language='JavaScript'><!--
		    document.onkeydown = keyCatcher;
			function keyCatcher() 
			{
			   var e = event.srcElement.tagName;
			
			   if (event.keyCode == 8 && e != 'INPUT' && e != 'TEXTAREA') 
			   {
			      event.cancelBubble = true;
			      event.returnValue = false;
			   }
			}
			//-->
			</script>
	
	        <html>
			<head>
			<title>ERRO AO CONECTAR</title>
            <link rel='shortcut icon' href='favicon.ico'/>
			</head>
			<body>
						
			<style type=text/css>
			
			
			<!--.cp {  font: bold 10px Arial; color: black}
			<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
			<!--.ld { font: bold 15px Arial; color: #000000}
			<!--.ct { FONT: 9px 'Arial Narrow'; COLOR: #000033}
			<!--.cn { FONT: 9px Arial; COLOR: black }
			<!--.bc { font: bold 22px Arial; color: #000000 }
			--></style> 
			
			</HEAD>
			<BODY text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0 leftmargin=0 bottommargin=0 background='$logo_sis'>
			</html>
			
			<br><br><br><br>
				
			<div align=center>
			
			<table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
			<tr>
			<td align=center>
			     <font face=arial><b>*** ERRO AO CONECTAR COM O BANCO DE DADOS !!! ***<br>
				                     Tente de novo mais tarde, ou entre em contato com o <br>
									 ADMINISTRADOR DO SISTEMA (2)<br>
									 error:". mysql_errno()."</b>
			<table align=center>
			<form method='POST' action='login.php'>
			<td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
			</form>  
			</table>
			</td>
			</tr>
			</table>
			</div>");
			
     // Verifica se o nome digitado existe
    if (!empty($_POST['nome_log'])){
    	
        $nome = addslashes(strtoupper($_POST['nome_log']));
        
    }else{
    	//echo "nome branco";
    	include('senha_erro.php');
    	exit;
    }
    if (!empty($_POST['pwd'])){
    	
        // OK
        
    }else{
    	//echo "nome branco";
    	include('senha_erro.php');
    	exit;
    }

    $q_user = @mysql_query("SELECT * FROM tt_ser_01 WHERE login='". anti_sql_injection($nome) ."'");

    $row = @mysql_fetch_array($q_user) 
    
    or die("<script language='JavaScript'><!--
		    document.onkeydown = keyCatcher;
			function keyCatcher() 
			{
			   var e = event.srcElement.tagName;
			
			   if (event.keyCode == 8 && e != 'INPUT' && e != 'TEXTAREA') 
			   {
			      event.cancelBubble = true;
			      event.returnValue = false;
			   }
			}
			//-->
			</script>

	        <html>
			<head>
			<title>ERRO AO CONECTAR</title>
            <link rel='shortcut icon' href='favicon.ico'/>
			</head>
			<body>
						
			<style type=text/css>
			
			
			<!--.cp {  font: bold 10px Arial; color: black}
			<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
			<!--.ld { font: bold 15px Arial; color: #000000}
			<!--.ct { FONT: 9px 'Arial Narrow'; COLOR: #000033}
			<!--.cn { FONT: 9px Arial; COLOR: black }
			<!--.bc { font: bold 22px Arial; color: #000000 }
			--></style> 
			
			</HEAD>
			<BODY text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0 leftmargin=0 bottommargin=0 background='$logo_sis'>
			</html>
			
			<br><br><br><br>
				
			<div align=center>
			
			<table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
			<tr>
			<td align=center>
			     <font face=arial><b>*** ERRO AO CONECTAR COM O BANCO DE DADOS !!! ***<br>
				                     Tente de novo mais tarde, ou entre em contato com o <br>
									 ADMINISTRADOR DO SISTEMA (3)<br>
									 error:".mysql_errno()."</b>
			<table align=center>
			<form method='POST' action='login.php'>
			<td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
			</form>  
			</table>
			</td>
			</tr>
			</table>
			</div>"); 

            // Fim da Verificacao
			
			// Verifica se a maquina esta cadastrada
			// Verifica dias uteis e horario para acesso
			
			$nome_arq3    = addslashes(strtolower($nome2));
			
			$arq          = $nome_arq3."xhtintxp";
			$date         = date('m/d/Y');
			$hora         = date('H:i:s');
			$ippc         = trim($_SERVER['REMOTE_ADDR']);
			$eli_rg2      = str_replace(".","",$ippc);
			$num_java1    = trim(substr($eli_rg2,2,1).substr($eli_rg2,4,1).substr($eli_rg2,8,1));
			$num_java2    = trim(substr($eli_rg2,7,1)); 
			$num_java     = $num_java1.$num_java2;
			$cont         = $num_java;
			
			if(file_exists("usuarios/$arq.txt")){

				$arquivo = fopen("usuarios/$arq.txt","r");
				$while = fread($arquivo,filesize("usuarios/$arq.txt"));
				fclose($arquivo);
			
			    $linha  = file("usuarios/$arq.txt");
		
				$total  = count($linha);
				for ($i = "0"; $i < $total; $i++){
				     list($dado1) = explode(" ",$linha[$i]);
				}
				
                $num_java = $dado1;
                
			    //echo "Aqui exite<br>...meu codigo e  dado1...".$dado1;
				
			}else{
				
				$criar = fopen("usuarios/$arq.txt", "w");
				$permissao = chmod("usuarios/$arq.txt", 0777);
				$abrir = fopen("usuarios/$arq.txt","w");
				fwrite($abrir,$num_java);
				fclose($abrir);

			    //echo "Aqui nao exite Criado<br>...meu codigo e ".$num_java;

			}
						
			$navoc_1  = "SELECT maquina,login,permis2,hora1,hora2,semana FROM `tt_ser_01` WHERE login = '". anti_sql_injection($nome2) ."'";
			
			$sulina_1 = @mysql_query($navoc_1);
			
			$zigui1 = @mysql_fetch_array($sulina_1);
			
			$id_ipp_cli   = @$zigui1['maquina'];
			$id_ipp_nom   = trim(@$zigui1['login']);
			$id_java_id   = @$zigui1['permis2'];
			$hora_inicio  = strtotime(@$zigui1['hora1']);
			$hora_fim     = strtotime(@$zigui1['hora2']);
			$semana       = @$zigui1['semana'];

            if ($id_ipp_cli != 'FICXXER'){  // Acesso Administrador

				$dia_semana  = strftime("%A");
				$dia_sem_mes = strftime("%B");
				
				// Converte Dia da Semana Ingles Portugues
				if (strftime("%A") == "Sunday")   { $dia_semana = "DOM"; }
				if (strftime("%A") == "Monday")   { $dia_semana = "SEG"; }
				if (strftime("%A") == "Tuesday")  { $dia_semana = "TER"; }
				if (strftime("%A") == "Wednesday"){ $dia_semana = "QUA"; }
				if (strftime("%A") == "Thursday") { $dia_semana = "QUI"; }
				if (strftime("%A") == "Friday")   { $dia_semana = "SEX"; }
				if (strftime("%A") == "Saturday") { $dia_semana = "SAB"; }


				// Converte Dia da Semana Ingles Portugues
				if (strftime("%A") == "Sunday")   { $dia_semana_x = "nos Domingos"; }
				if (strftime("%A") == "Monday")   { $dia_semana_x = "nas Segundas-feiras"; }
				if (strftime("%A") == "Tuesday")  { $dia_semana_x = "nas Terças-feiras"; }
				if (strftime("%A") == "Wednesday"){ $dia_semana_x = "nas Quartas-feiras"; }
				if (strftime("%A") == "Thursday") { $dia_semana_x = "nas Quintas-feiras"; }
				if (strftime("%A") == "Friday")   { $dia_semana_x = "nas Sexta-feiras"; }
				if (strftime("%A") == "Saturday") { $dia_semana_x = "nos Sabados"; }

                $hora_atual     = strtotime(date('H:i'));
                //$hora_inicio    = strtotime('08:00');
                //$hora_fim       = strtotime('18:30');
                
				if ($hora_atual >= $hora_inicio && $hora_atual <= $hora_fim){
					
					// Acesso liberado
					
				}else{
					
					include_once('menu_info.php');
					
					echo " <script language='JavaScript'><!--
						    document.onkeydown = keyCatcher;
							function keyCatcher() 
							{
							   var e = event.srcElement.tagName;
							
							   if (event.keyCode == 8 && e != 'INPUT' && e != 'TEXTAREA') 
							   {
							      event.cancelBubble = true;
							      event.returnValue = false;
							   }
							}
							//-->
							</script>
					
				            <html>
							<head>
							<title>ERRO AO CONECTAR</title>
				            <link rel='shortcut icon' href='favicon.ico'/>
							</head>
							<body>
										
							<style type=text/css>
							
							
							<!--.cp {  font: bold 10px Arial; color: black}
							<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
							<!--.ld { font: bold 15px Arial; color: #000000}
							<!--.ct { FONT: 9px 'Arial Narrow'; COLOR: #000033}
							<!--.cn { FONT: 9px Arial; COLOR: black }
							<!--.bc { font: bold 22px Arial; color: #000000 }
							--></style> 
							
							</HEAD>
							<BODY text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0 leftmargin=0 bottommargin=0 background='$logo_sis'>
							</html>
							
							<br><br><br><br>
								
							<div align=center>
							
							<table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
							<tr>
							<td align=center>
							     <font color = #FF0000><b>&nbsp;&nbsp; ERRO ACESSO NÃO PERMITIDO !!!&nbsp;&nbsp;</font><br>
								                     &nbsp;&nbsp;Seu computador não tem permissão,<br>
													 &nbsp;&nbsp;para uso neste horario, caso<br>
								                     &nbsp;&nbsp;seja nessessario entre em contato com o<br>
													 ADMINISTRADOR DO SISTEMA<br>
													 </b>
							<table align=center>
							<form method='POST' action='login.php'>
							<td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
							</form>  
							</table>
							</td>
							</tr>
							</table>
							</div>";
							@mysql_close(); 
					exit;
					
				}  // Fim Horario
			
				// Verifica Permissao para uso nos finais de semana
				$open_2Sx    = "NAO";
				$program2    = $semana;
				$string2     = $program2;
				$array2      = explode(',', $string2);
				
				for ($si2 = 0; $si2 < strlen($program2); $si2++)
				{
				    $linha2 = $Campo2."$si2";
				    				    
				    if ($array2[$si2] == $dia_semana)
				    {
				       $open_2Sx = "SIM";
				       //echo "<br>achei...".$array2[$si2]."<br>";
				    }
				}
				
				//echo 'open_2S '.$open_2S;
			
				if ($open_2Sx == "NAO"){

                    include_once('menu_info.php');
                    
					echo " <script language='JavaScript'><!--
						    document.onkeydown = keyCatcher;
							function keyCatcher() 
							{
							   var e = event.srcElement.tagName;
							
							   if (event.keyCode == 8 && e != 'INPUT' && e != 'TEXTAREA') 
							   {
							      event.cancelBubble = true;
							      event.returnValue = false;
							   }
							}
							//-->
							</script>
					
				            <html>
							<head>
							<title>ERRO AO CONECTAR</title>
				            <link rel='shortcut icon' href='favicon.ico'/>
							</head>
							<body>
										
							<style type=text/css>
							
							<!--.cp {  font: bold 10px Arial; color: black}
							<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
							<!--.ld { font: bold 15px Arial; color: #000000}
							<!--.ct { FONT: 9px 'Arial Narrow'; COLOR: #000033}
							<!--.cn { FONT: 9px Arial; COLOR: black }
							<!--.bc { font: bold 22px Arial; color: #000000 }
							--></style> 
							
							</HEAD>
							<BODY text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0 leftmargin=0 bottommargin=0 background='$logo_sis'>
							</html>
							
							<br><br><br><br>
								
							<div align=center>
							
							<table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
							<tr>
							<td align=center>
							     <font color = #FF0000>&nbsp;&nbsp; ERRO ACESSO NÃO PERMITIDO !!!</font><br>
								                     &nbsp;&nbsp;Seu computador não tem permissão,<br>
													 &nbsp;&nbsp;para uso <b>$dia_semana_x</b>, caso<br>
								                     &nbsp;&nbsp;seja nessessario entre em contato com o<br>
													 ADMINISTRADOR DO SISTEMA<br>
													 </b>
							<table align=center>
							<form method='POST' action='login.php'>
							<td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
							</form>  
							</table>
							</td>
							</tr>
							</table>
							</div>";
							@mysql_close(); 
					exit;

				}

                if ($num_java != $id_java_id){				
				
	                @mysql_close();   
					$open_1 = "NAO";
					
				}else{
					
					$open_1 = "SIM";
				}

                // Break;
								
				if ($open_1 == "NAO"){
					
					// Atualiza arquivo Log
					$data_log = date("d/m/Y");
					$hora_log = date("H:i:s"); 
					$even_log = "ERRO PER/NEG. NO SISTEMA/".$ippc;
					
					$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
					             VALUES
					             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome2', '$PHP_SELF')";
					
					@mysql_query($consulta_log, $conn);
					
					@mysql_close();   
					
					include_once('menu_info.php');
					
					echo " <script language='JavaScript'><!--
						    document.onkeydown = keyCatcher;
							function keyCatcher() 
							{
							   var e = event.srcElement.tagName;
							
							   if (event.keyCode == 8 && e != 'INPUT' && e != 'TEXTAREA') 
							   {
							      event.cancelBubble = true;
							      event.returnValue = false;
							   }
							}
							//-->
							</script>
					
				            <html>
							<head>
							<title>ERRO AO CONECTAR</title>
				            <link rel='shortcut icon' href='favicon.ico'/>
							</head>
							<body>
										
							<style type=text/css>
							
							<!--.cp {  font: bold 10px Arial; color: black}
							<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
							<!--.ld { font: bold 15px Arial; color: #000000}
							<!--.ct { FONT: 9px 'Arial Narrow'; COLOR: #000033}
							<!--.cn { FONT: 9px Arial; COLOR: black }
							<!--.bc { font: bold 22px Arial; color: #000000 }
							--></style> 
							
							</HEAD>
							<BODY text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0 leftmargin=0 bottommargin=0 background='$logo_sis'>
							</html>
							
							<br><br><br><br>
								
							<div align=center>
							
							<table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
							<tr>
							<td align=center>
							     <font face=arial><b>&nbsp;&nbsp;*** ERRO AO CONECTAR NO SISTEMA !!! ***<br>
								                     &nbsp;&nbsp;Seu computador nao esta cadastrado,<br>
													 &nbsp;&nbsp;entre em contato com o <br>
													 ADMINISTRADOR DO SISTEMA<br>
													 <font color = #1E90FF>$num_java</font></b>
							<table align=center>
							<form method='POST' action='login.php'>
							<td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
							</form>  
							</table>
							</td>
							</tr>
							</table>
							</div>";
							@mysql_close(); 
					exit;
					
	            }
	
				if ($id_ipp_nom != $nome2){
	
					// Atualiza arquivo Log
					$data_log = date("d/m/Y");
					$hora_log = date("H:i:s"); 
					$even_log = "ERRO PER/NEG. NO SISTEMA/".$ippc;
					
					$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
					             VALUES
					             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome2', '$PHP_SELF')";
					
					@mysql_query($consulta_log, $conn);
					
					@mysql_close();   
					echo " <script language='JavaScript'><!--
						    document.onkeydown = keyCatcher;
							function keyCatcher() 
							{
							   var e = event.srcElement.tagName;
							
							   if (event.keyCode == 8 && e != 'INPUT' && e != 'TEXTAREA') 
							   {
							      event.cancelBubble = true;
							      event.returnValue = false;
							   }
							}
							//-->
							</script>

					        <html>
							<head>
							<title>ERRO AO CONECTAR</title>
				            <link rel='shortcut icon' href='favicon.ico'/>
							</head>
							<body>
										
							<style type=text/css>
							
							<!--.cp {  font: bold 10px Arial; color: black}
							<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
							<!--.ld { font: bold 15px Arial; color: #000000}
							<!--.ct { FONT: 9px 'Arial Narrow'; COLOR: #000033}
							<!--.cn { FONT: 9px Arial; COLOR: black }
							<!--.bc { font: bold 22px Arial; color: #000000 }
							--></style> 
							
							</HEAD>
							<BODY text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0 leftmargin=0 bottommargin=0 background='$logo_sis'>
							</html>
							
							<br><br><br><br>
								
							<div align=center>
							
							<table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
							<tr>
							<td align=center>
							     <font face=arial><b>*** ERRO AO CONECTAR NO SISTEMA !!! ***<br>
								                     Seu computador nao esta cadastrado,<br> entre em contato com o <br>
													 ADMINISTRADOR DO SISTEMA<br>
													 <font color = #1E90FF>$num_java</font></b>
							<table align=center>
							<form method='POST' action='login.php'>
							<td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
							</form>  
							</table>
							</td>
							</tr>
							</table>
							</div>";
							@mysql_close(); 
					exit;
					
	            }
   }          			
 /*
                or die("<html>
						<head>
						<title>ERRO AO CONECTAR</title>
			            <link rel='shortcut icon' href='favicon.ico'/>
						</head>
						<body>
									
						<style type=text/css>
						
						
						<!--.cp {  font: bold 10px Arial; color: black}
						<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
						<!--.ld { font: bold 15px Arial; color: #000000}
						<!--.ct { FONT: 9px 'Arial Narrow'; COLOR: #000033}
						<!--.cn { FONT: 9px Arial; COLOR: black }
						<!--.bc { font: bold 22px Arial; color: #000000 }
						--></style> 
						
						</HEAD>
						<BODY text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0 leftmargin=0 bottommargin=0 background='$logo_sis'>
						</html>
						
						<br><br><br><br>
							
						<div align=center>
						
						<table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
						<tr>
						<td align=center>
						     <font face=arial><b>*** ERRO AO CONECTAR NO SISTEMA !!! ***<br>
							                     Seu computador nao esta cadastrado,<br> entre em contato com o <br>
												 ADMINISTRADOR DO SISTEMA</b>
						<table align=center>
						<form method='POST' action='login.php'>
						<td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
						</form>  
						</table>
						</td>
						</tr>
						</table>
						</div>");
*/						
			
	//coloque o nome do seu banco de dados
    if (!empty($_POST['nome_log'])){
    	
        $nome = addslashes(strtoupper($_POST['nome_log']));
        
    }else{
    	//echo "nome branco";
    	include('senha_erro.php');
    	exit;
    }
    
    $nome = addslashes(strtoupper($_POST['nome_log']));
    $q_user = @mysql_query("SELECT * FROM tt_ser_01 WHERE login='". anti_sql_injection($nome) ."'");

    $row = @mysql_fetch_array($q_user) 
    
    or die("<script language='JavaScript'><!--
		    document.onkeydown = keyCatcher;
			function keyCatcher() 
			{
			   var e = event.srcElement.tagName;
			
			   if (event.keyCode == 8 && e != 'INPUT' && e != 'TEXTAREA') 
			   {
			      event.cancelBubble = true;
			      event.returnValue = false;
			   }
			}
			//-->
			</script>

	        <html>
			<head>
			<title>ERRO AO CONECTAR</title>
            <link rel='shortcut icon' href='favicon.ico'/>
			</head>
			<body>
						
			<style type=text/css>
			
			<!--.cp {  font: bold 10px Arial; color: black}
			<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
			<!--.ld { font: bold 15px Arial; color: #000000}
			<!--.ct { FONT: 9px 'Arial Narrow'; COLOR: #000033}
			<!--.cn { FONT: 9px Arial; COLOR: black }
			<!--.bc { font: bold 22px Arial; color: #000000 }
			--></style> 
			
			</HEAD>
			<BODY text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0 leftmargin=0 bottommargin=0 background='$logo_sis'>
			</html>
			
			<br><br><br><br>
				
			<div align=center>
			
			<table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
			<tr>
			<td align=center>
			     <font face=arial><b>*** ERRO AO CONECTAR COM O BANCO DE DADOS !!! ***<br>
				                     Tente de novo mais tarde, ou entre em contato com o <br>
									 ADMINISTRADOR DO SISTEMA (4)<br>
									 error:". mysql_errno()."</b>
			<table align=center>
			<form method='POST' action='login.php'>
			<td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
			</form>  
			</table>
			</td>
			</tr>
			</table>
			</div>"); 

//  Chama o Banco de Dados
$consulta_zon1  = "SELECT * FROM time_zone ORDER BY zone_id ASC LIMIT 0,1";

$result_zo1 = @mysql_query($consulta_zon1);

$row_zo1 = @mysql_fetch_array($result_zo1)

    or die("<script language='JavaScript'><!--
		    document.onkeydown = keyCatcher;
			function keyCatcher() 
			{
			   var e = event.srcElement.tagName;
			
			   if (event.keyCode == 8 && e != 'INPUT' && e != 'TEXTAREA') 
			   {
			      event.cancelBubble = true;
			      event.returnValue = false;
			   }
			}
			//-->
			</script>

	        <html>
			<head>
			<title>ERRO AO CONECTAR</title>
            <link rel='shortcut icon' href='favicon.ico'/>
			</head>
			<body>
						
			<style type=text/css>
			
			<!--.cp {  font: bold 10px Arial; color: black}
			<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
			<!--.ld { font: bold 15px Arial; color: #000000}
			<!--.ct { FONT: 9px 'Arial Narrow'; COLOR: #000033}
			<!--.cn { FONT: 9px Arial; COLOR: black }
			<!--.bc { font: bold 22px Arial; color: #000000 }
			--></style> 
			
			</HEAD>
			<BODY text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0 leftmargin=0 bottommargin=0 background='$logo_sis'>
			</html>
			
			<br><br><br><br>
				
			<div align=center>
			
			<table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
			<tr>
			<td align=center>
			     <font face=arial><b>*** ERRO NA ESTALAÇÃO DO PROGRAMA !!! ***<br>
				                     Não e possivel executar o modulo principal<br>
									 contate o ADMINISTRADOR DO SISTEMA</b>
			<table align=center>
			<form method='POST' action='login.php'>
			<td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
			</form>  
			</table>
			</td>
			</tr>
			</table>
			</div>"); 

$id_zo1       = @$row_zo1["zone_id"];
$id_dat       = @$row_zo1["id_date"];

$dat_zo1 = date("d/m/Y");

if ($id_zo1 < 366){  // 1 Ano

   if ($id_dat != $dat_zo1)
   {
       $id_zo1  = $id_zo1 + 1;
       $sql_id_seek = "UPDATE `time_zone` SET zone_id = '". anti_sql_injection($id_zo1) ."', id_date = '". anti_sql_injection($dat_zo1) ."'"; 
	
   }
	 
@mysql_query($sql_id_seek,$conn);
  
 
}else{
// Salva Nome do Usuario	
@session_start();	
$_SESSION['nome_user_1'] = addslashes($nome2);

?>

<script>
function janelaSecundaria3 (URL){ 
   window.open(URL,"janela3","width=675,height=395,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 
</script>
<script language='JavaScript'><!--
		    document.onkeydown = keyCatcher;
			function keyCatcher() 
			{
			   var e = event.srcElement.tagName;
			
			   if (event.keyCode == 8 && e != 'INPUT' && e != 'TEXTAREA') 
			   {
			      event.cancelBubble = true;
			      event.returnValue = false;
			   }
			}
			//-->
			</script>
	
	        <?
	        //include_once('menu_info.php');
	        ?>
            <html>
			<head>
			<title>EXPIROU !!!</title>
            <link rel="shortcut icon" href="favicon.ico"/>
			</head>
            <body>
			
			<style type=text/css>
			
			body { background-image: url(<?=$logo_sis;?>);
			       background-attachment: fixed }
			
			<!--.cp {  font: bold 10px Arial; color: black}
			<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
			<!--.ld { font: bold 15px Arial; color: #000000}
			<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
			<!--.cn { FONT: 9px Arial; COLOR: black }
			<!--.bc { font: bold 22px Arial; color: #000000 }
			-->
			
			    A:link,a:active,a:visited{ color:#000000; text-decoration:none; }
			    A:hover{ color:#FF3333; text-decoration:none; }
				A:visited {color:#0000cc;}
				A:active {color:#0000cc;}
			
				A.clase1:visited {color:#000000;}
				A.clase1:active {color:#000000;} 
				A.clase1:link {color:#000000}
				A.clase1:hover {color:#FFFFFF}
			
			</style>	

			<br><br><br><br>
				
			<div align=center>
			
			<table align=center border='15' bgcolor='#FFF8DC' bordercolor ='<?=$color_bor;?>'>
			<tr>
			<td align=center>
			     <font face=arial><b>&nbsp;&nbsp;*** ERRO AO ACESSAR O SISTEMA (erro nº 9) ***&nbsp;&nbsp;<br/>
				                     &nbsp;&nbsp;Sistema necessita de manutenção risco de&nbsp;&nbsp;<br />
									 &nbsp;&nbsp;  perda de dados entre em contato com o &nbsp;&nbsp;<br/>
								              ADMINISTRADOR DO SISTEMA </b>
			<table align=center>
			<form method='POST' action="javascript:janelaSecundaria3('upper.php')">
			<td><input type=image name='consulta' src='imagens/botaoazul45.PNG'/></td>
			</form>  
			<form method='POST' action="login2.php">
			<td><input type=image name='consulta' src='imagens/botao_voltar.PNG'/></td>
			</form>  
			</table>
			</td>
			</tr>
			</table>
			</div>
			</body>
			</html>

<?
			@mysql_close();   
			exit(); 	
}

/// *******************
    
    if(@mysql_num_rows($q_user) == 1) {
    
        $query = @mysql_query("SELECT * FROM tt_ser_01 WHERE login='". anti_sql_injection($nome) ."'");
        $dados = @mysql_fetch_array($query);

        if(encode5t_se(addslashes(strtoupper($_POST['pwd']))) == $dados['senha']) {
        	@session_start();
        	
   
            //----------------------
            
   
           $tempmins = ($tempmins) ? $tempmins : 480;  // 480 e = a 8  540 e igual a 9 horas
           @mysql_query("DELETE FROM useronline WHERE timestamp<".(time()-($tempmins*60)));
   
            
            //----------------------
            
                $select = "SELECT * FROM useronline WHERE usuario ='". anti_sql_injection($nome) ."'";
    
			    $result_zo1 = @mysql_query($select);
			
			    $row_zo1    = @mysql_fetch_array($result_zo1);
			
			    $id_zo1     = @$row_zo1["usuario"];
			    $ip_zo1     = @$row_zo1["ip"];
                $ippc       = trim($_SERVER['REMOTE_ADDR']);

			    
			    if (!empty($id_zo1)){
			    	
				    if ($ip_zo1 != $ippc){
	
                        include_once('menu_info.php');
                        
						echo " <script language='JavaScript'><!--
							    document.onkeydown = keyCatcher;
								function keyCatcher() 
								{
								   var e = event.srcElement.tagName;
								
								   if (event.keyCode == 8 && e != 'INPUT' && e != 'TEXTAREA') 
								   {
								      event.cancelBubble = true;
								      event.returnValue = false;
								   }
								}
								//-->
								</script>
	
								<script language=JavaScript>
								<!-- begin
								var sHors = '00'; 
								var sMins = '60';
								var sSecs = 60;
								function getSecs(){
									sSecs--;
									if(sSecs<0)
								    {sSecs=59;sMins--;if(sMins<=9)sMins='0'+sMins;}
									if(sMins=='0-1')
								    {sMins=5;sHors--;if(sHors<=9)sHors='0'+sHors;}
									if(sSecs<=9)sSecs='0'+sSecs;
									if(sHors=='0-1')
									{sHors='00';sMins='00';sSecs='00';
									clock1.innerHTML=sHors+'<font color=#000000>:</font>'+sMins+'<font color=#000000>:</font>'+sSecs;}
								    else
								    {
								   clock1.innerHTML=sHors+'<font color=#000000>:</font>'+sMins+'<font color=#000000>:</font>'+sSecs;
								   	setTimeout('getSecs()',1000);
									}
									}
								//-->
								</script>
	
	
						        <html>
								<head>
								<title>ERRO AO CONECTAR</title>
					            <link rel='shortcut icon' href='favicon.ico'/>
								</head>
								<body>
											
								<style type=text/css>
								
								
								<!--.cp {  font: bold 10px Arial; color: black}
								<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
								<!--.ld { font: bold 15px Arial; color: #000000}
								<!--.ct { FONT: 9px 'Arial Narrow'; COLOR: #000033}
								<!--.cn { FONT: 9px Arial; COLOR: black }
								<!--.bc { font: bold 22px Arial; color: #000000 }
								--></style> 
								
								</HEAD>
								<BODY text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0 leftmargin=0 bottommargin=0 background='$logo_sis'>
								</html>
								
								<br><br><br><br>
									
								<div align=center>
								
								<table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
								<tr>
								<td align=center>
								     <font face=arial><font color = #FF0000><b>> > > A T E N Ç Ã O < < <</b><br></font>
									                 <b>*** Usuário já Conectado !!! ***<br>
									                          Seu nome de usuário <br>
										      <font color = #1E90FF> $nome </font><br>
											  &nbsp;&nbsp;ja esta em uso em outro terminal&nbsp;&nbsp;<br>
                                              &nbsp;&nbsp;isso pode interferir no uso do Sistema&nbsp;&nbsp;<br>
											  &nbsp;&nbsp;efetue o logof, ou aguarde fim da sessão&nbsp;&nbsp;<br>											  
<div align='center'> 
	<b><font color=#ff0000 size=3 face=arial><span id='clock1'></span><script>setTimeout('getSecs()',1000);</script></font></b><br>
	</div>
											  
								<table align=center>
								<form method='POST' action='segunda_ses.php'>
								<td><input type=image name='Entrar' src='imagens/login.PNG'></td>
								</form>  
								<form method='POST' action='login2.php'>
								<td><input type=image name='Sair' src='imagens/botaoazul33.PNG'></td>
								</form>  
								</table>
								</td>
								</tr>
								</table>
								</div>";
//								@mysql_close(); 
//						exit;
	
	
	                }
			    }

                
                $_SESSION['nome_log'] = addslashes($_POST['nome_log']);

            //----------------------
            


            session_register("nome_log");

	?>
	<script>
    //window.location.href='hawe.php'
    </script>
	<?

            @header("Location: hawe.php");
			
            $edi1     = @$row["edi1"];
            $edi2     = @$row["edi2"];
            $edi3     = @$row["edi3"];
            $entrada  = @$row["entrada"];
            $saida    = @$row["saida"];
            
            $db_x     = @$row["bancodedados"];
            $data_ent = date("d/m/Y").' as '.date("H:i:s");
            
			$consulta7 = "UPDATE tt_ser_01 SET   acesso  = '0',
			                                     entrada = '$data_ent',
												 saida   = '$entrada'  WHERE login = '". anti_sql_injection($nome) ."'";
			
			@mysql_query($consulta7, $conn);

			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = "ENTRADA NO SISTEMA";
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome2', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $conn);
            exit;
        } else {


			$cons3 = "SELECT * FROM tt_ser_01 Where login = '". anti_sql_injection($nome) ."'";
			
			$resu3 = @mysql_query($cons3);
			
			$row3a = @mysql_fetch_array($resu3);
			
			$ase_1       = @$row3a["acesso"];
			
			$ase_1 = $ase_1+1;
			 
			$conta      = strtoupper(trim(@$row3a['conta']));

            $menssagem = "ERRO NO LOGIN "; 
            
			// Atualiza Acesso
			if ($ase_1 < 3){
				
				$consulta7 = "UPDATE tt_ser_01 SET   acesso  = '$ase_1'  WHERE login = '$nome'";
			}else{

			    $consulta7 = "UPDATE tt_ser_01 SET   acesso  = '$ase_1',
				                                     conta   = 'BLOQUEADA'   WHERE login = '$nome'";
			}
			
			@mysql_query($consulta7, $conn);

			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = $menssagem."/".$nome;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $conn);


            header("Location: senha_erro.php?login=falhou&causa=".urlencode(''));
	?>
	<script>
    //window.location.href='senha_erro.php?login=falhou&causa='.urlencode('')
    </script>
	<?


            exit;
            @session_destroy();
            ob_end_flush();   // Limpa o buffer
        }
    } else {


			$cons3 = "SELECT * FROM tt_ser_01 Where login = '". anti_sql_injection($nome) ."'";
			
			$resu3 = @mysql_query($cons3);
			
			$row3a = @mysql_fetch_array($resu3);
			
			$ase_1       = @$row3a["acesso"];
			
			$ase_1 = $ase_1+1;
			 
			$conta      = strtoupper(trim(@$row3a['conta']));

            $menssagem = "ERRO NO LOGIN "; 
            
			// Atualiza Acesso
			if ($ase_1 < 3){
				
				$consulta7 = "UPDATE tt_ser_01 SET   acesso  = '$ase_1'  WHERE login = '$nome'";
			}else{

			    $consulta7 = "UPDATE tt_ser_01 SET   acesso  = '$ase_1',
				                                     conta   = 'BLOQUEADA'   WHERE login = '$nome'";
			}
			
			@mysql_query($consulta7, $conn);

			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = $menssagem."/".$nome;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $conn);


	?>
	<script>
    //window.location.href='senha_erro.php?login=falhou&causa='.urlencode('')
    </script>
	<?

            header("Location: senha_erro.php?login=falhou&causa=".urlencode(''));
            exit;
            @session_destroy();
            ob_end_flush();   // Limpa o buffer

    }
}

if ($servletjs2 == '20$$20'){
	
// Verifica se o login esta correto
@session_start();
if(session_is_registered("nome_log") == false) {
	?>
	<script>
    //window.location.href='login.php'
    </script>
	<?
    header("Location: login.php");
    //include('login.php');
}

}else{

header('Location:index.php');


}
?>