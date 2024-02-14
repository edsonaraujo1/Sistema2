<?php
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
@session_start();
$path = strtoupper($_SESSION['Path1']);

session_cache_expire(180); //5 minutos por exemplo...

//include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

include("vaurls.php");

$deixar = acesso_url("ESTOQUE");

if ($deixar == "SIM"){

$log_ssoc = $nome3;
$hora = date("d/m/Y"); 

?>
<script language="JavaScript"><!--

//document.onkeydown = keyCatcher;

function keyCatcher() 
{
   var e = event.srcElement.tagName;

   if (event.keyCode == 8 && e != "INPUT" && e != "TEXTAREA") 
   {
      event.cancelBubble = true;
      event.returnValue = false;
   }
}
//-->
</script>

<html>
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>
<body>

<style type=text/css>

body { background-image: url(<?php echo "../".$logo_sis ?>);
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

<?php

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
$Edit8		= trim(strtoupper(retirar_carac(@$row0["Edit8"])));
$Edit9		= trim(strtoupper(retirar_carac(@$row0["Edit9"])));
$Edit10		= trim(strtoupper(retirar_carac(@$row0["Edit10"])));
$Edit11		= trim(strtoupper(retirar_carac(@$row0["Edit11"])));
$Edit12		= trim(strtoupper(retirar_carac(@$row0["Edit12"])));
$Edit13	    = trim(retirar_carac(@$row0["memo1"]));
$alerta_1   = trim(strtoupper(retirar_carac(@$row0["mensage1"])));
$nome_adm   = trim(strtoupper(retirar_carac(@$row0["mensage3"])));

if(strlen($Edit4)<=0){
  $Edit4   = 0; 	
}
if(strlen($Edit5)<=0){
  $Edit5   = 0; 	
}
if(strlen($Edit6)<=0){
  $Edit6   = 0; 	
}


$cami2 = '../imagens/fotos/Branco.bmp';  

$consulta0  = "SELECT * FROM estoque WHERE id = '$Edit1'";

$resultado0 = @mysql_query($consulta0);

$row0 = @mysql_fetch_array($resultado0);

$id    = @$row0["id"];
//$cod_2 = @$row0["id"];

if (!empty($cod_2)){
	

	echo ("
			
		     <br>
		     <br>
		     
			 <div align=center>
		
		     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
		     <tr>
		     <td>
		     <font face=arial><b>*** Produto ja consta no Cadastro !!! ***</b>
		     <table align=center>
		     <form method='POST' action='cadastro.php?Cod_xxx=$id'>
		     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
		     </form> 
		     </table>
		     </td>
		     </tr>
		     </table>
		     </div>");
             exit;

}


// Abrir tabela edificios

$consulta_id  = "SELECT * FROM estoque ORDER BY id DESC LIMIT 0,1";

$resultado_id = @mysql_query($consulta_id);

// Incrementa novo codigo

$row_id = mysql_fetch_array($resultado_id);

$id_id       = @$row_id["id"];

$novo_1 = $id_id+1;
$dat_insc = date("d/m/Y");


	
		$consulta = "INSERT INTO estoque   (codigo,
											data,
											descricao,
											unidade, 
											qtd_estq,
											qtd_mini,
											classe,
											vencimento,
											fornecedor,
											referencia,
											saldo,
											valor,
											obs)
		                VALUES
		                                  ('$novo_1',
										   '$dat_insc',
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
										   '$Edit13')";
		
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
@session_start();
$_SESSION['navega'] = $Edit1;
     
?>

<script language="JavaScript"><!--

document.onkeydown = keyCatcher;

function keyCatcher() 
{
   var e = event.srcElement.tagName;

   if (event.keyCode == 8 && e != "INPUT" && e != "TEXTAREA") 
   {
      event.cancelBubble = true;
      event.returnValue = false;
   }
}
//-->
</script>
<?php

// Abrir tabela Senha

$tabela_1 = strtoupper('estoque');

$consulta3 = "SELECT * FROM permissoes WHERE login = '$nome3' and tabela = '$tabela_1'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];

// Salva Secao
@session_start();
$_SESSION['navega'] = $Edit1;
     
?>
<html>
<body  style=" margin-left: 0px;  margin-top: 21px;  margin-right: 0px;  margin-bottom: 0px; ">

<?php
include("layout.php");
?>

</body>
</html>

<?php

}else{
	
include("enaaurlnp.php");
	
}
?>
