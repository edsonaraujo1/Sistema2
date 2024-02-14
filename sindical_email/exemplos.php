<?
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

$Edit1        = strtoupper($_POST['Edit1']); // Edificios
$Edit2        = $_POST['Edit2'];             // Codigo
$Edit3        = strtoupper($_POST['Edit3']); // Sim/Nao
$Edit4        = $_POST['Edit4'];             // E-mail

echo $Edit1."<br>";
echo $Edit2."<br>";
echo $Edit3."<br>";
echo $Edit4."<br>";
//echo $Edit5."<br>";
//echo $Edit6."<br>";
//echo $Edit7."<br>";
//echo $Edit8."<br>";

$menssagem = "Envio de E_mail";
?>

<html>
<head>
<title><?=$Titulo;?></title>
</head>
<body>

<style type=text/css>

body { background-image: url(<?="../".$logo_sis;?>);
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

<?
      
// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

if ($Edit1 == "EDIFICIOS")
{
	
	$consulta00  = "SELECT * FROM edificios WHERE COD = '$Edit2'";
	
	$resultado00 = @mysql_query($consulta00);
	
	$row00 = @mysql_fetch_array($resultado00);
	
	$id_1             	= @$row00["id"];
	$email_edificios  	= @$row00["EMAIL"];
	$id_conf2  			= @$row00["EMAIL"];
	$nome_edif 			= @$row00["NOME"];
	$link_edif 			= @$row00["COD"];
	$cnpj_link 			= @$row00["CGC"];
	$exec_link 			= @$row00["EXEC"];
	
	$erros = "";
		
		   
	if ($Edit3 == "NAO")
	{
	    $id_conf = Trim($Edit4);	
	}else{
	       	
	    $id_conf = $email_edificios;
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
			   $phpmail->AddAddress("isysmp@isysmp.com"); // Trocar CCo
		   
		   
	       	   $message .= "   <img src='http://www.sindificios.com.br/sistemaXP/../imagens/Logo1.JPG'><br><br>
	                           Sindicato dos Empregados de Edificios e Condominios Residenciais e Comerciais<br>
	                           de Sao Paulo, Zelador, Porteiros, Cabineiros, Vigias, Faxineiros, Serventes e Outros<br>
	                           Sede - Rua Sete de Abril, 34 Centro - Sao Paulo - Cep 01044-901<br>
		                       <b>Ja esta disponivel no site do Sindificios a guia Referente contribuicao Sindical&nbsp;&nbsp;$exec_link</b><br><br>";
		                       
	           $message .= "   Nome da empresa:&nbsp;&nbsp;&nbsp;<b>$nome_edif</b>&nbsp;&nbsp;-&nbsp;&nbsp;CNPJ:&nbsp;&nbsp;<b>$cnpj_link</b><br>
							   Para Visualizar e Imprimir = <a href='http://www.sindificios.com.br/sistemaXP/sindic/sindical_email/sindical_link.php?cod_recue=$link_edif'>Clique aqui</a>&nbsp;&nbsp;<br>";
 	           $message .= "   Ou entre no <a href='http://www.sindificios.com.br/sindical/index.php'>www.sindificios.com.br</a> em Guia Sindical<br>
							   Qualquer Duvida sobre a autenticidade deste Link ligue para 11-3123-3211 Ramal 3260 ou 3273";
	
  
  							    $phpmail->Subject = "Envio de Guia Sindical";
							    $phpmail->Body .= "Link Guia Sindical Sindificios";
							    $phpmail->Body .= "$message";
							    $phpmail->Body .= " ".nl2br($_POST['mensagem'])."<br />";
							    
							    $send = $phpmail->Send();
							
							    if($send){
							    	
							    	
									echo "<br><br><br>
										  <div align=center>
										  <table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='$color_bor'>
										  <tr>
										  <td align=center>
										  <font face=arial><b>*** links Enviados com SUCESSO !!! ***<br>Para</b>&nbsp;$id_conf
									                    
										  <table align=center>
										  <form method='POST' action='$index_sair'>
										  <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
										  </form>  
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
										  </form>  
										  </table>
										  </td>
										  </tr>
										  </table>
										  </div>";
							    	
							    	
							    	
							    }	

  
  
	}	   


	
}else{

	// Tabela Administradora

    $consultaxx  = "SELECT * FROM adms WHERE cod = '$Edit2'";
	
    $resultadoxx = @mysql_query($consultaxx);

    $rowxx = @mysql_fetch_array($resultadoxx);

    $id_adms     = @$rowxx["id"];
    $cod_adms    = @$rowxx["cod"];
    $texto_1     = @$rowxx["nomeadm"];
    $cnpj_adms   = @$rowxx["cgc"];
    $e_mail_adms = @$rowxx["email"];

	
    $consulta01  = "SELECT * FROM edificios_sindical WHERE ADMS = $Edit2 AND ATIVIDADE != 'NAO CONTRIBUINTE'";
		
    $resultado01 = @mysql_query($consulta01);
		
	$nu_rec = mysql_num_rows($resultado01);
    
    while ($linha = @mysql_fetch_array($resultado01))
    {
           $link_nov  = $linha["CODIGO"];
		   $nome_edif = $linha["SACADO"];
		   $cnpj_link = $linha["CNPJ"];
		   $exec_link = $linha["EXEC"];

    	   for ($fa=0; $fa <1; $fa++)
    	   {
    	   	 $fa1++;
             $link_dd_mov[$fa1]  = $link_nov;
			 $link_dd_edif[$fa1] = $nome_edif;
			 $link_dd_cnpj[$fa1] = $cnpj_link;
			 $link_dd_exec[$fa1] = $exec_link;
			      		
    	   }	
       
     }
//     echo "<br><br>";
//     echo $link_dd_mov[0]." - ".$link_dd_edif[0]." - ".$link_dd_cnpj[0]."<br>";
//     echo $link_dd_mov[1]." - ".$link_dd_edif[1]." - ".$link_dd_cnpj[1]."<br>";
//     echo $link_dd_mov[2]." - ".$link_dd_edif[2]." - ".$link_dd_cnpj[2]."<br>";
//     echo $link_dd_mov[3]." - ".$link_dd_edif[3]." - ".$link_dd_cnpj[3]."<br>";
	
	 $consulta  = "SELECT * FROM edificios_sindical WHERE ADMS = $Edit2 AND ATIVIDADE != 'NAO CONTRIBUINTE'";
			
	 $resultado = @mysql_query($consulta);
			
	 while ($linha = @mysql_fetch_array($resultado))
	 {
		   $id_conf2  = $linha["EMAIL"];
		   $nome_edif = $linha["SACADO"];
		   $link_edif = $linha["CODIGO"];
		   $cnpj_link = $linha["CNPJ"];
		   $exec_link = $linha["EXEC"];
		   
	       if ($Edit3 == "NAO")
	       {
	           $id_conf = Trim($Edit4);	
	       }else{
	       	
	       	   $id_conf = $e_mail_adms;
	       }


	       $smtp = new SMTPMAIL();
	       $smtp->Servidor      ='smtp.sindificios.com.br';
	       $smtp->Autenticado   = TRUE;
	       $smtp->Usuario       = "edson@sindificios.com.br";
	       $smtp->Senha         = "tty$%909";
	       $smtp->Codificacao   = "UTF-8";
	       $smtp->EmailDe       = 'sindificios@sindificios.com.br';
	       $smtp->EmailDeVisual = 'Sindificios <sindificios@sindificios.com.br>';
	       $smtp->Assunto       = 'Envio de Boletos SINDIFICIOS';
	       $smtp->EmailPara     = $id_conf; // Destinatario
	       $smtp->Corpo .= "   <img src='http://www.sindificios.com.br/sistemaXP/../imagens/Logo1.JPG'><br><br>
	                           Sindicato dos Empregados de Edificios e Condominios Residenciais e Comerciais<br>
	                           de Sao Paulo, Zelador, Porteiros, Cabineiros, Vigias, Faxineiros, Serventes e Outros<br>
	                           Sede - Rua Sete de Abril, 34 Centro - Sao Paulo - Cep 01044-901<br>
		                       <b>Ja esta disponivel no site do Sindificios a guia Referente contribuicao Sindical&nbsp;&nbsp;$exec_link</b><br>
							   Nome Administradora:&nbsp;&nbsp;&nbsp;<b>$texto_1</b>&nbsp;&nbsp;-&nbsp;&nbsp;CNPJ:&nbsp;&nbsp;<b>$cnpj_adms</b><br><br>";
	
	//     $smtp->anexarArquivo('contato.html');
	    
     }
    
     // fim da consulta dos links
     for ($fa=1; $fa <=$nu_rec; $fa++)
     {
     	
	 $smtp->Corpo .= "   Nome da empresa:&nbsp;&nbsp;&nbsp;<b>$link_dd_edif[$fa]</b>&nbsp;&nbsp;-&nbsp;&nbsp;CNPJ:&nbsp;&nbsp;<b>$link_dd_cnpj[$fa]</b><br>
                         Para Visualizar e Imprimir = <a href='http://www.sindificios.com.br/sistemaXP/sindic/sindical_email/sindical_link.php?cod_recue=$link_dd_mov[$fa]'>Clique aqui</a>&nbsp;&nbsp;<br>";
     }


	 $smtp->Corpo .= "   Ou entre no <a href='http://www.sindificios.com.br/sindical/index.php'>www.sindificios.com.br</a> em Guia Sindical<br>
						 Qualquer Duvida sobre a autenticidade deste Link ligue para 11-3123-3211 Ramal 3260 ou 3273";


//echo $nu_rec."<br>";
    
    if ($nu_rec > 0){
	 if($smtp->Enviar()) {
	    echo 'ok';
	 } else {
	    	   	
	       // echo 'Enviado para '.$nome_edif."<br>";
	        
	    }
		   
			echo "<br><br><br>
				  <div align=center>
				  <table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='$color_bor'>
				  <tr>
				  <td align=center>
				  <font face=arial><b>*** links Enviados com SUCESSO !!! ***<br>Para</b>&nbsp;$id_conf
			                    
				  <table align=center>
				  <form method='POST' action='$index_sair'>
				  <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
				  </form>  
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
				  <font face=arial><b>*** Administradora não possui nenhum predio ***<br>links nao Enviados !!!</b>
			                    
				  <table align=center>
				  <form method='POST' action='$index_sair'>
				  <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
				  </form>  
				  </table>
				  </td>
				  </tr>
				  </table>
				  </div>";
	
	
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