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
session_start();
$path = strtoupper($_SESSION['Path1']);

// include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

$Opcao     = $_POST['Edit1'];
$Procura   = trim($_POST['Edit2']);

// salva Secao
session_start();
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

if ($Opcao == "MATRICULA SOCIO"){

    $consulta  = "SELECT * FROM acompa WHERE N_SOCIO = '$Procura' ORDER BY N_SOCIO";
}
if ($Opcao == "R.G"){

    $consulta  = "SELECT * FROM acompa WHERE RG = '$Procura' ORDER BY RG";
}
if ($Opcao == "C.P.F"){

    $consulta  = "SELECT * FROM acompa WHERE CIC = '$Procura' ORDER BY CIC";
}
if ($Opcao == "NOME"){

    $consulta  = "SELECT * FROM acompa WHERE NOME_SOC Like '$Procura%' ORDER BY NOME_SOC";
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
$Edit1  = @$row["N_SOCIO"];
$Edit2  = @$row["RG"];
$Edit3  = @$row["CIC"];
$Edit4  = @$row["CART_TRAB"];
$Edit5  = @$row["NOME_SOC"];
$Edit6  = @$row["END_SOC"];
$Edit7  = @$row["CEP_SOC"];
$Edit8  = @$row["EST_SOC"];
$Edit9  = @$row["FONE_SOC"];
$Edit10 = @$row["N_EDIFI"];
$Edit11 = @$row["NOME_EDI"];
$Edit12 = @$row["END_EDI"];
$Edit13 = @$row["CEP_EDI"];
$Edit14 = @$row["FONE_EDI"];
$Edit15 = @$row["OBJETO"];
$Edit16 = @$row["JCJ"];
$Edit17 = @$row["PROC_N"];
$Edit18 = @$row["ANO_N"];
$Edit19 = @$row["N_ADV_1"];
$Edit20 = @$row["TRT"];
$Edit21 = @$row["EM_TRT"];
$Edit22 = @$row["NO_AD_1"];
$Edit23 = @$row["TST"];
$Edit24 = @$row["EM_TST"];
$Edit25 = @$row["N_Adv_2"];
$Edit26 = @$row["SOLUCAO"];
$Edit27 = @$row["SOL_EM"];
$Edit28 = @$row["NO_AD_2"];
$Edit29 = @$row["ASSUNTO"]." ".@$row["ASSU_1"];
$Edit30 = @$row["ASSU_1"];

$nome_adm  = @$row["CAMPO_ADM"];

// Abrir tabela Senha

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$aco1       = @$row3["aco1"];
$aco2       = @$row3["aco2"];
$aco3       = @$row3["aco3"];


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
	session_start();
	$Procura = strtoupper($_SESSION['Procura']);
	$Opcao   = strtoupper($_SESSION['Opcao']);
	$_SESSION['navega']    = $id;
    $_SESSION['lista_soc'] = $Edit1;
	$_SESSION['id_RG']     = $Edit2;
    $_SESSION['id_PROC']   = $Edit17;

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
