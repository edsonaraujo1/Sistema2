<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Excluir Cadastro Empresa
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

// include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

$data1 = date("d/m/Y");
$hora  = date("H:i:s");
$log_ssoc = $nome3." em ".$data1; 

?>

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

$menssagens = "<font color='#FF0000'>*** Excluido ***</font>";

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

include("funcoes2.php");

$consulta0  = "SELECT * FROM email_boletim WHERE id = '$Cod_2'";

$resultado0 = @mysql_query($consulta0);

$row0 = mysql_fetch_array($resultado0);

$id         = @$row0["id"];
$Edit1 		= trim(retirar_carac(@$row0["id"]));
$Edit2 	    = trim(strtoupper(retirar_carac(@$row0["nome"])));
$Edit3   	= trim(retirar_carac(@$row0["email"]));
$Edit4 		= trim(strtoupper(retirar_carac(@$row0["categoria"]))); 
$Edit5 		= trim(retirar_carac(@$row0["enviado"]));
$Edit6 		= trim(retirar_carac(@$row0["data_envi"]));
$Edit7 		= trim(retirar_carac(@$row0["historico"]));
$Edit9 		= trim(retirar_carac(@$row0["qtd"]));
$Edit10		= trim(retirar_carac(@$row0["browse"]));
$Edit11		= trim(retirar_carac(@$row0["data"]));
$Edit12		= trim(retirar_carac(@$row0["hora"]));

$date_1 = date("d/m/Y")."-".date("H:i:s")." POR ".$nome3;


// Salva Registro excluido em tabela temporaria
$novo_1 = $id_id+1;
$data = date("d/m/Y");
$hora = date("H:i:s"); 
if (empty($Edit9)){
	
	$Edit9 == 0;
}
if ($Edit9 < 0){

	$Edit9 == 0;

}

		$consulta1 = "INSERT INTO email_boletim_excluir    (nome,
			                                     			email,
												 			data,
											     			hora,
												 			categoria,
												 			qtd,
												 			browse,
												 			enviado,
												 			data_envi,
												 			historico,
															log)
			                VALUES
			                                   ('$Edit2',
											    '$Edit3',
												'$Edit11',
												'$Edit12',
												'$Edit4',
												'$Edit9',
												'$Edit10',
												'$Edit5',
												'$Edit6',
												'$Edit7',
												'$date_1')";


/*
echo $Edit2."<br>";
echo $Edit3."<br>";
echo $Edit11."<br>";
echo $Edit12."<br>";
echo $Edit4."<br>";
echo $qtd."<br>";
echo $Edit10."<br>";
echo $Edit5."<br>";
echo $Edit6."<br>";
echo $Edit7."<br>";
echo $date_1."<br>";
*/
		
@mysql_query($consulta1, $link)

or

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Falha na Inclusao !!! ***</b>
     <table align=center>
     <form method='POST' action='cadastro.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");


// Exclui Registro
$consulta2 = "DELETE FROM email_boletim WHERE id = '$Cod_2'";

@mysql_query($consulta2, $link);


// Organiza Tabela apos a Exclusao
$sql0 = 'ALTER TABLE `email_boletim` ORDER BY `id`';
$res0 = mysql_query($sql0);

$sql3 = 'ALTER TABLE `email_boletim` DROP `id`';
$res3 = mysql_query($sql3);

$sql4 = 'ALTER TABLE `email_boletim` ADD `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST';
$res4 = mysql_query($sql4);


$consulta4  = "SELECT * FROM email_boletim ORDER BY id ASC LIMIT 0,50";

$resultado4 = @mysql_query($consulta4);

$row4 = mysql_fetch_array($resultado4);

$id      	= @$row4["id"];


// Abrir tabela Senha

$tabela_1 = strtoupper('email_boletim');

$consulta5 = "SELECT * FROM permissoes WHERE login = '$nome3' and tabela = '$tabela_1'";

$resultado5 = @mysql_query($consulta5);

$row5 = @mysql_fetch_array($resultado5);

$per1       = @$row5["incluir"];
$per2       = @$row5["alterar"];
$per3       = @$row5["excluir"];
$per4       = @$row5["imprimir"];


			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = $menssagem."/".$Edit1;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);

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
