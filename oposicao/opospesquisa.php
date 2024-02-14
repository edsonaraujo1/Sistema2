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

if ($Opcao == "RG"){

    $consulta  = "SELECT * FROM oposicao3 WHERE RGASSOC = '$Procura' ORDER BY RGASSOC";
}
if ($Opcao == "CPF"){

    $consulta  = "SELECT * FROM oposicao3 WHERE CPF = '$Procura' ORDER BY CPF";
}
if ($Opcao == "NOME"){

    $consulta  = "SELECT * FROM oposicao3 WHERE NOMEASSOC like '$Procura%' ORDER BY NOMEASSOC";
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
     <form method='POST' action='cadopos.php?Cod_xx=1'>
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
$Edit2  = @$row["RGASSOC"];
$Edit3  = @$row["DATINSC"];
$Edit4  = @$row["DAT2"];
$Edit5  = @$row["CPF"];
$Edit6  = @$row["SEDE"];
$Edit7  = @$row["CATEGORIA"];
$Edit8  = @$row["CODEDIF"];
$Edit9  = @$row["CNPJ"];
$Edit10 = @$row["ADMS"];
$Edit11 = @$row["MATRICULA"];
$Edit12 = @$row["NU1"];
$Edit13 = @$row["NOMEASSOC"];
$Edit14 = @$row["ENDRESID"];
$Edit15 = @$row["OBS"];


// Abre Tabela Categoria

$consulta1  = "SELECT * FROM categ Where CODIGO = '$Edit7'";

$resultado1 = @mysql_query($consulta1);

$row1 = @mysql_fetch_array($resultado1);

$categ_1   = @$row1["DESCRICAO"];

// Abrir Table de Edificios

$consulta2  = "SELECT * FROM edificios Where cod = '$Edit8'";

$resultado2 = @mysql_query($consulta2);

$row2 = @mysql_fetch_array($resultado2);

$cod_edif   = @$row2["cod"];
$cond  = trim(@$row2["cond"].@$row2["Nome"]);
$edif  = trim(@$row2["Nome"]);

$nome_do_edif = $cond;

// Abrir tabela Administradora

$consulta3 = "SELECT * FROM adms WHERE cod = '$Edit10'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$nome1_adms  = @$row3["nome1"];
$nome2_adms  = @$row3["nomeadm"];


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
	
	include("oposlayoutx.php")
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

	include("oposconsulta.php")
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
