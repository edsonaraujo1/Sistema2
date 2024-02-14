<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Insert Cadastro
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/2009

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

session_cache_expire(180); //5 minutos por exemplo...

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

include("vaurls.php");

$deixar = acesso_url("CADASTRO");

if ($deixar == "SIM"){

$log_ssoc = $nome3;
$hora = date("d/m/Y"); 

?>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>
<body>

<?

$menssagens = "* * * Incluido * * *";

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

//include("funcoes2.php");

// Resgata Sessao
session_start();

$Edit12    = trim($_SESSION['cnpj_1']);
$Edit4     = trim($_SESSION['comp_nome']);
$Edit5     = trim($_SESSION['nome_1']);
$Edit6     = trim($_SESSION['comp_end']);
$Edit7     = trim($_SESSION['endereco_1']); 
$Edit8     = trim($_SESSION['numero_1']); 
$Edit9     = trim($_SESSION['cep_1']);
$Edit10    = trim($_SESSION['bairro_1']);
$Edit13    = trim($_SESSION['cidade_1']);
$Edit11    = trim($_SESSION['uf_1']);
$Edit1     = trim($_SESSION['Edit1']);
$Edit3     = trim($_SESSION['Edit3']);
$Edit14    = 0; 	
$Edit19    = 0; 	
$Edit20    = "Cadastrado pelo Site";
$condicao  = $_POST['Edit13'];

$Edit15    = ' ';
$Edit16    = ' ';
$Edit17    = ' ';
$Edit18    = ' ';
$nome_adm  = ' ';

/*
echo "<br><br><br>";
echo "codigo "   .$Edit1."<br><br>";
echo "CNPJ "     .$Edit12."<br>";
echo "comp nome ".$Edit4."<br>";
echo "nome "     .$Edit5."<br><br>";
echo "comp end " .$Edit6."<br>";
echo "ende "     .$Edit7."<br>";
echo "numero "   .$Edit8."<br><br>";
echo "cep "      .$Edit9."<br><br>";
echo "bairro "   .$Edit10."<br>";
echo "cidade "   .$Edit13."<br>";
echo "uf  "      .$Edit11."<br><br>";
echo "cod adm "  .$Edit14."<br>";
echo "n. emp "   .$Edit19."<br>";
*/

unset ($_SESSION['Edit1']);
unset ($_SESSION['Edit2']);
unset ($_SESSION['Edit3']);
unset ($_SESSION['Edit4']);
unset ($_SESSION['Edit5']);
unset ($_SESSION['Edit6']);
unset ($_SESSION['cnpj']);
unset ($_SESSION['nome_1']);
unset ($_SESSION['endereco_1']); 
unset ($_SESSION['numero_1']); 
unset ($_SESSION['cep_1']);
unset ($_SESSION['bairro_1']);
unset ($_SESSION['cidade_1']);
unset ($_SESSION['uf_1']);
unset ($_SESSION['comp_nome']);
unset ($_SESSION['comp_end']);


if ($condicao == "EDIFICIOS"){

	$consulta0  = "SELECT * FROM edificios WHERE COD = '$Edit1'";
	
	$resultado0 = @mysql_query($consulta0);
	
	$row0 = @mysql_fetch_array($resultado0);
	
	$id      = @$row0["id"];
	
	if (!empty($id)){
		
		echo ("
				
			     <br>
			     <br>
			     <br>
			     <br>
			     
				 <div align=center>
			
			     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
			     <tr>
			     <td>
			     <font face=arial><b>*** Codigo ja consta no Cadastro !!! ***</b>
			     <table align=center>
			     <form method='POST' action='cadastro.php'>
			     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
			     </form> 
			     </table>
			     </td>
			     </tr>
			     </table>
			     </div>");
	             exit;
		
	// nao incluir codigo ja existe
	
	}else{
		
	     // retorna uma pesquisa
	
		 $consulta01  = "SELECT * FROM edificios WHERE CGC = '$Edit12'";
	
		 $resultado01 = @mysql_query($consulta01);
	
		 $row01 = @mysql_fetch_array($resultado01);
	
		 $id    = @$row01["id"];
	     $cgc   = @$row01["CGC"];
	
		 if (!empty($cgc)){
			
		 	 echo ("
					
				     <br>
				     <br>
				     <br>
				     <br>
				     
					 <div align=center>
				
				     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
				     <tr>
				     <td>
				     <font face=arial><b>*** CNPJ ja consta no Cadastro !!! ***</b>
				     <table align=center>
				     <form method='POST' action='cadastro.php'>
				     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
				     </form> 
				     </table>
				     </td>
				     </tr>
				     </table>
				     </div>");
		             exit;
			
		// nao incluir codigo ja existe
		
		}else{
	
			if ($Edit12 != '*'){
				
			$consulta = "INSERT INTO edificios (COD,
												ATIV,
			                                    DATA,
												COND,
												NOME,
												RUA,
												ENDERECO,
												NUMERO,
												CEP,
												BAIRRO,
												UF,
												CGC,
												CIDADE,
												NU_EMP,
												TIPOIMOV,
												ZONA,
												EMAIL,
												T_MAIL,
												ADM,
												OBS,
												CAMPO_ADM,
												END_02)
			                VALUES
			                                  ('$Edit1',
											   'CONTRIBUINTE',
											   '$Edit3',
											   '$Edit4',
											   '$Edit5',
											   '$Edit6',
											   '$Edit7',
											   '$Edit8',
											   '$Edit9',
											   '$Edit10',
											   '$Edit11',
											   '$Edit12',
											   '$Edit13',
											   '0',
											   '$Edit15',
											   '$Edit16',
											   '$Edit17',
											   '$Edit18',
											   '0',
											   '$Edit20',
											   '$nome_adm',
											   '$Edit20')";
			
			@mysql_query($consulta, $link) or
			
			die("
			     <br>
			     <br>
			     
				 <div align=center>
			
			     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
			     <tr>
			     <td>
			     <font face=arial><b>*** Falha na Inclusão !!! ***</b>
			     <table align=center>
			     <form method='POST' action='cadastro.php'>
			     <td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
			     </form> 
			     </table>
			     </td>
			     </tr>
			     </table>
			     </div>");
			 }
			     
	}
	}
	     
				// Atualiza arquivo Log
				$data_log = date("d/m/Y");
				$hora_log = date("H:i:s"); 
				$even_log = $menssagens."/EDIF-"."Site Receita".$Edit1;
				
				$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
				             VALUES
				             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
				
				@mysql_query($consulta_log, $link);
	

}else{
	

		$consulta0  = "SELECT * FROM adms WHERE cod = '$Edit1'";
		
		$resultado0 = @mysql_query($consulta0);
		
		$row0 = @mysql_fetch_array($resultado0);
		
		$id      = @$row0["id"];
		
		if (!empty($id)){
			
			echo ("
					
				     <br>
				     <br>
				     <br>
				     <br>
				     
					 <div align=center>
				
				     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
				     <tr>
				     <td>
				     <font face=arial><b>*** Codigo ja consta no Cadastro !!! ***</b>
				     <table align=center>
				     <form method='POST' action='cadastro.php'>
				     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
				     </form> 
				     </table>
				     </td>
				     </tr>
				     </table>
				     </div>");
		             exit;
			
		// nao incluir codigo ja existe
		
		}else{
			
		     // retorna uma pesquisa
		
			 $consulta01  = "SELECT * FROM adms WHERE cgc = '$Edit12'";
		
			 $resultado01 = @mysql_query($consulta01);
		
			 $row01 = @mysql_fetch_array($resultado01);
		
			 $id    = @$row01["id"];
		     $cgc   = @$row01["cgc"];
		
			 if (!empty($cgc)){
				
			 	 echo ("
						
					     <br>
					     <br>
					     <br>
					     <br>
					     
						 <div align=center>
					
					     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
					     <tr>
					     <td>
					     <font face=arial><b>*** CNPJ ja consta no Cadastro !!! ***</b>
					     <table align=center>
					     <form method='POST' action='cadastro.php'>
					     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
					     </form> 
					     </table>
					     </td>
					     </tr>
					     </table>
					     </div>");
			             exit;
				
			// nao incluir codigo ja existe
			
			}else{
		
				if ($Edit12 != '*'){
					
				$consulta = "INSERT INTO adms      (cod,
													ativa,
				                                    data,
													nome1,
													nomeadm,
													rua,
													endadm,
													numero,
													cep,
													bairroadm,
													ufadm,
													cgc,
													cidadm,
													nu_pred,
													zona,
													email,
													t_mail,
													obs,
													end_02)
				                VALUES
				                                  ('$Edit1',
												   'ATIVA',
												   '$Edit3',
												   '$Edit4',
												   '$Edit5',
												   '$Edit6',
												   '$Edit7',
												   '$Edit8',
												   '$Edit9',
												   '$Edit10',
												   '$Edit11',
												   '$Edit12',
												   '$Edit13',
												   '0',
												   '$Edit16',
												   '$Edit17',
												   '$Edit18',
												   '$Edit20',
												   '$Edit20')";
				
				@mysql_query($consulta, $link) or
				
				die("
				     <br>
				     <br>
				     
					 <div align=center>
				
				     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
				     <tr>
				     <td>
				     <font face=arial><b>*** Falha na Inclusão !!! ***</b>
				     <table align=center>
				     <form method='POST' action='cadastro.php'>
				     <td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
				     </form> 
				     </table>
				     </td>
				     </tr>
				     </table>
				     </div>");
				 }
				     
		}
		}
		     
					// Atualiza arquivo Log
					$data_log = date("d/m/Y");
					$hora_log = date("H:i:s"); 
					$even_log = $menssagens."/ADMS-"."Site Receita".$Edit1;
					
					$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
					             VALUES
					             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
					
					@mysql_query($consulta_log, $link);
	
	
}     
?>

<html>

<style type=text/css>

body { background-image: url(<?="../".$logo_sis;?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
--></style>

</html >

<?

if ($condicao == "EDIFICIOS"){
	
	$condicao = "EMPRESAS";

}else{
	
	$condicao = "ADM/CONTABILIDADE";
	
}

	 	 echo ("
				
			     <br>
			     <br>
			     <br>
			     <br>
			     
				 <div align=center>
			
			     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
			     <tr>
			     <td>
			     <font face=arial><b>*** Informações salvas em $condicao com Sucesso !!! ***</b>
			     <table align=center>
			     <form method='POST' action='cadastro.php'>
			     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
			     </form> 
			     </table>
			     </td>
			     </tr>
			     </table>
			     </div>");
	             exit;


}else{
	
include("enaaurlnp.php");
	
}
?>
