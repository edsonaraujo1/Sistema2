<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Seguran�a Verificar Senha
 Criado em Data.....: 07/12/2007
 Ultima Atualiza��o : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

require("config.php");

ini_set('session.cache_expire', 1440); // 1440 minutos = 1 dia
ini_set('session.cache_limiter', 'none');
ini_set('session.cookie_lifetime', 0); // O indica que morre quando o browser fecha
ini_set('session.gc_maxlifetime', 86400); // 86400 segundos = 1 dia

session_name("MeuLogin");
session_start();
$nome2 = strtoupper($_POST['nome_log']);

if($_GET['acao'] == "logar") {

// Abre Conex�o com o MySql
include("conexao.php");
//  Chama o Banco de Dados

    $conn = @mysql_connect($host,$user,$pass);			
	//configure os dados do seu MySQL
    $banco = @mysql_select_db($db);			
	//coloque o nome do seu banco de dados
    
    $nome = strtoupper($_POST['nome_log']);
    $q_user = mysql_query("SELECT * FROM tt_ser_01 WHERE login='$nome'");

    $row = @mysql_fetch_array($q_user);
    
	$consulta_zon1  = "SELECT * FROM time_zone ORDER BY zone_id ASC LIMIT 0,1";
	
	$result_zo1 = @mysql_query($consulta_zon1);
	
	$row_zo1 = @mysql_fetch_array($result_zo1);
	
	$id_zo1       = @$row_zo1["zone_id"];
	$id_dat       = @$row_zo1["id_date"];
	
	$dat_zo1 = date("d/m/Y");
	
	if ($id_zo1 >= 0){  // 1 Ano
	
	   if ($id_dat != $dat_zo1)
	   {
	       $id_zo1  = $id_zo1 + 1;
	       $sql_id_seek = "UPDATE `time_zone` SET zone_id = '$id_zo1', id_date = '$dat_zo1'"; 
		
	   }
		 
	@mysql_query($sql_id_seek,$conn);
	  
	 
    }else{
        // Salva Nome do Usuario	
		session_start();	
		$_SESSION['nome_user_1'] = $nome2;
	
?>

<script>
function janelaSecundaria3 (URL){ 
   window.open(URL,"janela3","width=675,height=395,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 
</script>
	
            <html>
			<head>
			<title>EXPIROU !!!</title>
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
			
			<table align=center border='15' bgcolor='#FFFFFF' bordercolor ='<?=$color_bor;?>'>
			<tr>
			<td align=center>
			     <font face=arial><b>  *** ERRO AO ACESSAR O SISTEMA (erro n� 9) ***        <br>
				                     Sistema necessita de manuten��o risco de perda de    <br>
								   dados entrem em contato com o ADMINISTRADOR DO SISTEMA </b>
			<table align=center>
			<form method='POST' action="javascript:janelaSecundaria3('upper.php')">
			<td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
			</form></p>
			</table>
			</td>
			</tr>
			</table>
			</div>
			</body>
			</html>

<?
			
			exit(); 	
}

/// *******************
    
    if(mysql_num_rows($q_user) == 1) {
    
        $query = mysql_query("SELECT * FROM tt_ser_01 WHERE login='$nome'");
        $dados = mysql_fetch_array($query);
        if(strtoupper($_POST['pwd']) == $dados['senha']) {
            session_register("nome_log");
            header("Location: index.php");
			
            $edi1     = @$row["edi1"];
            $edi2     = @$row["edi2"];
            $edi3     = @$row["edi3"];

			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = "VISITA NO SITE -";
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome2', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $conn);


            exit;
        } else {

            header("Location: senha_erro.php?login=falhou&causa=".urlencode(''));
            exit;
        }
    } else {

            header("Location: senha_erro.php?login=falhou&causa=".urlencode(''));
        exit;

    }
}

// Verifica se o login esta correto
if(session_is_registered("nome_log") == false) {
    header("Location: login.php");
}

?>