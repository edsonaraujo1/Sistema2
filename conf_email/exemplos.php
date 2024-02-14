<?php
/*
 ----------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Enviar Link de impressao Sindical
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/04/2009 

 DEUS SEJA LOUVADO
 ----------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

$index_sair = "../index.php";

include("menu.php");

$Edit1        = strtoupper($_POST['Edit1']); // Edificios ou Administradora
$Edit2        = trim($_POST['Edit2']);       // Tipo Contribuicao
$Edit3        = strtoupper($_POST['Edit3']); // Vencimento
$Edit4        = substr($_POST['Edit4'],0,1); // Instrucao da guia
$Edit5        = $_POST['Edit5'];             // Codigo Edif ou Adms
$Edit6        = $_POST['Edit6'];             // Sim/Nao email
$Edit7        = $_POST['Edit7'];             // E-mail
$Edit8        = strtoupper($_POST['Edit8']);
$Edit9        = strtoupper($_POST['Edit9']); // nome Adms

//echo "<br><br><br>";
//echo $Edit1."<br>";
//echo $Edit2."<br>";
//echo $Edit3."<br>";
//echo $Edit4."<br>";
//echo $Edit5."<br>";
//echo $Edit6."<br>";
//echo $Edit7."<br>";
//echo $Edit9."<br>";

//break;

$exer = substr($Edit3,6,4);

$monthName = array(1=>"Janeiro",  "Fevereiro", "Marco",
                                    "Abril",    "Maio",      "Junho",    "Julho",   "Agosto",
                                    "Setembro", "Outubro",   "Novembro", "Dezembro");

/* mes referencia */

$rest = substr($Edit3, 3,2);
$rest2 = strval($rest)-1;
$mEs =$rest2;

$venc_ref = strtoupper($monthName[$mEs]);

$menssagem = "Envio de E_mail";
?>

<html>
<head>
<title><?php echo $Titulo;?></title>
</head>
<body>

<style type=text/css>

body { background-image: url(<?php echo "../".$logo_sis;?>);
       background-attachment: fixed }

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
-->
</style> 


</body>
</html>

<?php
      
// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

