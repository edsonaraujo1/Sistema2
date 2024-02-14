<?php
/*
 ----------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Selecionar Maneira de Pesquisa
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/2009 

 DEUS SEJA LOUVADO
 ----------------------------------------------------
*/

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

// include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include_once('../sql_injection.php');

include("menu.php");

$Opcao     = addslashes($_POST['Edit1']);
$Procura   = addslashes(trim($_POST['Edit2']));

// salva Secao
@session_start();
$_SESSION['Procura'] = Trim($Procura);
$_SESSION['Opcao']   = $Opcao;

$_SESSION['tipo_acao'] = 'alterar_1';

// Abre Conexão com o MySql
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

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
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

    $consulta  = "SELECT * FROM adms WHERE cod = '". anti_sql_injection($Procura) ."' ORDER BY cod";
}
if ($Opcao == "NOME"){

    $consulta  = "SELECT * FROM adms WHERE nomeadm like '". anti_sql_injection($Procura) ."%' ORDER BY nomeadm";
}
if ($Opcao == "ENDEREÇO"){

    $consulta  = "SELECT * FROM adms WHERE endadm like '". anti_sql_injection($Procura) ."%' ORDER BY endadm";
}
if ($Opcao == "CNPJ"){

    $consulta  = "SELECT * FROM adms WHERE cgc = '". anti_sql_injection($Procura) ."' ORDER BY cgc";
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
$Edit1  = @$row["cod"];
$Edit2  = @$row["ativa"];
$Edit3  = @$row["data"];
$Edit4  = @$row["nome1"];
$Edit5  = @$row["nomeadm"];
$Edit6  = @$row["rua"];
$Edit7  = @$row["endadm"];
$Edit8  = @$row["numero"];
$Edit9  = @$row["cep"];
$Edit10 = @$row["bairroadm"];
$Edit11 = @$row["ufadm"]; 
$Edit12 = @$row["cgc"];
$Edit13 = @$row["fone"];
$Edit14 = @$row["nu_pred"];
$Edit15 = @$row["zona"];
$Edit16 = @$row["email"];
$Edit17 = @$row["t_mail"];
$Edit18 = @$row["obs"];

// Abrir tabela Senha

$tabela_1 = strtoupper('adms');

$consulta3 = "SELECT * FROM permissoes WHERE login = '$nome3' and tabela = '$tabela_1'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];

// Conta Nº de Socios 
$consulta4  = "SELECT * FROM edificios WHERE ADM = '". anti_sql_injection($Edit1) ."'";

$resultado4 = @mysql_query($consulta4);

while ($linha4 = mysql_fetch_array($resultado4))
{
  $cop = $cop + 1;

}

$Edit14 = $cop;

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
<title><?php echo $Titulo ?></title>
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

body { background-image: url(<?php echo "../".$logo_sis ?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
-->
</style> 

<?php
include("help.php");
?>

<body>
	
	<?php
	// Resgata a Sessao
	@session_start();
	$Procura = strtoupper($_SESSION['Procura']);
	$Opcao   = strtoupper($_SESSION['Opcao']);
	$_SESSION['navega'] = $id;
	$_SESSION['lista_soc'] = $Edit1;
	 
	include("botoes.php");
	include("layout.php")
	?>

<tr><td><!-- AQUI SERÁ APRESENTADO O RESULTADO DA BUSCA DINÂMICA.. OU SEJA OS NOMES -->
<div id="pagina" class="invisivel"></div></td></tr>
</body>
	
	</html>

    <?php

}else{
	
	?>	

	<html>
	<style type=text/css>
	
	body { background-image: url(<?php echo "../".$logo_sis ?>);}
	
	<!--.cp {  font: bold 10px Arial; color: black}
	<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
	<!--.ld { font: bold 15px Arial; color: #000000}
	<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
	<!--.cn { FONT: 9px Arial; COLOR: black }
	<!--.bc { font: bold 22px Arial; color: #000000 }
	--></style>
	
	<?php
	$menssagem = "* * * Não Encontrado * * *";

	include("consulta.php")
	?>
	
	<script LANGUAGE='JavaScript'>
	<!--
	alert("Registro não Encontrado !!!");
	//-->
	</script>
	</html>

	<?php	
}	

?>
