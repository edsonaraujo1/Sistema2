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

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

$Opcao     = $_POST['Edit1'];
$Procura   = $_POST['Edit2'];

// salva Secao
session_start();
$_SESSION['Procura'] = Trim($Procura);
$_SESSION['Opcao']   = $Opcao;

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass)
        or

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Não foi possivel conectar !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

@mysql_select_db($db)
        or

die("
     <br>
     <br>

     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Não Foi possivel selecionar o banco de dados !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

// retorna uma pesquisa

if ($Opcao == "CODIGO"){

    $consulta  = "SELECT * FROM instrucao WHERE Edit1 = '$Procura' ORDER BY Edit1";
}

// Retorno o Resultado da Pesquisa

@mysql_query($consulta, $link) or

die("
     <br>
     <br>
     
	 <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Falha na Consulta !!! ***</b>
     <table align=center>
     <form method='POST' action='cadinstrucao.php?Cod_xx=1'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");
     
$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id      = @$row["id"];
$Edit1   = @$row["Edit1"];
$Edit2   = @$row["Edit2"];
$Edit3   = @$row["Edit3"];
$Edit4   = @$row["Edit4"];
$Edit5   = @$row["Edit5"];
$Edit6   = @$row["Edit6"];
$Edit7   = @$row["Edit7"];
$Edit8   = @$row["Edit8"];
$Edit9   = @$row["Edit9"];
$Edit10  = @$row["Edit10"];
$Edit11  = @$row["Edit11"];
$Edit12  = @$row["Edit12"];
$Edit13  = @$row["Edit13"];
$Edit14  = @$row["Edit14"];
$Edit15  = @$row["Edit15"];
$Edit16  = @$row["Edit16"];
$Edit17  = @$row["Edit17"];


// Abrir tabela Senha

$tabela_1 = strtoupper('instrucao');

$consulta3 = "SELECT * FROM permissoes WHERE login = '$nome3' and tabela = '$tabela_1'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];


			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = "CONSULTA/".$Edit1;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);


If (!empty($id)){

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
	
	<?
	// Resgata a Sessao
	session_start();
	$Procura = strtoupper($_SESSION['Procura']);
	$Opcao   = strtoupper($_SESSION['Opcao']);
	
	include("instrulayout.php");
	include("botoes.php");
	?>
	
	</html>

    <?

}else{
	
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
	
	<?
	$menssagem = "* * * Não Encontrado * * *";

	include("instruconsulta.php")
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
