<?
/*
 ----------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Selecionar Maneira de Pesquisa
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ----------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

require($path."logar.php");
$nome3 = $_SESSION["nome_log"];

require("menu.php");

$Opcao     = $_POST['Edit1_ed'];
$Procura   = Trim($_POST['Edit2_ed']);

// salva Secao
session_start();
$_SESSION['Procura_up'] = trim($Procura);
$_SESSION['Opcao_up']   = $Opcao;

// Abre Conexão com o MySql
include($path."conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// retorna uma pesquisa

if ($Opcao == "CODIGO"){

    $consulta  = "SELECT * FROM edificios WHERE COD = '$Procura' ORDER BY COD";
}
if ($Opcao == "NOME"){

    $consulta  = "SELECT * FROM edificios WHERE NOME like '$Procura%' ORDER BY NOME";
}
if ($Opcao == "ENDEREÇO"){

    $consulta  = "SELECT * FROM edificios WHERE ENDERECO = '$Procura' ORDER BY ENDERECO";
}
if ($Opcao == "CNPJ"){

    $consulta  = "SELECT * FROM edificios WHERE CGC = '$Procura' ORDER BY CGC";
}

// Retorno o Resultado da Pesquisa

@mysql_query($consulta, $link) or

die("
     <br>
     <br>
     
	 <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='#4682B4'>
     <tr>
     <td>
     <font face=arial><b>*** Falha na Consulta !!! ***</b>
     <table align=center>
     <form method='POST' action='javascript:history.go(-1)'>
     <td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");
     
$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id       = @$row["id"];
$cod_ED   = @$row["COD"];
$cond     = @$row["COND"];
$nome     = @$row["NOME"];
$cnpj     = @$row["CGC"];



			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = "CONSULTA/ALTERACAO/".$cod_ED;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);


If (!empty($id)){

    ?>
	<html>
	<style type=text/css>
	
	body { background-image: url(<?=$logo_sis;?>);}
	
	<!--.cp {  font: bold 10px Arial; color: black}
	<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
	<!--.ld { font: bold 15px Arial; color: #000000}
	<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
	<!--.cn { FONT: 9px Arial; COLOR: black }
	<!--.bc { font: bold 22px Arial; color: #000000 }
	--></style>
	
	<?
	
    // Salva Sessao
    session_name("Val_Socio");
	
	session_start();
	$_SESSION['codedif'] = $cod_ED;
	
	require("soclayout3.php")
	?>
	
	</html>

    <?

}else{
	
	?>	

	<html>
	<style type=text/css>
	
	body { background-image: url(<?=$logo_sis;?>);}
	
	<!--.cp {  font: bold 10px Arial; color: black}
	<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
	<!--.ld { font: bold 15px Arial; color: #000000}
	<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
	<!--.cn { FONT: 9px Arial; COLOR: black }
	<!--.bc { font: bold 22px Arial; color: #000000 }
	--></style>
	
	<?
	$menssagem = "* * * Não Encontrado * * *";

	require("edifconsulta.php")
	?>
	
	<SCRIPT LANGUAGE='JavaScript'>
	<!--
	alert("Registro não Encontrado !!!");
	//-->
	</script>
	</html>

	<?	
}	

?>
