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
$hora  = date("d/m/Y"); 
$hora2 = date("Y-m-d");
?>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
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

$menssagens = "* * * Incluido * * *";

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

include("funcoes2.php");

$nome3a = strtolower($nome3);
// Abre Tabela Tenporaria

$consulta0  = "SELECT * FROM $nome3a WHERE Nome1 = '$nome3a'";
	
$resultado0 = @mysql_query($consulta0);

$row0 = @mysql_fetch_array($resultado0);

$Edit1      = trim(strtoupper(retirar_carac(@$row0["Edit1"])));
$Edit2		= trim(strtoupper(retirar_carac(@$row0["Edit2"])));
$Edit3		= trim(strtoupper(retirar_carac(@$row0["Edit3"])));
$Edit4		= trim(strtoupper(retirar_carac(@$row0["Edit4"])));
$Edit5		= trim(strtoupper(retirar_carac(@$row0["Edit5"])));
$Edit6		= trim(strtoupper(retirar_carac(@$row0["Edit6"])));
$Edit7		= trim(strtoupper(retirar_carac(@$row0["Edit7"])));
$Edit8	    = trim(strtoupper(retirar_carac(@$row0["memo1"])));
$alerta_1   = trim(strtoupper(retirar_carac(@$row0["mensage1"])));
$nome_adm   = trim(strtoupper(retirar_carac(@$row0["mensage3"])));

$Edit2  = str_replace(",",".",$Edit2);

$consulta0  = "SELECT * FROM recebimentos WHERE codigo = '$Edit1'";

$resultado0 = @mysql_query($consulta0);

$row0 = @mysql_fetch_array($resultado0);

$id    = @$row0["id"];
$cod_2 = @$row0["codigo"];

if (!empty($cod_2)){
	
	$Edit1 = $cod_2+1;
}

			
		$consulta = "INSERT INTO recebimentos (codigo,
											  valor,
		                                      fornecedor,
											  produto,
											  tipo_pagto,
											  data_cheq,
											  data_pagto,
											  data_1,
											  obs)
		                VALUES
		                                  ('$Edit1',
										   '$Edit2',
										   '$Edit3',
										   '$Edit4',
										   '$Edit5',
										   '$Edit6',
										   '$Edit7',
										   '$hora2',
										   '$Edit8')";
		
		@mysql_query($consulta, $link) or
		
		die("
		     <br>
		     <br>
		     
			 <div align=center>
		
		     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
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
		     
     
			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = $menssagens."/".$Edit1;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);
     

// Elimina Tabela temp
$add0 = "DROP TABLE `$nome3a`";
@mysql_query($add0, $link);


// Salva Secao
session_start();
$_SESSION['navega'] = $Edit1;
     
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

<div style="Z-INDEX: 34; LEFT: 185px; WIDTH: 544px; POSITION: absolute; TOP: 435px; HEIGHT: 80px">
<table border='0' aling=center>
          <td> </td>

          <form method="POST" action="cadastro.php?cod_5=<?=$Edit1;?>">
          <td><input type=image name="Voltar" src="../imagens/botao_voltar.PNG"></td>
          </form>

</table>
</div>
	
 
<?
include("layout.php");
?>

</body>
</html>

<?

}else{
	
include("enaaurlnp.php");
	
}
?>