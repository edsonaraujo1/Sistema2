<?
/*
 ----------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Selecionar Maneira de Pesquisa
 Criado em Data.....: 07/12/2007
 Ultima Atualiza��o : 21/01/2009 

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
$Procura   = trim($_POST['Edit2']);

// salva Secao
session_start();
$_SESSION['Procura'] = Trim($Procura);
$_SESSION['Opcao']   = $Opcao;

$_SESSION['tipo_acao'] = 'alterar_1';

// Abre Conex�o com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass)
        or

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** N�o foi possivel conectar !!! ***</b>
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

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** N�o Foi possivel selecionar o banco de dados !!! ***</b>
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

if ($Opcao == "MATRICULA"){

    $consulta  = "SELECT * FROM saude_atendi WHERE matricula = '$Procura' ORDER BY matricula";
}
if ($Opcao == "TITULAR"){

    $consulta  = "SELECT * FROM saude_atendi WHERE titular like  '$Procura%' ORDER BY titular";
}
if ($Opcao == "DEPENDENTE"){

    $consulta  = "SELECT * FROM saude_atendi WHERE dependente like '$Procura%' ORDER BY dependente";
}
if ($Opcao == "MEDICO"){

    $consulta  = "SELECT * FROM saude_atendi WHERE dentista like '$Procura%' ORDER BY dentista";
}

// Retorno o Resultado da Pesquisa

@mysql_query($consulta, $link) or

die("
     <br>
     <br>
     
	 <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Falha na Consulta !!! ***</b>
     <table align=center>
     <form method='POST' action='cadastro.php?Cod_xx=1'>
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
$Edit1  = @$row["matricula"];
$Edit2  = @$row["titular"];
$Edit3  = @$row["mes"];
$Edit4  = @$row["ano"];
$Edit5  = @$row["dependente"];
$Edit6  = @$row["dentista"];
$Edit7  = @$row["procedimento"];

// Abrir tabela Senha

$tabela_1 = strtoupper('saude_atendi');

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
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<style type="text/css" media="print">
div.invisivel {
visibility: hidden; 
}
</style>
<script src="script.js"></script>
</head>

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
<body>
	
	<?
	// Resgata a Sessao
	session_start();
	$Procura = strtoupper($_SESSION['Procura']);
	$Opcao   = strtoupper($_SESSION['Opcao']);
	$_SESSION['navega'] = $id;
	 
	include("botoes.php");
	include("layout.php")
	?>

<tr><td><!-- AQUI SER� APRESENTADO O RESULTADO DA BUSCA DIN�MICA.. OU SEJA OS NOMES -->
<div id="pagina" class="invisivel"></div></td></tr>
</body>
	
	</html>

    <?

}else{
	
	?>	

	<html>
	<style type=text/css>
	
	body { background-image: url(<?="../".$logo_sis;?>);
	       background-attachment: fixed }
	
	<!--.cp {  font: bold 10px Arial; color: black}
	<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
	<!--.ld { font: bold 15px Arial; color: #000000}
	<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
	<!--.cn { FONT: 9px Arial; COLOR: black }
	<!--.bc { font: bold 22px Arial; color: #000000 }
	--></style>
	
	<?
	$menssagem = "** N�o Encontrado **";

	include("consulta.php")
	?>
	
	<script LANGUAGE='JavaScript'>
	<!--
	alert("Registro n�o Encontrado !!!");
	//-->
	</script>
	</html>

	<?	
}	

?>
