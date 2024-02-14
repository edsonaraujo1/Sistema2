<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Conectar ao Banco de Dados
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

//include_once('config.php');
// Restaura Secao
@session_start();
//$server_sq2 =   'localhost';     // Server 1
//$server_sq3 =   'localhost';  // Server 2
//$user_sq2	=   'root';        
//$pass_sq2	=   '12345'; 
//$banco_sq2	=   'bancodados'; 

$server_sq2 = 	addslashes($_SESSION['server_sq2']);  // Server 1
$server_sq3 = 	addslashes($_SESSION['server_sq3']);  // Server 2
$user_sq2	=   addslashes($_SESSION['user_sq2']);
$pass_sq2	=   addslashes($_SESSION['pass_sq2']);
$banco_sq2	=   addslashes($_SESSION['banco_sq2']);

//echo	addslashes($_SESSION['server_sq2'])."<br>";  // Server 1
//echo	addslashes($_SESSION['server_sq3'])."<br>";  // Server 2
//echo	addslashes($_SESSION['user_sq2'])."<br>";
//echo	addslashes($_SESSION['pass_sq2'])."<br>";
//echo	addslashes($_SESSION['banco_sq2'])."<br>";

//break;

$tes_conexao1 = @mysql_connect($server_sq2,$user_sq2,$pass_sq2);

if (mysql_errno() == '2005' or mysql_errno() == '2003'){
	

   $tes_conexao2 = @mysql_connect($server_sq3,$user_sq2,$pass_sq2);
 
   if (mysql_errno() == '2005' or mysql_errno() == '2003'){

    
	     echo "<html>
			  <head>
			  <title>ERRO AO CONECTAR</title>
		      <link rel='shortcut icon' href='../imagens/favicon.ico'/>
			  </head>
			  <body>
								
			  <style type=text/css>
					
			  body { background-image: url('$logo_sis');
		             background-attachment: fixed }
					
			  <!--.cp {  font: bold 10px Arial; color: black}
			  <!--.ti {  font: 9px Arial, Helvetica, sans-serif}
			  <!--.ld { font: bold 15px Arial; color: #000000}
			  <!--.ct { FONT: 9px 'Arial Narrow'; COLOR: #000033}
			  <!--.cn { FONT: 9px Arial; COLOR: black }
			  <!--.bc { font: bold 22px Arial; color: #000000 }
			  --></style> 
					
			  </HEAD>
					
		
			  </html>
				
			<br><br><br><br>
						
			<div align=center>
					
			<table align=center border='15' bgcolor='#FFF8DC'  bordercolor ='$color_bor'>
			<tr>
			<td align=center>
			<font face=arial><b>*** <font color = #FF0000> ERRO SERVIDOR FORA DO AR !!!</font> ***<br>
									         <font face=arial>Tente Novamente mais Tarde</b>
			<table align=center>
			
			<form method='POST' action='login.php'>
			<td><input type=image name='voltar' src='imagens/botao_voltar.PNG'></td>
			</form>

			<form method='POST' action='config/server2.php'>
			<td><input type=image name='voltar' src='imagens/botaoazul46.PNG'></td>
			</form>
			
			</table>
			</td>
			</tr>
			</table>
			</div>";
   	        exit;
   	
   }else{
       
		// Administrador Servidor 2
		
		$host     = $server_sq3;    // Host do servidor
		$user     = $user_sq2;      // Conta do Usuario
		$pass     = $pass_sq2;      // Senha do Usuario
		$db       = $banco_sq2;     // Banco de Dados
        
   }	

}else{
	
        // Administrador Servidor 1
		
		$host     = $server_sq2;    // Host do servidor
		$user     = $user_sq2;      // Conta do Usuario
		$pass     = $pass_sq2;      // Senha do Usuario
		$db       = $banco_sq2;     // Banco de Dados
}
?>
