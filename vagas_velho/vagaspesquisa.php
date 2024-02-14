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

require("../logar.php");
$nome3 = $_SESSION["nome_log"];

require("menu.php");

$Opcao     = $_POST['Edit1'];
$Procura   = Trim($_POST['Edit2']);

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

    $consulta  = "SELECT * FROM vaga WHERE COD = '$Procura' ORDER BY COD";
}
if ($Opcao == "FUNÇÃO"){

    $consulta  = "SELECT * FROM vaga WHERE FUNCAO like '$Procura%' ORDER BY FUNCAO";
}
if ($Opcao == "ADM./EDIF."){

    $consulta  = "SELECT * FROM vaga WHERE NOME = '$Procura%' ORDER BY NOME";
}
if ($Opcao == "CONTATO"){

    $consulta  = "SELECT * FROM vaga WHERE CONTATO = '$Procura%' ORDER BY CONTATO";
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
     <form method='POST' action='cadvagas.php?Cod_xx=1'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");
     
$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id     = @$row["id"];
$Edit1  = @$row["COD"];
$Edit2  = @$row["SITU"];
$Edit3  = @$row["DATA"];
$Edit4  = @$row["FUNCAO"];
$Edit5  = @$row["QTD"];
$Edit6  = @$row["ENCA"];
$Edit7  = @$row["NOME"];
$Edit8  = @$row["ENDERECO"];
$Edit9  = @$row["BAIRRO"];
$Edit10 = @$row["CIDADE"];
$Edit11 = @$row["ESTADO"]; 
$Edit12 = @$row["CEP"];
$Edit13 = @$row["TELEFONE"];
$Edit14 = @$row["CONTATO"];
$Edit15 = @$row["OBS"];

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
    <head>
    <title><?=$Titulo;?></title>
    <link rel="shortcut icon" href="../imagens/favicon.ico"/>
    </head>
	
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

    include("help.php");
	
	require("vagaslayout.php")
	?>
	
	</html>

    <?

}else{
	
	?>	

	<html>
	<head>
	<title><?=$Titulo;?></title>
	<link rel="shortcut icon" href="../imagens/favicon.ico"/>
	</head>
	
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

	require("vagasconsulta.php")
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