if ($Edit1 == "EDIFICIOS")
{
	
	$consulta00  = "SELECT * FROM edificios WHERE COD = '$Edit5'";
	
	$resultado00 = @mysql_query($consulta00);
	
	$row00 = @mysql_fetch_array($resultado00);
	
	$id_1             	= @$row00["id"];
	$email_edificios  	= @$row00["EMAIL"];
	$id_conf2  			= @$row00["EMAIL"];
	$nome_edif 			= @$row00["COND"]." ".@$row00["NOME"];
	$link_edif 			= @$row00["COD"];
	$cnpj_link 			= @$row00["CGC"];
	$exec_link 			= @$row00["EXEC"];
	
	$erros = "";
		
		   
	if ($Edit6 == "NAO")
	{
	    $id_conf = Trim($Edit7);	
	}else{
	       	
	    $id_conf = $email_edificios;
	}

 	include_once('phpmailer/class.phpmailer.php');
		   
		   
		   if( empty($erros) ){
			
		       $phpmail = new PHPMailer();
			
			
		       $phpmail->IsSMTP();                         // Envia por SMTP
		       $phpmail->Mailer   = "smtp";
		       $phpmail->Host     = "200.230.157.160"; // "smtp.sindificios.com.br";       // SMTP servers
			   $phpmail->SMTPAuth = true;                  // Caso o servidor SMTP precise de autenticação
			   $phpmail->Port     = 2525;
			   $phpmail->Username = "edson@sindificios.com.br";   // SMTP username
			   $phpmail->Password = "tty$%909";            // SMTP password
			
			   $phpmail->IsHTML(true);
			   $phpmail->From     = "sindificios@sindificios.com.br";   // Retorno CC
			   $phpmail->FromName = "Sindificios <sindificios@sindificios.com.br>";
			
			   $phpmail->AddAddress($id_conf);       // Destino
			   //$phpmail->AddAddress("isysmp@isysmp.com"); // Trocar CCo
		   
		   
	       	   $message .= "   <center><img src='http://www.sindificios.com.br/sistemaXP/../imagens/Logo1.JPG'></center><br><br>
	                           Sindicato dos Empregados de Edificios e Condominios Residenciais e Comerciais<br>
	                           de Sao Paulo, Zelador, Porteiros, Cabineiros, Vigias, Faxineiros, Serventes e Outros<br>
	                           Sede - Rua Sete de Abril, 34 Centro - Sao Paulo - Cep 01044-901<br>
		                       <b>Abaixo segue a(s) guia(s) Referente contribuicao&nbsp; $Edit2&nbsp;de&nbsp;$venc_ref/$exer</b><br><br>";
		                       
	           $message .= "   <table width='100%' border='0'>
                               <tr>
					           <td width='50%'>Nome da empresa:&nbsp;&nbsp;&nbsp;<b>$nome_edif</b></td>
					           <td width='30%'>CNPJ:&nbsp;&nbsp;<b>$cnpj_link</b></td>
						       </tr>
						       </table>";
						       
						       
               if ($Edit2 != "SINDICAL"){
               	
                    $message .= "   Para Visualizar e Imprimir = <a href='http://www.isysmp.com/sind/web_conf/edifguias3.php?cod_recue=$link_edif&vencto=$Edit3&instrucao=$Edit4&nudoc=$Edit5'>Clique aqui</a>&nbsp;&nbsp;<br>";
               	
               	
               }else{
               	
               	    $message .= "   Para Visualizar e Imprimir = <a href='http://www.isysmp.com/sind/web_conf/sindical3.php?cod_recue=$link_edif&vencto=$Edit3&instrucao=$Edit4&nudoc=$Edit5'>Clique aqui</a>&nbsp;&nbsp;<br>";

               }						       
                               
 	           $message .= "   Ou entre no <a href='http://www.sindificios.com.br/sindical/index.php'>www.sindificios.com.br</a> em Guia Sindical<br>
							   Qualquer Duvida sobre a autenticidade deste Link ligue para 11-3123-3211 Ramal 3260 ou 3273";
	
  
  							    $phpmail->Subject = "Envio de Guia Sindical";
							    $phpmail->Body .= " ";
							    $phpmail->Body .= "$message";
							    $phpmail->Body .= " ".nl2br($_POST['mensagem'])."<br />";
							    
							    $send = $phpmail->Send();
							
							    if($send){
							    	
							    	
									echo "<br><br><br>
										  <div align=center>
										  <table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='$color_bor'>
										  <tr>
										  <td align=center>
										  <font face=arial><b>*** links Enviados com SUCESSO !!! ***<br>Para</b>&nbsp;$nome_edif<br>
										  <b>no e-mail.:</b>&nbsp;$id_conf
									                    
										  <table align=center>
										  <form method='POST' action='$index_sair'>
										  <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
										  </form></p>
										  </table>
										  </td>
										  </tr>
										  </table>
										  </div>";
													    	
							    }else{
							    	
									echo "<br><br><br>
										  <div align=center>
										  <table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='$color_bor'>
										  <tr>
										  <td align=center>
										  <font face=arial><b>*** links Não Foi Enviados Tente novamente!!! ***<br>Para</b>&nbsp;$id_conf
									                    
										  <table align=center>
										  <form method='POST' action='$index_sair'>
										  <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
										  </form></p>
										  </table>
										  </td>
										  </tr>
										  </table>
										  </div>";
							    	
							    	
							    	
							    }	

  
  
	}	   


	
}else{

	// Tabela Administradora

    $consultaxx  = "SELECT * FROM adms WHERE cod = '$Edit5'";
	
    $resultadoxx = @mysql_query($consultaxx);

    $rowxx = @mysql_fetch_array($resultadoxx);

    $id_adms     = @$rowxx["id"];
    $cod_adms    = @$rowxx["cod"];
    $texto_1     = @$rowxx["nomeadm"];
    $cnpj_adms   = @$rowxx["cgc"];
    $e_mail_adms = @$rowxx["email"];

	
    $consulta01  = "SELECT * FROM edificios WHERE ADM = $Edit5 AND ATIV != 'NAO CONTRIBUINTE'";
		
    $resultado01 = @mysql_query($consulta01);
		
	$nu_rec = mysql_num_rows($resultado01);
    
	$erros = "";
		
		   
	if ($Edit6 == "NAO")
	{
	    $id_conf = Trim($Edit7);	
	}else{
	       	
	    $id_conf = $e_mail_adms;
	}
	
 	       include_once('phpmailer/class.phpmailer.php');
		   
		   
		   if( empty($erros) ){
			
		       $phpmail = new PHPMailer();
			
			
		       $phpmail->IsSMTP();                         // Envia por SMTP
		       $phpmail->Mailer   = "smtp";
		       $phpmail->Host     = "smtp.sindificios.com.br";       // SMTP servers
			   $phpmail->SMTPAuth = true;                  // Caso o servidor SMTP precise de autenticação
			   $phpmail->Port     = 2525;
			   $phpmail->Username = "edson@sindificios.com.br";   // SMTP username
			   $phpmail->Password = "tty$%909";            // SMTP password
			
			   $phpmail->IsHTML(true);
			   $phpmail->From     = "sindificios@sindificios.com.br";   // Retorno CC
			   $phpmail->FromName = "Sindificios <sindificios@sindificios.com.br>";
			
			   $phpmail->AddAddress($id_conf);       // Destino
			   //$phpmail->AddAddress("isysmp@isysmp.com"); // Trocar CCo
			
	       	   $message .= "   <center><img src='http://www.sindificios.com.br/sistemaXP/../imagens/Logo1.JPG'></center><br><br>
	                           Sindicato dos Empregados de Edificios e Condominios Residenciais e Comerciais<br>
	                           de Sao Paulo, Zelador, Porteiros, Cabineiros, Vigias, Faxineiros, Serventes e Outros<br>
	                           Sede - Rua Sete de Abril, 34 Centro - Sao Paulo - Cep 01044-901<br>
		                       <b>Abaixo segue a(s) guia(s) Referente contribuicao&nbsp; $Edit2&nbsp;de&nbsp;$venc_ref/$exer<br>
							   Para&nbsp;$texto_1</b><br><br>";
	
	//     $smtp->anexarArquivo('contato.html');
			
	 while ($linha = @mysql_fetch_array($resultado01))
	 {
	 	
		   $nome_edif = trim($linha["COND"]." ".$linha["NOME"]);
		   $link_edif = $linha["COD"];
		   $cnpj_link = trim($linha["CGC"]);
		   $exec_link = $linha["EXEC"];
    
     // fim da consulta dos links
//     for ($fa=1; $fa <=$nu_rec; $fa++)
//     {
     	
	     $message .= "    <table width='100%' border='0'>
                          <tr>
					      <td width='50%'>Nome da empresa:&nbsp;&nbsp;&nbsp;<b>$nome_edif</b></td>
					      <td width='30%'>CNPJ:&nbsp;&nbsp;<b>$cnpj_link</b></td>
						  </tr>
						  </table>";
   
		 
               if ($Edit2 != "SINDICAL"){
               	
                    $message .= "   Para Visualizar e Imprimir = <a href='http://www.isysmp.com/sind/web_conf/edifguias3.php?cod_recue=$link_edif&vencto=$Edit3&instrucao=$Edit4&nudoc=$link_edif'>Clique aqui</a>&nbsp;&nbsp;<br>";
               	
               	
               }else{
               	
               	    $message .= "   Para Visualizar e Imprimir = <a href='http://www.isysmp.com/sind/web_conf/sindical3.php?cod_recue=$link_edif&vencto=$Edit3&instrucao=$Edit4&nudoc=$link_edif'>Clique aqui</a>&nbsp;&nbsp;<br>";

               }						       
		 

//     }

     }

	 $message .=     "   Ou entre no <a href='http://www.sindificios.com.br/sindical/index.php'>www.sindificios.com.br</a> em Guia Sindical<br>
						 Qualquer Duvida sobre a autenticidade deste Link ligue para 11-3123-3211 Ramal 3260 ou 3273";


//echo $nu_rec."<br>";
    
 							    $phpmail->Subject = "Envio de Guia Sindical";
							    $phpmail->Body .= " ";
							    $phpmail->Body .= "$message";
							    $phpmail->Body .= " ".nl2br($_POST['mensagem'])."<br />";
							    
							    $send = $phpmail->Send();
							
							    if($send){
							    	
							    	
									echo "<br><br><br>
										  <div align=center>
										  <table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='$color_bor'>
										  <tr>
										  <td align=center>
										  <font face=arial><b>*** links Enviados com SUCESSO !!! ***<br>Para</b>&nbsp;$texto_1<br>
										  <b>no e-mail.:</b>&nbsp;$id_conf
									                    
										  <table align=center>
										  <form method='POST' action='$index_sair'>
										  <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
										  </form></p>
										  </table>
										  </td>
										  </tr>
										  </table>
										  </div>";
													    	
							    }else{
							    	
									echo "<br><br><br>
										  <div align=center>
										  <table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='$color_bor'>
										  <tr>
										  <td align=center>
										  <font face=arial><b>*** links Não Foi Enviados Tente novamente!!! ***<br>Para</b>&nbsp;$id_conf
									                    
										  <table align=center>
										  <form method='POST' action='$index_sair'>
										  <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
										  </form></p>
										  </table>
										  </td>
										  </tr>
										  </table>
										  </div>";
							    	
							    	
							    	
							    }	

  
  
	}	   

}
			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = $menssagem."/".$Edit2."/".$id_conf;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);

// Fim da Função Navegar pelo registro
?>
